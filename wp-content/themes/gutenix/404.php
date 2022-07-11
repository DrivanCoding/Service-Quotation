<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Gutenix
 */

get_header();

	do_action( 'gutenix_content_start', '404' );

	gutenix_theme()->do_location( 'single', 'template-parts/404' );

	do_action( 'gutenix_content_end', '404' );

get_footer();
