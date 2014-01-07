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
-- 表的结构 `Message`
--

CREATE TABLE IF NOT EXISTS `Message` (
  `MessageID` int(11) NOT NULL AUTO_INCREMENT,
  `Header` varchar(30) NOT NULL COMMENT '公告标题',
  `Message` varchar(100) NOT NULL COMMENT '公告内容',
  `url` varchar(200) DEFAULT NULL COMMENT '可能用的url',
  `dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '发布公告的时间',
  PRIMARY KEY (`MessageID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=25 ;

--
-- 转存表中的数据 `Message`
--

INSERT INTO `Message` (`MessageID`, `Header`, `Message`, `url`, `dt`) VALUES
(1, '好消息，新书上架', '让大家等候已久的《读者.乡土人文十年精华百味人生.A卷》终于上架。此书的数量充足，大家可以立即订购。', 'http://1.lab1.sinaapp.com/bInfo/index.php?bid=11&bn=%E8%AF%BB%E8%80%85.%E4%B9%A1%E5%9C%9F%E4%BA%BA%E6%96%87%E5%8D%81%E5%B9%B4%E7%B2%BE%E5%8D%8E%E7%99%BE%E5%91%B3%E4%BA%BA%E7%94%9F.A%E5%8D%B7', '2012-03-21 19:56:24'),
(2, '网站维护', '网站将在2012年5月5日进行维护，同时开发者需进行答辩。为您带来不便，十分抱歉。', NULL, '2012-03-19 11:46:43'),
(3, '书店开张！', '感谢大家的支持和鼓励，华软软件学院书擎网终于开张了！新开业前两个月八折优惠！', NULL, '2012-03-19 11:46:50'),
(24, '减价通知', '所有书籍5折', '', '2012-03-25 20:17:57'),
(23, '新书上架!', '新书《血液安全与献血服务》已经上架！数量充足，大家可以立即购买！', 'http://1.lab1.sinaapp.com/bInfo/index.php?bid=21&bn=%E8%A1%80%E6%B6%B2%E5%AE%89%E5%85%A8%E4%B8%8E%E7%8C%AE%E8%A1%80%E6%9C%8D%E5%8A%A1', '2012-03-23 17:38:25');
