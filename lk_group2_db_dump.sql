Enter password: 
/*M!999999\- enable the sandbox mode */ 
-- MariaDB dump 10.19-12.3.2-MariaDB, for Android (aarch64)
--
-- Host: localhost    Database: lk_group2_db
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
  `photo` varchar(225) DEFAULT NULL,
  `vulnerable_status` varchar(125) DEFAULT NULL,
  `vulnerable_type` varchar(125) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_info`
--

SET @OLD_AUTOCOMMIT=@@AUTOCOMMIT, @@AUTOCOMMIT=0;
LOCK TABLES `user_info` WRITE;
/*!40000 ALTER TABLE `user_info` DISABLE KEYS */;
INSERT INTO `user_info` VALUES
(1,'sjjssj','Head',12.0751265,124.5900396,'sjsjdjd','41-50','123456797','rescued','uploads/Screenshot_2026-09-03-22-29-06-97.png','',''),
(2,'ServaAmsnddndn','Head',12.0746066,124.5895143,'123356Naansn','1-10','789456123','rescued','uploads/FB_IMG_17885310832673762.jpg','',''),
(3,'John Skdjfj','Head',12.0746232,124.5895323,'11111Avsdjfj111','50+','123456789','rescued','uploads/706706e384ae704d5021cc2db4984d96.jpg','',''),
(4,'EzkielSeva','Neck',12.0746212,124.5895317,'Teseetinggg','50+','123456789','active','uploads/FB_IMG_17860134561790499.jpg','',''),
(5,'Ansjsdj','Head',12.0747467,124.5896604,'djdjddjdj','50+','4343','rescued',NULL,'',''),
(6,'dnddj','Waist',12.0747472,124.5896606,'','31-40','4343','active',NULL,'',''),
(7,'Vulnerable Test','Neck',12.0747469,124.5896611,'Dnwnsnx','11-20','123456789','active','uploads/Messenger_creation_31E441D3-3DEE-4D9F-B782-151CAFC63E5D.jpeg','',''),
(8,'sjdjxh','Neck',12.0747463,124.5896603,'','11-20','43431','active',NULL,'',''),
(9,'Testing','Head',12.0747463,124.5896603,'','21-30','1234567∞','rescued',NULL,'',''),
(10,'Name Testing Fixed Bugs ','Head',12.0747475,124.5896610,'snsndjd','11-20','123456799','rescued','uploads/Messenger_creation_31E441D3-3DEE-4D9F-B782-151CAFC63E5D.jpeg','with_Vul','with_senior_citizen'),
(11,'Testing New Vulnerable Names','Head',12.0747475,124.5896610,'Nsdjdjdj','','123456789','active','uploads/alien_run02.png','WITH_USER','Children/Baby');
/*!40000 ALTER TABLE `user_info` ENABLE KEYS */;
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

-- Dump completed on 2026-09-10 15:23:31
