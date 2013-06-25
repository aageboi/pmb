-- phpMyAdmin SQL Dump
-- version 4.0.0
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 25, 2013 at 09:12 AM
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='tabel data pribadi' AUTO_INCREMENT=6 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
