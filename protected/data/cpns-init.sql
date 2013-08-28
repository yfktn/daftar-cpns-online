-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 28, 2013 at 04:20 PM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT=0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cpns`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_formasi`
--

CREATE TABLE IF NOT EXISTS `tbl_formasi` (
  `id` char(32) NOT NULL COMMENT 'hasil md5 dari 4 foreign key',
  `id_instansi` varchar(10) NOT NULL,
  `id_tenaga_dilamar` varchar(10) NOT NULL,
  `id_jabatan` varchar(10) NOT NULL,
  `id_kual_pend` varchar(10) NOT NULL,
  `tahun_test` int(4) DEFAULT '0' COMMENT 'tahun test',
  `IPK` float DEFAULT '0' COMMENT 'IPK/rata-rata bila diset sebagai 0 maka tidak berlaku ... ',
  `kode_formasi` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_tbl_formasi_tbl_master_kual_pend1_idx` (`id_kual_pend`),
  KEY `fk_tbl_formasi_tbl_master_jabatan1_idx` (`id_jabatan`),
  KEY `fk_tbl_formasi_tbl_master_tenaga_dilamar1_idx` (`id_tenaga_dilamar`),
  KEY `fk_tbl_formasi_tbl_master_instansi1_idx` (`id_instansi`),
  KEY `kode_formasi` (`kode_formasi`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_formasi`
--

INSERT INTO `tbl_formasi` (`id`, `id_instansi`, `id_tenaga_dilamar`, `id_jabatan`, `id_kual_pend`, `tahun_test`, `IPK`, `kode_formasi`) VALUES
('30124c702b201b62423e3a7a197403c5', 'KALTENG', 'TEKNIS', 'PHPI', 'S1PR', 2013, 0, NULL),
('3ea81f799752c8304815af09efde158d', 'BARTIM', 'Kesehatan', 'BNHIKAN', 'S1PR', 2013, 0, NULL),
('d6c9f068b76a7dc5d34d812ae6072df4', 'KALTENG', 'Kesehatan', 'DRORT', 'SPORT', 2013, 0, NULL),
('db12898042ec3f850e84322686e3ea34', 'KALTENG', 'Kesehatan', 'DRKK', 'SKK', 2013, 0, NULL),
('dd9dadae914e3d7dbd068b3cef05b670', 'KALTENG', 'Kesehatan', 'DRSPE', 'SPJPD', 2013, 0, NULL),
('ea6311d9aa32e41a2073bbcfa11341c6', 'KALTENG', 'TEKNIS', 'BNHIKAN', 'D3PER', 2013, 0, NULL),
('ef65a1a0134f17f7a2a672dcae646de0', 'KALTENG', 'TEKNIS', 'BNHIKAN', 'S1PR', 2013, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_lokasi_test`
--

CREATE TABLE IF NOT EXISTS `tbl_lokasi_test` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(150) NOT NULL,
  `alamat` varchar(400) DEFAULT NULL,
  `id_instansi` varchar(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_tbl_lokasi_test_tbl_master_instansi1_idx` (`id_instansi`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_master_instansi`
--

CREATE TABLE IF NOT EXISTS `tbl_master_instansi` (
  `id` varchar(10) NOT NULL,
  `nama` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='provinsi/kab/kota';

--
-- Dumping data for table `tbl_master_instansi`
--

INSERT INTO `tbl_master_instansi` (`id`, `nama`) VALUES
('BARTIM', 'Kabupaten Barito Timur'),
('KALTENG', 'Provinsi Kalimantan Tengah'),
('KOTIM', 'Kotawaringin Timur');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_master_jabatan`
--

CREATE TABLE IF NOT EXISTS `tbl_master_jabatan` (
  `id` varchar(10) NOT NULL,
  `nama` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='jabatan jabatan ....';

--
-- Dumping data for table `tbl_master_jabatan`
--

INSERT INTO `tbl_master_jabatan` (`id`, `nama`) VALUES
('BNHIKAN', 'Pengawas Benih Ikan'),
('DRKK', 'Dokter Spesialis Kulit dan Kelamin '),
('DRORT', 'Dokter Spesialis Orthopedi '),
('DRSPE', 'Dokter Spesialis Jantung dan Pembuluh Darah'),
('MDKVET', 'Medik Veteriner '),
('PHPI', 'Pengendali Hama dan Penyakit Ikan '),
('test', 'test hapus');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_master_kual_pend`
--

CREATE TABLE IF NOT EXISTS `tbl_master_kual_pend` (
  `id` varchar(10) NOT NULL,
  `nama` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_master_kual_pend`
--

INSERT INTO `tbl_master_kual_pend` (`id`, `nama`) VALUES
('D3PER', 'D.III Perikanan '),
('DRHW', 'Dokter Hewan '),
('S1PR', 'S.1 Perikanan '),
('SKK', 'Spesialis Kulit dan Kelamin '),
('SPJPD', 'Spesialis Jantung dan Pembuluh Darah '),
('SPORT', 'Spesialis Orthopedi ');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_master_pend_terakhir`
--

CREATE TABLE IF NOT EXISTS `tbl_master_pend_terakhir` (
  `id` varchar(10) NOT NULL,
  `nama` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_master_pend_terakhir`
--

INSERT INTO `tbl_master_pend_terakhir` (`id`, `nama`) VALUES
('01', 'Sarjana S1'),
('02', 'Sarjana S2'),
('03', 'Diploma 3');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_master_tenaga_dilamar`
--

CREATE TABLE IF NOT EXISTS `tbl_master_tenaga_dilamar` (
  `id` varchar(10) NOT NULL,
  `nama` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='tenaga dilamar : tenaga guru, tenaga teknis, tenaga kesehatan dll (grouping dari formasi)';

--
-- Dumping data for table `tbl_master_tenaga_dilamar`
--

INSERT INTO `tbl_master_tenaga_dilamar` (`id`, `nama`) VALUES
('Kesehatan', 'Tenaga Kesehatan'),
('TEKNIS', 'Tenaga Teknis');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pendaftar`
--

CREATE TABLE IF NOT EXISTS `tbl_pendaftar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `no_ktp` varchar(45) NOT NULL,
  `nama` varchar(60) NOT NULL,
  `alamat_sekarang` varchar(400) NOT NULL,
  `no_hp` varchar(25) NOT NULL,
  `jenis_kelamin` enum('1','2') NOT NULL,
  `tahun_lulus` int(4) NOT NULL,
  `jurusan` varchar(300) NOT NULL COMMENT 'Entry nama jurusan pelamar',
  `IPK` float NOT NULL,
  `nama_sekolah_terakhir` varchar(300) NOT NULL COMMENT 'nama sekolah',
  `alamat_sekolah_terakhir` varchar(400) NOT NULL COMMENT 'Alamat Sekolah',
  `tempat_lahir` varchar(45) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `create_time` datetime DEFAULT NULL,
  `update_time` datetime DEFAULT NULL,
  `terverifikasi` tinyint(1) DEFAULT '0',
  `id_verifikator` int(11) DEFAULT NULL,
  `kode_verifikasi` varchar(45) NOT NULL,
  `id_instansi` varchar(10) DEFAULT NULL,
  `id_tenaga_dilamar` varchar(10) DEFAULT NULL,
  `id_jabatan` varchar(10) DEFAULT NULL,
  `id_formasi` char(32) NOT NULL,
  `id_kual_pend` varchar(10) DEFAULT NULL,
  `id_pendidikan_terakhir` varchar(10) NOT NULL,
  `id_lokasi_test` int(11) DEFAULT NULL,
  `id_status_pelamar` varchar(2) DEFAULT NULL,
  `tahun_test` int(4) DEFAULT '2013' COMMENT 'Tahun saat test!',
  `nama_instansi` varchar(150) DEFAULT NULL,
  `nama_tenaga_dilamar` varchar(45) DEFAULT NULL,
  `nama_jabatan` varchar(150) DEFAULT NULL,
  `nama_kual_pend` varchar(150) DEFAULT NULL,
  `nama_pendidikan_terakhir` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `no_ktp_UNIQUE` (`no_ktp`),
  UNIQUE KEY `kode_verifikasi_UNIQUE` (`kode_verifikasi`),
  KEY `fk_tbl_pendaftar_tbl_master_pend_terakhir1_idx` (`id_pendidikan_terakhir`),
  KEY `fk_tbl_pendaftar_tbl_formasi1_idx` (`id_formasi`),
  KEY `fk_tbl_pendaftar_tbl_lokasi_test1_idx` (`id_lokasi_test`),
  KEY `id_status_pelamar` (`id_status_pelamar`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='pendaftar CPNS' AUTO_INCREMENT=20 ;

--
-- Dumping data for table `tbl_pendaftar`
--

INSERT INTO `tbl_pendaftar` (`id`, `no_ktp`, `nama`, `alamat_sekarang`, `no_hp`, `jenis_kelamin`, `tahun_lulus`, `jurusan`, `IPK`, `nama_sekolah_terakhir`, `alamat_sekolah_terakhir`, `tempat_lahir`, `tanggal_lahir`, `create_time`, `update_time`, `terverifikasi`, `id_verifikator`, `kode_verifikasi`, `id_instansi`, `id_tenaga_dilamar`, `id_jabatan`, `id_formasi`, `id_kual_pend`, `id_pendidikan_terakhir`, `id_lokasi_test`, `id_status_pelamar`, `tahun_test`, `nama_instansi`, `nama_tenaga_dilamar`, `nama_jabatan`, `nama_kual_pend`, `nama_pendidikan_terakhir`) VALUES
(1, '456BCDASDD', 'abc', 'test', '0812345679', '1', 2013, 'Kedokteran', 3.1, 'STMIK', 'Jl. G. Obos', 'test', '1994-07-14', '2013-08-28 19:00:09', '2013-08-28 19:00:09', 0, NULL, 'AABCKUWOKI', 'KALTENG', 'Kesehatan', 'DRORT', 'd6c9f068b76a7dc5d34d812ae6072df4', 'SPORT', '01', NULL, NULL, 2013, 'Provinsi Kalimantan Tengah', 'Tenaga Kesehatan', 'Dokter Spesialis Orthopedi ', 'Spesialis Orthopedi ', 'Sarjana S1'),
(2, '12345ABDF', 'Test', 'Cendrawasih', 'test', '2', 2011, 'Sarjana Komputer Matematika', 3, 'STMIK', 'Jl. G. Obos', 'test', '1993-02-14', '2013-08-28 20:16:30', '2013-08-28 20:17:42', 0, NULL, 'TESTPOKOYAQUJA', 'BARTIM', 'Kesehatan', 'BNHIKAN', '3ea81f799752c8304815af09efde158d', 'S1PR', '02', NULL, 'TR', 2013, 'Kabupaten Barito Timur', 'Tenaga Kesehatan', 'Pengawas Benih Ikan', 'S.1 Perikanan ', 'Sarjana S2');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_prasarat`
--

CREATE TABLE IF NOT EXISTS `tbl_prasarat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_instansi` varchar(10) NOT NULL,
  `tahun` int(4) unsigned NOT NULL,
  `prasarat` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_tbl_prasarat_1_idx` (`id_instansi`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_prasarat`
--

INSERT INTO `tbl_prasarat` (`id`, `id_instansi`, `tahun`, `prasarat`) VALUES
(1, 'KALTENG', 2013, 'array(\r\n    ''umurMaksimal''=>35,\r\n    ''umurMinimal''=>18,    /* tetapkan usia minimal */\r\n    ''patokanTanggal''=>''2013-12-30'',    /* tanggal patokan umur yyyy-mm-dd */\r\n    ''IPK''=>array(         /* tetapkan setting IPK minimal masing2 pendidikan akhir */\r\n   ''01''=>3, /* IPK minimal Sarjana S1 */\r\n   ''02''=>3, /* IPK minimal Sarjana S2 */\r\n   ''03''=>3, /* IPK minimal Diploma 3 */\r\n),\r\n)'),
(2, 'BARTIM', 2013, 'array(\r\n    ''umurMaksimal''=>35,   /* tetapkan usia maksimal */\r\n    ''umurMinimal''=>18,    /* tetapkan usia minimal */\r\n    ''patokanTanggal''=>''2013-12-01'',    /* tanggal patokan umur yyyy-mm-dd */\r\n    ''IPK''=>array(         /* tetapkan setting IPK minimal masing2 pendidikan akhir */\r\n   ''01''=>3, /* IPK minimal Sarjana S1 */\r\n   ''02''=>3, /* IPK minimal Sarjana S2 */\r\n   ''03''=>3, /* IPK minimal Diploma 3 */\r\n),\r\n)');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_status_pelamar`
--

CREATE TABLE IF NOT EXISTS `tbl_status_pelamar` (
  `id` varchar(2) NOT NULL,
  `nama` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_status_pelamar`
--

INSERT INTO `tbl_status_pelamar` (`id`, `nama`) VALUES
('BV', 'Belum Diverifikasi'),
('TL', 'Di Tolak'),
('TR', 'Diterima');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tester_kode_verifikasi`
--

CREATE TABLE IF NOT EXISTS `tbl_tester_kode_verifikasi` (
  `tester` varchar(20) NOT NULL,
  PRIMARY KEY (`tester`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE IF NOT EXISTS `tbl_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(45) NOT NULL,
  `salt_key` varchar(10) DEFAULT NULL,
  `password` char(32) NOT NULL,
  `id_instansi` varchar(10) NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `level` varchar(20) NOT NULL,
  `last_login_IP` varchar(20) DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `update_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_tbl_user_tbl_master_instansi1_idx` (`id_instansi`),
  KEY `the_level_idx` (`level`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `user_name`, `salt_key`, `password`, `id_instansi`, `last_login`, `level`, `last_login_IP`, `create_time`, `update_time`) VALUES
(1, 'sadmin', 'abcde', '985ae3acc7684c692870900af17ab160', 'KALTENG', '2013-08-28 14:03:26', 'SuperAdmin', '127.0.0.1', NULL, '2013-08-28 09:00:08'),
(2, 'admin-kalteng', '21c91dbb19', 'dda0fa49d71ef1ca67ff68f301acd75d', 'KALTENG', NULL, 'Admin', NULL, '2013-08-27 18:47:39', '2013-08-27 19:17:46'),
(3, 'op-kalteng', '21c9df381a', '66dc6b6e0bbfda976793dc841f4ceeeb', 'KALTENG', '2013-08-28 14:04:03', 'Operator', '127.0.0.1', '2013-08-27 19:39:15', '2013-08-28 19:03:50'),
(5, 'op-bartim', '21cb89a19e', 'f0498f996f1997e6c44007ac7e1cd6a3', 'BARTIM', '2013-08-28 14:07:43', 'Operator', '127.0.0.1', '2013-08-27 21:32:58', '2013-08-27 21:32:58'),
(6, 'admin-bartim', '21cb8e9915', '53ed7e1bd172987efb066b421ae25ece', 'BARTIM', '2013-08-28 15:17:22', 'Admin', '127.0.0.1', '2013-08-27 21:34:17', '2013-08-27 21:34:17');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_formasi`
--
ALTER TABLE `tbl_formasi`
  ADD CONSTRAINT `fk_tbl_formasi_tbl_master_instansi1` FOREIGN KEY (`id_instansi`) REFERENCES `tbl_master_instansi` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_tbl_formasi_tbl_master_jabatan1` FOREIGN KEY (`id_jabatan`) REFERENCES `tbl_master_jabatan` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_tbl_formasi_tbl_master_kual_pend1` FOREIGN KEY (`id_kual_pend`) REFERENCES `tbl_master_kual_pend` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_tbl_formasi_tbl_master_tenaga_dilamar1` FOREIGN KEY (`id_tenaga_dilamar`) REFERENCES `tbl_master_tenaga_dilamar` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `tbl_lokasi_test`
--
ALTER TABLE `tbl_lokasi_test`
  ADD CONSTRAINT `fk_tbl_lokasi_test_tbl_master_instansi1` FOREIGN KEY (`id_instansi`) REFERENCES `tbl_master_instansi` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `tbl_pendaftar`
--
ALTER TABLE `tbl_pendaftar`
  ADD CONSTRAINT `fk_tbl_pendaftar_tbl_formasi1` FOREIGN KEY (`id_formasi`) REFERENCES `tbl_formasi` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_tbl_pendaftar_tbl_master_pend_terakhir1` FOREIGN KEY (`id_pendidikan_terakhir`) REFERENCES `tbl_master_pend_terakhir` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_pendaftar_ibfk_1` FOREIGN KEY (`id_lokasi_test`) REFERENCES `tbl_lokasi_test` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_pendaftar_ibfk_2` FOREIGN KEY (`id_status_pelamar`) REFERENCES `tbl_status_pelamar` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `tbl_prasarat`
--
ALTER TABLE `tbl_prasarat`
  ADD CONSTRAINT `fk_tbl_prasarat_1` FOREIGN KEY (`id_instansi`) REFERENCES `tbl_master_instansi` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD CONSTRAINT `fk_tbl_user_tbl_master_instansi1` FOREIGN KEY (`id_instansi`) REFERENCES `tbl_master_instansi` (`id`) ON UPDATE CASCADE;
SET FOREIGN_KEY_CHECKS=1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
