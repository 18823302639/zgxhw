/*
Navicat MySQL Data Transfer

Source Server         : 127.0.0.1
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : zgxhw

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2018-10-30 17:59:27
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `admincolumn`
-- ----------------------------
DROP TABLE IF EXISTS `admincolumn`;
CREATE TABLE `admincolumn` (
  `col_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '栏目主键',
  `col_pid` int(11) DEFAULT NULL COMMENT '主键子ID',
  `col_user` char(50) DEFAULT NULL COMMENT '栏目名称',
  `col_display` int(10) DEFAULT NULL COMMENT '是否显示在前端页面',
  PRIMARY KEY (`col_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of admincolumn
-- ----------------------------
INSERT INTO `admincolumn` VALUES ('1', '0', '新闻咨询', '0');
INSERT INTO `admincolumn` VALUES ('2', '0', '关于我们', '0');
INSERT INTO `admincolumn` VALUES ('4', '1', '行业新闻', '0');
INSERT INTO `admincolumn` VALUES ('5', '1', '公司新闻', '0');
INSERT INTO `admincolumn` VALUES ('6', '2', '发展历程', null);

-- ----------------------------
-- Table structure for `adminuser`
-- ----------------------------
DROP TABLE IF EXISTS `adminuser`;
CREATE TABLE `adminuser` (
  `ad_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '系统用户主键',
  `ad_user` char(20) DEFAULT NULL,
  `ad_pwd` char(50) DEFAULT NULL,
  `ad_sex` char(10) DEFAULT NULL COMMENT '性别',
  `ad_tel` char(20) DEFAULT NULL COMMENT '电话',
  `ad_email` char(50) DEFAULT NULL COMMENT '邮箱',
  `ad_ps` char(200) DEFAULT NULL COMMENT '备注',
  PRIMARY KEY (`ad_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='系统管理员用户表';

-- ----------------------------
-- Records of adminuser
-- ----------------------------
INSERT INTO `adminuser` VALUES ('1', '肖轩', '123456', '男', '18823302639', '2274975572@qq.com', '超级管理员');
