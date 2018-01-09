( ( function( $ ) {
	$( document ).ready( function() {

		/* in page scrolling */
		$( '.scroll-to' ).on( 'click', function( e ) {
			e.preventDefault();
			$( 'html, body' ).animate({ scrollTop: 0 }, 'slow' );
		});
	});

})( jQuery ) );
