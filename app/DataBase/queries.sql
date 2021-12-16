CREATE DATABASE  IF NOT EXISTS `ingweb` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `ingweb`;
-- MySQL dump 10.13  Distrib 8.0.27, for Win64 (x86_64)
--
-- Host: localhost    Database: ingweb
-- ------------------------------------------------------
-- Server version	8.0.27

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `citas`
--

DROP TABLE IF EXISTS `citas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `citas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `fecha` datetime DEFAULT NULL,
  `id_paciente` int NOT NULL,
  `correo_paciente` varchar(50) DEFAULT NULL,
  `id_medico` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_paciente` (`id_paciente`),
  KEY `id_medico` (`id_medico`),
  CONSTRAINT `citas_ibfk_1` FOREIGN KEY (`id_paciente`) REFERENCES `users` (`id_users`),
  CONSTRAINT `citas_ibfk_2` FOREIGN KEY (`id_medico`) REFERENCES `medicos` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `citas`
--

LOCK TABLES `citas` WRITE;
/*!40000 ALTER TABLE `citas` DISABLE KEYS */;
/*!40000 ALTER TABLE `citas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `complejos`
--

DROP TABLE IF EXISTS `complejos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `complejos` (
  `id` int NOT NULL,
  `nombre_complejos` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `complejos`
--

LOCK TABLES `complejos` WRITE;
/*!40000 ALTER TABLE `complejos` DISABLE KEYS */;
INSERT INTO `complejos` VALUES (1,'Policlinica JJ Vallarino'),(2,'Policlinica Carlos N Brin'),(3,'Policlinica de Manuel Ferrer Valdes'),(4,'Policlinica Don Alejandro de la Guardia, hijo'),(5,'Complejo Hospitalario Arnulfo Arias Madrid');
/*!40000 ALTER TABLE `complejos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `especialidad`
--

