<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Gutenix
 */

if ( ! gutenix_has_sidebar() || ! is_active_sidebar( 'sidebar' ) ) {
	return;
}

$gutenix_area_id 	= 'sidebar';

$page_sidebar_id 	= gutenix_theme()->customizer->get_value( 'get_page_sidebar' );
if( is_page() && !empty( $page_sidebar_id ) ) {
	$gutenix_area_id = $page_sidebar_id;
}

$gutenix_classes 	= array( $gutenix_area_id, 'widget-area' );
$gutenix_classes 	= apply_filters( 'gutenix_widget_area_classes', $gutenix_classes, 'sidebar' );

if ( is_array( $gutenix_classes ) ) {
	$gutenix_classes = 'class="' . join( ' ', $gutenix_classes ) . '"';
}

printf( '<div id="sidebar" %1$s>', wp_kses_post( wp_unslash( $gutenix_classes ) ) );

	dynamic_sidebar( $gutenix_area_id );

printf( '</div>' );
