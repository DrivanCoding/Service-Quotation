<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Gutenix
 */

// Add a pingback url auto-discovery header for single posts, pages, or attachments.
add_action( 'wp_head', 'gutenix_pingback_header' );

// Adds the meta theme-color to the header.
add_action( 'wp_head', 'gutenix_meta_theme_color' );

// Enqueue misc js script.
add_filter( 'gutenix_theme_script_depends', 'gutenix_enqueue_misc_js_script' );

// Adds custom classes to the array of body classes.
add_filter( 'body_class', 'gutenix_body_classes' );

// Sidebars classes.
add_filter( 'gutenix_widget_area_classes', 'gutenix_set_sidebar_classes', 10, 2 );

// Set Footer Area columns
add_filter( 'gutenix_footer_area_classes', 'gutenix_set_footer_area_classes', 10, 2 );

// Set footer columns.
add_filter( 'dynamic_sidebar_params', 'gutenix_set_footer_widget_layout' );

// Modify fonts list.
add_filter( 'gutenix_cx_customizer/fonts_list', 'gutenix_modify_fonts_list' );

// Modify fonts data.
add_filter( 'gutenix_cx_fonts_manager/fonts_data', 'gutenix_modify_fonts_data', 10, 2 );

// Modify a comment form.
add_filter( 'comment_form_defaults', 'gutenix_modify_comment_form' );

// Add dynamic css functions.
add_filter( 'gutenix_cx_dynamic_css/func_list', 'gutenix_add_dynamic_css_functions' );

// Disable print `Recent comments` widget style.
add_filter( 'show_recent_comments_widget_style', '__return_false' );

// Customization for `Tag Cloud` widget.
add_filter( 'widget_tag_cloud_args', 'gutenix_customize_tag_cloud' );

// Set specific customizer settings.
add_filter( 'theme_mod_layout_type', 'gutenix_set_specific_layout_type' );

//	Theme actions
add_action( 'gutenix_header', 'gutenix_header_markup' );
add_action( 'gutenix_top_panel', 'gutenix_top_panel_markup' );
add_action( 'gutenix_header_bar', 'gutenix_header_bar_markup' );
add_action( 'gutenix_footer', 'gutenix_footer_markup' );
add_action( 'gutenix_footer_widgets_area', 'gutenix_footer_widgets_area_markup' );
add_action( 'gutenix_footer_bar', 'gutenix_footer_bar_markup' );

/* Welcome Block */
add_action( 'admin_notices', 'gutenix_welcome_notice_content' );

// Render macros in text widgets.
add_filter( 'widget_text', 'gutenix_render_widget_macros' );


/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 *
 * @return void
 * @since  1.0.0
 */
function gutenix_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}

/**
 * Adds the meta theme-color to the header.
 *
 * @return void
 * @since  1.0.0
 */
function gutenix_meta_theme_color() {
	$theme_color = gutenix_theme()->customizer->get_value( 'address_bar_color' );

	echo '<meta name="theme-color" content="' . esc_attr( $theme_color ) . '"/>' . "\n";
}

/**
 * Enqueue misc js script.
 *
 * @param array $depends Default dependencies.
 *
 * @return array
 * @since  1.0.0
 */
function gutenix_enqueue_misc_js_script( $depends = array() ) {

	$totop_visibility = gutenix_theme()->customizer->get_value( 'show_totop_button' );

	if ( $totop_visibility ) {
		$depends[] = 'jquery-ui-totop';
	}

	return $depends;
}

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 *
 * @return array
 * @since  1.0.0
 */
function gutenix_body_classes( $classes ) {

	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	$layout_type = gutenix_theme()->customizer->get_value( 'layout_type_pages' );

	if ( is_home() || ( is_archive() && ! is_tax() && ! is_post_type_archive() ) ) {
		$layout_type = gutenix_theme()->customizer->get_value( 'layout_type_blog' );
	}

	if ( is_singular( 'post' ) ) {
		$layout_type = gutenix_theme()->customizer->get_value( 'layout_type_post' );
	}

	$classes[] = 'page-layout-' . esc_attr( $layout_type );

	if ( gutenix_has_sidebar() ) {
		$classes[] = 'has-sidebar';
	} else {
		$classes[] = 'no-sidebar';
	}

	//	Site Title, Description Hidden
	if ( ! has_custom_logo() && display_header_text() == false ) {
		$classes[] = 'no-site-title';
	}

	$show_site_desc = gutenix_theme()->customizer->get_value( 'show_tagline' );
	$site_desc      = get_bloginfo( 'description', 'display' );
	$visible_desc   = $show_site_desc && $site_desc;
	if ( ! $visible_desc ) {
		$classes[] = 'no-site-description';
	}

	//	Sticky Sidebar
	$sidebar_fixed = gutenix_theme()->customizer->get_value( 'sidebar_fixed' );
	if ( $sidebar_fixed ) {
		$classes[] = 'theia-sticky-sidebar';
	}

	return $classes;
}

