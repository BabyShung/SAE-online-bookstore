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
-- 表的结构 `BookList`
--

CREATE TABLE IF NOT EXISTS `BookList` (
  `BookListID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Bname` varchar(200) DEFAULT NULL,
  `Bpinyin` varchar(200) DEFAULT NULL COMMENT '书籍拼音（大写）',
  `Bsuoxie` varchar(70) DEFAULT NULL COMMENT '书籍拼音首字母缩写',
  PRIMARY KEY (`BookListID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=23 ;

--
-- 转存表中的数据 `BookList`
--

INSERT INTO `BookList` (`BookListID`, `Bname`, `Bpinyin`, `Bsuoxie`) VALUES
(1, '现代消防安全技术', 'XIANDAIXIAOFANGANQUANJISHU', 'XDXFAQJS'),
(2, '趣谈领导学', 'QUTANLINDAOXUE', 'QTLDX'),
(3, '疾病预防控制：健康读本', 'JIBINGYUFANGKONGZHI', 'JBYFKZ'),
(4, '家庭实用救护手册', 'JIANGTINGSHIYONGJIUHUSHOUCHE', 'JTSYJHSC'),
(5, '教育学', 'JIAOYUXUE', 'JYX'),
(6, '简明中外教育制度史', 'JIANMINGZHONGWAIJIAOYUZHIDUSHI', 'JMZWJYZDS'),
(7, '点滴集—发展·项目·改革论文', 'DIANDIJI', 'DDJ'),
(8, '货币政策研究', 'HUOBIZHENGCHEYANJIU', 'HBZCYJ'),
(9, '故事作文2012年1期高年级', 'GUSHIZUOWEN2011', 'GSZW2011'),
(10, '飞碟探索2012年1期', 'FEIDIETANSUO', 'FDTS'),
(11, '读者.乡土人文十年精华百味人生.A卷', 'DUZHE', 'DZ'),
(12, '不要忧伤', 'BUYAOYOUSHANG', 'BYYS'),
(13, '宝贝快乐童谣', 'BAOBEIKUAILETONGYAO', 'BBKLTY'),
(14, '快乐说唱三字经', 'KUAILESHUOCHANGSANZIJING', 'KLSCSZJ'),
(15, '农家菜谱', 'NONGJIACAIPU', 'NJCP'),
(16, '泾川小吃录', 'JINGCHUANGXIAOCHILU', 'JCXCL'),
(17, '最女孩', 'ZUINVHAI', 'ZNH'),
(18, '丝路印记：丝绸之路与龟兹中外文化交流', 'SILUYINJI', 'SLYJ'),
(19, '像向日葵一样成长', 'XIANGXIANGRIKUIYIYANGCHENGZHANG', 'XXRKYYCC'),
(20, '求爱大作战', 'QIUAIDAZUOZHAN', 'QADZZ'),
(21, '血液安全与献血服务', 'XUEYEANQUANYUXIANXUEFUWU', 'XYAQYXXFW'),
(22, '医学科研设计与分析', 'YIXUEYANJIUSHEJIYUFENXI', 'YXYJSJYFX');
