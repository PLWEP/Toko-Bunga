-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 08, 2022 at 05:36 PM
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
-- Database: `dbabc`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id` int(11) NOT NULL,
  `nama` varchar(40) DEFAULT NULL,
  `harga` double NOT NULL,
  `stok` int(11) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `foto` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id`, `nama`, `harga`, `stok`, `keterangan`, `foto`) VALUES
(1, 'Palu', 20000, 0, 'Palu besi', 'hammer.png'),
(2, 'Gunting', 5000, 80, 'Gunting Kertas MultiFungsi', 'gunting.png'),
(3, 'Baut', 1000, 985, 'Baut ukuran 1 inch', 'baut.png'),
(4, 'Kotak Peralatan', 100000, 1, 'Kotak peralatan multifungsi ukuran sedang', 'toolbox.png'),
(5, 'Cutter', 12000, 5, 'Cutter ukuran 1 meter', 'cutter.png');

-- --------------------------------------------------------

--
-- Table structure for table `detailpesanan`
--

CREATE TABLE `detailpesanan` (
  `id_pesanan` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `kurir` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `jenis_pembayaran` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detailpesanan`
--

INSERT INTO `detailpesanan` (`id_pesanan`, `total`, `kurir`, `alamat`, `jenis_pembayaran`) VALUES
(1, 170000, 'JNE', 'Rumah', 'bank'),
(2, 85000, 'SiCepat', 'Rumah', 'cod');

-- --------------------------------------------------------

--
-- Table structure for table `keranjang`
--

CREATE TABLE `keranjang` (
  `keranjang_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `barang_id` int(11) NOT NULL,
  `cookie_id` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `email`, `password`) VALUES
(1, 'admin@gmail.com', '12345');

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
  `gender` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id`, `nama_member`, `email`, `telp`, `alamat`, `gender`) VALUES
(1, 'admin', 'admin@gmail.com', '0823456789', 'Rumah', '1');

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `no` int(11) NOT NULL,
  `id_pesanan` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `barang_id` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`no`, `id_pesanan`, `member_id`, `barang_id`, `jumlah`) VALUES
(21, 1, 1, 3, 10),
(22, 1, 1, 4, 1),
(23, 1, 1, 5, 5),
(24, 2, 1, 5, 5),
(25, 2, 1, 2, 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detailpesanan`
--
ALTER TABLE `detailpesanan`
  ADD PRIMARY KEY (`id_pesanan`);

--
-- Indexes for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`keranjang_id`),
  ADD KEY `keranjang_ibfk_1` (`member_id`),
  ADD KEY `barang_id` (`barang_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQUE` (`email`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`no`),
  ADD KEY `member_id` (`member_id`),
  ADD KEY `barang_id` (`barang_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `keranjang_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD CONSTRAINT `keranjang_ibfk_1` FOREIGN KEY (`barang_id`) REFERENCES `barang` (`id`);

--
-- Constraints for table `member`
--
ALTER TABLE `member`
  ADD CONSTRAINT `member_ibfk_1` FOREIGN KEY (`email`) REFERENCES `login` (`email`);

--
-- Constraints for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD CONSTRAINT `pesanan_ibfk_2` FOREIGN KEY (`member_id`) REFERENCES `member` (`id`),
  ADD CONSTRAINT `pesanan_ibfk_3` FOREIGN KEY (`barang_id`) REFERENCES `barang` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
