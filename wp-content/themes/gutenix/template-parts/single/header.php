<?php
/**
 * Displays the Single Post Header
 *
 * @package Gutenix
 */
?>

	<header class="entry-header"><?php
		if ( 'post' === get_post_type() ) :
		gutenix_post_cats( array(
			'delimiter' => ' ',
			'before'    => '<div class="cat-links cat-links--primary">',
			'after'     => '</div>',
		) );
		endif;

		the_title( '<h1 class="entry-title h2-style">', '</h1>' );
	?></header><!-- .entry-header -->
