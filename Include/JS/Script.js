$(function(){
	var displayContent = true;
	$("#title-only").click(function(){
		if(displayContent){
			$(this).html("显示标题和内容");
			$(".note-content").fadeOut(500);
			displayContent = false;
		}
		else{
			$(this).html("<span class=\"icon-off\"></span>  仅显示标题");
			$(".note-content").fadeIn(500);
			displayContent = true;
		}
	});
	$("#to-top").hide();
	$(window).scroll(function() {
		if ($(window).scrollTop() > 300) {
			$("#to-top").fadeIn(200);
		} else {
			$("#to-top").fadeOut(200);
		}
	});
	$("#to-top").click(function() {
		$('body,html').animate({
			scrollTop: 0
		},
		1000);
		return false;
	});
});

function readNote(cid){
	$('.right').css({"display":"none"});
	var thisurl = "Lib/Json.php?cid="+cid;
	$.ajax({
		url: thisurl,
		dataType: "json",
		async: true,
		success: function(result) {
			$('#title-there').html(result.title);
			$('#content-there').html(result.content);
			$('#action-there').html('<p class="article-detail">分类： ' + result.sort + ' // 标签： '+ result.tags +' // 日期： '+ result.date +'  <a href="index.php?act=del&cid='+ cid +'" class="action-this"><span class="icon-remove"></span></a> <a class="action-this" href="index.php?act=edit&cid='+ cid +'"><span class="icon-pencil"></span></a> </p>');
			$('#comments-there').html('<div class="note-container"><div id="disqus_thread" style="margin:20px;"></div><script type="text/javascript">var disqus_shortname = "moefront";(function() {var dsq = document.createElement("script"); dsq.type = "text/javascript"; dsq.async = true;dsq.src = "//" + disqus_shortname + ".disqus.com/embed.js";(document.getElementsByTagName("head")[0] || document.getElementsByTagName("body")[0]).appendChild(dsq);})();</script><noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript" rel="nofollow">comments powered by Disqus.</a></noscript>');
			$('.right').fadeIn(500);
		},
		error: function() {
			$('#content-there').html("啊哦，加载数据失败惹……再试一次吧喵呜。");
			$('.right').fadeIn(500);
		}
	});
}