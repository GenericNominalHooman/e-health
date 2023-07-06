-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 24, 2023 at 01:56 PM
-- Server version: 10.11.4-MariaDB
-- PHP Version: 8.2.7

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jadualwarden`
--

CREATE TABLE `jadualwarden` (
  `uploaded_at` date DEFAULT NULL,
  `id_gambar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `janjitemupelajar`
--

INSERT INTO `janjitemupelajar` (`namapelajar`, `nokppelajar`, `programjtpelajar`, `tahunjtpelajar`, `waktujtpelajar`, `tarikhjtpelajar`, `notelpelajar`, `notelpenpelajar`, `alamatpelajar`, `sebabjt`, `status`, `jantinapelajar`, `alahanpelajar`) VALUES
('Iz', '111111111111', 'KPD', '2023', '2023-06-20 07:38:26', '2023-06-20', '111111111111', '111111111111', 'alamat', 'Isap Gam', 'Sihat', 'L', 1),
('abc ', '329108', 'KPD', '1999', '2023-06-21 06:54:29', '2023-06-21', '3489028', '48239048', 'Alamat 1', 'Sebab 1', 'Status 1', 'L', 1),
('ABC', '329048', 'KPD', '2020', '2023-06-21 08:05:51', '2023-06-21', '328940', '438092', 'Alamat 1', 'Sakit hati ', 'Dibenarkan', 'L', 1);

-- --------------------------------------------------------

--
-- Table structure for table `loginadmin`
--

CREATE TABLE `loginadmin` (
  `id` int(11) NOT NULL,
  `namapentadbir` varchar(225) NOT NULL,
  `katalaluanpentadbir` char(60) NOT NULL,
  `gambarprofilpentadbir` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `loginadmin`
--

INSERT INTO `loginadmin` (`id`, `namapentadbir`, `katalaluanpentadbir`, `gambarprofilpentadbir`) VALUES
(2, 'Pentadbir 1', '$2y$10$VMs0t./pvcqWNu4JWwlkEuZ3vv7zkf3kJn6TLMaNcGJ1oWfhO8hNG', '');

-- --------------------------------------------------------

--
-- Table structure for table `loginguru`
--

CREATE TABLE `loginguru` (
  `namaguru` varchar(255) NOT NULL,
  `katalaluanguru` char(60) NOT NULL,
  `id` int(11) NOT NULL,
  `gambarprofilguru` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `loginpelajar`
--

CREATE TABLE `loginpelajar` (
  `namapelajar` varchar(255) NOT NULL,
  `katalaluanpelajar` char(60) NOT NULL,
  `gambarprofilpelajar` text NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `loginpelajar`
--

INSERT INTO `loginpelajar` (`namapelajar`, `katalaluanpelajar`, `gambarprofilpelajar`, `id`) VALUES
('Iz', '$2y$10$NIqmauqaH8.YNPW.LXdsSOFJXSowTYK7mVzKoFRzFouRBwerUHdgG', '', 1),
('Pelajar 1', '$2y$10$bBsqcUiABBNy1CYdIhHi8.pY.b2k4fo5lzDMJos2qmkESfCstwhmC', '', 2),
('Pelajar 2', '$2y$10$f.lD2urtJv5SwflSxPHo7eyIXbZ4OIHGNgKXQ5MspQ853x/gs3wqy', '', 3),
('Pelajar 3', '$2y$10$za2dgsYPGCUAfBWnSBq0t.i1uFwV0FfbbrBGDBVxyVmtcRaJnnRJq', '', 5);

-- --------------------------------------------------------

--
-- Table structure for table `loginwarden`
--

CREATE TABLE `loginwarden` (
  `namawarden` varchar(255) NOT NULL,
  `katalaluanwarden` char(60) NOT NULL,
  `gambarprofilwarden` text NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mcslip`
--

CREATE TABLE `mcslip` (
  `id` int(11) NOT NULL,
  `mcslip` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `profilguru`
--

CREATE TABLE `profilguru` (
  `nokpguru` char(12) NOT NULL,
  `notelguru` char(12) NOT NULL,
  `noplatguru` varchar(8) NOT NULL,
  `programguru` varchar(255) NOT NULL,
  `id` int(11) NOT NULL,
  `id_login` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `profilpelajar`
--

CREATE TABLE `profilpelajar` (
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
  `id` int(11) NOT NULL,
  `id_login` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `profilwarden`
--

CREATE TABLE `profilwarden` (
  `nokpwarden` char(12) NOT NULL,
  `notelwarden` char(12) NOT NULL,
  `noplatwarden` varchar(225) NOT NULL,
  `id` int(11) NOT NULL,
  `id_login` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `namapentadbir` (`namapentadbir`);

--
-- Indexes for table `loginguru`
--
ALTER TABLE `loginguru`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `namaguru` (`namaguru`);

--
-- Indexes for table `loginpelajar`
--
ALTER TABLE `loginpelajar`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `namapelajar` (`namapelajar`);

--
-- Indexes for table `loginwarden`
--
ALTER TABLE `loginwarden`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `namawarden` (`namawarden`);

--
-- Indexes for table `mcslip`
--
ALTER TABLE `mcslip`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profilguru`
--
ALTER TABLE `profilguru`
  ADD PRIMARY KEY (`id`),
  ADD KEY `profilguru_loginguru_fk` (`id_login`);

--
-- Indexes for table `profilpelajar`
--
ALTER TABLE `profilpelajar`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nokppfpelajar` (`nokppfpelajar`),
  ADD KEY `profilpelajar_loginpelajar_fk` (`id_login`);

--
-- Indexes for table `profilwarden`
--
ALTER TABLE `profilwarden`
  ADD PRIMARY KEY (`id`),
  ADD KEY `profilwarden_loginwarden_fk` (`id_login`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `loginguru`
--
ALTER TABLE `loginguru`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `loginpelajar`
--
ALTER TABLE `loginpelajar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `loginwarden`
--
ALTER TABLE `loginwarden`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `profilwarden`
--
ALTER TABLE `profilwarden`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `profilguru`
--
ALTER TABLE `profilguru`
  ADD CONSTRAINT `profilguru_loginguru_fk` FOREIGN KEY (`id_login`) REFERENCES `loginguru` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `profilpelajar`
--
ALTER TABLE `profilpelajar`
  ADD CONSTRAINT `profilpelajar_loginpelajar_fk` FOREIGN KEY (`id_login`) REFERENCES `loginpelajar` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `profilwarden`
--
ALTER TABLE `profilwarden`
  ADD CONSTRAINT `profilwarden_loginwarden_fk` FOREIGN KEY (`id_login`) REFERENCES `loginwarden` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
