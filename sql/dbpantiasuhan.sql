-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 24, 2020 at 11:13 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 5.6.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbpantiasuhan`
--

-- --------------------------------------------------------

--
-- Table structure for table `agenda`
--

CREATE TABLE `agenda` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `agenda`
--

INSERT INTO `agenda` (`id`, `judul`, `deskripsi`, `gambar`) VALUES
(4, 'Perlombaan 17 Agustus 2020', 'ini merupaka acara perlombaan pada tanggal 17 agustus yang dimana kami memerlukan dana sebesar Rp 1.000.000 untuk mengadakan perlombaan', '56.jpg'),
(5, 'Laporan Data Tabel jurusan', 'mengadakan upacara bendera pada tanggal 17 agustus 2020', '2358764.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `ank_asuh`
--

CREATE TABLE `ank_asuh` (
  `id_ank` int(11) NOT NULL,
  `nama_anak` varchar(255) NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `tempat_lahir` varchar(255) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `nama_ayah` varchar(255) NOT NULL,
  `nama_ibu` varchar(255) NOT NULL,
  `sekolah` varchar(50) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `kelas` varchar(3) NOT NULL,
  `alamat_asal` varchar(255) NOT NULL,
  `nik_sekolah` varchar(20) NOT NULL,
  `alasan_masuk` varchar(100) NOT NULL,
  `tahun_masuk` int(5) NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ank_asuh`
--

