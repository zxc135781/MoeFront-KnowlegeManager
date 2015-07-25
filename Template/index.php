<?php
/**
 * 知识笔记管理 RIA 模版主页
 * @package Knowlege Note Manager RIA Template Index.php
 * @author MoeFront 2015
 * @version 1.0
 * @link https://moefront.github.io
 */
include 'header.php';
if(isset($_GET['page']) && $_GET['page']> 0)
  $p = ($_GET['page']-1)*3;
else
   $p = 0;
?>
<div class="mf-banner">
<div class="left">
	<h2 style="text-align:center;color:#888888;padding:10px;font-weight:normal;">笔记列表</h2>
	<?php $this->testingGetNote('<div class="left-title">','</div>',$p); ?>
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