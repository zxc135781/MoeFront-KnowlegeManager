<?php
/** 
* 知识笔记管理RIA init.php 初始化文件
* @Copyright(c) 2015 MoeFront All rights reserved.
*/

define('APP_ROOT',dirname(__file__));
require 'config.php';

/** 数据库基类文件 必须先于Global引入 */
require 'Lib/Database.php';

/** 全局基类文件 require */
require 'Lib/Global.php';

$WA = new RIA_Global();

/** Markdown 解析器 require */
require 'Lib/Markdown.php';
require 'Lib/MarkdownExtraExtended.php';