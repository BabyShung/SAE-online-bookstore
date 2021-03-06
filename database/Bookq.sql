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
-- 表的结构 `Bookq`
--

CREATE TABLE IF NOT EXISTS `Bookq` (
  `BookID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `imgName` varchar(255) DEFAULT 'DemoBook.jpg' COMMENT '图书图片的名称',
  `ISBN` varchar(100) NOT NULL,
  `Category` varchar(200) NOT NULL COMMENT '书籍类别',
  `Bname` varchar(200) NOT NULL COMMENT '书名',
  `SalePrice` double NOT NULL COMMENT '书价',
  `Author` varchar(128) NOT NULL COMMENT '作者',
  `Description` text COMMENT '描述',
  `Stock` int(11) NOT NULL DEFAULT '1' COMMENT '库存（有货没货）',
  `Version` varchar(20) DEFAULT '1.0' COMMENT '版本',
  `PTime` datetime NOT NULL COMMENT '出版时间',
  `Publisher` varchar(128) NOT NULL COMMENT '出版社',
  `STime` datetime DEFAULT NULL COMMENT '最近交易时间',
  `AQuan` int(11) NOT NULL DEFAULT '1' COMMENT '书籍数量',
  `saled` int(11) NOT NULL DEFAULT '0' COMMENT '卖出多少本',
  `NewBook` int(11) NOT NULL DEFAULT '1',
  `Command` int(11) NOT NULL DEFAULT '1',
  `Favor` int(11) NOT NULL DEFAULT '0' COMMENT '喜欢人数',
  `UTime` timestamp NULL DEFAULT CURRENT_TIMESTAMP COMMENT '本书上传时间',
  PRIMARY KEY (`BookID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4294967296 ;

--
-- 转存表中的数据 `Bookq`
--

INSERT INTO `Bookq` (`BookID`, `imgName`, `ISBN`, `Category`, `Bname`, `SalePrice`, `Author`, `Description`, `Stock`, `Version`, `PTime`, `Publisher`, `STime`, `AQuan`, `saled`, `NewBook`, `Command`, `Favor`, `UTime`) VALUES
(1, '1298013065437.jpg', '978-7-80588-833-0', '管理', '现代消防安全技术', 38, '王元基', '该书是一本图文并茂的消防科普性教材。内容涉及基础消防知识、燃烧与火灾、火灾的预防、火灾的扑救、火场逃生、重点单位消防管理等内容。通过消防知识的有效普及，让全社会树立消防意识，保障生命财产与安全，突出了以人为本、生命至上这一主题。\r\n    消防科普工作是关系到全社会各行各业和每个人切身利益的公共事业，将消防知识纳入社会教育、培训的内容，提高全民的消防素质，增强全社会抗御火灾的能力，意义重大。本书以图文的形式使这本普及性读物更加通俗易懂。', 1, '1.0', '2010-08-02 00:00:00', '甘肃人民出版社', NULL, 100, 0, 1, 2, 35, '2005-02-22 16:34:18'),
(2, '1298014066406.jpg', '978-7-226-03389-0', '管理', '趣谈领导学', 26, '张庆武', '作者以辩证唯物主义为指导，参考西方行为组织学理论，列举了大量我国古今为官做人的实例，阐述了领导素质、领导作风、领导方法、领导艺术等方面的理论知识。该书文字生动简洁、叙述风格幽默，既可作为领导干部修身养性的读本，也是一本可供广大社会读者阅读的思想修养通俗读物。', 1, '1.0', '2009-07-01 00:00:00', '甘肃人民出版社', NULL, 20, 9, 1, 1, 105, '2010-02-25 16:35:45'),
(3, '1293010862562.jpg', '978-7-5424-1433-5', '健身保健', '疾病预防控制：健康读本', 28, '万国生', '全书以问答的形式，对当前人们常见传染病、地方病、慢性病、职业病和食品安全等疾病的预防\r\n控制做了简明扼要的解答。内容科学实用，针对性强，通俗易懂，适用于各类人群。同时本书针对各类的人群进行合适地分析，相信一定能够给读者带来好处。\r\n', 1, '1.0', '2010-12-01 00:00:00', '甘肃科学技术出版社', NULL, 1000, 6, 1, 1, 90, '2012-02-04 18:58:21'),
(4, '1298515353828.jpg', '978-7-5424-1271-3', '健身保健', '家庭实用救护手册', 28, '王新田', '本书共分为九个部分：急救基础、家庭常用急救技术、家庭常见急症救治、家庭常见急危重病救护、\r\n家庭意外损伤急救、家庭常见急慢性传染病的防护、家庭常见中毒的急救、家庭实用护理技术、\r\n家庭实用中医技术。内容全面，包括内、外、妇、儿、五官、传染、中医等领域急救及护理基本知识与技术，\r\n紧密结合现代家庭实际，图文并茂将平时可能遇到的急救问题和抢救技术，护理知识与护理技术，\r\n以逐步提问的形式逐一回答，力求浅显易懂，更加直观，便于理解、记忆，\r\n教给读者家庭最常见和最实用的急救基本知识与技术，因而具有较强的科学性、技术性、实用性和通俗性。', 1, '1.0', '2010-08-01 00:00:00', '甘肃科学技术出版社', NULL, 754, 1, 1, 1, 99, '2012-02-04 19:01:17'),
(5, '1297669659312.jpg', '978-7-5423-1398-0', '教育', '教育学', 32, '金东海', '本教材是依据教育部人事司会同教育部考试中心组织有关专家研究制定的教师资格认定《教育学考试大纲》和《教育心理学考试大纲》编写的，主要提供给中学教师资格申请者使用。\r\n同时，也适合作为高等师范院校教师及各类在职教师继续教育的教材。\r\n本书稿由专家编委会进行了审定，内容科学严谨，语言通俗易懂，可满足学习者使用应考。', 1, '1.0', '2010-09-01 00:00:00', '甘肃教育出版社', NULL, 345, 4, 1, 1, 2, '2012-02-04 19:02:33'),
(6, '1300843780406.jpg', '978-7-226-03975-5', '教育', '简明中外教育制度史', 39, '刘丽平', '本书运用历史唯物主义的观点方法，研究自古至今中外教育制度的产生、发展和演变的过程及内容，\r\n总结不同历史阶段教育制度的优缺点，作出科学的评价，探求教育发展的客观规律。\r\n本书分上下两编，上编是中国教育制度史部分，下编是国外部分国家教育制度史。', 1, '1.0', '2010-06-01 00:00:00', '甘肃人民出版社', NULL, 645, 0, 1, 1, 80, '2012-02-04 19:05:59'),
(7, '1292910792437.jpg', '978-7-226-0358', '经济', '点滴集—发展·项目·改革论文', 38, '胡富斌', '本稿精选汇编了作者从事经济管理工作20多年来发表于各类报刊上的着重于研究和反映定西经济发展、\r\n项目建设和体制改革的调研文章共58篇，并配有50多幅插图。全书共分三部分，各部分以时间顺序编排，\r\n清楚地论述反映了定西发展改革的历程。这些文章有经验总结，有问题剖析，更有理性思考和对策建议，\r\n立论高远，内容充实，线索清晰，行文流畅，对方便广大读者了解和研究定西乃至甘肃的发展改革历程，具有一定的参考价值', 1, '1.0', '2007-07-01 00:00:00', '甘肃人民出版社', NULL, 546, 0, 1, 1, 2, '2012-02-04 19:07:46'),
(8, '1319445962725.jpg', '978-7-226-03708-9', '经济', '货币政策研究', 15, '魏长徵', '《货币政策研究》根据我国不同时期货币政策工具的变化，对我国改革开放以来各种货币政策工具进行全景式的回顾和剖析，通过对我国货币政策的操作目标和货币政策框架进行分析，探讨我国货币政策工具效果及其深层次原因，并提出改革的方向和政策建议。', 1, '1.0', '2009-01-01 00:00:00', '甘肃人民出版社', NULL, 545, 7, 1, 2, 48, '2012-02-04 19:09:00'),
(9, '1300930444843.jpg', '1003-4765', '期刊杂志', '故事作文2012年1期高年级', 5, '故事作文', '天空是一本书\r\n白天，太阳公公来照亮\r\n夜晚，月亮姐姐来点灯\r\n天空是一本书\r\n风哥哥追着白云弟弟跑\r\n蝴蝶想与小鸟交朋友\r\n星星妹妹与月亮姐姐捉迷藏\r\n这本书的内容好丰富\r\n我想登上一架长长的梯子\r\n去天上看看\r\n还想用蜡笔\r\n在书上画出美丽的图案\r\n天空是一本书\r\n在这本书里\r\n还有好多故事和知识\r\n等着我去发现呢', 1, '1.0', '2011-02-10 00:00:00', '甘肃人民出版社', NULL, 100, 21, 1, 1, 35, '2012-02-10 11:11:59'),
(10, '1326682130690.jpg', '1001-7674', '期刊杂志', '飞碟探索2012年1期', 5, '故事会', '科学的发展实现了古人神话中的飞天梦，21世纪人类的思想更是飞得更高更远了。在有限的生命时间里漫游宇宙，为了实现一个心愿回到过去或走进未来，也就成为人类殷切期望实现的下一个梦想。爱因斯坦在科学理论上曾经告慰人们说，回到过去和走进未来是可能的，只要有一个稳定的虫洞，即一条贯穿空间和时间的隧道，人就可以跨越时间和空间。然而，跨越时空的旅行真的有可能实现吗？幻想里的时间机器能够制造出来吗？许多人对时间旅行在理论上可行的说法都表示怀疑。', 1, '1.0', '2012-02-10 00:00:00', '甘肃人民出版社', NULL, 100, 26, 1, 2, 2, '2012-02-10 11:17:49'),
(11, '1300952347656.jpg', '978-7-226-04021-8', '人生哲学', '读者.乡土人文十年精华百味人生.A卷', 29.8, '读者编委会', ' 本书是《读者乡土人文版》十年精华文丛A卷系列丛书之一，本书辑录“百味人生”\r\n 栏目自创办十年来前五年中所刊登的精华文章，以短小精悍的篇幅和寓意深长的故事，\r\n讲述平凡小事中所蕴含的浓浓情意与生命本质的芬芳。篇篇短文汇聚精神甘露，点滴真情感动至善人心。 ', 1, '1.0', '2011-01-24 00:00:00', '甘肃人民出版社', NULL, 1000, 0, 1, 2, 114, '2012-02-10 11:20:28'),
(12, '1320735653395.jpg', '978-7-5421-1502-7', '人生哲学', '不要忧伤', 38, '孔德军 译  阿伊德哥尔尼', ' 这是一本抚慰心灵创伤、催人奋发向上的通俗哲理性读物，\r\n由沙特阿拉伯学者阿伊德·哥尔尼著。全书大量引用与人为善、\r\n团结互助，鼓励人坚强不屈、乐观向上的经典文字和实例，\r\n劝慰因遭遇生活挫折、自然灾难而导致心灵受到创伤的人们坚定信念正视现实，\r\n中和处世，乐观进取，积极重建美好生活。全书牢牢把握伊斯兰文化的本质，\r\n通俗而深刻地解读伊斯兰文化的精粹，因此打破了地域、民族、宗教、职业、\r\n性别、年龄界限，具备了极强的现实针对性和广泛的读者普适性，\r\n问世后迅速风靡全球，迄今已被译成20多种文字，全球发行量超过1000万册。', 1, '1.0', '2011-04-25 00:00:00', '甘肃民族出版社', NULL, 1, 17, 1, 1, 2, '2012-02-10 11:22:13'),
(13, '1277622474139.PNG', '978-5422-2378-4', '少儿', '宝贝快乐童谣', 10, '葛翠琳', '《宝贝童谣100首》是适合0-5岁幼儿咏读的作品。\r\n作者葛翠琳用朴素无华的语言写出的幼儿童谣，不仅文字简洁，\r\n朗朗上口，而且亲子交融，感情至深。对0-5岁幼儿早期阅读是很好的语言发展辅助读物。\r\n旅美画家吴儆芦，是优秀的儿童插图画家。他擅长儿童人物插图，绘画功底扎实。吴儆芦先生为《宝贝童谣100首》插图，\r\n使这本读物绘画质量得以保证，将成为2007年优秀儿童读物评选的有利竞争品种。', 1, '1.0', '2007-12-01 00:00:00', '甘肃人民出版社', NULL, 1, 2, 1, 1, 0, '2012-02-10 11:24:05'),
(14, '1320827544738.jpg', '978-7-88911-079-2', '少儿', '快乐说唱三字经', 12, '飞天电子音像出版社', '  中国传统文化源远流长，博大精深。让孩子们尽早学习这些文化精髓，\r\n既可以让他们增长知识，开阔视野，又可以让他们增加修养，汲取智慧，懂得为人处世、求学上进的道理。\r\n这对他们健康成长，建立健全的人格，培养深厚的人文底蕴是非常有益的。 ', 1, '1.0', '2011-10-01 00:00:00', '甘肃人民出版社', NULL, 1, 0, 1, 1, 0, '2012-02-10 11:25:29'),
(15, '1313372959046.jpg', '978-7-5421-1548-5', '生活', '农家菜谱', 21, '孙开军 李建奇', ' 随着农民物质生活的极大丰富，对营养美味的不断追求，家常菜的内涵也越来越丰富了\r\n，过去很多在宴席上才能偶尔见到的菜肴，已经成为平民百姓餐桌上的家常菜了。\r\n本书立足于广大农民所喜爱的农家菜，将菜谱定位于农家家常菜的巧做、善吃上，\r\n不但在做法上以最贴近农民做菜的思路，一目了然、简明扼要地教读者如何做菜，\r\n而且对每道菜都作了营养成分的分析，提醒读者在了解菜肴独特风味的同时也注重养生之道。', 1, '1.0', '2011-07-01 00:00:00', '甘肃民族出版社', NULL, 111, 11, 1, 1, 1, '2012-02-10 11:28:26'),
(16, '1313482491749.jpg', '978-7-5468-0134-6', '生活', '泾川小吃录', 30, '张怀群', ' 散文集。图文并茂地记述了泾川地区的民间小吃百余种，\r\n文字朴实流畅，以小吃作为背景全面详细地表现了泾川地区的民间文化和民俗风貌。', 1, '1.0', '2010-12-01 00:00:00', '敦煌文艺出版社', NULL, 111, 1, 1, 1, 90, '2012-02-10 11:30:53'),
(17, '1282384711906.jpg', '978-7-226-03980-9', '文学', '最女孩', 29, '张佳羽', '作者张佳羽，现为兰州市某中学初中学生，该书是作者的一个作品集。\r\n这些作品有作者对自己真实的生活和真实的想法的描写，也有作者对周围世界和事物的认识、\r\n思考和理解，还有给自己的经历和所见所闻所做的记录。这部作品，不仅表现了这个十四岁孩子的真诚、\r\n美好、善良……而且作品展示了作者丰富的想象力和难能可贵的写作天赋。', 1, '1.0', '2010-07-01 00:00:00', '甘肃人民出版社', NULL, 1, 0, 1, 1, 2, '2012-02-10 11:32:10'),
(18, '1315987449546.jpg', '978-7-226-04115-4', '文学', '丝路印记：丝绸之路与龟兹中外文化交流', 42, '新和县文化体育广播电视管理局', '本书是一部学术研讨会论文集，收纳了参加“丝绸之路与龟兹中外文化交流”学术研讨会的来自全国各地的专家\r\n、学者的24篇优秀论文，这些论文主要围绕古龟兹文化传统、龟兹文化与丝绸之路、汉唐屯田文化等课题展开论述，\r\n系统、深入地探讨了龟兹文化在中外交流中的历史作用和贡献，\r\n并为进一步研究和发掘古龟兹文化，促进当地旅游业发展提出了许多意见和建议', 1, '1.0', '2011-06-01 00:00:00', '甘肃人民出版社', NULL, 100, 2, 1, 2, 54, '2012-02-10 11:33:34'),
(19, '1315471770999.jpg', '978-7-5468-0146-9', '小说', '像向日葵一样成长', 26, '孟祥宁', '青春小说。这是一本纪录“90”后学习与生活的青春文学作品，作者是一位活泼可爱的女生，\r\n她以女主人公莫小爱的口吻，\r\n通过罗丽、麦落落、周小宇、陆茗等多个人物，为我们描述了当代中学生丰富的内心世界', 1, '1.0', '2010-12-01 00:00:00', '敦煌文艺出版社', NULL, 1000, 16, 1, 1, 3, '2012-02-10 11:34:56'),
(20, '1320804667988.jpg', '978-7-5468-0174-2', '小说', '求爱大作战 ', 28, '柳下挥', '长篇职场言情小说。主要讲述主人公方格因为一个骚扰电话而得罪了野蛮校花沈嫣离，\r\n被她当众羞辱了一番之后，开始的阴差阳错、让人啼笑皆非的求爱之旅。情节曲折，\r\n贴近生活，语言幽默，穿插职场流行元素，揭示都市生活中各种隐秘的“潜规则”，\r\n反映了当代年轻人的人生观和爱情观。', 1, '1.0', '2011-05-01 00:00:00', '敦煌文艺出版社', NULL, 1, 3, 1, 1, 1, '2012-02-10 11:35:56'),
(21, '1313483947562.jpg', '978-7-5424-1421-2', '医学', '血液安全与献血服务', 35, '张支凤 谢英', '《血液安全与献血服务》是一部关于如何提高血液安全性及提升献血服务质量的行业指导图书，\r\n内容全面新颖并结合无偿献血工作发展过程中的实际问题做了深入的论述。精选了献血者投诉、\r\n处理的实例，让读者从中吸取经验和教训，提高献血服务质量。本书共分八个章节，\r\n内容涵盖了血液安全、献血宣招募、献血服务、质量体系建设和相关法律法规等。', 1, '1.0', '2010-12-01 00:00:00', '甘肃科学技术出版社', NULL, 100, 12, 1, 1, 76, '2012-02-10 11:37:01'),
(22, '1317281188932.jpg', '978-7-5424-1458-8', '医学', '医学科研设计与分析', 38, '李应东', '书针对初涉医学领域的年轻研究人员或研究生，以医学科学研究设计与分析方法为核心，\r\n围绕专业设计与统计学设计两条主线，为他们开展科学研究提供系统的科研基本知识和技能，\r\n帮助他们尽快了解与熟悉医学科研设计与分析方法。本书从中医药科研的实际出发，\r\n并尽可能结合现代医学的特点作介绍和说明，内容包括：绪论、实验设计、临床试验设计、\r\n序贯试验设计、分析方法设计、SAS统计软件、医学论文撰写及附件。本书注重实用性，列举了大量实例，\r\n便于读者深入理解及实际应用时参考。 \r\n    本书可作为高等医学院院校的研究生教材，也可作为各级医务人员、\r\n医学教育工作者、科研人员的参考书。', 1, '1.0', '2011-08-01 00:00:00', '甘肃科学技术出版社', NULL, 111, 0, 1, 1, 65, '2012-02-10 11:38:00');
