<?php
/**
 * 知识笔记管理 RIA MarkDown 编辑器页面
 */
include 'header.php';
?>
<script type="text/javascript" src="Include/JS/Markdown.Converter.js"></script>
<script type="text/javascript" src="Include/JS/Markdown.Sanitizer.js"></script>
<script type="text/javascript" src="Include/JS/Markdown.Editor.js"></script>
<div class="mf-banner">
	<div class="container">
		<div class="panel">
			<h2 class="panel-title">MoeKnowlege Editor</h2>
			<br>
			<form method="post" action="#" style="font-size:22px;">
				标题 <input type="text" class="input-area" name="title"/>
			</form>
		</div>
	</div>
</div>