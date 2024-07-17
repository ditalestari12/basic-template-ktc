<?php
require 'vendor/autoload.php';

use Dompdf\Dompdf;

$id = $_GET['id'];

// Query untuk mengambil data pesanan berdasarkan ID
include 'koneksi.php';
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

// Pastikan nama makanan dari database dalam huruf kecil
$nama_makanan = strtolower($row['makanan']);

// Hitung total bayar untuk makanan dan minuman
$total_makanan = $harga_makanan[$nama_makanan] * $row['jlhmkn'];
$total_minuman = $harga_minuman * $row['jlhmnm'];
$total_bayar = $total_makanan + $total_minuman;

// HTML untuk PDF
$html = '
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Tagihan Pembayaran</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      line-height: 1.6;
      background-color: #f8f9fa;
    }
    .container {
      width: 80%;
      margin: 0 auto;
      padding: 20px;
    }
    .header {
      text-align: center;
      margin-bottom: 20px;
    }
    .invoice-box {
      border: 1px solid #ccc;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
      padding: 20px;
      background-color: #fff;
    }
    .invoice-box table {
      width: 100%;
      line-height: inherit;
      text-align: left;
    }
    .invoice-box table td {
      padding: 5px;
      vertical-align: top;
    }
    .invoice-box table tr td:nth-child(2) {
      text-align: right;
    }
    .invoice-box table tr.top table td {
      padding-bottom: 20px;
    }
    .invoice-box table tr.top table td.title {
      font-size: 45px;
      line-height: 45px;
      color: #333;
    }
    .invoice-box table tr.information table td {
      padding-bottom: 40px;
    }
    .invoice-box table tr.heading td {
      background: #eee;
      border-bottom: 1px solid #ddd;
      font-weight: bold;
    }
    .invoice-box table tr.details td {
      padding-bottom: 20px;
    }
    .invoice-box table tr.item td {
      border-bottom: 1px solid #eee;
    }
    .invoice-box table tr.item.last td {
      border-bottom: none;
    }
    .invoice-box table tr.total td:nth-child(2) {
      border-top: 2px solid #eee;
      font-weight: bold;
    }
    .thank-you {
      text-align: center;
      margin-top: 30px;
      font-size: 20px;
      color: #888;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="header">
      <h2>Tagihan Pembayaran</h2>
    </div>
    <div class="invoice-box">
      <table cellpadding="0" cellspacing="0">
        <tr class="top">
          <td colspan="2">
            <table>
              <tr>
                <td><strong>Nama:</strong> ' . $row['nama'] . '</td>
                <td><strong>Tanggal:</strong> ' . date('d F Y') . '</td>
              </tr>
              <tr>
                <td><strong>Telepon:</strong> ' . $row['telepon'] . '</td>
                <td><strong>ID Pesanan:</strong> ' . $row['id'] . '</td>
              </tr>
              <tr>
                <td colspan="2"><strong>Alamat:</strong> ' . $row['alamat'] . '</td>
              </tr>
            </table>
          </td>
        </tr>
        
        <tr class="heading">
          <td>Deskripsi</td>
          <td>Harga</td>
        </tr>
        <tr class="item">
          <td>' . $row['makanan'] . ' (' . $row['jlhmkn'] . ' x Rp ' . number_format($harga_makanan[$nama_makanan], 0, ',', '.') . ')</td>
          <td>Rp ' . number_format($total_makanan, 0, ',', '.') . '</td>
        </tr>
        <tr class="item">
          <td>' . $row['minuman'] . ' (' . $row['jlhmnm'] . ' x Rp ' . number_format($harga_minuman, 0, ',', '.') . ')</td>
          <td>Rp ' . number_format($total_minuman, 0, ',', '.') . '</td>
        </tr>
        
        <tr class="total">
          <td></td>
          <td><strong>Total Bayar: Rp ' . number_format($total_bayar, 0, ',', '.') . '</strong></td>
        </tr>
      </table>
    </div>
    <div class="thank-you">
      Terimakasih, Selamat Menikmati
    </div>
  </div>
</body>
</html>
';

// Buat objek Dompdf
$dompdf = new Dompdf();
$dompdf->loadHtml($html);

// Setting ukuran dan orientasi kertas
$dompdf->setPaper('A4', 'portrait');

// Render PDF (generate)
$dompdf->render();

// Output PDF ke browser
$dompdf->stream("tagihan_pesanan_$id.pdf", array("Attachment" => false));

// Tutup koneksi database
$conn->close();
?>
