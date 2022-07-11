<?php
/**
 * Contextual functions for the header, footer, content and sidebar classes.
 *
 * @package Gutenix
 */

/**
 * Get container CSS class.
 *
 * @since  1.0.0
 * @param  string $container_type Container type
 * @return string
 */
function gutenix_get_container_class( $container_type = 'boxed' ) {

	if ( 'boxed' === $container_type ) {
		return  'gutenix-container';
	}

	return 'gutenix-container-' . esc_attr( $container_type );
}

/**
 * Prints a CSS class attribute for container based on customize setting.
 *
 * @since  1.0.0
 * @param  string $setting Setting name.
 * @param  array  $classes Additional classes.
 * @return void
 */
function gutenix_container_class_by_setting( $setting = '', $classes = array() ) {

	$container_type = ! empty( $setting ) ? gutenix_theme()->customizer->get_value( $setting ) : 'boxed';

	$classes[] = gutenix_get_container_class( $container_type );

	echo 'class="' . esc_attr( join( ' ', $classes ) ) . '"';
}

/**
 * Prints site content container CSS classes
 *
 * @since  1.0.0
 * @param  array $classes Additional classes.
 * @return void
 */
function gutenix_content_container_class( $classes = array() ) {
	
	$layout_type = gutenix_theme()->customizer->get_value( 'layout_type_pages' );

	if ( is_home() || ( is_archive() && ! is_tax() && ! is_post_type_archive() ) ) {
		$layout_type = gutenix_theme()->customizer->get_value( 'layout_type_blog' );
	}

	if ( is_singular( 'post' ) ) {
		$layout_type = gutenix_theme()->customizer->get_value( 'layout_type_post' );
	}

	//	WooCommerce
	if ( class_exists( 'woocommerce' ) ) {
		
		if ( is_shop() || is_tax( 'product_cat' ) || is_tax( 'product_tag' ) ) {
			$layout_type = gutenix_theme()->customizer->get_value( 'layout_type_shop' );
		}

		if ( is_singular( 'product' ) ) {
			$layout_type = gutenix_theme()->customizer->get_value( 'layout_type_product' );
		}
	}

	$container_type = ! empty( gutenix_theme()->layout[ $layout_type ]['container'] ) ? gutenix_theme()->layout[ $layout_type ]['container'] : 'boxed';

	$classes[] = gutenix_get_container_class( $container_type );

	$classes = apply_filters( 'gutenix_content_container_class', $classes );

	echo 'class="' . esc_attr( join( ' ', $classes ) ) . '"';
}

/**
 * Prints primary content wrapper CSS classes.
 *
 * @since  1.0.0
 * @param  array $classes Additional classes.
 * @return void
 */
function gutenix_primary_content_class( $classes = array() ) {
	echo 'class="' . esc_attr( join( ' ', gutenix_get_layout_classes( 'content', $classes ) ) ) . '"';
}

/**
 * Prints secondary content wrapper CSS classes.
 *
 * @since  1.0.0
 * @param  array $classes Additional classes.
 * @return void
 */
function gutenix_secondary_content_class( $classes = array() ) {
	echo 'class="' . esc_attr( join( ' ', gutenix_get_layout_classes( 'sidebar', $classes ) ) ) . '"';
}

/**
 * Get CSS class attribute for passed layout context.
 *
 * @since  1.0.0
 * @param  string $layout  Layout context.
 * @param  array  $classes Additional classes.
 * @return array
 */
function gutenix_get_layout_classes( $layout = 'content', $classes = array() ) {
	
	$layout_type = gutenix_theme()->customizer->get_value( 'layout_type_pages' );

	if ( is_home() || ( is_archive() && ! is_tax() && ! is_post_type_archive() ) ) {
		$layout_type = gutenix_theme()->customizer->get_value( 'layout_type_blog' );
	}

	if ( is_singular( 'post' ) ) {
		$layout_type = gutenix_theme()->customizer->get_value( 'layout_type_post' );
	}

	//	WooCommerce
	if ( class_exists( 'woocommerce' ) ) {
		if ( is_shop() || is_tax( 'product_cat' ) || is_tax( 'product_tag' ) ) {
			$layout_type = gutenix_theme()->customizer->get_value( 'layout_type_shop' );
		}

		if ( is_singular( 'product' ) ) {
			$layout_type = gutenix_theme()->customizer->get_value( 'layout_type_product' );
		}
	}
	
	$layout_classes = ! empty( gutenix_theme()->layout[ $layout_type ][ $layout ] ) ? gutenix_theme()->layout[ $layout_type ][ $layout ] : array();

	if ( ! empty( $classes ) ) {
		$layout_classes = array_merge( $classes, $layout_classes );
	}

	if ( empty( $layout_classes ) ) {
		return array();
	}

	return apply_filters( "gutenix_{$layout}_classes", $layout_classes );
}

/**
 * Retrieve or print `class` attribute for Post List wrapper.
 *
 * @since  1.0.0
 * @param  array $classes Additional classes.
 * @return void
 */
