;var GutenixThemeJS;

(function( $, gutenixConfig ) {
	'use strict';

	GutenixThemeJS = {

		eventID: 'GutenixThemeJS',

		$document: $( document ),
		$window:   $( window ),
		$body:     $( 'body' ),

		isRTL: false,

		classes: {
			toggled: 					'toggled',
			hidden: 					'gutenix-hidden',
			isOverlay: 					'is-overlay',
			headerSidebarActive: 		'header-sidebar-active',
			headerSearchActive: 		'header-search-active',
			headerLoginActive: 			'header-login-active',
			headerSocialDropActive: 	'dropdown-active'
		},

		verticalMenuPrepared: false,

		init: function() {
			// Document ready event check
			this.$document.on( 'ready', this.documentReadyRender.bind( this ) );

			//	Header logged in tabs
			this.headerLoginFormTabs();

			this.page_preloader_init();
		},

		documentReadyRender: function() {
			this.isRTL = this.$body.hasClass( 'rtl' );

			// Header functions
			this.verticalMenuPrepare( this );
			this.rebuildHeader( this );
			this.stickyHeaderInit( this );

			// ToTop button
			this.toTopInit( this );

			// Video Iframe Size
			this.iframeSizeInit( this );

			// Share Detach
			this.shareSinglePost( this );

			// Events
			this.$document
				.on( 'click.' + this.eventID, '.menu-toggle',          this.menuToggleHandler.bind( this ) )
				.on( 'click.' + this.eventID, '.menu-toggle-close',    this.menuToggleHandler.bind( this ) )
				.on( 'click.' + this.eventID, '.header-search-toggle', this.searchToggleHandler.bind( this ) )
				.on( 'click.' + this.eventID, '.header-search-close',  this.searchToggleHandler.bind( this ) )

				.on( 'click.' + this.eventID, this.hideHeaderSidebar.bind( this ) )
				.on( 'click.' + this.eventID, this.hideHeaderSearch.bind( this ) )

				//	Header logged in
				.on( 'click.' + this.eventID, '.gutenix-header-login-toggle', this.LoginToggleHandler.bind( this ) )
				.on( 'click.' + this.eventID, '.header-login-close, .gutenix-header-login-popup__overlay',  this.LoginToggleHandler.bind( this ) )
				.on( 'click.' + this.eventID, this.hideHeaderLogin.bind( this ) )

				// Vertical Menu
				.on( 'click.' + this.eventID, '.main-navigation--vertical .menu-item-has-children > a',  this.verticalMenuLinkHandler.bind( this ) )
				.on( 'click.' + this.eventID, '.main-navigation--vertical .menu-back-btn',               this.verticalMenuBackHandler.bind( this ) )
				.on( 'click.' + this.eventID, '.menu-toggle-close',                                      this.resetVerticalMenu.bind( this ) )

				//	Social List
				.on( 'click.' + this.eventID, '.social-list--dropdown .social-list-dropbtn', this.SocialDropdownToggleHandler.bind( this ) )
				.on( 'click.' + this.eventID, this.hideHeaderSocialDropdown.bind( this ) )

				.on( 'hideHeaderSidebar.' + this.eventID, this.resetVerticalMenu.bind( this ) );

			// Customize Selective Refresh
			if ( undefined !== window.wp.customize && wp.customize.selectiveRefresh ) {

				var self = this;

				wp.customize.selectiveRefresh.bind( 'partial-content-rendered', function( placement ) {
					if ( 'header_bar' === placement.partial.id ) {
						self.verticalMenuPrepare( self );
						self.rebuildHeader( self );

						self.$body
							.removeClass( self.classes.headerSidebarActive )
							.removeClass( self.classes.headerSearchActive )
							.removeClass( self.classes.isOverlay );
					}
				} );
			}
		},

		page_preloader_init: function(self) {

			if ($('.page-preloader-cover')[0]) {
				$('.page-preloader-cover').delay(800).fadeTo(800, 0, function() {
					$(this).remove();
				});
			}
		},

		menuToggleHandler: function( event ) {
			var self    = this,
				$toggle = $( '.menu-toggle' );

			self.$body.toggleClass( self.classes.headerSidebarActive );
			self.$body.toggleClass( self.classes.isOverlay );
			$toggle.toggleClass( self.classes.toggled );

			if ( ! self.$body.hasClass( self.classes.headerSidebarActive ) ) {
				$toggle.focus();
			}

			self.handleMenuAccessibility();
		},

		hideHeaderSidebar: function( event ) {
			var self     = this,
				$toggle  = $( '.menu-toggle' ),
				$sidebar = $( '.header-bar__sidebar' );

			if ( $( event.target ).closest( $toggle ).length || $( event.target ).closest( $sidebar ).length ) {
				return;
			}

			if ( ! self.$body.hasClass( self.classes.headerSidebarActive ) ) {
				return;
			}

			self.$body.removeClass( self.classes.headerSidebarActive );
			self.$body.removeClass( self.classes.isOverlay );
			$toggle.removeClass( self.classes.toggled );

			self.$document.trigger( 'hideHeaderSidebar.' + self.eventID );

			event.stopPropagation();
		},

		searchToggleHandler: function( event ) {
			var self   = this,
				$toggle = $( '.header-search-toggle' ),
				$field = $( '.header-search-form__field' );

			self.$body.toggleClass( self.classes.headerSearchActive );

			if ( self.$body.hasClass( self.classes.headerSearchActive ) ) {
				$field.focus();
			} else {
				$toggle.focus();
			}

			self.handleSearchPopupAccessibility();
		},

		hideHeaderSearch: function( event ) {
			var self    = this,
				$toggle = $( '.header-search-toggle' ),
				$popup  = $( '.header-search-popup' );

			if ( $( event.target ).closest( $toggle ).length || $( event.target ).closest( $popup ).length ) {
				return;
			}

			if (  ! self.$body.hasClass( self.classes.headerSearchActive ) ) {
				return;
			}

			self.$body.removeClass( self.classes.headerSearchActive );
			$toggle.focus();

			event.stopPropagation();
		},

		//	Follow Us Toggle
		SocialDropdownToggleHandler: function( event ) {
			var self 		= this,
				$socialClass = $(this).parent( '.social-list--dropdown' );

			$( '.social-list--dropdown' ).toggleClass( self.classes.headerSocialDropActive );

		},

		hideHeaderSocialDropdown: function( event ) {
			var self 		= this,
				$socialClass = $(this).parent( '.social-list--dropdown' ),
				$toggle 	= $( '.social-list--dropdown .social-list-dropbtn' ),
				$popup 		= $( '.social-list--dropdown .social-list__items' );

			if ( $( event.target ).closest( $toggle ).length || $( event.target ).closest( $popup ).length ) {
				return;
			}

			if (  ! $( '.social-list--dropdown' ).hasClass( self.classes.headerSocialDropActive ) ) {
				return;
			}

			$( '.social-list--dropdown' ).removeClass( self.classes.headerSocialDropActive );

			event.stopPropagation();
		},

		LoginToggleHandler: function( event ) {
			var self   = this;

			self.$body.toggleClass( self.classes.headerLoginActive );

		},

		hideHeaderLogin: function( event ) {
			var self    = this,
				$toggle = $( '.gutenix-header-login-toggle' ),
				$popup  = $( '.gutenix-header-login-popup' );

			if ( $( event.target ).closest( $toggle ).length || $( event.target ).closest( $popup ).length ) {
				return;
			}

			if (  ! self.$body.hasClass( self.classes.headerLoginActive ) ) {
				return;
			}

			self.$body.removeClass( self.classes.headerLoginActive );

			event.stopPropagation();
		},

		headerLoginFormTabs: function(self) {

			if ( $('.gutenix-header-login-popup')[0] ) {

				$( '.gutenix-header-login-popup__tabs a[data-target="login_form_enter"]' ).on( 'click', function() {
					$( '.gutenix-header-login-popup .nav-tabs li' ).removeClass( 'active' );
					$( this ).parent().addClass( 'active' );
					
					$( '.gutenix-header-login-popup .tab-content' ).fadeOut( 300, function() {
						$( this ).find( '.tab-pane' ).removeClass( 'active' );
						$( '#login_form_enter' ).addClass( 'active' ).fadeIn( 300 );

						$( this ).fadeIn( 300 );
					} );

					return false;
				} );

				$( '.gutenix-header-login-popup__tabs a[data-target="login_form_registration"]' ).on( 'click', function() {
					$( '.gutenix-header-login-popup .nav-tabs li' ).removeClass( 'active' );
					$( this ).parent().addClass( 'active' );
					
					$( '.gutenix-header-login-popup .tab-content' ).fadeOut( 300, function() {
						$( this ).find( '.tab-pane' ).removeClass( 'active' );
						$( '#login_form_registration' ).addClass( 'active' ).fadeIn( 300 );

						$( this ).fadeIn( 300 );
					} );

					return false;
				} );

			}
		},

		verticalMenuPrepare: function( self ) {
			var $menu = $( '.main-navigation--vertical .menu' );

			if ( ! $menu[0] || self.verticalMenuPrepared ) {
				return;
			}

			$( '.menu-item-has-children', $menu ).each( function() {
				var $li      = $( this ),
					$link    = $( '> a', $li ),
					$parentItem = $( '<li>', { class: 'menu-parent-item' } ).append( $link.clone() ),
					deep     = $li.parents( '.menu, .sub-menu' ).length,
					$subMenu = $( '> .sub-menu', $li );

				$subMenu.prepend( $parentItem );
				$subMenu.prepend( '<li class="menu-back-item"><button class="menu-back-btn btn-initial" data-deep="' + deep + '">' + gutenixConfig.labels.backButton + '</button></li>' );
			} );

			self.verticalMenuPrepared = true;
		},

		verticalMenuLinkHandler: function( event ) {
			event.preventDefault();

			var self      = this,
				$target   = $( event.currentTarget ),
				$menu     = $target.closest( '.menu' ),
				deep      = $target.parents( '.menu, .sub-menu' ).length,
				direction = self.isRTL ? 1 : -1,
				translate = direction * deep * 100;

			$menu.css( 'transform', 'translateX(' + translate + '%)' );

			setTimeout( function() {
				$target.parent().addClass( 'active' );
				$target.parent().siblings().addClass( self.classes.hidden );
				$target.parents( '.active' ).find( '> a' ).addClass( self.classes.hidden );
			}, 250 );
		},

		verticalMenuBackHandler: function( event ) {
			var self      = this,
				$target   = $( event.currentTarget ),
				$menu     = $target.closest( '.menu' ),
				$menuItem = $target.closest( '.menu-item' ),
				deep      = $target.data( 'deep' ) - 1,
				direction = self.isRTL ? 1 : -1,
				translate = direction * deep * 100;

			$menu.css( 'transform', 'translateX(' + translate + '%)' );

			setTimeout( function() {
				$menuItem.removeClass( 'active' );
				$menuItem.siblings().removeClass( self.classes.hidden );
				$menuItem.find( '> a' ).removeClass( self.classes.hidden );
			}, 250 );
		},

		resetVerticalMenu: function( event ) {
			var self         = this,
				$menu        = $( '.main-navigation--vertical .menu' ),
				$menuItems   = $( '.menu-item', $menu ),
				$parentItems = $( '.menu-parent-item', $menu ),
				$backItems   = $( '.menu-back-item', $menu ),
				$activeLinks = $( '.menu-item.active > a', $menu );

			$menu.css( 'transform', '' );

			setTimeout( function() {
				$menuItems.removeClass( 'active' ).removeClass( self.classes.hidden );
				$parentItems.removeClass( self.classes.hidden );
				$backItems.removeClass( self.classes.hidden );
				$activeLinks.removeClass( self.classes.hidden );
			}, 250 );
		},

		rebuildHeader: function( self ) {
			var eventID = self.eventID + '-rebuildHeader',
				mobileBreakpoint = gutenixConfig.mobilePanelBreakpoint;

			if ( undefined !== window.wp.customize ) {
				var $layout = wp.customize( 'header_layout_type' ).get();

				if ( $.inArray( $layout, gutenixConfig.headerHamburgerLayouts ) !== -1 ) {
					mobileBreakpoint = false;
				} else {
					mobileBreakpoint = wp.customize( 'header_mobile_panel_breakpoint' ).get();
				}
			}

			if ( ! mobileBreakpoint ) {
				self.$window.off( 'resize.' + eventID );
				return;
			}

			var isRebuild = false,
				rebuildStart = gutenixConfig.breakpoints[ mobileBreakpoint ],

				originalItems = {
					mainMenu:      $( '.main-navigation' ),
					socialMenu:    $( '.social-list--header' ),
					headerButtons: $( '.header-buttons' )
				},

				placeholderItems = {
					mainMenu:      $( '<div>', { class: 'main-navigation-placeholder', hidden: 'hidden' } ),
					socialMenu:    $( '<div>', { class: 'social-list-placeholder', hidden: 'hidden' } ),
					headerButtons: $( '<div>', { class: 'header-buttons-placeholder', hidden: 'hidden' } )
				},

				rebuildHandler = function() {
					var windowWidth = self.$window.outerWidth( true );

					if ( rebuildStart > windowWidth ) {

						if ( isRebuild ) {
							return;
						}

						isRebuild = true;

						$.each( originalItems, function( element, selector ) {
							if ( selector[0] ) {

								if ( 'mainMenu' === element ) {
									selector.replaceWith( placeholderItems[element] );
									selector.clone().removeClass( 'main-navigation--default' ).addClass( 'main-navigation--vertical' ).appendTo( '.header-bar__sidebar' );
								} else {
									selector.replaceWith( placeholderItems[element] ).appendTo( '.header-bar__sidebar' );
								}
							}
						} );

						self.verticalMenuPrepare( self );
					} else {

						if ( ! isRebuild ) {
							return;
						}

						$.each( originalItems, function( element, selector ) {
							if ( selector[0] ) {

								placeholderItems[element].replaceWith( originalItems[element] );
							}
						} );

						$( '.main-navigation--vertical' ).remove();

						isRebuild = false;
						self.verticalMenuPrepared = false;
					}
				};

			rebuildHandler();
			self.$window.off( 'resize.' + eventID ).on( 'resize.' + eventID, rebuildHandler );
		},

		stickyHeaderInit: function( self ) {

			if ( !$.isFunction( jQuery.fn.stickUp ) || !gutenixConfig.stickUp ) {
				return !1;
			}

			var $stickyHeader = $( '.header-bar--sticky' );

			if ( !$stickyHeader[0] ) {
				return !1;
			}

			var instance = false,
				eventID = self.eventID + '-stickyHeader',
				activeDevices = gutenixConfig.stickUpOn,
				options = {
					correctionSelector: '#wpadminbar',
					listenSelector: false,
					pseudo: true,
					active: true,
					effectOffset: gutenixConfig.stickUpOffset ? parseInt( gutenixConfig.stickUpOffset ) : 100
				},

				stickyInit = function() {
					var currentDeviceMode = self.getCurrentDeviceMode();

					if ( -1 !== activeDevices.indexOf( currentDeviceMode ) ) {
						if ( instance ) {
							return;
						}

						instance = $stickyHeader.stickUp( options );
					} else {
						if ( ! instance ) {
							return;
						}

						instance.destroy();
						instance = false;
					}
				};

			stickyInit();
			self.$window.on( 'resize.' + eventID, stickyInit );
		},

		toTopInit: function( self ) {
			if ( !$.isFunction( jQuery.fn.UItoTop ) || !gutenixConfig.toTop ) {
				return !1;
			}

			$().UItoTop( {
				text: '',
				inDelay: 200,
				scrollSpeed: 600
			} );
		},

		//	Video Iframe Size
		iframeSizeInit: function( self ) {
			
			var eventID = self.eventID + '-iframeInit',

			iframeFunc = function() {
				jQuery('.wp-block-embed__wrapper').each(function(){	
					jQuery(this).find('iframe').css({'height': jQuery(this).width()*9/16 + 'px'});
				});
			};

			iframeFunc();
			self.$window.on( 'resize.' + eventID, iframeFunc );
		},

		// Share Detach
		shareSinglePost: function( self ) {
			
			var eventID = self.eventID,

			shareDetach = function() {
				if ( jQuery('body.single-post .hentry')[0] ) {
					var shareBlock = jQuery('.hentry > .entry-footer').next('.share-btns__list').detach();
					jQuery('.hentry > .entry-footer').append(shareBlock).addClass('hasShare');
				}
			};

			shareDetach();
			self.$window.on( 'resize.' + eventID, shareDetach );
		},

		getCurrentDeviceMode: function() {
			var windowWidth = $( window ).outerWidth( true );

			if ( gutenixConfig.breakpoints.lg <= windowWidth  ) {
				return 'desktop';
			}

			if ( gutenixConfig.breakpoints.md <= windowWidth  ) {
				return 'tablet';
			}

			return 'mobile';
		},

		/**
		 * Debounce the function call
		 *
		 * @param  {number}   threshold The delay.
		 * @param  {Function} callback  The callback function.
		 */
		debounce: function( threshold, callback ) {
			var timeout;

			return function debounced( event ) {
				function delayed() {
					callback.call( this, event );
					timeout = null;
				}

				if ( timeout ) {
					clearTimeout( timeout );
				}

				timeout = setTimeout( delayed, threshold );
			};
		},

		/**
		 * Active focus on menu popup items
		 */
		handleMenuAccessibility: function() {
			$( document ).on( 'keydown', function( e ) {
				if ( $( 'body' ).hasClass( 'header-sidebar-active' ) ) {
					var activeElement = document.activeElement;
					var menuItems = $( '.header-bar__sidebar a' );
					var firstEl = $( '.menu-toggle-close' );
					var lastEl = menuItems[ menuItems.length - 1 ];
					var tabKey = event.keyCode === 9;
					var shiftKey = event.shiftKey;
					if ( ! shiftKey && tabKey && lastEl === activeElement ) {
						event.preventDefault();
						firstEl.focus();
					}
				}
			} );
		},

		/**
		 * Active focus on search popup items
		 */
		handleSearchPopupAccessibility: function() {
			$( document ).on( 'keydown', function( e ) {
				if ( $( 'body' ).hasClass( 'header-search-active' ) ) {
					var activeElement = document.activeElement;
					var searchItems = $( '.header-search-popup__inner button, .header-search-popup__inner input' );
					var firstEl = $( '.header-search-close' );
					var lastEl = searchItems[ searchItems.length - 1 ];
					var tabKey = event.keyCode === 9;
					var shiftKey = event.shiftKey;
					if ( ! shiftKey && tabKey && lastEl === activeElement ) {
						event.preventDefault();
						firstEl.focus();
					}
				}
			} );
		}
	};

	GutenixThemeJS.init();

}( jQuery, window.gutenixConfig ));