	
$(document).ready(function(){
	
	var element = $('.listP a');;
	var offset = 0; 
	var stepping = 0.03;
	var list = $('.listP');
	var $list = $(list)
	
	$list.mousemove(function(e){
		var topOfList = $list.eq(0).offset().top
		var listHeight = $list.height()
		stepping = (e.clientY - topOfList) /  listHeight * 0.2 - 0.1;
		
	});
	

	for (var i = element.length - 1; i >= 0; i--)
	{
		element[i].elemAngle = i * Math.PI * 2 / element.length;
	}
	
	
	setInterval(render, 20);
	
	
	function render(){
		for (var i = element.length - 1; i >= 0; i--){
			
			var angle = element[i].elemAngle + offset;
			
			x = 120 + Math.sin(angle) * 30;
			y = 45 + Math.cos(angle) * 40;
			size = Math.round(20 - Math.sin(angle) * 20);
			
			var elementCenter = $(element[i]).width() / 2;
	
			var leftValue = (($list.width()/2) * x / 100 - elementCenter) + "px"
	
			$(element[i]).css("fontSize", size + "pt");
			$(element[i]).css("opacity",size/100);
			$(element[i]).css("zIndex" ,size);
			$(element[i]).css("left" ,leftValue);
			$(element[i]).css("top", y + "%");
		}
		
		offset += stepping;
	}
	
	
});

