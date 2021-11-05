-- MySQL dump 10.13  Distrib 8.0.23, for Win64 (x86_64)
--
-- Host: localhost    Database: transboliviav2
-- ------------------------------------------------------
-- Server version	8.0.23

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
-- Table structure for table `cliente`
--

DROP TABLE IF EXISTS `cliente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cliente` (
  `idCliente` int NOT NULL,
  `direccionCliente` varchar(30) DEFAULT NULL,
  `seguro` tinyint(1) DEFAULT NULL,
  `tipoCliente` varchar(10) DEFAULT NULL,
  `nombreCliente` varchar(30) DEFAULT NULL,
  `cod_descuento` int NOT NULL,
  PRIMARY KEY (`idCliente`),
  KEY `cod_descuento` (`cod_descuento`),
  CONSTRAINT `cliente_ibfk_1` FOREIGN KEY (`cod_descuento`) REFERENCES `descuento` (`codDescuento`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cliente`
--

LOCK TABLES `cliente` WRITE;
/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
INSERT INTO `cliente` VALUES (567,'AV. TADEO HAENKE # 168',0,'PARTICULAR','MARIA DOMINGUEZ',123),(568,'KM 7 URB. LA FLORESTA',0,'PARTICULAR','RODRIGO MONJE',124),(569,'AV. 2 CIRCUNVALACION #707',0,'PARTICULAR','DANIEL SEJAS',125),(570,'AV. PANDO #123',1,'EMPRESA','A & R COMPANY',126),(571,'AV. BLANCO GALINDO KM 10',1,'EMPRESA','PIL ANDINA',127),(572,'AV. PACHECO Y CALLE 1 DE MAYO',0,'PARTICULAR','NORMA PEREZ',128),(573,'AV. BELZU # 556',1,'EMPRESA','FRIDOSA S.A.',129);
/*!40000 ALTER TABLE `cliente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `conductor`
--

DROP TABLE IF EXISTS `conductor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `conductor` (
  `idConductor` int NOT NULL,
  `nombreConductor` varchar(30) DEFAULT NULL,
  `codSeguroConductor` int DEFAULT NULL,
  `direccion` varchar(50) DEFAULT NULL,
  `disponible` tinyint(1) DEFAULT NULL,
  `nroLicencia` int DEFAULT NULL,
  `categoria` varchar(20) DEFAULT NULL,
  `telf` int DEFAULT NULL,
  PRIMARY KEY (`idConductor`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `conductor`
--

LOCK TABLES `conductor` WRITE;
/*!40000 ALTER TABLE `conductor` DISABLE KEYS */;
INSERT INTO `conductor` VALUES (9025610,'PABLO PEREZ',12382,'AV. PACHECO Y CALLE PRIMERO DE MAYO',0,1487,'comercial',65783441),(9025611,'MATIAS LLANOS',12397,'AV. BELZU # 556',1,1752,'NORMAL',65773441),(9025612,'CARLOS LOPEZ',12125,'KM 7 URB. LA FLORESTA',0,2587,'NORMAL',65223441),(9025613,'ESTEBAN CLAURE',12211,'AV. PANDO #123',1,6547,'COMERCIAL',63823441),(9025697,'PEDRO MARTINEZ',12388,'AV. SIMON LOPEZ Nº172',1,1367,'comercial',65723441),(9025698,'GUSTAVO TOBAR',12398,'AV. TADEO HAENKE # 168',1,2458,'COMERCIAL',65723444),(9025699,'ELENA GONZALES',12375,'AV. AMERICA #254',0,1357,'COMERCIAL',6573441);
/*!40000 ALTER TABLE `conductor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contrato_flete`
--

DROP TABLE IF EXISTS `contrato_flete`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `contrato_flete` (
  `nroContrato` int NOT NULL,
  `tipoServicio` varchar(40) DEFAULT NULL,
  `fechaInicio` date DEFAULT NULL,
  `fechaFin` date DEFAULT NULL,
  `id_cli` int DEFAULT NULL,
  `id_cond` int DEFAULT NULL,
  PRIMARY KEY (`nroContrato`),
  KEY `id_cli` (`id_cli`),
  KEY `id_cond` (`id_cond`),
  CONSTRAINT `contrato_flete_ibfk_1` FOREIGN KEY (`id_cli`) REFERENCES `cliente` (`idCliente`),
  CONSTRAINT `contrato_flete_ibfk_2` FOREIGN KEY (`id_cond`) REFERENCES `conductor` (`idConductor`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contrato_flete`
--

LOCK TABLES `contrato_flete` WRITE;
/*!40000 ALTER TABLE `contrato_flete` DISABLE KEYS */;
INSERT INTO `contrato_flete` VALUES (1,'mudanza','2021-01-01','2021-01-04',567,9025610),(2,'cargamento productos','2021-01-02','2021-01-03',568,9025611),(3,'mudanza','2021-01-10','2021-01-11',569,9025612),(4,'cargamento de cemento','2021-01-13','2021-01-15',570,9025613),(5,'translado de productos','2021-02-03','2021-02-05',571,9025697),(6,'cargamento de muebles','2021-02-07','2021-02-09',572,9025698),(7,'translado de productos','2021-02-11','2021-02-15',573,9025699);
/*!40000 ALTER TABLE `contrato_flete` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `costo_flete`
--

DROP TABLE IF EXISTS `costo_flete`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `costo_flete` (
  `idCosto` int NOT NULL,
  `precio` int DEFAULT NULL,
  `costoReservacion` int DEFAULT NULL,
  `cod_Ruta` int DEFAULT NULL,
  `nro_contrato` int DEFAULT NULL,
  PRIMARY KEY (`idCosto`),
  KEY `cod_Ruta` (`cod_Ruta`),
  KEY `nro_contrato` (`nro_contrato`),
  CONSTRAINT `costo_flete_ibfk_1` FOREIGN KEY (`cod_Ruta`) REFERENCES `ruta` (`codRuta`),
  CONSTRAINT `costo_flete_ibfk_2` FOREIGN KEY (`nro_contrato`) REFERENCES `contrato_flete` (`nroContrato`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `costo_flete`
--

LOCK TABLES `costo_flete` WRITE;
/*!40000 ALTER TABLE `costo_flete` DISABLE KEYS */;
INSERT INTO `costo_flete` VALUES (10,521,100,301,1),(11,600,120,302,2),(12,800,140,303,3),(13,700,150,304,4),(14,685,160,305,5),(15,786,200,306,6),(16,876,222,307,7);
/*!40000 ALTER TABLE `costo_flete` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `descuento`
--

DROP TABLE IF EXISTS `descuento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `descuento` (
  `codDescuento` int NOT NULL,
  `categoriaCliente` varchar(1) NOT NULL,
  `porcentajeDescuento` int NOT NULL,
  PRIMARY KEY (`codDescuento`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `descuento`
--

LOCK TABLES `descuento` WRITE;
/*!40000 ALTER TABLE `descuento` DISABLE KEYS */;
INSERT INTO `descuento` VALUES (123,'A',10),(124,'A',10),(125,'B',5),(126,'A',10),(127,'C',0),(128,'C',0),(129,'B',5);
/*!40000 ALTER TABLE `descuento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detalle_servicios`
--

DROP TABLE IF EXISTS `detalle_servicios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `detalle_servicios` (
  `idDetalle` int NOT NULL,
  `tipoServicio` varchar(30) DEFAULT NULL,
  `detalleServicios` varchar(50) DEFAULT NULL,
  `c_registro` int DEFAULT NULL,
  PRIMARY KEY (`idDetalle`),
  KEY `c_registro` (`c_registro`),
  CONSTRAINT `detalle_servicios_ibfk_1` FOREIGN KEY (`c_registro`) REFERENCES `formulario_de_servicio` (`codRegistro`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detalle_servicios`
--

LOCK TABLES `detalle_servicios` WRITE;
/*!40000 ALTER TABLE `detalle_servicios` DISABLE KEYS */;
INSERT INTO `detalle_servicios` VALUES (100,'chaperia y pintura','se cambiaron las chapas y se pinto el vehiculo',70),(101,'pintura',' se pinto el vehiculo',81),(102,'mantenimiento','se cambio el volante del vehiculo',82),(103,'reparacion','se cambio la palanca de freno',84),(104,'mantenimiento','se realizo una inspeccion a las valvulas',85),(105,'mantenimiento','inspeccion al motor',86),(106,'mantenimiento','cambio de pernos a las llantas',83),(110,'chaperia y pintura','se cambiaron las chapas y se pinto el vehiculo',80);
/*!40000 ALTER TABLE `detalle_servicios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `formulario_de_servicio`
--

DROP TABLE IF EXISTS `formulario_de_servicio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `formulario_de_servicio` (
  `codRegistro` int NOT NULL,
  `fecha` date DEFAULT NULL,
  `horaRegistro` time DEFAULT NULL,
  `firma` varchar(30) DEFAULT NULL,
  `diagnostico` varchar(50) DEFAULT NULL,
  `costoTotal` int DEFAULT NULL,
  PRIMARY KEY (`codRegistro`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `formulario_de_servicio`
--

LOCK TABLES `formulario_de_servicio` WRITE;
/*!40000 ALTER TABLE `formulario_de_servicio` DISABLE KEYS */;
INSERT INTO `formulario_de_servicio` VALUES (70,'2021-03-28','11:00:00','Juan Pinto','abolladura en la puerta del conductor',480),(71,'2021-03-21','15:30:00','Maria Velasco','cambio de color de rojo a azul',210),(72,'2021-04-10','09:45:00','Erika Lazarte','cambio de volante',500),(73,'2021-03-29','08:00:00','Claudio Espinosa','cambio de pernos de las 4 llantas',150),(74,'2021-04-05','14:00:00','Daniel Cabrera','cambio de palanca de freno',160),(75,'2021-03-20','16:30:00','Benjamin Pinto','revisar el calibre de valvulas',300),(76,'2021-04-06','14:45:00','Alejandro Villarroel','revisar las mangueras de vacio del motor',250),(80,'2021-03-28','11:00:00','Martha urcullo','abolladura en la puerta del conductor',480),(81,'2021-03-21','15:30:00','Mario Sanchez','cambio de color de rojo a azul',210),(82,'2021-04-10','09:45:00','Carlos Rojas','cambio de volante',500),(83,'2021-03-29','08:00:00','Paolo vargas','cambio de pernos de las 4 llantas',150),(84,'2021-04-05','14:00:00','andrea pilco','cambio de palanca de freno',160),(85,'2021-03-20','16:30:00','alejandro alegre','revisar el calibre de valvulas',300),(86,'2021-04-06','14:45:00','daniel suarez','revisar las mangueras de vacio del motor',250);
/*!40000 ALTER TABLE `formulario_de_servicio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mecanico`
--

DROP TABLE IF EXISTS `mecanico`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `mecanico` (
  `ciMecanico` int NOT NULL,
  `nombreMecanico` varchar(30) DEFAULT NULL,
  `codSeguroMecanico` int DEFAULT NULL,
  `direccionMecanico` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`ciMecanico`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mecanico`
--

LOCK TABLES `mecanico` WRITE;
/*!40000 ALTER TABLE `mecanico` DISABLE KEYS */;
INSERT INTO `mecanico` VALUES (2322621,'MARTHA URCULLO',331,'AV.PERU Nº690'),(2322622,'MARIO SANCHEZ',332,'URB. LA FLORESTA CASA C7'),(2322623,'CARLOS ROJAS',333,'RIO HUAYCULLI CALLE LOS EUCALIPTOS'),(2322624,'PAOLO VARGAS',334,'URB. LOS LIRIOS Nº 12'),(2322625,'ANDREA PILCO',335,'AV.BLANCO GALINDO KM7 Nº431'),(2322626,'ALEJANDRO ALEGRE',336,'URB. EL PROFESIONAL Nº 155'),(2322627,'DANIEL SUAREZ',337,'AV. GERMAN BUSCH Y CALLE TEOFILO VARGAS');
/*!40000 ALTER TABLE `mecanico` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orden_servicio`
--

DROP TABLE IF EXISTS `orden_servicio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `orden_servicio` (
  `ci_mecanico` int NOT NULL,
  `cod_registro` int NOT NULL,
  KEY `ci_mecanico` (`ci_mecanico`),
  KEY `cod_registro` (`cod_registro`),
  CONSTRAINT `orden_servicio_ibfk_1` FOREIGN KEY (`ci_mecanico`) REFERENCES `mecanico` (`ciMecanico`),
  CONSTRAINT `orden_servicio_ibfk_2` FOREIGN KEY (`cod_registro`) REFERENCES `formulario_de_servicio` (`codRegistro`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orden_servicio`
--

LOCK TABLES `orden_servicio` WRITE;
/*!40000 ALTER TABLE `orden_servicio` DISABLE KEYS */;
INSERT INTO `orden_servicio` VALUES (2322621,80),(2322622,81),(2322623,82),(2322624,83),(2322625,84),(2322626,85),(2322627,86);
/*!40000 ALTER TABLE `orden_servicio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `repuesto`
--

DROP TABLE IF EXISTS `repuesto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `repuesto` (
  `idRepuesto` int NOT NULL,
  `nombreRepuesto` varchar(30) NOT NULL,
  `costoRepuesto` int NOT NULL,
  PRIMARY KEY (`idRepuesto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `repuesto`
--

LOCK TABLES `repuesto` WRITE;
/*!40000 ALTER TABLE `repuesto` DISABLE KEYS */;
INSERT INTO `repuesto` VALUES (10,'BUJIA',35),(11,'KIT CABLES DE BUJIA',168),(12,'BOBINA DE ENCENDIDO',200),(13,'VALVULA SOLENOIDE',147),(14,'MODULO DE BOMBA DE COMBUSTIBLE',700),(15,'PASTILLAS DE FRENO',210),(16,'BOMBA DE COMBUSTIBLE ELECTRICO',350);
/*!40000 ALTER TABLE `repuesto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reservacion`
--

DROP TABLE IF EXISTS `reservacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `reservacion` (
  `idReserva` int NOT NULL,
  `id_client` int DEFAULT NULL,
  `id_cost` int DEFAULT NULL,
  `fechaReserva` date DEFAULT NULL,
  `horaReserva` time DEFAULT NULL,
  `fechaSalida` date DEFAULT NULL,
  `fechaEntrega` date DEFAULT NULL,
  `confirmacion` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`idReserva`),
  KEY `id_client` (`id_client`),
  KEY `id_cost` (`id_cost`),
  CONSTRAINT `reservacion_ibfk_1` FOREIGN KEY (`id_client`) REFERENCES `cliente` (`idCliente`),
  CONSTRAINT `reservacion_ibfk_2` FOREIGN KEY (`id_cost`) REFERENCES `costo_flete` (`idCosto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reservacion`
--

LOCK TABLES `reservacion` WRITE;
/*!40000 ALTER TABLE `reservacion` DISABLE KEYS */;
INSERT INTO `reservacion` VALUES (31,567,NULL,'2021-03-27','15:35:00','2021-04-05','2021-04-10',1),(32,568,NULL,'2021-03-23','16:00:00','2021-03-30','2021-04-07',0),(33,569,NULL,'2021-03-21','09:45:00','2021-03-28','2021-03-30',0),(34,570,NULL,'2021-03-20','15:30:00','2021-03-25','2021-03-28',1),(35,571,NULL,'2021-03-15','10:00:00','2021-03-20','2021-03-21',1),(36,572,NULL,'2021-03-12','08:00:00','2021-03-19','2021-03-20',1),(37,573,NULL,'2021-03-30','14:30:00','2021-04-07','2021-04-12',0);
/*!40000 ALTER TABLE `reservacion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ruta`
--

DROP TABLE IF EXISTS `ruta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ruta` (
  `codRuta` int NOT NULL,
  `origen` varchar(20) DEFAULT NULL,
  `destino` varchar(20) DEFAULT NULL,
  `distancia` int DEFAULT NULL,
  `tiempoViaje` int DEFAULT NULL,
  PRIMARY KEY (`codRuta`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ruta`
--

LOCK TABLES `ruta` WRITE;
/*!40000 ALTER TABLE `ruta` DISABLE KEYS */;
INSERT INTO `ruta` VALUES (301,'VINTO','COCHABAMBA',16,90),(302,'SIPE SIPE','COCHABAMBA',20,120),(303,'COCHABAMBA','LA PAZ',600,420),(304,'COCHABAMBA','ORURO',300,240),(305,'QUILLACOLLO','SACABA',16,90),(306,'VINTO','SACABA',19,120),(307,'SIPE SIPE','SACABA',23,150);
/*!40000 ALTER TABLE `ruta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `servicios`
--

DROP TABLE IF EXISTS `servicios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `servicios` (
  `codServicio` int NOT NULL,
  `fechaEntrada_` date DEFAULT NULL,
  `fechaSalida_` date DEFAULT NULL,
  `cd_registro` int DEFAULT NULL,
  `matricula_` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`codServicio`),
  KEY `cd_registro` (`cd_registro`),
  KEY `matricula_` (`matricula_`),
  CONSTRAINT `servicios_ibfk_1` FOREIGN KEY (`cd_registro`) REFERENCES `formulario_de_servicio` (`codRegistro`),
  CONSTRAINT `servicios_ibfk_2` FOREIGN KEY (`matricula_`) REFERENCES `vehiculo` (`matricula`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `servicios`
--

LOCK TABLES `servicios` WRITE;
/*!40000 ALTER TABLE `servicios` DISABLE KEYS */;
INSERT INTO `servicios` VALUES (711,'2021-01-12','2021-01-13',70,'2052FLB'),(712,'2021-01-10','2021-01-11',71,'1852PHD'),(713,'2021-01-15','2021-01-16',72,'1633KYU'),(714,'2021-01-16','2021-01-17',73,'2176IYB'),(715,'2021-01-17','2021-01-20',74,'2291PSX'),(716,'2021-01-17','2021-01-18',75,'3800GXI'),(717,'2021-01-24','2021-01-25',76,'5767AHI');
/*!40000 ALTER TABLE `servicios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tel_cliente`
--

DROP TABLE IF EXISTS `tel_cliente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tel_cliente` (
  `id_cliente` int NOT NULL,
  `numTelfCliente` int DEFAULT NULL,
  KEY `id_cliente` (`id_cliente`),
  CONSTRAINT `tel_cliente_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`idCliente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tel_cliente`
--

LOCK TABLES `tel_cliente` WRITE;
/*!40000 ALTER TABLE `tel_cliente` DISABLE KEYS */;
INSERT INTO `tel_cliente` VALUES (567,79353474),(568,79367433),(569,79322178),(570,79084327),(571,69353334),(572,62667474),(573,63536488);
/*!40000 ALTER TABLE `tel_cliente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tel_mecanico`
--

DROP TABLE IF EXISTS `tel_mecanico`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tel_mecanico` (
  `ci_mec` int DEFAULT NULL,
  `telfMec` int DEFAULT NULL,
  KEY `ci_mec` (`ci_mec`),
  CONSTRAINT `tel_mecanico_ibfk_1` FOREIGN KEY (`ci_mec`) REFERENCES `mecanico` (`ciMecanico`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tel_mecanico`
--

LOCK TABLES `tel_mecanico` WRITE;
/*!40000 ALTER TABLE `tel_mecanico` DISABLE KEYS */;
INSERT INTO `tel_mecanico` VALUES (2322621,65442331),(2322622,65442298),(2322623,65441180),(2322624,79442331),(2322625,68842331),(2322626,64342331),(2322627,66142331);
/*!40000 ALTER TABLE `tel_mecanico` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_mecanico`
--

DROP TABLE IF EXISTS `tipo_mecanico`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tipo_mecanico` (
  `codTipo` int NOT NULL,
  `nombreTipo` varchar(30) DEFAULT NULL,
  `descripcionTipo` varchar(30) DEFAULT NULL,
  `ci_meca` int DEFAULT NULL,
  PRIMARY KEY (`codTipo`),
  KEY `ci_meca` (`ci_meca`),
  CONSTRAINT `tipo_mecanico_ibfk_1` FOREIGN KEY (`ci_meca`) REFERENCES `mecanico` (`ciMecanico`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_mecanico`
--

LOCK TABLES `tipo_mecanico` WRITE;
/*!40000 ALTER TABLE `tipo_mecanico` DISABLE KEYS */;
INSERT INTO `tipo_mecanico` VALUES (1110,'ELECTRICO','arregla la parte electrica',2322621),(1111,'ELECTRICO','arregla la parte electrica',2322622),(1112,'ELECTRICO','arregla la parte electrica',2322623),(1113,'ELECTRICO','arregla la parte electrica',2322624),(1114,'CHAPERIA','arregla la chapa del auto',2322625),(1115,'ELECTRICO','arregla la chapa del auto',2322626),(1116,'mantenimiento','realiza el mantenimiento ',2322627);
/*!40000 ALTER TABLE `tipo_mecanico` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vehiculo`
--

DROP TABLE IF EXISTS `vehiculo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `vehiculo` (
  `matricula` varchar(10) NOT NULL,
  `nro_contrato` int DEFAULT NULL,
  `id_costos` int DEFAULT NULL,
  `id_reservas` int DEFAULT NULL,
  `tipoVehiculo` varchar(20) DEFAULT NULL,
  `marca` varchar(10) DEFAULT NULL,
  `modelo` varchar(10) DEFAULT NULL,
  `tipoMotor` varchar(20) DEFAULT NULL,
  `descripcion` varchar(60) DEFAULT NULL,
  `tipoCaja` varchar(15) DEFAULT NULL,
  `disponible` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`matricula`),
  KEY `nro_contrato` (`nro_contrato`),
  KEY `id_costos` (`id_costos`),
  KEY `id_reservas` (`id_reservas`),
  CONSTRAINT `vehiculo_ibfk_1` FOREIGN KEY (`nro_contrato`) REFERENCES `contrato_flete` (`nroContrato`),
  CONSTRAINT `vehiculo_ibfk_2` FOREIGN KEY (`id_costos`) REFERENCES `costo_flete` (`idCosto`),
  CONSTRAINT `vehiculo_ibfk_3` FOREIGN KEY (`id_reservas`) REFERENCES `reservacion` (`idReserva`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vehiculo`
--

LOCK TABLES `vehiculo` WRITE;
/*!40000 ALTER TABLE `vehiculo` DISABLE KEYS */;
INSERT INTO `vehiculo` VALUES ('1633KYU',3,12,33,'camion de reparto','Mercedez','ATEGO','MBE/1000','camion de reparto tam mediano, para cargas no muy pesadas','automatica',0),('1852PHD',2,11,32,'camioneta','iveco','DAILY','TECTOR 5','camioneta de tam mediano, para cargas no muy pesadas','automatica',1),('1855PHD',2,11,32,'camioneta','iveco','DAILY','TECTOR 5','camioneta de tam mediano, para cargas no muy pesadas','automatica',1),('2052FLB',1,10,31,'camioneta','volvo','FH16','D11','camioneta de tam mediano, para cargas no muy pesadas','automatica',1),('2176IYB',4,13,34,'camion de doble eje','nissan','NT500','caterillar','camion de tam grande, para cargas pesadas','mecanica',1),('2291PSX',5,14,35,'camion de 16 ruedas','IVECO','EUROSTAR','TECTOR 7','camion de tam muy grande, para cargas pesadas','mecanica',0),('3800GXI',6,15,36,'camion de reparto','HYUNDAI','HD78','caterillar','camion de tam mediano, para cargas no muy pesadas','mecanica',1),('5767AHI',7,16,37,'camion de volteo','VOLVO','FMX','VED11','camion de volteo eje sencillo, tam grande, cargas pesadas','mecanica',0);
/*!40000 ALTER TABLE `vehiculo` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-07-19 12:10:27