/**
 * Set layout classes for sidebars.
 *
 * @param array $classes Additional classes.
 * @param string $area_id Sidebar ID.
 *
 * @return array
 * @uses   gutenix_get_layout_classes.
 *
 * @since  1.0.0
 */
function gutenix_set_sidebar_classes( $classes, $area_id ) {

	if ( in_array( $area_id, array( 'sidebar', 'sidebar-shop' ) ) ) {

		if ( $area_id === 'sidebar-shop' ) {
			$classes[] = 'sidebar';
		}

		return gutenix_get_layout_classes( 'sidebar', $classes );
	}

	if ( 'footer-area' == $area_id ) {
		$columns = gutenix_theme()->customizer->get_value( 'footer_widgets_columns' );

		$classes[] = sprintf( 'footer-area--%s-cols', esc_attr( $columns ) );
		$classes[] = 'gutenix-row';
	}

	return $classes;
}

/**
 * Set layout classes for footer widget area wrapper.
 *
 * @param array $classes Additional classes.
 * @param string $area_id Sidebar ID.
 *
 * @return array
 * @uses   gutenix_get_layout_classes.
 *
 * @since  1.0.0
 */
function gutenix_set_footer_area_classes( $classes ) {

	$dynamic_width   = gutenix_theme()->customizer->get_value( 'footer_widgets_dynamic_width' );
	$widgets_columns = gutenix_theme()->customizer->get_value( 'footer_widgets_columns' );

	$columns = ( class_exists( 'Gutenix_Pro' ) && $dynamic_width == true ) ? 2 : $widgets_columns;

	switch ( $columns ) {
		case 6:
		case 5:
			$xl_col = 2;
			$md_col = 6;
			break;

		case 4:
			$xl_col = 3;
			$md_col = 6;
			break;

		case 3:
			$xl_col = 4;
			$md_col = 4;
			break;

		case 2:
			$xl_col = 6;
			$md_col = 6;
			break;

		default:
			$xl_col = 12;
			$md_col = 12;
			break;
	}

	$classes = 'gutenix-col-xs-12 gutenix-col-md-' . esc_attr( $md_col ) . ' gutenix-col-xl-' . esc_attr( $xl_col );

	return $classes;
}

/**
 * Get footer widgets layout class
 *
 * @param string $params Existing widget classes.
 *
 * @return string
 * @since  1.0.0
 */
function gutenix_set_footer_widget_layout( $params ) {

	if ( is_admin() ) {
		return $params;
	}

	if ( empty( $params[0]['id'] ) || 'footer-area' !== $params[0]['id'] ) {
		return $params;
	}

	if ( empty( $params[0]['before_widget'] ) ) {
		return $params;
	}

	$columns = gutenix_theme()->customizer->get_value( 'footer_widgets_columns' );

	$columns = intval( $columns );
	$classes = 'class="gutenix-col-xs-12 gutenix-col-md-%2$s gutenix-col-xl-%1$s ';

	switch ( $columns ) {
		case 6:
			$xl_col = 2;
			$md_col = 6;
			break;

		case 5:
			$xl_col = 3;
			$md_col = 6;
			break;

		case 4:
			$xl_col = 3;
			$md_col = 6;
			break;

		case 3:
			$xl_col = 4;
			$md_col = 4;
			break;

		case 2:
			$xl_col = 6;
			$md_col = 6;
			break;

		default:
			$xl_col = 12;
			$md_col = 12;
			break;
	}

	$params[0]['before_widget'] = str_replace(
		'class="',
		sprintf( $classes, $xl_col, $md_col ),
		$params[0]['before_widget']
	);

	return $params;
}

/**
 * Modify fonts list.
 *
 * @param array $fonts Fonts List.
 *
 * @return array
 * @since  1.0.0
 */
function gutenix_modify_fonts_list( $fonts = array() ) {

	$fonts = array_merge(
		array(
			'-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Oxygen-Sans,Ubuntu,Cantarell,Helvetica Neue,sans-serif' => esc_html__( 'Default System Font', 'gutenix' ),
		),
		$fonts
	);

	return $fonts;
}

