-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 14, 2017 at 06:02 PM
-- Server version: 5.6.26
-- PHP Version: 5.5.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `simnasabah`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_agen`
--

CREATE TABLE IF NOT EXISTS `data_agen` (
  `id_agen` varchar(15) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `tempat` varchar(30) NOT NULL,
  `tanggal` date NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_agen`
--

INSERT INTO `data_agen` (`id_agen`, `nama`, `alamat`, `tempat`, `tanggal`, `password`) VALUES
('ADM-001', 'Mitra Raya', 'Bulang Banteng', 'Surabaya', '2017-06-30', '1111'),
('AGN-002', 'Luna Maria Hawk', 'Ngagel Jaya', 'Surabaya', '2017-07-05', '12345'),
('AGN-003', 'Bejo Sugiantoro', 'Jalan Jimerto Genteng Kali', 'Surabaya', '2017-07-05', '1234'),
('AGN-004', 'Auroro', 'Semanggi', 'Probolinggo', '2017-07-06', '111111'),
('AGN-005', 'Buring Jaya', 'Jalan Bareng Kartini 3 Malang', 'Malang', '2017-07-31', '1234'),
('AGN-006', 'Ketintang Jaya', 'Desa Ketintang Surabaya', 'Surabaya', '2017-07-31', '1234'),
('AGN-007', 'Bungurasih', 'Bungurasih', 'Surabaya', '2017-08-03', '1111');

-- --------------------------------------------------------

--
-- Table structure for table `data_nasabah`
--

