<?php
include 'koneksi.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM cafe WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Pesanan telah dihapus'); window.location.href='daftarpesanan.php';</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
