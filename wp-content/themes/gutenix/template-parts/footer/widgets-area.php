<?php
/**
 * Template part for displaying footer widgets area
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Gutenix
 */

$gutenix_visible = gutenix_theme()->customizer->get_value( 'footer_widgets_visible' );

// Check footer-area visibility.
if ( ! $gutenix_visible && ! is_customize_preview() ) {
	return;
}

$gutenix_wrap_attr 	= ! $gutenix_visible ? 'hidden="hidden"' : '';

$gutenix_area_id 	= 'footer-area';
$gutenix_classes 	= array( $gutenix_area_id, 'widget-area' );
$gutenix_classes 	= apply_filters( 'gutenix_widget_area_classes', $gutenix_classes, $gutenix_area_id );

if ( is_array( $gutenix_classes ) ) {
	$gutenix_classes = 'class="' . join( ' ', $gutenix_classes ) . '"';
}

?>

<div class="footer-area-wrapper" <?php echo esc_html( $gutenix_wrap_attr ); ?>>
	<div <?php gutenix_container_class_by_setting( 'footer_widgets_container_type' ); ?>>
		
		<?php printf( '<div id="%1$s" %2$s>', wp_kses_post( wp_unslash( $gutenix_area_id ) ), wp_kses_post( wp_unslash( $gutenix_classes ) ) );

			if ( class_exists( 'Gutenix_Pro' ) ) {
				
				$i = 1;
				$count = gutenix_theme()->customizer->get_value( 'footer_widget_areas_count', '4' );

				foreach ( range( 1, $count ) as $g ) {
					
					printf( '<div id="%1$s" class="%2$s">', wp_kses_post( wp_unslash( 'footer-widget-area-' . esc_attr( $i ) ) ), wp_kses_post( wp_unslash( apply_filters( 'gutenix_footer_area_classes', '' ) ) ) );	
						
						if ( is_active_sidebar( 'footer-widget-area-' . $i ) ) {
							dynamic_sidebar( 'footer-widget-area-' . $i );
						}

					printf( '</div>' );
				
					$i++;
				}
			} else {

				if ( is_active_sidebar( $gutenix_area_id ) ) {
					dynamic_sidebar( $gutenix_area_id );
				}

			}

		printf( '</div>' ); ?>
	




		
		<?php

			


			
				
				printf( '<div id="%1$s" %2$s>', wp_kses_post( wp_unslash( $gutenix_area_id ) ), wp_kses_post( wp_unslash( $gutenix_classes ) ) );
					


				printf( '</div>' );

			?>

	</div>
</div>