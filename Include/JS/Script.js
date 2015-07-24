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
});