<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Gutenix
 */

get_header();
?>
	<?php do_action( 'gutenix_content_start', 'page' ); ?>

	<div <?php gutenix_content_container_class( array( 'site-content__container' ) ); ?>>
		<div class="gutenix-row">

			<?php do_action( 'gutenix_before_primary_area', 'page' ); ?>

			<div id="primary" <?php gutenix_primary_content_class( array( 'content-area' ) ); ?>>

				<?php do_action( 'gutenix_before_site_main_area', 'page' ); ?>

				<main id="main" class="site-main"><?php

					while ( have_posts() ) :
						the_post();

						get_template_part( 'template-parts/content', 'page' );

						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;

					endwhile; // End of the loop.

				?></main><!-- #main -->

				<?php do_action( 'gutenix_after_site_main_area', 'page' ); ?>

			</div><!-- #primary -->

			<?php do_action( 'gutenix_after_primary_area', 'page' ); ?>

			<?php get_sidebar(); ?>

		</div>
	</div>

	<?php do_action( 'gutenix_content_end', 'page' ); ?>

<?php
get_footer();
