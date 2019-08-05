-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 05, 2019 at 03:34 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.1.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `umkmcenter`
--

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `omset`
--

CREATE TABLE `omset` (
  `id` int(11) NOT NULL,
  `usaha_id` int(11) NOT NULL,
  `omset` int(11) NOT NULL,
  `penjualan` int(11) NOT NULL,
  `bulan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pemilik`
--

CREATE TABLE `pemilik` (
  `id` int(11) NOT NULL,
  `nama` varchar(120) NOT NULL,
  `alamat` text NOT NULL,
  `notelp` varchar(20) NOT NULL,
  `status` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `program`
--

CREATE TABLE `program` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `usaha`
--

CREATE TABLE `usaha` (
  `id` int(11) NOT NULL,
  `program_id` int(11) NOT NULL,
  `kategori_id` int(11) NOT NULL,
  `pemilik_id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `tahun_berdiri` int(11) NOT NULL,
  `alamat` text NOT NULL,
  `notelp` varchar(20) NOT NULL,
  `email` varchar(120) NOT NULL,
  `website` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `picext` varchar(5) DEFAULT NULL,
  `firstname` varchar(30) DEFAULT NULL,
  `lastname` varchar(30) DEFAULT NULL,
  `email` varchar(128) DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL,
  `createtime` int(11) DEFAULT NULL,
  `lastactive` int(11) DEFAULT NULL,
  `inviter` int(11) DEFAULT NULL,
  `invitecode` varchar(10) DEFAULT NULL,
  `superuser` tinyint(4) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '0',
  `points` int(11) NOT NULL,
  `last_claim_point` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `picext`, `firstname`, `lastname`, `email`, `password`, `createtime`, `lastactive`, `inviter`, `invitecode`, `superuser`, `status`, `points`, `last_claim_point`) VALUES
(1, NULL, 'Ari', 'Mardani', 'ari.layanglistrik@gmail.com', '10dfbc3b39a3f1099be2ac11de6f732b', 1562236685, 1564740354, NULL, 'ARIMAR', 1, 1, 20, '2019-08-02'),
(2, NULL, 'Abdul', 'Ghofar', 'ofaasd@gmail.com', '91fcac51c1cb301c0142587bdb5bd206', 1563865566, 1564801630, NULL, 'ABDULG', 1, 1, 20, '2019-07-31'),
(3, NULL, 'randy', 'hussen', 'randyrahmanhussen@gmail.com', 'a48cde137bf48c7a5c1eae19eb8e1bb0', 1563869834, 1564801217, NULL, 'RANDYH', 0, 1, 0, '0000-00-00'),
(4, NULL, 'randy', 'hussen', 'adspertmedia@gmail.com', 'd9721fdb0df1925c8eca0e8f03a3029c', 1563935196, 1564567715, NULL, 'RANDYH1', 0, 1, 0, '0000-00-00'),
(5, NULL, NULL, NULL, 'masrandhu@gmail.com', '716e4243b32bd0ea02ca4b7c38b017d3', 1564627434, 1564716533, NULL, NULL, 1, 1, 0, '0000-00-00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `omset`
--
ALTER TABLE `omset`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usaha_id` (`usaha_id`);

--
-- Indexes for table `pemilik`
--
ALTER TABLE `pemilik`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `program`
--
ALTER TABLE `program`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usaha`
--
ALTER TABLE `usaha`
  ADD PRIMARY KEY (`id`),
  ADD KEY `program_id` (`program_id`),
  ADD KEY `kategori_id` (`kategori_id`),
  ADD KEY `pemilik_id` (`pemilik_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `inviter` (`inviter`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `omset`
--
ALTER TABLE `omset`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pemilik`
--
ALTER TABLE `pemilik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `program`
--
ALTER TABLE `program`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `usaha`
--
ALTER TABLE `usaha`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `omset`
--
ALTER TABLE `omset`
  ADD CONSTRAINT `omset_ibfk_1` FOREIGN KEY (`usaha_id`) REFERENCES `usaha` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `usaha`
--
ALTER TABLE `usaha`
  ADD CONSTRAINT `usaha_ibfk_1` FOREIGN KEY (`kategori_id`) REFERENCES `kategori` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `usaha_ibfk_2` FOREIGN KEY (`program_id`) REFERENCES `program` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `usaha_ibfk_3` FOREIGN KEY (`pemilik_id`) REFERENCES `pemilik` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
