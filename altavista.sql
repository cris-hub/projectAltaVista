CREATE DATABASE  IF NOT EXISTS `altavista` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `altavista`;
-- MySQL dump 10.13  Distrib 5.7.12, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: altavista
-- ------------------------------------------------------
-- Server version	5.5.5-10.1.16-MariaDB

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
-- Table structure for table `apartamentos`
--

DROP TABLE IF EXISTS `apartamentos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `apartamentos` (
  `id_apartamentos` int(11) NOT NULL AUTO_INCREMENT,
  `numero_apto` int(11) NOT NULL,
  `torre` varchar(20) NOT NULL,
  PRIMARY KEY (`id_apartamentos`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='			';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `apartamentos`
--

LOCK TABLES `apartamentos` WRITE;
/*!40000 ALTER TABLE `apartamentos` DISABLE KEYS */;
INSERT INTO `apartamentos` VALUES (1,10,'1'),(2,20,'2'),(3,201,'2');
/*!40000 ALTER TABLE `apartamentos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pagos`
--

DROP TABLE IF EXISTS `pagos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pagos` (
  `id_pagos` int(11) NOT NULL AUTO_INCREMENT,
  `id_apartamento` int(11) NOT NULL,
  `tipo_pago` varchar(25) NOT NULL,
  `referencia` varchar(45) NOT NULL,
  `valor` int(11) NOT NULL,
  `fecha` varchar(25) NOT NULL,
  `estado` varchar(10) NOT NULL,
  `url_documento` varchar(45) NOT NULL,
  PRIMARY KEY (`id_pagos`),
  KEY `fk_apartamento_pagos_idx` (`id_apartamento`),
  CONSTRAINT `fk_apartamento_pagos` FOREIGN KEY (`id_apartamento`) REFERENCES `apartamentos` (`id_apartamentos`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pagos`
--

