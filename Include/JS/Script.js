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