INSERT INTO `ank_asuh` (`id_ank`, `nama_anak`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `nama_ayah`, `nama_ibu`, `sekolah`, `tgl_masuk`, `kelas`, `alamat_asal`, `nik_sekolah`, `alasan_masuk`, `tahun_masuk`, `gambar`) VALUES
(1, 'Siti Aminah', 'Perempuan', 'Cirebon', '2007-07-18', 'Sudirja', 'Aminah', 'Sd Negri 5', '2011-09-09', '5', 'Teriminal', '2147483647', 'Orang Tua Tidak Mampu membiayai sekolah', 2004, 'd.jpg'),
(3, 'hhjjkkjj', 'Laki-laki', 'kjlklk', '2020-05-21', 'jkjkjk', 'jkkkjkjk', 'hhjgjgi', '2020-05-13', '5', 'khhiohio', '3336566223331', 'hjgkkj', 2003, 'ski.jpg'),
(4, 'dsfsd', 'Perempuan', 'sdfsd', '2020-05-14', 'dsf', 'fgre', 'sds', '2020-05-13', '6', 'dsfs', '236546465', 'sdfsdhkdsf', 2000, '56.jpg'),
(5, 'asffd', 'Laki-laki', 'dsgf', '2020-05-14', 'sdg', 'dsfs', 'asdfds', '2020-05-06', '8', 'asf', '633522225', 'asdfdg', 2005, '2358764.jpg'),
(6, 'Handi wijaya', 'Laki-laki', 'Bandung', '2010-02-17', 'Wijaya', 'Siti', 'SD Negri 10', '2009-08-19', '3', 'Siliwangi No.188', '223554455622552', 'Kurang Mampu', 2006, '56.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `donatur`
--

CREATE TABLE `donatur` (
  `id` int(11) NOT NULL,
  `kode_donatur` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `jk` varchar(10) NOT NULL,
  `tempat_lahir` varchar(255) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `email` varchar(255) NOT NULL,
  `nohp` varchar(13) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `id_level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `donatur`
--

INSERT INTO `donatur` (`id`, `kode_donatur`, `username`, `password`, `nama_lengkap`, `jk`, `tempat_lahir`, `tgl_lahir`, `email`, `nohp`, `alamat`, `id_level`) VALUES
(2, 'D002', 'Fadila', '25d55ad283aa400af464c76d713c07ad', 'Fadila Ramdan', 'Perempuan', 'Cirebon', '1986-05-14', 'C@gmail.com', '08535462455', 'Kuningan no.188', 2),
(3, 'D003', 'candra', '25d55ad283aa400af464c76d713c07ad', 'Candra Hana', 'Laki-laki', 'jakarta', '1995-09-14', 'candrahana@gmail.com', '085646645696', 'Jalan Siliwangi Kuningan', 2);

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE `level` (
  `id_level` int(11) NOT NULL,
  `hakases` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`id_level`, `hakases`) VALUES
(1, 'admin'),
(2, 'donatur');

-- --------------------------------------------------------

--
-- Table structure for table `pengeluaran`
--

CREATE TABLE `pengeluaran` (
  `id` int(11) NOT NULL,
  `id_donatur` varchar(50) NOT NULL,
  `id_ank` int(11) NOT NULL,
  `jumlah` double NOT NULL,
  `keterangan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengeluaran`
--

INSERT INTO `pengeluaran` (`id`, `id_donatur`, `id_ank`, `jumlah`, `keterangan`) VALUES
(1, 'D002', 1, 5000000, 'Saldo Mencukupi'),
(2, 'D002', 6, 50000, 'Saldo Tidak Mencukupi'),
(3, 'D002', 6, 5000000, 'Saldo Tidak Mencukupi');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_donasi`
--

CREATE TABLE `transaksi_donasi` (
  `id` int(11) NOT NULL,
  `id_donatur` varchar(50) NOT NULL,
  `kode_transaksi` varchar(50) NOT NULL,
  `nominal` double NOT NULL,
  `tgl_transaksi` date NOT NULL,
  `no_rek` int(20) NOT NULL,
  `nama_rekening` varchar(255) NOT NULL,
  `bank` varchar(50) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `jam` time NOT NULL,
  `konfirmasi` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi_donasi`
--

INSERT INTO `transaksi_donasi` (`id`, `id_donatur`, `kode_transaksi`, `nominal`, `tgl_transaksi`, `no_rek`, `nama_rekening`, `bank`, `gambar`, `jam`, `konfirmasi`) VALUES
(14, 'D002', 'T001', 500000, '2020-06-22', 56466552, 'Fadila Ramdan', 'BCA', '56.jpg', '21:16:29', 'Ya'),
(15, 'D002', 'T002', 1000000, '2020-06-22', 56466552, 'Fadila Ramdan', 'BCA', 'd.jpg', '21:18:45', 'Ya');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `id_level` int(11) NOT NULL,
  `aktif` int(1) NOT NULL,
  `nohp` varchar(13) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `kode_donatur` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `nama_lengkap`, `email`, `id_level`, `aktif`, `nohp`, `tempat_lahir`, `alamat`, `jenis_kelamin`, `tgl_lahir`, `kode_donatur`) VALUES
(1, 'admin', '25d55ad283aa400af464c76d713c07ad', 'Purnomo Sudirja', 'b@gmail.com', 1, 0, '08135645544', 'Cirebon', 'Kesunean No.48', '', '1991-08-15', '0'),
(3, 'Fadila', '25d55ad283aa400af464c76d713c07ad', 'Fadila Ramdan', 'C@gmail.com', 2, 1, '2147483647', 'Cirebon', 'Kuningan no.188', 'Perempuan', '1986-05-14', 'D002'),
(4, 'candra', '25d55ad283aa400af464c76d713c07ad', 'Candra Hana', 'candrahana@gmail.com', 2, 1, '085646645696', 'jakarta', 'Jalan Siliwangi Kuningan', 'Laki-laki', '1995-09-14', 'D003');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agenda`
--
ALTER TABLE `agenda`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ank_asuh`
--
ALTER TABLE `ank_asuh`
  ADD PRIMARY KEY (`id_ank`);

--
-- Indexes for table `donatur`
--
ALTER TABLE `donatur`
  ADD PRIMARY KEY (`id`),
  ADD KEY `donatur_ibfk_1` (`id_level`);

--
-- Indexes for table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id_level`);

--
-- Indexes for table `pengeluaran`
--
ALTER TABLE `pengeluaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksi_donasi`
--
ALTER TABLE `transaksi_donasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_level` (`id_level`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agenda`
--
ALTER TABLE `agenda`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `ank_asuh`
--
ALTER TABLE `ank_asuh`
  MODIFY `id_ank` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `donatur`
--
ALTER TABLE `donatur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE `level`
  MODIFY `id_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pengeluaran`
--
ALTER TABLE `pengeluaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `transaksi_donasi`
--
ALTER TABLE `transaksi_donasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `donatur`
--
ALTER TABLE `donatur`
  ADD CONSTRAINT `donatur_ibfk_1` FOREIGN KEY (`id_level`) REFERENCES `level` (`id_level`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`id_level`) REFERENCES `level` (`id_level`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
