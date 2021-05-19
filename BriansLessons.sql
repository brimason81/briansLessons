-- MySQL dump 10.16  Distrib 10.1.31-MariaDB, for Win32 (AMD64)
--
-- Host: localhost    Database: BriansLessons
-- ------------------------------------------------------
-- Server version	10.1.31-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `customer`
--
CREATE DATABASE BriansLessons;
USE BriansLessons;

DROP TABLE IF EXISTS `customer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `customer` (
  `FirstName` varchar(50) DEFAULT NULL,
  `LastName` varchar(50) DEFAULT NULL,
  `UserName` varchar(50) DEFAULT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `Password` varchar(100) DEFAULT NULL,
  `Salt` varchar(100) DEFAULT NULL,
  `CustId` int(11) NOT NULL AUTO_INCREMENT,
  `SubscriptionId` int(11) DEFAULT NULL,
  PRIMARY KEY (`CustId`)
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customer`
--

LOCK TABLES `customer` WRITE;
/*!40000 ALTER TABLE `customer` DISABLE KEYS */;
INSERT INTO `customer` VALUES ('Pat','Metheny','PeeMeth','pmetheny@ecm.com','$2y$11$lsZ85sVIuXczhCughGYRJeMCqoIBrae23djIPEg4avCYs5eReSBxq','–Æ|æÅH¹w3„+ „f&T‚·óÆ',26,2),('Buddy','Guy','buddy','buddy@guy.edu','$2y$11$F7p4h.jQt/0S9SqDpE6yiuW6BvO5Ez6vm3XC.K2ueCCOqMyNB/QKO','ºx‡èÐ·ýõ*ƒ¤N²‹aÕ+rðV',39,1),('Pino','Palladino','pinonoir','pino@bass.edu','$2y$11$TNi9gClr942SwW8uMj65xeEqZLK3ATnbkcdFg213Hswz/3D1qqti2','LØ½€)k÷’Áo.2>¹Æd{®RˆÙ',41,3),('Steve','Jordan','steveJ','steve@steve.com','$2y$11$T.s8aQNCW8kWLzVN8mB5h.58JX0vQ28fss0HJy7ifEHu0jkL0ANx2','Oë<iB[É/5Mò`y„)[]ÏG',42,4),('Steve','Gadd','Steve','ohmygadd@drums.com','$2y$11$0apXDxznfK2YJCYLLQoRmODJG9Mr4RHNDYul7M10L.cyQ80a2psCa','ÑªWç|­˜$&-\n™ÎkKäV',50,1),('Miles','Davis','MilesSmiles','miles@me.com','$2y$11$eGT4GkJ/nPBOvF0qwnG8D.4Yq0e1iwCD6EBAYJiZASvm11cJ5Cp6u','xdø\ZBœðN¼]*Âq¼%¹Ìqä',52,1),('Paul','McCartney','paulmac','bass@beatles.com','$2y$11$jsFdilELc1KbHBc.rcahA.vYkRJ2f4ltpdOtv1bqDHpUr.U0Hfs9y','ŽÁ]ŠQsR›>­Æ¡äc›‚ÏÕ',53,2),('Richard','Starkey','Ringo','drums@beatles.com','$2y$11$RfqQpOtGu9i644fXGSsJ9.keABvZu5ylTFzcg1YNYJZNJNVoPgkcS','Eú¤ëF»Øºã‡×+	ôÜØ”‹±+',54,2),('John','Lennon','jlennon','john@beatles.com','$2y$11$1X/9VSqsOvdEpaNZ5Rn.GeHGIG/OkFE8WyWCtpiX52njYs0wvociW','ÕýU*¬:÷D¥£Yåþ\Z\r^²p\n',55,1),('George','Harrison','TheQuietOne','george@beatles.gov','$2y$11$1QFVkvk9bMMuSwT2TMgyge/W/FYisuPTLb0gVphCsTeYRDivQ8evK','ÕU’ù=lÃ.KöLÈ2‚Ø!¢@;',56,3);
/*!40000 ALTER TABLE `customer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `employee`
--

DROP TABLE IF EXISTS `employee`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `employee` (
  `EmpId` int(11) NOT NULL AUTO_INCREMENT,
  `FirstName` varchar(120) DEFAULT NULL,
  `LastName` varchar(120) DEFAULT NULL,
  `CustId` int(11) DEFAULT NULL,
  PRIMARY KEY (`EmpId`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `employee`
--

LOCK TABLES `employee` WRITE;
/*!40000 ALTER TABLE `employee` DISABLE KEYS */;
INSERT INTO `employee` VALUES (1,'Brian','Mason',NULL),(3,'Mac','Nelson',NULL),(11,'Jason','Moore',NULL),(12,'Bryan','Raynor',NULL),(13,'Travis','Shallow',NULL);
/*!40000 ALTER TABLE `employee` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `invoice`
--

DROP TABLE IF EXISTS `invoice`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `invoice` (
  `InvoiceId` int(11) NOT NULL AUTO_INCREMENT,
  `CustId` int(11) DEFAULT NULL,
  `InvoiceDate` datetime DEFAULT NULL,
  `Total` decimal(10,2) DEFAULT NULL,
  `SubscriptionId` int(11) DEFAULT NULL,
  PRIMARY KEY (`InvoiceId`)
) ENGINE=InnoDB AUTO_INCREMENT=77 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `invoice`
--

LOCK TABLES `invoice` WRITE;
/*!40000 ALTER TABLE `invoice` DISABLE KEYS */;
INSERT INTO `invoice` VALUES (1,23,'0000-00-00 00:00:00',20.00,1),(2,23,'0000-00-00 00:00:00',100.00,2),(3,23,'0000-00-00 00:00:00',200.00,3),(4,25,'0000-00-00 00:00:00',5.00,4),(5,26,'0000-00-00 00:00:00',20.00,1),(6,27,'0000-00-00 00:00:00',5.00,4),(7,28,'0000-00-00 00:00:00',20.00,1),(8,29,'0000-00-00 00:00:00',100.00,2),(9,30,'2018-05-05 20:59:29',200.00,3),(10,31,'2018-05-05 21:00:23',5.00,4),(11,32,'2018-05-05 23:07:17',5.00,4),(12,33,'2018-05-05 23:11:35',100.00,2),(13,29,'2018-05-06 20:51:29',20.00,1),(14,31,'2018-05-06 21:08:10',200.00,3),(15,33,'2018-05-06 22:28:11',5.00,4),(16,35,'2018-05-07 00:16:09',100.00,2),(17,37,'2018-05-07 00:57:40',5.00,4),(18,38,'2018-05-07 01:00:01',5.00,4),(19,39,'2018-05-07 01:03:07',100.00,2),(20,40,'2018-05-07 02:01:31',100.00,2),(21,41,'2018-05-07 02:08:41',5.00,4),(22,41,'0000-00-00 00:00:00',100.00,2),(23,41,'0000-00-00 00:00:00',20.00,1),(24,41,'0000-00-00 00:00:00',200.00,3),(25,42,'2018-05-07 03:18:27',5.00,4),(26,43,'2018-05-07 03:22:36',5.00,4),(27,44,'2018-05-07 03:41:39',20.00,1),(28,45,'2018-05-07 03:44:18',200.00,3),(29,45,'0000-00-00 00:00:00',100.00,2),(30,45,'0000-00-00 00:00:00',20.00,1),(31,46,'2018-05-07 03:55:32',200.00,3),(32,46,'0000-00-00 00:00:00',20.00,1),(33,47,'2018-05-07 03:59:54',200.00,3),(34,47,'0000-00-00 00:00:00',20.00,1),(35,37,'0000-00-00 00:00:00',100.00,2),(36,39,'0000-00-00 00:00:00',20.00,1),(37,39,'0000-00-00 00:00:00',200.00,3),(38,39,'0000-00-00 00:00:00',20.00,1),(39,39,'0000-00-00 00:00:00',200.00,3),(40,39,'0000-00-00 00:00:00',20.00,1),(41,23,'0000-00-00 00:00:00',100.00,2),(42,48,'2018-05-07 04:27:53',100.00,2),(43,48,'0000-00-00 00:00:00',20.00,1),(44,48,'0000-00-00 00:00:00',200.00,3),(45,48,'0000-00-00 00:00:00',200.00,3),(46,48,'0000-00-00 00:00:00',100.00,2),(47,48,'0000-00-00 00:00:00',200.00,3),(48,48,'0000-00-00 00:00:00',20.00,1),(49,48,'0000-00-00 00:00:00',200.00,3),(50,48,'0000-00-00 00:00:00',20.00,1),(51,48,'0000-00-00 00:00:00',100.00,2),(52,48,'0000-00-00 00:00:00',200.00,3),(53,48,'0000-00-00 00:00:00',20.00,1),(54,48,'0000-00-00 00:00:00',100.00,2),(55,48,'0000-00-00 00:00:00',20.00,1),(56,48,'0000-00-00 00:00:00',200.00,3),(57,48,'0000-00-00 00:00:00',100.00,2),(58,49,'2018-05-07 04:46:34',200.00,3),(59,50,'2018-05-07 04:58:29',200.00,3),(60,50,'0000-00-00 00:00:00',20.00,1),(61,51,'2018-05-07 04:59:55',100.00,2),(62,51,'0000-00-00 00:00:00',100.00,2),(63,51,'0000-00-00 00:00:00',100.00,2),(64,25,'0000-00-00 00:00:00',100.00,2),(65,26,'0000-00-00 00:00:00',100.00,2),(66,52,'2018-05-07 05:18:50',20.00,1),(67,52,'0000-00-00 00:00:00',100.00,2),(68,52,'0000-00-00 00:00:00',20.00,1),(69,53,'2018-05-07 05:21:20',5.00,4),(70,53,'0000-00-00 00:00:00',100.00,2),(71,54,'2018-05-07 05:28:32',5.00,4),(72,54,'0000-00-00 00:00:00',100.00,2),(73,55,'2018-05-07 06:36:49',100.00,2),(74,55,'0000-00-00 00:00:00',20.00,1),(75,56,'2018-05-07 06:42:43',5.00,4),(76,56,'0000-00-00 00:00:00',200.00,3);
/*!40000 ALTER TABLE `invoice` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subscription`
--

DROP TABLE IF EXISTS `subscription`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `subscription` (
  `SubscriptionId` int(11) NOT NULL AUTO_INCREMENT,
  `Subscription` int(11) DEFAULT NULL,
  `Price` decimal(10,2) DEFAULT NULL,
  `Description` varchar(120) DEFAULT NULL,
  PRIMARY KEY (`SubscriptionId`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subscription`
--

LOCK TABLES `subscription` WRITE;
/*!40000 ALTER TABLE `subscription` DISABLE KEYS */;
INSERT INTO `subscription` VALUES (1,3,20.00,'1 Month Pass for All Videos'),(2,6,100.00,'6 Month Pass for All Videos'),(3,12,200.00,'1 Year Subscription'),(4,1,5.00,'24 Hour Pass for Single Lesson');
/*!40000 ALTER TABLE `subscription` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-05-07  0:55:11
