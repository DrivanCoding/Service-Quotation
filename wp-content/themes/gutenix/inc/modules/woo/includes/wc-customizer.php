<?php
/**
 * WooCommerce customizer options
 *
 * @package Gutenix
 */

if ( ! function_exists( 'gutenix_set_wc_dynamic_css_options' ) ) {

	/**
	 * Add dynamic WooCommerce styles
	 *
	 * @param $options
	 *
	 * @return mixed
	 */
	function gutenix_set_wc_dynamic_css_options( $options ) {

		array_push( $options['css_files'], get_theme_file_path( 'inc/modules/woo/assets/css/dynamic/woo-module-dynamic.scss' ) );

		return $options;

	}

}
add_filter( 'gutenix_get_dynamic_css_options', 'gutenix_set_wc_dynamic_css_options' );

if ( ! function_exists( 'gutenix_set_wc_customizer_options' ) ) {
	/**
	 * Add WooCommerce customizer options
	 *
	 * @param  array $options Options list
	 *
	 * @return array
	 */
	function gutenix_set_wc_customizer_options( $options ) {

		$new_options = array(
			
			/** `WooCommerce Theme` panel */
			'woo_panel' => array(
				'title'    => esc_html__( 'WooCommerce Theme', 'gutenix' ),
				'priority' => 85,
				'type'     => 'panel',
			),

			/** `WooCoomerce General` section */
			'woo_general_section' => array(
				'title'    => esc_html__( 'General', 'gutenix' ),
				'panel'    => 'woo_panel',
				'type'     => 'section',
			),

			'woo_header_cart_icon' => array(
				'title'    => esc_html__( 'Header Cart', 'gutenix' ),
				'section'  => 'woo_general_section',
				'default'  => true,
				'field'    => 'gutenix-toggle-checkbox',
				'type'     => 'control',
				'sanitize_callback' => 'gutenix_sanitize_checkbox',
			),

			/** `WooCoomerce Product Catalog` section */
			'woo_catalog' => array(
				'title'    => esc_html__( 'Product Catalog', 'gutenix' ),
				'panel'    => 'woo_panel',
				'type'     => 'section',
			),

			'woo_page_title' => array(
				'title' 			=> esc_html__( 'Show Page Title', 'gutenix' ),
				'section' 			=> 'woo_catalog',
				'priority' 			=> 10,
				'default' 			=> true,
				'field' 			=> 'checkbox',
				'type' 				=> 'control',
			),
			'woo_page_title_sep' => array(
				'section' 			=> 'woo_catalog',
				'priority' 			=> 10,
				'field' 			=> 'gutenix-separator',
				'type' 				=> 'control',
			),

			'layout_type_shop'    => array(
				'title' 			=> esc_html__( 'Layout for Shop Page & Shop Archives', 'gutenix' ),
				'section' 			=> 'woo_catalog',
				'priority' 			=> 10,
				'default' 			=> 'boxed-full-width',
				'field' 			=> 'gutenix-radio-image',
				'type' 				=> 'control',
				'choices' 			=> Gutenix_Utils::get_page_layout_options(),
			),
			
		);

		$options['options'] = array_merge( $new_options, $options['options'] );

		return $options;

	}

	add_filter( 'gutenix_get_customizer_options', 'gutenix_set_wc_customizer_options' );
}


/**
 * Active callback functions for the customizer
 */
function gutenix_cac_woo_shop_sidebar_order() {
	$layout = gutenix_theme()->customizer->get_value( 'layout_type_shop' );
	if ( 'boxed-content-sidebar' == $layout || 'boxed-sidebar-content' == $layout ) {
		return true;
	} else {
		return false;
	}
}

function gutenix_cac_woo_product_sidebar_order() {
	$layout = gutenix_theme()->customizer->get_value( 'layout_type_product' );
	if ( 'boxed-content-sidebar' == $layout || 'boxed-sidebar-content' == $layout ) {
		return true;
	} else {
		return false;
	}
}

// Grid / List View Option
function gutenix_cac_woo_products_grid_list_enable() {
	$enable = gutenix_theme()->customizer->get_value( 'woo_products_grid_list_enable' );
	if ( true == $enable ) {
		return true;
	} else {
		return false;
	}
}

//	Show / Hide Product Title
function gutenix_cac_woo_products_has_cat() {
	
	$elements = gutenix_theme()->customizer->get_value( 'shop_elements_positioning' );

	if( in_array( 'category', $elements) ) {
		return true;
	}
	return false;
}

//	Show / Hide Product Title
function gutenix_cac_woo_products_has_title() {
	
	$elements = gutenix_theme()->customizer->get_value( 'shop_elements_positioning' );

	if( in_array( 'title', $elements) ) {
		return true;
	}
	return false;
}

//	Show / Hide Product Price
function gutenix_cac_woo_products_has_price() {
	
	$elements = gutenix_theme()->customizer->get_value( 'shop_elements_positioning' );

	if( in_array( 'price', $elements) ) {
		return true;
	}
	return false;
}

//	Show / Hide Product Description excerpt
function gutenix_cac_woo_products_has_description() {
	
	$elements = gutenix_theme()->customizer->get_value( 'shop_elements_positioning' );

	if( in_array( 'description', $elements) ) {
		return true;
	}
	return false;
}

//	Show / Hide Single Product Title
function gutenix_cac_single_product_has_title() {
	
	$elements = gutenix_theme()->customizer->get_value( 'woo_product_summary_elements_positioning' );

	if( in_array( 'title', $elements) ) {
		return true;
	}
	return false;
}

//	Show / Hide Product Share Networks
function gutenix_cac_woo_product_has_share() {
	
	$elements = gutenix_theme()->customizer->get_value( 'woo_product_summary_elements_positioning' );

	if( in_array( 'share', $elements) ) {
		return true;
	}
	return false;
}

//	Show / Hide Product Badge Sale
function gutenix_cac_woo_product_has_sale_badge() {
	
	$badges = gutenix_theme()->customizer->get_value( 'woo_products_badges' );

	if( in_array( 'sale', $badges) ) {
		return true;
	}
	return false;
}

//	Show / Hide Product Badge Featured
function gutenix_cac_woo_product_has_featured_badge() {
	
	$badges = gutenix_theme()->customizer->get_value( 'woo_products_badges' );

	if( in_array( 'featured', $badges) ) {
		return true;
	}
	return false;
}

//	Show / Hide Product Badge New
function gutenix_cac_woo_product_has_new_badge() {
	
	$badges = gutenix_theme()->customizer->get_value( 'woo_products_badges' );

	if( in_array( 'new', $badges) ) {
		return true;
	}
	return false;
}

//	Show / Hide Product Out of Stock New
function gutenix_cac_woo_product_has_outofstock_badge() {
	
	$badges = gutenix_theme()->customizer->get_value( 'woo_products_badges' );

	if( in_array( 'outofstock', $badges) ) {
		return true;
	}
	return false;
}

//	Show / Hide Product Badge New
function gutenix_cac_woo_header_cart_icon() {
	
	$header_cart_icon = gutenix_theme()->customizer->get_value( 'woo_header_cart_icon' );

	if( false != $header_cart_icon ) {
		return true;
	}
	return false;
}