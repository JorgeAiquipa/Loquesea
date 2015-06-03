$(document).ready(function() {

	$(".menu-trigger").hover(function () {
		$(this).stop(true).animate({opacity: 1}, 300);
	},
	function(){
		$(this).stop(true).animate({opacity: 0.2}, 300);
	});

	$(".menu-color-ani1").hover(function () {
		$(this).stop(true).animate({color: '#0099ff'}, 250);
	},
	function(){
		$(this).stop(true).animate({color: '#FFFFFF'}, 250);
	});

	$(".menu-trigger").click( function(event){
		event.preventDefault();
		if ($(this).hasClass("isDown") ) {
			$(".main-menu").animate({height:"0px"}, 200);          
			$(this).removeClass("isDown");
			$(".main-menu-parent").fadeOut(100);
			$(".menu-trigger").css('background-position','0px')
			$("#main-body").stop(true).animate({opacity: 1}, 200);
			$("#page-container").stop(true).animate({opacity: 1}, 200);
			$(".main-menu-leftbar").hide(50);
			$(".main-menu-leftbar").removeClass("isDown");
		} else {
			$(".main-menu").animate({height:"80px"}, 200);
			$(".main-menu-parent").fadeIn(400);
			$(this).addClass("isDown");
			$(".menu-trigger").css('background-position','50px')
			$("#main-body").stop(true).animate({opacity: 0.3}, 200);
			$("#page-container").stop(true).animate({opacity: 0.3}, 200);
		}
		return false;
	});

	$(".main-menu-parent").click( function(event){
	//	event.preventDefault();		
		if ($(this).hasClass("hasChild") ) {
			var childId = "#" + $(this).attr('id') + "-child";

			$(".main-menu-leftbar").not(childId).hide(50);
			$(".main-menu-leftbar").not(childId).removeClass("isDown");
			if ($(childId).hasClass("isDown") ) {	
				$(childId).hide(200);
				$(childId).removeClass("isDown");
			}else{
				$(childId).show(200);
				$(childId).addClass("isDown");
			}
		} 
		return false;
	});

	$(".main-menu-child").click( function(event){
		if ($(this).hasClass("hasChild") ) {
			var childId = "#" + $(this).attr('id') + "-child";
			var posy = $(this).outerWidth() + 10;
			
			$(".leftbar-submenu").not(childId).hide(50);
			$(".leftbar-submenu").not(childId).removeClass("isDown");
			if ($(childId).hasClass("isDown") ) {	
				$(childId).hide(200);
				$(childId).removeClass("isDown");
			}else{
				$(childId).css('left',posy);
				$(childId).show(200);
				$(childId).addClass("isDown");
			}
		}
	});

	$("#salir").live("click", function(){
		$.ajax({
			type: 'POST',
			url: 'controlador/cUsuario.php',
			data: 'var=salir',
			success: function(data) {
				//alert(data);
				location.href = "index.php";
			}
		});
	});

});
