CREATE DATABASE  IF NOT EXISTS `cami` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `cami`;
-- MariaDB dump 10.19  Distrib 10.4.26-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: cami
-- ------------------------------------------------------
-- Server version	10.6.7-MariaDB-2ubuntu1.1

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
-- Table structure for table `datos`
--

DROP TABLE IF EXISTS `datos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `datos` (
  `iddato` int(11) NOT NULL AUTO_INCREMENT,
  `idproceso` int(5) DEFAULT NULL,
  `dato1` float DEFAULT NULL,
  `dato2` float DEFAULT NULL,
  `dato3` float DEFAULT NULL,
  `frecuencia` int(5) DEFAULT NULL,
  PRIMARY KEY (`iddato`),
  KEY `idproceso` (`idproceso`),
  CONSTRAINT `datos_ibfk_1` FOREIGN KEY (`idproceso`) REFERENCES `procesos` (`idproceso`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `datos`
--

LOCK TABLES `datos` WRITE;
/*!40000 ALTER TABLE `datos` DISABLE KEYS */;
/*!40000 ALTER TABLE `datos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `modulos`
--

DROP TABLE IF EXISTS `modulos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `modulos` (
  `idmod` int(5) NOT NULL AUTO_INCREMENT,
  `modulo` varchar(30) DEFAULT NULL,
  `icon` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`idmod`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `modulos`
--

LOCK TABLES `modulos` WRITE;
/*!40000 ALTER TABLE `modulos` DISABLE KEYS */;
INSERT INTO `modulos` VALUES (1,'nano','fas fa-flask'),(2,'co2','fas fa-virus'),(7,'aaa','fas fa-plus'),(9,'scroll','fas fa-scroll'),(10,'lol','fas fa-trash');
/*!40000 ALTER TABLE `modulos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `periodos`
--

DROP TABLE IF EXISTS `periodos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `periodos` (
  `iddato` int(11) NOT NULL AUTO_INCREMENT,
  `fechainicio` datetime DEFAULT NULL,
  `fechafinal` datetime DEFAULT NULL,
  PRIMARY KEY (`iddato`),
  CONSTRAINT `periodos_ibfk_1` FOREIGN KEY (`iddato`) REFERENCES `datos` (`iddato`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `periodos`
--

LOCK TABLES `periodos` WRITE;
/*!40000 ALTER TABLE `periodos` DISABLE KEYS */;
/*!40000 ALTER TABLE `periodos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permisos`
--

DROP TABLE IF EXISTS `permisos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permisos` (
  `idusu` int(5) DEFAULT NULL,
  `idmod` int(5) DEFAULT NULL,
  `permiso` int(10) NOT NULL,
  KEY `permisos_ibfk_1` (`idusu`),
  KEY `permisos_ibfk_2` (`idmod`),
  CONSTRAINT `permisos_ibfk_1` FOREIGN KEY (`idusu`) REFERENCES `usuarios` (`idusu`),
  CONSTRAINT `permisos_ibfk_2` FOREIGN KEY (`idmod`) REFERENCES `modulos` (`idmod`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permisos`
--

LOCK TABLES `permisos` WRITE;
/*!40000 ALTER TABLE `permisos` DISABLE KEYS */;
INSERT INTO `permisos` VALUES (1,1,0);
/*!40000 ALTER TABLE `permisos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `procesos`
--

DROP TABLE IF EXISTS `procesos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `procesos` (
  `idproceso` int(5) NOT NULL AUTO_INCREMENT,
  `idmod` int(5) DEFAULT NULL,
  `nomproceso` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`idproceso`),
  KEY `idmod` (`idmod`),
  CONSTRAINT `procesos_ibfk_1` FOREIGN KEY (`idmod`) REFERENCES `modulos` (`idmod`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `procesos`
--

LOCK TABLES `procesos` WRITE;
/*!40000 ALTER TABLE `procesos` DISABLE KEYS */;
INSERT INTO `procesos` VALUES (1,1,'Prueba'),(2,1,'Prueba 2'),(3,2,'Prueba 3');
/*!40000 ALTER TABLE `procesos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuarios` (
  `idusu` int(5) NOT NULL AUTO_INCREMENT,
  `matricula` int(15) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `contrasena` varchar(32) NOT NULL,
  `token` varchar(32) NOT NULL,
  PRIMARY KEY (`idusu`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (1,2020371064,'Daniel Vázquez','d5f71f395ed9c0172fab90cbeee7f84b','fbd75d83fe3adf05b2df3fe21480654c'),(2,2022301034,'Esmeralda','123','003a6cc8cd89e843b7464c3bf64f2a23'),(3,2020371065,'tester dann','81dc9bdb52d04dc20036dbd8313ed055','a5a90a35632f1f2d31a29f5a9d99ac82');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `variable`
--

DROP TABLE IF EXISTS `variable`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `variable` (
  `idvar` int(11) NOT NULL AUTO_INCREMENT,
  `idproceso` int(5) DEFAULT NULL,
  `nomvar` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`idvar`),
  KEY `idproceso` (`idproceso`),
  CONSTRAINT `variable_ibfk_1` FOREIGN KEY (`idproceso`) REFERENCES `procesos` (`idproceso`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `variable`
--

LOCK TABLES `variable` WRITE;
/*!40000 ALTER TABLE `variable` DISABLE KEYS */;
/*!40000 ALTER TABLE `variable` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-11-03 12:18:29
