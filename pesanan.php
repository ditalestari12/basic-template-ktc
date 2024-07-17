<?php
include 'koneksi.php';

$editMode = false;
$id = $nama = $telepon = $alamat = $makanan = $jlhmkn = $minuman = $jlhmnm = $catatan = '';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $editMode = true;

    // Mendapatkan data pesanan berdasarkan ID
    $query = "SELECT * FROM cafe WHERE id='$id'";
    $result = $conn->query($query);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $nama = $row['nama'];
        $telepon = $row['telepon'];
        $alamat = $row['alamat'];
        $makanan = $row['makanan'];
        $jlhmkn = $row['jlhmkn'];
        $minuman = $row['minuman'];
        $jlhmnm = $row['jlhmnm'];
        $catatan = $row['catatan'];
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mengambil nilai dari form
    $nama = $_POST['nama'];
    $telepon = $_POST['telepon'];
    $alamat = $_POST['alamat'];
    $makanan = implode(", ", $_POST['makanan']);
    $jlhmkn = implode(", ", $_POST['jlhmakanan']);
    $minuman = implode(", ", $_POST['minuman']);
    $jlhmnm = implode(", ", $_POST['jlhminuman']);
    $catatan = $_POST['catatan'];

    // Cek apakah makanan atau minuman habis
    $makanan_habis = ['Japchae', 'Mandu', 'Tteobokki'];
    $minuman_habis = ['Sikhye'];

    $makanan_arr = $_POST['makanan'];
    $minuman_arr = $_POST['minuman'];

    $makanan_check = array_intersect($makanan_arr, $makanan_habis);
    $minuman_check = array_intersect($minuman_arr, $minuman_habis);

    if (!empty($makanan_check) || !empty($minuman_check)) {
        echo "<script>alert('Makanan atau minuman yang dipilih telah habis.'); window.history.back();</script>";
    } else {
        if ($editMode) {
            // Proses untuk memperbarui data di database
            $sql = "UPDATE cafe SET nama='$nama', telepon='$telepon', alamat='$alamat', makanan='$makanan', jlhmkn='$jlhmkn', minuman='$minuman', jlhmnm='$jlhmnm', catatan='$catatan' WHERE id='$id'";
        } else {
            // Proses untuk menyimpan ke database
            $sql = "INSERT INTO cafe (nama, telepon, alamat, makanan, jlhmkn, minuman, jlhmnm, catatan) 
                    VALUES ('$nama', '$telepon', '$alamat', '$makanan', '$jlhmkn', '$minuman', '$jlhmnm', '$catatan')";
        }

        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('Pesanan telah ditambahkan'); window.location.href='daftarpesanan.php';</script>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}

$conn->close();
?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>작은 카페</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <style>
    body {
      background-color: #e3f2fd; /* Warna latar belakang biru muda */
    }
    .card-header {
      background-color: #388e3c; /* Warna hijau */
      color: white;
    }
    .btn-primary {
      background-color: #0288d1; /* Warna biru */
      border-color: #0288d1;
    }
    .btn-primary:hover {
      background-color: #0277bd; /* Warna biru lebih gelap */
      border-color: #01579b;
    }
    .form-control {
      border-radius: 0.2rem;
    }
  </style>
  <script>
    document.addEventListener("DOMContentLoaded", function() {
      document.querySelectorAll(".makanan-select").forEach(function(select) {
        select.addEventListener("change", function() {
          var makanan = this.value;
          var makananHabis = ["Japchae", "Mandu", "Tteobokki"];
          if (makananHabis.includes(makanan)) {
            alert("Makanan yang dipilih telah habis.");
            this.value = "kosong";
          }
        });
      });

      document.querySelectorAll(".minuman-select").forEach(function(select) {
        select.addEventListener("change", function() {
          var minuman = this.value;
          var minumanHabis = ["Sikhye"];
          if (minumanHabis.includes(minuman)) {
            alert("Minuman yang dipilih telah habis.");
            this.value = "kosong";
          }
        });
      });
    });

    function addField(type) {
      var container = document.getElementById(type + "-container");
      var index = container.children.length + 1;

      var div = document.createElement("div");
      div.classList.add("form-group");

      var label = document.createElement("label");
      label.innerText = type.charAt(0).toUpperCase() + type.slice(1) + " " + index;

      var select = document.createElement("select");
      select.classList.add("form-control", type + "-select");
      select.name = type + "[]";
      select.required = true;

      var options = {
        makanan: ["Gopchang", "Japchae", "Jjajangmyeon", "Kimbap", "Kimchi Jigae", "Mandu", "Samgyetang", "Soondae", "Tteobokki"],
        minuman: ["YujaCha", "Sulbing", "Sujeong", "Sikhye", "Sungnyung", "Hwachae", "Bingsu"]
      };

      options[type].forEach(function(option) {
        var opt = document.createElement("option");
        opt.value = option;
        opt.innerText = option;
        select.appendChild(opt);
      });

      var jumlah = document.createElement("input");
      jumlah.type = "number";
      jumlah.classList.add("form-control");
      jumlah.name = "jlh" + type + "[]";
      jumlah.placeholder = "Jumlah " + type.charAt(0).toUpperCase() + type.slice(1);
      jumlah.required = true;

      div.appendChild(label);
      div.appendChild(select);
      div.appendChild(jumlah);
      container.appendChild(div);
    }
  </script>
