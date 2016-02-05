$(document).ready(function(){
	$("section div.navega").mouseenter(function(evento){
		$(this).animate({width:"200px"},300,function(){
			$(this).find("div.texto").fadeIn("slow");
		});
	});
	$("section div.navega").mouseleave(function(evento){
		$(this).find("div.texto").fadeOut("slow",function(){
			$(this).parent().animate({width:"72px"},300);
		});
	});

});