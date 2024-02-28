-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 28 Feb 2024 pada 17.52
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pos_kasir`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `detailpenjualan`
--

CREATE TABLE `detailpenjualan` (
  `DetailID` int(11) NOT NULL,
  `PenjualanID` int(11) NOT NULL,
  `ProdukID` int(11) NOT NULL,
  `JumlahProduk` int(11) NOT NULL,
  `Subtotal` decimal(10,2) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `detailpenjualan`
--

INSERT INTO `detailpenjualan` (`DetailID`, `PenjualanID`, `ProdukID`, `JumlahProduk`, `Subtotal`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 9, 5, '20000.00', '2024-02-28 22:08:33', '2024-02-28 09:13:06', '2024-02-28 09:13:06'),
(2, 1, 10, 5, '25000.00', '2024-02-28 22:08:33', '2024-02-28 09:13:06', '2024-02-28 09:13:06'),
(3, 2, 9, 5, '20000.00', '2024-02-28 22:16:24', '2024-02-28 09:16:45', '2024-02-28 09:16:45'),
(4, 3, 3, 10, '75000.00', '2024-02-28 22:17:30', '2024-02-28 09:17:47', '2024-02-28 09:17:47'),
(7, 4, 11, 1, '7000.00', '2024-02-28 22:56:00', '2024-02-28 10:01:26', '2024-02-28 10:01:26'),
(8, 5, 1, 1, '2500.00', '2024-02-28 22:58:24', '2024-02-28 10:01:28', '2024-02-28 10:01:28'),
(9, 6, 11, 1, '7000.00', '2024-02-28 23:00:06', '2024-02-28 10:01:30', '2024-02-28 10:01:30'),
(15, 8, 8, 3, '9000.00', '2024-02-28 23:17:07', NULL, NULL),
(16, 9, 1, 4, '10000.00', '2024-02-28 23:24:58', NULL, NULL),
(17, 9, 4, 1, '7500.00', '2024-02-28 23:24:58', NULL, NULL),
(18, 9, 8, 1, '3000.00', '2024-02-28 23:24:58', NULL, NULL);

--
-- Trigger `detailpenjualan`
--
DELIMITER $$
CREATE TRIGGER `hapuss` AFTER UPDATE ON `detailpenjualan` FOR EACH ROW BEGIN
UPDATE Produk SET Stok = Stok+old.JumlahProduk WHERE ProdukID=old.ProdukID;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `keluar` AFTER INSERT ON `detailpenjualan` FOR EACH ROW BEGIN
UPDATE produk SET Stok = Stok-new.JumlahProduk WHERE ProdukID=new.ProdukID;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `level`
--

CREATE TABLE `level` (
  `id_level` int(11) NOT NULL,
  `nama_level` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `level`
--

INSERT INTO `level` (`id_level`, `nama_level`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Administrator', '2024-01-22 22:25:19', NULL, NULL),
(2, 'Petugas', '2024-01-22 22:25:19', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `PelangganID` int(11) NOT NULL,
  `NamaPelanggan` varchar(255) NOT NULL,
  `Alamat` text NOT NULL,
  `NomorTelepon` int(15) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`PelangganID`, `NamaPelanggan`, `Alamat`, `NomorTelepon`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Darrell', 'Perumahan Tiban\r\n', 44523122, '2024-02-01 21:32:30', '2024-02-28 06:45:13', NULL),
(2, 'Kevin', 'Perumahan Mitra', 689907675, '2024-02-02 20:14:38', '2024-02-27 21:38:40', NULL),
(4, 'Bryan', 'Perumahan Batam Centre', 12453431, '2024-02-28 13:53:51', '2024-02-28 06:45:20', NULL),
(5, 'Ari', 'Tg Uma', 24354443, '2024-02-28 13:54:05', '2024-02-28 06:45:30', NULL),
(6, 'Rizkan', 'Mega Legenda', 454678567, '2024-02-28 13:54:30', '2024-02-28 06:45:39', NULL),
(7, 'Diva', 'Tg Uma', 214435232, '2024-02-28 13:54:48', '2024-02-28 06:45:48', NULL),
(8, 'Ferdi', 'Bengkong', 32454334, '2024-02-28 13:55:14', '2024-02-28 06:45:58', NULL),
(9, 'Firman', 'Tg Uncang', 12234555, '2024-02-28 13:55:37', '2024-02-28 06:46:07', NULL),
(10, 'Fressa', 'Bengkong', 43545666, '2024-02-28 13:55:56', '2024-02-28 06:46:16', NULL),
(11, 'Yanda', 'Batam Centre', 5465766, '2024-02-28 13:56:11', '2024-02-28 06:46:24', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjualan`
--

