$("document").ready(function(){		
	$(".detailsMainMenu").css("width",$(".container").width());
	var topvalue = $(".detSrchInner").outerHeight()+$(".header").outerHeight();
	$(window).scroll(function () {
		if ($(this).scrollTop() > topvalue) {
			$('.detailsMainMenu').addClass("fixed");
		} else {
			$('.detailsMainMenu').removeClass("fixed");
		}
	});

});