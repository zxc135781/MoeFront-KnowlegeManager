<?php
/**  返回JSON 格式数据  */
require '../init.php';
$db = new mysqli(DBHOST,DBUSER,DBPASS,DBNAME);
$db->query("SET NAMES UTF8");
if(isset($_GET['cid'])){
	$cid = $_GET['cid'];
	$query = $db->query("SELECT * FROM ria_content WHERE cid = {$cid}");
	$res = mysqli_fetch_array($query , MYSQLI_ASSOC);
	$res['content'] = Markdown::convert($res['content']);
	echo json_encode($res);
}
else
	exit;
?>