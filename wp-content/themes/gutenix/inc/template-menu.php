<?php
/**
 * Functions for display menus on the site.
 *
 * @package Gutenix
 */

/**
 * Show main menu.
 *
 * @since  1.0.0
 * @param  string $mode Default or vertical.
 * @return void
 */
function gutenix_main_menu( $mode = 'default' ) {
	$hover_style      = gutenix_theme()->customizer->get_value( 'main_menu_hover_style' );
	$animation_line   = gutenix_theme()->customizer->get_value( 'animation_line' );
	$animation_framed = gutenix_theme()->customizer->get_value( 'animation_framed' );

	$classes   = array( 'menu' );
	$classes[] = 'menu--hover-' . esc_attr( $hover_style );

	switch ( $hover_style ) {
		case 'underline':
		case 'overline':
		case 'double-line':
			$classes[] = 'menu--animation-' . esc_attr( $animation_line );
			break;

		case 'framed':
			$classes[] = 'menu--animation-framed-' . esc_attr( $animation_framed );
			break;
	}

	?>
	<nav id="site-navigation" class="main-navigation main-navigation--<?php echo esc_attr( $mode ); ?>" role="navigation">
		<?php
			$args = apply_filters( 'gutenix_main_menu_args', array(
				'theme_location'   => 'main',
				'container'        => '',
				'menu_id'          => 'main-menu',
				'menu_class'       => esc_attr( join( ' ', $classes ) ),
				'fallback_cb'      => 'gutenix_set_nav_menu',
				'fallback_message' => esc_html__( 'Set main menu', 'gutenix' ),
			) );

			wp_nav_menu( $args );
		?>
	</nav><!-- #site-navigation -->
	<?php
}

/**
 * Show main menu toggle.
 *
 * @since  1.0.0
 * @param  bool  $echo Return or print.
 * @return string|bool
 */
function gutenix_main_menu_toggle( $echo = true ) {
	$toggle_html = apply_filters(
		'gutenix_main_menu_toggle_html',
		'<div class="menu-toggle-wrapper"><button class="menu-toggle btn-initial" aria-controls="main-menu" aria-expanded="false"><span class="menu-toggle-box"><span class="menu-toggle-inner"></span></span></button></div>'
	);

	return Gutenix_Utils::output_method( $toggle_html, $echo );
}

/**
 * Show top panel menu.
 *
 * @since  1.0.0
 * @return void
 */
function gutenix_top_panel_menu() {
	$visible = gutenix_theme()->customizer->get_value( 'top_panel_menu_visible' );

	if ( ! $visible ) {
		return;
	}

	?>
	<nav id="top_panel-navigation" class="top-panel-menu" role="navigation">
	<?php
		$args = apply_filters( 'gutenix_footer_menu_args', array(
			'theme_location'   => 'top_panel',
			'container'        => '',
			'menu_id'          => 'top-panel-menu-items',
			'menu_class'       => 'top-panel-menu__items inline-list',
			'depth'            => 1,
			'fallback_cb'      => 'gutenix_set_nav_menu',
			'fallback_message' => esc_html__( 'Set top panel menu', 'gutenix' ),
		) );

		wp_nav_menu( $args );
	?>
	</nav><!-- #top-panel-navigation -->
	<?php
}

/**
 * Show footer menu.
 *
 * @since  1.0.0
 * @return void
 */
function gutenix_footer_menu() {
	$visible = gutenix_theme()->customizer->get_value( 'footer_menu_visible' );

	if ( ! $visible ) {
		return;
	}

	?>
	<nav id="footer-navigation" class="footer-menu" role="navigation">
	<?php
		$args = apply_filters( 'gutenix_footer_menu_args', array(
			'theme_location'   => 'footer',
			'container'        => '',
			'menu_id'          => 'footer-menu-items',
			'menu_class'       => 'footer-menu__items inline-list',
			'depth'            => 1,
			'fallback_cb'      => 'gutenix_set_nav_menu',
			'fallback_message' => esc_html__( 'Set footer menu', 'gutenix' ),
		) );

		wp_nav_menu( $args );
	?>
	</nav><!-- #footer-navigation -->
	<?php
}

