-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 08 Jun 2022 pada 11.15
-- Versi server: 5.7.33
-- Versi PHP: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `data`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `hp`
--

CREATE TABLE `hp` (
  `id` int(11) NOT NULL,
  `merek` varchar(100) NOT NULL,
  `tipe` varchar(100) NOT NULL,
  `tahun` char(4) NOT NULL,
  `kondisi` varchar(100) NOT NULL,
  `stok` varchar(100) NOT NULL,
  `warna` varchar(100) NOT NULL,
  `gambar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `hp`
--

INSERT INTO `hp` (`id`, `merek`, `tipe`, `tahun`, `kondisi`, `stok`, `warna`, `gambar`) VALUES
(1, 'Nokia 66', 'Bbs', '2010', 'Seken', 'Ada', 'Black', 'nokia.jpg'),
(2, 'samsung', 'android', '2015', 'Baru', 'Ada', 'Light Blue', '629ac3ec19c43.jpg'),
(3, 'Iphone', 'ios', '2022', 'baru', 'Ada', 'black', 'iphone.jpg'),
(4, 'xiomi', 'android', '2021', 'seken', 'kosong', 'white', 'xiomi.jpg'),
(5, 'oppo', 'android', '2019', 'seken', 'ada', 'yellow', 'oppo.jpg'),
(6, 'vivo', 'android', '2017', 'baru', 'ada', 'black', 'vivo.jpg'),
(7, 'Nokia', 'android', '2019', 'baru', 'ada', 'black', 'nokia2.jpg'),
(8, 'oppo', 'android', '2021', 'seken', 'ada', 'white', 'oppo.jpg'),
(9, 'esia', 'bbs', '2015', 'seken', 'kosong', 'green', 'esia.jpg'),
(10, 'Rog', 'android', '2020', 'baru', 'kosong', 'black', 'rog.jpg'),
(14, 'nokia', 'bbs', '2020', 'baru', 'ada', 'hitam', 'rog.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(1, 'ketankelapa', '$2y$10$nfiBFeKtYEZcO8nOd9GPZOhyIQosjUIrV6v3vwgg8xj/NZr8k44GC'),
(3, 'amad', '$2y$10$i3iR6W.gpniKKr.CJMU06OCrKNnN3VjhLvj4/4I2hZZAaVdUvz9sS');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `hp`
--
ALTER TABLE `hp`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `hp`
--
ALTER TABLE `hp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
