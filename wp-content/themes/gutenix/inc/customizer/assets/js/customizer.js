/**
 * File customizer.js.
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {

	// Site title and description.
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.site-logo--text a' ).text( to );
		} );
	} );
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.site-description__text' ).text( to );
		} );
	} );

	// Site title description position
	wp.customize( 'tagline_position', function( value ) {
		value.bind( function( to ) {
			if( 'inline' == to ) {
				$('.site-branding').addClass('position-inline');
			}
			else {
				$('.site-branding').removeClass('position-inline');
			}
		} );
	} );

	// Sticky label
	wp.customize( 'blog_sticky_label', function( value ) {
		value.bind( function( to ) {
			$( '.sticky-label__text' ).text( to );
		});
	} );

	// Blog read more text
	wp.customize( 'blog_read_more_text', function( value ) {
		value.bind( function( to ) {
			$( '.post-button .btn__text' ).text( to );
		});
	} );

	// Related posts block title
	wp.customize( 'related_posts_block_title', function( value ) {
		value.bind( function( to ) {
			$( '.related-posts__title' ).text( to );
		});
	} );

	// Header buttons text
	wp.customize( 'header_btn_text_1', function( value ) {
		value.bind( function( to ) {
			$( '.header-btn-1 .btn__text' ).text( to );
		});
	} );
	wp.customize( 'header_btn_text_2', function( value ) {
		value.bind( function( to ) {
			$( '.header-btn-2 .btn__text' ).text( to );
		});
	} );

	//	Follow us Text
	wp.customize( 'header_social_links_drop_btn_text', function( value ) {
		value.bind( function( to ) {
			$( '.social-list--header .social-list-dropbtn' ).text( to );
		});
	} );

	//	Sign In / Sign Out Text
	wp.customize( 'header_login_text1', function( value ) {
		value.bind( function( to ) {
			$('body').not( '.logged-in' ).find( '.gutenix-header-login-toggle' ).text( to );
		});
	} );

	wp.customize( 'header_login_text2', function( value ) {
		value.bind( function( to ) {
			$( '.logged-in .gutenix-header-login-toggle' ).text( to );
		});
	} );

	// Breadcrumbs Align
	wp.customize( 'breadcrumbs_text_align', function( value ) {
		value.bind( function( newval ) {
			$( '.breadcrumbs .gutenix-container' ).css( 'text-align', newval );
		} );
	} );

	//	WooCommerce Filter Text
	wp.customize( 'woo_products_panel_filter_btn_text', function( value ) {
		value.bind( function( to ) {
			$( '#gutenix-products-filter' ).text( to );
		});
	} );

	// Header Menu Style 1 Position
	wp.customize( 'header_menu_position', function( value ) {
		value.bind( function( to ) {
			console.log( to );
			
			$('.header-bar--style-1').removeClass('main-menu-left');
			$('.header-bar--style-1').removeClass('main-menu-center');
			$('.header-bar--style-1').removeClass('main-menu-right');

			$('.header-bar--style-1').addClass('main-menu-' + to);
		} );
	} );

} )( jQuery );
