<?php
/**
 * 知识笔记管理 RIA 笔记分类归档页面
 * @package Knowlege Note Manager RIA Template archive.php
 * @author MoeFront 2015
 * @version 1.0
 * @link https://moefront.github.io
 */
include 'header.php';
if(!isset($cid)){
	$this->Redirect('index.php');
	exit;
}
?>
<div class="mf-banner">
	<div class="container">
		<div class="panel">
			<h2 class="panel-title">笔记阅读</h2>
			<br>
			<div class="note-container">
				<h3 class="note-title"><?php echo $this->getNoteInfo($cid,'title'); ?></h3>
				<div class="note-content">
					<?php echo Markdown::convert($this->getNoteInfo($cid,'content')); ?>
				</div>
				<div class="note-tags" style="background-color:<?php echo $this->randColor();?>;">
				日期：<?php echo $this->getNoteInfo($cid,'date'); ?> // 
				分类：<?php echo $this->getNoteInfo($cid,'sort'); ?>  //
				标签：<?php echo $this->getNoteInfo($cid,'tags'); ?>
				<a href="index.php?act=edit&cid=<?php echo $cid; ?>" class="read-this">编辑笔记内容</a>
				</div>
			</div>
			<?php $this->need('Template/footer.php');?>
		</div>
	</div>
</div>