CREATE TABLE `penjualan` (
  `PenjualanID` int(11) NOT NULL,
  `TanggalPenjualan` date NOT NULL,
  `TotalHarga` decimal(10,2) NOT NULL,
  `PelangganID` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `bayar` decimal(10,0) NOT NULL,
  `kembalian` decimal(10,0) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `penjualan`
--

INSERT INTO `penjualan` (`PenjualanID`, `TanggalPenjualan`, `TotalHarga`, `PelangganID`, `user`, `bayar`, `kembalian`, `created_at`, `updated_at`, `deleted_at`) VALUES
(8, '2024-02-28', '9000.00', 11, 1, '10000', '1000', '2024-02-28 23:17:07', NULL, NULL),
(9, '2024-02-28', '20500.00', 1, 1, '25000', '4500', '2024-02-28 23:24:58', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `ProdukID` int(11) NOT NULL,
  `NamaProduk` varchar(255) NOT NULL,
  `Harga` decimal(10,2) NOT NULL,
  `Stok` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`ProdukID`, `NamaProduk`, `Harga`, `Stok`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Chitato', '2500.00', 83, '2024-02-01 21:20:07', '2024-02-28 00:48:33', NULL),
(2, 'Taro', '2750.00', 95, '2024-02-01 22:08:33', '2024-02-28 00:48:42', NULL),
(3, 'Nutrisari', '7500.00', 200, '2024-02-01 21:20:07', '2024-02-28 00:49:00', NULL),
(4, 'Fruit Tea', '7500.00', 98, '2024-02-01 21:20:07', '2024-02-28 00:49:10', NULL),
(6, 'Roti Morning Bakery', '10000.00', 50, '2024-02-05 20:56:10', '2024-02-28 00:50:00', NULL),
(7, 'Roti Top Bakery', '12000.00', 100, '2024-02-28 13:50:37', NULL, NULL),
(8, 'Fresh Tea', '3000.00', 95, '2024-02-28 13:51:25', NULL, NULL),
(9, 'Aqua', '4000.00', 195, '2024-02-28 13:51:53', NULL, NULL),
(10, 'Nestle', '5000.00', 44, '2024-02-28 13:52:15', NULL, NULL),
(11, 'Astro', '7000.00', 200, '2024-02-28 13:52:34', '2024-02-28 00:53:07', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk_masuk`
--

CREATE TABLE `produk_masuk` (
  `ProdukMasukID` int(11) NOT NULL,
  `ProdukID` int(11) NOT NULL,
  `Stok_masuk` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `produk_masuk`
--

INSERT INTO `produk_masuk` (`ProdukMasukID`, `ProdukID`, `Stok_masuk`, `user`, `created_at`, `updated_at`, `deleted_at`) VALUES
(3, 1, 10, 1, '2024-02-02 16:49:16', NULL, NULL);

--
-- Trigger `produk_masuk`
--
DELIMITER $$
CREATE TRIGGER `masuk` BEFORE INSERT ON `produk_masuk` FOR EACH ROW BEGIN
UPDATE produk SET Stok = Stok+new.Stok_masuk WHERE ProdukID=new.ProdukID;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `tambah` AFTER DELETE ON `produk_masuk` FOR EACH ROW BEGIN
UPDATE Produk SET Stok = Stok-old.Stok_masuk WHERE ProdukID=old.ProdukID;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` int(11) NOT NULL,
  `foto` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `level`, `foto`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Admin', 'c4ca4238a0b923820dcc509a6f75849b', 1, 'default.png', '2024-01-22 22:26:01', NULL, NULL),
(2, 'Cristian', 'c4ca4238a0b923820dcc509a6f75849b', 2, 'default.png', '2024-01-22 22:26:01', '2024-02-28 00:46:51', NULL),
(4, 'Darrell', '827ccb0eea8a706c4c34a16891f84e7b', 2, 'default.png', '2024-02-27 21:14:46', '2024-02-27 21:15:08', '2024-02-27 21:15:08'),
(5, 'Darrell', 'd41d8cd98f00b204e9800998ecf8427e', 0, 'default.png', '2024-02-28 00:46:59', '2024-02-28 00:47:14', '2024-02-28 00:47:14');

-- --------------------------------------------------------

--
-- Struktur dari tabel `website`
--

CREATE TABLE `website` (
  `id_website` int(11) NOT NULL,
  `nama_website` varchar(255) NOT NULL,
  `logo_website` text DEFAULT NULL,
  `logo_pdf` text DEFAULT NULL,
  `favicon_website` text DEFAULT NULL,
  `komplek` text DEFAULT NULL,
  `jalan` text DEFAULT NULL,
  `kelurahan` text DEFAULT NULL,
  `kecamatan` text DEFAULT NULL,
  `kota` text DEFAULT NULL,
  `kode_pos` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `website`
--

INSERT INTO `website` (`id_website`, `nama_website`, `logo_website`, `logo_pdf`, `favicon_website`, `komplek`, `jalan`, `kelurahan`, `kecamatan`, `kota`, `kode_pos`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Point Of Sale', 'T&T Supermarket.svg', 'obor.png', 'obor.png', 'Komp. Pahlawan Mas', 'Jl. Raya Pahlawan No. 123', 'Kel. Sukajadi', 'Kec. Sukasari', 'Kota Batam', '29424', '2023-05-01 16:33:53', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `detailpenjualan`
--
ALTER TABLE `detailpenjualan`
  ADD PRIMARY KEY (`DetailID`);

--
-- Indeks untuk tabel `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id_level`);

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`PelangganID`),
  ADD UNIQUE KEY `NomorTelepon` (`NomorTelepon`);

--
-- Indeks untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`PenjualanID`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`ProdukID`);

--
-- Indeks untuk tabel `produk_masuk`
--
ALTER TABLE `produk_masuk`
  ADD PRIMARY KEY (`ProdukMasukID`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indeks untuk tabel `website`
--
ALTER TABLE `website`
  ADD PRIMARY KEY (`id_website`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `detailpenjualan`
--
ALTER TABLE `detailpenjualan`
  MODIFY `DetailID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `level`
--
ALTER TABLE `level`
  MODIFY `id_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `PelangganID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `PenjualanID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `ProdukID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `produk_masuk`
--
ALTER TABLE `produk_masuk`
  MODIFY `ProdukMasukID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `website`
--
ALTER TABLE `website`
  MODIFY `id_website` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
