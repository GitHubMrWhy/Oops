/*
Navicat MySQL Data Transfer

Source Server         : root
Source Server Version : 50537
Source Host           : localhost:3306
Source Database       : test

Target Server Type    : MYSQL
Target Server Version : 50537
File Encoding         : 65001

Date: 2014-11-11 18:27:21
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for photo
-- ----------------------------
DROP TABLE IF EXISTS `photo`;
CREATE TABLE `photo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(255) DEFAULT NULL,
  `dates` datetime DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of photo
-- ----------------------------
INSERT INTO `photo` VALUES ('2', '/test/kindeditor/attached/image/20141111/20141111174258_90378.png', '2014-11-11 17:43:01', 'admin');

-- ----------------------------
-- Table structure for reports
-- ----------------------------
DROP TABLE IF EXISTS `reports`;
CREATE TABLE `reports` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `time` varchar(50) NOT NULL,
  `aircraft` varchar(50) DEFAULT NULL,
  `client` varchar(50) DEFAULT NULL,
  `taskNumber` varchar(50) DEFAULT NULL,
  `pilot` varchar(60) DEFAULT NULL,
  `copilot` varchar(60) DEFAULT NULL,
  `paramedic` varchar(60) DEFAULT NULL,
  `paramedic1` varchar(60) DEFAULT NULL,
  `paramedic2` varchar(60) DEFAULT NULL,
  `pname` varchar(60) DEFAULT NULL,
  `pcompany` varchar(60) DEFAULT NULL,
  `pname1` varchar(60) DEFAULT NULL,
  `pcompany1` varchar(60) DEFAULT NULL,
  `pname2` varchar(60) DEFAULT NULL,
  `pcompany2` varchar(60) DEFAULT NULL,
  `paname` varchar(60) DEFAULT NULL,
  `pabirth` varchar(60) DEFAULT NULL,
  `paaddress` varchar(60) DEFAULT NULL,
  `paname1` varchar(60) DEFAULT NULL,
  `pabirth1` varchar(60) DEFAULT NULL,
  `paaddress1` varchar(60) DEFAULT NULL,
  `paname2` varchar(60) DEFAULT NULL,
  `pabirth2` varchar(60) DEFAULT NULL,
  `paaddress2` varchar(60) DEFAULT NULL,
  `detail` text,
  `comments` text,
  `jobType1` int(1) DEFAULT NULL,
  `jobType2` int(1) DEFAULT NULL,
  `jobType3` int(1) DEFAULT NULL,
  `jobType4` int(1) DEFAULT NULL,
  `jobdescribe` text,
  `jobDesc` text,
  `fightDetails1` text,
  `fightDetails2` text,
  `fightDetails3` text,
  `fightDetails4` text,
  `fightDetails5` text,
  `fightDetails6` text,
  `fuelAt` varchar(60) DEFAULT NULL,
  `fuelAdd` varchar(60) DEFAULT NULL,
  `fuelshut` varchar(60) DEFAULT NULL,
  `fuelused` varchar(60) DEFAULT NULL,
  `location` varchar(60) DEFAULT NULL,
  `supplier` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of reports
-- ----------------------------

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `password` varchar(300) NOT NULL,
  `email` varchar(60) NOT NULL,
  `phone` varchar(60) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `phone` (`phone`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('1', 'admin', 'admin', 'q@qq.com', '12312312312');
