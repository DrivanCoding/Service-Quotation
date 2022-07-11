<?php
/**
 * WooCommerce content product hooks.
 *
 * @package Gutenix
 */

add_action( 'woocommerce_before_shop_loop_item', 'gutenix_wc_loop_product_content_open', 1 );

remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5 );
add_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_link_close', 20 );

add_action( 'woocommerce_after_shop_loop_item', 'gutenix_woo_woocommerce_shop_product_content' );

remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );
remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 );

add_action( 'woocommerce_after_shop_loop_item', 'gutenix_wc_loop_product_content_close', 20 );

remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10 );

remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart');

add_action( 'woocommerce_before_subcategory', 'gutenix_wc_loop_category_content_open', 1 );
add_action( 'woocommerce_after_subcategory', 'gutenix_wc_loop_category_content_close', 40 );

if ( ! function_exists( 'gutenix_wc_loop_product_content_open' ) ) {

	/**
	 * Content product wrapper open
	 */
	function gutenix_wc_loop_product_content_open() {
		echo '<div class="product-content clear">';
	}

}

if ( ! function_exists( 'gutenix_wc_loop_product_content_close' ) ) {

	/**
	 * Content product wrapper close
	 */
	function gutenix_wc_loop_product_content_close() {
		echo '</div>';
	}

}

if ( ! function_exists( 'gutenix_wc_loop_add_to_cart_link' ) ) {

	/**
	 *  Override product loop add to cart button
	 *
	 * @param $html
	 * @param $product
	 * @param $args
	 *
	 * @return string
	 */
	function gutenix_wc_loop_add_to_cart_link( $html, $product, $args ) {
		$html = sprintf( '<a href="%s" data-quantity="%s" class="%s" %s><span class="button-text">%s</span></a>',
			esc_url( $product->add_to_cart_url() ),
			esc_attr( isset( $args['quantity'] ) ? $args['quantity'] : 1 ),
			esc_attr( isset( $args['class'] ) ? $args['class'] : 'button' ),
			isset( $args['attributes'] ) ? wc_implode_html_attributes( $args['attributes'] ) : '',
			esc_html( $product->add_to_cart_text() )
		);

		return $html;
	}

}

if ( ! function_exists( 'gutenix_wc_loop_category_content_open' ) ) {

	/**
	 * Content category wrapper open
	 */
	function gutenix_wc_loop_category_content_open() {
		echo '<div class="category-content">';
	}

}

if ( ! function_exists( 'gutenix_wc_loop_category_content_close' ) ) {

	/**
	 * Content category wrapper close
	 */
	function gutenix_wc_loop_category_content_close() {
		echo '</div>';
	}

}

/**
 * Shop Page Product Content Sorting
 */
if ( ! function_exists( 'gutenix_woo_woocommerce_shop_product_content' ) ) {

	/**
	 * Show the product structure
	 */
	function gutenix_woo_woocommerce_shop_product_content() {

		global $product;

		$elements = apply_filters( 'gutenix_shop_product_structure', gutenix_theme()->customizer->get_value( 'shop_elements_positioning' ) );

		if ( is_array( $elements ) && ! empty( $elements ) ) {

			echo '<div class="gutenix-loop-product-summary-wrap">';

			foreach ( $elements as $element ) {

				if ( 'category' == $element ) {
					
					echo wp_kses_post( wc_get_product_category_list( $product->get_id(), ', ', '<span class="woocommerce-loop-product__category">', '</span>' ) );

				}

				if ( 'title' == $element ) {
					
					echo '<h2 class="woocommerce-loop-product__title"><a href="' . esc_url( get_the_permalink() ) . '">' . get_the_title() . '</a></h2>';

				}

				if ( 'price' == $element ) {

					woocommerce_template_loop_price();

				}

				if ( 'description' == $element ) {
					
					if ( has_excerpt() ) {

						$length = gutenix_theme()->customizer->get_value( 'woo_products_excerpt_length' );

						echo '<p class="woocommerce-loop-product__description">';
						
							if ( ! $length ) {
								echo wp_kses_post( strip_shortcodes( get_the_excerpt() ) );
							} else {
								echo wp_trim_words( strip_shortcodes( $product->get_short_description() ), $length );
							}
							
						echo '</p>';

					}

				}
				
				if ( 'button' == $element ) {	
					
					woocommerce_template_loop_add_to_cart();

				}

				if ( 'rating' == $element ) {

					woocommerce_template_loop_rating();

				}

				if ( 'tags' == $element ) {

					echo wp_kses_post( wc_get_product_tag_list( $product->get_id(), ', ', '<span class="woocommerce-loop-product__tags tagged_as">' . esc_html__( 'Tag:', 'gutenix' ) . ' ', '</span>' ) );

				}

			}

			echo '</div>';

		}
	}
}

/**
 * Add WooCommerce 'New' and 'Featured' Flashes
 *
 */
