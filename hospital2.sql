-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 09, 2023 at 08:28 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hospital2`
--

-- --------------------------------------------------------

--
-- Table structure for table `gurubertugas`
--

CREATE TABLE `gurubertugas` (
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gurubertugas`
--

INSERT INTO `gurubertugas` (`username`, `password`) VALUES
('Guru Bertugas', 'kvgerik');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `img_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `img_name`) VALUES
(1, 'IMG-641dbcc692bee9.28737432.jpg'),
(2, 'IMG-641dbd323dbc85.50959585.jpg'),
(3, 'IMG-641dbe6123eb30.65163614.jpg'),
(4, 'IMG-641dc2cf6fa500.33861411.jpg'),
(5, 'IMG-64206c854d0fb8.78827771.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `jadual`
--

CREATE TABLE `jadual` (
  `id` int(11) NOT NULL,
  `image` varchar(200) DEFAULT NULL,
  `text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `janjitemu`
--

CREATE TABLE `janjitemu` (
  `nama` text NOT NULL,
  `nokp` char(12) NOT NULL,
  `program` varchar(255) NOT NULL,
  `tahun` varchar(255) NOT NULL,
  `id_janjitemu` int(10) NOT NULL,
  `waktu` varchar(255) NOT NULL,
  `tarikh` date NOT NULL,
  `notel` varchar(12) DEFAULT NULL,
  `notelpen` varchar(12) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `jantina` varchar(50) DEFAULT NULL,
  `sebab` varchar(255) DEFAULT NULL,
  `status` varchar(100) DEFAULT 'dalam proses'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `janjitemu`
--

INSERT INTO `janjitemu` (`nama`, `nokp`, `program`, `tahun`, `id_janjitemu`, `waktu`, `tarikh`, `notel`, `notelpen`, `alamat`, `jantina`, `sebab`, `status`) VALUES
('NUR ATHIRAH BINTI MOHAMAD AZALI', '12345678911', 'KPD', 'Tahun 1 SVM', 33, '9.00 A.M', '2023-04-07', '0108694863', '0108694863', 'No 42, Jalan Kemboja 2/4, Ampang 68000, Selangor', 'perempuan', 'Batuk', 'Sah'),
('NUR ATHIRAH BINTI MOHAMAD AZALI', '030102101572', 'WTP', 'Tahun 1 SVM', 34, '3.00 P.M', '2023-04-28', '0108694863', '0122164723', 'NO 41, JALAN 2, TAMAN PUTRA, 68000 AMPANG SELANGOR', 'perempuan', 'Demam', 'Tidak Sah'),
('Sofia', '030531080108', 'KPD', 'Tahun 2 DVM', 35, '9.00 A.M', '2023-04-29', '0108694863', '0122164723', 'Kolej Vokasional Gerik', 'perempuan', 'Demam, Batuk', 'Tidak Sah'),
('sofia', '030531080108', 'KPD', 'Tahun 1 SVM', 36, '9.00 A.M', '2023-04-03', '0198764532', '0122164723', 'ipoh', 'perempuan', 'Demam', 'dalam proses');

-- --------------------------------------------------------

--
-- Table structure for table `loginadmin`
--

CREATE TABLE `loginadmin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `loginadmin`
--

INSERT INTO `loginadmin` (`id`, `username`, `password`, `image`) VALUES
(1, 'admin', 'admin123', NULL),
(2, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'jadual.png'),
(3, 'admin', '4acb4bc224acbbe3c2bfdcaa39a4324e', 'jadual.png'),
(4, 'admin', 'af05760c20fa787bb3ef24aa386aed32', 'Depositphotos_219048614_s-2019.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `mc`
--

CREATE TABLE `mc` (
  `id` int(11) NOT NULL,
  `pdf` varchar(100) DEFAULT NULL,
  `jenis` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mc`
--

INSERT INTO `mc` (`id`, `pdf`, `jenis`) VALUES
(2, 'TIMESLIP1.pdf', 'MC'),
(3, 'MC3.pdf', 'MC'),
(4, 'cartalir.pdf', 'Time Slip');

-- --------------------------------------------------------

--
-- Table structure for table `user_form`
--

CREATE TABLE `user_form` (
  `id_pelajar` int(11) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nokp` char(15) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `image` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_form`
--

INSERT INTO `user_form` (`id_pelajar`, `password`, `nokp`, `nama`, `image`) VALUES
(1, '35f6ce383ff9f7b1734d2f348b1f76b3', '001', 'pelajar', ''),
(2, 'ad0234829205b9033196ba818f7a872b', '002', 'test2', 'download.jpg'),
(3, '8ad8757baa8564dc136c1e07507f4a98', '', '', 'IMG_20190317_191215_675.jpg'),
(4, 'd2490f048dc3b77a457e3e450ab4eb38', '012', 'ATHIRAH', 'download.jpg'),
(5, '0e51011a4c4891e5c01c12d85c4dcaa7', '014', '014', ''),
(6, '25d55ad283aa400af464c76d713c07ad', '030811080604', 'NUR MAISARAH BINTI SHARUDDIN', ''),
(8, 'd41d8cd98f00b204e9800998ecf8427e', '016', '016', 'Evolutionary-Prototyping-SE-methodology-20.png'),
(10, 'd41d8cd98f00b204e9800998ecf8427e', '019', '019', 'blank-profile.jpg'),
(11, '81dc9bdb52d04dc20036dbd8313ed055', '030531080108', 'Sofia ', 'pelajar2.jpeg'),
(12, '202cb962ac59075b964b07152d234b70', '123', 'athirah', ''),
(13, '202cb962ac59075b964b07152d234b70', '030102101572', 'athirah', ''),
(14, '520e24284ee323c7fd3847fa4373ddeb', '01221', '01221', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gurubertugas`
--
ALTER TABLE `gurubertugas`
  ADD PRIMARY KEY (`password`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jadual`
--
ALTER TABLE `jadual`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `janjitemu`
--
ALTER TABLE `janjitemu`
  ADD PRIMARY KEY (`id_janjitemu`);

--
-- Indexes for table `loginadmin`
--
ALTER TABLE `loginadmin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mc`
--
ALTER TABLE `mc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_form`
--
ALTER TABLE `user_form`
  ADD PRIMARY KEY (`id_pelajar`),
  ADD UNIQUE KEY `nokp` (`nokp`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `jadual`
--
ALTER TABLE `jadual`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `janjitemu`
--
ALTER TABLE `janjitemu`
  MODIFY `id_janjitemu` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `loginadmin`
--
ALTER TABLE `loginadmin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `mc`
--
ALTER TABLE `mc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_form`
--
ALTER TABLE `user_form`
  MODIFY `id_pelajar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
