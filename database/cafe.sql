-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 13 Jul 2024 pada 11.13
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cafe`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `cafe`
--

CREATE TABLE `cafe` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `telepon` int(20) NOT NULL,
  `alamat` text NOT NULL,
  `makanan` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `jlhmkn` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `minuman` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `jlhmnm` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `catatan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `cafe`
--

INSERT INTO `cafe` (`id`, `nama`, `telepon`, `alamat`, `makanan`, `jlhmkn`, `minuman`, `jlhmnm`, `catatan`) VALUES
(9, 'Jungha', 98875, 'Kepo', 'Gopchang', '3', 'Bingsu', '2', 'Hangyeom bayar'),
(12, 'Saebom', 754567, 'mnsmxask', 'Kimbap', '2', 'YujaCha', '2', 'Take away'),
(14, 'Loco', 78, 'jkajkj', 'Gopchang, Kimbap', '2, 1', 'YujaCha, Bingsu', '2, 1', 'tolong'),
(17, 'Maxwell', 567789, 'Yo ndak tau', 'Soondae', '4', 'Sulbing', '4', 'cepet'),
(19, 'Sandy', 20746, 'Coc', 'Jjajangmyeon', '1', 'Hwachae', '3', 'dhsbdjs');

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu`
--

CREATE TABLE `menu` (
  `id` int(50) NOT NULL,
  `nama_menu` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL,
  `harga` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `menu`
--

INSERT INTO `menu` (`id`, `nama_menu`, `deskripsi`, `harga`) VALUES
(0, '', 'SO BAKSOOOO\r\n', '18.000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `register`
--

CREATE TABLE `register` (
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `register`
--

INSERT INTO `register` (`username`, `email`, `password`) VALUES
('Lee Jeno', 'Jenong@gmail.com', '123'),
('Bongjae', 'jaehyun@gmail.com', '0'),
('Ughiithv', 'lugimanalu@gmail.com', '123'),
('joowan', 'jo@gmail.com', 'taevin'),
('gii', 'lala@gmail.com', '456'),
('dela', 'dela@gmail.com', '12345'),
('admin', 'jamet12@gmail.com', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `nama_pelanggan` varchar(100) NOT NULL,
  `bintang` int(11) NOT NULL,
  `isi_ulasan` text NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `reviews`
--

INSERT INTO `reviews` (`id`, `nama_pelanggan`, `bintang`, `isi_ulasan`, `tanggal`) VALUES
(10, 'Karina', 4, 'bagus', '2024-07-05 03:04:37'),
(12, 'Mario ', 4, 'Mahal', '2024-07-05 03:12:28'),
(15, 'MarkLee', 3, 'Cantikk estetik', '2024-07-05 03:15:08'),
(17, 'Lily', 0, 'spot fotonya banyak', '2024-07-05 03:17:37'),
(19, 'Deli', 3, 'baik', '2024-07-05 03:46:24');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `cafe`
--
ALTER TABLE `cafe`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `cafe`
--
ALTER TABLE `cafe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
