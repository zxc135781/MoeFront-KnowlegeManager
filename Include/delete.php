<?php 
require '../init.php';
if(!isset($_GET['cid'])) 
	exit;
else{
	$WA->delNote($_GET['cid']);
	$WA->alert("删除笔记成功啦！");
	$WA->Redirect('../index.php');
}
?>