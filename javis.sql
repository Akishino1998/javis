-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 10, 2019 at 07:51 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `javis`
--

-- --------------------------------------------------------

--
-- Table structure for table `ref_detail_merk`
--

CREATE TABLE `ref_detail_merk` (
  `id_detail_merk` int(10) NOT NULL,
  `id_merk` int(10) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ref_detail_merk`
--

INSERT INTO `ref_detail_merk` (`id_detail_merk`, `id_merk`, `type`) VALUES
(1, 2, 'Redmi 3s'),
(2, 7, 'A442U'),
(3, 2, 'Redmi 3'),
(4, 2, 'Redmi 5'),
(5, 2, 'Redmi 5a');

-- --------------------------------------------------------

--
-- Table structure for table `ref_distributor`
--

CREATE TABLE `ref_distributor` (
  `id_distributor` int(10) NOT NULL,
  `nama_distributor` varchar(50) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `nama_member` varchar(50) DEFAULT NULL,
  `no_hp_terdaftar` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ref_distributor`
--

INSERT INTO `ref_distributor` (`id_distributor`, `nama_distributor`, `alamat`, `nama_member`, `no_hp_terdaftar`) VALUES
(1, 'Istana HP', NULL, 'Nyervisga', '085828949395'),
(2, 'MD Cell', NULL, 'ITC ', NULL),
(3, 'ITC Samarinda', NULL, 'Nyervisga', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ref_elektronik`
--

CREATE TABLE `ref_elektronik` (
  `id_ref_elektronik` int(10) NOT NULL,
  `jenis_elektronik` varchar(50) DEFAULT NULL,
  `gambar` varchar(50) DEFAULT NULL,
  `ready` enum('Y','N') DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ref_elektronik`
--

INSERT INTO `ref_elektronik` (`id_ref_elektronik`, `jenis_elektronik`, `gambar`, `ready`) VALUES
(1, 'HP', 'hp.png', 'Y'),
(2, 'Laptop', 'laptop.png', 'Y'),
(3, 'Printer', 'printer.png', 'N'),
(4, 'iPad', 'ipad.png', 'Y'),
(5, 'Komputer', 'komputer.png', 'N'),
(6, 'Monitor', 'monitor.png', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `ref_harga_servis`
--

CREATE TABLE `ref_harga_servis` (
  `id_ref_harga` int(10) NOT NULL,
  `id_detail_merk` int(10) DEFAULT NULL,
  `id_ref_kerusakan` int(10) DEFAULT NULL,
  `harga_sparepart` int(10) DEFAULT NULL,
  `id_distributor` int(10) DEFAULT NULL,
  `total_harga` int(10) DEFAULT NULL,
  `garansi_hari` int(10) DEFAULT NULL,
  `lama_perbaikan_hari` float DEFAULT 1,
  `foto` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ref_harga_servis`
--

INSERT INTO `ref_harga_servis` (`id_ref_harga`, `id_detail_merk`, `id_ref_kerusakan`, `harga_sparepart`, `id_distributor`, `total_harga`, `garansi_hari`, `lama_perbaikan_hari`, `foto`) VALUES
(1, 1, 5, 130000, 2, 350000, 30, 0.25, NULL),
(2, 1, 3, 85000, 1, 150000, 7, 0.25, NULL),
(3, 1, 4, 15000, 1, 100000, 30, 0.25, NULL),
(4, 3, 1, 130000, 1, 350000, 30, 0.25, NULL),
(5, 4, 3, 75000, 1, 150000, 7, 0.25, NULL),
(6, 2, 1, 625000, 3, 900000, 7, 0.25, NULL);

-- --------------------------------------------------------

--
-- Stand-in structure for view `ref_harga_servis_hp`
-- (See below for the actual view)
--
CREATE TABLE `ref_harga_servis_hp` (
`id_ref_elektronik` int(10)
,`id_merk` int(10)
,`id_detail_merk` int(10)
,`jenis_elektronik` varchar(50)
,`nama_merk` varchar(50)
,`type` varchar(50)
,`jenis_kerusakan` varchar(50)
,`harga_sparepart` int(10)
,`nama_distributor` varchar(50)
,`total_harga` int(10)
,`garansi_hari` int(10)
,`lama_perbaikan_hari` float
,`foto` varchar(50)
);

-- --------------------------------------------------------

--
-- Table structure for table `ref_harga_sparepart_laptop`
--

CREATE TABLE `ref_harga_sparepart_laptop` (
  `id_harga_part_laptop` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ref_kerusakan`
--

CREATE TABLE `ref_kerusakan` (
  `id_ref_kerusakan` int(10) NOT NULL,
  `jenis_kerusakan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ref_kerusakan`
--

INSERT INTO `ref_kerusakan` (`id_ref_kerusakan`, `jenis_kerusakan`) VALUES
(1, 'LCD'),
(2, 'Touch Screen'),
(3, 'Baterai'),
(4, 'Konektor Charger'),
(5, 'LCD + Touch Screen'),
(6, 'Mati Total'),
(7, 'Tidak Tau');

-- --------------------------------------------------------

--
-- Table structure for table `ref_merk`
--

CREATE TABLE `ref_merk` (
  `id_merk` int(10) NOT NULL,
  `id_ref_elektronik` int(10) DEFAULT NULL,
  `nama_merk` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ref_merk`
--

INSERT INTO `ref_merk` (`id_merk`, `id_ref_elektronik`, `nama_merk`) VALUES
(1, 1, 'Tidak Tau'),
(2, 1, 'Xiaomi'),
(3, 2, 'Tidak Tau'),
(4, 1, 'Acer'),
(5, 2, 'Acer'),
(6, 1, 'Asus'),
(7, 2, 'Asus');

-- --------------------------------------------------------

--
-- Table structure for table `tb_alamat_antar`
--

CREATE TABLE `tb_alamat_antar` (
  `id_antar` int(10) NOT NULL,
  `id_servis_masuk` int(10) NOT NULL,
  `kelurahan` varchar(50) DEFAULT NULL,
  `kecamatan` varchar(50) DEFAULT NULL,
  `kota` varchar(50) DEFAULT NULL,
  `provinsi` varchar(50) DEFAULT NULL,
  `kode_pos` varchar(5) DEFAULT NULL,
  `detail_alamat` text DEFAULT NULL,
  `patokan_rumah` text DEFAULT NULL,
  `lat` varchar(50) DEFAULT NULL,
  `long` varchar(50) DEFAULT NULL,
  `keterangan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_alamat_jemput`
--

CREATE TABLE `tb_alamat_jemput` (
  `id_jemput` int(10) NOT NULL,
  `id_servis_masuk` int(10) NOT NULL,
  `kelurahan` varchar(50) DEFAULT NULL,
  `kecamatan` varchar(50) DEFAULT NULL,
  `kota` varchar(50) DEFAULT NULL,
  `provinsi` varchar(50) DEFAULT NULL,
  `kode_pos` varchar(5) DEFAULT NULL,
  `detail_alamat` text DEFAULT NULL,
  `patokan_rumah` text DEFAULT NULL,
  `lat` varchar(50) DEFAULT NULL,
  `long` varchar(50) DEFAULT NULL,
  `keterangan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_anggota`
--

CREATE TABLE `tb_anggota` (
  `id_anggota` int(10) NOT NULL,
  `nama_anggota` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_anggota`
--

INSERT INTO `tb_anggota` (`id_anggota`, `nama_anggota`) VALUES
(1, 'Eko');

-- --------------------------------------------------------

--
-- Table structure for table `tb_partner`
--

CREATE TABLE `tb_partner` (
  `id_partner` int(10) NOT NULL,
  `nama_partner` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_partner`
--

INSERT INTO `tb_partner` (`id_partner`, `nama_partner`) VALUES
(1, 'JAVIS'),
(2, 'Nyervisga');

-- --------------------------------------------------------

--
-- Table structure for table `tb_servis_cancel`
--

CREATE TABLE `tb_servis_cancel` (
  `id_servis_cancel` int(10) NOT NULL,
  `id_servis_masuk` int(10) DEFAULT NULL,
  `saran_permintaan` text DEFAULT NULL,
  `keterangan_cancel` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_servis_detail_progress`
--

CREATE TABLE `tb_servis_detail_progress` (
  `id_detail_progress` int(10) NOT NULL,
  `id_progress` int(11) NOT NULL,
  `tgl_detail_progress` datetime NOT NULL,
  `keterangan_tindakan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_servis_masuk`
--

CREATE TABLE `tb_servis_masuk` (
  `id_servis_masuk` int(10) NOT NULL,
  `id_user_elektronik` int(10) DEFAULT NULL,
  `id_ref_kerusakan` int(11) DEFAULT NULL,
  `kelengkapan` text DEFAULT NULL COMMENT 'diisi oleh anggota',
  `penyebab_rusak` text DEFAULT NULL,
  `tgl_masuk` datetime DEFAULT NULL,
  `tgl_diubah` datetime DEFAULT NULL,
  `antar` enum('Y','N') DEFAULT 'Y',
  `jemput` enum('Y','N') DEFAULT 'Y',
  `id_anggota` int(11) DEFAULT NULL,
  `status` enum('1','2','3','4','5') DEFAULT '1' COMMENT '1=Pending, 2=Penjemputan, 3=Masuk,4=Cancel/selesai',
  `kode_unik` varchar(10) DEFAULT NULL,
  `keterangan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_servis_masuk`
--

INSERT INTO `tb_servis_masuk` (`id_servis_masuk`, `id_user_elektronik`, `id_ref_kerusakan`, `kelengkapan`, `penyebab_rusak`, `tgl_masuk`, `tgl_diubah`, `antar`, `jemput`, `id_anggota`, `status`, `kode_unik`, `keterangan`) VALUES
(1, 1, 5, 'simcard, casing', 'pecah', '2019-10-29 22:36:41', '2019-10-29 22:39:15', 'Y', 'Y', 1, '3', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_servis_masuk_foto`
--

CREATE TABLE `tb_servis_masuk_foto` (
  `id_servis_foto` int(10) NOT NULL,
  `id_servis_masuk` int(10) NOT NULL,
  `foto_1` varchar(50) DEFAULT NULL,
  `foto_2` varchar(50) DEFAULT NULL,
  `foto_3` varchar(50) DEFAULT NULL,
  `foto_4` varchar(50) DEFAULT NULL,
  `foto_5` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_servis_penjemputan`
--

CREATE TABLE `tb_servis_penjemputan` (
  `id_penjemputan` int(10) NOT NULL,
  `id_servis_masuk` int(10) DEFAULT NULL,
  `id_anggota` int(10) DEFAULT NULL,
  `waktu_jemput` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_servis_progress`
--

CREATE TABLE `tb_servis_progress` (
  `id_servis_progress` int(10) NOT NULL,
  `id_servis_masuk` int(10) DEFAULT NULL,
  `tgl_mulai` datetime DEFAULT NULL,
  `biaya` int(11) DEFAULT NULL,
  `id_anggota` int(11) DEFAULT NULL,
  `status` enum('1','2','3') DEFAULT '1' COMMENT '1=Menunggu Konfirmasi, 2=Kerjakan'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_servis_progress`
--

INSERT INTO `tb_servis_progress` (`id_servis_progress`, `id_servis_masuk`, `tgl_mulai`, `biaya`, `id_anggota`, `status`) VALUES
(1, 1, '2019-10-29 22:40:42', 350000, 1, '1');

-- --------------------------------------------------------

--
-- Table structure for table `tb_servis_selesai`
--

CREATE TABLE `tb_servis_selesai` (
  `id_servis_selesai` int(10) NOT NULL,
  `id_servis_masuk` int(10) DEFAULT NULL,
  `id_partner` int(10) DEFAULT NULL,
  `id_anggota` int(10) DEFAULT NULL,
  `garansi_hari` int(10) DEFAULT 7,
  `tgl_selesai` datetime DEFAULT NULL,
  `biaya_fix` int(10) DEFAULT NULL,
  `keterangan` int(10) DEFAULT NULL,
  `status` enum('1','2') DEFAULT '1' COMMENT '1=Belum DIambil, 2=Sudah'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_user_akun`
--

CREATE TABLE `tb_user_akun` (
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user_akun`
--

INSERT INTO `tb_user_akun` (`username`, `password`, `created_at`, `updated_at`) VALUES
('akishino', 'nyervisga', '2019-10-29 20:27:30', '2019-10-29 20:27:31');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user_biodata`
--

CREATE TABLE `tb_user_biodata` (
  `id_user_biodata` int(10) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `no_hp` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user_biodata`
--

INSERT INTO `tb_user_biodata` (`id_user_biodata`, `username`, `nama`, `tgl_lahir`, `no_hp`, `email`) VALUES
(1, 'akishino', 'Eko Pujianto', '2019-10-29', '085828949395', 'ekopujianto48@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user_biodata_alamat`
--

CREATE TABLE `tb_user_biodata_alamat` (
  `id_ub_alamat` int(10) NOT NULL,
  `id_user_biodata` int(10) NOT NULL,
  `no_rumah` varchar(50) DEFAULT NULL,
  `rt` varchar(50) DEFAULT NULL,
  `rw` varchar(50) DEFAULT NULL,
  `kelurahan` varchar(50) DEFAULT NULL,
  `kecamatan` varchar(50) DEFAULT NULL,
  `kota` varchar(50) DEFAULT NULL,
  `provinsi` varchar(50) DEFAULT NULL,
  `kode_pos` varchar(5) DEFAULT NULL,
  `detail_alamat` text DEFAULT NULL,
  `patokan_rumah` text DEFAULT NULL,
  `lat` varchar(50) DEFAULT NULL,
  `long` varchar(50) DEFAULT NULL,
  `keterangan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user_biodata_alamat`
--

INSERT INTO `tb_user_biodata_alamat` (`id_ub_alamat`, `id_user_biodata`, `no_rumah`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kota`, `provinsi`, `kode_pos`, `detail_alamat`, `patokan_rumah`, `lat`, `long`, `keterangan`) VALUES
(1, 1, NULL, NULL, NULL, 'Air Putih', 'Samarinda Ulu', 'Kota Samarinda', 'Kalimantan Timur', '75124', 'Jln. P. Suryanata Graha Indah RT. 57 No. 83', 'Plank Nyervisga', '-0.4771566981485046', '117.12204834056001', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_user_elektronik`
--

CREATE TABLE `tb_user_elektronik` (
  `id_user_elektronik` int(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `id_ref_elektronik` int(10) DEFAULT NULL,
  `id_merk` int(10) DEFAULT NULL,
  `id_detail_merk` int(10) DEFAULT NULL,
  `warna_hp` varchar(50) DEFAULT NULL,
  `keterangan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user_elektronik`
--

INSERT INTO `tb_user_elektronik` (`id_user_elektronik`, `username`, `id_ref_elektronik`, `id_merk`, `id_detail_merk`, `warna_hp`, `keterangan`) VALUES
(1, 'akishino', 1, 1, 1, 'Gold', ''),
(2, 'akishino', 1, 1, NULL, NULL, NULL),
(3, 'akishino', 1, 1, NULL, NULL, NULL),
(4, 'akishino', 1, 2, 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure for view `ref_harga_servis_hp`
--
DROP TABLE IF EXISTS `ref_harga_servis_hp`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `ref_harga_servis_hp`  AS  select `ref_elektronik`.`id_ref_elektronik` AS `id_ref_elektronik`,`ref_merk`.`id_merk` AS `id_merk`,`ref_harga_servis`.`id_detail_merk` AS `id_detail_merk`,`ref_elektronik`.`jenis_elektronik` AS `jenis_elektronik`,`ref_merk`.`nama_merk` AS `nama_merk`,`ref_detail_merk`.`type` AS `type`,`ref_kerusakan`.`jenis_kerusakan` AS `jenis_kerusakan`,`ref_harga_servis`.`harga_sparepart` AS `harga_sparepart`,`ref_distributor`.`nama_distributor` AS `nama_distributor`,`ref_harga_servis`.`total_harga` AS `total_harga`,`ref_harga_servis`.`garansi_hari` AS `garansi_hari`,`ref_harga_servis`.`lama_perbaikan_hari` AS `lama_perbaikan_hari`,`ref_harga_servis`.`foto` AS `foto` from (((((`ref_elektronik` join `ref_merk`) join `ref_detail_merk`) join `ref_kerusakan`) join `ref_harga_servis`) join `ref_distributor`) where `ref_elektronik`.`id_ref_elektronik` = `ref_merk`.`id_ref_elektronik` and `ref_merk`.`id_merk` = `ref_detail_merk`.`id_merk` and `ref_detail_merk`.`id_detail_merk` = `ref_harga_servis`.`id_detail_merk` and `ref_kerusakan`.`id_ref_kerusakan` = `ref_harga_servis`.`id_ref_kerusakan` and `ref_harga_servis`.`id_distributor` = `ref_distributor`.`id_distributor` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ref_detail_merk`
--
ALTER TABLE `ref_detail_merk`
  ADD PRIMARY KEY (`id_detail_merk`),
  ADD KEY `FK__ref_merk` (`id_merk`);

--
-- Indexes for table `ref_distributor`
--
ALTER TABLE `ref_distributor`
  ADD PRIMARY KEY (`id_distributor`);

--
-- Indexes for table `ref_elektronik`
--
ALTER TABLE `ref_elektronik`
  ADD PRIMARY KEY (`id_ref_elektronik`);

--
-- Indexes for table `ref_harga_servis`
--
ALTER TABLE `ref_harga_servis`
  ADD PRIMARY KEY (`id_ref_harga`),
  ADD KEY `FK_ref_harga_servis_ref_detail_merk` (`id_detail_merk`),
  ADD KEY `FK_ref_harga_servis_ref_kerusakan` (`id_ref_kerusakan`),
  ADD KEY `FK_ref_harga_servis_ref_distributor` (`id_distributor`);

--
-- Indexes for table `ref_harga_sparepart_laptop`
--
ALTER TABLE `ref_harga_sparepart_laptop`
  ADD PRIMARY KEY (`id_harga_part_laptop`);

--
-- Indexes for table `ref_kerusakan`
--
ALTER TABLE `ref_kerusakan`
  ADD PRIMARY KEY (`id_ref_kerusakan`);

--
-- Indexes for table `ref_merk`
--
ALTER TABLE `ref_merk`
  ADD PRIMARY KEY (`id_merk`),
  ADD KEY `FK_ref_merk_ref_elektronik` (`id_ref_elektronik`);

--
-- Indexes for table `tb_alamat_antar`
--
ALTER TABLE `tb_alamat_antar`
  ADD PRIMARY KEY (`id_antar`),
  ADD KEY `FK_tb_alamat_antar_tb_servis_masuk` (`id_servis_masuk`);

--
-- Indexes for table `tb_alamat_jemput`
--
ALTER TABLE `tb_alamat_jemput`
  ADD PRIMARY KEY (`id_jemput`),
  ADD KEY `FK_tb_alamat_jemput_tb_servis_masuk` (`id_servis_masuk`);

--
-- Indexes for table `tb_anggota`
--
ALTER TABLE `tb_anggota`
  ADD PRIMARY KEY (`id_anggota`);

--
-- Indexes for table `tb_partner`
--
ALTER TABLE `tb_partner`
  ADD PRIMARY KEY (`id_partner`);

--
-- Indexes for table `tb_servis_cancel`
--
ALTER TABLE `tb_servis_cancel`
  ADD PRIMARY KEY (`id_servis_cancel`),
  ADD KEY `FK_tb_servis_cancel_tb_servis_masuk` (`id_servis_masuk`);

--
-- Indexes for table `tb_servis_detail_progress`
--
ALTER TABLE `tb_servis_detail_progress`
  ADD PRIMARY KEY (`id_detail_progress`),
  ADD KEY `FK_tb_servis_detail_progress_tb_servis_progress` (`id_progress`);

--
-- Indexes for table `tb_servis_masuk`
--
ALTER TABLE `tb_servis_masuk`
  ADD PRIMARY KEY (`id_servis_masuk`),
  ADD KEY `FK_tb_servis_masuk_tb_user_elektronik` (`id_user_elektronik`),
  ADD KEY `FK_tb_servis_masuk_ref_kerusakan` (`id_ref_kerusakan`),
  ADD KEY `FK_tb_servis_masuk_tb_anggota` (`id_anggota`);

--
-- Indexes for table `tb_servis_masuk_foto`
--
ALTER TABLE `tb_servis_masuk_foto`
  ADD PRIMARY KEY (`id_servis_foto`),
  ADD KEY `FK_tb_servis_masuk_foto_tb_servis_masuk` (`id_servis_masuk`);

--
-- Indexes for table `tb_servis_penjemputan`
--
ALTER TABLE `tb_servis_penjemputan`
  ADD PRIMARY KEY (`id_penjemputan`),
  ADD KEY `FK_tb_servis_penjemputan_tb_anggota` (`id_anggota`),
  ADD KEY `FK_tb_servis_penjemputan_tb_servis_masuk` (`id_servis_masuk`);

--
-- Indexes for table `tb_servis_progress`
--
ALTER TABLE `tb_servis_progress`
  ADD PRIMARY KEY (`id_servis_progress`),
  ADD KEY `FK_tb_servis_progress_tb_servis_masuk` (`id_servis_masuk`),
  ADD KEY `FK_tb_servis_progress_tb_anggota` (`id_anggota`);

--
-- Indexes for table `tb_servis_selesai`
--
ALTER TABLE `tb_servis_selesai`
  ADD PRIMARY KEY (`id_servis_selesai`),
  ADD KEY `FK_tb_servis_selesai_tb_servis_masuk` (`id_servis_masuk`),
  ADD KEY `FK_tb_servis_selesai_tb_partner` (`id_partner`),
  ADD KEY `FK_tb_servis_selesai_tb_anggota` (`id_anggota`);

--
-- Indexes for table `tb_user_akun`
--
ALTER TABLE `tb_user_akun`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `tb_user_biodata`
--
ALTER TABLE `tb_user_biodata`
  ADD PRIMARY KEY (`id_user_biodata`),
  ADD KEY `FK_tb_user_biodata_tb_user_akun` (`username`);

--
-- Indexes for table `tb_user_biodata_alamat`
--
ALTER TABLE `tb_user_biodata_alamat`
  ADD PRIMARY KEY (`id_ub_alamat`),
  ADD KEY `FK_tb_user_biodata_alamat_tb_user_biodata` (`id_user_biodata`);

--
-- Indexes for table `tb_user_elektronik`
--
ALTER TABLE `tb_user_elektronik`
  ADD PRIMARY KEY (`id_user_elektronik`),
  ADD KEY `FK_tb_user_elektronik_ref_elektronik` (`id_ref_elektronik`),
  ADD KEY `FK_tb_user_elektronik_ref_merk` (`id_merk`),
  ADD KEY `FK_tb_user_elektronik_ref_detail_merk` (`id_detail_merk`),
  ADD KEY `FK_tb_user_elektronik_tb_user_akun` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ref_detail_merk`
--
ALTER TABLE `ref_detail_merk`
  MODIFY `id_detail_merk` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1000;

--
-- AUTO_INCREMENT for table `ref_distributor`
--
ALTER TABLE `ref_distributor`
  MODIFY `id_distributor` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ref_elektronik`
--
ALTER TABLE `ref_elektronik`
  MODIFY `id_ref_elektronik` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `ref_harga_servis`
--
ALTER TABLE `ref_harga_servis`
  MODIFY `id_ref_harga` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `ref_harga_sparepart_laptop`
--
ALTER TABLE `ref_harga_sparepart_laptop`
  MODIFY `id_harga_part_laptop` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ref_kerusakan`
--
ALTER TABLE `ref_kerusakan`
  MODIFY `id_ref_kerusakan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `ref_merk`
--
ALTER TABLE `ref_merk`
  MODIFY `id_merk` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_alamat_antar`
--
ALTER TABLE `tb_alamat_antar`
  MODIFY `id_antar` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_alamat_jemput`
--
ALTER TABLE `tb_alamat_jemput`
  MODIFY `id_jemput` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_anggota`
--
ALTER TABLE `tb_anggota`
  MODIFY `id_anggota` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_partner`
--
ALTER TABLE `tb_partner`
  MODIFY `id_partner` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_servis_cancel`
--
ALTER TABLE `tb_servis_cancel`
  MODIFY `id_servis_cancel` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_servis_detail_progress`
--
ALTER TABLE `tb_servis_detail_progress`
  MODIFY `id_detail_progress` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_servis_masuk`
--
ALTER TABLE `tb_servis_masuk`
  MODIFY `id_servis_masuk` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_servis_masuk_foto`
--
ALTER TABLE `tb_servis_masuk_foto`
  MODIFY `id_servis_foto` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_servis_penjemputan`
--
ALTER TABLE `tb_servis_penjemputan`
  MODIFY `id_penjemputan` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_servis_progress`
--
ALTER TABLE `tb_servis_progress`
  MODIFY `id_servis_progress` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_servis_selesai`
--
ALTER TABLE `tb_servis_selesai`
  MODIFY `id_servis_selesai` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_user_biodata`
--
ALTER TABLE `tb_user_biodata`
  MODIFY `id_user_biodata` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_user_biodata_alamat`
--
ALTER TABLE `tb_user_biodata_alamat`
  MODIFY `id_ub_alamat` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_user_elektronik`
--
ALTER TABLE `tb_user_elektronik`
  MODIFY `id_user_elektronik` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ref_detail_merk`
--
ALTER TABLE `ref_detail_merk`
  ADD CONSTRAINT `FK__ref_merk` FOREIGN KEY (`id_merk`) REFERENCES `ref_merk` (`id_merk`);

--
-- Constraints for table `ref_harga_servis`
--
ALTER TABLE `ref_harga_servis`
  ADD CONSTRAINT `FK_ref_harga_servis_ref_detail_merk` FOREIGN KEY (`id_detail_merk`) REFERENCES `ref_detail_merk` (`id_detail_merk`),
  ADD CONSTRAINT `FK_ref_harga_servis_ref_distributor` FOREIGN KEY (`id_distributor`) REFERENCES `ref_distributor` (`id_distributor`),
  ADD CONSTRAINT `FK_ref_harga_servis_ref_kerusakan` FOREIGN KEY (`id_ref_kerusakan`) REFERENCES `ref_kerusakan` (`id_ref_kerusakan`);

--
-- Constraints for table `ref_merk`
--
ALTER TABLE `ref_merk`
  ADD CONSTRAINT `FK_ref_merk_ref_elektronik` FOREIGN KEY (`id_ref_elektronik`) REFERENCES `ref_elektronik` (`id_ref_elektronik`);

--
-- Constraints for table `tb_alamat_antar`
--
ALTER TABLE `tb_alamat_antar`
  ADD CONSTRAINT `FK_tb_alamat_antar_tb_servis_masuk` FOREIGN KEY (`id_servis_masuk`) REFERENCES `tb_servis_masuk` (`id_servis_masuk`);

--
-- Constraints for table `tb_alamat_jemput`
--
ALTER TABLE `tb_alamat_jemput`
  ADD CONSTRAINT `FK_tb_alamat_jemput_tb_servis_masuk` FOREIGN KEY (`id_servis_masuk`) REFERENCES `tb_servis_masuk` (`id_servis_masuk`);

--
-- Constraints for table `tb_servis_cancel`
--
ALTER TABLE `tb_servis_cancel`
  ADD CONSTRAINT `FK_tb_servis_cancel_tb_servis_masuk` FOREIGN KEY (`id_servis_masuk`) REFERENCES `tb_servis_masuk` (`id_servis_masuk`);

--
-- Constraints for table `tb_servis_detail_progress`
--
ALTER TABLE `tb_servis_detail_progress`
  ADD CONSTRAINT `FK_tb_servis_detail_progress_tb_servis_progress` FOREIGN KEY (`id_progress`) REFERENCES `tb_servis_progress` (`id_servis_progress`);

--
-- Constraints for table `tb_servis_masuk`
--
ALTER TABLE `tb_servis_masuk`
  ADD CONSTRAINT `FK_tb_servis_masuk_ref_kerusakan` FOREIGN KEY (`id_ref_kerusakan`) REFERENCES `ref_kerusakan` (`id_ref_kerusakan`),
  ADD CONSTRAINT `FK_tb_servis_masuk_tb_anggota` FOREIGN KEY (`id_anggota`) REFERENCES `tb_anggota` (`id_anggota`),
  ADD CONSTRAINT `FK_tb_servis_masuk_tb_user_elektronik` FOREIGN KEY (`id_user_elektronik`) REFERENCES `tb_user_elektronik` (`id_user_elektronik`);

--
-- Constraints for table `tb_servis_masuk_foto`
--
ALTER TABLE `tb_servis_masuk_foto`
  ADD CONSTRAINT `FK_tb_servis_masuk_foto_tb_servis_masuk` FOREIGN KEY (`id_servis_masuk`) REFERENCES `tb_servis_masuk` (`id_servis_masuk`);

--
-- Constraints for table `tb_servis_penjemputan`
--
ALTER TABLE `tb_servis_penjemputan`
  ADD CONSTRAINT `FK_tb_servis_penjemputan_tb_anggota` FOREIGN KEY (`id_anggota`) REFERENCES `tb_anggota` (`id_anggota`),
  ADD CONSTRAINT `FK_tb_servis_penjemputan_tb_servis_masuk` FOREIGN KEY (`id_servis_masuk`) REFERENCES `tb_servis_masuk` (`id_servis_masuk`);

--
-- Constraints for table `tb_servis_progress`
--
ALTER TABLE `tb_servis_progress`
  ADD CONSTRAINT `FK_tb_servis_progress_tb_anggota` FOREIGN KEY (`id_anggota`) REFERENCES `tb_anggota` (`id_anggota`),
  ADD CONSTRAINT `FK_tb_servis_progress_tb_servis_masuk` FOREIGN KEY (`id_servis_masuk`) REFERENCES `tb_servis_masuk` (`id_servis_masuk`);

--
-- Constraints for table `tb_servis_selesai`
--
ALTER TABLE `tb_servis_selesai`
  ADD CONSTRAINT `FK_tb_servis_selesai_tb_anggota` FOREIGN KEY (`id_anggota`) REFERENCES `tb_anggota` (`id_anggota`),
  ADD CONSTRAINT `FK_tb_servis_selesai_tb_partner` FOREIGN KEY (`id_partner`) REFERENCES `tb_partner` (`id_partner`),
  ADD CONSTRAINT `FK_tb_servis_selesai_tb_servis_masuk` FOREIGN KEY (`id_servis_masuk`) REFERENCES `tb_servis_masuk` (`id_servis_masuk`);

--
-- Constraints for table `tb_user_biodata`
--
ALTER TABLE `tb_user_biodata`
  ADD CONSTRAINT `FK_tb_user_biodata_tb_user_akun` FOREIGN KEY (`username`) REFERENCES `tb_user_akun` (`username`);

--
-- Constraints for table `tb_user_biodata_alamat`
--
ALTER TABLE `tb_user_biodata_alamat`
  ADD CONSTRAINT `FK_tb_user_biodata_alamat_tb_user_biodata` FOREIGN KEY (`id_user_biodata`) REFERENCES `tb_user_biodata` (`id_user_biodata`);

--
-- Constraints for table `tb_user_elektronik`
--
ALTER TABLE `tb_user_elektronik`
  ADD CONSTRAINT `FK_tb_user_elektronik_ref_detail_merk` FOREIGN KEY (`id_detail_merk`) REFERENCES `ref_detail_merk` (`id_detail_merk`),
  ADD CONSTRAINT `FK_tb_user_elektronik_ref_elektronik` FOREIGN KEY (`id_ref_elektronik`) REFERENCES `ref_elektronik` (`id_ref_elektronik`),
  ADD CONSTRAINT `FK_tb_user_elektronik_ref_merk` FOREIGN KEY (`id_merk`) REFERENCES `ref_merk` (`id_merk`),
  ADD CONSTRAINT `FK_tb_user_elektronik_tb_user_akun` FOREIGN KEY (`username`) REFERENCES `tb_user_akun` (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
