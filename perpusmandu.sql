-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 01, 2017 at 01:57 AM
-- Server version: 10.0.31-MariaDB-0ubuntu0.16.04.2
-- PHP Version: 5.6.31-6+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpusmandu`
--

-- --------------------------------------------------------

--
-- Table structure for table `biodata`
--

CREATE TABLE `biodata` (
  `no_induk` varchar(20) NOT NULL,
  `username` varchar(30) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `jenis_kelamin` enum('l','p') NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `id_kelas` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `biodata`
--

INSERT INTO `biodata` (`no_induk`, `username`, `nama`, `jenis_kelamin`, `no_hp`, `id_kelas`) VALUES
('02030004', 'salamah', 'Salamah', 'p', '088824375423', 1),
('15160001', 'sari', 'Sariwati', 'p', '082210606035', 11),
('15160002', 'joko', 'Joko Susilo', 'l', '082210606070', 11),
('15160003', 'suwartini', 'Suwartini', 'p', '082210606070', 10),
('15160005', 'erry', 'Erry', 'l', '082210606034', 17),
('16170001', 'rahayu', 'Rahayu', 'p', '08978302994', 3),
('16170002', 'hendra', 'Hendra', 'l', '082210606034', 2),
('16170003', 'andri', 'Andri', 'l', '082210606070', 2),
('16170004', 'bahrul', 'Bahrul Ulum', 'l', '082210606071', 3),
('16170005', 'susi', 'Susi', 'p', '08978302994', 2),
('16170006', 'antony', 'Antony', 'l', '082210606034', 3);

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `kode_buku` varchar(15) NOT NULL,
  `isbn` varchar(13) NOT NULL,
  `is_ada` enum('y','n') NOT NULL DEFAULT 'y'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`kode_buku`, `isbn`, `is_ada`) VALUES
('910.529SarJ1', '9796929457610', 'y'),
('910.529SarJ2', '9796929457610', 'y'),
('959.529HarK1', '9786023742899', 'y'),
('959.529HarK2', '9786023742899', 'y'),
('959.529HarK3', '9786023742899', 'y'),
('959.529IdiS1', '9786022415336', 'y'),
('959.529IdiS2', '9786022415336', 'y'),
('959.529KinE1', '9786022774617', 'y'),
('959.529KinE2', '9786022774617', 'y'),
('959.529MarB1', '9786022276390', 'y'),
('959.529MarB2', '9786022276390', 'y');

-- --------------------------------------------------------

--
-- Table structure for table `denda`
--

CREATE TABLE `denda` (
  `kode_pinjam` varchar(14) NOT NULL,
  `jumlah` int(10) NOT NULL,
  `tanggal_pembayaran` date NOT NULL,
  `is_dibayar` enum('y','n') NOT NULL DEFAULT 'n'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `judul`
--

CREATE TABLE `judul` (
  `isbn` varchar(13) NOT NULL,
  `judul_buku` varchar(200) NOT NULL,
  `penulis` varchar(200) NOT NULL,
  `penerbit` varchar(30) NOT NULL,
  `kategori` enum('959','912','923','090','910') NOT NULL,
  `letak` varchar(20) NOT NULL,
  `cover` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `judul`
--

INSERT INTO `judul` (`isbn`, `judul_buku`, `penulis`, `penerbit`, `kategori`, `letak`, `cover`) VALUES
('9786022276390', 'Buku Siswa Matematika SMA Kelas XII', 'Marthen Kanginan', 'Yrama Widya', '959', 'E', '20170929204133.jpg'),
('9786022415336', 'Sosiologi SMA Kelas X', 'Idianto Muin', 'Penerbit Erlangga', '959', 'B', '20170929111929.jpg'),
('9786022774617', 'Ekonomi SMA Kelas X', 'Kinanti Geminastiti', 'Yrama Widya', '959', 'A', '20170929111548.jpg'),
('9786023742899', 'Kimia', 'Haris Watoni', 'Yrama Widya', '959', 'C', '20170929112910.jpg'),
('9789790779680', 'Matematika untuk SMA Kelas XI', 'Marthen Kanginan', 'Yrama Widya', '959', 'A', '20171001014538.jpg'),
('9796929457610', 'Jendela Hati', 'Sari Pusparini Soleh', 'ROSDA', '910', 'D', '20170929190203.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(10) NOT NULL,
  `nama_kelas` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `nama_kelas`) VALUES
(1, 'Lainnya'),
(2, 'X A1'),
(3, 'X A2'),
(4, 'X A3'),
(5, 'X A4'),
(6, 'X A5'),
(7, 'X S1'),
(8, 'X S2'),
(9, 'X S3'),
(10, 'XI A1'),
(11, 'XI A2'),
(12, 'XI A3'),
(13, 'XI A4'),
(14, 'XI A5'),
(15, 'XI S1'),
(16, 'XI S2'),
(17, 'XI S3'),
(18, 'XII A1'),
(19, 'XII A2'),
(20, 'XII S1'),
(21, 'XII S2'),
(22, 'XII S3');

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE `peminjaman` (
  `kode_pinjam` varchar(14) NOT NULL,
  `tanggal_pinjam` date NOT NULL,
  `no_induk` varchar(20) NOT NULL,
  `kode_buku` varchar(15) NOT NULL,
  `tanggal_kembali` date NOT NULL,
  `status` enum('1','2','3','4') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` enum('admin','anggota') NOT NULL DEFAULT 'anggota',
  `is_verified` enum('y','n') NOT NULL DEFAULT 'n'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`, `level`, `is_verified`) VALUES
('andri', 'e10adc3949ba59abbe56e057f20f883e', 'anggota', 'y'),
('antony', 'e10adc3949ba59abbe56e057f20f883e', 'anggota', 'y'),
('bahrul', 'e10adc3949ba59abbe56e057f20f883e', 'admin', 'y'),
('erry', 'e10adc3949ba59abbe56e057f20f883e', 'anggota', 'y'),
('hendra', 'e10adc3949ba59abbe56e057f20f883e', 'anggota', 'n'),
('joko', 'e10adc3949ba59abbe56e057f20f883e', 'anggota', 'y'),
('rahayu', 'e10adc3949ba59abbe56e057f20f883e', 'admin', 'y'),
('salamah', '21232f297a57a5a743894a0e4a801fc3', 'admin', 'y'),
('sari', 'e10adc3949ba59abbe56e057f20f883e', 'anggota', 'y'),
('susi', 'e10adc3949ba59abbe56e057f20f883e', 'anggota', 'y'),
('suwartini', 'e10adc3949ba59abbe56e057f20f883e', 'anggota', 'y');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `biodata`
--
ALTER TABLE `biodata`
  ADD PRIMARY KEY (`no_induk`),
  ADD KEY `username` (`username`),
  ADD KEY `id_kelas` (`id_kelas`);

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`kode_buku`),
  ADD KEY `isbn` (`isbn`);

--
-- Indexes for table `denda`
--
ALTER TABLE `denda`
  ADD PRIMARY KEY (`kode_pinjam`);

--
-- Indexes for table `judul`
--
ALTER TABLE `judul`
  ADD PRIMARY KEY (`isbn`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`kode_pinjam`),
  ADD KEY `no_induk` (`no_induk`),
  ADD KEY `kode_buku` (`kode_buku`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `biodata`
--
ALTER TABLE `biodata`
  ADD CONSTRAINT `biodata_ibfk_1` FOREIGN KEY (`username`) REFERENCES `user` (`username`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `biodata_ibfk_2` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `buku`
--
ALTER TABLE `buku`
  ADD CONSTRAINT `buku_ibfk_1` FOREIGN KEY (`isbn`) REFERENCES `judul` (`isbn`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `denda`
--
ALTER TABLE `denda`
  ADD CONSTRAINT `denda_ibfk_1` FOREIGN KEY (`kode_pinjam`) REFERENCES `peminjaman` (`kode_pinjam`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD CONSTRAINT `peminjaman_ibfk_1` FOREIGN KEY (`no_induk`) REFERENCES `biodata` (`no_induk`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `peminjaman_ibfk_2` FOREIGN KEY (`kode_buku`) REFERENCES `buku` (`kode_buku`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
