<?php
/**
 * Post single content
 *
 * @package Gutenix
 */
?>

	<?php do_action( 'gutenix_before_single_post_content' ); ?>

	<div class="entry-content">
		<?php
		the_content();

		gutenix_post_edit_link();
		
		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'gutenix' ),
			'after'  => '</div>',
		) );
		?>
	</div><!-- .entry-content -->

	<?php do_action( 'gutenix_after_single_post_content' ); ?>