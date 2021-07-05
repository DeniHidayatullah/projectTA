-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 05, 2021 at 07:49 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mebel`
--

-- --------------------------------------------------------

--
-- Table structure for table `angsuran`
--

CREATE TABLE `angsuran` (
  `kode_angsuran` int(11) NOT NULL,
  `nomor_faktur` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `angsuran_ke` int(11) NOT NULL,
  `sisa_angsuran` int(11) NOT NULL,
  `bayar` int(11) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `barang_kode` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `barang_nama` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `jenis_bahan` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type_barang` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `harga_asli` int(11) NOT NULL DEFAULT 0,
  `biaya_produksi` int(11) NOT NULL,
  `biaya_tukang` int(11) NOT NULL,
  `biaya_distribusi` int(11) NOT NULL,
  `biaya_lainlain` int(11) NOT NULL,
  `keuntungan` int(11) NOT NULL,
  `foto` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'default.jpg',
  `stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`barang_kode`, `barang_nama`, `jenis_bahan`, `type_barang`, `harga_asli`, `biaya_produksi`, `biaya_tukang`, `biaya_distribusi`, `biaya_lainlain`, `keuntungan`, `foto`, `stok`) VALUES
('br01', 'pintu', 'kayu', 'pintu', 10, 21, 2, 23000, 10000, 51021, 'logo.png', 14),
('br24', 'Kursi', 'kaca', '2x10m', 10000, 10000, 100000, 20000, 100000, 1000, 'a.png', 5),
('br28', 'Avian', 'kaca', 'Cat Besii', 562646, 0, 0, 0, 0, 10, 'no-image.jpg', 108);

-- --------------------------------------------------------

--
-- Table structure for table `detail_penjualan`
--

CREATE TABLE `detail_penjualan` (
  `nomor_faktur` varchar(255) NOT NULL,
  `barang_kode` varchar(255) NOT NULL,
  `harga` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `sub_total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detail_penjualan`
--

INSERT INTO `detail_penjualan` (`nomor_faktur`, `barang_kode`, `harga`, `jumlah`, `sub_total`) VALUES
('PJ1625191713', 'br01', 84054, 1, 84054),
('PJ1625357854', 'br24', 241000, 1, 241000);

-- --------------------------------------------------------

--
-- Table structure for table `jenis_pembayaran`
--

CREATE TABLE `jenis_pembayaran` (
  `id_jenis_pembayaran` int(11) NOT NULL,
  `nama_pembayaran` varchar(110) NOT NULL,
  `tambah_harga` int(11) NOT NULL,
  `lama_angsuran` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jenis_pembayaran`
--

INSERT INTO `jenis_pembayaran` (`id_jenis_pembayaran`, `nama_pembayaran`, `tambah_harga`, `lama_angsuran`) VALUES
(1, 'Cash', 0, 0),
(2, 'Kredit Bulanan', 500000, 10),
(3, 'Kredit Musiman', 1000000, 4);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_pembelian`
--

CREATE TABLE `transaksi_pembelian` (
  `kode_pembelian` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nama_barang` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `jenis_barang` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type_barang` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `harga` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `transaksi_pembelian`
--

INSERT INTO `transaksi_pembelian` (`kode_pembelian`, `nama_barang`, `jenis_barang`, `type_barang`, `harga`, `jumlah`, `total`, `tanggal`) VALUES
('kdp0001', 'Avian', 'Cat ', 'Cat Kayu', 50000, 5, 250000, '2021-07-05'),
('kdp0002', 'Avian', 'Cat', 'Cat Besii', 1000, 10, 10000, '2021-07-05');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_penjualan`
--

CREATE TABLE `transaksi_penjualan` (
  `nomor_faktur` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_jenis_pembayaran` int(11) NOT NULL COMMENT '1 = cash, 2= kredit bulanan, 3 = kredit musiman',
  `nama_pembeli` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `alamat_pembeli` text COLLATE utf8_unicode_ci NOT NULL,
  `no_telp` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `foto_ktp` varchar(110) COLLATE utf8_unicode_ci NOT NULL,
  `total` int(11) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `transaksi_penjualan`
--

INSERT INTO `transaksi_penjualan` (`nomor_faktur`, `id_jenis_pembayaran`, `nama_pembeli`, `alamat_pembeli`, `no_telp`, `foto_ktp`, `total`, `tanggal`) VALUES
('PJ1625191713', 1, 'Nofita', 'Banyuwangi', '084862746', 'default.jpg', 84054, '2021-06-01'),
('PJ1625357854', 1, 'deni', 'jember', '08918124821', '1.jpg', 84054, '2021-07-04');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `angsuran`
--
ALTER TABLE `angsuran`
  ADD PRIMARY KEY (`kode_angsuran`),
  ADD KEY `nomor_faktur` (`nomor_faktur`);

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`barang_kode`);

--
-- Indexes for table `detail_penjualan`
--
ALTER TABLE `detail_penjualan`
  ADD UNIQUE KEY `nomor_faktur` (`nomor_faktur`);

--
-- Indexes for table `jenis_pembayaran`
--
ALTER TABLE `jenis_pembayaran`
  ADD PRIMARY KEY (`id_jenis_pembayaran`);

--
-- Indexes for table `transaksi_pembelian`
--
ALTER TABLE `transaksi_pembelian`
  ADD PRIMARY KEY (`kode_pembelian`);

--
-- Indexes for table `transaksi_penjualan`
--
ALTER TABLE `transaksi_penjualan`
  ADD PRIMARY KEY (`nomor_faktur`),
  ADD KEY `id_jenis_pembayaran` (`id_jenis_pembayaran`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `angsuran`
--
ALTER TABLE `angsuran`
  MODIFY `kode_angsuran` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jenis_pembayaran`
--
ALTER TABLE `jenis_pembayaran`
  MODIFY `id_jenis_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `angsuran`
--
ALTER TABLE `angsuran`
  ADD CONSTRAINT `angsuran` FOREIGN KEY (`nomor_faktur`) REFERENCES `transaksi_penjualan` (`nomor_faktur`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
