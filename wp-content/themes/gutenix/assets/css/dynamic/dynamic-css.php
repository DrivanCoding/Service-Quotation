<?php
/**
 * Get Dynamic CSS
 */
	
$css = '';
$parse_css = '';


/**
 * Typography
 */

/* Body Text Font Size */
$body_font_size 			= gutenix_theme()->customizer->get_value( 'body_font_size' );
$body_font_size_value 		= array( 'body' => array( 'font-size' => $body_font_size['desktop'] ) );
$tablet_body_font_size_value = array( 'body' => array( 'font-size' => $body_font_size['tablet'] ) );
$mobile_body_font_size_value = array( 'body' => array( 'font-size' => $body_font_size['mobile'] ) );

$parse_css .= gutenix_parse_css( $body_font_size_value );
$parse_css .= gutenix_parse_css( $tablet_body_font_size_value, '', '800' );
$parse_css .= gutenix_parse_css( $mobile_body_font_size_value, '', '544' );

/* H1 Heading Font Size */
$h1_font_size 				= gutenix_theme()->customizer->get_value( 'h1_font_size' );
$h1_font_size_value 		= array( 'h1, .h1-style' => array( 'font-size' => $h1_font_size['desktop'] ) );
$tablet_h1_font_size_value 	= array( 'h1, .h1-style' => array( 'font-size' => $h1_font_size['tablet'] ) );
$mobile_h1_font_size_value 	= array( 'h1, .h1-style' => array( 'font-size' => $h1_font_size['mobile']	) );

$parse_css .= gutenix_parse_css( $h1_font_size_value );
$parse_css .= gutenix_parse_css( $tablet_h1_font_size_value, '', '800' );
$parse_css .= gutenix_parse_css( $mobile_h1_font_size_value, '', '544' );

/* H2 Heading Font Size */
$h2_font_size 				= gutenix_theme()->customizer->get_value( 'h2_font_size' );
$h2_font_size_value 		= array( 'h2, .h2-style' => array( 'font-size' => $h2_font_size['desktop'] ) );
$tablet_h2_font_size_value 	= array( 'h2, .h2-style' => array( 'font-size' => $h2_font_size['tablet'] ) );
$mobile_h2_font_size_value 	= array( 'h2, .h2-style' => array( 'font-size' => $h2_font_size['mobile']	) );

$parse_css .= gutenix_parse_css( $h2_font_size_value );
$parse_css .= gutenix_parse_css( $tablet_h2_font_size_value, '', '800' );
$parse_css .= gutenix_parse_css( $mobile_h2_font_size_value, '', '544' );

/* H3 Heading Font Size */
$h3_font_size 				= gutenix_theme()->customizer->get_value( 'h3_font_size' );
$h3_font_size_value 		= array( 'h3, .h3-style' => array( 'font-size' => $h3_font_size['desktop'] ) );
$tablet_h3_font_size_value 	= array( 'h3, .h3-style' => array( 'font-size' => $h3_font_size['tablet'] ) );
$mobile_h3_font_size_value 	= array( 'h3, .h3-style' => array( 'font-size' => $h3_font_size['mobile']	) );

$parse_css .= gutenix_parse_css( $h3_font_size_value );
$parse_css .= gutenix_parse_css( $tablet_h3_font_size_value, '', '800' );
$parse_css .= gutenix_parse_css( $mobile_h3_font_size_value, '', '544' );

/* H4 Heading Font Size */
$h4_font_size 				= gutenix_theme()->customizer->get_value( 'h4_font_size' );
$h4_font_size_value 		= array( 'h4, .h4-style' => array( 'font-size' => $h4_font_size['desktop'] ) );
$tablet_h4_font_size_value 	= array( 'h4, .h4-style' => array( 'font-size' => $h4_font_size['tablet'] ) );
$mobile_h4_font_size_value 	= array( 'h4, .h4-style' => array( 'font-size' => $h4_font_size['mobile']	) );

$parse_css .= gutenix_parse_css( $h4_font_size_value );
$parse_css .= gutenix_parse_css( $tablet_h4_font_size_value, '', '800' );
$parse_css .= gutenix_parse_css( $mobile_h4_font_size_value, '', '544' );

/* H5 Heading Font Size */
$h5_font_size 				= gutenix_theme()->customizer->get_value( 'h5_font_size' );
$h5_font_size_value 		= array( 'h5, .h5-style, .nav-post-title' => array( 'font-size' => $h5_font_size['desktop'] ) );
$tablet_h5_font_size_value 	= array( 'h5, .h5-style, .nav-post-title' => array( 'font-size' => $h5_font_size['tablet'] ) );
$mobile_h5_font_size_value 	= array( 'h5, .h5-style, .nav-post-title' => array( 'font-size' => $h5_font_size['mobile']	) );

$parse_css .= gutenix_parse_css( $h5_font_size_value );
$parse_css .= gutenix_parse_css( $tablet_h5_font_size_value, '', '800' );
$parse_css .= gutenix_parse_css( $mobile_h5_font_size_value, '', '544' );

/* H6 Heading Font Size */
$h6_font_size 				= gutenix_theme()->customizer->get_value( 'h6_font_size' );
$h6_font_size_value 		= array( 'h6, .h6-style' => array( 'font-size' => $h6_font_size['desktop'] ) );
$tablet_h6_font_size_value 	= array( 'h6, .h6-style' => array( 'font-size' => $h6_font_size['tablet'] ) );
$mobile_h6_font_size_value 	= array( 'h6, .h6-style' => array( 'font-size' => $h6_font_size['mobile']	) );

