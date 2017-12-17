$(document).ready(function() {
    //jquery smooth menu ***************
	$('.smooth-menu a').bind('click',function(event){
		var $anchor = $(this);
        var headerH='60';
		/*
		if you want to use one of the easing effects:
		$('html, body').stop().animate({
			scrollLeft: $($anchor.attr('href')).offset().left
		}, 1500,'easeInOutExpo');
		 */
		$('html, body').stop().animate({
			scrollTop: $($anchor.attr('href')).offset().top - headerH + "px"
                                       
		}, 1000, 'easeInOutExpo');
		event.preventDefault();
	});
    //end jquery smooth menu
    
    
    //stick menu**************
    $(".header-aria").sticky({ topSpacing: 0 });

    // jquery scroll spy
        $('body').scrollspy({ 
        	'target': '.navbar-collapse',
        	'offset':40 });

});