<?php
/**
 * Template part for single post navigation.
 *
 * @package Gutenix
 */

$gutenix_prev_icon = ! is_rtl() ? 'arrow-left' : 'arrow-right';
$gutenix_next_icon = ! is_rtl() ? 'arrow-right' : 'arrow-left';

do_action( 'gutenix_before_post_navigation' );

the_post_navigation(
	apply_filters( 'gutenix_the_post_navigation_args', array(
		'prev_text' => sprintf( '<span class="nav-text">%3$s%1$s</span><span class="nav-post-title">%2$s</span>',
			esc_html__( 'Previous', 'gutenix' ),
			'%title',
			gutenix_get_icon_svg( $gutenix_prev_icon, array( 'nav-icon', 'nav-prev-icon' ) )
		),
		'next_text' => sprintf( '<span class="nav-text">%1$s%3$s</span><span class="nav-post-title">%2$s</span>',
			esc_html__( 'Next', 'gutenix' ),
			'%title',
			gutenix_get_icon_svg( $gutenix_next_icon,  array( 'nav-icon', 'nav-next-icon' ) )
		),
	) )
);

do_action( 'gutenix_after_post_navigation' );
