<?php
/** 
* 知识笔记管理RIA init.php 初始化文件
* @Copyright(c) 2015 MoeFront All rights reserved.
*/

define('APP_ROOT',dirname(__file__));
require 'config.php';

/** 全局基类文件 require */
require 'Lib/Global.php';

$WA = new RIA_Global();