<?php
/**
 * WooCommerce archive product hooks.
 *
 * @package Gutenix
 */

add_action( 'woocommerce_before_shop_loop', 'gutenix_wc_loop_products_panel_open' );
add_action( 'woocommerce_before_shop_loop', 'gutenix_wc_loop_products_panel_close', 50 );
add_filter( 'woocommerce_product_loop_start', 'gutenix_wc_product_loop_start' );
add_filter( 'post_class', 'add_product_classes', 40, 3 );

/* Shop Page Title */
add_filter( 'woocommerce_show_page_title', 'gutenix_wc_loop_page_title' );


/**
 * Add classes to WooCommerce product entries.
 *
 * @since 1.0.0
 */
function add_product_classes( $classes ) {

	// Sale badge style
	$sale_badge_style = gutenix_theme()->customizer->get_value( 'woo_sale_badge_style', 'square' );
	if ( 'circle' == $sale_badge_style ) {
		$classes[] = $sale_badge_style . '-sale';
	}

	// Products List Style
	$woo_products_style = gutenix_theme()->customizer->get_value( 'woo_products_style', 'default' );
	if ( 'default' != $woo_products_style ) {
		$classes[] = 'style-' . $woo_products_style;
	}

	// Products Content Align
	$woo_products_content_align = gutenix_theme()->customizer->get_value( 'woo_products_content_align' );
	if ( '' != $woo_products_content_align ) {
		$classes[] = 'content_align-' . $woo_products_content_align;
	}

	return $classes;
}

if ( ! function_exists( 'gutenix_wc_loop_page_title' ) ) {

	/**
	 * Archive products page title
	 */
	function gutenix_wc_loop_page_title() {
		$visible = gutenix_theme()->customizer->get_value( 'woo_page_title' );

		if( ! $visible ) {
			return false;
		}

		return true;
	}

}

if ( ! function_exists( 'gutenix_wc_loop_products_panel_open' ) ) {

	/**
	 * Archive products panel wrapper open
	 */
	function gutenix_wc_loop_products_panel_open() {
		if ( ! wc_get_loop_prop( 'is_paginated' ) || ! woocommerce_products_will_display() ) {
			return;
		}

		echo '<div class="woocommerce-products__panel clear">';
	}

}

if ( ! function_exists( 'gutenix_wc_products_filters_panel' ) ) {

	/**
	 * Products Filter Widgets List
	 */
	function gutenix_wc_products_filters_panel() {
		?>

		<div class="products_filter-bar__overlay">
			<div class="products_filter-bar__sidebar">
				<button class="products_filter-toggle-close btn-initial"><?php echo gutenix_get_icon_svg( 'close' ); ?></button>
				<?php dynamic_sidebar( 'sidebar-shop_filters_panel' ); ?>
			</div>
		</div>

		<?php

	}

}

if ( ! function_exists( 'gutenix_wc_loop_products_panel_close' ) ) {

	/**
	 * Archive products panel wrapper close
	 */
	function gutenix_wc_loop_products_panel_close() {
		if ( ! wc_get_loop_prop( 'is_paginated' ) || ! woocommerce_products_will_display() ) {
			return;
		}

		echo '</div>';
	}

}

