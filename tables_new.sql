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
  `id_neo_exchange` int(20) NOT NULL AUTO_INCREMENT,
  `reference` varchar(20) DEFAULT NULL,
  `id_shop_group` int(1) DEFAULT 1,
  `id_shop` int(1) DEFAULT 1,
  `id_lang` int(1) DEFAULT 1,
  `id_customer` int(10) DEFAULT NULL,
  `id_currency` int(1) DEFAULT 1,
  `id_neo_status` smallint(1) DEFAULT NULL,
  `forma_pago` varchar(20) DEFAULT NULL,
  `total_in_favor` decimal(20,2) DEFAULT NULL,
  `total_dif` decimal(20,2) DEFAULT NULL,
  `date_add` datetime DEFAULT NULL,
  `date_upd` datetime DEFAULT NULL,
  PRIMARY KEY (`id_neo_exchange`),
  UNIQUE KEY `REFERENCE` (`reference`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

/*Data for the table `ps_neo_exchanges` */

insert  into `ps_neo_exchanges`(`id_neo_exchange`,`id_customer`,`reference`,`forma_pago`,`total_in_favor`,`total_dif`,`date_add`,`date_upd`,`id_neo_status`)
values
(1,1011,'2015040001','Transferencia',0.00,2911.00,'2015-04-30 17:24:42',NULL,1),
(2,1011,'2015040002','Transferencia',0.00,2911.00,'2015-04-30 17:24:45',NULL,1),
(3,1011,'2015040003','Transferencia',0.00,2911.00,'2015-04-30 17:25:55',NULL,1),
(4,1011,'2015040004','Transferencia',0.00,0.00,'2015-04-30 17:50:33',NULL,1),
(5,1011,'2015040005','Transferencia',0.00,0.00,'2015-04-30 17:52:55',NULL,1),
(6,1011,'2015040006','Transferencia',0.00,1990.00,'2015-05-07 15:48:48',NULL,1),
(7,1011,'2015040007','Transferencia',0.00,1990.00,'2015-05-07 17:05:48',NULL,1),
(8,1011,'2015040008','Transferencia',0.00,1990.00,'2015-05-07 17:14:57',NULL,1),
(9,1011,'2015040009','Transferencia',5000.00,0.00,'2015-05-11 18:13:51',NULL,1),
(10,1011,'2015040010','Transferencia',5000.00,0.00,'2015-05-12 10:37:38',NULL,1),
(11,1011,'2015040011','Transferencia',5000.00,0.00,'2015-05-12 15:29:59',NULL,1),
(12,1011,'2015050012','Transferencia',5000.00,0.00,'2015-05-19 22:00:13',NULL,1),
(13,1011,'2015050013','Transferencia',0.00,1990.00,'2015-05-19 22:37:50',NULL,1),
(14,1011,'2015050014','Transferencia',0.00,990.00,'2015-05-19 22:44:05',NULL,1),
(15,1011,'201505015','Transferencia',0.00,4667.00,'2015-05-19 23:39:18',NULL,1);

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