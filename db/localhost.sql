-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 23, 2019 at 09:16 PM
-- Server version: 5.7.28-log
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `randssto_rands`
--
CREATE DATABASE IF NOT EXISTS `randssto_rands` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `randssto_rands`;

-- --------------------------------------------------------

--
-- Table structure for table `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `id_kategori` int(5) NOT NULL,
  `kd_kategori` varchar(5) NOT NULL,
  `nm_kategori` varchar(50) NOT NULL,
  `permalink` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kategori`
--

INSERT INTO `tb_kategori` (`id_kategori`, `kd_kategori`, `nm_kategori`, `permalink`) VALUES
(3, 'BL', 'BLOUSE', 'blouse'),
(4, 'KJ', 'KEMEJA', 'kemeja'),
(5, 'MX', 'MAXI', 'maxi'),
(6, 'GM', 'GAMIS', 'gamis'),
(7, 'LG', 'LONG ROMPI', 'long-rompi'),
(8, 'PT', 'PANTS', 'pants'),
(9, 'SW', 'SWEATER', 'sweater'),
(10, 'TN', 'TUNIK', 'tunik'),
(11, 'JK', 'JAKET', 'jaket'),
(12, 'ST', 'SETELAN', 'setelan'),
(13, 'BT', 'BAJU TIDUR', 'baju-tidur'),
(14, 'JS', 'JUMPSUIT', 'jumpsuit'),
(15, 'CP', 'COUPLE', 'couple'),
(16, 'KO', 'KAOS', 'kaos'),
(17, 'LD', 'LONG DRESS', 'long-dress'),
(18, 'CG', 'CARDIGAN', 'cardigan'),
(19, 'BZ', 'BLEZER', 'blezer');

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
  `role` enum('SA','ADMIN') NOT NULL,
  `active` enum('Aktif','Tidak Aktif') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_login`
--

INSERT INTO `tb_login` (`id_login`, `nama_lengkap`, `email`, `no_hp`, `username`, `password`, `role`, `active`) VALUES
(1, 'Saepul Anwar', 'aasaepul7@gmail.com', '6282325242564', 'aasaepul', '6fe5ffcd105782504861cb610f31f044', 'SA', 'Aktif'),
(2, 'Rahmat Danil', 'rahmat@gmail.com', '082325242564', 'rahmat', '33fcf8796a48e9120f2198a32290de8f', 'SA', 'Aktif'),
(3, 'Dalwansyah', 'Dalwansyah@gmail.com', '081277061804', 'Dalwan', 'fb5689c116d7b2bdb0b2f28b844a002b', 'ADMIN', 'Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `tb_newsletter`
--

CREATE TABLE `tb_newsletter` (
  `id_newsletter` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_produk`
--

