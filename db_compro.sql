-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 03, 2022 at 03:27 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_compro`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_dokter`
--

CREATE TABLE `tb_dokter` (
  `d_id` int(11) NOT NULL,
  `d_mail` varchar(30) DEFAULT NULL,
  `d_pass` varchar(255) DEFAULT NULL,
  `d_fullname` varchar(30) DEFAULT NULL,
  `d_bday` date DEFAULT NULL,
  `d_gender` enum('','LAKI - LAKI','PEREMPUAN') DEFAULT NULL,
  `d_image` text DEFAULT NULL,
  `d_poli` varchar(25) DEFAULT NULL,
  `d_moto` text DEFAULT NULL,
  `d_phone` varchar(20) DEFAULT NULL,
  `permalink` varchar(255) DEFAULT NULL,
  `d_status` enum('ACTIVE','NOT ACTIVE') DEFAULT NULL,
  `r_last_login` datetime DEFAULT NULL,
  `created_on` datetime DEFAULT NULL,
  `created_by` varchar(25) DEFAULT NULL,
  `modified_on` datetime DEFAULT NULL,
  `modified_by` varchar(25) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_dokter`
--

INSERT INTO `tb_dokter` (`d_id`, `d_mail`, `d_pass`, `d_fullname`, `d_bday`, `d_gender`, `d_image`, `d_poli`, `d_moto`, `d_phone`, `permalink`, `d_status`, `r_last_login`, `created_on`, `created_by`, `modified_on`, `modified_by`) VALUES
(8, 'dokter1@gmail.com', 'ba248c985ace94863880921d8900c53f', 'Prof. DR. Herdiman T. Pohan, S', '2020-01-01', 'LAKI - LAKI', '15789443991.jpg', 'P01', 'Melayani sepenuh hati, bekerja dengan hati nurani', '232323', 'prof-dr-herdiman-t-pohan-sppd-kpti-dtmh', 'ACTIVE', '2022-08-03 03:08:39', '2019-12-10 03:27:47', 'root', '2020-01-17 07:58:46', 'root'),
(9, 'doktermail@123.com', 'ba248c985ace94863880921d8900c53f', 'Prof. Dr. Siti Setiati, Sp.PD,', '2020-01-03', 'LAKI - LAKI', '2.jpg', 'P02', 'Melayani sepenuh hati, bekerja dengan hati nurani', '232322', 'prof-dr-siti-setiati-sppd-kger-mepid', 'ACTIVE', '2020-01-13 21:30:02', '2019-12-10 03:27:47', 'root', '2020-01-17 07:59:01', 'root'),
(10, 'email3@gmail.com', '', 'DR. Syamsul', '2020-01-04', 'LAKI - LAKI', '3.jpg', 'P04', 'Melayani sepenuh hati, bekerja dengan hati nurani', '121223', 'dr-syamsul', 'ACTIVE', NULL, '2019-12-10 03:27:47', 'root', '2020-01-17 07:59:35', 'root');

-- --------------------------------------------------------

--
-- Table structure for table `tb_histori_maintenance`
--

CREATE TABLE `tb_histori_maintenance` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status` enum('Mulai','Selesai') NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_histori_maintenance`
--

INSERT INTO `tb_histori_maintenance` (`id`, `status`, `created_at`) VALUES
(1, 'Selesai', '2022-08-02 23:51:51');

-- --------------------------------------------------------

--
-- Table structure for table `tb_identitas`
--

CREATE TABLE `tb_identitas` (
  `c_id` int(11) NOT NULL,
  `c_name` varchar(200) DEFAULT NULL,
  `c_value` text DEFAULT NULL,
  `c_img` varchar(255) DEFAULT NULL,
  `ordering` int(11) DEFAULT NULL,
  `created_on` datetime DEFAULT NULL,
  `created_by` varchar(100) DEFAULT NULL,
  `modified_on` datetime DEFAULT NULL,
  `modified_by` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_identitas`
--

INSERT INTO `tb_identitas` (`c_id`, `c_name`, `c_value`, `c_img`, `ordering`, `created_on`, `created_by`, `modified_on`, `modified_by`) VALUES
(1, 'judul', 'PUSKESMAS SUMBUL', NULL, NULL, NULL, NULL, '2019-12-10 12:41:37', 'root'),
(2, 'logo', 'logo.png', NULL, NULL, NULL, NULL, '2020-01-12 11:57:36', 'root'),
(3, 'footer', '2019 &copy; All Rights Reserved', NULL, NULL, NULL, NULL, NULL, NULL),
(5, 'contact', '<p style=\"text-align:center\"><u><span style=\"font-size:22px\"><strong>KONTAK</strong></span></u></p>\r\n\r\n<p style=\"text-align:center\">&nbsp;</p>\r\n\r\n<p style=\"text-align:center\">Telp. +62717-9106750 (IGD)<br />\r\nTelp. +62717-9106753<br />\r\nEmail : rsup@babelprov.go.id</p>\r\n\r\n<p style=\"text-align:center\">&nbsp;</p>\r\n\r\n<p style=\"text-align:center\">Jl. Zipur Desa Air Anyir Kec. Merawang-Kab. Bangka, Provinsi Kepulauan Bangka Belitung 33712</p>\r\n', NULL, 3, NULL, NULL, '2020-01-12 11:24:38', 'root'),
(132, 'banner', 'banner.jpg', NULL, NULL, NULL, NULL, '2020-01-12 12:09:06', 'root'),
(133, 'sejarah', '<p style=\"text-align:center\"><u><span style=\"font-size:22px\"><strong>SELAYANG PANDANG</strong></span></u></p>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\">Sebagaimana diketahui kehadiran RSUD Dr. (H.C.) Ir. SOEKARNO tidak terlepas dari sejarah pembentukan Provinsi Kepulauan Bangka Belitung yang berdiri berdasarkan Undang-undang Nomor 27 Tahun 2000 tentang pembentukan Provinsi Kepulauan Bangka Belitung. RSUD Dr.(H.C.) Ir. SOEKARNO sendiri dibangun sejak tahun 2009 menggunakan dana APBD dan APBN dengan luas tanah 225.032 m&sup2; dan luas bangunan 30.111 m&sup2;.</p>\r\n\r\n<p style=\"text-align:justify\">Gubernur Kepulauan Bangka Belitung, H. Eko Maulana Ali yang didampingi Ketua DPRD Kepulauan Bangka Belitung, HM. Munir Saleh pada tanggal 12 Agustus 2009 melakukan peletakan batu pertama pembangunan rumah sakit lima lantai. Soft Openingdilakukan pada 7 Desember 2012 dan diberi nama Rumah Sakit Umum Daerah Provinsi (RSUDP).</p>\r\n\r\n<p style=\"text-align:justify\">Berkaitan dengan perubahan nama rumah sakit yang mengusung nama Sang Proklamator, pertimbangannya adalah menghargai jasa dan perjuangan Presiden Republik Indonesia Pertama, Ir. Soekarno yang pernah diasingkan di Pulau Bangka. Setelah mendapat izin secara tertulis dari&nbsp; keluarga atau ahli waris yang dalam hal ini Ibu Megawati Soekarno Putri melalui surat tertulisnya tertanggal 6 Desember 2014, maka penggunaan nama ini tertuang dalam Keputusan Gubernur Kepulauan Bangka Belitung Nomor : 188.44/895.b/RSUDP/2014 Tanggal 31 Desember 2014 tentang Penetapan Nama Rumah Sakit Umum Daerah Provinsi Kepulauan Bangka Belitung.</p>\r\n\r\n<p style=\"text-align:justify\">Penggunaan logo RSUD Dr. (H.C.) Ir. SOEKARNO pun &nbsp;telah ditetapkan melalui Keputusan Gubernur Kepulauan Bangka Belitung Nomor : 188.44/761/RSUDP/2016 Tentang Penetapan Logo Rumah Sakit Umum Daerah Dr.(H.C.) Ir. SOEKARNO &nbsp;Tanggal 29 Agustus 2016.</p>\r\n\r\n<p style=\"text-align:justify\">RSUD Dr. (H.C) Ir. SOEKARNO telah mendapatkan izin operasional rumah sakit dengan Peraturan Bupati Bangka Nomor 441.7/01/OP.RS/BP2TPM/IV/2015 Tanggal 02 April 2015. Setelah melalui kerja keras dan perjuangan direktur serta semua pihak yang terlibat, maka akhirnya RSUD Dr. (H.C.) Ir. SOEKARNO, berhasil mendapatkan sertifikat penetapan Kelas C dari Kementerian Kesehatan berdasarkan Surat Keputusan Menteri Kesehatan Nomor : HK. 0203/I/0448/2015 tentang penetapan Kelas Rumah Sakit Umum Daerah Provinsi Kepulauan Bangka Belitung.</p>\r\n\r\n<p style=\"text-align:justify\">Sedangkan dasar hukum dan operasional keberadaan rumah sakit ini diatur Peraturan Daerah Nomor 3 Tahun 2013 tentang Organisasi dan Tata Kerja Rumah Sakit Umum Daerah Provinsi Kepulauan Bangka Belitung dan Peraturan Gubernur Kepulauan Bangka Belitung Nomor 60 tahun 2013 tentang Uraian Tugas dan Fungsi Rumah Sakit Umum Daerah Provinsi Kepulauan Bangka Belitung.</p>\r\n\r\n<p style=\"text-align:justify\">Alhamdullilah, di tahun 2016 RSUD Dr. (H.C) Ir. SOEKARNO telah lulus/memperoleh status Akreditasi Program Khusus dan disetujui oleh Pemerintah Provinsi Kepulauan Bangka Belitung sebagai Badan Layanan Umum Daerah (BLUD). Tentu saja ke depan nanti berbagai target pengembangan dan status akan terus diperjuangkan. Termasuk menjadi rumah sakit tipe B sebagaimana telah dicanangkan dalam visi dan misi.</p>\r\n', NULL, 3, NULL, NULL, '2020-01-12 11:24:02', 'root'),
(134, 'visi_misi', '<div class=\"field field-label-hidden field-name-body field-type-text-with-summary\">\r\n<div class=\"field-items\">\r\n<div class=\"even field-item\">\r\n<p style=\"text-align:center\"><span style=\"font-size:22px\"><u><strong>VISI</strong></u></span></p>\r\n\r\n<p style=\"text-align:justify\">RSUD Dr. (H.C.) Ir. SOEKARNO Provinsi Kepulauan Bangka Belitung adalah: &ldquo;<em>Menjadikan Rumah Sakit Umum Daerah Dr. (HC) Ir. Soekarno sebagai pusat rujukan terbaik dan terjangkau oleh masyarakat Provinsi Kepulauan Bangka Belitung yang mengedepankan pelayanan berbasis kolaborasi interprofesi secara holistik</em>&rdquo;.</p>\r\n\r\n<p style=\"text-align:justify\">Penjelasan: Diharapkan menjadi pusat rujukan terbaik dan terjangkau bagi &nbsp;rumah sakit lainnya yang ada di kabupaten/kota dalam wilayah Provinsi Kepulauan Bangka Belitung dan bisa melayani seluruh lapisan masyarakat dengan pelayanan kesehatan yang efisien, bermutu tinggi, dan profesional dengan dukungan inovasi teknologi medis serta pelayanan berbasis kolaborasi interprofesi secara holistik, artinya meskipun bermacam-macam profesi sumber daya manusianya tapi tetap harus saling bekerja sama dan harus memperhatikan kondisi pasien secara holistik dan komprehensif, profesional serta etika profesi di atas kepentingan/keuntungan pribadi.</p>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<p style=\"text-align:center\"><span style=\"font-size:22px\"><u><strong>MISI</strong></u></span></p>\r\n\r\n<ol>\r\n	<li style=\"text-align:justify\">Meningkatkan Kualitas Pelayanan dan Mengembangkan Produk Pelayanan Unggulan.</li>\r\n	<li style=\"text-align:justify\">Menerapkan Tata Kelola PPK &ndash; BLUD Secara Efisien dan Betanggungjawab.</li>\r\n	<li style=\"text-align:justify\">Memudahkan Akses Pelayanan dan Memperluas Jaringan Mitra Rujukan.</li>\r\n	<li style=\"text-align:justify\">Meningkatkan Kompetensi SDM, Melengkapi Sarana Prasarana, dan Memenuhi Kebutuhan SDM sesuai Standar.</li>\r\n</ol>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n</div>\r\n</div>\r\n</div>\r\n', NULL, 3, NULL, NULL, '2020-01-12 11:23:43', 'root');

-- --------------------------------------------------------

--
-- Table structure for table `tb_jadwal_dokter`
--

CREATE TABLE `tb_jadwal_dokter` (
  `id_jadwal` int(11) NOT NULL,
  `d_id` int(11) NOT NULL,
  `d_hari` varchar(30) NOT NULL,
  `d_jam` varchar(255) DEFAULT NULL,
  `d_desc` text DEFAULT NULL,
  `modified_on` datetime DEFAULT NULL,
  `modified_by` varchar(25) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_jadwal_dokter`
--

INSERT INTO `tb_jadwal_dokter` (`id_jadwal`, `d_id`, `d_hari`, `d_jam`, `d_desc`, `modified_on`, `modified_by`) VALUES
(10, 8, '2', '21:00 - 23:00', 'oke', '2022-08-03 02:45:39', NULL),
(2, 10, '1', '08:00 - 10:00', '', '2020-01-16 01:55:54', 'root'),
(3, 10, '2', '16:00 - 19:00', '', '2020-01-16 01:55:54', 'root'),
(9, 8, '1', '11:00 - 13:00', '', '2022-08-03 02:45:39', NULL),
(5, 9, '1', '09:00 - 15:00', '', '2020-01-16 01:56:55', 'root'),
(6, 9, '6', '13:00 - 18:00', '', '2020-01-16 01:56:55', 'root'),
(11, 8, '3', '14:00 - 23:00', '', '2022-08-03 02:45:39', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_janji_temu`
--

CREATE TABLE `tb_janji_temu` (
  `id_janji_temu` int(11) NOT NULL,
  `id_pasien` int(11) NOT NULL,
  `d_id` int(11) NOT NULL,
  `status_pengajuan` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_janji_temu`
--

INSERT INTO `tb_janji_temu` (`id_janji_temu`, `id_pasien`, `d_id`, `status_pengajuan`, `created_at`) VALUES
(4, 19, 8, 1, '2022-08-03 01:02:48'),
(5, 19, 10, 0, '2022-08-03 01:02:48'),
(6, 19, 10, 0, '2022-08-03 01:02:48'),
(7, 19, 10, 0, '2022-08-03 01:02:48'),
(8, 19, 10, 0, '2022-08-03 01:02:48'),
(9, 19, 10, 0, '2022-08-03 01:02:48');

-- --------------------------------------------------------

--
-- Table structure for table `tb_karir`
--

CREATE TABLE `tb_karir` (
  `c_id` int(11) NOT NULL,
  `c_desc` text DEFAULT NULL,
  `c_image` varchar(255) DEFAULT NULL,
  `created_on` datetime DEFAULT NULL,
  `created_by` varchar(200) DEFAULT NULL,
  `modified_on` datetime DEFAULT NULL,
  `modified_by` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_karir`
--

INSERT INTO `tb_karir` (`c_id`, `c_desc`, `c_image`, `created_on`, `created_by`, `modified_on`, `modified_by`) VALUES
(1, '<p>RSUD Dr. (H.C) Ir. Soekarno membuka kesempatan bagi putra putri bangsa untuk mengisi posisi :</p>\r\n\r\n<p><strong>1. Dokter Spesialis Jantung </strong></p>\r\n\r\n<p>Persyarat :</p>\r\n\r\n<p>- Memiliki pengalaman minimal 2 tahun</p>\r\n\r\n<p>- syarat 2</p>\r\n\r\n<p>- syarat 3</p>\r\n\r\n<p>- syarat 4</p>\r\n\r\n<p>- syarat 5</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>2. Perawat</strong></p>\r\n\r\n<p>Persyarat :</p>\r\n\r\n<p>- Memiliki pengalaman minimal 1 tahun</p>\r\n\r\n<p>- syarat 2</p>\r\n\r\n<p>- syarat 3</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Batas pendaftaran tanggal 31 Januari 2019</strong></p>\r\n', 'gallery3.jpg', '2018-12-13 13:59:17', 'root', '2020-01-12 11:38:02', 'root');

-- --------------------------------------------------------

--
-- Table structure for table `tb_konsultasi`
--

CREATE TABLE `tb_konsultasi` (
  `c_id` int(11) NOT NULL,
  `c_mid` int(11) DEFAULT NULL,
  `c_did` int(11) DEFAULT NULL,
  `c_value` text DEFAULT NULL,
  `created_by` enum('M','D') DEFAULT NULL,
  `created_on` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_konsultasi`
--

INSERT INTO `tb_konsultasi` (`c_id`, `c_mid`, `c_did`, `c_value`, `created_by`, `created_on`) VALUES
(74, 8, 8, 'tes', 'M', '2020-01-14 12:15:40'),
(75, 8, 8, 'o', 'M', '2020-01-14 12:15:45'),
(77, 8, 8, 'testtsts', 'D', '2020-01-15 10:55:33'),
(78, 8, 8, 'iaia', 'M', '2020-01-15 10:55:52'),
(79, 8, 8, 'nsjandjsnaj', 'D', '2020-01-15 10:57:32'),
(80, 8, 8, 'dmiamnjdaid\nmdkjsnadn', 'D', '2020-01-15 10:57:45'),
(81, 8, 8, 'fadads', 'D', '2020-01-15 10:57:47'),
(82, 8, 8, 'dsadsads', 'D', '2020-01-15 10:57:48'),
(88, 19, 10, 'asd', 'M', '2022-04-20 07:50:05'),
(89, 19, 10, 'asd', 'M', '2022-04-20 07:50:07'),
(90, 19, 10, 'asd', 'M', '2022-04-20 07:50:08'),
(91, 19, 10, 'asd', 'M', '2022-04-20 07:50:09'),
(92, 8, 8, 'test', 'D', '2022-04-21 06:02:23'),
(93, 19, 10, 'halo', 'M', '2022-07-08 07:36:40'),
(94, 19, 9, 'tes', 'M', '2022-07-08 07:36:49'),
(96, 8, 8, 'apa?\n', 'D', '2022-07-08 07:39:01'),
(97, 19, 8, 'halo\n', 'M', '2022-07-09 05:20:05'),
(98, 8, 8, 'oke\n', 'D', '2022-08-03 02:55:58');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kritik_saran`
--

CREATE TABLE `tb_kritik_saran` (
  `c_id` int(11) NOT NULL,
  `c_name` varchar(500) DEFAULT NULL,
  `c_email` varchar(500) DEFAULT NULL,
  `c_desc` text DEFAULT NULL,
  `created_on` datetime DEFAULT NULL,
  `modified_on` datetime DEFAULT NULL,
  `modified_by` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kritik_saran`
--

INSERT INTO `tb_kritik_saran` (`c_id`, `c_name`, `c_email`, `c_desc`, `created_on`, `modified_on`, `modified_by`) VALUES
(26, 'oke oke', 'oke@gmail.com', 'test', '2022-08-02 08:16:21', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_layanan`
--

CREATE TABLE `tb_layanan` (
  `c_id` int(11) NOT NULL,
  `c_name` varchar(500) DEFAULT NULL,
  `c_desc` text DEFAULT NULL,
  `c_image` varchar(255) DEFAULT NULL,
  `permalink` varchar(255) DEFAULT NULL,
  `created_on` datetime DEFAULT NULL,
  `created_by` varchar(200) DEFAULT NULL,
  `modified_on` datetime DEFAULT NULL,
  `modified_by` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_layanan`
--

INSERT INTO `tb_layanan` (`c_id`, `c_name`, `c_desc`, `c_image`, `permalink`, `created_on`, `created_by`, `modified_on`, `modified_by`) VALUES
(10, 'Healthcare Facilities Medical Professionals 1', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iste quasi sit aperiam quia volup tatem odio, facere iusto magni sunter kelapa</p>\r\n', 'gallery1.jpg', 'healthcare-facilities-medical-professionals-1', '2018-12-13 13:59:17', 'root', '2020-01-11 03:50:56', 'root'),
(12, 'Healthcare Facilities Medical Professionals 2', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Iste quasi sit aperiam quia volup tatem odio, facere iusto magni sunter kelapa', 'gallery2.jpg', 'p-2', '2019-03-13 03:26:52', 'root', '2019-05-07 09:03:24', 'admin'),
(13, 'Healthcare Facilities Medical Professionals 3', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iste quasi sit aperiam quia volup tatem odio, facere iusto magni sunter kelapa</p>\r\n', 'gallery3.jpg', 'healthcare-facilities-medical-professionals-3', '2019-03-18 10:56:47', 'root', '2020-01-11 04:15:24', 'root'),
(22, 'Healthcare Facilities Medical Professionals 4', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Iste quasi sit aperiam quia volup tatem odio, facere iusto magni sunter kelapa', 'gallery4.jpg', 'p-4', '2019-03-18 10:56:47', 'root', NULL, NULL),
(23, 'Healthcare Facilities Medical Professionals 5', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Iste quasi sit aperiam quia volup tatem odio, facere iusto magni sunter kelapa', 'gallery5.jpg', 'p-5', '2019-03-18 10:56:47', 'root', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_login`
--

CREATE TABLE `tb_login` (
  `id_login` int(5) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` int(11) NOT NULL,
  `active` enum('Aktif','Tidak Aktif') NOT NULL,
  `created_by` varchar(20) DEFAULT NULL,
  `created_on` datetime DEFAULT NULL,
  `modified_by` varchar(20) DEFAULT NULL,
  `modified_on` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_login`
--

INSERT INTO `tb_login` (`id_login`, `nama_lengkap`, `email`, `no_hp`, `username`, `password`, `role`, `active`, `created_by`, `created_on`, `modified_by`, `modified_on`) VALUES
(1, 'Administrator', '-', '-', 'root', 'ba248c985ace94863880921d8900c53f', 1, 'Aktif', NULL, NULL, 'root', '2020-01-05 10:56:29');

-- --------------------------------------------------------

--
-- Table structure for table `tb_maintenance`
--

CREATE TABLE `tb_maintenance` (
  `id` int(11) NOT NULL,
  `maintenance` text DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_maintenance`
--

INSERT INTO `tb_maintenance` (`id`, `maintenance`, `status`) VALUES
(1, 'Maintenance Server Kita', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_member`
--

CREATE TABLE `tb_member` (
  `r_id` int(11) NOT NULL,
  `r_mail` varchar(255) NOT NULL,
  `r_pass` varchar(150) NOT NULL,
  `r_fullname` varchar(50) NOT NULL,
  `r_bday` date DEFAULT NULL,
  `r_gender` enum('','LAKI - LAKI','PEREMPUAN') NOT NULL,
  `r_image` varchar(255) DEFAULT NULL,
  `r_validate` enum('Y','N') NOT NULL DEFAULT 'N',
  `r_status` enum('SUSPEND','ACTIVE','NOT ACTIVE') NOT NULL DEFAULT 'NOT ACTIVE',
  `r_last_login` datetime DEFAULT NULL,
  `created_on` datetime DEFAULT NULL,
  `created_by` varchar(25) DEFAULT NULL,
  `modified_on` datetime DEFAULT NULL,
  `modified_by` varchar(25) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_member`
--

INSERT INTO `tb_member` (`r_id`, `r_mail`, `r_pass`, `r_fullname`, `r_bday`, `r_gender`, `r_image`, `r_validate`, `r_status`, `r_last_login`, `created_on`, `created_by`, `modified_on`, `modified_by`) VALUES
(8, 'member1@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', 'Member1', '2020-01-01', 'LAKI - LAKI', '15788260414.jpg', 'Y', 'ACTIVE', '2020-01-17 04:50:14', '2019-12-10 03:27:47', 'root', '2020-01-13 09:53:53', 'Member1'),
(13, 'member2111@gmail.com', '', 'asas', '2020-01-10', '', '1575245133.jpg', 'N', 'NOT ACTIVE', NULL, '2020-01-08 06:26:06', 'asas', '2020-01-11 05:49:36', 'root'),
(14, 'member121212@gmail.com', '', 'asasd', '2020-01-14', '', '1575245133.jpg', 'N', 'NOT ACTIVE', NULL, '2020-01-08 06:26:56', 'asasd', '2020-01-11 06:01:31', 'root'),
(15, 'member121123@gmail.com', '', 'asasas', '2020-01-07', 'PEREMPUAN', '1575245133.jpg', 'N', 'NOT ACTIVE', NULL, '2020-01-08 06:29:22', 'asasas', '2020-01-11 06:01:57', 'root'),
(18, 'ghjj@hfhjj.v', 'ba248c985ace94863880921d8900c53f', 'Hhhh', NULL, '', '1575245133.jpg', 'N', 'NOT ACTIVE', NULL, '2020-01-18 02:43:09', 'Hhhh', NULL, NULL),
(19, 'pasien@gmail.com', 'ba248c985ace94863880921d8900c53f', 'pasien', '2022-04-24', 'LAKI - LAKI', '1650556253ramadhan.png', 'Y', 'ACTIVE', '2022-08-03 03:13:52', '2022-04-20 07:40:29', 'pasien', '2022-04-21 05:50:53', 'pasien');

-- --------------------------------------------------------

--
-- Table structure for table `tb_menu`
--

CREATE TABLE `tb_menu` (
  `menu_id` int(11) NOT NULL,
  `menu_name` varchar(100) DEFAULT NULL,
  `menu_icon` varchar(255) DEFAULT NULL,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  `ordering` int(11) DEFAULT NULL,
  `linkto` varchar(100) NOT NULL,
  `enabled` char(1) DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_menu`
--

INSERT INTO `tb_menu` (`menu_id`, `menu_name`, `menu_icon`, `parent_id`, `ordering`, `linkto`, `enabled`) VALUES
(1, 'USERS', 'fa fa-group', 0, 7, '#', 'Y'),
(3, 'DASHBOARD', 'fa fa-dashboard', 0, 1, 'home', 'Y'),
(4, 'PROFIL', 'fa fa-server', 0, 2, '#', 'Y'),
(26, 'DATA', 'fa fa-sticky-note-o', 0, 3, '#', 'Y'),
(27, 'LAYANAN', 'fa fa-sliders', 0, 4, 'layanan', 'Y'),
(28, 'TEGURAN', 'fa fa-user', 0, 4, 'teguran', 'Y'),
(29, 'HISTORI MAINTENANCE', 'fa fa-history', 0, 4, 'maintenance', 'Y'),
(33, 'KONSULTASI', 'fa fa-comments-o', 0, 5, 'konsultasi', 'Y'),
(34, 'SETTINGS', 'fa fa-gear', 0, 8, '#', 'Y'),
(43, 'MEMBER', 'fa fa-circle-o', 1, 3, 'member', 'Y'),
(44, 'IDENTITAS', 'fa fa-circle-o', 4, 1, 'identitas', 'Y'),
(45, 'SOSIAL MEDIA', 'fa fa-circle-o', 4, 2, 'sosmed', 'Y'),
(46, 'POLI', 'fa fa-circle-o', 26, 1, 'poli', 'Y'),
(47, 'DOKTER', 'fa fa-circle-o', 26, 2, 'dokter', 'Y'),
(48, 'NEWS', 'fa fa-circle-o', 26, 3, 'news', 'Y'),
(49, 'KARIR', 'fa fa-circle-o', 26, 4, 'karir', 'Y'),
(50, 'LOGO', 'fa fa-circle-o', 34, 1, 'logo', 'Y'),
(51, 'SLIDER', 'fa fa-circle-o', 34, 2, 'slider', 'Y'),
(52, 'ROLE ADMIN', 'fa fa-circle-o', 1, 1, 'roleadmin', 'Y'),
(53, 'USER ADMIN', 'fa fa-circle-o', 1, 2, 'useradmin', 'Y'),
(54, 'BANNER', 'fa fa-circle-o', 34, 3, 'banner', 'Y'),
(55, 'KRITIK & SARAN', 'fa fa-edit', 0, 6, 'kritiksaran', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `tb_news`
--

CREATE TABLE `tb_news` (
  `c_id` int(11) NOT NULL,
  `c_title` varchar(500) DEFAULT NULL,
  `c_intro` varchar(500) DEFAULT NULL,
  `c_desc` text DEFAULT NULL,
  `c_flag` int(1) DEFAULT 0,
  `c_image` varchar(255) DEFAULT NULL,
  `permalink` varchar(255) DEFAULT NULL,
  `referensi` varchar(255) NOT NULL,
  `youtube` varchar(255) NOT NULL,
  `created_on` datetime DEFAULT NULL,
  `created_by` varchar(200) DEFAULT NULL,
  `modified_on` datetime DEFAULT NULL,
  `modified_by` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_news`
--

INSERT INTO `tb_news` (`c_id`, `c_title`, `c_intro`, `c_desc`, `c_flag`, `c_image`, `permalink`, `referensi`, `youtube`, `created_on`, `created_by`, `modified_on`, `modified_by`) VALUES
(10, 'Healthcare Facilities Medical Professionals 1 a b c', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Iste quasi sit aperiam quia volup tatem odio, facere iusto magni sunter kelapa', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iste quasi sit aperiam quia volup tatem odio, facere iusto magni sunter kelapa</p>\r\n', 1, 'gallery1.jpg', 'healthcare-facilities-medical-professionals-1-a-b-c', 'apaaja.vom', '--PD5bdMmwk', '2018-12-13 13:59:17', 'root', '2020-01-11 11:44:07', 'root'),
(12, 'Healthcare Facilities Medical Professionals 2', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Iste quasi sit aperiam quia volup tatem odio, facere iusto magni sunter kelapa', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Iste quasi sit aperiam quia volup tatem odio, facere iusto magni sunter kelapa', 1, 'gallery2.jpg', 'p-2', 'apaaja.vom', 'uzgp65UnPxA', '2019-03-13 03:26:52', 'root', '2019-05-07 09:03:24', 'admin'),
(13, 'Healthcare Facilities Medical Professionals 3', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Iste quasi sit aperiam quia volup tatem odio, facere iusto magni sunter kelapa', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Iste quasi sit aperiam quia volup tatem odio, facere iusto magni sunter kelapa', 1, 'gallery3.jpg', 'p-3', 'kumparan', 'uzgp65UnPxA', '2019-03-18 10:56:47', 'root', '2019-05-24 14:04:43', 'admin'),
(22, 'Healthcare Facilities Medical Professionals 4', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Iste quasi sit aperiam quia volup tatem odio, facere iusto magni sunter kelapa', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Iste quasi sit aperiam quia volup tatem odio, facere iusto magni sunter kelapa', 1, 'gallery4.jpg', 'p-4', 'IDNTimes', 'uzgp65UnPxA', '2019-03-18 10:56:47', 'root', NULL, NULL),
(23, 'Healthcare Facilities Medical Professionals 5', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Iste quasi sit aperiam quia volup tatem odio, facere iusto magni sunter kelapa', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Iste quasi sit aperiam quia volup tatem odio, facere iusto magni sunter kelapa', 1, 'gallery5.jpg', 'p-5', 'MNCTV', 'uzgp65UnPxA', '2019-03-18 10:56:47', 'root', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_poli`
--

CREATE TABLE `tb_poli` (
  `poli_kode` varchar(15) NOT NULL,
  `poli_nama` varchar(25) DEFAULT NULL,
  `poli_desc` text DEFAULT NULL,
  `permalink` varchar(255) DEFAULT NULL,
  `created_on` datetime DEFAULT NULL,
  `created_by` varchar(200) DEFAULT NULL,
  `modified_on` datetime DEFAULT NULL,
  `modified_by` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_poli`
--

INSERT INTO `tb_poli` (`poli_kode`, `poli_nama`, `poli_desc`, `permalink`, `created_on`, `created_by`, `modified_on`, `modified_by`) VALUES
('P01', 'POLI KANDUNGAN', NULL, 'poli-kandungan', NULL, NULL, '2020-01-16 02:03:39', 'root'),
('P02', 'POLI GIGI', NULL, 'poli-gigi', NULL, NULL, '2020-01-16 02:03:24', 'root'),
('P03', 'POLI JANTUNG', NULL, 'poli-jantung', NULL, NULL, '2020-01-16 02:03:32', 'root'),
('P04', 'POLI ANAK', NULL, 'poli-anak', NULL, NULL, '2020-01-16 02:03:06', 'root');

-- --------------------------------------------------------

--
-- Table structure for table `tb_poli_jadwal`
--

CREATE TABLE `tb_poli_jadwal` (
  `p_id` varchar(15) NOT NULL,
  `p_hari` int(11) NOT NULL,
  `p_jam` varchar(255) NOT NULL,
  `p_desc` text NOT NULL,
  `modified_by` varchar(25) NOT NULL,
  `modified_on` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_poli_jadwal`
--

INSERT INTO `tb_poli_jadwal` (`p_id`, `p_hari`, `p_jam`, `p_desc`, `modified_by`, `modified_on`) VALUES
('P01', 1, '15:00 - 17:00 ', '-', 'root', '2020-01-16 02:03:39'),
('P04', 6, '08:00 - 16:00', '', 'root', '2020-01-16 02:03:06'),
('P04', 3, '08:00 - 17:00', '', 'root', '2020-01-16 02:03:06'),
('P04', 1, '08:00 - 17:00', '', 'root', '2020-01-16 02:03:06'),
('P02', 1, '08:00 - 17:00', '', 'root', '2020-01-16 02:03:24'),
('P02', 2, '08:00 - 17:00', '', 'root', '2020-01-16 02:03:24'),
('P02', 3, '08:00 - 17:00', '', 'root', '2020-01-16 02:03:24'),
('P02', 4, '08:00 - 17:00', '', 'root', '2020-01-16 02:03:24'),
('P02', 5, '08:00 - 17:00', '', 'root', '2020-01-16 02:03:24'),
('P02', 6, '08:00 - 17:00', '', 'root', '2020-01-16 02:03:24'),
('P02', 7, '08:00 - 17:00', '', 'root', '2020-01-16 02:03:24'),
('P03', 1, '08:00 - 17:00', '', 'root', '2020-01-16 02:03:32'),
('P03', 3, '08:00 - 17:00', '', 'root', '2020-01-16 02:03:32'),
('P03', 4, '08:00 - 17:00', '', 'root', '2020-01-16 02:03:32'),
('P03', 5, '08:00 - 17:00', '', 'root', '2020-01-16 02:03:32'),
('P03', 6, '08:00 - 17:00', '', 'root', '2020-01-16 02:03:32'),
('P01', 2, '20:00 - 22:00', '', 'root', '2020-01-16 02:03:39'),
('P01', 5, '08:00 - 17:00', '', 'root', '2020-01-16 02:03:39');

-- --------------------------------------------------------

--
-- Table structure for table `tb_register`
--

CREATE TABLE `tb_register` (
  `r_id` int(11) NOT NULL,
  `r_mail` varchar(255) NOT NULL,
  `r_pass` varchar(150) NOT NULL,
  `r_fullname` varchar(50) NOT NULL,
  `r_bday` date DEFAULT NULL,
  `r_gender` enum('L','P') DEFAULT NULL,
  `r_image` varchar(255) DEFAULT NULL,
  `r_active` int(1) DEFAULT 0,
  `created_on` datetime DEFAULT NULL,
  `modified_on` datetime DEFAULT NULL,
  `modified_by` varchar(25) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_register`
--

INSERT INTO `tb_register` (`r_id`, `r_mail`, `r_pass`, `r_fullname`, `r_bday`, `r_gender`, `r_image`, `r_active`, `created_on`, `modified_on`, `modified_by`) VALUES
(2, 'user2@gmail.com', 'pass123', 'user2', '2019-12-10', 'P', '1575986295doctor4.jpg', 0, '2019-12-10 02:58:15', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_resep_obat`
--

CREATE TABLE `tb_resep_obat` (
  `id_resep_obat` int(11) NOT NULL,
  `id_pasien` int(11) NOT NULL,
  `d_id` int(11) NOT NULL,
  `resep_obat` text NOT NULL,
  `bentuk_obat` enum('Tablet','Kapsul','Kaplet','Pil','Bubuk','Sirup','Suppositoria Rektal','Suppositoria Vagina','Suppositoria Uretra','Suntikan','Salep','Krim','Bedak','Gel','Lation','Tetes Mata','Tetes Telinga','Tetes Hidung') NOT NULL,
  `dosis` enum('Dosis Terapi','Dosis Minimum','Dosis Maksimum','Dosis Toksik','Dosis Letal 50','Dosis Letal 100','Oral','Parenteral','Topikal') NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_resep_obat`
--

INSERT INTO `tb_resep_obat` (`id_resep_obat`, `id_pasien`, `d_id`, `resep_obat`, `bentuk_obat`, `dosis`, `gambar`, `created_at`) VALUES
(1, 19, 8, 'asdas', 'Tablet', 'Dosis Terapi', 'resep-obat.jpg', '2022-08-03 01:14:50'),
(2, 19, 8, 'Kolkolin', 'Tablet', 'Dosis Minimum', 'resep-obat.jpg', '2022-08-03 01:14:50');

-- --------------------------------------------------------

--
-- Table structure for table `tb_role`
--

CREATE TABLE `tb_role` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(255) DEFAULT NULL,
  `role_desc` text DEFAULT NULL,
  `created_by` varchar(20) DEFAULT NULL,
  `created_on` datetime DEFAULT NULL,
  `modified_by` varchar(20) DEFAULT NULL,
  `modified_on` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_role`
--

INSERT INTO `tb_role` (`role_id`, `role_name`, `role_desc`, `created_by`, `created_on`, `modified_by`, `modified_on`) VALUES
(1, 'super-admin', '-', 'root', '2020-01-11 11:15:57', 'root', '2020-01-13 02:00:48');

-- --------------------------------------------------------

--
-- Table structure for table `tb_role_detail`
--

CREATE TABLE `tb_role_detail` (
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `menu_view` enum('Y','N') DEFAULT 'N',
  `menu_add` enum('Y','N') DEFAULT 'N',
  `menu_edit` enum('Y','N') DEFAULT 'N',
  `menu_del` enum('Y','N') DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_role_detail`
--

INSERT INTO `tb_role_detail` (`role_id`, `menu_id`, `menu_view`, `menu_add`, `menu_edit`, `menu_del`) VALUES
(1, 1, 'Y', 'N', 'N', 'N'),
(1, 3, 'Y', 'N', 'N', 'N'),
(1, 4, 'Y', 'N', 'N', 'N'),
(1, 26, 'Y', 'N', 'N', 'N'),
(1, 27, 'Y', 'N', 'N', 'N'),
(1, 28, 'Y', 'N', 'N', 'N'),
(1, 29, 'Y', 'N', 'N', 'N'),
(1, 33, 'Y', 'N', 'N', 'N'),
(1, 34, 'Y', 'N', 'N', 'N'),
(1, 43, 'Y', 'N', 'N', 'N'),
(1, 44, 'Y', 'N', 'N', 'N'),
(1, 45, 'Y', 'N', 'N', 'N'),
(1, 46, 'Y', 'N', 'N', 'N'),
(1, 47, 'Y', 'N', 'N', 'N'),
(1, 48, 'Y', 'N', 'N', 'N'),
(1, 49, 'Y', 'N', 'N', 'N'),
(1, 50, 'Y', 'N', 'N', 'N'),
(1, 51, 'Y', 'N', 'N', 'N'),
(1, 52, 'Y', 'N', 'N', 'N'),
(1, 53, 'Y', 'N', 'N', 'N'),
(1, 54, 'Y', 'N', 'N', 'N'),
(1, 55, 'Y', 'N', 'N', 'N');

-- --------------------------------------------------------

--
-- Table structure for table `tb_slider`
--

CREATE TABLE `tb_slider` (
  `slid_id` int(11) NOT NULL,
  `slid_image` varchar(255) DEFAULT NULL,
  `created_by` varchar(100) DEFAULT NULL,
  `created_on` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_slider`
--

INSERT INTO `tb_slider` (`slid_id`, `slid_image`, `created_by`, `created_on`) VALUES
(1, 'slide1.jpg', NULL, NULL),
(2, 'slide2.jpg', NULL, NULL),
(3, 'slide3.jpg', NULL, NULL),
(4, 'slide4.jpg', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_sosmed`
--

CREATE TABLE `tb_sosmed` (
  `sm_id` int(11) NOT NULL,
  `sm_desc` varchar(200) DEFAULT NULL,
  `sm_value` varchar(255) DEFAULT NULL,
  `created_on` datetime DEFAULT NULL,
  `created_by` varchar(100) DEFAULT NULL,
  `modified_on` datetime DEFAULT NULL,
  `modified_by` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_sosmed`
--

INSERT INTO `tb_sosmed` (`sm_id`, `sm_desc`, `sm_value`, `created_on`, `created_by`, `modified_on`, `modified_by`) VALUES
(1, 'instagram', 'https://www.instagram.com', NULL, NULL, '2020-01-12 11:26:42', 'root'),
(2, 'facebook', 'https://www.facebook.com', NULL, NULL, '2019-11-30 21:30:53', 'root'),
(3, 'twitter', 'https://www.twitter.com', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_surat_rujukan`
--

CREATE TABLE `tb_surat_rujukan` (
  `id_surat` int(11) NOT NULL,
  `id_pasien` int(11) NOT NULL,
  `d_id` int(11) NOT NULL,
  `keterangan_surat` text NOT NULL,
  `file_surat` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_surat_rujukan`
--

INSERT INTO `tb_surat_rujukan` (`id_surat`, `id_pasien`, `d_id`, `keterangan_surat`, `file_surat`) VALUES
(2, 19, 8, 'asdsa', 'berita6261ddc8c028c.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `tb_teguran`
--

CREATE TABLE `tb_teguran` (
  `id_teguran` int(11) NOT NULL,
  `teguran` text NOT NULL,
  `d_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_teguran`
--

INSERT INTO `tb_teguran` (`id_teguran`, `teguran`, `d_id`) VALUES
(1, 'asd', 8),
(2, 'Anda Salah', 9);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_dokter`
--
ALTER TABLE `tb_dokter`
  ADD PRIMARY KEY (`d_id`);

--
-- Indexes for table `tb_histori_maintenance`
--
ALTER TABLE `tb_histori_maintenance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_identitas`
--
ALTER TABLE `tb_identitas`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `tb_jadwal_dokter`
--
ALTER TABLE `tb_jadwal_dokter`
  ADD PRIMARY KEY (`id_jadwal`);

--
-- Indexes for table `tb_janji_temu`
--
ALTER TABLE `tb_janji_temu`
  ADD PRIMARY KEY (`id_janji_temu`);

--
-- Indexes for table `tb_karir`
--
ALTER TABLE `tb_karir`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `tb_konsultasi`
--
ALTER TABLE `tb_konsultasi`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `tb_kritik_saran`
--
ALTER TABLE `tb_kritik_saran`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `tb_layanan`
--
ALTER TABLE `tb_layanan`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `tb_login`
--
ALTER TABLE `tb_login`
  ADD PRIMARY KEY (`id_login`);

--
-- Indexes for table `tb_maintenance`
--
ALTER TABLE `tb_maintenance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_member`
--
ALTER TABLE `tb_member`
  ADD PRIMARY KEY (`r_id`);

--
-- Indexes for table `tb_menu`
--
ALTER TABLE `tb_menu`
  ADD PRIMARY KEY (`menu_id`);

--
-- Indexes for table `tb_news`
--
ALTER TABLE `tb_news`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `tb_poli`
--
ALTER TABLE `tb_poli`
  ADD PRIMARY KEY (`poli_kode`);

--
-- Indexes for table `tb_poli_jadwal`
--
ALTER TABLE `tb_poli_jadwal`
  ADD PRIMARY KEY (`p_hari`,`p_id`) USING BTREE;

--
-- Indexes for table `tb_register`
--
ALTER TABLE `tb_register`
  ADD PRIMARY KEY (`r_id`);

--
-- Indexes for table `tb_resep_obat`
--
ALTER TABLE `tb_resep_obat`
  ADD PRIMARY KEY (`id_resep_obat`);

--
-- Indexes for table `tb_role`
--
ALTER TABLE `tb_role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `tb_role_detail`
--
ALTER TABLE `tb_role_detail`
  ADD PRIMARY KEY (`role_id`,`menu_id`);

--
-- Indexes for table `tb_slider`
--
ALTER TABLE `tb_slider`
  ADD PRIMARY KEY (`slid_id`);

--
-- Indexes for table `tb_sosmed`
--
ALTER TABLE `tb_sosmed`
  ADD PRIMARY KEY (`sm_id`);

--
-- Indexes for table `tb_surat_rujukan`
--
ALTER TABLE `tb_surat_rujukan`
  ADD PRIMARY KEY (`id_surat`);

--
-- Indexes for table `tb_teguran`
--
ALTER TABLE `tb_teguran`
  ADD PRIMARY KEY (`id_teguran`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_dokter`
--
ALTER TABLE `tb_dokter`
  MODIFY `d_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tb_histori_maintenance`
--
ALTER TABLE `tb_histori_maintenance`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_identitas`
--
ALTER TABLE `tb_identitas`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=135;

--
-- AUTO_INCREMENT for table `tb_jadwal_dokter`
--
ALTER TABLE `tb_jadwal_dokter`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tb_janji_temu`
--
ALTER TABLE `tb_janji_temu`
  MODIFY `id_janji_temu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_karir`
--
ALTER TABLE `tb_karir`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tb_konsultasi`
--
ALTER TABLE `tb_konsultasi`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT for table `tb_kritik_saran`
--
ALTER TABLE `tb_kritik_saran`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tb_layanan`
--
ALTER TABLE `tb_layanan`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tb_login`
--
ALTER TABLE `tb_login`
  MODIFY `id_login` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_maintenance`
--
ALTER TABLE `tb_maintenance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_member`
--
ALTER TABLE `tb_member`
  MODIFY `r_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tb_menu`
--
ALTER TABLE `tb_menu`
  MODIFY `menu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `tb_news`
--
ALTER TABLE `tb_news`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tb_register`
--
ALTER TABLE `tb_register`
  MODIFY `r_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_resep_obat`
--
ALTER TABLE `tb_resep_obat`
  MODIFY `id_resep_obat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_role`
--
ALTER TABLE `tb_role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_slider`
--
ALTER TABLE `tb_slider`
  MODIFY `slid_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_sosmed`
--
ALTER TABLE `tb_sosmed`
  MODIFY `sm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_surat_rujukan`
--
ALTER TABLE `tb_surat_rujukan`
  MODIFY `id_surat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_teguran`
--
ALTER TABLE `tb_teguran`
  MODIFY `id_teguran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
