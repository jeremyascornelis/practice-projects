-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 09, 2022 at 07:27 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbtokoabc-12415`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pesanan`
--

CREATE TABLE `tbl_pesanan` (
  `idorder` int(30) NOT NULL,
  `iduser` int(11) NOT NULL,
  `nama_pemesan` varchar(255) NOT NULL,
  `telp` varchar(100) NOT NULL,
  `jenis_pembayaran` varchar(120) NOT NULL,
  `no_rekening` varchar(100) DEFAULT NULL,
  `jasa_pengiriman` varchar(200) NOT NULL,
  `jenis_paket` varchar(200) NOT NULL,
  `total_produk` int(50) NOT NULL,
  `total_bayar` int(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pesanan`
--

INSERT INTO `tbl_pesanan` (`idorder`, `iduser`, `nama_pemesan`, `telp`, `jenis_pembayaran`, `no_rekening`, `jasa_pengiriman`, `jenis_paket`, `total_produk`, `total_bayar`) VALUES
(1, 1, 'Jeremyas Cornelis', '0895804965391', 'tunai', NULL, 'tiki', 'ECO', 3, 530000),
(2, 1, 'Jeremyas Cornelis', '0895804965391', 'bri', '12345678', 'pos', 'Pos Instan Barang', 2, 682000),
(3, 2, 'Kevin Setiadi', '0893639273', 'bca', '12345768', 'pos', 'Pos Instan Barang', 2, 812000),
(4, 2, 'Kevin Setiadi', '0893639273', 'bca', '345678902', 'tiki', 'ECO', 3, 658000),
(5, 3, 'Putri Andin', '0851234678', 'bri', '9876543212', 'jne', 'REG', 3, 820000),
(6, 4, 'Jeremyas Cornelis Abigail', '0895804965391', 'bca', '987765431423', 'pos', 'Paket Kilat Khusus', 2, 656000),
(7, 4, 'Jeremyas Cornelis Abigail', '0895804965391', 'tunai', NULL, 'tiki', 'REG', 2, 497000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_produk`
--

CREATE TABLE `tbl_produk` (
  `idproduk` int(11) NOT NULL,
  `nama_produk` varchar(255) NOT NULL,
  `stok` int(11) NOT NULL,
  `harga` int(50) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_produk`
--

INSERT INTO `tbl_produk` (`idproduk`, `nama_produk`, `stok`, `harga`, `deskripsi`, `gambar`) VALUES
(1, 'Tas Gunung Tosca', 30, 350000, 'Tas gunung warna tosca buatan merk ternama yaitu eiger', 'tas-gunung-eiger-tosca.jpeg'),
(2, 'Tas Gym Hitam', 20, 260000, 'Tas untuk gym berwarna hitam buatan Adidas', 'tas-gym-adidas-hitam.jpeg'),
(3, 'Tas Pinggang Biru', 20, 120000, 'Tas pinggang untuk pria berwarna biru dari brand lokal', 'tas-pinggang-biru.jpg'),
(4, 'Tas Pinggang Hitam', 35, 45000, 'Tas pinggang pria berwarna hitam buatan brand lokal', 'tas-pinggang-hitam.jpg'),
(5, 'Tas Ransel Grey', 45, 220000, 'Tas ransel untuk anak sekolah berwarna abu-abu', 'tas-ransel-grey.jpg'),
(6, 'Tas Ransel Hitam', 18, 450000, 'Tas ransel yang cocok untuk travelling ', 'tas-ransel-hitam.jpg'),
(7, 'Tas Ransel Mini Pink', 50, 43000, 'Tas ransel mini untuk wanita', 'tas-ransel-mini-pink.jpg'),
(8, 'Tas Ransel Navy', 30, 93000, 'Tas ransel sekolah buatan brand lokal', 'tas-ransel-navy.jpg'),
(9, 'Tas Ransel Orange', 23, 150000, 'Tas ransel yang cocok untuk traveling', 'tas-ransel-oranye.jpg'),
(10, 'Tas Wanita Maroon', 28, 100000, 'Tas wanita berwarna maroon buatan brand lokal', 'tas-wanita-maroon.jpg'),
(11, 'Tas Wanita Pink', 48, 117000, 'Tas wanita berwarna pink cocok untuk berpergian', 'tas-wanita-pink.jpg'),
(12, 'Tas Wanita Navy', 20, 130000, 'Tas wanita berwarna navy buatan brand lokal', 'tas-wanita-navy.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `iduser` int(11) NOT NULL,
  `nama_user` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `notelp` varchar(200) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `distrik` varchar(100) NOT NULL,
  `id_distrik` int(11) NOT NULL,
  `kodepos` int(25) NOT NULL,
  `provinsi` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`iduser`, `nama_user`, `alamat`, `notelp`, `gender`, `distrik`, `id_distrik`, `kodepos`, `provinsi`, `username`, `password`) VALUES
(1, 'Jeremyas Cornelis', 'Jl. Imam Bonjol No.207, Pendrikan Kidul, Kec. Semarang Tengah, Kota Semarang, Jawa Tengah 50131', '0895804965391', 'Laki-Laki', 'Semarang', 399, 58111, 'Jawa Tengah', 'pockypoem20', 'jimi1234'),
(2, 'Kevin Setiadi', 'Semarang Indah Blok E 3A', '0893639273', 'Laki-Laki', 'Semarang', 399, 54319, 'Jawa Tengah', 'keset02', 'kevin234'),
(3, 'Putri Andin', 'Plamongan Indah Blok E', '0851234678', 'Perempuan', 'Cirebon', 109, 46511, 'Jawa Barat', 'putdin30', '12345'),
(4, 'Jeremyas Cornelis Abigail', 'Plamongan Indah Blok C 13 No 28, RT 004/ RW 006, Kelurahan Plamongan Sari, Kecamatan Pedurungan, Kota Semarang', '0895804965391', 'Laki-Laki', 'Cirebon', 109, 45116, 'Jawa Barat', 'poepcorn10', 'jimi12345');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_pesanan`
--
ALTER TABLE `tbl_pesanan`
  ADD PRIMARY KEY (`idorder`);

--
-- Indexes for table `tbl_produk`
--
ALTER TABLE `tbl_produk`
  ADD PRIMARY KEY (`idproduk`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`iduser`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
