/*
Navicat MySQL Data Transfer

Source Server         : hsz
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : web_hsz

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2018-04-17 14:26:37
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `register`
-- ----------------------------
DROP TABLE IF EXISTS `register`;
CREATE TABLE `register` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `tel` bigint(11) NOT NULL,
  `sex` varchar(255) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `disease` varchar(255) DEFAULT NULL,
  `source` varchar(500) DEFAULT NULL,
  `cdate` varchar(255) DEFAULT NULL,
  `rdate` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of register
-- ----------------------------
INSERT INTO `register` VALUES ('1', 'aaa', '18165155600', null, null, null, null, null, null);
INSERT INTO `register` VALUES ('16', 'bbb', '18165155600', null, null, null, null, null, '2018-04-17 00:56:10');
INSERT INTO `register` VALUES ('17', 'bbb', '18165155600', null, null, null, null, null, '2018-04-17 01:03:21');
INSERT INTO `register` VALUES ('18', 'bbb', '18165155600', null, null, null, null, null, '2018-04-17 01:04:04');
INSERT INTO `register` VALUES ('19', 'bbb', '18165155600', null, null, null, null, null, '2018-04-17 09:06:44');
INSERT INTO `register` VALUES ('20', 'reg1', '18165155600', null, null, null, null, null, '2018-04-17 14:20:22');
