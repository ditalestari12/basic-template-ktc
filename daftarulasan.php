<?php
include 'koneksi.php';

// Aksi jika tombol Hapus ditekan
if (isset($_GET['action']) && $_GET['action'] == 'hapus' && isset($_GET['id'])) {
    $id_hapus = $_GET['id'];
    
    // Query untuk menghapus ulasan berdasarkan ID
    $query_hapus = "DELETE FROM reviews WHERE id='$id_hapus'";
    
    if ($conn->query($query_hapus) === TRUE) {
        echo "<script>alert('Ulasan berhasil dihapus'); window.location.href='daftarulasan.php';</script>";
    } else {
        echo "Error: " . $query_hapus . "<br>" . $conn->error;
    }
}

// Query untuk mengambil semua data ulasan
$query = "SELECT * FROM reviews ORDER BY tanggal DESC";
$result = $conn->query($query);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Ulasan Pelanggan</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .table-container {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
        }
        .table-container h2 {
            margin-bottom: 20px;
        }
        .table-container table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        .table-container th, .table-container td {
            padding: 10px;
            text-align: center;
        }
        .table-container th {
            background-color: #007bff;
            color: white;
        }
        .table-container tbody tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
<?php include('navbar.php'); ?>
    <div class="table-container">
        <?php
        if ($result->num_rows > 0) {
            echo "<h2>Daftar Ulasan Pelanggan</h2>";
            echo "<table class='table table-bordered'>";
            echo "<thead class='thead-light'>";
            echo "<tr><th>ID</th><th>Nama Pelanggan</th><th>Rating</th><th>Ulasan</th><th>Tanggal</th><th>Aksi</th></tr>";
            echo "</thead>";
            echo "<tbody>";
            
            // Output data dari setiap baris
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["id"] . "</td>";
                echo "<td>" . $row["nama_pelanggan"] . "</td>";
                echo "<td>" . $row["bintang"] . "</td>";
                echo "<td>" . $row["isi_ulasan"] . "</td>";
                echo "<td>" . $row["tanggal"] . "</td>";
                echo "<td>";
                echo "<a href='review.php?id=" . $row["id"] . "' class='btn btn-primary btn-sm'>Edit</a>";
                echo "&nbsp;";
                echo "<a href='daftarulasan.php?action=hapus&id=" . $row["id"] . "' class='btn btn-danger btn-sm' onclick='return confirm(\"Apakah Anda yakin ingin menghapus ulasan ini?\")'>Hapus</a>";
                echo "</td>";
                echo "</tr>";
            }
            echo "</tbody>";
            echo "</table>";
        } else {
            echo "<h2>Tidak ada ulasan saat ini.</h2>";
        }

        $conn->close();
        ?>
    </div>
</body>
</html>
