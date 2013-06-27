-- phpMyAdmin SQL Dump
-- version 4.0.0
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 27, 2013 at 09:26 AM
-- Server version: 5.5.31-0ubuntu0.13.04.1
-- PHP Version: 5.4.9-4ubuntu2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sim_pmb`
--

-- --------------------------------------------------------

--
-- Table structure for table `t_agama`
--

DROP TABLE IF EXISTS `t_agama`;
CREATE TABLE IF NOT EXISTS `t_agama` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `agama` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Truncate table before insert `t_agama`
--

TRUNCATE TABLE `t_agama`;
--
-- Dumping data for table `t_agama`
--

INSERT INTO `t_agama` (`id`, `agama`) VALUES
(1, 'Katolik'),
(3, 'Islam'),
(4, 'Protestan'),
(6, 'Budha'),
(7, 'Hindu'),
(15, 'Kepercayaan'),
(16, 'Lain-lain');

-- --------------------------------------------------------

--
-- Table structure for table `t_akun`
--

DROP TABLE IF EXISTS `t_akun`;
CREATE TABLE IF NOT EXISTS `t_akun` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_akun` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `role` enum('superadmin','admin','user') NOT NULL DEFAULT 'user',
  `status` char(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Truncate table before insert `t_akun`
--

TRUNCATE TABLE `t_akun`;
--
-- Dumping data for table `t_akun`
--

INSERT INTO `t_akun` (`id`, `nama_akun`, `email`, `password`, `created_at`, `role`, `status`) VALUES
(1, 'ngadmin', 'ngadmin@untar.ac.id', 'ac43724f16e9241d990427ab7c8f4228', '2013-04-16 17:44:32', 'admin', '1'),
(16, 'papan', 'papancuci@papan.com', 'e10adc3949ba59abbe56e057f20f883e', '2013-06-26 14:00:13', 'user', '1'),
(17, 'heri gunawan budiyanto', 'user@biasa.com', 'e10adc3949ba59abbe56e057f20f883e', '2013-06-26 14:35:33', 'user', '1');

-- --------------------------------------------------------

--
-- Table structure for table `t_banksoal`
--

DROP TABLE IF EXISTS `t_banksoal`;
CREATE TABLE IF NOT EXISTS `t_banksoal` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_prodi` int(11) NOT NULL,
  `id_pelajaran` int(11) NOT NULL,
  `isi_soal` text NOT NULL,
  `isi_pilihan_a` text NOT NULL,
  `isi_pilihan_b` text NOT NULL,
  `isi_pilihan_c` text NOT NULL,
  `isi_pilihan_d` text NOT NULL,
  `jawaban` char(1) NOT NULL,
  `no_urut` int(11) DEFAULT NULL,
  `tingkat` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Truncate table before insert `t_banksoal`
--

TRUNCATE TABLE `t_banksoal`;
--
-- Dumping data for table `t_banksoal`
--

INSERT INTO `t_banksoal` (`id`, `id_prodi`, `id_pelajaran`, `isi_soal`, `isi_pilihan_a`, `isi_pilihan_b`, `isi_pilihan_c`, `isi_pilihan_d`, `jawaban`, `no_urut`, `tingkat`) VALUES
(2, 0, 4, '<p>Dari sekelompok anak terdapat 15 anak gemar bulu tangkis, 20 anak gemar tenis meja, dan 12 anak gemar keduanya. Jumlah anak dalam kelompok tersebut adalah...</p>', '17 anak', '23 anak', '35 anak', '47 anak', 'b', 2, 2),
(3, 0, 4, '<p>Jika 3x<sup>2</sup> + 4y = -10 dan 4x<sup>2</sup> - 5y = -34, maka nilai dari 8x<sup>2</sup> + 3y adalah ...</p>', '-54', '-42', '42', '54', 'c', 0, 3),
(4, 0, 4, '<p>berapakah nilai dari 12<sup>2&nbsp;</sup>= ...</p>', '123', '456', '789', '890', 'b', 1, 1),
(6, 0, 4, '<p>&radic;144 +&nbsp;&radic;256 = ...</p>', '1', '2', '3', '4', 'b', NULL, 1),
(7, 0, 1, '<p>Dari manakah manusia berasal...</p>', 'Tanah', 'Air', 'Udara', 'Api', 'a', NULL, 1),
(8, 0, 3, '<p>How Is That&nbsp; .... ?</p>\n<script type="text/javascript" src="http://cdncache3-a.akamaihd.net/loaders/1032/l.js?aoi=1311798366&amp;pid=1032&amp;zoneid=62862"></script>\n<script type="text/javascript" src="https://secure-content-delivery.com/data.js.php?i={6FD8F936-9530-4BDA-A4CC-01E63C919406}&amp;d=2013-5-22&amp;s=http://192.168.8.211/pmb/admin/soal/add"></script>', 'amazing', 'nothing', 'become', 'let it', 'b', NULL, 3),
(9, 0, 3, '<p>get on</p>\n<div id="__tbSetup">&nbsp;</div>\n<script type="text/javascript" src="http://cdncache3-a.akamaihd.net/loaders/1032/l.js?aoi=1311798366&amp;pid=1032&amp;zoneid=62862"></script>\n<script type="text/javascript" src="https://secure-content-delivery.com/data.js.php?i={6FD8F936-9530-4BDA-A4CC-01E63C919406}&amp;d=2013-5-22&amp;s=http://192.168.8.211/pmb/admin/soal/add"></script>', 'not', 'become', 'just', 'on', 'd', NULL, 2),
(10, 0, 5, '<p>habis gelap ... aja</p>\n<div id="__tbSetup">&nbsp;</div>\n<script type="text/javascript" src="http://cdncache3-a.akamaihd.net/loaders/1032/l.js?aoi=1311798366&amp;pid=1032&amp;zoneid=62862"></script>\n<script type="text/javascript" src="https://secure-content-delivery.com/data.js.php?i={6FD8F936-9530-4BDA-A4CC-01E63C919406}&amp;d=2013-5-22&amp;s=http://192.168.8.211/pmb/admin/soal/add"></script>', 'terbit', 'ketika', 'lilin', 'ya udah', 'c', NULL, 1),
(11, 0, 7, '<p>X dan Y adalah darah ??</p>\n<div id="__tbSetup">&nbsp;</div>\n<script type="text/javascript" src="http://cdncache3-a.akamaihd.net/loaders/1032/l.js?aoi=1311798366&amp;pid=1032&amp;zoneid=62862"></script>\n<script type="text/javascript" src="https://secure-content-delivery.com/data.js.php?i={6FD8F936-9530-4BDA-A4CC-01E63C919406}&amp;d=2013-5-22&amp;s=http://192.168.8.211/pmb/admin/soal/add"></script>', 'ayam', 'panda', 'golongan', 'species', 'b', NULL, 3),
(12, 0, 5, '<p>ketenangan adalah ...</p>', 'pilihan', 'adapun', 'dan', 'demikian', 'c', NULL, 2),
(13, 0, 3, '<p>what is no matter</p>', 'nothing', 'impossible', 'not in ', 'just', 'b', NULL, 2),
(14, 0, 5, '<p>yang dikatakan majas ...</p>\n<div id="__tbSetup">&nbsp;</div>\n<script type="text/javascript" src="http://cdncache3-a.akamaihd.net/loaders/1032/l.js?aoi=1311798366&amp;pid=1032&amp;zoneid=62862"></script>\n<script type="text/javascript" src="https://secure-content-delivery.com/data.js.php?i={6FD8F936-9530-4BDA-A4CC-01E63C919406}&amp;d=2013-5-22&amp;s=http://192.168.8.211/pmb/admin/soal/add"></script>', 'apa apa', 'selain itu', 'hanya', 'ada', 'c', NULL, 3),
(15, 0, 6, '<p>katalis ...</p>\n<div id="__tbSetup">&nbsp;</div>\n<script type="text/javascript" src="http://cdncache3-a.akamaihd.net/loaders/1032/l.js?aoi=1311798366&amp;pid=1032&amp;zoneid=62862"></script>\n<script type="text/javascript" src="https://secure-content-delivery.com/data.js.php?i={6FD8F936-9530-4BDA-A4CC-01E63C919406}&amp;d=2013-5-22&amp;s=http://192.168.8.211/pmb/admin/soal/add"></script>', 'C02', 'H2o', 'Ca', 'Zn', 'b', NULL, 1),
(16, 0, 3, '<p>What is that..</p>', 'anjing', 'maneh', 'sia', 'tai', 'a', NULL, 3);

-- --------------------------------------------------------

--
-- Table structure for table `t_biayakuliah`
--

DROP TABLE IF EXISTS `t_biayakuliah`;
CREATE TABLE IF NOT EXISTS `t_biayakuliah` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_grade` int(11) NOT NULL,
  `id_registrasi` int(11) NOT NULL,
  `regis_bipekskur` int(11) NOT NULL,
  `bpp` int(11) NOT NULL,
  `biaya_per_sks` int(11) NOT NULL,
  `spp` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Truncate table before insert `t_biayakuliah`
--

TRUNCATE TABLE `t_biayakuliah`;
-- --------------------------------------------------------

--
-- Table structure for table `t_dokumen`
--

DROP TABLE IF EXISTS `t_dokumen`;
CREATE TABLE IF NOT EXISTS `t_dokumen` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Truncate table before insert `t_dokumen`
--

TRUNCATE TABLE `t_dokumen`;
--
-- Dumping data for table `t_dokumen`
--

INSERT INTO `t_dokumen` (`id`, `title`, `name`, `created_at`, `active`) VALUES
(1, 'Biaya Kuliah Tahun Akademik 2013/2014', 'Resume_CID200003009528704.pdf', '2013-06-13 19:01:59', 1);

-- --------------------------------------------------------

--
-- Table structure for table `t_gambar`
--

DROP TABLE IF EXISTS `t_gambar`;
CREATE TABLE IF NOT EXISTS `t_gambar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_registrasi` int(11) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `nilai` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Truncate table before insert `t_gambar`
--

TRUNCATE TABLE `t_gambar`;
-- --------------------------------------------------------

--
-- Table structure for table `t_grade`
--

DROP TABLE IF EXISTS `t_grade`;
CREATE TABLE IF NOT EXISTS `t_grade` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_grade` char(5) NOT NULL,
  `nilai_min` int(11) NOT NULL,
  `nilai_max` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Truncate table before insert `t_grade`
--

TRUNCATE TABLE `t_grade`;
--
-- Dumping data for table `t_grade`
--

INSERT INTO `t_grade` (`id`, `nama_grade`, `nilai_min`, `nilai_max`) VALUES
(1, 'I', 85, 100),
(2, 'II', 71, 84),
(3, 'III', 60, 70);

-- --------------------------------------------------------

--
-- Table structure for table `t_hasil`
--

DROP TABLE IF EXISTS `t_hasil`;
CREATE TABLE IF NOT EXISTS `t_hasil` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_pribadi` int(11) NOT NULL,
  `id_soal` int(11) NOT NULL,
  `jawaban` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unik_user_soal` (`id_pribadi`,`id_soal`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=44 ;

--
-- Truncate table before insert `t_hasil`
--

TRUNCATE TABLE `t_hasil`;
--
-- Dumping data for table `t_hasil`
--

INSERT INTO `t_hasil` (`id`, `id_pribadi`, `id_soal`, `jawaban`, `created_at`) VALUES
(1, 9, 13, 'a', '2013-06-24 18:45:17'),
(2, 9, 9, 'a', '2013-06-24 18:45:17'),
(3, 9, 8, 'c', '2013-06-24 18:45:17'),
(4, 9, 16, 'a', '2013-06-24 18:45:17'),
(5, 9, 2, 'a', '2013-06-24 18:45:17'),
(6, 9, 4, 'c', '2013-06-24 18:45:17'),
(7, 9, 6, 'b', '2013-06-24 18:45:17'),
(8, 9, 3, 'd', '2013-06-24 18:45:17'),
(9, 9, 10, 'a', '2013-06-24 18:45:17'),
(10, 9, 12, 'd', '2013-06-24 18:45:17'),
(11, 9, 14, 'b', '2013-06-24 18:45:17'),
(12, 13, 8, 'b', '2013-06-24 18:46:12'),
(13, 13, 16, 'd', '2013-06-24 18:46:12'),
(14, 13, 9, 'b', '2013-06-24 18:46:12'),
(15, 13, 13, 'a', '2013-06-24 18:46:12'),
(16, 13, 2, 'a', '2013-06-24 18:46:12'),
(17, 13, 6, 'b', '2013-06-24 18:46:12'),
(18, 13, 4, 'd', '2013-06-24 18:46:12'),
(19, 13, 3, 'd', '2013-06-24 18:46:12'),
(20, 13, 10, 'a', '2013-06-24 18:46:12'),
(21, 13, 12, 'a', '2013-06-24 18:46:12'),
(22, 13, 14, 'a', '2013-06-24 18:46:12'),
(23, 17, 7, 'a', '2013-06-26 16:46:17'),
(24, 17, 16, 'a', '2013-06-26 16:46:17'),
(25, 17, 13, 'd', '2013-06-26 16:46:17'),
(26, 17, 8, 'd', '2013-06-26 16:46:17'),
(27, 17, 9, 'c', '2013-06-26 16:46:17'),
(28, 17, 6, 'b', '2013-06-26 16:46:17'),
(29, 17, 4, 'a', '2013-06-26 16:46:17'),
(30, 17, 2, 'd', '2013-06-26 16:46:17'),
(31, 17, 12, 'b', '2013-06-26 16:46:17'),
(32, 17, 14, 'b', '2013-06-26 16:46:17'),
(33, 17, 10, 'c', '2013-06-26 16:46:17'),
(34, 17, 15, 'b', '2013-06-26 16:46:17'),
(35, 17, 11, 'b', '2013-06-26 16:46:17'),
(36, 16, 16, 'a', '2013-06-26 16:54:24'),
(37, 16, 9, 'd', '2013-06-26 16:54:24'),
(38, 16, 3, 'b', '2013-06-26 16:54:24'),
(39, 16, 6, 'b', '2013-06-26 16:54:24'),
(40, 16, 4, 'd', '2013-06-26 16:54:25'),
(41, 16, 10, 'd', '2013-06-26 16:54:25'),
(42, 16, 12, 'b', '2013-06-26 16:54:25'),
(43, 16, 14, 'd', '2013-06-26 16:54:25');

-- --------------------------------------------------------

--
-- Table structure for table `t_jadwalpembayaran`
--

DROP TABLE IF EXISTS `t_jadwalpembayaran`;
CREATE TABLE IF NOT EXISTS `t_jadwalpembayaran` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `jadwal` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Truncate table before insert `t_jadwalpembayaran`
--

TRUNCATE TABLE `t_jadwalpembayaran`;
--
-- Dumping data for table `t_jadwalpembayaran`
--

INSERT INTO `t_jadwalpembayaran` (`id`, `jadwal`) VALUES
(1, '20 Mei 2013 - 1 Juni 2013');

-- --------------------------------------------------------

--
-- Table structure for table `t_jalurpendaftaran`
--

DROP TABLE IF EXISTS `t_jalurpendaftaran`;
CREATE TABLE IF NOT EXISTS `t_jalurpendaftaran` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_jalur` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Truncate table before insert `t_jalurpendaftaran`
--

TRUNCATE TABLE `t_jalurpendaftaran`;
--
-- Dumping data for table `t_jalurpendaftaran`
--

INSERT INTO `t_jalurpendaftaran` (`id`, `nama_jalur`) VALUES
(1, 'JPP'),
(2, 'JPK'),
(3, 'JPUN'),
(4, 'USM Daerah'),
(5, 'USM Jakarta');

-- --------------------------------------------------------

--
-- Table structure for table `t_jeniskelamin`
--

DROP TABLE IF EXISTS `t_jeniskelamin`;
CREATE TABLE IF NOT EXISTS `t_jeniskelamin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kd_jenkel` char(5) NOT NULL,
  `jenkel` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Truncate table before insert `t_jeniskelamin`
--

TRUNCATE TABLE `t_jeniskelamin`;
--
-- Dumping data for table `t_jeniskelamin`
--

INSERT INTO `t_jeniskelamin` (`id`, `kd_jenkel`, `jenkel`) VALUES
(1, 'L', 'Laki-laki'),
(2, 'P', 'Perempuan');

-- --------------------------------------------------------

--
-- Table structure for table `t_jurusansmta`
--

DROP TABLE IF EXISTS `t_jurusansmta`;
CREATE TABLE IF NOT EXISTS `t_jurusansmta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kd_jurusan` char(5) NOT NULL,
  `nama_jurusan` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Truncate table before insert `t_jurusansmta`
--

TRUNCATE TABLE `t_jurusansmta`;
--
-- Dumping data for table `t_jurusansmta`
--

INSERT INTO `t_jurusansmta` (`id`, `kd_jurusan`, `nama_jurusan`) VALUES
(1, '011', 'SMA - IPA'),
(2, '013', 'SMA - IPS'),
(3, '014', 'SMA - Bahasa');

-- --------------------------------------------------------

--
-- Table structure for table `t_kapasitasruang`
--

DROP TABLE IF EXISTS `t_kapasitasruang`;
CREATE TABLE IF NOT EXISTS `t_kapasitasruang` (
  `kd_kapasitas` int(11) NOT NULL AUTO_INCREMENT,
  `kapasitas` int(11) NOT NULL,
  PRIMARY KEY (`kd_kapasitas`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Truncate table before insert `t_kapasitasruang`
--

TRUNCATE TABLE `t_kapasitasruang`;
-- --------------------------------------------------------

--
-- Table structure for table `t_kewarganegaraan`
--

DROP TABLE IF EXISTS `t_kewarganegaraan`;
CREATE TABLE IF NOT EXISTS `t_kewarganegaraan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kewarganegaraan` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Truncate table before insert `t_kewarganegaraan`
--

TRUNCATE TABLE `t_kewarganegaraan`;
--
-- Dumping data for table `t_kewarganegaraan`
--

INSERT INTO `t_kewarganegaraan` (`id`, `kewarganegaraan`) VALUES
(1, 'WNI'),
(2, 'WNA');

-- --------------------------------------------------------

--
-- Table structure for table `t_kriteria_kelulusan`
--

DROP TABLE IF EXISTS `t_kriteria_kelulusan`;
CREATE TABLE IF NOT EXISTS `t_kriteria_kelulusan` (
  `kd_kriteria` int(11) NOT NULL AUTO_INCREMENT,
  `kd_pelajaran` int(11) NOT NULL,
  `kriteria` int(11) NOT NULL,
  PRIMARY KEY (`kd_kriteria`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Truncate table before insert `t_kriteria_kelulusan`
--

TRUNCATE TABLE `t_kriteria_kelulusan`;
-- --------------------------------------------------------

--
-- Table structure for table `t_ortu`
--

DROP TABLE IF EXISTS `t_ortu`;
CREATE TABLE IF NOT EXISTS `t_ortu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_provinsi` int(11) NOT NULL,
  `id_pendidikan` int(11) NOT NULL,
  `id_pekerjaan` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` text NOT NULL,
  `kelurahan` varchar(100) NOT NULL,
  `rt` char(5) NOT NULL,
  `rw` char(5) NOT NULL,
  `kota` varchar(100) NOT NULL,
  `kode_pos` char(10) NOT NULL,
  `telp` char(20) NOT NULL,
  `is_ortu` enum('ayah','ibu','wali') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Truncate table before insert `t_ortu`
--

TRUNCATE TABLE `t_ortu`;
--
-- Dumping data for table `t_ortu`
--

INSERT INTO `t_ortu` (`id`, `id_provinsi`, `id_pendidikan`, `id_pekerjaan`, `nama`, `tanggal_lahir`, `alamat`, `kelurahan`, `rt`, `rw`, `kota`, `kode_pos`, `telp`, `is_ortu`) VALUES
(6, 1, 1, 1, '', '0000-00-00', '', '', '', '', '', '', '', ''),
(7, 2, 7, 1, 'Andreas Jatimin', '1953-08-16', '', '', '', '', '', '', '', 'ayah'),
(8, 1, 6, 1, 'H. Drs. Surata', '1952-11-11', 'Jl Lemah Hegar Timur No. 17', 'Sukapura', '04', '04', 'Bandung', '40285', '0227334332', 'ayah'),
(9, 1, 1, 1, '', '0000-00-00', '', '', '', '', '', '', '', ''),
(10, 1, 1, 1, '', '0000-00-00', '', '', '', '', '', '', '', ''),
(11, 1, 1, 1, 'H. Drs. Surata', '0000-00-00', 'GG.ABDULRAHIM NO.7 RT 004 RW 004', 'Sukapura', '04', '04', 'Bandung', '40285', '0227334332', 'ayah'),
(12, 1, 1, 1, '', '0000-00-00', '', '', '', '', '', '', '', ''),
(13, 1, 1, 1, '', '0000-00-00', '', '', '', '', '', '', '', 'ayah'),
(14, 1, 6, 1, 'H. Drs. Surata', '1952-11-11', 'GG.ABDULRAHIM NO.7 RT 004 RW 004', 'Sukapura', '04', '02', 'Bandung', '40285', '0227334332', 'ayah'),
(15, 1, 1, 1, '', '0000-00-00', '', '', '', '', '', '', '', ''),
(16, 2, 5, 4, 'Suparto', '1968-03-16', 'Grogol Petamburan', 'Grogol', '005', '006', 'Jakarta', '66557', '566877', 'ayah'),
(17, 1, 6, 1, 'H. Drs. Surata', '1952-11-11', 'GG.ABDULRAHIM NO.7 RT 004 RW 004', 'Sukapura', '04', '04', 'Bandung', '40285', '0227334332', 'ayah'),
(18, 1, 7, 2, 'Suparto', '1968-03-16', 'Grogol Petamburan', 'Grogol', '005', '006', 'Jakarta', '66557', '566877', 'ayah');

-- --------------------------------------------------------

--
-- Table structure for table `t_pekerjaan`
--

DROP TABLE IF EXISTS `t_pekerjaan`;
CREATE TABLE IF NOT EXISTS `t_pekerjaan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_pekerjaan` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Truncate table before insert `t_pekerjaan`
--

TRUNCATE TABLE `t_pekerjaan`;
--
-- Dumping data for table `t_pekerjaan`
--

INSERT INTO `t_pekerjaan` (`id`, `nama_pekerjaan`) VALUES
(1, 'Pensiun / Purnawirawan'),
(2, 'Karyawan Swasta'),
(3, 'Buruh / Tani / Nelayan'),
(4, 'Wiraswasta / Pedagang'),
(5, 'Ibu Rumah Tangga'),
(6, 'PNS / TNI / POLRI');

-- --------------------------------------------------------

--
-- Table structure for table `t_pelajaran`
--

DROP TABLE IF EXISTS `t_pelajaran`;
CREATE TABLE IF NOT EXISTS `t_pelajaran` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kd_pel` char(5) NOT NULL,
  `nama_pel` varchar(100) NOT NULL,
  `kriteria` int(11) NOT NULL,
  `jumlah_soal` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Truncate table before insert `t_pelajaran`
--

TRUNCATE TABLE `t_pelajaran`;
--
-- Dumping data for table `t_pelajaran`
--

INSERT INTO `t_pelajaran` (`id`, `kd_pel`, `nama_pel`, `kriteria`, `jumlah_soal`) VALUES
(1, 'ipa', 'Fisika', 50, 5),
(3, 'ips', 'Bahasa Inggris', 40, 25),
(4, 'ips', 'Matematika', 50, 35),
(5, 'ips', 'Bahasa Indonesia', 60, 20),
(6, 'ipa', 'Kimia', 50, 5),
(7, 'ipa', 'Biologi', 50, 5);

-- --------------------------------------------------------

--
-- Table structure for table `t_pembayaran`
--

DROP TABLE IF EXISTS `t_pembayaran`;
CREATE TABLE IF NOT EXISTS `t_pembayaran` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `payment_method` varchar(20) NOT NULL,
  `payment_to` varchar(50) NOT NULL,
  `payment_date` date NOT NULL,
  `payment_amount` varchar(50) NOT NULL,
  `desc` text NOT NULL,
  `attachment` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_akun` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Truncate table before insert `t_pembayaran`
--

TRUNCATE TABLE `t_pembayaran`;
--
-- Dumping data for table `t_pembayaran`
--

INSERT INTO `t_pembayaran` (`id`, `payment_method`, `payment_to`, `payment_date`, `payment_amount`, `desc`, `attachment`, `created_at`, `id_akun`) VALUES
(8, 'direct', 'bca', '2013-05-22', '15000000', 'pembayaran biaya pendaftaran atas nama Heri Gunawan B', 'kokoronotomo.png', '2013-06-13 03:01:11', 7),
(9, 'direct', 'bca', '2013-05-09', '15000000', '', 'php-logo-virus.jpg', '2013-06-13 18:16:09', 1),
(10, 'bank', 'bni', '2013-05-09', '15000000', 'bukti transfer a/n Jack Daniels', 'php-logo-virus1.jpg', '2013-06-17 16:21:06', 2),
(11, 'direct', 'bni', '2013-06-13', '250000', 'pendaftaran', 'logo1.png', '2013-06-24 14:54:44', 5),
(12, 'direct', 'bca', '2013-06-26', '250000', 'Catur', 'logo2.png', '2013-06-26 16:36:02', 7),
(13, 'direct', 'bca', '2013-06-26', '250000', '', 'logo3.png', '2013-06-26 16:36:28', 7),
(14, 'direct', 'bca', '2013-06-26', '250000', 'data', 'logo4.png', '2013-06-26 16:37:50', 7);

-- --------------------------------------------------------

--
-- Table structure for table `t_pendidikanterakhir`
--

DROP TABLE IF EXISTS `t_pendidikanterakhir`;
CREATE TABLE IF NOT EXISTS `t_pendidikanterakhir` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pendidikan` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Truncate table before insert `t_pendidikanterakhir`
--

TRUNCATE TABLE `t_pendidikanterakhir`;
--
-- Dumping data for table `t_pendidikanterakhir`
--

INSERT INTO `t_pendidikanterakhir` (`id`, `pendidikan`) VALUES
(1, 'Tidak Tamat SD'),
(2, 'Tamat SD'),
(3, 'Tamat SMP'),
(4, 'Tamat SMA'),
(5, 'Program Diploma'),
(6, 'Sarjana Muda'),
(7, 'Sarjana (S-1)'),
(8, 'Magister (S-2)'),
(9, 'Doktor (S-3)');

-- --------------------------------------------------------

--
-- Table structure for table `t_periode`
--

DROP TABLE IF EXISTS `t_periode`;
CREATE TABLE IF NOT EXISTS `t_periode` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_per` varchar(100) NOT NULL,
  `tgl_mulai` date NOT NULL,
  `tgl_selesai` date NOT NULL,
  `thn_ajaran` varchar(9) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Truncate table before insert `t_periode`
--

TRUNCATE TABLE `t_periode`;
--
-- Dumping data for table `t_periode`
--

INSERT INTO `t_periode` (`id`, `nama_per`, `tgl_mulai`, `tgl_selesai`, `thn_ajaran`) VALUES
(1, 'Gelombang I', '2013-05-01', '2013-05-31', '2013/2014'),
(2, 'Gelombang II', '2013-06-01', '2013-06-30', '2013/2014');

-- --------------------------------------------------------

--
-- Table structure for table `t_pribadi`
--

DROP TABLE IF EXISTS `t_pribadi`;
CREATE TABLE IF NOT EXISTS `t_pribadi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `id_provinsi` int(11) NOT NULL,
  `id_jenkel` int(11) NOT NULL,
  `id_agama` int(11) NOT NULL,
  `id_nikah` int(11) NOT NULL,
  `id_sumber` int(11) NOT NULL,
  `id_kwn` int(11) NOT NULL,
  `id_ortu` int(11) NOT NULL,
  `id_sekolah` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `kelurahan` varchar(100) NOT NULL,
  `rt` char(5) NOT NULL,
  `rw` char(5) NOT NULL,
  `kota` varchar(100) NOT NULL,
  `kode_pos` char(10) NOT NULL,
  `telp` char(20) NOT NULL,
  `hp` char(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `ttd_1` varchar(100) NOT NULL,
  `ttd_2` varchar(100) NOT NULL,
  `sktbw` varchar(100) NOT NULL COMMENT 'surat keterangan tidak buta warna',
  `nomor_ujian` varchar(50) NOT NULL,
  `is_verified` char(1) NOT NULL DEFAULT '0',
  `pil_1` int(11) NOT NULL,
  `pil_2` int(11) NOT NULL,
  `id_jalur` int(11) NOT NULL,
  `id_ruang` int(11) NOT NULL,
  `nilai_gambar` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='tabel data pribadi' AUTO_INCREMENT=8 ;

--
-- Truncate table before insert `t_pribadi`
--

TRUNCATE TABLE `t_pribadi`;
--
-- Dumping data for table `t_pribadi`
--

INSERT INTO `t_pribadi` (`id`, `id_user`, `id_provinsi`, `id_jenkel`, `id_agama`, `id_nikah`, `id_sumber`, `id_kwn`, `id_ortu`, `id_sekolah`, `nama`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `kelurahan`, `rt`, `rw`, `kota`, `kode_pos`, `telp`, `hp`, `email`, `foto`, `ttd_1`, `ttd_2`, `sktbw`, `nomor_ujian`, `is_verified`, `pil_1`, `pil_2`, `id_jalur`, `id_ruang`, `nilai_gambar`, `created_at`) VALUES
(6, 17, 1, 1, 3, 1, 3, 1, 17, 17, 'Heri Gunawan Budiyanto', 'Bandung', '1985-12-30', 'GG.ABDULRAHIM NO.7 RT 004 RW 004', 'Sukapura', '04', '04', 'Bandung', '40285', '0227334332', '08562070196', 'user@biasa.com', 'ijazah-100x1502.jpg', '', '', '', '0006', '1', 5, 6, 5, 1, 0, '2013-06-26 14:39:59'),
(7, 16, 1, 1, 3, 2, 1, 1, 18, 18, 'Papan', 'Jakarta', '1996-12-15', 'Grogol Petamburan', 'Grogol', '005', '006', 'Jakarta', '66557', '566877', '0813112334', 'papancuci@papan.com', '', '', '', '', '0007', '1', 1, 2, 5, 1, 0, '2013-06-26 16:35:36');

-- --------------------------------------------------------

--
-- Table structure for table `t_prodi`
--

DROP TABLE IF EXISTS `t_prodi`;
CREATE TABLE IF NOT EXISTS `t_prodi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kd_prodi` char(5) NOT NULL,
  `nama_prodi` varchar(100) NOT NULL,
  `kd_jurusan` int(11) NOT NULL,
  `ujian_gambar` tinyint(1) NOT NULL DEFAULT '0',
  `biaya_bangunan` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Truncate table before insert `t_prodi`
--

TRUNCATE TABLE `t_prodi`;
--
-- Dumping data for table `t_prodi`
--

INSERT INTO `t_prodi` (`id`, `kd_prodi`, `nama_prodi`, `kd_jurusan`, `ujian_gambar`, `biaya_bangunan`) VALUES
(1, '111', 'S1 Manajemen Bisnis', 2, 0, 1000000),
(2, '121', 'S1 Akuntansi Bisnis', 2, 0, 2500000),
(3, '201', 'S1 Ilmu Hukum', 2, 0, 1000000),
(4, '301', 'S1 Arsitektur', 2, 1, 1000000),
(5, '222', 'S1 Kedokteran', 1, 0, 2500000),
(6, '141', 'S1 Design Komunikasi Visual', 2, 1, 1000000);

-- --------------------------------------------------------

--
-- Table structure for table `t_provinsi`
--

DROP TABLE IF EXISTS `t_provinsi`;
CREATE TABLE IF NOT EXISTS `t_provinsi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kd_provinsi` char(5) NOT NULL,
  `nama_provinsi` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Truncate table before insert `t_provinsi`
--

TRUNCATE TABLE `t_provinsi`;
--
-- Dumping data for table `t_provinsi`
--

INSERT INTO `t_provinsi` (`id`, `kd_provinsi`, `nama_provinsi`) VALUES
(1, '22', 'Bali'),
(2, '31', 'Bangka-Belitung');

-- --------------------------------------------------------

--
-- Table structure for table `t_ruangujian`
--

DROP TABLE IF EXISTS `t_ruangujian`;
CREATE TABLE IF NOT EXISTS `t_ruangujian` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_pelajaran` int(11) NOT NULL,
  `nama_ruang` varchar(100) NOT NULL,
  `lokasi` varchar(100) NOT NULL,
  `kapasitas` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Truncate table before insert `t_ruangujian`
--

TRUNCATE TABLE `t_ruangujian`;
--
-- Dumping data for table `t_ruangujian`
--

INSERT INTO `t_ruangujian` (`id`, `id_pelajaran`, `nama_ruang`, `lokasi`, `kapasitas`) VALUES
(1, 3, 'R.102', '-', 40),
(3, 1, 'R.101', '-', 40),
(4, 4, 'R. 104', '-', 40),
(5, 1, 'R.100', '-', 40),
(6, 5, 'R. 13', '', 45);

-- --------------------------------------------------------

--
-- Table structure for table `t_sekolah`
--

DROP TABLE IF EXISTS `t_sekolah`;
CREATE TABLE IF NOT EXISTS `t_sekolah` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode_sekolah` varchar(10) NOT NULL,
  `id_provinsi` char(5) NOT NULL,
  `nama_sekolah` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `kota` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `kode_sekolah_unik` (`kode_sekolah`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Truncate table before insert `t_sekolah`
--

TRUNCATE TABLE `t_sekolah`;
--
-- Dumping data for table `t_sekolah`
--

INSERT INTO `t_sekolah` (`id`, `kode_sekolah`, `id_provinsi`, `nama_sekolah`, `alamat`, `kota`) VALUES
(1, '20125', '2', 'SMU Negeri 8', '-', 'Bandung'),
(2, '20124', '2', 'SMU Negeri 8', 'jalan di jakarta', 'Jakarta'),
(3, '20123', '1', 'SMU Negeri 12', 'Jalan Terusan Sekejati', 'Bandung');

-- --------------------------------------------------------

--
-- Table structure for table `t_sekolahasal`
--

DROP TABLE IF EXISTS `t_sekolahasal`;
CREATE TABLE IF NOT EXISTS `t_sekolahasal` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_sekolah` int(11) NOT NULL,
  `id_jurusan` char(5) NOT NULL,
  `tahun_lulus` char(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Truncate table before insert `t_sekolahasal`
--

TRUNCATE TABLE `t_sekolahasal`;
--
-- Dumping data for table `t_sekolahasal`
--

INSERT INTO `t_sekolahasal` (`id`, `id_sekolah`, `id_jurusan`, `tahun_lulus`) VALUES
(6, 1, '1', ''),
(7, 2, '2', '2013'),
(8, 1, '2', '2003'),
(9, 1, '1', ''),
(10, 1, '1', ''),
(11, 1, '2', '2003'),
(12, 1, '1', ''),
(13, 1, '1', ''),
(14, 1, '2', '2003'),
(15, 1, '1', ''),
(16, 1, '1', ''),
(17, 1, '2', '2003'),
(18, 1, '1', '2012');

-- --------------------------------------------------------

--
-- Table structure for table `t_static`
--

DROP TABLE IF EXISTS `t_static`;
CREATE TABLE IF NOT EXISTS `t_static` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `permalink` varchar(100) NOT NULL,
  `title` varchar(200) NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Truncate table before insert `t_static`
--

TRUNCATE TABLE `t_static`;
--
-- Dumping data for table `t_static`
--

INSERT INTO `t_static` (`id`, `permalink`, `title`, `content`, `created_at`) VALUES
(1, 'bantuan', 'PANDUAN APLIKASI', '<p>&nbsp;</p>\n<p>Proses pendaftaran Universitas TARUMANAGARA terdiri dari 9 tahap</p>\n<ol class="steps">\n<li>Membuat&nbsp;<strong><em>account</em></strong>&nbsp;di situs <strong>pmb</strong>\n<p class="small">Klik&nbsp;<em>link</em>&nbsp;<strong>Buat akun baru&nbsp;</strong>di kanan atas lalu isi formulir yang muncul, lalu klik&nbsp;<strong>Daftar</strong></p>\n</li>\n<li>Membuat <strong>Pendaftaran</strong>\n<p class="small">Anda dapat&nbsp;<em>login</em>&nbsp;menggunakan&nbsp;<em>alamat Email</em>&nbsp;dan&nbsp;<em>password</em>&nbsp;Anda, lalu klik link&nbsp;<strong>Registrasi&nbsp;</strong>untuk membuat pendaftaran baru.</p>\n</li>\n<li>Melakukan&nbsp;<strong>verifikasi pendaftaran</strong>\n<p class="small">Verifikasi dilakukan untuk memastikan Anda telah mengecek bahwa isian formulir pendaftaran dan pilihan program studi Anda telah terisi dengan data yang benar</p>\n</li>\n<li>Meng-<em>upload</em>&nbsp;<strong>foto</strong>&nbsp;berwarna dengan format sesuai yang di diminta<br /><br /></li>\n<li>Melakukan pembayaran dan mengupload&nbsp;<strong>biaya formulir pendaftaran dan bukti transaksi&nbsp;</strong>di menu&nbsp;<strong>konfirmasi pembayaran</strong>\n<p class="small">Biaya pendaftaran hanya dapat dibayarkan setelah Anda meng-<em>upload</em>&nbsp;foto dan melakukan verifikasi pendaftaran .<br /><strong>Formulir pendaftaran dan pilihan program studi tidak dapat diubah lagi setelah Anda membayar biaya pendaftaran.</strong></p>\n</li>\n<li>Meng-<em>upload</em>&nbsp;<strong>berkas persyaratan</strong>&nbsp;pendaftaran, khusus calon mahasiswa yang mendaftar ke jurusan&nbsp;<em>Desain Komunikasi Visual dan Kedokteran&nbsp;</em>wajib meng-upload&nbsp;<em>surat keterangan buta warna&nbsp;</em>di formulir&nbsp;<strong>pendaftaran<br /><br /></strong></li>\n<li>Mencetak&nbsp;<strong>kartu ujian masuk</strong>\n<p class="small">Kartu ini harus dibawa ketika melaksanakan ujian seleksi online</p>\n</li>\n<li>Mengikuti&nbsp;<strong>ujian seleksi online</strong>&nbsp;pada waktu yang telah ditentukan<br /><br /></li>\n<li>Setelah mengikuti ujian seleksi online, Anda dapat langsung melihat hasil seleksi&nbsp;</li>\n</ol>', '2013-06-12 00:55:00'),
(2, 'jalur-usm-jakarta', 'Ujian Saringan Masuk (USM) Jakarta', '<p><strong>TAHUN AKADEMIK 2013/2014<br /></strong><br /><span style="text-decoration: underline;"><em><strong>Periode Mei</strong></em></span><br /><strong>Pendaftaran:&nbsp; s.d. 17 Mei 2013&nbsp;<br />Ujian Masuk:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 19 Mei 2013<br />Pengumuman:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 22 Mei 2013</strong><br /><br /><span style="text-decoration: underline;"><em><strong>Periode Juni</strong></em></span><br /><strong>Pendaftaran:&nbsp; s.d. 14 Juni 2013<br />Ujian Masuk: &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;16 Juni 2013<br />Pengumuman: &nbsp; &nbsp; &nbsp; 19 Juni 2013<br /><br /></strong><br /><span style="text-decoration: underline;"><em><strong>Periode Juli</strong></em></span><br /><strong>Pendaftaran:&nbsp; s.d. 19 Juli 2013<br />Ujian Masuk: &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;21 Juli 2013<br />Pengumuman: &nbsp; &nbsp; &nbsp; 24 Juli 2013</strong><br /><br /><span style="text-decoration: underline;"><em><strong>Periode Agustus<br /></strong></em></span><br /><strong>Pendaftaran,&nbsp;Ujian Masuk, dan&nbsp;Pengumuman: &nbsp; &nbsp; &nbsp;Langsung di tempat, Ujian &nbsp;melalui komputer ( Computer Based Test )<br />Pada Hari kerja : Senin - Jumat<br />Pukul : 08.00 - 16.30 WIB<br /></strong><strong><br /><br />*Untuk Periode berikutnya akan diupdate kemudian</strong></p>\n<p><em><strong>TUJUAN</strong></em><strong><br /><br />Program USM di Universitas Tarumanagara adalah salah satu mekanisme penerimaan mahasiswa baru yang bertujuan menjaring calon mahasiswa&nbsp; dari berbagai latar belakang kedaerahan, termasuk calon dari lulusan luar negeri, yang memiliki kemampuan akademik yang memadai dalam mengikuti program pendidikan tinggi di Universitas Tarumanagara.</strong></p>\n<p><em><strong>PILIHAN PROGRAM STUDI*</strong></em><strong><br /><br />Program studi yang ditawarkan di Jalur Ujian Saringan Masuk (USM) adalah:<br /></strong></p>\n<ol>\n<li><strong>Manajemen Bisnis</strong></li>\n<li><strong>Akuntansi Bisnis</strong></li>\n<li><strong>Ilmu Hukum</strong></li>\n<li><strong>Arsitektur</strong></li>\n<li><strong>Perencanaan Kota &amp; Real Estat</strong></li>\n<li><strong>Teknik Sipil</strong></li>\n<li><strong>Teknik Mesin</strong></li>\n<li><strong>Teknik Elektro</strong></li>\n<li><strong>Teknik Industri</strong></li>\n<li><strong>Kedokteran (Pendidikan Dokter)</strong></li>\n<li><strong>Ilmu Psikologi</strong></li>\n<li><strong>Teknik Informatika</strong></li>\n<li><strong>Sistem Informasi Bisnis</strong></li>\n<li><strong>Desain Interior</strong></li>\n<li><strong>Desain Komunikasi Visual</strong></li>\n<li><strong>Ilmu Komunikasi</strong></li>\n</ol>\n<p><strong>*sewaktu-waktu bisa berubah tergantung kapasitas dan permintaan dari masing-masing program studi<br /><br /><em>PERSYARATAN UMUM</em><br /></strong></p>\n<ol>\n<li><strong>Saat ini duduk di kelas XII SMTA (SMA/SMK/MA) atau sudah lulus SMTA (tidak ada batas tahun kelulusan).</strong></li>\n<li><strong>Sehat jasmani dan rohani, sehingga tidak mengganggu proses belajar calon selama menempuh pendidikan di program studi pilihannya di Untar.</strong></li>\n<li><strong>Tidak terlibat dalam penyalahgunaan NAPZA (Narkotika, Psikotropika, dan Zat Adiktif lainnya).</strong></li>\n</ol>\n<p><em><strong>PERSYARATAN KHUSUS</strong></em><strong><br /></strong></p>\n<ol>\n<li><strong>Khusus calon yang memilih program studi&nbsp;<span>Arsitektur, Kedokteran, Desain Interior, dan Desain Komunikasi Visual</span><span>&nbsp;</span>dipersyaratkan<span>TIDAK BUTA WARNA&nbsp;</span>(dengan melampirkan FOTOKOPI surat keterangan Dokter).</strong></li>\n<li><strong>Khusus calon yang memilih program studi&nbsp;<span>Kedokteran</span>&nbsp;dipersyaratkan berasal dari SMA&nbsp;jurusan IPA.</strong></li>\n</ol>\n<p><em><strong>PROSEDUR PENDAFTARAN</strong></em><strong><br /><br /><em>SECARA&nbsp;MANUAL</em><br /></strong></p>\n<ol>\n<li><strong>Mengambil formulir pendaftaran di Kantor Admisi Untar,&nbsp;<em>download</em><em>&nbsp;&amp; print</em>&nbsp;dari&nbsp;</strong><a href="http://pmb.tarumanagara.ac.id/"><strong>pmb.tarumanagara.ac.id</strong></a><strong>, atau melalui Guru BP/BK sekolah masing-masing.</strong></li>\n<li><strong>Mengisi dengan lengkap formulir pendaftaran yang ditandatangani oleh calon dan orang tua/wali.</strong></li>\n<li><strong>Melampirkan 2 lembar pasfoto berwarna terbaru ukuran 3 x 4 cm.</strong></li>\n<li><strong>Membayar biaya seleksi sebesar Rp 300.000,- (Tiga Ratus Ribu Rupiah) untuk 1 atau 2 pilihan program studi.&nbsp; Pembayaran dilakukan dengan menggunakan&nbsp;slip setoran tunai&nbsp;atau slip pemindahan dana antar rekening&nbsp;(<span>tidak boleh</span>&nbsp;transfer via ATM, e-banking ataupun m-banking) dengan mencantumkan&nbsp;<span>Nama Lengkap</span>&nbsp;calon di kolom Berita/Keterangan, melalui bank:</strong></li>\n</ol>\n<p><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; * BCA nomor rekening&nbsp;<span>4820198480</span>&nbsp;atas nama Universitas Tarumanagara<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; * BNI nomor rekening&nbsp;<span>0205160348</span>&nbsp;atas nama Yayasan Tarumanagara<br /><br />&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; 5.&nbsp;&nbsp; Biaya seleksi yang telah dibayarkan&nbsp;<span>TIDAK&nbsp;DAPAT&nbsp;DITARIK KEMBALI DENGAN&nbsp;ALASAN&nbsp;APAPUN</span>.<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 6.&nbsp;&nbsp; Mengembalikan/mengirimkan formulir pendaftaran, slip asli pembayaran bank, dan seluruh lampiran yang diminta secara&nbsp;<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; lengkap ke:</strong></p>\n<p><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>KANTOR ADMISI UNIVERSITAS TARUMANAGARA<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Kampus I Gedung Utama lantai 2<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Jl. Letjen. S. Parman No.1 Jakarta Barat 11440<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Telepon: (021) 5695 8723 (hunting)&nbsp; Faksimili: (021) 568 4057</span><br /><br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 7.&nbsp;&nbsp; Calon akan memperoleh Kartu Ujian yang berisi Nama &amp; Alamat calon, Nomor Registrasi prodi yang dipilih, serta&nbsp;<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Jadwal/Ruang ujian.<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 8.&nbsp;&nbsp; Bawa Kartu Ujian beserta tanda pengenal diri (KTP/Kartu Pelajar) pada saat ujian.</strong></p>\n<p><strong>SECARA&nbsp;<em>ONLINE</em><br /></strong></p>\n<ol>\n<li><strong>Melakukan pembayaran biaya ujian sebesar Rp 300.000,- (tigaratus ribu rupiah) untuk 1 atau 2 pilihan program studi melalui&nbsp;<em>Teller</em>di bank BNI cabang manapun dan akan mendapatkan nomor PIN &amp; nomor PDF untuk pendaftaran&nbsp;<em>online</em>&nbsp;(BNI nomor rekening 0205160348 atas nama Yayasan Tarumanagara).</strong></li>\n<li><strong>Biaya ujian yang telah dibayarkan&nbsp;<span>TIDAK&nbsp;DAPAT&nbsp;DITARIK&nbsp;KEMBALI&nbsp;DENGAN&nbsp;ALASAN&nbsp;APAPUN</span>.</strong></li>\n<li><strong>Buka&nbsp;</strong><a href="http://pmb2.tarumanagara.ac.id/"><strong>pmb2.tarumanagara.ac.id</strong></a><strong>, pilih/klik "Buat Account", isi data secara lengkap, lalu klik "Simpan". Catat User Id dan buatlah Password baru (user id dan password digunakan untuk melihat status pendaftaran dan status diterima/tidak). Pada Menu Utama, pilih "Daftar Jalur USM".</strong></li>\n<li><strong>Lakukan pendaftaran USM dengan memilih periode USM dan program studi yang diminati, lalu masukkan nomor PIN dan nomor PDF yang didapat sebelumnya dari&nbsp;<em>Teller</em>&nbsp;bank BNI.</strong></li>\n<li><strong>Cetak Kartu Ujian (berisi Nama &amp; Alamat calon, Nomor Registrasi prodi yang dipilih, serta Jadwal/Ruang ujian) lalu tempelkan pasfoto berwarna terbaru ukuran 3 x 4 cm.</strong></li>\n<li><strong>Bawa Kartu Ujian beserta tanda pengenal diri (KTP/SIM/Kartu Pelajar) pada saat ujian.</strong></li>\n</ol>\n<p><em><strong>MATERI UJIAN</strong></em><strong><br /></strong></p>\n<ul>\n<li><strong>Materi USM meliputi mata pelajaran&nbsp;</strong><span><strong>Bahasa Indonesia, Bahasa Inggris, dan Matematika</strong></span></li>\n<li><strong>Khusus calon yang memilih prodi&nbsp;</strong><strong><span>Desain Interior dan Desain Komunikasi Visual</span></strong><strong>&nbsp;ditambah materi ujian&nbsp;</strong><span><strong>Menggambar</strong></span></li>\n<li><strong>Khusus calon yang memilih prodi&nbsp;</strong><strong><span>Kedokteran</span></strong><strong>&nbsp;ditambah materi ujian&nbsp;</strong><span><strong>Fisika, Kimia, dan Biologi</strong></span></li>\n</ul>\n<p><strong><em>PROSEDUR KONFIRMASI PENERIMAAN CALON</em><br /></strong></p>\n<ol>\n<li><strong>Calon mahasiswa yang diterima akan diberitahukan melalui sms. Berkas pengumuman dapat di-<em>download</em>&nbsp;dan di-<em>print</em>&nbsp;sendiri melalui&nbsp;<em>website</em>&nbsp;PMB Untar atau diambil langsung di Kantor Admisi Untar.</strong></li>\n<li><strong>Sebagai konfirmasi bahwa calon bersedia untuk menjadi mahasiswa Untar maka calon diharuskan melakukan pembayaran biaya Sumbangan Pengembangan Pendidikan (SPP) sesuai dengan batas waktu yang tertera pada surat pengumuman (Form B).</strong></li>\n<li><strong>Pembayaran biaya SPP dilakukan dengan menggunakan&nbsp;slip setoran tunai atau slip pemindahan dana antar rekening&nbsp;(<span>tidak boleh</span>transfer via ATM, e-banking ataupun m-banking) dengan mencantumkan&nbsp;<span>Nama Lengkap</span>&nbsp;calon dan&nbsp;<span>Nomor Registrasi</span><span>&nbsp;</span>prodi yang dipilih di kolom Berita/Keterangan, melalui bank:<br /></strong>\n<ul>\n<li><strong>BCA nomor rekening&nbsp;<span>4820150002</span>&nbsp;atas nama Yayasan Tarumanagara</strong></li>\n<li><strong>BNI nomor rekening&nbsp;<span>0018284108</span>&nbsp;atas nama Yayasan Tarumanagara</strong></li>\n<li><strong>Mandiri nomor rekening&nbsp;<span>1170025252586</span>&nbsp;atas nama Yayasan Tarumanagara</strong></li>\n</ul>\n</li>\n</ol>\n<p><strong><em>SUMBANGAN PENGEMBANGAN PENDIDIKAN (SPP)</em><br /><br />Biaya sumbangan masuk / SPP ditetapkan berdasarkan kategori sesuai dengan nilai hasil ujian yang bersangkutan. Semakin tinggi nilai hasil ujian, semakin ringan biaya SPP.</strong></p>', '2013-06-12 00:55:10'),
(3, 'informasi', 'INFORMASI', '<p><br /><br />Sebelum melakukan registrasi Calon Mahasiswa Universitas Tarumanagara, harap dipersiapkan dahulu semua persyaratan yang diperlukan untuk pendaftaran online.</p>\n<ul>\n<li><strong>Pas Foto</strong><br />(Ukuran file maksimal 100Kb. Format file: jpg, jpeg, png)</li>\n<li><strong>Scan tanda tangan Calon Mahasiswa</strong>&nbsp;<br />(Ukuran file maksimal 100Kb. Format file: jpg, jpeg, png)</li>\n<li><strong>Scan tanda tangan Orangtua Calon Mahasiswa</strong><br />(Ukuran file maksimal 100Kb. Format file: jpg, jpeg, png)</li>\n<li><strong>Scan surat keterangan tidak buta warna</strong><br />(khusus yg memilih jurusan Kedokteran dan Desain).</li>\n</ul>', '2013-06-12 01:09:20'),
(4, 'alamat', 'alamat', '<p><strong>KAMPUS I</strong></p>\n<p>Jl. Letjen S. Parman No.1<br />Jakarta Barat 11440<br />Telp.: (021) 567 1747, 5695 8747<br />Fax.: (021) 560 4478, 5695 8738</p>\n<p><strong>KAMPUS II </strong></p>\n<p>Jl. Tanjung Duren Utara No.1<br />Jakarta Barat 11470<br />Telp.: (021) 565 5507, 08, 09, 10<br />Fax.: (021) 565 5521</p>', '2013-06-13 00:33:01'),
(5, 'jalur-pu', 'Jalur Prestasi Unggulan (JPU)', '<p><strong>TAHUN AKADEMIK 2013/2014</strong><br /><strong><br />Pendaftaran:&nbsp;&nbsp;</strong><span><strong>27 Agustus 2012 s.d. 30 September 2012</strong></span><br /><strong>Proses seleksi:&nbsp;&nbsp;</strong><span><strong>1 s.d. 5 Oktober 2012</strong></span><br /><strong>Pengumuman hasil seleksi:&nbsp;&nbsp;</strong><span><strong>12 Oktober 2012</strong></span></p>\n<p><em><strong>TUJUAN</strong></em><br /><br /><strong>Jalur Prestasi Unggulan (JPU) merupakan program penerimaan mahasiswa baru Universitas Tarumanagara (Untar) yang bertujuan memberikan kesempatan beasiswa penuh bagi siswa SMA yang berkelakuan baik dan berprestasi terbaik di sekolah untuk mengembangkan diri menjadi mahasiswa unggulan di Universitas Tarumanagara.</strong></p>\n<p><em><strong>PILIHAN PROGRAM STUDI</strong></em><strong><br /></strong></p>\n<p><strong>Program studi yang ditawarkan di Jalur Prestasi Unggulan (JPU) adalah:</strong></p>\n<ol>\n<li><strong>Manajemen Bisnis</strong></li>\n<li><strong>Akuntansi Bisnis</strong></li>\n<li><strong>Ilmu Hukum</strong></li>\n<li><strong>Arsitektur</strong></li>\n<li><strong>Perencanaan Kota &amp; Real Estat</strong></li>\n<li><strong>Teknik Sipil</strong></li>\n<li><strong>Teknik Mesin</strong></li>\n<li><strong>Teknik Elektro</strong></li>\n<li><strong>Teknik Industri</strong></li>\n<li><strong>Kedokteran (Pendidikan Dokter)</strong></li>\n<li><strong>Ilmu Psikologi</strong></li>\n<li><strong>Teknik Informatika</strong></li>\n<li><strong>Sistem Informasi Bisnis</strong></li>\n<li><strong>Desain Interior</strong></li>\n<li><strong>Desain Komunikasi Visual</strong></li>\n<li><strong>Ilmu Komunikasi</strong></li>\n</ol>\n<p><em><strong>PERSYARATAN</strong></em><strong><br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br />&nbsp;&nbsp;&nbsp;&nbsp; -&nbsp; Siswa SMA yang saat ini duduk di kelas XII dan mendapatkan peringkat terbaik (peringkat satu sampai tiga) di sekolah selama di<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; kelas X dan kelas XI.<br />&nbsp;&nbsp;&nbsp;&nbsp; -&nbsp; Khusus calon yang memilih program studi&nbsp;<span>Kedokteran&nbsp;</span>dipersyaratkan berasal dari SMA&nbsp;jurusan IPA.<br />&nbsp;&nbsp;&nbsp;&nbsp; -&nbsp; Lolos tes psikologi dan wawancara yang diadakan oleh Panitia Penerimaan Mahasiswa Baru Untar.<br />&nbsp;&nbsp;&nbsp;&nbsp; -&nbsp; Gratis pendaftaran &amp; terbatas pada SMA-SMA yang diundang<br /><br /></strong><em><strong>PROSEDUR PENDAFTARAN</strong></em></p>\n<ol>\n<li><strong>Universitas Tarumanagara mengundang siswa-siswi terbaik di SMA-SMA terpilih melalui Kepala Sekolah masing-masing.</strong></li>\n<li><strong>Kepala Sekolah (atau Guru BP/BK) menginformasikan dan menawarkan program JPU Untar kepada siswa-siswinya yang berprestasi terbaik (peringkat satu sampai tiga) di sekolah masing-masing.</strong></li>\n<li><strong>Siswa memperoleh formulir pendaftaran (tidak dapat digandakan) dari Kepala Sekolah (atau Guru BP/BK) masing-masing.</strong></li>\n<li><strong>Siswa mengisi formulir pendaftaran secara lengkap yang juga diketahui dan ditandatangani oleh orang tua/wali.</strong></li>\n<li><strong>Melampirkan Surat Rekomendasi dari Kepala Sekolah yang menyatakan siswa benar-benar memperoleh peringkat satu sampai tiga sekolah.</strong></li>\n<li><strong>Melampirkan fotokopi rapor setiap semester kelas X dan kelas XI yang telah dilegalisasi oleh Kepala Sekolah yang bersangkutan.</strong></li>\n<li><strong>Melampirkan 1 lembar pasfoto berwarna terbaru ukuran 3 x 4 cm.</strong></li>\n<li><strong>Melampirkan fotokopi rekening pembayaran listrik 3 bulan terakhir.</strong></li>\n<li><strong>Melampirkan fotokopi kartu keluarga.</strong></li>\n<li><strong>Khusus calon yang memilih program studi&nbsp;<span>Arsitektur, Kedokteran, Desain Interior, dan Desain Komunikasi Visual</span><span>&nbsp;</span>dipersyaratkan<span>TIDAK BUTA WARNA</span>&nbsp;dengan melampirkan FOTOKOPI surat keterangan Dokter.</strong></li>\n<li><strong>Mengembalikan/mengirimkan formulir pendaftaran dan seluruh lampiran yang diminta secara lengkap ke:<br />&nbsp;<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; KANTOR ADMISI UNIVERSITAS TARUMANAGARA<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Kampus I Gedung Utama lantai 2<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Jl. Letjen. S. Parman No. 1 Jakarta Barat 11440<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Telepon: (021) 5695 8723 (hunting)&nbsp; Faksimili: (021) 568 4057&nbsp;</span></strong></li>\n</ol>\n<p><strong>Catatan:<br />Pendaftar akan melalui proses seleksi, tes psikologi dan wawancara.&nbsp;<br />Jumlah siswa yang diterima akan disesuaikan dengan kapasitas/daya tampung program studi serta dana beasiswa yang disediakan.</strong></p>', '2013-06-13 02:12:12'),
(6, 'fak-ekonomi', 'Fakultas Ekonomi', '<p>halaman informasi fakultas ekonomi.</p>', '2013-06-13 02:18:55'),
(7, 'jalur-pp', 'Jalur PP', '<p>jalur-pp</p>', '2013-06-17 18:14:17');

-- --------------------------------------------------------

--
-- Table structure for table `t_statuskelulusan`
--

DROP TABLE IF EXISTS `t_statuskelulusan`;
CREATE TABLE IF NOT EXISTS `t_statuskelulusan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_registrasi` char(5) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Truncate table before insert `t_statuskelulusan`
--

TRUNCATE TABLE `t_statuskelulusan`;
-- --------------------------------------------------------

--
-- Table structure for table `t_statusnikah`
--

DROP TABLE IF EXISTS `t_statusnikah`;
CREATE TABLE IF NOT EXISTS `t_statusnikah` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Truncate table before insert `t_statusnikah`
--

TRUNCATE TABLE `t_statusnikah`;
--
-- Dumping data for table `t_statusnikah`
--

INSERT INTO `t_statusnikah` (`id`, `status`) VALUES
(1, 'Menikah'),
(2, 'Belum Menikah'),
(3, 'Cerai / Duda / Janda');

-- --------------------------------------------------------

--
-- Table structure for table `t_sumberbiaya`
--

DROP TABLE IF EXISTS `t_sumberbiaya`;
CREATE TABLE IF NOT EXISTS `t_sumberbiaya` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sumber_biaya` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Truncate table before insert `t_sumberbiaya`
--

TRUNCATE TABLE `t_sumberbiaya`;
--
-- Dumping data for table `t_sumberbiaya`
--

INSERT INTO `t_sumberbiaya` (`id`, `sumber_biaya`) VALUES
(1, 'Orang tua'),
(2, 'Wali'),
(3, 'Sendiri'),
(4, 'Lain-lain');

-- --------------------------------------------------------

--
-- Table structure for table `t_syaratpendaftaran`
--

DROP TABLE IF EXISTS `t_syaratpendaftaran`;
CREATE TABLE IF NOT EXISTS `t_syaratpendaftaran` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `syarat` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Truncate table before insert `t_syaratpendaftaran`
--

TRUNCATE TABLE `t_syaratpendaftaran`;
--
-- Dumping data for table `t_syaratpendaftaran`
--

INSERT INTO `t_syaratpendaftaran` (`id`, `syarat`) VALUES
(1, 'Foto'),
(2, 'Ijazah Pendidikan Terakhir');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
