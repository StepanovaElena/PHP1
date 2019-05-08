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
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(45) COLLATE utf8_bin NOT NULL,
  `discount` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category`
--

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` VALUES (1,'T-shorts','0'),(2,'Jeans','5'),(3,'Blouses','5');
/*!40000 ALTER TABLE `category` ENABLE KEYS */;
UNLOCK TABLES;

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
  `product_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `status` varchar(45) COLLATE utf8_bin NOT NULL,
  `likes` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `feedback`
--

LOCK TABLES `feedback` WRITE;
/*!40000 ALTER TABLE `feedback` DISABLE KEYS */;
INSERT INTO `feedback` VALUES (10,'Guest','Lorem ipsum dolor sit amet, consectetur adipisicing elit. A assumenda, debitis dignissimos dolore iusto nam nihil sequi ut vitae! Ab animi culpa dicta esse maiores modi molestias quod tenetur voluptates!',2,NULL,'2019-04-28','confirmed',7),(11,'Helen Hunt','Lorem ipsum dolor sit amet, consectetur adipisicing elit. A assumenda, debitis dignissimos dolore iusto nam nihil sequi ut vitae! Ab animi culpa dicta esse maiores modi molestias quod tenetur voluptates!',2,NULL,'2019-04-28','confirmed',1),(12,'Helen Hunt','Lorem ipsum dolor sit amet, consectetur adipisicing elit. A assumenda, debitis dignissimos dolore iusto nam nihil sequi ut vitae! Ab animi culpa dicta esse maiores modi molestias quod tenetur voluptates!',2,NULL,'2019-04-29','confirmed',0),(13,'Big Bro','Lorem ipsum dolor sit amet, consectetur adipisicing elit. A assumenda, debitis dignissimos dolore iusto nam nihil sequi ut vitae! Ab animi culpa dicta esse maiores modi molestias quod tenetur voluptates!',2,NULL,'2019-04-30','confirmed',1),(14,'Charlie Down','Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services. Completely visualize parallel core competencies rather than exceptional portals.',1,NULL,'2019-04-30','confirmed',0),(15,'Helen Hunt','Lorem ipsum dolor sit amet, consectetur adipisicing elit. A assumenda, debitis dignissimos dolore iusto nam nihil sequi ut vitae! Ab animi culpa dicta esse maiores modi molestias quod tenetur voluptates!',3,NULL,'2019-05-01','new',0);
/*!40000 ALTER TABLE `feedback` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order_tmp`
--

DROP TABLE IF EXISTS `order_tmp`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `order_tmp` (
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `subtotal` varchar(45) COLLATE utf8_bin NOT NULL,
  `session_id` varchar(255) COLLATE utf8_bin NOT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_tmp`
--

LOCK TABLES `order_tmp` WRITE;
/*!40000 ALTER TABLE `order_tmp` DISABLE KEYS */;
INSERT INTO `order_tmp` VALUES (3,2,'98.8','19pnogrv9nsh40fnguit3u9igi0lncqh',5),(4,2,'98.8','19pnogrv9nsh40fnguit3u9igi0lncqh',5);
/*!40000 ALTER TABLE `order_tmp` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_number` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `session_id` varchar(255) COLLATE utf8_bin NOT NULL,
  `user_login` varchar(45) COLLATE utf8_bin NOT NULL,
  `user_id` varchar(45) COLLATE utf8_bin NOT NULL,
  `status` varchar(45) COLLATE utf8_bin NOT NULL,
  `telephone` varchar(45) COLLATE utf8_bin NOT NULL,
  `delivery` varchar(255) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` VALUES (1,8372,'2019-05-01','\'19pnogrv9nsh40fnguit3u9igi0lncqh\'','admin','5','confirmed','',''),(2,3290,'2019-05-01','19pnogrv9nsh40fnguit3u9igi0lncqh','admin','5','new','+7(999) 999-99-99','USA');
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders_positions`
--

DROP TABLE IF EXISTS `orders_positions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `orders_positions` (
  `order_id` int(11) NOT NULL,
  `order_pos` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `subtotal` decimal(10,0) NOT NULL,
  `color` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `size` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `discount` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders_positions`
--

LOCK TABLES `orders_positions` WRITE;
/*!40000 ALTER TABLE `orders_positions` DISABLE KEYS */;
INSERT INTO `orders_positions` VALUES (8372,1,1,2,52,'','',NULL),(8372,2,2,7,52,'','',NULL),(3290,1,3,3,52,'','',NULL);
/*!40000 ALTER TABLE `orders_positions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) COLLATE utf8_bin NOT NULL,
  `image` varchar(255) COLLATE utf8_bin NOT NULL,
  `price` int(11) NOT NULL,
  `store` int(11) DEFAULT NULL,
  `discription` text COLLATE utf8_bin,
  `designer` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `material` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `size` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `color` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (1,'Mango  People  T-shirt','Layer_2.jpg',52,10,'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services. Completely visualize parallel core competencies rather than exceptional portals.','BINBURHAN','COTTON',NULL,NULL,1),(2,'Mango  People  T-shirt','Layer_3.jpg',52,5,'Lorem ipsum dolor sit amet, consectetur adipisicing elit. A assumenda, debitis dignissimos dolore iusto nam nihil sequi ut vitae! Ab animi culpa dicta esse maiores modi molestias quod tenetur voluptates!','BINBURHAN','COTTON',NULL,NULL,1),(3,'Mango  People  T-shirt','Layer_7.jpg',52,6,'Lorem ipsum dolor sit amet, consectetur adipisicing elit. A assumenda, debitis dignissimos dolore iusto nam nihil sequi ut vitae! Ab animi culpa dicta esse maiores modi molestias quod tenetur voluptates!','BINBURHAN','COTTON',NULL,NULL,2),(4,'Mango  People  T-shirt','Layer_9.jpg',52,8,'Lorem ipsum dolor sit amet, consectetur adipisicing elit. A assumenda, debitis dignissimos dolore iusto nam nihil sequi ut vitae! Ab animi culpa dicta esse maiores modi molestias quod tenetur voluptates!','BINBURHAN','COTTON',NULL,NULL,3);
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_login` varchar(45) COLLATE utf8_bin NOT NULL,
  `user_pass` varchar(45) COLLATE utf8_bin NOT NULL,
  `hash` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (2,'stepanova_eg@bk.ru','104793','$2y$10$kZS6iO74O/M9fGPyLNPSq.gtcW8fV75fL/8/K2klA30kv1GnTEBD.'),(3,'fallow','123456','$2y$10$yiOs.d9eJEy/Tbh7zUQemOSaqW6For1GhYy6.AKaqkMwDtPumZdlS'),(4,'new_user','123456','$2y$10$f.g82BPkoSCX0jpIx5WVMOhoe7uicawKvvfpaS0Jx13EJwnYpmmsG'),(5,'admin','123456','$2y$10$xmYTpIexwnNWhTGUc6Ytb.GyGvktQN3dkZWDRAeSMYzvnVpZiLz7K');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-05-08 16:19:51
