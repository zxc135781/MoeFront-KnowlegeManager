<?php
/** 
* 知识笔记管理RIA init.php Global.php 全局基类
* @Copyright(c) 2015 MoeFront All rights reserved.
*/
class RIA_Global{
	var $dbhost = DBHOST;
	var $dbuser = DBUSER;
	var $dbpass = DBPASS;
	var $dbname = DBNAME;
	public $retType = MYSQLI_ASSOC;

/*------------------------数据库相关------------------------*/

/** 
* 建立并初始化与数据库的连接
* @param $this->dbhost
* @param $this->dbuser
* @param $this->dbpass
* @param $this->dbname
*/
public function Db(){
	$c = new mysqli($this->dbhost,$this->dbuser,$this->dbpass,$this->dbname);
	$c->query("SET NAMES UTF8");
	return $c;
}

/*------------------------程序运行相关------------------------*/

/**
* 程序启动初始化
*/
public function Init(){
	if($this->isPost('act','get'))
		$act = $_GET['act'];
	else
		$act = 'index';
	switch($act){
		case 'index':
		default:
		require APP_ROOT.'/Template/index.php';
		break;

		case 'edit':
		require APP_ROOT.'/Template/editor.php';

	}
}

/**
* 是否接受了某个提交到的请求
* @param $postName
* @param $postType
*/
public function isPost($postName, $postType){
	if($postType == 'get'){
		if(isset($_GET[$postName]))
			return true;
		else
			return false;
	}
	elseif($postType == 'post'){
		if(isset($_POST[$postName]))
			return true;
		else
			return false;
	}
	else
		return false ;		//若不是GET也不是POST，直接返回False

}

/**
* 响应重定向命令
* @param $redirectURL
*/
public function Redirect($redirectURL){
	echo '<script>window.localtion.href="'.$redirectURL.'"</script>';
}

/*------------------------操作方法相关------------------------*/

/**
* 获取程序 ria_option 表的选项
* @param $name
* @param $inputMethod
*/
public function getOption($name , $inputMethod = 0){
	$query = $this->Db()->query("SELECT * FROM ria_option WHERE name ='{$name}' ");
	$result = mysqli_fetch_array($query,$this->retType);
	if($inputMethod == 0)
		return $result['value'];
	else
		echo $result['value'];
}

/**
* 通过笔记序号获取文章信息
* @param $noteID 
* @param $returnContent
*/
public function noteInfo($noteID,$returnContent){
	$query = $this->Db()->query("SELECT * FROM ria_content WHERE cid = '{$noteID}'");
	$result = mysqli_fetch_array($query,$this->retType);
	return $result[$returnContent];
}
}