-- phpMyAdmin SQL Dump
-- version 4.0.0
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 16, 2013 at 01:29 AM
-- Server version: 5.5.31-0ubuntu0.13.04.1
-- PHP Version: 5.4.9-4ubuntu2

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `t_akun`
--

INSERT INTO `t_akun` (`id`, `nama_akun`, `email`, `password`, `created_at`, `role`, `status`) VALUES
(1, 'ngadmin', 'ngadmin@untar.ac.id', 'ac43724f16e9241d990427ab7c8f4228', '2013-04-16 17:44:32', 'admin', '1'),
(3, 'admin1', 'admin@gmail.com', 'ac43724f16e9241d990427ab7c8f4228', '2013-04-16 17:57:42', 'admin', '1'),
(4, 'Heri Gunawan B', 'user@biasa.com', '827ccb0eea8a706c4c34a16891f84e7b', '2013-04-17 17:14:49', 'user', '1'),
(5, 'saya bukan admin', 'admin@biasa.com', '5f4dcc3b5aa765d61d8327deb882cf99', '2013-04-17 17:15:02', 'user', '0'),
(8, 'heri gunawan', 'daftarjadiadmin@gmail.com', 'ac43724f16e9241d990427ab7c8f4228', '2013-05-14 09:58:03', 'user', '1');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `t_banksoal`
--

INSERT INTO `t_banksoal` (`id`, `id_prodi`, `id_pelajaran`, `isi_soal`, `isi_pilihan_a`, `isi_pilihan_b`, `isi_pilihan_c`, `isi_pilihan_d`, `jawaban`, `no_urut`, `tingkat`) VALUES
(2, 0, 4, '<p>Dari sekelompok anak terdapat 15 anak gemar bulu tangkis, 20 anak gemar tenis meja, dan 12 anak gemar keduanya. Jumlah anak dalam kelompok tersebut adalah...</p>', '17 anak', '23 anak', '35 anak', '47 anak', 'b', 2, 2),
(3, 0, 4, '<p>Jika 3x<sup>2</sup> + 4y = -10 dan 4x<sup>2</sup> - 5y = -34, maka nilai dari 8x<sup>2</sup> + 3y adalah ...</p>', '-54', '-42', '42', '54', 'c', 0, 3),
(4, 0, 4, '<p>berapakah nilai dari 12<sup>2&nbsp;</sup>= ...</p>', '123', '456', '789', '890', 'b', 1, 1),
(6, 0, 4, '<p>&radic;144 +&nbsp;&radic;256 = ...</p>', '1', '2', '3', '4', 'b', NULL, 1),
(7, 0, 1, '<p>Dari manakah manusia berasal...</p>', 'Tanah', 'Air', 'Udara', 'Api', 'a', NULL, 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `t_grade`
--

INSERT INTO `t_grade` (`id`, `nama_grade`, `nilai_min`, `nilai_max`) VALUES
(1, 'I', 85, 100),
(2, 'II', 65, 84),
(3, 'III', 40, 64),
(4, 'IV', 0, 39);

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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `t_ortu`
--

INSERT INTO `t_ortu` (`id`, `id_provinsi`, `id_pendidikan`, `id_pekerjaan`, `nama`, `tanggal_lahir`, `alamat`, `kelurahan`, `rt`, `rw`, `kota`, `kode_pos`, `telp`, `is_ortu`) VALUES
(3, 2, 6, 1, 'H. Drs. Surata', '1952-11-11', 'Jl Lemah Hegar Timur No. 17', 'Sukapura', '04', '04', 'Bandung', '40285', '0227334332', 'ayah');

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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `t_pelajaran`
--

INSERT INTO `t_pelajaran` (`id`, `kd_pel`, `nama_pel`, `kriteria`) VALUES
(1, 'IPA', 'Ilmu Pengetahuan Alam', 50),
(2, 'IPS', 'Ilmi Pengetahuan Sosial', 55),
(3, 'ING', 'Bahasa Inggris', 40),
(4, 'MTK', 'Matematika', 50),
(5, 'IND', 'Bahasa Indonesia', 60);

-- --------------------------------------------------------

--
-- Table structure for table `t_pembayaran`
--

DROP TABLE IF EXISTS `t_pembayaran`;
CREATE TABLE IF NOT EXISTS `t_pembayaran` (
  `id` int(11) NOT NULL,
  `payment_method` varchar(20) NOT NULL,
  `payment_to` varchar(50) NOT NULL,
  `payment_date` date NOT NULL,
  `desc` text NOT NULL,
  `attachment` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_akun` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `nama_per` varchar(10) NOT NULL,
  `id_jalur` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `t_periode`
--

INSERT INTO `t_periode` (`id`, `nama_per`, `id_jalur`) VALUES
(1, '2013/2014', 1),
(2, '2014/2015', 2);

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
  `nomor_ujian` varchar(50) NOT NULL,
  `is_verified` char(1) NOT NULL DEFAULT '0',
  `pil_1` int(11) NOT NULL,
  `pil_2` int(11) NOT NULL,
  `id_jalur` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='tabel data pribadi' AUTO_INCREMENT=5 ;

--
-- Dumping data for table `t_pribadi`
--

INSERT INTO `t_pribadi` (`id`, `id_user`, `id_provinsi`, `id_jenkel`, `id_agama`, `id_nikah`, `id_sumber`, `id_kwn`, `id_ortu`, `id_sekolah`, `nama`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `kelurahan`, `rt`, `rw`, `kota`, `kode_pos`, `telp`, `hp`, `email`, `foto`, `ttd_1`, `ttd_2`, `nomor_ujian`, `is_verified`, `pil_1`, `pil_2`, `id_jalur`) VALUES
(4, 4, 1, 1, 3, 1, 3, 1, 3, 3, 'Heri Gunawan Budiyanto', 'Bandung', '1985-12-30', 'Gg H. Abdulrahiim no.7', 'Sukapura', '04', '04', 'Bandung', '40285', '0227334332', '08562070196', 'ngadmin@untar.ac.id', 'Heri_Gunawan_B.jpg', '', '', '', '1', 2, 4, 2);

-- --------------------------------------------------------

--
-- Table structure for table `t_prodi`
--

DROP TABLE IF EXISTS `t_prodi`;
CREATE TABLE IF NOT EXISTS `t_prodi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kd_prodi` char(5) NOT NULL,
  `nama_prodi` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `t_prodi`
--

INSERT INTO `t_prodi` (`id`, `kd_prodi`, `nama_prodi`) VALUES
(1, '111', 'S1 Manajen Bisnis'),
(2, '121', 'S1 Akuntansi Bisnis'),
(3, '201', 'S1 Ilmu Hukum'),
(4, '301', 'S1 Arsitektur');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `t_ruangujian`
--

INSERT INTO `t_ruangujian` (`id`, `id_pelajaran`, `nama_ruang`, `lokasi`, `kapasitas`) VALUES
(1, 3, 'R.101', '-', 40),
(2, 1, '100', '-', 40),
(3, 1, '101', '-', 40),
(4, 2, '100', '-', 40);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `t_sekolahasal`
--

INSERT INTO `t_sekolahasal` (`id`, `id_sekolah`, `id_jurusan`, `tahun_lulus`) VALUES
(3, 1, '2', '2004');

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
-- Dumping data for table `t_syaratpendaftaran`
--

INSERT INTO `t_syaratpendaftaran` (`id`, `syarat`) VALUES
(1, 'Foto'),
(2, 'Ijazah Pendidikan Terakhir');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
