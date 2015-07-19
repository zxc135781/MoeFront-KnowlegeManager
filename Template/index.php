<?php
/**
 * 知识笔记管理 RIA 模版主页
 * @package Knowlege Note Manager RIA Template Index.php
 * @author MoeFront 2015
 * @version 1.0
 * @link https://moefront.github.io
 */
include 'header.php';

?>
<div class="container">
	<div class="panel">
	 	<h2 class="panel-title">我的笔记本</h2>
	 	<br>
	 	<?php $this->getRecentNotes(6,'<div class="note-container">',"</div>");?>
	</div>
</div>