CREATE DATABASE  IF NOT EXISTS `geek_project` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_bin */;
USE `geek_project`;
-- MySQL dump 10.13  Distrib 8.0.15, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: geek_project
-- ------------------------------------------------------
-- Server version	8.0.15

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
 SET NAMES utf8 ;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `cart` (
  `order_id` int(11) NOT NULL,
  `order_pos` int(11) NOT NULL,
  `session_id` varchar(45) COLLATE utf8_bin NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `sub_total` int(11) NOT NULL,
  `delivery` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `telephone` varchar(45) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cart`
--

LOCK TABLES `cart` WRITE;
/*!40000 ALTER TABLE `cart` DISABLE KEYS */;
INSERT INTO `cart` VALUES (6785,0,'19pnogrv9nsh40fnguit3u9igi0lncqh',2,3,52,156,NULL,''),(6785,1,'19pnogrv9nsh40fnguit3u9igi0lncqh',3,1,52,52,NULL,''),(6785,2,'19pnogrv9nsh40fnguit3u9igi0lncqh',4,1,52,52,NULL,''),(8335,1,'19pnogrv9nsh40fnguit3u9igi0lncqh',1,3,52,156,NULL,''),(6366,1,'19pnogrv9nsh40fnguit3u9igi0lncqh',3,1,52,52,NULL,''),(3368,1,'19pnogrv9nsh40fnguit3u9igi0lncqh',3,3,52,156,NULL,''),(5238,1,'19pnogrv9nsh40fnguit3u9igi0lncqh',1,1,52,52,NULL,'+7(999) 999-99-99'),(4815,1,'19pnogrv9nsh40fnguit3u9igi0lncqh',4,2,52,104,NULL,'+7(999) 999-99-99'),(7267,1,'19pnogrv9nsh40fnguit3u9igi0lncqh',3,2,52,104,NULL,'+7(999) 999-99-99');
/*!40000 ALTER TABLE `cart` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-04-26 13:49:50