function gutenix_posts_list_class( $classes = array() ) {

	$classes[] = 'posts-list';

	$layout = apply_filters( 'gutenix_posts_list_layout', 'default' );
	
	if( is_search() ) {
		$layout = 'search-result';
	}

	$classes[] = 'posts-list--' . esc_attr( $layout );

	$classes = apply_filters( 'gutenix_posts_list_class', $classes );

	/* Grid, Masonry Columns */
	if( $layout == 'grid' || $layout == 'masonry' ) {
		$grid_columns = apply_filters( 'gutenix_posts_grid_columns', '2' );

		$classes[] = 'grid-columns-' . esc_attr( $grid_columns );
	}

	echo 'class="' . esc_attr( join( ' ', $classes ) ) . '"';
}

/**
 * Get page title classes.
 *
 * @since  1.0.0
 * @param  array $classes Additional classes.
 * @return string
 */
function gutenix_get_page_title_class( $classes = array() ) {
	$classes[] = 'entry-title';

	$show_page_title = gutenix_theme()->customizer->get_value( 'show_page_title' );

	if ( ! $show_page_title ) {
		$classes[] = 'screen-reader-text';
	}

	$classes = apply_filters( 'gutenix_get_page_title_class', $classes );

	return 'class="' . esc_attr( join( ' ', $classes ) ) . '"';
}

/**
 * Prints site top panel CSS classes.
 *
 * @since  1.0.0
 * @param  array $classes Additional classes.
 * @return void
 */
function gutenix_top_panel_class( $classes = array() ) {

	$visible = gutenix_is_top_panel_visible();

	if ( ! $visible && ! is_customize_preview() ) {
		return;
	}

	$attr = ! $visible ? 'hidden="hidden"' : '';

	$classes[] = 'top-panel';

	$classes = apply_filters( 'gutenix_top_panel_class', $classes );

	echo 'class="' . esc_attr( join( ' ', $classes ) ) . '"' . esc_attr( $attr );
}

/**
 * Prints site header bar CSS classes.
 *
 * @since  1.0.0
 * @param  array $classes Additional classes.
 * @return void
 */
function gutenix_header_bar_class( $classes = array() ) {
	$layout = gutenix_theme()->customizer->get_value( 'header_layout_type' );
	$mobile_breakpoint = gutenix_get_mobile_panel_breakpoint();

	$classes[] = 'header-bar';
	$classes[] = 'header-bar--' . esc_attr( $layout );

	if ( $mobile_breakpoint ) {
		$classes[] = 'header-bar--mobile-breakpoint-' . esc_attr( $mobile_breakpoint );
	}

	/* Header Buttons */
	$show_header_btn_1 = gutenix_theme()->customizer->get_value( 'show_header_btn_1' );
	$show_header_btn_2 = gutenix_theme()->customizer->get_value( 'show_header_btn_2' );
	$classes[] = ( ! $show_header_btn_1 && ! $show_header_btn_2 ) ? 'no_header_btns' : 'has_header_btns';

	/* Header Search Button */
	$header_search_visible = gutenix_theme()->customizer->get_value( 'header_search_visible' );
	$classes[] = ! $header_search_visible ? 'no_header_search' : 'has_header_search';

	/* Header Social Links */
	$header_social_links_visible = gutenix_theme()->customizer->get_value( 'header_social_links_visible' );
	$classes[] = ! $header_social_links_visible ? 'no_header_social_links' : 'has_header_social_links';

	//	if layout style-1
	$header_menu_position 	= gutenix_theme()->customizer->get_value( 'header_menu_position' );
	$classes[] = $layout == 'style-1' ? 'main-menu-' . esc_attr( $header_menu_position ) : '';

	//	if layout style-7, style-8
	$header_logo_position 	= gutenix_theme()->customizer->get_value( 'header_logo_position' );
	$classes[] = ( 'style-7' == $layout || 'style-8' == $layout ) ? 'logo-' . esc_attr( $header_logo_position ) : '';

	// Need for render header partial in the customizer.
	if ( 'disable' === $layout ) {
		$classes[] = 'gutenix-hidden';
	}

	$classes = apply_filters( 'gutenix_header_bar_class', $classes );

	echo 'class="' . esc_attr( join( ' ', $classes ) ) . '"';
}

/**
 * Prints site footer bar CSS classes.
 *
 * @since  1.0.0
 * @param  array $classes Additional classes.
 * @return void
 */
function gutenix_footer_bar_class( $classes = array() ) {
	$layout = gutenix_theme()->customizer->get_value( 'footer_layout_type' );

	$classes[] = 'footer-bar';
	$classes[] = 'footer-bar--' . esc_attr( $layout );

	// Need for render footer partial in the customizer.
	if ( 'disable' === $layout ) {
		$classes[] = 'gutenix-hidden';
	}

	$border_top_size = gutenix_theme()->customizer->get_value( 'footer_border_top_size' );
	$classes[] = 'border-top-' . esc_attr( $border_top_size );


	$classes = apply_filters( 'gutenix_footer_bar_class', $classes );

	echo 'class="' . esc_attr( join( ' ', $classes ) ) . '"';
}
