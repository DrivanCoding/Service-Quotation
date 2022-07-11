/**
 * File customizer-controls.js.
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

jQuery( document ).ready( function($) {

	//	Dimensions Type
	jQuery( '.gutenix-spacing-connected' ).on( 'click', function() {
		jQuery(this).parent().parent( '.gutenix-spacing-wrapper' ).find( 'input' ).removeClass( 'connected' ).attr( 'data-element-connect', '' );
		jQuery(this).parent( '.gutenix-spacing-input-item-link' ).removeClass( 'disconnected' );
	} );

	jQuery( '.gutenix-spacing-disconnected' ).on( 'click', function() {

		var elements 	= jQuery(this).data( 'element-connect' );
		jQuery(this).parent().parent( '.gutenix-spacing-wrapper' ).find( 'input' ).addClass( 'connected' ).attr( 'data-element-connect', elements );
		jQuery(this).parent( '.gutenix-spacing-input-item-link' ).addClass( 'disconnected' );

	} );

	jQuery( '.gutenix-spacing-input-item' ).on( 'input', '.connected', function() {

		var dataElement 	  = jQuery(this).attr( 'data-element-connect' ),
			currentFieldValue = jQuery( this ).val();

		jQuery(this).parent().parent( '.gutenix-spacing-wrapper' ).find( '.connected[ data-element-connect="' + dataElement + '" ]' ).each( function( key, value ) {
			jQuery(this).val( currentFieldValue ).change();
		} );

	} );

	jQuery('.wp-full-overlay-footer .devices button ').on('click', function() {

		var device = jQuery(this).attr('data-device');
		jQuery( '.customize-control-gutenix-dimensions .input-wrapper .gutenix-spacing-wrapper, .customize-control .gutenix-dimension-btns > li' ).removeClass( 'active' );
		jQuery( '.customize-control-gutenix-dimensions .input-wrapper .gutenix-spacing-wrapper.' + device + ', .customize-control .gutenix-dimension-btns > li.' + device ).addClass( 'active' );
	});


	// Multiple Inputs
    function gutenix_customize_multi_write($element){
        var gutenix_customize_multi_val = '';
        $element.find('.gutenix_customize_multi_fields .gutenix_customize_multi_single_field').each(function(){
            gutenix_customize_multi_val += jQuery(this).val()+'|';
        });
        $element.find('.gutenix_customize_multi_value_field').val(gutenix_customize_multi_val.slice(0, -1)).change();
    }

    function gutenix_customize_multi_add_field(e){
        e.preventDefault();
        var $control = jQuery(this).parents('.gutenix_customize_multi_input');
        $control.find('.gutenix_customize_multi_fields').append('<div class="set"><input type="text" value="" class="gutenix_customize_multi_single_field" /><span class="gutenix_customize_multi_remove_field"><span class="dashicons dashicons-no-alt"></span></span></div>');
    }

    function gutenix_customize_multi_single_field() {
        var $control = jQuery(this).parents('.gutenix_customize_multi_input');
        gutenix_customize_multi_write($control);
    }

    function gutenix_customize_multi_remove_field(e){
        e.preventDefault();
        var $this = jQuery(this);
        var $control = $this.parents('.gutenix_customize_multi_input');
        $this.parent().remove();
        gutenix_customize_multi_write($control);
    }

    jQuery(document).on('click', '.gutenix_customize_multi_add_field', gutenix_customize_multi_add_field)
               .on('keyup', '.gutenix_customize_multi_single_field', gutenix_customize_multi_single_field)
               .on('click', '.gutenix_customize_multi_remove_field', gutenix_customize_multi_remove_field);

    jQuery('.gutenix_customize_multi_input').each(function(){
        var $this = jQuery(this);
        var multi_saved_value = $this.find('.gutenix_customize_multi_value_field').val();
        if(multi_saved_value.length>0){
            var multi_saved_values = multi_saved_value.split("|");
            $this.find('.gutenix_customize_multi_fields').empty();
            jQuery.each(multi_saved_values, function( index, value ) {
                $this.find('.gutenix_customize_multi_fields').append('<div class="set"><input type="text" value="'+value+'" class="gutenix_customize_multi_single_field" /><span class="gutenix_customize_multi_remove_field"><span class="dashicons dashicons-no-alt"></span></span></div>');
            });
        }
    });

} );

( function( $ ) {

	// Init Controls Conditions
	wp.customize.bind( 'ready', function() {

		var gutenixControlsConditions = window.gutenixControlsConditions,
			gutenixControlsTools  = {
				isArray: function( value ) {
					return $.isArray( value );
				},

				inArray: function( value, array ) {
					return ($.inArray( value, array ) !== -1);
				}
			};

		if ( undefined !== gutenixControlsConditions ) {

			$.each( gutenixControlsConditions, function( control_id, conditions ) {

				wp.customize.control( control_id, function( control ) {

					var visibility = function() {
						var is_visible = true;

						$.each( conditions, function( setting_id, condition ) {
							var check = false,
								isNegativeCondition = setting_id.lastIndexOf( '!' ) !== -1;

							setting_id = setting_id.replace( '!', '' );

							if ( gutenixControlsTools.isArray( condition ) ) {
								check = gutenixControlsTools.inArray( wp.customize( setting_id ).get(), condition );
							} else {
								check = condition === wp.customize( setting_id ).get();
							}

							if ( isNegativeCondition ) {
								check = ! check;
							}

							if ( ! check ) {
								is_visible = false;
								return false;
							}
						} );

						if ( is_visible ) {
							control.container.show();
						} else {
							control.container.hide();
						}
					};

					visibility();
					$.each( conditions, function( setting_id, condition ) {
						setting_id = setting_id.replace( '!', '' );
						wp.customize( setting_id ).bind( visibility );
					} );

				} );
			} );
		}
	});

	// Extends Custom Sortable Controls
	wp.customize.controlConstructor['gutenix-sortable'] = wp.customize.Control.extend({

		ready: function() {

			'use strict';

			var control = this;

			// Set the sortable container.
			control.sortableContainer = control.container.find( 'ul.sortable' ).first();

			// Init sortable.
			control.sortableContainer.sortable({

				// Update value when we stop sorting.
				stop: function() {
					control.updateValue();
				}
			}).disableSelection().find( 'li' ).each( function() {

				// Enable/disable options when we click on the eye of Thundera.
				jQuery( this ).find( 'i.visibility' ).click( function() {
					jQuery( this ).toggleClass( 'dashicons-visibility-faint' ).parents( 'li:eq(0)' ).toggleClass( 'invisible' );
				});
			}).click( function() {

				// Update value on click.
				control.updateValue();
			});
		},

		/**
		 * Updates the sorting list
		 */
		updateValue: function() {

			'use strict';

			var control = this,
			    newValue = [];

			this.sortableContainer.find( 'li' ).each( function() {
				if ( ! jQuery( this ).is( '.invisible' ) ) {
					newValue.push( jQuery( this ).data( 'value' ) );
				}
			});

			control.setting.set( newValue );

		}
	});

	// Extends Custom Radio Image Controls
	wp.customize.controlConstructor['gutenix-radio-image'] = wp.customize.Control.extend({

		ready: function() {

			'use strict';

			var control = this;

			// Change the value
			this.container.on( 'click', 'input', function() {
				control.setting.set( jQuery( this ).val() );
			});
		}

	});

	//	Buttons Set
	wp.customize.controlConstructor['gutenix-buttonset'] = wp.customize.Control.extend({

		ready: function() {

			'use strict';

			var control = this;

			// Change the value
			this.container.on( 'click', 'input', function() {
				control.setting.set( jQuery( this ).val() );
			});
		}

	});

	// Extends Custom Multi Check Controls
	wp.customize.controlConstructor['gutenix-multi-check'] = wp.customize.Control.extend({

		// When we're finished loading continue processing.
		ready: function() {

			'use strict';

			var control = this;

			// Save the value
			control.container.on( 'change', 'input', function() {
				var value = [],
				    i = 0;

				// Build the value as an object using the sub-values from individual checkboxes.
				jQuery.each( control.params.choices, function( key, subValue ) {
					if ( control.container.find( 'input[value="' + key + '"]' ).is( ':checked' ) ) {
						value[ i ] = key;
						i++;
					}
				});

				// Update the value in the customizer.
				control.setting.set( value );

			});

		}

	});

	// Extends Custom Range Controls
	wp.customize.controlConstructor['gutenix-range'] = wp.customize.Control.extend({

		ready: function() {

			'use strict';

			var control = this,
				range,
				range_input,
				value,
				this_input,
				input_default,
				changeAction,
				gutenix_range_input_number_timeout;

			// Update the text value
			jQuery( 'input[type=range]' ).on( 'mousedown', function() {

				range 			= jQuery( this );
				range_input 	= range.parent().children( '.gutenix-range-input' );
				value 			= range.attr( 'value' );

				range_input.val( value );

				range.mousemove( function() {
					value = range.attr( 'value' );
					range_input.val( value );
				} );

			} );

			// Auto correct the number input
			function gutenix_autocorrect_range_input_number( input_number, timeout ) {

				var range_input 	= input_number,
					range 			= range_input.parent().find( 'input[type="range"]' ),
					value 			= parseFloat( range_input.val() ),
					reset 			= parseFloat( range.attr( 'data-reset_value' ) ),
					step 			= parseFloat( range_input.attr( 'step' ) ),
					min 			= parseFloat( range_input.attr( 'min') ),
					max 			= parseFloat( range_input.attr( 'max') );

				clearTimeout( gutenix_range_input_number_timeout );

				gutenix_range_input_number_timeout = setTimeout( function() {

					if ( isNaN( value ) ) {
						range_input.val( reset );
						range.val( reset ).trigger( 'change' );
						return;
					}

					if ( step >= 1 && value % 1 !== 0 ) {
						value = Math.round( value );
						range_input.val( value );
						range.val( value );
					}

					if ( value > max ) {
						range_input.val( max );
						range.val( max ).trigger( 'change' );
					}

					if ( value < min ) {
						range_input.val( min );
						range.val( min ).trigger( 'change' );
					}

				}, timeout );

				range.val( value ).trigger( 'change' );

			}

			// Change the text value
			jQuery( 'input.gutenix-range-input' ).on( 'change keyup', function() {

				gutenix_autocorrect_range_input_number( jQuery( this ), 1000);

			} ).on( 'focusout', function() {

				gutenix_autocorrect_range_input_number( jQuery( this ), 0);

			} );

			// Handle the reset button
			jQuery( '.gutenix-reset-slider' ).on('click', function() {

				this_input 		= jQuery( this ).closest( 'label' ).find( 'input' );
				input_default 	= this_input.data( 'reset_value' );

				this_input.val( input_default );
				this_input.change();

			} );

			if ( 'postMessage' === control.setting.transport ) {
				changeAction = 'mousemove change';
			} else {
				changeAction = 'change';
			}

			// Change the value
			this.container.on( changeAction, 'input', function() {
				control.setting.set( jQuery( this ).val() );
			});
		}

	});

	// Extends Custom Dimensions Controls
	wp.customize.controlConstructor['gutenix-dimensions'] = wp.customize.Control.extend({

		ready: function() {

			'use strict';

			var control = this,
		    value;
		    
		    control.gutenixResponsiveInit();

			// Save the value.
			this.container.on( 'change keyup paste', 'input.gutenix-spacing-input', function() {

				value = jQuery( this ).val();

				// Update value on change.
				control.updateValue();
			});
		},

		/**
		 * Updates the spacing values
		 */
		updateValue: function() {

			'use strict';

			var control = this,
				newValue = {
					'desktop' 		: {},
					'tablet'  		: {},
					'mobile'  		: {},
					'desktop-unit'	: 'px',
					'tablet-unit'	: 'px',
					'mobile-unit'	: 'px',
				};

			control.container.find( 'input.gutenix-spacing-desktop' ).each( function() {
				var spacing_input = jQuery( this ),
				item = spacing_input.data( 'id' ),
				item_value = spacing_input.val();

				newValue['desktop'][item] = item_value;
			});

			control.container.find( 'input.gutenix-spacing-tablet' ).each( function() {
				var spacing_input = jQuery( this ),
				item = spacing_input.data( 'id' ),
				item_value = spacing_input.val();

				newValue['tablet'][item] = item_value;
			});

			control.container.find( 'input.gutenix-spacing-mobile' ).each( function() {
				var spacing_input = jQuery( this ),
				item = spacing_input.data( 'id' ),
				item_value = spacing_input.val();

				newValue['mobile'][item] = item_value;
			});

			control.container.find('.gutenix-spacing-unit-wrapper .gutenix-spacing-unit-input').each( function() {
				var spacing_unit 	= jQuery( this ),
					device 			= spacing_unit.attr('data-device'),
					device_val 		= spacing_unit.val(),
					name 			= device + '-unit';
					
				newValue[ name ] = device_val;
			});

			control.setting.set( newValue );
		},

		/**
		 * Set the responsive devices fields
		 */
		gutenixResponsiveInit : function() {
			
			'use strict';

			var control = this;
			
			control.container.find( '.gutenix-dimension-btns button' ).on( 'click', function( event ) {

				var device = jQuery(this).attr('data-device');
				if( 'desktop' == device ) {
					device = 'tablet';
				} else if( 'tablet' == device ) {
					device = 'mobile';
				} else {
					device = 'desktop';
				}

				jQuery( '.wp-full-overlay-footer .devices button[data-device="' + device + '"]' ).trigger( 'click' );
			});

			// Unit click
			control.container.on( 'click', '.gutenix-dimension-units .single-unit', function() {
				
				var $this 		= jQuery(this);

				if ( $this.hasClass('active') ) {
					return false;
				}

				var	unit_value 	= $this.attr('data-unit'),
					device 		= jQuery('.wp-full-overlay-footer .devices button.active').attr('data-device');
				
				$this.siblings().removeClass('active');
				$this.addClass('active');

				control.container.find('.gutenix-spacing-unit-wrapper .gutenix-spacing-' + device + '-unit').val( unit_value );

				// Update value on change.
				control.updateValue();
			});
		},
	});

} )( jQuery );
