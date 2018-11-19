/*
Navicat MySQL Data Transfer

Source Server         : 127.0.0.1
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : zgxhw

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2018-11-19 17:55:45
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `adminarticle`
-- ----------------------------
DROP TABLE IF EXISTS `adminarticle`;
CREATE TABLE `adminarticle` (
  `article_id` int(11) NOT NULL AUTO_INCREMENT,
  `column_id` int(11) DEFAULT NULL COMMENT '栏目id',
  `adminuser` char(20) DEFAULT NULL COMMENT '管理员名称',
  `admin_id` int(11) DEFAULT NULL COMMENT '管理员id',
  `article_title` varchar(100) DEFAULT NULL COMMENT '文章标题',
  `article_img` char(50) DEFAULT NULL COMMENT '文章缩略图',
  `article_text` text COMMENT '文章内容',
  `article_time` datetime DEFAULT NULL COMMENT '写入/修改时间',
  `article_browse` int(11) DEFAULT '0' COMMENT '浏览次数',
  `article_give` int(11) DEFAULT '0' COMMENT '点赞次数',
  `article_title1` varchar(200) DEFAULT NULL COMMENT 'seo标签',
  `article_key` varchar(200) DEFAULT NULL COMMENT 'seo关键词',
  `article_desc` varchar(500) DEFAULT NULL COMMENT 'seo描述',
  `article_sort` enum('1','0') DEFAULT '0' COMMENT '是否置顶（0：默认排序，1：置顶）',
  `article_comment` enum('1','0') DEFAULT '0' COMMENT '是否可评论',
  `article_flag` int(11) DEFAULT '0' COMMENT '文章状态',
  `article_sour` char(50) DEFAULT NULL COMMENT '文章来源',
  PRIMARY KEY (`article_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='文章管理';

-- ----------------------------
-- Records of adminarticle
-- ----------------------------
INSERT INTO `adminarticle` VALUES ('1', null, '肖轩', '1', '123', null, '你好啊', '2018-11-16 11:02:50', '0', '0', null, null, null, null, null, '0', null);

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
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of admincolumn
-- ----------------------------
INSERT INTO `admincolumn` VALUES ('12', '11', '亚洲地图', null);
INSERT INTO `admincolumn` VALUES ('11', null, '世界地图', null);
INSERT INTO `admincolumn` VALUES ('4', '1', '行业新闻', '0');
INSERT INTO `admincolumn` VALUES ('5', '1', '公司新闻', '0');
INSERT INTO `admincolumn` VALUES ('6', '2', '发展历程', '0');
INSERT INTO `admincolumn` VALUES ('7', '2', '新闻咨询', null);
INSERT INTO `admincolumn` VALUES ('8', '2', '新闻咨询', null);
INSERT INTO `admincolumn` VALUES ('9', '2', '银行开户', null);
INSERT INTO `admincolumn` VALUES ('10', '1', '123', null);
INSERT INTO `admincolumn` VALUES ('13', '11', '欧洲地图', null);
INSERT INTO `admincolumn` VALUES ('14', '11', '非洲地图', null);
INSERT INTO `admincolumn` VALUES ('15', '12', '中国', null);
INSERT INTO `admincolumn` VALUES ('17', '13', '美国', null);
INSERT INTO `admincolumn` VALUES ('18', '13', '英国', null);

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
