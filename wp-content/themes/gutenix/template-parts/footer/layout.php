<?php
/**
 * The template for displaying the default footer layout.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Gutenix
 */
?>

<div <?php gutenix_footer_bar_class(); ?>>
	<div <?php gutenix_container_class_by_setting( 'footer_container_type' ); ?>>
		<div class="site-info">
			<?php gutenix_footer_logo(); ?>

			<div class="site-info__holder">
				<?php gutenix_footer_menu(); ?>
				<?php gutenix_footer_copyright(); ?>
			</div>

			<?php gutenix_social_list( 'footer' ); ?>
		</div>
	</div>
</div>
