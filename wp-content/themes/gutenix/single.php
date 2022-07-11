<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Gutenix
 */

get_header();

	do_action( 'gutenix_content_start', 'single' );

	gutenix_theme()->do_location( 'single', 'template-parts/single' );

	do_action( 'gutenix_content_end', 'single' );

get_footer();
