<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama_pelanggan = $_POST['nama'];
    $bintang = $_POST['rating'];
    $isi_ulasan = $_POST['ulasan'];

    // Sanitize input data
    $nama_pelanggan = $conn->real_escape_string($nama_pelanggan);
    $bintang = $conn->real_escape_string($bintang);
    $isi_ulasan = $conn->real_escape_string($isi_ulasan);

    // Query to insert data into the table
    $query = "INSERT INTO reviews (nama_pelanggan, bintang, isi_ulasan) VALUES ('$nama_pelanggan', '$bintang', '$isi_ulasan')";

    if ($conn->query($query) === TRUE) {
        echo "<script>alert('Review berhasil disimpan!'); window.location.href='daftarulasan.php';</script>";
    } else {
        echo "Error: " . $query . "<br>" . $conn->error;
    }

    $conn->close();
} else {
    echo "Request method tidak valid.";
}
?>
