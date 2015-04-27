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
