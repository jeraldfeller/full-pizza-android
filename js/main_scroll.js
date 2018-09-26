$(window).scroll(function(){ 
		$(".middleIn").css("left","0px");
		if( $("#menu_container").height() > $(".detailsMiddle1").height() ) 
			{
			if( $("#menu_container").height() <= 500 )
				{
							
					/*if  ($(window).scrollTop() > $(".detailsMainMenu").offset({ scroll: false }).top){
					 
					   $("#menu_container").css("position", "fixed");
					   $("#menu_container").css("top", "10px");
					}*/
					
					if (($(window).scrollTop() <= $(".detailsMainMenu").offset({ scroll: false }).top) || ($(window).scrollTop() > ($(".Footer").offset({ scroll: false }).top - 500))){
					
					   $("#menu_container").css("position", "relative");
						$("#menu_container").css("top", "0px");
					   $("#menu_container").css("top", $(".detailsMainMenu").offset);
					}
				}
				
				if( $("#menu_container").height() > 500 )
					{
							
					/*if  ($(window).scrollTop() > $(".detailsMainMenu").offset({ scroll: false }).top){
					 
					   $("#menu_container").css("position", "fixed");
					   $("#menu_container").css("top", "10px");
					}*/
					
					if (($(window).scrollTop() <= $(".detailsMainMenu").offset({ scroll: false }).top) || ($(window).scrollTop() > ($(".Footer").offset({ scroll: false }).top - 820)))
						{
						//  $(".detailsMiddle1").css("paddingBottom", "50px");
						  $("#menu_container").css("position", "relative");
						  $("#menu_container").css("top", "0px");
						  $("#menu_container").css("top", $(".detailsMainMenu").offset);
						}
					}
			}
			if( $("#menu_container").height() < $(".detailsMiddle1").height() ) 
			{
			if( $("#menu_container").height() <= 520 )
				{
							
					if  ($(window).scrollTop() > $(".detailsMainMenu").offset({ scroll: false }).top){
					 
					   $("#menu_container").css("position", "fixed");
					   $("#menu_container").css("top", "10px");
					 //  $(".middleIn").css("left","205px");
					}
					
					if (($(window).scrollTop() <= $(".detailsMainMenu").offset({ scroll: false }).top) || ($(window).scrollTop() > ($(".Footer").offset({ scroll: false }).top - 500))){
					
					   $("#menu_container").css("position", "relative");
						$("#menu_container").css("top", "0px");
					   $("#menu_container").css("top", $(".detailsMainMenu").offset);
					}
				}
				
				if( $("#menu_container").height() > 520 )
					{
							
					if  ($(window).scrollTop() > $(".detailsMainMenu").offset({ scroll: false }).top){
					 
					   $("#menu_container").css("position", "fixed");
					   $("#menu_container").css("top", "10px");
					 //  $(".middleIn").css("left","205px");
					}
					
					if (($(window).scrollTop() <= $(".detailsMainMenu").offset({ scroll: false }).top) || ($(window).scrollTop() > ($(".Footer").offset({ scroll: false }).top - 650)))
						{
						//  $(".detailsMiddle1").css("paddingBottom", "50px");
						  $("#menu_container").css("position", "relative");
						  $("#menu_container").css("top", "0px");
						  $("#menu_container").css("top", $(".detailsMainMenu").offset);
						}
					}
			}
			
			// right side height greater than window
			
			//alert(rightHeight);
				var winTop = $(window).height();
				var midTop = $(".menuDetailMiddle").height() - $("#menu_container").height();
			if(  ($("#menu_container").height() < $(".menuDetailMiddle").height() ) || ($("#menu_container").height() > winTop ) ) 
				{
					if  ($(window).scrollTop() > $(".detailsMainMenu").offset({ scroll: false }).top){
					   $("#menu_container").css("position", "fixed");
					   $("#menu_container").css("top", "10px");
					}
					if (($(window).scrollTop() <= $(".detailsMainMenu").offset({ scroll: false }).top) || ($(window).scrollTop() > ($(".Footer").offset({ scroll: false }).top - 650)))
						{
						  $("#menu_container").css("position", "relative");
						  $("#menu_container").css("top",midTop);
						  $("#Footer").css("position", "absolute");
						  $("#Footer").css("top","0px");
						  
						  if (($(window).scrollTop() < ($(".Footer").offset({ scroll: false }).top - 650)))
						{
							 $("#menu_container").css("position", "relative");
							 $("#menu_container").css("top", "10px");
						}
						}
					
				}

	//});

/*-- Left side scroll --*/

//$(window).scroll(function(){ 
		if( $("#menu_left").height() > $(".detailsMiddle1").height() ) 
			{
			if( $("#menu_left").height() <= 500 )
				{
							
					/*if  ($(window).scrollTop() > $(".detailsMainMenu").offset({ scroll: false }).top){
					 
					   $("#menu_container").css("position", "fixed");
					   $("#menu_container").css("top", "10px");
					}*/
					
					if (($(window).scrollTop() <= $(".detailsMainMenu").offset({ scroll: false }).top) || ($(window).scrollTop() > ($(".Footer").offset({ scroll: false }).top - 500))){
					
					   $("#menu_left").css("position", "relative");
						$("#menu_left").css("top", "0px");
					   $("#menu_left").css("top", $(".detailsMainMenu").offset);
					}
				}
				
				if( $("#menu_left").height() > 500 )
					{
							
					/*if  ($(window).scrollTop() > $(".detailsMainMenu").offset({ scroll: false }).top){
					 
					   $("#menu_container").css("position", "fixed");
					   $("#menu_container").css("top", "10px");
					}*/
					
					if (($(window).scrollTop() <= $(".detailsMainMenu").offset({ scroll: false }).top) || ($(window).scrollTop() > ($(".Footer").offset({ scroll: false }).top - 820)))
						{
						//  $(".detailsMiddle1").css("paddingBottom", "50px");
						  $("#menu_left").css("position", "relative");
						  $("#menu_left").css("top", "0px");
						  $("#menu_left").css("top", $(".detailsMainMenu").offset);
						}
					}
			}
			if( $("#menu_left").height() < $(".detailsMiddle1").height() ) 
			{
			if( $("#menu_left").height() <= 520 )
				{
							
					if  ($(window).scrollTop() > $(".detailsMainMenu").offset({ scroll: false }).top){
					 
					   $("#menu_left").css("position", "fixed");
					   $("#menu_left").css("top", "10px");
					   $(".middleIn").css("left","205px");
					}
					/*if (($(window).scrollTop() <= $(".detailsMainMenu").offset({ scroll: false }).top) || ($(window).scrollTop() > ($(".Footer").offset({ scroll: false }).top - 500))){
					
					   $("#menu_left").css("position", "relative");
						$("#menu_left").css("top", "0px");
					   $("#menu_left").css("top", $(".detailsMainMenu").offset);
					   $(".middleIn").css("left","0");
					}*/
					var leftTop = $(".detailsMiddle1").height() - $("#menu_left").height();
					if (($(window).scrollTop() <= $(".detailsMainMenu").offset({ scroll: false }).top) || ($(window).scrollTop() > ($(".Footer").offset({ scroll: false }).top - 650)))
						{
						  $("#menu_left").css("position", "relative");
						  $("#menu_left").css("top",leftTop);
						  $("#Footer").css("position", "absolute");
						  $("#Footer").css("top","0px");
						    $(".middleIn").css("left","0px");
						  
						  if (($(window).scrollTop() < ($(".Footer").offset({ scroll: false }).top - 650)))
						{
							 $("#menu_left").css("position", "relative");
							 $("#menu_left").css("top", "10px");
						}
						}
				}
				
				if( $("#menu_left").height() > 520 )
					{
							
					if  ($(window).scrollTop() > $(".detailsMainMenu").offset({ scroll: false }).top){
					 
					   $("#menu_left").css("position", "fixed");
					   $("#menu_left").css("top", "10px");
					  //  $(".middleIn").css("left","205px");
					}
					
					if (($(window).scrollTop() <= $(".detailsMainMenu").offset({ scroll: false }).top) || ($(window).scrollTop() > ($(".Footer").offset({ scroll: false }).top - 650)))
						{
						//  $(".detailsMiddle1").css("paddingBottom", "50px");
						  $("#menu_left").css("position", "relative");
						  $("#menu_left").css("top", "0px");
						  $("#menu_left").css("top", $(".detailsMainMenu").offset);
						}
					}
			}
	});

