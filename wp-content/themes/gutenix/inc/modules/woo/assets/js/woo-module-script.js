;var Gutenix_Woo_Module;

(function ($) {
	"use strict";

	Gutenix_Woo_Module = {

		eventID: 'Gutenix_Woo_Module',

		$document: $( document ),
		$window:   $( window ),
		$body:     $( 'body' ),

		classes: {
			toggled:             'toggled',
			hidden:              'gutenix-hidden',
			isOverlay:           'is-overlay',
			headerSidebarActive: 'products_filter-sidebar-active',
		},

		init: function () {
			this.wooHeaderCart();
			this.wooPagination();
			this.fixedOrderInit();
			this.productsPanelView();

			// Document ready event check
			this.$document.on( 'ready', this.documentReadyRender.bind( this ) );
		},

		documentReadyRender: function() {

			// Events
			this.$document
				
				// Woo Panel Filter
				.on( 'click.' + this.eventID, '#gutenix-products-filter',          this.productsFilterToggleHandler.bind( this ) )
				.on( 'click.' + this.eventID, '.products_filter-toggle-close',   this.productsFilterToggleHandler.bind( this ) )

				.on( 'click.' + this.eventID, this.hideHeaderSidebar.bind( this ) )

		},

		productsFilterToggleHandler: function( event ) {
			var self    = this,
				$toggle = $( '#gutenix-products-filter' );

			self.$body.toggleClass( self.classes.headerSidebarActive );
			self.$body.toggleClass( self.classes.isOverlay );
			$toggle.toggleClass( self.classes.toggled );
		},

		hideHeaderSidebar: function( event ) {
			var self     = this,
				$toggle  = $( '#gutenix-products-filter' ),
				$sidebar = $( '.products_filter-bar__sidebar' );

			if ( $( event.target ).closest( $toggle ).length || $( event.target ).closest( $sidebar ).length ) {
				return;
			}

			if (  ! self.$body.hasClass( self.classes.headerSidebarActive ) ) {
				return;
			}

			self.$body.removeClass( self.classes.headerSidebarActive );
			self.$body.removeClass( self.classes.isOverlay );
			$toggle.removeClass( self.classes.toggled );

			self.$document.trigger( 'hideHeaderSidebar.' + self.eventID );

			event.stopPropagation();
		},

		wooHeaderCart: function () {
			var headerCartButton = $('.header-cart__link-wrap'),

			toggleButton = function (e){
				e.preventDefault();
				$('.header-cart__content').toggleClass('show');
			},

			closeCart = function(e){
				if( $( e.target ).closest('.header-cart').length === 0){
					$('.header-cart__content').removeClass('show');
				}
			};

			headerCartButton.on('click', toggleButton );

			$(document).on( 'click', closeCart );

		},

		wooPagination: function () {
			
			$('.woocommerce-pagination ul.page-numbers li a').each(function() {
				var $this = $(this);
				if ( $this.hasClass('prev') ) $this.parent('li').addClass('prev-list-item');
				if ( $this.hasClass('next') ) $this.parent('li').addClass('next-list-item');      
			});

		},

		fixedOrderInit: function( self ) {
			
			jQuery('#order_review, #order_review_heading').wrapAll('<div class="order_review_wrap clearfix"></div>');

			var orderInit = function() {
				if ( jQuery(window).width() > 768 && jQuery('body.sticky-order-block').size() > 0 ) {
					setTimeout(function(){
						jQuery('#customer_details, .order_review_wrap').theiaStickySidebar({
							additionalMarginTop: 100
						});
					}, 1000)
				}
			};

			orderInit();
			jQuery(window).on( 'resize', orderInit );
		},

		productsPanelView: function( self ) {
			
			// Products Panel View Buttons
			var orderInit = function() {
				if ( $( '.products' ).hasClass( 'products-list' ) || $( '.products' ).hasClass( 'products-grid' ) ) {

					$( '#gutenix-views-grid' ).on( 'click', function() {
						$( this ).addClass( 'active' );
						$( '#gutenix-views-list' ).removeClass( 'active' );
						Cookies.set( 'gridcookie', 'products_grid', { path: '' } );
						$( '.woocommerce ul.products' ).fadeOut( 300, function() {
							$( this ).addClass( 'products-grid' ).removeClass( 'products-list' ).fadeIn( 300 );
						} );
						return false;
					} );

					$( '#gutenix-views-list' ).on( 'click', function() {
						$( this ).addClass( 'active' );
						$( '#gutenix-views-grid' ).removeClass( 'active' );
						Cookies.set( 'gridcookie', 'products_list', { path: '' } );
						$( '.woocommerce ul.products' ).fadeOut( 300, function() {
							$( this ).addClass( 'products-list' ).removeClass( 'products-grid' ).fadeIn( 300 );
						} );
						return false;
					} );

					if ( Cookies.get( 'gridcookie' ) == 'products_grid' ) {
				        $( '.gutenix-products-panel-views #gutenix-views-grid' ).addClass( 'active' );
				        $( '.gutenix-products-panel-views #gutenix-views-list' ).removeClass( 'active' );
				        $( '.woocommerce ul.products' ).addClass( 'products-grid' ).removeClass( 'products-list' );
				    }

				    if ( Cookies.get( 'gridcookie' ) == 'products_list' ) {
				        $( '.gutenix-products-panel-views #gutenix-views-list' ).addClass( 'active' );
				        $( '.gutenix-products-panel-views #gutenix-views-grid' ).removeClass( 'active' );
				        $( '.woocommerce ul.products' ).addClass( 'products-list' ).removeClass( 'products-grid' );
				    }

				} else {
					Cookies.remove( 'gridcookie', { path: '' } );
				}
			};

			orderInit();
			jQuery(document).on( 'ready', orderInit );

		}

	};

	Gutenix_Woo_Module.init();

}(jQuery));