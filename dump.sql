-- MySQL dump 10.13  Distrib 5.7.23, for Linux (x86_64)
--
-- Host: localhost    Database: dbLogistica
-- ------------------------------------------------------
-- Server version	5.7.23-0ubuntu0.16.04.1

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
-- Table structure for table `OC_NUM`
--

DROP TABLE IF EXISTS `OC_NUM`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `OC_NUM` (
  `idOC_NUM` int(11) NOT NULL,
  `OC_Num_Values` varchar(45) NOT NULL,
  `created_OC_NUM` datetime NOT NULL,
  `modified_OC_NUM` datetime NOT NULL,
  PRIMARY KEY (`idOC_NUM`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `OC_NUM`
--

LOCK TABLES `OC_NUM` WRITE;
/*!40000 ALTER TABLE `OC_NUM` DISABLE KEYS */;
/*!40000 ALTER TABLE `OC_NUM` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `SO_NUM`
--

DROP TABLE IF EXISTS `SO_NUM`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `SO_NUM` (
  `idSO_NUM` int(11) NOT NULL,
  `SO_NUM_val` varchar(45) NOT NULL,
  `created_SO_NUM` datetime NOT NULL,
  `modified_SO_NUM` datetime NOT NULL,
  PRIMARY KEY (`idSO_NUM`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `SO_NUM`
--

LOCK TABLES `SO_NUM` WRITE;
/*!40000 ALTER TABLE `SO_NUM` DISABLE KEYS */;
/*!40000 ALTER TABLE `SO_NUM` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bodega`
--

DROP TABLE IF EXISTS `bodega`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bodega` (
  `idbodega` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `createdBodega` datetime NOT NULL,
  `modifiedBodega` datetime NOT NULL,
  PRIMARY KEY (`idbodega`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bodega`
--

LOCK TABLES `bodega` WRITE;
/*!40000 ALTER TABLE `bodega` DISABLE KEYS */;
INSERT INTO `bodega` VALUES (1,'bodega test 2','2018-12-15 21:51:05','2018-12-15 22:50:58'),(1544923324,'Bodega 1','2018-12-15 22:22:04','2018-12-15 22:22:04');
/*!40000 ALTER TABLE `bodega` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bodeguero`
--

DROP TABLE IF EXISTS `bodeguero`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bodeguero` (
  `idbodeguero` int(11) NOT NULL,
  `nombreBodeguero` varchar(45) NOT NULL,
  `createdBodeguero` varchar(45) NOT NULL,
  `modifiedBodeguero` varchar(45) NOT NULL,
  `bodega` int(11) NOT NULL,
  PRIMARY KEY (`idbodeguero`),
  KEY `fk_bodeguero_bodega1_idx` (`bodega`),
  CONSTRAINT `fk_bodeguero_bodega1` FOREIGN KEY (`bodega`) REFERENCES `bodega` (`idbodega`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bodeguero`
--

LOCK TABLES `bodeguero` WRITE;
/*!40000 ALTER TABLE `bodeguero` DISABLE KEYS */;
INSERT INTO `bodeguero` VALUES (1,'bodeguero test','2018-12-16 00:20:14','2018-12-16 00:20:14',1);
/*!40000 ALTER TABLE `bodeguero` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `chofer`
--

DROP TABLE IF EXISTS `chofer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `chofer` (
  `rutChofer` int(11) NOT NULL,
  `nombre` varchar(450) NOT NULL,
  `fechaNaciemiento` datetime NOT NULL,
  `createdChofer` datetime NOT NULL,
  `modifiedChofer` datetime NOT NULL,
  PRIMARY KEY (`rutChofer`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `chofer`
--

LOCK TABLES `chofer` WRITE;
/*!40000 ALTER TABLE `chofer` DISABLE KEYS */;
INSERT INTO `chofer` VALUES (18228843,'chofer test','1992-03-16 00:00:00','2018-12-16 11:23:48','2018-12-16 13:26:57');
/*!40000 ALTER TABLE `chofer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cliente`
--

DROP TABLE IF EXISTS `cliente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cliente` (
  `rutCliente` varchar(45) NOT NULL,
  `nombreCliente` varchar(450) NOT NULL,
  `createdClient` datetime NOT NULL,
  `modifiedClient` datetime NOT NULL,
  PRIMARY KEY (`rutCliente`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cliente`
--

LOCK TABLES `cliente` WRITE;
/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
INSERT INTO `cliente` VALUES ('12.123.123-9','cliente demo','2018-12-16 13:43:00','2018-12-16 13:56:31');
/*!40000 ALTER TABLE `cliente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cliente_compra_pedido`
--

DROP TABLE IF EXISTS `cliente_compra_pedido`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cliente_compra_pedido` (
  `documento_iddocumento` int(11) NOT NULL,
  `cliente_rutCliente` varchar(45) NOT NULL,
  `fechaPedido` datetime NOT NULL,
  PRIMARY KEY (`documento_iddocumento`,`cliente_rutCliente`),
  KEY `fk_documento_has_cliente_cliente1_idx` (`cliente_rutCliente`),
  KEY `fk_documento_has_cliente_documento1_idx` (`documento_iddocumento`),
  CONSTRAINT `fk_documento_has_cliente_cliente1` FOREIGN KEY (`cliente_rutCliente`) REFERENCES `cliente` (`rutCliente`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_documento_has_cliente_documento1` FOREIGN KEY (`documento_iddocumento`) REFERENCES `documento` (`iddocumento`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cliente_compra_pedido`
--

LOCK TABLES `cliente_compra_pedido` WRITE;
/*!40000 ALTER TABLE `cliente_compra_pedido` DISABLE KEYS */;
/*!40000 ALTER TABLE `cliente_compra_pedido` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comentario`
--

DROP TABLE IF EXISTS `comentario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comentario` (
  `idcomentario` int(11) NOT NULL,
  `nombreComentario` varchar(45) NOT NULL,
  `descripcionComentario` varchar(4500) NOT NULL,
  `createdComentario` datetime NOT NULL,
  `modifiedComentario` datetime NOT NULL,
  `producto` int(11) NOT NULL,
  PRIMARY KEY (`idcomentario`),
  KEY `fk_comentario_producto1_idx` (`producto`),
  CONSTRAINT `fk_comentario_producto1` FOREIGN KEY (`producto`) REFERENCES `producto` (`idproducto`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comentario`
--

LOCK TABLES `comentario` WRITE;
/*!40000 ALTER TABLE `comentario` DISABLE KEYS */;
/*!40000 ALTER TABLE `comentario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `device`
--

DROP TABLE IF EXISTS `device`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `device` (
  `iddevice` int(11) NOT NULL,
  `numberDevice` varchar(45) NOT NULL,
  `tokenAcces` varchar(450) NOT NULL,
  `user` int(11) NOT NULL,
  PRIMARY KEY (`iddevice`),
  KEY `fk_device_user1_idx` (`user`),
  CONSTRAINT `fk_device_user1` FOREIGN KEY (`user`) REFERENCES `user` (`iduser`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `device`
--

LOCK TABLES `device` WRITE;
/*!40000 ALTER TABLE `device` DISABLE KEYS */;
INSERT INTO `device` VALUES (1,'+12345671211','-',1),(18228843,'+123 456788','-',18228843),(1544935132,'+56950966879','-',1544935132);
/*!40000 ALTER TABLE `device` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `direccion`
--

DROP TABLE IF EXISTS `direccion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `direccion` (
  `iddireccion` int(11) NOT NULL,
  `comuna` varchar(45) NOT NULL,
  `ciudad` varchar(45) NOT NULL,
  `region` varchar(45) NOT NULL,
  `direccionValue` varchar(450) NOT NULL,
  `createdDireccion` datetime NOT NULL,
  `modifiedDireccion` datetime NOT NULL,
  `cliente` varchar(45) NOT NULL,
  PRIMARY KEY (`iddireccion`),
  KEY `fk_direccion_cliente1_idx` (`cliente`),
  CONSTRAINT `fk_direccion_cliente1` FOREIGN KEY (`cliente`) REFERENCES `cliente` (`rutCliente`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `direccion`
--

LOCK TABLES `direccion` WRITE;
/*!40000 ALTER TABLE `direccion` DISABLE KEYS */;
INSERT INTO `direccion` VALUES (1544980421,'SANTIAGO','SANTIAGO','METROPOLITANA','DIRECCION DEMO 2','2018-12-16 14:13:41','2018-12-16 14:13:41','12.123.123-9');
/*!40000 ALTER TABLE `direccion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `direccionBodega`
--

DROP TABLE IF EXISTS `direccionBodega`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `direccionBodega` (
  `iddireccionBodega` int(11) NOT NULL,
  `comuna` varchar(45) NOT NULL,
  `direccion` varchar(45) NOT NULL,
  `ciudad` varchar(45) NOT NULL,
  `provincia` varchar(45) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `bodega` int(11) NOT NULL,
  PRIMARY KEY (`iddireccionBodega`),
  KEY `fk_direccionBodega_bodega1_idx` (`bodega`),
  CONSTRAINT `fk_direccionBodega_bodega1` FOREIGN KEY (`bodega`) REFERENCES `bodega` (`idbodega`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `direccionBodega`
--

LOCK TABLES `direccionBodega` WRITE;
/*!40000 ALTER TABLE `direccionBodega` DISABLE KEYS */;
INSERT INTO `direccionBodega` VALUES (1,'SANTIAGO 2','SANTA ELENA 1722 2','SANTIAGO 2','SANTIAGO 2','2018-12-15 21:52:17','2018-12-15 22:50:58',1);
/*!40000 ALTER TABLE `direccionBodega` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `documento`
--

DROP TABLE IF EXISTS `documento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `documento` (
  `iddocumento` int(11) NOT NULL,
  `tipoDocumento` int(11) NOT NULL,
  `numeroDocumento` int(11) NOT NULL,
  `createdDocument` datetime NOT NULL,
  `modifiedDocument` datetime NOT NULL,
  `SO_NUM` int(11) DEFAULT NULL,
  `OC_NUM` int(11) DEFAULT NULL,
  PRIMARY KEY (`iddocumento`),
  KEY `fk_documento_SO_NUM1_idx` (`SO_NUM`),
  KEY `fk_documento_OC_NUM1_idx` (`OC_NUM`),
  CONSTRAINT `fk_documento_OC_NUM1` FOREIGN KEY (`OC_NUM`) REFERENCES `OC_NUM` (`idOC_NUM`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_documento_SO_NUM1` FOREIGN KEY (`SO_NUM`) REFERENCES `SO_NUM` (`idSO_NUM`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `documento`
--

LOCK TABLES `documento` WRITE;
/*!40000 ALTER TABLE `documento` DISABLE KEYS */;
/*!40000 ALTER TABLE `documento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `entregaPedido`
--

DROP TABLE IF EXISTS `entregaPedido`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `entregaPedido` (
  `identregaPedido` int(11) NOT NULL,
  `horaEntrega` datetime NOT NULL,
  `fechaEntrega` datetime NOT NULL,
  `ruta` int(11) NOT NULL,
  PRIMARY KEY (`identregaPedido`),
  KEY `fk_entregaPedido_ruta1_idx` (`ruta`),
  CONSTRAINT `fk_entregaPedido_ruta1` FOREIGN KEY (`ruta`) REFERENCES `ruta` (`idruta`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `entregaPedido`
--

LOCK TABLES `entregaPedido` WRITE;
/*!40000 ALTER TABLE `entregaPedido` DISABLE KEYS */;
/*!40000 ALTER TABLE `entregaPedido` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fotoEntrega`
--

DROP TABLE IF EXISTS `fotoEntrega`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fotoEntrega` (
  `idfotoEntrega` int(11) NOT NULL,
  `nombreFoto` varchar(450) NOT NULL,
  `fechaFoto` datetime NOT NULL,
  `extension` varchar(45) NOT NULL,
  `entregaPedido` int(11) NOT NULL,
  PRIMARY KEY (`idfotoEntrega`),
  KEY `fk_fotoEntrega_entregaPedido1_idx` (`entregaPedido`),
  CONSTRAINT `fk_fotoEntrega_entregaPedido1` FOREIGN KEY (`entregaPedido`) REFERENCES `entregaPedido` (`identregaPedido`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fotoEntrega`
--

LOCK TABLES `fotoEntrega` WRITE;
/*!40000 ALTER TABLE `fotoEntrega` DISABLE KEYS */;
/*!40000 ALTER TABLE `fotoEntrega` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `geoPoint`
--

DROP TABLE IF EXISTS `geoPoint`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `geoPoint` (
  `idgeoPoint` int(11) NOT NULL,
  `longitude` double NOT NULL,
  `latitude` double NOT NULL,
  `createdPoint` datetime NOT NULL,
  `modifiedPoint` datetime NOT NULL,
  `direccion` int(11) NOT NULL,
  PRIMARY KEY (`idgeoPoint`),
  KEY `fk_geoPoint_direccion1_idx` (`direccion`),
  CONSTRAINT `fk_geoPoint_direccion1` FOREIGN KEY (`direccion`) REFERENCES `direccion` (`iddireccion`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `geoPoint`
--

LOCK TABLES `geoPoint` WRITE;
/*!40000 ALTER TABLE `geoPoint` DISABLE KEYS */;
/*!40000 ALTER TABLE `geoPoint` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `producto`
--

DROP TABLE IF EXISTS `producto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `producto` (
  `idproducto` int(11) NOT NULL,
  `nombreProducto` varchar(450) NOT NULL,
  `cantidadElementos` int(11) NOT NULL,
  `createdProducto` datetime NOT NULL,
  `modifiedProducto` datetime NOT NULL,
  `estadoProducto` varchar(45) NOT NULL,
  `documento` int(11) NOT NULL,
  PRIMARY KEY (`idproducto`),
  KEY `fk_producto_documento1_idx` (`documento`),
  CONSTRAINT `fk_producto_documento1` FOREIGN KEY (`documento`) REFERENCES `documento` (`iddocumento`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `producto`
--

LOCK TABLES `producto` WRITE;
/*!40000 ALTER TABLE `producto` DISABLE KEYS */;
/*!40000 ALTER TABLE `producto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `recepcionProducto`
--

DROP TABLE IF EXISTS `recepcionProducto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `recepcionProducto` (
  `receptoresProducto` int(11) NOT NULL,
  `entregaPedido` int(11) NOT NULL,
  `comentario` int(11) NOT NULL,
  PRIMARY KEY (`receptoresProducto`,`entregaPedido`),
  KEY `fk_receptoresProducto_has_entregaPedido_entregaPedido1_idx` (`entregaPedido`),
  KEY `fk_receptoresProducto_has_entregaPedido_receptoresProducto1_idx` (`receptoresProducto`),
  KEY `fk_recepcionProducto_comentario1_idx` (`comentario`),
  CONSTRAINT `fk_recepcionProducto_comentario1` FOREIGN KEY (`comentario`) REFERENCES `comentario` (`idcomentario`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_receptoresProducto_has_entregaPedido_entregaPedido1` FOREIGN KEY (`entregaPedido`) REFERENCES `entregaPedido` (`identregaPedido`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_receptoresProducto_has_entregaPedido_receptoresProducto1` FOREIGN KEY (`receptoresProducto`) REFERENCES `receptoresProducto` (`idreceptoresProducto`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `recepcionProducto`
--

LOCK TABLES `recepcionProducto` WRITE;
/*!40000 ALTER TABLE `recepcionProducto` DISABLE KEYS */;
/*!40000 ALTER TABLE `recepcionProducto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `receptoresProducto`
--

DROP TABLE IF EXISTS `receptoresProducto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `receptoresProducto` (
  `idreceptoresProducto` int(11) NOT NULL,
  `nombreReceptor` varchar(450) NOT NULL,
  `cargo` varchar(45) NOT NULL,
  `createdReceptor` datetime NOT NULL,
  `modifiedReceptor` datetime NOT NULL,
  `cliente` varchar(45) NOT NULL,
  PRIMARY KEY (`idreceptoresProducto`),
  KEY `fk_receptoresProducto_cliente1_idx` (`cliente`),
  CONSTRAINT `fk_receptoresProducto_cliente1` FOREIGN KEY (`cliente`) REFERENCES `cliente` (`rutCliente`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `receptoresProducto`
--

LOCK TABLES `receptoresProducto` WRITE;
/*!40000 ALTER TABLE `receptoresProducto` DISABLE KEYS */;
/*!40000 ALTER TABLE `receptoresProducto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rol`
--

DROP TABLE IF EXISTS `rol`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rol` (
  `idrol` int(11) NOT NULL,
  `nameRol` varchar(45) NOT NULL,
  `createRol` datetime NOT NULL,
  `modifiedRol` datetime NOT NULL,
  PRIMARY KEY (`idrol`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rol`
--

LOCK TABLES `rol` WRITE;
/*!40000 ALTER TABLE `rol` DISABLE KEYS */;
INSERT INTO `rol` VALUES (1,'root','2018-11-28 22:34:31','2018-11-28 22:34:31'),(2,'BODEGUERO','2018-11-28 22:34:44','2018-11-28 22:34:44'),(3,'CHOFER','2018-11-28 22:34:51','2018-11-28 22:34:51'),(4,'CLIENTE','2018-12-15 18:34:50','2018-12-15 18:34:50');
/*!40000 ALTER TABLE `rol` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ruta`
--

DROP TABLE IF EXISTS `ruta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ruta` (
  `idruta` int(11) NOT NULL,
  `nombreRuta` varchar(45) NOT NULL,
  `fechaRuta` datetime NOT NULL,
  `jornadaRuta` varchar(45) NOT NULL,
  `documentoAsignado` int(11) NOT NULL,
  `choferAsignado` int(11) NOT NULL,
  PRIMARY KEY (`idruta`),
  KEY `fk_ruta_documento1_idx` (`documentoAsignado`),
  KEY `fk_ruta_chofer1_idx` (`choferAsignado`),
  CONSTRAINT `fk_ruta_chofer1` FOREIGN KEY (`choferAsignado`) REFERENCES `chofer` (`rutChofer`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_ruta_documento1` FOREIGN KEY (`documentoAsignado`) REFERENCES `documento` (`iddocumento`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ruta`
--

LOCK TABLES `ruta` WRITE;
/*!40000 ALTER TABLE `ruta` DISABLE KEYS */;
/*!40000 ALTER TABLE `ruta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `iduser` int(11) NOT NULL,
  `nameUser` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `createdUser` datetime NOT NULL,
  `modifiedUser` datetime NOT NULL,
  `rol_user` int(11) NOT NULL,
  `email` varchar(45) NOT NULL,
  PRIMARY KEY (`iduser`),
  KEY `fk_user_rol1_idx` (`rol_user`),
  CONSTRAINT `fk_user_rol1` FOREIGN KEY (`rol_user`) REFERENCES `rol` (`idrol`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'bodeguero_test','bodeguero','2018-12-16 00:21:47','2018-12-16 02:16:20',2,'mailto@gmail.com'),(18228843,'choferDemo','18228843','2018-12-16 11:26:49','2018-12-16 13:26:57',3,'david.medina@cebib.cl'),(1544935132,'DMEDINA','DMEDINA','2018-12-16 01:38:52','2018-12-16 01:38:52',2,'DAVID.MEDINA@CEBIB.CL');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vehiculo`
--

DROP TABLE IF EXISTS `vehiculo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vehiculo` (
  `patente` varchar(45) NOT NULL,
  `marca` varchar(45) NOT NULL,
  `modelo` varchar(45) NOT NULL,
  `anoVehiculo` int(11) NOT NULL,
  `createdVehiculo` datetime NOT NULL,
  `modifiedVehiculo` datetime NOT NULL,
  PRIMARY KEY (`patente`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vehiculo`
--

LOCK TABLES `vehiculo` WRITE;
/*!40000 ALTER TABLE `vehiculo` DISABLE KEYS */;
INSERT INTO `vehiculo` VALUES ('PATENTE-2','MARCA','MODELO',2011,'2018-12-16 10:44:40','2018-12-16 10:59:11'),('PATENTE-3','MARCA3','MODELORASCA',2018,'2018-12-16 13:10:53','2018-12-16 13:10:53');
/*!40000 ALTER TABLE `vehiculo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vehiculoAsignado`
--

DROP TABLE IF EXISTS `vehiculoAsignado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vehiculoAsignado` (
  `vehiculo_patente` varchar(45) NOT NULL,
  `chofer_rutChofer` int(11) NOT NULL,
  `fechaAsignacion` datetime NOT NULL,
  PRIMARY KEY (`vehiculo_patente`,`chofer_rutChofer`),
  KEY `fk_vehiculo_has_chofer_chofer1_idx` (`chofer_rutChofer`),
  KEY `fk_vehiculo_has_chofer_vehiculo1_idx` (`vehiculo_patente`),
  CONSTRAINT `fk_vehiculo_has_chofer_chofer1` FOREIGN KEY (`chofer_rutChofer`) REFERENCES `chofer` (`rutChofer`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_vehiculo_has_chofer_vehiculo1` FOREIGN KEY (`vehiculo_patente`) REFERENCES `vehiculo` (`patente`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vehiculoAsignado`
--

LOCK TABLES `vehiculoAsignado` WRITE;
/*!40000 ALTER TABLE `vehiculoAsignado` DISABLE KEYS */;
INSERT INTO `vehiculoAsignado` VALUES ('PATENTE-2',18228843,'2018-12-16 11:24:51');
/*!40000 ALTER TABLE `vehiculoAsignado` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-12-16 14:21:38