$parse_css .= gutenix_parse_css( $h6_font_size_value );
$parse_css .= gutenix_parse_css( $tablet_h6_font_size_value, '', '800' );
$parse_css .= gutenix_parse_css( $mobile_h6_font_size_value, '', '544' );

/* Button Text Font Size */
$button_font_size 				= gutenix_theme()->customizer->get_value( 'button_font_size' );
$button_font_size_value 		= array( '.btn, button, #page input[type="button"], #page input[type="reset"], #page input[type="submit"], .woocommerce .button, .elementor-widget-wp-widget-woocommerce_widget_cart .button, .product .added_to_cart' => array( 'font-size' => $button_font_size['desktop'] ) );
$tablet_button_font_size_value 	= array( '.btn, button, #page input[type="button"], #page input[type="reset"], #page input[type="submit"], .woocommerce .button, .elementor-widget-wp-widget-woocommerce_widget_cart .button, .product .added_to_cart' => array( 'font-size' => $button_font_size['tablet'] ) );
$mobile_button_font_size_value 	= array( '.btn, button, #page input[type="button"], #page input[type="reset"], #page input[type="submit"], .woocommerce .button, .elementor-widget-wp-widget-woocommerce_widget_cart .button, .product .added_to_cart' => array( 'font-size' => $button_font_size['mobile'] ) );

$parse_css .= gutenix_parse_css( $button_font_size_value );
$parse_css .= gutenix_parse_css( $tablet_button_font_size_value, '', '800' );
$parse_css .= gutenix_parse_css( $mobile_button_font_size_value, '', '544' );

/* Input Text Font Size */
$input_font_size 				= gutenix_theme()->customizer->get_value( 'input_font_size' );
$input_font_size_value 			= array( '#page input, #page select, #page optgroup, #page textarea' => array( 'font-size' => $input_font_size['desktop'] ) );
$tablet_input_font_size_value 	= array( '#page input, #page select, #page optgroup, #page textarea' => array( 'font-size' => $input_font_size['tablet'] ) );
$mobile_input_font_size_value 	= array( '#page input, #page select, #page optgroup, #page textarea' => array( 'font-size' => $input_font_size['mobile'] ) );

$parse_css .= gutenix_parse_css( $input_font_size_value );
$parse_css .= gutenix_parse_css( $tablet_input_font_size_value, '', '800' );
$parse_css .= gutenix_parse_css( $mobile_input_font_size_value, '', '544' );

/* Header Buttons Text Font Size */
$header_button_font_size 				= gutenix_theme()->customizer->get_value( 'header_button_font_size' );
$header_button_font_size_value 			= array( '.header-btn' => array( 'font-size' => $header_button_font_size['desktop'] ) );
$tablet_header_button_font_size_value 	= array( '.header-btn' => array( 'font-size' => $header_button_font_size['tablet'] ) );
$mobile_header_button_font_size_value 	= array( '.header-btn' => array( 'font-size' => $header_button_font_size['mobile'] ) );

$parse_css .= gutenix_parse_css( $header_button_font_size_value );
$parse_css .= gutenix_parse_css( $tablet_header_button_font_size_value, '', '800' );
$parse_css .= gutenix_parse_css( $mobile_header_button_font_size_value, '', '544' );



/* Logo Text Font Size */
$logo_font_size 				= gutenix_theme()->customizer->get_value( 'logo_font_size' );
$logo_font_size_value 			= array( '.site-logo--text' => array( 'font-size' => $logo_font_size['desktop'] ) );
$tablet_logo_font_size_value 	= array( '.site-logo--text' => array( 'font-size' => $logo_font_size['tablet'] ) );
$mobile_logo_font_size_value 	= array( '.site-logo--text' => array( 'font-size' => $logo_font_size['mobile'] ) );

$parse_css .= gutenix_parse_css( $logo_font_size_value );
$parse_css .= gutenix_parse_css( $tablet_logo_font_size_value, '', '800' );
$parse_css .= gutenix_parse_css( $mobile_logo_font_size_value, '', '544' );

/* Tagline Text Font Size */
$tagline_font_size 				= gutenix_theme()->customizer->get_value( 'tagline_font_size' );
$tagline_font_size_value 		= array( '.site-description' => array( 'font-size' => $tagline_font_size['desktop'] ) );
$tablet_tagline_font_size_value = array( '.site-description' => array( 'font-size' => $tagline_font_size['tablet'] ) );
$mobile_tagline_font_size_value = array( '.site-description' => array( 'font-size' => $tagline_font_size['mobile'] ) );

$parse_css .= gutenix_parse_css( $tagline_font_size_value );
$parse_css .= gutenix_parse_css( $tablet_tagline_font_size_value, '', '800' );
$parse_css .= gutenix_parse_css( $mobile_tagline_font_size_value, '', '544' );



/* Vertical Menu Font Size */
$vertical_menu_font_size 				= gutenix_theme()->customizer->get_value( 'vertical_menu_font_size' );
$vertical_menu_font_size_value 			= array(
	'.main-navigation--vertical .menu > .menu-item > a, .main-navigation--vertical .menu .menu-parent-item > a' => array(
		'font-size' => $vertical_menu_font_size['desktop']
	)
);
$tablet_vertical_menu_font_size_value 	= array(
	'.main-navigation--vertical .menu > .menu-item > a, .main-navigation--vertical .menu .menu-parent-item > a' => array(
		'font-size' => $vertical_menu_font_size['tablet']
	)
);
$mobile_vertical_menu_font_size_value 	= array(
	'.main-navigation--vertical .menu > .menu-item > a, .main-navigation--vertical .menu .menu-parent-item > a' => array(
		'font-size' => $vertical_menu_font_size['mobile']
	)
);

