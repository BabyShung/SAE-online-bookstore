-- phpMyAdmin SQL Dump
-- version 3.3.8.1
-- http://www.phpmyadmin.net
--
-- 主机: w.rdc.sae.sina.com.cn:3307
-- 生成日期: 2012 年 04 月 18 日 23:15
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
-- 表的结构 `User`
--

CREATE TABLE IF NOT EXISTS `User` (
  `UserID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Email` varchar(100) NOT NULL,
  `UserName` varchar(50) NOT NULL,
  `UserPWD` varchar(50) NOT NULL,
  `Freeze` int(11) NOT NULL DEFAULT '0',
  `IsOnline` int(11) NOT NULL DEFAULT '0',
  `Activate` int(11) NOT NULL DEFAULT '0' COMMENT '激活（0未，1已激活）',
  `Status` int(11) NOT NULL DEFAULT '0' COMMENT '用户和管理员的区分标签，用于防蹭网（0是用户，1是管理员）',
  `regIP` varchar(20) NOT NULL COMMENT '注册IP',
  `dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '注册时间',
  `lasttime` datetime NOT NULL COMMENT '最近一次登录时间',
  PRIMARY KEY (`UserID`),
  KEY `UserName` (`UserName`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=38 ;

--
-- 转存表中的数据 `User`
--
