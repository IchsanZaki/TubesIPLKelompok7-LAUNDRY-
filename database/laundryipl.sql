-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 18, 2023 at 02:04 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laundryipl`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbcustomer`
--

CREATE TABLE `tbcustomer` (
  `IdCustomer` int(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `NoHP` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbpaket`
--

CREATE TABLE `tbpaket` (
  `IdPaket` int(100) NOT NULL,
  `JenisPaket` varchar(100) NOT NULL,
  `harga` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbpegawai`
--

CREATE TABLE `tbpegawai` (
  `IdPegawai` int(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `NoHP` int(12) NOT NULL,
  `NoKTP` int(100) NOT NULL,
  `TglLahir` date NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbtransaksi`
--

CREATE TABLE `tbtransaksi` (
  `IdTransaksi` int(100) NOT NULL,
  `IdCustomer` int(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `JenisLaundry` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `berat` int(100) NOT NULL,
  `HargaTotal` int(100) NOT NULL,
  `Pengambilan` date NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbcustomer`
--
ALTER TABLE `tbcustomer`
  ADD PRIMARY KEY (`IdCustomer`);

--
-- Indexes for table `tbpegawai`
--
ALTER TABLE `tbpegawai`
  ADD PRIMARY KEY (`IdPegawai`);

--
-- Indexes for table `tbtransaksi`
--
ALTER TABLE `tbtransaksi`
  ADD PRIMARY KEY (`IdTransaksi`),
  ADD KEY `IdCustomer` (`IdCustomer`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbtransaksi`
--
ALTER TABLE `tbtransaksi`
  ADD CONSTRAINT `tbtransaksi_ibfk_1` FOREIGN KEY (`IdCustomer`) REFERENCES `tbcustomer` (`IdCustomer`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
