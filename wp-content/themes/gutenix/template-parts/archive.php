<?php
/**
* Template part for displaying archive pages
*
* @link https://developer.wordpress.org/themes/basics/template-hierarchy/
*
* @package Gutenix
*/
?>

<div <?php gutenix_content_container_class( array( 'site-content__container' ) ); ?>>
	<div class="gutenix-row">

		<?php do_action( 'gutenix_before_primary_area', 'archive' ); ?>

		<div id="primary" <?php gutenix_primary_content_class( array( 'content-area' ) ); ?>>

			<?php do_action( 'gutenix_before_site_main_area', 'archive' ); ?>

			<main id="main" class="site-main"><?php

				if ( have_posts() ) :

					get_template_part( 'template-parts/posts-loop' );

				else :

					get_template_part( 'template-parts/content', 'none' );

				endif;

				?></main><!-- #main -->

			<?php do_action( 'gutenix_after_site_main_area', 'archive' ); ?>

		</div><!-- #primary -->

		<?php do_action( 'gutenix_after_primary_area', 'archive' ); ?>

		<?php get_sidebar(); ?>

	</div>
</div>
