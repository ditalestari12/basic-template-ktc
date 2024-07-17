<?php

session_start();
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    header("Location: pesanan.php");
    exit();
  }
?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Daftar Menu - Cafe Ughiithv</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background-color: #e3f988;
    }
    .card-img-top {
      height: 150px;
      object-fit: cover;
    }
    .card-body {
      background-color: #e0f1f7;
      border-top: 2px solid #284048;
      transition: background-color 0.3s;
    }
    .card-title {
      color: #114456;
      font-weight: 600;
    }
    .card-text {
      color: #6c757d;
    }
    .card:hover .card-body {
      background-color: #f0f8ff;
    }
    .btn-primary {
      background-color: #426bdb;
      border-color: #426bdb;
      transition: background-color 0.3s, border-color 0.3s;
    }
    .btn-primary1 {
      background-color: #004953;
      border-color:  #004953;
      transition: background-color 0.3s, border-color 0.3s;
    }
   
    .btn-primary:hover {
      background-color: #0056b3;
      border-color: #004085;
    }
    .card-header {
      background-color: #9ab973;
      color: #fff;
      font-weight: 600;
    }
    .text-center {
      margin-bottom: 20px;
    }
    .btn-block {
      font-size: 18px;
      font-weight: 600;
    }
  </style>
</head>
<body>
<?php include('navbar.php'); ?>
  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-10">
        <div class="card">
          <div class="card-header text-center">Daftar Menu</div>
          <div class="card-body">
            <p class="text-center">Silakan pilih menu di bawah ini.</p>
            <form action="daftar_menu.php" method="POST">
              <div class="row">
                <div class="col-md-4 mb-4">
                  <div class="card h-100">
                    <img src="images/background/Gopchang.jpg" class="card-img-top" alt="Menu 1">
                    <div class="card-body text-center">
                      <h5 class="card-title">Gopchang</h5>
                      <p class="card-text">BBQ Korea dengan daging import<br>
                      <div class="text" style="color: #3cb371;">
                        Rp.90.000/pack
                        </div>
                      </p>
                      <button type="button" class="btn btn-primary">Tersedia</button>
                    </div>
                  </div>
                </div>
                <div class="col-md-4 mb-4">
                  <div class="card h-100">
                    <img src="images/background/Japchae.jpg" class="card-img-top" alt="Menu 2">
                    <div class="card-body text-center">
                      <h5 class="card-title">Japchae</h5>
                      <p class="card-text">Dang myeon mix sayuran dan daging <br>
                      <div class="text" style="color: #3cb371;">
                      Rp.30.000</p>
                      </div>
                      <button type="button" class="btn btn-primary1">Habis</button>
                    </div>
                  </div>
                </div>
                <div class="col-md-4 mb-4">
                  <div class="card h-100">
                    <img src="images/background/Jjajangmyeon.jpg" class="card-img-top" alt="Menu 3">
                    <div class="card-body text-center">
                      <h5 class="card-title">Jjajangmyeon</h5>
                      <p class="card-text">Mie dengan saus pasta kacang hitam <br>
                      <div class="text" style="color: #3cb371;">
                      Rp.45.000</p>
                      </div>
                      <button type="button" class="btn btn-primary">Tersedia</button>
                    </div>
                  </div>
                </div>
                <div class="col-md-4 mb-4">
                  <div class="card h-100">
                    <img src="images/background/Kimbap.jpg" class="card-img-top" alt="Menu 4">
                    <div class="card-body text-center">
                      <h5 class="card-title">Kimbap</h5>
                      <p class="card-text">Nasi gulung berisi sayuran dan ham<br>
                      <div class="text" style="color: #3cb371;">
                      Rp.30.000</p>
                      </div>
                      <button type="button" class="btn btn-primary">Tersedia</button>
                    </div>
                  </div>
                </div>
                <div class="col-md-4 mb-4">
                  <div class="card h-100">
                    <img src="images/background/Kimchi Jigae.jpg" class="card-img-top" alt="Menu 5">
                    <div class="card-body text-center">
                      <h5 class="card-title">Kimchi Jigae</h5>
                      <p class="card-text">Sup kimchi dengan saus gochujang <br>
                      <div class="text" style="color: #3cb371;">
                      Rp.40.000</p>
                      </div>
                      <button type="button" class="btn btn-primary">Tersedia</button>
                    </div>
                  </div>
                </div>
                <div class="col-md-4 mb-4">
                  <div class="card h-100">
                    <img src="images/background/Mandu.jpg" class="card-img-top" alt="Menu 6">
                    <div class="card-body text-center">
                      <h5 class="card-title">Mandu</h5>
                      <p class="card-text">Pangsit isi variasi daging & sayuran<br>
                      <div class="text" style="color: #3cb371;">
                      Rp.25.000</p>
                      </div>
                      <button type="button" class="btn btn-primary1">Habis</button>
                    </div>
                  </div>
                </div>
                <div class="col-md-4 mb-4">
                  <div class="card h-100">
                    <img src="images/background/Samgyetang.jpg" class="card-img-top" alt="Menu 7">
                    <div class="card-body text-center">
                      <h5 class="card-title">Samgyetang</h5>
                      <p class="card-text">Ayam utuh dengan ginseng dan rempah Korea<br>
                      <div class="text" style="color: #3cb371;">
                      Rp.75.000</p>
                      </div>
                      <button type="button" class="btn btn-primary">Tersedia</button>
                    </div>
                  </div>
                </div>
                <div class="col-md-4 mb-4">
                  <div class="card h-100">
                    <img src="images/background/Soondae.jpg" class="card-img-top" alt="Menu 8">
                    <div class="card-body text-center">
                      <h5 class="card-title">Soondae</h5>
                      <p class="card-text">Sosis darah yang dimasak dengan pengasapan<br>
                      <div class="text" style="color: #3cb371;">
                      Rp.35.000</p>
                      </div>
                      <button type="button" class="btn btn-primary">Tersedia</button>
                    </div>
                  </div>
                </div>
                <div class="col-md-4 mb-4">
                  <div class="card h-100">
                    <img src="images/background/Tteobokki.jpg" class="card-img-top" alt="Menu 9">
                    <div class="card-body text-center">
                      <h5 class="card-title">Tteobokki</h5>
                      <p class="card-text">Kue beras korea dengan saus gochujang<br>
                      <div class="text" style="color: #3cb371;">
                      Rp.30.000</p>
                      </div>
                      <button type="button" class="btn btn-primary1">Habis</button>
                    </div>
                  </div>
                </div>
                <div class="col-md-4 mb-4">
                  <div class="card h-100">
                    <img src="images/background/YujaCha.jpg" class="card-img-top" alt="Menu 10">
                    <div class="card-body text-center">
                      <h5 class="card-title">YujaCha</h5>
                      <p class="card-text">Teh dengan campuran selai yuzu<br>
                      <div class="text" style="color: #3cb371;">
                      Rp.20.000</p>
                      </div>
                      <button type="button" class="btn btn-primary">Tersedia</button>
                    </div>
                  </div>
                </div>
                <div class="col-md-4 mb-4">
                  <div class="card h-100">
                    <img src="images/background/Sulbing.jpg" class="card-img-top" alt="Menu 11">
                    <div class="card-body text-center">
                      <h5 class="card-title">Sulbing</h5>
                      <p class="card-text">Ice cream dengan variasi buah<br>
                      <div class="text" style="color: #3cb371;">
                      Rp.20.000</p>
                      </div>
                      <button type="button" class="btn btn-primary">Tersedia</button>
                    </div>
                  </div>
                </div>
                <div class="col-md-4 mb-4">
                  <div class="card h-100">
                    <img src="images/background/SujeongGwa.jpg" class="card-img-top" alt="Menu 12">
                    <div class="card-body text-center">
                      <h5 class="card-title">Sujeong</h5>
                      <p class="card-text">Teh dengan cinnamon dan jahe<br>
                      <div class="text" style="color: #3cb371;">
                      Rp.20.000</p>
                      </div>
                      <button type="button" class="btn btn-primary">Tersedia</button>
                    </div>
                  </div>
                </div>
                <div class="col-md-4 mb-4">
                  <div class="card h-100">
                    <img src="images/background/Sikhye.jpg" class="card-img-top" alt="Menu 13">
                    <div class="card-body text-center">
                      <h5 class="card-title">Sikhye</h5>
                      <p class="card-text">Minuman ekstrak beras<br>
                      <div class="text" style="color: #3cb371;">
                      Rp.20.000</p>
                      </div>
                      <button type="button" class="btn btn-primary1">Habis</button>
                    </div>
                  </div>
                </div>
                <div class="col-md-4 mb-4">
                  <div class="card h-100">
                    <img src="images/background/Hwachae.jpg" class="card-img-top" alt="Menu 14">
                    <div class="card-body text-center">
                      <h5 class="card-title">Hwachae</h5>
                      <p class="card-text">Es buah Korea mix buah<br>
                      <div class="text" style="color: #3cb371;">
                      Rp.20.000</p>
                      </div>
                      <button type="button" class="btn btn-primary">Tersedia</button>
                    </div>
                  </div>
                </div>
                <div class="col-md-4 mb-4">
                  <div class="card h-100">
                    <img src="images/background/Bingsu.jpg" class="card-img-top" alt="Menu 15">
                    <div class="card-body text-center">
                      <h5 class="card-title">Bingsu</h5>
                      <p class="card-text">Ice cream buah & susu<br>
                      <div class="text" style="color: #3cb371;">
                      Rp.20.000</p>
                      </div>
                      <button type="button" class="btn btn-primary">Tersedia</button>
                    </div>
                  </div>
                </div>
              </div>
              <button type="submit" class="btn btn-primary btn-block mt-3">Pesan Menu</button>
            </form><br><br>
            
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

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Penambahan Menu</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f9f9f9;
        }
        .card {
            border-radius: 15px;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s;
        }
        .card:hover {
            transform: translateY(-5px);
        }
        .card-header {
            background-color: #84c6f4;
            color: #fff;
            font-weight: 600;
            border-top-left-radius: 15px;
            border-top-right-radius: 15px;
        }
        .card-body {
            padding: 40px;
        }
        .menu-item {
            margin-bottom: 20px;
            padding: 15px;
            border: 1px solid #ddd;
            border-radius: 10px;
            background-color: #fff;
            transition: background-color 0.3s;
        }
        .menu-item:hover {
            background-color: #f1f1f1;
        }
        .btn-primary {
            background-color: #5b9bd5;
            border-color: #5b9bd5;
        }
        .btn-primary:hover {
            background-color: #3a8dcf;
            border-color: #3a8dcf;
        }
        .text-center {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header text-center">Penambahan Menu</div>
                    <div class="card-body">
                        <form action="daftar_menu.php" method="POST">
                            <!-- Add form fields here if needed -->
                        </form>

                        <div class="container mt-5">
                            <div class="text-center mb-4">
                                <a href="tambah_menu.php" class="btn btn-primary">Tambah Menu</a>
                            </div>

                            <?php
                            if (isset($_SESSION['daftar_menu']) && count($_SESSION['daftar_menu']) > 0) {
                                foreach ($_SESSION['daftar_menu'] as $index => $menu) {
                                    echo "<div class='menu-item'>";
                                    echo "<h4 class='font-weight-bold'>" . htmlspecialchars($menu['nama_menu']) . "</h4>";
                                    echo "<p>" . htmlspecialchars($menu['deskripsi']) . "</p>";
                                    echo "<p class='font-weight-bold'>Harga: Rp " . htmlspecialchars($menu['harga']) . "</p>";
                                    echo "<p class='text-success'>" . ($menu['ketersediaan'] ? "Tersedia" : "Tidak Tersedia") . "</p>";
                                    echo "<div class='d-flex justify-content-start'>";
                                    echo "<a href='hapusmenu.php?id=$index' class='btn btn-sm btn-danger mr-2'>Hapus</a>";
                                    echo "</div>";
                                    echo "</div>";
                                }
                            } else {
                                echo "<p class='text-center'>Tidak ada menu tersedia.</p>";
                            }
                            ?>
                        </div>    
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
