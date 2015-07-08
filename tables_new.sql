/*
SQLyog Ultimate v11.11 (64 bit)
MySQL - 5.6.17 : Database - neoliam_tienda
*********************************************************************
*/


/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`neoliam_tienda` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `neoliam_tienda`;

/*Table structure for table `ps_neo_exchanges` */

DROP TABLE IF EXISTS `ps_neo_exchanges`;

CREATE TABLE `ps_neo_exchanges` (
  `id_neo_exchange` int(20) unsigned NOT NULL AUTO_INCREMENT,
  `reference` varchar(20) DEFAULT NULL,
  `id_shop_group` int(1) unsigned NOT NULL DEFAULT '1',
  `id_shop` int(1) unsigned NOT NULL DEFAULT '1',
  `id_carrier` int(10) unsigned DEFAULT NULL,
  `id_lang` int(1) unsigned NOT NULL DEFAULT '1',
  `id_customer` int(10) unsigned NOT NULL,
  `id_cart` int(10) unsigned DEFAULT NULL,
  `id_currency` int(1) unsigned NOT NULL DEFAULT '1',
  `id_address_delivery` int(10) unsigned DEFAULT NULL,
  `id_address_invoice` int(10) unsigned DEFAULT NULL,
  `id_neo_status` smallint(1) unsigned DEFAULT NULL,
  `secure_key` varchar(32) DEFAULT NULL,
  `payment` varchar(255) DEFAULT NULL,
  `conversion_rate` decimal(13,6) NOT NULL DEFAULT '1.000000',
  `module` varchar(255) DEFAULT NULL,
  `recyclable` tinyint(1) NOT NULL DEFAULT '0',
  `gift` tinyint(1) NOT NULL DEFAULT '0',
  `gift_message` text,
  `mobile_theme` tinyint(1) NOT NULL DEFAULT '0',
  `shipping_number` varchar(32) DEFAULT NULL,
  `total_discounts` decimal(17,2) NOT NULL DEFAULT '0.00',
  `total_discounts_tax_incl` decimal(17,2) NOT NULL DEFAULT '0.00',
  `total_discounts_tax_excl` decimal(17,2) NOT NULL DEFAULT '0.00',
  `total_paid` decimal(17,2) NOT NULL DEFAULT '0.00',
  `total_paid_tax_incl` decimal(17,2) NOT NULL DEFAULT '0.00',
  `total_paid_tax_excl` decimal(17,2) NOT NULL DEFAULT '0.00',
  `total_paid_real` decimal(17,2) NOT NULL DEFAULT '0.00',
  `total_products` decimal(17,2) NOT NULL DEFAULT '0.00',
  `total_products_wt` decimal(17,2) NOT NULL DEFAULT '0.00',
  `total_shipping` decimal(17,2) NOT NULL DEFAULT '0.00',
  `total_shipping_tax_incl` decimal(17,2) NOT NULL DEFAULT '0.00',
  `total_shipping_tax_excl` decimal(17,2) NOT NULL DEFAULT '0.00',
  `carrier_tax_rate` decimal(17,2) NOT NULL DEFAULT '0.00',
  `total_wrapping` decimal(17,2) NOT NULL DEFAULT '0.00',
  `total_wrapping_tax_incl` decimal(17,2) NOT NULL DEFAULT '0.00',
  `total_wrapping_tax_excl` decimal(17,2) NOT NULL DEFAULT '0.00',
  `invoice_number` int(10) NOT NULL DEFAULT '0',
  `delivery_number` int(10) NOT NULL DEFAULT '0',
  `invoice_date` datetime DEFAULT NULL,
  `delivery_date` datetime DEFAULT NULL,
  `valid` int(1) NOT NULL DEFAULT '0',
  `forma_pago` varchar(20) NOT NULL,
  `total_in_favor` decimal(20,2) DEFAULT NULL,
  `total_dif` decimal(20,2) DEFAULT NULL,
  `current_state` int(4) NOT NULL DEFAULT '1',
  `date_add` datetime NOT NULL,
  `date_upd` datetime DEFAULT NULL,
  PRIMARY KEY (`id_neo_exchange`),
  UNIQUE KEY `REFERENCE` (`reference`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

/*Data for the table `ps_neo_exchanges` */

insert  into `ps_neo_exchanges`(`id_neo_exchange`,`reference`,`id_shop_group`,`id_shop`,`id_carrier`,`id_lang`,`id_customer`,`id_cart`,`id_currency`,`id_address_delivery`,`id_address_invoice`,`id_neo_status`,`secure_key`,`payment`,`conversion_rate`,`module`,`recyclable`,`gift`,`gift_message`,`mobile_theme`,`shipping_number`,`total_discounts`,`total_discounts_tax_incl`,`total_discounts_tax_excl`,`total_paid`,`total_paid_tax_incl`,`total_paid_tax_excl`,`total_paid_real`,`total_products`,`total_products_wt`,`total_shipping`,`total_shipping_tax_incl`,`total_shipping_tax_excl`,`carrier_tax_rate`,`total_wrapping`,`total_wrapping_tax_incl`,`total_wrapping_tax_excl`,`invoice_number`,`delivery_number`,`invoice_date`,`delivery_date`,`valid`,`forma_pago`,`total_in_favor`,`total_dif`,`current_state`,`date_add`,`date_upd`)
values
(1,'2015040001',1,1,NULL,1,1011,NULL,1,NULL,NULL,1,NULL,NULL,1.000000,NULL,0,0,NULL,0,NULL,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0,0,NULL,NULL,0,'Transferencia',0.00,2911.00,1,'2015-04-30 17:24:42',NULL),
(2,'2015040002',1,1,NULL,1,1011,NULL,1,NULL,NULL,1,NULL,NULL,1.000000,NULL,0,0,NULL,0,NULL,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0,0,NULL,NULL,0,'Transferencia',0.00,2911.00,1,'2015-04-30 17:24:45',NULL),
(3,'2015040003',1,1,NULL,1,1011,NULL,1,NULL,NULL,1,NULL,NULL,1.000000,NULL,0,0,NULL,0,NULL,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0,0,NULL,NULL,0,'Transferencia',0.00,2911.00,1,'2015-04-30 17:25:55',NULL),
(4,'2015040004',1,1,NULL,1,1011,NULL,1,NULL,NULL,1,NULL,NULL,1.000000,NULL,0,0,NULL,0,NULL,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0,0,NULL,NULL,0,'Transferencia',0.00,0.00,1,'2015-04-30 17:50:33',NULL),
(5,'2015040005',1,1,NULL,1,1011,NULL,1,NULL,NULL,1,NULL,NULL,1.000000,NULL,0,0,NULL,0,NULL,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0,0,NULL,NULL,0,'Transferencia',0.00,0.00,1,'2015-04-30 17:52:55',NULL),
(6,'2015040006',1,1,NULL,1,1011,NULL,1,NULL,NULL,1,NULL,NULL,1.000000,NULL,0,0,NULL,0,NULL,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0,0,NULL,NULL,0,'Transferencia',0.00,1990.00,1,'2015-05-07 15:48:48',NULL),
(7,'2015040007',1,1,NULL,1,1011,NULL,1,NULL,NULL,1,NULL,NULL,1.000000,NULL,0,0,NULL,0,NULL,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0,0,NULL,NULL,0,'Transferencia',0.00,1990.00,1,'2015-05-07 17:05:48',NULL),
(8,'2015040008',1,1,NULL,1,1011,NULL,1,NULL,NULL,1,NULL,NULL,1.000000,NULL,0,0,NULL,0,NULL,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0,0,NULL,NULL,0,'Transferencia',0.00,1990.00,1,'2015-05-07 17:14:57',NULL),
(9,'2015040009',1,1,NULL,1,1011,NULL,1,NULL,NULL,1,NULL,NULL,1.000000,NULL,0,0,NULL,0,NULL,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0,0,NULL,NULL,0,'Transferencia',5000.00,0.00,1,'2015-05-11 18:13:51',NULL),
(10,'2015040010',1,1,NULL,1,1011,NULL,1,NULL,NULL,1,NULL,NULL,1.000000,NULL,0,0,NULL,0,NULL,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0,0,NULL,NULL,0,'Transferencia',5000.00,0.00,1,'2015-05-12 10:37:38',NULL),
(11,'2015040011',1,1,NULL,1,1011,NULL,1,NULL,NULL,1,NULL,NULL,1.000000,NULL,0,0,NULL,0,NULL,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0,0,NULL,NULL,0,'Transferencia',5000.00,0.00,1,'2015-05-12 15:29:59',NULL),
(12,'2015050012',1,1,NULL,1,1011,NULL,1,NULL,NULL,1,NULL,NULL,1.000000,NULL,0,0,NULL,0,NULL,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0,0,NULL,NULL,0,'Transferencia',5000.00,0.00,1,'2015-05-19 22:00:13',NULL),
(13,'2015050013',1,1,NULL,1,1011,NULL,1,NULL,NULL,1,NULL,NULL,1.000000,NULL,0,0,NULL,0,NULL,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0,0,NULL,NULL,0,'Transferencia',0.00,1990.00,1,'2015-05-19 22:37:50',NULL),
(14,'2015050014',1,1,NULL,1,1011,NULL,1,NULL,NULL,1,NULL,NULL,1.000000,NULL,0,0,NULL,0,NULL,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0,0,NULL,NULL,0,'Transferencia',0.00,990.00,1,'2015-05-19 22:44:05',NULL),
(15,'201505015',1,1,NULL,1,1011,NULL,1,NULL,NULL,1,NULL,NULL,1.000000,NULL,0,0,NULL,0,NULL,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0,0,NULL,NULL,0,'Transferencia',0.00,4667.00,1,'2015-05-19 23:39:18',NULL),
(16,'201506008',1,1,NULL,1,1011,NULL,1,NULL,NULL,1,NULL,NULL,1.000000,NULL,0,0,NULL,0,NULL,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0,0,NULL,NULL,0,'Transferencia',0.00,1042.86,1,'2015-06-08 00:41:31',NULL),
(17,'201506017',1,1,NULL,1,1011,NULL,1,NULL,NULL,1,NULL,NULL,1.000000,NULL,0,0,NULL,0,NULL,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0,0,NULL,NULL,0,'Depósito',1966.00,0.00,1,'2015-06-08 00:45:22',NULL),
(18,'201506018',1,1,NULL,1,1011,NULL,1,NULL,NULL,1,NULL,NULL,1.000000,NULL,0,0,NULL,0,NULL,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0,0,NULL,NULL,0,'Seleccione',5000.00,0.00,1,'2015-06-10 22:54:59',NULL),
(19,'201506019',1,1,NULL,1,1011,NULL,1,NULL,NULL,1,NULL,NULL,1.000000,NULL,0,0,NULL,0,NULL,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0,0,NULL,NULL,0,'Seleccione',5000.00,0.00,1,'2015-06-10 22:58:20',NULL),
(20,'201506020',1,1,NULL,1,1011,NULL,1,NULL,NULL,1,NULL,NULL,1.000000,NULL,0,0,NULL,0,NULL,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0,0,NULL,NULL,0,'Seleccione',5000.00,0.00,1,'2015-06-10 23:00:38',NULL),
(21,'201506021',1,1,NULL,1,1012,NULL,1,NULL,NULL,1,NULL,NULL,1.000000,NULL,0,0,NULL,0,NULL,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0,0,NULL,NULL,0,'Seleccione',5000.00,0.00,1,'2015-06-10 23:02:25',NULL),
(22,'201506022',1,1,NULL,1,1011,NULL,1,NULL,NULL,1,NULL,NULL,1.000000,NULL,0,0,NULL,0,NULL,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0,0,NULL,NULL,0,'Seleccione',5000.00,0.00,1,'2015-06-10 23:32:23',NULL),
(23,'201506023',1,1,NULL,1,1011,NULL,1,NULL,NULL,1,NULL,NULL,1.000000,NULL,0,0,NULL,0,NULL,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0,0,NULL,NULL,0,'Transferencia',0.00,2043.00,1,'2015-06-11 00:45:18',NULL),
(24,'201506024',1,1,NULL,1,1011,NULL,1,NULL,NULL,1,NULL,NULL,1.000000,NULL,0,0,NULL,0,NULL,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0,0,NULL,NULL,0,'Transferencia',0.00,17123.00,1,'2015-06-11 19:03:34',NULL),
(25,'201507025',1,1,NULL,1,1011,NULL,1,NULL,NULL,1,NULL,NULL,1.000000,NULL,0,0,NULL,0,NULL,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0,0,NULL,NULL,0,'Depósito',0.00,7043.00,1,'2015-07-05 14:51:48',NULL);

/*Table structure for table `ps_neo_exchanges_history` */

DROP TABLE IF EXISTS `ps_neo_exchanges_history`;

CREATE TABLE `ps_neo_exchanges_history` (
  `id_neo_exchanges_history` int(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_employee` int(10) unsigned NOT NULL,
  `id_neo_exchange` int(20) unsigned NOT NULL,
  `id_neo_status` int(10) unsigned NOT NULL,
  `date_add` datetime NOT NULL,
  PRIMARY KEY (`id_neo_exchanges_history`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `ps_neo_exchanges_history` */

/*Table structure for table `ps_neo_items_buys` */

DROP TABLE IF EXISTS `ps_neo_items_buys`;

CREATE TABLE `ps_neo_items_buys` (
  `id_neo_item_buy` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_product` bigint(10) DEFAULT NULL,
  `id_neo_exchange` bigint(10) DEFAULT NULL,
  `name` varchar(200) DEFAULT NULL,
  `price` decimal(20,2) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `status` smallint(1) DEFAULT NULL,
  PRIMARY KEY (`id_neo_item_buy`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `ps_neo_items_buys` */

insert  into `ps_neo_items_buys`(`id_neo_item_buy`,`id_product`,`id_neo_exchange`,`name`,`price`,`image`,`created_at`,`updated_at`,`status`) values (1,270,3,'(PS3) Call of Duty: Advanced Warfare',9490.00,'http://localhost/neotienda/img/p/5/1/8/518.jpg','2015-04-30 23:48:26',NULL,1),(2,693,4,'(PS3) Army of TWO The Devil\'s Cartel',4633.93,'http://localhost/neotienda/img/p/5/8/9/589.jpg','2015-05-01 06:16:33',NULL,1),(3,650,8,'(PS3) God of War Ascension',3390.00,'http://localhost/neotienda/img/p/3/8/7/387.jpg','2015-05-12 19:36:54',NULL,1),(4,650,9,'(PS3) God of War Ascension',3390.00,'http://localhost/neotienda/img/p/3/8/7/387.jpg','2015-05-12 19:41:40',NULL,1),(5,1336,13,'(3DS) Penguins of Madagascar',6990.00,'http://localhost/neotienda/img/p/1/1/8/8/1188.jpg','2015-05-19 22:37:51',NULL,1),(6,381,14,'(3DS) New Super Mario Bros 2',5990.00,'http://localhost/neotienda/img/p/7/3/6/736.jpg','2015-05-19 22:44:05',NULL,1),(7,1336,15,'(3DS) Penguins of Madagascar',6990.00,'http://localhost/neotienda/img/p/1/1/8/8/1188.jpg','2015-05-19 23:39:18',NULL,1),(8,239,15,'(PS3) The Ico & Shadow Of The Colossus Collection',4276.79,'http://localhost/neotienda/img/p/7/9/79.jpg','2015-05-19 23:39:18',NULL,1);

/*Table structure for table `ps_neo_items_sales` */

DROP TABLE IF EXISTS `ps_neo_items_sales`;

CREATE TABLE `ps_neo_items_sales` (
  `id_neo_item_sale` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_product` bigint(10) DEFAULT NULL,
  `id_neo_exchange` bigint(10) DEFAULT NULL,
  `name` varchar(200) DEFAULT NULL,
  `price` decimal(20,2) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `status` smallint(1) DEFAULT NULL,
  PRIMARY KEY (`id_neo_item_sale`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

/*Data for the table `ps_neo_items_sales` */

insert  into `ps_neo_items_sales`(`id_neo_item_sale`,`id_product`,`id_neo_exchange`,`name`,`price`,`image`,`created_at`,`updated_at`,`status`) values (1,1318,3,'(PS3) Call of Duty: Advanced Warfare -Usado-',5000.00,'http://localhost/neotienda/img/p/1/0/2/2/1022.jpg','2015-04-30 23:48:26',NULL,1),(2,1318,4,'(PS3) Call of Duty: Advanced Warfare -Usado-',5000.00,'http://localhost/neotienda/img/p/1/0/2/2/1022.jpg','2015-05-01 06:16:33',NULL,1),(3,1318,5,'(PS3) Call of Duty: Advanced Warfare -Usado-',5000.00,'http://localhost/neotienda/img/p/1/0/2/2/1022.jpg','2015-05-09 22:42:37',NULL,1),(4,1318,6,'(PS3) Call of Duty: Advanced Warfare -Usado-',5000.00,'http://localhost/neotienda/img/p/1/0/2/2/1022.jpg','2015-05-10 10:55:30',NULL,1),(5,1318,7,'(PS3) Call of Duty: Advanced Warfare -Usado-',5000.00,'http://localhost/neotienda/img/p/1/0/2/2/1022.jpg','2015-05-12 18:24:15',NULL,1),(6,1325,8,'(PS3) God of War Ascension -Usado-',1600.00,'http://localhost/neotienda/img/p/1/1/2/3/1123.jpg','2015-05-12 19:36:54',NULL,1),(7,1318,8,'(PS3) Call of Duty: Advanced Warfare -Usado-',5000.00,'http://localhost/neotienda/img/p/1/0/2/2/1022.jpg','2015-05-12 19:36:54',NULL,1),(8,1318,9,'(PS3) Call of Duty: Advanced Warfare -Usado-',5000.00,'http://localhost/neotienda/img/p/1/0/2/2/1022.jpg','2015-05-12 19:41:40',NULL,1),(9,1325,9,'(PS3) God of War Ascension -Usado-',1600.00,'http://localhost/neotienda/img/p/1/1/2/3/1123.jpg','2015-05-12 19:41:40',NULL,1),(10,1318,10,'(PS3) Call of Duty: Advanced Warfare -Usado-',5000.00,'http://localhost/neotienda/img/p/1/0/2/2/1022.jpg','2015-05-12 19:55:37',NULL,1),(11,1318,11,'(PS3) Call of Duty: Advanced Warfare -Usado-',5000.00,'http://localhost/neotienda/img/p/1/0/2/2/1022.jpg','2015-05-12 19:58:57',NULL,1),(15,1318,12,'(PS3) Call of Duty: Advanced Warfare -Usado-',5000.00,'http://localhost/neotienda/img/p/1/0/2/2/1022.jpg','2015-05-19 22:00:13',NULL,1),(16,1318,13,'(PS3) Call of Duty: Advanced Warfare -Usado-',5000.00,'http://localhost/neotienda/img/p/1/0/2/2/1022.jpg','2015-05-19 22:37:51',NULL,1),(17,1318,14,'(PS3) Call of Duty: Advanced Warfare -Usado-',5000.00,'http://localhost/neotienda/img/p/1/0/2/2/1022.jpg','2015-05-19 22:44:05',NULL,1),(18,1318,15,'(PS3) Call of Duty: Advanced Warfare -Usado-',5000.00,'http://localhost/neotienda/img/p/1/0/2/2/1022.jpg','2015-05-19 23:39:18',NULL,1),(19,1325,15,'(PS3) God of War Ascension -Usado-',1600.00,'http://localhost/neotienda/img/p/1/1/2/3/1123.jpg','2015-05-19 23:39:18',NULL,1);

/*Table structure for table `ps_neo_status` */

DROP TABLE IF EXISTS `ps_neo_status`;

CREATE TABLE `ps_neo_status` (
  `id_neo_status` int(10) NOT NULL AUTO_INCREMENT,
  `denominacion` varchar(20) DEFAULT NULL,
  `invoice` tinyint(1) unsigned DEFAULT '0',
  `send_mail` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `color` varchar(32) DEFAULT NULL,
  `unremovable` tinyint(1) unsigned NOT NULL,
  `hidden` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `logable` tinyint(1) NOT NULL DEFAULT '0',
  `delivery` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `shipped` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `paid` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `delete` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  PRIMARY KEY (`id_neo_status`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

/*Data for the table `ps_neo_status` */

insert  into `ps_neo_status`(`id_neo_status`,`denominacion`,`invoice`,`send_mail`,`color`,`unremovable`,`hidden`,`logable`,`delivery`,`shipped`,`paid`,`delete`,`created_at`,`updated_at`,`status`) values (1,'Proceso',0,0,NULL,1,0,0,0,0,0,0,'2015-05-19 17:24:42',NULL,1),(2,'Aprobado',0,0,NULL,1,0,1,0,0,0,0,'2015-05-19 17:24:45',NULL,1),(3,'Cancelado',0,0,NULL,1,0,0,0,0,0,0,'2015-05-19 17:24:45',NULL,1),(4,'Enviado',0,0,NULL,1,0,1,1,1,1,0,'2015-05-19 17:24:45',NULL,1),(5,'Entregado',0,0,NULL,1,0,1,1,1,1,0,'2015-05-19 17:24:45',NULL,1);

/*Table structure for table `ps_neo_whitelist` */

DROP TABLE IF EXISTS `ps_neo_whitelist`;

CREATE TABLE `ps_neo_whitelist` (
  `id_neo_whitelist` bigint(10) NOT NULL AUTO_INCREMENT,
  `id_product` bigint(10) NOT NULL,
  `price` decimal(20,2) NOT NULL,
  PRIMARY KEY (`id_neo_whitelist`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `ps_neo_whitelist` */

insert  into `ps_neo_whitelist`(`id_neo_whitelist`,`id_product`,`price`) values (1,20,1000.00),(2,1318,5000.00),(3,1325,1600.00),(4,1322,900.00),(5,1320,150.00),(6,1319,900.00),(7,24,600.00);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;


DROP TABLE IF EXISTS `ps_neo_history`;

CREATE TABLE `ps_neo_history` (
  `id_neo_history` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_employee` int(10) unsigned NOT NULL,
  `id_neo` int(10) unsigned NOT NULL,
  `id_neo_state` int(10) unsigned NOT NULL,
  `date_add` datetime NOT NULL,
  PRIMARY KEY (`id_neo_history`),
  KEY `order_history_order` (`id_neo`),
  KEY `id_employee` (`id_employee`),
  KEY `id_order_state` (`id_neo_state`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;