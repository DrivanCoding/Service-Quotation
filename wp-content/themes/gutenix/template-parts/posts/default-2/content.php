<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Gutenix
 */
?>

<?php do_action( 'gutenix_before_loop_post' ); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php
	$blog_listing2_thumb_width 	= gutenix_theme()->customizer->get_value( 'blog_listing2_thumb_width' );
	$thumbnail_size 			= ( ! empty( $blog_listing2_thumb_width ) && '44' != $blog_listing2_thumb_width ) ? 'full' : 'gutenix-thumb-s';

	gutenix_post_thumbnail(
		array(
			'size' => $thumbnail_size,
			'link' => true,
		)
	);
	?>

	<div class="post-content-wrapper">
		<header class="entry-header"><?php
			the_title( '<h2 class="entry-title h4-style">' . gutenix_get_sticky_label() . '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		?></header><!-- .entry-header -->

		<?php
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

		gutenix_entry_meta(
			array(
				'before' => '<footer class="entry-footer">',
				'after'  => '</footer><!-- .entry-footer -->',
			),
			array(
				'gutenix_post_tags'   => array(),
				'gutenix_post_button' => array(),
			)
		);
		?>
	</div>
</article><!-- #post-<?php the_ID(); ?> -->

<?php do_action( 'gutenix_after_loop_post' ); ?>
