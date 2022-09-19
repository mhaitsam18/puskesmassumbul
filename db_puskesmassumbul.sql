-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 19, 2022 at 06:02 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_puskesmassumbul`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_dokter`
--

CREATE TABLE `tb_dokter` (
  `d_id` int(11) NOT NULL,
  `d_mail` varchar(30) DEFAULT NULL,
  `d_pass` varchar(255) DEFAULT NULL,
  `d_fullname` varchar(255) DEFAULT NULL,
  `d_bday` date DEFAULT NULL,
  `d_gender` enum('','LAKI - LAKI','PEREMPUAN') DEFAULT NULL,
  `d_image` text DEFAULT NULL,
  `d_poli` varchar(25) DEFAULT NULL,
  `d_moto` text DEFAULT NULL,
  `d_phone` varchar(20) DEFAULT NULL,
  `permalink` varchar(255) DEFAULT NULL,
  `d_status` enum('ACTIVE','NOT ACTIVE') DEFAULT NULL,
  `r_last_login` datetime DEFAULT NULL,
  `is_online` tinyint(1) DEFAULT 0,
  `created_on` datetime DEFAULT NULL,
  `created_by` varchar(25) DEFAULT NULL,
  `modified_on` datetime DEFAULT NULL,
  `modified_by` varchar(25) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_dokter`
--

INSERT INTO `tb_dokter` (`d_id`, `d_mail`, `d_pass`, `d_fullname`, `d_bday`, `d_gender`, `d_image`, `d_poli`, `d_moto`, `d_phone`, `permalink`, `d_status`, `r_last_login`, `is_online`, `created_on`, `created_by`, `modified_on`, `modified_by`) VALUES
(8, 'indah@gmail.com', 'ba248c985ace94863880921d8900c53f', 'dr.Indah Afermi Purba Sp.KG', '2020-01-01', 'LAKI - LAKI', '15789443991.jpg', 'P02', 'Melayani sepenuh hati, bekerja dengan hati nurani', '232323', 'drindah-afermi-purba', 'ACTIVE', '2022-09-19 05:54:39', 1, '2019-12-10 03:27:47', 'root', '2022-07-20 06:51:53', 'DR.Indah Afermi Purba'),
(9, 'lois@123.com', 'ba248c985ace94863880921d8900c53f', 'dr.Lois Oberlin Sihombing Sp.OG', '1972-05-07', 'LAKI - LAKI', NULL, 'P03', 'Melayani sepenuh hati, bekerja dengan hati nurani', '081244336709', 'drlois-oberlin-sihombing', 'ACTIVE', '2020-01-13 21:30:02', 0, '2019-12-10 03:27:47', 'root', '2022-07-19 04:43:31', 'root'),
(10, 'hotmaida@gmail.com', 'ba248c985ace94863880921d8900c53f', 'dr.Hotmaida Manullang Sp.A', '1972-07-12', 'PEREMPUAN', '1658197180dr_hotmaida.jpeg', 'P04', 'Melayani sepenuh hati, bekerja dengan hati nurani', '082397015697', 'drhotmaida-manullang', 'ACTIVE', '2022-07-19 04:21:07', 1, '2019-12-10 03:27:47', 'root', '2022-07-19 04:19:40', 'root');

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
(1, 'Selesai', '2022-08-02 23:51:51'),
(2, 'Selesai', '2022-08-03 08:51:25'),
(3, 'Mulai', '2022-08-03 10:22:49'),
(4, 'Selesai', '2022-08-04 01:57:30'),
(5, 'Mulai', '2022-08-22 03:40:33'),
(6, 'Selesai', '2022-08-22 03:45:59'),
(7, 'Mulai', '2022-08-22 03:54:33'),
(8, 'Selesai', '2022-08-22 03:56:12');

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
(2, 'logo', '1658195653logo_puskes.jpeg', NULL, NULL, NULL, NULL, '2022-07-19 03:54:13', 'root'),
(3, 'footer', '2022 Puskesmas Sumbul', NULL, NULL, NULL, NULL, NULL, NULL),
(5, 'contact', '<p style=\"text-align:center\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:22px\"><u><strong>KONTAK</strong></u></span></span></p>\r\n\r\n<p style=\"text-align:center\">&nbsp;</p>\r\n\r\n<p style=\"text-align:center\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:16px\">Telp. +81 3-6127-9779<br />\r\nFacebook : UPT Puskesmas Sumbul</span></span></p>\r\n\r\n<p style=\"text-align:center\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:16px\">&nbsp;Jl. SM Raja Sumbul, No.127,&nbsp;Kec. Sumbul,pegagan julu II Kabupaten Dairi</span></span></p>\r\n\r\n<p style=\"text-align:center\">&nbsp;</p>\r\n', NULL, 3, NULL, NULL, '2022-07-19 04:59:17', 'root'),
(132, 'banner', '1658195842foto_puskes.jpeg', NULL, NULL, NULL, NULL, '2022-07-19 03:57:22', 'root'),
(133, 'sejarah', '<p style=\"text-align:center\"><span style=\"font-size:16px\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><strong>PUSKESMAS SUMBUL&nbsp;</strong></span></span></p>\r\n\r\n<p style=\"text-align:center\">&nbsp;</p>\r\n\r\n<p style=\"text-align:center\"><span style=\"font-size:14px\"><span style=\"font-family:Arial,Helvetica,sans-serif\">Sejarah Singkat Pembentukan Puskesmas Sumbul&nbsp;</span></span></p>\r\n\r\n<p><span style=\"font-size:14px\"><span style=\"font-family:Arial,Helvetica,sans-serif\">Puskesmas didirikan di tiap kecamatan di Indonesia. Tiap kecamatan biasanya memiliki satu Puskesmas. Namun, jika jumlah penduduk dan kebutuhan akan pelayanan kesehatan terbilang besar, maka dapat didirikan lebih dari satu Puskesmas dalam satu kecamatan. Puskesmas telah menjadi tonggak periode perjalanan sejarah Dinas Kesehatan Kabupaten diIndonesia.&nbsp;Konsep&nbsp;Puskesmas&nbsp;sendiri&nbsp;diterapkan&nbsp;di&nbsp;Indonesia&nbsp;pada&nbsp;tahun&nbsp;1969.&nbsp;Perihal diterapkannya&nbsp;konsep&nbsp;Puskesmas&nbsp;ini.&nbsp;&nbsp;Pada&nbsp;awal&nbsp;berdirinya,&nbsp;sedikit&nbsp;sekali&nbsp;perhatian&nbsp;yang dicurahkan Pemerintah di Kabupaten pada pembangunan di bidang Kesehatan. Sebelum konsep Puskesmas&nbsp;diterapkan,&nbsp;dalam&nbsp;rangka&nbsp;memberikan&nbsp;pelayanan&nbsp;terhadap&nbsp;masyarakat&nbsp;maka dibangunlah Balai Pengobatan(BP), Balai&nbsp;Kesejahteraan&nbsp;Ibu&nbsp;dan&nbsp;Anak&nbsp;(BKIA), yang tersebar&nbsp;di&nbsp;kecamatan-kecamatan.&nbsp;Unit tersebut&nbsp;berdiri&nbsp;sendiri-sendiri tidak&nbsp;saling&nbsp;berhubungan&nbsp;dan langsung&nbsp;melaporkan kegiatannya kepada&nbsp;Kepala&nbsp;Dinas Kesehatan,&nbsp;umumnya&nbsp;unit tersebut dipimpin oleh seorang Mantri (perawat) senior yang pendidikannya bisa Pembantu Perawat atau Perawat. Sejalan dengan diterapkannya konsep Puskesmas di Indonesia tahun 1969, maka mulailah dibangun Puskesmas di beberapa wilayah yang dipimpin oleh seorang Dokter Wilayah (Dokwil)yang membawahi beberapa Kecamatan, sedang di tingkat kabupaten ada Dokter Kabupaten(Dokabu) yang membawahi Dokwil. Pelayanan kesehatan yang diberikan Puskesmas tersebutadalah pelayanan kesehatan menyeluruh (komprehensif) yang meliputi pelayanan: pengobatan(kuratif),&nbsp;upaya&nbsp;pencegahan&nbsp;(preventif),&nbsp;peningkatan&nbsp;kesehatan&nbsp;(promotif)&nbsp;dan&nbsp;pemulihankesehatan (rehabilitatif).&nbsp;Puskesmas (Pusat Kesehatan Masyarakat) merupakan fasilitas terdepan dalam memberikan pelayanan kesehatan kepada masyarakat Indonesia. Puskesmas didukung oleh tenaga medis yang kompeten, meliputi dokter, dokter gigi, bidan, perawat, petugas laboratorium, tenaga kesehatan lingkungan dan masyarakat, tenaga gizi, dan tenaga kefarmasian.</span></span></p>\r\n\r\n<p><span style=\"font-size:14px\"><span style=\"font-family:Arial,Helvetica,sans-serif\">Pelayanan Kesehatan di Puskesmas<br />\r\nTerlepas dari statusnya sebagai fasilitas kesehatan tingkat pertama, Puskesmas memiliki fasilitas yang bisa diandalkan untuk melayani pasien. Puskesmas juga bisa memberikan perawatan penyakit yang memadai, meski memang tidak selengkap di rumah sakit besar.</span></span></p>\r\n\r\n<p><span style=\"font-size:14px\"><span style=\"font-family:Arial,Helvetica,sans-serif\">Beberapa pelayanan kesehatan yang dapat diberikan oleh Puskesmas adalah:</span></span></p>\r\n\r\n<p><span style=\"font-size:14px\"><span style=\"font-family:Arial,Helvetica,sans-serif\">1. Rawat jalan tingkat pertama<br />\r\nPuskesmas memberikan pelayanan pencegahan penyakit, konsultasi, dan saran pengobatan pada pasien yang tidak membutuhkan rawat inap.</span></span></p>\r\n\r\n<p><span style=\"font-size:14px\"><span style=\"font-family:Arial,Helvetica,sans-serif\">Pelayanan rawat jalan yang disediakan oleh Puskesmas antara lain:</span></span></p>\r\n\r\n<p><span style=\"font-size:14px\"><span style=\"font-family:Arial,Helvetica,sans-serif\">Promosi, penyuluhan, dan pelayanan kesehatan fisik, kesehatan jiwa, kesehatan gigi, kesehatan reproduksi (termasuk deteksi dini&nbsp;kanker serviks),&nbsp;napza, pola makan, kesehatan lansia, serta kesehatan kerja dan olahraga<br />\r\nPelayanan kesehatan lingkungan dengan memantau tempat-tempat umum, pengelolaan makanan, dan sumber air bersih<br />\r\nPelayanan kesehatan ibu, anak, dan keluarga berencana, seperti pemeriksaan kondisi ibu hamil, membantu persalinan, perawatan&nbsp;masa nifas,&nbsp;program keluarga berencana, pemberian&nbsp;imunisasi&nbsp;dasar bagi bayi dan anak, serta konseling menyususi dan&nbsp;makanan pendamping ASI<br />\r\nPelayanan gizi dengan melakukan deteksi dini kasus gizi di masyarakat dan melakukan asuhan keperawatan pada kasus gizi<br />\r\nPelayanan pencegahan dan pengendalian penyakit, baik&nbsp;penyakit menular&nbsp;maupun tidak menular<br />\r\nPelayanan skrining kesehatan untuk pasien dengan risiko penyakit kronis, seperti&nbsp;diabetes tipe 2&nbsp;dan&nbsp;hipertensi<br />\r\nPengobatan tradisional, komplementer, dan alternatif dengan pemanfaatan tanaman obat keluarga<br />\r\n2. Rawat inap tingkat pertama<br />\r\nPuskesmas juga memberikan penanganan rawat jalan yang disertai tambahan fasilitas rawat inap sesuai indikasi medis pasien. Rawat inap di Puskesmas hanya diperuntukkan untuk kasus-kasus yang durasi rawatnya paling lama 5 hari. Pasien yang memerlukan perawatan lebih dari 5 hari harus dirujuk ke rumah sakit.</span></span></p>\r\n\r\n<p><span style=\"font-size:14px\"><span style=\"font-family:Arial,Helvetica,sans-serif\">Layanan Kesehatan Pengguna BPJS di Puskesmas</span></span></p>\r\n\r\n<p><span style=\"font-size:14px\"><span style=\"font-family:Arial,Helvetica,sans-serif\">Sejak tahun 2014, pemerintah Indonesia telah menetapkan sistem jaminan kesehatan berskala nasional yang dinamakan Badan Penyelenggara Jaminan Sosial (BPJS).. Dengan menjadi peserta BPJS dan membayar iuran sesuai kewajiban, peserta akan mendapat pelayanan kesehatan sesuai haknya.</span></span></p>\r\n\r\n<p><span style=\"font-size:14px\"><span style=\"font-family:Arial,Helvetica,sans-serif\">Keuntungan sebagai anggota BPJS adalah mendapatkan pelayanan kesehatan dengan keringanan biaya atau bahkan tanpa dipungut biaya sama sekali. Berikut adalah kemudahan-kemudahan yang bisa didapatkan oleh peserta BPJS:</span></span></p>\r\n\r\n<p><span style=\"font-size:14px\"><span style=\"font-family:Arial,Helvetica,sans-serif\">Apabila Anda berada di luar wilayah Puskesmas atau fasilitas kesehatan (faskes) tempat Anda terdaftar, Anda masih bisa berobat di Puskesmas manapun, tidak harus di Puskesmas tempat Anda terdaftar.<br />\r\nJika terjadi keadaan gawat darurat, Anda juga bisa mendapatkan pelayanan kesehatan di Puskesmas atau faskes manapun.<br />\r\nJika Anda memerlukan pelayanan kesehatan tingkat lanjutan, dokter di Puskesmas atau faskes akan memberikan rujukan agar Anda dapat melanjutkan pengobatan ke fasilitas layanan kesehatan yang lebih lengkap, seperti di rumah sakit.<br />\r\nMelihat lengkapnya pelayanan kesehatan yang disediakan, Anda tidak perlu ragu berobat di Puskesmas. Selain pelayanan yang terbilang lengkap, Puskesmas juga didukung oleh tenaga medis yang profesional, seperti , serta fasilitas yang memenuhi standar.</span></span></p>\r\n\r\n<p><span style=\"font-size:14px\"><span style=\"font-family:Arial,Helvetica,sans-serif\">Apabila terdapat kondisi kritis atau penyakit tertentu yang perlu ditangani oleh dokter spesialis dan memerlukan fasilitas yang tidak tersedia di Puskesmas, maka Puskesmas dapat memberikan surat pengantar untuk merujuk pasien ke fasilitas kesehatan tingkat lanjut, yaitu rumah sakit.</span></span></p>\r\n', NULL, 3, NULL, NULL, '2022-07-19 04:57:18', 'root'),
(134, 'visi_misi', '<div class=\"field field-label-hidden field-name-body field-type-text-with-summary\">\r\n<div class=\"field-items\">\r\n<div class=\"even field-item\">\r\n<p style=\"text-align:center\"><strong><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:16px\">VISI</span></span></strong></p>\r\n\r\n<p style=\"text-align:center\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:14px\">&ldquo;Tercapainya Kecamatan Sumbul Sehat&rdquo;</span></span></p>\r\n\r\n<p style=\"text-align:center\">&nbsp;</p>\r\n\r\n<p style=\"text-align:center\"><strong><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:16px\">MISI</span></span></strong></p>\r\n\r\n<p style=\"text-align:center\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:14px\">&nbsp;Menggerakkan pembangunan berwawasan kesehatan<br />\r\nMendorong Kemandirian Hidup Sehat Perorangan,Keluarga dan&nbsp;Masyarakat<br />\r\nMemelihara dan meningkatkan mutu, pemerataan dan&nbsp;keterjangkauan&nbsp;Pelayanan kesehatan.</span></span></p>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n</div>\r\n</div>\r\n</div>\r\n', NULL, 3, NULL, NULL, '2022-07-19 04:58:46', 'root');

-- --------------------------------------------------------

--
-- Table structure for table `tb_invoice_resep`
--

CREATE TABLE `tb_invoice_resep` (
  `id_invoice_resep` bigint(20) UNSIGNED NOT NULL,
  `id_resep` bigint(20) UNSIGNED DEFAULT NULL,
  `id_resep_obat` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(1, 8, '1', '11:00 - 13:00', '', '2020-01-16 01:56:15', 'root'),
(2, 10, '1', '08:00 - 10:00', '', '2020-01-16 01:55:54', 'root'),
(3, 10, '2', '16:00 - 19:00', '', '2020-01-16 01:55:54', 'root'),
(4, 8, '2', '21:00 - 23:00', '', '2020-01-16 01:56:15', 'root'),
(5, 9, '1', '09:00 - 15:00', '', '2020-01-16 01:56:55', 'root'),
(6, 9, '6', '13:00 - 18:00', '', '2020-01-16 01:56:55', 'root');

-- --------------------------------------------------------

--
-- Table structure for table `tb_janji_temu`
--

CREATE TABLE `tb_janji_temu` (
  `id_janji_temu` int(11) NOT NULL,
  `id_pasien` int(11) NOT NULL,
  `d_id` int(11) NOT NULL,
  `status_pengajuan` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `tanggal` date DEFAULT NULL,
  `waktu` time DEFAULT NULL,
  `d_id_asal` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_janji_temu`
--

INSERT INTO `tb_janji_temu` (`id_janji_temu`, `id_pasien`, `d_id`, `status_pengajuan`, `created_at`, `tanggal`, `waktu`, `d_id_asal`) VALUES
(4, 19, 8, 1, '2022-08-03 08:14:10', NULL, NULL, NULL),
(5, 19, 10, 0, '2022-08-03 08:14:10', NULL, NULL, NULL),
(6, 19, 10, 0, '2022-08-03 08:14:10', NULL, NULL, NULL),
(7, 19, 10, 0, '2022-08-03 08:14:10', NULL, NULL, NULL),
(8, 19, 10, 0, '2022-08-03 08:14:10', NULL, NULL, NULL),
(9, 19, 8, 1, '2022-08-04 18:07:55', NULL, NULL, NULL),
(10, 20, 10, 0, '2022-09-18 17:37:45', NULL, NULL, NULL),
(11, 8, 8, 1, '2022-09-19 02:10:52', '2022-09-20', '09:10:00', 10),
(12, 8, 10, 1, '2022-09-19 02:50:52', '2022-09-20', '09:50:00', 8);

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
(1, '<h2><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:16px\">Puskesmas sumbul membuka kesempatan bagi putra putri bangsa untuk mengisi posisi :</span></span></h2>\r\n\r\n<p><span style=\"font-family:Arial,Helvetica,sans-serif\">1. <strong><em>Bidan</em></strong></span></p>\r\n\r\n<p><span style=\"font-family:Arial,Helvetica,sans-serif\">Persyarat :</span></p>\r\n\r\n<p><span style=\"font-family:Arial,Helvetica,sans-serif\">- Memiliki pengalaman minimal 2 tahun</span></p>\r\n\r\n<p><span style=\"font-family:Arial,Helvetica,sans-serif\">-&nbsp;&nbsp;Memiliki tinggi lebih dari 150 untuk perempuan dan 155 untuk laki-laki.&nbsp;Ukuran tinggi badan yang ideal merupakan syarat penting untuk menjadi perawat. Beberapa tindakan keperawatan menuntut perawat memiliki tinggi badan yang ideal seperti mengganti infuse pasien, melakukan pijat jantung pada pasien dengan kondisi kritis ( RJP ), menolong persalinan ( meskipun hal ini sangat jarang ) dan biasa dilakukan oleh seorang bidan. Oleh karena itu, beberapa Sekolah Tinggi Ilmu Kesehatan mempersyaratkan perawat memiliki tinggi badan yang cukup.</span></p>\r\n\r\n<p><span style=\"font-family:Arial,Helvetica,sans-serif\">- Memiliki STR.&nbsp;Saat ini memiliki STR merupakan syarat wajib yang harus dimiliki untuk bekerja sebagai perawat. STR sendiri merupakan kepanjangan dari Surat Tanda Registrasi. Setelah seorang mahasiswa perawat menyelesaikan kuliahnya, maka dia harus mengikuti ujian kompetensi. Ujian kompetensi ini dilakukan serentak dan penyelenggaranya adalah MTKI. Setelah dinyatakan lulus dari Ujian Kompetensi lantas kita belum bisa langsung memperoleh STR layaknya kita mengikuti sebuah seminar. Karena proses untuk menerbitkan STR harus dilakukan di MTKI pusat, oleh karenanya beberapa harus rela menunggu berbulan-bulan untuk bisa mendapatkan sebuah STR</span></p>\r\n\r\n<p><span style=\"font-family:Arial,Helvetica,sans-serif\">- Tidak buta warna.&nbsp;Bisa dibayangkan apabila ada perawat yang mengidap gangguan sperti buta warna? Untuk menjadi perawat tidak buta warna merupakan syarat mutlak. Karena seseorang dengan gangguan buta warna, tentu saja akan kesulitan dalam membedakan warna obat, jenis cairan infuse, terlebih mengidentifikasi cairan atau eksudat yang keluar dari seorang klien ( darah, nanah, cairan pleura ? )</span></p>\r\n\r\n<p><span style=\"font-family:Arial,Helvetica,sans-serif\">-&nbsp;Tidak memiliki riwayat penyakit menular.&nbsp;Untuk bisa menjadi seorang perawat, selain harus berkelakuan baik, kita juga harus sehat secara jasmani. Sehat secara jasmani salah satunya adalah tidak teridentifikasi menderita penyakit menular. Saat proses rekruitmen baik itu mahasiswa keperawatan maupun karyawan baru. Kita harus menjalani pemeriksaan kesehatan dan pemeriksaan laborat. Beberapa kasus, terdapat mahasiswa lulusan baru tidak diterima sebagai perawat di salah satu Rumah Sakit karena terbukti menderita penyakit hepatitis B.&nbsp;</span></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><span style=\"font-family:Arial,Helvetica,sans-serif\"><strong><em>2. Perawat</em></strong></span></p>\r\n\r\n<p><span style=\"font-family:Arial,Helvetica,sans-serif\">Persyarat :</span></p>\r\n\r\n<p><span style=\"font-family:Arial,Helvetica,sans-serif\">- Memiliki pengalaman minimal 1 tahun</span></p>\r\n\r\n<p><span style=\"font-family:Arial,Helvetica,sans-serif\">- Memiliki STR.&nbsp;Saat ini memiliki STR merupakan syarat wajib yang harus dimiliki untuk bekerja sebagai perawat. STR sendiri merupakan kepanjangan dari Surat Tanda Registrasi. Setelah seorang mahasiswa perawat menyelesaikan kuliahnya, maka dia harus mengikuti ujian kompetensi. Ujian kompetensi ini dilakukan serentak dan penyelenggaranya adalah MTKI. Setelah dinyatakan lulus dari Ujian Kompetensi lantas kita belum bisa langsung memperoleh STR layaknya kita mengikuti sebuah seminar. Karena proses untuk menerbitkan STR harus dilakukan di MTKI pusat, oleh karenanya beberapa harus rela menunggu berbulan-bulan untuk bisa mendapatkan sebuah STR</span></p>\r\n\r\n<p><span style=\"font-family:Arial,Helvetica,sans-serif\">-&nbsp;&nbsp;Lulus ujian sebagai perawat. Beberapa Rumah Sakit melakukan ujian tertulis saat rekruitmen karyawan baru, calon perawat. Untuk bisa menjadi perawat, calon karyawan baru harus lulus ujian tertulis terlebih dahulu. Beberapa mater yang diujikan diantaranya adalah kemampuan dasar dalam bidang keperawatan, misal cara menghitung tetesan infuse, cara melakukan RJP yang benar, cara menghitung kebutuhan cairan seorang pasien dsb. Selain itu perawat juga harus mengikuti ujian psikotest.</span></p>\r\n\r\n<p><span style=\"font-family:Arial,Helvetica,sans-serif\">-Tidak memiliki riwayat penyakit menular.&nbsp;Untuk bisa menjadi seorang perawat, selain harus berkelakuan baik, kita juga harus sehat secara jasmani. Sehat secara jasmani salah satunya adalah tidak teridentifikasi menderita penyakit menular. Saat proses rekruitmen baik itu mahasiswa keperawatan maupun karyawan baru. Kita harus menjalani pemeriksaan kesehatan dan pemeriksaan laborat. Beberapa kasus, terdapat mahasiswa lulusan baru tidak diterima sebagai perawat di salah satu Rumah Sakit karena terbukti menderita penyakit hepatitis B.&nbsp;</span></p>\r\n\r\n<p><span style=\"font-family:Arial,Helvetica,sans-serif\">-&nbsp;Tidak buta warna.&nbsp;Bisa dibayangkan apabila ada perawat yang mengidap gangguan sperti buta warna? Untuk menjadi perawat tidak buta warna merupakan syarat mutlak. Karena seseorang dengan gangguan buta warna, tentu saja akan kesulitan dalam membedakan warna obat, jenis cairan infuse, terlebih mengidentifikasi cairan atau eksudat yang keluar dari seorang klien ( darah, nanah, cairan pleura ? )</span></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><em><span style=\"font-family:Arial,Helvetica,sans-serif\">Batas pendaftaran tanggal 10 Agustus 2022</span></em></p>\r\n', 'gallery3.jpg', '2018-12-13 13:59:17', 'root', '2022-07-19 05:04:25', 'root');

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
(98, 19, 10, 'Selamat siang Dokter , saya ingin melakukan pemeriksaan kesehatan terkait dengan kesehatan adik saya dok', 'M', '2022-07-19 04:34:21'),
(100, 19, 9, 'halo dokter, selamat pagi', 'M', '2022-07-19 04:36:08'),
(102, 20, 8, 'Halo dokter saya ingin melakukan pemeriksaan pada gigi saya ', 'M', '2022-07-19 04:44:14'),
(101, 19, 9, 'selamat pagi', 'M', '2022-07-19 04:37:12'),
(103, 8, 10, 'malam dok\n', 'M', '2022-07-19 07:04:55'),
(104, 8, 10, 'malam juga, apa bisa di bantu ?\n', 'M', '2022-07-20 07:03:19'),
(105, 8, 10, 'holaa', 'M', '2022-08-04 04:26:24'),
(106, 20, 8, 'hoola', 'D', '2022-08-11 09:02:45'),
(107, 20, 8, 'tes\n', 'D', '2022-08-11 09:02:50');

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
(26, 'Sofia Margaretha', 'sofia@gmail.com', 'sangat membantu , terimakasih', '2022-07-19 04:55:36', NULL, NULL),
(27, 'Dian Lestari P Rumabutar', 'dianlestarirumabutar@gmail.com', 'Semoga Kedepannya menjadi lebih baik', '2022-07-20 07:11:42', NULL, NULL);

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
(25, 'Pelayanan kandungan', '<p>Jadwal Pelayanan kandungan&nbsp;</p>\r\n\r\n<p><br />\r\nPELAYANAN PERSALINAN 24 JAM&nbsp;&nbsp; &nbsp;&nbsp;BIAYA&nbsp;&nbsp; &nbsp;&nbsp;WAKTU PENYELESAIAN<br />\r\nPemeriksaan Ibu Antenatal Care (ANC) Lengkap&nbsp;&nbsp; &nbsp;Rp 45.000&nbsp;&nbsp; &nbsp;&plusmn; 15 Menit<br />\r\nPNC&nbsp;&nbsp; &nbsp;Rp 58.000&nbsp;&nbsp; &nbsp;&plusmn; 15 Menit<br />\r\nPersalinan Normal&nbsp;&nbsp; &nbsp;Rp 500.000&nbsp;&nbsp; &nbsp;&plusmn; 60 Menit<br />\r\nPersalinan Dengan Penyulit&nbsp;&nbsp; &nbsp;Rp 750.000&nbsp;&nbsp; &nbsp;&plusmn; 120 Menit</p>\r\n\r\n<p><em>Persyaratan Pelayanan</em></p>\r\n\r\n<p>Membawa kartu berobat<br />\r\nMembawa kartu BPJS<br />\r\nMembawa foto kopy Kartu Keluarga (KK)<br />\r\nMembawa foto kopy Kartu Tanda Penduduk (KTP)</p>\r\n', '1658199002kandungan.jpg', 'pelayanan-kandungan', '2022-07-19 04:50:02', 'Administrator', NULL, NULL),
(22, 'Pelayanan anak', '<p>&nbsp;</p>\r\n\r\n<p>HARI&nbsp;&nbsp; &nbsp;WAKTU PENDAFTARAN&nbsp;&nbsp; &nbsp;WAKTU PELAYANAN<br />\r\nSenin s/d Sabtu&nbsp;&nbsp; &nbsp;Jam 08.00 &ndash; 11:00 WIB&nbsp;&nbsp; &nbsp;Jam 08.00 WIB s/d Selesai</p>\r\n\r\n<p><br />\r\nPersyaratan Pelayanan</p>\r\n\r\n<p>Membawa kartu berobat<br />\r\nMembawa kartu BPJS<br />\r\nMembawa foto kopy Kartu Keluarga (KK)<br />\r\nMembawa foto kopy Kartu Tanda Penduduk (KTP)</p>\r\n', '1658198866layanan_anak.jpg', 'pelayanan-anak', '2019-03-18 10:56:47', 'root', '2022-07-19 04:47:47', 'root'),
(23, 'Pelayanan Gigi', '<p>JADWAL PELAYANAN</p>\r\n\r\n<p>HARI&nbsp;&nbsp; &nbsp;WAKTU PENDAFTARAN&nbsp;&nbsp; &nbsp;WAKTU PELAYANAN<br />\r\nSenin s/d Sabtu&nbsp;&nbsp; &nbsp;Jam 08.00 &ndash; 12.00 WIB&nbsp;&nbsp; &nbsp;Jam 08.00 WIB s/d Selesai<br />\r\nPersyaratan Pelayanan</p>\r\n\r\n<p>Membawa kartu berobat<br />\r\nMembawa kartu BPJS<br />\r\nMembawa foto kopy Kartu Keluarga (KK)<br />\r\nMembawa foto kopy Kartu Tanda Penduduk (KTP)<br />\r\nJenis Pelayanan yang tersedia adalah, Pencabutan gigi DECIDUI, Pelayanan Pencabutan Gigi Permanen Berakar Tunggal, Penambahan ART, Melakukan Scalling. Penanggungjawab Pelayanan Gigi UPT Puskesmas Sumbul adalah Dr.Hotmaida Manullang. Jam Operasional Pelayanan Gigi adalah Senin -Jumat Pukul 08:00 &ndash; 12:00 Wib.</p>\r\n', '1658198926layanan_gigi.jpg', 'pelayanan-gigi', '2019-03-18 10:56:47', 'root', '2022-07-19 04:48:46', 'root');

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
(1, 'Sedang Maintenance', 1);

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
  `modified_by` varchar(25) DEFAULT NULL,
  `is_online` tinyint(1) DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_member`
--

INSERT INTO `tb_member` (`r_id`, `r_mail`, `r_pass`, `r_fullname`, `r_bday`, `r_gender`, `r_image`, `r_validate`, `r_status`, `r_last_login`, `created_on`, `created_by`, `modified_on`, `modified_by`, `is_online`) VALUES
(8, 'member1@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', 'Member1', '2020-01-01', 'LAKI - LAKI', '15788260414.jpg', 'Y', 'ACTIVE', '2022-09-19 05:54:53', '2019-12-10 03:27:47', 'root', '2020-01-13 09:53:53', 'Member1', 1),
(13, 'member2111@gmail.com', '202cb962ac59075b964b07152d234b70', 'asas', '2020-01-10', 'PEREMPUAN', '1659583554hd-wallpaper-susanoo-sasuke-kyuubi-naruto-1920x1080.jpg', 'N', 'ACTIVE', NULL, '2020-01-08 06:26:06', 'asas', '2022-08-04 05:25:54', 'root', 0),
(14, 'member121212@gmail.com', '', 'asasd', '2020-01-14', 'PEREMPUAN', '1659583811hd-wallpaper-susanoo-sasuke-kyuubi-naruto-1920x1080.jpg', 'N', 'NOT ACTIVE', NULL, '2020-01-08 06:26:56', 'asasd', '2022-08-04 05:30:11', 'root', 0),
(19, 'Oges@gmail.com', '202cb962ac59075b964b07152d234b70', 'Grace Ogestin Pasaribu', '2001-08-22', 'PEREMPUAN', '1658197973oges.jpeg', 'Y', 'ACTIVE', '2022-08-04 20:07:32', '2022-04-20 07:40:29', 'pasien', '2022-08-02 04:27:12', 'root', 0),
(20, 'sofia@gmail.com', 'f1c1592588411002af340cbaedd6fc33', 'Sofia Margaretha', '2001-05-04', 'PEREMPUAN', '1658198527fia.jpeg', 'Y', 'ACTIVE', '2022-09-18 19:48:22', '2022-07-19 04:40:39', 'Sofia Margaretha', '2022-07-19 04:42:07', 'root', 0),
(21, 'dianlestarirumabutar@gmail.com', '202cb962ac59075b964b07152d234b70', 'Dian Lestari P Rumabutar', NULL, '', NULL, 'N', 'NOT ACTIVE', NULL, '2022-07-20 05:00:51', 'Dian Lestari P Rumabutar', NULL, NULL, 0);

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
(5, 'DATA', 'fa fa-sticky-note-o', 0, 3, '#', 'Y'),
(6, 'LAYANAN', 'fa fa-sliders', 0, 4, '#', 'Y'),
(7, 'TEGURAN', 'fa fa-user', 0, 4, 'teguran', 'Y'),
(8, 'HISTORI MAINTENANCE', 'fa fa-history', 0, 4, 'maintenance', 'Y'),
(9, 'KONSULTASI', 'fa fa-comments-o', 0, 5, 'konsultasi', 'Y'),
(10, 'SETTINGS', 'fa fa-gear', 0, 8, '#', 'Y'),
(11, 'PASIEN', 'fa fa-circle-o', 5, 7, 'member', 'Y'),
(12, 'IDENTITAS', 'fa fa-circle-o', 4, 1, 'identitas', 'Y'),
(13, 'SOSIAL MEDIA', 'fa fa-circle-o', 4, 2, 'sosmed', 'Y'),
(14, 'POLI', 'fa fa-circle-o', 6, 3, 'poli', 'N'),
(15, 'DOKTER', 'fa fa-circle-o', 5, 2, 'dokter', 'Y'),
(16, 'BERITA KESEHATAN', 'fa fa-circle-o', 6, 1, 'news', 'Y'),
(17, 'KARIR', 'fa fa-circle-o', 6, 2, 'karir', 'Y'),
(18, 'LOGO', 'fa fa-circle-o', 10, 1, 'logo', 'Y'),
(19, 'SLIDER', 'fa fa-circle-o', 10, 2, 'slider', 'Y'),
(20, 'ROLE ADMIN', 'fa fa-circle-o', 1, 1, 'roleadmin', 'Y'),
(21, 'USER ADMIN', 'fa fa-circle-o', 1, 2, 'useradmin', 'Y'),
(22, 'BANNER', 'fa fa-circle-o', 10, 3, 'banner', 'Y'),
(23, 'KRITIK & SARAN', 'fa fa-edit', 0, 6, 'kritiksaran', 'Y'),
(24, 'JANJI TEMU', 'fa fa-circle-o', 5, 3, 'dokter/janji_temu', 'Y'),
(25, 'SURAT RUJUKAN', 'fa fa-circle-o', 5, 4, 'dokter/surat_rujukan', 'Y'),
(26, 'RESEP OBAT', 'fa fa-circle-o', 5, 5, 'dokter/resep', 'Y'),
(27, 'REKAM MEDIS', 'fa fa-circle-o', 5, 6, 'dokter/rekam_medis', 'Y'),
(28, 'LAYANAN POLI', 'fa fa-circle-o', 6, 4, 'layanan', 'Y');

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
(23, 'Penyebab, Asal mula, dan Pencegahan Virus Corona di Indonesia', '', '<p><span style=\"font-family:Arial,Helvetica,sans-serif\">Virus corona atau Covid-19 pertama kali ditemukan di Wuhan, China pada akhir 2019 lalu. Penyebaran virus yang belum ditemukan penawarnya itu hingga kini tak terkendali. Sudah 200 lebih negara di dunia melaporkan adanya kasus terpapar virus corona.Di Indonesia kasus ini pertama kali ditemukan pada dua warga Depok, Jawa Barat awal Maret lalu. Data hingga Sabtu, 28 Maret 2020 jumlah warga yang dinyatakan positif terkena virus corona mencapai 1.155 dan 102 di antaranya meninggal dunia.Cepatnya penyebaran virus ini di Indonesia menurut Juru Bicara pemerintah untuk penanganan COVID-19, Achmad Yurianto karena banyak warga yang tak mengikuti imbauan untuk tetap di rumah. Virus corona menular lewat lendir (droplet) manusia positif COVID-19 yang meloncat ke manusia negatif COVID-19. Lendir itu terciprat saat manusia positif COVID-19 bersin, batuk, atau berbicara lalu terkena orang lain yang negatif. Penularan Virus Corona atau COVID-19<br />\r\nVirus corona menular lewat lendir (droplet) manusia positif COVID-19 yang meloncat ke manusia negatif COVID-19. Lendir itu terciprat saat manusia positif COVID-19 bersin, batuk, atau berbicara lalu terkena orang lain yang negatif.</span></p>\r\n\r\n<p><span style=\"font-family:Arial,Helvetica,sans-serif\">Pencegahan Mandiri<br />\r\nSetiap warga berperan untuk memutus mata rantai penyebaran virus corona atau COVID-19. Caranya seperti instruksi pemerintah, yakni: melakukan social distancing dan tidak keluar rumah. Bagi para pekerja diimbau untuk kerja dari rumah atau work from home.<br />\r\nSayangnya menurut Yuri masih banyak warga yang berkerumun di luar rumah. Inilah yang menyebabkan lonjakan kasus virus corona di Indonesia.<br />\r\nSelain itu, lanjut Yuri, penularan virus corona paling banyak terjadi melalui tangan. Dia mengimbau masyarakat untuk selalu menjaga kebersihan dengan selalu mencuci tangan dengan sabun pada air mengalir sebelum melakukan kegiatan apapun</span></p>\r\n\r\n<p><span style=\"font-family:Arial,Helvetica,sans-serif\">Pemerintah juga telah melakukan langkah-langkah pencegahan virus corona, seperti:<br />\r\n1. Menyediakan beberapa unit thermo scnanner di pintu-pintu kedatangan internasional di berbagai bandara.<br />\r\n2. Pemerintah melarang penerbangan maskapai Indonesia ke China.<br />\r\n3. 238 WNI juga telah divekuasi dari China dan diobservasi kesehatannya selama 14 hari di Natuna, Kepulauan Riau.<br />\r\n4. Mengimbau mengganti sholat Jumat dengan sholat zuhur di rumah. Hal itu merujuk fatwa dari MUI.<br />\r\n5. Pemerintah juga mengimbau pelaksanaan ibadah semua agama dilakukan di rumah saja.<br />\r\n6. Terakhir, masyarakat diimbau untuk tidak mudik lebaran oleh Menteri Agama Fachrul Razi. Hal ini untuk mencegah orangtua yang rentan akan tertular virus corona.</span></p>\r\n\r\n<p><br />\r\n<span style=\"font-family:Arial,Helvetica,sans-serif\">&nbsp;https://news.detik.com/berita/d-4956764/penyebab-asal-mula-dan-pencegahan-virus-corona-di-indonesia.</span></p>\r\n', 1, '1658196892news1.jpg', 'penyebab-asal-mula-dan-pencegahan-virus-corona-di-indonesia', 'https://news.detik.com/berita/d-4956764/penyebab-asal-mula-dan-pencegahan-virus-corona-di-indonesia.', 'nKmTuQhp4XQ', '2019-03-18 10:56:47', 'root', '2022-07-19 04:54:04', 'root');

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
('P02', 'POLI GIGI', NULL, 'poli-gigi', NULL, NULL, '2020-01-16 02:03:24', 'root'),
('P03', 'POLI KANDUNGAN', NULL, 'poli-kandungan', NULL, NULL, '2022-07-19 04:08:28', 'root'),
('P04', 'POLI ANAK', NULL, 'poli-anak', NULL, NULL, '2022-07-19 04:07:32', 'root');

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
('P03', 7, '07:30- 18:00', '', 'root', '2022-07-19 04:08:28'),
('P04', 3, '08:00 - 17:00', '', 'root', '2022-07-19 04:07:32'),
('P04', 2, '07:30- 16:30', '', 'root', '2022-07-19 04:07:32'),
('P04', 1, '08:00 - 17:00', '', 'root', '2022-07-19 04:07:32'),
('P02', 1, '08:00 - 17:00', '', 'root', '2020-01-16 02:03:24'),
('P02', 2, '08:00 - 17:00', '', 'root', '2020-01-16 02:03:24'),
('P02', 3, '08:00 - 17:00', '', 'root', '2020-01-16 02:03:24'),
('P02', 4, '08:00 - 17:00', '', 'root', '2020-01-16 02:03:24'),
('P02', 5, '08:00 - 17:00', '', 'root', '2020-01-16 02:03:24'),
('P02', 6, '08:00 - 17:00', '', 'root', '2020-01-16 02:03:24'),
('P02', 7, '08:00 - 17:00', '', 'root', '2020-01-16 02:03:24'),
('P03', 6, '08:00 - 17:00', '', 'root', '2022-07-19 04:08:28'),
('P03', 5, '08:00 - 17:00', '', 'root', '2022-07-19 04:08:28'),
('P03', 4, '08:00 - 17:00', '', 'root', '2022-07-19 04:08:28'),
('P03', 3, '08:00 - 17:00', '', 'root', '2022-07-19 04:08:28'),
('P03', 2, '08:00 - 17:00', '', 'root', '2022-07-19 04:08:28'),
('P03', 1, '08:00 - 17:00', '', 'root', '2022-07-19 04:08:28'),
('P04', 4, '08:00 - 17:00', '', 'root', '2022-07-19 04:07:32'),
('P04', 5, '08:00 - 16:30', '', 'root', '2022-07-19 04:07:32'),
('P04', 6, '08:00 - 16:00', '', 'root', '2022-07-19 04:07:32'),
('P04', 7, '07:30 - 17:00', '', 'root', '2022-07-19 04:07:32');

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
-- Table structure for table `tb_rekam_medis`
--

CREATE TABLE `tb_rekam_medis` (
  `id_rekam_medis` bigint(20) UNSIGNED NOT NULL,
  `id_pasien` bigint(20) UNSIGNED DEFAULT NULL,
  `id_dokter` bigint(20) UNSIGNED DEFAULT NULL,
  `golongan_darah` varchar(5) NOT NULL,
  `tekanan_darah` varchar(255) NOT NULL,
  `suhu_tubuh` double(6,2) NOT NULL,
  `tinggi_badan` double(5,2) NOT NULL,
  `berat_badan` double(5,2) NOT NULL,
  `alergi_makanan` varchar(255) NOT NULL,
  `alergi_obat` varchar(255) NOT NULL,
  `keluhan` varchar(255) NOT NULL,
  `diagnosa` varchar(255) NOT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_rekam_medis`
--

INSERT INTO `tb_rekam_medis` (`id_rekam_medis`, `id_pasien`, `id_dokter`, `golongan_darah`, `tekanan_darah`, `suhu_tubuh`, `tinggi_badan`, `berat_badan`, `alergi_makanan`, `alergi_obat`, `keluhan`, `diagnosa`, `keterangan`, `created_at`) VALUES
(1, 19, 8, 'B+', '90/120', 100.00, 123.00, 123.00, 'alergi cowok', 'Alergi duit', 'Ga punya doi', 'tinggi selera', 'ok', '2022-08-03 10:00:00'),
(2, 20, 8, 'AB', '120/80 mmHg', 36.00, 171.00, 62.00, 'Tidak Ada', 'Tidak Ada', '', '', '', '2022-08-03 10:19:59'),
(3, 14, 8, 'A-', '90/120', 100.00, 123.00, 123.00, '', '', '', '', '', '2022-08-04 02:26:11');

-- --------------------------------------------------------

--
-- Table structure for table `tb_resep`
--

CREATE TABLE `tb_resep` (
  `id_resep` bigint(20) UNSIGNED NOT NULL,
  `id_pasien` bigint(20) UNSIGNED DEFAULT NULL,
  `id_dokter` bigint(11) DEFAULT NULL,
  `nama_resep` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_resep`
--

INSERT INTO `tb_resep` (`id_resep`, `id_pasien`, `id_dokter`, `nama_resep`, `created_at`, `updated_at`) VALUES
(1, 19, 8, 'Resep Masuk Angin', '2022-08-18 04:32:57', '2022-08-18 04:32:57'),
(2, 20, 8, 'Resep Batuk Pilek', '2022-08-18 05:07:59', '2022-08-18 05:07:59'),
(3, 8, 8, 'Resep Radang Tenggorokan', '2022-08-18 05:12:40', '2022-08-18 05:12:40'),
(4, 19, 8, 'Resep Masuk Angin', '2022-08-22 02:15:53', '2022-08-22 02:15:53'),
(5, 14, 8, 'Resep Radang Tenggorokan', '2022-08-22 02:18:23', '2022-08-22 02:18:23'),
(6, 19, 8, 'Resep Radang Tenggorokan', '2022-08-22 02:36:11', '2022-08-22 02:36:11'),
(7, 21, 8, 'Resep Batuk Pilek', '2022-08-22 03:57:40', '2022-08-22 03:57:40');

-- --------------------------------------------------------

--
-- Table structure for table `tb_resep_obat`
--

CREATE TABLE `tb_resep_obat` (
  `id_resep_obat` int(11) NOT NULL,
  `id_resep` bigint(20) UNSIGNED DEFAULT NULL,
  `id_pasien` int(11) NOT NULL,
  `d_id` int(11) NOT NULL,
  `resep_obat` text NOT NULL,
  `bentuk_obat` enum('Tablet','Kapsul','Kaplet','Pil','Bubuk','Sirup','Suppositoria Rektal','Suppositoria Vagina','Suppositoria Uretra','Suntikan','Salep','Krim','Bedak','Gel','Lation','Tetes Mata','Tetes Telinga','Tetes Hidung') NOT NULL,
  `dosis` enum('Dosis Terapi','Dosis Minimum','Dosis Maksimum','Dosis Toksik','Dosis Letal 50','Dosis Letal 100','Oral','Parenteral','Topikal') NOT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `satuan` varchar(255) DEFAULT NULL,
  `gambar` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_resep_obat`
--

INSERT INTO `tb_resep_obat` (`id_resep_obat`, `id_resep`, `id_pasien`, `d_id`, `resep_obat`, `bentuk_obat`, `dosis`, `jumlah`, `satuan`, `gambar`, `keterangan`, `created_at`) VALUES
(1, NULL, 19, 8, 'asdas', 'Tablet', 'Dosis Terapi', 20, 'Butir', 'resep-obat.jpg', '', '2022-08-03 08:25:53'),
(2, NULL, 19, 8, 'Kolkolin', 'Tablet', 'Dosis Minimum', NULL, NULL, 'resep-obat.jpg', '', '2022-08-03 08:25:53'),
(3, NULL, 20, 8, '- paracetamol\r\n', 'Kapsul', 'Dosis Maksimum', NULL, NULL, 'Screenshot_(9).png', '', '2022-08-03 08:25:53'),
(4, NULL, 14, 8, 'NJH', 'Bubuk', 'Dosis Maksimum', NULL, NULL, 'ABOUT_US.jpg', '', '2022-08-03 08:25:53'),
(5, NULL, 21, 8, '', 'Bubuk', 'Dosis Toksik', NULL, NULL, 'ABOUT_US1.jpg', '', '2022-08-03 08:25:53'),
(6, NULL, 20, 8, '-paracetamol', 'Kapsul', 'Dosis Minimum', NULL, NULL, 'edit_profil.png', '', '2022-08-03 08:25:53'),
(7, NULL, 13, 8, 'vszg', 'Bubuk', 'Dosis Minimum', NULL, NULL, 'ABOUT_US2.jpg', '', '2022-08-03 08:25:53'),
(8, NULL, 14, 8, 'bvcg', 'Bubuk', 'Dosis Letal 100', NULL, NULL, 'list_janji_temu.png', '', '2022-08-03 08:25:53'),
(9, NULL, 8, 8, 'OKE', 'Kaplet', 'Dosis Toksik', NULL, NULL, 'resep-obat2.jpg', '', '2022-08-18 03:41:33'),
(10, 1, 19, 8, 'Paracetamol', 'Tablet', 'Dosis Minimum', 20, 'Butir', '', '', '2022-08-18 04:58:41'),
(11, 1, 19, 8, 'Anadol', 'Sirup', 'Dosis Minimum', NULL, NULL, '', '', '2022-08-18 05:05:52'),
(12, 2, 20, 8, 'oke', 'Sirup', 'Dosis Minimum', NULL, NULL, '', '', '2022-08-18 05:08:13'),
(13, 3, 8, 8, 'Amoxilin', 'Kapsul', 'Dosis Minimum', NULL, NULL, '', '', '2022-08-18 05:13:06'),
(14, 3, 8, 8, 'Apa aja', 'Kapsul', 'Dosis Minimum', NULL, NULL, '', '', '2022-08-18 05:13:53'),
(15, 3, 8, 8, 'Cefadroxil', 'Kapsul', 'Dosis Minimum', NULL, NULL, '', '3 x 1 Sesudah Makan', '2022-08-18 05:21:03'),
(16, 3, 8, 8, 'asdad', 'Kapsul', 'Dosis Terapi', NULL, NULL, '', 'asdsa', '2022-08-18 05:22:15'),
(17, 3, 8, 8, 'panadol', 'Sirup', 'Dosis Toksik', NULL, NULL, '', 'test', '2022-08-18 05:23:13'),
(18, 4, 19, 8, 'adol', 'Kapsul', 'Dosis Minimum', NULL, NULL, '', '2 x 1', '2022-08-22 02:16:24'),
(22, 5, 14, 8, 'bintang', 'Tablet', 'Dosis Minimum', NULL, NULL, '', '2 x 1, Habiskan!', '2022-08-22 02:34:47'),
(24, 6, 19, 8, 'anadol', 'Suppositoria Rektal', 'Dosis Terapi', 2, 'pack', '', '3 x 1, Habiskan!', '2022-08-22 02:37:06'),
(26, 7, 21, 8, 'Dodol', 'Sirup', 'Dosis Minimum', 2, 'biji', '', '1 x 1, Sesudah makan', '2022-08-22 03:59:11');

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
(1, 2, 'Y', 'N', 'N', 'N'),
(1, 3, 'Y', 'N', 'N', 'N'),
(1, 4, 'Y', 'N', 'N', 'N'),
(1, 5, 'Y', 'N', 'N', 'N'),
(1, 6, 'Y', 'N', 'N', 'N'),
(1, 7, 'Y', 'N', 'N', 'N'),
(1, 8, 'Y', 'N', 'N', 'N'),
(1, 9, 'Y', 'N', 'N', 'N'),
(1, 10, 'Y', 'N', 'N', 'N'),
(1, 11, 'Y', 'N', 'N', 'N'),
(1, 12, 'Y', 'N', 'N', 'N'),
(1, 13, 'Y', 'N', 'N', 'N'),
(1, 14, 'Y', 'N', 'N', 'N'),
(1, 15, 'Y', 'N', 'N', 'N'),
(1, 16, 'Y', 'N', 'N', 'N'),
(1, 17, 'Y', 'N', 'N', 'N'),
(1, 18, 'Y', 'N', 'N', 'N'),
(1, 19, 'Y', 'N', 'N', 'N'),
(1, 20, 'Y', 'N', 'N', 'N'),
(1, 21, 'Y', 'N', 'N', 'N'),
(1, 22, 'Y', 'N', 'N', 'N'),
(1, 23, 'Y', 'N', 'N', 'N'),
(1, 24, 'Y', 'N', 'N', 'N'),
(1, 25, 'Y', 'N', 'N', 'N'),
(1, 26, 'Y', 'N', 'N', 'N'),
(1, 27, 'Y', 'N', 'N', 'N'),
(1, 28, 'Y', 'N', 'N', 'N');

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
(5, '1658195748slider1.jpeg', 'root', '2022-07-19 03:55:48'),
(6, '1658195768slider2.jpeg', 'root', '2022-07-19 03:56:08'),
(7, '1658195787slider3.jpeg', 'root', '2022-07-19 03:56:27'),
(8, '1658195804slider4.jpeg', 'root', '2022-07-19 03:56:44'),
(9, '1658200198slider5.jpeg', 'root', '2022-07-19 05:09:58');

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
(1, 'instagram', 'https://instagram.com/sumbulpuskesmas', NULL, NULL, '2022-07-19 05:00:29', 'root'),
(2, 'facebook', 'https://www.facebook.com/UPT-Puskesmas-Sumbul', NULL, NULL, '2022-07-19 05:00:09', 'root'),
(3, 'twitter', 'https://www.twitter.com', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_surat_rujukan`
--

CREATE TABLE `tb_surat_rujukan` (
  `id_surat` int(11) NOT NULL,
  `id_pasien` int(11) NOT NULL,
  `d_id` int(11) NOT NULL,
  `keterangan_surat` text DEFAULT NULL,
  `file_surat` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_surat_rujukan`
--

INSERT INTO `tb_surat_rujukan` (`id_surat`, `id_pasien`, `d_id`, `keterangan_surat`, `file_surat`) VALUES
(2, 19, 8, 'asdsa', 'berita6261ddc8c028c.pdf'),
(3, 20, 8, '', 'berita62d78da64f929.pdf'),
(4, 19, 8, '', 'berita62d82a68ed5a9.pdf'),
(5, 20, 8, '', 'berita62d9114f021c7.pdf'),
(6, 19, 8, 'bgyjgf', 'berita62e4ba17686af.pdf'),
(7, 20, 8, NULL, 'berita62fdce3f5feaf.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `tb_teguran`
--

CREATE TABLE `tb_teguran` (
  `id_teguran` int(11) NOT NULL,
  `teguran` text NOT NULL,
  `d_id` int(11) NOT NULL,
  `balasan` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_teguran`
--

INSERT INTO `tb_teguran` (`id_teguran`, `teguran`, `d_id`, `balasan`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'asd', 8, 'Saya TIdak begitu :3', '2022-08-22 02:56:17', '2022-08-21 22:39:02', '2022-08-21 22:07:26'),
(2, 'jangan gitu', 9, NULL, '2022-08-22 03:45:13', '2022-08-22 03:45:13', '2022-08-26 02:30:55'),
(3, 'jangan gitu', 8, 'AKu ga gitu :(', '2022-08-22 03:45:33', '2022-08-21 22:46:29', '2022-08-26 02:34:37');

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
-- Indexes for table `tb_invoice_resep`
--
ALTER TABLE `tb_invoice_resep`
  ADD PRIMARY KEY (`id_invoice_resep`);

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
-- Indexes for table `tb_rekam_medis`
--
ALTER TABLE `tb_rekam_medis`
  ADD PRIMARY KEY (`id_rekam_medis`);

--
-- Indexes for table `tb_resep`
--
ALTER TABLE `tb_resep`
  ADD PRIMARY KEY (`id_resep`);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_identitas`
--
ALTER TABLE `tb_identitas`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=135;

--
-- AUTO_INCREMENT for table `tb_invoice_resep`
--
ALTER TABLE `tb_invoice_resep`
  MODIFY `id_invoice_resep` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_jadwal_dokter`
--
ALTER TABLE `tb_jadwal_dokter`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_janji_temu`
--
ALTER TABLE `tb_janji_temu`
  MODIFY `id_janji_temu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tb_karir`
--
ALTER TABLE `tb_karir`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tb_konsultasi`
--
ALTER TABLE `tb_konsultasi`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT for table `tb_kritik_saran`
--
ALTER TABLE `tb_kritik_saran`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `tb_layanan`
--
ALTER TABLE `tb_layanan`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

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
  MODIFY `r_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tb_menu`
--
ALTER TABLE `tb_menu`
  MODIFY `menu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

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
-- AUTO_INCREMENT for table `tb_rekam_medis`
--
ALTER TABLE `tb_rekam_medis`
  MODIFY `id_rekam_medis` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_resep`
--
ALTER TABLE `tb_resep`
  MODIFY `id_resep` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_resep_obat`
--
ALTER TABLE `tb_resep_obat`
  MODIFY `id_resep_obat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `tb_role`
--
ALTER TABLE `tb_role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_slider`
--
ALTER TABLE `tb_slider`
  MODIFY `slid_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_sosmed`
--
ALTER TABLE `tb_sosmed`
  MODIFY `sm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_surat_rujukan`
--
ALTER TABLE `tb_surat_rujukan`
  MODIFY `id_surat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_teguran`
--
ALTER TABLE `tb_teguran`
  MODIFY `id_teguran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
