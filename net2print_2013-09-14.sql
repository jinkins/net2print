# ************************************************************
# Sequel Pro SQL dump
# Version 4096
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Hôte: localhost (MySQL 5.5.29)
# Base de données: net2print
# Temps de génération: 2013-09-14 11:36:43 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Affichage de la table clients
# ------------------------------------------------------------

DROP TABLE IF EXISTS `clients`;

CREATE TABLE `clients` (
  `ID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Nom` varchar(50) NOT NULL DEFAULT '',
  `Prenom` varchar(50) NOT NULL DEFAULT '',
  `Email` varchar(50) NOT NULL DEFAULT '',
  `Rue` varchar(50) NOT NULL DEFAULT '',
  `Numero` varchar(10) NOT NULL DEFAULT '',
  `CP` int(4) unsigned NOT NULL,
  `Localite` varchar(50) NOT NULL DEFAULT '',
  `Tel` varchar(50) NOT NULL DEFAULT '',
  `Societe` varchar(50) DEFAULT NULL,
  `MDP` varchar(100) NOT NULL DEFAULT '',
  PRIMARY KEY (`ID`),
  UNIQUE KEY `1Email` (`Email`),
  KEY `INom` (`Nom`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `clients` WRITE;
/*!40000 ALTER TABLE `clients` DISABLE KEYS */;

INSERT INTO `clients` (`ID`, `Nom`, `Prenom`, `Email`, `Rue`, `Numero`, `CP`, `Localite`, `Tel`, `Societe`, `MDP`)
VALUES
	(1,'Develeer','Nicolas','nick-1138@hotmail.com','Rue des Tombes','39',4520,'Antheit','0472300273',NULL,'TheG@nts10032007'),
	(12,'César','Aline','cesaraline@icloud.com','Rue aux raines','22',4537,'Chapon Seraing','0497554876','HEPL','roucky');

/*!40000 ALTER TABLE `clients` ENABLE KEYS */;
UNLOCK TABLES;


# Affichage de la table commandes
# ------------------------------------------------------------

DROP TABLE IF EXISTS `commandes`;

CREATE TABLE `commandes` (
  `NumCom` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Client` int(11) unsigned NOT NULL,
  PRIMARY KEY (`NumCom`),
  KEY `Com-client` (`Client`),
  CONSTRAINT `Com-client` FOREIGN KEY (`Client`) REFERENCES `clients` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Affichage de la table prixImpressions
# ------------------------------------------------------------

DROP TABLE IF EXISTS `prixImpressions`;

CREATE TABLE `prixImpressions` (
  `ID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Min` int(11) NOT NULL,
  `Max` int(11) NOT NULL,
  `Prix` decimal(8,3) NOT NULL,
  `NC` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `prixImpressions` WRITE;
/*!40000 ALTER TABLE `prixImpressions` DISABLE KEYS */;

INSERT INTO `prixImpressions` (`ID`, `Min`, `Max`, `Prix`, `NC`)
VALUES
	(1,0,5,0.080,1),
	(2,6,29,0.060,1),
	(3,30,99,0.050,1),
	(4,100,199,0.045,1),
	(5,200,299,0.040,1),
	(6,300,499,0.035,1),
	(7,500,1000,0.030,1),
	(8,1000,1000000,0.035,1),
	(9,0,140,0.450,2),
	(10,100,150,0.400,2),
	(11,151,2000,0.350,2),
	(13,0,1000000,0.040,3),
	(14,0,9,0.450,4),
	(15,10,29,0.390,4),
	(16,30,100,0.370,4),
	(17,101,300,0.350,4),
	(18,301,500,0.330,4),
	(19,501,10000,0.300,4);

/*!40000 ALTER TABLE `prixImpressions` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
