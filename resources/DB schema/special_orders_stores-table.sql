SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;


DROP TABLE IF EXISTS `stores`;
CREATE TABLE IF NOT EXISTS `stores` (
  `id` tinyint(2) NOT NULL AUTO_INCREMENT,
  `store_name` varchar(25) DEFAULT NULL,
  `taxRate` decimal(3,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

INSERT INTO `stores` VALUES(1, 'San Rafael', 9.00);
INSERT INTO `stores` VALUES(2, 'Sausalito', 8.50);
INSERT INTO `stores` VALUES(3, 'Berkeley', 9.00);
INSERT INTO `stores` VALUES(4, 'Palo Alto', 8.75);
INSERT INTO `stores` VALUES(5, 'San Fransisco', 8.75);
INSERT INTO `stores` VALUES(6, 'Sacramento', 8.50);
INSERT INTO `stores` VALUES(7, 'Los Gatos', 8.75);
INSERT INTO `stores` VALUES(8, 'Petaluma', 8.25);
INSERT INTO `stores` VALUES(9, 'Walnut Creek', 8.50);
INSERT INTO `stores` VALUES(17, 'MBDirect', 9.00);
INSERT INTO `stores` VALUES(10, 'San Jose', 8.75);
INSERT INTO `stores` VALUES(11, 'Pleasanton', 9.00);