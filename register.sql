/*
Navicat MySQL Data Transfer

Source Server         : root
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : web_hsz

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2018-04-04 14:19:18
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
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of register
-- ----------------------------
INSERT INTO `register` VALUES ('1', '王二', '0');
INSERT INTO `register` VALUES ('2', '阿强', '2147483647');
INSERT INTO `register` VALUES ('3', '阿强', '985286416');
INSERT INTO `register` VALUES ('4', '阿强', '244');
INSERT INTO `register` VALUES ('5', '阿强', '244244240');
INSERT INTO `register` VALUES ('6', '阿强', '-1345379776');
INSERT INTO `register` VALUES ('7', '阿强', '-1345379776');
INSERT INTO `register` VALUES ('8', '阿强', '24424424000');
INSERT INTO `register` VALUES ('9', '阿强', '18165155600');