$parse_css .= gutenix_parse_css( $vertical_menu_font_size_value );
$parse_css .= gutenix_parse_css( $tablet_vertical_menu_font_size_value, '', '800' );
$parse_css .= gutenix_parse_css( $mobile_vertical_menu_font_size_value, '', '544' );

/* Vertical Sub Menu Font Size */
$vertical_sub_menu_font_size 				= gutenix_theme()->customizer->get_value( 'vertical_sub_menu_font_size' );
$vertical_sub_menu_font_size_value 			= array(
	'.main-navigation--vertical .menu .sub-menu .menu-item > a' => array(
		'font-size' => $vertical_sub_menu_font_size['desktop']
	)
);
$tablet_vertical_sub_menu_font_size_value 	= array(
	'.main-navigation--vertical .menu .sub-menu .menu-item > a' => array(
		'font-size' => $vertical_sub_menu_font_size['tablet']
	)
);
$mobile_vertical_sub_menu_font_size_value 	= array(
	'.main-navigation--vertical .menu .sub-menu .menu-item > a' => array(
		'font-size' => $vertical_sub_menu_font_size['mobile']
	)
);

$parse_css .= gutenix_parse_css( $vertical_sub_menu_font_size_value );
$parse_css .= gutenix_parse_css( $tablet_vertical_sub_menu_font_size_value, '', '800' );
$parse_css .= gutenix_parse_css( $mobile_vertical_sub_menu_font_size_value, '', '544' );


/* Footer Widget Title Padding */
$footer_widgets_title_padding = gutenix_theme()->customizer->get_value( 'footer_widgets_title_padding' );
$footer_widgets_title_padding_spacing = array(
	'.footer-area-wrapper .widget-title' => array(
		'margin-top' 		=> $footer_widgets_title_padding['desktop']['top'],
		'margin-bottom' 	=> $footer_widgets_title_padding['desktop']['bottom'],
	),
);

// Tablet
$tablet_footer_widgets_title_padding_spacing = array(
	'.footer-area-wrapper .widget-title' => array(
		'margin-top' 		=> $footer_widgets_title_padding['tablet']['top'],
		'margin-bottom' 	=> $footer_widgets_title_padding['tablet']['bottom'],
	),
);

// Mobile
$mobile_footer_widgets_title_padding_spacing = array(
	'.footer-area-wrapper .widget-title' => array(
		'margin-top' 		=> $footer_widgets_title_padding['mobile']['top'],
		'margin-bottom' 	=> $footer_widgets_title_padding['mobile']['bottom'],
	),
);

$parse_css .= gutenix_parse_css( $footer_widgets_title_padding_spacing );
$parse_css .= gutenix_parse_css( $tablet_footer_widgets_title_padding_spacing, '', '800' );
$parse_css .= gutenix_parse_css( $mobile_footer_widgets_title_padding_spacing, '', '544' );

/* Footer Widgets Title Font Size */
$footer_widgets_title_font_size = gutenix_theme()->customizer->get_value( 'footer_widgets_title_font_size' );
$footer_widgets_title_font_size_value = array(
	'.footer-area-wrapper .widget-title' => array(
		'font-size' => $footer_widgets_title_font_size['desktop']
	)
);
$tablet_footer_widgets_title_font_size_value = array(
	'.footer-area-wrapper .widget-title' => array(
		'font-size' => $footer_widgets_title_font_size['tablet']
	)
);
$mobile_footer_widgets_title_font_size_value = array(
	'.footer-area-wrapper .widget-title' => array(
		'font-size' => $footer_widgets_title_font_size['mobile']
	)
);

$parse_css .= gutenix_parse_css( $footer_widgets_title_font_size_value );
$parse_css .= gutenix_parse_css( $tablet_footer_widgets_title_font_size_value, '', '800' );
$parse_css .= gutenix_parse_css( $mobile_footer_widgets_title_font_size_value, '', '544' );

/* Footer Widgets Content Font Size */
$footer_widgets_content_font_size = gutenix_theme()->customizer->get_value( 'footer_widgets_content_font_size' );
$footer_widgets_content_font_size_value = array(
	'.footer-area-wrapper .widget' => array(
		'font-size' => $footer_widgets_content_font_size['desktop']
	)
);
$tablet_footer_widgets_content_font_size_value = array(
	'.footer-area-wrapper .widget' => array(
		'font-size' => $footer_widgets_content_font_size['tablet']
	)
);
$mobile_footer_widgets_content_font_size_value = array(
	'.footer-area-wrapper .widget' => array(
		'font-size' => $footer_widgets_content_font_size['mobile']
	)
);

$parse_css .= gutenix_parse_css( $footer_widgets_content_font_size_value );
$parse_css .= gutenix_parse_css( $tablet_footer_widgets_content_font_size_value, '', '800' );
$parse_css .= gutenix_parse_css( $mobile_footer_widgets_content_font_size_value, '', '544' );


/**
 * Dimensions
 */

// Content Width
$sidebar_width 			= gutenix_theme()->customizer->get_value( 'sidebar_width' );
$sidebar_width 			= class_exists( 'Gutenix_Pro' ) ? $sidebar_width : '33';
$content_width 			= abs(100 - $sidebar_width);

