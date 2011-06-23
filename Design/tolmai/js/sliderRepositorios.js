$(document).ready(function() {
			//Show the paging and activate its first link
			$(".paging").show();
			$(".paging a:first").addClass("active");

			//Get size of the image, how many images there are, then determin the size of the image reel.
			var imageWidth = $(".window").width();
			var imageSum = $(".image_reel img").size();
			var imageReelWidth = imageWidth * imageSum;

			//Adjust the image reel to its new size
			$(".image_reel").css({'width' : imageReelWidth});

			//Paging  and Slider Function
			rotate = function(){
				var triggerID = $active.attr("rel") - 1; //Get number of times to slide
				var image_reelPosition = triggerID * imageWidth; //Determines the distance the image reel needs to slide

				$(".paging a").removeClass('active'); //Remove all active class
				$active.addClass('active'); //Add active class (the $active is declared in the rotateSwitch function)

				//Slider Animation
				$(".image_reel").animate({
					left: -image_reelPosition
				}, 500 );

			};

			//Rotation  and Timing Event
			rotateSwitch = function(){
				play = setInterval(function(){ //Set timer - this will repeat itself every 7 seconds
					$active = $('.paging a.active').next(); //Move to the next paging
					if ( $active.length === 0) { //If paging reaches the end...
						$active = $('.paging a:first'); //go back to first
					}
					rotate(); //Trigger the paging and slider function
				}, 2000); //Timer speed in milliseconds (7 seconds)
			};

			rotateSwitch(); //Run function on launch

			//On Hover
			$(".image_reel a").hover(function() {
				clearInterval(play); //Stop the rotation
			}, function() {
				rotateSwitch(); //Resume rotation timer
			});

			//On Click
			$(".paging a").click(function() {
				$active = $(this); //Activate the clicked paging
				//Reset Timer
				clearInterval(play); //Stop the rotation
				rotate(); //Trigger rotation immediately
				rotateSwitch(); // Resume rotation timer
				return false; //Prevent browser jump to link anchor
			});
			$("#topnav li").prepend("<span></span>"); //Throws an empty span tag right before the a tag

			$("#topnav li").each(function() { //For each list item...
				var linkText = $(this).find("a").html(); //Find the text inside of the <a> tag
				$(this).find("span").show().html(linkText); //Add the text in the <span> tag
			});

			$("#topnav li").hover(function() {	//On hover...
				$(this).find("span").stop().animate({
					marginTop: "-40" //Find the <span> tag and move it up 40 pixels
				}, 250);
			} , function() { //On hover out...
				$(this).find("span").stop().animate({
					marginTop: "0"  //Move the <span> back to its original state (0px)
				}, 250);
			});

		});