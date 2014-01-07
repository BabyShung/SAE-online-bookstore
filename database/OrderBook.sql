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
-- 表的结构 `OrderBook`
--

CREATE TABLE IF NOT EXISTS `OrderBook` (
  `OrderID` int(10) unsigned NOT NULL,
  `BookID` int(10) unsigned NOT NULL,
  `Quan` int(10) unsigned NOT NULL COMMENT '数量（购买了多少本）',
  PRIMARY KEY (`OrderID`,`BookID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `OrderBook`
--

