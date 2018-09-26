$(document).ready(function() {
	if( $(".menuDetailRightOuter").height() > 430 || $(".menuDetailRightOuter").height() < $(".menuDetailMiddle").height() && $(".menuDetailRightOuter").height() < $(window).height() )
	{
	  // $("#menu_container").css('position','absolute');
	   $window = $(window),
	   $sidebar = $(".menuDetailRightOuter"),
	   sidebarTop = $sidebar.position().top + 430,
	   sidebarHeight = $sidebar.height(),
	  // alert(sidebarHeight);
	   $footer = $(".footer"),
	   footerTop = $footer.position().top,   
	   $sidebar.addClass('fixed');
	   $window.scroll(function(event) {
	   		scrollTop = $window.scrollTop();
	   		topPosition = Math.max(0, sidebarTop - scrollTop) + 0;
	   		topPosition = Math.min(topPosition, (footerTop - scrollTop) - sidebarHeight + 0);
			//alert(topPosition);
	   		$sidebar.css('top', topPosition);
			if( $(".menuDetailRightOuter").height() > $(window).height() )
				 {
					 $(".menuDetailRightOuter").removeClass('fixed');
					// $(".detailsRight11").css('fixed');
				 }
	   });	
	}
});
$(document).ready(function() {
	   $window = $(window),
	   $sidebarLeft1 = $(".menuDetailLeft"),
	   sidebarTop1 = $sidebarLeft1.position().top + 430,
	   sidebarHeight1 = $sidebarLeft1.height(),
	 // $footer = $(".footer"),
	  // footerTop = $footer.position().top,  
	   $sidebarLeft1.addClass('fixed');
	   $window.scroll(function(event) {
	   		scrollTop = $window.scrollTop();
	   		topPosition = Math.max(0, sidebarTop1 - scrollTop) + 0;
	   		topPosition = Math.min(topPosition, (footerTop - scrollTop) - sidebarHeight1 + 0);
	   		$sidebarLeft1.css('top', topPosition);
	   });	
		
		
});
