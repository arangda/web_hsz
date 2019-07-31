/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : web_lianhu

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2019-07-31 10:23:53
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `adminuser`
-- ----------------------------
DROP TABLE IF EXISTS `adminuser`;
CREATE TABLE `adminuser` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `nickname` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `profile` text COLLATE utf8_unicode_ci,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of adminuser
-- ----------------------------
INSERT INTO `adminuser` VALUES ('1', 'admin', '阿让达', 'webmaster@example.com', 'hello,word', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', '$2y$13$n4aDTeKVm9n8HHK9EGweFupro0XEm.ADUsTNI2loqO5O77wDlu52S', null, '10');

-- ----------------------------
-- Table structure for `auth_assignment`
-- ----------------------------
DROP TABLE IF EXISTS `auth_assignment`;
CREATE TABLE `auth_assignment` (
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`item_name`,`user_id`),
  KEY `auth_assignment_user_id_idx` (`user_id`),
  CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of auth_assignment
-- ----------------------------
INSERT INTO `auth_assignment` VALUES ('管理员', '1', '1518354936');
INSERT INTO `auth_assignment` VALUES ('编辑', '1', '1518354936');
INSERT INTO `auth_assignment` VALUES ('编辑', '2', '1518341696');
INSERT INTO `auth_assignment` VALUES ('编辑', '3', '1519700374');

-- ----------------------------
-- Table structure for `auth_item`
-- ----------------------------
DROP TABLE IF EXISTS `auth_item`;
CREATE TABLE `auth_item` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` smallint(6) NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `rule_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`),
  KEY `rule_name` (`rule_name`),
  KEY `idx-auth_item-type` (`type`),
  CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of auth_item
-- ----------------------------
INSERT INTO `auth_item` VALUES ('/*', '2', null, null, null, '1519702741', '1519702741');
INSERT INTO `auth_item` VALUES ('/cat/*', '2', null, null, null, '1519703452', '1519703452');
INSERT INTO `auth_item` VALUES ('/cat/create', '2', null, null, null, '1519703452', '1519703452');
INSERT INTO `auth_item` VALUES ('/cat/delete', '2', null, null, null, '1519703452', '1519703452');
INSERT INTO `auth_item` VALUES ('/cat/index', '2', null, null, null, '1519703452', '1519703452');
INSERT INTO `auth_item` VALUES ('/cat/update', '2', null, null, null, '1519703452', '1519703452');
INSERT INTO `auth_item` VALUES ('/cat/view', '2', null, null, null, '1519703452', '1519703452');
INSERT INTO `auth_item` VALUES ('/comment/approve', '2', null, null, null, '1519701502', '1519701502');
INSERT INTO `auth_item` VALUES ('/post/*', '2', null, null, null, '1519701204', '1519701204');
INSERT INTO `auth_item` VALUES ('/post/create', '2', null, null, null, '1519701204', '1519701204');
INSERT INTO `auth_item` VALUES ('/post/delete', '2', null, null, null, '1519701204', '1519701204');
INSERT INTO `auth_item` VALUES ('/post/index', '2', null, null, null, '1519701204', '1519701204');
INSERT INTO `auth_item` VALUES ('/post/ueditor', '2', null, null, null, '1519701186', '1519701186');
INSERT INTO `auth_item` VALUES ('/post/update', '2', null, null, null, '1519701204', '1519701204');
INSERT INTO `auth_item` VALUES ('/post/upload', '2', null, null, null, '1519781527', '1519781527');
INSERT INTO `auth_item` VALUES ('/post/view', '2', null, null, null, '1519701204', '1519701204');
INSERT INTO `auth_item` VALUES ('/redactor/*', '2', null, null, null, '1519703185', '1519703185');
INSERT INTO `auth_item` VALUES ('修改文章', '2', '修改文章', null, null, '1518341696', '1519701401');
INSERT INTO `auth_item` VALUES ('创建文章', '2', '创建文章', null, null, '1518341696', '1519703567');
INSERT INTO `auth_item` VALUES ('删除文章', '2', '删除文章', null, null, '1518341696', '1519701416');
INSERT INTO `auth_item` VALUES ('文章列表', '2', null, null, null, '1519702179', '1519702179');
INSERT INTO `auth_item` VALUES ('查看文章', '2', null, null, null, '1519703006', '1519703047');
INSERT INTO `auth_item` VALUES ('栏目列表', '2', null, null, null, '1519703481', '1519703481');
INSERT INTO `auth_item` VALUES ('管理员', '1', '系统管理员', null, null, '1518341696', '1519702829');
INSERT INTO `auth_item` VALUES ('编辑', '1', '文章管理员', null, null, '1518341696', '1519781555');
INSERT INTO `auth_item` VALUES ('评论审核', '2', '审核评论', null, null, '1518341696', '1519701509');
INSERT INTO `auth_item` VALUES ('评论审核员', '1', '评论审核员', null, null, '1518341696', '1519701626');
INSERT INTO `auth_item` VALUES ('超级权限', '2', null, null, null, '1519702770', '1519702770');

-- ----------------------------
-- Table structure for `auth_item_child`
-- ----------------------------
DROP TABLE IF EXISTS `auth_item_child`;
CREATE TABLE `auth_item_child` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`),
  CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of auth_item_child
