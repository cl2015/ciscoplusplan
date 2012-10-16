/*
MySQL Data Transfer
Source Host: localhost
Source Database: cisco
Target Host: localhost
Target Database: cisco
Date: 2012-8-1 14:31:08
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for admins
-- ----------------------------
DROP TABLE IF EXISTS `admins`;
CREATE TABLE `admins` (
  `id` int(11) NOT NULL auto_increment,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `authority` tinyint(4) default NULL COMMENT '限权',
  `created_at` date default NULL,
  `update_at` date default NULL,
  `created_by` varchar(100) default NULL,
  `updated_by` varchar(100) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for payments
-- ----------------------------
DROP TABLE IF EXISTS `payments`;
CREATE TABLE `payments` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `user_id` int(10) unsigned NOT NULL,
  `is_invoice` tinyint(1) NOT NULL default '0' COMMENT '0:not need;1:need;',
  `invoice_title` varchar(512) default NULL,
  `invoice_content` tinyint(1) NOT NULL default '1' COMMENT '0:服务费；1：会务费',
  `need_mail` tinyint(1) NOT NULL default '0' COMMENT '0:否；1：是',
  `recipient_name` varchar(256) default NULL,
  `phone` varchar(256) default NULL,
  `recipient_add` varchar(256) default NULL,
  `city` varchar(256) default NULL,
  `zip_code` varchar(255) default NULL,
  `country` varchar(256) default NULL,
  `created_at` datetime default NULL,
  `created_by` int(10) default NULL,
  `updated_at` datetime default NULL,
  `updated_by` int(10) default NULL,
  `has_paid` tinyint(1) NOT NULL default '0' COMMENT '0:未付款；1：已付款',
  `has_sendinvoice` tinyint(1) NOT NULL COMMENT '0:未开发票；1：已开发票',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for reginfos
-- ----------------------------
DROP TABLE IF EXISTS `reginfos`;
CREATE TABLE `reginfos` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `user_id` int(10) unsigned NOT NULL,
  `reg_date` datetime default NULL,
  `reg_id` varchar(256) default NULL,
  `reg_type` varchar(256) default NULL,
  `reg_name` varchar(256) default NULL,
  `reg_address` varchar(256) default NULL,
  `payment_type` tinyint(1) NOT NULL default '0' COMMENT '0:offline,1:onsite2:online',
  `paid_amount` varchar(256) default NULL,
  `is_online` tinyint(1) NOT NULL default '0' COMMENT '0:online,1:onsite',
  `created_at` datetime default NULL,
  `created_by` int(10) default NULL,
  `updated_at` datetime default NULL,
  `updated_by` int(10) default NULL,
  `has_paid` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for surveys
-- ----------------------------
DROP TABLE IF EXISTS `surveys`;
CREATE TABLE `surveys` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `user_id` int(10) unsigned NOT NULL,
  `q1` tinyint(4) default NULL,
  `q2` tinyint(4) default NULL,
  `q3` tinyint(4) default NULL,
  `q4` tinyint(4) default NULL,
  `q5` varchar(255) NOT NULL,
  `q6` varchar(255) NOT NULL,
  `q7` tinyint(4) NOT NULL default '1',
  `q8` tinyint(4) NOT NULL default '1',
  `created_at` datetime default NULL,
  `created_by` int(10) default NULL,
  `updated_at` datetime default NULL,
  `updated_by` int(10) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `has_code` tinyint(1) NOT NULL COMMENT '鏄?惁鏈塩ode',
  `code` varchar(128) NOT NULL,
  `email` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `organisation` varchar(256) NOT NULL,
  `relation_with_cisco` varchar(256) NOT NULL,
  `full_name` varchar(256) NOT NULL,
  `job_title` varchar(256) NOT NULL,
  `department` varchar(256) NOT NULL,
  `working_phone_dis` varchar(256) NOT NULL,
  `working_phone` varchar(256) NOT NULL,
  `mobile` varchar(256) NOT NULL,
  `province` varchar(256) NOT NULL,
  `city` varchar(256) NOT NULL,
  `ec_name` varchar(256) NOT NULL,
  `ec_relationship` varchar(256) NOT NULL,
  `ec_mobile` varchar(256) NOT NULL,
  `am_department` varchar(255) NOT NULL,
  `od_id` varchar(255) NOT NULL,
  `created_at` datetime default NULL,
  `created_by` int(10) default NULL,
  `updated_at` datetime default NULL,
  `updated_by` int(10) default NULL,
  `type_id` tinyint(1) NOT NULL COMMENT '1:nomination;2:employee;3:ordinary',
  `has_reged` tinyint(1) NOT NULL COMMENT '0:unreged;1:reged',
  `has_sended` tinyint(1) NOT NULL default '0',
  `cc` varchar(255) NOT NULL,
  `am_name` varchar(255) NOT NULL,
  `am_id` varchar(255) NOT NULL,
  `am_mobile` varchar(255) NOT NULL,
  `rm_name` varchar(255) NOT NULL,
  `rm_id` varchar(255) NOT NULL,
  `od_name` varchar(255) NOT NULL,
  `diff` varchar(64) NOT NULL,
  `map_dept` varchar(255) default NULL,
  `map_title` varchar(255) default NULL,
  `map_loca` varchar(255) default NULL,
  `MAIL_ZIP` varchar(64) NOT NULL default '0' COMMENT 'Y:无晚饭；N：有晚饭',
  `MAIL_COUNTRY` varchar(74) NOT NULL default '0' COMMENT 'Y:无ITM; N:有TIM;',
  `ImportDate` varchar(64) NOT NULL default '0' COMMENT 'ImportDataDate',
  `AUDIENCE` varchar(64) default NULL,
  `Category` varchar(64) default NULL,
  `COM_PHONE` varchar(64) default NULL,
  `STATUS` varchar(64) default NULL,
  `LAST_NAME` varchar(64) default NULL,
  `CONF_ID` varchar(64) default NULL,
  `LOCATION_ID` varchar(64) default NULL,
  `MAIL_STATE` varchar(64) default NULL,
  `MAIL_CITY` varchar(64) default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records 
-- ----------------------------
INSERT INTO `admins` VALUES ('1', 'admin', '96e79218965eb72c92a549dd5a330112', '9', null, null, null, null);
INSERT INTO `payments` VALUES ('195', '911830', '0', null, '1', '0', null, null, null, null, null, null, null, null, null, null, '1', '0');
INSERT INTO `payments` VALUES ('194', '911828', '0', '', '1', '0', '', '', '', '', '', '', '2012-07-31 11:19:02', '911828', '2012-07-31 11:19:46', '911828', '0', '0');
INSERT INTO `reginfos` VALUES ('8035', '911828', null, null, null, null, null, '3', '1580.00', '1', '2012-07-31 11:06:18', '911828', '2012-07-31 11:19:46', '911828', '0');
INSERT INTO `reginfos` VALUES ('8036', '911830', null, null, null, null, null, '0', null, '1', '2012-07-31 19:50:05', '911830', '2012-07-31 19:50:05', '911830', '1');
INSERT INTO `surveys` VALUES ('7945', '911828', '0', '0', '0', '0', '1', '2', '1', '1', '2012-07-31 11:06:12', '911828', '2012-07-31 11:06:12', '911828');
INSERT INTO `surveys` VALUES ('7946', '911830', '3', '3', '1', '1', '2', '2,5,8,11', '1', '1', '2012-07-31 17:37:01', '911830', '2012-07-31 19:49:59', '911830');
INSERT INTO `users` VALUES ('911818', '1', 'limin2', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', null, null, null, null, '0', '0', '0', '', '', '', '', '', '', '', '', null, null, null, '0', '0', '0', null, null, null, null, null, null, null, null, '0');
INSERT INTO `users` VALUES ('911819', '1', 'limin3', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', null, null, null, null, '0', '0', '0', '', '', '', '', '', '', '', '', null, null, null, '0', '0', '0', null, null, null, null, null, null, null, null, '0');
INSERT INTO `users` VALUES ('911820', '1', 'limin4', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', null, null, null, null, '0', '0', '0', '', '', '', '', '', '', '', '', null, null, null, '0', '0', '0', null, null, null, null, null, null, null, null, '0');
INSERT INTO `users` VALUES ('911822', '1', 'limin6', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', null, null, null, null, '0', '0', '0', '', '', '', '', '', '', '', '', null, null, null, '0', '0', '0', null, null, null, null, null, null, null, null, '0');
INSERT INTO `users` VALUES ('911829', '0', '', '1111111111111@qq.com', '111111', '111afsa撒的发', '2', '撒的发', '4', 'IT – 存储', '010', '22448822', '15311738191', '江苏', '南京', '', '', '', '', '', '2012-07-31 17:07:57', '1', '2012-07-31 17:07:57', '1', '4', '0', '0', '', '', '', '', '', '', '', '', null, null, null, '0', '0', '0', null, null, null, null, null, null, null, null, '0');
INSERT INTO `users` VALUES ('911824', '1', 'limin8', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', null, null, null, null, '0', '0', '0', '', '', '', '', '', '', '', '', null, null, null, '0', '0', '0', null, null, null, null, null, null, null, null, '0');
INSERT INTO `users` VALUES ('911825', '1', 'limin9', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', null, null, null, null, '0', '0', '0', '', '', '', '', '', '', '', '', null, null, null, '0', '0', '0', null, null, null, null, null, null, null, null, '0');
INSERT INTO `users` VALUES ('911826', '1', 'limin10', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', null, null, null, null, '0', '0', '0', '', '', '', '', '', '', '', '', null, null, null, '0', '0', '0', null, null, null, null, null, null, null, null, '0');
INSERT INTO `users` VALUES ('911831', '0', '', '1041858098@qq.com', '', '李敏', '5', '李敏', '5', 'IT – 应用开发', '', '', '15311738191', '北京', '北京', '', '', '', '', '', '2012-08-01 12:12:34', '911830', '2012-08-01 12:13:46', '911831', '4', '0', '0', '', '', '', '', '', '', '', '', null, null, null, '0', '0', '0', null, null, null, null, null, null, null, null, '0');
INSERT INTO `users` VALUES ('911828', '0', '', '1041858078@qq.com', '111111', 'limin有限公司', '1', 'limin有限公司', '1', '商业/市场开发', '', '', '15311738191', '北京', '北京', '', '', '', '', '', '2012-07-31 11:05:24', null, '2012-07-31 15:15:00', '911828', '4', '1', '0', '', '', '', '', '', '', '', '', null, null, null, '0', '0', '0', null, null, null, null, null, null, null, null, '0');
INSERT INTO `users` VALUES ('911830', '0', '', '123123@qq.com', '123456', '爱疯上的', '2', '十大飞', '3', '电子商业', '', '', '15311738191', '天津', '十大', '', '', '', '', '', '2012-07-31 17:36:21', null, '2012-07-31 19:49:59', '911830', '4', '1', '0', '', '', '', '', '', '', '', '', null, null, null, '0', '0', '0', null, null, null, null, null, null, null, null, '0');
