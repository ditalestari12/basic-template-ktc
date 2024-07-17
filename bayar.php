<?php
include 'koneksi.php';
require 'vendor/autoload.php';

use Dompdf\Dompdf;

$id = $_GET['id'];

// Query untuk mengambil data pesanan berdasarkan ID
$query = "SELECT * FROM cafe WHERE id = $id";
$result = $conn->query($query);
$row = $result->fetch_assoc();

// Harga makanan
$harga_makanan = [
    'gopchang' => 90000,
    'japchae' => 30000,
    'jjajangmyeon' => 45000,
    'kimbap' => 30000,
    'kimchi jigae' => 40000,
    'mandu' => 25000,
    'samgyetang' => 75000,
    'soondae' => 35000,
    'tteobokki' => 30000
];

// Harga minuman
$harga_minuman = 20000;

// Menguraikan nama makanan dan minuman dari database
$makanan_list = explode(', ', strtolower($row['makanan']));
$jumlah_makanan_list = explode(', ', $row['jlhmkn']);
$minuman_list = explode(', ', strtolower($row['minuman']));
$jumlah_minuman_list = explode(', ', $row['jlhmnm']);

// Hitung total bayar untuk makanan
$total_makanan = 0;
foreach ($makanan_list as $index => $makanan) {
    if (isset($harga_makanan[$makanan])) {
        $total_makanan += $harga_makanan[$makanan] * $jumlah_makanan_list[$index];
    }
}

// Hitung total bayar untuk minuman
$total_minuman = 0;
foreach ($minuman_list as $index => $minuman) {
    $total_minuman += $harga_minuman * $jumlah_minuman_list[$index];
}

$total_bayar = $total_makanan + $total_minuman;

// HTML untuk PDF
$html = '
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Tagihan Pembayaran</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <style>
    body {
      background-color: #f8f9fa;
    }
    .container {
      margin-top: 50px;
    }
    .card {
      border: 1px solid #ced4da;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }
    .card-header {
      background-color: #007bff;
      color: #fff;
      border-bottom: none;
      border-radius: 10px 10px 0 0;
    }
    .btn {
      padding: 10px 20px;
      font-size: 16px;
      border-radius: 5px;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header text-center">작은 카페 (Little Cafe)</div>
          <div class="card-body">
            <h5 class="card-title">Detail Pesanan</h5>
            <p class="card-text"><strong>Nama: </strong>' . $row['nama'] . '</p>
            <p class="card-text"><strong>Telepon: </strong>' . $row['telepon'] . '</p>
            <p class="card-text"><strong>Alamat: </strong>' . $row['alamat'] . '</p>';

foreach ($makanan_list as $index => $makanan) {
    $html .= '<p class="card-text"><strong>Makanan: </strong>' . $makanan . ' (Jlh: ' . $jumlah_makanan_list[$index] . ' x Rp ' . number_format($harga_makanan[$makanan], 0, ',', '.') . ')</p>';
}

foreach ($minuman_list as $index => $minuman) {
    $html .= '<p class="card-text"><strong>Minuman: </strong>' . $minuman . ' (Jlh: ' . $jumlah_minuman_list[$index] . ' x Rp ' . number_format($harga_minuman, 0, ',', '.') . ')</p>';
}

$html .= '
            <p class="card-text"><strong>Total Bayar: </strong>Rp ' . number_format($total_bayar, 0, ',', '.') . '</p>
            <hr>
            <h5 class="card-title">Metode Pembayaran</h5>
            <div class="form-group">
              <label for="metode">Pilih Metode Pembayaran:</label>
              <select class="form-control" id="metode">
                <option value="bank">Transfer Bank</option>
                <option value="gopay">Gopay</option>
                <option value="ovo">OVO</option>
              </select>
            </div>
            <button class="btn btn-primary" id="bayarBtn">Bayar Sekarang</button>
            <a href="cetak.php?id=' . $row['id'] . '" class="btn btn-success ml-2" target="_blank">Cetak Tagihan</a>
            <div id="statusPembayaran" class="mt-3"></div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script>
    $(document).ready(function() {
      $("#bayarBtn").click(function() {
        var metode = $("#metode").val();
        $("#bayarBtn").attr("disabled", true).html("Sedang Memproses...");
        
        // Simulasi proses pembayaran
        setTimeout(function() {
          $("#statusPembayaran").html("<div class=\'alert alert-success\' role=\'alert\'>Pembayaran berhasil dilakukan melalui " + metode + ". Terima kasih!</div>");
        }, 2000); // Menggunakan timeout untuk simulasi proses pembayaran yang sebenarnya
      });
    });
  </script>
</body>
</html>
';

// Output HTML
echo $html;

// Close the database connection
$conn->close();
?>
