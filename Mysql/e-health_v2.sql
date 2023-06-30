-- MariaDB dump 10.19  Distrib 10.11.4-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: e-health
-- ------------------------------------------------------
-- Server version	10.11.4-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `jadualguru`
--

DROP TABLE IF EXISTS `jadualguru`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jadualguru` (
  `uploaded_at` date DEFAULT current_timestamp(),
  `gambar` varchar(255) NOT NULL,
  `id_gambar` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id_gambar`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jadualguru`
--

LOCK TABLES `jadualguru` WRITE;
/*!40000 ALTER TABLE `jadualguru` DISABLE KEYS */;
/*!40000 ALTER TABLE `jadualguru` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jadualwarden`
--

DROP TABLE IF EXISTS `jadualwarden`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jadualwarden` (
  `uploaded_at` date DEFAULT NULL,
  `id_gambar` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id_gambar`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jadualwarden`
--

LOCK TABLES `jadualwarden` WRITE;
/*!40000 ALTER TABLE `jadualwarden` DISABLE KEYS */;
/*!40000 ALTER TABLE `jadualwarden` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `janjitemupelajar`
--

DROP TABLE IF EXISTS `janjitemupelajar`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `janjitemupelajar`
--

LOCK TABLES `janjitemupelajar` WRITE;
/*!40000 ALTER TABLE `janjitemupelajar` DISABLE KEYS */;
INSERT INTO `janjitemupelajar` VALUES
('Iz','111111111111','KPD','2023','2023-06-20 07:38:26','2023-06-20','111111111111','111111111111','alamat','Isap Gam','Sihat','L',1),
('abc ','329108','KPD','1999','2023-06-21 06:54:29','2023-06-21','3489028','48239048','Alamat 1','Sebab 1','Status 1','L',1),
('ABC','329048','KPD','2020','2023-06-21 08:05:51','2023-06-21','328940','438092','Alamat 1','Sakit hati ','Dibenarkan','L',1);
/*!40000 ALTER TABLE `janjitemupelajar` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `loginadmin`
--

DROP TABLE IF EXISTS `loginadmin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `loginadmin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `namapentadbir` varchar(225) NOT NULL,
  `katalaluanpentadbir` char(60) NOT NULL,
  `gambarprofilpentadbir` varchar(225) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `namapentadbir` (`namapentadbir`),
  UNIQUE KEY `nama` (`namapentadbir`),
  UNIQUE KEY `namapentadbir_2` (`namapentadbir`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `loginadmin`
--

LOCK TABLES `loginadmin` WRITE;
/*!40000 ALTER TABLE `loginadmin` DISABLE KEYS */;
INSERT INTO `loginadmin` VALUES
(2,'Pentadbir 1','$2y$10$VMs0t./pvcqWNu4JWwlkEuZ3vv7zkf3kJn6TLMaNcGJ1oWfhO8hNG','');
/*!40000 ALTER TABLE `loginadmin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `loginguru`
--

