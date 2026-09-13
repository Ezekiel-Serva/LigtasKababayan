/*M!999999\- enable the sandbox mode */ 
-- MariaDB dump 10.19-12.3.2-MariaDB, for Android (aarch64)
--
-- Host: localhost    Database: ligtaskababayan_db
-- ------------------------------------------------------
-- Server version	12.3.2-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*M!100616 SET @OLD_NOTE_VERBOSITY=@@NOTE_VERBOSITY, NOTE_VERBOSITY=0 */;

--
-- Table structure for table `apCredentials`
--

DROP TABLE IF EXISTS `apCredentials`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `apCredentials` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fullName` varchar(125) NOT NULL,
  `phoneNumber` varchar(15) NOT NULL,
  `password` varchar(255) NOT NULL,
  `assignedLoc` varchar(125) NOT NULL,
  `barangayId` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique_phone` (`phoneNumber`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `apCredentials`
--

SET @OLD_AUTOCOMMIT=@@AUTOCOMMIT, @@AUTOCOMMIT=0;
LOCK TABLES `apCredentials` WRITE;
/*!40000 ALTER TABLE `apCredentials` DISABLE KEYS */;
INSERT INTO `apCredentials` VALUES
(1,'sjssjdj','46464646','$2y$12$h0tpMlh1NizQIH4ibak9xuiuxBUB95OOV/k6xBfO8M4E8uGVCO15.','djdjdjd',NULL),
(2,'Serva Ezekiel','09102615313','$2y$12$WoLPfz8gTp2YplSh2sTP.eeqvIKWyucdRc9ZRUycG.S30j/NA9etS','Nwssu',NULL),
(3,'John','123456789','$2y$12$t0HGwUwLKj7j//9CNMOWCuchLO7Z/GsEzfNalooR3.w5KRZf0rm7m','NwssuvSocio',NULL),
(4,'Wawawa','123456','$2y$12$LGihWhoa.tB008d7EcTDHe7REuwfQm7MFgNeCET8OkEP32D26Szz6','Nwssu Gym',NULL);
/*!40000 ALTER TABLE `apCredentials` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;
SET AUTOCOMMIT=@OLD_AUTOCOMMIT;

--
-- Table structure for table `evacuationCenters`
--

DROP TABLE IF EXISTS `evacuationCenters`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `evacuationCenters` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `centerName` varchar(125) NOT NULL,
  `barangayId` int(11) DEFAULT NULL,
  `maxCapacity` int(11) NOT NULL DEFAULT 100,
  `currentOccupancy` int(11) NOT NULL DEFAULT 0,
  `lastUpdated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `latitude` decimal(10,8) DEFAULT NULL,
  `longitude` decimal(11,8) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique_center_name` (`centerName`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `evacuationCenters`
--

SET @OLD_AUTOCOMMIT=@@AUTOCOMMIT, @@AUTOCOMMIT=0;
LOCK TABLES `evacuationCenters` WRITE;
/*!40000 ALTER TABLE `evacuationCenters` DISABLE KEYS */;
INSERT INTO `evacuationCenters` VALUES
(1,'NwssuvSocio',1,100,81,'2026-09-13 07:30:12',NULL,NULL),
(2,'nwssu gym',NULL,100,70,'2026-09-13 10:36:49',12.07427440,124.58917730);
/*!40000 ALTER TABLE `evacuationCenters` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;
SET AUTOCOMMIT=@OLD_AUTOCOMMIT;

--
-- Table structure for table `user_info`
--

DROP TABLE IF EXISTS `user_info`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `user_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `water_level` varchar(70) DEFAULT NULL,
  `lat` decimal(10,7) DEFAULT NULL,
  `lng` decimal(10,7) DEFAULT NULL,
  `description` varchar(300) DEFAULT NULL,
  `headcount` varchar(50) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `status` varchar(100) NOT NULL DEFAULT 'active',
  `photo` varchar(255) DEFAULT NULL,
  `vulnerable_status` varchar(50) DEFAULT NULL,
  `vulnerable_type` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_info`
--

SET @OLD_AUTOCOMMIT=@@AUTOCOMMIT, @@AUTOCOMMIT=0;
LOCK TABLES `user_info` WRITE;
/*!40000 ALTER TABLE `user_info` DISABLE KEYS */;
INSERT INTO `user_info` VALUES
(1,'Ezekiel','Ankle',12.0746107,124.5895306,'sjsjdjddjsja 11111','1~10','+63 993 0369155','rescued',NULL,NULL,NULL),
(8,'momama','Head',NULL,NULL,'','30+','09999999999','rescued',NULL,NULL,NULL),
(16,'Clive Josh A. delos Reyes','Knee',10.3415808,123.9187456,'dsadas','50+','977-131-7646','active',NULL,NULL,NULL),
(17,'Malaag','Head',10.3415808,123.9187456,'eqweqweqw','21-30','977-131-7646','rescued','uploads/973baccd23c790d2cf8e0b19bd0019dc.jpg','WITH_USER','Children/Baby'),
(18,'Ezleidkfl','Head',12.0747465,124.5896610,'sjsjdj','31-40','123456789','active',NULL,'WITH_USER','Senior_Citizen'),
(19,'Watataps','Head',12.0743399,124.5892475,'Wayataps','41-50','123456789','active',NULL,'WITH_USER','Pregnant');
/*!40000 ALTER TABLE `user_info` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;
SET AUTOCOMMIT=@OLD_AUTOCOMMIT;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `barangay` varchar(100) DEFAULT NULL,
  `purok` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `fullname` (`fullname`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

SET @OLD_AUTOCOMMIT=@@AUTOCOMMIT, @@AUTOCOMMIT=0;
LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES
(1,'cliveskie','$2y$10$xTVZkUJY9UoN10NAmKAF9umClAWZW7EdGUTzm9LFg20clfstbh.u.','977-131-7646','Balud','5'),
(2,'serva','$2y$10$qgnRu1tL1.kQk812iLIM2ehgD59cfizFtr9V2dGCkyRqvNTAZ3cJG','977-131-7646','Dagum','1'),
(3,'Diko is alam','$2y$12$TZZwcjcCyaBdA9z.P8zEruCnuqyWSKuunFkmst0tL4DjV50vZC6xi','123456789','Hamorawon','5'),
(4,'sjddj','$2y$12$r1Wfn/tcKoghCU8p9kFCaeae.WIko1JpfVasWxbqVCa3NmrMK6HOO','464646','Obrero','7');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;
SET AUTOCOMMIT=@OLD_AUTOCOMMIT;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*M!100616 SET NOTE_VERBOSITY=@OLD_NOTE_VERBOSITY */;

-- Dump completed on 2026-09-13 19:42:14
