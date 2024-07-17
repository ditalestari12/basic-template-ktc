<?php
session_start();
include 'koneksi.php';
?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Cafe Ughiithv</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
  <?php include('navbar.php'); ?>

  <!-- Jumbotron -->
  <div class="jumbotron jumbotron-fluid text-center">
    <div class="container">
      <div class="card bg-dark text-white border-light">
        <img src="images/background/cafeee.jpg" width="150" height="200"  class="card-img" alt="작은 카페 (Little Cafe)">
        <h1 class="display-4"><span class="font-weight-bold">작은 카페 <br>KOREAN CAFE</span></h1>
        <hr>
        <p class="lead font-weight-bold">Welcome to 작은 카페 (Little Cafe) <br> 
        Take Ur Time and Have Fun</p>
      </div>
    </div>
  </div>
  <!-- Akhir Jumbotron -->

  <!-- Menu -->    
  <div class="container">
    <div class="judul text-center mt-5">
      <h3 class="font-weight-bold">작은 카페 (Little Cafe) </h3>
      <h5>Selayang, Medan Baru, Medan
        <br>Open On <strong>09:00 AM - 23:00 PM</strong></h5>
    </div>

    <div class="row mb-5 mt-5 justify-content-center">
      <div class="col-md-4 d-flex justify-content-center">
        <div class="card bg-soft-sage text-white border-light">
          <img src="images/background/bgMenu.jpg" class="card-img" alt="Lihat Daftar Menu"> 
          <div class="card-img-overlay mt-5 text-center">
            <a href="daftar_menu.php" class="btn btn-primary">LIHAT DAFTAR MENU</a>
          </div>
        </div>
      </div>

      <div class="col-md-4 d-flex justify-content-center">
        <div class="card bg-soft-sage text-white border-light">
          <img src="images/background/bgPesann.jpg" class="card-img" alt="Lihat Pesanan">
          <div class="card-img-overlay mt-5 text-center">
            <a href="pesanan.php" class="btn btn-primary">LIHAT PESANAN</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Akhir Menu -->


  <!-- Awal Footer -->
  <hr class="footer">
  <div class="container">
    <div class="row footer-body">
      <div class="col-md-6">
        <div class="copyright">
          <strong>Copyright</strong> <i class="far fa-copyright"></i> 2024 -  Designed by Cha Joowan' Wife</p>
        </div>
      </div>

      <div class="col-md-6 d-flex justify-content-end">
        <div class="icon-contact">
          <label class="font-weight-bold">Follow Us </label>
          <a href="#"><img src="images/icon/fb.png" class="mr-3 ml-4" data-toggle="tooltip" title="Facebook"></a>
          <a href="https://www.instagram.com/chajoowan?igsh=MWs5NjBzZjB5M3F1dQ=="><img src="images/icon/ig.png" class="mr-3" data-toggle="tooltip" title="Instagram"></a>
          <a href="https://x.com/bts_bighit?s=21"><img src="images/icon/twitter.png" class="" data-toggle="tooltip" title="Twitter"></a>
        </div>
      </div>
    </div>
  </div>
  <!-- Akhir Footer -->

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>
</html>