-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 15, 2023 at 05:36 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e-health`
--

-- --------------------------------------------------------

--
-- Table structure for table `jadualguru`
--

CREATE TABLE `jadualguru` (
  `uploaded_at` date DEFAULT current_timestamp(),
  `gambar` varchar(255) NOT NULL,
  `id_gambar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `jadualwarden`
--

CREATE TABLE `jadualwarden` (
  `uploaded_at` date DEFAULT NULL,
  `id_gambar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `janjitemupelajar`
--

CREATE TABLE `janjitemupelajar` (
  `namapelajar` varchar(255) NOT NULL,
  `nokppelajar` char(12) NOT NULL,
  `programjtpelajar` varchar(255) NOT NULL,
  `tahunjtpelajar` varchar(255) NOT NULL,
  `waktujtpelajar` datetime NOT NULL,
  `tarikhjtpelajar` date NOT NULL,
  `notelpelajar` char(12) NOT NULL,
  `notelpenpelajar` char(12) NOT NULL,
  `alamatpelajar` varchar(255) NOT NULL,
  `sebabjt` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `jantinapelajar` varchar(255) NOT NULL,
  `alahanpelajar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `loginadmin`
--

CREATE TABLE `loginadmin` (
  `id` int(11) NOT NULL,
  `namapentadbir` varchar(225) NOT NULL,
  `katalaluanpentadbir` varchar(255) NOT NULL,
  `gambarprofilpentadbir` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `loginguru`
--

CREATE TABLE `loginguru` (
  `npenggunaguru` varchar(255) NOT NULL,
  `klaluanguru` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `loginwarden`
--

CREATE TABLE `loginwarden` (
  `npenggunawarden` varchar(255) NOT NULL,
  `klaluanwarden` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `mcslip`
--

CREATE TABLE `mcslip` (
  `id` int(11) NOT NULL,
  `mcslip` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `profilguru`
--

CREATE TABLE `profilguru` (
  `namaguru` varchar(255) NOT NULL,
  `nokpguru` char(12) NOT NULL,
  `notelguru` char(12) NOT NULL,
  `noplatguru` varchar(8) NOT NULL,
  `programguru` varchar(255) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `profilpelajar`
--

CREATE TABLE `profilpelajar` (
  `namapfpelajar` varchar(255) NOT NULL,
  `nokppfpelajar` char(12) NOT NULL,
  `nomatrikpelajar` varchar(12) NOT NULL,
  `dorm` varchar(6) NOT NULL,
  `notelpelajar` char(12) NOT NULL,
  `namabapapelajar` varchar(255) NOT NULL,
  `notelbapapelajar` char(12) NOT NULL,
  `namaibupelajar` varchar(255) NOT NULL,
  `notelibupelajar` char(12) NOT NULL,
  `penyakitpelajar` varchar(255) NOT NULL,
  `alamatpelajar` varchar(255) NOT NULL,
  `alahan` varchar(255) NOT NULL,
  `id_pelajar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `profilwarden`
--

CREATE TABLE `profilwarden` (
  `namawarden` varchar(255) NOT NULL,
  `nokpwarden` char(12) NOT NULL,
  `notelwarden` char(12) NOT NULL,
  `noplatwarden` varchar(225) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jadualguru`
--
ALTER TABLE `jadualguru`
  ADD PRIMARY KEY (`id_gambar`);

--
-- Indexes for table `jadualwarden`
--
ALTER TABLE `jadualwarden`
  ADD PRIMARY KEY (`id_gambar`);

--
-- Indexes for table `loginadmin`
--
ALTER TABLE `loginadmin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mcslip`
--
ALTER TABLE `mcslip`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profilguru`
--
ALTER TABLE `profilguru`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profilpelajar`
--
ALTER TABLE `profilpelajar`
  ADD PRIMARY KEY (`id_pelajar`),
  ADD UNIQUE KEY `nokppfpelajar` (`nokppfpelajar`);

--
-- Indexes for table `profilwarden`
--
ALTER TABLE `profilwarden`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jadualguru`
--
ALTER TABLE `jadualguru`
  MODIFY `id_gambar` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jadualwarden`
--
ALTER TABLE `jadualwarden`
  MODIFY `id_gambar` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `loginadmin`
--
ALTER TABLE `loginadmin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mcslip`
--
ALTER TABLE `mcslip`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `profilguru`
--
ALTER TABLE `profilguru`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `profilpelajar`
--
ALTER TABLE `profilpelajar`
  MODIFY `id_pelajar` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `profilwarden`
--
ALTER TABLE `profilwarden`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;