DROP TABLE IF EXISTS `loginguru`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `loginguru` (
  `namaguru` varchar(255) NOT NULL,
  `katalaluanguru` char(60) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `gambarprofilguru` text DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `namaguru` (`namaguru`),
  UNIQUE KEY `nama` (`namaguru`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `loginguru`
--

LOCK TABLES `loginguru` WRITE;
/*!40000 ALTER TABLE `loginguru` DISABLE KEYS */;
/*!40000 ALTER TABLE `loginguru` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `loginpelajar`
--

DROP TABLE IF EXISTS `loginpelajar`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `loginpelajar` (
  `namapelajar` varchar(255) NOT NULL,
  `katalaluanpelajar` char(60) NOT NULL,
  `gambarprofilpelajar` text NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`),
  UNIQUE KEY `namapelajar` (`namapelajar`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `loginpelajar`
--

LOCK TABLES `loginpelajar` WRITE;
/*!40000 ALTER TABLE `loginpelajar` DISABLE KEYS */;
INSERT INTO `loginpelajar` VALUES
('Iz','$2y$10$NIqmauqaH8.YNPW.LXdsSOFJXSowTYK7mVzKoFRzFouRBwerUHdgG','',1),
('Pelajar 1','$2y$10$bBsqcUiABBNy1CYdIhHi8.pY.b2k4fo5lzDMJos2qmkESfCstwhmC','',2),
('Pelajar 2','$2y$10$f.lD2urtJv5SwflSxPHo7eyIXbZ4OIHGNgKXQ5MspQ853x/gs3wqy','',3),
('Pelajar 3','$2y$10$za2dgsYPGCUAfBWnSBq0t.i1uFwV0FfbbrBGDBVxyVmtcRaJnnRJq','',5),
('Pelajar 5','$2y$10$RqHfX7HNqKdY/P418a91z.fzuCr/ISNphF8r1YcXOm664GLkGH27y','',6),
('Pelajar 6','$2y$10$VRvszWDPnLExKbIOPAHNceS/GqT97dVy7gufuoZBmBXY5LhtlcwAq','',7);
/*!40000 ALTER TABLE `loginpelajar` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `loginwarden`
--

DROP TABLE IF EXISTS `loginwarden`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `loginwarden` (
  `namawarden` varchar(255) NOT NULL,
  `katalaluanwarden` char(60) NOT NULL,
  `gambarprofilwarden` text NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`),
  UNIQUE KEY `namawarden` (`namawarden`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `loginwarden`
--

LOCK TABLES `loginwarden` WRITE;
/*!40000 ALTER TABLE `loginwarden` DISABLE KEYS */;
/*!40000 ALTER TABLE `loginwarden` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mcslip`
--

DROP TABLE IF EXISTS `mcslip`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mcslip` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mcslip` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mcslip`
--

LOCK TABLES `mcslip` WRITE;
/*!40000 ALTER TABLE `mcslip` DISABLE KEYS */;
/*!40000 ALTER TABLE `mcslip` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `profilguru`
--

DROP TABLE IF EXISTS `profilguru`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `profilguru` (
  `nokp` char(12) NOT NULL,
  `notelguru` char(12) NOT NULL,
  `noplatguru` varchar(8) NOT NULL,
  `programguru` varchar(255) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_login` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nokpguru` (`nokp`),
  UNIQUE KEY `nokp` (`nokp`),
  KEY `profilguru_loginguru_fk` (`id_login`),
  CONSTRAINT `profilguru_loginguru_fk` FOREIGN KEY (`id_login`) REFERENCES `loginguru` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `profilguru`
--

LOCK TABLES `profilguru` WRITE;
/*!40000 ALTER TABLE `profilguru` DISABLE KEYS */;
/*!40000 ALTER TABLE `profilguru` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `profilpelajar`
--

DROP TABLE IF EXISTS `profilpelajar`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_login` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nokppfpelajar` (`nokp`),
  KEY `profilpelajar_loginpelajar_fk` (`id_login`),
  CONSTRAINT `profilpelajar_loginpelajar_fk` FOREIGN KEY (`id_login`) REFERENCES `loginpelajar` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `profilpelajar`
--

LOCK TABLES `profilpelajar` WRITE;
/*!40000 ALTER TABLE `profilpelajar` DISABLE KEYS */;
INSERT INTO `profilpelajar` VALUES
('123','123','123','123','bapa 1','123','ibu 1','123','Hati','alamat 1','alahan 1',1,2);
/*!40000 ALTER TABLE `profilpelajar` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `profilwarden`
--

DROP TABLE IF EXISTS `profilwarden`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `profilwarden` (
  `nokp` char(12) NOT NULL,
  `notelwarden` char(12) NOT NULL,
  `noplatwarden` varchar(225) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_login` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nokp` (`nokp`),
  KEY `profilwarden_loginwarden_fk` (`id_login`),
  CONSTRAINT `profilwarden_loginwarden_fk` FOREIGN KEY (`id_login`) REFERENCES `loginwarden` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `profilwarden`
--

LOCK TABLES `profilwarden` WRITE;
/*!40000 ALTER TABLE `profilwarden` DISABLE KEYS */;
/*!40000 ALTER TABLE `profilwarden` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-06-28 19:35:07
