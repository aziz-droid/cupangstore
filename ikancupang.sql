-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 05 Jun 2021 pada 14.10
-- Versi server: 10.4.18-MariaDB
-- Versi PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ikancupang`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id` int(11) NOT NULL,
  `namaikan` varchar(250) NOT NULL,
  `kode` varchar(100) NOT NULL,
  `stock` varchar(100) NOT NULL,
  `harga` varchar(100) NOT NULL,
  `berat` varchar(100) NOT NULL,
  `kondisi` varchar(100) NOT NULL,
  `kategori` varchar(100) NOT NULL,
  `foto` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id`, `namaikan`, `kode`, `stock`, `harga`, `berat`, `kondisi`, `kategori`, `foto`) VALUES
(1, 'Ikan Cupang Indonesia', 'ABC1', '20', '20000', '4', 'Baru', 'Cupang Indonesia', '146-1.jpg'),
(2, 'Cupang Jawa', 'ABC2', '50', '40000', '1', 'Baru', 'Cupang Jawa', '966-2.jpg'),
(5, 'Cupang Jateng', 'ABC3', '12', '24000', '1', 'Baru', 'Cupang Medan', '896-3.jpg'),
(6, 'Ikan Cupang Jombangan', 'ABC4', '100', '100000', '1', 'Baru', 'Cupang Bali', '971-4.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(250) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telp` varchar(100) NOT NULL,
  `hakakses` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `nama`, `username`, `password`, `email`, `telp`, `hakakses`) VALUES
(1, 'Reza Kurnia Setiawan', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'rezakurniasetiawan@gmail.com', '085850728067', 'admin'),
(3, 'Sri Wiji Indriana', 'indriana', '202cb962ac59075b964b07152d234b70', 'indrianaunesa@gmail.com', '085645645784', 'pelanggan'),
(4, 'Ilham Fatkhur Rohmana', 'ilham', 'd9b1d7db4cd6e70935368a1efb10e377', 'ilhamfatkur@gmail.com', '085456854785', 'pelanggan'),
(6, 'Aris Unesa', 'aris', '202cb962ac59075b964b07152d234b70', 'arisunesa@gmail.com', '085758744110', 'pelanggan'),
(7, 'Rendy Herley', 'rendy', '202cb962ac59075b964b07152d234b70', 'rendyunesa@gmail.com', '081330349343', 'pelanggan'),
(8, 'Aris Unesaku', 'aris', '202cb962ac59075b964b07152d234b70', 'arisunesa11@gmail.com', '081334549576', 'admin'),
(9, 'Aziz unesa', 'aziz', '202cb962ac59075b964b07152d234b70', 'azizunesa@gmail.com', '081330349576', 'pelanggan');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
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
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
