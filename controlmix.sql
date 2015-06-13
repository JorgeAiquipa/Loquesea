CREATE DATABASE  IF NOT EXISTS `controlmix` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `controlmix`;
-- MySQL dump 10.13  Distrib 5.6.13, for Win32 (x86)
--
-- Host: 127.0.0.1    Database: controlmix
-- ------------------------------------------------------
-- Server version	5.6.17

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
-- Table structure for table `cajas`
--

DROP TABLE IF EXISTS `cajas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cajas` (
  `CAJA_ID` varchar(15) NOT NULL,
  `CAJA_NRO` varchar(7) NOT NULL,
  `NRO_TESTIGOS` smallint(6) NOT NULL,
  `POSICION` varchar(8) NOT NULL,
  `EDAD` smallint(6) NOT NULL,
  `ERROR_RESULTADO` char(2) DEFAULT NULL,
  `FECHA_MOLDEO` datetime NOT NULL,
  `ORDEN_NRO` varchar(15) NOT NULL,
  `PRENSA_ID` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`CAJA_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cajas`
--

LOCK TABLES `cajas` WRITE;
/*!40000 ALTER TABLE `cajas` DISABLE KEYS */;
INSERT INTO `cajas` VALUES ('C1243-1','14',3,'1CI',1,NULL,'0000-00-00 00:00:00','1243',NULL),('C12435-1','14',3,'1CI',1,NULL,'0000-00-00 00:00:00','12435',NULL),('C6789-1','23',3,'13BI',1,NULL,'0000-00-00 00:00:00','6789',NULL);
/*!40000 ALTER TABLE `cajas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clientes`
--

DROP TABLE IF EXISTS `clientes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `clientes` (
  `ruc` varchar(11) NOT NULL,
  `razonsocial` varchar(80) DEFAULT NULL,
  `direccion` varchar(80) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`ruc`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clientes`
--

LOCK TABLES `clientes` WRITE;
/*!40000 ALTER TABLE `clientes` DISABLE KEYS */;
INSERT INTO `clientes` VALUES ('11111111111','UPC','av.kkk','23423'),('20132367590','ACEROS TACNA','No Tiene','2419762'),('20132367800','CONSICA','AV. Jp 267','234544'),('20156789235','CENTURION','AV.las flores 3243','2346726'),('24536789098','CAPECO','AV. Central 23939','345345');
/*!40000 ALTER TABLE `clientes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cuartos`
--

DROP TABLE IF EXISTS `cuartos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cuartos` (
  `POSICION` varchar(8) NOT NULL,
  `CAJA_ID` varchar(15) DEFAULT NULL,
  `ANAQUEL` varchar(5) NOT NULL,
  `PLANTA_ID` smallint(6) NOT NULL,
  PRIMARY KEY (`POSICION`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cuartos`
--

LOCK TABLES `cuartos` WRITE;
/*!40000 ALTER TABLE `cuartos` DISABLE KEYS */;
INSERT INTO `cuartos` VALUES ('10AI',NULL,'10',1),('10AII',NULL,'10',1),('10AIII',NULL,'10',1),('10AIV',NULL,'10',1),('10AV',NULL,'10',1),('10BI',NULL,'10',1),('10BII',NULL,'10',1),('10BIII',NULL,'10',1),('10BIV',NULL,'10',1),('10BV',NULL,'10',1),('10CI',NULL,'10',1),('10CII',NULL,'10',1),('10CIII',NULL,'10',1),('10CIV',NULL,'10',1),('10CV',NULL,'10',1),('10DI',NULL,'10',1),('10DII',NULL,'10',1),('10DIII',NULL,'10',1),('10DIV',NULL,'10',1),('10DV',NULL,'10',1),('10EI',NULL,'10',1),('10EII',NULL,'10',1),('10EIII',NULL,'10',1),('10EIV',NULL,'10',1),('10EV',NULL,'10',1),('10FI',NULL,'10',1),('10FII',NULL,'10',1),('10FIII',NULL,'10',1),('10FIV',NULL,'10',1),('10FV',NULL,'10',1),('10GI',NULL,'10',1),('10GII',NULL,'10',1),('10GIII',NULL,'10',1),('10GIV',NULL,'10',1),('10GV',NULL,'10',1),('11AI',NULL,'11',1),('11AII',NULL,'11',1),('11AIII',NULL,'11',1),('11AIV',NULL,'11',1),('11AV',NULL,'11',1),('11BI',NULL,'11',1),('11BII',NULL,'11',1),('11BIII',NULL,'11',1),('11BIV',NULL,'11',1),('11BV',NULL,'11',1),('11CI',NULL,'11',1),('11CII',NULL,'11',1),('11CIII',NULL,'11',1),('11CIV',NULL,'11',1),('11CV',NULL,'11',1),('11DI',NULL,'11',1),('11DII',NULL,'11',1),('11DIII',NULL,'11',1),('11DIV',NULL,'11',1),('11DV',NULL,'11',1),('11EI',NULL,'11',1),('11EII',NULL,'11',1),('11EIII',NULL,'11',1),('11EIV',NULL,'11',1),('11EV',NULL,'11',1),('11FI',NULL,'11',1),('11FII',NULL,'11',1),('11FIII',NULL,'11',1),('11FIV',NULL,'11',1),('11FV',NULL,'11',1),('11GI',NULL,'11',1),('11GII',NULL,'11',1),('11GIII',NULL,'11',1),('11GIV',NULL,'11',1),('11GV',NULL,'11',1),('12AI',NULL,'12',1),('12AII',NULL,'12',1),('12AIII',NULL,'12',1),('12AIV',NULL,'12',1),('12AV',NULL,'12',1),('12BI',NULL,'12',1),('12BII',NULL,'12',1),('12BIII',NULL,'12',1),('12BIV',NULL,'12',1),('12BV',NULL,'12',1),('12CI',NULL,'12',1),('12CII',NULL,'12',1),('12CIII',NULL,'12',1),('12CIV',NULL,'12',1),('12CV',NULL,'12',1),('12DI',NULL,'12',1),('12DII',NULL,'12',1),('12DIII',NULL,'12',1),('12DIV',NULL,'12',1),('12DV',NULL,'12',1),('12EI',NULL,'12',1),('12EII',NULL,'12',1),('12EIII',NULL,'12',1),('12EIV',NULL,'12',1),('12EV',NULL,'12',1),('12FI',NULL,'12',1),('12FII',NULL,'12',1),('12FIII',NULL,'12',1),('12FIV',NULL,'12',1),('12FV',NULL,'12',1),('12GI',NULL,'12',1),('12GII',NULL,'12',1),('12GIII',NULL,'12',1),('12GIV',NULL,'12',1),('12GV',NULL,'12',1),('13AI','C5555-1','13',1),('13AII',NULL,'13',1),('13AIII',NULL,'13',1),('13AIV',NULL,'13',1),('13AV',NULL,'13',1),('13BI','C6789-1','13',1),('13BII',NULL,'13',1),('13BIII',NULL,'13',1),('13BIV',NULL,'13',1),('13BV',NULL,'13',1),('13CI',NULL,'13',1),('13CII',NULL,'13',1),('13CIII',NULL,'13',1),('13CIV',NULL,'13',1),('13CV',NULL,'13',1),('13DI',NULL,'13',1),('13DII',NULL,'13',1),('13DIII',NULL,'13',1),('13DIV',NULL,'13',1),('13DV',NULL,'13',1),('13EI',NULL,'13',1),('13EII',NULL,'13',1),('13EIII',NULL,'13',1),('13EIV',NULL,'13',1),('13EV',NULL,'13',1),('13FI',NULL,'13',1),('13FII',NULL,'13',1),('13FIII',NULL,'13',1),('13FIV',NULL,'13',1),('13FV',NULL,'13',1),('13GI',NULL,'13',1),('13GII',NULL,'13',1),('13GIII',NULL,'13',1),('13GIV',NULL,'13',1),('13GV',NULL,'13',1),('14AI',NULL,'14',1),('14AII',NULL,'14',1),('14AIII',NULL,'14',1),('14AIV',NULL,'14',1),('14AV',NULL,'14',1),('14BI',NULL,'14',1),('14BII',NULL,'14',1),('14BIII',NULL,'14',1),('14BIV',NULL,'14',1),('14BV',NULL,'14',1),('14CI',NULL,'14',1),('14CII',NULL,'14',1),('14CIII',NULL,'14',1),('14CIV',NULL,'14',1),('14CV',NULL,'14',1),('14DI',NULL,'14',1),('14DII',NULL,'14',1),('14DIII',NULL,'14',1),('14DIV',NULL,'14',1),('14DV',NULL,'14',1),('14EI',NULL,'14',1),('14EII',NULL,'14',1),('14EIII',NULL,'14',1),('14EIV',NULL,'14',1),('14EV',NULL,'14',1),('14FI',NULL,'14',1),('14FII',NULL,'14',1),('14FIII',NULL,'14',1),('14FIV',NULL,'14',1),('14FV',NULL,'14',1),('14GI',NULL,'14',1),('14GII',NULL,'14',1),('14GIII',NULL,'14',1),('14GIV',NULL,'14',1),('14GV',NULL,'14',1),('15AI',NULL,'15',1),('15AII',NULL,'15',1),('15AIII',NULL,'15',1),('15AIV',NULL,'15',1),('15AV',NULL,'15',1),('15BI',NULL,'15',1),('15BII',NULL,'15',1),('15BIII',NULL,'15',1),('15BIV',NULL,'15',1),('15BV',NULL,'15',1),('15CI',NULL,'15',1),('15CII',NULL,'15',1),('15CIII',NULL,'15',1),('15CIV',NULL,'15',1),('15CV',NULL,'15',1),('15DI',NULL,'15',1),('15DII',NULL,'15',1),('15DIII',NULL,'15',1),('15DIV',NULL,'15',1),('15DV',NULL,'15',1),('15EI',NULL,'15',1),('15EII',NULL,'15',1),('15EIII',NULL,'15',1),('15EIV',NULL,'15',1),('15EV',NULL,'15',1),('15FI',NULL,'15',1),('15FII',NULL,'15',1),('15FIII',NULL,'15',1),('15FIV',NULL,'15',1),('15FV',NULL,'15',1),('15GI',NULL,'15',1),('15GII',NULL,'15',1),('15GIII',NULL,'15',1),('15GIV',NULL,'15',1),('15GV',NULL,'15',1),('16AI',NULL,'16',1),('16AII',NULL,'16',1),('16AIII',NULL,'16',1),('16AIV',NULL,'16',1),('16AV',NULL,'16',1),('16BI',NULL,'16',1),('16BII',NULL,'16',1),('16BIII',NULL,'16',1),('16BIV',NULL,'16',1),('16BV',NULL,'16',1),('16CI',NULL,'16',1),('16CII',NULL,'16',1),('16CIII',NULL,'16',1),('16CIV',NULL,'16',1),('16CV',NULL,'16',1),('16DI',NULL,'16',1),('16DII',NULL,'16',1),('16DIII',NULL,'16',1),('16DIV',NULL,'16',1),('16DV',NULL,'16',1),('16EI',NULL,'16',1),('16EII',NULL,'16',1),('16EIII',NULL,'16',1),('16EIV',NULL,'16',1),('16EV',NULL,'16',1),('16FI',NULL,'16',1),('16FII',NULL,'16',1),('16FIII',NULL,'16',1),('16FIV',NULL,'16',1),('16FV',NULL,'16',1),('16GI',NULL,'16',1),('16GII',NULL,'16',1),('16GIII',NULL,'16',1),('16GIV',NULL,'16',1),('16GV',NULL,'16',1),('17AI',NULL,'17',1),('17AII',NULL,'17',1),('17AIII',NULL,'17',1),('17AIV',NULL,'17',1),('17AV',NULL,'17',1),('17BI',NULL,'17',1),('17BII',NULL,'17',1),('17BIII',NULL,'17',1),('17BIV',NULL,'17',1),('17BV',NULL,'17',1),('17CI',NULL,'17',1),('17CII',NULL,'17',1),('17CIII',NULL,'17',1),('17CIV',NULL,'17',1),('17CV',NULL,'17',1),('17DI',NULL,'17',1),('17DII',NULL,'17',1),('17DIII',NULL,'17',1),('17DIV',NULL,'17',1),('17DV',NULL,'17',1),('17EI',NULL,'17',1),('17EII',NULL,'17',1),('17EIII',NULL,'17',1),('17EIV',NULL,'17',1),('17EV',NULL,'17',1),('17FI',NULL,'17',1),('17FII',NULL,'17',1),('17FIII',NULL,'17',1),('17FIV',NULL,'17',1),('17FV',NULL,'17',1),('17GI',NULL,'17',1),('17GII',NULL,'17',1),('17GIII',NULL,'17',1),('17GIV',NULL,'17',1),('17GV',NULL,'17',1),('18AI',NULL,'18',1),('18AII',NULL,'18',1),('18AIII',NULL,'18',1),('18AIV',NULL,'18',1),('18AV',NULL,'18',1),('18BI',NULL,'18',1),('18BII',NULL,'18',1),('18BIII',NULL,'18',1),('18BIV',NULL,'18',1),('18BV',NULL,'18',1),('18CI',NULL,'18',1),('18CII',NULL,'18',1),('18CIII',NULL,'18',1),('18CIV',NULL,'18',1),('18CV',NULL,'18',1),('18DI',NULL,'18',1),('18DII',NULL,'18',1),('18DIII',NULL,'18',1),('18DIV',NULL,'18',1),('18DV',NULL,'18',1),('18EI',NULL,'18',1),('18EII',NULL,'18',1),('18EIII',NULL,'18',1),('18EIV',NULL,'18',1),('18EV',NULL,'18',1),('18FI',NULL,'18',1),('18FII',NULL,'18',1),('18FIII',NULL,'18',1),('18FIV',NULL,'18',1),('18FV',NULL,'18',1),('18GI',NULL,'18',1),('18GII',NULL,'18',1),('18GIII',NULL,'18',1),('18GIV',NULL,'18',1),('18GV',NULL,'18',1),('19AI',NULL,'19',1),('19AII',NULL,'19',1),('19AIII',NULL,'19',1),('19AIV',NULL,'19',1),('19AV',NULL,'19',1),('19BI',NULL,'19',1),('19BII',NULL,'19',1),('19BIII',NULL,'19',1),('19BIV',NULL,'19',1),('19BV',NULL,'19',1),('19CI',NULL,'19',1),('19CII',NULL,'19',1),('19CIII',NULL,'19',1),('19CIV',NULL,'19',1),('19CV',NULL,'19',1),('19DI',NULL,'19',1),('19DII',NULL,'19',1),('19DIII',NULL,'19',1),('19DIV',NULL,'19',1),('19DV',NULL,'19',1),('19EI',NULL,'19',1),('19EII',NULL,'19',1),('19EIII',NULL,'19',1),('19EIV',NULL,'19',1),('19EV',NULL,'19',1),('19FI',NULL,'19',1),('19FII',NULL,'19',1),('19FIII',NULL,'19',1),('19FIV',NULL,'19',1),('19FV',NULL,'19',1),('19GI',NULL,'19',1),('19GII',NULL,'19',1),('19GIII',NULL,'19',1),('19GIV',NULL,'19',1),('19GV',NULL,'19',1),('1AI','C222-1','1',1),('1AII',NULL,'1',1),('1AIII',NULL,'1',1),('1AIV',NULL,'1',1),('1AV',NULL,'1',1),('1BI','C1245-1','1',1),('1BII',NULL,'1',1),('1BIII',NULL,'1',1),('1BIV',NULL,'1',1),('1BV',NULL,'1',1),('1CI','C12435-1','1',1),('1CII',NULL,'1',1),('1CIII',NULL,'1',1),('1CIV',NULL,'1',1),('1CV',NULL,'1',1),('1DI',NULL,'1',1),('1DII',NULL,'1',1),('1DIII',NULL,'1',1),('1DIV',NULL,'1',1),('1DV',NULL,'1',1),('1EI',NULL,'1',1),('1EII',NULL,'1',1),('1EIII',NULL,'1',1),('1EIV',NULL,'1',1),('1EV',NULL,'1',1),('1FI',NULL,'1',1),('1FII',NULL,'1',1),('1FIII',NULL,'1',1),('1FIV',NULL,'1',1),('1FV',NULL,'1',1),('1GI',NULL,'1',1),('1GII',NULL,'1',1),('1GIII',NULL,'1',1),('1GIV',NULL,'1',1),('1GV',NULL,'1',1),('20AI',NULL,'20',1),('20AII',NULL,'20',1),('20AIII',NULL,'20',1),('20AIV',NULL,'20',1),('20AV',NULL,'20',1),('20BI',NULL,'20',1),('20BII',NULL,'20',1),('20BIII',NULL,'20',1),('20BIV',NULL,'20',1),('20BV',NULL,'20',1),('20CI',NULL,'20',1),('20CII',NULL,'20',1),('20CIII',NULL,'20',1),('20CIV',NULL,'20',1),('20CV',NULL,'20',1),('20DI',NULL,'20',1),('20DII',NULL,'20',1),('20DIII',NULL,'20',1),('20DIV',NULL,'20',1),('20DV',NULL,'20',1),('20EI',NULL,'20',1),('20EII',NULL,'20',1),('20EIII',NULL,'20',1),('20EIV',NULL,'20',1),('20EV',NULL,'20',1),('20FI',NULL,'20',1),('20FII',NULL,'20',1),('20FIII',NULL,'20',1),('20FIV',NULL,'20',1),('20FV',NULL,'20',1),('20GI',NULL,'20',1),('20GII',NULL,'20',1),('20GIII',NULL,'20',1),('20GIV',NULL,'20',1),('20GV',NULL,'20',1),('21AI',NULL,'21',1),('21AII',NULL,'21',1),('21AIII',NULL,'21',1),('21AIV',NULL,'21',1),('21AV',NULL,'21',1),('21BI',NULL,'21',1),('21BII',NULL,'21',1),('21BIII',NULL,'21',1),('21BIV',NULL,'21',1),('21BV',NULL,'21',1),('21CI',NULL,'21',1),('21CII',NULL,'21',1),('21CIII',NULL,'21',1),('21CIV',NULL,'21',1),('21CV',NULL,'21',1),('21DI',NULL,'21',1),('21DII',NULL,'21',1),('21DIII',NULL,'21',1),('21DIV',NULL,'21',1),('21DV',NULL,'21',1),('21EI',NULL,'21',1),('21EII',NULL,'21',1),('21EIII',NULL,'21',1),('21EIV',NULL,'21',1),('21EV',NULL,'21',1),('21FI',NULL,'21',1),('21FII',NULL,'21',1),('21FIII',NULL,'21',1),('21FIV',NULL,'21',1),('21FV',NULL,'21',1),('21GI',NULL,'21',1),('21GII',NULL,'21',1),('21GIII',NULL,'21',1),('21GIV',NULL,'21',1),('21GV',NULL,'21',1),('22AI',NULL,'22',1),('22AII',NULL,'22',1),('22AIII',NULL,'22',1),('22AIV',NULL,'22',1),('22AV',NULL,'22',1),('22BI',NULL,'22',1),('22BII',NULL,'22',1),('22BIII',NULL,'22',1),('22BIV',NULL,'22',1),('22BV',NULL,'22',1),('22CI',NULL,'22',1),('22CII',NULL,'22',1),('22CIII',NULL,'22',1),('22CIV',NULL,'22',1),('22CV',NULL,'22',1),('22DI',NULL,'22',1),('22DII',NULL,'22',1),('22DIII',NULL,'22',1),('22DIV',NULL,'22',1),('22DV',NULL,'22',1),('22EI',NULL,'22',1),('22EII',NULL,'22',1),('22EIII',NULL,'22',1),('22EIV',NULL,'22',1),('22EV',NULL,'22',1),('22FI',NULL,'22',1),('22FII',NULL,'22',1),('22FIII',NULL,'22',1),('22FIV',NULL,'22',1),('22FV',NULL,'22',1),('22GI',NULL,'22',1),('22GII',NULL,'22',1),('22GIII',NULL,'22',1),('22GIV',NULL,'22',1),('22GV',NULL,'22',1),('23AI',NULL,'23',1),('23AII',NULL,'23',1),('23AIII',NULL,'23',1),('23AIV',NULL,'23',1),('23AV',NULL,'23',1),('23BI',NULL,'23',1),('23BII',NULL,'23',1),('23BIII',NULL,'23',1),('23BIV',NULL,'23',1),('23BV',NULL,'23',1),('23CI',NULL,'23',1),('23CII',NULL,'23',1),('23CIII',NULL,'23',1),('23CIV',NULL,'23',1),('23CV',NULL,'23',1),('23DI',NULL,'23',1),('23DII',NULL,'23',1),('23DIII',NULL,'23',1),('23DIV',NULL,'23',1),('23DV',NULL,'23',1),('23EI',NULL,'23',1),('23EII',NULL,'23',1),('23EIII',NULL,'23',1),('23EIV',NULL,'23',1),('23EV',NULL,'23',1),('23FI',NULL,'23',1),('23FII',NULL,'23',1),('23FIII',NULL,'23',1),('23FIV',NULL,'23',1),('23FV',NULL,'23',1),('23GI',NULL,'23',1),('23GII',NULL,'23',1),('23GIII',NULL,'23',1),('23GIV',NULL,'23',1),('23GV',NULL,'23',1),('24AI',NULL,'24',1),('24AII',NULL,'24',1),('24AIII',NULL,'24',1),('24AIV',NULL,'24',1),('24AV',NULL,'24',1),('24BI',NULL,'24',1),('24BII',NULL,'24',1),('24BIII',NULL,'24',1),('24BIV',NULL,'24',1),('24BV',NULL,'24',1),('24CI',NULL,'24',1),('24CII',NULL,'24',1),('24CIII',NULL,'24',1),('24CIV',NULL,'24',1),('24CV',NULL,'24',1),('24DI',NULL,'24',1),('24DII',NULL,'24',1),('24DIII',NULL,'24',1),('24DIV',NULL,'24',1),('24DV',NULL,'24',1),('24EI',NULL,'24',1),('24EII',NULL,'24',1),('24EIII',NULL,'24',1),('24EIV',NULL,'24',1),('24EV',NULL,'24',1),('24FI',NULL,'24',1),('24FII',NULL,'24',1),('24FIII',NULL,'24',1),('24FIV',NULL,'24',1),('24FV',NULL,'24',1),('24GI',NULL,'24',1),('24GII',NULL,'24',1),('24GIII',NULL,'24',1),('24GIV',NULL,'24',1),('24GV',NULL,'24',1),('25AI','C9999-1','25',1),('25AII',NULL,'25',1),('25AIII',NULL,'25',1),('25AIV',NULL,'25',1),('25AV',NULL,'25',1),('25BI',NULL,'25',1),('25BII',NULL,'25',1),('25BIII',NULL,'25',1),('25BIV',NULL,'25',1),('25BV',NULL,'25',1),('25CI',NULL,'25',1),('25CII',NULL,'25',1),('25CIII',NULL,'25',1),('25CIV',NULL,'25',1),('25CV',NULL,'25',1),('25DI',NULL,'25',1),('25DII',NULL,'25',1),('25DIII',NULL,'25',1),('25DIV',NULL,'25',1),('25DV',NULL,'25',1),('25EI',NULL,'25',1),('25EII',NULL,'25',1),('25EIII',NULL,'25',1),('25EIV',NULL,'25',1),('25EV',NULL,'25',1),('25FI',NULL,'25',1),('25FII',NULL,'25',1),('25FIII',NULL,'25',1),('25FIV',NULL,'25',1),('25FV',NULL,'25',1),('25GI',NULL,'25',1),('25GII',NULL,'25',1),('25GIII',NULL,'25',1),('25GIV',NULL,'25',1),('25GV',NULL,'25',1),('26AI',NULL,'26',1),('26AII',NULL,'26',1),('26AIII',NULL,'26',1),('26AIV',NULL,'26',1),('26AV',NULL,'26',1),('26BI',NULL,'26',1),('26BII',NULL,'26',1),('26BIII',NULL,'26',1),('26BIV',NULL,'26',1),('26BV',NULL,'26',1),('26CI',NULL,'26',1),('26CII',NULL,'26',1),('26CIII',NULL,'26',1),('26CIV',NULL,'26',1),('26CV',NULL,'26',1),('26DI',NULL,'26',1),('26DII',NULL,'26',1),('26DIII',NULL,'26',1),('26DIV',NULL,'26',1),('26DV',NULL,'26',1),('26EI',NULL,'26',1),('26EII',NULL,'26',1),('26EIII',NULL,'26',1),('26EIV',NULL,'26',1),('26EV',NULL,'26',1),('26FI',NULL,'26',1),('26FII',NULL,'26',1),('26FIII',NULL,'26',1),('26FIV',NULL,'26',1),('26FV',NULL,'26',1),('26GI',NULL,'26',1),('26GII',NULL,'26',1),('26GIII',NULL,'26',1),('26GIV',NULL,'26',1),('26GV',NULL,'26',1),('27AI',NULL,'27',1),('27AII',NULL,'27',1),('27AIII',NULL,'27',1),('27AIV',NULL,'27',1),('27AV',NULL,'27',1),('27BI',NULL,'27',1),('27BII',NULL,'27',1),('27BIII',NULL,'27',1),('27BIV',NULL,'27',1),('27BV',NULL,'27',1),('27CI',NULL,'27',1),('27CII',NULL,'27',1),('27CIII',NULL,'27',1),('27CIV',NULL,'27',1),('27CV',NULL,'27',1),('27DI',NULL,'27',1),('27DII',NULL,'27',1),('27DIII',NULL,'27',1),('27DIV',NULL,'27',1),('27DV',NULL,'27',1),('27EI',NULL,'27',1),('27EII',NULL,'27',1),('27EIII',NULL,'27',1),('27EIV',NULL,'27',1),('27EV',NULL,'27',1),('27FI',NULL,'27',1),('27FII',NULL,'27',1),('27FIII',NULL,'27',1),('27FIV',NULL,'27',1),('27FV',NULL,'27',1),('27GI',NULL,'27',1),('27GII',NULL,'27',1),('27GIII',NULL,'27',1),('27GIV',NULL,'27',1),('27GV',NULL,'27',1),('28AI',NULL,'28',1),('28AII',NULL,'28',1),('28AIII',NULL,'28',1),('28AIV',NULL,'28',1),('28AV',NULL,'28',1),('28BI',NULL,'28',1),('28BII',NULL,'28',1),('28BIII',NULL,'28',1),('28BIV',NULL,'28',1),('28BV',NULL,'28',1),('28CI',NULL,'28',1),('28CII',NULL,'28',1),('28CIII',NULL,'28',1),('28CIV',NULL,'28',1),('28CV',NULL,'28',1),('28DI',NULL,'28',1),('28DII',NULL,'28',1),('28DIII',NULL,'28',1),('28DIV',NULL,'28',1),('28DV',NULL,'28',1),('28EI',NULL,'28',1),('28EII',NULL,'28',1),('28EIII',NULL,'28',1),('28EIV',NULL,'28',1),('28EV',NULL,'28',1),('28FI',NULL,'28',1),('28FII',NULL,'28',1),('28FIII',NULL,'28',1),('28FIV',NULL,'28',1),('28FV',NULL,'28',1),('28GI',NULL,'28',1),('28GII',NULL,'28',1),('28GIII',NULL,'28',1),('28GIV',NULL,'28',1),('28GV',NULL,'28',1),('29AI',NULL,'29',1),('29AII',NULL,'29',1),('29AIII',NULL,'29',1),('29AIV',NULL,'29',1),('29AV',NULL,'29',1),('29BI',NULL,'29',1),('29BII',NULL,'29',1),('29BIII',NULL,'29',1),('29BIV',NULL,'29',1),('29BV',NULL,'29',1),('29CI',NULL,'29',1),('29CII',NULL,'29',1),('29CIII',NULL,'29',1),('29CIV',NULL,'29',1),('29CV',NULL,'29',1),('29DI',NULL,'29',1),('29DII',NULL,'29',1),('29DIII',NULL,'29',1),('29DIV',NULL,'29',1),('29DV',NULL,'29',1),('29EI',NULL,'29',1),('29EII',NULL,'29',1),('29EIII',NULL,'29',1),('29EIV',NULL,'29',1),('29EV',NULL,'29',1),('29FI',NULL,'29',1),('29FII',NULL,'29',1),('29FIII',NULL,'29',1),('29FIV',NULL,'29',1),('29FV',NULL,'29',1),('29GI',NULL,'29',1),('29GII',NULL,'29',1),('29GIII',NULL,'29',1),('29GIV',NULL,'29',1),('29GV',NULL,'29',1),('2AI',NULL,'2',1),('2AII',NULL,'2',1),('2AIII',NULL,'2',1),('2AIV',NULL,'2',1),('2AV',NULL,'2',1),('2BI',NULL,'2',1),('2BII',NULL,'2',1),('2BIII',NULL,'2',1),('2BIV',NULL,'2',1),('2BV',NULL,'2',1),('2CI',NULL,'2',1),('2CII',NULL,'2',1),('2CIII',NULL,'2',1),('2CIV',NULL,'2',1),('2CV',NULL,'2',1),('2DI',NULL,'2',1),('2DII',NULL,'2',1),('2DIII',NULL,'2',1),('2DIV',NULL,'2',1),('2DV',NULL,'2',1),('2EI',NULL,'2',1),('2EII',NULL,'2',1),('2EIII',NULL,'2',1),('2EIV',NULL,'2',1),('2EV',NULL,'2',1),('2FI',NULL,'2',1),('2FII',NULL,'2',1),('2FIII',NULL,'2',1),('2FIV',NULL,'2',1),('2FV',NULL,'2',1),('2GI',NULL,'2',1),('2GII',NULL,'2',1),('2GIII',NULL,'2',1),('2GIV',NULL,'2',1),('2GV',NULL,'2',1),('30AI',NULL,'30',1),('30AII',NULL,'30',1),('30AIII',NULL,'30',1),('30AIV',NULL,'30',1),('30AV',NULL,'30',1),('30BI',NULL,'30',1),('30BII',NULL,'30',1),('30BIII',NULL,'30',1),('30BIV',NULL,'30',1),('30BV',NULL,'30',1),('30CI',NULL,'30',1),('30CII',NULL,'30',1),('30CIII',NULL,'30',1),('30CIV',NULL,'30',1),('30CV',NULL,'30',1),('30DI',NULL,'30',1),('30DII',NULL,'30',1),('30DIII',NULL,'30',1),('30DIV',NULL,'30',1),('30DV',NULL,'30',1),('30EI',NULL,'30',1),('30EII',NULL,'30',1),('30EIII',NULL,'30',1),('30EIV',NULL,'30',1),('30EV',NULL,'30',1),('30FI',NULL,'30',1),('30FII',NULL,'30',1),('30FIII',NULL,'30',1),('30FIV',NULL,'30',1),('30FV',NULL,'30',1),('30GI',NULL,'30',1),('30GII',NULL,'30',1),('30GIII',NULL,'30',1),('30GIV',NULL,'30',1),('30GV',NULL,'30',1),('31AI','C12345-1','31',1),('31AII',NULL,'31',1),('31AIII',NULL,'31',1),('31AIV',NULL,'31',1),('31AV',NULL,'31',1),('31BI','C7898-1','31',1),('31BII',NULL,'31',1),('31BIII',NULL,'31',1),('31BIV',NULL,'31',1),('31BV',NULL,'31',1),('31CI',NULL,'31',1),('31CII',NULL,'31',1),('31CIII',NULL,'31',1),('31CIV',NULL,'31',1),('31CV',NULL,'31',1),('31DI',NULL,'31',1),('31DII',NULL,'31',1),('31DIII',NULL,'31',1),('31DIV',NULL,'31',1),('31DV',NULL,'31',1),('31EI',NULL,'31',1),('31EII',NULL,'31',1),('31EIII',NULL,'31',1),('31EIV',NULL,'31',1),('31EV',NULL,'31',1),('31FI',NULL,'31',1),('31FII',NULL,'31',1),('31FIII',NULL,'31',1),('31FIV',NULL,'31',1),('31FV',NULL,'31',1),('31GI',NULL,'31',1),('31GII',NULL,'31',1),('31GIII',NULL,'31',1),('31GIV',NULL,'31',1),('31GV',NULL,'31',1),('32AI',NULL,'32',1),('32AII',NULL,'32',1),('32AIII',NULL,'32',1),('32AIV',NULL,'32',1),('32AV',NULL,'32',1),('32BI',NULL,'32',1),('32BII',NULL,'32',1),('32BIII',NULL,'32',1),('32BIV',NULL,'32',1),('32BV',NULL,'32',1),('32CI',NULL,'32',1),('32CII',NULL,'32',1),('32CIII',NULL,'32',1),('32CIV',NULL,'32',1),('32CV',NULL,'32',1),('32DI',NULL,'32',1),('32DII',NULL,'32',1),('32DIII',NULL,'32',1),('32DIV',NULL,'32',1),('32DV',NULL,'32',1),('32EI',NULL,'32',1),('32EII',NULL,'32',1),('32EIII',NULL,'32',1),('32EIV',NULL,'32',1),('32EV',NULL,'32',1),('32FI',NULL,'32',1),('32FII',NULL,'32',1),('32FIII',NULL,'32',1),('32FIV',NULL,'32',1),('32FV',NULL,'32',1),('32GI',NULL,'32',1),('32GII',NULL,'32',1),('32GIII',NULL,'32',1),('32GIV',NULL,'32',1),('32GV',NULL,'32',1),('33AI',NULL,'33',1),('33AII',NULL,'33',1),('33AIII',NULL,'33',1),('33AIV',NULL,'33',1),('33AV',NULL,'33',1),('33BI',NULL,'33',1),('33BII',NULL,'33',1),('33BIII',NULL,'33',1),('33BIV',NULL,'33',1),('33BV',NULL,'33',1),('33CI',NULL,'33',1),('33CII',NULL,'33',1),('33CIII',NULL,'33',1),('33CIV',NULL,'33',1),('33CV',NULL,'33',1),('33DI',NULL,'33',1),('33DII',NULL,'33',1),('33DIII',NULL,'33',1),('33DIV',NULL,'33',1),('33DV',NULL,'33',1),('33EI',NULL,'33',1),('33EII',NULL,'33',1),('33EIII',NULL,'33',1),('33EIV',NULL,'33',1),('33EV',NULL,'33',1),('33FI',NULL,'33',1),('33FII',NULL,'33',1),('33FIII',NULL,'33',1),('33FIV',NULL,'33',1),('33FV',NULL,'33',1),('33GI',NULL,'33',1),('33GII',NULL,'33',1),('33GIII',NULL,'33',1),('33GIV',NULL,'33',1),('33GV',NULL,'33',1),('34AI',NULL,'34',1),('34AII',NULL,'34',1),('34AIII',NULL,'34',1),('34AIV',NULL,'34',1),('34AV',NULL,'34',1),('34BI',NULL,'34',1),('34BII',NULL,'34',1),('34BIII',NULL,'34',1),('34BIV',NULL,'34',1),('34BV',NULL,'34',1),('34CI',NULL,'34',1),('34CII',NULL,'34',1),('34CIII',NULL,'34',1),('34CIV',NULL,'34',1),('34CV',NULL,'34',1),('34DI',NULL,'34',1),('34DII',NULL,'34',1),('34DIII',NULL,'34',1),('34DIV',NULL,'34',1),('34DV',NULL,'34',1),('34EI',NULL,'34',1),('34EII',NULL,'34',1),('34EIII',NULL,'34',1),('34EIV',NULL,'34',1),('34EV',NULL,'34',1),('34FI',NULL,'34',1),('34FII',NULL,'34',1),('34FIII',NULL,'34',1),('34FIV',NULL,'34',1),('34FV',NULL,'34',1),('34GI',NULL,'34',1),('34GII',NULL,'34',1),('34GIII',NULL,'34',1),('34GIV',NULL,'34',1),('34GV',NULL,'34',1),('35AI',NULL,'35',1),('35AII',NULL,'35',1),('35AIII',NULL,'35',1),('35AIV',NULL,'35',1),('35AV',NULL,'35',1),('35BI',NULL,'35',1),('35BII',NULL,'35',1),('35BIII',NULL,'35',1),('35BIV',NULL,'35',1),('35BV',NULL,'35',1),('35CI',NULL,'35',1),('35CII',NULL,'35',1),('35CIII',NULL,'35',1),('35CIV',NULL,'35',1),('35CV',NULL,'35',1),('35DI',NULL,'35',1),('35DII',NULL,'35',1),('35DIII',NULL,'35',1),('35DIV',NULL,'35',1),('35DV',NULL,'35',1),('35EI',NULL,'35',1),('35EII',NULL,'35',1),('35EIII',NULL,'35',1),('35EIV',NULL,'35',1),('35EV',NULL,'35',1),('35FI',NULL,'35',1),('35FII',NULL,'35',1),('35FIII',NULL,'35',1),('35FIV',NULL,'35',1),('35FV',NULL,'35',1),('35GI',NULL,'35',1),('35GII',NULL,'35',1),('35GIII',NULL,'35',1),('35GIV',NULL,'35',1),('35GV',NULL,'35',1),('36AI',NULL,'36',1),('36AII',NULL,'36',1),('36AIII',NULL,'36',1),('36AIV',NULL,'36',1),('36AV',NULL,'36',1),('36BI',NULL,'36',1),('36BII',NULL,'36',1),('36BIII',NULL,'36',1),('36BIV',NULL,'36',1),('36BV',NULL,'36',1),('36CI',NULL,'36',1),('36CII',NULL,'36',1),('36CIII',NULL,'36',1),('36CIV',NULL,'36',1),('36CV',NULL,'36',1),('36DI',NULL,'36',1),('36DII',NULL,'36',1),('36DIII',NULL,'36',1),('36DIV',NULL,'36',1),('36DV',NULL,'36',1),('36EI',NULL,'36',1),('36EII',NULL,'36',1),('36EIII',NULL,'36',1),('36EIV',NULL,'36',1),('36EV',NULL,'36',1),('36FI',NULL,'36',1),('36FII',NULL,'36',1),('36FIII',NULL,'36',1),('36FIV',NULL,'36',1),('36FV',NULL,'36',1),('36GI',NULL,'36',1),('36GII',NULL,'36',1),('36GIII',NULL,'36',1),('36GIV',NULL,'36',1),('36GV',NULL,'36',1),('37AI',NULL,'37',1),('37AII',NULL,'37',1),('37AIII',NULL,'37',1),('37AIV',NULL,'37',1),('37AV',NULL,'37',1),('37BI',NULL,'37',1),('37BII',NULL,'37',1),('37BIII',NULL,'37',1),('37BIV',NULL,'37',1),('37BV',NULL,'37',1),('37CI',NULL,'37',1),('37CII',NULL,'37',1),('37CIII',NULL,'37',1),('37CIV',NULL,'37',1),('37CV',NULL,'37',1),('37DI',NULL,'37',1),('37DII',NULL,'37',1),('37DIII',NULL,'37',1),('37DIV',NULL,'37',1),('37DV',NULL,'37',1),('37EI',NULL,'37',1),('37EII',NULL,'37',1),('37EIII',NULL,'37',1),('37EIV',NULL,'37',1),('37EV',NULL,'37',1),('37FI',NULL,'37',1),('37FII',NULL,'37',1),('37FIII',NULL,'37',1),('37FIV',NULL,'37',1),('37FV',NULL,'37',1),('37GI',NULL,'37',1),('37GII',NULL,'37',1),('37GIII',NULL,'37',1),('37GIV',NULL,'37',1),('37GV',NULL,'37',1),('38AI',NULL,'38',1),('38AII',NULL,'38',1),('38AIII',NULL,'38',1),('38AIV',NULL,'38',1),('38AV',NULL,'38',1),('38BI',NULL,'38',1),('38BII',NULL,'38',1),('38BIII',NULL,'38',1),('38BIV',NULL,'38',1),('38BV',NULL,'38',1),('38CI',NULL,'38',1),('38CII',NULL,'38',1),('38CIII',NULL,'38',1),('38CIV',NULL,'38',1),('38CV',NULL,'38',1),('38DI',NULL,'38',1),('38DII',NULL,'38',1),('38DIII',NULL,'38',1),('38DIV',NULL,'38',1),('38DV',NULL,'38',1),('38EI',NULL,'38',1),('38EII',NULL,'38',1),('38EIII',NULL,'38',1),('38EIV',NULL,'38',1),('38EV',NULL,'38',1),('38FI',NULL,'38',1),('38FII',NULL,'38',1),('38FIII',NULL,'38',1),('38FIV',NULL,'38',1),('38FV',NULL,'38',1),('38GI',NULL,'38',1),('38GII',NULL,'38',1),('38GIII',NULL,'38',1),('38GIV',NULL,'38',1),('38GV',NULL,'38',1),('39AI',NULL,'39',1),('39AII',NULL,'39',1),('39AIII',NULL,'39',1),('39AIV',NULL,'39',1),('39AV',NULL,'39',1),('39BI',NULL,'39',1),('39BII',NULL,'39',1),('39BIII',NULL,'39',1),('39BIV',NULL,'39',1),('39BV',NULL,'39',1),('39CI',NULL,'39',1),('39CII',NULL,'39',1),('39CIII',NULL,'39',1),('39CIV',NULL,'39',1),('39CV',NULL,'39',1),('39DI',NULL,'39',1),('39DII',NULL,'39',1),('39DIII',NULL,'39',1),('39DIV',NULL,'39',1),('39DV',NULL,'39',1),('39EI',NULL,'39',1),('39EII',NULL,'39',1),('39EIII',NULL,'39',1),('39EIV',NULL,'39',1),('39EV',NULL,'39',1),('39FI',NULL,'39',1),('39FII',NULL,'39',1),('39FIII',NULL,'39',1),('39FIV',NULL,'39',1),('39FV',NULL,'39',1),('39GI',NULL,'39',1),('39GII',NULL,'39',1),('39GIII',NULL,'39',1),('39GIV',NULL,'39',1),('39GV',NULL,'39',1),('3AI',NULL,'3',1),('3AII',NULL,'3',1),('3AIII',NULL,'3',1),('3AIV',NULL,'3',1),('3AV',NULL,'3',1),('3BI',NULL,'3',1),('3BII',NULL,'3',1),('3BIII',NULL,'3',1),('3BIV',NULL,'3',1),('3BV',NULL,'3',1),('3CI',NULL,'3',1),('3CII',NULL,'3',1),('3CIII',NULL,'3',1),('3CIV',NULL,'3',1),('3CV',NULL,'3',1),('3DI',NULL,'3',1),('3DII',NULL,'3',1),('3DIII',NULL,'3',1),('3DIV',NULL,'3',1),('3DV',NULL,'3',1),('3EI',NULL,'3',1),('3EII',NULL,'3',1),('3EIII',NULL,'3',1),('3EIV',NULL,'3',1),('3EV',NULL,'3',1),('3FI',NULL,'3',1),('3FII',NULL,'3',1),('3FIII',NULL,'3',1),('3FIV',NULL,'3',1),('3FV',NULL,'3',1),('3GI',NULL,'3',1),('3GII',NULL,'3',1),('3GIII',NULL,'3',1),('3GIV',NULL,'3',1),('3GV',NULL,'3',1),('40AI',NULL,'40',1),('40AII',NULL,'40',1),('40AIII',NULL,'40',1),('40AIV',NULL,'40',1),('40AV',NULL,'40',1),('40BI',NULL,'40',1),('40BII',NULL,'40',1),('40BIII',NULL,'40',1),('40BIV',NULL,'40',1),('40BV',NULL,'40',1),('40CI',NULL,'40',1),('40CII',NULL,'40',1),('40CIII',NULL,'40',1),('40CIV',NULL,'40',1),('40CV',NULL,'40',1),('40DI',NULL,'40',1),('40DII',NULL,'40',1),('40DIII',NULL,'40',1),('40DIV',NULL,'40',1),('40DV',NULL,'40',1),('40EI',NULL,'40',1),('40EII',NULL,'40',1),('40EIII',NULL,'40',1),('40EIV',NULL,'40',1),('40EV',NULL,'40',1),('40FI',NULL,'40',1),('40FII',NULL,'40',1),('40FIII',NULL,'40',1),('40FIV',NULL,'40',1),('40FV',NULL,'40',1),('40GI',NULL,'40',1),('40GII',NULL,'40',1),('40GIII',NULL,'40',1),('40GIV',NULL,'40',1),('40GV',NULL,'40',1),('4AI',NULL,'4',1),('4AII',NULL,'4',1),('4AIII',NULL,'4',1),('4AIV',NULL,'4',1),('4AV',NULL,'4',1),('4BI',NULL,'4',1),('4BII',NULL,'4',1),('4BIII',NULL,'4',1),('4BIV',NULL,'4',1),('4BV',NULL,'4',1),('4CI',NULL,'4',1),('4CII',NULL,'4',1),('4CIII',NULL,'4',1),('4CIV',NULL,'4',1),('4CV',NULL,'4',1),('4DI',NULL,'4',1),('4DII',NULL,'4',1),('4DIII',NULL,'4',1),('4DIV',NULL,'4',1),('4DV',NULL,'4',1),('4EI',NULL,'4',1),('4EII',NULL,'4',1),('4EIII',NULL,'4',1),('4EIV',NULL,'4',1),('4EV',NULL,'4',1),('4FI',NULL,'4',1),('4FII',NULL,'4',1),('4FIII',NULL,'4',1),('4FIV',NULL,'4',1),('4FV',NULL,'4',1),('4GI',NULL,'4',1),('4GII',NULL,'4',1),('4GIII',NULL,'4',1),('4GIV',NULL,'4',1),('4GV',NULL,'4',1),('5AI',NULL,'5',1),('5AII',NULL,'5',1),('5AIII',NULL,'5',1),('5AIV',NULL,'5',1),('5AV',NULL,'5',1),('5BI',NULL,'5',1),('5BII',NULL,'5',1),('5BIII',NULL,'5',1),('5BIV',NULL,'5',1),('5BV',NULL,'5',1),('5CI',NULL,'5',1),('5CII',NULL,'5',1),('5CIII',NULL,'5',1),('5CIV',NULL,'5',1),('5CV',NULL,'5',1),('5DI',NULL,'5',1),('5DII',NULL,'5',1),('5DIII',NULL,'5',1),('5DIV',NULL,'5',1),('5DV',NULL,'5',1),('5EI',NULL,'5',1),('5EII',NULL,'5',1),('5EIII',NULL,'5',1),('5EIV',NULL,'5',1),('5EV',NULL,'5',1),('5FI',NULL,'5',1),('5FII',NULL,'5',1),('5FIII',NULL,'5',1),('5FIV',NULL,'5',1),('5FV',NULL,'5',1),('5GI',NULL,'5',1),('5GII',NULL,'5',1),('5GIII',NULL,'5',1),('5GIV',NULL,'5',1),('5GV',NULL,'5',1),('6AI',NULL,'6',1),('6AII',NULL,'6',1),('6AIII',NULL,'6',1),('6AIV',NULL,'6',1),('6AV',NULL,'6',1),('6BI',NULL,'6',1),('6BII',NULL,'6',1),('6BIII',NULL,'6',1),('6BIV',NULL,'6',1),('6BV',NULL,'6',1),('6CI',NULL,'6',1),('6CII',NULL,'6',1),('6CIII',NULL,'6',1),('6CIV',NULL,'6',1),('6CV',NULL,'6',1),('6DI',NULL,'6',1),('6DII',NULL,'6',1),('6DIII',NULL,'6',1),('6DIV',NULL,'6',1),('6DV',NULL,'6',1),('6EI',NULL,'6',1),('6EII',NULL,'6',1),('6EIII',NULL,'6',1),('6EIV',NULL,'6',1),('6EV',NULL,'6',1),('6FI',NULL,'6',1),('6FII',NULL,'6',1),('6FIII',NULL,'6',1),('6FIV',NULL,'6',1),('6FV',NULL,'6',1),('6GI',NULL,'6',1),('6GII',NULL,'6',1),('6GIII',NULL,'6',1),('6GIV',NULL,'6',1),('6GV',NULL,'6',1),('7AI',NULL,'7',1),('7AII',NULL,'7',1),('7AIII',NULL,'7',1),('7AIV',NULL,'7',1),('7AV',NULL,'7',1),('7BI',NULL,'7',1),('7BII',NULL,'7',1),('7BIII',NULL,'7',1),('7BIV',NULL,'7',1),('7BV',NULL,'7',1),('7CI',NULL,'7',1),('7CII',NULL,'7',1),('7CIII',NULL,'7',1),('7CIV',NULL,'7',1),('7CV',NULL,'7',1),('7DI',NULL,'7',1),('7DII',NULL,'7',1),('7DIII',NULL,'7',1),('7DIV',NULL,'7',1),('7DV',NULL,'7',1),('7EI',NULL,'7',1),('7EII',NULL,'7',1),('7EIII',NULL,'7',1),('7EIV',NULL,'7',1),('7EV',NULL,'7',1),('7FI',NULL,'7',1),('7FII',NULL,'7',1),('7FIII',NULL,'7',1),('7FIV',NULL,'7',1),('7FV',NULL,'7',1),('7GI',NULL,'7',1),('7GII',NULL,'7',1),('7GIII',NULL,'7',1),('7GIV',NULL,'7',1),('7GV',NULL,'7',1),('8AI',NULL,'8',1),('8AII',NULL,'8',1),('8AIII',NULL,'8',1),('8AIV',NULL,'8',1),('8AV',NULL,'8',1),('8BI',NULL,'8',1),('8BII',NULL,'8',1),('8BIII',NULL,'8',1),('8BIV',NULL,'8',1),('8BV',NULL,'8',1),('8CI',NULL,'8',1),('8CII',NULL,'8',1),('8CIII',NULL,'8',1),('8CIV',NULL,'8',1),('8CV',NULL,'8',1),('8DI',NULL,'8',1),('8DII',NULL,'8',1),('8DIII',NULL,'8',1),('8DIV',NULL,'8',1),('8DV',NULL,'8',1),('8EI',NULL,'8',1),('8EII',NULL,'8',1),('8EIII',NULL,'8',1),('8EIV',NULL,'8',1),('8EV',NULL,'8',1),('8FI',NULL,'8',1),('8FII',NULL,'8',1),('8FIII',NULL,'8',1),('8FIV',NULL,'8',1),('8FV',NULL,'8',1),('8GI',NULL,'8',1),('8GII',NULL,'8',1),('8GIII',NULL,'8',1),('8GIV',NULL,'8',1),('8GV',NULL,'8',1),('9AI',NULL,'9',1),('9AII',NULL,'9',1),('9AIII',NULL,'9',1),('9AIV',NULL,'9',1),('9AV',NULL,'9',1),('9BI',NULL,'9',1),('9BII',NULL,'9',1),('9BIII',NULL,'9',1),('9BIV',NULL,'9',1),('9BV',NULL,'9',1),('9CI',NULL,'9',1),('9CII',NULL,'9',1),('9CIII',NULL,'9',1),('9CIV',NULL,'9',1),('9CV',NULL,'9',1),('9DI',NULL,'9',1),('9DII',NULL,'9',1),('9DIII',NULL,'9',1),('9DIV',NULL,'9',1),('9DV',NULL,'9',1),('9EI',NULL,'9',1),('9EII',NULL,'9',1),('9EIII',NULL,'9',1),('9EIV',NULL,'9',1),('9EV',NULL,'9',1),('9FI',NULL,'9',1),('9FII',NULL,'9',1),('9FIII',NULL,'9',1),('9FIV',NULL,'9',1),('9FV',NULL,'9',1),('9GI',NULL,'9',1),('9GII',NULL,'9',1),('9GIII',NULL,'9',1),('9GIV',NULL,'9',1),('9GV',NULL,'9',1);
/*!40000 ALTER TABLE `cuartos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `obras`
--

DROP TABLE IF EXISTS `obras`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `obras` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombreobra` varchar(60) DEFAULT NULL,
  `direccionobra` varchar(80) DEFAULT NULL,
  `ruccliente` varchar(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `obras`
--

LOCK TABLES `obras` WRITE;
/*!40000 ALTER TABLE `obras` DISABLE KEYS */;
INSERT INTO `obras` VALUES (19,'OPEN SALAVERRY','AV. Salaverr 267','20132367800'),(20,'REAL PLAZA','AV. Primavera','20156789235');
/*!40000 ALTER TABLE `obras` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ordenes`
--

DROP TABLE IF EXISTS `ordenes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ordenes` (
  `ORDEN_NRO` varchar(15) NOT NULL,
  `ORDEN_FECHA` datetime DEFAULT NULL,
  `CLIENTE_ID` varchar(11) NOT NULL,
  `OBRA_ID` int(11) NOT NULL,
  `GUIA_CAMION` varchar(20) NOT NULL,
  `ESTRUCTURA` varchar(170) NOT NULL,
  `COMENTARIOS` varchar(200) DEFAULT NULL,
  `RESISTENCIA` decimal(5,1) NOT NULL,
  `USUARIO` varchar(32) DEFAULT NULL,
  `PLANTA_ID` smallint(6) DEFAULT NULL,
  `PROB_ID` varchar(10) DEFAULT NULL,
  `FECHA_RECOJO` datetime DEFAULT NULL,
  PRIMARY KEY (`ORDEN_NRO`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ordenes`
--

LOCK TABLES `ordenes` WRITE;
/*!40000 ALTER TABLE `ordenes` DISABLE KEYS */;
INSERT INTO `ordenes` VALUES ('1243',NULL,'20156789235',20,'FP-1243','prueba','prueba',78.0,NULL,NULL,NULL,NULL),('12435',NULL,'20156789235',20,'FP-1243','prueba','prueba',78.0,NULL,NULL,NULL,NULL),('6789',NULL,'20132367800',19,'FP-6789','jdkfhjk','dsjglks',12.0,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `ordenes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sec_apps`
--

DROP TABLE IF EXISTS `sec_apps`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sec_apps` (
  `app_name` varchar(128) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`app_name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sec_apps`
--

LOCK TABLES `sec_apps` WRITE;
/*!40000 ALTER TABLE `sec_apps` DISABLE KEYS */;
INSERT INTO `sec_apps` VALUES ('AnularOrden','Pantalla de anulación de órdenes'),('BloqueoUsuarios','Mantenimiento de bloqueo de usuarios'),('CajasObservadas','Mantenimiento de cajas observadas'),('Configuraciones','Configuraciones'),('CrearOrden','Pantalla de creación de órdenes'),('EditarOrden','Editar órdenes de servicio'),('Ensayos','Pantalla de ensayos'),('FactEstado','Estado de factura'),('FactFacturacion','Facturación'),('FactImprimir','Imprimir factura'),('MantAcuerdos','Mantenimiento de acuerdos'),('MantClientes','Mantenimiento de clientes'),('MantEmpresasFacturar','Mantenimiento de empresas a facturar'),('MantEncargados','Mantenimiento de encargados de obra'),('MantObras','Mantenimiento de clientes'),('MantProbeteros','Mantenimiento de probeteros'),('MantUsuariosWeb','Mantenimiento de usuarios web'),('RangoCajas','Pantalla de rango de cajas'),('RangoOrdenes','Rango de órdenes'),('RepCertificados','Reporte de certificados'),('RepCobranza','Reporte de cobranza'),('RepEstadistica','Reporte de estadística'),('RepHojaRuta','Reporte de hoja de ruta'),('RepOrdenes','Reporte de órdenes'),('RepRelacionOrdenes','Reporte de Relación de Ordenes'),('RepTestigosEnsayados','Testigos ensayados'),('RepTestigosHoy','Testigos a ensayar hoy'),('RepTestigosManana','Testigos a ensayar mañana'),('SecAplicaciones','Seguridad de aplicaciones'),('SecCambiarPwd','Cambiar password'),('SecGrupos','Seguridad de grupos'),('SecGruposApps','Seguridad de Grupos/Aplicaciones'),('SecUsuarios','Seguridad de usuarios');
/*!40000 ALTER TABLE `sec_apps` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sec_groups`
--

DROP TABLE IF EXISTS `sec_groups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sec_groups` (
  `group_id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(64) DEFAULT NULL,
  PRIMARY KEY (`group_id`),
  UNIQUE KEY `description` (`description`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sec_groups`
--

LOCK TABLES `sec_groups` WRITE;
/*!40000 ALTER TABLE `sec_groups` DISABLE KEYS */;
INSERT INTO `sec_groups` VALUES (1,'Administrador'),(6,'Auxiliar'),(2,'Comercial'),(5,'Planta Administrador'),(3,'Planta Usuario'),(4,'Practicante');
/*!40000 ALTER TABLE `sec_groups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sec_groups_apps`
--

DROP TABLE IF EXISTS `sec_groups_apps`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sec_groups_apps` (
  `group_id` int(11) NOT NULL,
  `app_name` varchar(128) NOT NULL,
  PRIMARY KEY (`group_id`,`app_name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sec_groups_apps`
--

LOCK TABLES `sec_groups_apps` WRITE;
/*!40000 ALTER TABLE `sec_groups_apps` DISABLE KEYS */;
INSERT INTO `sec_groups_apps` VALUES (2,'BloqueoUsuarios'),(2,'FactEditar'),(2,'FactEstado'),(2,'FactFacturacion'),(2,'FactImprimir'),(2,'MantAcuerdos'),(2,'MantClientes'),(2,'MantEmpresasFacturar'),(2,'MantEncargados'),(2,'MantObras'),(2,'MantUsuariosWeb'),(2,'RepCobranza'),(2,'RepHojaRuta'),(2,'RepProyeccion'),(2,'RepRelacionOrdenes'),(2,'SecCambiarPwd'),(3,'CrearOrden'),(3,'Ensayos'),(3,'RangoCajas'),(3,'RepHojaRuta'),(3,'RepOrdenes'),(3,'RepRelacionOrdenes'),(3,'RepTestigosEnsayados'),(3,'RepTestigosHoy'),(3,'RepTestigosManana'),(3,'SecCambiarPwd'),(4,'CrearOrden'),(4,'Ensayos'),(4,'RangoCajas'),(4,'RepHojaRuta'),(4,'RepOrdenes'),(4,'RepRelacionOrdenes'),(4,'RepTestigosEnsayados'),(4,'RepTestigosHoy'),(4,'RepTestigosManana'),(4,'SecCambiarPwd'),(5,'AnularOrden'),(5,'CrearOrden'),(5,'EditarOrden'),(5,'Ensayos'),(5,'MantEncargados'),(5,'RangoCajas'),(5,'RangoOrdenes'),(5,'RepHojaRuta'),(5,'RepOrdenes'),(5,'RepRelacionOrdenes'),(5,'RepTestigosEnsayados'),(5,'RepTestigosHoy'),(5,'RepTestigosManana'),(5,'SecCambiarPwd'),(6,'AnularOrden'),(6,'CrearOrden'),(6,'EditarOrden'),(6,'Ensayos'),(6,'MantProbeteros'),(6,'RangoCajas'),(6,'RangoOrdenes'),(6,'RepHojaRuta'),(6,'RepOrdenes'),(6,'RepRelacionOrdenes'),(6,'RepTestigosEnsayados'),(6,'RepTestigosHoy'),(6,'RepTestigosManana'),(6,'SecCambiarPwd');
/*!40000 ALTER TABLE `sec_groups_apps` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sec_users`
--

DROP TABLE IF EXISTS `sec_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sec_users` (
  `login` varchar(32) NOT NULL,
  `pswd` varchar(32) NOT NULL,
  `name` varchar(64) DEFAULT NULL,
  `email` varchar(64) DEFAULT NULL,
  `active` varchar(1) DEFAULT NULL,
  PRIMARY KEY (`login`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sec_users`
--

LOCK TABLES `sec_users` WRITE;
/*!40000 ALTER TABLE `sec_users` DISABLE KEYS */;
INSERT INTO `sec_users` VALUES ('admin','21232f297a57a5a743894a0e4a801fc3','Administrador','sysadmin@controlmixexpress.com','Y'),('ajimenez','c12b30ac8cfc789f9abca39afa50abed','Alberto Jimenez','ajimenez@controlmixexpress.com','Y'),('avitteri','f7ef1cdda6cb43d0032f0063c44981df','Antonio Vitteri',NULL,'Y'),('edgards','3ba7722d76ebe365bd0e9fc337889fba','Edgard Saavedra',NULL,'Y'),('epasquel','dd7d21dfdd571e1043c2118adea85596','Enrique Pasquel','epasquel@controlmixexpress.com','Y'),('evillanueva','b61bab247bc31e492256c601c89c74b9','Enzo Villanueva','evillanueva@controlmixexpress.com','Y'),('mirkog','ec084b0c526bd99b23695861bbadd0ad','Mirko Guerra','mirkog@controlmixexpress.com','Y'),('mneyra','0741c2983119fbf9a4fb2f6c77a08a27','Mercedes Neyra','mneyra@controlmixexpress.com','Y'),('practicante','dd944d2ffd706706e729398e1c70d952','practicante CME','practicante@controlmixexpress.com','Y'),('richardl','b5cfb66b876e180ca0bfd24b94d5feeb','Richard Lino','rlino@controlmixexpress.com','Y'),('rquezada','e2f19ba3f984a8b0b1d442ed991bdbbe','Robert Quezada','rquezada@controlmixexpress.com','Y');
/*!40000 ALTER TABLE `sec_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sec_users_groups`
--

DROP TABLE IF EXISTS `sec_users_groups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sec_users_groups` (
  `login` varchar(32) NOT NULL,
  `group_id` int(11) NOT NULL,
  PRIMARY KEY (`login`,`group_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sec_users_groups`
--

LOCK TABLES `sec_users_groups` WRITE;
/*!40000 ALTER TABLE `sec_users_groups` DISABLE KEYS */;
INSERT INTO `sec_users_groups` VALUES ('admin',1),('ajimenez',2),('avitteri',3),('edgards',3),('epasquel',1),('evillanueva',5),('mirkog',3),('mneyra',1),('practicante',4),('richardl',5),('rquezada',2);
/*!40000 ALTER TABLE `sec_users_groups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `testigos`
--

DROP TABLE IF EXISTS `testigos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `testigos` (
  `TEST_BARRAS` char(13) NOT NULL,
  `ORDEN_NRO` varchar(11) DEFAULT NULL,
  `TEST_COD` varchar(20) DEFAULT NULL,
  `TEST_PESO` decimal(7,2) DEFAULT NULL,
  `TEST_DIAMETRO` decimal(7,2) DEFAULT NULL,
  `CAJA_ID` varchar(15) DEFAULT NULL,
  `ESTADO` char(1) DEFAULT NULL,
  `ENS_RESULTADO_KN` decimal(5,1) DEFAULT NULL,
  `ENS_RESULTADO_KG` decimal(5,1) DEFAULT NULL,
  `ENS_FECHA` datetime DEFAULT NULL,
  `TIPO_FALLA` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`TEST_BARRAS`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `testigos`
--

LOCK TABLES `testigos` WRITE;
/*!40000 ALTER TABLE `testigos` DISABLE KEYS */;
INSERT INTO `testigos` VALUES ('1','1243','FP-1243-1',NULL,1.00,'C1243-1','0',NULL,NULL,NULL,NULL),('111','12435','FP-12435-1',NULL,1.00,'C12435-1','0',NULL,NULL,NULL,NULL),('2','1243','FP-1243-2',NULL,1.00,'C1243-1','0',NULL,NULL,NULL,NULL),('25','12435','FP-12435-2',NULL,1.00,'C12435-1','0',NULL,NULL,NULL,NULL),('254','12435','FP-12435-3',NULL,1.00,'C12435-1','0',NULL,NULL,NULL,NULL),('3','1243','FP-1243-3',NULL,1.00,'C1243-1','0',NULL,NULL,NULL,NULL),('7','6789','FP-6789-3',NULL,1.00,'C6789-1','0',NULL,NULL,NULL,NULL),('8','6789','FP-6789-2',NULL,1.00,'C6789-1','0',NULL,NULL,NULL,NULL),('9','6789','FP-6789-1',NULL,1.00,'C6789-1','0',NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `testigos` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-06-13  9:28:53
