( function( $ ) {

	// Additional class for posts with thumbnails
	function addHentryClass() {
		$( '.hentry + .has-post-thumbnail, .post + .has-post-thumbnail' ).prev().addClass( 'has-post-thumbnail-prev' );
	}

	$( document.body ).on( 'post-load',  addHentryClass );

	addHentryClass();

	// Handles the front page featured menu sections on mobile devices.
	// First tap shows the overlay, second activates the link.
	$( '.item:not(.no-thumbnail) .menu-section-thumbnail' ).on( 'touchstart', function ( e ) {
		var link = $( this );
		if ( link.hasClass( 'hover' ) ) {
			return true;
		} else {
			link.addClass( 'hover' );
			$( 'a.menu-section-thumbnail' ).not(this).removeClass( 'hover' );
			e.preventDefault();
			return false;
		}
	});

	// Calculate the height of front page featured menu sections w/o a thumbnail.
	if ( ( '.item.no-thumbnail' ).length ) {
		$( window ).on( 'resize', function() {
			var itemWidth = $( '.item.no-thumbnail' ).width();
			$( '.item.no-thumbnail' ).css( {
				'height': ( itemWidth * 1.333 ) + 'px',
			} );
	    } );
	}

} )( jQuery );