-- ----------------------------
INSERT INTO `auth_item_child` VALUES ('超级权限', '/*');
INSERT INTO `auth_item_child` VALUES ('栏目列表', '/cat/*');
INSERT INTO `auth_item_child` VALUES ('评论审核', '/comment/approve');
INSERT INTO `auth_item_child` VALUES ('创建文章', '/post/create');
INSERT INTO `auth_item_child` VALUES ('删除文章', '/post/delete');
INSERT INTO `auth_item_child` VALUES ('文章列表', '/post/index');
INSERT INTO `auth_item_child` VALUES ('修改文章', '/post/update');
INSERT INTO `auth_item_child` VALUES ('编辑', '/post/upload');
INSERT INTO `auth_item_child` VALUES ('查看文章', '/post/view');
INSERT INTO `auth_item_child` VALUES ('编辑', '/redactor/*');
INSERT INTO `auth_item_child` VALUES ('编辑', '修改文章');
INSERT INTO `auth_item_child` VALUES ('编辑', '创建文章');
INSERT INTO `auth_item_child` VALUES ('编辑', '删除文章');
INSERT INTO `auth_item_child` VALUES ('编辑', '文章列表');
INSERT INTO `auth_item_child` VALUES ('编辑', '查看文章');
INSERT INTO `auth_item_child` VALUES ('编辑', '栏目列表');
INSERT INTO `auth_item_child` VALUES ('评论审核员', '评论审核');
INSERT INTO `auth_item_child` VALUES ('管理员', '超级权限');

-- ----------------------------
-- Table structure for `auth_rule`
-- ----------------------------
DROP TABLE IF EXISTS `auth_rule`;
CREATE TABLE `auth_rule` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of auth_rule
-- ----------------------------

-- ----------------------------
-- Table structure for `cats`
-- ----------------------------
DROP TABLE IF EXISTS `cats`;
CREATE TABLE `cats` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cats
-- ----------------------------
INSERT INTO `cats` VALUES ('1', '新闻');
INSERT INTO `cats` VALUES ('2', '专家');

-- ----------------------------
-- Table structure for `comment`
-- ----------------------------
DROP TABLE IF EXISTS `comment`;
CREATE TABLE `comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `create_time` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `email` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `post_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_comment_post` (`post_id`),
  KEY `FK_comment_user` (`user_id`),
  KEY `FK_comment_status` (`status`),
  CONSTRAINT `FK_comment_post` FOREIGN KEY (`post_id`) REFERENCES `post` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK_comment_status` FOREIGN KEY (`status`) REFERENCES `commentstatus` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK_comment_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of comment
-- ----------------------------

