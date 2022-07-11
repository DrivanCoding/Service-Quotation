<?php
/**
 * Menus configuration.
 *
 * @package Gutenix
 */

return apply_filters( 'gutenix_register_menus', array(
	'main' 		=> esc_html__( 'Main', 'gutenix' ),
	'footer' 	=> esc_html__( 'Footer', 'gutenix' ),
	'social' 	=> esc_html__( 'Social', 'gutenix' ),
	'top_panel' => esc_html__( 'Top Panel', 'gutenix' ),
) );
