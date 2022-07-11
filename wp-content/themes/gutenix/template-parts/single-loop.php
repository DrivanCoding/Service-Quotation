<?php
/**
 * Template part for displaying single post content in single.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Gutenix
 */

while ( have_posts() ) : the_post();

	do_action( 'gutenix_before_single_post' );

	$classes = implode( ' ', get_post_class() );

	echo '<article id="post-' . esc_attr( get_the_ID() ) . '" class="' . esc_attr( $classes ) . '">';

		// Get elements
		$elements = apply_filters( 'gutenix_single_post_order', array( 'title', 'meta', 'thumbmnail', 'content', 'tags', 'share', 'author_bio', 'post_navigation', 'related_posts', 'comments' ) );

		// Loop through elements
		foreach ( $elements as $element ) {

			// Title
			if ( 'title' == $element ) {

				get_template_part( 'template-parts/single/header' );

			}

			// Meta
			if ( 'meta' == $element ) {

				get_template_part( 'template-parts/single/meta' );

			}

			// Thumbmnail
			if ( 'thumbmnail' == $element ) {

				gutenix_post_thumbnail( array( 'size' => gutenix_has_sidebar() ? 'gutenix-thumb-post' : 'full', ) );

			}

			// Content
			if ( 'content' == $element ) {

				get_template_part( 'template-parts/single/content' );

			}

			// Tags
			if ( 'tags' == $element ) {

				get_template_part( 'template-parts/single/tags' );

			}

			// Share Icons
			if ( 'share' == $element ) {

				gutenix_share_buttons();

			}

			// Author Bio
			if ( 'author_bio' == $element ) {

				gutenix_post_author_bio();

			}

			// Post Navigation
			if ( 'post_navigation' == $element ) {

				get_template_part( 'template-parts/single/post-navigation' );

			}

			// Related Posts
			if ( 'related_posts' == $element ) {

				gutenix_related_posts();

			}

			// Сomments
			if ( 'comments' == $element ) {

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			}

		}

	echo '</article>';

	do_action( 'gutenix_after_single_post' );

endwhile; // End of the loop.