/**
 * Modify fonts data. Added italic, bold and bold-italic styles.
 *
 * @param array $data Fonts data.
 * @param array $args Fonts manager arguments.
 *
 * @return array
 * @since  1.0.0
 */
function gutenix_modify_fonts_data( $data = array(), $args = array() ) {

	if ( ! isset( $args['prefix'] ) || ( 'gutenix' !== $args['prefix'] ) ) {
		return $data;
	}

	foreach ( $data as $font_family => $font_args ) {

		foreach ( $font_args['style'] as $font_style ) {
			if ( ! strpos( $font_style, 'italic' ) && ! in_array( $font_style . 'italic', $font_args['style'] ) ) {
				$data[ $font_family ]['style'][] = $font_style . 'italic';
			}
		}

		if ( ! in_array( '700', $data[ $font_family ]['style'] ) ) {
			$data[ $font_family ]['style'][] = '700';
		}

		if ( ! in_array( '700italic', $data[ $font_family ]['style'] ) ) {
			$data[ $font_family ]['style'][] = '700italic';
		}
	}

	return $data;
}

/**
 * Modify a comment form.
 *
 * @param array $args Arguments for comment form.
 *
 * @return array
 * @since  1.0.0
 */
function gutenix_modify_comment_form( $args ) {
	$args = wp_parse_args( $args );

	if ( ! isset( $args['format'] ) ) {
		$args['format'] = current_theme_supports( 'html5', 'comment-form' ) ? 'html5' : 'xhtml';
	}

	$req       = get_option( 'require_name_email' );
	$aria_req  = ( $req ? " aria-required='true'" : '' );
	$html_req  = ( $req ? " required='required'" : '' );
	$html5     = 'html5' === $args['format'];
	$commenter = wp_get_current_commenter();

	$args['label_submit'] = esc_html__( 'Submit', 'gutenix' );

	$args['fields']['author'] = '<p class="comment-form-author"><label for="author">' . esc_html__( 'Your name', 'gutenix' ) . ( $req ? ' <span class="required">*</span>' : '' ) . '</label><input id="author" class="comment-form__field" name="author" type="text" placeholder="' . esc_attr__( 'Name', 'gutenix' ) . '" value="' . esc_attr( $commenter['comment_author'] ) . '" size="100"' . $aria_req . $html_req . ' /></p>';

	$args['fields']['email'] = '<p class="comment-form-email"><label for="email">' . esc_html__( 'Your email', 'gutenix' ) . ( $req ? ' <span class="required">*</span>' : '' ) . '</label><input id="email" class="comment-form__field" name="email" ' . ( $html5 ? 'type="email"' : 'type="text"' ) . ' placeholder="' . esc_attr__( 'Email address', 'gutenix' ) . '" value="' . esc_attr( $commenter['comment_author_email'] ) . '" size="100" aria-describedby="email-notes"' . $aria_req . $html_req . ' /></p>';

	$args['fields']['url'] = '<p class="comment-form-url"><label for="url">' . esc_html__( 'Your website', 'gutenix' ) . '</label><input id="url" class="comment-form__field" name="url" ' . ( $html5 ? 'type="url"' : 'type="text"' ) . ' placeholder="' . esc_attr__( 'Website', 'gutenix' ) . '" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="100" /></p>';

	$args['comment_field'] = '<p class="comment-form-comment"><label for="comment">' . esc_html__( 'Your comment', 'gutenix' ) . '</label><textarea id="comment" class="comment-form__field" name="comment" placeholder="' . esc_attr__( 'Comment', 'gutenix' ) . '" cols="45" rows="8" aria-required="true" required="required"></textarea></p>';

	$args['title_reply_before'] = '<h3 id="reply-title" class="comment-reply-title">';

	$args['title_reply_after'] = '</h3>';

	$args['class_submit'] = 'submit btn btn-primary';

	return $args;
}

/**
 * Add custom dynamic css functions.
 *
 * @param array $func_list Functions list.
 *
 * @return array
 * @since  1.0.0
 */
function gutenix_add_dynamic_css_functions( $func_list = array() ) {

	$func_list['fallback_var']   = 'gutenix_dynamic_fallback_var';
	$func_list['css_property']   = 'gutenix_dynamic_css_property';
	$func_list['background_img'] = 'gutenix_dynamic_background_image';

	return $func_list;
}


/**
 * Callback function for dynamic css function `fallback_var`.
 *
 * @param string $value Value.
 * @param string $default_value Default value.
 *
 * @return string
 * @since  1.0.0
 */
