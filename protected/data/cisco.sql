-- phpMyAdmin SQL Dump
-- version 3.4.10.1
-- http://www.phpmyadmin.net
--
-- 主机: 127.0.0.1
-- 生成日期: 2012 年 03 月 03 日 21:41
-- 服务器版本: 5.5.21
-- PHP 版本: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `cisco`
--

-- --------------------------------------------------------

--
-- 表的结构 `reginfos`
--

CREATE TABLE IF NOT EXISTS `reginfos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `reg_date` datetime DEFAULT NULL,
  `reg_id` varchar(256) DEFAULT NULL,
  `reg_type` varchar(256) DEFAULT NULL,
  `reg_name` varchar(256) DEFAULT NULL,
  `reg_address` varchar(256) DEFAULT NULL,
  `payment_type` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0:online,1:onsite',
  `paid_amount` varchar(256) DEFAULT NULL,
  `is_online` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0:online,1:onsite',
  `created_at` datetime DEFAULT NULL,
  `created_by` int(10) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `reginfos`
--

INSERT INTO `reginfos` (`id`, `user_id`, `reg_date`, `reg_id`, `reg_type`, `reg_name`, `reg_address`, `payment_type`, `paid_amount`, `is_online`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 1, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, '2012-03-03 00:00:00', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `surveys`
--

CREATE TABLE IF NOT EXISTS `surveys` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `q1` tinyint(4) DEFAULT NULL,
  `q2` tinyint(4) DEFAULT NULL,
  `q3` tinyint(4) DEFAULT NULL,
  `q4` tinyint(4) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` int(10) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `surveys`
--

INSERT INTO `surveys` (`id`, `user_id`, `q1`, `q2`, `q3`, `q4`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 1, 0, 0, 0, 0, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `has_code` tinyint(1) NOT NULL COMMENT '是否有code',
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
  `created_at` datetime DEFAULT NULL,
  `created_by` int(10) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `users`
--

INSERT INTO `users` (`id`, `has_code`, `code`, `email`, `password`, `organisation`, `relation_with_cisco`, `full_name`, `job_title`, `department`, `working_phone_dis`, `working_phone`, `mobile`, `province`, `city`, `ec_name`, `ec_relationship`, `ec_mobile`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 0, 'testcode', 'he.li@mdigi.cc', '111', 'test_org', 'relation', 'full name', 'job title', 'department', '010', '010', '010', '010', '010', '010', '010', '010', '0000-00-00 00:00:00', NULL, '0000-00-00 00:00:00', NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
