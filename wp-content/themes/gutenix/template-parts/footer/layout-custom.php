<?php
/**
 * The template for displaying the Custom Footer layout.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Gutenix
 */

//	Custom header Template
$get_id 		= gutenix_theme()->customizer->get_value( 'footer_custom_template' );
$get_content 	= gutenix_header_custom_template( $get_id );
?>

<div <?php gutenix_footer_bar_class(); ?>>
	<div <?php gutenix_container_class_by_setting( 'footer_container_type' ); ?>>
		
		<?php if ( ! empty( $get_id ) ) {
			echo do_shortcode( $get_content );
		} ?>

	</div>
</div>
