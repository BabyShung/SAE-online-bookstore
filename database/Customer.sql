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
-- 表的结构 `Customer`
--

CREATE TABLE IF NOT EXISTS `Customer` (
  `CustomerID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Avatar` varchar(100) DEFAULT 'Demo.png' COMMENT '用户头像',
  `gender` varchar(2) NOT NULL COMMENT '性别',
  `Tel` varchar(50) DEFAULT NULL,
  `IDnum` varchar(20) DEFAULT NULL COMMENT '身份证号',
  `intro` varchar(60) DEFAULT NULL COMMENT '自我简介',
  `weibo` varchar(50) DEFAULT NULL COMMENT '微博',
  `province` varchar(14) NOT NULL COMMENT '省份',
  `city` varchar(14) NOT NULL COMMENT '城市',
  `Grade` int(11) NOT NULL DEFAULT '1' COMMENT '等级',
  PRIMARY KEY (`CustomerID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=38 ;

--
-- 转存表中的数据 `Customer`
--

