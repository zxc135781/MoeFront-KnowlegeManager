-- phpMyAdmin SQL Dump
-- version phpStudy 2014
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2015 年 07 月 21 日 12:33
-- 服务器版本: 5.5.40
-- PHP 版本: 5.4.33

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `ria`
--

-- --------------------------------------------------------

--
-- 表的结构 `ria_content`
--

CREATE TABLE IF NOT EXISTS `ria_content` (
  `cid` int(11) NOT NULL AUTO_INCREMENT COMMENT '笔记的编号',
  `title` varchar(1000) NOT NULL COMMENT '笔记的标题',
  `content` text NOT NULL COMMENT '笔记的内容',
  `date` varchar(20) NOT NULL COMMENT '笔记的日期',
  `status` int(11) NOT NULL COMMENT '笔记的状态',
  `sort` varchar(1000) NOT NULL COMMENT '笔记的分类',
  `tags` varchar(2000) NOT NULL COMMENT '笔记的标签',
  PRIMARY KEY (`cid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='存储MoeKnowlege笔记内容的表ria_content' AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `ria_content`
--

INSERT INTO `ria_content` (`cid`, `title`, `content`, `date`, `status`, `sort`, `tags`) VALUES
(1, 'Hello,World!', '> 当你看到这篇文章被正常输出，证明 MoeKnowlege 已经正常工作。\r\n\r\n> MoeKnowlege是RIA启航班MoeFront组完成的任务1的作品，可以完成对个人的知识笔记的管理，是一个完整的PHP程序\r\n\r\n> 那么，尽情享受吧！\r\n\r\nMoeFront\r\n2015/7/21', '2015/07/21,12:19:00', 1, '默认分类', 'HelloWorld'),
(2, 'Markdown 基本语法', '## 此文章使用编辑模式看会更加清楚哦\r\n\r\n\r\n### 标题\r\n\r\nMarkdown 用 "#" 表示标题，多少个"#"就表示多少级的标题，例如，\r\n\r\n   ## xxx\r\n\r\n等价于\r\n\r\n    <h2>xxx</h2>\r\n\r\n"##" 必须放在句首，效果如下：\r\n\r\n#### 我是一个标题\r\n\r\n### 字体效果\r\n\r\nMarkdown 可以表示多种字体效果，如粗体，斜体：\r\n\r\n粗体的表示方式：使用两个星号 ** 头尾框起字体\r\n\r\n    **something can be put there that will be bold**\r\n\r\n斜体的表示方式：使用一个星号 * 或者一个下划线 _ 头尾框起字体\r\n\r\n    *something can be put there that will be italic*\r\n\r\n### 块状引用\r\n\r\nMarkdown 在句首用一个">" 表示引用：\r\n\r\n> 我是引用的内容\r\n\r\n### 代码部分\r\n\r\nMarkdown 可以在句首空4格表示接下来的内容将是代码块，或者使用 三个``` 将代码头尾框起\r\n\r\n    document.write("Hello, world!");\r\n```\r\n<?php echo ''Hello,world!''; ?>\r\n```\r\n\r\n### 超链接\r\n\r\nMarkdown 使用 类似一个中括号加一个括号的组合来表示超链接：\r\n\r\n    [MoeFront 团队介绍](https://moefront.github.io/)\r\n\r\n效果：[MoeFront 团队介绍](https://moefront.github.io/)\r\n\r\n### 引用图片\r\n\r\nMarkdown 可以通过以下格式引用图片\r\n\r\n    ![图片的描述][图片的地址]\r\n\r\n### 无序列表和有序列表\r\n\r\nMarkdown 分别使用以下两种方法表示无序列表和有序列表：\r\n\r\n> 无序列表：\r\n\r\n    - 无序列表1\r\n    - 无序列表2\r\n\r\n> 有序列表：\r\n\r\n    1. 有序列表1\r\n    2. 有序列表2\r\n\r\n### 分割线\r\n\r\nMarkdown 使用“ --- ”表示分割线\r\n\r\n---\r\n\r\n上面是一条分割线。\r\n\r\nThat is almost all.', '2015/07/21,12:33:09', 1, '默认分类', 'Markdown语法');

-- --------------------------------------------------------

--
-- 表的结构 `ria_option`
--

CREATE TABLE IF NOT EXISTS `ria_option` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(1000) NOT NULL,
  `value` varchar(1000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `ria_option`
--

INSERT INTO `ria_option` (`id`, `name`, `value`) VALUES
(1, 'title', 'MoeKnowlege -  RIA启航班 MoeFront 组 任务1作品');

-- --------------------------------------------------------


-- 导出  表 ria.ria_ip 结构
CREATE TABLE IF NOT EXISTS `ria_ip` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ip` text,
  `date` text,
  `opt` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
