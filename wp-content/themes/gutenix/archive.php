<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Gutenix
 */

get_header();

	do_action( 'gutenix_content_start', 'archive' );

	gutenix_theme()->do_location( 'archive', 'template-parts/archive' );

	do_action( 'gutenix_content_end', 'archive' );

get_footer();
