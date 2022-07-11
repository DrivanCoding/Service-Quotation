<?php
/**
 * WooCommerce integration module
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

if ( ! class_exists( 'Gutenix_Woo_Module' ) ) {

	/**
	 * Define Gutenix_Woo_Module class
	 */
	class Gutenix_Woo_Module extends Gutenix_Module_Base {

		/**
		 * Module ID
		 *
		 * @return string
		 */
		public function module_id() {
			return 'woo';
		}

		/**
		 * Module filters
		 *
		 * @return void
		 */
		public function filters() {

			/**
			 * Disable the default WooCommerce stylesheet.
			 *
			 * Removing the default WooCommerce stylesheet and enqueing your own will
			 * protect you during WooCommerce core updates.
			 *
			 * @link https://docs.woocommerce.com/document/disable-the-default-stylesheet/
			 */
			add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );

		}

		/**
		 * Include appropriate module files.
		 *
		 * @return void
		 */
		public function includes() {
			require_once get_theme_file_path( 'inc/modules/woo/includes/wc-content-product-functions.php' );
			require_once get_theme_file_path( 'inc/modules/woo/includes/wc-single-product-functions.php' );
			require_once get_theme_file_path( 'inc/modules/woo/includes/wc-archive-product-functions.php' );
			require_once get_theme_file_path( 'inc/modules/woo/includes/wc-customizer.php' );
			require_once get_theme_file_path( 'inc/modules/woo/includes/wc-integration.php' );
		}

		/**
		 * Module condition callback.
		 *
		 * @return bool|callable
		 */
		public function condition_cb() {
			return class_exists( 'WooCommerce' );
		}

		/**
		 * Enqueue module scripts.
		 *
		 * @return void
		 */
		public function enqueue_scripts() {
			
			// register scripts
			wp_enqueue_script(
				'js-cookie',
				get_theme_file_uri( 'inc/modules/woo/assets/js/cookie.js' ),
				array( 'jquery' ),
				'1.5.1',
				true
			);

			wp_enqueue_script(
				'gutenix-woo-module-script',
				get_theme_file_uri( 'inc/modules/woo/assets/js/woo-module-script.js' ),
				array( 'jquery' ),
				gutenix_theme()->version,
				true
			);
		}

		/**
		 * Enqueue module styles.
		 *
		 * @return void
		 */
		public function enqueue_styles() {

			// Global vars
			$product_sale_badge_text_color 		= gutenix_theme()->customizer->get_value( 'woo_sale_badge_text_color', '#ffffff' );
			$product_sale_badge_bg 				= gutenix_theme()->customizer->get_value( 'woo_sale_badge_bg', '#fd6d75' );
			$woo_product_gallery_summary_width 	= gutenix_theme()->customizer->get_value( 'woo_product_gallery_summary_width', '84' );
			$product_gallery_width 				= gutenix_theme()->customizer->get_value( 'woo_product_gallery_width', '57' );
			$product_summary_width 				= gutenix_theme()->customizer->get_value( 'woo_product_summary_width', '43' );
			$product_gallery_thumbs_cols 		= gutenix_theme()->customizer->get_value( 'woo_product_gallery_thumbs_cols', '5' );


			// Define css var
			$woo_css = '';


			// Menu cart icon size
			if ( ! empty( $product_sale_badge_text_color ) || ! empty( $product_sale_badge_bg ) ) {
				$woo_css .= '.onsale .sale{color:'. $product_sale_badge_text_color .';background-color:'. $product_sale_badge_bg .';}';
			}

			// Product Gallery and Summary Width
			if ( ! empty( $woo_product_gallery_summary_width ) && '100' != $woo_product_gallery_summary_width ) {
				$woo_css .= '@media (min-width: 1200px) {
					.single-product .site-main > .product{
						width: '. esc_html( $woo_product_gallery_summary_width ) .'%;
						margin-left: auto;
						margin-right: auto;
					}
				}';
			}

			if ( ! empty( $product_gallery_width ) && '50' != $product_gallery_width ) {
				$woo_css .= '@media (min-width: 1200px) {
					.gutenix-col-md-6.gutenix-product-gallery-wrapper{
						flex: 0 0 '. esc_html( $product_gallery_width ) .'%;
						max-width: '. esc_html( $product_gallery_width ) .'%;
					}
				}';
			}

			if ( ! empty( $product_summary_width ) && '50' != $product_summary_width ) {
				$woo_css .= '@media (min-width: 1200px) {
					.gutenix-col-md-6.gutenix-product-summary-wrapper{
						flex: 0 0 '. esc_html( $product_summary_width ) .'%;
						max-width: '. esc_html( $product_summary_width ) .'%;
					}
				}';
			}

			// Product Gallery and Summary Width
			if ( ! empty( $product_gallery_thumbs_cols ) && '5' != $product_gallery_thumbs_cols ) {
				$product_gallery_thumbs_width = 100 / $product_gallery_thumbs_cols;
				$woo_css .= '@media (min-width: 1200px) {
					.woocommerce-product-gallery .flex-control-thumbs li{
						width: '. esc_html( $product_gallery_thumbs_width ) .'%;
					}
				}';
			}


			wp_enqueue_style(
				'gutenix-woocommerce-style',
				get_template_directory_uri() . '/inc/modules/woo/assets/css/woo-module' . ( is_rtl() ? '-rtl' : '' ) . '.css',
				false,
				gutenix_theme()->version
			);

			wp_add_inline_style(
				'gutenix-woocommerce-style',
				$woo_css
			);

		}

	}

}
