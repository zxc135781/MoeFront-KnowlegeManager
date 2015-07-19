-- phpMyAdmin SQL Dump
-- version phpStudy 2014
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2015 年 07 月 18 日 19:08
-- 服务器版本: 5.5.40
-- PHP 版本: 5.4.33

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `webapp`
--

-- --------------------------------------------------------

--
-- 表的结构 `ria_content`
--

CREATE TABLE IF NOT EXISTS `ria_content` (
  `cid` int(11) NOT NULL AUTO_INCREMENT COMMENT '内容的ID',
  `title` varchar(300) NOT NULL,
  `content` text NOT NULL,
  `date` varchar(50) NOT NULL,
  `status` int(11) NOT NULL,
  `sort` varchar(100) NOT NULL,
  `tags` varchar(200) NOT NULL,
  PRIMARY KEY (`cid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `ria_content`
--

INSERT INTO `ria_content` (`cid`, `title`, `content`, `date`, `status`, `sort`, `tags`) VALUES
(1, 'Hello,World!', '## 当你看到这篇笔记被输出，说明此 WebApp 已正常工作。\r\n\r\n## Enjoy!\r\n\r\nMoeFront 组成员 上', '2015/07/18,18:25:00', 1, '默认分类', 'HelloWorld');

-- --------------------------------------------------------

--
-- 表的结构 `ria_option`
--

CREATE TABLE IF NOT EXISTS `ria_option` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `value` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `ria_option`
--

INSERT INTO `ria_option` (`id`, `name`, `value`) VALUES
(2, 'title', 'MoeKnowlege - 知识笔记管理系统');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
