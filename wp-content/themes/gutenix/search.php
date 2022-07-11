<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Gutenix
 */

get_header();

	do_action( 'gutenix_content_start', 'search' );

	gutenix_theme()->do_location( 'archive', 'template-parts/archive' );

	do_action( 'gutenix_content_end', 'search' );

get_footer();