function gutenix_dynamic_fallback_var( $value = '', $default_value = '' ) {

	if ( empty( $value ) ) {
		return $default_value;
	}

	return $value;
}

/**
 * Callback function for dynamic css function `css_property`.
 *
 * @param string $property CSS-property name.
 * @param string|int $value CSS-property value.
 *
 * @return string|bool
 * @since  1.0.0
 */
function gutenix_dynamic_css_property( $property = '', $value = '' ) {

	if ( empty( $value ) ) {
		return false;
	}

	return $property . ': ' . $value;
}

/**
 * Callback function for dynamic css function `bg_img`.
 *
 * @param string $img Background Image
 * @param string $size Background Size
 * @param string $position Background Position
 * @param string $repeat Background Repeat
 * @param string $attachment Background Attachment
 *
 * @return string|bool
 * @since  1.0.0
 */
function gutenix_dynamic_background_image( $img = null, $size = null, $position = null, $repeat = null, $attachment = null ) {

	if ( empty( $img ) ) {
		return false;
	}

	$css_map = array(
		'background-image'      => 'url(' . esc_url( $img ) . ')',
		'background-size'       => $size,
		'background-position'   => str_replace( '-', ' ', $position ),
		'background-repeat'     => $repeat,
		'background-attachment' => $attachment,
	);

	$result_map = array();

	foreach ( $css_map as $property => $value ) {

		if ( empty( $value ) ) {
			continue;
		}

		$result_map[] = $property . ':' . $value;
	}

	$result = join( ';', $result_map );

	return $result;
}

/**
 * Customization for `Tag Cloud` widget.
 *
 * @param array $args Widget arguments.
 *
 * @return array
 * @since  1.0.0
 */
function gutenix_customize_tag_cloud( $args ) {
	$args['smallest'] = 16;
	$args['largest']  = 16;
	$args['unit']     = 'px';

	return $args;
}

/**
 * Set specific layout type.
 *
 * @param string $value Default value.
 *
 * @return string
 * @since  1.0.0
 */
function gutenix_set_specific_layout_type( $value = '' ) {

	if ( is_search() ) {
		return 'boxed-full-width';
	}

	if ( is_page() ) {
		$page_layout = gutenix_theme()->customizer->get_value( 'layout_type_pages' );

		if ( ! empty( $page_layout ) ) {
			return $page_layout;
		}
	}

	if ( is_home() || ( is_archive() && ! is_tax() && ! is_post_type_archive() ) ) {
		$blog_layout = gutenix_theme()->customizer->get_value( 'layout_type_blog' );

		if ( ! empty( $blog_layout ) ) {
			return $blog_layout;
		}
	}

	if ( is_singular( 'post' ) ) {
		$post_layout = gutenix_theme()->customizer->get_value( 'layout_type_post' );

		if ( ! empty( $post_layout ) ) {
			return $post_layout;
		}
	}

	if ( class_exists( 'WooCommerce' ) ) {

		if ( is_cart() || is_checkout() ) {
			return 'boxed-full-width';
		}

		if ( is_shop() || is_tax( 'product_cat' ) || is_tax( 'product_tag' ) ) {
			$shop_layout = gutenix_theme()->customizer->get_value( 'layout_type_shop' );

			if ( ! empty( $shop_layout ) ) {
				return $shop_layout;
			}
		}

		if ( is_singular( 'product' ) ) {
			$product_layout = gutenix_theme()->customizer->get_value( 'layout_type_product' );

			if ( ! empty( $product_layout ) ) {
				return $product_layout;
			}
		}
	}

	return $value;
}

/*
 * Theme actions
 */
if ( ! function_exists( 'gutenix_header_markup' ) ) :
	/**
	 * Header markup.
	 *
	 * @return void
	 * @since  1.0.0
	 */
	function gutenix_header_markup() {
		gutenix_theme()->do_location( 'header', 'template-parts/header' );
	}
endif;

if ( ! function_exists( 'gutenix_top_panel_markup' ) ) :
	/**
	 * Top panel markup.
	 *
	 * @return void
	 * @since  1.0.0
	 */
	function gutenix_top_panel_markup() {
		get_template_part( 'template-parts/header/top-panel' );
	}
endif;

if ( ! function_exists( 'gutenix_header_bar_markup' ) ) :
	/**
	 * Header bar markup.
	 *
	 * @return void
	 * @since  1.0.0
	 */
	function gutenix_header_bar_markup() {
		$layout = gutenix_theme()->customizer->get_value( 'header_layout_type' );

		if ( 'disable' === $layout && ! is_customize_preview() ) {
			return;
		}

		get_template_part( 'template-parts/header/layout', $layout );
	}
