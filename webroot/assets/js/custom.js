$(document).ready(function(){
	$(window).scroll(function() {
	if ($(this).scrollTop() > 1){  
		$('.sticky_header').addClass("sticky");
		$('.page_wrap').addClass("stick");
	  }
	  else{
		$('.sticky_header').removeClass("sticky");
		$('.page_wrap').removeClass("stick");
	  }
	});
	$('.order_main .conversion ul li a').click(function() {
		$('.order_main .conversion ul li.active').removeClass('active');
		$(this).closest('li').addClass('active');
		return false;
	});
	$('.project_type').ddslick();
	$('.budget_range').ddslick();
	$('.project_per_month').ddslick();
	
	var inputList = $('.pretty_checkable');
	for (var i = inputList.length - 1; i >= 0; i--) {
		$(inputList[i]).prettyCheckable();
	}
	
	$('.header .navbar-default .navbar-collapse .navbar-nav > li.dropdown .sub_menu').hover(
       function(){ $('.header .navbar-default .navbar-collapse .navbar-nav > li.dropdown').toggleClass('effect') }
	)
	
	$(".navbar-toggle").click(function () {
		$(".top").toggleClass("top-animate");
		$(".mid").toggleClass("mid-animate");
		$(".bottom").toggleClass("bottom-animate");
	});
	
	if($(window).width() <= 768){
	  $('.navbar-nav > li.dropdown').click(function(){
			$('.sub_menu').slideToggle("1500");
		});
	}
	
	
});  