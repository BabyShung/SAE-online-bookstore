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
-- 表的结构 `Order2`
--

CREATE TABLE IF NOT EXISTS `Order2` (
  `OrderID` int(11) NOT NULL AUTO_INCREMENT,
  `Aid` int(11) NOT NULL COMMENT '收货地址IP',
  `DeliveryID` int(11) DEFAULT NULL,
  `PaymentID` int(11) DEFAULT NULL,
  `State` varchar(8) NOT NULL DEFAULT '未付款' COMMENT '订单的交易状态',
  `IsPost` int(11) NOT NULL DEFAULT '0' COMMENT '是否寄出，默认0未寄出',
  `Amount` double NOT NULL COMMENT '订单的总价',
  `Bz` varchar(200) DEFAULT NULL COMMENT '买家备注信息',
  `Enfore` varchar(10) NOT NULL DEFAULT '待处理' COMMENT '订单处理结果，属管理员',
  `dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '下订单的时间',
  PRIMARY KEY (`OrderID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=43 ;

--
-- 转存表中的数据 `Order2`
--

