<?php
/**
 * Sanitization Callbacks
 * 
 * @package     Gutenix
 * @since       1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Select choices sanitization callback
 */
function gutenix_customizer_sanitize_multi_choices( $input, $setting ) {
	// Get list of choices from the control associated with the setting.
	$choices = $setting->manager->get_control( $setting->id )->choices;
	$input_keys = $input;

	foreach ( $input_keys as $key => $value ) {
		if ( ! array_key_exists( $value, $choices ) ) {
			unset( $input[ $key ] );
		}
	}

	// If the input is a valid key, return it;
	// otherwise, return the default.
	return ( is_array( $input ) ? $input : $setting->default );
}

/**
 * Number sanitization callback
 */
function gutenix_sanitize_number( $val ) {
	return is_numeric( $val ) ? $val : 0;
}

/**
 * Number with blank value sanitization callback
 */
function gutenix_sanitize_number_blank( $val ) {
	return is_numeric( $val ) ? $val : '';
}

/**
 * Sanitize Dimensions
 */
function gutenix_sanitize_dimensions( $val ) {

	$spacing = array(
		'desktop'      => array(
			'top'    => '',
			'right'  => '',
			'bottom' => '',
			'left'   => '',
		),
		'tablet'       => array(
			'top'    => '',
			'right'  => '',
			'bottom' => '',
			'left'   => '',
		),
		'mobile'       => array(
			'top'    => '',
			'right'  => '',
			'bottom' => '',
			'left'   => '',
		),
		'desktop-unit' => 'px',
		'tablet-unit'  => 'px',
		'mobile-unit'  => 'px',
	);

	if ( isset( $val['desktop'] ) ) {
		$spacing['desktop'] = array_map(
			function ( $value ) {
					return ( is_numeric( $value ) && $value >= 0 ) ? $value : '';
			},
			$val['desktop']
		);

		$spacing['tablet'] = array_map(
			function ( $value ) {
					return ( is_numeric( $value ) && $value >= 0 ) ? $value : '';
			},
			$val['tablet']
		);

		$spacing['mobile'] = array_map(
			function ( $value ) {
					return ( is_numeric( $value ) && $value >= 0 ) ? $value : '';
			},
			$val['mobile']
		);

		if ( isset( $val['desktop-unit'] ) ) {
			$spacing['desktop-unit'] = $val['desktop-unit'];
		}

		if ( isset( $val['tablet-unit'] ) ) {
			$spacing['tablet-unit'] = $val['tablet-unit'];
		}

		if ( isset( $val['mobile-unit'] ) ) {
			$spacing['mobile-unit'] = $val['mobile-unit'];
		}

		return $spacing;

	} else {
		foreach ( $val as $key => $value ) {
			$val[ $key ] = is_numeric( $val[ $key ] ) ? $val[ $key ] : '';
		}
		return $val;
	}

}

/**
 * Sanitize Input Responsive Typography
 */
function sanitize_input_responsive( $val ) {

	$responsive = array(
		'desktop'      => '',
		'tablet'       => '',
		'mobile'       => '',
		'desktop-unit' => '',
		'tablet-unit'  => '',
		'mobile-unit'  => '',
	);
	if ( is_array( $val ) ) {
		$responsive['desktop']      = ( isset( $val['desktop'] ) && is_numeric( $val['desktop'] ) ) ? $val['desktop'] : '';
		$responsive['tablet']       = ( isset( $val['tablet'] ) && is_numeric( $val['tablet'] ) ) ? $val['tablet'] : '';
		$responsive['mobile']       = ( isset( $val['mobile'] ) && is_numeric( $val['mobile'] ) ) ? $val['mobile'] : '';
		$responsive['desktop-unit'] = ( isset( $val['desktop-unit'] ) && in_array( $val['desktop-unit'], array( '', 'px', 'em', 'rem', '%' ) ) ) ? $val['desktop-unit'] : 'px';
		$responsive['tablet-unit']  = ( isset( $val['tablet-unit'] ) && in_array( $val['tablet-unit'], array( '', 'px', 'em', 'rem', '%' ) ) ) ? $val['tablet-unit'] : 'px';
		$responsive['mobile-unit']  = ( isset( $val['mobile-unit'] ) && in_array( $val['mobile-unit'], array( '', 'px', 'em', 'rem', '%' ) ) ) ? $val['mobile-unit'] : 'px';
	} else {
		$responsive['desktop'] = is_numeric( $val ) ? $val : '';
	}
	return $responsive;
}

/**
 * Checkbox sanitization callback
 */
function gutenix_sanitize_checkbox( $checked ) {
	// Boolean check.
	return ( ( isset( $checked ) && true == $checked ) ? true : false );
}


/**
 * Active callback functions for Customizer
 */

// Show / Hide Blog Post Title
function gutenix_cac_has_blog_entry_title() {
	
	$elements = apply_filters( 'gutenix_posts_list_order', array( 'title', 'meta', 'featured_image', 'excerpt', 'entry_footer' ) );

	if( in_array( 'title', $elements) ) {
		return true;
	}
	return false;
}

// Show / Hide Blog Post Meta
function gutenix_cac_has_blog_entry_meta() {
	
	$elements = apply_filters( 'gutenix_posts_list_order', array( 'title', 'meta', 'featured_image', 'excerpt', 'entry_footer' ) );

	if( in_array( 'meta', $elements) ) {
		return true;
	}
	return false;
}

//	Show / Hide Blog Post Excerpt
function gutenix_cac_has_blog_entry_excerpt() {
	
	$elements = apply_filters( 'gutenix_posts_list_order', array( 'title', 'meta', 'featured_image', 'excerpt', 'entry_footer' ) );

	if( in_array( 'excerpt', $elements) ) {
		return true;
	}
	return false;
}

//	Footer Custom Columns Count
function gutenix_cac_footer_column1() {
	
	$column = gutenix_theme()->customizer->get_value( 'footer_widget_areas_count' );

	if( '1' == $column || '2' == $column || '3' == $column || '4' == $column || '5' == $column || '6' == $column ) {
		return true;
	}
	return false;
}
function gutenix_cac_footer_column2() {
	
	$column = gutenix_theme()->customizer->get_value( 'footer_widget_areas_count' );

	if( '2' == $column || '3' == $column || '4' == $column || '5' == $column || '6' == $column ) {
		return true;
		var_dump('true');
	}
	return false;
}
function gutenix_cac_footer_column3() {
	
	$column = gutenix_theme()->customizer->get_value( 'footer_widget_areas_count' );

	if( '3' == $column || '4' == $column || '5' == $column || '6' == $column ) {
		return true;
	}
	return false;
}
function gutenix_cac_footer_column4() {
	
	$column = gutenix_theme()->customizer->get_value( 'footer_widget_areas_count' );

	if( '4' == $column || '5' == $column || '6' == $column ) {
		return true;
	}
	return false;
}
function gutenix_cac_footer_column5() {
	
	$column = gutenix_theme()->customizer->get_value( 'footer_widget_areas_count' );

	if( '5' == $column || '6' == $column ) {
		return true;
	}
	return false;
}
function gutenix_cac_footer_column6() {
	
	$column = gutenix_theme()->customizer->get_value( 'footer_widget_areas_count' );

	if( '6' == $column ) {
		return true;
	}
	return false;
}