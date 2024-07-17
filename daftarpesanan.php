<?php
include 'koneksi.php';
?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Daftar Pesanan</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <style>
    body {
      background-color: #f0f8ff; 
    }
    .card {
      border: none;
      border-radius: 15px;
      box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
    }
    .card-header {
      background-color: #6c757d; 
      color: white;
      font-weight: bold;
      text-align: center;
      border-top-left-radius: 15px;
      border-top-right-radius: 15px;
    }
    .table thead th {
      background-color: #007bff; 
      color: white;
      font-weight: bold;
    }
    .table tbody tr:nth-child(odd) {
      background-color: #e9ecef; 
    }
    .table tbody tr:nth-child(even) {
      background-color: #f8f9fa;
    }
    .table tbody tr:hover {
      background-color: #d1ecf1; 
    }
    .btn {
      margin: 0 5px;
      border-radius: 10px;
    }
  </style>
</head>
<body>
  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">Daftar Pesanan</div>
          <div class="card-body">
            <table class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Nama</th>
                  <th>Telepon</th>
                  <th>Alamat</th>
                  <th>Makanan</th>
                  <th>Jumlah Makanan</th>
                  <th>Minuman</th>
                  <th>Jumlah Minuman</th>
                  <th>Catatan</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  $query = "SELECT * FROM cafe";
                  $result = $conn->query($query);
                  while ($row = $result->fetch_assoc()) {
                ?>
                <tr>
                  <td><?php echo $row['id'] ?></td>
                  <td><?php echo $row['nama'] ?></td>
                  <td><?php echo $row['telepon'] ?></td>
                  <td><?php echo $row['alamat'] ?></td>
                  <td><?php echo $row['makanan'] ?></td>
                  <td><?php echo $row['jlhmkn'] ?></td>
                  <td><?php echo $row['minuman'] ?></td>
                  <td><?php echo $row['jlhmnm'] ?></td>
                  <td><?php echo $row['catatan'] ?></td>
                  <td>
                    <div class="d-flex justify-content-start">
                      <a href="hapus.php?id=<?php echo $row['id'] ?>" class="btn btn-sm btn-danger">Hapus</a>
                      <a href="pesanan.php?id=<?php echo $row['id'] ?>" class="btn btn-sm btn-warning">Edit</a>
                      <a href="bayar.php?id=<?php echo $row['id'] ?>" class="btn btn-sm btn-success">Bayar</a>
                    </div>
                  </td>
                </tr>
                <?php } ?>
              </tbody>
            </table>
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

<?php
$conn->close();
?>