-- ----------------------------
-- Table structure for `commentstatus`
-- ----------------------------
DROP TABLE IF EXISTS `commentstatus`;
CREATE TABLE `commentstatus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `position` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of commentstatus
-- ----------------------------
INSERT INTO `commentstatus` VALUES ('1', '待审核', '1');
INSERT INTO `commentstatus` VALUES ('2', '已审核', '2');

-- ----------------------------
-- Table structure for `migration`
-- ----------------------------
DROP TABLE IF EXISTS `migration`;
CREATE TABLE `migration` (
  `version` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of migration
-- ----------------------------
INSERT INTO `migration` VALUES ('m000000_000000_base', '1462597684');
INSERT INTO `migration` VALUES ('m130524_201442_init', '1462597693');
INSERT INTO `migration` VALUES ('m140506_102106_rbac_init', '1518339368');
INSERT INTO `migration` VALUES ('m170907_052038_rbac_add_index_on_auth_assignment_user_id', '1518339368');

-- ----------------------------
-- Table structure for `post`
-- ----------------------------
DROP TABLE IF EXISTS `post`;
CREATE TABLE `post` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `tags` text COLLATE utf8_unicode_ci,
  `status` int(11) NOT NULL,
  `create_time` int(11) DEFAULT NULL,
  `update_time` int(11) DEFAULT NULL,
  `author_id` int(11) NOT NULL,
  `cat_id` int(11) DEFAULT NULL,
  `label_img` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `subhead` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_post_author` (`author_id`),
  KEY `FK_post_status` (`status`),
  CONSTRAINT `FK_post_author` FOREIGN KEY (`author_id`) REFERENCES `adminuser` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK_post_status` FOREIGN KEY (`status`) REFERENCES `poststatus` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=79 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of post
-- ----------------------------
INSERT INTO `post` VALUES ('78', '测试文章4', '<p>啊啊啊</p><p><img src=\"http://image.com/1/d8e1344e27-rrr.jpg\"></p>', '啊啊', '1', '1520215463', '1520215463', '1', '1', 'http://image.com/20180305/1520214894807448.jpg', null);

-- ----------------------------
-- Table structure for `poststatus`
-- ----------------------------
DROP TABLE IF EXISTS `poststatus`;
CREATE TABLE `poststatus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `position` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of poststatus
-- ----------------------------
INSERT INTO `poststatus` VALUES ('1', '草稿', '1');
INSERT INTO `poststatus` VALUES ('2', '已发布', '2');
INSERT INTO `poststatus` VALUES ('3', '已归档', '3');

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

-- ----------------------------
-- Table structure for `tag`
-- ----------------------------
DROP TABLE IF EXISTS `tag`;
CREATE TABLE `tag` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `frequency` int(11) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=104 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of tag
-- ----------------------------
INSERT INTO `tag` VALUES ('101', '测试', '2');
INSERT INTO `tag` VALUES ('102', '文章', '1');
INSERT INTO `tag` VALUES ('103', '啊啊', '1');

-- ----------------------------
-- Table structure for `user`
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `password_reset_token` (`password_reset_token`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('1', 'arangda', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', '$2y$13$HtJqGRmc76KIRIwokii8AOQ1XZljXiuWCKUGFnH9vkTnfBpHtqgFu', null, 'weixi@weixistyle.com', '10', '1462597929', '1510717662');
INSERT INTO `user` VALUES ('2', 'michael', 'xqGDBMlylihvNddSQgDkjAdpJwV4d02C', '$2y$13$bJC0vECI9EPLq/kia9CAmOT060fxoT/HopseOnY.C9siZJDOoQguK', null, 'mchael@163.com', '0', '1475850924', '1475850924');
INSERT INTO `user` VALUES ('3', 'xugang', 'JTvhWwC-bhV8ibJmLlwx_VCLmJL18q0t', '$2y$13$2.oBEJPLFWShq1tlObLaoeNjmP0hJ90S8sibDhiMDeXEEy11TKLMS', null, '273890638@qq.com', '10', '1513822696', '1513822696');
