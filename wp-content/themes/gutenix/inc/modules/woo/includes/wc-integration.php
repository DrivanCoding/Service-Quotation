<?php
/**
 * Extends basic functionality for better WooCommerce compatibility
 *
 * @package Gutenix
 */

/**
 * WooCommerce setup function.
 *
 * @link https://docs.woocommerce.com/document/third-party-custom-theme-compatibility/
 * @link https://github.com/woocommerce/woocommerce/wiki/Enabling-product-gallery-features-(zoom,-swipe,-lightbox)-in-3.0.0
 *
 * @return void
 */
function gutenix_wc_setup() {
	add_theme_support( 'woocommerce' );
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );
}

add_action( 'after_setup_theme', 'gutenix_wc_setup' );

/**
 * Add 'woocommerce-active' class to the body tag.
 *
 * @param  array $classes CSS classes applied to the body tag.
 *
 * @return array $classes modified to include 'woocommerce-active' class.
 */
function gutenix_wc_active_body_class( $classes ) {
	$classes[] = 'woocommerce-active';

	$woo_checkout_sticky_order = gutenix_theme()->customizer->get_value( 'woo_checkout_sticky_order', false );
	if ( is_checkout() && true == $woo_checkout_sticky_order ) {
		$classes[] = 'sticky-order-block';
	}

	return $classes;
}

add_filter( 'body_class', 'gutenix_wc_active_body_class' );

/**
 * Remove default WooCommerce wrapper.
 */
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );

if ( ! function_exists( 'gutenix_wc_wrapper_before' ) ) {
	/**
	 * Before Content.
	 *
	 * Wraps all WooCommerce content in wrappers which match the theme markup.
	 *
	 * @return void
	 */
	function gutenix_wc_wrapper_before() {
		?>
			<div <?php gutenix_content_container_class( array( 'site-content__container' ) ); ?>>
			<div class="gutenix-row">
			<div id="primary" <?php gutenix_primary_content_class( array( 'content-area' ) ); ?>>
			<main id="main" class="site-main">
		<?php
	}
}

add_action( 'woocommerce_before_main_content', 'gutenix_wc_wrapper_before' );

if ( ! function_exists( 'gutenix_wc_wrapper_after' ) ) {
	/**
	 * After Content.
	 *
	 * Closes the wrapping divs.
	 *
	 * @return void
	 */
function gutenix_wc_wrapper_after() {
	?>
	</main><!-- #main -->
	</div><!-- #primary -->
	<?php
}
}
add_action( 'woocommerce_after_main_content', 'gutenix_wc_wrapper_after' );


if ( ! function_exists( 'gutenix_wc_sidebar_after' ) ) {
	/**
	 * Close tags after sidebar
	 */
	function gutenix_wc_sidebar_after() {
		?>
			</div>
			</div>
		<?php
	}
}
add_action( 'woocommerce_sidebar', 'gutenix_wc_sidebar_after', 99 );


/**
 * Sample implementation of the WooCommerce Mini Cart.
 *
 * You can add the WooCommerce Mini Cart to header.php like so ...
 *
 * <?php
 * if ( function_exists( 'gutenix_wc_header_cart' ) ) {
 * gutenix_wc_header_cart();
 * }
 * ?>
 */

if ( ! function_exists( 'gutenix_wc_cart_link_fragment' ) ) {
	/**
	 * Cart Fragments.
	 *
	 * Ensure cart contents update when products are added to the cart via AJAX.
	 *
	 * @param array $fragments Fragments to refresh via AJAX.
	 *
	 * @return array Fragments to refresh via AJAX.
	 */
	function gutenix_wc_cart_link_fragment( $fragments ) {
		ob_start();
		gutenix_wc_cart_link();
		$fragments['a.header-cart__link'] = ob_get_clean();

		return $fragments;
	}
}
add_filter( 'add_to_cart_fragments', 'gutenix_wc_cart_link_fragment' );

if ( ! function_exists( 'gutenix_wc_cart_link' ) ) {
	/**
	 * Cart Link.
	 *
	 * Displayed a link to the cart including the number of items present and the cart total.
	 *
	 * @return void
	 */
	function gutenix_wc_cart_link() {
		?>
			<a class="header-cart__link" href="#" title="<?php esc_attr_e( 'View your shopping cart', 'gutenix' ); ?>">
		  <?php
		  $item_count_text = sprintf(
		  /* translators: number of items in the mini cart. */
			  esc_html( '%d' ),
			  WC()->cart->get_cart_contents_count()
		  );

		  ?>
				<?php echo gutenix_get_icon_svg( 'cart' ) ?>
				<span class="header-cart__link-count"><?php echo esc_html( $item_count_text ); ?></span>
			</a>
		<?php
	}
}

