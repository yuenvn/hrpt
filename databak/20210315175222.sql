/*
MySQL Database Backup Tools
Server:127.0.0.1:3306
Database:hros
Data:2021-03-15 17:52:23
*/
SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for izqhr_about
-- ----------------------------
DROP TABLE IF EXISTS `izqhr_about`;
CREATE TABLE `izqhr_about` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tel` varchar(11) NOT NULL,
  `qq` varchar(11) NOT NULL,
  `wx` varchar(20) NOT NULL,
  `url` varchar(100) NOT NULL,
  `name` varchar(30) NOT NULL,
  `version` varchar(30) NOT NULL,
  `create_time` int(10) NOT NULL,
  `update_time` int(10) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='关于我们';
-- ----------------------------
-- Records of izqhr_about
-- ----------------------------
INSERT INTO `izqhr_about` (`id`,`tel`,`qq`,`wx`,`url`,`name`,`version`,`create_time`,`update_time`) VALUES ('1','15887835880','309091579','15887835880','https://www.huzhan.com/ishop9907/','阮先生','IZQHR-V5.0.0','1450757410','1560223845');

-- ----------------------------
-- Table structure for izqhr_admin
-- ----------------------------
DROP TABLE IF EXISTS `izqhr_admin`;
CREATE TABLE `izqhr_admin` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT COMMENT '管理员ID',
  `uname` varchar(20) NOT NULL COMMENT '用户名',
  `admin_tel` varchar(11) NOT NULL COMMENT '手机号',
  `password` char(32) NOT NULL COMMENT '密码',
  `create_time` int(10) NOT NULL COMMENT '创建时间',
  `last_time` int(10) NOT NULL COMMENT '最后登录',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '启用状态【1正常，0禁用】',
  `groupid` mediumint(8) unsigned NOT NULL COMMENT '所属用户组',
  PRIMARY KEY (`id`) USING BTREE,
  KEY `groupid` (`groupid`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='管理员表';
-- ----------------------------
-- Records of izqhr_admin
-- ----------------------------
INSERT INTO `izqhr_admin` (`id`,`uname`,`admin_tel`,`password`,`create_time`,`last_time`,`status`,`groupid`) VALUES ('1','system','15887835880','e10adc3949ba59abbe56e057f20f883e','1501748307','1615797734','1','1');

-- ----------------------------
-- Table structure for izqhr_archives
-- ----------------------------
DROP TABLE IF EXISTS `izqhr_archives`;
CREATE TABLE `izqhr_archives` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '文档ID',
  `title` varchar(150) NOT NULL COMMENT '文档标题',
  `keywords` varchar(255) NOT NULL COMMENT '文档关键词',
  `description` varchar(255) NOT NULL COMMENT '文档描述',
  `member_id` int(11) NOT NULL COMMENT '所属会员',
  `shop_id` int(11) NOT NULL COMMENT '所属店铺',
  `writer` varchar(60) NOT NULL DEFAULT '佚名' COMMENT '文档作者',
  `source` varchar(150) NOT NULL DEFAULT '网络' COMMENT '文档来源',
  `litpic` varchar(150) NOT NULL COMMENT '文档缩略图',
  `attr` varchar(60) NOT NULL COMMENT '文档属性',
  `click` mediumint(9) NOT NULL DEFAULT '1' COMMENT '文档点击量',
  `content` longtext NOT NULL COMMENT '文档内容',
  `column_id` mediumint(9) NOT NULL COMMENT '文档所属栏目',
  `model_id` mediumint(9) NOT NULL COMMENT '文档所属模型',
  `time` int(11) NOT NULL COMMENT '文档发布时间',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='文档表';
-- ----------------------------
-- Records of izqhr_archives
-- ----------------------------

-- ----------------------------
-- Table structure for izqhr_auth_group
-- ----------------------------
DROP TABLE IF EXISTS `izqhr_auth_group`;
CREATE TABLE `izqhr_auth_group` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `title` char(100) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `rules` text NOT NULL COMMENT '权限规则ID',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;
-- ----------------------------
-- Records of izqhr_auth_group
-- ----------------------------
INSERT INTO `izqhr_auth_group` (`id`,`title`,`status`,`rules`) VALUES ('1','系统管理员','1','1,11,12,32,33,13,175,183,81,2,14,34,35,36,56,57,58,15,37,38,39,40,3,16,41,42,59,17,5,20,45,46,120,21,6,22,47,48,23,7,24,49,50,55,121,122,25,176,177,178,179,180,181,182,166,167,168,169,170,171,172,173,174');
INSERT INTO `izqhr_auth_group` (`id`,`title`,`status`,`rules`) VALUES ('2','超级管理员','1','1,11,175,3,16,41,42,59,17,7,24,49,50,55,121,122,25,176,177,178,179,180,181,182,166,167,168,169,170,171,172,173,174');
INSERT INTO `izqhr_auth_group` (`id`,`title`,`status`,`rules`) VALUES ('3','普通管理员','1','1,175,7,24,49,50,55,121,122,25,176,177,178,179,180,181,182,166,167,168,169,170,171,172,173,174');

-- ----------------------------
-- Table structure for izqhr_auth_group_access
-- ----------------------------
DROP TABLE IF EXISTS `izqhr_auth_group_access`;
CREATE TABLE `izqhr_auth_group_access` (
  `uid` mediumint(8) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL,
  UNIQUE KEY `uid_group_id` (`uid`,`group_id`) USING BTREE,
  KEY `uid` (`uid`) USING BTREE,
  KEY `group_id` (`group_id`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=FIXED;
-- ----------------------------
-- Records of izqhr_auth_group_access
-- ----------------------------
INSERT INTO `izqhr_auth_group_access` (`uid`,`group_id`) VALUES ('1','1');

-- ----------------------------
-- Table structure for izqhr_auth_rule
-- ----------------------------
DROP TABLE IF EXISTS `izqhr_auth_rule`;
CREATE TABLE `izqhr_auth_rule` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` char(80) NOT NULL,
  `title` char(20) NOT NULL,
  `type` tinyint(1) NOT NULL DEFAULT '1',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `show` tinyint(1) NOT NULL DEFAULT '1' COMMENT '菜单是否显示',
  `isshow` tinyint(1) NOT NULL DEFAULT '0' COMMENT '控制隐藏菜单0为不允许设置菜单显示隐藏',
  `condition` char(100) NOT NULL,
  `pid` mediumint(11) NOT NULL DEFAULT '0' COMMENT '上级规则ID 0为顶级规则',
  `icon` varchar(100) NOT NULL COMMENT '图标',
  `sort` mediumint(5) NOT NULL DEFAULT '50' COMMENT '规则排序',
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE KEY `name` (`name`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=184 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;
-- ----------------------------
-- Records of izqhr_auth_rule
-- ----------------------------
INSERT INTO `izqhr_auth_rule` (`id`,`name`,`title`,`type`,`status`,`show`,`isshow`,`condition`,`pid`,`icon`,`sort`) VALUES ('1','admin/Conf','系统配置','1','1','1','0','','0','glyphicon glyphicon-th','1');
INSERT INTO `izqhr_auth_rule` (`id`,`name`,`title`,`type`,`status`,`show`,`isshow`,`condition`,`pid`,`icon`,`sort`) VALUES ('2','admin/Auth','权限配置','1','1','1','0','','0','glyphicon glyphicon-lock','10');
INSERT INTO `izqhr_auth_rule` (`id`,`name`,`title`,`type`,`status`,`show`,`isshow`,`condition`,`pid`,`icon`,`sort`) VALUES ('3','admin/Admin','系统管理','1','1','1','0','','0','glyphicon glyphicon-record','20');
INSERT INTO `izqhr_auth_rule` (`id`,`name`,`title`,`type`,`status`,`show`,`isshow`,`condition`,`pid`,`icon`,`sort`) VALUES ('5','admin/Model','模型管理','1','1','1','1','','0','glyphicon glyphicon-tasks','30');
INSERT INTO `izqhr_auth_rule` (`id`,`name`,`title`,`type`,`status`,`show`,`isshow`,`condition`,`pid`,`icon`,`sort`) VALUES ('6','admin/ModelFields','字段管理','1','1','1','1','','0','glyphicon glyphicon-th-large','40');
INSERT INTO `izqhr_auth_rule` (`id`,`name`,`title`,`type`,`status`,`show`,`isshow`,`condition`,`pid`,`icon`,`sort`) VALUES ('7','admin/Structure','组织管理','1','1','1','0','','0','glyphicon glyphicon-menu-hamburger','50');
INSERT INTO `izqhr_auth_rule` (`id`,`name`,`title`,`type`,`status`,`show`,`isshow`,`condition`,`pid`,`icon`,`sort`) VALUES ('11','admin/Conf/configs','配置列表','1','1','1','0','','1','','50');
INSERT INTO `izqhr_auth_rule` (`id`,`name`,`title`,`type`,`status`,`show`,`isshow`,`condition`,`pid`,`icon`,`sort`) VALUES ('12','admin/Conf/lists','配置管理','1','1','1','0','','1','','50');
INSERT INTO `izqhr_auth_rule` (`id`,`name`,`title`,`type`,`status`,`show`,`isshow`,`condition`,`pid`,`icon`,`sort`) VALUES ('13','admin/Conf/add','添加配置','1','1','1','0','','1','','50');
INSERT INTO `izqhr_auth_rule` (`id`,`name`,`title`,`type`,`status`,`show`,`isshow`,`condition`,`pid`,`icon`,`sort`) VALUES ('14','admin/AuthRule/lists','规则列表','1','1','1','0','','2','','50');
INSERT INTO `izqhr_auth_rule` (`id`,`name`,`title`,`type`,`status`,`show`,`isshow`,`condition`,`pid`,`icon`,`sort`) VALUES ('15','admin/AuthGroup/lists','用户组管理','1','1','1','0','','2','','50');
INSERT INTO `izqhr_auth_rule` (`id`,`name`,`title`,`type`,`status`,`show`,`isshow`,`condition`,`pid`,`icon`,`sort`) VALUES ('16','admin/Admin/lists','管理员列表','1','1','1','0','','3','','50');
INSERT INTO `izqhr_auth_rule` (`id`,`name`,`title`,`type`,`status`,`show`,`isshow`,`condition`,`pid`,`icon`,`sort`) VALUES ('17','admin/Admin/add','添加管理员','1','1','1','0','','3','','50');
INSERT INTO `izqhr_auth_rule` (`id`,`name`,`title`,`type`,`status`,`show`,`isshow`,`condition`,`pid`,`icon`,`sort`) VALUES ('20','admin/Model/lists','模型列表','1','1','1','0','','5','','50');
INSERT INTO `izqhr_auth_rule` (`id`,`name`,`title`,`type`,`status`,`show`,`isshow`,`condition`,`pid`,`icon`,`sort`) VALUES ('21','admin/Model/add','添加模型','1','1','1','0','','5','','50');
INSERT INTO `izqhr_auth_rule` (`id`,`name`,`title`,`type`,`status`,`show`,`isshow`,`condition`,`pid`,`icon`,`sort`) VALUES ('22','admin/ModelFields/lists','字段列表','1','1','1','0','','6','','50');
INSERT INTO `izqhr_auth_rule` (`id`,`name`,`title`,`type`,`status`,`show`,`isshow`,`condition`,`pid`,`icon`,`sort`) VALUES ('23','admin/ModelFields/add','添加字段','1','1','1','0','','6','','50');
INSERT INTO `izqhr_auth_rule` (`id`,`name`,`title`,`type`,`status`,`show`,`isshow`,`condition`,`pid`,`icon`,`sort`) VALUES ('24','admin/Structure/lists','组织架构列表','1','1','1','0','','7','','50');
INSERT INTO `izqhr_auth_rule` (`id`,`name`,`title`,`type`,`status`,`show`,`isshow`,`condition`,`pid`,`icon`,`sort`) VALUES ('25','admin/Structure/add','添加组织架构','1','1','1','0','','7','','50');
INSERT INTO `izqhr_auth_rule` (`id`,`name`,`title`,`type`,`status`,`show`,`isshow`,`condition`,`pid`,`icon`,`sort`) VALUES ('166','admin/Staff','员工管理','1','1','1','0','','0','glyphicon glyphicon-list-alt','60');
INSERT INTO `izqhr_auth_rule` (`id`,`name`,`title`,`type`,`status`,`show`,`isshow`,`condition`,`pid`,`icon`,`sort`) VALUES ('167','admin/Staff/add','添加员工','1','1','1','0','','166','','50');
INSERT INTO `izqhr_auth_rule` (`id`,`name`,`title`,`type`,`status`,`show`,`isshow`,`condition`,`pid`,`icon`,`sort`) VALUES ('168','admin/Staff/lists','员工列表','1','1','1','0','','166','','50');
INSERT INTO `izqhr_auth_rule` (`id`,`name`,`title`,`type`,`status`,`show`,`isshow`,`condition`,`pid`,`icon`,`sort`) VALUES ('32','admin/Conf/edit','编辑配置','1','1','0','0','','12','','50');
INSERT INTO `izqhr_auth_rule` (`id`,`name`,`title`,`type`,`status`,`show`,`isshow`,`condition`,`pid`,`icon`,`sort`) VALUES ('33','admin/Conf/del','删除配置','1','1','0','0','','12','','50');
INSERT INTO `izqhr_auth_rule` (`id`,`name`,`title`,`type`,`status`,`show`,`isshow`,`condition`,`pid`,`icon`,`sort`) VALUES ('34','admin/AuthRule/add','添加规则','1','1','1','0','','14','','50');
INSERT INTO `izqhr_auth_rule` (`id`,`name`,`title`,`type`,`status`,`show`,`isshow`,`condition`,`pid`,`icon`,`sort`) VALUES ('35','admin/AuthRule/edit','编辑规则','1','1','1','0','','14','','50');
INSERT INTO `izqhr_auth_rule` (`id`,`name`,`title`,`type`,`status`,`show`,`isshow`,`condition`,`pid`,`icon`,`sort`) VALUES ('36','admin/AuthRule/del','删除规则','1','1','0','0','','14','','50');
INSERT INTO `izqhr_auth_rule` (`id`,`name`,`title`,`type`,`status`,`show`,`isshow`,`condition`,`pid`,`icon`,`sort`) VALUES ('37','admin/AuthGroup/add','添加用户组','1','1','0','0','','15','','50');
INSERT INTO `izqhr_auth_rule` (`id`,`name`,`title`,`type`,`status`,`show`,`isshow`,`condition`,`pid`,`icon`,`sort`) VALUES ('38','admin/AuthGroup/edit','编辑用户组','1','1','0','0','','15','','50');
INSERT INTO `izqhr_auth_rule` (`id`,`name`,`title`,`type`,`status`,`show`,`isshow`,`condition`,`pid`,`icon`,`sort`) VALUES ('39','admin/AuthGroup/del','删除用户组','1','1','0','0','','15','','50');
INSERT INTO `izqhr_auth_rule` (`id`,`name`,`title`,`type`,`status`,`show`,`isshow`,`condition`,`pid`,`icon`,`sort`) VALUES ('40','admin/AuthGroup/power','用户组权限分配','1','1','0','0','','15','','50');
INSERT INTO `izqhr_auth_rule` (`id`,`name`,`title`,`type`,`status`,`show`,`isshow`,`condition`,`pid`,`icon`,`sort`) VALUES ('41','admin/Admin/edit','编辑管理员','1','1','0','0','','16','','50');
INSERT INTO `izqhr_auth_rule` (`id`,`name`,`title`,`type`,`status`,`show`,`isshow`,`condition`,`pid`,`icon`,`sort`) VALUES ('42','admin/Admin/del','删除管理员','1','1','0','0','','16','','50');
INSERT INTO `izqhr_auth_rule` (`id`,`name`,`title`,`type`,`status`,`show`,`isshow`,`condition`,`pid`,`icon`,`sort`) VALUES ('45','admin/Model/edit','编辑模型','1','1','0','1','','20','','50');
INSERT INTO `izqhr_auth_rule` (`id`,`name`,`title`,`type`,`status`,`show`,`isshow`,`condition`,`pid`,`icon`,`sort`) VALUES ('46','admin/Model/del','删除模型','1','1','0','1','','20','','50');
INSERT INTO `izqhr_auth_rule` (`id`,`name`,`title`,`type`,`status`,`show`,`isshow`,`condition`,`pid`,`icon`,`sort`) VALUES ('47','admin/ModelFields/edit','编辑字段','1','1','0','1','','22','','50');
INSERT INTO `izqhr_auth_rule` (`id`,`name`,`title`,`type`,`status`,`show`,`isshow`,`condition`,`pid`,`icon`,`sort`) VALUES ('48','admin/ModelFields/del','删除字段','1','1','0','1','','22','','50');
INSERT INTO `izqhr_auth_rule` (`id`,`name`,`title`,`type`,`status`,`show`,`isshow`,`condition`,`pid`,`icon`,`sort`) VALUES ('49','admin/Column/edit','编辑栏目','1','1','0','1','','24','','50');
INSERT INTO `izqhr_auth_rule` (`id`,`name`,`title`,`type`,`status`,`show`,`isshow`,`condition`,`pid`,`icon`,`sort`) VALUES ('50','admin/Column/del','删除栏目','1','1','0','1','','24','','50');
INSERT INTO `izqhr_auth_rule` (`id`,`name`,`title`,`type`,`status`,`show`,`isshow`,`condition`,`pid`,`icon`,`sort`) VALUES ('55','admin/Column/isShowHidden','栏目伸缩','1','1','0','1','','24','','50');
INSERT INTO `izqhr_auth_rule` (`id`,`name`,`title`,`type`,`status`,`show`,`isshow`,`condition`,`pid`,`icon`,`sort`) VALUES ('56','admin/AuthRule/isShowHidden','规则伸缩','1','1','0','1','','14','','50');
INSERT INTO `izqhr_auth_rule` (`id`,`name`,`title`,`type`,`status`,`show`,`isshow`,`condition`,`pid`,`icon`,`sort`) VALUES ('57','admin/AuthRule/status','规则开关','1','1','0','1','','14','','50');
INSERT INTO `izqhr_auth_rule` (`id`,`name`,`title`,`type`,`status`,`show`,`isshow`,`condition`,`pid`,`icon`,`sort`) VALUES ('58','admin/AuthRule/show','菜单显示与隐藏','1','1','0','1','','14','','50');
INSERT INTO `izqhr_auth_rule` (`id`,`name`,`title`,`type`,`status`,`show`,`isshow`,`condition`,`pid`,`icon`,`sort`) VALUES ('59','admin/Admin/status','管理员开启关闭','1','1','0','1','','16','','50');
INSERT INTO `izqhr_auth_rule` (`id`,`name`,`title`,`type`,`status`,`show`,`isshow`,`condition`,`pid`,`icon`,`sort`) VALUES ('81','admin/Bak/bak','备份网站数据','1','1','1','0','','1','','50');
INSERT INTO `izqhr_auth_rule` (`id`,`name`,`title`,`type`,`status`,`show`,`isshow`,`condition`,`pid`,`icon`,`sort`) VALUES ('120','admin/Model/status','模型启用状态','1','1','1','0','','20','','50');
INSERT INTO `izqhr_auth_rule` (`id`,`name`,`title`,`type`,`status`,`show`,`isshow`,`condition`,`pid`,`icon`,`sort`) VALUES ('121','admin/Column/delall','批量删除','1','1','1','0','','24','','50');
INSERT INTO `izqhr_auth_rule` (`id`,`name`,`title`,`type`,`status`,`show`,`isshow`,`condition`,`pid`,`icon`,`sort`) VALUES ('122','admin/Column/status','栏目状态','1','1','1','0','','24','','50');
INSERT INTO `izqhr_auth_rule` (`id`,`name`,`title`,`type`,`status`,`show`,`isshow`,`condition`,`pid`,`icon`,`sort`) VALUES ('169','admin/Staff/edit','编辑员工','1','1','1','0','','168','','50');
INSERT INTO `izqhr_auth_rule` (`id`,`name`,`title`,`type`,`status`,`show`,`isshow`,`condition`,`pid`,`icon`,`sort`) VALUES ('170','admin/Staff/del','删除员工','1','1','1','0','','168','','50');
INSERT INTO `izqhr_auth_rule` (`id`,`name`,`title`,`type`,`status`,`show`,`isshow`,`condition`,`pid`,`icon`,`sort`) VALUES ('171','admin/Staff/vitae','查看简历','1','1','1','0','','168','','50');
INSERT INTO `izqhr_auth_rule` (`id`,`name`,`title`,`type`,`status`,`show`,`isshow`,`condition`,`pid`,`icon`,`sort`) VALUES ('172','admin/Staff/ajaxDelTraining','AJAX删除培训记录','1','1','1','0','','168','','50');
INSERT INTO `izqhr_auth_rule` (`id`,`name`,`title`,`type`,`status`,`show`,`isshow`,`condition`,`pid`,`icon`,`sort`) VALUES ('173','admin/Staff/ajaxDelServices','AJAX删除服务评价','1','1','1','0','','168','','50');
INSERT INTO `izqhr_auth_rule` (`id`,`name`,`title`,`type`,`status`,`show`,`isshow`,`condition`,`pid`,`icon`,`sort`) VALUES ('174','admin/Staff/getCityInfo','获取籍贯','1','1','1','0','','168','','50');
INSERT INTO `izqhr_auth_rule` (`id`,`name`,`title`,`type`,`status`,`show`,`isshow`,`condition`,`pid`,`icon`,`sort`) VALUES ('175','admin/Index/clearCache','清空缓存','1','1','0','1','','1','','50');
INSERT INTO `izqhr_auth_rule` (`id`,`name`,`title`,`type`,`status`,`show`,`isshow`,`condition`,`pid`,`icon`,`sort`) VALUES ('176','admin/Enterprise','企业档案','1','1','1','0','','0','glyphicon glyphicon-road','50');
INSERT INTO `izqhr_auth_rule` (`id`,`name`,`title`,`type`,`status`,`show`,`isshow`,`condition`,`pid`,`icon`,`sort`) VALUES ('177','admin/Enterprise/add','添加企业档案','1','1','1','0','','176','','50');
INSERT INTO `izqhr_auth_rule` (`id`,`name`,`title`,`type`,`status`,`show`,`isshow`,`condition`,`pid`,`icon`,`sort`) VALUES ('178','admin/Enterprise/lists','企业档案列表','1','1','1','0','','176','','50');
INSERT INTO `izqhr_auth_rule` (`id`,`name`,`title`,`type`,`status`,`show`,`isshow`,`condition`,`pid`,`icon`,`sort`) VALUES ('179','admin/Enterprise/edit','编辑企业档案','1','1','1','0','','178','','50');
INSERT INTO `izqhr_auth_rule` (`id`,`name`,`title`,`type`,`status`,`show`,`isshow`,`condition`,`pid`,`icon`,`sort`) VALUES ('180','admin/Enterprise/del','删除企业档案','1','1','1','0','','178','','50');
INSERT INTO `izqhr_auth_rule` (`id`,`name`,`title`,`type`,`status`,`show`,`isshow`,`condition`,`pid`,`icon`,`sort`) VALUES ('181','admin/Enterprise/info','企业档案详情','1','1','1','0','','178','','50');
INSERT INTO `izqhr_auth_rule` (`id`,`name`,`title`,`type`,`status`,`show`,`isshow`,`condition`,`pid`,`icon`,`sort`) VALUES ('182','admin/Enterprise/ajaxDelGoodsInfo','AJAX删除企业良好信息','1','1','1','0','','178','','50');
INSERT INTO `izqhr_auth_rule` (`id`,`name`,`title`,`type`,`status`,`show`,`isshow`,`condition`,`pid`,`icon`,`sort`) VALUES ('183','admin/FactorySettings/restoreFactorySettings','初始化系统','1','1','1','1','','1','','50');

-- ----------------------------
-- Table structure for izqhr_column
-- ----------------------------
DROP TABLE IF EXISTS `izqhr_column`;
CREATE TABLE `izqhr_column` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '栏目ID',
  `typename` varchar(30) NOT NULL COMMENT '栏目名称',
  `title` varchar(255) NOT NULL COMMENT '栏目标题',
  `keywords` varchar(255) NOT NULL COMMENT '栏目关键词',
  `description` varchar(255) NOT NULL COMMENT '栏目描述',
  `sort` smallint(6) NOT NULL DEFAULT '50' COMMENT '栏目排序',
  `content` text NOT NULL COMMENT '栏目内容',
  `state` tinyint(1) NOT NULL DEFAULT '0' COMMENT '栏目隐藏状态 0关闭 1开启',
  `img` varchar(255) NOT NULL COMMENT '栏目图片',
  `c_attr` tinyint(1) NOT NULL DEFAULT '1' COMMENT '栏目属性',
  `link` varchar(255) NOT NULL COMMENT '外部链接地址',
  `index_template` varchar(60) NOT NULL COMMENT '栏目封面模版',
  `list_template` varchar(60) NOT NULL COMMENT '栏目列表模版',
  `content_template` varchar(60) NOT NULL COMMENT '栏目内容模版',
  `pid` int(11) NOT NULL DEFAULT '0' COMMENT '栏目父ID',
  `modelid` int(11) NOT NULL COMMENT '模型ID',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='栏目表';
-- ----------------------------
-- Records of izqhr_column
-- ----------------------------

-- ----------------------------
-- Table structure for izqhr_common_district
-- ----------------------------
DROP TABLE IF EXISTS `izqhr_common_district`;
CREATE TABLE `izqhr_common_district` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT '',
  `level` tinyint(4) unsigned NOT NULL DEFAULT '0',
  `usetype` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `upid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `displayorder` smallint(6) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`) USING BTREE,
  KEY `upid` (`upid`,`displayorder`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=45052 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;
-- ----------------------------
-- Records of izqhr_common_district
-- ----------------------------
INSERT INTO `izqhr_common_district` (`id`,`name`,`level`,`usetype`,`upid`,`displayorder`) VALUES ('1','北京市','1','3','0','0');
INSERT INTO `izqhr_common_district` (`id`,`name`,`level`,`usetype`,`upid`,`displayorder`) VALUES ('2','天津市','1','3','0','0');
INSERT INTO `izqhr_common_district` (`id`,`name`,`level`,`usetype`,`upid`,`displayorder`) VALUES ('3','河北省','1','3','0','0');
INSERT INTO `izqhr_common_district` (`id`,`name`,`level`,`usetype`,`upid`,`displayorder`) VALUES ('4','山西省','1','3','0','0');
INSERT INTO `izqhr_common_district` (`id`,`name`,`level`,`usetype`,`upid`,`displayorder`) VALUES ('5','内蒙古自治区','1','3','0','0');
INSERT INTO `izqhr_common_district` (`id`,`name`,`level`,`usetype`,`upid`,`displayorder`) VALUES ('6','辽宁省','1','3','0','0');
INSERT INTO `izqhr_common_district` (`id`,`name`,`level`,`usetype`,`upid`,`displayorder`) VALUES ('7','吉林省','1','3','0','0');
INSERT INTO `izqhr_common_district` (`id`,`name`,`level`,`usetype`,`upid`,`displayorder`) VALUES ('8','黑龙江省','1','3','0','0');
INSERT INTO `izqhr_common_district` (`id`,`name`,`level`,`usetype`,`upid`,`displayorder`) VALUES ('9','上海市','1','3','0','0');
INSERT INTO `izqhr_common_district` (`id`,`name`,`level`,`usetype`,`upid`,`displayorder`) VALUES ('10','江苏省','1','3','0','0');
INSERT INTO `izqhr_common_district` (`id`,`name`,`level`,`usetype`,`upid`,`displayorder`) VALUES ('11','浙江省','1','3','0','0');
INSERT INTO `izqhr_common_district` (`id`,`name`,`level`,`usetype`,`upid`,`displayorder`) VALUES ('12','安徽省','1','3','0','0');
INSERT INTO `izqhr_common_district` (`id`,`name`,`level`,`usetype`,`upid`,`displayorder`) VALUES ('13','福建省','1','3','0','0');
INSERT INTO `izqhr_common_district` (`id`,`name`,`level`,`usetype`,`upid`,`displayorder`) VALUES ('14','江西省','1','3','0','0');
INSERT INTO `izqhr_common_district` (`id`,`name`,`level`,`usetype`,`upid`,`displayorder`) VALUES ('15','山东省','1','3','0','0');
INSERT INTO `izqhr_common_district` (`id`,`name`,`level`,`usetype`,`upid`,`displayorder`) VALUES ('16','河南省','1','3','0','0');
INSERT INTO `izqhr_common_district` (`id`,`name`,`level`,`usetype`,`upid`,`displayorder`) VALUES ('17','湖北省','1','3','0','0');
INSERT INTO `izqhr_common_district` (`id`,`name`,`level`,`usetype`,`upid`,`displayorder`) VALUES ('18','湖南省','1','3','0','0');
INSERT INTO `izqhr_common_district` (`id`,`name`,`level`,`usetype`,`upid`,`displayorder`) VALUES ('19','广东省','1','3','0','0');
INSERT INTO `izqhr_common_district` (`id`,`name`,`level`,`usetype`,`upid`,`displayorder`) VALUES ('20','广西壮族自治区','1','3','0','0');
INSERT INTO `izqhr_common_district` (`id`,`name`,`level`,`usetype`,`upid`,`displayorder`) VALUES ('21','海南省','1','3','0','0');
INSERT INTO `izqhr_common_district` (`id`,`name`,`level`,`usetype`,`upid`,`displayorder`) VALUES ('22','重庆市','1','3','0','0');
INSERT INTO `izqhr_common_district` (`id`,`name`,`level`,`usetype`,`upid`,`displayorder`) VALUES ('23','四川省','1','3','0','0');
INSERT INTO `izqhr_common_district` (`id`,`name`,`level`,`usetype`,`upid`,`displayorder`) VALUES ('24','贵州省','1','3','0','0');
INSERT INTO `izqhr_common_district` (`id`,`name`,`level`,`usetype`,`upid`,`displayorder`) VALUES ('25','云南省','1','3','0','0');
INSERT INTO `izqhr_common_district` (`id`,`name`,`level`,`usetype`,`upid`,`displayorder`) VALUES ('26','西藏自治区','1','3','0','0');
INSERT INTO `izqhr_common_district` (`id`,`name`,`level`,`usetype`,`upid`,`displayorder`) VALUES ('27','陕西省','1','3','0','0');
INSERT INTO `izqhr_common_district` (`id`,`name`,`level`,`usetype`,`upid`,`displayorder`) VALUES ('28','甘肃省','1','3','0','0');
INSERT INTO `izqhr_common_district` (`id`,`name`,`level`,`usetype`,`upid`,`displayorder`) VALUES ('29','青海省','1','3','0','0');
INSERT INTO `izqhr_common_district` (`id`,`name`,`level`,`usetype`,`upid`,`displayorder`) VALUES ('30','宁夏回族自治区','1','3','0','0');
INSERT INTO `izqhr_common_district` (`id`,`name`,`level`,`usetype`,`upid`,`displayorder`) VALUES ('31','新疆维吾尔自治区','1','3','0','0');
INSERT INTO `izqhr_common_district` (`id`,`name`,`level`,`usetype`,`upid`,`displayorder`) VALUES ('32','台湾省','1','3','0','0');
INSERT INTO `izqhr_common_district` (`id`,`name`,`level`,`usetype`,`upid`,`displayorder`) VALUES ('33','香港特别行政区','1','3','0','0');
INSERT INTO `izqhr_common_district` (`id`,`name`,`level`,`usetype`,`upid`,`displayorder`) VALUES ('34','澳门特别行政区','1','3','0','0');
INSERT INTO `izqhr_common_district` (`id`,`name`,`level`,`usetype`,`upid`,`displayorder`) VALUES ('35','海外','1','3','0','0');
INSERT INTO `izqhr_common_district` (`id`,`name`,`level`,`usetype`,`upid`,`displayorder`) VALUES ('36','其他','1','3','0','0');
INSERT INTO `izqhr_common_district` (`id`,`name`,`level`,`usetype`,`upid`,`displayorder`) VALUES ('37','东城区','2','0','1','0');
INSERT INTO `izqhr_common_district` (`id`,`name`,`level`,`usetype`,`upid`,`displayorder`) VALUES ('38','西城区','2','0','1','0');
INSERT INTO `izqhr_common_district` (`id`,`name`,`level`,`usetype`,`upid`,`displayorder`) VALUES ('39','崇文区','2','0','1','0');
INSERT INTO `izqhr_common_district` (`id`,`name`,`level`,`usetype`,`upid`,`displayorder`) VALUES ('40','宣武区','2','0','1','0');
INSERT INTO `izqhr_common_district` (`id`,`name`,`level`,`usetype`,`upid`,`displayorder`) VALUES ('41','朝阳区','2','0','1','0');
INSERT INTO `izqhr_common_district` (`id`,`name`,`level`,`usetype`,`upid`,`displayorder`) VALUES ('42','丰台区','2','0','1','0');
INSERT INTO `izqhr_common_district` (`id`,`name`,`level`,`usetype`,`upid`,`displayorder`) VALUES ('43','石景山区','2','0','1','0');
INSERT INTO `izqhr_common_district` (`id`,`name`,`level`,`usetype`,`upid`,`displayorder`) VALUES ('44','海淀区','2','0','1','0');
INSERT INTO `izqhr_common_district` (`id`,`name`,`level`,`usetype`,`upid`,`displayorder`) VALUES ('45','门头沟区','2','0','1','0');
INSERT INTO `izqhr_common_district` (`id`,`name`,`level`,`usetype`,`upid`,`displayorder`) VALUES ('46','房山区','2','0','1','0');
INSERT INTO `izqhr_common_district` (`id`,`name`,`level`,`usetype`,`upid`,`displayorder`) VALUES ('47','通州区','2','0','1','0');
INSERT INTO `izqhr_common_district` (`id`,`name`,`level`,`usetype`,`upid`,`displayorder`) VALUES ('48','顺义区','2','0','1','0');
INSERT INTO `izqhr_common_district` (`id`,`name`,`level`,`usetype`,`upid`,`displayorder`) VALUES ('49','昌平区','2','0','1','0');
INSERT INTO `izqhr_common_district` (`id`,`name`,`level`,`usetype`,`upid`,`displayorder`) VALUES ('50','大兴区','2','0','1','0');
INSERT INTO `izqhr_common_district` (`id`,`name`,`level`,`usetype`,`upid`,`displayorder`) VALUES ('51','怀柔区','2','0','1','0');
INSERT INTO `izqhr_common_district` (`id`,`name`,`level`,`usetype`,`upid`,`displayorder`) VALUES ('52','平谷区','2','0','1','0');
INSERT INTO `izqhr_common_district` (`id`,`name`,`level`,`usetype`,`upid`,`displayorder`) VALUES ('53','密云县','2','0','1','0');
INSERT INTO `izqhr_common_district` (`id`,`name`,`level`,`usetype`,`upid`,`displayorder`) VALUES ('54','延庆县','2','0','1','0');
INSERT INTO `izqhr_common_district` (`id`,`name`,`level`,`usetype`,`upid`,`displayorder`) VALUES ('55','和平区','2','0','2','0');
INSERT INTO `izqhr_common_district` (`id`,`name`,`level`,`usetype`,`upid`,`displayorder`) VALUES ('56','河东区','2','0','2','0');
INSERT INTO `izqhr_common_district` (`id`,`name`,`level`,`usetype`,`upid`,`displayorder`) VALUES ('57','河西区','2','0','2','0');
INSERT INTO `izqhr_common_district` (`id`,`name`,`level`,`usetype`,`upid`,`displayorder`) VALUES ('58','南开区','2','0','2','0');
INSERT INTO `izqhr_common_district` (`id`,`name`,`level`,`usetype`,`upid`,`displayorder`) VALUES ('59','河北区','2','0','2','0');
INSERT INTO `izqhr_common_district` (`id`,`name`,`level`,`usetype`,`upid`,`displayorder`) VALUES ('60','红桥区','2','0','2','0');
INSERT INTO `izqhr_common_district` (`id`,`name`,`level`,`usetype`,`upid`,`displayorder`) VALUES ('61','塘沽区','2','0','2','0');
INSERT INTO `izqhr_common_district` (`id`,`name`,`level`,`usetype`,`upid`,`displayorder`) VALUES ('62','汉沽区','2','0','2','0');
INSERT INTO `izqhr_common_district` (`id`,`name`,`level`,`usetype`,`upid`,`displayorder`) VALUES ('63','大港区','2','0','2','0');
INSERT INTO `izqhr_common_district` (`id`,`name`,`level`,`usetype`,`upid`,`displayorder`) VALUES ('64','东丽区','2','0','2','0');
INSERT INTO `izqhr_common_district` (`id`,`name`,`level`,`usetype`,`upid`,`displayorder`) VALUES ('65','西青区','2','0','2','0');
INSERT INTO `izqhr_common_district` (`id`,`name`,`level`,`usetype`,`upid`,`displayorder`) VALUES ('66','津南区','2','0','2','0');
INSERT INTO `izqhr_common_district` (`id`,`name`,`level`,`usetype`,`upid`,`displayorder`) VALUES ('67','北辰区','2','0','2','0');
INSERT INTO `izqhr_common_district` (`id`,`name`,`level`,`usetype`,`upid`,`displayorder`) VALUES ('68','武清区','2','0','2','0');
INSERT INTO `izqhr_common_district` (`id`,`name`,`level`,`usetype`,`upid`,`displayorder`) VALUES ('69','宝坻区','2','0','2','0');
INSERT INTO `izqhr_common_district` (`id`,`name`,`level`,`usetype`,`upid`,`displayorder`) VALUES ('70','宁河县','2','0','2','0');
INSERT INTO `izqhr_common_district` (`id`,`name`,`level`,`usetype`,`upid`,`displayorder`) VALUES ('71','静海县','2','0','2','0');
INSERT INTO `izqhr_common_district` (`id`,`name`,`level`,`usetype`,`upid`,`displayorder`) VALUES ('72','蓟县','2','0','2','0');
INSERT INTO `izqhr_common_district` (`id`,`name`,`level`,`usetype`,`upid`,`displayorder`) VALUES ('73','石家庄市','2','0','3','0');
INSERT INTO `izqhr_common_district` (`id`,`name`,`level`,`usetype`,`upid`,`displayorder`) VALUES ('74','唐山市','2','0','3','0');
INSERT INTO `izqhr_common_district` (`id`,`name`,`level`,`usetype`,`upid`,`displayorder`) VALUES ('75','秦皇岛市','2','0','3','0');
INSERT INTO `izqhr_common_district` (`id`,`name`,`level`,`usetype`,`upid`,`displayorder`) VALUES ('76','邯郸市','2','0','3','0');
INSERT INTO `izqhr_common_district` (`id`,`name`,`level`,`usetype`,`upid`,`displayorder`) VALUES ('77','邢台市','2','0','3','0');
INSERT INTO `izqhr_common_district` (`id`,`name`,`level`,`usetype`,`upid`,`displayorder`) VALUES ('78','保定市','2','0','3','0');
INSERT INTO `izqhr_common_district` (`id`,`name`,`level`,`usetype`,`upid`,`displayorder`) VALUES ('79','张家口市','2','0','3','0');
INSERT INTO `izqhr_common_district` (`id`,`name`,`level`,`usetype`,`upid`,`displayorder`) VALUES ('80','承德市','2','0','3','0');
INSERT INTO `izqhr_common_district` (`id`,`name`,`level`,`usetype`,`upid`,`displayorder`) VALUES ('81','衡水市','2','0','3','0');
INSERT INTO `izqhr_common_district` (`id`,`name`,`level`,`usetype`,`upid`,`displayorder`) VALUES ('82','廊坊市','2','0','3','0');
INSERT INTO `izqhr_common_district` (`id`,`name`,`level`,`usetype`,`upid`,`displayorder`) VALUES ('83','沧州市','2','0','3','0');
INSERT INTO `izqhr_common_district` (`id`,`name`,`level`,`usetype`,`upid`,`displayorder`) VALUES ('84','太原市','2','0','4','0');
INSERT INTO `izqhr_common_district` (`id`,`name`,`level`,`usetype`,`upid`,`displayorder`) VALUES ('85','大同市','2','0','4','0');
INSERT INTO `izqhr_common_district` (`id`,`name`,`level`,`usetype`,`upid`,`displayorder`) VALUES ('86','阳泉市','2','0','4','0');
INSERT INTO `izqhr_common_district` (`id`,`name`,`level`,`usetype`,`upid`,`displayorder`) VALUES ('87','长治市','2','0','4','0');
INSERT INTO `izqhr_common_district` (`id`,`name`,`level`,`usetype`,`upid`,`displayorder`) VALUES ('88','晋城市','2','0','4','0');
INSERT INTO `izqhr_common_district` (`id`,`name`,`level`,`usetype`,`upid`,`displayorder`) VALUES ('89','朔州市','2','0','4','0');
INSERT INTO `izqhr_common_district` (`id`,`name`,`level`,`usetype`,`upid`,`displayorder`) VALUES ('90','晋中市','2','0','4','0');
INSERT INTO `izqhr_common_district` (`id`,`name`,`level`,`usetype`,`upid`,`displayorder`) VALUES ('91','运城市','2','0','4','0');
INSERT INTO `izqhr_common_district` (`id`,`name`,`level`,`usetype`,`upid`,`displayorder`) VALUES ('92','忻州市','2','0','4','0');
INSERT INTO `izqhr_common_district` (`id`,`name`,`level`,`usetype`,`upid`,`displayorder`) VALUES ('93','临汾市','2','0','4','0');
INSERT INTO `izqhr_common_district` (`id`,`name`,`level`,`usetype`,`upid`,`displayorder`) VALUES ('94','吕梁市','2','0','4','0');
INSERT INTO `izqhr_common_district` (`id`,`name`,`level`,`usetype`,`upid`,`displayorder`) VALUES ('95','呼和浩特市','2','0','5','0');
INSERT INTO `izqhr_common_district` (`id`,`name`,`level`,`usetype`,`upid`,`displayorder`) VALUES ('96','包头市','2','0','5','0');
INSERT INTO `izqhr_common_district` (`id`,`name`,`level`,`usetype`,`upid`,`displayorder`) VALUES ('97','乌海市','2','0','5','0');
INSERT INTO `izqhr_common_district` (`id`,`name`,`level`,`usetype`,`upid`,`displayorder`) VALUES ('98','赤峰市','2','0','5','0');
INSERT INTO `izqhr_common_district` (`id`,`name`,`level`,`usetype`,`upid`,`displayorder`) VALUES ('99','通辽市','2','0','5','0');
INSERT INTO `izqhr_common_district` (`id`,`name`,`level`,`usetype`,`upid`,`displayorder`) VALUES ('100','鄂尔多斯市','2','0','5','0');
INSERT INTO `izqhr_common_district` (`id`,`name`,`level`,`usetype`,`upid`,`displayorder`) VALUES ('101','呼伦贝尔市','2','0','5','0');
INSERT INTO `izqhr_common_district` (`id`,`name`,`level`,`usetype`,`upid`,`displayorder`) VALUES ('102','巴彦淖尔市','2','0','5','0');
INSERT INTO `izqhr_common_district` (`id`,`name`,`level`,`usetype`,`upid`,`displayorder`) VALUES ('103','乌兰察布市','2','0','5','0');
INSERT INTO `izqhr_common_district` (`id`,`name`,`level`,`usetype`,`upid`,`displayorder`) VALUES ('104','兴安盟','2','0','5','0');
INSERT INTO `izqhr_common_district` (`id`,`name`,`level`,`usetype`,`upid`,`displayorder`) VALUES ('105','锡林郭勒盟','2','0','5','0');
INSERT INTO `izqhr_common_district` (`id`,`name`,`level`,`usetype`,`upid`,`displayorder`) VALUES ('106','阿拉善盟','2','0','5','0');
INSERT INTO `izqhr_common_district` (`id`,`name`,`level`,`usetype`,`upid`,`displayorder`) VALUES ('107','沈阳市','2','0','6','0');
INSERT INTO `izqhr_common_district` (`id`,`name`,`level`,`usetype`,`upid`,`displayorder`) VALUES ('108','大连市','2','0','6','0');
INSERT INTO `izqhr_common_district` (`id`,`name`,`level`,`usetype`,`upid`,`displayorder`) VALUES ('109','鞍山市','2','0','6','0');
INSERT INTO `izqhr_common_district` (`id`,`name`,`level`,`usetype`,`upid`,`displayorder`) VALUES ('110','抚顺市','2','0','6','0');
INSERT INTO `izqhr_common_district` (`id`,`name`,`level`,`usetype`,`upid`,`displayorder`) VALUES ('111','本溪市','2','0','6','0');
INSERT INTO `izqhr_common_district` (`id`,`name`,`level`,`usetype`,`upid`,`displayorder`) VALUES ('112','丹东市','2','0','6','0');
INSERT INTO `izqhr_common_district` (`id`,`name`,`level`,`usetype`,`upid`,`displayorder`) VALUES ('113','锦州市','2','0','6','0');
INSERT INTO `izqhr_common_district` (`id`,`name`,`level`,`usetype`,`upid`,`displayorder`) VALUES ('114','营口市','2','0','6','0');
INSERT INTO `izqhr_common_district` (`id`,`name`,`level`,`usetype`,`upid`,`displayorder`) VALUES ('115','阜新市','2','0','6','0');
INSERT INTO `izqhr_common_district` (`id`,`name`,`level`,`usetype`,`upid`,`displayorder`) VALUES ('116','辽阳市','2','0','6','0');
INSERT INTO `izqhr_common_district` (`id`,`name`,`level`,`usetype`,`upid`,`displayorder`) VALUES ('117','盘锦市','2','0','6','0');
INSERT INTO `izqhr_common_district` (`id`,`name`,`level`,`usetype`,`upid`,`displayorder`) VALUES ('118','铁岭市','2','0','6','0');
INSERT INTO `izqhr_common_district` (`id`,`name`,`level`,`usetype`,`upid`,`displayorder`) VALUES ('119','朝阳市','2','0','6','0');
INSERT INTO `izqhr_common_district` (`id`,`name`,`level`,`usetype`,`upid`,`displayorder`) VALUES ('120','葫芦岛市','2','0','6','0');
INSERT INTO `izqhr_common_district` (`id`,`name`,`level`,`usetype`,`upid`,`displayorder`) VALUES ('121','长春市','2','0','7','0');
INSERT INTO `izqhr_common_district` (`id`,`name`,`level`,`usetype`,`upid`,`displayorder`) VALUES ('122','吉林市','2','0','7','0');
INSERT INTO `izqhr_common_district` (`id`,`name`,`level`,`usetype`,`upid`,`displayorder`) VALUES ('123','四平市','2','0','7','0');
INSERT INTO `izqhr_common_district` (`id`,`name`,`level`,`usetype`,`upid`,`displayorder`) VALUES ('124','辽源市','2','0','7','0');
INSERT INTO `izqhr_common_district` (`id`,`name`,`level`,`usetype`,`upid`,`displayorder`) VALUES ('125','通化市','2','0','7','0');
INSERT INTO `izqhr_common_district` (`id`,`name`,`level`,`usetype`,`upid`,`displayorder`) VALUES ('126','白山市','2','0','7','0');
INSERT INTO `izqhr_common_district` (`id`,`name`,`level`,`usetype`,`upid`,`displayorder`) VALUES ('127','松原市','2','0','7','0');
INSERT INTO `izqhr_common_district` (`id`,`name`,`level`,`usetype`,`upid`,`displayorder`) VALUES ('128','白城市','2','0','7','0');

-- ----------------------------
-- Table structure for izqhr_conf
-- ----------------------------
DROP TABLE IF EXISTS `izqhr_conf`;
CREATE TABLE `izqhr_conf` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT '配置项id',
  `zh_name` varchar(60) NOT NULL COMMENT '中文名称',
  `en_name` varchar(60) NOT NULL COMMENT '英文名称',
  `value` text NOT NULL COMMENT '默认值',
  `optional` varchar(60) NOT NULL COMMENT '可选项',
  `set_type` tinyint(1) NOT NULL DEFAULT '1' COMMENT '表单类型(1输入框,2单选,3复选,4下拉菜单,5文本域,6文件)',
  `set_lists` tinyint(1) NOT NULL DEFAULT '1' COMMENT '配置分类（1基本配置,2联系方式,3,SEO）',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=855 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='配置项表';
-- ----------------------------
-- Records of izqhr_conf
-- ----------------------------
INSERT INTO `izqhr_conf` (`id`,`zh_name`,`en_name`,`value`,`optional`,`set_type`,`set_lists`) VALUES ('1','网站标题','title','人事档案系统V5.0.0','蓝越集团','1','1');
INSERT INTO `izqhr_conf` (`id`,`zh_name`,`en_name`,`value`,`optional`,`set_type`,`set_lists`) VALUES ('2','站点根网址','root_url','http://hrv5f.nlipin.com','','1','1');
INSERT INTO `izqhr_conf` (`id`,`zh_name`,`en_name`,`value`,`optional`,`set_type`,`set_lists`) VALUES ('3','网站版权信息','copyright','Copyright  2004---2019 IZQ. 爱之情科技','','5','1');
INSERT INTO `izqhr_conf` (`id`,`zh_name`,`en_name`,`value`,`optional`,`set_type`,`set_lists`) VALUES ('4','后台登录超时（分钟）','system_logout_time','100','','1','1');
INSERT INTO `izqhr_conf` (`id`,`zh_name`,`en_name`,`value`,`optional`,`set_type`,`set_lists`) VALUES ('5','联系人','lianxi','阮先生','','1','2');
INSERT INTO `izqhr_conf` (`id`,`zh_name`,`en_name`,`value`,`optional`,`set_type`,`set_lists`) VALUES ('6','联系电话','tel','15887835880','','1','2');
INSERT INTO `izqhr_conf` (`id`,`zh_name`,`en_name`,`value`,`optional`,`set_type`,`set_lists`) VALUES ('7','在线QQ','qq','309091579','','1','2');
INSERT INTO `izqhr_conf` (`id`,`zh_name`,`en_name`,`value`,`optional`,`set_type`,`set_lists`) VALUES ('8','电子邮件','email','309091579@qq.com','','1','2');
INSERT INTO `izqhr_conf` (`id`,`zh_name`,`en_name`,`value`,`optional`,`set_type`,`set_lists`) VALUES ('9','二维码','codes','20190611\abb75d22ede1aac5631d11ff52f3532c.jpg','','6','2');
INSERT INTO `izqhr_conf` (`id`,`zh_name`,`en_name`,`value`,`optional`,`set_type`,`set_lists`) VALUES ('10','站点关键字','keywords','爱之情人事系统V5.0.0免费版本','','1','3');
INSERT INTO `izqhr_conf` (`id`,`zh_name`,`en_name`,`value`,`optional`,`set_type`,`set_lists`) VALUES ('11','默认站点描述','description','爱之情人事系统V5.0.0免费版本，提供免费下载及商用','','5','3');
INSERT INTO `izqhr_conf` (`id`,`zh_name`,`en_name`,`value`,`optional`,`set_type`,`set_lists`) VALUES ('12','是否开启缓存','cache','开启','开启,关闭','2','3');
INSERT INTO `izqhr_conf` (`id`,`zh_name`,`en_name`,`value`,`optional`,`set_type`,`set_lists`) VALUES ('13','缓存时间（秒）','cache_time','86400','','1','3');
INSERT INTO `izqhr_conf` (`id`,`zh_name`,`en_name`,`value`,`optional`,`set_type`,`set_lists`) VALUES ('14','缩略图状态','thumb','关闭','开启,关闭','2','4');
INSERT INTO `izqhr_conf` (`id`,`zh_name`,`en_name`,`value`,`optional`,`set_type`,`set_lists`) VALUES ('15','缩略图宽度','thumb_width','500','','1','4');
INSERT INTO `izqhr_conf` (`id`,`zh_name`,`en_name`,`value`,`optional`,`set_type`,`set_lists`) VALUES ('16','缩略图高度','thumb_height','500','','1','4');
INSERT INTO `izqhr_conf` (`id`,`zh_name`,`en_name`,`value`,`optional`,`set_type`,`set_lists`) VALUES ('17','缩略图裁剪方式','thumb_cut','等比例','等比例,缩放后填充,居中裁剪,左上角裁剪,右下角裁剪,固定尺寸','2','4');
INSERT INTO `izqhr_conf` (`id`,`zh_name`,`en_name`,`value`,`optional`,`set_type`,`set_lists`) VALUES ('18','水印状态','warter','关闭','开启,关闭','2','4');
INSERT INTO `izqhr_conf` (`id`,`zh_name`,`en_name`,`value`,`optional`,`set_type`,`set_lists`) VALUES ('19','水印位置','warter_position','右下角','左上角,上居中,右上角,左居中,居中,右居中,左下角,下居中,右下角','2','4');
INSERT INTO `izqhr_conf` (`id`,`zh_name`,`en_name`,`value`,`optional`,`set_type`,`set_lists`) VALUES ('20','水印图片','warter_img','20190611\dfbcb0f5b838dbd5c7d7a38a2bc483f2.png','','6','4');
INSERT INTO `izqhr_conf` (`id`,`zh_name`,`en_name`,`value`,`optional`,`set_type`,`set_lists`) VALUES ('21','水印图片透明度','warter_alpha','60','','1','4');
INSERT INTO `izqhr_conf` (`id`,`zh_name`,`en_name`,`value`,`optional`,`set_type`,`set_lists`) VALUES ('22','文字水印','warter_text','爱之情人事系统','','1','4');
INSERT INTO `izqhr_conf` (`id`,`zh_name`,`en_name`,`value`,`optional`,`set_type`,`set_lists`) VALUES ('23','文字水印字号','warter_text_fontsize','20','','1','4');
INSERT INTO `izqhr_conf` (`id`,`zh_name`,`en_name`,`value`,`optional`,`set_type`,`set_lists`) VALUES ('24','文字水印颜色','warter_text_color','#ff0000','','1','4');
INSERT INTO `izqhr_conf` (`id`,`zh_name`,`en_name`,`value`,`optional`,`set_type`,`set_lists`) VALUES ('25','水印类型','warter_type','文字水印','图片水印,文字水印','2','4');
INSERT INTO `izqhr_conf` (`id`,`zh_name`,`en_name`,`value`,`optional`,`set_type`,`set_lists`) VALUES ('853','后台短信验证开关','admin_login_switch','关闭','开启,关闭','2','1');
INSERT INTO `izqhr_conf` (`id`,`zh_name`,`en_name`,`value`,`optional`,`set_type`,`set_lists`) VALUES ('854','网站LOGO','logo','20190611\54992138239841076b8b252c3b6b309d.png','','6','1');

-- ----------------------------
-- Table structure for izqhr_employmenttype
-- ----------------------------
DROP TABLE IF EXISTS `izqhr_employmenttype`;
CREATE TABLE `izqhr_employmenttype` (
  `id` int(1) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT '',
  `level` tinyint(4) unsigned NOT NULL DEFAULT '0',
  `usetype` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `salary` int(16) unsigned NOT NULL DEFAULT '0',
  `displayorder` smallint(6) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`) USING BTREE,
  KEY `upid` (`salary`,`displayorder`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=45054 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;
-- ----------------------------
-- Records of izqhr_employmenttype
-- ----------------------------
INSERT INTO `izqhr_employmenttype` (`id`,`name`,`level`,`usetype`,`salary`,`displayorder`) VALUES ('1','试用工','0','0','3070000','0');
INSERT INTO `izqhr_employmenttype` (`id`,`name`,`level`,`usetype`,`salary`,`displayorder`) VALUES ('2','临时工','0','0','0','0');
INSERT INTO `izqhr_employmenttype` (`id`,`name`,`level`,`usetype`,`salary`,`displayorder`) VALUES ('3','合同工','0','0','0','0');
INSERT INTO `izqhr_employmenttype` (`id`,`name`,`level`,`usetype`,`salary`,`displayorder`) VALUES ('4','暑假工','0','0','0','0');

-- ----------------------------
-- Table structure for izqhr_enterprise
-- ----------------------------
DROP TABLE IF EXISTS `izqhr_enterprise`;
CREATE TABLE `izqhr_enterprise` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '企业ID',
  `name` varchar(30) NOT NULL COMMENT '企业名称',
  `credit_num` varchar(18) NOT NULL COMMENT '统一社会信用代码',
  `enterprise_province` smallint(6) NOT NULL DEFAULT '0' COMMENT '企业地址省',
  `enterprise_city` smallint(6) NOT NULL DEFAULT '0' COMMENT '企业地址市',
  `enterprise_county` smallint(6) NOT NULL DEFAULT '0' COMMENT '企业地址区县',
  `enterprise_full_address` varchar(150) NOT NULL COMMENT '企业详细地址',
  `legal_name` varchar(15) NOT NULL COMMENT '法人',
  `found_time` int(10) NOT NULL COMMENT '成立日期',
  `start_time` int(10) NOT NULL COMMENT '经营期限开始日期',
  `end_time` int(10) NOT NULL COMMENT '经营期限结束日期',
  `type` varchar(30) NOT NULL COMMENT '企业类型',
  `customs_code` varchar(25) NOT NULL COMMENT '企业海关代码',
  `reg_capital` decimal(16,2) NOT NULL DEFAULT '0.00' COMMENT '注册资本',
  `currency` varchar(14) NOT NULL COMMENT '注册币种',
  `enter_organ` varchar(40) NOT NULL COMMENT '登记机关',
  `status` varchar(10) NOT NULL COMMENT '企业状态',
  `business_between` text NOT NULL COMMENT '企业经营范围',
  `create_time` int(10) NOT NULL COMMENT '创建时间',
  `update_time` int(10) NOT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`) USING BTREE,
  KEY `name` (`name`,`credit_num`,`legal_name`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='企业档案基本信息表';
-- ----------------------------
-- Records of izqhr_enterprise
-- ----------------------------
INSERT INTO `izqhr_enterprise` (`id`,`name`,`credit_num`,`enterprise_province`,`enterprise_city`,`enterprise_county`,`enterprise_full_address`,`legal_name`,`found_time`,`start_time`,`end_time`,`type`,`customs_code`,`reg_capital`,`currency`,`enter_organ`,`status`,`business_between`,`create_time`,`update_time`) VALUES ('1','云南爱之情信息科技有限公司','530103100217868000','25','0','0','金色家园紫竹园8幢2单元','阮金波','1408896000','1408896000','1724428800','有限责任公司','','100.00','人民币','盘龙区市场监督管理局','存续','云南爱之情信息科技有限公司成立于2014年8月25日，公司位于云南省昆明市，是一家以婚姻服务，婚庆礼仪服务为主的信息科技公司。爱之情信息科技有限公司主要经营产品有：婚姻服务，婚庆礼仪服务，企业形象策划，市场营销策划，计算机软硬件的技术开发，技术推广及转让，网站建设，软件开发等产品。','1560229777','1560229777');

-- ----------------------------
-- Table structure for izqhr_enterprise_good_info
-- ----------------------------
DROP TABLE IF EXISTS `izqhr_enterprise_good_info`;
CREATE TABLE `izqhr_enterprise_good_info` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `eid` int(11) NOT NULL COMMENT '企业ID',
  `credit_info` text NOT NULL COMMENT '企业信用评级（评价）信息',
  `honor_info` text NOT NULL COMMENT '荣誉信息（含守合同重信用信息等）',
  `social_info` text NOT NULL COMMENT '社会责任信息',
  `social_org_info` text NOT NULL COMMENT '社会组织信用信息',
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE KEY `id` (`id`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='企业良好信息表';
-- ----------------------------
-- Records of izqhr_enterprise_good_info
-- ----------------------------
INSERT INTO `izqhr_enterprise_good_info` (`id`,`eid`,`credit_info`,`honor_info`,`social_info`,`social_org_info`) VALUES ('1','1','该公司无任何违规行为，评级优秀','2014年度获得云南省互联网服务业一等奖','2014年度捐赠云南曲靖希望小学100万元','2014年度为单身男女牵手380余对');
INSERT INTO `izqhr_enterprise_good_info` (`id`,`eid`,`credit_info`,`honor_info`,`social_info`,`social_org_info`) VALUES ('2','1','该公司连续2年无任何违规行为，评级优秀','2015年度获得云南省互联网服务业特等奖','2015年度捐赠云南玉溪希望小学200万元','2015年度为单身男女牵手930余对');

-- ----------------------------
-- Table structure for izqhr_jobs
-- ----------------------------
DROP TABLE IF EXISTS `izqhr_jobs`;
CREATE TABLE `izqhr_jobs` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT '',
  `level` tinyint(4) unsigned NOT NULL DEFAULT '0',
  `usetype` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `upid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`) USING BTREE,
  KEY `upid` (`upid`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=45052 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;
-- ----------------------------
-- Records of izqhr_jobs
-- ----------------------------
INSERT INTO `izqhr_jobs` (`id`,`name`,`level`,`usetype`,`upid`) VALUES ('1','班长','1','3','0');
INSERT INTO `izqhr_jobs` (`id`,`name`,`level`,`usetype`,`upid`) VALUES ('2','组长','1','3','0');
INSERT INTO `izqhr_jobs` (`id`,`name`,`level`,`usetype`,`upid`) VALUES ('4','课长','1','3','0');
INSERT INTO `izqhr_jobs` (`id`,`name`,`level`,`usetype`,`upid`) VALUES ('5','副主任','1','3','0');
INSERT INTO `izqhr_jobs` (`id`,`name`,`level`,`usetype`,`upid`) VALUES ('6','主任','1','3','0');
INSERT INTO `izqhr_jobs` (`id`,`name`,`level`,`usetype`,`upid`) VALUES ('3','副课长','1','3','0');

-- ----------------------------
-- Table structure for izqhr_model
-- ----------------------------
DROP TABLE IF EXISTS `izqhr_model`;
CREATE TABLE `izqhr_model` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT '模型ID',
  `model_name` varchar(50) NOT NULL COMMENT '模型名称',
  `table_name` varchar(50) NOT NULL COMMENT '模型对应附加表',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '0关闭 1开启',
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE KEY `id` (`id`) USING BTREE,
  KEY `id_2` (`id`) USING BTREE,
  KEY `id_3` (`id`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='模型表';
-- ----------------------------
-- Records of izqhr_model
-- ----------------------------

-- ----------------------------
-- Table structure for izqhr_model_fields
-- ----------------------------
DROP TABLE IF EXISTS `izqhr_model_fields`;
CREATE TABLE `izqhr_model_fields` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '字段ID',
  `field_cname` varchar(60) NOT NULL COMMENT '字段中文名称',
  `field_ename` varchar(60) NOT NULL COMMENT '字段英文名称',
  `field_type` tinyint(4) NOT NULL DEFAULT '1' COMMENT '字段类型(1输入框,2单选,3复选,4下拉菜单,5文本域,6附件,7浮点,8整形,9,长文本)',
  `field_values` varchar(255) NOT NULL COMMENT '可选值',
  `model_id` mediumint(9) NOT NULL COMMENT '所属模型ID',
  PRIMARY KEY (`id`) USING BTREE,
  KEY `model_id` (`model_id`) USING BTREE,
  KEY `model_id_2` (`model_id`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='模型数据库表字段';
-- ----------------------------
-- Records of izqhr_model_fields
-- ----------------------------

-- ----------------------------
-- Table structure for izqhr_staff
-- ----------------------------
DROP TABLE IF EXISTS `izqhr_staff`;
CREATE TABLE `izqhr_staff` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT '员工ID',
  `name` varchar(15) NOT NULL COMMENT '员工姓名',
  `gender` tinyint(1) NOT NULL DEFAULT '1' COMMENT '性别：1男，2女',
  `birthday` int(10) NOT NULL COMMENT '员工生日',
  `id_card` varchar(18) NOT NULL COMMENT '身份证号',
  `native_province` smallint(6) NOT NULL COMMENT '籍贯-省',
  `native_city` smallint(6) NOT NULL COMMENT '籍贯-市',
  `native_county` smallint(6) NOT NULL COMMENT '籍贯-县（区）',
  `works_jobs` smallint(6) NOT NULL COMMENT '工作职位',
  `tel` varchar(15) NOT NULL COMMENT '联系电话',
  `marriage` tinyint(1) NOT NULL COMMENT '婚姻',
  `education` varchar(15) NOT NULL COMMENT '最高学历',
  `entrydate` int(10) NOT NULL COMMENT '入职日期',
  `institution` varchar(35) NOT NULL COMMENT '所在机构',
  `department` tinyint(1) NOT NULL COMMENT '部门',
  `health` varchar(30) NOT NULL COMMENT '健康状况',
  `gam` varchar(50) NOT NULL COMMENT '社会关系',
  `photo` varchar(100) NOT NULL COMMENT '员工照片',
  `create_time` int(10) NOT NULL COMMENT '新增时间',
  `update_time` int(10) NOT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`) USING BTREE,
  KEY `name` (`name`,`id_card`,`tel`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='员工信息基本表';
-- ----------------------------
-- Records of izqhr_staff
-- ----------------------------
INSERT INTO `izqhr_staff` (`id`,`name`,`gender`,`birthday`,`id_card`,`native_province`,`native_city`,`native_county`,`works_jobs`,`tel`,`marriage`,`education`,`entrydate`,`institution`,`department`,`health`,`gam`,`photo`,`create_time`,`update_time`) VALUES ('1','赵丽颖','2','561312000','100006198','3','82','1272','3','138888812','1','本科','1362412800','海润影业有限公司','11','教授','社会关系复杂','20190611\d22df6ba091a1433334a80b52be2ca8c.jpg','1560230387','1615533775');
INSERT INTO `izqhr_staff` (`id`,`name`,`gender`,`birthday`,`id_card`,`native_province`,`native_city`,`native_county`,`works_jobs`,`tel`,`marriage`,`education`,`entrydate`,`institution`,`department`,`health`,`gam`,`photo`,`create_time`,`update_time`) VALUES ('2','罗晋','1','375897600','210231198111300018','14','220','2487','0','13999999999','2','本科','1520179200','中国煤矿文工团工作','2','演员','社会关系比较复杂','20190611\edc1563522e241f5b406b12c9dffcf9b.jpg','1560230731','1560230731');
INSERT INTO `izqhr_staff` (`id`,`name`,`gender`,`birthday`,`id_card`,`native_province`,`native_city`,`native_county`,`works_jobs`,`tel`,`marriage`,`education`,`entrydate`,`institution`,`department`,`health`,`gam`,`photo`,`create_time`,`update_time`) VALUES ('3','admin1123','1','949334400','123213123','1','0','0','3','3242047037','2','大学','1456761600','','8','教师','复杂','','1614421149','1615517425');
INSERT INTO `izqhr_staff` (`id`,`name`,`gender`,`birthday`,`id_card`,`native_province`,`native_city`,`native_county`,`works_jobs`,`tel`,`marriage`,`education`,`entrydate`,`institution`,`department`,`health`,`gam`,`photo`,`create_time`,`update_time`) VALUES ('4','hack10','1','949334400','223234123','20','0','0','5','1092304891','1','大学','1457971200','','5','教师','复杂','','1614440507','1615346900');
INSERT INTO `izqhr_staff` (`id`,`name`,`gender`,`birthday`,`id_card`,`native_province`,`native_city`,`native_county`,`works_jobs`,`tel`,`marriage`,`education`,`entrydate`,`institution`,`department`,`health`,`gam`,`photo`,`create_time`,`update_time`) VALUES ('5','admin999','1','475948800','129908840','1','37','0','1','1235553222','1','大学','1520179200','','6','教师','复杂','','1614482662','1614482662');
INSERT INTO `izqhr_staff` (`id`,`name`,`gender`,`birthday`,`id_card`,`native_province`,`native_city`,`native_county`,`works_jobs`,`tel`,`marriage`,`education`,`entrydate`,`institution`,`department`,`health`,`gam`,`photo`,`create_time`,`update_time`) VALUES ('6','dsff','1','509644800','343423123','1','37','0','7','0364320223','1','高中','1520179200','','7','针车','良好','','1614581937','1615346909');
INSERT INTO `izqhr_staff` (`id`,`name`,`gender`,`birthday`,`id_card`,`native_province`,`native_city`,`native_county`,`works_jobs`,`tel`,`marriage`,`education`,`entrydate`,`institution`,`department`,`health`,`gam`,`photo`,`create_time`,`update_time`) VALUES ('7','fjk','1','920217600','990787823','19','0','0','4','3321546565','1','高中','1528128000','','4','大底','良好','','1614582040','1615362168');
INSERT INTO `izqhr_staff` (`id`,`name`,`gender`,`birthday`,`id_card`,`native_province`,`native_city`,`native_county`,`works_jobs`,`tel`,`marriage`,`education`,`entrydate`,`institution`,`department`,`health`,`gam`,`photo`,`create_time`,`update_time`) VALUES ('8','反复','1','447264000','123214448','21','0','0','2','1326666241','1','高中','1236182400','','6','健康','良好','','1614752427','1615450123');
INSERT INTO `izqhr_staff` (`id`,`name`,`gender`,`birthday`,`id_card`,`native_province`,`native_city`,`native_county`,`works_jobs`,`tel`,`marriage`,`education`,`entrydate`,`institution`,`department`,`health`,`gam`,`photo`,`create_time`,`update_time`) VALUES ('9','jeijie','1','951667200','990744444','15','0','0','5','0364320444','1','高中','1426089600','','1','健康','良好','','1614832081','1615367318');

-- ----------------------------
-- Table structure for izqhr_staff_service_evaluation
-- ----------------------------
DROP TABLE IF EXISTS `izqhr_staff_service_evaluation`;
CREATE TABLE `izqhr_staff_service_evaluation` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT COMMENT '评价ID',
  `sid` mediumint(9) NOT NULL COMMENT '员工ID',
  `content` varchar(255) NOT NULL COMMENT '评价内容',
  `sanctions` varchar(255) NOT NULL COMMENT '奖惩记录',
  `score` decimal(6,2) NOT NULL DEFAULT '0.00' COMMENT '所得分数',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=51 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='评价及奖惩';
-- ----------------------------
-- Records of izqhr_staff_service_evaluation
-- ----------------------------
INSERT INTO `izqhr_staff_service_evaluation` (`id`,`sid`,`content`,`sanctions`,`score`) VALUES ('49','1','国内知名歌手','2015年获得第6届澳门国际电视节金莲花最佳女主角奖','100.00');
INSERT INTO `izqhr_staff_service_evaluation` (`id`,`sid`,`content`,`sanctions`,`score`) VALUES ('50','1','国内知名演员','2014年度金鹰女神','100.00');
INSERT INTO `izqhr_staff_service_evaluation` (`id`,`sid`,`content`,`sanctions`,`score`) VALUES ('3','2','非常优秀的内地男演员','2011年，获得安徽卫视明星跨界真人秀节目《天声王牌》总决赛冠军','99.00');
INSERT INTO `izqhr_staff_service_evaluation` (`id`,`sid`,`content`,`sanctions`,`score`) VALUES ('44','3','123123','123213','123.00');
INSERT INTO `izqhr_staff_service_evaluation` (`id`,`sid`,`content`,`sanctions`,`score`) VALUES ('5','5','优秀','','99.00');
INSERT INTO `izqhr_staff_service_evaluation` (`id`,`sid`,`content`,`sanctions`,`score`) VALUES ('23','6','优秀','','80.00');
INSERT INTO `izqhr_staff_service_evaluation` (`id`,`sid`,`content`,`sanctions`,`score`) VALUES ('32','7','优秀','','90.00');
INSERT INTO `izqhr_staff_service_evaluation` (`id`,`sid`,`content`,`sanctions`,`score`) VALUES ('39','8','优秀','','80.00');
INSERT INTO `izqhr_staff_service_evaluation` (`id`,`sid`,`content`,`sanctions`,`score`) VALUES ('36','9','优秀','','80.00');

-- ----------------------------
-- Table structure for izqhr_staff_training_record
-- ----------------------------
DROP TABLE IF EXISTS `izqhr_staff_training_record`;
CREATE TABLE `izqhr_staff_training_record` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT COMMENT '培训记录ID',
  `sid` int(11) NOT NULL COMMENT '员工ID',
  `training_info` text NOT NULL COMMENT '培训记录',
  `certificate` varchar(200) NOT NULL COMMENT '所获证书',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='员工培训记录表';
-- ----------------------------
-- Records of izqhr_staff_training_record
-- ----------------------------
INSERT INTO `izqhr_staff_training_record` (`id`,`sid`,`training_info`,`certificate`) VALUES ('1','1','<p>2006年，因获得雅虎搜星比赛冯小刚组冠军而进入演艺圈；</p><p>同年，在冯小刚执导的广告片《跪族篇》中担任女主角。</p><p>2011年，因在古装剧《新还珠格格》中饰演晴儿一角而被观众认识。</p><p>2013年，凭借古装剧《陆贞传奇》获得更多关注。</p><p>2014年10月，在第10届金鹰电视艺术节举办的投票活动中被选为“金鹰女神”.</p>','');
INSERT INTO `izqhr_staff_training_record` (`id`,`sid`,`training_info`,`certificate`) VALUES ('2','2','<p>2003年，出演个人首部电视剧《售楼处的故事》，从而正式进入演艺圈&nbsp; 。</p><p>2006年，主演战争剧《战争目光》。</p><p>2007年，出演个人首部电影《金碧辉煌》；同年，出演民国情感剧《梦幻天堂》 。</p><p>2008年，主演年代剧《美丽的南方》&nbsp; 。</p><p>2009年，出演古装剧《三国》 。2010年3月15日，其主演的古装宫廷剧《美人心计》在上海电视台电视剧频道首播 ；同年，主演年代励志剧《阿诚》。</p><p><br/></p>','');
INSERT INTO `izqhr_staff_training_record` (`id`,`sid`,`training_info`,`certificate`) VALUES ('3','3','<p>123213213</p>','');
INSERT INTO `izqhr_staff_training_record` (`id`,`sid`,`training_info`,`certificate`) VALUES ('4','5','<p>一直没有</p>','');
INSERT INTO `izqhr_staff_training_record` (`id`,`sid`,`training_info`,`certificate`) VALUES ('5','6','<p>dfdfdf</p>','');
INSERT INTO `izqhr_staff_training_record` (`id`,`sid`,`training_info`,`certificate`) VALUES ('6','7','<p>ffjfjjk</p>','');
INSERT INTO `izqhr_staff_training_record` (`id`,`sid`,`training_info`,`certificate`) VALUES ('7','8','<p>ff123</p>','');
INSERT INTO `izqhr_staff_training_record` (`id`,`sid`,`training_info`,`certificate`) VALUES ('8','9','<p>dfdf</p>','');

-- ----------------------------
-- Table structure for izqhr_structure
-- ----------------------------
DROP TABLE IF EXISTS `izqhr_structure`;
CREATE TABLE `izqhr_structure` (
  `id` int(1) unsigned NOT NULL AUTO_INCREMENT COMMENT '栏目ID',
  `typename` varchar(30) NOT NULL COMMENT '栏目名称',
  `sort` smallint(6) NOT NULL DEFAULT '50' COMMENT '栏目排序',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '栏目隐藏状态 0关闭 1开启',
  `pid` int(11) NOT NULL DEFAULT '0' COMMENT '栏目父ID',
  `modelid` int(11) NOT NULL COMMENT '模型ID',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='组织架构表';
-- ----------------------------
-- Records of izqhr_structure
-- ----------------------------
INSERT INTO `izqhr_structure` (`id`,`typename`,`sort`,`status`,`pid`,`modelid`) VALUES ('1','董事长','50','1','0','0');
INSERT INTO `izqhr_structure` (`id`,`typename`,`sort`,`status`,`pid`,`modelid`) VALUES ('2','总经理','50','1','1','0');
INSERT INTO `izqhr_structure` (`id`,`typename`,`sort`,`status`,`pid`,`modelid`) VALUES ('3','销售部','50','1','2','0');
INSERT INTO `izqhr_structure` (`id`,`typename`,`sort`,`status`,`pid`,`modelid`) VALUES ('4','生产部','50','1','2','0');
INSERT INTO `izqhr_structure` (`id`,`typename`,`sort`,`status`,`pid`,`modelid`) VALUES ('5','研发部','50','1','2','0');
INSERT INTO `izqhr_structure` (`id`,`typename`,`sort`,`status`,`pid`,`modelid`) VALUES ('6','财务部','50','1','2','0');
INSERT INTO `izqhr_structure` (`id`,`typename`,`sort`,`status`,`pid`,`modelid`) VALUES ('7','行政部','50','1','2','0');
INSERT INTO `izqhr_structure` (`id`,`typename`,`sort`,`status`,`pid`,`modelid`) VALUES ('8','人事部','50','1','2','0');
INSERT INTO `izqhr_structure` (`id`,`typename`,`sort`,`status`,`pid`,`modelid`) VALUES ('9','业务经理','50','1','3','0');
INSERT INTO `izqhr_structure` (`id`,`typename`,`sort`,`status`,`pid`,`modelid`) VALUES ('10','外贸部','50','1','3','0');
INSERT INTO `izqhr_structure` (`id`,`typename`,`sort`,`status`,`pid`,`modelid`) VALUES ('11','售后服务部','50','1','3','0');

