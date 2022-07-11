<?php
/**
 * Template part for posts navigation.
 *
 * @package Gutenix
 */

$navigation_type = gutenix_theme()->customizer->get_value( 'blog_navigation_type' );
$prev_icon       = ! is_rtl() ? 'arrow-left' : 'arrow-right';
$next_icon       = ! is_rtl() ? 'arrow-right' : 'arrow-left';

do_action( 'gutenix_before_posts_navigation' );

switch ( $navigation_type ) {
	case 'navigation':

		the_posts_navigation(
			apply_filters( 'gutenix_the_posts_navigation_args',
				array(
					'prev_text' => sprintf( '%2$s%1$s',
						esc_html__( 'Older Posts', 'gutenix' ),
						gutenix_get_icon_svg( $prev_icon, array( 'nav-icon', 'nav-prev-icon' ) )
					),
					'next_text' => sprintf( '%1$s%2$s',
						esc_html__( 'Newer Posts', 'gutenix' ),
						gutenix_get_icon_svg( $next_icon,  array( 'nav-icon', 'nav-next-icon' ) )
					),
				)
			)
		);
		break;

	case 'pagination':

		the_posts_pagination(
			apply_filters( 'gutenix_the_posts_pagination_args',
				array(
					'prev_text' => sprintf( '%2$s%1$s',
						esc_html__( 'Prev Page', 'gutenix' ),
						gutenix_get_icon_svg( $prev_icon, array( 'nav-icon', 'nav-prev-icon' ) )
					),
					'next_text' => sprintf( '%1$s%2$s',
						esc_html__( 'Next Page', 'gutenix' ),
						gutenix_get_icon_svg( $next_icon,  array( 'nav-icon', 'nav-next-icon' ) )
					),
				)
			)
		);
		break;
}

do_action( 'gutenix_after_posts_navigation' );
