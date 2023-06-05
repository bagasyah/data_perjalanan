-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 05, 2023 at 08:25 AM
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
-- Database: `perjalanan`
--

-- --------------------------------------------------------

--
-- Table structure for table `laporan_perjalanan`
--

CREATE TABLE `laporan_perjalanan` (
  `id` int(11) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `tanggal` date NOT NULL,
  `alamat_awal` varchar(255) NOT NULL,
  `alamat_tujuan` varchar(255) NOT NULL,
  `km_awal` float NOT NULL,
  `km_akhir` float NOT NULL,
  `km_total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `laporan_perjalanan`
--

INSERT INTO `laporan_perjalanan` (`id`, `gambar`, `nama`, `tanggal`, `alamat_awal`, `alamat_tujuan`, `km_awal`, `km_akhir`, `km_total`) VALUES
(15, 'vr.jpg', 'Bagasyah', '2023-06-07', 'padang', 'palembang', 23, 67, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `laporan_perjalanan`
--
ALTER TABLE `laporan_perjalanan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `laporan_perjalanan`
--
ALTER TABLE `laporan_perjalanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
