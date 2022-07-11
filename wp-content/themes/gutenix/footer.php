<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Gutenix
 */

?>

	</div><!-- #content -->

	<?php do_action( 'gutenix_after_content' ); ?>

	<?php do_action( 'gutenix_before_footer' ); ?>

	<footer id="colophon" class="site-footer" role="contentinfo" itemscope="itemscope" itemtype="http://schema.org/WPFooter">
		<?php do_action( 'gutenix_footer' ); ?>
	</footer><!-- #colophon -->

	<?php do_action( 'gutenix_after_footer' ); ?>

</div><!-- #page -->

<?php do_action( 'gutenix_body_end' ); ?>

<?php wp_footer(); ?>

</body>
</html>
