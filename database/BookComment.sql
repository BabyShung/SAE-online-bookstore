-- phpMyAdmin SQL Dump
-- version 3.3.8.1
-- http://www.phpmyadmin.net
--
-- 主机: w.rdc.sae.sina.com.cn:3307
-- 生成日期: 2012 年 04 月 18 日 23:14
-- 服务器版本: 5.1.47
-- PHP 版本: 5.2.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `app_lab1`
--

-- --------------------------------------------------------

--
-- 表的结构 `BookComment`
--

CREATE TABLE IF NOT EXISTS `BookComment` (
  `BCid` int(11) NOT NULL AUTO_INCREMENT,
  `parent` int(11) NOT NULL DEFAULT '0',
  `respond` int(11) NOT NULL DEFAULT '0' COMMENT '回复指向的BcID',
  `BookID` int(11) NOT NULL DEFAULT '0' COMMENT '书籍表的外键',
  `UserID` int(11) NOT NULL COMMENT '连接到User表和Customer表的ID',
  `usr` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `comment` text COLLATE utf8_unicode_ci NOT NULL,
  `dt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`BCid`),
  KEY `parent` (`parent`,`BCid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=39 ;

--
-- 转存表中的数据 `BookComment`
--

