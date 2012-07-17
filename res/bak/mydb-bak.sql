-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.5.22 - MySQL Community Server (GPL)
-- Server OS:                    Win32
-- HeidiSQL version:             7.0.0.4053
-- Date/time:                    2012-04-16 21:49:02
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET FOREIGN_KEY_CHECKS=0 */;

-- Dumping database structure for mydb
DROP DATABASE IF EXISTS `mydb`;
CREATE DATABASE IF NOT EXISTS `mydb` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `mydb`;


-- Dumping structure for table mydb.event
DROP TABLE IF EXISTS `event`;
CREATE TABLE IF NOT EXISTS `event` (
  `name` varchar(255) NOT NULL,
  `type` varchar(2) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_email` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `description` tinytext,
  `created_on` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_event_user` (`fk_email`),
  CONSTRAINT `FK_event_user` FOREIGN KEY (`fk_email`) REFERENCES `user` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table mydb.event: ~0 rows (approximately)
/*!40000 ALTER TABLE `event` DISABLE KEYS */;
INSERT INTO `event` (`name`, `type`, `id`, `fk_email`, `description`, `created_on`) VALUES
	('a', 'cs', 1, 'a', 'jashajhskja', NULL),
	('1', 'cs', 2, 'a', '1', '2012-04-14 17:20:03'),
	('2', 'cs', 3, 'a', '2', '2012-04-14 17:20:59');
/*!40000 ALTER TABLE `event` ENABLE KEYS */;


-- Dumping structure for table mydb.user
DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `email` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `password` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `first_name` varchar(25) COLLATE latin1_general_ci NOT NULL,
  `last_name` varchar(25) COLLATE latin1_general_ci DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- Dumping data for table mydb.user: ~6 rows (approximately)
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`email`, `password`, `first_name`, `last_name`) VALUES
	('a', 'a', 'a', NULL),
	('admin', 'admin', '', NULL),
	('linwaikit@gmail.com', 'passw0rd', 'Wai Kit', 'Lin '),
	('praba5477@gmail.com', '1234567890', '', NULL),
	('queennie1206@hotmail.com', '880612', '', NULL),
	('test', 'test', '', NULL);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
/*!40014 SET FOREIGN_KEY_CHECKS=1 */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
