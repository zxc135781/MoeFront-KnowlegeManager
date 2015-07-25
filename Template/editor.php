<?php
/**
 * 知识笔记管理 RIA MarkDown 编辑器页面
 */
include 'header.php';

if($this->isPost('cid','get')){
	$cid = $_GET['cid'];
	$s = true;
}
else{
	$s = false;
}

if($this->isPost('title','post') && $this->isPost('content','post')){
	$title = $_POST['title'];
	$content = $_POST['content'];
	$date = @date("Y/m/d,H:i:s");
	$sort = $_POST['sort'];
	$tags = $_POST['tags'];
	$status = 1;
	if(!$this->isPost('cid','get')){
		$cz = $this->addNote($title,$content,$date,$status,$sort,$tags);
		if($cz)
			$this->alert("新建笔记成功啦Kira~");
		else
			$this->alert("啊嘞，发生了点事情，没有把笔记写进数据库呢……");
	}
	else{
		$cz = $this->updateNote($cid,$title,$content,$date,$status,$sort,$tags);
		if($cz)
			$this->alert("修改笔记 《".$title."》 成功啦Kira~");
		else
			$this->alert("啊嘞，发生了点事情，没有把笔记写进数据库呢……");		
	}
}
?>
<script type="text/javascript" src="Include/JS/thinker-md.vendor.js"></script>
<link rel="stylesheet" type="text/css" href="Include/CSS/thinker-md.vendor.css"/>
<script>
	$("textarea[data-provide='markdown']").markdown({
		language: 'zh',
		fullscreen: {
			enable: true
		},
		resize: 'vertical',
		localStorage: 'md',
		imgurl: 'Include/IMG'
	});
</script>

<div class="mf-banner">
	<div class="container">
		<div class="panel">
			<h2 class="panel-title">MoeKnowlege Editor</h2>
			<br>
			<form method="post" action="#" style="font-size:22px;">
				<div class="note-container">
					<h3 class="note-title">
						<?php if(isset($_GET['cid']))
							echo '修改《'.$this->getNoteInfo($_GET['cid'],'title').'》';
							else
							echo '新建笔记';
						?>
					</h3>
					<div class="note-content">
						<span>标题</span> 
						<input type="text" class="input-area" name="title" <?php if($s) echo 'value="'.$this->getNoteInfo($cid,'title').'"'; ?>/>
						<br><br>
						<span>内容</span>
						<textarea name="content" class="editor-textarea" id="wmd-input" name="content" data-provide="markdown" rows="10" placeholder="在这里输入笔记的内容，支持 Markdown 语法."><?php if($s) echo $this->getNoteInfo($cid,'content'); ?></textarea>
						<br>
						<div class="editor-panel-two">
							<span>分类</span>
							<input type="text" class="input-area" name="sort" <?php if($s) echo 'value="'.$this->getNoteInfo($cid,'sort').'"'; ?>/>
						</div >
						<div class="editor-panel-two">
							<span>标签</span>
							<input type="text" class="input-area" name="tags" placeholder="多个标签请用英文逗号 ',' 隔开" <?php if($s) echo 'value="'.$this->getNoteInfo($cid,'tags').'"'; ?>/>
						</div >
						<br>
						<p style="text-align:right;"><button type="submit" class="editor-submit"><span class="icon-fighter-jet"> </span> 保存</button></p><br>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