CREATE TABLE `tb_produk` (
  `id_produk` int(11) NOT NULL,
  `kode` varchar(10) NOT NULL,
  `warna` varchar(15) NOT NULL,
  `nm_produk` varchar(100) NOT NULL,
  `permalink` varchar(150) NOT NULL,
  `harga_normal` double NOT NULL,
  `diskon` double NOT NULL,
  `harga_publish` double NOT NULL,
  `deskripsi` text NOT NULL,
  `gambar` text NOT NULL,
  `stok` int(11) NOT NULL,
  `status` enum('Tersedia','Sold Out') NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `prioritas` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_produk`
--

INSERT INTO `tb_produk` (`id_produk`, `kode`, `warna`, `nm_produk`, `permalink`, `harga_normal`, `diskon`, `harga_publish`, `deskripsi`, `gambar`, `stok`, `status`, `id_kategori`, `prioritas`) VALUES
(178, 'GM0001', 'NAVY', 'Gamis Agnes Navy', 'gamis-agnes-navy', 180000, 0, 180000, '<p><strong>Nama Produk : Agnes</strong></p>\r\n\r\n<p><strong>Bahan</strong>&nbsp; &nbsp; &nbsp;:&nbsp; Matt Baby Codorai</p>\r\n\r\n<p><strong>Warna</strong>&nbsp; &nbsp; &nbsp; : Navy</p>\r\n\r\n<p><strong>Ukuran&nbsp;</strong> &nbsp;: Ld 108cm, Pj 140cm</p>\r\n\r\n<p><strong>Harga</strong>&nbsp; &nbsp; &nbsp; : 180.000</p>\r\n', '15717472811.jpeg', 1, 'Tersedia', 6, '0'),
(179, 'GM0002', 'KUNING', 'Gamis Agnes Kuning', 'gamis-agnes-kuning', 180000, 0, 180000, '<p><strong>Nama Produk : Agnes</strong></p>\r\n\r\n<p><strong>Bahan</strong>&nbsp; &nbsp; &nbsp;:&nbsp; Matt Baby Codorai</p>\r\n\r\n<p><strong>Warna</strong>&nbsp; &nbsp; &nbsp; : Kuning</p>\r\n\r\n<p><strong>Ukuran&nbsp;</strong> &nbsp;: Ld 108cm, Pj 140cm</p>\r\n\r\n<p><strong>Harga</strong>&nbsp; &nbsp; &nbsp; : 180.000</p>\r\n', '15717473973.jpeg', 1, 'Tersedia', 6, '0'),
(180, 'GM0003', 'CREAM', 'Gamis Agnes Cream', 'gamis-agnes-cream', 180000, 0, 180000, '<p><strong>Nama Produk : Agnes</strong></p>\r\n\r\n<p><strong>Bahan</strong>&nbsp; &nbsp; &nbsp;:&nbsp; Matt Baby Codorai</p>\r\n\r\n<p><strong>Warna</strong>&nbsp; &nbsp; &nbsp; : Cream</p>\r\n\r\n<p><strong>Ukuran&nbsp;</strong> &nbsp;: Ld 108cm, Pj 140cm</p>\r\n\r\n<p><strong>Harga</strong>&nbsp; &nbsp; &nbsp; : 180.000</p>\r\n', '15717474962.jpeg', 1, 'Tersedia', 6, '0'),
(181, 'GM0004', 'BLACK', 'Gamis Agnes Black', 'gamis-agnes-black', 180000, 0, 180000, '<p><strong>Nama Produk : Agnes</strong></p>\r\n\r\n<p><strong>Bahan</strong>&nbsp; &nbsp; &nbsp;:&nbsp; Matt Baby Codorai</p>\r\n\r\n<p><strong>Warna</strong>&nbsp; &nbsp; &nbsp; : Black</p>\r\n\r\n<p><strong>Ukuran&nbsp;</strong> &nbsp;: Ld 108cm, Pj 140cm</p>\r\n\r\n<p><strong>Harga</strong>&nbsp; &nbsp; &nbsp; : 180.000</p>\r\n', '15717475584.jpeg', 1, 'Tersedia', 6, '0');

-- --------------------------------------------------------

--
-- Table structure for table `tb_registrasi`
--

CREATE TABLE `tb_registrasi` (
  `id_registrasi` int(10) NOT NULL,
  `nm_lengkap` varchar(50) NOT NULL,
  `no_wa` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `active` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_registrasi`
--

INSERT INTO `tb_registrasi` (`id_registrasi`, `nm_lengkap`, `no_wa`, `email`, `username`, `password`, `active`) VALUES
(1, 'Saepul', '082325242564', 'aasaepul7@gmail.com', 'aasaepul', '6fe5ffcd105782504861cb610f31f044', '1'),
(2, 'Rahmat danil', '085215053503', 'rford.bkt@gmail.com', 'Rahmat297', 'ae4267d4d93a8165129fb4c9cc90ed06', '1'),
(3, 'Anisa Khairul fitri', '081958253401', 'annisakhaerulfitri@gmail.com', 'Anisa k fitri', 'afd928e014d8a6d62a09dabf4c9f9d73', '0'),
(4, 'Yanto ana', '081336366897', 'yanto.datun@yahoo.cok', 'Yanto', 'ce4c9bf3055a7ec261f7e7d14ca94ba2', '0'),
(5, 'Yanto ana', '081336366897', 'yanto.datun@yahoo.com', 'Yanto', 'ce4c9bf3055a7ec261f7e7d14ca94ba2', '1'),
(6, 'Wanty', '081281137995', 'wanty.dya@gmail.com', 'Wanty', '2a99b5afc0bb29d8abc62ce156302458', '1'),
(7, 'Sofyan', '+68279344', 'sofyan.dk80@gmail.com', 'Sofyan-dk', 'c75a4bee326499c70dc4b888b9f3d0e4', '1'),
(8, 'fatimah zahra', '081211106741', 'zahraf0306@gmail.com', 'zahraf', 'a6e07d79e2dd004d0fa6a6cb37cbfacc', '0'),
(9, 'fatimah zahra', '081211106741', 'fz49670@gmail.com', 'fzahra', '2bc8490e28d436db3c8aab80fbf07c14', '1'),
(10, 'Raysa', '083829660159', 'raysaazzahra32@gmail.com', 'Raysa', 'e78bfcaba5e5341b69b1e195b06ad42e', '0'),
(11, 'Kurniawan', '085342690115', 'wawanbds0707@gmail.com', 'Wawanbds', 'f2351db4ccf58fe42aca254d1d06bb1c', '0'),
(12, 'iin hindawati', '081398588591', 'iinhindawati@gmail.com', 'iin hindawati', '2dc12ca8c6b8c3a9e158ce694ebb5c00', '0'),
(13, 'Chang chang ', '081241064980 ', 'nurukhtunur@gmail.com', 'Chang chang ', '653d716345d8915046b904b90f41f271', '0'),
(14, 'Kezia Adil', '082296894749', 'keziaadil502@gmail.com', 'Kezia', 'e07dfc72fa52cf432a67df35b1942887', '0'),
(15, 'Kezia Adil', '082296894749', 'osinwatania@gmail.com', 'Kezia Adil', '8bba55f7be7ea9957360b57af484df3f', '0'),
(16, 'Nina Maulina', '085719966975', 'ninaaulin6@gmail.com', 'Nina', '135ffb0b28567c060a8217df75a10c42', '1'),
(17, 'Yulianti', '088289282822', 'Yyulianti43@gmail.com', 'Yulianti', '71774924d9f05f924f5706fb0e3c8614', '0'),
(18, 'Indri lestari', '081288372644', 'adelsasa248@gmail.com', 'Indri lestari', '6251289e15f44a2a4fbe67180cfdc518', '0'),
(19, 'Aurelya natasya thalia', '089696165735', 'aurellyanatasya141100@gmail.com', 'Aurell', '284436b793827d88b2daab34351f403d', '0'),
(20, 'Dovino yanuar rizky pratama', '089696165735', 'dovinoyanuar22@gmail.com', 'Vino', '17df9db271eae86074f383e5c7dfd913', '0'),
(21, 'Bambang saritomo', '085250329356', 'bambangsaritomo02@gmail.com', 'Bambang002', '2b5be9c116d6b69b5c49ae011c345712', '1'),
(22, 'Rikaidayani', '083815395744', 'rikahandayani3945@gmail.com', 'Rikahandayani', '499f8a86024a923ff4a8caa49b7a1306', '0'),
(23, 'Rikaidayani', '083815395744', 'rikaidayani177@gmail.com', 'Rikaidayani', '499f8a86024a923ff4a8caa49b7a1306', '1'),
(24, 'Pungki widyawati ', '085728302727 ', 'Pungky.wdy@gmail.com', 'Widya ', '7b101b0b3dcd37fb64b77f8a374de851', '1'),
(25, 'siti nur aini aisiyah', '082265177461', 'azwanuryanto2244@gmail.com', 'aisiyah', 'e7a3365541134436e51abe5580021d7e', '0'),
(26, 'siti nur aini aisiyah', '082265177461', 'aisiyahyanto1144@gmail.com', 'aisiyah', 'e7a3365541134436e51abe5580021d7e', '0'),
(27, 'Ika Indriani', '085846645255', 'ikaindriani927@gmail.com', 'Ika ', '8bd047d1757571a7959a1a750e9849d2', '0'),
(28, 'Paulina octavia situmorang', '082294033442', 'paulimaoct@gmail.com', 'Faul442', '68cbfea9990c36af202cbc82f7f69781', '1'),
(29, 'Nur afifah', '083806447151', 'afifahnur16067@gmail.com', 'Afifah', '22fb81e8d955e42957f447605fe4735d', '0'),
(30, 'Akarim alhamid', '083181778110', 'akarim.alhamid@gmail.com', 'Akarim alhamid', 'f6de7775cecdf4f0e9f584d882d257d7', '0'),
(31, 'Adityo Pratomo', '085777774460', 'adityo23.ap@gmail.com', 'adityo23', 'bc2fe6beabd703913593c2c4e9a1885f', '0'),
(32, 'MaGeLLo\'Na Mall Online', '081354850678', 'muh.mursyididrus69@gmail.com', 'MaGeLLo\'Na Mall Online', '172b3e49dcdbafab36a944213fb2ffde', '1'),
(33, 'SriWahyuni', '081554600594', 'sri13041993@gmail.com', 'SriWahYuni', '5db16024c036188cd902243f1a854466', '0');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user_sosmed`
--

CREATE TABLE `tb_user_sosmed` (
  `id` int(11) NOT NULL,
  `oauth_provider` enum('','facebook','google','twitter') COLLATE utf8_unicode_ci NOT NULL,
  `oauth_uid` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `first_name` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `picture` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `tb_login`
--
ALTER TABLE `tb_login`
  ADD PRIMARY KEY (`id_login`);

--
-- Indexes for table `tb_newsletter`
--
ALTER TABLE `tb_newsletter`
  ADD PRIMARY KEY (`id_newsletter`);

--
-- Indexes for table `tb_produk`
--
ALTER TABLE `tb_produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `tb_registrasi`
--
ALTER TABLE `tb_registrasi`
  ADD PRIMARY KEY (`id_registrasi`);

--
-- Indexes for table `tb_user_sosmed`
--
ALTER TABLE `tb_user_sosmed`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  MODIFY `id_kategori` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tb_login`
--
ALTER TABLE `tb_login`
  MODIFY `id_login` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_newsletter`
--
ALTER TABLE `tb_newsletter`
  MODIFY `id_newsletter` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_produk`
--
ALTER TABLE `tb_produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=182;

--
-- AUTO_INCREMENT for table `tb_registrasi`
--
ALTER TABLE `tb_registrasi`
  MODIFY `id_registrasi` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `tb_user_sosmed`
--
ALTER TABLE `tb_user_sosmed`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
