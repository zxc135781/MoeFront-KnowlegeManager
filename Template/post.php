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
			<!--引入Disqus评论，因为没有时间只能暂时使用第三方评论-->
			<div class="note-container">
				<div id="disqus_thread" style="margin:20px;"></div>
				<script type="text/javascript">
					/* * * CONFIGURATION VARIABLES * * */
					var disqus_shortname = 'moefront';

					/* * * DON'T EDIT BELOW THIS LINE * * */
					(function() {
						var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
						dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
						(document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
					})();
				</script>
				<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript" rel="nofollow">comments powered by Disqus.</a></noscript>
			</div>
			<?php $this->need('Template/footer.php');?>
		</div>
	</div>
</div>