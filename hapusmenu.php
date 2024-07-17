<?php
session_start();

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    if (isset($_SESSION['daftar_menu'][$id])) {
        unset($_SESSION['daftar_menu'][$id]);
        $_SESSION['daftar_menu'] = array_values($_SESSION['daftar_menu']); // Re-index array
    }
}

header("Location: daftar_menu.php");
exit();
?>
