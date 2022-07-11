<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Gutenix
 */

/**
 * Has sidebar.
 *
 * @since  1.0.0
 * @return bool
 */
function gutenix_has_sidebar() {
	$check = false;

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

	if ( in_array( $layout_type, array( 'boxed-content-sidebar', 'boxed-sidebar-content' ) ) ) {
		$check = true;
	}

	return $check;
}

/**
 * Check if top panel visible or not
 *
 * @since  1.0.0
 * @return bool
 */
function gutenix_is_top_panel_visible() {
	$is_visible = false;

	if ( ! gutenix_theme()->customizer->get_value( 'top_panel_visible' ) ) {
		return $is_visible;
	}

	$message 			= gutenix_theme()->customizer->get_value( 'top_panel_text' );
	$social_visible 	= gutenix_theme()->customizer->get_value( 'top_panel_social_links_visible' );
	$menu_visible 		= gutenix_theme()->customizer->get_value( 'top_panel_menu_visible' );

	$conditions = apply_filters( 'gutenix_top_panel_visible_conditions', array( $message, $social_visible, $menu_visible ), $message, $social_visible, $menu_visible );

	foreach ( $conditions as $condition ) {

		if ( ! empty( $condition ) ) {
			$is_visible = true;
		}
	}

	return $is_visible;
}

/**
 * Get breakpoint when mobile panel visible.
 *
 * @since  1.0.0
 * @return string
 */
function gutenix_get_mobile_panel_breakpoint() {
	$breakpoint      = gutenix_theme()->customizer->get_value( 'header_mobile_panel_breakpoint' );
	$header_layout   = gutenix_theme()->customizer->get_value( 'header_layout_type' );
	$exclude_layouts = Gutenix_Utils::get_header_hamburger_panel_layouts();

	if ( in_array( $header_layout, $exclude_layouts ) ) {
		return '';
	}

	return $breakpoint;
}

/**
 * Parse CSS
 */
if ( ! function_exists( 'gutenix_parse_css' ) ) {

	function gutenix_parse_css( $css_output = array(), $min_media = '', $max_media = '' ) {

		$parse_css = '';
		if ( is_array( $css_output ) && count( $css_output ) > 0 ) {

			foreach ( $css_output as $selector => $properties ) {

				if ( null === $properties ) {
					break;
				}

				if ( ! count( $properties ) ) {
					continue; }

				$temp_parse_css   = $selector . '{';
				$properties_added = 0;

				foreach ( $properties as $property => $value ) {

					if ( '' === $value ) {
						continue; }

					$properties_added++;
					$temp_parse_css .= $property . ':' . $value . 'px;';
				}

				$temp_parse_css .= '}';

				if ( $properties_added > 0 ) {
					$parse_css .= $temp_parse_css;
				}
			}

			if ( '' != $parse_css && ( '' !== $min_media || '' !== $max_media ) ) {

				$media_css       = '@media ';
				$min_media_css   = '';
				$max_media_css   = '';
				$media_separator = '';

				if ( '' !== $min_media ) {
					$min_media_css = '(min-width:' . $min_media . 'px)';
				}
				if ( '' !== $max_media ) {
					$max_media_css = '(max-width:' . $max_media . 'px)';
				}
				if ( '' !== $min_media && '' !== $max_media ) {
					$media_separator = ' and ';
				}

				$media_css .= $min_media_css . $media_separator . $max_media_css . '{' . $parse_css . '}';

				return $media_css;
			}
		}

		return $parse_css;
	}
}

/**
 * Dynamic Sidebar Generator
 *
 * @since 1.0.0
 */
if ( ! function_exists( 'gutenix_generate_slug' ) ) {

	function gutenix_generate_slug($phrase, $maxLength) {
	    
	    $result = strtolower($phrase);
	    $result = preg_replace("/[^a-z0-9\s-]/", "", $result);
	    $result = trim(preg_replace("/[\s-]+/", " ", $result));
	    $result = trim(substr($result, 0, $maxLength));
	    $result = preg_replace("/\s/", "-", $result);
	    
	    return $result;

	}

}

/**
 * Returns 404 page template content
 *
 * @since 1.0.0
 */
if ( ! function_exists( 'gutenix_404page_template_content' ) ) {

	function gutenix_404page_template_content() {

		$content = gutenix_theme()->customizer->get_value( 'page404_template' );

		if ( ! empty( $content ) ) {

			$template = get_post( $content );

			if ( $template && ! is_wp_error( $template ) ) {
				$content = $template->post_content;
			}

		}

		return apply_filters( 'gutenix_set_404page_template_content', $content );

	}

}

/**
 * Returns Header Custom Template
 *
 * @since 1.0.0
 */
if ( ! function_exists( 'gutenix_header_custom_template' ) ) {

	function gutenix_header_custom_template( $content = '' ) {

		if ( ! empty( $content ) ) {

			$template = get_post( $content );

			if ( $template && ! is_wp_error( $template ) ) {
				$content = $template->post_content;
			}

		}

		return apply_filters( 'gutenix_set_header_custom_template', $content );

	}

}