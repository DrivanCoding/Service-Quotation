<?php
/**
 * Gutenix Theme utils class
 *
 * @package    Gutenix
 * @subpackage Class
 */

if ( ! class_exists( 'Gutenix_Utils' ) ) {

	/**
	 * Define Gutenix_Utils class
	 */
	class Gutenix_Utils {

		/**
		 * Get font styles
		 *
		 * @since  1.0.0
		 * @return array
		 */
		public static function get_font_styles() {
			return apply_filters( 'gutenix_get_font_styles', array(
				'normal'  => esc_html__( 'Normal', 'gutenix' ),
				'italic'  => esc_html__( 'Italic', 'gutenix' ),
				'oblique' => esc_html__( 'Oblique', 'gutenix' ),
				'inherit' => esc_html__( 'Inherit', 'gutenix' ),
			) );
		}

		/**
		 * Get font weights
		 *
		 * @since  1.0.0
		 * @return array
		 */
		public static function get_font_weight() {
			return apply_filters( 'gutenix_get_font_weight', array(
				'100' => '100',
				'200' => '200',
				'300' => '300',
				'400' => '400',
				'500' => '500',
				'600' => '600',
				'700' => '700',
				'800' => '800',
				'900' => '900',
			) );
		}

		/**
		 * Get character sets
		 *
		 * @since  1.0.0
		 * @return array
		 */
		public static function get_character_sets() {
			return apply_filters( 'gutenix_get_font_character_sets', array(
				'latin'        => esc_html__( 'Latin', 'gutenix' ),
				'greek'        => esc_html__( 'Greek', 'gutenix' ),
				'greek-ext'    => esc_html__( 'Greek Extended', 'gutenix' ),
				'vietnamese'   => esc_html__( 'Vietnamese', 'gutenix' ),
				'cyrillic-ext' => esc_html__( 'Cyrillic Extended', 'gutenix' ),
				'latin-ext'    => esc_html__( 'Latin Extended', 'gutenix' ),
				'cyrillic'     => esc_html__( 'Cyrillic', 'gutenix' ),
			) );
		}

		/**
		 * Get text aligns
		 *
		 * @since  1.0.0
		 * @return array
		 */
		public static function get_text_aligns() {
			return apply_filters( 'gutenix_get_text_aligns', array(
				'inherit' => esc_html__( 'Inherit', 'gutenix' ),
				'center'  => esc_html__( 'Center', 'gutenix' ),
				'justify' => esc_html__( 'Justify', 'gutenix' ),
				'left'    => esc_html__( 'Left', 'gutenix' ),
				'right'   => esc_html__( 'Right', 'gutenix' ),
			) );
		}

		/**
		 * Get text align options.
		 *
		 * @since  1.0.0
		 * @return array
		 */
		public static function get_text_align_options() {
			return apply_filters( 'gutenix_text_align_options', array(
				'' => array(
					'icon' => 'removeformatting'
				),
				'left' => array(
					'icon' => 'alignleft'
				),
				'center' => array(
					'icon' => 'aligncenter'
				),
				'right' => array(
					'icon' => 'alignright'
				),
				'justify' => array(
					'icon' => 'justify'
				)
			) );
		}

		/**
		 * Get text transform
		 *
		 * @since  1.0.0
		 * @return array
		 */
		public static function get_text_transform() {
			return apply_filters( 'gutenix_get_text_transform', array(
				'none' 			=> esc_html__( 'None', 'gutenix' ),
				'capitalize' 	=> esc_html__( 'Capitalize', 'gutenix' ),
				'uppercase' 	=> esc_html__( 'Uppercase', 'gutenix' ),
				'lowercase' 	=> esc_html__( 'Lowercase', 'gutenix' ),
				'initial' 		=> esc_html__( 'Initial', 'gutenix' ),
				'inherit' 		=> esc_html__( 'Inherit', 'gutenix' )
			) );
		}
		
		/**
		 * Get background size
		 *
		 * @since  1.0.0
		 * @return array
		 */
		public static function get_bg_size() {
			return apply_filters( 'gutenix_get_bg_size', array(
				'auto'    => esc_html__( 'Auto', 'gutenix' ),
				'cover'   => esc_html__( 'Cover', 'gutenix' ),
				'contain' => esc_html__( 'Contain', 'gutenix' ),
			) );
		}

		/**
		 * Get background position
		 *
		 * @since  1.0.0
		 * @return array
		 */
		public static function get_bg_position() {
			return apply_filters( 'gutenix_get_bg_position', array(
				'top-left'      => esc_html__( 'Top Left', 'gutenix' ),
				'top-center'    => esc_html__( 'Top Center', 'gutenix' ),
				'top-right'     => esc_html__( 'Top Right', 'gutenix' ),
				'center-left'   => esc_html__( 'Middle Left', 'gutenix' ),
				'center'        => esc_html__( 'Middle Center', 'gutenix' ),
				'center-right'  => esc_html__( 'Middle Right', 'gutenix' ),
				'bottom-left'   => esc_html__( 'Bottom Left', 'gutenix' ),
				'bottom-center' => esc_html__( 'Bottom Center', 'gutenix' ),
				'bottom-right'  => esc_html__( 'Bottom Right', 'gutenix' ),
			) );
		}

		/**
		 * Get background repeat
		 *
		 * @since  1.0.0
		 * @return array
		 */
		public static function get_bg_repeat() {
			return apply_filters( 'gutenix_get_bg_repeat', array(
				'no-repeat' => esc_html__( 'No Repeat', 'gutenix' ),
				'repeat'    => esc_html__( 'Tile', 'gutenix' ),
				'repeat-x'  => esc_html__( 'Tile Horizontally', 'gutenix' ),
				'repeat-y'  => esc_html__( 'Tile Vertically', 'gutenix' ),
			) );
		}

		/**
		 * Get background attachment
		 *
		 * @since  1.0.0
		 * @return array
		 */
		public static function get_bg_attachment() {
			return apply_filters( 'gutenix_get_bg_attachment', array(
				'scroll' => esc_html__( 'Scroll', 'gutenix' ),
				'fixed'  => esc_html__( 'Fixed', 'gutenix' ),
			) );
		}

		/**
		 * Get page layout options.
		 *
		 * @since  1.0.0
		 * @return array
		 */
		public static function get_page_layout_options() {
			return apply_filters( 'gutenix_page_layout_options', array(
				'boxed-content-sidebar' => array(
					'url' 		=> get_theme_file_uri( 'inc/customizer/assets/img/rs.jpg' ),
					'label' 	=> esc_html__( 'Right Sidebar', 'gutenix' )
				),
				'boxed-sidebar-content' => array(
					'url' 		=> get_theme_file_uri( 'inc/customizer/assets/img/ls.jpg' ),
					'label' 	=> esc_html__( 'Left Sidebar', 'gutenix' )
				),
				'full-width' => array(
					'url' 		=> get_theme_file_uri( 'inc/customizer/assets/img/fw.jpg' ),
					'label' 	=> esc_html__( 'Full Width', 'gutenix' )
				),
				'boxed-full-width' => array(
					'url' 		=> get_theme_file_uri( 'inc/customizer/assets/img/bd.jpg' ),
					'label' 	=> esc_html__( 'Boxed / No Sidebar', 'gutenix' )
				),
			) );
		}

		/**
		 * Get sidebar
		 *
		 * @since  1.0.0
		 * @return array
		 */
		public static function get_page_sidebar_options() {
			
			$arraySidebar = array(
				'sidebar'  	=> esc_html__('Sidebar', 'gutenix'),
			);
			
			// Dynamic Sidebar Generator
			$sidebars = get_theme_mod( 'sidebar_dynamic_generator' );

			if ( !empty( $sidebars ) ) {
				foreach ( explode('|', $sidebars) as $sidebar ) {
					
					$sidebar_id = gutenix_generate_slug( $sidebar, 45 );

					$arraySidebar[$sidebar_id] = $sidebar;
				}
			}

			return apply_filters( 'gutenix_page_sidebar_options', $arraySidebar );
		}

		/**
		 * Get page layout options.
		 *
		 * @since  1.0.0
		 * @return array
		 */
		public static function get_boxed_wide_layout_options() {
			return apply_filters( 'gutenix_boxed_wide_layout_options', array(
				'full-width' => array(
					'url' 		=> get_theme_file_uri( 'inc/customizer/assets/img/fw.jpg' ),
					'label' 	=> esc_html__( 'Full Width', 'gutenix' )
				),
				'boxed-full-width' => array(
					'url' 		=> get_theme_file_uri( 'inc/customizer/assets/img/bd.jpg' ),
					'label' 	=> esc_html__( 'Boxed / No Sidebar', 'gutenix' )
				),
			) );
		}

		/**
		 * Get header layout options.
		 *
		 * @since  1.0.0
		 * @return array
		 */
		public static function get_header_layout_options() {
			return apply_filters( 'gutenix_header_layout_options', array(
				'disable' 	=> esc_html__( 'Disable', 'gutenix' ),
				'style-1' 	=> esc_html__( 'Style 1', 'gutenix' ),
				'style-2' 	=> esc_html__( 'Style 2', 'gutenix' ),
				'style-3' 	=> esc_html__( 'Style 3', 'gutenix' ),
				'style-4' 	=> esc_html__( 'Style 4', 'gutenix' ),
				'style-5' 	=> esc_html__( 'Style 5', 'gutenix' ),
				'style-6' 	=> esc_html__( 'Style 6', 'gutenix' ),
				'style-7' 	=> esc_html__( 'Style 7', 'gutenix' ),
				'style-8' 	=> esc_html__( 'Style 8', 'gutenix' ),
				'style-9' 	=> esc_html__( 'Style 9 (Logo by Center)', 'gutenix' ),
				// 'custom' 	=> esc_html__( 'Custom', 'gutenix' ),
			) );
		}

		/**
		 * Get header hamburger panel layout.
		 *
		 * @since  1.0.0
		 * @return array
		 */
		public static function get_header_hamburger_panel_layouts() {
			return apply_filters( 'gutenix_header_hamburger_panel_layouts', array( 'style-7', 'style-8' ) );
		}

		/**
		 * Get custom logo arguments.
		 *
		 * @since  1.0.0
		 * @return array
		 */
		public static function get_custom_logo_args() {
			return apply_filters( 'gutenix_custom_logo_args', array(
				'width'       => 250,
				'height'      => 250,
				'flex-width'  => true,
				'flex-height' => true,
			) );
		}

		/**
		 * Get footer layout options.
		 *
		 * @since  1.0.0
		 * @return array
		 */
		public static function get_footer_layout_options() {
			return apply_filters( 'gutenix_footer_layout_options', array(
				'disable' 	=> esc_html__( 'Disable', 'gutenix' ),
				'style-1' 	=> esc_html__( 'Style 1', 'gutenix' ),
				'style-2' 	=> esc_html__( 'Style 2', 'gutenix' ),
				// 'custom' 	=> esc_html__( 'Custom', 'gutenix' ),
			) );
		}

		/**
		 * Get custom logo labels.
		 *
		 * @since  1.0.0
		 * @return array
		 */
		public static function get_custom_logo_labels() {
			return apply_filters( 'gutenix_custom_logo_labels', array(
				'select'       => esc_html__( 'Select logo', 'gutenix' ),
				'change'       => esc_html__( 'Change logo', 'gutenix' ),
				'remove'       => esc_html__( 'Remove', 'gutenix' ),
				'default'      => esc_html__( 'Default', 'gutenix' ),
				'placeholder'  => esc_html__( 'No logo selected', 'gutenix' ),
				'frame_title'  => esc_html__( 'Select logo', 'gutenix' ),
				'frame_button' => esc_html__( 'Choose logo', 'gutenix' ),
			) );
		}

		/**
		 * Get share networks list
		 *
		 * @since  1.0.0
		 * @return array
		 */
		public static function get_share_networks_options() {
			return apply_filters( 'gutenix_share_networks_options', array(
				'facebook' 		=> esc_html__( 'Facebook', 'gutenix' ),
				'twitter' 		=> esc_html__( 'Twitter', 'gutenix' ),
				'linkedin' 		=> esc_html__( 'LinkedIn', 'gutenix' ),
				'pinterest' 	=> esc_html__( 'Pinterest', 'gutenix' ),
				'tumblr' 		=> esc_html__( 'Tumblr', 'gutenix' ),
				'vk' 			=> esc_html__( 'VKontakte', 'gutenix' ),
				'whatsapp' 		=> esc_html__( 'WhatsApp', 'gutenix' ),
				'email' 		=> esc_html__( 'Email', 'gutenix' ),
				'print' 		=> esc_html__( 'Print', 'gutenix' ),
			) );
		}

		/**
		 * Get default footer copyright text.
		 *
		 * @since  1.0.0
		 * @return string
		 */
		public static function get_default_footer_copyright() {
			return apply_filters(
				'gutenix_default_footer_copyright_text',
				esc_html__( 'Copyright &copy; %%year%% %%site-name%%.', 'gutenix' )
			);
		}

		/**
		 * Output content method.
		 *
		 * @since  1.0.0
		 * @param  string $content Content.
		 * @param  bool   $echo    Print content or return.
		 * @return string
		 */
		public static function output_method( $content = '', $echo = false ) {
			if ( ! filter_var( $echo, FILTER_VALIDATE_BOOLEAN ) ) {
				return $content;
			} else {
				echo wp_kses_post( wp_unslash( $content ) );
			}
		}

		/**
		 * Is customize render partials
		 *
		 * @since  1.0.0
		 * @return bool
		 */
		public static function is_render_partials() {
			return isset( $_REQUEST['wp_customize_render_partials'] );
		}

		/**
		 * Render existing macros in passed string.
		 *
		 * @since  1.0.0
		 * @param  string $string String to parse.
		 * @return string
		 */
		public static function render_macros( $string ) {

			static $macros;

			if ( ! $macros ) {
				$macros = apply_filters( 'gutenix_data_macros', array(
					'/%%year%%/'      => date( 'Y' ),
					'/%%date%%/'      => date( get_option( 'date_format' ) ),
					'/%%site-name%%/' => get_bloginfo( 'name' ),
					'/%%home_url%%/'  => esc_url( home_url( '/' ) ),
					'/%%theme_url%%/' => get_stylesheet_directory_uri(),
				) );
			}

			return preg_replace( array_keys( $macros ), array_values( $macros ), $string );
		}

		/**
		 * Get html attributes string
		 *
		 * @since  1.0.0
		 * @param  array $attributes Html attributes.
		 * @return string
		 */
		public static function get_html_attributes( array $attributes = array() ) {

			if ( empty( $attributes ) ) {
				return '';
			}

			$rendered_attributes = [];

			foreach ( $attributes as $attribute_key => $attribute_values ) {
				if ( is_array( $attribute_values ) ) {
					$attribute_values = join( ' ', $attribute_values );
				}

				$rendered_attributes[] = sprintf( '%1$s="%2$s"', $attribute_key, esc_attr( $attribute_values ) );
			}

			return join( ' ', $rendered_attributes );
		}

		/**
		 * Get Templates
		 *
		 * @since  1.0.0
		 * @return array
		 */
		public static function get_custom_template( $return = NULL ) {

			$templates 		= array( '&mdash; '. esc_html__( 'Select', 'gutenix' ) .' &mdash;' );
			$get_templates 	= get_posts( array( 'post_type' => $return, 'numberposts' => -1, 'post_status' => 'publish' ) );

			if ( ! empty ( $get_templates ) ) {
				foreach ( $get_templates as $template ) {
					$templates[ $template->ID ] = $template->post_title;
			    }
			}

			return $templates;

		}
	}
}
