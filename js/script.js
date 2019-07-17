jQuery( document ).ready(function($) {
	
	// SEARCH TOGGLE
	$( ".search-toggle" ).click(function() {
		$( ".search-toggle" ).toggleClass( "active" );
		$( ".search-box" ).toggleClass( "active" );
	});
	
	// PORTALS TOGGLE
	$( ".portals-toggle" ).click(function() {
		$( ".portals-toggle" ).toggleClass( "active" );
		$( ".portals-menu" ).toggleClass( "active" );
	});
	
	
	// MOBILE NAVIGATION
	$( "#nav-toggle" ).click(function() {
		$( this ).toggleClass( "active" );
		$( "#body-wrapper" ).toggleClass( "menu-open" );
		$( ".canvas-wrapper" ).toggleClass( "dark" );
	});
	$( ".canvas-wrapper.dark" ).click(function() {
		$( "#body-wrapper" ).removeClass("menu-open");
	});
	
	// CONTACT TAB
	$( "#contact-tab" ).click(function() {
		$( this ).toggleClass( "active" );
		$( "#contact-wrap" ).toggleClass( "open" );
	});
	
	
	// MARKET PAGE - SIDEBARS
	var subHeroHeight = $('.sub-hero').outerHeight();
		var negMargin = (-80 - subHeroHeight);
		$('.sidebar.margin').css('margin-top', negMargin);
		
		
	$(window).resize(function() {
		if ($(window).width() > 991 ) {
	    	var subHeroHeight = $('.sub-hero').outerHeight();
			var negMargin = (-80 - subHeroHeight);
			$('.sidebar.margin').css('margin-top', negMargin);
			console.log(negMargin);
		}
		else {
			$('.sidebar.margin').css('margin-top', 0);
		}
	});	
	
	//For Page Templates with "div.page-top" - auto margin
	var HeaderHeight = $('#header').outerHeight();
		$('.page-top').css('height', HeaderHeight);
		
		
	$(window).resize(function() {
		var HeaderHeight = $('#header').outerHeight();
		$('.page-top').css('height', HeaderHeight);
	});
	
});