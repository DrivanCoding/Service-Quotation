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
	<div class="posts-list__item-content">
		<div class="post-content-wrapper">
			
			<?php
				
				// Get elements
				$elements = apply_filters( 'gutenix_posts_list_order', array( 'title', 'meta', 'featured_image', 'excerpt', 'entry_footer' ) );

				// Loop through elements
				foreach ( $elements as $element ) {

					// Featured Image
					if ( 'featured_image' == $element ) {

						$grid_columns = apply_filters( 'gutenix_posts_grid_columns', '2' );

						$size = $grid_columns ? 'gutenix-thumb-masonry-2col' : 'gutenix-thumb-masonry';

						gutenix_post_thumbnail(
							array(
								'size' => $size,
								'link' => true,
							)
						);

					}
					
					// Title
					if ( 'title' == $element ) { ?>

						<header class="entry-header"><?php
							the_title( '<h2 class="entry-title h4-style">' . gutenix_get_sticky_label() . '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
						?></header><!-- .entry-header -->

					<?php }


					// Meta
					if ( 'meta' == $element ) {

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

					}

					// Content
					if ( 'excerpt' == $element ) {

						gutenix_post_excerpt();

					}

					// Read more button
					if ( 'entry_footer' == $element ) {

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

					}
				}
			?>
		</div>
	</div>
</article><!-- #post-<?php the_ID(); ?> -->

<?php do_action( 'gutenix_after_loop_post' ); ?>
