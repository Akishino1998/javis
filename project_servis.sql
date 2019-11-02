-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 08, 2018 at 05:33 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_servis`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id_admin` int(5) NOT NULL,
  `nama_admin` varchar(50) DEFAULT NULL,
  `alamat` text,
  `jenis_kelamin` enum('P','L') DEFAULT NULL,
  `tempat_lahir` varchar(50) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`id_admin`, `nama_admin`, `alamat`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`) VALUES
(1, 'Rizky', 'Gotong Royong', 'P', 'Handil', '2018-12-08');

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin_account`
--

CREATE TABLE `tb_admin_account` (
  `username` varchar(50) NOT NULL,
  `password` varchar(50) DEFAULT NULL,
  `id_admin` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_elektronik`
--

CREATE TABLE `tb_elektronik` (
  `id_elektronik` int(11) NOT NULL,
  `nama_elektronik` varchar(50) NOT NULL,
  `foto` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_elektronik`
--

INSERT INTO `tb_elektronik` (`id_elektronik`, `nama_elektronik`, `foto`) VALUES
(1, 'Laptop', 'laptop.png'),
(2, 'Printer', 'printer.png'),
(3, 'Komputer', 'komputer.png');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kurir`
--

CREATE TABLE `tb_kurir` (
  `id_kurir` int(11) NOT NULL,
  `nama_kurir` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_order_finish`
--

CREATE TABLE `tb_order_finish` (
  `id_order_finish` int(11) NOT NULL,
  `id_order_servis` int(11) NOT NULL,
  `id_teknisi` int(11) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `biaya` int(10) DEFAULT NULL,
  `keterangan` text,
  `tanggal` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_order_servis`
--

CREATE TABLE `tb_order_servis` (
  `id_order_servis` int(11) NOT NULL,
  `id_admin` int(5) DEFAULT NULL,
  `id_user` int(5) NOT NULL,
  `id_elektronik` int(5) NOT NULL,
  `tanggal_masuk` date DEFAULT NULL,
  `tanggal_keluar` date DEFAULT NULL,
  `merk` varchar(50) DEFAULT NULL,
  `seri` varchar(50) DEFAULT NULL,
  `kelengkapan` text,
  `kerusakan` text,
  `penyebab` text,
  `catatan` text,
  `perkiraan_harga` text,
  `jemput` enum('Ya','Tidak') DEFAULT 'Tidak',
  `antar` enum('Ya','Tidak') DEFAULT 'Tidak',
  `status` varchar(20) DEFAULT 'Pending' COMMENT 'Pending, Accept ,servis, selesai, cancel'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_order_servis`
--

INSERT INTO `tb_order_servis` (`id_order_servis`, `id_admin`, `id_user`, `id_elektronik`, `tanggal_masuk`, `tanggal_keluar`, `merk`, `seri`, `kelengkapan`, `kerusakan`, `penyebab`, `catatan`, `perkiraan_harga`, `jemput`, `antar`, `status`) VALUES
(4, NULL, 1, 3, '2018-12-07', NULL, NULL, NULL, NULL, NULL, NULL, 'Catatan Tambahan', NULL, 'Ya', 'Tidak', 'Pending'),
(5, NULL, 1, 3, '2018-12-07', NULL, NULL, NULL, NULL, NULL, NULL, 'Catatan Tambahan', NULL, 'Ya', 'Tidak', 'Pending'),
(6, NULL, 1, 3, '2018-12-07', NULL, NULL, NULL, NULL, NULL, NULL, 'Catatan Tambahan', NULL, 'Tidak', 'Tidak', 'Pending'),
(7, NULL, 1, 3, '2018-12-07', NULL, NULL, NULL, NULL, NULL, NULL, 'Catatan Tambahan', NULL, 'Tidak', 'Tidak', 'Pending'),
(8, NULL, 1, 3, '2018-12-07', NULL, NULL, NULL, NULL, NULL, NULL, 'Catatan Tambahan', NULL, 'Tidak', 'Tidak', 'Pending'),
(9, NULL, 1, 3, '2018-12-07', NULL, NULL, NULL, NULL, NULL, NULL, 'Catatan Tambahan', NULL, 'Tidak', 'Tidak', 'Pending'),
(10, NULL, 1, 2, '2018-12-07', NULL, 'Acer', 'V5', NULL, 'Matot', 'Kena Air', 'Catatan Tambahan', NULL, 'Tidak', 'Tidak', 'Pending'),
(11, NULL, 1, 2, '2018-12-07', NULL, 'Acer', 'V5', NULL, 'Matot', 'Kena Air', 'Catatan Tambahan', NULL, 'Tidak', 'Tidak', 'Pending'),
(12, NULL, 1, 3, '2018-12-07', NULL, 'Acer', 'V5', NULL, 'Matot', 'Kena Air', 'Catatan Tambahan', NULL, 'Tidak', 'Tidak', 'Pending'),
(13, NULL, 1, 3, '2018-12-07', NULL, 'Acer', 'V5', NULL, 'Matot', 'Kena Air', 'Catatan Tambahan', NULL, 'Tidak', 'Tidak', 'Pending'),
(14, NULL, 1, 1, '2018-12-07', NULL, 'Acer', 'V5', NULL, 'Matot', 'Kena Air', 'Catatan Tambahan', NULL, 'Tidak', 'Tidak', 'Pending'),
(15, NULL, 1, 1, '2018-12-07', NULL, 'Axioo', '80123', NULL, 'Matot', 'Kena Air', 'Catatan Tambahan', NULL, 'Ya', 'Tidak', 'Pending'),
(16, NULL, 1, 1, '2018-12-07', NULL, 'Axioo', '80123', NULL, 'Matot', 'Kena Air', 'Catatan Tambahan', NULL, 'Ya', 'Tidak', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `tb_order_servis_address`
--

CREATE TABLE `tb_order_servis_address` (
  `id` int(11) NOT NULL,
  `id_transaksi` int(11) NOT NULL,
  `id_kurir` int(11) DEFAULT NULL,
  `alamat` text,
  `no_rumah` varchar(5) DEFAULT NULL,
  `rt` varchar(5) DEFAULT NULL,
  `rw` varchar(5) DEFAULT NULL,
  `provinsi` varchar(30) DEFAULT NULL,
  `kabupaten` varchar(30) DEFAULT NULL,
  `kecamatan` varchar(30) DEFAULT NULL,
  `kelurahan` varchar(30) DEFAULT NULL,
  `kode_pos` int(11) DEFAULT NULL,
  `longtitude` varchar(50) DEFAULT NULL,
  `latitude` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_order_servis_address`
--

INSERT INTO `tb_order_servis_address` (`id`, `id_transaksi`, `id_kurir`, `alamat`, `no_rumah`, `rt`, `rw`, `provinsi`, `kabupaten`, `kecamatan`, `kelurahan`, `kode_pos`, `longtitude`, `latitude`) VALUES
(1, 16, NULL, 'Gang Hagi Rahim No.10, Air Putih, Samarinda Ulu, Kota Samarinda, Kalimantan Timur 75243, Indonesia', '83', '57', NULL, 'Kalimantan Timur', 'Kota Samarinda', 'Air Putih', 'Samarinda Ulu', 75243, '117.12204834056001', '-0.4771566981485046');

-- --------------------------------------------------------

--
-- Table structure for table `tb_teknisi`
--

CREATE TABLE `tb_teknisi` (
  `id_teknisi` int(11) NOT NULL,
  `nama_teknisi` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(5) NOT NULL,
  `nama_depan` varchar(30) DEFAULT NULL,
  `nama_belakang` varchar(50) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `jenis_kelamin` enum('P','L') DEFAULT NULL,
  `no_hp` varchar(13) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `alamat` text,
  `no_rumah` varchar(5) DEFAULT NULL,
  `rt` varchar(5) DEFAULT NULL,
  `rw` varchar(5) DEFAULT NULL,
  `provinsi` varchar(30) DEFAULT NULL,
  `kabupaten` varchar(30) DEFAULT NULL,
  `kecamatan` varchar(30) DEFAULT NULL,
  `kelurahan` varchar(30) DEFAULT NULL,
  `kode_pos` int(11) DEFAULT NULL,
  `longtitude` varchar(50) DEFAULT NULL,
  `latitude` varchar(50) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `foto` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `nama_depan`, `nama_belakang`, `tanggal_lahir`, `jenis_kelamin`, `no_hp`, `email`, `alamat`, `no_rumah`, `rt`, `rw`, `provinsi`, `kabupaten`, `kecamatan`, `kelurahan`, `kode_pos`, `longtitude`, `latitude`, `created_at`, `foto`) VALUES
(1, 'Eko', 'Pujianto', '1998-04-15', 'L', '085828949395', 'ekopujianto48@gmail.com', 'Gang Hagi Rahim No.10, Air Putih, Samarinda Ulu, Kota Samarinda, Kalimantan Timur 75243, Indonesia', '83', '57', NULL, 'Kalimantan Timur', 'Kota Samarinda', 'Air Putih', 'Samarinda Ulu', 75243, '117.12204834056001', '-0.4771566981485046', '2018-12-07 02:08:20', '1544162210.jpg'),
(2, 'Hendra', 'Darmawan', '2018-12-04', 'L', '085828949395', 'ekopujianto48@gmail.com', 'Jl. Graha Indah No.75, Air Putih, Samarinda Ulu, Kota Samarinda, Kalimantan Timur 75243, Indonesia', '83', '57', NULL, 'Kalimantan Timur', 'Kota Samarinda', 'Air Putih', 'Samarinda Ulu', 75243, '117.12233335161181', '-0.47716523333566346', '2018-12-06 06:34:33', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_user_account`
--

CREATE TABLE `tb_user_account` (
  `username` varchar(50) DEFAULT NULL,
  `password` text,
  `id_user` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user_account`
--

INSERT INTO `tb_user_account` (`username`, `password`, `id_user`) VALUES
('akishino', 'iineko', 1),
('hendra', '123', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `tb_admin_account`
--
ALTER TABLE `tb_admin_account`
  ADD PRIMARY KEY (`username`),
  ADD KEY `FK_tb_admin_account_tb_admin` (`id_admin`);

--
-- Indexes for table `tb_elektronik`
--
ALTER TABLE `tb_elektronik`
  ADD PRIMARY KEY (`id_elektronik`);

--
-- Indexes for table `tb_kurir`
--
ALTER TABLE `tb_kurir`
  ADD PRIMARY KEY (`id_kurir`);

--
-- Indexes for table `tb_order_finish`
--
ALTER TABLE `tb_order_finish`
  ADD PRIMARY KEY (`id_order_finish`),
  ADD KEY `FK_tb_order_finish_tb_order_servis` (`id_order_servis`),
  ADD KEY `FK_tb_order_finish_tb_teknisi` (`id_teknisi`),
  ADD KEY `FK_tb_order_finish_tb_admin` (`id_admin`);

--
-- Indexes for table `tb_order_servis`
--
ALTER TABLE `tb_order_servis`
  ADD PRIMARY KEY (`id_order_servis`),
  ADD KEY `FK_tb_transaksi_tb_user` (`id_user`),
  ADD KEY `FK_tb_transaksi_tb_elektronik` (`id_elektronik`),
  ADD KEY `FK_tb_order_servis_tb_admin` (`id_admin`);

--
-- Indexes for table `tb_order_servis_address`
--
ALTER TABLE `tb_order_servis_address`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_tb_order_servis_address_tb_order_servis` (`id_transaksi`),
  ADD KEY `FK_tb_order_servis_address_tb_kurir` (`id_kurir`);

--
-- Indexes for table `tb_teknisi`
--
ALTER TABLE `tb_teknisi`
  ADD PRIMARY KEY (`id_teknisi`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `tb_user_account`
--
ALTER TABLE `tb_user_account`
  ADD KEY `FK_tb_user_account_tb_user` (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id_admin` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_elektronik`
--
ALTER TABLE `tb_elektronik`
  MODIFY `id_elektronik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_kurir`
--
ALTER TABLE `tb_kurir`
  MODIFY `id_kurir` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_order_finish`
--
ALTER TABLE `tb_order_finish`
  MODIFY `id_order_finish` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_order_servis`
--
ALTER TABLE `tb_order_servis`
  MODIFY `id_order_servis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tb_order_servis_address`
--
ALTER TABLE `tb_order_servis_address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_teknisi`
--
ALTER TABLE `tb_teknisi`
  MODIFY `id_teknisi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_admin_account`
--
ALTER TABLE `tb_admin_account`
  ADD CONSTRAINT `FK_tb_admin_account_tb_admin` FOREIGN KEY (`id_admin`) REFERENCES `tb_admin` (`id_admin`);

--
-- Constraints for table `tb_order_finish`
--
ALTER TABLE `tb_order_finish`
  ADD CONSTRAINT `FK_tb_order_finish_tb_admin` FOREIGN KEY (`id_admin`) REFERENCES `tb_admin` (`id_admin`),
  ADD CONSTRAINT `FK_tb_order_finish_tb_order_servis` FOREIGN KEY (`id_order_servis`) REFERENCES `tb_order_servis` (`id_order_servis`),
  ADD CONSTRAINT `FK_tb_order_finish_tb_teknisi` FOREIGN KEY (`id_teknisi`) REFERENCES `tb_teknisi` (`id_teknisi`);

--
-- Constraints for table `tb_order_servis`
--
ALTER TABLE `tb_order_servis`
  ADD CONSTRAINT `FK_tb_order_servis_tb_admin` FOREIGN KEY (`id_admin`) REFERENCES `tb_admin` (`id_admin`),
  ADD CONSTRAINT `FK_tb_transaksi_tb_elektronik` FOREIGN KEY (`id_elektronik`) REFERENCES `tb_elektronik` (`id_elektronik`),
  ADD CONSTRAINT `FK_tb_transaksi_tb_user` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`);

--
-- Constraints for table `tb_order_servis_address`
--
ALTER TABLE `tb_order_servis_address`
  ADD CONSTRAINT `FK_tb_order_servis_address_tb_kurir` FOREIGN KEY (`id_kurir`) REFERENCES `tb_kurir` (`id_kurir`),
  ADD CONSTRAINT `FK_tb_order_servis_address_tb_order_servis` FOREIGN KEY (`id_transaksi`) REFERENCES `tb_order_servis` (`id_order_servis`);

--
-- Constraints for table `tb_user_account`
--
ALTER TABLE `tb_user_account`
  ADD CONSTRAINT `FK_tb_user_account_tb_user` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