if ( ! empty( $content_width ) && '67' != $content_width ) {
	$css .= '@media (min-width: 1200px) {
		.content-area.gutenix-col-md-8{
			flex: 0 0 ' . esc_html( $content_width ) . '%;
			max-width: ' . esc_html( $content_width ) . '%;
		}
	}';
}

// Sidebar Width
if ( ! empty( $sidebar_width ) && '33' != $sidebar_width ) {
	$css .= '@media (min-width: 1200px) {
		.sidebar.widget-area.gutenix-col-md-4{
			flex: 0 0 ' . esc_html( $sidebar_width ) . '%;
			max-width: ' . esc_html( $sidebar_width ) . '%;
		}
	}';
}


/* Content Padding */
$content_padding = gutenix_theme()->customizer->get_value( 'content_padding' );

$content_padding_spacing = array(
	'body:not(.page-layout-full-width) .site-content__container' => array(
		'padding-top' 		=> $content_padding['desktop']['top'],
		'padding-bottom' 	=> $content_padding['desktop']['bottom'],
	),
	'.page-layout-full-width .site-main > .comments-area' => array(
		'padding-bottom' 	=> $content_padding['desktop']['bottom'],
	),
);

// Tablet
$tablet_content_padding_spacing = array(
	'body:not(.page-layout-full-width) .site-content__container' => array(
		'padding-top' 		=> $content_padding['tablet']['top'],
		'padding-bottom' 	=> $content_padding['tablet']['bottom'],
	),
	'.page-layout-full-width .site-main > .comments-area' => array(
		'padding-bottom' 	=> $content_padding['tablet']['bottom'],
	),
);

// Mobile
$mobile_content_padding_spacing = array(
	'body:not(.page-layout-full-width) .site-content__container' => array(
		'padding-top' 		=> $content_padding['mobile']['top'],
		'padding-bottom' 	=> $content_padding['mobile']['bottom'],
	),
	'.page-layout-full-width .site-main > .comments-area' => array(
		'padding-bottom' 	=> $content_padding['mobile']['bottom'],
	),
);

$parse_css .= gutenix_parse_css( $content_padding_spacing );
$parse_css .= gutenix_parse_css( $tablet_content_padding_spacing, '', '800' );
$parse_css .= gutenix_parse_css( $mobile_content_padding_spacing, '', '544' );


/* Footer Widget Area Top Bottom Paddings */
$footer_widgets_padding = gutenix_theme()->customizer->get_value( 'footer_widgets_padding' );

$footer_widgets_padding_spacing = array(
	'.footer-area-wrapper' => array(
		'padding-top' 		=> $footer_widgets_padding['desktop']['top'],
		'padding-bottom' 	=> $footer_widgets_padding['desktop']['bottom'],
	),
);

// Tablet
$tablet_footer_widgets_padding_spacing = array(
	'.footer-area-wrapper' => array(
		'padding-top' 		=> $footer_widgets_padding['tablet']['top'],
		'padding-bottom' 	=> $footer_widgets_padding['tablet']['bottom'],
	),
);

// Mobile
$mobile_footer_widgets_padding_spacing = array(
	'.footer-area-wrapper' => array(
		'padding-top' 		=> $footer_widgets_padding['mobile']['top'],
		'padding-bottom' 	=> $footer_widgets_padding['mobile']['bottom'],
	),
);

$parse_css .= gutenix_parse_css( $footer_widgets_padding_spacing );
$parse_css .= gutenix_parse_css( $tablet_footer_widgets_padding_spacing, '', '800' );
$parse_css .= gutenix_parse_css( $mobile_footer_widgets_padding_spacing, '', '544' );


/* Footer Bar Top Bottom Paddings */
$footer_vertical_padding = gutenix_theme()->customizer->get_value( 'footer_vertical_padding' );
$footer_vertical_padding_spacing = array(
	'.footer-bar .gutenix-container, .footer-bar .gutenix-container-fluid' => array(
		'padding-top' 		=> $footer_vertical_padding['desktop']['top'],
		'padding-bottom' 	=> $footer_vertical_padding['desktop']['bottom'],
	),
);

// Tablet
$tablet_footer_vertical_padding_spacing = array(
	'.footer-bar .gutenix-container, .footer-bar .gutenix-container-fluid' => array(
		'padding-top' 		=> $footer_vertical_padding['tablet']['top'],
		'padding-bottom' 	=> $footer_vertical_padding['tablet']['bottom'],
	),
);

// Mobile
$mobile_footer_vertical_padding_spacing = array(
	'.footer-bar .gutenix-container, .footer-bar .gutenix-container-fluid' => array(
		'padding-top' 		=> $footer_vertical_padding['mobile']['top'],
		'padding-bottom' 	=> $footer_vertical_padding['mobile']['bottom'],
	),
);

$parse_css .= gutenix_parse_css( $footer_vertical_padding_spacing );
$parse_css .= gutenix_parse_css( $tablet_footer_vertical_padding_spacing, '', '800' );
$parse_css .= gutenix_parse_css( $mobile_footer_vertical_padding_spacing, '', '544' );


/**
 * Header
 */

/* Logo Sizes */
$logo_max_sizes = gutenix_theme()->customizer->get_value( 'logo_max_sizes' );

