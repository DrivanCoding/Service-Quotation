<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Gutenix
 */

?>

<section class="no-results not-found">

	<?php do_action( 'gutenix_no_results_start' ); ?>

	<header class="page-header">
		<h1 class="page-title h3-style"><?php esc_html_e( 'Nothing Found', 'gutenix' ); ?></h1>
	</header><!-- .page-header -->

	<div class="page-content">
		<?php
		if ( is_home() && current_user_can( 'publish_posts' ) ) :
			?>

			<p>
				<?php esc_html_e( 'Ready to publish your first post?', 'gutenix' ); ?>
				<?php echo '<a href="' . esc_url( admin_url( 'post-new.php' ) ) . '">' . esc_html_e( 'Get started here', 'gutenix' ) . '</a>.'; ?>
			</p>
		
		<?php
		elseif ( is_search() ) :
			?>

			<p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'gutenix' ); ?></p>
			<?php
			get_search_form();

		else :
			?>

			<p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'gutenix' ); ?></p>
			<?php
			get_search_form();

		endif;
		?>
	</div><!-- .page-content -->

	<?php do_action( 'gutenix_no_results_end' ); ?>
</section><!-- .no-results -->