LOCK TABLES `pagos` WRITE;
/*!40000 ALTER TABLE `pagos` DISABLE KEYS */;
INSERT INTO `pagos` VALUES (1,1,'Cheque','',100000,'0000-00-00','Al dia','');
/*!40000 ALTER TABLE `pagos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `parqueaderos`
--

DROP TABLE IF EXISTS `parqueaderos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `parqueaderos` (
  `id_parqueadero` int(11) NOT NULL AUTO_INCREMENT,
  `estado` varchar(10) NOT NULL,
  PRIMARY KEY (`id_parqueadero`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `parqueaderos`
--

LOCK TABLES `parqueaderos` WRITE;
/*!40000 ALTER TABLE `parqueaderos` DISABLE KEYS */;
INSERT INTO `parqueaderos` VALUES (1,'Ocupado'),(23,'Desocupado');
/*!40000 ALTER TABLE `parqueaderos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `id_roles` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  PRIMARY KEY (`id_roles`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'Administrador'),(2,'Residente'),(3,'Guardia'),(4,'Secretaria');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `solicitudes`
--

DROP TABLE IF EXISTS `solicitudes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `solicitudes` (
  `id_solicitude` int(11) NOT NULL AUTO_INCREMENT,
  `id_vehiculo` int(11) NOT NULL,
  `id_parqueadero` int(11) NOT NULL,
  `fecha_solicitud` date NOT NULL,
  PRIMARY KEY (`id_solicitude`),
  KEY `fk_parqueaderos_solicitudes_idx` (`id_parqueadero`),
  KEY `fk_vehiculos_solicitudes_idx` (`id_vehiculo`),
  CONSTRAINT `fk_parqueaderos_solicitudes` FOREIGN KEY (`id_parqueadero`) REFERENCES `parqueaderos` (`id_parqueadero`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_vehiculos_solicitudes` FOREIGN KEY (`id_vehiculo`) REFERENCES `vehiculos` (`id_vehiculo`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `solicitudes`
--

LOCK TABLES `solicitudes` WRITE;
/*!40000 ALTER TABLE `solicitudes` DISABLE KEYS */;
INSERT INTO `solicitudes` VALUES (2,1,1,'0000-00-00');
/*!40000 ALTER TABLE `solicitudes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuarios` (
  `cedula` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `apellido` varchar(20) NOT NULL,
  `fechaNacimiento` varchar(25) NOT NULL,
  `correo` varchar(30) DEFAULT NULL,
  `estado` varchar(10) NOT NULL DEFAULT 'Activo',
  `contraseña` varchar(20) NOT NULL,
  PRIMARY KEY (`cedula`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (676767,'PAOLO','MICHEL','01/01/2017','koko@gmail.com','Activo','lolo'),(919191,'majsdj','akjsndkal','01/01/2017','kaaa@gmail.co','Activo','lkzjsldakj'),(1923981,'JUANITA','MARIHUANA','01/01/2017','lolo@gmail.com','Activo','Popo'),(5678767,'Cejaz negras','Alquilados','01/01/2017','crackfamily@gmail.com','Bloqueado','porquetevas?'),(9911111,'Odin','El padre de todo','01/01/2017','Pporquetevas?@misnea.com','Activo','popo'),(10101010,'aisjodl','askdl','01/01/2017','koko@gmail.com','Activo','lkas'),(11119999,'MArisol','Cantina','01/01/2017','k@gmail.com','Activo','Loqueishon'),(42424242,'CLORO','MARIHUANA','01/01/2017','koko@gmail.com','Activo','popo'),(55555555,'PRUEBA','PRUEBA','01/01/2017','koko@gmail.com','Activo','popo'),(98632916,'PRUEBA','PRUEBA 2','01/01/2017','koko@gmail.com','Activo','818181'),(100000000,'Rubena','Sinsuegra','','rubena@hotmail.com','Activo','1010'),(888888888,'LOLA','MENDEZ','11/01/2017','Pporquetevas?@misnea.com','Activo','OASDOAK'),(1023032311,'Nicolas','Albarracin','','kolachito@hotmail.com','Activo','2020'),(2147483647,'lkasjdlaj','laksjdlkaj','01/01/2017','lolo@gmail.com','Activo','197823981');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios_has_apartamentos`
--

DROP TABLE IF EXISTS `usuarios_has_apartamentos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuarios_has_apartamentos` (
  `usuarios_cedula` int(11) NOT NULL,
  `apartamentos_id_apartamentos` int(11) NOT NULL,
  `residente` varchar(2) NOT NULL,
  `propietario` varchar(2) NOT NULL,
  PRIMARY KEY (`usuarios_cedula`,`apartamentos_id_apartamentos`),
  KEY `fk_usuarios_has_apartamentos_usuarios1_idx` (`usuarios_cedula`),
  KEY `fk_apartamento_has_usuarios_idx` (`apartamentos_id_apartamentos`),
  CONSTRAINT `fk_apartamento_has_usuarios` FOREIGN KEY (`apartamentos_id_apartamentos`) REFERENCES `apartamentos` (`id_apartamentos`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_usuarios_has_apartamentos_usuarios1` FOREIGN KEY (`usuarios_cedula`) REFERENCES `usuarios` (`cedula`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios_has_apartamentos`
--

LOCK TABLES `usuarios_has_apartamentos` WRITE;
/*!40000 ALTER TABLE `usuarios_has_apartamentos` DISABLE KEYS */;
INSERT INTO `usuarios_has_apartamentos` VALUES (98632916,3,'SI','SI'),(100000000,1,'NO','SI'),(1023032311,1,'SI','NO');
/*!40000 ALTER TABLE `usuarios_has_apartamentos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios_has_roles`
--

DROP TABLE IF EXISTS `usuarios_has_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuarios_has_roles` (
  `usuarios_cc` int(11) NOT NULL,
  `roles_idroles` int(11) NOT NULL,
  PRIMARY KEY (`usuarios_cc`,`roles_idroles`),
  KEY `fk_usuarios_has_roles_roles1_idx` (`roles_idroles`),
  KEY `fk_usuarios_has_roles_usuarios_idx` (`usuarios_cc`),
  CONSTRAINT `fk_usuarios_has_roles_roles1` FOREIGN KEY (`roles_idroles`) REFERENCES `roles` (`id_roles`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_usuarios_has_roles_usuarios` FOREIGN KEY (`usuarios_cc`) REFERENCES `usuarios` (`cedula`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios_has_roles`
--

LOCK TABLES `usuarios_has_roles` WRITE;
/*!40000 ALTER TABLE `usuarios_has_roles` DISABLE KEYS */;
INSERT INTO `usuarios_has_roles` VALUES (676767,2),(1923981,2),(42424242,2),(55555555,2),(98632916,2),(100000000,1),(1023032311,2),(2147483647,2);
/*!40000 ALTER TABLE `usuarios_has_roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vehiculos`
--

DROP TABLE IF EXISTS `vehiculos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vehiculos` (
  `id_vehiculo` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuarios` int(11) NOT NULL,
  `tipo_vehiculo` varchar(10) NOT NULL,
  `marca` varchar(20) NOT NULL,
  `placa` varchar(20) NOT NULL,
  PRIMARY KEY (`id_vehiculo`),
  KEY `fk_usuarios_vehiculos_idx` (`id_usuarios`),
  CONSTRAINT `fk_usuarios_vehiculos` FOREIGN KEY (`id_usuarios`) REFERENCES `usuarios` (`cedula`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vehiculos`
--

LOCK TABLES `vehiculos` WRITE;
/*!40000 ALTER TABLE `vehiculos` DISABLE KEYS */;
INSERT INTO `vehiculos` VALUES (1,1023032311,'Automovil','Chevrolet','A15SB');
/*!40000 ALTER TABLE `vehiculos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'altavista'
--

--
-- Dumping routines for database 'altavista'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-07-06 21:25:21
