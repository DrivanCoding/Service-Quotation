<?php
/**
 * WooCommerce single product hooks.
 *
 * @package Gutenix
 */

remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0);

remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_show_product_sale_flash', 1 );

add_action( 'woocommerce_before_single_product_summary', 'gutenix_single_product_row_open', 1 );
add_action( 'woocommerce_after_single_product_summary', 'gutenix_single_product_row_close', 5 );

add_action( 'woocommerce_before_single_product_summary', 'gutenix_single_product_images_column_open', 1 );
add_action( 'woocommerce_before_single_product_summary', 'gutenix_single_product_images_column_close', 30 );

add_action( 'woocommerce_before_single_product_summary', 'gutenix_single_product_content_column_open', 40 );
add_action( 'woocommerce_after_single_product_summary', 'gutenix_single_product_content_column_close', 1 );
add_filter( 'woocommerce_product_thumbnails_columns', 'gutenix_wc_product_thumbnails_columns' );


if ( ! function_exists( 'gutenix_single_product_row_open' ) ) {

	/**
	 * Content single product row open
	 */
	function gutenix_single_product_row_open() {
		echo '<div class="gutenix-row">';
	}

}

if ( ! function_exists( 'gutenix_single_product_row_close' ) ) {

	/**
	 * Content single product row open
	 */
	function gutenix_single_product_row_close() {
		echo '</div>';
	}

}

if ( ! function_exists( 'gutenix_single_product_images_column_open' ) ) {

	/**
	 * Content single product images column open
	 */
	function gutenix_single_product_images_column_open() {
		echo '<div class="gutenix-col-xs-12 gutenix-col-sm-12 gutenix-col-md-6 gutenix-product-gallery-wrapper">';
	}

}

if ( ! function_exists( 'gutenix_single_product_images_column_close' ) ) {

	/**
	 * Content single product images column close
	 */
	function gutenix_single_product_images_column_close() {
		echo '</div>';
	}

}

if ( ! function_exists( 'gutenix_single_product_content_column_open' ) ) {

	/**
	 * Content single product content column open
	 */
	function gutenix_single_product_content_column_open() {
		echo '<div class="gutenix-col-xs-12 gutenix-col-sm-12 gutenix-col-md-6 gutenix-product-summary-wrapper">';
	}

}

if ( ! function_exists( 'gutenix_single_product_content_column_close' ) ) {

	/**
	 * Content single product content column close
	 */
	function gutenix_single_product_content_column_close() {
		echo '</div>';
	}

}

if ( ! function_exists( 'gutenix_wc_product_thumbnails_columns' ) ) {

	/**
	 * Return product thumbnails count
	 *
	 * @return int
	 */
	function gutenix_wc_product_thumbnails_columns(){
		return 3;
	}

}

if ( ! function_exists( 'gutenix_woocommerce_share_product' ) ) {

	/**
	 *  Product Share Networks
	 */
	function gutenix_woocommerce_share_product() {
		
		gutenix_share_buttons();

	}
}