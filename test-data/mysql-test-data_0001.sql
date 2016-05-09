CREATE DATABASE  IF NOT EXISTS `cellavita` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `cellavita`;
-- MySQL dump 10.13  Distrib 5.7.9, for osx10.9 (x86_64)
--
-- Host: 192.168.83.11    Database: cellavita
-- ------------------------------------------------------
-- Server version	5.5.47-0ubuntu0.14.04.1

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
-- Table structure for table `addresses`
--

DROP TABLE IF EXISTS `addresses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `addresses` (
  `donor_id` int(11) NOT NULL,
  `address_id` int(11) NOT NULL,
  `address_line1` varchar(45) DEFAULT NULL,
  `address_line2` varchar(45) DEFAULT NULL,
  `address_state` varchar(45) DEFAULT NULL,
  `address_city` varchar(45) DEFAULT NULL,
  `address_zip` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`donor_id`,`address_id`),
  KEY `fk_addresses_donors1_idx` (`donor_id`),
  CONSTRAINT `fk_addresses_donors1` FOREIGN KEY (`donor_id`) REFERENCES `donors` (`donor_id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `addresses`
--

LOCK TABLES `addresses` WRITE;
/*!40000 ALTER TABLE `addresses` DISABLE KEYS */;
/*!40000 ALTER TABLE `addresses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cells`
--

DROP TABLE IF EXISTS `cells`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cells` (
  `donor_id` int(11) NOT NULL,
  `cell_id` int(11) NOT NULL,
  PRIMARY KEY (`donor_id`,`cell_id`),
  CONSTRAINT `fk_cells_donors1` FOREIGN KEY (`donor_id`) REFERENCES `donors` (`donor_id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cells`
--

LOCK TABLES `cells` WRITE;
/*!40000 ALTER TABLE `cells` DISABLE KEYS */;
/*!40000 ALTER TABLE `cells` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `conditions`
--

DROP TABLE IF EXISTS `conditions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `conditions` (
  `stage_id` int(11) NOT NULL,
  PRIMARY KEY (`stage_id`),
  KEY `fk_conditions_stages1_idx` (`stage_id`),
  CONSTRAINT `fk_conditions_stages1` FOREIGN KEY (`stage_id`) REFERENCES `stages` (`stage_id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `conditions`
--

LOCK TABLES `conditions` WRITE;
/*!40000 ALTER TABLE `conditions` DISABLE KEYS */;
/*!40000 ALTER TABLE `conditions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `donors`
--

DROP TABLE IF EXISTS `donors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `donors` (
  `donor_id` int(11) NOT NULL,
  `donor_name` varchar(45) DEFAULT NULL,
  `donor_rg_num` varchar(45) DEFAULT NULL,
  `donor_rg_exp` varchar(45) DEFAULT NULL,
  `donor_cpf_num` varchar(45) DEFAULT NULL,
  `donor_cpf_exp` varchar(45) DEFAULT NULL,
  `donor_sex` varchar(45) DEFAULT NULL,
  `donor_weight` varchar(45) DEFAULT NULL,
  `donor_height` varchar(45) DEFAULT NULL,
  `donor_birthdate` varchar(45) DEFAULT NULL,
  `donor_nation` varchar(45) DEFAULT NULL,
  `donor_natural` varchar(45) DEFAULT NULL,
  `donor_father` varchar(45) DEFAULT NULL,
  `donor_mother` varchar(45) DEFAULT NULL,
  `donor_occupation` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`donor_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `donors`
--

LOCK TABLES `donors` WRITE;
/*!40000 ALTER TABLE `donors` DISABLE KEYS */;
INSERT INTO `donors` VALUES (1,'Juvenal A. Silva Jr.','17908673X','SSP','07834645846','SRF','masc','108','185','19681220','BR','BR','Juvenal A. Silva','Celina dos Santos Silva','Software Engineer');
/*!40000 ALTER TABLE `donors` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `stage_types`
--

DROP TABLE IF EXISTS `stage_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `stage_types` (
  `stage_type` int(11) NOT NULL,
  `stages_stage_id` int(11) NOT NULL,
  `stage_type_name` varchar(45) NOT NULL,
  PRIMARY KEY (`stage_type`,`stages_stage_id`),
  UNIQUE KEY `stage_type_UNIQUE` (`stage_type`),
  UNIQUE KEY `stage_type_name_UNIQUE` (`stage_type_name`),
  KEY `fk_stage_types_stages1_idx` (`stages_stage_id`),
  CONSTRAINT `fk_stage_types_stages1` FOREIGN KEY (`stages_stage_id`) REFERENCES `stages` (`stage_id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stage_types`
--

LOCK TABLES `stage_types` WRITE;
/*!40000 ALTER TABLE `stage_types` DISABLE KEYS */;
/*!40000 ALTER TABLE `stage_types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `stages`
--

DROP TABLE IF EXISTS `stages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `stages` (
  `stage_id` int(11) NOT NULL,
  `depend_on` int(11) DEFAULT NULL,
  PRIMARY KEY (`stage_id`),
  KEY `fk_stages_stages_idx` (`depend_on`),
  CONSTRAINT `fk_stages_stages` FOREIGN KEY (`depend_on`) REFERENCES `stages` (`stage_id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stages`
--

LOCK TABLES `stages` WRITE;
/*!40000 ALTER TABLE `stages` DISABLE KEYS */;
/*!40000 ALTER TABLE `stages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `telephones`
--

DROP TABLE IF EXISTS `telephones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `telephones` (
  `donor_id` int(11) NOT NULL,
  `phone_id` varchar(45) NOT NULL,
  `phone_type` varchar(45) DEFAULT NULL,
  `phone_number` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`donor_id`,`phone_id`),
  CONSTRAINT `fk_telephones_donor1` FOREIGN KEY (`donor_id`) REFERENCES `donors` (`donor_id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `telephones`
--

LOCK TABLES `telephones` WRITE;
/*!40000 ALTER TABLE `telephones` DISABLE KEYS */;
/*!40000 ALTER TABLE `telephones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `travels`
--

DROP TABLE IF EXISTS `travels`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `travels` (
  `donor_id` int(11) NOT NULL,
  `travel_id` int(11) NOT NULL,
  `travel_date` varchar(45) DEFAULT NULL,
  `travel_location` varchar(45) DEFAULT NULL,
  `travel_time` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`donor_id`,`travel_id`),
  KEY `fk_travels_donors1_idx` (`donor_id`),
  CONSTRAINT `fk_travels_donors1` FOREIGN KEY (`donor_id`) REFERENCES `donors` (`donor_id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `travels`
--

LOCK TABLES `travels` WRITE;
/*!40000 ALTER TABLE `travels` DISABLE KEYS */;
/*!40000 ALTER TABLE `travels` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vaccines`
--

DROP TABLE IF EXISTS `vaccines`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vaccines` (
  `donor_id` int(11) NOT NULL,
  `vaccine_type` int(11) NOT NULL,
  `vaccine_date` varchar(45) DEFAULT NULL,
  `vaccine_dose` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`donor_id`,`vaccine_type`),
  KEY `fk_vaccines_donors1_idx` (`donor_id`),
  CONSTRAINT `fk_vaccines_donors1` FOREIGN KEY (`donor_id`) REFERENCES `donors` (`donor_id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vaccines`
--

LOCK TABLES `vaccines` WRITE;
/*!40000 ALTER TABLE `vaccines` DISABLE KEYS */;
/*!40000 ALTER TABLE `vaccines` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'cellavita'
--

--
-- Dumping routines for database 'cellavita'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-04-18 19:40:59
