/**
 * Get Started button on welcome page.
 */
jQuery( document ).ready( function( $ ) {
	$( '.btn-get-started' ).click( function( e ) {
		e.preventDefault();

		// Show updating gif icon and update button text.
		$( this ).addClass( 'updating-message' ).text( adminAjaxObj.btn_text );

		const btnData = {
			action: 'import_button',
			security: adminAjaxObj.security_nonce,
		};

		$.ajax( {
			type: 'POST',
			url: ajaxurl, // URL to "wp-admin/admin-ajax.php"
			data: btnData,
			success( response ) {
				let dismissNonce,
					extraUri = '',
					// eslint-disable-next-line prefer-const
					btnDismiss = $( '.home-improvement-notice-dismiss' );

				if ( btnDismiss.length ) {
					dismissNonce = btnDismiss.attr( 'href' ).split( 'notice_security_nonce=' )[ 1 ];
					extraUri = '&notice_security_nonce=' + dismissNonce;
				}

				window.location.href = response.data.redirect + extraUri;
			},
			error( xhr, ajaxOptions, thrownError ) {
				// eslint-disable-next-line no-console
				console.log( thrownError );
			},
		} );
	} );
} );
