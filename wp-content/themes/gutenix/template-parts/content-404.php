<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Gutenix
 */
?>

<section class="error-404 not-found">
		
	<?php do_action( 'gutenix_error_404_start' ); ?>

	<header class="page-header">
		<h1 class="page-title h3-style"><?php esc_html_e( 'This Page Doesn&rsquo;t Seem to Exist', 'gutenix' ); ?></h1>
	</header><!-- .page-header -->

	<div class="page-content">
		<p><?php esc_html_e( 'It looks like the link pointing here was faulty. Maybe try searching?', 'gutenix' ); ?></p>
		<?php get_search_form(); ?>
	</div><!-- .page-content -->

	<?php do_action( 'gutenix_error_404_end' ); ?>

</section><!-- .error-404 -->
