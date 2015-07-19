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
<div class="mf-banner">
	<div class="container">
		<div class="panel">
			<h2 class="panel-title">我的笔记本：共有 <?php echo $this->count();?> 篇笔记</h2>
			<br>
			<?php $this->getRecentNotes('<div class="note-container">',"</div>");?>
			<?php $this->need('Template/footer.php');?>
		</div>
	</div>
</div>