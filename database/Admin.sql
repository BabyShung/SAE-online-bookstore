-- phpMyAdmin SQL Dump
-- version 3.3.8.1
-- http://www.phpmyadmin.net
--
-- 主机: w.rdc.sae.sina.com.cn:3307
-- 生成日期: 2012 年 04 月 18 日 23:13
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
-- 表的结构 `Admin`
--

CREATE TABLE IF NOT EXISTS `Admin` (
  `AdminID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Email` varchar(100) NOT NULL COMMENT '登录邮箱',
  `AdminName` varchar(50) NOT NULL,
  `AdminPWD` varchar(50) NOT NULL,
  `Power` int(11) NOT NULL DEFAULT '0' COMMENT '权限',
  `Status` int(11) NOT NULL DEFAULT '1' COMMENT '用户和管理员的区分标签，用于防蹭网（0是用户，1是管理员）',
  `dt` datetime DEFAULT NULL COMMENT '最近一次登录时间',
  PRIMARY KEY (`AdminID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- 转存表中的数据 `Admin`
--

INSERT INTO `Admin` (`AdminID`, `Email`, `AdminName`, `AdminPWD`, `Power`, `Status`, `dt`) VALUES
(1, 'admin@shuqing.com', '郑昊', '4297f44b13955235245b2497399d7a93', 0, 1, '2012-03-25 20:13:09'),
(3, 'admin1@shuqing.com', 'Peter', '4297f44b13955235245b2497399d7a93', 1, 1, '2012-03-25 20:14:04'),
(4, 'admin2@shuqing.com', 'Tommy', '4297f44b13955235245b2497399d7a93', 2, 1, '2012-03-25 20:14:32'),
(5, 'admin3@shuqing.com', 'Lucky', '4297f44b13955235245b2497399d7a93', 3, 1, '2012-04-07 01:17:44'),
(6, 'admin4@shuqing.com', 'Brooklin', '4297f44b13955235245b2497399d7a93', 4, 1, '2012-03-25 20:17:21');
