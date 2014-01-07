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
-- 表的结构 `Reply`
--

CREATE TABLE IF NOT EXISTS `Reply` (
  `Rid` int(11) NOT NULL AUTO_INCREMENT,
  `BCid` int(11) NOT NULL COMMENT '被回复者在评论表的ID',
  `HisBCid` int(11) NOT NULL DEFAULT '0' COMMENT '回复你的人那条评论的BCid',
  `ToID` int(11) NOT NULL DEFAULT '0' COMMENT '接受回复者的ID',
  `FromID` int(11) NOT NULL DEFAULT '0' COMMENT '发送者ID',
  `HasRead` int(11) NOT NULL DEFAULT '0' COMMENT '此消息是否读过，0没读1已读',
  `BookID` int(11) NOT NULL DEFAULT '0' COMMENT '书籍表的外键',
  `usr` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '发送者姓名',
  `comment` text COLLATE utf8_unicode_ci NOT NULL,
  `dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`Rid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=36 ;

--
-- 转存表中的数据 `Reply`
--

