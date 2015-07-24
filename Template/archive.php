<?php
/**
 * 知识笔记管理 RIA 笔记分类归档页面
 * @package Knowlege Note Manager RIA Template archive.php
 * @author MoeFront 2015
 * @version 1.0
 * @link https://moefront.github.io
 */
include 'header.php';
if(!isset($sid)){
	$this->Redirect('index.php');
	exit;
}
?>
<div class="mf-banner">
	<div class="container">
		<div class="panel">
			<h2 class="panel-title">
			正在阅读分类 <?php echo $sid; ?> 下的笔记 (<?php echo $this->count($sid);?>)
			</h2>
			<br>
			<?php $this->getSortNotes($sid,'<div class="note-container">',"</div>");?>
			<?php $this->need('Template/footer.php');?>
		</div>
	</div>
</div>