SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;


DROP TABLE IF EXISTS `specialorders`;
CREATE TABLE IF NOT EXISTS `specialorders` (
  `specialordersid` int(11) NOT NULL AUTO_INCREMENT,
  `cust_name_first` varchar(255) DEFAULT NULL,
  `cust_name_last` varchar(255) DEFAULT NULL,
  `date_submitted` date NOT NULL,
  `cust_email` varchar(255) DEFAULT NULL,
  `cust_day_phone` varchar(255) DEFAULT NULL,
  `billing_street` varchar(255) DEFAULT NULL,
  `billing_city` varchar(255) DEFAULT NULL,
  `billing_state` varchar(255) DEFAULT NULL,
  `billing_zip` varchar(255) DEFAULT NULL,
  `shipping_street` varchar(255) DEFAULT NULL,
  `shipping_city` varchar(255) DEFAULT NULL,
  `shipping_state` varchar(255) DEFAULT NULL,
  `shipping_zip` varchar(255) DEFAULT NULL,
  `store` varchar(255) DEFAULT NULL,
  `employee_name` varchar(255) DEFAULT NULL,
  `new_bike_order` varchar(5) DEFAULT NULL,
  `item_1_rpro_num` varchar(255) DEFAULT NULL,
  `item_1_dept` varchar(255) DEFAULT NULL,
  `item_1_vend` varchar(255) DEFAULT NULL,
  `item_1_manu_part_num` varchar(255) DEFAULT NULL,
  `item_1_desc` varchar(255) DEFAULT NULL,
  `item_1_size` varchar(255) DEFAULT NULL,
  `item_1_attr` varchar(255) DEFAULT NULL,
  `item_1_price` varchar(10) DEFAULT NULL,
  `item_1_qty` int(11) DEFAULT NULL,
  `item_1_total` varchar(10) DEFAULT NULL,
  `item_2_rpro_num` varchar(255) DEFAULT NULL,
  `item_2_dept` varchar(255) DEFAULT NULL,
  `item_2_vend` varchar(255) DEFAULT NULL,
  `item_2_manu_part_num` varchar(255) DEFAULT NULL,
  `item_2_desc` varchar(255) DEFAULT NULL,
  `item_2_size` varchar(255) DEFAULT NULL,
  `item_2_attr` varchar(255) DEFAULT NULL,
  `item_2_price` varchar(10) DEFAULT NULL,
  `item_2_qty` int(11) DEFAULT NULL,
  `item_2_total` varchar(10) DEFAULT NULL,
  `item_3_rpro_num` varchar(255) DEFAULT NULL,
  `item_3_dept` varchar(255) DEFAULT NULL,
  `item_3_vend` varchar(255) DEFAULT NULL,
  `item_3_manu_part_num` varchar(255) DEFAULT NULL,
  `item_3_desc` varchar(255) DEFAULT NULL,
  `item_3_size` varchar(255) DEFAULT NULL,
  `item_3_attr` varchar(255) DEFAULT NULL,
  `item_3_price` varchar(10) DEFAULT NULL,
  `item_3_qty` int(11) DEFAULT NULL,
  `item_3_total` varchar(10) DEFAULT NULL,
  `item_4_rpro_num` varchar(255) DEFAULT NULL,
  `item_4_dept` varchar(255) DEFAULT NULL,
  `item_4_vend` varchar(255) DEFAULT NULL,
  `item_4_manu_part_num` varchar(255) DEFAULT NULL,
  `item_4_desc` varchar(255) DEFAULT NULL,
  `item_4_size` varchar(255) DEFAULT NULL,
  `item_4_attr` varchar(255) DEFAULT NULL,
  `item_4_price` varchar(10) DEFAULT NULL,
  `item_4_qty` int(11) DEFAULT NULL,
  `item_4_total` varchar(10) DEFAULT NULL,
  `item_5_rpro_num` varchar(255) DEFAULT NULL,
  `item_5_dept` varchar(255) DEFAULT NULL,
  `item_5_vend` varchar(255) DEFAULT NULL,
  `item_5_manu_part_num` varchar(255) DEFAULT NULL,
  `item_5_desc` varchar(255) DEFAULT NULL,
  `item_5_size` varchar(255) DEFAULT NULL,
  `item_5_attr` varchar(255) DEFAULT NULL,
  `item_5_price` varchar(10) DEFAULT NULL,
  `item_5_qty` int(11) DEFAULT NULL,
  `item_5_total` varchar(10) DEFAULT NULL,
  `ship_type` varchar(255) DEFAULT NULL,
  `shipping_charge` decimal(5,2) DEFAULT NULL,
  `tax` decimal(5,2) DEFAULT NULL,
  `total` varchar(10) DEFAULT NULL,
  `notes` varchar(255) DEFAULT NULL,
  `cust_cc_num` varchar(255) DEFAULT NULL,
  `cust_cc_exp` varchar(255) DEFAULT NULL,
  `cust_cc_cvc` int(3) DEFAULT NULL,
  `cust_cc_type` varchar(255) DEFAULT NULL,
  `date_ordered` date DEFAULT NULL,
  `rpro_po_num` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `receipt_number` varchar(255) DEFAULT NULL,
  `RA_number` varchar(255) NOT NULL,
  `comments` text,
  PRIMARY KEY (`specialordersid`),
  FULLTEXT KEY `search_employee` (`employee_name`),
  FULLTEXT KEY `search_customer` (`cust_name_first`,`cust_name_last`,`cust_email`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16078 ;