<?php
/**
 * The template for displaying the top panel in header.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Gutenix
 */

$gutenix_visible = gutenix_is_top_panel_visible();

// Don't show top panel if all elements are disabled.
if ( ! $gutenix_visible && ! is_customize_preview() ) {
	return;
}

$social_links_visible 		= gutenix_theme()->customizer->get_value( 'top_panel_social_links_visible' );
$top_panel_menu_visible 	= gutenix_theme()->customizer->get_value( 'top_panel_menu_visible' );

$classes = 'top-panel__inner ';
$classes .= $social_links_visible ? 'has_social_list ' : 'no_social_list ';
$classes .= $top_panel_menu_visible ? 'has_top_menu ' : 'no_top_menu ';
?>

<div <?php gutenix_top_panel_class(); ?>>
	<div <?php gutenix_container_class_by_setting( 'top_panel_container_type' ); ?>>
		<div class="<?php echo esc_attr( $classes ); ?>">
			<?php gutenix_top_panel_menu(); ?>
			<?php gutenix_top_message(); ?>
			<?php gutenix_social_list( 'top-panel' ); ?>
		</div>
	</div>
</div>
