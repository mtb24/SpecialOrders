SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;


DROP TABLE IF EXISTS `status_codes`;
CREATE TABLE IF NOT EXISTS `status_codes` (
  `id` tinyint(1) NOT NULL,
  `status_text` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `status_codes` VALUES(3, 'Ordered');
INSERT INTO `status_codes` VALUES(6, 'Completed and Sold');
INSERT INTO `status_codes` VALUES(4, 'Completed and given to Tech');
INSERT INTO `status_codes` VALUES(1, 'New Order');
INSERT INTO `status_codes` VALUES(2, 'New Bike Order');
INSERT INTO `status_codes` VALUES(10, 'Warranty Order');
INSERT INTO `status_codes` VALUES(11, 'Miscategorized');
INSERT INTO `status_codes` VALUES(99, 'Archived Orders');
INSERT INTO `status_codes` VALUES(5, 'Received and given to Sales');
