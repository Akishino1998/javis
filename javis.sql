-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 01 Mar 2020 pada 01.58
-- Versi server: 10.4.6-MariaDB
-- Versi PHP: 7.3.8

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
-- Struktur dari tabel `ref_detail_merk`
--

CREATE TABLE `ref_detail_merk` (
  `id_detail_merk` int(10) NOT NULL,
  `id_merk` int(10) NOT NULL,
  `type` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ref_detail_merk`
--

INSERT INTO `ref_detail_merk` (`id_detail_merk`, `id_merk`, `type`) VALUES
(1, 2, 'Redmi 3s'),
(2, 7, 'A442U'),
(3, 2, 'Redmi 3'),
(4, 2, 'Redmi 5'),
(5, 2, 'Redmi 5a'),
(1001, 16, 'RNW'),
(1002, 2, 'Redmi Note 8'),
(1003, 2, 'Redmi 4x'),
(1004, 18, '5G'),
(1005, 5, '4741'),
(1006, 5, '4732'),
(1008, 7, 'A556U'),
(1009, 19, 'Macbook Pro'),
(1010, 19, 'Macbook Pro MD101');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ref_distributor`
--

CREATE TABLE `ref_distributor` (
  `id_distributor` int(10) NOT NULL,
  `nama_distributor` varchar(50) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `nama_member` varchar(50) DEFAULT NULL,
  `no_hp_terdaftar` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ref_distributor`
--

INSERT INTO `ref_distributor` (`id_distributor`, `nama_distributor`, `alamat`, `nama_member`, `no_hp_terdaftar`) VALUES
(1, 'Istana HP', NULL, 'Nyervisga', '085828949395'),
(2, 'MD Cell', NULL, 'ITC ', NULL),
(3, 'ITC Samarinda', NULL, 'Nyervisga', NULL),
(4, 'Hawaii', 'Panjaitan', NULL, NULL),
(5, 'Jupiter Cell', NULL, NULL, NULL),
(6, 'Global', NULL, NULL, NULL),
(7, 'Online Shop', NULL, NULL, NULL),
(8, 'Temen', NULL, NULL, NULL),
(9, 'JAVIS', NULL, NULL, NULL),
(10, 'Purnama', 'Pramuka', 'Eko', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `ref_elektronik`
--

CREATE TABLE `ref_elektronik` (
  `id_ref_elektronik` int(10) NOT NULL,
  `jenis_elektronik` varchar(50) DEFAULT NULL,
  `gambar` varchar(50) DEFAULT NULL,
  `ready` enum('Y','N') DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ref_elektronik`
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
-- Struktur dari tabel `ref_harga_servis`
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
  `foto` varchar(50) DEFAULT 'foto.jpg',
  `deskripsi` text DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ref_harga_servis`
--

INSERT INTO `ref_harga_servis` (`id_ref_harga`, `id_detail_merk`, `id_ref_kerusakan`, `harga_sparepart`, `id_distributor`, `total_harga`, `garansi_hari`, `lama_perbaikan_hari`, `foto`, `deskripsi`, `username`) VALUES
(1, 1, 5, 130000, 2, 350000, 30, 0.25, '1573919502.png', NULL, 'akishino'),
(2, 1, 3, 85000, 1, 15000000, 200, 0.25, '1582907081.jpg', NULL, 'akishino'),
(3, 1, 4, 15000, 1, 100000, 30, 0.25, '1573919502.png', NULL, 'akishino'),
(4, 3, 1, 130000, 1, 350000, 30, 0.25, '1573919502.png', NULL, 'akishino'),
(5, 4, 3, 75000, 1, 150000, 7, 0.25, '1573919502.png', NULL, 'akishino'),
(6, 2, 1, 625000, 3, 900000, 14, 0.25, '1582228892.png', NULL, 'akishino'),
(7, 1003, 3, 75000, 1, 150000, 7, 1, '1573919502.png', NULL, 'akishino'),
(14, 1005, 8, 100, 3, 250, 14, 1, 'lcd.jpg', NULL, 'asd'),
(16, 1006, 8, 100000, 3, 250000, 7, 1, '1575653864.jpg', NULL, 'akishino'),
(19, 3, 11, 300000, 1, 800000, 14, 14, 'lcd.jpg', NULL, 'admin');

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `ref_harga_servis_hp`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `ref_harga_servis_hp` (
`username` varchar(50)
,`nama` varchar(50)
,`id_ref_harga` int(10)
,`id_ref_kerusakan` int(10)
,`id_ref_elektronik` int(10)
,`id_merk` int(10)
,`id_detail_merk` int(10)
,`jenis_elektronik` varchar(50)
,`nama_merk` varchar(50)
,`type` varchar(50)
,`jenis_kerusakan` varchar(50)
,`harga_sparepart` int(10)
,`nama_distributor` varchar(50)
,`id_distributor` int(10)
,`total_harga` int(10)
,`garansi_hari` int(10)
,`lama_perbaikan_hari` float
,`foto` varchar(50)
,`deskripsi` text
);

-- --------------------------------------------------------

--
-- Struktur dari tabel `ref_harga_sparepart_laptop`
--

CREATE TABLE `ref_harga_sparepart_laptop` (
  `id_harga_part_laptop` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `ref_kerusakan`
--

CREATE TABLE `ref_kerusakan` (
  `id_ref_kerusakan` int(10) NOT NULL,
  `jenis_kerusakan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ref_kerusakan`
--

INSERT INTO `ref_kerusakan` (`id_ref_kerusakan`, `jenis_kerusakan`) VALUES
(1, 'LCD'),
(2, 'Touch Screen'),
(3, 'Baterai'),
(4, 'Konektor Charger'),
(5, 'LCD + Touch Screen'),
(6, 'Mati Total'),
(7, 'No Display'),
(8, 'Keyboard'),
(11, 'MATOT');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ref_merk`
--

CREATE TABLE `ref_merk` (
  `id_merk` int(10) NOT NULL,
  `id_ref_elektronik` int(10) NOT NULL,
  `nama_merk` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ref_merk`
--

INSERT INTO `ref_merk` (`id_merk`, `id_ref_elektronik`, `nama_merk`) VALUES
(1, 1, 'Tidak Tau'),
(2, 1, 'Xiaomi'),
(3, 2, 'Tidak Tau'),
(4, 1, 'Acer'),
(5, 2, 'Acer'),
(6, 1, 'Asus'),
(7, 2, 'Asus'),
(8, 3, 'Tidak Tau'),
(9, 3, 'Epson'),
(10, 1, 'Samsung'),
(11, 1, 'Lenovo'),
(12, 2, 'Toshiba'),
(13, 1, 'Coolpad'),
(14, 6, 'LG'),
(15, 5, 'GIGABYTE'),
(16, 2, 'Axioo'),
(18, 1, 'iPhone'),
(19, 2, 'Apple');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_admin`
--

CREATE TABLE `tb_admin` (
  `username` varchar(50) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `level` enum('1','2','3') DEFAULT '3'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_admin`
--

INSERT INTO `tb_admin` (`username`, `password`, `nama`, `level`) VALUES
('admin', '$2y$10$ZqGK5PFTKqRum/jM36nw7e.HvpTvFCVXgg8T8H1qELwVn9WCyW316', 'Admin', '1'),
('akishino', '$2y$10$8oUnMJfSL9Ph9awUh0T6zOPgTYmAcUFGU0xYYN0nIfzNqhGBl9BVK', 'Eko Pujianto', '1'),
('asd', '$2y$10$8oUnMJfSL9Ph9awUh0T6zOPgTYmAcUFGU0xYYN0nIfzNqhGBl9BVK', 'HEHE', '2'),
('awdawd', '$2y$10$8oUnMJfSL9Ph9awUh0T6zOPgTYmAcUFGU0xYYN0nIfzNqhGBl9BVK', 'Hahah', '3');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_alamat_antar`
--

CREATE TABLE `tb_alamat_antar` (
  `id_antar` int(10) NOT NULL,
  `id_servis_masuk` int(10) NOT NULL,
  `alamat_antar` text DEFAULT NULL,
  `lat` varchar(50) DEFAULT NULL,
  `long` varchar(50) DEFAULT NULL,
  `keterangan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_alamat_jemput`
--

CREATE TABLE `tb_alamat_jemput` (
  `id_jemput` int(10) NOT NULL,
  `id_servis_masuk` int(10) NOT NULL,
  `alamat_jemput` text DEFAULT NULL,
  `lat` varchar(50) DEFAULT NULL,
  `lng` varchar(50) DEFAULT NULL,
  `keterangan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_alamat_jemput`
--

INSERT INTO `tb_alamat_jemput` (`id_jemput`, `id_servis_masuk`, `alamat_jemput`, `lat`, `lng`, `keterangan`) VALUES
(2, 1, 'Jl. P.Suryanata No.83 RT. 57, Air Putih, Samarinda Ulu, Kota Samarinda, Kalimantan Timur 75243, Indonesia', '-0.49466455306421286', '117.11313291048134', NULL),
(3, 2, 'Jl. P.Suryanata No.83 RT. 57, Air Putih, Samarinda Ulu, Kota Samarinda, Kalimantan Timur 75243, Indonesia', '-0.49466455306421286', '117.11313291048134', NULL),
(4, 3, 'Jl. P.Suryanata No.83 RT. 57, Air Putih, Samarinda Ulu, Kota Samarinda, Kalimantan Timur 75243, Indonesia', '-0.49466455306421286', '117.11313291048134', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_anggota`
--

CREATE TABLE `tb_anggota` (
  `id_anggota` int(10) NOT NULL,
  `nama_anggota` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_anggota`
--

INSERT INTO `tb_anggota` (`id_anggota`, `nama_anggota`) VALUES
(1, 'Eko');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_partner`
--

CREATE TABLE `tb_partner` (
  `id_partner` int(10) NOT NULL,
  `nama_partner` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_partner`
--

INSERT INTO `tb_partner` (`id_partner`, `nama_partner`) VALUES
(1, 'JAVIS'),
(2, 'Nyervisga');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_servis_cancel`
--

CREATE TABLE `tb_servis_cancel` (
  `id_servis_cancel` int(10) NOT NULL,
  `id_servis_masuk` int(10) DEFAULT NULL,
  `saran_permintaan` text DEFAULT NULL,
  `keterangan_cancel` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_servis_detail_progress`
--

CREATE TABLE `tb_servis_detail_progress` (
  `id_detail_progress` int(10) NOT NULL,
  `id_progress` int(11) NOT NULL,
  `tgl_detail_progress` datetime NOT NULL,
  `keterangan_tindakan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_servis_masuk`
--

CREATE TABLE `tb_servis_masuk` (
  `id_servis_masuk` int(10) NOT NULL,
  `id_user_elektronik` int(10) DEFAULT NULL,
  `id_ref_kerusakan` int(11) DEFAULT NULL,
  `kelengkapan` text DEFAULT NULL COMMENT 'diisi oleh anggota',
  `penyebab_rusak` text DEFAULT NULL,
  `tgl_masuk` timestamp NULL DEFAULT current_timestamp(),
  `tgl_diubah` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` enum('1','2','3','4','5') DEFAULT '1' COMMENT '1=Pending, 2=Penjemputan, 3=Masuk,4=Cancel5.selesai',
  `kode_unik` varchar(10) DEFAULT NULL,
  `keterangan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_servis_masuk`
--

INSERT INTO `tb_servis_masuk` (`id_servis_masuk`, `id_user_elektronik`, `id_ref_kerusakan`, `kelengkapan`, `penyebab_rusak`, `tgl_masuk`, `tgl_diubah`, `status`, `kode_unik`, `keterangan`) VALUES
(1, 4, 11, NULL, 'masok air', '2020-02-29 22:03:34', '2020-02-29 22:03:44', '1', '#q4oxj0', NULL),
(2, 5, 3, NULL, 'gembung batreinya', '2020-02-29 22:09:49', '2020-02-29 22:09:55', '1', '#z89yo6', 'a'),
(3, 6, 8, NULL, 'enggak mau dipencet', '2020-03-01 00:41:35', '2020-03-01 00:41:44', '1', '#2nk1qm', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_servis_masuk_foto`
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
-- Struktur dari tabel `tb_servis_penjemputan`
--

CREATE TABLE `tb_servis_penjemputan` (
  `id_penjemputan` int(10) NOT NULL,
  `id_servis_masuk` int(10) DEFAULT NULL,
  `id_anggota` int(10) DEFAULT NULL,
  `waktu_jemput` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_servis_progress`
--

CREATE TABLE `tb_servis_progress` (
  `id_servis_progress` int(10) NOT NULL,
  `id_servis_masuk` int(10) DEFAULT NULL,
  `tgl_mulai` datetime DEFAULT NULL,
  `biaya` int(11) DEFAULT NULL,
  `id_anggota` int(11) DEFAULT NULL,
  `status` enum('1','2','3') DEFAULT '1' COMMENT '1=Menunggu Konfirmasi, 2=Kerjakan'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_servis_selesai`
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
-- Struktur dari tabel `tb_user_akun`
--

CREATE TABLE `tb_user_akun` (
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `complete` enum('Y','N') NOT NULL DEFAULT 'N',
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_user_akun`
--

INSERT INTO `tb_user_akun` (`username`, `password`, `complete`, `created_at`, `updated_at`) VALUES
('12312', '$2y$10$vbvT5JnhOB3UWVnqB7eyVemhQWOKeG.KSDQO.T4/tOvbi49p391ZW', 'N', '2020-01-11 17:00:42', '2020-02-14 10:03:28'),
('1234', '1234', 'N', '2020-02-14 15:20:17', '2020-02-14 15:20:17'),
('12345', '123', 'N', '2020-02-14 15:41:36', '2020-02-14 15:41:36'),
('123qwead', '$2y$10$bM4gqrK4uq6yhQkvj0D2TukRrm93HtpptmnN.pP0l4fz6mfG4zfh.', 'N', '2020-01-11 17:06:17', '2020-02-14 10:03:49'),
('admin', '$2y$10$bB1Q2249Tw.1fExH.lsJJuFSKsIMZHtXZDyTLU4LF5Q.dwW7zPiTq', 'N', '2020-02-07 07:35:23', '2020-02-14 10:03:49'),
('akishino', 'nyervisga', 'N', '2019-10-29 12:27:30', '2020-02-14 10:03:49'),
('akishino1', '$2y$10$YShH7nqK/6jdwLuWb31MNOVPdi7aocsjDFJFqT3jFtex3qxRoY.mG', 'N', '2020-02-07 07:32:26', '2020-02-14 10:03:49'),
('akishino123', 'eko', 'N', '2020-02-14 15:16:03', '2020-02-14 15:16:04'),
('alim', '$2y$10$eahCvbejJ/zYmQIDruWlc.HtAnyfL5gqletdSBWEAc3VM/jvFGx1.', 'N', '2019-11-22 07:56:13', '2020-02-14 10:03:49'),
('eko', '$2y$10$E32ZXwMUU7xjNwYy8ao/YuY2Jx28j69IqkB.XQ7V9118.ouyuxTl2', 'N', '2020-01-11 17:19:17', '2020-02-14 10:03:49'),
('ekoeko', '$2y$10$J1AyxiBatHWPaZR1YrR36uQ5NjxFbBBG11YMZfpv4f/Rz8iYczMJ6', 'Y', '2020-01-11 17:19:45', '2020-02-29 18:22:54'),
('ekoekoeko', '$2y$10$P6XUHwVQvyuMGG9UfGb1L.bHhBBFpvoeMUJwZJWZAoI.SW1Cwgxvm', 'N', '2020-02-07 07:34:38', '2020-02-14 10:03:49'),
('indah', '$2y$10$FypEv23rM1sIuG4Ylty9bOFq8gdNnUXXzVyHCPdGsYuWZKosZvtFq', 'N', '2020-01-21 20:35:06', '2020-02-14 10:03:49'),
('m.trywahyuar@gmail.com', '$2y$10$WrheRAJn1Wrx.PPe8IRkbOIWPdImM1oEf7p0eS2cImg7RRjILF9.q', 'N', '2020-02-07 07:33:35', '2020-02-14 10:03:49'),
('oke123', '$2y$10$JBXuGtxHcENNoHFRfsK6euGXAACrudvrQZ5.9s5fLJjQZFDZRejzC', 'N', '2020-02-17 13:12:44', '2020-02-17 13:12:44'),
('prisma20', '$2y$10$jiTrG5L0H4ntqJsWKB4ZTepQ/81x12k72rI5JryCA03LI9YkVcvyy', 'N', '2020-02-08 14:33:45', '2020-02-14 10:03:49'),
('qwe', '$2y$10$RgsvHojfsDFwhO5GH/IAlOJzatZNomRX8jT2Cbcx3Ehyktzw2a5MS', 'N', '2020-02-20 13:37:30', '2020-02-20 13:37:30'),
('saya2030', '$2y$10$yD7FOk5rGni7GMeIkAP1BugAdpdzLPrGWPowZSVlFxn9pBhxAyXDO', 'N', '2020-02-25 15:45:05', '2020-02-25 15:45:05');

--
-- Trigger `tb_user_akun`
--
DELIMITER $$
CREATE TRIGGER `autoFillBiodata` AFTER INSERT ON `tb_user_akun` FOR EACH ROW BEGIN
INSERT INTO tb_user_biodata
SET tb_user_biodata.username = NEW.username;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user_biodata`
--

CREATE TABLE `tb_user_biodata` (
  `id_user_biodata` int(10) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `no_hp` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `foto` text DEFAULT 'none.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_user_biodata`
--

INSERT INTO `tb_user_biodata` (`id_user_biodata`, `username`, `nama`, `tgl_lahir`, `no_hp`, `email`, `foto`) VALUES
(1, 'akishino', 'Eko Pujianto', '2019-10-29', '085828949395', 'ekopujianto48@gmail.com', 'none.jpg'),
(2, 'alim', NULL, NULL, NULL, NULL, 'none.jpg'),
(3, '12312', NULL, NULL, NULL, NULL, 'none.jpg'),
(4, '123qwead', NULL, NULL, NULL, NULL, 'none.jpg'),
(5, 'eko', NULL, NULL, NULL, NULL, 'none.jpg'),
(6, 'ekoeko', 'Eko Pujianto', '1991-02-14', '085828949395', 'ekopujianto48@gmail.com', '1581953365.png'),
(7, 'indah', 'Indah Noordiana Santy', NULL, NULL, NULL, 'none.jpg'),
(8, 'akishino1', NULL, NULL, NULL, NULL, 'none.jpg'),
(9, 'm.trywahyuar@gmail.com', NULL, NULL, NULL, NULL, 'none.jpg'),
(10, 'ekoekoeko', NULL, NULL, NULL, NULL, 'none.jpg'),
(11, 'admin', NULL, NULL, NULL, NULL, 'none.jpg'),
(12, 'prisma20', NULL, NULL, NULL, NULL, 'none.jpg'),
(17, 'akishino123', NULL, NULL, NULL, NULL, 'none.jpg'),
(18, '1234', NULL, NULL, NULL, NULL, 'none.jpg'),
(19, '12345', NULL, NULL, NULL, NULL, 'none.jpg'),
(20, NULL, 'Eko Pujianto', '2010-10-10', '085828949395', 'awdawd@gmail.com', 'none.jpg'),
(21, 'oke123', 'Oke Bro', '2003-02-12', '0888888989', 'mahakam4pesut@gmail.com', '1581945883.png'),
(22, 'qwe', 'Eko Pujianto', '1986-10-10', '085828949395', 'ekopujianto48@gmail.com', 'none.jpg'),
(23, 'saya2030', 'Saya Saja', '2000-03-20', '081350908481', 'sayasaja@gmail.com', '1582647122.jpg');

--
-- Trigger `tb_user_biodata`
--
DELIMITER $$
CREATE TRIGGER `autoFillAlamat` AFTER INSERT ON `tb_user_biodata` FOR EACH ROW BEGIN
INSERT INTO tb_user_biodata_alamat
SET tb_user_biodata_alamat.id_user_biodata = NEW.id_user_biodata;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user_biodata_alamat`
--

CREATE TABLE `tb_user_biodata_alamat` (
  `id_ub_alamat` int(10) NOT NULL,
  `id_user_biodata` int(10) NOT NULL,
  `alamat` text DEFAULT NULL,
  `lat` varchar(50) DEFAULT NULL,
  `lng` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_user_biodata_alamat`
--

INSERT INTO `tb_user_biodata_alamat` (`id_ub_alamat`, `id_user_biodata`, `alamat`, `lat`, `lng`) VALUES
(1, 1, 'Jln. P. Suryanata Graha Indah RT. 57 No. 83', '-0.4771566981485046', '117.12204834056001'),
(2, 19, NULL, NULL, NULL),
(6, 6, 'Jl. P.Suryanata No.83 RT. 57, Air Putih, Samarinda Ulu, Kota Samarinda, Kalimantan Timur 75243, Indonesia', '-0.49466455306421286', '117.11313291048134'),
(7, 20, NULL, NULL, NULL),
(8, 21, 'Jl. Antasari, Gang 17, RT. 5 No. 4', '-0.49243723991113536', '117.12713390203555'),
(9, 22, 'Jl. P.Suryanata No.83 RT. 57, Air Putih, Samarinda Ulu, Kota Samarinda, Kalimantan Timur 75243, Indonesia', '-0.48040416656063883', '117.12961963336029'),
(10, 23, 'Jalan Antasari', '-0.49223830750237707', '117.12712705135345');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user_biodata_no_hp`
--

CREATE TABLE `tb_user_biodata_no_hp` (
  `id_tlpn` int(10) NOT NULL,
  `id_user_biodata` int(10) DEFAULT 0,
  `no_hp` int(10) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user_elektronik`
--

CREATE TABLE `tb_user_elektronik` (
  `id_user_elektronik` int(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `id_detail_merk` int(10) DEFAULT NULL,
  `warna_hp` varchar(50) DEFAULT NULL,
  `keterangan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_user_elektronik`
--

INSERT INTO `tb_user_elektronik` (`id_user_elektronik`, `username`, `id_detail_merk`, `warna_hp`, `keterangan`) VALUES
(1, 'ekoeko', 3, 'Biru', 're'),
(2, 'ekoeko', 3, 'awd', 'awd'),
(3, 'ekoeko', 3, 'awd', 'awd'),
(4, 'ekoeko', 3, 'Biru', 'awdaw'),
(5, 'ekoeko', 1, 'Biru', NULL),
(6, 'ekoeko', 1006, 'Biru', 'awd');

-- --------------------------------------------------------

--
-- Struktur untuk view `ref_harga_servis_hp`
--
DROP TABLE IF EXISTS `ref_harga_servis_hp`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `ref_harga_servis_hp`  AS  select `tb_admin`.`username` AS `username`,`tb_admin`.`nama` AS `nama`,`ref_harga_servis`.`id_ref_harga` AS `id_ref_harga`,`ref_harga_servis`.`id_ref_kerusakan` AS `id_ref_kerusakan`,`ref_elektronik`.`id_ref_elektronik` AS `id_ref_elektronik`,`ref_merk`.`id_merk` AS `id_merk`,`ref_harga_servis`.`id_detail_merk` AS `id_detail_merk`,`ref_elektronik`.`jenis_elektronik` AS `jenis_elektronik`,`ref_merk`.`nama_merk` AS `nama_merk`,`ref_detail_merk`.`type` AS `type`,`ref_kerusakan`.`jenis_kerusakan` AS `jenis_kerusakan`,`ref_harga_servis`.`harga_sparepart` AS `harga_sparepart`,`ref_distributor`.`nama_distributor` AS `nama_distributor`,`ref_distributor`.`id_distributor` AS `id_distributor`,`ref_harga_servis`.`total_harga` AS `total_harga`,`ref_harga_servis`.`garansi_hari` AS `garansi_hari`,`ref_harga_servis`.`lama_perbaikan_hari` AS `lama_perbaikan_hari`,`ref_harga_servis`.`foto` AS `foto`,`ref_harga_servis`.`deskripsi` AS `deskripsi` from ((((((`ref_elektronik` join `ref_merk`) join `ref_detail_merk`) join `ref_kerusakan`) join `ref_harga_servis`) join `ref_distributor`) join `tb_admin`) where `ref_elektronik`.`id_ref_elektronik` = `ref_merk`.`id_ref_elektronik` and `ref_merk`.`id_merk` = `ref_detail_merk`.`id_merk` and `ref_detail_merk`.`id_detail_merk` = `ref_harga_servis`.`id_detail_merk` and `ref_kerusakan`.`id_ref_kerusakan` = `ref_harga_servis`.`id_ref_kerusakan` and `ref_harga_servis`.`id_distributor` = `ref_distributor`.`id_distributor` and `ref_harga_servis`.`username` = `tb_admin`.`username` ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `ref_detail_merk`
--
ALTER TABLE `ref_detail_merk`
  ADD PRIMARY KEY (`id_detail_merk`),
  ADD KEY `FK_ref_detail_merk_ref_merk` (`id_merk`);

--
-- Indeks untuk tabel `ref_distributor`
--
ALTER TABLE `ref_distributor`
  ADD PRIMARY KEY (`id_distributor`);

--
-- Indeks untuk tabel `ref_elektronik`
--
ALTER TABLE `ref_elektronik`
  ADD PRIMARY KEY (`id_ref_elektronik`);

--
-- Indeks untuk tabel `ref_harga_servis`
--
ALTER TABLE `ref_harga_servis`
  ADD PRIMARY KEY (`id_ref_harga`),
  ADD KEY `FK_ref_harga_servis_ref_detail_merk` (`id_detail_merk`),
  ADD KEY `FK_ref_harga_servis_ref_kerusakan` (`id_ref_kerusakan`),
  ADD KEY `FK_ref_harga_servis_ref_distributor` (`id_distributor`),
  ADD KEY `FK_ref_harga_servis_tb_admin` (`username`);

--
-- Indeks untuk tabel `ref_harga_sparepart_laptop`
--
ALTER TABLE `ref_harga_sparepart_laptop`
  ADD PRIMARY KEY (`id_harga_part_laptop`);

--
-- Indeks untuk tabel `ref_kerusakan`
--
ALTER TABLE `ref_kerusakan`
  ADD PRIMARY KEY (`id_ref_kerusakan`);

--
-- Indeks untuk tabel `ref_merk`
--
ALTER TABLE `ref_merk`
  ADD PRIMARY KEY (`id_merk`),
  ADD KEY `FK_ref_merk_ref_elektronik` (`id_ref_elektronik`);

--
-- Indeks untuk tabel `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`username`);

--
-- Indeks untuk tabel `tb_alamat_antar`
--
ALTER TABLE `tb_alamat_antar`
  ADD PRIMARY KEY (`id_antar`),
  ADD KEY `FK_tb_alamat_antar_tb_servis_masuk` (`id_servis_masuk`);

--
-- Indeks untuk tabel `tb_alamat_jemput`
--
ALTER TABLE `tb_alamat_jemput`
  ADD PRIMARY KEY (`id_jemput`),
  ADD KEY `FK_tb_alamat_jemput_tb_servis_masuk` (`id_servis_masuk`);

--
-- Indeks untuk tabel `tb_anggota`
--
ALTER TABLE `tb_anggota`
  ADD PRIMARY KEY (`id_anggota`);

--
-- Indeks untuk tabel `tb_partner`
--
ALTER TABLE `tb_partner`
  ADD PRIMARY KEY (`id_partner`);

--
-- Indeks untuk tabel `tb_servis_cancel`
--
ALTER TABLE `tb_servis_cancel`
  ADD PRIMARY KEY (`id_servis_cancel`),
  ADD KEY `FK_tb_servis_cancel_tb_servis_masuk` (`id_servis_masuk`);

--
-- Indeks untuk tabel `tb_servis_detail_progress`
--
ALTER TABLE `tb_servis_detail_progress`
  ADD PRIMARY KEY (`id_detail_progress`),
  ADD KEY `FK_tb_servis_detail_progress_tb_servis_progress` (`id_progress`);

--
-- Indeks untuk tabel `tb_servis_masuk`
--
ALTER TABLE `tb_servis_masuk`
  ADD PRIMARY KEY (`id_servis_masuk`),
  ADD KEY `FK_tb_servis_masuk_tb_user_elektronik` (`id_user_elektronik`),
  ADD KEY `FK_tb_servis_masuk_ref_kerusakan` (`id_ref_kerusakan`);

--
-- Indeks untuk tabel `tb_servis_masuk_foto`
--
ALTER TABLE `tb_servis_masuk_foto`
  ADD PRIMARY KEY (`id_servis_foto`),
  ADD KEY `FK_tb_servis_masuk_foto_tb_servis_masuk` (`id_servis_masuk`);

--
-- Indeks untuk tabel `tb_servis_penjemputan`
--
ALTER TABLE `tb_servis_penjemputan`
  ADD PRIMARY KEY (`id_penjemputan`),
  ADD KEY `FK_tb_servis_penjemputan_tb_anggota` (`id_anggota`),
  ADD KEY `FK_tb_servis_penjemputan_tb_servis_masuk` (`id_servis_masuk`);

--
-- Indeks untuk tabel `tb_servis_progress`
--
ALTER TABLE `tb_servis_progress`
  ADD PRIMARY KEY (`id_servis_progress`),
  ADD KEY `FK_tb_servis_progress_tb_servis_masuk` (`id_servis_masuk`),
  ADD KEY `FK_tb_servis_progress_tb_anggota` (`id_anggota`);

--
-- Indeks untuk tabel `tb_servis_selesai`
--
ALTER TABLE `tb_servis_selesai`
  ADD PRIMARY KEY (`id_servis_selesai`),
  ADD KEY `FK_tb_servis_selesai_tb_servis_masuk` (`id_servis_masuk`),
  ADD KEY `FK_tb_servis_selesai_tb_partner` (`id_partner`),
  ADD KEY `FK_tb_servis_selesai_tb_anggota` (`id_anggota`);

--
-- Indeks untuk tabel `tb_user_akun`
--
ALTER TABLE `tb_user_akun`
  ADD PRIMARY KEY (`username`);

--
-- Indeks untuk tabel `tb_user_biodata`
--
ALTER TABLE `tb_user_biodata`
  ADD PRIMARY KEY (`id_user_biodata`),
  ADD KEY `FK_tb_user_biodata_tb_user_akun` (`username`);

--
-- Indeks untuk tabel `tb_user_biodata_alamat`
--
ALTER TABLE `tb_user_biodata_alamat`
  ADD PRIMARY KEY (`id_ub_alamat`),
  ADD KEY `FK_tb_user_biodata_alamat_tb_user_biodata` (`id_user_biodata`);

--
-- Indeks untuk tabel `tb_user_biodata_no_hp`
--
ALTER TABLE `tb_user_biodata_no_hp`
  ADD PRIMARY KEY (`id_tlpn`);

--
-- Indeks untuk tabel `tb_user_elektronik`
--
ALTER TABLE `tb_user_elektronik`
  ADD PRIMARY KEY (`id_user_elektronik`),
  ADD KEY `FK_tb_user_elektronik_ref_detail_merk` (`id_detail_merk`),
  ADD KEY `FK_tb_user_elektronik_tb_user_akun` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `ref_detail_merk`
--
ALTER TABLE `ref_detail_merk`
  MODIFY `id_detail_merk` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1011;

--
-- AUTO_INCREMENT untuk tabel `ref_distributor`
--
ALTER TABLE `ref_distributor`
  MODIFY `id_distributor` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `ref_elektronik`
--
ALTER TABLE `ref_elektronik`
  MODIFY `id_ref_elektronik` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `ref_harga_servis`
--
ALTER TABLE `ref_harga_servis`
  MODIFY `id_ref_harga` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `ref_harga_sparepart_laptop`
--
ALTER TABLE `ref_harga_sparepart_laptop`
  MODIFY `id_harga_part_laptop` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `ref_kerusakan`
--
ALTER TABLE `ref_kerusakan`
  MODIFY `id_ref_kerusakan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `ref_merk`
--
ALTER TABLE `ref_merk`
  MODIFY `id_merk` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `tb_alamat_antar`
--
ALTER TABLE `tb_alamat_antar`
  MODIFY `id_antar` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_alamat_jemput`
--
ALTER TABLE `tb_alamat_jemput`
  MODIFY `id_jemput` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tb_anggota`
--
ALTER TABLE `tb_anggota`
  MODIFY `id_anggota` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_partner`
--
ALTER TABLE `tb_partner`
  MODIFY `id_partner` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_servis_cancel`
--
ALTER TABLE `tb_servis_cancel`
  MODIFY `id_servis_cancel` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_servis_detail_progress`
--
ALTER TABLE `tb_servis_detail_progress`
  MODIFY `id_detail_progress` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_servis_masuk`
--
ALTER TABLE `tb_servis_masuk`
  MODIFY `id_servis_masuk` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tb_servis_masuk_foto`
--
ALTER TABLE `tb_servis_masuk_foto`
  MODIFY `id_servis_foto` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_servis_penjemputan`
--
ALTER TABLE `tb_servis_penjemputan`
  MODIFY `id_penjemputan` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_servis_progress`
--
ALTER TABLE `tb_servis_progress`
  MODIFY `id_servis_progress` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_servis_selesai`
--
ALTER TABLE `tb_servis_selesai`
  MODIFY `id_servis_selesai` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_user_biodata`
--
ALTER TABLE `tb_user_biodata`
  MODIFY `id_user_biodata` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `tb_user_biodata_alamat`
--
ALTER TABLE `tb_user_biodata_alamat`
  MODIFY `id_ub_alamat` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `tb_user_biodata_no_hp`
--
ALTER TABLE `tb_user_biodata_no_hp`
  MODIFY `id_tlpn` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_user_elektronik`
--
ALTER TABLE `tb_user_elektronik`
  MODIFY `id_user_elektronik` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `ref_detail_merk`
--
ALTER TABLE `ref_detail_merk`
  ADD CONSTRAINT `FK_ref_detail_merk_ref_merk` FOREIGN KEY (`id_merk`) REFERENCES `ref_merk` (`id_merk`);

--
-- Ketidakleluasaan untuk tabel `ref_harga_servis`
--
ALTER TABLE `ref_harga_servis`
  ADD CONSTRAINT `FK_ref_harga_servis_ref_detail_merk` FOREIGN KEY (`id_detail_merk`) REFERENCES `ref_detail_merk` (`id_detail_merk`),
  ADD CONSTRAINT `FK_ref_harga_servis_ref_distributor` FOREIGN KEY (`id_distributor`) REFERENCES `ref_distributor` (`id_distributor`),
  ADD CONSTRAINT `FK_ref_harga_servis_ref_kerusakan` FOREIGN KEY (`id_ref_kerusakan`) REFERENCES `ref_kerusakan` (`id_ref_kerusakan`),
  ADD CONSTRAINT `FK_ref_harga_servis_tb_admin` FOREIGN KEY (`username`) REFERENCES `tb_admin` (`username`);

--
-- Ketidakleluasaan untuk tabel `ref_merk`
--
ALTER TABLE `ref_merk`
  ADD CONSTRAINT `FK_ref_merk_ref_elektronik` FOREIGN KEY (`id_ref_elektronik`) REFERENCES `ref_elektronik` (`id_ref_elektronik`);

--
-- Ketidakleluasaan untuk tabel `tb_alamat_antar`
--
ALTER TABLE `tb_alamat_antar`
  ADD CONSTRAINT `FK_tb_alamat_antar_tb_servis_masuk` FOREIGN KEY (`id_servis_masuk`) REFERENCES `tb_servis_masuk` (`id_servis_masuk`);

--
-- Ketidakleluasaan untuk tabel `tb_alamat_jemput`
--
ALTER TABLE `tb_alamat_jemput`
  ADD CONSTRAINT `FK_tb_alamat_jemput_tb_servis_masuk` FOREIGN KEY (`id_servis_masuk`) REFERENCES `tb_servis_masuk` (`id_servis_masuk`);

--
-- Ketidakleluasaan untuk tabel `tb_servis_cancel`
--
ALTER TABLE `tb_servis_cancel`
  ADD CONSTRAINT `FK_tb_servis_cancel_tb_servis_masuk` FOREIGN KEY (`id_servis_masuk`) REFERENCES `tb_servis_masuk` (`id_servis_masuk`);

--
-- Ketidakleluasaan untuk tabel `tb_servis_detail_progress`
--
ALTER TABLE `tb_servis_detail_progress`
  ADD CONSTRAINT `FK_tb_servis_detail_progress_tb_servis_progress` FOREIGN KEY (`id_progress`) REFERENCES `tb_servis_progress` (`id_servis_progress`);

--
-- Ketidakleluasaan untuk tabel `tb_servis_masuk`
--
ALTER TABLE `tb_servis_masuk`
  ADD CONSTRAINT `FK_tb_servis_masuk_ref_kerusakan` FOREIGN KEY (`id_ref_kerusakan`) REFERENCES `ref_kerusakan` (`id_ref_kerusakan`),
  ADD CONSTRAINT `FK_tb_servis_masuk_tb_user_elektronik` FOREIGN KEY (`id_user_elektronik`) REFERENCES `tb_user_elektronik` (`id_user_elektronik`);

--
-- Ketidakleluasaan untuk tabel `tb_servis_masuk_foto`
--
ALTER TABLE `tb_servis_masuk_foto`
  ADD CONSTRAINT `FK_tb_servis_masuk_foto_tb_servis_masuk` FOREIGN KEY (`id_servis_masuk`) REFERENCES `tb_servis_masuk` (`id_servis_masuk`);

--
-- Ketidakleluasaan untuk tabel `tb_servis_penjemputan`
--
ALTER TABLE `tb_servis_penjemputan`
  ADD CONSTRAINT `FK_tb_servis_penjemputan_tb_anggota` FOREIGN KEY (`id_anggota`) REFERENCES `tb_anggota` (`id_anggota`),
  ADD CONSTRAINT `FK_tb_servis_penjemputan_tb_servis_masuk` FOREIGN KEY (`id_servis_masuk`) REFERENCES `tb_servis_masuk` (`id_servis_masuk`);

--
-- Ketidakleluasaan untuk tabel `tb_servis_progress`
--
ALTER TABLE `tb_servis_progress`
  ADD CONSTRAINT `FK_tb_servis_progress_tb_anggota` FOREIGN KEY (`id_anggota`) REFERENCES `tb_anggota` (`id_anggota`),
  ADD CONSTRAINT `FK_tb_servis_progress_tb_servis_masuk` FOREIGN KEY (`id_servis_masuk`) REFERENCES `tb_servis_masuk` (`id_servis_masuk`);

--
-- Ketidakleluasaan untuk tabel `tb_servis_selesai`
--
ALTER TABLE `tb_servis_selesai`
  ADD CONSTRAINT `FK_tb_servis_selesai_tb_anggota` FOREIGN KEY (`id_anggota`) REFERENCES `tb_anggota` (`id_anggota`),
  ADD CONSTRAINT `FK_tb_servis_selesai_tb_partner` FOREIGN KEY (`id_partner`) REFERENCES `tb_partner` (`id_partner`),
  ADD CONSTRAINT `FK_tb_servis_selesai_tb_servis_masuk` FOREIGN KEY (`id_servis_masuk`) REFERENCES `tb_servis_masuk` (`id_servis_masuk`);

--
-- Ketidakleluasaan untuk tabel `tb_user_biodata`
--
ALTER TABLE `tb_user_biodata`
  ADD CONSTRAINT `FK_tb_user_biodata_tb_user_akun` FOREIGN KEY (`username`) REFERENCES `tb_user_akun` (`username`);

--
-- Ketidakleluasaan untuk tabel `tb_user_biodata_alamat`
--
ALTER TABLE `tb_user_biodata_alamat`
  ADD CONSTRAINT `FK_tb_user_biodata_alamat_tb_user_biodata` FOREIGN KEY (`id_user_biodata`) REFERENCES `tb_user_biodata` (`id_user_biodata`);

--
-- Ketidakleluasaan untuk tabel `tb_user_elektronik`
--
ALTER TABLE `tb_user_elektronik`
  ADD CONSTRAINT `FK_tb_user_elektronik_ref_detail_merk` FOREIGN KEY (`id_detail_merk`) REFERENCES `ref_detail_merk` (`id_detail_merk`),
  ADD CONSTRAINT `FK_tb_user_elektronik_tb_user_akun` FOREIGN KEY (`username`) REFERENCES `tb_user_akun` (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