if ( ! function_exists( 'gutenix_wc_header_cart' ) ) {
	/**
	 * Display Header Cart.
	 *
	 * @return void
	 */
	function gutenix_wc_header_cart() {
		
		$class 					= '';
		$header_cart_icon 		= gutenix_theme()->customizer->get_value( 'woo_header_cart_icon', true );
		$header_cart_all_pages 	= gutenix_theme()->customizer->get_value( 'woo_header_cart_all_pages', false );

		if ( true != $header_cart_icon ) {
			return false;
		}

		if( is_cart() && false != $header_cart_all_pages ) {
			$class .= 'header_cart_dd_active ';
		}

		if ( is_cart() ) {
			$class .= 'current-menu-item ';
		}
		?>
			<div class="header-cart">
				<div class="header-cart__link-wrap <?php echo esc_attr( $class ); ?>">
			<?php gutenix_wc_cart_link(); ?>
				</div>
				<div class="header-cart__content">
			<?php
			$instance = array( 'title' => esc_html__( 'My cart', 'gutenix' ) );
			the_widget( 'WC_Widget_Cart', $instance );
			?>
				</div>
			</div>
		<?php
	}
}

add_action( 'gutenix_header_wc_cart', 'gutenix_wc_header_cart' );

/**
 * Display Header Cart to all pages.
 */
add_filter( 'woocommerce_widget_cart_is_hidden', 'gutenix_always_show_cart', 40, 0 );

function gutenix_always_show_cart() {
		
	$header_cart_all_pages = gutenix_theme()->customizer->get_value( 'woo_header_cart_all_pages', false );

	if( true != $header_cart_all_pages ) {
		return is_cart();
	}
}

if ( ! function_exists( 'gutenix_wc_pagination' ) ) {

	/**
	 * WooCommerce pagination
	 *
	 * @param $args
	 *
	 * @return mixed
	 */
	function gutenix_wc_pagination( $args ) {

		$prev_svg_icon = '<svg class="nav-icon nav-prev-icon svg-icon" aria-hidden="true" role="img" focusable="false" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16"><path d="M6.70312 14L8.09375 12.5315L3.79688 8.04429H16V5.95571H3.79688L8.09375 1.46853L6.70312 0L0 7L6.70312 14Z"/></svg>';
		$next_svg_icon = '<svg class="nav-icon nav-next-icon svg-icon" aria-hidden="true" role="img" focusable="false" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16"><path d="M9.29688 0L7.90625 1.46853L12.2031 5.95571H0V8.04429H12.2031L7.90625 12.5315L9.29688 14L16 7L9.29688 0Z"/></svg>';

		$prev_icon = is_rtl() ? $next_svg_icon : $prev_svg_icon;
		$next_icon = is_rtl() ? $prev_svg_icon : $next_svg_icon;

		$args['prev_text'] = sprintf( '%2$s</span><span>%1$s</span>', esc_html__( 'Prev Page', 'gutenix' ), $prev_icon );

		$args['next_text'] = sprintf( '<span>%1$s</span>%2$s', esc_html__( 'Next Page', 'gutenix' ), $next_icon );

		return $args;
	}

}
add_filter( 'woocommerce_pagination_args', 'gutenix_wc_pagination' );

if ( ! function_exists( 'gutenix_wc_product_search_form' ) ) {

	/**
	 * WooCommerce search form
	 *
	 * @param $args
	 *
	 * @return mixed
	 */
	function gutenix_wc_product_search_form( $html ) {
		$format = apply_filters( 'gutenix_product_search_form_submit_format', '<button type="submit" value="Search">%s</button>' );

		$search_button = sprintf( $format, gutenix_get_icon_svg( 'search' ) );
		$pattern = '/<button[^>]*>.*?<\/button>/i';
		$html = preg_replace( $pattern, $search_button, $html );

		return $html;
	}

}
add_filter( 'get_product_search_form', 'gutenix_wc_product_search_form' );

if ( ! function_exists( 'gutenix_product_categories_list_description' ) ) {

	/**
	 * WooCommerce product categories list with Description
	 */
	function gutenix_product_categories_list_description( $category ){
		$cat_id = $category->term_id;
		$prod_term = get_term($cat_id,'product_cat');
		$description = $prod_term->description;

		echo '<div class="woocommerce-loop-category__description">' . esc_html( $description ) . '</div>';
	}
	add_action( 'woocommerce_after_subcategory_title', 'gutenix_product_categories_list_description', 12);
}

if ( ! function_exists( 'gutenix_filter_woocommerce_product_categories_list_count' ) ) {

	/**
	 * WooCommerce product categories list with Description
	 */
	function gutenix_filter_woocommerce_product_categories_list_count( $mark_class_count_category_count_mark, $category ) {

		$mark_class_count_category_count_mark = ' <mark class="count">' . esc_html( $category->count ) . '</mark>';

		return $mark_class_count_category_count_mark;

	}

	add_filter( 'woocommerce_subcategory_count_html', 'gutenix_filter_woocommerce_product_categories_list_count', 10, 2 );
}