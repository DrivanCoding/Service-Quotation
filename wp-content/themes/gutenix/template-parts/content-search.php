<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Gutenix
 */

?>

<?php do_action( 'gutenix_before_loop_post' ); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
	<?php
	gutenix_post_thumbnail(
		array(
			'size' => 'gutenix-thumb-s',
			'link' => true,
		)
	);

	echo '<div class="search-entry-content">';

		echo '<header class="entry-header">';
			the_title( '<h2 class="entry-title h4-style"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		echo '</header><!-- .entry-header -->';

		if ( 'post' === get_post_type() ) :
		gutenix_entry_meta(
			array(
				'divider' => '<span class="meta-divider">&#8226;</span>',
			),
			array(
				'gutenix_post_cats'     => array(),
				'gutenix_posted_by'     => array(),
				'gutenix_posted_on'     => array(),
				'gutenix_post_comments' => array(),
			)
		);
		endif;

		gutenix_post_excerpt();

	echo '</div>';
	?>

</article><!-- #post-<?php the_ID(); ?> -->

<?php do_action( 'gutenix_after_loop_post' ); ?>