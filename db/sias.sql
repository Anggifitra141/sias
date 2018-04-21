-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 21, 2018 at 07:42 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sias`
--

-- --------------------------------------------------------

--
-- Table structure for table `disposisi`
--

CREATE TABLE `disposisi` (
  `id_disp` int(10) NOT NULL,
  `id_surat` varchar(10) NOT NULL,
  `tujuan` varchar(50) NOT NULL,
  `isi_disposisi` varchar(250) NOT NULL,
  `sifat` varchar(50) NOT NULL,
  `batas_waktu` date NOT NULL,
  `catatan` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `disposisi`
--

INSERT INTO `disposisi` (`id_disp`, `id_surat`, `tujuan`, `isi_disposisi`, `sifat`, `batas_waktu`, `catatan`) VALUES
(56, '21', 'Anggi Fitrahandika ', 'Segera Bertindak lanjut', 'Biasa', '2018-02-15', 'asda'),
(57, '20', 'Mimid', 'Permohonan izin', 'Rahasia', '2018-02-18', 'nothing');

-- --------------------------------------------------------

--
-- Table structure for table `surat_keluar`
--

CREATE TABLE `surat_keluar` (
  `id` int(10) NOT NULL,
  `no_agenda` varchar(10) NOT NULL,
  `no_surat` int(20) NOT NULL,
  `jenis_surat` varchar(30) NOT NULL,
  `tanggal_kirim` date NOT NULL,
  `tujuan` varchar(50) NOT NULL,
  `isi_ringkas` varchar(250) NOT NULL,
  `file` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `surat_keluar`
--

INSERT INTO `surat_keluar` (`id`, `no_agenda`, `no_surat`, `jenis_surat`, `tanggal_kirim`, `tujuan`, `isi_ringkas`, `file`) VALUES
(1, '14012000', 91837, 'DInas', '2018-02-08', 'Kodir sudrajat', 'Pengetahuan tentang hari libur', 'Picture1.jpg'),
(2, '0102937465', 1818, 'Resmi', '2018-02-08', 'SMP Yapida', 'Pengumuman', 'IMG_20161004_170504.jpg'),
(3, '19264', 146, 'Dinas', '2018-02-09', 'Anggi Fitrahandika s.kom', 'Pemberitahuan hari libur', 'IMG_0031.JPG'),
(5, '654', 6135135, 'Resmi', '2018-02-10', 'Kantor Kementrian Perhutanan', 'Hari tatanen sedunia', 'IMG_0012.JPG');

-- --------------------------------------------------------

--
-- Table structure for table `surat_masuk`
--

CREATE TABLE `surat_masuk` (
  `id` int(10) NOT NULL,
  `no_agenda` varchar(10) NOT NULL,
  `no_surat` int(20) NOT NULL,
  `jenis_surat` varchar(30) NOT NULL,
  `tanggal_surat` date NOT NULL,
  `tanggal_terima` date NOT NULL,
  `asal_surat` varchar(50) NOT NULL,
  `isi_ringkas` varchar(100) NOT NULL,
  `file` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `surat_masuk`
--

INSERT INTO `surat_masuk` (`id`, `no_agenda`, `no_surat`, `jenis_surat`, `tanggal_surat`, `tanggal_terima`, `asal_surat`, `isi_ringkas`, `file`) VALUES
(20, '327', 28, 'Resmi', '2018-02-14', '2018-02-14', 'Mentri Pendidikan', 'Pengumuman', 'js.png'),
(21, '123098', 2345678, 'dinas', '2018-02-15', '2018-02-15', 'Kantor kementrian', 'pemberitahuan hari libur', 'logo.jpg'),
(22, '12381', 88, 'Resmi', '2018-02-19', '2018-02-19', 'Polres Tasikmalaya', 'Isian we ', 'predator2.jpg'),
(23, '18734', 474, 'Dinas', '2018-02-19', '2018-02-19', 'Polsek Cisayong', 'teuing', '9434-2134-P1-SPK-Rekayasa Perangkat Lunak-K13 (1).'),
(24, '97', 235, 'Resmi', '2018-02-19', '2018-02-19', 'Smpn 1 cisayong ', 'Nothing', 'Anggi Fitahandika.docx'),
(25, '38912', 363, 'Resmi', '2018-02-19', '2018-02-19', 'Kantor kementrian', 'bla bla bla', 'Ada sebuah perusahaan software house akan membuah ');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(5) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `fullname` varchar(30) NOT NULL,
  `level` enum('admin','user') NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `foto` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `fullname`, `level`, `jenis_kelamin`, `foto`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Administrator', 'admin', 'Laki Laki', 'IMG_0249.JPG'),
(4, 'anggi', '202cb962ac59075b964b07152d234b70', 'Anggi Fitrahandika', 'user', 'Laki Laki', 'IMG_20170303_172322_HDR.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `disposisi`
--
ALTER TABLE `disposisi`
  ADD PRIMARY KEY (`id_disp`);

--
-- Indexes for table `surat_keluar`
--
ALTER TABLE `surat_keluar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `surat_masuk`
--
ALTER TABLE `surat_masuk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `disposisi`
--
ALTER TABLE `disposisi`
  MODIFY `id_disp` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;
--
-- AUTO_INCREMENT for table `surat_keluar`
--
ALTER TABLE `surat_keluar`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `surat_masuk`
--
ALTER TABLE `surat_masuk`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
