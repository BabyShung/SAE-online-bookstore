-- phpMyAdmin SQL Dump
-- version 3.3.8.1
-- http://www.phpmyadmin.net
--
-- 主机: w.rdc.sae.sina.com.cn:3307
-- 生成日期: 2012 年 04 月 18 日 23:12
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
-- 表的结构 `Address`
--

CREATE TABLE IF NOT EXISTS `Address` (
  `Aid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `CustomerID` int(10) unsigned NOT NULL,
  `Receiver` varchar(50) NOT NULL,
  `province` varchar(10) NOT NULL,
  `city` varchar(20) NOT NULL,
  `county` varchar(20) NOT NULL,
  `Tel` varchar(11) NOT NULL,
  `address` varchar(100) NOT NULL,
  `postcode` varchar(6) NOT NULL,
  `dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`Aid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- 转存表中的数据 `Address`
--

