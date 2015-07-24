<?php 
/**
* 知识笔记管理RIA	后端数据库连接配置文件
* 本程序使用 MySQLi 关系式数据库
* DBHOST : 数据库主机:端口；DBUSER：数据库用户名；DBPASS：数据库密码；DBNAME，所在数据库
* 请务必在创建所在数据库将数据库整理设置为 “utf8_general_ci”，以免影响程序正常工作
*/

if(!defined('APP_ROOT')) exit;

define('DBHOST','localhost');		//数据库主机，默认是localhost
define('DBUSER','root');			//数据库用户名，默认是root
define('DBPASS','root');			//数据库密码，一般为root或空
define('DBNAME','ria');			//数据库名称
define('DBPORT',3306);			//数据库端口，默认3306