if ( ! function_exists( 'gutenix_wc_product_loop_start' ) ) {

	/**
	 * Rewrite loop start columns
	 *
	 * @param $ob_get_clean
	 *
	 * @return string
	 */
	function gutenix_wc_product_loop_start( $ob_get_clean ) {

		$products_view_buttons_enable 	= gutenix_theme()->customizer->get_value( 'woo_products_grid_list_enable', true );
		$products_view_default 			= gutenix_theme()->customizer->get_value( 'woo_products_catalog_view', 'grid' );
		$products_view 					= ( ! is_singular( 'product' ) && $products_view_buttons_enable != false ) ? 'products-' . esc_attr( $products_view_default ) : '';

		$context = wc_get_loop_prop( 'name' );
		$columns = array(
			'xs' => 1,
			'sm' => 2,
			'md' => 2,
			'lg' => wc_get_loop_prop( 'columns' ),
			'xl' => wc_get_loop_prop( 'columns' ),
		);

		/*if( in_array( $context , array( 'related', 'up-sells', 'cross-sells' ) ) ){
			if( gutenix_has_sidebar() ){
				$columns['xl'] = 2;
				$columns['lg'] = 2;
			} else {
				$columns['xl'] = 3;
				$columns['lg'] = 3;
			}
		}*/

		if( $columns['md'] > $columns['lg'] ){
			$columns['md'] = $columns['lg'];
		}

		if( $columns['sm'] > $columns['md'] ){
			$columns['sm'] = $columns['md'];
		}

		$columns = apply_filters( 'gutenix-theme/woo/products_loop_columns', $columns, $context );

		if ( is_shop() || is_product_taxonomy() || is_product() ) {
			$ob_get_clean = sprintf(
				'<ul class="products '. esc_attr( $products_view ) .' columns-xs-%1$s columns-sm-%2$s columns-md-%3$s columns-lg-%4$s columns-xl-%5$s">',
				esc_attr( $columns['xs'] ),
				esc_attr( $columns['sm'] ),
				esc_attr( $columns['md'] ),
				esc_attr( $columns['lg'] ),
				esc_attr( $columns['xl'] )
			);
		}

		if ( apply_filters( 'gutenix-theme/woo/products-loop-categories/show', true ) ){
			$ob_get_clean = woocommerce_maybe_show_product_subcategories( $ob_get_clean );
		}

		return $ob_get_clean;
	}
}

//Remove Sales Flash
add_filter('woocommerce_sale_flash', 'woo_custom_hide_sales_flash');
function woo_custom_hide_sales_flash() {
    return false;
}

if ( ! function_exists( 'gutenix_wc_sale_badge_content' ) ) {

	/**
	 * Sale badge content
	 *
	 * @since 1.0.0
	 */
	function gutenix_wc_sale_badge_content() {
		
		global $product;

		$percent = '';

		if ( $product->is_type( 'simple' ) || $product->is_type( 'external' ) ) {

			$r_price 	= $product->get_regular_price();
			$s_price 	= $product->get_sale_price();
			$percent 	= round( ( ( floatval( $r_price ) - floatval( $s_price ) ) / floatval( $r_price ) ) * 100 );

		} else if ( $product->is_type( 'variable' ) ) {

			$available_variations = $product->get_available_variations();
			$maximumper           = 0;

			for ( $i = 0; $i < count( $available_variations ); ++ $i ) {
				$variation_id     = $available_variations[ $i ]['variation_id'];
				$variable_product = new WC_Product_Variation( $variation_id );

				if ( ! $variable_product->is_on_sale() ) {
					continue;
				}

				$r_price 	= $variable_product->get_regular_price();
				$s_price    = $variable_product->get_sale_price();
				$percent 	= round( ( ( floatval( $r_price ) - floatval( $s_price ) ) / floatval( $r_price ) ) * 100 );

				if ( $percent > $maximumper ) {
					$maximumper = $percent;
				}
			}

			$percent = sprintf( esc_html__( '%s', 'gutenix' ), $maximumper );

			return $percent;

		}

		$woo_sale_badge_content = gutenix_theme()->customizer->get_value( 'woo_sale_badge_content', 'sale' );
		if ( $product->is_on_sale() && 'percent' != $woo_sale_badge_content ) {
			echo '<span class="sale">' . esc_html__( 'Sale!', 'gutenix' ) . '</span>';
		} else {

			if ( ! empty( $percent ) && '100' != $percent ) {
					
				echo '<span class="sale">-' . esc_html( $percent ) . '%</span>';

			}
		}
	}
}

