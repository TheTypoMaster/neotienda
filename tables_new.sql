/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50617
Source Host           : localhost:3306
Source Database       : neoliam_tienda

Target Server Type    : MYSQL
Target Server Version : 50617
File Encoding         : 65001

Date: 2015-04-27 17:54:32
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for items_buys
-- ----------------------------
DROP TABLE IF EXISTS `items_buys`;
CREATE TABLE `items_buys` (
  `id_item_buy` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_product` bigint(10) DEFAULT NULL,
  `id_order` bigint(10) DEFAULT NULL,
  `name` varchar(200) DEFAULT NULL,
  `price` decimal(20,2) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `status` smallint(1) DEFAULT NULL,
  PRIMARY KEY (`id_item_buy`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of items_buys
-- ----------------------------

-- ----------------------------
-- Table structure for items_sales
-- ----------------------------
DROP TABLE IF EXISTS `items_sales`;
CREATE TABLE `items_sales` (
  `id_item_sale` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_product` bigint(10) DEFAULT NULL,
  `id_order` bigint(10) DEFAULT NULL,
  `name` varchar(200) DEFAULT NULL,
  `price` decimal(20,2) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `update_at` datetime DEFAULT NULL,
  `status` smallint(1) DEFAULT NULL,
  PRIMARY KEY (`id_item_sale`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of items_sales
-- ----------------------------

-- ----------------------------
-- Table structure for orders
-- ----------------------------
DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders` (
  `id_order` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_customer` int(50) DEFAULT NULL,
  `reference`  varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
  `total_in_favor` decimal(20,2) DEFAULT NULL,
  `total_dif` decimal(20,2) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `update_at` datetime DEFAULT NULL,
  `status` smallint(1) DEFAULT NULL,
  PRIMARY KEY (`id_order`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of orders
-- ----------------------------
INSERT INTO `orders` VALUES (1, 1011, '2015040001', 0.00, 2911.00, '2015-4-30 17:24:42', NULL, 1);
INSERT INTO `orders` VALUES (2, 1011, '2015040002', 0.00, 2911.00, '2015-4-30 17:24:45', NULL, 1);
INSERT INTO `orders` VALUES (3, 1011, '2015040003', 0.00, 2911.00, '2015-4-30 17:25:55', NULL, 1);
INSERT INTO `orders` VALUES (4, 1011, '2015040004', 0.00, 0.00, '2015-4-30 17:50:33', NULL, 1);
INSERT INTO `orders` VALUES (5, 1011, '2015040005', 0.00, 0.00, '2015-4-30 17:52:55', NULL, 1);
INSERT INTO `orders` VALUES (6, 1011, '2015040006', 0.00, 1990.00, '2015-5-7 15:48:48', NULL, 1);
INSERT INTO `orders` VALUES (7, 1011, '2015040007', 0.00, 1990.00, '2015-5-7 17:05:48', NULL, 1);
INSERT INTO `orders` VALUES (8, 1011, '2015040008', 0.00, 1990.00, '2015-5-7 17:14:57', NULL, 1);
INSERT INTO `orders` VALUES (9, 1011, '2015040009', 5000.00, 0.00, '2015-5-11 18:13:51', NULL, 1);
INSERT INTO `orders` VALUES (10, 1011, '2015040010', 5000.00, 0.00, '2015-5-12 10:37:38', NULL, 1);
INSERT INTO `orders` VALUES (11, 1011, '2015040011', 5000.00, 0.00, '2015-5-12 15:29:59', NULL, 1);

-- ----------------------------
-- Records of orders
-- ----------------------------

-- ----------------------------
-- Table structure for whitelist
-- ----------------------------
DROP TABLE IF EXISTS `whitelist`;
CREATE TABLE `whitelist` (
  `id_whitelist` bigint(10) NOT NULL AUTO_INCREMENT,
  `id_product` bigint(10) NOT NULL,
  `price` decimal(20,2) NOT NULL,
  PRIMARY KEY (`id_whitelist`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of whitelist
-- ----------------------------
INSERT INTO `whitelist` VALUES ('1', '20', '1000.00');
INSERT INTO `whitelist` VALUES ('2', '1318', '5000.00');
INSERT INTO `whitelist` VALUES ('3', '1325', '1600.00');
INSERT INTO `whitelist` VALUES ('4', '1322', '900.00');
INSERT INTO `whitelist` VALUES ('5', '1320', '150.00');
INSERT INTO `whitelist` VALUES ('6', '1319', '900.00');
INSERT INTO `whitelist` VALUES ('7', '24', '600.00');

-- -----
-- Status
-- -----
CREATE TABLE `status` (
`id_status`  int(10) NOT NULL AUTO_INCREMENT ,
`denominacion`  varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
`created_at`  datetime NULL DEFAULT NULL ,
`updated_at`  datetime NULL DEFAULT NULL ,
`status`  int(1) NULL DEFAULT NULL ,
PRIMARY KEY (`id_status`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci
AUTO_INCREMENT=1
ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of status
-- ----------------------------
INSERT INTO `status` VALUES (1, 'Proceso', '2015-5-19 17:24:42', NULL, 1);
INSERT INTO `status` VALUES (2, '2015040002', '2015-5-19 17:24:45', NULL, 1);
INSERT INTO `status` VALUES (3, '2015040002', '2015-5-19 17:24:45', NULL, 1);
INSERT INTO `status` VALUES (4, '2015040002', '2015-5-19 17:24:45', NULL, 1);