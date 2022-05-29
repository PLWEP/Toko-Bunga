-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 28, 2022 at 09:42 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dborder`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id` int(11) NOT NULL,
  `nama` varchar(40) DEFAULT NULL,
  `hrg` double DEFAULT NULL,
  `jml` int(11) DEFAULT NULL,
  `keterangan` varchar(100) DEFAULT NULL,
  `foto` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id`, `nama`, `hrg`, `jml`, `keterangan`, `foto`) VALUES
(2, 'aglonema Rotundum', 0, 0, '-', 'aglonemaRotundumAceh.jpg'),
(3, 'aglonemaRoDudAnjamani', 75000, 10, '-', 'aglonemaRoDudAnjamani.jpg'),
(4, 'aglonemaSnowWhiteRemaja', 77, 10, '-', 'aglonemaSnowWhiteRemaja.jpg'),
(5, 'aglonemaSuperWhite', 90000, 50, '-', 'aglonemaSuperWhite.jpg'),
(6, 'aglonemaVenus', 90000, 10, '77', 'aglonemaVenus.jpg'),
(7, 'aglonemaRedAnjamaniDewasa', 75000, 10, '-', 'aglonemaRedAnjamaniDewasa.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `email`, `password`, `status`) VALUES
(1, 'admin@gmail.com', '12345', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `id` int(11) NOT NULL,
  `nama_member` varchar(40) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `telp` varchar(30) DEFAULT NULL,
  `alamat` varchar(60) DEFAULT NULL,
  `kota` varchar(40) DEFAULT NULL,
  `provinsi` varchar(40) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `userName` varchar(20) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id`, `nama_member`, `email`, `telp`, `alamat`, `kota`, `provinsi`, `gender`, `userName`, `password`) VALUES
(1, 'Ahmad', 'ahmad@gmail.com', '1234', 'jalan semarang', 'semarang', 'jateng', '1', 'agus', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
