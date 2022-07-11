<?php
/**
 * The template for displaying the style-4 header layout.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Gutenix
 */

$visible_header_search 			= gutenix_theme()->customizer->get_value( 'header_search_visible' );
$visible_header_wc_cart 		= gutenix_theme()->customizer->get_value( 'woo_header_cart_icon' );
$gutenix_mobile_breakpoint      = gutenix_get_mobile_panel_breakpoint();
?>

<div <?php gutenix_header_bar_class(); ?>>
	<div <?php gutenix_container_class_by_setting( 'header_container_type' ); ?>>
		<div class="header-bar__inner">
			<div class="header-bar__row">
				<?php gutenix_site_branding(); ?>
				
				<?php gutenix_header_buttons(); ?>
			</div>

			<div class="header-bar__row">
				<?php gutenix_main_menu(); ?>

				<?php if ( $visible_header_search || $visible_header_wc_cart ) : ?>
					<div class="header-toggles">
						
						<?php if ( $visible_header_search ) :
							gutenix_header_search_toggle();
							gutenix_header_search_popup();
						endif; ?>

						<?php if ( $visible_header_wc_cart ) :
							do_action( 'gutenix_header_wc_cart' );
						endif; ?>

					</div>
				<?php endif; ?>

				<?php gutenix_header_logged_in(); ?>

				<?php gutenix_social_list( 'header' ); ?>

				<?php if ( $gutenix_mobile_breakpoint ) :
					gutenix_main_menu_toggle();
				endif; ?>
			</div>
		</div>
	</div>

	<?php if ( $gutenix_mobile_breakpoint ) : ?>
		<div class="header-bar__overlay">
			<div class="header-bar__sidebar">
				<button class="menu-toggle-close btn-initial"><svg class="svg-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16"><path d="M15.6607 0.339286C15.4345 0.113095 15.1667 0 14.8571 0C14.5476 0 14.2798 0.113095 14.0536 0.339286L8 6.39286L1.94643 0.339286C1.72024 0.113095 1.45238 0 1.14286 0C0.833333 0 0.565476 0.113095 0.339286 0.339286C0.113095 0.565476 0 0.833333 0 1.14286C0 1.45238 0.113095 1.72024 0.339286 1.94643L6.39286 8L0.339286 14.0536C0.113095 14.2798 0 14.5476 0 14.8571C0 15.1667 0.113095 15.4345 0.339286 15.6607C0.446429 15.7798 0.571429 15.869 0.714286 15.9286C0.857143 15.9762 1 16 1.14286 16C1.28571 16 1.42857 15.9762 1.57143 15.9286C1.71429 15.869 1.83929 15.7798 1.94643 15.6607L8 9.60714L14.0536 15.6607C14.1607 15.7798 14.2857 15.869 14.4286 15.9286C14.5714 15.9762 14.7143 16 14.8571 16C15 16 15.1429 15.9762 15.2857 15.9286C15.4286 15.869 15.5536 15.7798 15.6607 15.6607C15.8869 15.4345 16 15.1667 16 14.8571C16 14.5476 15.8869 14.2798 15.6607 14.0536L9.60714 8L15.6607 1.94643C15.8869 1.72024 16 1.45238 16 1.14286C16 0.833333 15.8869 0.565476 15.6607 0.339286Z"/></svg></button>
			</div>
		</div>
	<?php endif; ?>

	<?php gutenix_set_header_image(); ?>
</div>