DROP TABLE IF EXISTS `especialidad`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `especialidad` (
  `id` int NOT NULL,
  `nombre_especialidad` varchar(75) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nombre` (`nombre_especialidad`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `especialidad`
--

LOCK TABLES `especialidad` WRITE;
/*!40000 ALTER TABLE `especialidad` DISABLE KEYS */;
INSERT INTO `especialidad` VALUES (1,'Cardiologia'),(3,'Infectologia'),(4,'Neuropsicologia'),(2,'Oftalmologia'),(5,'Pediatria');
/*!40000 ALTER TABLE `especialidad` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `medicos`
--

DROP TABLE IF EXISTS `medicos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `medicos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nombre_medico` varchar(50) NOT NULL,
  `id_especialidad` int NOT NULL,
  `id_complejo` int NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  KEY `id_especialidad` (`id_especialidad`),
  KEY `id_complejo` (`id_complejo`),
  CONSTRAINT `medicos_ibfk_1` FOREIGN KEY (`id_especialidad`) REFERENCES `especialidad` (`id`),
  CONSTRAINT `medicos_ibfk_2` FOREIGN KEY (`id_complejo`) REFERENCES `complejos` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `medicos`
--

LOCK TABLES `medicos` WRITE;
/*!40000 ALTER TABLE `medicos` DISABLE KEYS */;
INSERT INTO `medicos` VALUES (1,'juan.barrios','juanb12345','Juan Barrios',1,1),(2,'luis.alberto','luisa12345','Luis Alberto',1,1),(3,'mauricio.gonzalez','mauriciog12345','Mauricio Gonzalez',2,1),(4,'gustavo.espinosa','gustavoe12345','Gustavo Espinosa',2,1),(5,'diego.montenegro','diegom12345','Diego Montenegro',3,1),(6,'alejandro.espino','alejandroe12345','Alejandro Espino',3,1),(7,'paolo.marine','paolom12345','Paolo Marine',4,1),(8,'rolando.chanis','rolandoc12345','Rolando Chanis',4,1),(9,'juan.alcedo','juana12345','Juan Alcedo',5,1),(10,'tomas.fraser','tomasf12345','Tomas Fraser',5,1),(11,'henry.chen','henryc12345','Henry Chen',1,2),(12,'maria.cabrera','mariac12345','Maria Cabrera',1,2),(13,'lucas.gonzalez','lucasg12345','Lucas Gonzalez',2,2),(14,'julian.diaz','juliand12345','Julian Diaz',2,2),(15,'kevin.williams','kevinw12345','Kevin Williams',3,2),(16,'carlos.wilson','carlosw12345','Carlos Wilson',3,2),(17,'alejandro.vives','alejandrov12345','Alejandro Vives',4,2),(18,'andres.carrizo','andresc12345','Andres Carrizo',4,2),(19,'josue.guerrero','josueg12345','Josue Guerrero',5,2),(20,'rodrigo.gonzalez','rodrigog12345','Rodrigo Gonzalez',5,2),(21,'juan.jacome','juanj12345','Juan Jacome',1,3),(22,'roberto.lambrano','robertol12345','Roberto Lambraño',2,3),(23,'eduardo.dominguez','eduardod12345','Eduardo Dominguez',2,3),(24,'eric.guevara','ericg12345','Eric Guevara',3,3),(25,'harmodio.cedeno','harmodioc12345','Harmodio Cedeño',3,3),(26,'alison.len','alisonl12345','Alison Len',4,3),(27,'mario.montenegro','mariom12345','Mario Montenegro',4,3),(28,'ricardo.rivera','ricardor12345','Ricardo Rivera',5,3),(29,'lacre.atura','lacrea12345','Lacre Atura',5,3),(30,'fernando.samudio','fernandos12345','Fernando Samudio',1,4),(31,'melanie.len','melaniel12345','Melanie Len',1,4),(32,'elianne.pauli','eliannep12345','Elianne Pauli',2,4),(33,'manuel.castillo','manuelc12345','Manuel Castillo',2,4),(34,'vivian.leon','vivianl12345','Vivian Leon',3,4),(35,'elmon.grel','elmong12345','Elmon Grel',3,4),(36,'cristobal.bolaños','cristobalb12345','Cristobal Bolaños',4,4),(37,'demetrio.jaramillo','demetrioj12345','Demetrio Jaramillo',4,4),(38,'jose.dutari','josed12345','Jose Dutari',5,4),(39,'daniel.marquez','danielm12345','Daniel Marquez',5,4),(40,'jean.alvarez','jeana12345','Jean Alvarez',1,5),(41,'gaspar.campos','gasparg12345','Gaspar Campos',1,5),(42,'rodrigo.moran','rodrigom12345','Rodrigo Moran',2,5),(43,'nathalie.ng','nathalien12345','Nathalie Ng',2,5),(44,'valentina.aizpurua','valentinaa12345','Valentina Aizpurua',3,5),(45,'daniella.cantres','daniellac12345','Daniella Cantres',3,5),(46,'alonso.plato','alonsop12345','Alonso Plato',4,5),(47,'andres.urieta','andresu12345','Andres Urieta',4,5),(48,'mike.chang','mikec12345','Mike Chang',5,5),(49,'fherney.pardo','fherneyp12345','Fherney Pardo',5,5),(50,'javier.torre','javiert12345','Javier Torre',1,3);
/*!40000 ALTER TABLE `medicos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `prueba_citas`
--

DROP TABLE IF EXISTS `prueba_citas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `prueba_citas` (
  `id_citas` int NOT NULL AUTO_INCREMENT,
  `fecha` datetime DEFAULT NULL,
  `id_paciente` int NOT NULL,
  `correo_paciente` varchar(50) DEFAULT NULL,
  `id_medico` int NOT NULL,
  `motivo` varchar(120) DEFAULT NULL,
  PRIMARY KEY (`id_citas`),
  KEY `id_paciente` (`id_paciente`),
  KEY `id_medico` (`id_medico`),
  CONSTRAINT `prueba_citas_ibfk_1` FOREIGN KEY (`id_paciente`) REFERENCES `users` (`id_users`),
  CONSTRAINT `prueba_citas_ibfk_2` FOREIGN KEY (`id_medico`) REFERENCES `medicos` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `prueba_citas`
--

LOCK TABLES `prueba_citas` WRITE;
/*!40000 ALTER TABLE `prueba_citas` DISABLE KEYS */;
INSERT INTO `prueba_citas` VALUES (1,'2021-12-08 13:00:00',10,'arnulfo3ero@gmail.com',2,'Prueba'),(3,'2021-12-12 14:00:00',11,'arnulfo3ero@gmail.com',20,NULL),(5,'2021-12-31 17:00:00',10,'arnulfo3ero@gmail.com',20,NULL),(7,'2021-12-22 13:00:00',10,'arnulfo3ero@gmail.com',3,NULL),(8,'2021-12-16 14:00:00',10,'arnulfo3ero@gmail.com',4,NULL),(9,'2021-12-28 07:00:00',10,'arnulfo3ero@gmail.com',1,NULL),(14,'2021-12-21 16:00:00',10,'arnulfo3ero@gmail.com',19,NULL),(15,'2021-12-23 13:30:00',17,'g.g@gmail.com',3,NULL),(16,'2021-12-27 15:30:00',10,'arnulfo3ero@gmail.com',2,NULL),(17,'2021-12-30 16:00:00',10,'arnulfo3ero@gmail.com',2,NULL);
/*!40000 ALTER TABLE `prueba_citas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id_users` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `telefono` int NOT NULL,
  `correo` varchar(50) NOT NULL,
  PRIMARY KEY (`id_users`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (3,'','','','',0,''),(9,'hola','12345','arnulfo','$sandoval',0,''),(10,'8-940-1460','12345','Arnulfo','Sandoval',62008519,'arnulfo3ero@gmail.com'),(11,'8-564-2165','tu mama','Alexis','Cortez',0,''),(12,'9-758-1559','12345612','Pedro','Castillo',0,''),(13,'8-888-8888','12345','Juan','Carlos Bodoque',62222222,''),(16,'1-111-1111','12345','a','b',5555555,'ar@g.com'),(17,'9-999-99999','12345','Gaspar','Gonzalez',55555555,'g.g@gmail.com');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-12-15 22:19:03
