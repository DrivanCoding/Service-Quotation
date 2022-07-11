<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Gutenix
 */

if ( ! gutenix_has_sidebar() || ! is_active_sidebar( 'sidebar-shop' ) ) {
	return;
}

$gutenix_area_id 	= 'sidebar-shop';
$gutenix_classes 	= array( $gutenix_area_id, 'widget-area' );
$gutenix_classes 	= apply_filters( 'gutenix_widget_area_classes', $gutenix_classes, $gutenix_area_id );

if ( is_array( $gutenix_classes ) ) {
	$gutenix_classes = 'class="' . join( ' ', $gutenix_classes ) . '"';
}

printf( '<div id="%1$s" %2$s>', wp_kses_post( wp_unslash( $gutenix_area_id ) ), wp_kses_post( wp_unslash( $gutenix_classes ) ) );

	dynamic_sidebar( $gutenix_area_id );

printf( '</div>' );
