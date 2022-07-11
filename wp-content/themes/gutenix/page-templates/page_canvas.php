<?php
/*
 *	Template Name: Canvas
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> itemscope="itemscope" itemtype="http://schema.org/WebPage">
	<?php wp_body_open(); ?>

<?php do_action( 'gutenix_body_start' ); ?>

<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#masthead"><?php esc_html_e( 'Skip to main navigation', 'gutenix' ); ?></a>
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'gutenix' ); ?></a>
	<a class="skip-link screen-reader-text" href="#colophon"><?php esc_html_e( 'Skip to footer', 'gutenix' ); ?></a>

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

</div><!-- #page -->

<?php do_action( 'gutenix_body_end' ); ?>

<?php wp_footer(); ?>

</body>
</html>