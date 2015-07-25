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
<div class="left">
	<h2 style="text-align:center;color:#888888;padding:10px;font-weight:normal;">归类在 <?php echo $sid; ?> 下的笔记(<?php echo $this->count($sid); ?>)</h2>
	<?php $this->getSortNotes($sid,'<div class="left-title">','</div>'); ?>
	<br><br>
	<div style="position:absolute;bottom:0px;"><?php $this->pageNav(); ?></div>
</div>
<div class="right">
	<h2 id="title-there" style="text-align:center;color:#888888;padding:10px;font-weight:normal;">内容</h2>
	<div class="article-content" id="content-there">
		<h3 style="text-align:center;font-weight:normal;">点击左边的笔记标题后，可以在这里看到内容，以及进行编辑等操作。</h3>
	</div>
	<div id="action-there"></div>
	<div id="comments-there"></div>
</div>
</div>