<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Gutenix
 */

get_header();

	do_action( 'gutenix_content_start', 'index' );

	gutenix_theme()->do_location( 'archive', 'template-parts/archive' );

	do_action( 'gutenix_content_end', 'index' );

get_footer();
