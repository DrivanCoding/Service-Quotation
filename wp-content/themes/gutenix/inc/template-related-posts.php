<?php
/**
 * Related Posts Template Functions.
 *
 * @package Gutenix
 */

if ( ! function_exists( 'gutenix_related_posts' ) ) :
	/**
	 * Print HTML with related posts block.
	 *
	 * @since  1.0.0
	 * @return void
	 */
	function gutenix_related_posts() {

		if ( ! is_singular( 'post' ) ) {
			return;
		}

		if ( is_customize_preview() && ! Gutenix_Utils::is_render_partials() ) {
			echo '<div class="related-posts-customize-partial">';
		}

		$related_posts = gutenix_get_related_posts();

		if ( ! empty( $related_posts ) ) {
			do_action( 'gutenix_before_related_posts' );

			Gutenix_Utils::output_method( $related_posts, true );

			do_action( 'gutenix_after_related_posts' );
		} elseif ( is_customize_preview() ) {
			echo '<div class="customize-partial-placeholder">' . esc_html__( 'Related Posts Block Placeholder', 'gutenix' ) . '</div>';
		}

		if ( is_customize_preview() && ! Gutenix_Utils::is_render_partials() ) {
			echo '</div>';
		}
	}
endif;

if ( ! function_exists( 'gutenix_get_related_posts' ) ) :
	/**
	 * Get HTML with related posts block.
	 *
	 * @since  1.0.0
	 * @return string|bool
	 */
	function gutenix_get_related_posts() {
		$visible = gutenix_theme()->customizer->get_value( 'related_posts_visible' );

		if ( false === $visible ) {
			return false;
		}

		// Get post id
		global $post;

		$post_id 			= $post->ID;
		$related_posts  	= get_post( $post_id );
		$terms 				= get_the_terms( $related_posts, 'post_tag' );

		if ( ! $terms ) {
			return false;
		}

		$post_number = gutenix_theme()->customizer->get_value( 'related_posts_count' );
		$post_terms  = wp_list_pluck( $terms, 'term_id' );

		$post_args = array(
			'post_type'    => 'post',
			'posts_per_page' => 2,
			'tag__in'      => $post_terms,
			'numberposts'  => ( int ) $post_number,
			'post__not_in' => array( $post_id ),
		);

		$posts = get_posts( $post_args );

		if ( ! $posts ) {
			return false;
		}

		$settings = array(
			'block_title'      => 'related_posts_block_title',
			'layout_columns'   => 'related_posts_grid',
			'image_visible'    => 'related_posts_image',
			'author_visible'   => 'related_posts_author',
			'date_visible'     => 'related_posts_publish_date',
			'cats_visible'     => 'related_posts_categories',
			'tags_visible'     => 'related_posts_tags',
			'comments_visible' => 'related_posts_comments',
			'excerpt_visible'  => 'related_posts_excerpt',
			'excerpt_length'   => 'related_posts_excerpt_words_count',
		);

		foreach ( $settings as $setting_key => $setting_value ) {
			$settings[ $setting_key ] = gutenix_theme()->customizer->get_value( $setting_value );
		}

		$block_title_format = apply_filters( 'gutenix_related_posts_block_title_format', '<h3 class="related-posts__title">%s</h3>' );
		$block_title        = ! empty( $settings['block_title'] ) ? sprintf( $block_title_format, $settings['block_title'] ) : '';

		$settings['grid_count'] = ( int ) 12 / $settings['layout_columns'];
		$grid_classes           = 'gutenix-col-xs-12 gutenix-col-md-6 gutenix-col-xl-' . $settings['grid_count'];

		ob_start();

		$my_query = new WP_Query( $post_args );

		if( $my_query->have_posts() ) {
				
			while ( $my_query->have_posts() ) :

				$my_query->the_post();

				?>
					<div class="related-post <?php echo esc_attr( $grid_classes ); ?>"><?php

						gutenix_post_thumbnail( array(
							'size'    => 'post-thumbnail',
							'link'    => true,
							'visible' => $settings['image_visible'],
						) );
						?>

						<header class="entry-header"><?php
							the_title( '<h4 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h4>' );
						?></header><!-- .entry-header -->

						<?php
						gutenix_entry_meta(
							array(
								'divider' => '<span class="meta-divider">&#8226;</span>',
							),
							array(
								'gutenix_post_cats' => array(
									'visible' => $settings['cats_visible'],
								),
								'gutenix_posted_by' => array(
									'visible' => $settings['author_visible'],
								),
								'gutenix_posted_on' => array(
									'visible' => $settings['date_visible'],
								),
								'gutenix_post_comments' => array(
									'visible' => $settings['comments_visible'],
								),
							)
						);

						gutenix_post_excerpt( array(
							'visible' => $settings['excerpt_visible'],
							'length'  => $settings['excerpt_length'],
						) );

						gutenix_entry_meta(
							array(
								'before' => '<footer class="entry-footer">',
								'after'  => '</footer><!-- .entry-footer -->',
							),
							array(
								'gutenix_post_tags' => array(
									'visible' => $settings['tags_visible'],
								),
							)
						);
						?>
					</div>
				
			<?php endwhile;

		}

		wp_reset_postdata();

		$related_items = ob_get_clean();

		$related_posts_format = apply_filters( 'gutenix_related_posts_format', '<div class="related-posts">%1$s<div class="gutenix-row">%2$s</div></div>' );

		return sprintf( $related_posts_format, $block_title, $related_items );
	}
endif;