$logo_max_sizes_options = array(
	'.site-logo.site-logo--image a' => array(
		'width' 		=> $logo_max_sizes['desktop']['max_width'],
		'height' 		=> $logo_max_sizes['desktop']['max_height'],
	)
);

// Tablet
$tablet_logo_max_sizes_options = array(
	'.site-logo.site-logo--image a' => array(
		'width' 		=> $logo_max_sizes['tablet']['max_width'],
		'height' 		=> $logo_max_sizes['tablet']['max_height'],
	)
);

// Mobile
$mobile_logo_max_sizes_options = array(
	'.site-logo.site-logo--image a' => array(
		'width' 		=> $logo_max_sizes['mobile']['max_width'],
		'height' 		=> $logo_max_sizes['mobile']['max_height'],
	)
);

$parse_css .= gutenix_parse_css( $logo_max_sizes_options );
$parse_css .= gutenix_parse_css( $tablet_logo_max_sizes_options, '', '800' );
$parse_css .= gutenix_parse_css( $mobile_logo_max_sizes_options, '', '544' );

/* Header Button 1 Paddings */
$header_btn_1_padding = gutenix_theme()->customizer->get_value( 'header_btn_1_padding' );

$header_btn_1_padding_spacing = array(
	'.header-btn.header-btn-1' => array(
		'padding-top' 		=> $header_btn_1_padding['desktop']['top'],
		'padding-right' 	=> $header_btn_1_padding['desktop']['right'],
		'padding-bottom' 	=> $header_btn_1_padding['desktop']['bottom'],
		'padding-left' 		=> $header_btn_1_padding['desktop']['left'],
	),
);

// Tablet
$tablet_header_btn_1_padding_spacing = array(
	'.header-btn.header-btn-1' => array(
		'padding-top' 		=> $header_btn_1_padding['tablet']['top'],
		'padding-right' 	=> $header_btn_1_padding['tablet']['right'],
		'padding-bottom' 	=> $header_btn_1_padding['tablet']['bottom'],
		'padding-left' 		=> $header_btn_1_padding['tablet']['left'],
	),
);

// Mobile
$mobile_header_btn_1_padding_spacing = array(
	'.header-btn.header-btn-1' => array(
		'padding-top' 		=> $header_btn_1_padding['mobile']['top'],
		'padding-right' 	=> $header_btn_1_padding['mobile']['right'],
		'padding-bottom' 	=> $header_btn_1_padding['mobile']['bottom'],
		'padding-left' 		=> $header_btn_1_padding['mobile']['left'],
	),
);

$parse_css .= gutenix_parse_css( $header_btn_1_padding_spacing );
$parse_css .= gutenix_parse_css( $tablet_header_btn_1_padding_spacing, '', '800' );
$parse_css .= gutenix_parse_css( $mobile_header_btn_1_padding_spacing, '', '544' );

/* Header Button 2 Paddings */
$header_btn_2_padding = gutenix_theme()->customizer->get_value( 'header_btn_2_padding' );

$header_btn_2_padding_spacing = array(
	'.header-btn.header-btn-2' => array(
		'padding-top' 		=> $header_btn_2_padding['desktop']['top'],
		'padding-right' 	=> $header_btn_2_padding['desktop']['right'],
		'padding-bottom' 	=> $header_btn_2_padding['desktop']['bottom'],
		'padding-left' 		=> $header_btn_2_padding['desktop']['left'],
	),
);

// Tablet
$tablet_header_btn_2_padding_spacing = array(
	'.header-btn.header-btn-2' => array(
		'padding-top' 		=> $header_btn_2_padding['tablet']['top'],
		'padding-right' 	=> $header_btn_2_padding['tablet']['right'],
		'padding-bottom' 	=> $header_btn_2_padding['tablet']['bottom'],
		'padding-left' 		=> $header_btn_2_padding['tablet']['left'],
	),
);

// Mobile
$mobile_header_btn_2_padding_spacing = array(
	'.header-btn.header-btn-2' => array(
		'padding-top' 		=> $header_btn_2_padding['mobile']['top'],
		'padding-right' 	=> $header_btn_2_padding['mobile']['right'],
		'padding-bottom' 	=> $header_btn_2_padding['mobile']['bottom'],
		'padding-left' 		=> $header_btn_2_padding['mobile']['left'],
	),
);

$parse_css .= gutenix_parse_css( $header_btn_2_padding_spacing );
$parse_css .= gutenix_parse_css( $tablet_header_btn_2_padding_spacing, '', '800' );
$parse_css .= gutenix_parse_css( $mobile_header_btn_2_padding_spacing, '', '544' );


/**
 * Blog Posts
 */

/* Blog Posts Title Padding */
$blog_post_title_padding = gutenix_theme()->customizer->get_value( 'blog_post_title_padding' );

$blog_post_title_padding_spacing = array(
	'.entry-header, .posts-list--default .post .entry-header, .posts-list--default-2 .post .entry-header, .posts-list--grid .post .entry-header, .posts-list--masonry .post .entry-header, .posts-list--justify .post .entry-header, .wp-block-latest-posts__list.is-grid li > a' => array(
		'margin-top' 		=> $blog_post_title_padding['desktop']['top'],
		'margin-bottom' 	=> $blog_post_title_padding['desktop']['bottom'],
	),
);