</head>
<body>
<?php include('navbar.php'); ?>
  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header"><?php echo $editMode ? 'Edit' : 'Form' ?> Pesanan</div>
          <div class="card-body">
            <form action="pesanan.php<?php if ($editMode) echo '?id=' . $id; ?>" method="POST">
              <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $nama; ?>" required>
              </div>
              <div class="form-group">
                <label for="telepon">Nomor Telepon</label>
                <input type="tel" class="form-control" id="telepon" name="telepon" value="<?php echo $telepon; ?>" required>
              </div>
              <div class="form-group">
                <label for="alamat">Alamat</label>
                <textarea class="form-control" id="alamat" name="alamat" rows="3" required><?php echo $alamat; ?></textarea>
              </div>
              <div id="makanan-container">
                <div class="form-group">
                  <label for="makanan">Makanan 1</label>
                  <select class="form-control makanan-select" id="makanan" name="makanan[]" required>
                    <option value="kosong">kosong</option>
                    <option value="Gopchang">Gopchang</option>
                    <option value="Japchae">Japchae</option>
                    <option value="Jjajangmyeon">Jjajangmyeon</option>
                    <option value="Kimbap">Kimbap</option>
                    <option value="Kimchi Jigae">Kimchi Jigae</option>
                    <option value="Mandu">Mandu</option>
                    <option value="Samgyetang">Samgyetang</option>
                    <option value="Soondae">Soondae</option>
                    <option value="Tteobokki">Tteobokki</option>
                  </select>
                  <input type="number" class="form-control mt-2" name="jlhmakanan[]" placeholder="Jumlah Makanan" required>
                </div>
              </div>
              <button type="button" class="btn btn-secondary mb-3" onclick="addField('makanan')">Tambah Makanan</button>
              <div id="minuman-container">
                <div class="form-group">
                  <label for="minuman">Minuman 1</label>
                  <select class="form-control minuman-select" id="minuman" name="minuman[]" required>
                    <option value="kosong">kosong</option>
                    <option value="YujaCha">YujaCha</option>
                    <option value="Sulbing">Sulbing</option>
                    <option value="Sujeong">Sujeong</option>
                    <option value="Sikhye">Sikhye</option>
                    <option value="Sungnyung">Sungnyung</option>
                    <option value="Hwachae">Hwachae</option>
                    <option value="Bingsu">Bingsu</option>
                  </select>
                  <input type="number" class="form-control mt-2" name="jlhminuman[]" placeholder="Jumlah Minuman" required>
                </div>
              </div>
              <button type="button" class="btn btn-secondary mb-3" onclick="addField('minuman')">Tambah Minuman</button>
              <div class="form-group">
                <label for="catatan">Catatan Tambahan</label>
                <textarea class="form-control" id="catatan" name="catatan" rows="3"><?php echo $catatan; ?></textarea>
              </div>
              <button type="submit" class="btn btn-primary"><?php echo $editMode ? 'Update' : 'Submit' ?></button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-4zGXPfkc5TOlcaStZwhpDWWgfCD7FjzBc4ZmM0E7ZmWt4D99vZ2L+UkW+JmXaJx" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>
