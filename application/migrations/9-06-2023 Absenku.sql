-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 09, 2023 at 11:12 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_absensi`
--

-- --------------------------------------------------------

--
-- Table structure for table `ayam_jago`
--

CREATE TABLE `ayam_jago` (
  `id_ayam_jago` int(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `ttl` varchar(100) NOT NULL,
  `weton` varchar(50) NOT NULL,
  `usia` int(11) NOT NULL,
  `jenis_latihan` enum('private','regular') NOT NULL,
  `foto` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ayam_jago`
--

INSERT INTO `ayam_jago` (`id_ayam_jago`, `nama`, `ttl`, `weton`, `usia`, `jenis_latihan`, `foto`) VALUES
(1, 'ayam gendeng', '22 mar 2019', 'asdfsfd', 23, 'private', 'lasdjflkjsflkjsfkl'),
(2, 'ayam pinter', 'asdfasdfd', 'asfsadf', 34, 'regular', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'Panitia', 'Panitia'),
(3, 'Operator', 'Operator');

-- --------------------------------------------------------

--
-- Table structure for table `hasil_check_ayam`
--

CREATE TABLE `hasil_check_ayam` (
  `id_check` int(20) NOT NULL,
  `id_ayam_jago` int(20) NOT NULL,
  `keterangan` enum('lulus','tidak lulus') NOT NULL,
  `alasan` longtext NOT NULL,
  `created_at` date DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kegiatan`
--

CREATE TABLE `kegiatan` (
  `id_kegiatan` int(11) NOT NULL,
  `kegiatan` varchar(240) NOT NULL,
  `lokasi` varchar(100) NOT NULL,
  `tgl` varchar(100) NOT NULL,
  `aktif` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kegiatan`
--

INSERT INTO `kegiatan` (`id_kegiatan`, `kegiatan`, `lokasi`, `tgl`, `aktif`) VALUES
(12, 'makan siang', 'malang', '2023-06-23', 1);

-- --------------------------------------------------------

--
-- Table structure for table `kehadiran`
--

CREATE TABLE `kehadiran` (
  `id_khd` int(11) NOT NULL,
  `nama_khd` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `kehadiran`
--

INSERT INTO `kehadiran` (`id_khd`, `nama_khd`) VALUES
(1, 'Hadir'),
(2, 'Sakit'),
(3, 'Ijin'),
(4, 'Alpha'),
(5, 'Lepas/Off');

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE `login_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `login_attempts`
--

INSERT INTO `login_attempts` (`id`, `ip_address`, `login`, `time`) VALUES
(23, '::1', 'admin@admin', 1686231760);

-- --------------------------------------------------------

--
-- Table structure for table `lokasi`
--

CREATE TABLE `lokasi` (
  `lokasi_id` int(20) NOT NULL,
  `tempat_id` int(20) NOT NULL,
  `kegiatan_id` int(20) NOT NULL,
  `nama_lokasi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lokasi`
--

INSERT INTO `lokasi` (`lokasi_id`, `tempat_id`, `kegiatan_id`, `nama_lokasi`) VALUES
(1, 16, 11, 'malang');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `link` varchar(50) NOT NULL,
  `icon` varchar(30) NOT NULL,
  `protected` tinyint(4) DEFAULT NULL,
  `is_active` int(1) NOT NULL,
  `is_parent` int(1) UNSIGNED NOT NULL,
  `sort` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `name`, `link`, `icon`, `protected`, `is_active`, `is_parent`, `sort`) VALUES
(1, 'DASHBOARD', 'dashboard', 'fa fa-laptop', NULL, 1, 0, 0),
(15, 'menu management', 'menu', 'fa fa-list-alt', NULL, 1, 42, 14),
(16, 'master data', 'sdf', 'fa fa-folder', NULL, 1, 0, 1),
(18, 'Data Siswa', 'siswa', 'fa fa-users', NULL, 1, 16, 2),
(19, 'data Jabatan', 'jabatan', 'fa fa-briefcase', NULL, 0, 16, 3),
(31, 'Ambil QR Code', 'GenBar', 'fa fa-qrcode', NULL, 0, 0, 6),
(33, 'Absen', 'scan', 'fa fa-search-plus', NULL, 1, 0, 7),
(34, 'check ayam jago', 'cekayamjago', 'fa fa-search-plus', NULL, 1, 0, 0),
(35, 'User management', 'users', 'fa fa-users', NULL, 1, 42, 13),
(36, 'Hasil Absensi', 'presensi', 'fa fa-list-alt', NULL, 1, 41, 9),
(41, 'Data rekap', 'data_absensi', 'fa fa-folder-open', NULL, 1, 0, 8),
(42, 'setting', 'setting', 'fa fa-gears', NULL, 1, 0, 11),
(46, 'hasil check ayam jago', 'hasilcek', 'fa fa-list-alt', NULL, 1, 41, 0),
(48, 'data penguji', 'penguji', 'fa fa-users', NULL, 1, 16, 0),
(49, 'data panitia', 'panitia', 'fa fa-users', NULL, 1, 16, 0),
(50, 'data kegiatan', 'kegiatan', 'fa fa-location-arrow', NULL, 1, 16, 5),
(52, 'data ayam jago', 'ayamjago', 'fa fa-folder-open', NULL, 1, 16, 0);

-- --------------------------------------------------------

--
-- Table structure for table `presensi_siswa`
--

CREATE TABLE `presensi_siswa` (
  `id_absen` int(11) NOT NULL,
  `nis` varchar(20) NOT NULL,
  `tgl` varchar(20) NOT NULL,
  `jam_msk` varchar(20) NOT NULL,
  `ket` varchar(20) NOT NULL,
  `operator` varchar(20) NOT NULL,
  `id_kegiatan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `presensi_siswa`
--

INSERT INTO `presensi_siswa` (`id_absen`, `nis`, `tgl`, `jam_msk`, `ket`, `operator`, `id_kegiatan`) VALUES
(18, '21091010002', '2023-06-04', '11:38:35', 'masuk', '26', '12');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `nis` varchar(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `ranting` varchar(50) NOT NULL,
  `rayon` varchar(50) NOT NULL,
  `agama` varchar(15) DEFAULT NULL,
  `alamat` varchar(200) DEFAULT NULL,
  `jk` varchar(50) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `pasaran` varchar(50) DEFAULT NULL,
  `tgl_lahir` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`nis`, `nama`, `ranting`, `rayon`, `agama`, `alamat`, `jk`, `tempat_lahir`, `pasaran`, `tgl_lahir`) VALUES
('21091010002', 'KEYLA HARASYA PRATISTA A.B.', 'BAKUNG', 'PLANDIREJO', 'ISLAM', 'PLANDIREJO', 'perempuan', 'BLITAR', 'test', '11 juli 2008'),
('21091010003', 'REHAN DWI RAMADANI', 'BAKUNG', 'TUMPAKKEPUH', 'ISLAM', 'TPKEPUH 01/03 KRAJAN', 'Laki - laki', 'BLITAR', '', '9/30/2007'),
('21091010004', 'DWI AGUSTINA ', 'BAKUNG', 'SIDOMULYO', 'ISLAM', 'DS SIDOMULYO RT/RW 3/2 BAKUNG', 'perempuan', 'BLITAR', '', '8/21/1988'),
('22091010002', 'ADAM HERMAWAN', 'BAKUNG', 'SUMBERDADI', 'ISLAM', 'DS. NGREJO KEC. BAKUNG KAB.BLITAR ', 'Laki - laki', 'BLITAR', '', '18 FEBRUARI 2006'),
('22091010003', 'BURHANUDIN RACHA FIRDAUS', 'BAKUNG', 'SUMBERDADI', 'ISLAM', 'DS. BAKUNG KEC. BAKUNG RT. 1 RW. 2  KAB. BLITAR ', 'Laki - laki', 'BLITAR', '', '1 MEI 2006'),
('22091010004', 'NOV YOULAN AGUNG SAPUTRA', 'BAKUNG', 'SUMBERDADI', 'ISLAM', 'RT. 2 RW. 5 DSN. KALIREJO DS. SUMBERDADI KEC. BAKUNG KAB. BLITAR', 'Laki - laki', 'BLITAR', '', '11/23/2006'),
('22091010005', 'KELVIN SETIAWAN', 'BAKUNG', 'SUMBERDADI', 'ISLAM', 'RT.2 EW. 5 DSN. KALIPUCUNG DS. PULEREJO KEC. BAKUNG KAB. BLITAR', 'Laki - laki', 'BLITAR', '', '23 OKTOBER 2000'),
('22091010006', 'PINGKAN YULIANINGSIH', 'BAKUNG', 'SUMBERDADI', 'ISLAM', 'DSN. SUMBERSARI DS. TUMPAK OYOT RT 4 RW 1 KEC. BAKUNG KAB. BLITAR', 'perempuan', 'BLITAR', '', '25 JULI 2005'),
('22091010007', 'DEO AKBARERA', 'BAKUNG', 'SUMBERDADI', 'ISLAM', 'DS. NGREJO DSN. KRAJAN RT 1 RW 1 KEC. BAKUNG KAB. BLITAR', 'Laki - laki', 'BLITAR', '', '4 AGUSTUS 2006'),
('22091010008', 'WINANTO', 'BAKUNG', 'TUMPAKKEPUH', 'ISLAM', 'DSN. KEPUH 04/03', 'Laki - laki', 'BLITAR', '', '12 JUNI 1978'),
('22091010009', 'SUWANTO', 'BAKUNG', 'TUMPAKKEPUH', 'ISLAM', 'TUMPAK KEPUH 01/03', 'Laki - laki', 'BLITAR', '', '25 JUNI 1995'),
('22091010010', 'RINA NURAINI', 'BAKUNG', 'TUMPAKKEPUH', 'ISLAM', 'DSN. KRAJAN 2/3 DS. TUMPAKKERPUH', 'perempuan', 'PRINGGASELA', '', '3/23/2007'),
('22091010011', 'TRIMO', 'BAKUNG', 'TUMPAKKEPUH', 'ISLAM', 'DSN. KEPUH 2/3 TUMPAK KEPUH', 'Laki - laki', 'BLITAR', '', '5 AGUSTUS 1983'),
('22091010012', 'SONNY CHURNIAWAN', 'BAKUNG', 'TUMPAKKEPUH', 'ISLAM', 'DSN. KRAJAN 01/01 DS. TUMPAKKEPUH', 'Laki - laki', 'BLITAR', '', '3 JANUARI 1990'),
('22091010013', 'WAGIRIN', 'BAKUNG', 'TUMPAKKEPUH', 'ISLAM', 'DSN. KRAJAN 01/03 DS. TUMPAKKEPUH', 'Laki - laki', 'BLITAR', '', '9/14/1984'),
('22091010014', 'JOKO PRIANTO', 'BAKUNG', 'TUMPAKKEPUH', 'ISLAM', 'TUMPAK KEPUH ', 'Laki - laki', 'BLITAR', '', '11/25/1991'),
('22091010015', 'ARDHA BAGUS WIDYANTO', 'BAKUNG', 'TUMPAKKEPUH', 'ISLAM', 'TUMPAK KEPUH', 'Laki - laki', 'SURABAYA', '', '2 AGUSTUS1995'),
('22091010016', 'GUNAWAN', 'BAKUNG', 'TUMPAKKEPUH', 'ISLAM', 'TUMPAK KEPUH 02/03', 'Laki - laki', 'BLITAR', '', '4/10/1980'),
('22091010017', 'DIDIK SETIAWAN ', 'BAKUNG', 'TUMPAKKEPUH', 'ISLAM', 'TUMPAK KEPUH', 'Laki - laki', 'BLITAR', '', '7 DESEMBER 1990'),
('22091010019', 'ROPIKOH', 'BAKUNG', 'TUMPAKKEPUH', 'ISLAM', 'DSN. KRAJAN 3/1 TUMPAKKEPUH BAKUNG', 'perempuan', 'BLITAR', '', '5 MEI 1985'),
('22091010020', 'SUYADI', 'BAKUNG', 'TUMPAKKEPUH', 'ISLAM', 'TUMPAK KEPUH', 'Laki - laki', 'BLITAR', '', '21 MEI 1990'),
('22091010021', 'ALDIFA REJA MUSTOFA', 'BAKUNG', 'TUMPAKKEPUH', 'ISLAM', 'DSN. WOTGALEH RT/RW 2/5 DS. TUMPAKEPUH ', 'Laki - laki', 'BLITAR', '', '12 AGUSTUS 2005'),
('22091010022', 'DIDIK HARIANTO', 'BAKUNG', 'TUMPAKKEPUH', 'ISLAM', 'DSN. KRAJAN RT/RW 2/1 DS. TUMPAKEPUH ', 'Laki - laki', 'BLITAR', '', '4 MARET 1981'),
('22091010023', 'BUDI UTOMO', 'BAKUNG', 'TUMPAKKEPUH', 'ISLAM', 'DSN. KRAJAN RT/RW 1/1 DS. TUMPAKEPUH ', 'Laki - laki', 'BLITAR', '', '1 JUNI 1988'),
('22091010024', 'DENY PRASETYO', 'BAKUNG', 'TUMPAKKEPUH', 'ISLAM', '4/1 KRAJAN DS TUMPAKKEPUH', 'Laki - laki', 'BLITAR', '', '18 JUNI 1988'),
('22091010025', 'YOYOK', 'BAKUNG', 'TUMPAKKEPUH', 'ISLAM', 'TUMPAKKEPUH 01/01 KRAJAN ', 'Laki - laki', 'BLITAR', '', '16 JUNI 1988'),
('22091010028', 'REGA AGUNG FIRMANSYAH', 'BAKUNG', 'KEDUNG BANTENG', 'ISLAM', 'KEDUNGBANTENG RT/RW 1/1', 'Laki - laki', 'BLITAR', '', '26 DESEMBER 2007'),
('22091010030', 'VIVI ARGIANTI', 'BAKUNG', 'KEDUNG BANTENG', 'ISLAM', 'KEDUNGBANTENG RT/RW 05/01', 'perempuan', 'BLITAR', '', '12/3/2007'),
('22091010032', 'SLAMET', 'BAKUNG', 'KEDUNG BANTENG', 'ISLAM', 'KEDUNGBANTENG RT/RW 02/04', 'Laki - laki', 'BLITAR', '', '4/5/1976'),
('22091010033', 'JENNO FRIZKYHANDIKA', 'BAKUNG', 'KEDUNG BANTENG', 'ISLAM', 'KEDUNGBANTENG 1/4', 'Laki - laki', 'BLITAR', '', '2 DESEMBER 2006'),
('22091010034', 'SUTRIS', 'BAKUNG', 'KEDUNG BANTENG', 'ISLAM', 'KEDUNGBANTENG 1/4', 'Laki - laki', 'BLITAR', '', '6 AGUSTUS 1969'),
('22091010037', 'KARLIN', 'BAKUNG', 'KEDUNG BANTENG', 'ISLAM', 'LOREJO DSN. KEDUNGANTI 2/5', 'Laki - laki', 'BLITAR', '', '9/19/1993'),
('22091010038', 'ANTOK', 'BAKUNG', 'KEDUNG BANTENG', 'ISLAM', 'KEDUNGBANTENG', 'Laki - laki', 'BLITAR', '', '10 JUNI 1985'),
('22091010039', 'SARNO', 'BAKUNG', 'KEDUNG BANTENG', 'ISLAM', 'KEDUNGBANTENG', 'Laki - laki', 'BLITAR', '', '25 MARET 1992'),
('22091010040', 'NICO PUTRA FAHDRIAN', 'BAKUNG', 'KEDUNG BANTENG', 'ISLAM', 'KEDUNGBANYENG 2/1', 'Laki - laki', 'BLITAR', '', '4 JUNI 2007'),
('22091010041', 'SAYHRULLOH REVA VIQI S.', 'BAKUNG', 'KEDUNG BANTENG', 'ISLAM', 'KEDUNGBANTENG 1/4', 'Laki - laki', 'BLITAR', '', '8 AGUSTUS 2007'),
('22091010042', 'DENDI EKA PRATAMA', 'BAKUNG', 'KEDUNG BANTENG', 'ISLAM', 'LOREJO 5/2', 'Laki - laki', 'BLITAR', '', '23 MARET 2003'),
('22091010043', 'M. HAIFZ AL BUKHARI', 'BAKUNG', 'KEDUNG BANTENG', 'ISLAM', 'KEDUNGBANTENG 5/3', 'Laki - laki', 'BLITAR', '', '12/9/2005'),
('22091010044', 'ARIEL HIDAYATULLAH', 'BAKUNG', 'KEDUNG BANTENG', 'ISLAM', 'KEDUNGBANTENG 1/2', 'Laki - laki', 'BLITAR', '', '13 MARET 2006'),
('22091010045', 'TEGUH WIJAYA', 'BAKUNG', 'KEDUNG BANTENG', 'ISLAM', 'KEDUNGANTENG 4/4', 'Laki - laki', 'BLITAR', '', '3 OKTOBER 2007'),
('22091010046', 'IKHSAN ABDULAH', 'BAKUNG', 'KEDUNG BANTENG', 'ISLAM', 'KEDUNGBANTENG 5/1', 'Laki - laki', 'BLITAR', '', '19 AGUSTUS 2006'),
('22091010047', 'BIMA TRI PRASTYA', 'BAKUNG', 'KEDUNG BANTENG', 'ISLAM', 'KEDUNGBANTENG 2/2', 'Laki - laki', 'JAKARTA', '', '9/12/2006'),
('22091010048', 'GITA NUR AZIZAH', 'BAKUNG', 'KEDUNG BANTENG', 'ISLAM', 'KEDUNGBANTENG 1/1', 'perempuan', 'BLITAR', '', '1 MARET 2008'),
('22091010049', 'MASHUDI MURTADOH', 'BAKUNG', 'KEDUNG BANTENG', 'ISLAM', 'LOREJO 1/2', 'Laki - laki', 'BLITAR', '', '4/3/2006'),
('22091010050', 'INDRA FERDI ANGGARA', 'BAKUNG', 'LOREJO', 'ISLAM', 'DSN KEDUNGANTI RT 03 RW 06 DESA LOREJO KECAMATAN BAKUNG', 'Laki - laki', 'BLITAR', '', '3/4/2007'),
('22091010051', 'RENDY FERDIMAN WARDANI', 'BAKUNG', 'LOREJO', 'ISLAM', 'DSN KRAJAN RT 02 RW 02 DESA LOREJO KECAMATAN BAKUNG', 'Laki - laki', 'BLITAR', '', '10/23/2007'),
('22091010052', 'ANDI KRISTIANTO', 'BAKUNG', 'LOREJO', 'ISLAM', 'DSN KEDUNGANTI RT 03 RW 06 DESA LOREJO KECAMATAN BAKUNG', 'Laki - laki', 'BLITAR', '', '4/20/1994'),
('22091010054', 'MOHAMMAD BATRIZAL NORANTO', 'BAKUNG', 'LOREJO', 'ISLAM', 'DSN NGEBRUK RT 04 RW 03 DESA LOREJO KECAMATAN BAKUNG', 'Laki - laki', 'PEKALONGAN', '', '11/20/1999'),
('22091010055', 'SULISTIYO', 'BAKUNG', 'LOREJO', 'ISLAM', 'DSN KEDUNGANTI RT 04 RW 04 DESA LOREJO KECAMATAN BAKUNG', 'Laki - laki', 'BLITAR', '', '10/6/1983'),
('22091010056', 'JOKO ADI PRASETIYO', 'BAKUNG', 'LOREJO', 'ISLAM', 'DSN KEDUNGANTI RT 03 RW 05 DESA LOREJO KECAMATAN BAKUNG', 'Laki - laki', 'BLITAR', '', '3/1/1999'),
('22091010059', 'DENI SETIAWAN', 'BAKUNG', 'LOREJO', 'ISLAM', 'DSN KEDUNGANTI RT 03 RW 06 DESA LOREJO KECAMATAN BAKUNG', 'Laki - laki', 'BLITAR', '', '4/1/1987'),
('22091010060', 'DWI SETIAWAN', 'BAKUNG', 'LOREJO', 'ISLAM', 'DSN KEDUNGANTI RT 03 RW 06 DESA LOREJO KECAMATAN BAKUNG', 'Laki - laki', 'BLITAR', '', '5/8/1998'),
('22091010061', 'SELENA OKNA VALOSA', 'BAKUNG', 'LOREJO', 'ISLAM', 'DSN KORIPAN RT 02 RW 05 DESA BENDOSARI KECAMATAN KADEMANGAN', 'perempuan', 'BLITAR', '', '10/20/1998'),
('22091010062', 'DEVI FATONI', 'BAKUNG', 'LOREJO', 'ISLAM', 'DSN KRAJAN RT 05 RW 02 DESA LOREJO KECAMATAN BAKUNG', 'Laki - laki', 'BLITAR', '', '9/5/1997'),
('22091010063', 'JOKO WAHONO', 'BAKUNG', 'LOREJO', 'ISLAM', 'DSN KEDUNGANTI RT 03 RW 06 DESA LOREJO KECAMATAN BAKUNG', 'Laki - laki', 'BLITAR', '', '11/5/1991'),
('22091010064', 'IMAM BUKHORI', 'BAKUNG', 'LOREJO', 'ISLAM', 'DSN KEDUNGANTI RT 04 RW 04 DESA LOREJO KECAMATAN BAKUNG', 'Laki - laki', 'BLITAR', '', '5/19/2001'),
('22091010065', 'RAHMAD BAKTI IRVANSYAH', 'BAKUNG', 'LOREJO', 'ISLAM', 'DSN KEDUNGANTI RT 03 RW 05 DESA LOREJO KECAMATAN BAKUNG', 'Laki - laki', 'BLITAR', '', '9/27/2001'),
('22091010067', 'ADI NORANDAYANI', 'BAKUNG', 'SIDOMULYO', 'ISLAM', 'DSN. KALIMENENG RT 1 RW 10 DS. SIDOMULYO KEC. BAKUNG KAB. BLITAR', 'Laki - laki', 'BLITAR', '', '11/18/1998'),
('22091010068', 'WAWAN EKWANTO', 'BAKUNG', 'SIDOMULYO', 'ISLAM', 'DSN. KALIMENENG 1/8', 'Laki - laki', 'BLITAR', '', '11/29/1990'),
('22091010069', 'RUDI HARIANTO', 'BAKUNG', 'SIDOMULYO', 'ISLAM', 'SIDOMULYO 1/8', 'Laki - laki', 'BLITAR', '', '27 OKTOBER 1981'),
('22091010072', 'RWIN', 'BAKUNG', 'SIDOMULYO', 'ISLAM', 'KRAJAN 4/1 TUMPAKKEPUH', 'Laki - laki', 'BLITAR', '', '11/10/1982'),
('22091010073', 'DODIK NUR CAHYONO', 'BAKUNG', 'SIDOMULYO', 'ISLAM', 'KALIMENENG 1/8 SIDOMULYO', 'Laki - laki', 'BLITAR', '', '11 MARET1990'),
('22091010074', 'ENGKIT BAGUS NUR P.', 'BAKUNG', 'SIDOMULYO', 'ISLAM', 'KALIMENENG 1/8 SIDOMULYO', 'Laki - laki', 'BLITAR', '', '9 AGUSTUS 1989'),
('22091010075', 'FAJAR TRI BOWO', 'BAKUNG', 'SIDOMULYO', 'ISLAM', 'DS SIDOMULYO DSN KALIBAWANG RT/RW 2/7', 'Laki - laki', 'BLITAR', '', '5 JUNI 2004'),
('22091010076', 'JEPRI PRATAMA', 'BAKUNG', 'SIDOMULYO', 'ISLAM', 'DS SIDOMULYO DSN KALIBAWANG RT/RW 2/6', 'Laki - laki', 'BLITAR', '', '5 JANUARI 1998'),
('22091010077', 'ARDI SETIAWAN', 'BAKUNG', 'SIDOMULYO', 'ISLAM ', 'DS SIDOMULYO DSN KALIBAWANG RT/RW 3/6', 'Laki - laki', 'BLITAR', '', '11/2/1998'),
('22091010079', 'RAHMAT HARDIAN PRATAMA', 'BAKUNG', 'SIDOMULYO', 'ISLAM', 'DS SIDOMULYO DSN KALIBAWANG RT/RW 4/6', 'Laki - laki', 'BLITAR', '', '6 JANUARI 2006'),
('22091010080', 'SAYUDA NOVAL PRTAMA ', 'BAKUNG', 'SIDOMULYO', 'ISLAM', 'DS SIDOMULYO', 'Laki - laki', 'BLITAR', '', '11/16/2006'),
('22091010081', 'ANDIKA EFENDI SANTOSO ', 'BAKUNG', 'SIDOMULYO', 'ISLAM', 'DS SIDOMULYO DSN KALIMENENG RT/RW 1/10', 'Laki - laki', 'BLITAR', '', '6 AGUSTUS 2005'),
('22091010082', 'PRABOWO HARI MUKTI', 'BAKUNG', 'SIDOMULYO', 'ISLAM', 'DS SIDOMULYO DSN KALIMENENG RT/RW 2/8', 'Laki - laki', 'BLITAR', '', '5 AGUSTUS 2004'),
('22091010083', 'FAJAR SETYO PRATAMA', 'BAKUNG', 'SIDOMULYO', 'ISLAM', 'DS SIDOMULYO DSN KALIBAWANG RT/RW 2/5', 'Laki - laki', 'BLITAR', '', '11/19/2006'),
('22091010084', 'ADI CAHYONO', 'BAKUNG', 'SIDOMULYO', 'ISLAM', 'DS SIDOMULYO DSN KALIMENENG RT/RW 3/8', 'Laki - laki', 'BLITAR', '', '16 FEBRUARI 2006'),
('22091010085', 'ANA USWATUN HASANAH', 'BAKUNG', 'SIDOMULYO', 'ISLAM', 'DS SIDOMULYO DSN KALIMENENG RT/RW 2/8', 'perempuan', 'BLITAR', '', '12 JUNI 1988'),
('22091010086', 'NUR DJASADI', 'BAKUNG', 'SIDOMULYO', 'ISLAM', 'DS SIDOMULO DSN KALIMENENG RT/RW 3/9', 'Laki - laki', 'BLITAR', '', '22 OKTOBER 1997'),
('22091010089', 'SUGITO', 'BAKUNG', 'SIDOMULYO', 'ISLAM', 'SIDOMULYO KALIMENENG RT/RW 1/6', 'Laki - laki', 'BLITAR', '', '31 DESEMBER 1982'),
('22091010090', 'MUCHAMAD ANGGI PRASETYA', 'BAKUNG', 'SIDOMULYO', 'ISLAM', ' DSN KALIBAWANG DS SIDOMULYO RT/RW 2/6 BAKUNG', 'Laki - laki', 'BLITAR', '', '26 OKTOBER 2004'),
('22091010098', 'JONATAN ADRIS SETIANO', 'BAKUNG', 'TUMPAKKEPUH', 'ISLAM', 'TUMPAKKEPUH', 'Laki - laki', 'BLITAR', '', '9/9/2007'),
('22091020001', 'NASWA RAFINA LAURA ANANTA', 'BINANGUN', 'SALAMREJO', 'ISLAM', 'Dsn. Kedungbulus RT 024 RW 006 Ds. Sumberkembar Kec. Binangun Kab. Blitar', 'perempuan', 'BLITAR', '', '6/11/2005'),
('22091020003', 'MUHAMMAD DWI RAMADHANI', 'BINANGUN', 'SALAMREJO', 'ISLAM', 'Dsn. Rampalombo RT 001 RW 005 Ds. Margomulyo Kec. Panggungrejo Kab. Blitar', 'Laki - laki', 'BLITAR', '', '8/25/2007'),
('22091020004', 'SUWOKO', 'BINANGUN', 'SALAMREJO', 'ISLAM', 'Dsn. Sambigede RT 002 RW 005 Ds. Sambigede Kec. Binangun Kab. Blitar', 'Laki - laki', 'BLITAR', '', '11/2/1994'),
('22091020005', 'SATRIA BAGUS WIRA ARJUNA', 'BINANGUN', 'SALAMREJO', 'ISLAM', 'Dsn. Kedungrejo RT 003 RW 001 Ds. Salamrejo Kec. Binangun Kab. Blitar', 'Laki - laki', 'BLITAR', '', '3/21/2007'),
('22091020008', 'SANDI KAESA NUGROHO', 'BINANGUN', 'SALAMREJO', 'ISLAM', 'Dsn. Salamrejo RT 004 RW 002 Ds. Salamrejo Kec. Binangun Kab. Blitar', 'Laki - laki', 'BLITAR', '', '7/26/2006'),
('22091020009', 'DESI WULANSARI', 'BINANGUN', 'BINANGUN', 'ISLAM', 'Dsn. Selok RT 004 RW 001 Ds. Binangun Kec. Binangun Kab. Blitar', 'perempuan', 'BLITAR', '', '12/5/2007'),
('22091020010', 'LILIK ANDANI', 'BINANGUN', 'BINANGUN', 'ISLAM', 'Munjung RT 011 RW 003 Ds. Pandansari Kec. Ngantang Kab. Malang', 'perempuan', 'MALANG', '', '10/29/2000'),
('22091020011', 'KHEVIN LINGGAR GALIH PRATAMA', 'BINANGUN', 'BINANGUN', 'ISLAM', 'Dsn. Selok RT 001 RW 001 Ds. Binangun Kec. Binangun Kab. Blitar', 'Laki - laki', 'BLITAR', '', '3/30/2007'),
('22091020012', 'REIHAN FIRMANSYAH', 'BINANGUN', 'BINANGUN', 'ISLAM', 'Dsn. Selok RT 004 RW 001 Ds. Binangun Kec. Binangun Kab. Blitar', 'Laki - laki', 'BLITAR', '', '3/25/2006'),
('22091020013', 'SIKMA', 'BINANGUN', 'BINANGUN', 'ISLAM', 'Dsn. Wonorejo RT 002 RW 003 Ds. Resapombo Kec. Doko Kab. Blitar', 'perempuan', 'BLITAR', '', '4/7/2007'),
('22091020018', 'ELLEN DIAN PRATAMA', 'BINANGUN', 'SUMBERKEMBAR', 'ISLAM', 'Dsn. Blumbang RT 001 RW 004 Ds. Ngembul Kec. Binangun Kab. Blitar', 'Laki - laki', 'BLITAR', '', '12/17/2007'),
('22091020021', 'RYAN YULINO PRATAMA', 'BINANGUN', 'SUMBERKEMBAR', 'ISLAM', 'Dsn. Kalisudo RT 013 RW 004 Ds. Sumberkembar Kec. Binangun Kab. Blitar', 'Laki - laki', 'BLITAR', '', '6/1/2006'),
('22091020026', 'MUHAMMAD IGO ILHAM', 'BINANGUN', 'SUMBERKEMBAR', 'ISLAM', 'Dsn. Binangun RT 002 RW 003 Ds. Binangun Kec. Binangun Kab. Blitar', 'Laki - laki', 'BLITAR', '', '7/19/2001'),
('22091020028', 'JOHAN DWI KUNCORO', 'BINANGUN', 'SUMBERKEMBAR', 'ISLAM', 'Dsn. Balerejo RT 002 RW 004 Ds. Balerejo Kec. Panggungrejo Kab. Blitar', 'Laki - laki', 'BLITAR', '', '11/22/2003'),
('22091030006', 'FRITZY WINIRA JHEAVRINCA', 'DOKO', 'SMKN 1 DOKO', 'Katolik', 'Dsn. Tlogoarum Rt03 Rw06 Ds.Sidorejo Kec.Doko Kab.Blitar', 'perempuan', 'BLITAR', '', '9/16/2005'),
('22091030009', 'LOUIS MASAID PRASETYO', 'DOKO', 'SMKN 1 DOKO', 'Katolik', 'Dsn. Purworejo Rt02 Rw01 Ds.Resapombo Kec.Doko Kab.Blitar ', 'Laki - laki', 'BLITAR', '', '3/7/2007'),
('22091030022', 'DWI RAHMAT FAUZY', 'DOKO', 'SMPN 1 DOKO', 'Islam', 'Dsn. Resapombo Rt01 Rw05 Ds.Resapombo Kec.Doko Kab.Blitar ', 'Laki - laki', 'BLITAR', '', '7/9/2007');

-- --------------------------------------------------------

--
-- Table structure for table `stts`
--

CREATE TABLE `stts` (
  `id_status` int(11) NOT NULL,
  `nama_status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `stts`
--

INSERT INTO `stts` (`id_status`, `nama_status`) VALUES
(1, 'Masuk'),
(2, 'Pulang'),
(3, 'tidak hadir');

-- --------------------------------------------------------

--
-- Table structure for table `tempat`
--

CREATE TABLE `tempat` (
  `tempat_id` int(11) NOT NULL,
  `nama_tempat` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tempat`
--

INSERT INTO `tempat` (`tempat_id`, `nama_tempat`, `alamat`) VALUES
(16, 'MALANG', 'malang raya'),
(17, 'BLITAR', 'jalan');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(254) NOT NULL,
  `activation_selector` varchar(255) DEFAULT NULL,
  `activation_code` varchar(255) DEFAULT NULL,
  `forgotten_password_selector` varchar(255) DEFAULT NULL,
  `forgotten_password_code` varchar(255) DEFAULT NULL,
  `forgotten_password_time` int(11) UNSIGNED DEFAULT NULL,
  `remember_selector` varchar(255) DEFAULT NULL,
  `remember_code` varchar(255) DEFAULT NULL,
  `created_on` int(11) UNSIGNED NOT NULL,
  `last_login` int(11) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `email`, `activation_selector`, `activation_code`, `forgotten_password_selector`, `forgotten_password_code`, `forgotten_password_time`, `remember_selector`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`) VALUES
(26, '::1', 'admin@admin.com', '$2y$12$MPcQlOck9fzd/5UjJ6iIXuhZivhkXdfoVD2xFXpZTnZ2IWQw/nFhW', 'admin@admin.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1556798313, 1686293123, 1, 'admin', 'nistator', NULL, '123412341234'),
(49, '::1', 'panitia@gmail.com', '$2y$10$o5qAHMLSq8q0qszO424HGeM3xQ55oPbIwCee4VPLWIb2WrAi5wenK', 'panitia@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1685852019, 1685973757, 1, 'panitia', 'checker', 'Nama Perusahaan', '085775988147');

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

CREATE TABLE `users_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(29, 26, 1),
(52, 49, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ayam_jago`
--
ALTER TABLE `ayam_jago`
  ADD PRIMARY KEY (`id_ayam_jago`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hasil_check_ayam`
--
ALTER TABLE `hasil_check_ayam`
  ADD PRIMARY KEY (`id_check`);

--
-- Indexes for table `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD PRIMARY KEY (`id_kegiatan`);

--
-- Indexes for table `kehadiran`
--
ALTER TABLE `kehadiran`
  ADD PRIMARY KEY (`id_khd`);

--
-- Indexes for table `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lokasi`
--
ALTER TABLE `lokasi`
  ADD PRIMARY KEY (`lokasi_id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `presensi_siswa`
--
ALTER TABLE `presensi_siswa`
  ADD PRIMARY KEY (`id_absen`),
  ADD KEY `is` (`nis`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`nis`);

--
-- Indexes for table `stts`
--
ALTER TABLE `stts`
  ADD PRIMARY KEY (`id_status`);

--
-- Indexes for table `tempat`
--
ALTER TABLE `tempat`
  ADD PRIMARY KEY (`tempat_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_email` (`email`),
  ADD UNIQUE KEY `uc_activation_selector` (`activation_selector`),
  ADD UNIQUE KEY `uc_forgotten_password_selector` (`forgotten_password_selector`),
  ADD UNIQUE KEY `uc_remember_selector` (`remember_selector`);

--
-- Indexes for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  ADD KEY `fk_users_groups_users1_idx` (`user_id`),
  ADD KEY `fk_users_groups_groups1_idx` (`group_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ayam_jago`
--
ALTER TABLE `ayam_jago`
  MODIFY `id_ayam_jago` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `hasil_check_ayam`
--
ALTER TABLE `hasil_check_ayam`
  MODIFY `id_check` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `kegiatan`
--
ALTER TABLE `kegiatan`
  MODIFY `id_kegiatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `kehadiran`
--
ALTER TABLE `kehadiran`
  MODIFY `id_khd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `lokasi`
--
ALTER TABLE `lokasi`
  MODIFY `lokasi_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `presensi_siswa`
--
ALTER TABLE `presensi_siswa`
  MODIFY `id_absen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `stts`
--
ALTER TABLE `stts`
  MODIFY `id_status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tempat`
--
ALTER TABLE `tempat`
  MODIFY `tempat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `presensi_siswa`
--
ALTER TABLE `presensi_siswa`
  ADD CONSTRAINT `is` FOREIGN KEY (`nis`) REFERENCES `siswa` (`nis`);

--
-- Constraints for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
