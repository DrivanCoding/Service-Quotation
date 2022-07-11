<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Gutenix
 */
?>

<div <?php gutenix_content_container_class( array( 'site-content__container' ) ); ?>>
	<div class="gutenix-row">

		<?php do_action( 'gutenix_before_primary_area', 'single' ); ?>

		<div id="primary" <?php gutenix_primary_content_class( array( 'content-area' ) ); ?>>

			<?php do_action( 'gutenix_before_site_main_area', 'single' ); ?>

			<main id="main" class="site-main"><?php

				gutenix_theme()->do_location( 'single', 'template-parts/single-loop' );

			?></main><!-- #main -->

			<?php do_action( 'gutenix_after_site_main_area', 'single' ); ?>

		</div><!-- #primary -->

		<?php do_action( 'gutenix_after_primary_area', 'single' ); ?>

		<?php get_sidebar(); ?>

	</div>
</div>
