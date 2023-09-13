-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 13, 2023 at 06:35 AM
-- Server version: 11.1.2-MariaDB
-- PHP Version: 8.2.10

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
  `uploaded_at` datetime DEFAULT current_timestamp(),
  `gambar` varchar(255) NOT NULL,
  `id_gambar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jadualguru`
--

INSERT INTO `jadualguru` (`uploaded_at`, `gambar`, `id_gambar`) VALUES
('2023-07-04 00:00:00', 'jadualGuru.png', 3),
('2023-07-12 00:00:00', 'Screenshot_20220126_095107.png', 4),
('2023-07-12 00:00:00', 'runCloud.png', 5),
('2023-07-12 00:00:00', 'Screenshot_20230222_115441.png', 6),
('2023-07-12 00:00:00', 'windowView_scaled.jpg', 7),
('2023-07-12 00:00:00', 'DALL·E 2023-02-28 20.06.54 - surface of the moon.png', 8),
('2023-07-12 15:46:15', 'Screenshot_20230222_123358.png', 9);

-- --------------------------------------------------------

--
-- Table structure for table `jadualwarden`
--

CREATE TABLE `jadualwarden` (
  `uploaded_at` datetime DEFAULT NULL,
  `id_gambar` int(11) NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jadualwarden`
--

INSERT INTO `jadualwarden` (`uploaded_at`, `id_gambar`, `gambar`) VALUES
('2023-07-04 00:00:00', 1, 'jadualWarden.png'),
('2023-07-12 00:00:00', 2, 'Screenshot_20220126_093221.png'),
('2023-07-12 00:00:00', 3, 'tesst.png'),
('2023-07-13 00:51:28', 4, 'Screenshot_20211220_175738.png'),
('2023-07-14 03:50:36', 5, 'javaIcon.png');

-- --------------------------------------------------------

--
-- Table structure for table `janjitemupelajar`
--

CREATE TABLE `janjitemupelajar` (
  `waktujtpelajar` datetime NOT NULL,
  `sebabjt` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `id_pelajar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `janjitemupelajar`
--

INSERT INTO `janjitemupelajar` (`waktujtpelajar`, `sebabjt`, `status`, `id_pelajar`) VALUES
('2023-08-05 10:00:00', 'Demam', 'Proses', 8),
('2023-07-06 10:00:00', 'Selesema', 'Proses', 8),
('2023-07-12 10:00:00', 'Demam', 'Proses', 8);

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

--
-- Dumping data for table `loginguru`
--

INSERT INTO `loginguru` (`namaguru`, `katalaluanguru`, `id`, `gambarprofilguru`) VALUES
('Guru 1', '$2y$10$XlYkA40N8EygGGgt3z/0eemWayEGAPF7UvR.7g.K7wQRVgeFxGwfi', 2, 'guru_2_jadualGuru.png'),
('Guru 2', '$2y$10$hBt4jOVLcQqMBCBijMP5D.Jl4JazrS5zmPP2esnS0DCwSSiLubXpq', 3, 'guru_3_jadualWarden.png');

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
('Pelajar 1', '$2y$10$ran3Mh9AXrXEaMfFqauPLeWgiDYJkhOJyQxwqUdWhaaYy0dcJ/GCi', 'pelajar_8_10001049_829804523700948_4278953542107584625_o.jpg', 8),
('Pelajar 2', '$2y$10$exvzoeVBAzGIANQRzhrtM.iVW6o8DWPl0D2EDDg7Eci7d88RsNMPy', 'pelajar_9_Sitemap.png', 9),
('asdasd', '$2y$10$ZupV8YHDIqMif6jm.rTjFu7ez4a2sjNMflaho3YWt0jblK8u0/DkS', '', 10),
('Pelajar 5', '$2y$10$AU8goSU3csX4YsvvZ7ArzueN..zor1wec6DpqbpPXQ4HUGt8oz2nO', '', 12),
('Pelajar 6', '$2y$10$g00ZzpCAt/QHnzE0whH7dOOpXtbtX.JMYMWBaqx1BzbT1cexzhbja', '', 13),
('Pelajar 4', '$2y$10$VtGUdJGynAhiQXWg2SpYyuCns9grMWpQJMcvO/jv.leIhJFRjAHI6', '', 14),
('Pelajar 3', '$2y$10$.e6rV20AA07fOwDlOkNkouI6Fdf0SZIh0IbcUgS7giEctRm68M0t6', '', 15),
('Pelajar 7', '$2y$10$RD0MMBzHQrP0u3rhYMFl9uBxdkIy34ivkNwgUaqkIM/Oz3erTSAbi', '', 16),
('Pelajar 8', '$2y$10$zP2q77Xkpo0E6f4dF1ymu.pPljK0EGxnQP1S3QbXO2tsFbRdIKqhG', '', 17),
('Pelajar 9', '$2y$10$52bCjF.9K/23znPj9BZ2Pec1B/42ggPtLf5MKQsoKVfSBrAV1Xw6C', '', 18),
('Pelajar 10', '$2y$10$0FzhA.5gO6tq1HIWUPRWEeaJJX0bYbwRAbrhmdVvV5IeZeLy3g2mS', '', 19),
('123456789012', '$2y$10$IEodvUkIfy4mbiR9O.qPYu1Pa8IAawPFWBjvxa7UWgcJgedhWXxDy', '', 20),
('Pelajar 11', '$2y$10$S5ysgX8u9wvdeh1cm0hy2.VieNnYUONamMtQlFD1bDmT4/yHvhpCO', '', 21);

-- --------------------------------------------------------

--
-- Table structure for table `loginpentadbir`
--

CREATE TABLE `loginpentadbir` (
  `id` int(11) NOT NULL,
  `namapentadbir` varchar(225) NOT NULL,
  `katalaluanpentadbir` char(60) NOT NULL,
  `gambarprofilpentadbir` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `loginpentadbir`
--

INSERT INTO `loginpentadbir` (`id`, `namapentadbir`, `katalaluanpentadbir`, `gambarprofilpentadbir`) VALUES
(2, 'Pentadbir 176786', '$2y$10$aLadYeV5SNeL4jZ4kRZ1aeUZo67eJgHffLGa3c0TDjW3BR1/Vm8.O', 'pentadbir_2_runCloud.png'),
(4, 'Pentadbir 2', '$2y$10$AVOQgZQB46sNWFR5QxDpDOeZNjoT1OxnStf4xVLBnjYowbClb/HL6', 'pentadbir_4_jadualGuru.png'),
(5, 'kmrl', '$2y$10$0SEfL63qud/MKHaIo1B51ugIHwOy2G8cCjhyiFr/6yYEsE5TMGBNK', ''),
(6, 'Pentadbir 100', '$2y$10$hv3nceYFtzpKD7rybc/Y9e7VT578O67aHsLsLLyZfMhEa2MRw/QCq', 'pentadbir_6_Screenshot_20230222_115441.png'),
(7, 'admin', '$2y$10$8nXOALBSlDEtAcYl4LkQOe8n7lDLW6ozY4eEtH.98FfT3C.KOUGda', ''),
(8, 'Pentadbir 1', '$2y$10$8JGcYgg1brYQaTT7grPn2.7S/nAW9ZF90I6U3yJEe5oIU4JfGSrX.', 'pentadbir_8_WhatsApp Image 2022-12-21 at 21.42.06.jpeg'),
(9, 'admin 10', '$2y$10$3LgkQBk9xZriZtbegx3bc.EIBi5tpUlGd0ooiQRvsqV/PgxPE9jnC', '');

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

--
-- Dumping data for table `loginwarden`
--

INSERT INTO `loginwarden` (`namawarden`, `katalaluanwarden`, `gambarprofilwarden`, `id`) VALUES
('Warden 1', '$2y$10$iSqrJeVJLDWxzguD5EbWnOjT7SzoBVJqpDWiFhODB/QNkgkDnWWCS', 'warden_1_Screenshot_20220929_111226.png', 1),
('Warden 2', '$2y$10$SCC74/xC0ZKLTCg.a7nKF.CTtIthD6v2rCFIlENj5pxITwcv0vprm', 'warden_2_jadualGuru.png', 2);

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
  `nokp` char(12) NOT NULL,
  `notelguru` char(12) NOT NULL,
  `noplatguru` varchar(8) NOT NULL,
  `programguru` varchar(255) NOT NULL,
  `id` int(11) NOT NULL,
  `id_login` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `profilguru`
--

INSERT INTO `profilguru` (`nokp`, `notelguru`, `noplatguru`, `programguru`, `id`, `id_login`) VALUES
('987', '123123', '123123', '123123', 1, 2),
('456', '123', '123', '1232313', 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `profilpelajar`
--

CREATE TABLE `profilpelajar` (
  `nokp` char(12) NOT NULL,
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

--
-- Dumping data for table `profilpelajar`
--

INSERT INTO `profilpelajar` (`nokp`, `nomatrikpelajar`, `dorm`, `notelpelajar`, `namabapapelajar`, `notelbapapelajar`, `namaibupelajar`, `notelibupelajar`, `penyakitpelajar`, `alamatpelajar`, `alahan`, `id`, `id_login`) VALUES
('123123', '123', '123', '123', 'bapa 1', '123', 'ibu 1', '123', 'penyakit 1', 'alamat 1', 'alahan 1', 123, 8),
('040916080159', 'AKV0222KA092', 'A201', '01127135691', 'Zahari', '0195417079', 'Zhafirah', '0165190476', 'Tiada', '7, Laluan 15 Taman Chepor Impian, Taman Chepor Impian, Chemor Chepor, Perak 31200', 'Tiada', 124, 9),
('123123123', '213123', '123', '123', 'Bapa 1', '123', 'Ibu 1', '123', 'Penyakit 1', 'Alamat 1', 'Alahan 1', 125, 17),
('12323123', '213', '123', '123', 'Bapa 1', '123', 'Ibu 1', '123', 'Penyakit 1', 'Alamat 1', 'Alahan 1', 126, 18),
('18293087', '213', '812309', '128390128', '128312938', '132808', '822384902', '82390483208', '32894023', '432803482', '3849048320', 127, 16);

-- --------------------------------------------------------

--
-- Table structure for table `profilwarden`
--

CREATE TABLE `profilwarden` (
  `nokp` char(12) NOT NULL,
  `notelwarden` char(12) NOT NULL,
  `noplatwarden` varchar(225) NOT NULL,
  `id` int(11) NOT NULL,
  `id_login` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `profilwarden`
--

INSERT INTO `profilwarden` (`nokp`, `notelwarden`, `noplatwarden`, `id`, `id_login`) VALUES
('356563', '12312312312', '123123123123', 1, 1),
('9876', '12312312', '123', 6, 2);

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
-- Indexes for table `janjitemupelajar`
--
ALTER TABLE `janjitemupelajar`
  ADD KEY `janjitemupelajar.id_pelajar_loginpelajar.id_fk` (`id_pelajar`);

--
-- Indexes for table `loginguru`
--
ALTER TABLE `loginguru`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `namaguru` (`namaguru`),
  ADD UNIQUE KEY `nama` (`namaguru`);

--
-- Indexes for table `loginpelajar`
--
ALTER TABLE `loginpelajar`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `namapelajar` (`namapelajar`);

--
-- Indexes for table `loginpentadbir`
--
ALTER TABLE `loginpentadbir`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `namapentadbir` (`namapentadbir`),
  ADD UNIQUE KEY `nama` (`namapentadbir`),
  ADD UNIQUE KEY `namapentadbir_2` (`namapentadbir`);

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
  ADD UNIQUE KEY `nokpguru` (`nokp`),
  ADD UNIQUE KEY `nokp` (`nokp`),
  ADD KEY `profilguru_loginguru_fk` (`id_login`);

--
-- Indexes for table `profilpelajar`
--
ALTER TABLE `profilpelajar`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nokppfpelajar` (`nokp`),
  ADD KEY `profilpelajar_loginpelajar_fk` (`id_login`);

--
-- Indexes for table `profilwarden`
--
ALTER TABLE `profilwarden`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nokp` (`nokp`),
  ADD KEY `profilwarden_loginwarden_fk` (`id_login`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jadualguru`
--
ALTER TABLE `jadualguru`
  MODIFY `id_gambar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `jadualwarden`
--
ALTER TABLE `jadualwarden`
  MODIFY `id_gambar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `loginguru`
--
ALTER TABLE `loginguru`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `loginpelajar`
--
ALTER TABLE `loginpelajar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `loginpentadbir`
--
ALTER TABLE `loginpentadbir`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `loginwarden`
--
ALTER TABLE `loginwarden`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `mcslip`
--
ALTER TABLE `mcslip`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `profilguru`
--
ALTER TABLE `profilguru`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `profilpelajar`
--
ALTER TABLE `profilpelajar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;

--
-- AUTO_INCREMENT for table `profilwarden`
--
ALTER TABLE `profilwarden`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `janjitemupelajar`
--
ALTER TABLE `janjitemupelajar`
  ADD CONSTRAINT `loginpelajar_profilpelajar_fk` FOREIGN KEY (`id_pelajar`) REFERENCES `loginpelajar` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
