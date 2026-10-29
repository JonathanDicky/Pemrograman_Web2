-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 29, 2026 at 02:04 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pendaftaran_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `pendaftar`
--

CREATE TABLE `pendaftar` (
  `id` int(11) NOT NULL,
  `kode` varchar(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jk` varchar(20) NOT NULL,
  `ttl` varchar(100) NOT NULL,
  `sekolah` varchar(100) NOT NULL,
  `pekerjaan` varchar(100) NOT NULL,
  `mat` float NOT NULL,
  `bing` float NOT NULL,
  `umum` float NOT NULL,
  `rata` float NOT NULL,
  `ket` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pendaftar`
--

INSERT INTO `pendaftar` (`id`, `kode`, `nama`, `jk`, `ttl`, `sekolah`, `pekerjaan`, `mat`, `bing`, `umum`, `rata`, `ket`, `created_at`) VALUES
(1, 'A4-101-0', 'Jonathan Dicky Saputra', 'Laki-laki', 'Tangerang, 03-04-2004', 'SMAN 7 TANGSEL', 'Karyawan Swasta', 75, 50, 80, 68.3333, 'Cadangan', '2026-10-29 13:01:41'),
(2, 'A1-102-0', 'Hillary Abigail', 'Perempuan', 'Tangerang, 04-08-2008', 'SMAN 1 TANGSEL', '-', 80, 90, 85, 85, 'Lulus', '2026-10-29 13:02:34'),
(3, 'V4-103-0', 'Revanda Chandra Chrisna', 'Laki-laki', 'Tangerang, 09-11-2003', 'SMKN 3 TANGSEL', '-', 60, 70, 75, 68.3333, 'Cadangan', '2026-10-29 13:03:12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pendaftar`
--
ALTER TABLE `pendaftar`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pendaftar`
--
ALTER TABLE `pendaftar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