CREATE TABLE IF NOT EXISTS `data_nasabah` (
  `id_nasabah` varchar(10) NOT NULL,
  `id_agen` varchar(10) NOT NULL,
  `id_bayar` varchar(10) NOT NULL,
  `id_produk` varchar(15) NOT NULL,
  `status_aktif` enum('Aktif','Tidak Aktif','Added','') NOT NULL,
  `status_exist` enum('Added','NotYet','','') NOT NULL,
  `nama` varchar(50) NOT NULL,
  `gender` char(1) NOT NULL,
  `usia` int(2) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `telepon` char(12) NOT NULL,
  `email` varchar(50) NOT NULL,
  `tgl_mulai` date NOT NULL,
  `tgl_habis` date NOT NULL,
  `saldo` int(12) NOT NULL,
  `angsuran` int(2) NOT NULL,
  `nominal` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_nasabah`
--

INSERT INTO `data_nasabah` (`id_nasabah`, `id_agen`, `id_bayar`, `id_produk`, `status_aktif`, `status_exist`, `nama`, `gender`, `usia`, `alamat`, `telepon`, `email`, `tgl_mulai`, `tgl_habis`, `saldo`, `angsuran`, `nominal`) VALUES
('NSB-001', 'AGN-004', '1', 'PR-001', 'Aktif', 'Added', 'Tester', 'L', 19, 'SSSS', '08221364643', 'moch.nadhiful94@gmail.com', '2017-08-13', '2020-08-08', 3000, 32, 1000),
('NSB-002', 'AGN-004', '2', 'PR-002', 'Aktif', 'Added', 'Tester2', 'L', 19, 'fffffffffffff', '08221364643', 'moch.nadhiful94@gmail.com', '2017-08-14', '2027-08-14', 3000000, 39, 3000000),
('NSB-003', 'AGN-004', '1', 'PR-004', 'Aktif', 'NotYet', 'Tester3', 'L', 10, 'fffffff', '08221364643', 'moch.nadhiful94@gmail.com', '2017-08-14', '2026-08-14', 0, 108, 1000000);

-- --------------------------------------------------------

--
-- Table structure for table `data_pembayaran`
--

CREATE TABLE IF NOT EXISTS `data_pembayaran` (
  `id_pembayaran` varchar(15) NOT NULL,
  `id_agen` varchar(15) NOT NULL,
  `id_nasabah` varchar(10) NOT NULL,
  `nominal` varchar(15) NOT NULL,
  `tgl_transaksi` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_pembayaran`
--

INSERT INTO `data_pembayaran` (`id_pembayaran`, `id_agen`, `id_nasabah`, `nominal`, `tgl_transaksi`) VALUES
('TRNS-001', 'AGN-004', 'NSB-001', '1000', '2017-08-13'),
('TRNS-002', 'AGN-004', 'NSB-001', '1000', '2017-09-13'),
('TRNS-003', 'AGN-004', 'NSB-001', '1000', '2017-10-13'),
('TRNS-004', 'AGN-004', 'NSB-002', '3000000', '2017-08-14');

-- --------------------------------------------------------

--
-- Table structure for table `data_polis`
--

CREATE TABLE IF NOT EXISTS `data_polis` (
  `id_polis` varchar(15) NOT NULL,
  `id_produk` varchar(10) NOT NULL,
  `id_nasabah` varchar(10) NOT NULL,
  `id_bayar` varchar(15) NOT NULL,
  `id_agen` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_polis`
--

INSERT INTO `data_polis` (`id_polis`, `id_produk`, `id_nasabah`, `id_bayar`, `id_agen`) VALUES
('PL-001', 'PR-001', 'NSB-001', '1', 'AGN-004'),
('PL-002', 'PR-002', 'NSB-002', '2', 'AGN-004'),
('PL-003', 'PR-004', 'NSB-003', '1', 'NotAdded');

-- --------------------------------------------------------

--
-- Table structure for table `data_staf`
--

CREATE TABLE IF NOT EXISTS `data_staf` (
  `id_staf` varchar(7) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `telepon` varchar(12) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_staf`
--

INSERT INTO `data_staf` (`id_staf`, `nama`, `alamat`, `telepon`, `email`, `password`) VALUES
('STF-001', 'Dinda', 'Desa Menganti Gresik', '08221364643', 'sayuia@gmail.co.id', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_bayar`
--

CREATE TABLE IF NOT EXISTS `jenis_bayar` (
  `id_bayar` tinyint(2) NOT NULL,
  `nama_bayar` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_bayar`
--

INSERT INTO `jenis_bayar` (`id_bayar`, `nama_bayar`) VALUES
(1, 'Bulanan'),
(2, 'Triwulanan'),
(3, 'Semester'),
(4, 'Tahunan');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_asuransi`
--

CREATE TABLE IF NOT EXISTS `kategori_asuransi` (
  `id_produk` varchar(15) NOT NULL,
  `nama_produk` varchar(25) NOT NULL,
  `harga` int(12) NOT NULL,
  `durasi` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori_asuransi`
--

INSERT INTO `kategori_asuransi` (`id_produk`, `nama_produk`, `harga`, `durasi`) VALUES
('PR-001', 'Mita Permata', 100000, 5),
('PR-002', 'Mitra Proteksi Mandiri', 1000000, 10),
('PR-003', 'Mitra BP Link', 300000, 15),
('PR-004', 'Mitra Beasiswa', 1000000, 19);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `idUser` varchar(25) NOT NULL,
  `namaUser` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `levelUser` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`idUser`, `namaUser`, `password`, `levelUser`) VALUES
('ADM-001', 'root', 'alpa', 'admin'),
('AGN-002', 'Luna Maria Hawk', '12345', 'agen'),
('AGN-003', 'Bejo Sugiantoro', '1234', 'agen'),
('AGN-004', 'Auroro', '111111', 'agen'),
('AGN-005', 'Buring Jaya', '1234', 'agen'),
('AGN-006', 'Ketintang Jaya', '1234', 'agen'),
('AGN-007', 'Bungurasih', '1111', 'agen'),
('MNG-001', 'Manajer', '1234', 'manajer'),
('NSB-001', '', '1234', 'nasabah'),
('NSB-002', 'Tester2', '1234', 'nasabah'),
('NSB-003', 'Tester3', '1234', 'nasabah'),
('STF-001', 'Dinda', '1234', 'staff');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_agen`
--
ALTER TABLE `data_agen`
  ADD PRIMARY KEY (`id_agen`);

--
-- Indexes for table `data_nasabah`
--
ALTER TABLE `data_nasabah`
  ADD PRIMARY KEY (`id_nasabah`);

--
-- Indexes for table `data_pembayaran`
--
ALTER TABLE `data_pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`),
  ADD KEY `id_nasabah` (`id_nasabah`),
  ADD KEY `id_polis` (`id_agen`);

--
-- Indexes for table `data_polis`
--
ALTER TABLE `data_polis`
  ADD PRIMARY KEY (`id_polis`);

--
-- Indexes for table `data_staf`
--
ALTER TABLE `data_staf`
  ADD PRIMARY KEY (`id_staf`);

--
-- Indexes for table `jenis_bayar`
--
ALTER TABLE `jenis_bayar`
  ADD PRIMARY KEY (`id_bayar`);

--
-- Indexes for table `kategori_asuransi`
--
ALTER TABLE `kategori_asuransi`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`idUser`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