// Tablet
$tablet_blog_post_title_padding_spacing = array(
	'.entry-header, .posts-list--default .post .entry-header, .posts-list--default-2 .post .entry-header, .posts-list--grid .post .entry-header, .posts-list--masonry .post .entry-header, .posts-list--justify .post .entry-header, .wp-block-latest-posts__list.is-grid li > a' => array(
		'margin-top' 		=> $blog_post_title_padding['tablet']['top'],
		'margin-bottom' 	=> $blog_post_title_padding['tablet']['bottom'],
	),
);

// Mobile
$mobile_blog_post_title_padding_spacing = array(
	'.entry-header, .posts-list--default .post .entry-header, .posts-list--default-2 .post .entry-header, .posts-list--grid .post .entry-header, .posts-list--masonry .post .entry-header, .posts-list--justify .post .entry-header, .wp-block-latest-posts__list.is-grid li > a' => array(
		'margin-top' 		=> $blog_post_title_padding['mobile']['top'],
		'margin-bottom' 	=> $blog_post_title_padding['mobile']['bottom'],
	),
);

$parse_css .= gutenix_parse_css( $blog_post_title_padding_spacing );
$parse_css .= gutenix_parse_css( $tablet_blog_post_title_padding_spacing, '', '800' );
$parse_css .= gutenix_parse_css( $mobile_blog_post_title_padding_spacing, '', '544' );


/* Blog Posts Title Font Size */
$blog_post_title_font_size = gutenix_theme()->customizer->get_value( 'blog_post_title_font_size' );
$blog_post_title_font_size_value = array(
	'.posts-list .post .entry-header h2, .posts-list .post .entry-title, .related-post .entry-title, .wp-block-latest-posts__list.is-grid li > a' => array(
		'font-size' => $blog_post_title_font_size['desktop']
	)
);
$tablet_blog_post_title_font_size_value = array(
	'.posts-list .post .entry-header h2, .posts-list .post .entry-title, .related-post .entry-title, .wp-block-latest-posts__list.is-grid li > a' => array(
		'font-size' => $blog_post_title_font_size['tablet']
	)
);
$mobile_blog_post_title_font_size_value = array(
	'.posts-list .post .entry-header h2, .posts-list .post .entry-title, .related-post .entry-title, .wp-block-latest-posts__list.is-grid li > a' => array(
		'font-size' => $blog_post_title_font_size['mobile']
	)
);

$parse_css .= gutenix_parse_css( $blog_post_title_font_size_value );
$parse_css .= gutenix_parse_css( $tablet_blog_post_title_font_size_value, '', '800' );
$parse_css .= gutenix_parse_css( $mobile_blog_post_title_font_size_value, '', '544' );


/* Blog Posts Meta Padding */
$blog_post_meta_padding = gutenix_theme()->customizer->get_value( 'blog_post_meta_padding' );

$blog_post_meta_padding_spacing = array(
	'.entry-meta, .posts-list--default .post .entry-meta, .posts-list--default-2 .post .entry-meta, .posts-list--grid .post .entry-meta, .posts-list--masonry .post .entry-meta, .posts-list--justify .post .entry-meta' => array(
		'margin-top' 		=> $blog_post_meta_padding['desktop']['top'],
		'margin-bottom' 	=> $blog_post_meta_padding['desktop']['bottom'],
	),
);

// Tablet
$tablet_blog_post_meta_padding_spacing = array(
	'.entry-meta, .posts-list--default .post .entry-meta, .posts-list--default-2 .post .entry-meta, .posts-list--grid .post .entry-meta, .posts-list--masonry .post .entry-meta, .posts-list--justify .post .entry-meta' => array(
		'margin-top' 		=> $blog_post_meta_padding['tablet']['top'],
		'margin-bottom' 	=> $blog_post_meta_padding['tablet']['bottom'],
	),
);

// Mobile
$mobile_blog_post_meta_padding_spacing = array(
	'.entry-meta, .posts-list--default .post .entry-meta, .posts-list--default-2 .post .entry-meta, .posts-list--grid .post .entry-meta, .posts-list--masonry .post .entry-meta, .posts-list--justify .post .entry-meta' => array(
		'margin-top' 		=> $blog_post_meta_padding['mobile']['top'],
		'margin-bottom' 	=> $blog_post_meta_padding['mobile']['bottom'],
	),
);

$parse_css .= gutenix_parse_css( $blog_post_meta_padding_spacing );
$parse_css .= gutenix_parse_css( $tablet_blog_post_meta_padding_spacing, '', '800' );
$parse_css .= gutenix_parse_css( $mobile_blog_post_meta_padding_spacing, '', '544' );


/* Blog Posts Meta Font Size */
$blog_post_meta_font_size = gutenix_theme()->customizer->get_value( 'blog_post_meta_font_size' );
$blog_post_meta_font_size_value = array(
	'.entry-meta, .entry-footer, .wp-block-latest-posts .wp-block-latest-posts__post-date' => array(
		'font-size' => $blog_post_meta_font_size['desktop']
	)
);
$tablet_blog_post_meta_font_size_value = array(
	'.entry-meta, .entry-footer, .wp-block-latest-posts .wp-block-latest-posts__post-date' => array(
		'font-size' => $blog_post_meta_font_size['tablet']
	)
);
$mobile_blog_post_meta_font_size_value = array(
	'.entry-meta, .entry-footer, .wp-block-latest-posts .wp-block-latest-posts__post-date' => array(
		'font-size' => $blog_post_meta_font_size['mobile']
	)
);

$parse_css .= gutenix_parse_css( $blog_post_meta_font_size_value );
$parse_css .= gutenix_parse_css( $tablet_blog_post_meta_font_size_value, '', '800' );
$parse_css .= gutenix_parse_css( $mobile_blog_post_meta_font_size_value, '', '544' );


