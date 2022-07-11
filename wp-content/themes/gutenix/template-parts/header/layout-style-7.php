<?php
/**
 * The template for displaying the style-7 header layout.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Gutenix
 */

$header_logo_position 			= gutenix_theme()->customizer->get_value( 'header_logo_position' );
$header_menu_btn_position 		= gutenix_theme()->customizer->get_value( 'header_menu_btn_position' );
$visible_header_search 			= gutenix_theme()->customizer->get_value( 'header_search_visible' );
$visible_header_wc_cart 		= gutenix_theme()->customizer->get_value( 'woo_header_cart_icon' );
?>

<div <?php gutenix_header_bar_class(); ?>>
	<div <?php gutenix_container_class_by_setting( 'header_container_type' ); ?>>
		<div class="header-bar__inner">
			<div class="header-bar__row">
				
				<?php if( 'right' != $header_menu_btn_position ) :
					gutenix_main_menu_toggle();
				endif; ?>

				<?php if( 'left' != $header_menu_btn_position && 'left' != $header_logo_position ) :
					echo '<div class="gutenix-header__left_part">';
					echo '</div>';
				endif; ?>

				<?php gutenix_site_branding(); ?>
				
				<div class="gutenix-header__right_part">

					<?php gutenix_header_logged_in(); ?>

					<?php gutenix_social_list( 'header' ); ?>

					<?php if ( $visible_header_search || $visible_header_wc_cart ) : ?>
						<div class="header-toggles">
							
							<?php if ( $visible_header_search ) :
								gutenix_header_search_toggle();
							endif; ?>

							<?php if ( $visible_header_wc_cart ) :
								do_action( 'gutenix_header_wc_cart' );
							endif; ?>

						</div>
					<?php endif; ?>

					<?php gutenix_header_buttons(); ?>

					<?php if( 'left' != $header_menu_btn_position ) :
						gutenix_main_menu_toggle();
					endif; ?>

				</div>
			</div>
		</div>
	</div>
	<div class="header-bar__overlay">
		<div class="header-bar__sidebar">
			<button class="menu-toggle-close btn-initial"><?php echo gutenix_get_icon_svg( 'close' ); ?></button>
			<?php gutenix_main_menu( 'vertical' ); ?>
		</div>
	</div>
	<?php gutenix_header_search_popup(); ?>
</div>