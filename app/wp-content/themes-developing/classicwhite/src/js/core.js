/* global jsVars*/

// ==== MAIN core ==== //
jQuery( document ).ready( function() {
	console.log( 'dom ready' );

	// slick
	jQuery( '.regular' ).slick({
		dots: true,
		infinite: true,
		slidesToShow: 3,
		slidesToScroll: 3,
		swipe: true,
		responsive: [
			{
				breakpoint: 1100,
				settings: {
					slidesToShow: 2,
					slidesToScroll: 2
				}
			},
			{
				breakpoint: 576,
				settings: {
					slidesToShow: 1,
					slidesToScroll: 1
				}
			}
		]

	});

});
