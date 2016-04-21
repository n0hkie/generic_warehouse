-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.6.12-log - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             9.3.0.4984
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping database structure for db_warehouse
DROP DATABASE IF EXISTS `db_warehouse`;
CREATE DATABASE IF NOT EXISTS `db_warehouse` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci */;
USE `db_warehouse`;


-- Dumping structure for table db_warehouse.tbl_admin
DROP TABLE IF EXISTS `tbl_admin`;
CREATE TABLE IF NOT EXISTS `tbl_admin` (
  `intID` int(11) NOT NULL AUTO_INCREMENT,
  `strLastName` char(200) COLLATE utf8_unicode_ci NOT NULL,
  `strFirstName` char(200) COLLATE utf8_unicode_ci NOT NULL,
  `strEmail` char(200) COLLATE utf8_unicode_ci NOT NULL,
  `strMobile` char(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dteCreatedDate` date NOT NULL,
  `intIsActive` int(11) NOT NULL,
  PRIMARY KEY (`intID`),
  UNIQUE KEY `id_UNIQUE` (`intID`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table db_warehouse.tbl_admin: ~1 rows (approximately)
DELETE FROM `tbl_admin`;
/*!40000 ALTER TABLE `tbl_admin` DISABLE KEYS */;
INSERT INTO `tbl_admin` (`intID`, `strLastName`, `strFirstName`, `strEmail`, `strMobile`, `dteCreatedDate`, `intIsActive`) VALUES
	(9, 'user', 'demo', 'admin@email.com', NULL, '0000-00-00', 1);
/*!40000 ALTER TABLE `tbl_admin` ENABLE KEYS */;


-- Dumping structure for table db_warehouse.tbl_auth_admin
DROP TABLE IF EXISTS `tbl_auth_admin`;
CREATE TABLE IF NOT EXISTS `tbl_auth_admin` (
  `intID` int(11) NOT NULL AUTO_INCREMENT,
  `intAdminID` int(11) NOT NULL,
  `strUsername` char(200) COLLATE utf8_unicode_ci NOT NULL,
  `strPassword` char(200) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`intID`),
  UNIQUE KEY `id_UNIQUE` (`intID`),
  KEY `fk_auth_admin_admin_idx` (`intAdminID`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table db_warehouse.tbl_auth_admin: ~1 rows (approximately)
DELETE FROM `tbl_auth_admin`;
/*!40000 ALTER TABLE `tbl_auth_admin` DISABLE KEYS */;
INSERT INTO `tbl_auth_admin` (`intID`, `intAdminID`, `strUsername`, `strPassword`) VALUES
	(9, 9, 'demouser', 'a+itws6jglXeT2vAhfS88Wq8jKwrpIo/Rp48vvV/xv8H2GqcnKe/7UZFyfszMkM/09kesR4ISzBJGYfJ0j3xsQ==');
/*!40000 ALTER TABLE `tbl_auth_admin` ENABLE KEYS */;


-- Dumping structure for table db_warehouse.tbl_bin
DROP TABLE IF EXISTS `tbl_bin`;
CREATE TABLE IF NOT EXISTS `tbl_bin` (
  `intID` int(11) NOT NULL AUTO_INCREMENT,
  `strName` char(100) COLLATE utf8_unicode_ci NOT NULL,
  `intLocation` int(11) NOT NULL,
  `intRackID` int(11) NOT NULL,
  PRIMARY KEY (`intID`)
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table db_warehouse.tbl_bin: ~60 rows (approximately)
DELETE FROM `tbl_bin`;
/*!40000 ALTER TABLE `tbl_bin` DISABLE KEYS */;
INSERT INTO `tbl_bin` (`intID`, `strName`, `intLocation`, `intRackID`) VALUES
	(1, 'A1', 1, 1),
	(2, 'A2', 2, 1),
	(3, 'A3', 3, 1),
	(4, 'A4', 4, 1),
	(5, 'A5', 5, 1),
	(6, 'A6', 6, 1),
	(7, 'A7', 7, 1),
	(8, 'A8', 8, 1),
	(9, 'A9', 9, 1),
	(10, 'A10', 10, 1),
	(11, 'B1', 1, 2),
	(12, 'B2', 2, 2),
	(13, 'B3', 3, 2),
	(14, 'B4', 4, 2),
	(15, 'B5', 5, 2),
	(16, 'B6', 6, 2),
	(17, 'B7', 7, 2),
	(18, 'B8', 8, 2),
	(19, 'B9', 9, 2),
	(20, 'B10', 10, 2),
	(21, 'C1', 1, 3),
	(22, 'C2', 2, 3),
	(23, 'C3', 3, 3),
	(24, 'C4', 4, 3),
	(25, 'C5', 5, 3),
	(26, 'C6', 6, 3),
	(27, 'C7', 7, 3),
	(28, 'C8', 8, 3),
	(29, 'C9', 9, 3),
	(30, 'C10', 10, 3),
	(31, 'D1', 1, 4),
	(32, 'D2', 2, 4),
	(33, 'D3', 3, 4),
	(34, 'D4', 4, 4),
	(35, 'D5', 5, 4),
	(36, 'D6', 6, 4),
	(37, 'D7', 7, 4),
	(38, 'D8', 8, 4),
	(39, 'D9', 9, 4),
	(40, 'D10', 10, 4),
	(41, 'E1', 1, 5),
	(42, 'E2', 2, 5),
	(43, 'E3', 3, 5),
	(44, 'E4', 4, 5),
	(45, 'E5', 5, 5),
	(46, 'E6', 6, 5),
	(47, 'E7', 7, 5),
	(48, 'E8', 8, 5),
	(49, 'E9', 9, 5),
	(50, 'E10', 10, 5),
	(51, 'F1', 1, 6),
	(52, 'F2', 2, 6),
	(53, 'F3', 3, 6),
	(54, 'F4', 4, 6),
	(55, 'F5', 5, 6),
	(56, 'F6', 6, 6),
	(57, 'F7', 7, 6),
	(58, 'F8', 8, 6),
	(59, 'F9', 9, 6),
	(60, 'F10', 10, 6);
/*!40000 ALTER TABLE `tbl_bin` ENABLE KEYS */;


-- Dumping structure for table db_warehouse.tbl_picker
DROP TABLE IF EXISTS `tbl_picker`;
CREATE TABLE IF NOT EXISTS `tbl_picker` (
  `intID` int(11) NOT NULL AUTO_INCREMENT,
  `strName` char(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `intLocation` int(11) NOT NULL DEFAULT '0',
  `intRackID` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`intID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table db_warehouse.tbl_picker: ~2 rows (approximately)
DELETE FROM `tbl_picker`;
/*!40000 ALTER TABLE `tbl_picker` DISABLE KEYS */;
INSERT INTO `tbl_picker` (`intID`, `strName`, `intLocation`, `intRackID`) VALUES
	(1, 'P1', 1, 1),
	(2, 'P2', 2, 3),
	(3, 'P3', 3, 5);
/*!40000 ALTER TABLE `tbl_picker` ENABLE KEYS */;


-- Dumping structure for table db_warehouse.tbl_product
DROP TABLE IF EXISTS `tbl_product`;
CREATE TABLE IF NOT EXISTS `tbl_product` (
  `intID` int(11) NOT NULL AUTO_INCREMENT,
  `strName` char(100) COLLATE utf8_unicode_ci NOT NULL,
  `intQuantity` double(10,2) NOT NULL,
  `intBinID` int(11) NOT NULL,
  PRIMARY KEY (`intID`)
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table db_warehouse.tbl_product: ~59 rows (approximately)
DELETE FROM `tbl_product`;
/*!40000 ALTER TABLE `tbl_product` DISABLE KEYS */;
INSERT INTO `tbl_product` (`intID`, `strName`, `intQuantity`, `intBinID`) VALUES
	(1, 'Meat', 100.00, 1),
	(2, 'Paper', 50.00, 2),
	(3, 'Milk', 200.00, 3),
	(4, 'Coffee', 40.00, 4),
	(5, 'Tea', 60.00, 5),
	(6, 'Pencil', 80.00, 6),
	(7, 'Pen', 110.00, 7),
	(8, 'Eraser', 200.00, 8),
	(9, 'Cabinet', 10.00, 9),
	(10, 'Table', 70.00, 10),
	(11, 'Chair', 85.00, 11),
	(12, 'Orange', 150.00, 12),
	(13, 'Apple', 140.00, 13),
	(14, 'Banana', 130.00, 14),
	(15, 'Laptop', 45.00, 15),
	(16, 'Computer Mouse', 65.00, 16),
	(17, 'Cellphone', 120.00, 17),
	(18, 'Bottle Water', 145.00, 18),
	(19, 'Coke Can', 180.00, 19),
	(20, 'Card Deck', 100.00, 20),
	(21, 'Potato Chips', 130.00, 21),
	(22, 'Sardines', 145.00, 22),
	(23, 'Markers', 30.00, 23),
	(24, 'Highlighters', 55.00, 24),
	(25, 'Paper clips', 175.00, 25),
	(26, 'Tape', 185.00, 26),
	(27, 'Rubber bands', 190.00, 27),
	(28, 'Stamp pads', 210.00, 28),
	(29, 'Ink for stamp pads', 195.00, 29),
	(30, 'Spiral notebooks', 175.00, 30),
	(31, 'Writing pads', 155.00, 31),
	(32, 'Phone message pads', 125.00, 32),
	(33, 'Post–it notes', 135.00, 33),
	(34, 'Laser printer paper', 45.00, 34),
	(35, 'Copy paper', 55.00, 35),
	(36, 'Fax paper', 65.00, 36),
	(37, 'Graph paper', 75.00, 37),
	(38, 'Colored paper', 75.00, 38),
	(39, 'Pocket notebook', 100.00, 39),
	(40, 'Manila file folders', 125.00, 40),
	(41, 'Hanging file folders', 135.00, 41),
	(42, 'Pocket folders', 145.00, 42),
	(43, 'File labels', 155.00, 43),
	(44, 'Index dividers', 165.00, 44),
	(45, 'Tabs', 175.00, 45),
	(46, 'Letter envelopes', 185.00, 46),
	(47, 'Catalog envelopes', 195.00, 47),
	(48, 'Padded envelopes', 205.00, 48),
	(49, 'Shipping paper', 210.00, 49),
	(50, 'Shipping labels', 215.00, 50),
	(51, 'Disk mailers', 220.00, 51),
	(52, 'Bubble wrap', 225.00, 52),
	(53, 'Sealing tape', 230.00, 53),
	(54, 'Toner cartridges', 235.00, 54),
	(55, '3.5" high density disks', 240.00, 55),
	(56, 'CD–Roms', 245.00, 56),
	(57, 'Zip drive tapes', 250.00, 57),
	(58, 'Calendar', 15.00, 58),
	(59, 'Refills for planner', 25.00, 59),
	(60, 'Time cards', 200.00, 60);
/*!40000 ALTER TABLE `tbl_product` ENABLE KEYS */;


-- Dumping structure for table db_warehouse.tbl_rack
DROP TABLE IF EXISTS `tbl_rack`;
CREATE TABLE IF NOT EXISTS `tbl_rack` (
  `intID` int(11) NOT NULL AUTO_INCREMENT,
  `strName` char(100) COLLATE utf8_unicode_ci NOT NULL,
  `intLocation` int(11) NOT NULL,
  `strOpen` char(5) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`intID`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table db_warehouse.tbl_rack: ~6 rows (approximately)
DELETE FROM `tbl_rack`;
/*!40000 ALTER TABLE `tbl_rack` DISABLE KEYS */;
INSERT INTO `tbl_rack` (`intID`, `strName`, `intLocation`, `strOpen`) VALUES
	(1, 'R1', 1, 'L'),
	(2, 'R2', 2, 'R'),
	(3, 'R3', 3, 'L'),
	(4, 'R4', 4, 'R'),
	(5, 'R5', 5, 'L'),
	(6, 'R6', 6, 'R');
/*!40000 ALTER TABLE `tbl_rack` ENABLE KEYS */;


-- Dumping structure for table db_warehouse.tbl_transaction
DROP TABLE IF EXISTS `tbl_transaction`;
CREATE TABLE IF NOT EXISTS `tbl_transaction` (
  `intID` int(11) NOT NULL AUTO_INCREMENT,
  `intProductID` int(11) NOT NULL DEFAULT '0',
  `intQuantity` double(10,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`intID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table db_warehouse.tbl_transaction: ~0 rows (approximately)
DELETE FROM `tbl_transaction`;
/*!40000 ALTER TABLE `tbl_transaction` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_transaction` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
