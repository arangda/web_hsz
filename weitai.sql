/*
Navicat MySQL Data Transfer

Source Server         : root
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : web_hsz

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2018-04-12 11:03:13
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `weitai`
-- ----------------------------
DROP TABLE IF EXISTS `weitai`;
CREATE TABLE `weitai` (
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
) ENGINE=MyISAM AUTO_INCREMENT=42 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of weitai
-- ----------------------------
INSERT INTO `weitai` VALUES ('33', '赵林', '888999', '女', '33', '好了6', 'file:///C:/Users/Administrator/Desktop/lfkc/index.html', '2018-04-12', '2018-04-12 02:28:01');
INSERT INTO `weitai` VALUES ('34', '赵林', '888999', '女', '33', '好了6', 'file:///C:/Users/Administrator/Desktop/lfkc/index.html', '2018-04-12', '2018-04-12 10:30:26');
INSERT INTO `weitai` VALUES ('35', '赵林', '888999', '女', '33', '好了6', 'file:///C:/Users/Administrator/Desktop/lfkc/index.html', '2018-04-12', '2018-04-12 10:30:38');
INSERT INTO `weitai` VALUES ('36', '赵林', '888999', '女', '33', '好了6', 'file:///C:/Users/Administrator/Desktop/lfkc/index.html', '2018-04-12', '2018-04-12 10:30:52');
INSERT INTO `weitai` VALUES ('37', '赵林', '888999', '女', '33', '好了6', 'file:///C:/Users/Administrator/Desktop/lfkc/index.html', '2018-04-12', '2018-04-12 10:31:05');
INSERT INTO `weitai` VALUES ('38', '赵林', '888999', '女', '33', '好了6', 'file:///C:/Users/Administrator/Desktop/lfkc/index.html', '2018-04-12', '2018-04-12 10:31:29');
INSERT INTO `weitai` VALUES ('39', '阿光', '18165155607', null, null, '人流', null, '2018-04-04', '2018-04-12 10:33:29');
INSERT INTO `weitai` VALUES ('40', ' 啊啊啊啊', '18165152563', null, '33', '好了6', 'file:///C:/Users/Administrator/Desktop/lfkc/index.html', '2018-04-12', '2018-04-12 10:45:29');
INSERT INTO `weitai` VALUES ('41', ' 啊啊啊啊', '18165152563', null, '33', '好了6', 'file:///C:/Users/Administrator/Desktop/lfkc/index.html', '2018-04-12', '2018-04-12 10:59:24');
