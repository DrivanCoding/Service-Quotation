<?php
/*
 *	Template Name: Full width
 */

get_header(); ?>

	<?php do_action( 'gutenix_before_primary_area', 'archive' ); ?>

	<div id="primary" class="content-area">
		
		<?php do_action( 'gutenix_before_site_main_area', 'archive' ); ?>

			<main id="main" class="site-main">
				<div class="entry-content">
					
					<?php while ( have_posts() ) : the_post(); ?>
						
						<?php the_content(); ?>
					
					<?php endwhile; ?>

				</div><!-- .entry-content -->
			</main><!-- #main -->

		<?php do_action( 'gutenix_after_site_main_area', 'archive' ); ?>
		
	</div><!-- #primary -->

	<?php do_action( 'gutenix_after_primary_area', 'archive' ); ?>

	<?php get_sidebar(); ?>

<?php get_footer(); ?>