/**
 * Show social nav menu.
 *
 * @since  1.0.0
 * @param  string $context Context - 'header', 'top-panel' or 'footer'.
 * @param  string $type    Content type - icon, text or both.
 * @return void
 */
function gutenix_social_list( $context = '', $type = 'icon' ) {

	$visibility_in_top_panel 				= gutenix_theme()->customizer->get_value( 'top_panel_social_links_visible' );
	$visibility_in_header    				= gutenix_theme()->customizer->get_value( 'header_social_links_visible' );
	$header_social_links_type 				= gutenix_theme()->customizer->get_value( 'header_social_links_type' );
	$header_social_links_drop_btn_text 		= gutenix_theme()->customizer->get_value( 'header_social_links_drop_btn_text' );
	$visibility_in_footer    				= gutenix_theme()->customizer->get_value( 'footer_social_links_visible' );

	if ( ! $visibility_in_top_panel && ( 'top-panel' === $context ) ) {
		return;
	}

	if ( ! $visibility_in_header && ( 'header' === $context ) ) {
		return;
	}

	if ( ! $visibility_in_footer && ( 'footer' === $context ) ) {
		return;
	}

	static $instance = 0;
	$instance++;

	$container_class = array( 'social-list' );

	if ( ! empty( $context ) ) {
		$container_class[] = sprintf( 'social-list--%s', sanitize_html_class( $context ) );
	}

	$container_class[] = sprintf( 'social-list--%s', sanitize_html_class( $type ) );

	$drop_btn = '';

	if( $visibility_in_header && 'header' == $context && 'dropdown' == $header_social_links_type ) {
		$drop_btn = ( 'list' != $header_social_links_type && !empty( $header_social_links_drop_btn_text ) ) ? '<a href="javascript:void(0);" class="social-list-dropbtn">' . $header_social_links_drop_btn_text . '</a>' : '';

		$container_class[] = sprintf( 'social-list--%s', sanitize_html_class( $header_social_links_type ) );
	}

	$args = apply_filters( 'gutenix_social_list_args', array(
		'theme_location' 	=> 'social',
		'container' 		=> 'div',
		'container_class' 	=> esc_attr( join( ' ', $container_class ) ),
		'menu_id' 			=> "social-list-{$instance}",
		'menu_class' 		=> 'social-list__items inline-list',
		'depth' 			=> 1,
		'link_before' 		=> ( 'icon' == $type ) ? '<span class="screen-reader-text">' : '',
		'link_after' 		=> ( 'icon' == $type ) ? '</span>' : '',
		'items_wrap' 		=> $drop_btn . '<ul id="%1$s" class="%2$s">%3$s</ul>',
		'fallback_cb' 		=> 'gutenix_set_nav_menu',
		'fallback_message' 	=> esc_html__( 'Set social menu', 'gutenix' ),
	), $context, $type );

	wp_nav_menu( $args );
}

/**
 * Set callback function for nav menu.
 *
 * @param  array $args Nav menu arguments.
 * @return void
 */
function gutenix_set_nav_menu( $args ) {

	if ( ! current_user_can( 'edit_theme_options' ) ) {
		return null;
	}

	$label  = $args['fallback_message'];
	$url    = esc_url( admin_url( 'nav-menus.php' ) );

	printf( '<div class="set-menu %3$s"><a href="%2$s" target="_blank" class="set-menu__link">%1$s</a></div>', esc_attr( $label ), esc_url( $url ), esc_attr( $args['container_class'] ) );
}

/**
 * Set callback function for header image.
 */
function gutenix_set_header_image() {

	if ( ! get_header_image() ) {
		return null;
	}

	$url = get_header_image();

	echo '<div class="header-bar__image" style="background-image:url(' . esc_url( $url ) . ')"></div>';
}