if ( ! function_exists( 'gutenix_woo_product_show_flash' ) ) {

	function gutenix_woo_product_show_flash() {
		
		global $product;

		if ( ! class_exists( 'Gutenix_Pro' ) ) {
			return;
		}

		$badges = gutenix_theme()->customizer->get_value( 'woo_products_badges' );

		$badge_outofstock_enable 		= in_array( 'outofstock', $badges);
		$badge_outofstock_text 			= gutenix_theme()->customizer->get_value( 'woo_products_badge_outofstock_text' );
		$badge_outofstock_text_color 	= gutenix_theme()->customizer->get_value( 'woo_products_badge_outofstock_text_color', '#ffffff' );
		$badge_outofstock_bg 			= gutenix_theme()->customizer->get_value( 'woo_products_badge_outofstock_bg', '#414756' );
		
		$badge_new_enable 				= in_array( 'new', $badges);
		$badge_new_text 				= gutenix_theme()->customizer->get_value( 'woo_products_badge_new_text' );
		$badge_new_text_color 			= gutenix_theme()->customizer->get_value( 'woo_products_badge_new_text_color', '#ffffff' );
		$badge_new_bg 					= gutenix_theme()->customizer->get_value( 'woo_products_badge_new_bg', '#3aaae4' );
		$badge_new_novelty 				= gutenix_theme()->customizer->get_value( 'woo_products_badge_new_novelty', '3' );
		
		$badge_featured_enable 			= in_array( 'featured', $badges);
		$badge_featured_text 			= gutenix_theme()->customizer->get_value( 'woo_products_badge_featured_text' );
		$badge_featured_text_color 		= gutenix_theme()->customizer->get_value( 'woo_products_badge_featured_text_color', '#ffffff' );
		$badge_featured_bg 				= gutenix_theme()->customizer->get_value( 'woo_products_badge_featured_bg', '#71b726' );

		if ( false != $badge_new_enable && ( ( time() - ( 60 * 60 * 24 * $badge_new_novelty ) ) < strtotime( get_the_time( 'Y-m-d' ) ) ) ) {
			echo '<span class="new" style="color:'. esc_attr( $badge_new_text_color ) .';background-color:'. esc_attr( $badge_new_bg ) .';">' . esc_html( $badge_new_text ) . '</span>';
		}

		if ( $product->is_featured() && false != $badge_featured_enable ) {
			echo '<span class="featured" style="color:'. esc_attr( $badge_featured_text_color ) .'; background-color:'. esc_attr( $badge_featured_bg ) .';">'. esc_html( $badge_featured_text ) .'</span>';
		}

		if( !$product->is_in_stock() && false != $badge_outofstock_enable ) {
			echo '<span class="outofstock" style="color:'. esc_attr( $badge_outofstock_text_color ) .'; background-color:'. esc_attr( $badge_outofstock_bg ) .';">' . esc_html( $badge_outofstock_text ) . '</span>';
		}

	}
}

/**
 * Display the custom text field
 *
 * @since 1.0.0
 */
function gutenix_woo_product_badge_create_custom_field() {

 	woocommerce_wp_text_input( array(
 		'id' 			=> 'gutenix_woo_product_custom_badge',
 		'label' 		=> esc_html__( 'Custom Badge Text', 'gutenix' ),
 		'class' 		=> 'gutenix-custom-field',
 		'desc_tip' 		=> true,
 		'description' 	=> esc_html__( 'Enter the title of your custom badge label.', 'gutenix' ),
 		'type' 			=> 'text'
 	) );

 	woocommerce_wp_text_input( array(
 		'id' 			=> 'gutenix_woo_product_custom_badge_bg',
 		'label' 		=> esc_html__( 'Custom Badge BG', 'gutenix' ),
 		'class' 		=> 'gutenix-custom-field-bg',
 		'desc_tip' 		=> true,
 		'description' 	=> esc_html__( 'Enter the background color of your custom badge label.', 'gutenix' ),
 		'type' 			=> 'color'
 	) );

}
add_action( 'woocommerce_product_options_general_product_data', 'gutenix_woo_product_badge_create_custom_field' );

/* Save the custom field */
function gutenix_woo_product_badge_save_custom_field( $post_id ) {
 	
 	$product = wc_get_product( $post_id );
 	
 	$title 	= isset( $_POST['gutenix_woo_product_custom_badge'] ) ? $_POST['gutenix_woo_product_custom_badge'] : '';
 	$bg 	= isset( $_POST['gutenix_woo_product_custom_badge_bg'] ) ? $_POST['gutenix_woo_product_custom_badge_bg'] : '';
 	

 	$product->update_meta_data( 'gutenix_woo_product_custom_badge', sanitize_text_field( $title ) );
 	$product->update_meta_data( 'gutenix_woo_product_custom_badge_bg', sanitize_text_field( $bg ) );

 	$product->save();
}
add_action( 'woocommerce_process_product_meta', 'gutenix_woo_product_badge_save_custom_field' );

/* Display custom field on the front end */
function gutenix_woo_product_badge_display_custom_label() {
 	
 	
}
