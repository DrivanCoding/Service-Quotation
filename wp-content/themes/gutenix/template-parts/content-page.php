<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Gutenix
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 '. gutenix_get_page_title_class( array( 'h2-style' ) ) . '>', '</h1>' ); ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
		the_content();

		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'gutenix' ),
			'after'  => '</div>',
		) );
		?>
	</div><!-- .entry-content -->

	<?php
	gutenix_entry_meta(
		array(
			'before' => '<footer class="entry-footer">',
			'after'  => '</footer><!-- .entry-footer -->',
		),
		array(
			'gutenix_post_edit_link' => array(),
		)
	);
	?>
</article><!-- #post-<?php the_ID(); ?> -->
