-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 19, 2020 at 10:22 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perusahaan`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_cproduk`
--

CREATE TABLE `detail_cproduk` (
  `id_cproses` int(11) NOT NULL,
  `id_produk` varchar(11) NOT NULL,
  `id_mesin` char(4) NOT NULL,
  `urutan_proses` int(11) NOT NULL,
  `ci` decimal(10,2) DEFAULT NULL,
  `ti` decimal(10,2) DEFAULT NULL,
  `ri` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `detail_produk`
--

CREATE TABLE `detail_produk` (
  `id` int(11) NOT NULL,
  `id_produk` varchar(11) NOT NULL,
  `id_mesin` char(4) NOT NULL,
  `urutan_proses` int(11) NOT NULL,
  `t_proses` decimal(10,2) NOT NULL,
  `t_all` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_produk`
--

INSERT INTO `detail_produk` (`id`, `id_produk`, `id_mesin`, `urutan_proses`, `t_proses`, `t_all`) VALUES
(2, '0068', 'M001', 1, '28.00', '4200.00'),
(3, '2561', 'M002', 1, '12.08', '1812.00'),
(4, '2561', 'M004', 2, '33.00', '1650.00'),
(5, '2561', 'M003', 3, '19.20', '1920.00'),
(9, '2561', 'M003', 4, '19.20', '1920.00'),
(10, '2561', 'M005', 5, '15.60', '4680.00'),
(11, '2561', 'M004', 6, '16.94', '847.00'),
(22, '0068', 'M010', 2, '26.40', '1584.00'),
(25, '0014', 'M006', 3, '184.00', '11040.00'),
(26, '0014', 'M002', 1, '28.80', '4320.00'),
(27, '0014', 'M004', 2, '30.50', '1525.00'),
(28, '0014', 'M007', 4, '54.00', '16200.00'),
(29, '0014', 'M011', 5, '60.00', '9000.00'),
(30, '0014', 'M008', 6, '25.00', '3750.00'),
(31, '0014', 'M009', 7, '18.00', '2700.00'),
(32, '0014', 'M007', 8, '24.00', '7200.00'),
(33, '0014', 'M010', 9, '59.40', '3564.00');

-- --------------------------------------------------------

--
-- Table structure for table `hasil`
--

CREATE TABLE `hasil` (
  `id_proses` int(11) NOT NULL,
  `id_produk` varchar(11) NOT NULL,
  `urutan_proses` int(11) NOT NULL,
  `id_mesin` char(4) NOT NULL,
  `ci` decimal(10,2) DEFAULT NULL,
  `ti` decimal(10,2) DEFAULT NULL,
  `rj` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hasil`
--

INSERT INTO `hasil` (`id_proses`, `id_produk`, `urutan_proses`, `id_mesin`, `ci`, `ti`, `rj`) VALUES
(843, '0068', 1, 'M001', '0.00', '4200.00', '4200.00'),
(844, '0014', 1, 'M002', '0.00', '4320.00', '4320.00'),
(845, '0068', 2, 'M010', '4200.00', '1584.00', '5784.00'),
(846, '0014', 2, 'M004', '4320.00', '1525.00', '5845.00'),
(847, '0014', 3, 'M006', '5845.00', '11040.00', '16885.00'),
(848, '0014', 4, 'M007', '16885.00', '16200.00', '33085.00'),
(849, '0014', 5, 'M011', '33085.00', '9000.00', '42085.00'),
(850, '0014', 6, 'M008', '42085.00', '3750.00', '45835.00'),
(851, '0014', 7, 'M009', '45835.00', '2700.00', '48535.00'),
(852, '0014', 8, 'M007', '48535.00', '7200.00', '55735.00'),
(853, '0014', 9, 'M010', '55735.00', '3564.00', '59299.00');

-- --------------------------------------------------------

--
-- Table structure for table `mesin`
--

CREATE TABLE `mesin` (
  `nomor` int(11) NOT NULL,
  `id_mesin` char(4) NOT NULL,
  `nama_mesin` varchar(40) DEFAULT NULL,
  `jumlah_mesin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mesin`
--

INSERT INTO `mesin` (`nomor`, `id_mesin`, `nama_mesin`, `jumlah_mesin`) VALUES
(1, 'M001', 'BENCH LATE SD 32', 2),
(2, 'M002', 'FONG HO', 2),
(3, 'M003', 'CNC FOCUS 120', 3),
(4, 'M004', 'BENCH LATE SD 25', 6),
(5, 'M005', 'AMADA', 1),
(6, 'M006', 'HOBING MC', 5),
(7, 'M007', 'CNC VICTOR', 1),
(8, 'M008', 'WEST LAKES', 2),
(9, 'M009', 'ROLLING MC', 2),
(10, 'M010', 'CF 12A', 5),
(11, 'M011', 'CNC FOCUS 140', 2),
(12, 'M012', 'P. PRESS', 1),
(13, 'M013', 'S. GRINDING', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id_pengguna` int(11) NOT NULL,
  `nama_lengkap` varchar(25) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` int(1) DEFAULT NULL COMMENT '1:admin 2:manajer 3:engineer 4:operator*'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id_pengguna`, `nama_lengkap`, `username`, `password`, `level`) VALUES
(12, 'Nurul Fikri', 'fikri', 'd033e22ae348aeb5660fc2140aec35850c4da997', 1),
(13, 'Andreas Pramudyo', 'andreas', 'a13fb40490e7d01a1a6ad6da8dab0fd4daff6d0d', 2),
(14, 'Ardi Kurniawan', 'aardi', 'bb5fd707b68a69354e08aed905388f69e697d93e', 3);

-- --------------------------------------------------------

--
-- Table structure for table `penjadwalan`
--

CREATE TABLE `penjadwalan` (
  `no_penjadwalan` int(11) NOT NULL,
  `id_produk` varchar(11) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penjadwalan`
--

INSERT INTO `penjadwalan` (`no_penjadwalan`, `id_produk`, `tanggal`, `jumlah`) VALUES
(8, '0014', '2019-08-08', 150),
(9, '0068', '2019-08-08', 200),
(10, '2561', '2019-08-08', 300),
(11, '0068', '2019-08-09', 700),
(12, '0014', '2019-08-09', 700),
(13, '0068', '2019-09-05', 300),
(14, '0014', '2019-09-05', 300);

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` varchar(11) NOT NULL,
  `deskripsi_produk` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `deskripsi_produk`) VALUES
('0014', 'SHAFT KICK'),
('0068', 'SLEEVE'),
('2561', 'COLLAR');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_cproduk`
--
ALTER TABLE `detail_cproduk`
  ADD PRIMARY KEY (`id_cproses`);

--
-- Indexes for table `detail_produk`
--
ALTER TABLE `detail_produk`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_produk` (`id_produk`,`id_mesin`),
  ADD KEY `detail_produk_ibfk_3` (`id_mesin`);

--
-- Indexes for table `hasil`
--
ALTER TABLE `hasil`
  ADD PRIMARY KEY (`id_proses`);

--
-- Indexes for table `mesin`
--
ALTER TABLE `mesin`
  ADD PRIMARY KEY (`nomor`),
  ADD KEY `id_mesin` (`id_mesin`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- Indexes for table `penjadwalan`
--
ALTER TABLE `penjadwalan`
  ADD PRIMARY KEY (`no_penjadwalan`),
  ADD KEY `id_produk` (`id_produk`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_cproduk`
--
ALTER TABLE `detail_cproduk`
  MODIFY `id_cproses` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `detail_produk`
--
ALTER TABLE `detail_produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `hasil`
--
ALTER TABLE `hasil`
  MODIFY `id_proses` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=854;

--
-- AUTO_INCREMENT for table `mesin`
--
ALTER TABLE `mesin`
  MODIFY `nomor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `penjadwalan`
--
ALTER TABLE `penjadwalan`
  MODIFY `no_penjadwalan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
