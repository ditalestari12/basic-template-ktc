<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama_menu = $_POST['nama_menu'];
    $deskripsi = $_POST['deskripsi'];
    $harga = $_POST['harga'];
    $ketersediaan = $_POST['ketersediaan'];

    // Simpan ke dalam sesi
    $_SESSION['daftar_menu'][] = [
        'nama_menu' => $nama_menu,
        'deskripsi' => $deskripsi,
        'harga' => $harga,
        'ketersediaan' => $ketersediaan
    ];

    header("Location: daftar_menu.php");
    exit();
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Tambah Menu - Cafe Ughiithv</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #e3f988;
        }
        .form-container {
            background-color: #e0f1f7;
            border: 1px solid #284048;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .form-group label {
            font-weight: 600;
            color: #114456;
        }
        .btn-primary {
            background-color: #426bdb;
            border-color: #426bdb;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #004085;
        }
    </style>
</head>
<body>
    <?php include('navbar.php'); ?>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="form-container">
                    <h2 class="text-center">Tambah Menu</h2>
                    <form action="tambah_menu.php" method="POST">
                        <div class="form-group">
                            <label for="nama_menu">Nama Menu</label>
                            <input type="text" class="form-control" name="nama_menu" id="nama_menu" placeholder="Nama Menu" required>
                        </div>
                        <div class="form-group">
                            <label for="deskripsi">Deskripsi</label>
                            <textarea class="form-control" name="deskripsi" id="deskripsi" placeholder="Deskripsi" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="harga">Harga</label>
                            <input type="number" class="form-control" name="harga" id="harga" placeholder="Harga" required>
                        </div>
                        <div class="form-group">
                            <label for="ketersediaan">Ketersediaan</label>
                            <select class="form-control" name="ketersediaan" id="ketersediaan" required>
                                <option value="1">Tersedia</option>
                                <option value="0">Habis</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Tambah Menu</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-4zGXPfkc5TOlcaStZwhpDWWgfCD7FjzBc4ZmM0E7ZmWt4D99vZ2L+UkW+JmXaJx" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>