/* Blog Posts Excerpt Padding */
$blog_post_excerpt_padding = gutenix_theme()->customizer->get_value( 'blog_post_excerpt_padding' );

$blog_post_excerpt_padding_spacing = array(
	'.posts-list--default .post .entry-content, .posts-list--default-2 .post .entry-content, .posts-list--grid .post .entry-content, .posts-list--masonry .post .entry-content, .posts-list--justify .post .entry-content, .wp-block-latest-posts__post-excerpt' => array(
		'margin-top' 		=> $blog_post_excerpt_padding['desktop']['top'],
		'margin-bottom' 	=> $blog_post_excerpt_padding['desktop']['bottom'],
	),
);

// Tablet
$tablet_blog_post_excerpt_padding_spacing = array(
	'.posts-list--default .post .entry-content, .posts-list--default-2 .post .entry-content, .posts-list--grid .post .entry-content, .posts-list--masonry .post .entry-content, .posts-list--justify .post .entry-content, .wp-block-latest-posts__post-excerpt' => array(
		'margin-top' 		=> $blog_post_excerpt_padding['tablet']['top'],
		'margin-bottom' 	=> $blog_post_excerpt_padding['tablet']['bottom'],
	),
);

// Mobile
$mobile_blog_post_excerpt_padding_spacing = array(
	'.posts-list--default .post .entry-content, .posts-list--default-2 .post .entry-content, .posts-list--grid .post .entry-content, .posts-list--masonry .post .entry-content, .posts-list--justify .post .entry-content, .wp-block-latest-posts__post-excerpt' => array(
		'margin-top' 		=> $blog_post_excerpt_padding['mobile']['top'],
		'margin-bottom' 	=> $blog_post_excerpt_padding['mobile']['bottom'],
	),
);

$parse_css .= gutenix_parse_css( $blog_post_excerpt_padding_spacing );
$parse_css .= gutenix_parse_css( $tablet_blog_post_excerpt_padding_spacing, '', '800' );
$parse_css .= gutenix_parse_css( $mobile_blog_post_excerpt_padding_spacing, '', '544' );

/* Blog Posts Excerpt Font Size */
$blog_post_excerpt_font_size = gutenix_theme()->customizer->get_value( 'blog_post_excerpt_font_size' );
$blog_post_excerpt_font_size_value = array(
	'.post .entry-content, .posts-list--default .entry-content, .posts-list--default-2 .entry-content, .posts-list--grid .entry-content, .posts-list--masonry .entry-content, .posts-list--justify .entry-content, .wp-block-latest-posts__post-excerpt' => array(
		'font-size' => $blog_post_excerpt_font_size['desktop']
	)
);
$tablet_blog_post_excerpt_font_size_value = array(
	'.post .entry-content, .posts-list--default .entry-content, .posts-list--default-2 .entry-content, .posts-list--grid .entry-content, .posts-list--masonry .entry-content, .posts-list--justify .entry-content, .wp-block-latest-posts__post-excerpt' => array(
		'font-size' => $blog_post_excerpt_font_size['tablet']
	)
);
$mobile_blog_post_excerpt_font_size_value = array(
	'.post .entry-content, .posts-list--default .entry-content, .posts-list--default-2 .entry-content, .posts-list--grid .entry-content, .posts-list--masonry .entry-content, .posts-list--justify .entry-content, .wp-block-latest-posts__post-excerpt' => array(
		'font-size' => $blog_post_excerpt_font_size['mobile']
	)
);

$parse_css .= gutenix_parse_css( $blog_post_excerpt_font_size_value );
$parse_css .= gutenix_parse_css( $tablet_blog_post_excerpt_font_size_value, '', '800' );
$parse_css .= gutenix_parse_css( $mobile_blog_post_excerpt_font_size_value, '', '544' );

/* Blog Posts Learn More Padding */
$blog_read_more_padding = gutenix_theme()->customizer->get_value( 'blog_read_more_padding' );

$blog_read_more_padding_spacing = array(
	'.post-button.btn.btn-default' => array(
		'padding-top' 		=> $blog_read_more_padding['desktop']['top'],
		'padding-right' 	=> $blog_read_more_padding['desktop']['right'],
		'padding-bottom' 	=> $blog_read_more_padding['desktop']['bottom'],
		'padding-left' 		=> $blog_read_more_padding['desktop']['left'],
	),
);

// Tablet
$tablet_blog_read_more_padding_spacing = array(
	'.post-button.btn.btn-default' => array(
		'padding-top' 		=> $blog_read_more_padding['tablet']['top'],
		'padding-right' 	=> $blog_read_more_padding['tablet']['right'],
		'padding-bottom' 	=> $blog_read_more_padding['tablet']['bottom'],
		'padding-left' 		=> $blog_read_more_padding['tablet']['left'],
	),
);

// Mobile
$mobile_blog_read_more_padding_spacing = array(
	'.post-button.btn.btn-default' => array(
		'padding-top' 		=> $blog_read_more_padding['mobile']['top'],
		'padding-right' 	=> $blog_read_more_padding['mobile']['right'],
		'padding-bottom' 	=> $blog_read_more_padding['mobile']['bottom'],
		'padding-left' 		=> $blog_read_more_padding['mobile']['left'],
	),
);

