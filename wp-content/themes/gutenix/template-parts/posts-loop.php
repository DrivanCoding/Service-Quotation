<?php
/**
 * Template part for displaying posts list
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Gutenix
 */

do_action( 'gutenix_before_page_header' );

	gutenix_blog_page_title();

do_action( 'gutenix_after_page_header' ); ?>

<?php do_action( 'gutenix_before_posts_list' ); ?>

<div <?php gutenix_posts_list_class(); ?>><?php
	do_action( 'gutenix_before_posts_loop' );

	while ( have_posts() ) : the_post();

		/*
		* Include the Post-Format-specific template for the content.
		* If you want to override this in a child theme, then include a file
		* called content-___.php (where ___ is the Post Format name) and that will be used instead.
		*/
		if ( is_search() ) {
			get_template_part( 'template-parts/content', 'search' );
		} else {
			get_template_part( gutenix_get_post_template_part_slug(), get_post_format() );
		}

	endwhile;

	do_action( 'gutenix_after_posts_loop' );
?></div>

<?php
do_action( 'gutenix_after_posts_list' );

get_template_part( 'template-parts/content-navigation' );
