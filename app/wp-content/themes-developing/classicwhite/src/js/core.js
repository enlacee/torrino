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



	// load library js
	var $containerBlog = jQuery( 'body.page-template-template-demo2' );
	if ($containerBlog.length === 1 && jsVars.facebookId.length > 0) {

		// load library js facebook
		(function(d, s, id) {
			var js, fjs = d.getElementsByTagName(s)[0];
			if (d.getElementById(id)) return;
			js = d.createElement(s); js.id = id;
			js.src = 'https://connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v2.11&appId=' + jsVars.facebookId;
			fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));

		// load library twitter
		window.twttr = (function(d, s, id) {
			var js, fjs = d.getElementsByTagName(s)[0],
				t = window.twttr || {};
			if (d.getElementById(id)) return t;
			js = d.createElement(s);
			js.id = id;
			js.src = "https://platform.twitter.com/widgets.js";
			fjs.parentNode.insertBefore(js, fjs);

			t._e = [];
			t.ready = function(f) {
				t._e.push(f);
			};

			return t;
		}(document, "script", "twitter-wjs"));

	}

});
