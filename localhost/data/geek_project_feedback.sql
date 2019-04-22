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
-- Table structure for table `feedback`
--

DROP TABLE IF EXISTS `feedback`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `feedback` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text COLLATE utf8_bin NOT NULL,
  `feedback` text COLLATE utf8_bin NOT NULL,
  `product_id` varchar(45) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `feedback`
--

LOCK TABLES `feedback` WRITE;
/*!40000 ALTER TABLE `feedback` DISABLE KEYS */;
INSERT INTO `feedback` VALUES (1,'Carl Forest','Lorem ipsum dolor sit amet, consectetur adipisicing elit. A assumenda, debitis dignissimos dolore iusto nam nihil sequi ut vitae! Ab animi culpa dicta esse maiores modi molestias quod tenetur voluptates!','1'),(2,'Mike Mill','Lorem ipsum dolor sit amet, consectetur adipisicing elit. A assumenda, debitis dignissimos dolore iusto nam nihil sequi ut vitae! Ab animi culpa dicta esse maiores modi molestias quod tenetur voluptates!','1'),(3,'Helen Hunt','Lorem ipsum dolor sit amet, consectetur adipisicing elit. A assumenda, debitis dignissimos dolore iusto nam nihil sequi ut vitae! Ab animi culpa dicta esse maiores modi molestias quod tenetur voluptates!','1'),(4,'Helen Hunt','Lorem ipsum dolor sit amet, consectetur adipisicing elit. A assumenda, debitis dignissimos dolore iusto nam nihil sequi ut vitae! Ab animi culpa dicta esse maiores modi molestias quod tenetur voluptates!','1'),(5,'Helen Hunt','Lorem ipsum dolor sit amet, consectetur adipisicing elit. A assumenda, debitis dignissimos dolore iusto nam nihil sequi ut vitae! Ab animi culpa dicta esse maiores modi molestias quod tenetur voluptates!','1'),(6,'Helen Hunt','Lorem ipsum dolor sit amet, consectetur adipisicing elit. A assumenda, debitis dignissimos dolore iusto nam nihil sequi ut vitae! Ab animi culpa dicta esse maiores modi molestias quod tenetur voluptates!','2');
/*!40000 ALTER TABLE `feedback` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-04-22 17:39:58
