-- MySQL dump 10.13  Distrib 8.0.19, for Win64 (x86_64)
--
-- Host: localhost    Database: bienesraices_crud
-- ------------------------------------------------------
-- Server version	8.0.35

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `bloggers`
--

DROP TABLE IF EXISTS `bloggers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `bloggers` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  `apellido` varchar(50) DEFAULT NULL,
  `correo` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bloggers`
--

LOCK TABLES `bloggers` WRITE;
/*!40000 ALTER TABLE `bloggers` DISABLE KEYS */;
INSERT INTO `bloggers` VALUES (2,' asda','ds','asd@correo.com'),(3,' asda','ds','asd@correo.com'),(4,' asda','ds','asd@correo.com'),(5,' Jose Luis','Hernandez Herrera','JoseLuisHernandezHerrera@gmail.com'),(6,' asda','ds','asd@correo.com');
/*!40000 ALTER TABLE `bloggers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bloggs`
--

DROP TABLE IF EXISTS `bloggs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `bloggs` (
  `id` int NOT NULL AUTO_INCREMENT,
  `contenido` longtext CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci,
  `fecha` date DEFAULT NULL,
  `bloggers_id` int DEFAULT NULL,
  `portada` varchar(200) DEFAULT NULL,
  `titulo` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `bloggs_FK` FOREIGN KEY (`id`) REFERENCES `bloggers` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bloggs`
--

LOCK TABLES `bloggs` WRITE;
/*!40000 ALTER TABLE `bloggs` DISABLE KEYS */;
INSERT INTO `bloggs` VALUES (3,'adsadsd','2024-01-05',5,'fc32980c49850740199d367542a0cda6.jpg','asd'),(4,'asdasd','2024-01-06',1,'b60c24e196e606c74436630c3d14feb2.jpg','asd'),(5,'asd','2024-01-06',1,'0f7cfe5ad72801af373f46a7dc4d58cd.jpg','Prueba de Blog'),(57,'sdfsf','2024-01-10',2,'a7b8e6b48cce7837ce5163afc9b5c8b8.jpg','asdas'),(58,'asdas','2024-01-10',4,'98beca38d8128bd7f9a232261b058421.jpg','Prueba de Blog'),(60,'dsf','2024-01-10',7,'15f86ea22b2f85b4f0c1e3fb63141c01.jpg','asd');
/*!40000 ALTER TABLE `bloggs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `propiedades`
--

DROP TABLE IF EXISTS `propiedades`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `propiedades` (
  `id` int NOT NULL AUTO_INCREMENT,
  `titulo` varchar(45) DEFAULT NULL,
  `precio` decimal(10,2) DEFAULT NULL,
  `imagen` varchar(200) DEFAULT NULL,
  `descripcion` longtext,
  `habitaciones` int DEFAULT NULL,
  `wc` int DEFAULT NULL,
  `estacionamiento` int DEFAULT NULL,
  `creado` date DEFAULT NULL,
  `vendedores_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_propiedades_vendedores_idx` (`vendedores_id`),
  CONSTRAINT `fk_propiedades_vendedores` FOREIGN KEY (`vendedores_id`) REFERENCES `vendedores` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=81 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `propiedades`
--

LOCK TABLES `propiedades` WRITE;
/*!40000 ALTER TABLE `propiedades` DISABLE KEYS */;
INSERT INTO `propiedades` VALUES (65,' asd',3123.00,'fb5c0e3a7f9d55f5d39c4f8ccc29a3db.jpg','aSD as das das aSD as das das aSD as das das aSD as das das aSD as das das aSD as das das aSD as das das aSD as das das aSD as das das aSD as das das aSD as das das aSD as das das aSD as das das aSD as das das aSD as das das aSD as das das aSD as das das aSD as das das aSD as das das aSD as das das aSD as das das aSD as das das aSD as das das aSD as das das aSD as das das aSD as das das aSD as das das aSD as das das aSD as das das ',3,2,1,'2023-12-04',2),(67,' Casa en la playa - Desde MVC',132564.00,'170188383047790dbe7320a06054ad72.jpg','Casa en la  playa (MVC)Cas a en la p laya (MVC)Casa en  la playa (MV C)Casa en la  playa (MVC)Casa e n la playa (MVC)Casa  en la playa (MVC)Cas a en la playa (MVC) Casa en l  playa (MVC) Casa en la  playa (MVC)Cas a en la p laya (MVC)Casa en  la playa (MV C)Casa en la  playa (MVC)Casa e n la playa (MVC)Casa  en la playa (MVC)Cas a en la playa (MVC) Casa en l  playa (MVC) ',3,2,1,'2023-12-04',1),(69,' Casa pro Aesthetic vintage gothic not a',30000000.00,'9b100e587b01866b2651a41325c5d87d.jpg','Casa pro Aesthetic vintage gothic Casa pro Aesthetic vintage gothic Casa pro Aesthetic vintage gothic Casa pro Aesthetic vintage gothic Casa pro Aesthetic vintage gothic Casa pro Aesthetic vintage gothic Casa pro Aesthetic vintage gothic Casa pro Aesthetic vintage gothic Casa pro Aesthetic vintage gothic Casa pro Aesthetic vintage gothic Casa pro Aesthetic vintage gothic Casa pro Aesthetic vintage gothic Casa pro Aesthetic vintage gothic Casa pro Aesthetic vintage gothic Casa pro Aesthetic vintage gothic Casa pro Aesthetic vintage gothic Casa pro Aesthetic vintage gothic Casa pro Aesthetic vintage gothic ',8,5,4,'2023-12-11',1),(70,' asd',12312.00,'66fe353cb32f1086a55c6f8ced20ec23.jpg','asd asd as das dasasd asd as das dasasd asd as das dasasd asd as das dasasd asd as das dasasd asd as das dasasd asd as das dasasd asd as das dasasd asd as das dasasd asd as das dasasd asd as das dasasd asd as das dasasd asd as das dasasd asd as das dasasd asd as das dasasd asd as das dasasd asd as das das',3,2,1,'2023-12-24',1),(72,'ASD',123.00,'0181fd312133302b07db0dab045e2fff.jpg','ASDASD as dasdasASDASD as dasdasASDASD as dasdasASDASD as dasdasASDASD as dasdasASDASD as dasdasASDASD as dasdasASDASD as dasdasASDASD as dasdasASDASD as dasdasASDASD as dasdasASDASD as dasdasASDASD as dasdasASDASD as dasdasASDASD as dasdasASDASD as dasdasASDASD as dasdasASDASD as dasdasASDASD as dasdasASDASD as dasdasASDASD as dasdas',1,2,3,'2024-01-10',1),(73,'asd',123.00,'d9a1bae8c9a9662967bf2a8aa613d4bb.jpg','sa asas ds sa asas ds sa asas ds sa asas ds sa asas ds sa asas ds sa asas ds sa asas ds sa asas ds sa asas ds sa asas ds sa asas ds sa asas ds sa asas ds sa asas ds sa asas ds sa asas ds sa asas ds sa asas ds sa asas ds sa asas ds sa asas ds sa asas ds sa asas ds sa asas ds sa asas ds sa asas ds sa asas ds sa asas ds sa asas ds sa asas ds sa asas ds sa asas ds sa asas ds sa asas ds sa asas ds sa asas ds sa asas ds sa asas ds sa asas ds sa asas ds sa asas ds sa asas ds sa asas ds sa asas ds ',1,2,3,'2024-01-10',2),(74,'Actualizado',123.00,'e61ffd1c213b5f2cdc93bbb7412e1c01.jpg','asda sdas ad a sdasd  asdddddddddddddddddddddddddddddddsa asas ds sa asas ds sa asas ds sa asas ds sa asas ds sa asas ds sa asas ds sa asas ds sa asas ds sa asas ds sa asas ds sa asas ds sa asas ds sa asas ds sa asas ds sa asas ds sa asas ds sa asas ds ',1,2,3,'2024-01-10',2),(75,'sad',123.00,'c713393c28ffac5072cdc6b0bbbf0735.jpg','asd asdasdasdasd asdasd asdasdasdasd asdasd asdasdasdasd asdasd asdasdasdasd asdasd asdasdasdasd asdasd asdasdasdasd asdasd asdasdasdasd asdasd asdasdasdasd asdasd asdasdasdasd asdasd asdasdasdasd asdasd asdasdasdasd asdasd asdasdasdasd asdasd asdasdasdasd asdasd asdasdasdasd asdasd asdasdasdasd asdasd asdasdasdasd asdasd asdasdasdasd asdasd asdasdasdasd asdasd asdasdasdasd asdasd asdasdasdasd asdasd asdasdasdasd asdasd asdasdasdasd asdasd asdasdasdasd asdasd asdasdasdasd asdasd asdasdasdasd asdasd asdasdasdasd asdasd asdasdasdasd asd',3,2,1,'2024-01-17',1),(76,'ASD',123321.00,'8eb00955d4df4772255e05359bd8ce18.jpg','asd aasda sdadsadsasd aasda sdadsadsasd aasda sdadsadsasd aasda sdadsadsasd aasda sdadsadsasd aasda sdadsadsasd aasda sdadsadsasd aasda sdadsadsasd aasda sdadsadsasd aasda sdadsadsasd aasda sdadsadsasd aasda sdadsadsasd aasda sdadsadsasd aasda sdadsadsasd aasda sdadsadsasd aasda sdadsadsasd aasda sdadsadsasd aasda sdadsadsasd aasda sdadsadsasd aasda sdadsadsasd aasda sdadsadsasd aasda sdadsadsasd aasda sdadsadsasd aasda sdadsadsasd aasda sdadsadsasd aasda sdadsadsasd aasda sdadsadsasd aasda sdadsads',3,2,1,'2024-01-17',1),(78,'ASD',123.00,'3e36aa6a079a71bdfd18bd766fa24405.jpg','asdasd asd ads das ads, asjdasljk djklasj ldljkasjlk lasjldjasjlksljdaljaksd',1,2,3,'2024-04-20',2),(79,'asd',123123.00,'d20370a5c2be960b938a0eb3bf6a5a17.jpg',' lkjasjdlklajskd, asd asd a lkjasjdlklajskd, asd asd a lkjasjdlklajskd, asd asd a lkjasjdlklajskd, asd asd a lkjasjdlklajskd, asd asd a lkjasjdlklajskd, asd asd a lkjasjdlklajskd, asd asd a lkjasjdlklajskd, asd asd a lkjasjdlklajskd, asd asd a lkjasjdlklajskd, asd asd a lkjasjdlklajskd, asd asd a lkjasjdlklajskd, asd asd a lkjasjdlklajskd, asd asd a lkjasjdlklajskd, asd asd a lkjasjdlklajskd, asd asd a',1,2,3,'2024-04-20',1),(80,'Actualizado',123123.00,'8ae8ea094a5e8fe61bfa8a669805a39c.jpg','Hello Hello Hello Hello Hello Hello Hello Hello Hello Hello Hello Hello Hello Hello Hello Hello Hello Hello Hello Hello Hello Hello Hello Hello Hello Hello Hello Hello Hello Hello Hello Hello Hello Hello Hello Hello Hello Hello Hello Hello Hello Hello Hello Hello Hello Hello Hello Hello Hello Hello Hello Hello Hello Hello Hello Hello Hello Hello Hello Hello ',2,3,4,'2024-04-22',1);
/*!40000 ALTER TABLE `propiedades` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuarios` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(50) DEFAULT NULL,
  `password` char(60) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (1,'correo@correo.com','$2y$10$ZpMYhecFtqTqCi/nWdWwNe6ck2bUAheiRDnWrlpAXg29HCye1/GIC');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vendedores`
--

DROP TABLE IF EXISTS `vendedores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `vendedores` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `apellido` varchar(45) DEFAULT NULL,
  `telefono` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vendedores`
--

LOCK TABLES `vendedores` WRITE;
/*!40000 ALTER TABLE `vendedores` DISABLE KEYS */;
INSERT INTO `vendedores` VALUES (1,'Juan','De la Torres actualizado','1019301011'),(2,'Karen','Perez de la Torre','1234657829'),(20,'asd','asd','1231212345');
/*!40000 ALTER TABLE `vendedores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'bienesraices_crud'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-04-21 23:24:50