endif;

if ( ! function_exists( 'gutenix_footer_markup' ) ) :
	/**
	 * Footer markup.
	 *
	 * @return void
	 * @since  1.0.0
	 */
	function gutenix_footer_markup() {
		gutenix_theme()->do_location( 'footer', 'template-parts/footer' );
	}
endif;

if ( ! function_exists( 'gutenix_footer_widgets_area_markup' ) ) :
	/**
	 * Footer widgets area markup.
	 *
	 * @return void
	 * @since  1.0.0
	 */
	function gutenix_footer_widgets_area_markup() {
		get_template_part( 'template-parts/footer/widgets-area' );
	}
endif;

if ( ! function_exists( 'gutenix_footer_bar_markup' ) ) :
	/**
	 * Footer bar markup.
	 *
	 * @return void
	 * @since  1.0.0
	 */
	function gutenix_footer_bar_markup() {
		$layout = gutenix_theme()->customizer->get_value( 'footer_layout_type' );

		if ( 'disable' === $layout && ! is_customize_preview() ) {
			return;
		}

		get_template_part( 'template-parts/footer/layout', $layout );
	}
endif;

if ( ! function_exists( 'gutenix_welcome_notice_content' ) ) :
	/**
	 * Render welcome notice content
	 */
	function gutenix_welcome_notice_content() {

		if ( ! class_exists( 'TGM_Plugin_Activation' ) ) {
			return;
		}

		$tgmpa = TGM_Plugin_Activation::get_instance();
		$pages_to_skip_notice = [
			'tgmpa-install-plugins',
			'gutenix-wizard'
		];
		$action_link = '';
		$action_link_label = __( 'Install Gutenix Wizard', 'gutenix' );
		$plugin_slug = 'gutenix-wizard';
		$is_plugin_active = $tgmpa->is_plugin_active( $plugin_slug );

		if ( $is_plugin_active ) {
			return;
		}

		if ( isset( $_GET['page'] ) && in_array( $_GET['page'], $pages_to_skip_notice ) ) {
			return;
		}

		if ( ! $is_plugin_active ) {
			$action_link = $tgmpa->get_tgmpa_url();
		}

		if ( $tgmpa->is_plugin_installed( $plugin_slug ) && ! $is_plugin_active ) {
			$action_link_label = __( 'Activate Gutenix Wizard', 'gutenix' );
		}
		?>

		<div id="message" class="updated notice-info gutenix-message">
			<a class="gutenix-message-close notice-dismiss" href="<?php echo esc_url( wp_nonce_url( remove_query_arg( array( 'activated' ), add_query_arg( 'gutenix-hide-notice', 'welcome' ) ), 'gutenix_hide_notices_nonce', '_gutenix_notice_nonce' ) ); ?>">
				<?php echo esc_html__( 'Dismiss', 'gutenix' ); ?>
			</a>
			<div class="gutenix-message-wrapper">
				<img class="gutenix-screenshot" src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/welcome-banner.svg" alt="<?php echo esc_attr__( 'Gutenix WordPress Theme', 'gutenix' ); ?>"/>
				<div class="gutenix-getting-started-notice">
					<h2><?php echo esc_html__( 'One final step required - install and activate Gutenix Wizard to get started with the theme.', 'gutenix' ); ?></h2>
					<p><?php echo esc_html__( 'The Wizard will help you choose, import, and setup the needed starter template in minutes!', 'gutenix' ); ?></p>
					<?php
					if ( $action_link ):
						?>
						<a class="btn-get-started button button-primary button-hero" href="<?php echo esc_url( $action_link ); ?>">
							<?php echo esc_html( $action_link_label ); ?>
						</a>
					<?php
					endif;
					?>
				</div>
			</div>
		</div>
		<?php
	}
endif;

/**
 * Replace macroses in text widget.
 *
 * @param string $text Default text.
 *
 * @return string
 */
function gutenix_render_widget_macros( $text ) {
	$uploads = wp_upload_dir();

	$data = array(
		'/%%uploads_url%%/' => $uploads['baseurl'],
		'/%%home_url%%/'    => esc_url( home_url( '/' ) ),
		'/%%theme_url%%/'   => get_stylesheet_directory_uri(),
	);

	return preg_replace( array_keys( $data ), array_values( $data ), $text );
}