$parse_css .= gutenix_parse_css( $blog_read_more_padding_spacing );
$parse_css .= gutenix_parse_css( $tablet_blog_read_more_padding_spacing, '', '800' );
$parse_css .= gutenix_parse_css( $mobile_blog_read_more_padding_spacing, '', '544' );

/* Blog Posts Learn More Font Size */
$blog_read_more_font_size = gutenix_theme()->customizer->get_value( 'blog_read_more_font_size' );
$blog_read_more_font_size_value = array(
	'.post-button.btn.btn-default' => array(
		'font-size' => $blog_read_more_font_size['desktop']
	)
);
$tablet_blog_read_more_font_size_value = array(
	'.post-button.btn.btn-default' => array(
		'font-size' => $blog_read_more_font_size['tablet']
	)
);
$mobile_blog_read_more_font_size_value = array(
	'.post-button.btn.btn-default' => array(
		'font-size' => $blog_read_more_font_size['mobile']
	)
);

$parse_css .= gutenix_parse_css( $blog_read_more_font_size_value );
$parse_css .= gutenix_parse_css( $tablet_blog_read_more_font_size_value, '', '800' );
$parse_css .= gutenix_parse_css( $mobile_blog_read_more_font_size_value, '', '544' );


/**
 * Footer
 */

/* Footer Widget Area Columns Width */
$footer_widgets_visible 		= gutenix_theme()->customizer->get_value( 'footer_widgets_visible' );
$footer_widget_areas_count 		= gutenix_theme()->customizer->get_value( 'footer_widget_areas_count' );
$footer_widgets_dynamic_width 	= gutenix_theme()->customizer->get_value( 'footer_widgets_dynamic_width' );

if ( false != $footer_widgets_visible && false != $footer_widgets_dynamic_width ) {

	$i = 1;

	foreach ( range( 1, $footer_widget_areas_count ) as $g ) {
		
		$width = gutenix_theme()->customizer->get_value( 'footer_widgetarea_width_col'. $i );

		if( $i <= $footer_widget_areas_count ) {
			$css .= '@media (min-width: 767px) { #footer-widget-area-'. esc_html( $i ) .'{flex:0 0 '. esc_html( $width ) .'%;max-width:'. esc_html( $width ) .'%;} }';
		}
		
		$i++;
	}
}


/* Footer Widget Area Column Inside Padding */
$footer_widgetarea_column_padding = gutenix_theme()->customizer->get_value( 'footer_widgetarea_column_padding' );

$footer_widgetarea_column_padding_spacing = array(
	'.footer-area-wrapper .gutenix-col-xs-12.gutenix-col-md-6' => array(
		'padding-top' 		=> $footer_widgetarea_column_padding['desktop']['top'],
		'padding-right' 	=> $footer_widgetarea_column_padding['desktop']['right'],
		'padding-bottom' 	=> $footer_widgetarea_column_padding['desktop']['bottom'],
		'padding-left' 		=> $footer_widgetarea_column_padding['desktop']['left'],
	),
);

// Tablet
$tablet_footer_widgetarea_column_padding_spacing = array(
	'.footer-area-wrapper .gutenix-col-xs-12.gutenix-col-md-6' => array(
		'padding-top' 		=> $footer_widgetarea_column_padding['tablet']['top'],
		'padding-right' 	=> $footer_widgetarea_column_padding['tablet']['right'],
		'padding-bottom' 	=> $footer_widgetarea_column_padding['tablet']['bottom'],
		'padding-left' 		=> $footer_widgetarea_column_padding['tablet']['left'],
	),
);

// Mobile
$mobile_footer_widgetarea_column_padding_spacing = array(
	'.footer-area-wrapper .gutenix-col-xs-12.gutenix-col-md-6' => array(
		'padding-top' 		=> $footer_widgetarea_column_padding['mobile']['top'],
		'padding-right' 	=> $footer_widgetarea_column_padding['mobile']['right'],
		'padding-bottom' 	=> $footer_widgetarea_column_padding['mobile']['bottom'],
		'padding-left' 		=> $footer_widgetarea_column_padding['mobile']['left'],
	),
);

$parse_css .= gutenix_parse_css( $footer_widgetarea_column_padding_spacing );
$parse_css .= gutenix_parse_css( $tablet_footer_widgetarea_column_padding_spacing, '', '800' );
$parse_css .= gutenix_parse_css( $mobile_footer_widgetarea_column_padding_spacing, '', '544' );


/**
 * WooCommerce
 */

// Content Width
$woo_sidebar_width 			= gutenix_theme()->customizer->get_value( 'woo_sidebar_width' );
$woo_content_width 			= abs(100 - $woo_sidebar_width);

if ( ! empty( $woo_content_width ) && '67' != $woo_content_width ) {
	$css .= '@media (min-width: 1200px) {
		.woocommerce .content-area.gutenix-col-md-8{
			flex: 0 0 '. $woo_content_width .'%;
			max-width: '. $woo_content_width .'%;
		}
	}';
}

// Sidebar Width
if ( ! empty( $woo_sidebar_width ) && '33' != $woo_sidebar_width ) {
	$css .= '@media (min-width: 1200px) {
		#sidebar-shop.widget-area.gutenix-col-md-4{
			flex: 0 0 '. $woo_sidebar_width .'%;
			max-width: '. $woo_sidebar_width .'%;
		}
	}';
}




$css .= $parse_css;

// Return CSS
if ( ! empty( $css ) ) {
	$output = '/* Dynamic CSS */'. $css;
}

// Return output css
echo $output;