-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.25-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             12.0.0.6468
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for formula
CREATE DATABASE IF NOT EXISTS `formula` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `formula`;

-- Dumping structure for table formula.admin_report
CREATE TABLE IF NOT EXISTS `admin_report` (
  `r_id` int(11) NOT NULL AUTO_INCREMENT,
  `r_name` varchar(12) NOT NULL,
  `r_number` varchar(20) NOT NULL,
  `r_batch` varchar(10) NOT NULL,
  `r_ticket` varchar(12) NOT NULL,
  `r_date` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`r_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

-- Dumping data for table formula.admin_report: ~18 rows (approximately)
DELETE FROM `admin_report`;
INSERT INTO `admin_report` (`r_id`, `r_name`, `r_number`, `r_batch`, `r_ticket`, `r_date`) VALUES
	(1, '28760000003', '2876', '', '208433', '2023-07-10 10:56:28'),
	(2, '28760000003', '2876', '', '208433', '2023-07-10 10:56:28'),
	(3, '28760000003', '2876', '', '208433', '2023-07-10 10:56:28'),
	(4, '28760000003', '2876', '', '208433', '2023-07-10 10:56:28'),
	(5, '28760000003', '2876', '', '208433', '2023-07-10 10:56:28'),
	(6, '28760000003', '2876', '', '208433', '2023-07-10 10:56:28'),
	(7, '28760000003', '2876', '', '208433', '2023-07-10 10:56:28'),
	(8, '28760000003', '2876', '', '208433', '2023-07-10 10:56:28'),
	(9, '28760000003', '2876', '', '208433', '2023-07-10 10:56:28'),
	(10, '28760000003', '2876', '', '208433', '2023-07-10 10:56:28'),
	(11, '28760000003', '2876', '', '208433', '2023-07-10 10:56:28'),
	(12, '28760000003', '2876', '', '208433', '2023-07-10 10:56:28'),
	(15, '28760000001', '2876', '', '301634', '2023-07-10 10:56:28'),
	(16, '28760000001', '2876', '', '301617', '2023-07-10 10:56:28'),
	(17, '28760000001', '2876', '', '301580', '2023-07-10 10:56:28'),
	(18, '28760000001', '2876', '', '301580', '2023-07-10 10:56:28'),
	(19, '28760000001', '2876', '', '208433', '2023-07-10 10:56:28'),
	(20, '28760000001', '2876', '', '208433', '2023-07-10 10:56:28'),
	(24, 'testAPi', '123311', '8878', 'rs98', '2023-07-10 09:57:20');

-- Dumping structure for table formula.admin_reportlist
CREATE TABLE IF NOT EXISTS `admin_reportlist` (
  `rlist_id` int(11) NOT NULL AUTO_INCREMENT,
  `rlist_reportid` varchar(50) NOT NULL DEFAULT '0',
  `rlist_name` varchar(50) NOT NULL DEFAULT '0',
  `rlist_number` varchar(50) NOT NULL DEFAULT '0',
  `rlist_weight` float NOT NULL DEFAULT 0,
  `rlist_nett` float NOT NULL DEFAULT 0,
  `rlist_date` datetime NOT NULL,
  PRIMARY KEY (`rlist_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table formula.admin_reportlist: ~0 rows (approximately)
DELETE FROM `admin_reportlist`;
INSERT INTO `admin_reportlist` (`rlist_id`, `rlist_reportid`, `rlist_name`, `rlist_number`, `rlist_weight`, `rlist_nett`, `rlist_date`) VALUES
	(1, '0', 'testAPi', '123311', 1400, 1000, '2023-07-10 10:00:11');

-- Dumping structure for table formula.ci_sessions
CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `id` varchar(128) NOT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `timestamp` timestamp NULL DEFAULT NULL,
  `data` blob DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `timestamp` (`timestamp`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table formula.ci_sessions: ~0 rows (approximately)
DELETE FROM `ci_sessions`;

-- Dumping structure for table formula.master_ingredient
CREATE TABLE IF NOT EXISTS `master_ingredient` (
  `i_id` int(11) NOT NULL AUTO_INCREMENT,
  `i_mixtureid` varchar(50) DEFAULT NULL,
  `i_number` varchar(50) DEFAULT NULL,
  `i_name` varchar(50) DEFAULT NULL,
  `i_low` float DEFAULT NULL,
  `i_high` float DEFAULT NULL,
  PRIMARY KEY (`i_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table formula.master_ingredient: ~3 rows (approximately)
DELETE FROM `master_ingredient`;
INSERT INTO `master_ingredient` (`i_id`, `i_mixtureid`, `i_number`, `i_name`, `i_low`, `i_high`) VALUES
	(1, '1', '2122', 'Daun Jeruk', 35.5, 100),
	(2, '1', '2123', 'Daun Bawang', 20, 100),
	(3, '1', '2124', 'Jahe', 20, 100);

-- Dumping structure for table formula.master_mixture
CREATE TABLE IF NOT EXISTS `master_mixture` (
  `m_id` int(11) NOT NULL AUTO_INCREMENT,
  `m_number` varchar(50) DEFAULT NULL,
  `m_name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`m_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

-- Dumping data for table formula.master_mixture: ~1 rows (approximately)
DELETE FROM `master_mixture`;
INSERT INTO `master_mixture` (`m_id`, `m_number`, `m_name`) VALUES
	(1, '301616', 'Goreng');

-- Dumping structure for table formula.paketactive
CREATE TABLE IF NOT EXISTS `paketactive` (
  `active_id` int(11) NOT NULL AUTO_INCREMENT,
  `paketidactive` varchar(50) DEFAULT NULL,
  `poactive` varchar(50) DEFAULT NULL,
  `active_created` datetime DEFAULT NULL,
  `active_deleted` datetime DEFAULT NULL,
  `active_updated` datetime DEFAULT NULL,
  PRIMARY KEY (`active_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

-- Dumping data for table formula.paketactive: ~0 rows (approximately)
DELETE FROM `paketactive`;

-- Dumping structure for table formula.scaletosap
CREATE TABLE IF NOT EXISTS `scaletosap` (
  `scale_id` int(11) NOT NULL AUTO_INCREMENT,
  `aufnr` varchar(12) NOT NULL,
  `werks` varchar(4) NOT NULL,
  `flvid` varchar(10) NOT NULL,
  `matnr` varchar(12) NOT NULL,
  `matdesc` varchar(40) DEFAULT NULL,
  `paketid` varchar(50) DEFAULT NULL,
  `actweight` float DEFAULT 0,
  `matlotno` varchar(10) NOT NULL,
  `ststimbang` varchar(10) NOT NULL,
  `stsgoreng` enum('1','2') NOT NULL DEFAULT '1',
  `tstamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `matidfg` varchar(10) DEFAULT NULL,
  `fgbatch` varchar(10) DEFAULT NULL,
  `flvname` varchar(40) DEFAULT NULL,
  `actqty` float DEFAULT 0,
  `wnumact` varchar(50) DEFAULT NULL,
  `stpoact` enum('1','2') DEFAULT '1',
  `date` date DEFAULT NULL,
  `stsfinish` enum('0','1') DEFAULT '0',
  `scale_created` datetime DEFAULT NULL,
  `scale_updated` datetime DEFAULT NULL,
  `scale_deleted` datetime DEFAULT NULL,
  PRIMARY KEY (`scale_id`),
  KEY `aufnr` (`aufnr`),
  KEY `werks` (`werks`),
  KEY `flvid` (`flvid`),
  KEY `matnr` (`matnr`)
) ENGINE=InnoDB AUTO_INCREMENT=200 DEFAULT CHARSET=latin1;

-- Dumping data for table formula.scaletosap: ~80 rows (approximately)
DELETE FROM `scaletosap`;
INSERT INTO `scaletosap` (`scale_id`, `aufnr`, `werks`, `flvid`, `matnr`, `matdesc`, `paketid`, `actweight`, `matlotno`, `ststimbang`, `stsgoreng`, `tstamp`, `matidfg`, `fgbatch`, `flvname`, `actqty`, `wnumact`, `stpoact`, `date`, `stsfinish`, `scale_created`, `scale_updated`, `scale_deleted`) VALUES
	(2, '28740396824', '2874', '13707', '301508', 'Bawang Putih Kupas', '0', 16.64, 'testregio', 'C', '', '2023-04-18 06:17:22', NULL, NULL, NULL, NULL, NULL, NULL, '2021-08-16', '0', NULL, NULL, NULL),
	(3, '28740396824', '2874', '13707', '301589', 'Additive  M300802', '0', 45.6, 'testregio', 'C', '', '2023-04-18 06:17:20', NULL, NULL, NULL, NULL, NULL, NULL, '2021-08-16', '0', NULL, NULL, NULL),
	(4, '28740396824', '2874', '13707', '301616', 'Daun Jeruk', '0', 13.28, 'testregio', 'C', '', '2023-04-18 06:17:18', NULL, NULL, NULL, NULL, NULL, NULL, '2021-08-16', '0', NULL, NULL, NULL),
	(5, '28740396824', '2874', '13707', '301617', 'Daun Salam', '0', 20, 'testregio', 'C', '', '2023-04-18 06:17:16', NULL, NULL, NULL, NULL, NULL, NULL, '2021-08-16', '0', NULL, NULL, NULL),
	(6, '28740396824', '2874', '13707', '301619', 'Daun Sereh', '0', 16.64, 'testregio', 'C', '', '2023-04-18 06:17:14', NULL, NULL, NULL, NULL, NULL, NULL, '2021-08-16', '0', NULL, NULL, NULL),
	(7, '28740396824', '2874', '13707', '301634', 'Jahe', '0', 6.68, 'testregio', 'C', '', '2023-04-18 06:17:12', NULL, NULL, NULL, NULL, NULL, NULL, '2021-08-16', '0', NULL, NULL, NULL),
	(8, '28740396824', '2874', '13707', '301642', 'Kemiri', '0', 33.2, 'testregio', 'C', '', '2023-04-18 06:17:10', NULL, NULL, NULL, NULL, NULL, NULL, '2021-08-16', '0', NULL, NULL, NULL),
	(9, '28740396824', '2874', '13707', '301644', 'Kunyit', '0', 14.96, 'testregio', 'C', '', '2023-04-18 06:17:08', NULL, NULL, NULL, NULL, NULL, NULL, '2021-08-16', '0', NULL, NULL, NULL),
	(10, '28740396824', '2874', '13707', '301645', 'Laos', '0', 20, 'testregio', 'C', '', '2023-04-18 06:17:07', NULL, NULL, NULL, NULL, NULL, NULL, '2021-08-16', '0', NULL, NULL, NULL),
	(11, '28740396824', '2874', '13707', '301655', 'Bawang Merah', '0', 182.8, 'testregio', 'C', '', '2023-04-18 06:17:05', NULL, NULL, NULL, NULL, NULL, NULL, '2021-08-16', '0', NULL, NULL, NULL),
	(12, '28740396824', '2874', '13707', '301752', 'Additive M308602', '0', 91.2, 'testregio', 'C', '', '2023-04-18 06:17:02', NULL, NULL, NULL, NULL, NULL, NULL, '2021-08-16', '0', NULL, NULL, NULL),
	(13, '28750448740', '2875', '', '301642', 'Kemiri', 'Paket1', 16.6, 'TRI02B8', '', '2', '2023-04-13 06:46:55', '13707', 'GMSM031122', 'Gor. M. Soto - SM', 8, NULL, NULL, '2023-04-13', NULL, '2023-04-13 13:46:55', NULL, NULL),
	(14, '28750448740', '2875', '', '208433', 'MINYAK RBD OLEIN INDUSTRI', 'Paket1', 380, '06B8229406', '', '2', '2023-04-13 06:46:55', '13707', 'GMSM031122', 'Gor. M. Soto - SM', 8, NULL, NULL, '2023-04-13', NULL, '2023-04-13 13:46:54', NULL, NULL),
	(15, '28750448740', '2875', '', '301508', 'Bawang Putih Kupas', 'Paket1', 8.32, 'MAJ07B8', '', '2', '2023-04-13 06:46:54', '13707', 'GMSM031122', 'Gor. M. Soto - SM', 8, NULL, NULL, '2023-04-13', NULL, '2023-04-13 13:46:53', NULL, NULL),
	(16, '28750448740', '2875', '', '301589', 'Additive  M300802', 'Paket1', 22.8, '1801114111', '', '2', '2023-04-13 06:46:53', '13707', 'GMSM031122', 'Gor. M. Soto - SM', 8, NULL, NULL, '2023-04-13', NULL, '2023-04-13 13:46:53', NULL, NULL),
	(17, '28750448740', '2875', '', '301616', 'Daun Jeruk', 'Paket1', 6.64, 'SUP07B8', '', '2', '2023-04-13 06:46:53', '13707', 'GMSM031122', 'Gor. M. Soto - SM', 8, NULL, NULL, '2023-04-13', NULL, '2023-04-13 13:46:52', NULL, NULL),
	(18, '28750448740', '2875', '', '301617', 'Daun Salam', 'Paket1', 10, 'SUP07B8', '', '2', '2023-04-13 06:46:52', '13707', 'GMSM031122', 'Gor. M. Soto - SM', 8, NULL, NULL, '2023-04-13', NULL, '2023-04-13 13:46:52', NULL, NULL),
	(19, '28750448740', '2875', '', '301619', 'Daun Sereh', 'Paket1', 8.32, 'SUP07B8', '', '2', '2023-04-13 06:46:51', '13707', 'GMSM031122', 'Gor. M. Soto - SM', 8, NULL, NULL, '2023-04-13', NULL, '2023-04-13 13:46:51', NULL, NULL),
	(20, '28750448740', '2875', '', '301634', 'Jahe', 'Paket1', 3.34, 'TRT08B8', '', '2', '2023-04-13 06:46:51', '13707', 'GMSM031122', 'Gor. M. Soto - SM', 8, NULL, NULL, '2023-04-13', NULL, '2023-04-13 13:46:50', NULL, NULL),
	(21, '28750448740', '2875', '', '301644', 'Kunyit', 'Paket1', 7.48, 'MAU08B8', '', '2', '2023-04-13 06:46:50', '13707', 'GMSM031122', 'Gor. M. Soto - SM', 8, NULL, NULL, '2023-04-13', NULL, '2023-04-13 13:46:50', NULL, NULL),
	(22, '28750448740', '2875', '', '301645', 'Laos', 'Paket1', 10, 'MAU08B8', '', '2', '2023-04-13 06:46:50', '13707', 'GMSM031122', 'Gor. M. Soto - SM', 8, NULL, NULL, '2023-04-13', NULL, '2023-04-13 13:46:49', NULL, NULL),
	(23, '28750448740', '2875', '', '301752', 'Additive M308602', 'Paket1', 45.6, 'P3610-10I7', '', '2', '2023-04-13 06:46:49', '13707', 'GMSM031122', 'Gor. M. Soto - SM', 8, NULL, NULL, '2023-04-13', NULL, '2023-04-13 13:46:46', NULL, NULL),
	(24, '28750448740', '2875', '', '301655', 'Bawang Merah', 'Paket2', 91.4, '1IVJ08B8', '', '2', '2023-04-13 06:46:46', '13707', 'GMSM031122', 'Gor. M. Soto - SM', 8, NULL, NULL, '2023-04-13', NULL, '2023-04-13 13:46:46', NULL, NULL),
	(25, '28750448740', '2875', '', '301642', 'Kemiri', 'Paket2', 16.6, 'TRI02B8', '', '2', '2023-04-13 06:46:46', '13707', 'GMSM031122', 'Gor. M. Soto - SM', 8, NULL, NULL, '2023-04-13', NULL, '2023-04-13 13:46:45', NULL, NULL),
	(26, '28750448740', '2875', '', '208433', 'MINYAK RBD OLEIN INDUSTRI', 'Paket2', 380, '06B8229406', '', '2', '2023-04-13 06:46:45', '13707', 'GMSM031122', 'Gor. M. Soto - SM', 8, NULL, NULL, '2023-04-13', NULL, '2023-04-13 13:46:45', NULL, NULL),
	(27, '28750448740', '2875', '', '301508', 'Bawang Putih Kupas', 'Paket2', 8.32, 'MAJ07B8', '', '2', '2023-04-13 06:46:44', '13707', 'GMSM031122', 'Gor. M. Soto - SM', 8, NULL, NULL, '2023-04-13', NULL, '2023-04-13 13:46:44', NULL, NULL),
	(28, '28750448740', '2875', '', '301589', 'Additive  M300802', 'Paket2', 22.8, '1801114111', '', '2', '2023-04-13 06:46:44', '13707', 'GMSM031122', 'Gor. M. Soto - SM', 8, NULL, NULL, '2023-04-13', NULL, '2023-04-13 13:46:43', NULL, NULL),
	(29, '28750448740', '2875', '', '301616', 'Daun Jeruk', 'Paket2', 6.64, 'SUP07B8', '', '2', '2023-04-13 06:46:43', '13707', 'GMSM031122', 'Gor. M. Soto - SM', 8, NULL, NULL, '2023-04-13', NULL, '2023-04-13 13:46:42', NULL, NULL),
	(30, '28750448740', '2875', '', '301617', 'Daun Salam', 'Paket2', 10, 'SUP07B8', '', '2', '2023-04-13 06:46:42', '13707', 'GMSM031122', 'Gor. M. Soto - SM', 8, NULL, NULL, '2023-04-13', NULL, '2023-04-13 13:46:41', NULL, NULL),
	(31, '28750448740', '2875', '', '301619', 'Daun Sereh', 'Paket2', 8.32, 'SUP07B8', '', '2', '2023-04-13 06:46:41', '13707', 'GMSM031122', 'Gor. M. Soto - SM', 8, NULL, NULL, '2023-04-13', NULL, '2023-04-13 13:46:41', NULL, NULL),
	(32, '28750448740', '2875', '', '301634', 'Jahe', 'Paket2', 3.34, 'TRT08B8', '', '2', '2023-04-13 06:46:41', '13707', 'GMSM031122', 'Gor. M. Soto - SM', 8, NULL, NULL, '2023-04-13', NULL, '2023-04-13 13:46:40', NULL, NULL),
	(33, '28750448740', '2875', '', '301644', 'Kunyit', 'Paket2', 7.48, 'MAU08B8', '', '2', '2023-04-13 06:46:40', '13707', 'GMSM031122', 'Gor. M. Soto - SM', 8, NULL, NULL, '2023-04-13', NULL, '2023-04-13 13:46:40', NULL, NULL),
	(34, '28750448740', '2875', '', '301645', 'Laos', 'Paket2', 10, 'MAU08B8', '', '2', '2023-04-13 06:46:39', '13707', 'GMSM031122', 'Gor. M. Soto - SM', 8, NULL, NULL, '2023-04-13', NULL, '2023-04-13 13:46:39', NULL, NULL),
	(35, '28750448740', '2875', '', '301752', 'Additive M308602', 'Paket2', 45.6, 'P3610-10I7', '', '2', '2023-04-13 06:46:39', '13707', 'GMSM031122', 'Gor. M. Soto - SM', 8, NULL, NULL, '2023-04-13', NULL, '2023-04-13 13:46:38', NULL, NULL),
	(36, '28750448740', '2875', '', '301655', 'Bawang Merah', 'Paket3', 91.4, '1IVJ08B8', '', '2', '2023-04-18 02:58:25', '13707', 'GMSM031122', 'Gor. M. Soto - SM', 8, NULL, NULL, '2023-04-13', '0', '2023-04-13 13:46:38', NULL, NULL),
	(37, '28750448740', '2875', '', '301642', 'Kemiri', 'Paket3', 16.6, 'TRI02B8', '', '2', '2023-04-18 02:58:27', '13707', 'GMSM031122', 'Gor. M. Soto - SM', 8, NULL, NULL, '2023-04-13', '0', '2023-04-13 13:46:34', NULL, NULL),
	(38, '28750448740', '2875', '', '208433', 'MINYAK RBD OLEIN INDUSTRI', 'Paket3', 380, '06B8229406', '', '2', '2023-04-18 02:58:29', '13707', 'GMSM031122', 'Gor. M. Soto - SM', 8, NULL, NULL, '2023-04-13', '0', '2023-04-13 13:46:32', NULL, NULL),
	(39, '28750448740', '2875', '', '301508', 'Bawang Putih Kupas', 'Paket3', 8.32, 'MAJ07B8', '', '2', '2023-04-18 02:58:30', '13707', 'GMSM031122', 'Gor. M. Soto - SM', 8, NULL, NULL, '2023-04-13', '0', '2023-04-13 13:46:31', NULL, NULL),
	(40, '28750448740', '2875', '', '301589', 'Additive  M300802', 'Paket3', 22.8, '1801114111', '', '2', '2023-04-18 02:58:32', '13707', 'GMSM031122', 'Gor. M. Soto - SM', 8, NULL, NULL, '2023-04-13', '0', '2023-04-13 13:46:31', NULL, NULL),
	(41, '28750448740', '2875', '', '301616', 'Daun Jeruk', 'Paket3', 6.64, 'SUP07B8', '', '2', '2023-04-18 02:58:21', '13707', 'GMSM031122', 'Gor. M. Soto - SM', 8, NULL, NULL, '2023-04-13', '0', '2023-04-13 13:46:30', NULL, NULL),
	(42, '28750448740', '2875', '', '301617', 'Daun Salam', 'Paket3', 10, 'SUP07B8', '', '2', '2023-04-18 02:58:19', '13707', 'GMSM031122', 'Gor. M. Soto - SM', 8, NULL, NULL, '2023-04-13', '0', '2023-04-13 13:46:30', NULL, NULL),
	(43, '28750448740', '2875', '', '301619', 'Daun Sereh', 'Paket3', 8.32, 'SUP07B8', '', '2', '2023-04-18 02:58:16', '13707', 'GMSM031122', 'Gor. M. Soto - SM', 8, NULL, NULL, '2023-04-13', '0', '2023-04-13 13:46:29', NULL, NULL),
	(44, '28750448740', '2875', '', '301634', 'Jahe', 'Paket3', 3.34, 'TRT08B8', '', '2', '2023-04-18 02:58:14', '13707', 'GMSM031122', 'Gor. M. Soto - SM', 8, NULL, NULL, '2023-04-13', '0', '2023-04-13 13:46:28', NULL, NULL),
	(45, '28750448740', '2875', '', '301644', 'Kunyit', 'Paket3', 7.48, 'MAU08B8', '', '2', '2023-04-18 02:57:56', '13707', 'GMSM031122', 'Gor. M. Soto - SM', 8, NULL, NULL, '2023-04-13', '0', '2023-04-13 13:46:28', NULL, NULL),
	(46, '28750448740', '2875', '', '301645', 'Laos', 'Paket3', 10, 'MAU08B8', '', '2', '2023-04-18 02:58:23', '13707', 'GMSM031122', 'Gor. M. Soto - SM', 8, NULL, NULL, '2023-04-13', '0', '2023-04-13 13:46:27', NULL, NULL),
	(47, '28750448740', '2875', '', '301752', 'Additive M308602', 'Paket3', 45.6, 'P3610-10I7', '', '2', '2023-04-18 02:57:54', '13707', 'GMSM031122', 'Gor. M. Soto - SM', 8, NULL, NULL, '2023-04-13', '0', '2023-04-13 13:46:26', NULL, NULL),
	(48, '28750448740', '2875', '', '301655', 'Bawang Merah', 'Paket4', 91.4, '1IVJ08B8', '', '2', '2023-04-18 02:58:56', '13707', 'GMSM031122', 'Gor. M. Soto - SM', 8, NULL, NULL, '2023-04-13', '0', '2023-04-13 13:46:26', NULL, NULL),
	(49, '28750448740', '2875', '', '301642', 'Kemiri', 'Paket4', 16.6, 'TRI02B8', '', '2', '2023-04-18 02:58:54', '13707', 'GMSM031122', 'Gor. M. Soto - SM', 8, NULL, NULL, '2023-04-13', '0', '2023-04-13 13:46:25', NULL, NULL),
	(50, '28750448740', '2875', '', '208433', 'MINYAK RBD OLEIN INDUSTRI', 'Paket4', 380, '06B8229406', '', '2', '2023-04-18 02:58:52', '13707', 'GMSM031122', 'Gor. M. Soto - SM', 8, NULL, NULL, '2023-04-13', '0', '2023-04-13 13:46:25', NULL, NULL),
	(51, '28750448740', '2875', '', '301508', 'Bawang Putih Kupas', 'Paket4', 8.32, 'MAJ07B8', '', '2', '2023-04-18 02:58:49', '13707', 'GMSM031122', 'Gor. M. Soto - SM', 8, NULL, NULL, '2023-04-13', '0', '2023-04-13 13:46:24', NULL, NULL),
	(52, '28750448740', '2875', '', '301589', 'Additive  M300802', 'Paket4', 22.8, '1801114111', '', '2', '2023-04-18 02:58:45', '13707', 'GMSM031122', 'Gor. M. Soto - SM', 8, NULL, NULL, '2023-04-13', '0', '2023-04-13 13:46:24', NULL, NULL),
	(53, '28750448740', '2875', '', '301616', 'Daun Jeruk', 'Paket4', 6.64, 'SUP07B8', '', '2', '2023-04-18 02:59:09', '13707', 'GMSM031122', 'Gor. M. Soto - SM', 8, NULL, NULL, '2023-04-12', '0', '2023-04-13 13:46:23', NULL, NULL),
	(54, '28750448740', '2875', '', '301617', 'Daun Salam', 'Paket4', 10, 'SUP07B8', '', '2', '2023-04-18 02:58:43', '13707', 'GMSM031122', 'Gor. M. Soto - SM', 8, NULL, NULL, '2023-04-13', '0', '2023-04-13 13:46:23', NULL, NULL),
	(55, '28750448740', '2875', '', '301619', 'Daun Sereh', 'Paket4', 8.32, 'SUP07B8', '', '2', '2023-04-18 02:58:40', '13707', 'GMSM031122', 'Gor. M. Soto - SM', 8, NULL, NULL, '2023-04-13', '0', '2023-04-13 13:46:22', NULL, NULL),
	(56, '28750448740', '2875', '', '301634', 'Jahe', 'Paket4', 3.34, 'TRT08B8', '', '2', '2023-04-18 02:58:38', '13707', 'GMSM031122', 'Gor. M. Soto - SM', 8, NULL, NULL, '2023-04-13', '0', '2023-04-13 13:46:21', NULL, NULL),
	(57, '28750448740', '2875', '', '301644', 'Kunyit', 'Paket4', 7.48, 'MAU08B8', '', '2', '2023-04-18 02:58:36', '13707', 'GMSM031122', 'Gor. M. Soto - SM', 8, NULL, NULL, '2023-04-13', '0', '2023-04-13 13:46:21', NULL, NULL),
	(58, '28750448740', '2875', '', '301645', 'Laos', 'Paket4', 10, 'MAU08B8', '', '2', '2023-04-18 02:58:34', '13707', 'GMSM031122', 'Gor. M. Soto - SM', 8, NULL, NULL, '2023-04-13', '0', '2023-04-13 13:46:19', NULL, NULL),
	(59, '28750448740', '2875', '', '301752', 'Additive M308602', 'Paket4', 45.6, 'P3610-10I7', '', '2', '2023-04-18 02:58:41', '13707', 'GMSM031122', 'Gor. M. Soto - SM', 8, NULL, NULL, '2023-04-13', '0', '2023-04-13 13:46:19', NULL, NULL),
	(108, '28760000001', '2876', '', '301580', 'Flavor', 'Paket 2', 100, '12353HG', '', '2', '2023-05-26 04:23:00', '13707', 'M1051010', 'Gor. M. Soto - SM', 5, NULL, '2', '2023-04-18', '0', '2023-04-18 15:42:24', '2023-05-26 11:17:59', NULL),
	(109, '28760000001', '2876', '', '301580', 'Flavor', 'Paket 2', 100, '12353HG', '', '2', '2023-05-26 04:23:00', '13707', 'M1051010', 'Gor. M. Soto - SM', 5, NULL, '2', '2023-04-18', '0', '2023-04-18 15:42:25', '2023-05-26 11:17:59', NULL),
	(110, '28760000001', '2876', '', '301580', 'Flavor', 'Paket 2', 100, '12353HG', '', '2', '2023-05-26 04:23:00', '13707', 'M1051010', 'Gor. M. Soto - SM', 5, NULL, '2', '2023-04-18', '0', '2023-04-18 15:42:33', '2023-05-26 11:17:59', NULL),
	(111, '28760000001', '2876', '', '301580', 'Flavor', 'Paket 2', 100, '12353HG', '', '2', '2023-05-26 04:23:00', '13707', 'M1051010', 'Gor. M. Soto - SM', 5, NULL, '2', '2023-04-18', '0', '2023-04-18 15:42:35', '2023-05-26 11:17:59', NULL),
	(112, '28760000001', '2876', '', '301580', 'Flavor', 'Paket 3', 100, '12353HG', '', '2', '2023-05-26 04:24:59', '13707', 'M1051010', 'Gor. M. Soto - SM', 5, NULL, '2', '2023-04-18', '0', '2023-04-18 15:49:23', '2023-05-26 11:24:50', NULL),
	(113, '28760000001', '2876', '', '301580', 'Flavor', 'Paket 4', 100, '12353HG', '', '2', '2023-05-29 07:40:05', '13707', 'M1051010', 'Gor. M. Soto - SM', 4, NULL, '2', '2023-04-18', '0', '2023-04-18 15:49:27', '2023-04-18 15:49:27', NULL),
	(114, '28760000001', '2876', '', '301580', 'Flavor', 'Paket 3', 100, '12353HG', '', '2', '2023-05-26 04:24:59', '13707', 'M1051010', 'Gor. M. Soto - SM', 5, NULL, '2', '2023-04-18', '0', '2023-04-18 15:49:31', '2023-05-26 11:24:50', NULL),
	(115, '28760000001', '2876', '', '301580', 'Flavor', 'Paket 4', 100, '12353HG', '', '2', '2023-05-29 07:40:05', '13707', 'M1051010', 'Gor. M. Soto - SM', 4, NULL, '2', '2023-04-18', '0', '2023-04-18 15:49:35', '2023-04-18 15:49:35', NULL),
	(116, '28760000001', '2876', '', '301580', 'Flavor', 'Paket 3', 100, '12353HG', '', '2', '2023-05-26 04:24:59', '13707', 'M1051010', 'Gor. M. Soto - SM', 5, NULL, '2', '2023-04-18', '0', '2023-04-18 15:49:50', '2023-05-26 11:24:50', NULL),
	(117, '28760000001', '2876', '', '301580', 'Flavor', 'Paket 4', 100, '12353HG', '', '2', '2023-05-29 07:40:05', '13707', 'M1051010', 'Gor. M. Soto - SM', 4, NULL, '2', '2023-04-18', '0', '2023-04-18 15:49:55', '2023-04-18 15:49:55', NULL),
	(118, '28760000001', '2876', '', '301580', 'Flavor', 'Paket 3', 100, '12353HG', '', '2', '2023-05-26 04:24:59', '13707', 'M1051010', 'Gor. M. Soto - SM', 5, NULL, '2', '2023-04-18', '0', '2023-04-18 15:50:03', '2023-05-26 11:24:50', NULL),
	(119, '28760000001', '2876', '', '301580', 'Flavor', 'Paket 4', 100, '12353HG', '', '2', '2023-05-29 07:40:05', '13707', 'M1051010', 'Gor. M. Soto - SM', 4, NULL, '2', '2023-04-18', '0', '2023-04-18 16:09:34', '2023-04-18 16:09:34', NULL),
	(129, '28760000001', '2876', '', '301634', 'MINYAK RDP OLEIN INDUSTRI', 'Paket 2', 100, '1221', '', '2', '2023-05-26 04:23:00', '208433', 'M1051010', 'Gor. M. Soto - SM', 5, NULL, '2', '2023-05-26', '0', '2023-05-26 11:17:59', '2023-05-26 11:17:59', NULL),
	(130, '28760000001', '2876', '', '208433', 'MINYAK RDP OLEIN INDUSTRI', 'Paket 3', 100, '1221', '', '2', '2023-05-26 04:24:59', '208433', 'M1051010', 'Gor. M. Soto - SM', 5, NULL, '2', '2023-05-26', '0', '2023-05-26 11:24:50', '2023-05-26 11:24:50', NULL),
	(137, '28760000001', '2876', '', '301580', 'Flavor', 'Paket 4', 100, '12353HG', '', '2', '2023-06-14 04:06:46', '13707', 'M1051010', 'Gor. M. Soto - SM', 0, NULL, '1', '2023-05-30', '0', NULL, NULL, NULL),
	(138, '28760000001', '2876', '', '301580', 'Flavor', 'Paket 4', 100, '12353HG', '', '2', '2023-06-14 04:06:46', '13707', 'M1051010', 'Gor. M. Soto - SM', 0, NULL, '1', '2023-05-30', '0', NULL, NULL, NULL),
	(139, '28760000001', '2876', '', '301580', 'Flavor', 'Paket 4', 100, '12353HG', '', '2', '2023-06-14 04:06:46', '13707', 'M1051010', 'Gor. M. Soto - SM', 0, NULL, '1', '2023-05-30', '0', NULL, NULL, NULL),
	(151, '28760000002', '2876', '', '301580', 'Daun Jeruk', 'Paket 4', 100, '12353HG', '', '2', '2023-06-14 04:42:37', '13707', 'M1051010', 'Gor. M. Soto - SM', 5, NULL, '2', '2023-06-14', '0', NULL, NULL, NULL),
	(152, '28760000002', '2876', '', '301580', 'rempah', 'Paket 4', 100, '12353HG', '', '2', '2023-06-14 04:42:37', '13707', 'M1051010', 'Gor. M. Soto - SM', 5, NULL, '2', '2023-06-14', '0', NULL, NULL, NULL),
	(153, '28760000002', '2876', '', '301580', 'Flavor', 'Paket 4', 100, '12353HG', '', '2', '2023-06-14 04:42:37', '13707', 'M1051010', 'Gor. M. Soto - SM', 5, NULL, '2', '2023-06-14', '0', NULL, NULL, NULL),
	(154, '28760000002', '2876', '', '301580', 'addictive', 'Paket 4', 100, '12353HG', '', '2', '2023-06-14 04:42:37', '13707', 'M1051010', 'Gor. M. Soto - SM', 5, NULL, '2', '2023-06-14', '0', NULL, NULL, NULL),
	(155, '28760000002', '2876', '', '208433', 'MINYAK RDP OLEIN INDUSTRI', 'Paket 4', 100, '1221', '', '2', '2023-06-14 04:42:37', '208433', 'M1051010', 'Gor. M. Soto - SM', 5, NULL, '2', '2023-06-14', '0', NULL, NULL, NULL);

-- Dumping structure for table formula.shiftinfo
CREATE TABLE IF NOT EXISTS `shiftinfo` (
  `id_shift` int(11) NOT NULL AUTO_INCREMENT,
  `shift_name` varchar(50) DEFAULT NULL,
  `shift_in` time DEFAULT '00:00:00',
  `shift_out` time DEFAULT '00:00:00',
  PRIMARY KEY (`id_shift`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table formula.shiftinfo: ~3 rows (approximately)
DELETE FROM `shiftinfo`;
INSERT INTO `shiftinfo` (`id_shift`, `shift_name`, `shift_in`, `shift_out`) VALUES
	(1, 'SH 1', '07:00:00', '15:00:00'),
	(2, 'SH 2', '15:00:00', '23:00:00'),
	(3, 'SH 3', '23:00:00', '07:00:00');

-- Dumping structure for table formula.sys_dates
CREATE TABLE IF NOT EXISTS `sys_dates` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `day` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- Dumping data for table formula.sys_dates: ~7 rows (approximately)
DELETE FROM `sys_dates`;
INSERT INTO `sys_dates` (`id`, `day`) VALUES
	(1, 0),
	(2, 1),
	(3, 2),
	(4, 3),
	(5, 4),
	(6, 5),
	(7, 6);

-- Dumping structure for table formula.sys_nav
CREATE TABLE IF NOT EXISTS `sys_nav` (
  `nav_id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  `nav_order` int(11) DEFAULT NULL,
  `nav_index` char(50) DEFAULT NULL,
  `nav_title` varchar(50) DEFAULT NULL,
  `nav_url` varchar(50) DEFAULT NULL,
  `nav_icon` varchar(50) DEFAULT NULL,
  `nav_created` datetime DEFAULT NULL,
  `nav_updated` datetime DEFAULT NULL,
  `nav_deleted` datetime DEFAULT NULL,
  PRIMARY KEY (`nav_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table formula.sys_nav: ~7 rows (approximately)
DELETE FROM `sys_nav`;
INSERT INTO `sys_nav` (`nav_id`, `parent_id`, `role_id`, `nav_order`, `nav_index`, `nav_title`, `nav_url`, `nav_icon`, `nav_created`, `nav_updated`, `nav_deleted`) VALUES
	(1, NULL, 1, 1, NULL, 'ADMINISTRATOR', NULL, NULL, NULL, NULL, NULL),
	(3, NULL, 1, 3, NULL, 'USER MENEGEMENT', NULL, NULL, NULL, NULL, NULL),
	(4, 3, 1, 1, 'ADMIN_USER', 'User', 'user', 'fas fas-fw fa-user-circle', NULL, NULL, NULL),
	(6, NULL, 1, 2, NULL, 'MASTER', NULL, NULL, NULL, NULL, NULL),
	(8, 2, 1, 1, 'ADMIN_MIXTURE', 'Mixture', 'Mixture', 'fas fa-fw fas fa-flask', NULL, NULL, NULL),
	(9, 1, 1, 3, 'ADMIN_REPORT', 'Report', 'Report/daily', 'fas fa-fw fas fa-archive', NULL, NULL, NULL),
	(10, 2, 1, 2, 'ADMIN_INGREDIENT', 'Ingredient', 'Ingredient', 'fas fa-fw fa-box', NULL, NULL, NULL);

-- Dumping structure for table formula.sys_roles
CREATE TABLE IF NOT EXISTS `sys_roles` (
  `roles_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `description` varchar(50) DEFAULT NULL,
  `defaulft_page` varchar(50) DEFAULT NULL,
  `roles_created` datetime DEFAULT NULL,
  `roles_updated` datetime DEFAULT NULL,
  `roles_deleted` datetime DEFAULT NULL,
  PRIMARY KEY (`roles_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table formula.sys_roles: ~2 rows (approximately)
DELETE FROM `sys_roles`;
INSERT INTO `sys_roles` (`roles_id`, `name`, `description`, `defaulft_page`, `roles_created`, `roles_updated`, `roles_deleted`) VALUES
	(1, 'admin', 'admin', '/report', NULL, NULL, NULL);

-- Dumping structure for table formula.sys_user
CREATE TABLE IF NOT EXISTS `sys_user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` varchar(50) DEFAULT NULL,
  `fullname` varchar(50) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `user_created` datetime DEFAULT NULL,
  `user_updated` datetime DEFAULT NULL,
  `user_deleted` datetime DEFAULT NULL,
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table formula.sys_user: ~2 rows (approximately)
DELETE FROM `sys_user`;
INSERT INTO `sys_user` (`user_id`, `role_id`, `fullname`, `username`, `password`, `user_created`, `user_updated`, `user_deleted`) VALUES
	(1, '1', 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', NULL, NULL, NULL),
	(4, '1', 'demo', 'demo', 'fe01ce2a7fbac8fafaed7c982a04e229', NULL, NULL, NULL);

-- Dumping structure for table formula.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `email_verified_at` datetime DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `pin` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `phone_verified_at` datetime DEFAULT NULL,
  `account_type` int(11) DEFAULT NULL,
  `account_role` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `remember_token` varchar(500) DEFAULT NULL,
  `password_reset_code` varchar(255) DEFAULT NULL,
  `device_token` varchar(255) DEFAULT NULL,
  `account_status` varchar(30) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15332 DEFAULT CHARSET=latin1;

-- Dumping data for table formula.users: ~228 rows (approximately)
DELETE FROM `users`;
INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `email_verified_at`, `password`, `pin`, `phone`, `phone_verified_at`, `account_type`, `account_role`, `photo`, `last_login`, `created_at`, `updated_at`, `remember_token`, `password_reset_code`, `device_token`, `account_status`) VALUES
	(15034, 'Husni', 'Aziz', NULL, NULL, NULL, NULL, NULL, NULL, 1, 'superadmin', NULL, '2019-09-27 14:06:43', '2019-03-04 13:18:06', '2019-09-27 14:06:43', NULL, NULL, NULL, '1'),
	(15039, 'Husni', 'Aziz', NULL, NULL, NULL, '7013', NULL, '2019-09-27 13:11:18', 4, 'customer', NULL, '2019-09-27 13:11:18', '2019-03-22 07:20:41', '2019-09-27 13:11:18', NULL, NULL, 'f3pcOkC0VCg:APA91bHr2WRVYtSIUfTCveB6m6ivXL-LcPlY5FnLDpMqgJq12p11mqQcjDq9Gd6E85j1IhJZuC9ySF3OvN5NQ6S4lxEabGrzmIv5gYsZQ8XazR5K2fNTU5zB5ewiKnnBW10rOHms8puZ', '1'),
	(15043, 'Meyer', 'Admin', NULL, NULL, NULL, NULL, NULL, NULL, 1, 'superadmin', NULL, '2019-09-27 21:46:11', '2019-03-26 10:18:27', '2019-09-27 21:46:11', NULL, NULL, NULL, '1'),
	(15044, 'guntur', 'prabowo', NULL, NULL, NULL, '3668', NULL, '2019-07-04 11:49:50', 4, 'customer', NULL, '2019-07-04 11:49:50', '2019-05-07 10:59:48', '2019-07-04 14:02:13', NULL, NULL, 'dI23W-geZ5A:APA91bHbdTnG1F9EY57gqXtAT7vLxgsyPphFl-gxVNjH88HchnD3TOST2xRXnM9M9BqrKU3TdygKgu04Vmu1Hz3355aHlgPefppACbLrZFHMvXM_7c8F718G2PrYuSfU7GGdBh1h88GI', '1'),
	(15047, 'Laurentia', 'Lisa', NULL, NULL, NULL, '3672', NULL, '2019-06-24 14:03:40', 4, 'customer', NULL, '2019-06-24 14:03:40', '2019-05-10 08:09:02', '2019-06-24 14:03:40', NULL, NULL, 'eQ9CdFjhMsU:APA91bGqDpYe5udAG4Knvwiv_ETRwLcLSMXa-utMwPHDYouHNIN0DsjDuEXDF8FwzZLtpLdAjcxNSAr-awsjjjeuLYHhbPxF6wH4AaLDVZH6s9W3tvYve7uYJTZKrkyfwo8OgZZEU4vz', '1'),
	(15105, 'Heri', 'Asbowo', NULL, NULL, NULL, '3673', NULL, '2019-08-15 13:05:03', 3, 'agent', NULL, '2019-08-15 13:05:03', '2019-08-15 12:21:51', '2019-08-25 04:47:02', NULL, NULL, NULL, '2'),
	(15106, 'Atha', 'Oey', NULL, NULL, NULL, '7290', NULL, '2019-09-27 14:06:06', 4, 'customer', NULL, '2019-09-27 14:06:06', '2019-08-15 12:28:21', '2019-09-27 14:06:06', NULL, NULL, NULL, '1'),
	(15107, 'Meyer', 'Jogja', NULL, NULL, NULL, '2830', NULL, '2019-09-20 15:48:16', 3, 'agent', NULL, '2019-09-20 15:48:16', '2019-08-15 13:42:43', '2019-09-20 15:48:16', NULL, NULL, NULL, '1'),
	(15108, 'Meyer', 'Pusat', NULL, NULL, NULL, '5288', NULL, '2019-09-18 10:17:47', 3, 'agent', NULL, '2019-09-18 10:17:47', '2019-08-15 14:09:17', '2019-09-18 10:17:47', NULL, NULL, NULL, '1'),
	(15109, 'marten', 'bastaman', NULL, NULL, NULL, '8334', NULL, '2019-08-30 16:25:42', 4, 'customer', NULL, '2019-08-30 16:25:42', '2019-08-15 15:27:07', '2019-09-05 11:08:14', NULL, NULL, NULL, '1'),
	(15110, 'Irsan', 'Irsan', NULL, NULL, NULL, '1832', NULL, '2019-08-15 16:15:05', 4, 'customer', NULL, '2019-08-15 16:15:05', '2019-08-15 16:14:43', '2019-08-15 16:15:05', NULL, NULL, NULL, '1'),
	(15111, 'Ariel', 'Test', NULL, NULL, NULL, '6039', NULL, '2019-08-16 17:12:33', 4, 'customer', NULL, '2019-08-16 17:12:33', '2019-08-16 15:59:45', '2019-08-16 17:12:33', NULL, NULL, NULL, '1'),
	(15112, 'Heri', 'Asbowo', NULL, NULL, NULL, '1327', NULL, '2019-09-14 10:39:33', 4, 'customer', NULL, '2019-09-14 10:39:33', '2019-08-16 16:07:15', '2019-09-14 10:39:33', NULL, NULL, NULL, '1'),
	(15113, 'Aldo', 'Chilnaldy', NULL, NULL, NULL, '5035', NULL, '2019-08-18 18:25:44', 4, 'customer', NULL, '2019-08-18 18:25:44', '2019-08-17 17:27:20', '2019-08-18 18:25:44', NULL, NULL, NULL, '1'),
	(15114, 'Andrie', 'Salim', NULL, NULL, NULL, '3239', NULL, '2019-08-18 06:00:11', 4, 'customer', NULL, '2019-08-18 06:00:11', '2019-08-18 05:57:56', '2019-08-18 06:00:11', NULL, NULL, NULL, '1'),
	(15115, 'Dedi', 'Hermanto', NULL, NULL, NULL, '4769', NULL, '2019-08-21 15:53:23', 4, 'customer', NULL, '2019-08-21 15:53:23', '2019-08-21 15:52:49', '2019-08-21 15:53:23', NULL, NULL, NULL, '1'),
	(15117, 'Rossi', 'Handayani', NULL, NULL, NULL, '6863', NULL, '2019-08-24 07:07:53', 4, 'customer', NULL, '2019-08-24 07:07:53', '2019-08-24 07:07:03', '2019-08-24 07:07:53', NULL, NULL, NULL, '1'),
	(15118, 'Rini', 'Rini', NULL, NULL, NULL, '3316', NULL, '2019-08-24 07:18:30', 4, 'customer', NULL, '2019-08-24 07:18:30', '2019-08-24 07:18:02', '2019-08-24 07:18:30', NULL, NULL, NULL, '1'),
	(15119, 'Robiah', 'Robiah', NULL, NULL, NULL, '6215', NULL, '2019-08-24 07:27:30', 4, 'customer', NULL, '2019-08-24 07:27:30', '2019-08-24 07:24:52', '2019-08-24 07:27:30', NULL, NULL, NULL, '1'),
	(15120, 'Tri', 'Indrayati', NULL, NULL, NULL, '8876', NULL, '2019-09-26 14:23:41', 4, 'customer', NULL, '2019-09-26 14:23:41', '2019-08-24 07:29:45', '2019-09-26 14:23:41', NULL, NULL, NULL, '1'),
	(15121, 'Widyarini', 'Ririn', NULL, NULL, NULL, '7370', NULL, '2019-09-21 09:32:13', 4, 'customer', NULL, '2019-09-21 09:32:13', '2019-08-24 07:31:48', '2019-09-21 09:32:13', NULL, NULL, NULL, '1'),
	(15122, 'Nuraeni', 'Oktavia', NULL, NULL, NULL, '4851', NULL, '2019-08-24 07:35:09', 4, 'customer', NULL, '2019-08-24 07:35:09', '2019-08-24 07:34:34', '2019-08-24 07:39:01', NULL, NULL, NULL, '1'),
	(15123, 'ika', 'darmayanti', NULL, NULL, NULL, '7009', NULL, '2019-08-24 07:35:25', 4, 'customer', NULL, '2019-08-24 07:35:25', '2019-08-24 07:34:51', '2019-08-24 07:35:25', NULL, NULL, NULL, '1'),
	(15124, 'Evi', 'Sutiyani', NULL, NULL, NULL, '5002', NULL, '2019-08-24 07:43:28', 4, 'customer', NULL, '2019-08-24 07:43:28', '2019-08-24 07:42:19', '2019-08-24 07:43:28', NULL, NULL, NULL, '1'),
	(15125, 'Diah ernawati', 'Diah', NULL, NULL, NULL, '6026', NULL, '2019-08-24 07:55:33', 4, 'customer', NULL, '2019-08-24 07:55:33', '2019-08-24 07:45:49', '2019-08-24 07:55:33', NULL, NULL, NULL, '1'),
	(15126, 'Sondang', 'Tobing', NULL, NULL, NULL, '8263', NULL, NULL, 4, 'customer', NULL, NULL, '2019-08-24 07:48:44', '2019-08-24 07:49:13', NULL, NULL, NULL, '1'),
	(15127, 'Nurhayati', 'Nur', NULL, NULL, NULL, '2046', NULL, '2019-08-24 07:50:03', 4, 'customer', NULL, '2019-08-24 07:50:03', '2019-08-24 07:49:34', '2019-08-24 07:50:03', NULL, NULL, NULL, '1'),
	(15128, 'Supriatin', 'Neng', NULL, NULL, NULL, '1670', NULL, '2019-08-25 08:56:26', 4, 'customer', NULL, '2019-08-25 08:56:26', '2019-08-24 07:53:05', '2019-08-25 08:56:26', NULL, NULL, NULL, '1'),
	(15129, 'Dewi', 'Natalia', NULL, NULL, NULL, '1892', NULL, '2019-08-24 07:54:16', 4, 'customer', NULL, '2019-08-24 07:54:16', '2019-08-24 07:53:13', '2019-08-24 07:54:16', NULL, NULL, NULL, '1'),
	(15130, 'Sondang', 'Tobing', NULL, NULL, NULL, '6818', NULL, '2019-08-24 07:55:32', 4, 'customer', NULL, '2019-08-24 07:55:32', '2019-08-24 07:54:51', '2019-08-24 07:55:32', NULL, NULL, NULL, '1'),
	(15131, 'Hesti', 'Widyawati', NULL, NULL, NULL, '7574', NULL, '2019-08-24 08:08:41', 4, 'customer', NULL, '2019-08-24 08:08:41', '2019-08-24 08:04:25', '2019-08-24 08:08:41', NULL, NULL, NULL, '1'),
	(15132, 'Tety', 'Panjaitan', NULL, NULL, NULL, '3750', NULL, '2019-08-24 08:06:16', 4, 'customer', NULL, '2019-08-24 08:06:16', '2019-08-24 08:05:41', '2019-08-24 08:06:16', NULL, NULL, NULL, '1'),
	(15133, 'Ita', 'Tresia', NULL, NULL, NULL, '2708', NULL, '2019-08-24 08:09:19', 4, 'customer', NULL, '2019-08-24 08:09:19', '2019-08-24 08:07:27', '2019-08-24 08:09:19', NULL, NULL, NULL, '1'),
	(15134, 'Aprilia', 'Lia', NULL, NULL, NULL, '3995', NULL, '2019-08-24 08:11:05', 4, 'customer', NULL, '2019-08-24 08:11:05', '2019-08-24 08:10:32', '2019-08-24 08:11:05', NULL, NULL, NULL, '1'),
	(15135, 'Mintarsih', 'Mimin', NULL, NULL, NULL, '6848', NULL, '2019-08-24 08:17:33', 4, 'customer', NULL, '2019-08-24 08:17:33', '2019-08-24 08:11:57', '2019-08-24 08:17:33', NULL, NULL, NULL, '1'),
	(15136, 'Gena putri', 'Ningrum', NULL, NULL, NULL, '5031', NULL, '2019-08-24 08:15:28', 4, 'customer', NULL, '2019-08-24 08:15:28', '2019-08-24 08:13:32', '2019-08-24 08:15:28', NULL, NULL, NULL, '1'),
	(15137, 'Laswan', 'Santoso', NULL, NULL, NULL, '7947', NULL, NULL, 4, 'customer', NULL, NULL, '2019-08-24 08:15:22', '2019-08-24 08:15:42', NULL, NULL, NULL, '1'),
	(15138, 'Juwita', 'Suhartini', NULL, NULL, NULL, '5765', NULL, '2019-08-24 08:18:25', 4, 'customer', NULL, '2019-08-24 08:18:25', '2019-08-24 08:17:32', '2019-08-24 08:18:25', NULL, NULL, NULL, '1'),
	(15139, 'Devi', 'Hasanah', NULL, NULL, NULL, '1619', NULL, '2019-08-24 08:19:44', 4, 'customer', NULL, '2019-08-24 08:19:44', '2019-08-24 08:19:01', '2019-08-24 08:19:44', NULL, NULL, NULL, '1'),
	(15140, 'Irma nurhayati', 'Irma', NULL, NULL, NULL, '3654', NULL, '2019-08-24 08:20:46', 4, 'customer', NULL, '2019-08-24 08:20:46', '2019-08-24 08:19:56', '2019-08-24 08:20:46', NULL, NULL, NULL, '1'),
	(15141, 'kumala sari', 'yuana', NULL, NULL, NULL, '2061', NULL, '2019-09-11 20:59:22', 4, 'customer', NULL, '2019-09-11 20:59:22', '2019-08-24 08:20:31', '2019-09-11 20:59:22', NULL, NULL, NULL, '1'),
	(15142, 'Jum', 'Jumirah', NULL, NULL, NULL, '7546', NULL, '2019-08-24 08:26:50', 4, 'customer', NULL, '2019-08-24 08:26:50', '2019-08-24 08:20:39', '2019-08-24 08:26:50', NULL, NULL, NULL, '1'),
	(15143, 'Trilianti', '.', NULL, NULL, NULL, '4817', NULL, '2019-08-24 08:22:08', 4, 'customer', NULL, '2019-08-24 08:22:08', '2019-08-24 08:21:00', '2019-08-24 08:22:08', NULL, NULL, NULL, '1'),
	(15144, 'Hadid', 'Soamole', NULL, NULL, NULL, '5014', NULL, '2019-08-24 08:23:54', 4, 'customer', NULL, '2019-08-24 08:23:54', '2019-08-24 08:21:56', '2019-08-24 08:23:54', NULL, NULL, NULL, '1'),
	(15145, 'Siti', 'Nuraini', NULL, NULL, NULL, '5966', NULL, '2019-08-24 08:25:25', 4, 'customer', NULL, '2019-08-24 08:25:25', '2019-08-24 08:24:19', '2019-08-24 08:25:25', NULL, NULL, NULL, '1'),
	(15146, 'Nia', 'Fitriyani', NULL, NULL, NULL, '8307', NULL, NULL, 4, 'customer', NULL, NULL, '2019-08-24 08:24:39', '2019-08-24 08:24:39', NULL, NULL, NULL, '1'),
	(15147, 'Agus', 'Tini', NULL, NULL, NULL, '5648', NULL, NULL, 4, 'customer', NULL, NULL, '2019-08-24 08:24:58', '2019-08-24 08:24:58', NULL, NULL, NULL, '1'),
	(15148, 'Nia', 'Fitriyani', NULL, NULL, NULL, '1159', NULL, '2019-08-24 08:27:02', 4, 'customer', NULL, '2019-08-24 08:27:02', '2019-08-24 08:25:37', '2019-08-24 08:27:02', NULL, NULL, NULL, '1'),
	(15149, 'Pardomuan', 'Tambunan', NULL, NULL, NULL, '2005', NULL, '2019-08-24 08:27:44', 4, 'customer', NULL, '2019-08-24 08:27:44', '2019-08-24 08:26:33', '2019-08-24 08:27:44', NULL, NULL, NULL, '1'),
	(15150, 'Resti', 'Wahyuningsih', NULL, NULL, NULL, '1886', NULL, '2019-08-24 08:28:32', 4, 'customer', NULL, '2019-08-24 08:28:32', '2019-08-24 08:28:02', '2019-08-24 08:28:32', NULL, NULL, NULL, '1'),
	(15151, 'Aisha', 'Salsabila', NULL, NULL, NULL, '8657', NULL, NULL, 4, 'customer', NULL, NULL, '2019-08-24 08:28:03', '2019-08-24 08:28:24', NULL, NULL, NULL, '1'),
	(15152, 'debby', 'debora', NULL, NULL, NULL, '7299', NULL, NULL, 4, 'customer', NULL, NULL, '2019-08-24 08:29:13', '2019-08-24 08:29:13', NULL, NULL, NULL, '1'),
	(15153, 'Aisha', 'Salsabila', NULL, NULL, NULL, '7126', NULL, '2019-08-24 08:30:15', 4, 'customer', NULL, '2019-08-24 08:30:15', '2019-08-24 08:29:51', '2019-08-24 08:30:15', NULL, NULL, NULL, '1'),
	(15154, 'debby', 'debora', NULL, NULL, NULL, '1961', NULL, '2019-08-24 08:31:27', 4, 'customer', NULL, '2019-08-24 08:31:27', '2019-08-24 08:30:07', '2019-08-24 08:31:27', NULL, NULL, NULL, '1'),
	(15155, 'Rosnadewi', 'Simamora', NULL, NULL, NULL, '5204', NULL, NULL, 4, 'customer', NULL, NULL, '2019-08-24 08:30:59', '2019-08-24 08:31:17', NULL, NULL, NULL, '1'),
	(15156, 'Eka yuliastuti', 'yulias tuti', NULL, NULL, NULL, '3569', NULL, '2019-08-24 08:36:23', 4, 'customer', NULL, '2019-08-24 08:36:23', '2019-08-24 08:33:39', '2019-08-24 08:36:23', NULL, NULL, NULL, '1'),
	(15157, 'iyan', 'iyan', NULL, NULL, NULL, '1429', NULL, '2019-08-24 08:34:58', 4, 'customer', NULL, '2019-08-24 08:34:58', '2019-08-24 08:33:45', '2019-08-24 08:34:58', NULL, NULL, NULL, '1'),
	(15158, 'Agus', 'Tini', NULL, NULL, NULL, '6022', NULL, '2019-08-24 08:34:32', 4, 'customer', NULL, '2019-08-24 08:34:32', '2019-08-24 08:33:49', '2019-08-24 08:34:32', NULL, NULL, NULL, '1'),
	(15159, 'Fajar', 'Kristuanto', NULL, NULL, NULL, '8027', NULL, '2019-08-24 08:38:29', 4, 'customer', NULL, '2019-08-24 08:38:29', '2019-08-24 08:36:37', '2019-08-24 08:38:29', NULL, NULL, NULL, '1'),
	(15160, 'Edi', 'Edi', NULL, NULL, NULL, '5196', NULL, '2019-08-24 08:41:37', 4, 'customer', NULL, '2019-08-24 08:41:37', '2019-08-24 08:41:03', '2019-08-24 08:41:37', NULL, NULL, NULL, '1'),
	(15161, 'Kurnia', 'Wati', NULL, NULL, NULL, '3135', NULL, '2019-08-24 08:43:33', 4, 'customer', NULL, '2019-08-24 08:43:33', '2019-08-24 08:42:53', '2019-08-24 08:43:33', NULL, NULL, NULL, '1'),
	(15162, 'Rustiyanty', '-', NULL, NULL, NULL, '8121', NULL, '2019-08-24 08:45:33', 4, 'customer', NULL, '2019-08-24 08:45:33', '2019-08-24 08:45:04', '2019-08-24 08:45:33', NULL, NULL, NULL, '1'),
	(15163, 'Haryati', 'Ilhami', NULL, NULL, NULL, '1279', NULL, '2019-08-24 08:46:45', 4, 'customer', NULL, '2019-08-24 08:46:45', '2019-08-24 08:46:14', '2019-08-24 13:41:37', NULL, NULL, NULL, '1'),
	(15164, 'Yuli', 'Kurniawan', NULL, NULL, NULL, '7834', NULL, '2019-08-24 08:50:22', 4, 'customer', NULL, '2019-08-24 08:50:22', '2019-08-24 08:46:27', '2019-08-24 08:50:22', NULL, NULL, NULL, '1'),
	(15165, 'Agustini', 'Nong', NULL, NULL, NULL, '7380', NULL, '2019-08-24 08:47:32', 4, 'customer', NULL, '2019-08-24 08:47:32', '2019-08-24 08:46:59', '2019-08-24 08:47:32', NULL, NULL, NULL, '1'),
	(15166, 'Lusi', 'Ana', NULL, NULL, NULL, '5379', NULL, '2019-08-24 08:47:44', 4, 'customer', NULL, '2019-08-24 08:47:44', '2019-08-24 08:47:07', '2019-08-24 08:47:44', NULL, NULL, NULL, '1'),
	(15167, 'Natalia', 'Angriany', NULL, NULL, NULL, '7311', NULL, '2019-08-24 08:48:16', 4, 'customer', NULL, '2019-08-24 08:48:16', '2019-08-24 08:47:46', '2019-08-24 08:48:16', NULL, NULL, NULL, '1'),
	(15168, 'Juliyah', 'Fitriasih', NULL, NULL, NULL, '5660', NULL, '2019-08-24 08:49:44', 4, 'customer', NULL, '2019-08-24 08:49:44', '2019-08-24 08:48:53', '2019-08-24 08:49:44', NULL, NULL, NULL, '1'),
	(15169, 'Faevi', 'Bb', NULL, NULL, NULL, '6189', NULL, '2019-08-24 09:00:32', 4, 'customer', NULL, '2019-08-24 09:00:32', '2019-08-24 08:53:46', '2019-08-24 09:00:32', NULL, NULL, NULL, '1'),
	(15170, 'Titi wiranti', ',', NULL, NULL, NULL, '2864', NULL, '2019-09-06 10:39:11', 4, 'customer', NULL, '2019-09-06 10:39:11', '2019-08-24 08:53:49', '2019-09-06 10:39:11', NULL, NULL, NULL, '1'),
	(15171, 'Dika', 'dwi andhika', NULL, NULL, NULL, '1448', NULL, '2019-08-24 08:57:17', 4, 'customer', NULL, '2019-08-24 08:57:17', '2019-08-24 08:56:39', '2019-08-24 08:57:17', NULL, NULL, NULL, '1'),
	(15172, 'Alex', 'Edward', NULL, NULL, NULL, '4389', NULL, '2019-08-24 08:57:46', 4, 'customer', NULL, '2019-08-24 08:57:46', '2019-08-24 08:56:58', '2019-08-24 08:57:46', NULL, NULL, NULL, '1'),
	(15174, 'Sri', 'Slamet', NULL, NULL, NULL, '8846', NULL, '2019-08-24 08:59:21', 4, 'customer', NULL, '2019-08-24 08:59:21', '2019-08-24 08:57:34', '2019-08-24 08:59:21', NULL, NULL, NULL, '1'),
	(15175, 'Siti', 'Jariyah', NULL, NULL, NULL, '6245', NULL, '2019-08-25 08:10:00', 4, 'customer', NULL, '2019-08-25 08:10:00', '2019-08-24 09:01:54', '2019-08-25 08:10:00', NULL, NULL, NULL, '1'),
	(15176, 'nauli', 'simanjuntak', NULL, NULL, NULL, '5643', NULL, '2019-08-24 09:11:46', 4, 'customer', NULL, '2019-08-24 09:11:46', '2019-08-24 09:05:04', '2019-08-24 09:11:46', NULL, NULL, NULL, '1'),
	(15177, 'Yulinda', 'Linda', NULL, NULL, NULL, '8498', NULL, '2019-08-24 09:13:16', 4, 'customer', NULL, '2019-08-24 09:13:16', '2019-08-24 09:12:22', '2019-08-24 09:13:16', NULL, NULL, NULL, '1'),
	(15178, 'Nur', 'Bani', NULL, NULL, NULL, '2744', NULL, '2019-08-24 09:14:14', 4, 'customer', NULL, '2019-08-24 09:14:14', '2019-08-24 09:13:56', '2019-08-24 09:14:14', NULL, NULL, NULL, '1'),
	(15179, 'Purwati', '-', NULL, NULL, NULL, '6838', NULL, '2019-08-24 09:16:05', 4, 'customer', NULL, '2019-08-24 09:16:05', '2019-08-24 09:15:23', '2019-08-24 09:16:05', NULL, NULL, NULL, '1'),
	(15180, 'Tutut', 'Handayani', NULL, NULL, NULL, '7789', NULL, '2019-08-24 09:16:31', 4, 'customer', NULL, '2019-08-24 09:16:31', '2019-08-24 09:16:06', '2019-08-24 09:16:31', NULL, NULL, NULL, '1'),
	(15181, 'nova aryanti', 'nova', NULL, NULL, NULL, '8309', NULL, '2019-08-24 09:18:17', 4, 'customer', NULL, '2019-08-24 09:18:17', '2019-08-24 09:16:50', '2019-09-12 21:05:18', NULL, NULL, NULL, '1'),
	(15182, 'Cucu', '.', NULL, NULL, NULL, '6270', NULL, '2019-08-24 09:18:40', 4, 'customer', NULL, '2019-08-24 09:18:40', '2019-08-24 09:17:08', '2019-08-24 09:18:40', NULL, NULL, NULL, '1'),
	(15183, 'Nur', 'Hayati', NULL, NULL, NULL, '3689', NULL, '2019-08-24 09:18:13', 4, 'customer', NULL, '2019-08-24 09:18:13', '2019-08-24 09:17:11', '2019-08-24 09:18:13', NULL, NULL, NULL, '1'),
	(15184, 'Ari', 'Tutiningsih', NULL, NULL, NULL, '6103', NULL, '2019-08-24 09:18:04', 4, 'customer', NULL, '2019-08-24 09:18:04', '2019-08-24 09:17:44', '2019-08-24 09:18:04', NULL, NULL, NULL, '1'),
	(15185, 'Tini', 'Tini', NULL, NULL, NULL, '4717', NULL, '2019-08-24 09:21:59', 4, 'customer', NULL, '2019-08-24 09:21:59', '2019-08-24 09:21:12', '2019-08-24 09:21:59', NULL, NULL, NULL, '1'),
	(15186, 'Marsiah', 'M', NULL, NULL, NULL, '6559', NULL, '2019-08-24 09:23:11', 4, 'customer', NULL, '2019-08-24 09:23:11', '2019-08-24 09:22:36', '2019-08-24 09:23:11', NULL, NULL, NULL, '1'),
	(15187, 'Rika', 'Kurdiana', NULL, NULL, NULL, '3369', NULL, '2019-08-24 09:25:43', 4, 'customer', NULL, '2019-08-24 09:25:43', '2019-08-24 09:25:16', '2019-08-24 09:25:43', NULL, NULL, NULL, '1'),
	(15188, 'Rince', 'Octavianus', NULL, NULL, NULL, '4391', NULL, '2019-08-24 09:27:58', 4, 'customer', NULL, '2019-08-24 09:27:58', '2019-08-24 09:27:21', '2019-08-24 09:27:58', NULL, NULL, NULL, '1'),
	(15189, 'Heru', 'Hermawan', NULL, NULL, NULL, '8472', NULL, '2019-08-24 09:38:35', 4, 'customer', NULL, '2019-08-24 09:38:35', '2019-08-24 09:29:06', '2019-08-24 09:38:35', NULL, NULL, NULL, '1'),
	(15190, 'Marcelino', 'Alvianto', NULL, NULL, NULL, '7987', NULL, NULL, 4, 'customer', NULL, NULL, '2019-08-24 09:30:41', '2019-08-24 09:30:41', NULL, NULL, NULL, '1'),
	(15191, 'Marcelino', 'Alvianto', NULL, NULL, NULL, '8702', NULL, '2019-08-24 09:31:52', 4, 'customer', NULL, '2019-08-24 09:31:52', '2019-08-24 09:31:36', '2019-08-24 09:31:52', NULL, NULL, NULL, '1'),
	(15192, 'Dhita', 'Patricia', NULL, NULL, NULL, '2266', NULL, '2019-08-24 09:36:25', 4, 'customer', NULL, '2019-08-24 09:36:25', '2019-08-24 09:35:48', '2019-08-24 09:36:25', NULL, NULL, NULL, '1'),
	(15193, 'Yuyun', 'Widiyanti', NULL, NULL, NULL, '1352', NULL, '2019-08-24 09:37:04', 4, 'customer', NULL, '2019-08-24 09:37:04', '2019-08-24 09:35:57', '2019-08-24 09:37:04', NULL, NULL, NULL, '1'),
	(15194, 'Toni', 'Simamora', NULL, NULL, NULL, '6417', NULL, '2019-08-24 09:39:17', 4, 'customer', NULL, '2019-08-24 09:39:17', '2019-08-24 09:36:27', '2019-08-24 09:39:17', NULL, NULL, NULL, '1'),
	(15195, 'Mulyadi', 'Mulyadi', NULL, NULL, NULL, '8760', NULL, '2019-08-24 09:40:14', 4, 'customer', NULL, '2019-08-24 09:40:14', '2019-08-24 09:39:11', '2019-08-24 09:40:14', NULL, NULL, NULL, '1'),
	(15196, 'ayu.rizkiyah', 'ayu', NULL, NULL, NULL, '5825', NULL, '2019-08-25 10:45:10', 4, 'customer', NULL, '2019-08-25 10:45:10', '2019-08-24 09:39:51', '2019-08-25 10:45:10', NULL, NULL, NULL, '1'),
	(15197, 'Alika', 'Rizky', NULL, NULL, NULL, '7619', NULL, '2019-08-24 09:45:37', 4, 'customer', NULL, '2019-08-24 09:45:37', '2019-08-24 09:44:14', '2019-08-24 09:45:37', NULL, NULL, NULL, '1'),
	(15198, 'Santi', 'Komalasari', NULL, NULL, NULL, '5681', NULL, '2019-09-12 17:33:47', 4, 'customer', NULL, '2019-09-12 17:33:47', '2019-08-24 09:47:10', '2019-09-12 17:33:47', NULL, NULL, NULL, '1'),
	(15199, 'Haji', 'Tatu', NULL, NULL, NULL, '8713', NULL, '2019-08-24 09:49:40', 4, 'customer', NULL, '2019-08-24 09:49:40', '2019-08-24 09:48:54', '2019-08-24 09:49:40', NULL, NULL, NULL, '1'),
	(15200, 'Rita', 'Ria ningsih', NULL, NULL, NULL, '3975', NULL, '2019-08-24 09:51:06', 4, 'customer', NULL, '2019-08-24 09:51:06', '2019-08-24 09:50:20', '2019-08-25 21:58:04', NULL, NULL, NULL, '1'),
	(15201, 'Fenny', 'Fenny', NULL, NULL, NULL, '8160', NULL, NULL, 4, 'customer', NULL, NULL, '2019-08-24 09:50:58', '2019-08-24 09:51:59', NULL, NULL, NULL, '1'),
	(15202, 'Reni', 'Purnamasari', NULL, NULL, NULL, '2532', NULL, '2019-08-24 09:53:57', 4, 'customer', NULL, '2019-08-24 09:53:57', '2019-08-24 09:52:23', '2019-08-24 09:53:57', NULL, NULL, NULL, '1'),
	(15203, 'Fenny', 'Fenny', NULL, NULL, NULL, '7416', NULL, '2019-08-24 09:53:21', 4, 'customer', NULL, '2019-08-24 09:53:21', '2019-08-24 09:53:02', '2019-08-24 09:53:21', NULL, NULL, NULL, '1'),
	(15204, 'Michiella', 'Surya', NULL, NULL, NULL, '6652', NULL, '2019-08-24 12:54:47', 4, 'customer', NULL, '2019-08-24 12:54:47', '2019-08-24 12:53:58', '2019-08-24 12:54:47', NULL, NULL, NULL, '1'),
	(15205, 'Ambar', 'Kumalawati', NULL, NULL, NULL, NULL, NULL, NULL, 3, 'agent', NULL, NULL, '2019-08-24 15:23:24', '2019-08-24 15:23:24', NULL, NULL, NULL, '0'),
	(15206, 'Aldi', 'Setiawan', NULL, NULL, NULL, '7784', NULL, '2019-08-25 00:27:42', 4, 'customer', NULL, '2019-08-25 00:27:42', '2019-08-25 00:24:58', '2019-08-25 00:27:42', NULL, NULL, NULL, '1'),
	(15207, 'Nonalydiia', 'Lydia', NULL, NULL, NULL, '7151', NULL, '2019-08-25 06:19:56', 4, 'customer', NULL, '2019-08-25 06:19:56', '2019-08-25 06:19:29', '2019-08-25 06:19:56', NULL, NULL, NULL, '1'),
	(15208, 'Murohji', 'zahwa', NULL, NULL, NULL, '6740', NULL, '2019-08-25 06:30:37', 4, 'customer', NULL, '2019-08-25 06:30:37', '2019-08-25 06:29:09', '2019-08-25 06:30:37', NULL, NULL, NULL, '1'),
	(15209, 'nonalydiia', 'lydiia', NULL, NULL, NULL, '7856', NULL, '2019-08-25 06:44:59', 4, 'customer', NULL, '2019-08-25 06:44:59', '2019-08-25 06:32:14', '2019-08-25 07:11:22', NULL, NULL, NULL, '1'),
	(15210, 'Mumung', 'Mumung', NULL, NULL, NULL, '8930', NULL, '2019-08-25 06:36:33', 4, 'customer', NULL, '2019-08-25 06:36:33', '2019-08-25 06:36:03', '2019-08-25 06:36:33', NULL, NULL, NULL, '1'),
	(15211, 'NONA', 'Lydia', NULL, NULL, NULL, '8056', NULL, NULL, 4, 'customer', NULL, NULL, '2019-08-25 06:44:32', '2019-08-25 06:44:32', NULL, NULL, NULL, '1'),
	(15212, 'Suryani', 'Yanto', NULL, NULL, NULL, '2066', NULL, '2019-08-25 06:50:10', 4, 'customer', NULL, '2019-08-25 06:50:10', '2019-08-25 06:49:24', '2019-08-25 06:50:10', NULL, NULL, NULL, '1'),
	(15213, 'Amelia lestari', 'Amel', NULL, NULL, NULL, '5358', NULL, '2019-08-25 06:53:54', 4, 'customer', NULL, '2019-08-25 06:53:54', '2019-08-25 06:49:36', '2019-08-25 06:53:54', NULL, NULL, NULL, '1'),
	(15214, 'Naomi', 'Amelia', NULL, NULL, NULL, '8390', NULL, '2019-08-25 06:52:12', 4, 'customer', NULL, '2019-08-25 06:52:12', '2019-08-25 06:51:00', '2019-08-25 06:52:12', NULL, NULL, NULL, '1'),
	(15215, 'Salsa', '-', NULL, NULL, NULL, '2197', NULL, NULL, 4, 'customer', NULL, NULL, '2019-08-25 06:56:42', '2019-08-25 06:56:42', NULL, NULL, NULL, '1'),
	(15216, 'Salsa', 'Salsa', NULL, NULL, NULL, '3210', NULL, '2019-08-25 06:59:01', 4, 'customer', NULL, '2019-08-25 06:59:01', '2019-08-25 06:58:25', '2019-08-25 06:59:01', NULL, NULL, NULL, '1'),
	(15217, 'Sri sutarningsih', 'Sutarningsih', NULL, NULL, NULL, '8114', NULL, '2019-08-25 07:01:51', 4, 'customer', NULL, '2019-08-25 07:01:51', '2019-08-25 07:01:16', '2019-08-25 07:01:51', NULL, NULL, NULL, '1'),
	(15218, 'Indri', 'Yani', NULL, NULL, NULL, '3535', NULL, '2019-08-25 07:07:16', 4, 'customer', NULL, '2019-08-25 07:07:16', '2019-08-25 07:06:34', '2019-08-25 07:07:16', NULL, NULL, NULL, '1'),
	(15219, 'Lina', 'Angela', NULL, NULL, NULL, '2538', NULL, '2019-09-05 13:15:39', 4, 'customer', NULL, '2019-09-05 13:15:39', '2019-08-25 07:07:04', '2019-09-05 13:15:39', NULL, NULL, NULL, '1'),
	(15220, 'Ferry', 'Chay', NULL, NULL, NULL, '2883', NULL, '2019-08-25 07:08:28', 4, 'customer', NULL, '2019-08-25 07:08:28', '2019-08-25 07:08:05', '2019-08-25 07:08:28', NULL, NULL, NULL, '1'),
	(15221, 'Tanzila', 'Azila', NULL, NULL, NULL, '4807', NULL, NULL, 4, 'customer', NULL, NULL, '2019-08-25 07:09:33', '2019-08-25 07:11:06', NULL, NULL, NULL, '1'),
	(15222, 'Irma', 'Yanti', NULL, NULL, NULL, '5250', NULL, '2019-09-04 12:58:48', 4, 'customer', NULL, '2019-09-04 12:58:48', '2019-08-25 07:12:25', '2019-09-04 12:58:48', NULL, NULL, NULL, '1'),
	(15223, 'Sari', 'Sari', NULL, NULL, NULL, '8338', NULL, '2019-08-25 07:14:28', 4, 'customer', NULL, '2019-08-25 07:14:28', '2019-08-25 07:14:00', '2019-08-25 07:14:28', NULL, NULL, NULL, '1'),
	(15224, 'Angel', 'Lina', NULL, NULL, NULL, '6831', NULL, '2019-08-25 07:18:45', 4, 'customer', NULL, '2019-08-25 07:18:45', '2019-08-25 07:18:10', '2019-08-25 07:18:45', NULL, NULL, NULL, '1'),
	(15225, 'Partini', 'Partini', NULL, NULL, NULL, '8443', NULL, '2019-09-22 06:34:03', 4, 'customer', NULL, '2019-09-22 06:34:03', '2019-08-25 07:30:25', '2019-09-22 06:34:03', NULL, NULL, NULL, '1'),
	(15226, 'Moechamad', 'Oemar sidiq', NULL, NULL, NULL, '7311', NULL, '2019-08-25 07:32:15', 4, 'customer', NULL, '2019-08-25 07:32:15', '2019-08-25 07:31:48', '2019-08-25 07:32:15', NULL, NULL, NULL, '1'),
	(15227, 'Murwati', 'Imong', NULL, NULL, NULL, '7837', NULL, '2019-08-25 07:39:58', 4, 'customer', NULL, '2019-08-25 07:39:58', '2019-08-25 07:34:53', '2019-08-25 07:39:58', NULL, NULL, NULL, '1'),
	(15228, 'Bayu', 'Setyawan', NULL, NULL, NULL, '5638', NULL, '2019-08-25 07:39:42', 4, 'customer', NULL, '2019-08-25 07:39:42', '2019-08-25 07:39:09', '2019-08-25 07:39:42', NULL, NULL, NULL, '1'),
	(15229, 'Johari ari', 'Ari', NULL, NULL, NULL, '8862', NULL, '2019-08-25 07:41:30', 4, 'customer', NULL, '2019-08-25 07:41:30', '2019-08-25 07:40:08', '2019-08-25 07:41:30', NULL, NULL, NULL, '1'),
	(15230, 'ita', 'juwita', NULL, NULL, NULL, '8289', NULL, '2019-08-25 07:41:27', 4, 'customer', NULL, '2019-08-25 07:41:27', '2019-08-25 07:40:35', '2019-08-25 07:41:27', NULL, NULL, NULL, '1'),
	(15231, 'Ramini', 'Ramini', NULL, NULL, NULL, '6020', NULL, '2019-08-25 07:50:04', 4, 'customer', NULL, '2019-08-25 07:50:04', '2019-08-25 07:49:32', '2019-08-25 07:50:04', NULL, NULL, NULL, '1'),
	(15232, 'Chay', 'Adi', NULL, NULL, NULL, '6364', NULL, '2019-08-25 07:51:18', 4, 'customer', NULL, '2019-08-25 07:51:18', '2019-08-25 07:50:49', '2019-08-25 07:51:18', NULL, NULL, NULL, '1'),
	(15233, 'Ratna', 'Setiawati', NULL, NULL, NULL, '7012', NULL, '2019-08-25 07:58:49', 4, 'customer', NULL, '2019-08-25 07:58:49', '2019-08-25 07:54:25', '2019-08-25 07:58:49', NULL, NULL, NULL, '1'),
	(15234, 'Nur', 'Nur', NULL, NULL, NULL, '3496', NULL, '2019-08-25 07:56:00', 4, 'customer', NULL, '2019-08-25 07:56:00', '2019-08-25 07:54:53', '2019-08-25 07:56:00', NULL, NULL, NULL, '1'),
	(15235, 'Feby', 'Kemangi', NULL, NULL, NULL, '3649', NULL, '2019-08-25 08:30:58', 4, 'customer', NULL, '2019-08-25 08:30:58', '2019-08-25 08:11:56', '2019-08-25 08:30:58', NULL, NULL, NULL, '1'),
	(15236, 'Chayadi', 'Ferry', NULL, NULL, NULL, '7067', NULL, '2019-08-25 08:13:30', 4, 'customer', NULL, '2019-08-25 08:13:30', '2019-08-25 08:13:11', '2019-08-25 08:13:30', NULL, NULL, NULL, '1'),
	(15237, 'Ferchay', 'Adi', NULL, NULL, NULL, '3425', NULL, '2019-08-25 08:17:56', 4, 'customer', NULL, '2019-08-25 08:17:56', '2019-08-25 08:16:12', '2019-08-25 08:17:56', NULL, NULL, NULL, '1'),
	(15238, 'fani', 'lestari', NULL, NULL, NULL, '2725', NULL, '2019-08-25 08:20:22', 4, 'customer', NULL, '2019-08-25 08:20:22', '2019-08-25 08:19:54', '2019-08-25 08:20:22', NULL, NULL, NULL, '1'),
	(15239, 'Titin', 'Sulastri', NULL, NULL, NULL, '8149', NULL, '2019-08-25 08:21:00', 4, 'customer', NULL, '2019-08-25 08:21:00', '2019-08-25 08:20:28', '2019-08-25 08:21:00', NULL, NULL, NULL, '1'),
	(15240, 'Sarni', 'Sarni', NULL, NULL, NULL, '1452', NULL, '2019-08-25 08:29:31', 4, 'customer', NULL, '2019-08-25 08:29:31', '2019-08-25 08:27:41', '2019-08-25 08:29:31', NULL, NULL, NULL, '1'),
	(15241, 'heni', 'heni', NULL, NULL, NULL, '2701', NULL, '2019-08-25 08:37:09', 4, 'customer', NULL, '2019-08-25 08:37:09', '2019-08-25 08:36:43', '2019-08-25 08:37:09', NULL, NULL, NULL, '1'),
	(15242, 'Naryo', 'Naryo', NULL, NULL, NULL, '6970', NULL, '2019-08-25 08:40:42', 4, 'customer', NULL, '2019-08-25 08:40:42', '2019-08-25 08:39:56', '2019-08-25 08:40:42', NULL, NULL, NULL, '1'),
	(15243, 'Ratma', 'Anah', NULL, NULL, NULL, '6606', NULL, '2019-08-25 08:46:47', 4, 'customer', NULL, '2019-08-25 08:46:47', '2019-08-25 08:43:39', '2019-08-25 08:46:47', NULL, NULL, NULL, '1'),
	(15244, 'Budi', 'Setiawati', NULL, NULL, NULL, '7988', NULL, '2019-09-13 17:50:20', 4, 'customer', NULL, '2019-09-13 17:50:20', '2019-08-25 08:46:35', '2019-09-13 17:50:20', NULL, NULL, NULL, '1'),
	(15245, 'Sunarsi', 'Sunarsi', NULL, NULL, NULL, '7507', NULL, '2019-08-25 08:53:59', 4, 'customer', NULL, '2019-08-25 08:53:59', '2019-08-25 08:52:28', '2019-08-25 08:53:59', NULL, NULL, NULL, '1'),
	(15246, 'Yati', 'Suci', NULL, NULL, NULL, '3065', NULL, NULL, 4, 'customer', NULL, NULL, '2019-08-25 09:02:34', '2019-08-25 09:02:48', NULL, NULL, NULL, '1'),
	(15247, 'Suci', 'Yati', NULL, NULL, NULL, '5525', NULL, '2019-08-25 09:04:26', 4, 'customer', NULL, '2019-08-25 09:04:26', '2019-08-25 09:04:02', '2019-08-25 09:04:26', NULL, NULL, NULL, '1'),
	(15248, 'Rifda', 'Desmandita', NULL, NULL, NULL, '7685', NULL, '2019-08-25 09:09:34', 4, 'customer', NULL, '2019-08-25 09:09:34', '2019-08-25 09:09:12', '2019-08-25 09:09:34', NULL, NULL, NULL, '1'),
	(15249, 'Nia', 'Kurnia', NULL, NULL, NULL, '8438', NULL, '2019-08-25 09:10:35', 4, 'customer', NULL, '2019-08-25 09:10:35', '2019-08-25 09:10:05', '2019-08-25 09:10:35', NULL, NULL, NULL, '1'),
	(15250, 'Suko', 'Wiharsih', NULL, NULL, NULL, '4329', NULL, '2019-08-25 09:15:36', 4, 'customer', NULL, '2019-08-25 09:15:36', '2019-08-25 09:14:54', '2019-08-25 09:15:36', NULL, NULL, NULL, '1'),
	(15251, 'Bilal', 'Udin', NULL, NULL, NULL, '8766', NULL, '2019-08-25 09:22:11', 4, 'customer', NULL, '2019-08-25 09:22:11', '2019-08-25 09:21:40', '2019-08-25 09:22:11', NULL, NULL, NULL, '1'),
	(15252, 'rahma', 'wati', NULL, NULL, NULL, '8132', NULL, NULL, 4, 'customer', NULL, NULL, '2019-08-25 09:22:07', '2019-08-25 09:22:07', NULL, NULL, NULL, '1'),
	(15253, 'rahmawati', 'rahmawati', NULL, NULL, NULL, '6826', NULL, '2019-08-25 09:27:02', 4, 'customer', NULL, '2019-08-25 09:27:02', '2019-08-25 09:25:58', '2019-08-25 09:27:02', NULL, NULL, NULL, '1'),
	(15254, 'Parno', 'Parno', NULL, NULL, NULL, '2016', NULL, '2019-08-25 09:31:11', 4, 'customer', NULL, '2019-08-25 09:31:11', '2019-08-25 09:29:50', '2019-08-25 09:31:11', NULL, NULL, NULL, '1'),
	(15255, 'Dari utami', 'Tami', NULL, NULL, NULL, '8461', NULL, '2019-08-25 09:31:09', 4, 'customer', NULL, '2019-08-25 09:31:09', '2019-08-25 09:30:26', '2019-08-25 09:31:09', NULL, NULL, NULL, '1'),
	(15256, 'ersa', 'melani', NULL, NULL, NULL, '8948', NULL, '2019-08-25 09:34:37', 4, 'customer', NULL, '2019-08-25 09:34:37', '2019-08-25 09:33:22', '2019-08-25 09:34:37', NULL, NULL, NULL, '1'),
	(15257, 'Ho marina', 'Ho marina', NULL, NULL, NULL, '8804', NULL, '2019-08-25 09:39:22', 4, 'customer', NULL, '2019-08-25 09:39:22', '2019-08-25 09:37:51', '2019-08-25 09:39:22', NULL, NULL, NULL, '1'),
	(15258, 'Titin', 'Titin', NULL, NULL, NULL, '6809', NULL, '2019-08-25 09:39:59', 4, 'customer', NULL, '2019-08-25 09:39:59', '2019-08-25 09:39:28', '2019-09-11 12:27:45', NULL, NULL, NULL, '1'),
	(15259, 'Bella', 'Anastasia', NULL, NULL, NULL, '7028', NULL, '2019-08-25 09:42:25', 4, 'customer', NULL, '2019-08-25 09:42:25', '2019-08-25 09:40:42', '2019-08-25 09:42:25', NULL, NULL, NULL, '1'),
	(15260, 'Endang', 'Supriyadi', NULL, NULL, NULL, '8903', NULL, '2019-08-25 09:43:04', 4, 'customer', NULL, '2019-08-25 09:43:04', '2019-08-25 09:42:32', '2019-08-25 09:43:04', NULL, NULL, NULL, '1'),
	(15261, 'Dwi', 'Pijiatin', NULL, NULL, NULL, '2879', NULL, '2019-08-25 09:43:46', 4, 'customer', NULL, '2019-08-25 09:43:46', '2019-08-25 09:42:36', '2019-08-25 09:43:46', NULL, NULL, NULL, '1'),
	(15262, 'Saolin', 'Olin', NULL, NULL, NULL, '5044', NULL, '2019-08-25 09:49:37', 4, 'customer', NULL, '2019-08-25 09:49:37', '2019-08-25 09:49:13', '2019-08-25 09:49:37', NULL, NULL, NULL, '1'),
	(15263, 'Idris', 'Abdul', NULL, NULL, NULL, '6376', NULL, '2019-08-25 09:50:51', 4, 'customer', NULL, '2019-08-25 09:50:51', '2019-08-25 09:50:22', '2019-08-25 09:50:51', NULL, NULL, NULL, '1'),
	(15264, 'Neni', 'Junaeni', NULL, NULL, NULL, '5008', NULL, '2019-09-11 11:33:19', 4, 'customer', NULL, '2019-09-11 11:33:19', '2019-08-25 09:53:46', '2019-09-11 11:33:19', NULL, NULL, NULL, '1'),
	(15265, 'Gayuh', 'Sasmi', NULL, NULL, NULL, '7455', NULL, '2019-08-25 09:57:43', 4, 'customer', NULL, '2019-08-25 09:57:43', '2019-08-25 09:56:59', '2019-08-25 09:57:43', NULL, NULL, NULL, '1'),
	(15266, 'Nurul', 'Uhnu', NULL, NULL, NULL, '4916', NULL, '2019-08-25 10:04:32', 4, 'customer', NULL, '2019-08-25 10:04:32', '2019-08-25 10:02:25', '2019-08-25 10:04:32', NULL, NULL, NULL, '1'),
	(15267, 'ananda', 'nur', NULL, NULL, NULL, '1045', NULL, '2019-08-25 10:11:00', 4, 'customer', NULL, '2019-08-25 10:11:00', '2019-08-25 10:10:36', '2019-08-25 10:11:00', NULL, NULL, NULL, '1'),
	(15268, 'Eva', 'Novalin', NULL, NULL, NULL, '5772', NULL, '2019-08-25 10:12:49', 4, 'customer', NULL, '2019-08-25 10:12:49', '2019-08-25 10:12:17', '2019-08-25 10:12:49', NULL, NULL, NULL, '1'),
	(15269, 'Febri', 'Yani', NULL, NULL, NULL, '6357', NULL, '2019-08-25 10:17:39', 4, 'customer', NULL, '2019-08-25 10:17:39', '2019-08-25 10:16:55', '2019-08-25 10:17:39', NULL, NULL, NULL, '1'),
	(15270, 'Dedeh', 'Aisyah', NULL, NULL, NULL, '2066', NULL, '2019-09-11 12:11:26', 4, 'customer', NULL, '2019-09-11 12:11:26', '2019-08-25 10:21:06', '2019-09-11 12:11:26', NULL, NULL, NULL, '1'),
	(15271, 'Imam', 'Parikesit', NULL, NULL, NULL, '8103', NULL, '2019-08-25 10:52:05', 4, 'customer', NULL, '2019-08-25 10:52:05', '2019-08-25 10:36:32', '2019-08-25 10:52:05', NULL, NULL, NULL, '1'),
	(15272, 'Nur', 'Aida', NULL, NULL, NULL, '6359', NULL, '2019-08-25 18:22:19', 4, 'customer', NULL, '2019-08-25 18:22:19', '2019-08-25 18:21:37', '2019-08-25 18:22:19', NULL, NULL, NULL, '1'),
	(15273, 'Kokom', 'Komariyah', NULL, NULL, NULL, '3346', NULL, '2019-08-25 19:53:33', 4, 'customer', NULL, '2019-08-25 19:53:33', '2019-08-25 19:52:53', '2019-08-25 19:53:33', NULL, NULL, NULL, '1'),
	(15274, 'Febriyanthi', 'Sinukaban', NULL, NULL, NULL, '8330', NULL, '2019-09-27 14:42:38', 3, 'agent', NULL, '2019-09-27 14:42:38', '2019-08-27 13:35:38', '2019-09-27 14:42:38', NULL, NULL, NULL, '1'),
	(15275, 'Angelina', 'Lina', NULL, NULL, NULL, '2474', NULL, '2019-09-24 19:03:10', 3, 'agent', NULL, '2019-09-24 19:03:10', '2019-08-28 17:18:35', '2019-09-24 19:03:10', NULL, NULL, NULL, '1'),
	(15276, 'Tfc', 'Yuana', NULL, NULL, NULL, '4920', NULL, '2019-09-19 11:15:53', 4, 'customer', NULL, '2019-09-19 11:15:53', '2019-08-28 17:29:23', '2019-09-19 11:15:53', NULL, NULL, NULL, '1'),
	(15277, 'Shiti', 'Hayati', NULL, NULL, NULL, '1383', NULL, '2019-08-28 19:04:11', 4, 'customer', NULL, '2019-08-28 19:04:11', '2019-08-28 19:03:36', '2019-08-28 19:04:11', NULL, NULL, NULL, '1'),
	(15278, 'Sri', 'Yantii', NULL, NULL, NULL, '1408', NULL, '2019-08-31 07:10:35', 4, 'customer', NULL, '2019-08-31 07:10:35', '2019-08-29 11:41:38', '2019-08-31 07:10:35', NULL, NULL, NULL, '1'),
	(15279, 'Lukin', 'Lukin', NULL, NULL, NULL, '3372', NULL, '2019-08-29 16:42:59', 4, 'customer', NULL, '2019-08-29 16:42:59', '2019-08-29 16:42:29', '2019-08-29 16:42:59', NULL, NULL, NULL, '1'),
	(15280, 'Evi', 'Zulfia', NULL, NULL, NULL, '1234', NULL, NULL, 4, 'customer', NULL, NULL, '2019-08-30 13:27:24', '2019-08-30 13:27:24', NULL, NULL, NULL, '1'),
	(15281, 'Tri', 'Hastuti', NULL, NULL, NULL, '3496', NULL, '2019-08-30 18:14:51', 4, 'customer', NULL, '2019-08-30 18:14:51', '2019-08-30 17:56:03', '2019-08-30 18:14:51', NULL, NULL, NULL, '1'),
	(15282, 'Kumala', 'Sari', NULL, NULL, NULL, '8892', NULL, '2019-09-26 10:40:09', 3, 'agent', NULL, '2019-09-26 10:40:09', '2019-08-30 20:42:02', '2019-09-26 10:40:09', NULL, NULL, NULL, '1'),
	(15283, 'cindy', 'shintia', NULL, NULL, NULL, '3789', NULL, '2019-08-31 07:38:23', 4, 'customer', NULL, '2019-08-31 07:38:23', '2019-08-31 07:36:23', '2019-08-31 07:38:23', NULL, NULL, NULL, '1'),
	(15284, 'Hartini', '.', NULL, NULL, NULL, '7528', NULL, NULL, 4, 'customer', NULL, NULL, '2019-08-31 08:09:34', '2019-08-31 08:09:34', NULL, NULL, NULL, '1'),
	(15285, 'Gita', 'Putri', NULL, NULL, NULL, '6934', NULL, '2019-08-31 08:52:57', 4, 'customer', NULL, '2019-08-31 08:52:57', '2019-08-31 08:23:59', '2019-08-31 08:52:57', NULL, NULL, NULL, '1'),
	(15286, 'Anggiat', 'Gultom', NULL, NULL, NULL, '6437', NULL, '2019-08-31 08:58:51', 4, 'customer', NULL, '2019-08-31 08:58:51', '2019-08-31 08:56:47', '2019-08-31 08:58:51', NULL, NULL, NULL, '1'),
	(15287, 'Diah', 'Pusparini', NULL, NULL, NULL, '8757', NULL, '2019-08-31 10:18:33', 4, 'customer', NULL, '2019-08-31 10:18:33', '2019-08-31 10:17:56', '2019-08-31 10:18:33', NULL, NULL, NULL, '1'),
	(15288, 'luluk', 'riana', NULL, NULL, NULL, '8746', NULL, NULL, 4, 'customer', NULL, NULL, '2019-08-31 13:15:15', '2019-08-31 21:22:52', NULL, NULL, NULL, '1'),
	(15289, 'Siti', 'Jariah', NULL, NULL, NULL, '7875', NULL, '2019-09-18 07:36:14', 4, 'customer', NULL, '2019-09-18 07:36:14', '2019-09-01 10:27:30', '2019-09-27 15:19:28', NULL, NULL, NULL, '1'),
	(15290, 'R', 'lim', NULL, NULL, NULL, '7314', NULL, '2019-09-10 15:39:15', 4, 'customer', NULL, '2019-09-10 15:39:15', '2019-09-01 22:22:18', '2019-09-10 15:39:15', NULL, NULL, NULL, '1'),
	(15292, 'Suryani', NULL, NULL, NULL, NULL, '2124', NULL, NULL, 4, 'customer', NULL, NULL, '2019-09-03 20:12:04', '2019-09-03 20:12:04', NULL, NULL, NULL, '1'),
	(15293, 'Nurul', 'hafiza', NULL, NULL, NULL, '6843', NULL, '2019-09-04 13:43:21', 4, 'customer', NULL, '2019-09-04 13:43:21', '2019-09-04 13:42:36', '2019-09-04 13:43:21', NULL, NULL, NULL, '1'),
	(15294, 'marten', 'bastaman', NULL, NULL, NULL, '7050', NULL, '2019-09-18 10:49:13', 4, 'customer', NULL, '2019-09-18 10:49:13', '2019-09-05 11:11:42', '2019-09-18 10:49:13', NULL, NULL, NULL, '1'),
	(15295, 'Afif', 'Nurrahman', NULL, NULL, NULL, '7842', NULL, NULL, 4, 'customer', NULL, NULL, '2019-09-05 15:08:54', '2019-09-05 15:08:54', NULL, NULL, NULL, '1'),
	(15296, 'Enly', ' ', NULL, NULL, NULL, '7008', NULL, '2019-09-05 15:54:24', 4, 'customer', NULL, '2019-09-05 15:54:24', '2019-09-05 15:30:05', '2019-09-05 15:54:24', NULL, NULL, NULL, '1'),
	(15297, 'Yani', NULL, NULL, NULL, NULL, '8692', NULL, NULL, 4, 'customer', NULL, NULL, '2019-09-06 16:37:01', '2019-09-06 16:37:01', NULL, NULL, NULL, '1'),
	(15298, 'Ade', 'lukmansyah', NULL, NULL, NULL, '3269', NULL, '2019-09-06 21:18:43', 4, 'customer', NULL, '2019-09-06 21:18:43', '2019-09-06 21:18:09', '2019-09-06 21:18:43', NULL, NULL, NULL, '1'),
	(15299, 'Muhamad', 'Firmansyah', NULL, NULL, NULL, '7463', NULL, '2019-09-07 12:27:14', 4, 'customer', NULL, '2019-09-07 12:27:14', '2019-09-07 12:26:29', '2019-09-07 12:27:14', NULL, NULL, NULL, '1'),
	(15300, 'Ami', 'nurcahya', NULL, NULL, NULL, '1306', NULL, '2019-09-07 18:22:05', 4, 'customer', NULL, '2019-09-07 18:22:05', '2019-09-07 18:21:33', '2019-09-07 18:22:05', NULL, NULL, NULL, '1'),
	(15301, 'Deki', NULL, NULL, NULL, NULL, '5017', NULL, NULL, 4, 'customer', NULL, NULL, '2019-09-08 14:32:03', '2019-09-08 14:32:03', NULL, NULL, NULL, '1'),
	(15302, 'Atik', 'wijayanti', NULL, NULL, NULL, '3439', NULL, NULL, 4, 'customer', NULL, NULL, '2019-09-09 15:53:50', '2019-09-09 15:53:50', NULL, NULL, NULL, '1'),
	(15303, 'Taufan', NULL, NULL, NULL, NULL, '6180', NULL, '2019-09-11 10:42:24', 4, 'customer', NULL, '2019-09-11 10:42:24', '2019-09-09 18:06:28', '2019-09-11 10:42:24', NULL, NULL, NULL, '1'),
	(15304, 'taufangustiwan', NULL, NULL, NULL, NULL, '4200', NULL, NULL, 4, 'customer', NULL, NULL, '2019-09-09 18:09:24', '2019-09-09 18:09:24', NULL, NULL, NULL, '1'),
	(15306, 'Lis', 'zebua', NULL, NULL, NULL, '5417', NULL, '2019-09-18 15:30:17', 4, 'customer', NULL, '2019-09-18 15:30:17', '2019-09-10 07:10:56', '2019-09-18 15:30:17', NULL, NULL, NULL, '1'),
	(15307, 'Putri', 'kinanti', NULL, NULL, NULL, '1717', NULL, NULL, 4, 'customer', NULL, NULL, '2019-09-10 08:28:56', '2019-09-10 08:28:56', NULL, NULL, NULL, '1'),
	(15308, 'Novvy', 'Wattimena', NULL, NULL, NULL, '1501', NULL, '2019-09-10 11:30:39', 4, 'customer', NULL, '2019-09-10 11:30:39', '2019-09-10 11:29:57', '2019-09-10 11:30:39', NULL, NULL, NULL, '1'),
	(15309, 'Samsinah', NULL, NULL, NULL, NULL, '4376', NULL, '2019-09-10 17:38:40', 4, 'customer', NULL, '2019-09-10 17:38:40', '2019-09-10 17:36:38', '2019-09-11 17:13:15', NULL, NULL, NULL, '1'),
	(15310, 'Afriliana', NULL, NULL, NULL, NULL, '6121', NULL, '2019-09-11 10:58:56', 4, 'customer', NULL, '2019-09-11 10:58:56', '2019-09-11 10:56:11', '2019-09-11 10:58:56', NULL, NULL, NULL, '1'),
	(15311, 'Alarick', NULL, NULL, NULL, NULL, '3139', NULL, NULL, 4, 'customer', NULL, NULL, '2019-09-12 17:42:25', '2019-09-12 17:44:42', NULL, NULL, NULL, '1'),
	(15312, 'Alarick', NULL, NULL, NULL, NULL, '8703', NULL, '2019-09-12 17:48:08', 4, 'customer', NULL, '2019-09-12 17:48:08', '2019-09-12 17:46:47', '2019-09-12 17:48:08', NULL, NULL, NULL, '1'),
	(15313, 'Intan', 'Oktaviani', NULL, NULL, NULL, '5833', NULL, NULL, 4, 'customer', NULL, NULL, '2019-09-12 21:23:08', '2019-09-12 21:23:08', NULL, NULL, NULL, '1'),
	(15314, 'Intan', 'Oktaviani', NULL, NULL, NULL, '5395', NULL, '2019-09-12 21:32:53', 4, 'customer', NULL, '2019-09-12 21:32:53', '2019-09-12 21:23:37', '2019-09-12 21:32:53', NULL, NULL, NULL, '1'),
	(15315, 'Sovie', 'Liestiyani', NULL, NULL, NULL, '6476', NULL, '2019-09-27 13:10:50', 4, 'customer', NULL, '2019-09-27 13:10:50', '2019-09-13 09:30:06', '2019-09-27 13:10:50', NULL, NULL, NULL, '1'),
	(15316, 'phengky', 'pangestu', NULL, NULL, NULL, '2986', NULL, '2019-09-15 16:43:52', 4, 'customer', NULL, '2019-09-15 16:43:52', '2019-09-15 16:43:28', '2019-09-15 16:43:52', NULL, NULL, NULL, '1'),
	(15317, 'rizal', 'nurjaman', NULL, NULL, NULL, '4845', NULL, '2019-09-16 16:24:49', 4, 'customer', NULL, '2019-09-16 16:24:49', '2019-09-16 16:12:31', '2019-09-16 16:24:49', NULL, NULL, NULL, '1'),
	(15318, 'Sri', 'lestari', NULL, NULL, NULL, '8157', NULL, NULL, 4, 'customer', NULL, NULL, '2019-09-18 15:29:06', '2019-09-18 15:29:06', NULL, NULL, NULL, '1'),
	(15319, 'Yuliana', NULL, NULL, NULL, NULL, '1599', NULL, '2019-09-19 10:48:44', 4, 'customer', NULL, '2019-09-19 10:48:44', '2019-09-19 10:47:54', '2019-09-19 10:48:44', NULL, NULL, NULL, '1'),
	(15320, 'Asdar', 'nur', NULL, NULL, NULL, '4376', NULL, '2019-09-19 22:47:11', 4, 'customer', NULL, '2019-09-19 22:47:11', '2019-09-19 22:46:39', '2019-09-19 22:47:41', NULL, NULL, NULL, '1'),
	(15321, 'A', 'A', NULL, NULL, NULL, NULL, NULL, NULL, 3, 'agent', NULL, NULL, '2019-09-24 11:57:47', '2019-09-24 11:57:47', NULL, NULL, NULL, '0'),
	(15322, 'Doddy', 'Ady', NULL, NULL, NULL, '5060', NULL, '2019-09-25 09:30:18', 4, 'customer', NULL, '2019-09-25 09:30:18', '2019-09-25 09:29:41', '2019-09-25 09:30:18', NULL, NULL, NULL, '1'),
	(15323, 'BAQA', 'AYAM', NULL, NULL, NULL, '1528', NULL, NULL, 4, 'customer', NULL, NULL, '2019-09-26 15:35:29', '2019-09-26 15:36:32', NULL, NULL, NULL, '1'),
	(15324, 'BAQA', 'AYAM', NULL, NULL, NULL, '1684', NULL, '2019-09-26 15:45:16', 4, 'customer', NULL, '2019-09-26 15:45:16', '2019-09-26 15:38:00', '2019-09-26 15:45:16', NULL, NULL, NULL, '1'),
	(15325, 'BAQA', 'AYAM', NULL, NULL, NULL, '5081', NULL, NULL, 4, 'customer', NULL, NULL, '2019-09-26 15:44:08', '2019-09-26 15:44:08', NULL, NULL, NULL, '1'),
	(15326, 'James', 'Endicott', NULL, NULL, NULL, '1055', NULL, '2019-09-27 14:43:24', 4, 'customer', NULL, '2019-09-27 14:43:24', '2019-09-26 17:19:52', '2019-09-27 14:43:24', NULL, NULL, NULL, '1'),
	(15327, 'Sovie', 'Liestiyani', NULL, NULL, NULL, '5935', NULL, NULL, 4, 'customer', NULL, NULL, '2019-09-27 13:09:50', '2019-09-27 13:09:50', NULL, NULL, NULL, '1'),
	(15328, 'rizki', NULL, NULL, NULL, NULL, '5334', NULL, '2019-09-27 15:21:13', 4, 'customer', NULL, '2019-09-27 15:21:13', '2019-09-27 15:20:35', '2019-09-27 15:21:13', NULL, NULL, NULL, '1'),
	(15329, 'Roni', 'Wardhana', NULL, NULL, NULL, '8591', NULL, '2019-09-27 16:07:16', 4, 'customer', NULL, '2019-09-27 16:07:16', '2019-09-27 16:06:44', '2019-09-27 16:07:16', NULL, NULL, NULL, '1'),
	(15330, 'attia', 'wijaya', NULL, NULL, NULL, '7064', NULL, '2019-09-27 17:33:33', 4, 'customer', NULL, '2019-09-27 17:33:33', '2019-09-27 17:32:04', '2019-09-27 17:33:33', NULL, NULL, NULL, '1'),
	(15331, NULL, NULL, 'admin@test.com', NULL, '$2y$10$F3RLJeYB49qnotCc.pAcDuKJLM2VqX4rVf08U4l7puaXKqoHpWeXC', NULL, NULL, NULL, 1, 'superadmin', NULL, NULL, '2020-10-19 08:51:37', '2020-10-19 08:51:37', NULL, NULL, NULL, '1');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
