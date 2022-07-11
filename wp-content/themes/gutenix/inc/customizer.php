<?php
/**
 * Gutenix Theme Customizer
 *
 * @package Gutenix
 */

/**
 * Retrieve a holder for Customizer options.
 *
 * @since  1.0.0
 * @return array
 */
function gutenix_get_customizer_options() {
	return apply_filters( 'gutenix_get_customizer_options', array(
		'prefix' 		=> 'gutenix',
		'path'          => get_theme_file_path( 'inc/modules/customizer/' ),
		'capability'    => 'edit_theme_options',
		'type'          => 'theme_mod',
		'fonts_manager' => gutenix_theme()->fonts_manager,
		'options'       => array(

			/** `Site Identity` section */
			'show_tagline' => array(
				'title' 			=> esc_html__( 'Show tagline after logo', 'gutenix' ),
				'section' 			=> 'title_tagline',
				'priority' 			=> 60,
				'default' 			=> false,
				'field' 			=> 'checkbox',
				'type' 				=> 'control',
			),
			'tagline_position' => array(
				'title' 			=> esc_html__( 'Tagline Position', 'gutenix' ),
				'section' 			=> 'title_tagline',
				'priority' 			=> 65,
				'default' 			=> '',
				'field' 			=> 'select',
				'type' 				=> 'control',
				'choices' 			=> array(
					'' 		 => esc_html__( 'Block', 'gutenix' ),
					'inline' => esc_html__( 'Inline', 'gutenix' ),
				),
				'conditions' 		=> array(
					'show_tagline' => true,
				),
				'dynamic_css' 		=> true,
			),

			/** `Site Title` Typography */
			'Logo_typography_heading' => array(
				'title' 			=> esc_html__( 'Site Title Typography', 'gutenix' ),
				'section' 			=> 'title_tagline',
				'priority' 			=> 65,
				'field' 			=> 'gutenix-heading',
				'type' 				=> 'control',
			),
			'logo_font_family' => array(
				'title' 			=> esc_html__( 'Font Family', 'gutenix' ),
				'section' 			=> 'title_tagline',
				'priority' 			=> 65,
				'default' 			=> 'Libre Franklin, sans-serif',
				'field' 			=> 'fonts',
				'type' 				=> 'control',
				'dynamic_css' 		=> true,
			),
			'logo_character_set' => array(
				'title' 			=> esc_html__( 'Character Set', 'gutenix' ),
				'description' 		=> esc_html__( 'Important: Not all fonts support every characters and font-weight.', 'gutenix' ),
				'section' 			=> 'title_tagline',
				'priority' 			=> 65,
				'default' 			=> 'latin',
				'field' 			=> 'select',
				'choices' 			=> Gutenix_Utils::get_character_sets(),
				'type' 				=> 'control',
				'dynamic_css' 		=> true,
			),
			'logo_font_style' => array(
				'title' 			=> esc_html__( 'Font Style', 'gutenix' ),
				'section' 			=> 'title_tagline',
				'priority' 			=> 65,
				'default' 			=> 'normal',
				'field' 			=> 'select',
				'choices' 			=> Gutenix_Utils::get_font_styles(),
				'type' 				=> 'control',
				'dynamic_css' 		=> true,
			),
			'logo_font_weight' => array(
				'title' 			=> esc_html__( 'Font Weight', 'gutenix' ),
				'section' 			=> 'title_tagline',
				'priority' 			=> 65,
				'default' 			=> '900',
				'field' 			=> 'select',
				'choices' 			=> Gutenix_Utils::get_font_weight(),
				'type' 				=> 'control',
				'dynamic_css' 		=> true,
			),
			'logo_font_size' => array(
				'title' 			=> esc_html__( 'Font Size, px', 'gutenix' ),
				'section' 			=> 'title_tagline',
				'priority' 			=> 65,
				'default' 			=> array(
					'desktop' => '26',
					'tablet'  => '',
					'mobile'  => '',
				),
				'field' 			=> 'gutenix-input-responsive',
				'type' 				=> 'control',
				'input_attrs' 		=> array(
					'min' => 0,
				),
				'unit_choices' 		=> '',
				'dynamic_css' 		=> true,
				'sanitize_callback' => 'sanitize_input_responsive',
			),
			'logo_line_height' => array(
				'title' 			=> esc_html__( 'Line Height', 'gutenix' ),
				'section' 			=> 'title_tagline',
				'priority' 			=> 65,
				'default' 			=> '1.2',
				'field' 			=> 'number',
				'input_attrs' 		=> array(
					'min'  => 1.0,
					'max'  => 3.0,
					'step' => 0.1,
				),
				'type' 				=> 'control',
				'dynamic_css' 		=> true,
			),
			'logo_letter_spacing' => array(
				'title' 			=> esc_html__( 'Letter Spacing, px', 'gutenix' ),
				'section' 			=> 'title_tagline',
				'priority' 			=> 65,
				'default' 			=> '0',
				'field' 			=> 'number',
				'input_attrs' 		=> array(
					'min'  => - 10,
					'max'  => 10,
					'step' => 0.1,
				),
				'type' 				=> 'control',
				'dynamic_css' 		=> true,
			),
			'logo_text_transform' => array(
				'title' 			=> esc_html__( 'Text Transform', 'gutenix' ),
				'section' 			=> 'title_tagline',
				'priority' 			=> 65,
				'default' 			=> 'none',
				'field' 			=> 'select',
				'type' 				=> 'control',
				'choices' 			=> Gutenix_Utils::get_text_transform(),
				'dynamic_css' 		=> true,
			),
			'site_title_color' => array(
				'title' 			=> esc_html__( 'Site Title color', 'gutenix' ),
				'section' 			=> 'title_tagline',
				'priority' 			=> 65,
				'default' 			=> '#414756',
				'field' 			=> 'hex_color',
				'type' 				=> 'control',
				'dynamic_css' 		=> true,
			),

			/* Tagline Typography */
			'tagline_typography_heading' => array(
				'title' 			=> esc_html__( 'Tagline Typography', 'gutenix' ),
				'section' 			=> 'title_tagline',
				'priority' 			=> 70,
				'field' 			=> 'gutenix-heading',
				'type' 				=> 'control',
				'conditions' 		=> array(
					'show_tagline' => true,
				),
			),
			'tagline_font_family' => array(
				'title' 			=> esc_html__( 'Font Family', 'gutenix' ),
				'section' 			=> 'title_tagline',
				'priority' 			=> 70,
				'default' 			=> 'Libre Franklin, sans-serif',
				'field' 			=> 'fonts',
				'type' 				=> 'control',
				'dynamic_css' 		=> true,
				'conditions' 		=> array(
					'show_tagline' => true,
				),
			),
			'tagline_character_set' => array(
				'title' 			=> esc_html__( 'Character Set', 'gutenix' ),
				'description' 		=> esc_html__( 'Important: Not all fonts support every characters and font-weight.', 'gutenix' ),
				'section' 			=> 'title_tagline',
				'priority' 			=> 70,
				'default' 			=> 'latin',
				'field' 			=> 'select',
				'choices' 			=> Gutenix_Utils::get_character_sets(),
				'type' 				=> 'control',
				'dynamic_css' 		=> true,
				'conditions' 		=> array(
					'show_tagline' => true,
				),
			),
			'tagline_font_style' => array(
				'title' 			=> esc_html__( 'Font Style', 'gutenix' ),
				'section' 			=> 'title_tagline',
				'priority' 			=> 70,
				'default' 			=> 'normal',
				'field' 			=> 'select',
				'choices' 			=> Gutenix_Utils::get_font_styles(),
				'type' 				=> 'control',
				'dynamic_css' 		=> true,
				'conditions' 		=> array(
					'show_tagline' => true,
				),
			),
			'tagline_font_weight' => array(
				'title' 			=> esc_html__( 'Font Weight', 'gutenix' ),
				'section' 			=> 'title_tagline',
				'priority' 			=> 70,
				'default' 			=> '400',
				'field' 			=> 'select',
				'choices' 			=> Gutenix_Utils::get_font_weight(),
				'type' 				=> 'control',
				'dynamic_css' 		=> true,
				'conditions' 		=> array(
					'show_tagline' => true,
				),
			),
			'tagline_font_size' => array(
				'title' 			=> esc_html__( 'Font Size, px', 'gutenix' ),
				'section' 			=> 'title_tagline',
				'priority' 			=> 70,
				'default' 			=> array(
					'desktop' => '14',
					'tablet'  => '',
					'mobile'  => '',
				),
				'field' 			=> 'gutenix-input-responsive',
				'type' 				=> 'control',
				'input_attrs' 		=> array(
					'min' => 0,
				),
				'unit_choices' 		=> '',
				'dynamic_css' 		=> true,
				'sanitize_callback' => 'sanitize_input_responsive',
				'conditions' 		=> array(
					'show_tagline' => true,
				),
			),
			'tagline_line_height' => array(
				'title' 			=> esc_html__( 'Line Height', 'gutenix' ),
				'section' 			=> 'title_tagline',
				'priority' 			=> 70,
				'default' 			=> '1.3',
				'field' 			=> 'number',
				'input_attrs' 		=> array(
					'min'  => 1.0,
					'max'  => 3.0,
					'step' => 0.1,
				),
				'type' 				=> 'control',
				'dynamic_css' 		=> true,
				'conditions' 		=> array(
					'show_tagline' => true,
				),
			),
			'tagline_letter_spacing' => array(
				'title' 			=> esc_html__( 'Letter Spacing, px', 'gutenix' ),
				'section' 			=> 'title_tagline',
				'priority' 			=> 70,
				'default' 			=> '0',
				'field' 			=> 'number',
				'input_attrs' 		=> array(
					'min'  => - 10,
					'max'  => 10,
					'step' => 0.1,
				),
				'type' 				=> 'control',
				'dynamic_css' 		=> true,
				'conditions' 		=> array(
					'show_tagline' => true,
				),
			),
			'tagline_text_transform' => array(
				'title' 			=> esc_html__( 'Text Transform', 'gutenix' ),
				'section' 			=> 'title_tagline',
				'priority' 			=> 70,
				'default' 			=> 'none',
				'field' 			=> 'select',
				'type' 				=> 'control',
				'choices' 			=> Gutenix_Utils::get_text_transform(),
				'dynamic_css' 		=> true,
				'conditions' 		=> array(
					'show_tagline' => true,
				),
			),
			'tagline_color' => array(
				'title' 			=> esc_html__( 'Tagline Color', 'gutenix' ),
				'section' 			=> 'title_tagline',
				'priority' 			=> 70,
				'default' 			=> '#a0a3aa',
				'field' 			=> 'hex_color',
				'type' 				=> 'control',
				'dynamic_css' 		=> true,
				'conditions' 		=> array(
					'show_tagline' => true,
				),
			),

			/** `General Settings` panel */
			'general_settings' => array(
				'title' 			=> esc_html__( 'General Settings', 'gutenix' ),
				'priority' 			=> 40,
				'type' 				=> 'panel',
			),

			/** `Page Layout` section */
			'page_layout' => array(
				'title' 			=> esc_html__( 'Page Layout', 'gutenix' ),
				'priority' 			=> 10,
				'type' 				=> 'section',
				'panel' 			=> 'general_settings',
			),
			'container_width' => array(
				'title' 			=> esc_html__( 'Container width, px', 'gutenix' ),
				'section' 			=> 'page_layout',
				'priority' 			=> 5,
				'default' 			=> 1200,
				'field' 			=> 'gutenix-range',
				'input_attrs' 		=> array(
					'min'  => 700,
					'max'  => 2000,
					'step' => 1,
				),
				'type' 				=> 'control',
				'dynamic_css' 		=> true,
			),
			'layout_type_pages' => array(
				'title' 			=> esc_html__( 'Layout for Pages', 'gutenix' ),
				'section' 			=> 'page_layout',
				'priority' 			=> 15,
				'default' 			=> 'boxed-full-width',
				'field' 			=> 'gutenix-radio-image',
				'choices' 			=> Gutenix_Utils::get_page_layout_options(),
				'type' 				=> 'control',
			),
			'content_padding' => array(
				'title' 			=> esc_html__( 'Content Padding, px', 'gutenix' ),
				'section' 			=> 'page_layout',
				'priority' 			=> 20,
				'field' 			=> 'gutenix-dimensions',
				'type' 				=> 'control',
				'linked_choices' 	=> true,
				'unit_choices' 		=> '',
				'choices' 			=> array(
					'top'    => esc_html__( 'Top', 'gutenix' ),
					'bottom' => esc_html__( 'Bottom', 'gutenix' ),
				),
				'default' 			=> array(
					'desktop' => array( 'top' => '40', 'bottom' => '70' ),
					'tablet'  => array( 'top' => '', 'bottom' => '' ),
					'mobile'  => array( 'top' => '', 'bottom' => ''	),
				),
				'input_attrs' 		=> array(
					'min'  => 0,
					'max'  => 400,
					'step' => 1,
				),
				'sanitize_callback' => 'gutenix_sanitize_dimensions',
				'dynamic_css' 		=> true,
			),

			/** `Page Title` section */
			'page_title_section' => array(
				'title' 			=> esc_html__( 'Page Title', 'gutenix' ),
				'priority' 			=> 20,
				'type' 				=> 'section',
				'panel' 			=> 'general_settings',
			),
			'show_page_title' => array(
				'title' 			=> esc_html__( 'Show Page Title', 'gutenix' ),
				'section' 			=> 'page_title_section',
				'default' 			=> true,
				'field' 			=> 'gutenix-toggle-checkbox',
				'type' 				=> 'control',
				'sanitize_callback' => 'gutenix_sanitize_checkbox',
			),

			/** `ToTop Button` section */
			'totop_button' => array(
				'title'    => esc_html__( 'ToTop Button', 'gutenix' ),
				'priority' => 20,
				'type'     => 'section',
				'panel'    => 'general_settings',
			),
			'show_totop_button' => array(
				'title'   => esc_html__( 'Show ToTop button', 'gutenix' ),
				'section' => 'totop_button',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'totop_bg_color' => array(
				'title'       => esc_html__( 'Background Color', 'gutenix' ),
				'section'     => 'totop_button',
				'default'     => '#3260b1',
				'field'       => 'hex_color',
				'type'        => 'control',
				'dynamic_css' => true,
				'conditions'  => array(
					'show_totop_button' => true,
				),
			),
			'totop_icon_color' => array(
				'title'       => esc_html__( 'Icon Color', 'gutenix' ),
				'section'     => 'totop_button',
				'default'     => '#ffffff',
				'field'       => 'hex_color',
				'type'        => 'control',
				'dynamic_css' => true,
				'conditions'  => array(
					'show_totop_button' => true,
				),
			),
			'totop_bg_color_hover' => array(
				'title'       => esc_html__( 'Background Color on Hover', 'gutenix' ),
				'section'     => 'totop_button',
				'default'     => '#414756',
				'field'       => 'hex_color',
				'type'        => 'control',
				'dynamic_css' => true,
				'conditions'  => array(
					'show_totop_button' => true,
				),
			),
			'totop_icon_color_hover' => array(
				'title'       => esc_html__( 'Icon Color on Hover', 'gutenix' ),
				'section'     => 'totop_button',
				'default'     => '#ffffff',
				'field'       => 'hex_color',
				'type'        => 'control',
				'dynamic_css' => true,
				'conditions'  => array(
					'show_totop_button' => true,
				),
			),
			'totop_vertical_padding' => array(
				'title'       => esc_html__( 'Vertical Padding, px', 'gutenix' ),
				'section'     => 'totop_button',
				'default'     => '10',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 0,
					'max'  => 100,
					'step' => 1,
				),
				'type'        => 'control',
				'dynamic_css' => true,
				'conditions'  => array(
					'show_totop_button' => true,
				),
			),
			'totop_horizontal_padding' => array(
				'title'       => esc_html__( 'Horizontal Padding, px', 'gutenix' ),
				'section'     => 'totop_button',
				'default'     => '10',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 0,
					'max'  => 100,
					'step' => 1,
				),
				'type'        => 'control',
				'dynamic_css' => true,
				'conditions'  => array(
					'show_totop_button' => true,
				),
			),
			'totop_border_radius' => array(
				'title'       => esc_html__( 'Border Radius, px', 'gutenix' ),
				'section'     => 'totop_button',
				'default'     => '4',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 0,
					'max'  => 200,
					'step' => 1,
				),
				'type'        => 'control',
				'dynamic_css' => true,
				'conditions'  => array(
					'show_totop_button' => true,
				),
			),

			/** `Preloader` section */
			'page_preloader_section' => array(
				'title' 		=> esc_html__( 'Preloader', 'gutenix' ),
				'priority' 		=> 30,
				'type' 			=> 'section',
				'panel' 		=> 'general_settings',
			),
			'page_preloader_type' => array(
				'title' 		=> esc_html__( 'Type', 'gutenix' ),
				'section' 		=> 'page_preloader_section',
				'default' 		=> '',
				'field' 		=> 'select',
				'type' 			=> 'control',
				'choices' 		=> array(
					'' 			=> esc_html__( 'Disable', 'gutenix' ),
					'default' 	=> esc_html__( 'Default', 'gutenix' ),
					'custom' 	=> esc_html__( 'Custom', 'gutenix' ),
				),
			),
			'page_preloader_html' => array(
				'title' 		=> esc_html__( 'Custom HTML Code Field', 'gutenix' ),
				'description' 	=> esc_html__( 'Custom styles (CSS) for the Custom Preloader add in the "Additional CSS" field', 'gutenix' ),
				'section' 		=> 'page_preloader_section',
				'default' 		=> '',
				'field' 		=> 'textarea',
				'type' 			=> 'control',
				'conditions' 	=> array(
					'page_preloader_type' => 'custom',
				),
			),

			/** `Mobile Browsers` section */
			'mobile_browsers' => array(
				'title'    => esc_html__( 'Mobile Browsers', 'gutenix' ),
				'priority' => 25,
				'type'     => 'section',
				'panel'    => 'general_settings',
			),
			'address_bar_color' => array(
				'title'       => esc_html__( 'Address Bar Color', 'gutenix' ),
				'description' => esc_html__( 'Specifies the color of address bar and toolbar on mobile browsers.', 'gutenix' ),
				'section'     => 'mobile_browsers',
				'default'     => '#3260B1',
				'field'       => 'hex_color',
				'type'        => 'control',
			),

			/** `Color Scheme` panel */
			'color_scheme' => array(
				'title'       => esc_html__( 'Color Scheme', 'gutenix' ),
				'description' => esc_html__( 'Configure Color Scheme', 'gutenix' ),
				'priority'    => 50,
				'type'        => 'section',
			),
			'primary_color' => array(
				'title'       => esc_html__( 'Primary color', 'gutenix' ),
				'section'     => 'color_scheme',
				'default'     => '#3260B1',
				'field'       => 'hex_color',
				'type'        => 'control',
				'dynamic_css' => true,
			),
			'secondary_color' => array(
				'title'       => esc_html__( 'Secondary color', 'gutenix' ),
				'section'     => 'color_scheme',
				'default'     => '#414756',
				'field'       => 'hex_color',
				'type'        => 'control',
				'dynamic_css' => true,
			),
			'secondary_text_color' => array(
				'title'       => esc_html__( 'Secondary Text color', 'gutenix' ),
				'section'     => 'color_scheme',
				'default'     => '#a0a3aa',
				'field'       => 'hex_color',
				'type'        => 'control',
				'dynamic_css' => true,
			),
			'invert_text_color' => array(
				'title'       => esc_html__( 'Invert Text color', 'gutenix' ),
				'section'     => 'color_scheme',
				'default'     => '#ffffff',
				'field'       => 'hex_color',
				'type'        => 'control',
				'dynamic_css' => true,
			),
			'link_color' => array(
				'title'       => esc_html__( 'Link color', 'gutenix' ),
				'section'     => 'color_scheme',
				'default'     => '#3260B1',
				'field'       => 'hex_color',
				'type'        => 'control',
				'dynamic_css' => true,
			),
			'link_hover_color' => array(
				'title'       => esc_html__( 'Link hover color', 'gutenix' ),
				'section'     => 'color_scheme',
				'default'     => '#414756',
				'field'       => 'hex_color',
				'type'        => 'control',
				'dynamic_css' => true,
			),

			/** `Typography Settings` panel */
			'typography' => array(
				'title'       => esc_html__( 'Typography', 'gutenix' ),
				'description' => esc_html__( 'Configure typography settings', 'gutenix' ),
				'priority'    => 55,
				'type'        => 'panel',
			),

			/** `Body text` section */
			'body_typography' => array(
				'title' => esc_html__( 'Body Text', 'gutenix' ),
				'panel' => 'typography',
				'type'  => 'section',
			),
			'body_font_family' => array(
				'title'       => esc_html__( 'Font Family', 'gutenix' ),
				'section'     => 'body_typography',
				'default'     => 'Libre Franklin, sans-serif',
				'field'       => 'fonts',
				'type'        => 'control',
				'dynamic_css' => true,
			),
			'body_character_set' => array(
				'title'       => esc_html__( 'Character Set', 'gutenix' ),
				'description' => esc_html__( 'Important: Not all fonts support every characters and font-weight.', 'gutenix' ),
				'section'     => 'body_typography',
				'default'     => 'latin',
				'field'       => 'select',
				'choices'     => Gutenix_Utils::get_character_sets(),
				'type'        => 'control',
				'dynamic_css' => true,
			),
			'body_font_style' => array(
				'title'       => esc_html__( 'Font Style', 'gutenix' ),
				'section'     => 'body_typography',
				'default'     => 'normal',
				'field'       => 'select',
				'choices'     => Gutenix_Utils::get_font_styles(),
				'type'        => 'control',
				'dynamic_css' => true,
			),
			'body_font_weight' => array(
				'title'       => esc_html__( 'Font Weight', 'gutenix' ),
				'section'     => 'body_typography',
				'default'     => '400',
				'field'       => 'select',
				'choices'     => Gutenix_Utils::get_font_weight(),
				'type'        => 'control',
				'dynamic_css' => true,
			),
			'body_font_size' => array(
				'title'       => esc_html__( 'Font Size, px', 'gutenix' ),
				'section'     => 'body_typography',
				'default' 		=> array(
					'desktop' => '20',
					'tablet'  => '',
					'mobile'  => '',
				),
				'field'       => 'gutenix-input-responsive',
				'type'        => 'control',
				'input_attrs' => array(
					'min' => 0,
				),
				'unit_choices' => '',
				'dynamic_css' => true,
				'sanitize_callback' => 'sanitize_input_responsive',
			),
			'body_line_height' => array(
				'title'       => esc_html__( 'Line Height', 'gutenix' ),
				'section'     => 'body_typography',
				'default'     => '1.6',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 1.0,
					'max'  => 3.0,
					'step' => 0.1,
				),
				'type'        => 'control',
				'dynamic_css' => true,
			),
			'body_letter_spacing' => array(
				'title'       => esc_html__( 'Letter Spacing, px', 'gutenix' ),
				'section'     => 'body_typography',
				'default'     => '0',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => -10,
					'max'  => 10,
					'step' => 0.1,
				),
				'type'        => 'control',
				'dynamic_css' => true,
			),
			'body_text_align' => array(
				'title'       => esc_html__( 'Text Align', 'gutenix' ),
				'section'     => 'body_typography',
				'default'     => 'left',
				'field'       => 'gutenix-radio-image',
				'type'        => 'control',
				'choices'     => Gutenix_Utils::get_text_align_options(),
				'dynamic_css' => true,
			),
			'body_text_transform' => array(
				'title'       => esc_html__( 'Text Transform', 'gutenix' ),
				'section'     => 'body_typography',
				'default'     => 'none',
				'field'       => 'select',
				'type'        => 'control',
				'choices'     => Gutenix_Utils::get_text_transform(),
				'dynamic_css' => true,
			),
			'primary_text_color' => array(
				'title'       => esc_html__( 'Text color', 'gutenix' ),
				'section'     => 'body_typography',
				'default'     => '#414756',
				'field'       => 'hex_color',
				'type'        => 'control',
				'dynamic_css' => true,
			),

			/** `Headings` section */
			'headings_typography' => array(
				'title' => esc_html__( 'Headings', 'gutenix' ),
				'panel' => 'typography',
				'type'  => 'section',
			),
			'h1_typography_heading' => array(
				'title' 	=> esc_html__( 'H1 Heading', 'gutenix' ),
				'section' 	=> 'headings_typography',
				'field' 	=> 'gutenix-heading',
				'type' 		=> 'control',
			),
			'h1_font_family' => array(
				'title'       => esc_html__( 'Font Family', 'gutenix' ),
				'section'     => 'headings_typography',
				'default'     => 'Libre Franklin, sans-serif',
				'field'       => 'fonts',
				'type'        => 'control',
				'dynamic_css' => true,
			),
			'h1_character_set' => array(
				'title'       => esc_html__( 'Character Set', 'gutenix' ),
				'description' => esc_html__( 'Important: Not all fonts support every characters and font-weight.', 'gutenix' ),
				'section'     => 'headings_typography',
				'default'     => 'latin',
				'field'       => 'select',
				'choices'     => Gutenix_Utils::get_character_sets(),
				'type'        => 'control',
				'dynamic_css' => true,
			),
			'h1_font_style' => array(
				'title'       => esc_html__( 'Font Style', 'gutenix' ),
				'section'     => 'headings_typography',
				'default'     => 'normal',
				'field'       => 'select',
				'choices'     => Gutenix_Utils::get_font_styles(),
				'type'        => 'control',
				'dynamic_css' => true,
			),
			'h1_font_weight' => array(
				'title'       => esc_html__( 'Font Weight', 'gutenix' ),
				'section'     => 'headings_typography',
				'default'     => '700',
				'field'       => 'select',
				'choices'     => Gutenix_Utils::get_font_weight(),
				'type'        => 'control',
				'dynamic_css' => true,
			),
			'h1_font_size' => array(
				'title'       => esc_html__( 'Font Size, px', 'gutenix' ),
				'section'     => 'headings_typography',
				'default' 		=> array(
					'desktop' => '64',
					'tablet'  => '',
					'mobile'  => '',
				),
				'field'       => 'gutenix-input-responsive',
				'type'        => 'control',
				'input_attrs' => array(
					'min' => 0,
				),
				'unit_choices' => '',
				'dynamic_css' => true,
				'sanitize_callback' => 'sanitize_input_responsive',
			),
			'h1_line_height' => array(
				'title'       => esc_html__( 'Line Height', 'gutenix' ),
				'section'     => 'headings_typography',
				'default'     => '1.2',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 1.0,
					'max'  => 3.0,
					'step' => 0.1,
				),
				'type'        => 'control',
				'dynamic_css' => true,
			),
			'h1_letter_spacing' => array(
				'title'       => esc_html__( 'Letter Spacing, px', 'gutenix' ),
				'section'     => 'headings_typography',
				'default'     => '0',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => -10,
					'max'  => 10,
					'step' => 0.1,
				),
				'type'        => 'control',
				'dynamic_css' => true,
			),
			'h1_text_align' => array(
				'title'       => esc_html__( 'Text Align', 'gutenix' ),
				'section'     => 'headings_typography',
				'default'     => 'inherit',
				'field'       => 'gutenix-radio-image',
				'type'        => 'control',
				'choices'     => Gutenix_Utils::get_text_align_options(),
				'dynamic_css' => true,
			),
			'h1_text_transform' => array(
				'title'       => esc_html__( 'Text Transform', 'gutenix' ),
				'section'     => 'headings_typography',
				'default'     => 'none',
				'field'       => 'select',
				'type'        => 'control',
				'choices'     => Gutenix_Utils::get_text_transform(),
				'dynamic_css' => true,
			),
			'h1_text_color' => array(
				'title'       => esc_html__( 'Color', 'gutenix' ),
				'section'     => 'headings_typography',
				'default'     => '#414756',
				'field'       => 'hex_color',
				'type'        => 'control',
				'dynamic_css' => true,
			),

			/** `H2 Heading` */
			'h2_typography_heading' => array(
				'title' 	=> esc_html__( 'H2 Heading', 'gutenix' ),
				'section' 	=> 'headings_typography',
				'field' 	=> 'gutenix-heading',
				'type' 		=> 'control',
			),
			'h2_font_family' => array(
				'title'       => esc_html__( 'Font Family', 'gutenix' ),
				'section'     => 'headings_typography',
				'default'     => 'Libre Franklin, sans-serif',
				'field'       => 'fonts',
				'type'        => 'control',
				'dynamic_css' => true,
			),
			'h2_character_set' => array(
				'title'       => esc_html__( 'Character Set', 'gutenix' ),
				'section'     => 'headings_typography',
				'default'     => 'latin',
				'field'       => 'select',
				'choices'     => Gutenix_Utils::get_character_sets(),
				'type'        => 'control',
				'dynamic_css' => true,
			),
			'h2_font_style' => array(
				'title'       => esc_html__( 'Font Style', 'gutenix' ),
				'section'     => 'headings_typography',
				'default'     => 'normal',
				'field'       => 'select',
				'choices'     => Gutenix_Utils::get_font_styles(),
				'type'        => 'control',
				'dynamic_css' => true,
			),
			'h2_font_weight' => array(
				'title'       => esc_html__( 'Font Weight', 'gutenix' ),
				'section'     => 'headings_typography',
				'default'     => '700',
				'field'       => 'select',
				'choices'     => Gutenix_Utils::get_font_weight(),
				'type'        => 'control',
				'dynamic_css' => true,
			),
			'h2_font_size' => array(
				'title'       => esc_html__( 'Font Size, px', 'gutenix' ),
				'section'     => 'headings_typography',
				'default' 		=> array(
					'desktop' => '48',
					'tablet'  => '',
					'mobile'  => '',
				),
				'field'       => 'gutenix-input-responsive',
				'type'        => 'control',
				'input_attrs' => array(
					'min' => 0,
				),
				'unit_choices' => '',
				'dynamic_css' => true,
				'sanitize_callback' => 'sanitize_input_responsive',
			),
			'h2_line_height' => array(
				'title'       => esc_html__( 'Line Height', 'gutenix' ),
				'section'     => 'headings_typography',
				'default'     => '1.2',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 1.0,
					'max'  => 3.0,
					'step' => 0.1,
				),
				'type'        => 'control',
				'dynamic_css' => true,
			),
			'h2_letter_spacing' => array(
				'title'       => esc_html__( 'Letter Spacing, px', 'gutenix' ),
				'section'     => 'headings_typography',
				'default'     => '0',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => -10,
					'max'  => 10,
					'step' => 0.1,
				),
				'type'        => 'control',
				'dynamic_css' => true,
			),
			'h2_text_align' => array(
				'title'       => esc_html__( 'Text Align', 'gutenix' ),
				'section'     => 'headings_typography',
				'default'     => 'inherit',
				'field'       => 'gutenix-radio-image',
				'type'        => 'control',
				'choices'     => Gutenix_Utils::get_text_align_options(),
				'dynamic_css' => true,
			),
			'h2_text_transform' => array(
				'title'       => esc_html__( 'Text Transform', 'gutenix' ),
				'section'     => 'headings_typography',
				'default'     => 'none',
				'field'       => 'select',
				'type'        => 'control',
				'choices'     => Gutenix_Utils::get_text_transform(),
				'dynamic_css' => true,
			),
			'h2_text_color' => array(
				'title'       => esc_html__( 'Color', 'gutenix' ),
				'section'     => 'headings_typography',
				'default'     => '#414756',
				'field'       => 'hex_color',
				'type'        => 'control',
				'dynamic_css' => true,
			),

			/** `H3 Heading` */
			'h3_typography_heading' => array(
				'title' 	=> esc_html__( 'H3 Heading', 'gutenix' ),
				'section' 	=> 'headings_typography',
				'field' 	=> 'gutenix-heading',
				'type' 		=> 'control',
			),
			'h3_font_family' => array(
				'title'       => esc_html__( 'Font Family', 'gutenix' ),
				'section'     => 'headings_typography',
				'default'     => 'Libre Franklin, sans-serif',
				'field'       => 'fonts',
				'type'        => 'control',
				'dynamic_css' => true,
			),
			'h3_character_set' => array(
				'title'       => esc_html__( 'Character Set', 'gutenix' ),
				'section'     => 'headings_typography',
				'default'     => 'latin',
				'field'       => 'select',
				'choices'     => Gutenix_Utils::get_character_sets(),
				'type'        => 'control',
				'dynamic_css' => true,
			),
			'h3_font_style' => array(
				'title'       => esc_html__( 'Font Style', 'gutenix' ),
				'section'     => 'headings_typography',
				'default'     => 'normal',
				'field'       => 'select',
				'choices'     => Gutenix_Utils::get_font_styles(),
				'type'        => 'control',
				'dynamic_css' => true,
			),
			'h3_font_weight' => array(
				'title'       => esc_html__( 'Font Weight', 'gutenix' ),
				'section'     => 'headings_typography',
				'default'     => '700',
				'field'       => 'select',
				'choices'     => Gutenix_Utils::get_font_weight(),
				'type'        => 'control',
				'dynamic_css' => true,
			),
			'h3_font_size' => array(
				'title'       => esc_html__( 'Font Size, px', 'gutenix' ),
				'section'     => 'headings_typography',
				'default' 		=> array(
					'desktop' => '34',
					'tablet'  => '',
					'mobile'  => '',
				),
				'field'       => 'gutenix-input-responsive',
				'type'        => 'control',
				'input_attrs' => array(
					'min' => 0,
				),
				'unit_choices' => '',
				'dynamic_css' => true,
				'sanitize_callback' => 'sanitize_input_responsive',
			),
			'h3_line_height' => array(
				'title'       => esc_html__( 'Line Height', 'gutenix' ),
				'section'     => 'headings_typography',
				'default'     => '1.3',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 1.0,
					'max'  => 3.0,
					'step' => 0.1,
				),
				'type'        => 'control',
				'dynamic_css' => true,
			),
			'h3_letter_spacing' => array(
				'title'       => esc_html__( 'Letter Spacing, px', 'gutenix' ),
				'section'     => 'headings_typography',
				'default'     => '0',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => -10,
					'max'  => 10,
					'step' => 0.1,
				),
				'type'        => 'control',
				'dynamic_css' => true,
			),
			'h3_text_align' => array(
				'title'       => esc_html__( 'Text Align', 'gutenix' ),
				'section'     => 'headings_typography',
				'default'     => 'inherit',
				'field'       => 'gutenix-radio-image',
				'type'        => 'control',
				'choices'     => Gutenix_Utils::get_text_align_options(),
				'dynamic_css' => true,
			),
			'h3_text_transform' => array(
				'title'       => esc_html__( 'Text Transform', 'gutenix' ),
				'section'     => 'headings_typography',
				'default'     => 'none',
				'field'       => 'select',
				'type'        => 'control',
				'choices'     => Gutenix_Utils::get_text_transform(),
				'dynamic_css' => true,
			),
			'h3_text_color' => array(
				'title'       => esc_html__( 'Color', 'gutenix' ),
				'section'     => 'headings_typography',
				'default'     => '#414756',
				'field'       => 'hex_color',
				'type'        => 'control',
				'dynamic_css' => true,
			),

			/** `H4 Heading` */
			'h4_typography_heading' => array(
				'title' 	=> esc_html__( 'H4 Heading', 'gutenix' ),
				'section' 	=> 'headings_typography',
				'field' 	=> 'gutenix-heading',
				'type' 		=> 'control',
			),
			'h4_font_family' => array(
				'title'       => esc_html__( 'Font Family', 'gutenix' ),
				'section'     => 'headings_typography',
				'default'     => 'Libre Franklin, sans-serif',
				'field'       => 'fonts',
				'type'        => 'control',
				'dynamic_css' => true,
			),
			'h4_character_set' => array(
				'title'       => esc_html__( 'Character Set', 'gutenix' ),
				'section'     => 'headings_typography',
				'default'     => 'latin',
				'field'       => 'select',
				'choices'     => Gutenix_Utils::get_character_sets(),
				'type'        => 'control',
				'dynamic_css' => true,
			),
			'h4_font_style' => array(
				'title'       => esc_html__( 'Font Style', 'gutenix' ),
				'section'     => 'headings_typography',
				'default'     => 'normal',
				'field'       => 'select',
				'choices'     => Gutenix_Utils::get_font_styles(),
				'type'        => 'control',
				'dynamic_css' => true,
			),
			'h4_font_weight' => array(
				'title'       => esc_html__( 'Font Weight', 'gutenix' ),
				'section'     => 'headings_typography',
				'default'     => '700',
				'field'       => 'select',
				'choices'     => Gutenix_Utils::get_font_weight(),
				'type'        => 'control',
				'dynamic_css' => true,
			),
			'h4_font_size' => array(
				'title'       => esc_html__( 'Font Size, px', 'gutenix' ),
				'section'     => 'headings_typography',
				'default' 		=> array(
					'desktop' => '24',
					'tablet'  => '',
					'mobile'  => '',
				),
				'field'       => 'gutenix-input-responsive',
				'type'        => 'control',
				'input_attrs' => array(
					'min' => 0,
				),
				'unit_choices' => '',
				'dynamic_css' => true,
				'sanitize_callback' => 'sanitize_input_responsive',
			),
			'h4_line_height' => array(
				'title'       => esc_html__( 'Line Height', 'gutenix' ),
				'section'     => 'headings_typography',
				'default'     => '1.5',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 1.0,
					'max'  => 3.0,
					'step' => 0.1,
				),
				'type'        => 'control',
				'dynamic_css' => true,
			),
			'h4_letter_spacing' => array(
				'title'       => esc_html__( 'Letter Spacing, px', 'gutenix' ),
				'section'     => 'headings_typography',
				'default'     => '0',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => -10,
					'max'  => 10,
					'step' => 0.1,
				),
				'type'        => 'control',
				'dynamic_css' => true,
			),
			'h4_text_align' => array(
				'title'       => esc_html__( 'Text Align', 'gutenix' ),
				'section'     => 'headings_typography',
				'default'     => 'inherit',
				'field'       => 'gutenix-radio-image',
				'type'        => 'control',
				'choices'     => Gutenix_Utils::get_text_align_options(),
				'dynamic_css' => true,
			),
			'h4_text_transform' => array(
				'title'       => esc_html__( 'Text Transform', 'gutenix' ),
				'section'     => 'headings_typography',
				'default'     => 'none',
				'field'       => 'select',
				'type'        => 'control',
				'choices'     => Gutenix_Utils::get_text_transform(),
				'dynamic_css' => true,
			),
			'h4_text_color' => array(
				'title'       => esc_html__( 'Color', 'gutenix' ),
				'section'     => 'headings_typography',
				'default'     => '#414756',
				'field'       => 'hex_color',
				'type'        => 'control',
				'dynamic_css' => true,
			),

			/** `H5 Heading` */
			'h5_typography_heading' => array(
				'title' 	=> esc_html__( 'H5 Heading', 'gutenix' ),
				'section' 	=> 'headings_typography',
				'field' 	=> 'gutenix-heading',
				'type' 		=> 'control',
			),
			'h5_font_family' => array(
				'title'       => esc_html__( 'Font Family', 'gutenix' ),
				'section'     => 'headings_typography',
				'default'     => 'Libre Franklin, sans-serif',
				'field'       => 'fonts',
				'type'        => 'control',
				'dynamic_css' => true,
			),
			'h5_character_set' => array(
				'title'       => esc_html__( 'Character Set', 'gutenix' ),
				'section'     => 'h5_typography',
				'default'     => 'latin',
				'field'       => 'select',
				'choices'     => Gutenix_Utils::get_character_sets(),
				'type'        => 'control',
				'dynamic_css' => true,
			),
			'h5_font_style' => array(
				'title'       => esc_html__( 'Font Style', 'gutenix' ),
				'section'     => 'headings_typography',
				'default'     => 'normal',
				'field'       => 'select',
				'choices'     => Gutenix_Utils::get_font_styles(),
				'type'        => 'control',
				'dynamic_css' => true,
			),
			'h5_font_weight' => array(
				'title'       => esc_html__( 'Font Weight', 'gutenix' ),
				'section'     => 'headings_typography',
				'default'     => '700',
				'field'       => 'select',
				'choices'     => Gutenix_Utils::get_font_weight(),
				'type'        => 'control',
				'dynamic_css' => true,
			),
			'h5_font_size' => array(
				'title'       => esc_html__( 'Font Size, px', 'gutenix' ),
				'section'     => 'headings_typography',
				'default' 		=> array(
					'desktop' => '20',
					'tablet'  => '',
					'mobile'  => '',
				),
				'field'       => 'gutenix-input-responsive',
				'type'        => 'control',
				'input_attrs' => array(
					'min' => 0,
				),
				'unit_choices' => '',
				'dynamic_css' => true,
				'sanitize_callback' => 'sanitize_input_responsive',
			),
			'h5_line_height' => array(
				'title'       => esc_html__( 'Line Height', 'gutenix' ),
				'section'     => 'headings_typography',
				'default'     => '1.6',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 1.0,
					'max'  => 3.0,
					'step' => 0.1,
				),
				'type'        => 'control',
				'dynamic_css' => true,
			),
			'h5_letter_spacing' => array(
				'title'       => esc_html__( 'Letter Spacing, px', 'gutenix' ),
				'section'     => 'headings_typography',
				'default'     => '0',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => -10,
					'max'  => 10,
					'step' => 0.1,
				),
				'type'        => 'control',
				'dynamic_css' => true,
			),
			'h5_text_align' => array(
				'title'       => esc_html__( 'Text Align', 'gutenix' ),
				'section'     => 'headings_typography',
				'default'     => 'inherit',
				'field'       => 'gutenix-radio-image',
				'type'        => 'control',
				'choices'     => Gutenix_Utils::get_text_align_options(),
				'dynamic_css' => true,
			),
			'h5_text_transform' => array(
				'title'       => esc_html__( 'Text Transform', 'gutenix' ),
				'section'     => 'headings_typography',
				'default'     => 'none',
				'field'       => 'select',
				'type'        => 'control',
				'choices'     => Gutenix_Utils::get_text_transform(),
				'dynamic_css' => true,
			),
			'h5_text_color' => array(
				'title'       => esc_html__( 'Color', 'gutenix' ),
				'section'     => 'headings_typography',
				'default'     => '#414756',
				'field'       => 'hex_color',
				'type'        => 'control',
				'dynamic_css' => true,
			),

			/** `H6 Heading` */
			'h6_typography_heading' => array(
				'title' 	=> esc_html__( 'H6 Heading', 'gutenix' ),
				'section' 	=> 'headings_typography',
				'field' 	=> 'gutenix-heading',
				'type' 		=> 'control',
			),
			'h6_font_family' => array(
				'title'       => esc_html__( 'Font Family', 'gutenix' ),
				'section'     => 'headings_typography',
				'default'     => 'Libre Franklin, sans-serif',
				'field'       => 'fonts',
				'type'        => 'control',
				'dynamic_css' => true,
			),
			'h6_character_set' => array(
				'title'       => esc_html__( 'Character Set', 'gutenix' ),
				'section'     => 'headings_typography',
				'default'     => 'latin',
				'field'       => 'select',
				'choices'     => Gutenix_Utils::get_character_sets(),
				'type'        => 'control',
				'dynamic_css' => true,
			),
			'h6_font_style' => array(
				'title'       => esc_html__( 'Font Style', 'gutenix' ),
				'section'     => 'headings_typography',
				'default'     => 'normal',
				'field'       => 'select',
				'choices'     => Gutenix_Utils::get_font_styles(),
				'type'        => 'control',
				'dynamic_css' => true,
			),
			'h6_font_weight' => array(
				'title'       => esc_html__( 'Font Weight', 'gutenix' ),
				'section'     => 'headings_typography',
				'default'     => '700',
				'field'       => 'select',
				'choices'     => Gutenix_Utils::get_font_weight(),
				'type'        => 'control',
				'dynamic_css' => true,
			),
			'h6_font_size' => array(
				'title'       => esc_html__( 'Font Size, px', 'gutenix' ),
				'section'     => 'headings_typography',
				'default' 		=> array(
					'desktop' => '16',
					'tablet'  => '',
					'mobile'  => '',
				),
				'field'       => 'gutenix-input-responsive',
				'type'        => 'control',
				'input_attrs' => array(
					'min' => 0,
				),
				'unit_choices' => '',
				'dynamic_css' => true,
				'sanitize_callback' => 'sanitize_input_responsive',
			),
			'h6_line_height' => array(
				'title'       => esc_html__( 'Line Height', 'gutenix' ),
				'section'     => 'headings_typography',
				'default'     => '1.6',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 1.0,
					'max'  => 3.0,
					'step' => 0.1,
				),
				'type'        => 'control',
				'dynamic_css' => true,
			),
			'h6_letter_spacing' => array(
				'title'       => esc_html__( 'Letter Spacing, px', 'gutenix' ),
				'section'     => 'headings_typography',
				'default'     => '0',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => -10,
					'max'  => 10,
					'step' => 0.1,
				),
				'type'        => 'control',
				'dynamic_css' => true,
			),
			'h6_text_align' => array(
				'title'       => esc_html__( 'Text Align', 'gutenix' ),
				'section'     => 'headings_typography',
				'default'     => 'inherit',
				'field'       => 'gutenix-radio-image',
				'type'        => 'control',
				'choices'     => Gutenix_Utils::get_text_align_options(),
				'dynamic_css' => true,
			),
			'h6_text_transform' => array(
				'title'       => esc_html__( 'Text Transform', 'gutenix' ),
				'section'     => 'headings_typography',
				'default'     => 'none',
				'field'       => 'select',
				'type'        => 'control',
				'choices'     => Gutenix_Utils::get_text_transform(),
				'dynamic_css' => true,
			),
			'h6_text_color' => array(
				'title'       => esc_html__( 'Color', 'gutenix' ),
				'section'     => 'headings_typography',
				'default'     => '#414756',
				'field'       => 'hex_color',
				'type'        => 'control',
				'dynamic_css' => true,
			),

			/** `Input text` section */
			'input_typography' => array(
				'title' => esc_html__( 'Input Text', 'gutenix' ),
				'panel' => 'typography',
				'type'  => 'section',
			),
			'input_font_family' => array(
				'title' 			=> esc_html__( 'Font Family', 'gutenix' ),
				'section' 			=> 'input_typography',
				'default' 			=> 'Libre Franklin, sans-serif',
				'field' 			=> 'fonts',
				'type' 				=> 'control',
				'dynamic_css' 		=> true,
			),
			'input_character_set' => array(
				'title' 			=> esc_html__( 'Character Set', 'gutenix' ),
				'description' 		=> esc_html__( 'Important: Not all fonts support every characters and font-weight.', 'gutenix' ),
				'section' 			=> 'input_typography',
				'default' 			=> 'latin',
				'field' 			=> 'select',
				'choices' 			=> Gutenix_Utils::get_character_sets(),
				'type' 				=> 'control',
				'dynamic_css' 		=> true,
			),
			'input_font_style' => array(
				'title' 			=> esc_html__( 'Font Style', 'gutenix' ),
				'section' 			=> 'input_typography',
				'default' 			=> 'normal',
				'field' 			=> 'select',
				'choices' 			=> Gutenix_Utils::get_font_styles(),
				'type' 				=> 'control',
				'dynamic_css' 		=> true,
			),
			'input_font_weight' => array(
				'title' 			=> esc_html__( 'Font Weight', 'gutenix' ),
				'section' 			=> 'input_typography',
				'default' 			=> '400',
				'field' 			=> 'select',
				'choices' 			=> Gutenix_Utils::get_font_weight(),
				'type' 				=> 'control',
				'dynamic_css' 		=> true,
			),
			'input_font_size' => array(
				'title' 			=> esc_html__( 'Font Size, px', 'gutenix' ),
				'section' 			=> 'input_typography',
				'default' 			=> array(
					'desktop' 	=> '16',
					'tablet' 	=> '',
					'mobile' 	=> '',
				),
				'field' 			=> 'gutenix-input-responsive',
				'type' 				=> 'control',
				'input_attrs' 		=> array(
					'min' => 0,
				),
				'unit_choices' 		=> '',
				'dynamic_css' 		=> true,
				'sanitize_callback' => 'sanitize_input_responsive',
			),
			'input_line_height' => array(
				'title' 			=> esc_html__( 'Line Height', 'gutenix' ),
				'section' 			=> 'input_typography',
				'default' 			=> '1.6',
				'field' 			=> 'number',
				'input_attrs' 		=> array(
					'min'  => 1.0,
					'max'  => 3.0,
					'step' => 0.1,
				),
				'type' 				=> 'control',
				'dynamic_css' 		=> true,
			),
			'input_letter_spacing' => array(
				'title' 			=> esc_html__( 'Letter Spacing, px', 'gutenix' ),
				'section' 			=> 'input_typography',
				'default' 			=> '0',
				'field' 			=> 'number',
				'input_attrs' 		=> array(
					'min'  => -10,
					'max'  => 10,
					'step' => 0.1,
				),
				'type' 				=> 'control',
				'dynamic_css' 		=> true,
			),
			'input_text_transform' => array(
				'title' 			=> esc_html__( 'Text Transform', 'gutenix' ),
				'section' 			=> 'input_typography',
				'default' 			=> 'none',
				'field' 			=> 'select',
				'type' 				=> 'control',
				'choices' 			=> Gutenix_Utils::get_text_transform(),
				'dynamic_css' 		=> true,
			),
			'input_text_color' => array(
				'title' 			=> esc_html__( 'Text Color', 'gutenix' ),
				'section' 			=> 'input_typography',
				'default' 			=> '#414756',
				'field' 			=> 'hex_color',
				'type' 				=> 'control',
				'dynamic_css' 		=> true,
			),
			'input_placeholder_color' => array(
				'title' 			=> esc_html__( 'Placeholder Color', 'gutenix' ),
				'section' 			=> 'input_typography',
				'default' 			=> '#a0a3aa',
				'field' 			=> 'hex_color',
				'type' 				=> 'control',
				'dynamic_css' 		=> true,
			),


			/** `Button` section */
			'button_typography' => array(
				'title' 			=> esc_html__( 'Button', 'gutenix' ),
				'panel' 			=> 'typography',
				'type' 				=> 'section',
			),
			'button_font_family' => array(
				'title' 			=> esc_html__( 'Font Family', 'gutenix' ),
				'section' 			=> 'button_typography',
				'default' 			=> 'Libre Franklin, sans-serif',
				'field' 			=> 'fonts',
				'type' 				=> 'control',
				'dynamic_css' 		=> true,
			),
			'button_character_set' => array(
				'title' 			=> esc_html__( 'Character Set', 'gutenix' ),
				'description' 		=> esc_html__( 'Important: Not all fonts support every characters and font-weight.', 'gutenix' ),
				'section' 			=> 'button_typography',
				'default' 			=> 'latin',
				'field' 			=> 'select',
				'choices' 			=> Gutenix_Utils::get_character_sets(),
				'type' 				=> 'control',
				'dynamic_css' 		=> true,
			),
			'button_font_style' => array(
				'title' 			=> esc_html__( 'Font Style', 'gutenix' ),
				'section' 			=> 'button_typography',
				'default' 			=> 'normal',
				'field' 			=> 'select',
				'choices' 			=> Gutenix_Utils::get_font_styles(),
				'type' 				=> 'control',
				'dynamic_css' 		=> true,
			),
			'button_font_weight' => array(
				'title' 			=> esc_html__( 'Font Weight', 'gutenix' ),
				'section' 			=> 'button_typography',
				'default' 			=> '800',
				'field' 			=> 'select',
				'choices' 			=> Gutenix_Utils::get_font_weight(),
				'type' 				=> 'control',
				'dynamic_css' 		=> true,
			),
			'button_font_size' => array(
				'title' 			=> esc_html__( 'Font Size, px', 'gutenix' ),
				'section' 			=> 'button_typography',
				'default' 			=> array(
					'desktop' => '16',
					'tablet'  => '',
					'mobile'  => '',
				),
				'field' 			=> 'gutenix-input-responsive',
				'type' 				=> 'control',
				'input_attrs' 		=> array(
					'min' => 0,
				),
				'unit_choices' 		=> '',
				'dynamic_css' 		=> true,
				'sanitize_callback' => 'sanitize_input_responsive',
			),
			'button_line_height' => array(
				'title' 			=> esc_html__( 'Line Height', 'gutenix' ),
				'section' 			=> 'button_typography',
				'default' 			=> '1.5',
				'field' 			=> 'number',
				'input_attrs' 		=> array(
					'min'  => 1.0,
					'max'  => 3.0,
					'step' => 0.1,
				),
				'type' 				=> 'control',
				'dynamic_css' 		=> true,
			),
			'button_letter_spacing' => array(
				'title' 			=> esc_html__( 'Letter Spacing, px', 'gutenix' ),
				'section' 			=> 'button_typography',
				'default' 			=> '0',
				'field' 			=> 'number',
				'input_attrs' 		=> array(
					'min'  => - 10,
					'max'  => 10,
					'step' => 0.1,
				),
				'type' 				=> 'control',
				'dynamic_css' 		=> true,
			),
			'button_text_transform' => array(
				'title' 			=> esc_html__( 'Text Transform', 'gutenix' ),
				'section' 			=> 'button_typography',
				'default' 			=> 'none',
				'field' 			=> 'select',
				'type' 				=> 'control',
				'choices' 			=> Gutenix_Utils::get_text_transform(),
				'dynamic_css' 		=> true,
			),
			'button_radius' => array(
				'title' 			=> esc_html__( 'Border Radius, px', 'gutenix' ),
				'section' 			=> 'button_typography',
				'default' 			=> '4',
				'field' 			=> 'number',
				'input_attrs' 		=> array(
					'min'  => 0,
					'max'  => 300,
					'step' => 1,
				),
				'type' 				=> 'control',
				'dynamic_css' 		=> true,
			),
			'button_border_width' => array(
				'title' 			=> esc_html__( 'Border Width, px', 'gutenix' ),
				'section' 			=> 'button_typography',
				'default' 			=> '2',
				'field' 			=> 'number',
				'input_attrs' 		=> array(
					'min'  => 0,
					'max'  => 10,
					'step' => 1,
				),
				'type' 				=> 'control',
				'dynamic_css' 		=> true,
			),
			'button_text_color' => array(
				'title' 			=> esc_html__( 'Text color', 'gutenix' ),
				'section' 			=> 'button_typography',
				'default' 			=> '#3260b1',
				'field' 			=> 'hex_color',
				'type' 				=> 'control',
				'dynamic_css' 		=> true,
			),
			'button_text_color_hover' => array(
				'title' 			=> esc_html__( 'Text color on Hover or Active Button', 'gutenix' ),
				'section' 			=> 'button_typography',
				'default' 			=> '#ffffff',
				'field' 			=> 'hex_color',
				'type' 				=> 'control',
				'dynamic_css' 		=> true,
			),
			'button_bg' => array(
				'title' 			=> esc_html__( 'Background color', 'gutenix' ),
				'section' 			=> 'button_typography',
				'default' 			=> '#414756',
				'field' 			=> 'hex_color',
				'type' 				=> 'control',
				'dynamic_css' 		=> true,
			),
			'button_bg_hover' => array(
				'title' 			=> esc_html__( 'Background color on Hover or Active Button', 'gutenix' ),
				'section' 			=> 'button_typography',
				'default' 			=> '#3260b1',
				'field' 			=> 'hex_color',
				'type' 				=> 'control',
				'dynamic_css' 		=> true,
			),
			'button_border_color' => array(
				'title' 			=> esc_html__( 'Border color', 'gutenix' ),
				'section' 			=> 'button_typography',
				'default' 			=> '#3260b1',
				'field' 			=> 'hex_color',
				'type' 				=> 'control',
				'dynamic_css' 		=> true,
			),
			'button_border_color_hover' => array(
				'title' 			=> esc_html__( 'Border color on Hover', 'gutenix' ),
				'section' 			=> 'button_typography',
				'default' 			=> '#414756',
				'field' 			=> 'hex_color',
				'type' 				=> 'control',
				'dynamic_css' 		=> true,
			),
			'button_padding' => array(
				'title' 			=> esc_html__( 'Paddings, px', 'gutenix' ),
				'section' 			=> 'button_typography',
				'field' 			=> 'gutenix-dimensions',
				'type' 				=> 'control',
				'linked_choices' 	=> true,
				'unit_choices' 		=> '',
				'choices' 			=> array(
					'top'    => esc_html__( 'Top', 'gutenix' ),
					'right'  => esc_html__( 'Right', 'gutenix' ),
					'bottom' => esc_html__( 'Bottom', 'gutenix' ),
					'left'   => esc_html__( 'Left', 'gutenix' ),
				),
				'default' 			=> array(
					'desktop' => array( 'top' => '6', 'right' => '20', 'bottom' => '6', 'left' => '20' ),
					'tablet'  => array( 'top' => '', 'right' => '', 'bottom' => '', 'left' => '' ),
					'mobile'  => array( 'top' => '', 'right' => '', 'bottom' => '', 'left' => ''	),
				),
				'input_attrs' 		=> array(
					'min'  => 0,
					'max'  => 100,
					'step' => 1,
				),
				'sanitize_callback' => 'gutenix_sanitize_dimensions',
				'dynamic_css' 		=> true,
			),

			/** `Header` panel */
			'header_options' => array(
				'title' 			=> esc_html__( 'Header', 'gutenix' ),
				'priority' 			=> 70,
				'type' 				=> 'panel',
			),

			/** `Top Panel` section */
			'top_panel' => array(
				'title' 			=> esc_html__( 'Top Panel', 'gutenix' ),
				'panel' 			=> 'header_options',
				'priority' 			=> 20,
				'type' 				=> 'section',
			),
			'top_panel_visible' => array(
				'title' 			=> esc_html__( 'Show top panel', 'gutenix' ),
				'section' 			=> 'top_panel',
				'priority' 			=> 5,
				'default' 			=> false,
				'field' 			=> 'gutenix-toggle-checkbox',
				'type' 				=> 'control',
				'sanitize_callback' => 'gutenix_sanitize_checkbox',
			),
			'top_panel_container_type' => array(
				'title' 			=> esc_html__( 'Container type', 'gutenix' ),
				'section' 			=> 'top_panel',
				'default' 			=> 'boxed',
				'field' 			=> 'gutenix-buttonset',
				'choices' 			=> array(
					'boxed' => esc_html__( 'Boxed', 'gutenix' ),
					'fluid' => esc_html__( 'Full Width', 'gutenix' ),
				),
				'type' 				=> 'control',
				'conditions' 		=> array(
					'top_panel_visible' => true,
				),
			),
			'top_panel_text' => array(
				'title'       => esc_html__( 'Disclaimer Text', 'gutenix' ),
				'description' => esc_html__( 'HTML formatting support', 'gutenix' ),
				'section'     => 'top_panel',
				'default'     => esc_html__( 'Premium WordPress Theme', 'gutenix' ),
				'field'       => 'textarea',
				'type'        => 'control',
				'conditions'  => array(
					'top_panel_visible' => true,
				),
			),
			'top_panel_menu_visible' => array(
				'title' 			=> esc_html__( 'Show Menu', 'gutenix' ),
				'section' 			=> 'top_panel',
				'default' 			=> false,
				'field' 			=> 'checkbox',
				'type' 				=> 'control',
				'conditions' 		=> array(
					'top_panel_visible' => true,
				),
			),
			'top_panel_social_links_visible' => array(
				'title'      => esc_html__( 'Show Social Links', 'gutenix' ),
				'section'    => 'top_panel',
				'default'    => true,
				'field'      => 'checkbox',
				'type'       => 'control',
				'conditions' => array(
					'top_panel_visible' => true,
				),
			),
			'top_panel_bg' => array(
				'title'       => esc_html__( 'Background color', 'gutenix' ),
				'section'     => 'top_panel',
				'default'     => '#414756',
				'field'       => 'hex_color',
				'type'        => 'control',
				'dynamic_css' => true,
				'conditions'  => array(
					'top_panel_visible' => true,
				),
			),
			'top_panel_text_color' => array(
				'title'       => esc_html__( 'Text color', 'gutenix' ),
				'section'     => 'top_panel',
				'default'     => '#a0a3aa',
				'field'       => 'hex_color',
				'type'        => 'control',
				'dynamic_css' => true,
				'conditions'  => array(
					'top_panel_visible' => true,
				),
			),
			'top_panel_link_color' => array(
				'title'       => esc_html__( 'Link color', 'gutenix' ),
				'section'     => 'top_panel',
				'default'     => '#a0a3aa',
				'field'       => 'hex_color',
				'type'        => 'control',
				'dynamic_css' => true,
				'conditions'  => array(
					'top_panel_visible' => true,
				),
			),
			'top_panel_link_hover_color' => array(
				'title'       => esc_html__( 'Link hover color', 'gutenix' ),
				'section'     => 'top_panel',
				'default'     => '#ffffff',
				'field'       => 'hex_color',
				'type'        => 'control',
				'dynamic_css' => true,
				'conditions'  => array(
					'top_panel_visible' => true,
				),
			),
			'top_panel_vertical_padding' => array(
				'title'       => esc_html__( 'Vertical Padding, px', 'gutenix' ),
				'section'     => 'top_panel',
				'default'     => '10',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 0,
					'max'  => 200,
					'step' => 1,
				),
				'type'        => 'control',
				'dynamic_css' => true,
				'conditions'  => array(
					'top_panel_visible' => true,
				),
			),
			'top_panel_font_size' => array(
				'title'       => esc_html__( 'Font Size, px', 'gutenix' ),
				'section'     => 'top_panel',
				'default'     => '14',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 6,
					'max'  => 50,
					'step' => 1,
				),
				'type'        => 'control',
				'dynamic_css' => true,
				'conditions'  => array(
					'top_panel_visible' => true,
				),
			),

			/** `Logo & Favicon` section */
			'logo_favicon' => array(
				'title' 			=> esc_html__( 'Logo &amp; Favicon', 'gutenix' ),
				'panel' 			=> 'header_options',
				'priority' 			=> 40,
				'type' 				=> 'section',
			),
			'logo_max_sizes' => array(
				'title' 			=> esc_html__( 'Max Sizes for Logo, px', 'gutenix' ),
				'section' 			=> 'logo_favicon',
				'field' 			=> 'gutenix-dimensions',
				'type' 				=> 'control',
				'linked_choices' 	=> false,
				'unit_choices' 		=> '',
				'choices' 			=> array(
					'max_width'   => esc_html__( 'Max Width', 'gutenix' ),
					'max_height'  => esc_html__( 'Max Height', 'gutenix' ),
				),
				'default' 			=> array(
					'desktop' => array( 'max_width' => '120', 'max_height' => '' ),
					'tablet'  => array( 'max_width' => '', 'max_height' => '' ),
					'mobile'  => array( 'max_width' => '', 'max_height' => '' ),
				),
				'input_attrs' 		=> array(
					'min'  => 0,
					'max'  => 500,
					'step' => 1,
				),
				'sanitize_callback' => 'gutenix_sanitize_dimensions',
				'dynamic_css' 		=> true,
			),

			/** `Header Bar` section */
			'header_bar' => array(
				'title' 			=> esc_html__( 'Header Bar', 'gutenix' ),
				'panel' 			=> 'header_options',
				'type' 				=> 'section',
			),
			'header_layout_type' => array(
				'title' 			=> esc_html__( 'Layout', 'gutenix' ),
				'section' 			=> 'header_bar',
				'priority' 			=> 10,
				'default' 			=> 'style-1',
				'choices' 			=> Gutenix_Utils::get_header_layout_options(),
				'field' 			=> 'select',
				'type' 				=> 'control',
			),
			'header_container_type' => array(
				'title'   => esc_html__( 'Container type', 'gutenix' ),
				'section' => 'header_bar',
				'priority' 			=> 15,
				'default' => 'boxed',
				'field' 			=> 'gutenix-buttonset',
				'choices' => array(
					'boxed' => esc_html__( 'Boxed', 'gutenix' ),
					'fluid' => esc_html__( 'Full Width', 'gutenix' ),
				),
				'type'    => 'control',
			),
			'header_logo_position' => array(
				'title' 			=> esc_html__( 'Logo Position', 'gutenix' ),
				'section' 			=> 'header_bar',
				'priority' 			=> 15,
				'default' 			=> 'left',
				'field' 			=> 'gutenix-buttonset',
				'choices' 			=> array(
					'left' 		=> esc_html__( 'Left', 'gutenix' ),
					'center' 	=> esc_html__( 'Center', 'gutenix' ),
				),
				'type' 				=> 'control',
				'conditions' => array(
					'header_layout_type' => array( 'style-7', 'style-8' ),
				),
			),
			'header_menu_position' => array(
				'title' 			=> esc_html__( 'Menu Position', 'gutenix' ),
				'section' 			=> 'header_bar',
				'priority' 			=> 15,
				'default' 			=> 'left',
				'field' 			=> 'gutenix-buttonset',
				'choices' 			=> array(
					'left' 		=> esc_html__( 'Left', 'gutenix' ),
					'center' 	=> esc_html__( 'Center', 'gutenix' ),
					'right' 	=> esc_html__( 'Right', 'gutenix' ),
				),
				'type' 				=> 'control',
				'dynamic_css' 		=> true,
				'conditions' => array(
					'header_layout_type' => array( 'style-1' ),
				),
			),
			'header_menu_btn_position' => array(
				'title' 			=> esc_html__( 'Menu Button Position', 'gutenix' ),
				'section' 			=> 'header_bar',
				'priority' 			=> 15,
				'default' 			=> 'right',
				'field' 			=> 'gutenix-buttonset',
				'choices' 			=> array(
					'left' 		=> esc_html__( 'Left', 'gutenix' ),
					'right' 	=> esc_html__( 'Right', 'gutenix' ),
				),
				'type' 				=> 'control',
				'conditions' => array(
					'header_layout_type' => array( 'style-7', 'style-8' ),
				),
			),
			'header_mobile_panel_breakpoint' => array(
				'title'      => esc_html__( 'Mobile Panel Visibility', 'gutenix' ),
				'section'    => 'header_bar',
				'priority' 			=> 15,
				'default'    => 'lg',
				'field'      => 'select',
				'choices'    => array(
					''   => esc_html__( 'None', 'gutenix' ),
					'lg' => esc_html__( 'Tablet &amp; Mobile Devices', 'gutenix' ),
					'md' => esc_html__( 'Mobile Devices', 'gutenix' ),
				),
				'type'       => 'control',
				'conditions' => array(
					'header_layout_type!' => Gutenix_Utils::get_header_hamburger_panel_layouts(),
				),
			),
			'header_mobile_panel_breakpoint_sep' => array(
				'section' 			=> 'header_bar',
				'priority' 			=> 15,
				'field' 			=> 'gutenix-separator',
				'type' 				=> 'control',
			),

			/* Header Search */
			'header_search_visible' => array(
				'title' 			=> esc_html__( 'Show Search', 'gutenix' ),
				'section' 			=> 'header_bar',
				'priority' 			=> 20,
				'default' 			=> true,
				'field' 			=> 'checkbox',
				'type' 				=> 'control',
			),
			'header_search_input_color' => array(
				'title' 			=> esc_html__( 'Search Input color', 'gutenix' ),
				'section' 			=> 'header_bar',
				'priority' 			=> 20,
				'field' 			=> 'hex_color',
				'type' 				=> 'control',
				'dynamic_css' 		=> true,
				'conditions' 		=> array(
					'header_search_visible' => true,
				),
			),
			'header_search_sep' => array(
				'section' 			=> 'header_bar',
				'priority' 			=> 20,
				'field' 			=> 'gutenix-separator',
				'type' 				=> 'control',
			),

			/* Header BG */
			'header_bg' => array(
				'title'       => esc_html__( 'Background Color', 'gutenix' ),
				'section'     => 'header_bar',
				'priority' 			=> 25,
				'default'     => '#ffffff',
				'field'       => 'hex_color',
				'type'        => 'control',
				'dynamic_css' => true,
			),
			'header_bg_img' => array(
				'title'       => esc_html__( 'Background Image', 'gutenix' ),
				'section'     => 'header_bar',
				'priority' 			=> 25,
				'field'       => 'image',
				'type'        => 'control',
				'dynamic_css' => true,
			),
			'header_bg_size' => array(
				'title'       => esc_html__( 'Background Size', 'gutenix' ),
				'section'     => 'header_bar',
				'priority' 			=> 25,
				'default'     => 'cover',
				'field'       => 'select',
				'choices'     => Gutenix_Utils::get_bg_size(),
				'type'        => 'control',
				'dynamic_css' => true,
				'conditions'  => array(
					'header_bg_img!' => '',
				),
			),
			'header_bg_position' => array(
				'title'       => esc_html__( 'Background Position', 'gutenix' ),
				'section'     => 'header_bar',
				'priority' 			=> 25,
				'default'     => 'center',
				'field'       => 'select',
				'choices'     => Gutenix_Utils::get_bg_position(),
				'type'        => 'control',
				'dynamic_css' => true,
				'conditions'  => array(
					'header_bg_img!' => '',
				),
			),
			'header_bg_repeat' => array(
				'title'       => esc_html__( 'Background Repeat', 'gutenix' ),
				'section'     => 'header_bar',
				'priority' 			=> 25,
				'default'     => 'no-repeat',
				'field'       => 'select',
				'choices'     => Gutenix_Utils::get_bg_repeat(),
				'type'        => 'control',
				'dynamic_css' => true,
				'conditions'  => array(
					'header_bg_img!' => '',
				),
			),
			'header_bg_attachment' => array(
				'title'       => esc_html__( 'Background Attachment', 'gutenix' ),
				'section'     => 'header_bar',
				'priority' 			=> 25,
				'default'     => 'scroll',
				'field'       => 'select',
				'choices'     => Gutenix_Utils::get_bg_attachment(),
				'type'        => 'control',
				'dynamic_css' => true,
				'conditions'  => array(
					'header_bg_img!' => '',
				),
			),
			'header_link_color' => array(
				'title'       => esc_html__( 'Link color', 'gutenix' ),
				'section'     => 'header_bar',
				'priority' 			=> 25,
				'default'     => '#414756',
				'field'       => 'hex_color',
				'type'        => 'control',
				'dynamic_css' => true,
			),
			'header_link_hover_color' => array(
				'title'       => esc_html__( 'Link hover color', 'gutenix' ),
				'section'     => 'header_bar',
				'priority' 			=> 25,
				'default'     => '#3260b1',
				'field'       => 'hex_color',
				'type'        => 'control',
				'dynamic_css' => true,
			),
			
			'header_vertical_padding' => array(
				'title'       => esc_html__( 'Vertical Padding, px', 'gutenix' ),
				'section'     => 'header_bar',
				'priority' 			=> 30,
				'default'     => '30',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 0,
					'max'  => 200,
					'step' => 1,
				),
				'type'        => 'control',
				'dynamic_css' => true,
			),

			/* Header Social Links */
			'header_social_links_heading' => array(
				'title' 			=> esc_html__( 'Social Icons', 'gutenix' ),
				'section' 			=> 'header_bar',
				'priority' 			=> 40,
				'field' 			=> 'gutenix-heading',
				'type' 				=> 'control',
			),
			'header_social_links_visible' => array(
				'title' 			=> esc_html__( 'Show Social Links', 'gutenix' ),
				'section' 			=> 'header_bar',
				'priority' 			=> 40,
				'default' 			=> true,
				'field' 			=> 'checkbox',
				'type' 				=> 'control',
			),

			/** `Main Menu` section */
			'main_menu' => array(
				'title' 			=> esc_html__( 'Main Menu', 'gutenix' ),
				'panel' 			=> 'header_options',
				'priority' 			=> 60,
				'type' 				=> 'section',
			),
			/*'main_menu_hover_style' => array(
				'title'   => esc_html__( 'Hover Style', 'gutenix' ),
				'section' => 'main_menu',
				'default' => 'none',
				'field'   => 'select',
				'choices' => array(
					'none'        => esc_html__( 'None', 'gutenix' ),
					'underline'   => esc_html__( 'Underline', 'gutenix' ),
					'overline'    => esc_html__( 'Overline', 'gutenix' ),
					'double-line' => esc_html__( 'Double Line', 'gutenix' ),
					'framed'      => esc_html__( 'Framed', 'gutenix' ),
				),
				'type'    => 'control',
			),
			'animation_line' => array(
				'title'   => esc_html__( 'Animation', 'gutenix' ),
				'section' => 'main_menu',
				'default' => 'none',
				'field'   => 'select',
				'choices' => array(
					'none'     => esc_html__( 'None', 'gutenix' ),
					'fade'     => esc_html__( 'Fade', 'gutenix' ),
					'slide'    => esc_html__( 'Slide', 'gutenix' ),
					'grow'     => esc_html__( 'Grow', 'gutenix' ),
					'drop-in'  => esc_html__( 'Drop In', 'gutenix' ),
					'drop-out' => esc_html__( 'Drop Out', 'gutenix' ),
				),
				'type'       => 'control',
				'conditions' => array(
					'main_menu_hover_style' => array( 'underline', 'overline', 'double-line' ),
				),
			),
			'animation_framed' => array(
				'title'   => esc_html__( 'Animation', 'gutenix' ),
				'section' => 'main_menu',
				'default' => 'none',
				'field'   => 'select',
				'choices' => array(
					'none'    => esc_html__( 'None', 'gutenix' ),
					'fade'    => esc_html__( 'Fade', 'gutenix' ),
					'grow'    => esc_html__( 'Grow', 'gutenix' ),
					'shrink'  => esc_html__( 'Shrink', 'gutenix' ),
					'draw'    => esc_html__( 'Draw', 'gutenix' ),
					'corners' => esc_html__( 'Corners', 'gutenix' ),
				),
				'type'       => 'control',
				'conditions' => array(
					'main_menu_hover_style' => 'framed',
				),
			),*/

			/* Main Menu Typography */
			'main_menu_typography_heading' => array(
				'title' 	=> esc_html__( 'Main Menu Typography', 'gutenix' ),
				'section' 	=> 'main_menu',
				'field' 	=> 'gutenix-heading',
				'type' 		=> 'control',
			),
			'main_menu_font_family' => array(
				'title'       => esc_html__( 'Font Family', 'gutenix' ),
				'section'     => 'main_menu',
				'default'     => 'Libre Franklin, sans-serif',
				'field'       => 'fonts',
				'type'        => 'control',
				'dynamic_css' => true,
			),
			'main_menu_character_set' => array(
				'title' 			=> esc_html__( 'Character Set', 'gutenix' ),
				'description' 		=> esc_html__( 'Important: Not all fonts support every characters and font-weight.', 'gutenix' ),
				'section'     => 'main_menu',
				'default'     => 'latin',
				'field'       => 'select',
				'choices'     => Gutenix_Utils::get_character_sets(),
				'type'        => 'control',
				'dynamic_css' => true,
			),
			'main_menu_font_style' => array(
				'title'       => esc_html__( 'Font Style', 'gutenix' ),
				'section'     => 'main_menu',
				'default'     => 'normal',
				'field'       => 'select',
				'choices'     => Gutenix_Utils::get_font_styles(),
				'type'        => 'control',
				'dynamic_css' => true,
			),
			'main_menu_font_weight' => array(
				'title'       => esc_html__( 'Font Weight', 'gutenix' ),
				'section'     => 'main_menu',
				'default'     => '500',
				'field'       => 'select',
				'choices'     => Gutenix_Utils::get_font_weight(),
				'type'        => 'control',
				'dynamic_css' => true,
			),
			'main_menu_font_size' => array(
				'title'       => esc_html__( 'Font Size, px', 'gutenix' ),
				'section'     => 'main_menu',
				'default'     => '16',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 6,
					'max'  => 50,
					'step' => 1,
				),
				'type'        => 'control',
				'dynamic_css' => true,
			),
			'main_menu_line_height' => array(
				'title'       => esc_html__( 'Line Height', 'gutenix' ),
				'section'     => 'main_menu',
				'default'     => '1.8',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 1.0,
					'max'  => 3.0,
					'step' => 0.1,
				),
				'type'        => 'control',
				'dynamic_css' => true,
			),
			'main_menu_letter_spacing' => array(
				'title'       => esc_html__( 'Letter Spacing, px', 'gutenix' ),
				'section'     => 'main_menu',
				'default'     => '0',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => -10,
					'max'  => 10,
					'step' => 0.1,
				),
				'type'        => 'control',
				'dynamic_css' => true,
			),
			'main_menu_text_transform' => array(
				'title'       => esc_html__( 'Text Transform', 'gutenix' ),
				'section'     => 'main_menu',
				'default'     => 'none',
				'field'       => 'select',
				'type'        => 'control',
				'choices'     => Gutenix_Utils::get_text_transform(),
				'dynamic_css' => true,
			),
			'main_menu_link_color' => array(
				'title'       => esc_html__( 'Link Color', 'gutenix' ),
				'section'     => 'main_menu',
				'default'     => '#414756',
				'field'       => 'hex_color',
				'type'        => 'control',
				'dynamic_css' => true,
			),
			'main_menu_link_hover_color' => array(
				'title'       => esc_html__( 'Link Color on Hover', 'gutenix' ),
				'section'     => 'main_menu',
				'default'     => '#3260b1',
				'field'       => 'hex_color',
				'type'        => 'control',
				'dynamic_css' => true,
			),

			/* Sub Menu Typography */
			'sub_menu_typography_heading' => array(
				'title' 	=> esc_html__( 'Sub Menu Typography', 'gutenix' ),
				'section' 	=> 'main_menu',
				'field' 	=> 'gutenix-heading',
				'type' 		=> 'control',
			),
			'sub_menu_font_style' => array(
				'title'       => esc_html__( 'Font Style', 'gutenix' ),
				'section'     => 'main_menu',
				'default'     => 'normal',
				'field'       => 'select',
				'choices'     => Gutenix_Utils::get_font_styles(),
				'type'        => 'control',
				'dynamic_css' => true,
			),
			'sub_menu_font_weight' => array(
				'title'       => esc_html__( 'Font Weight', 'gutenix' ),
				'section'     => 'main_menu',
				'default'     => '500',
				'field'       => 'select',
				'choices'     => Gutenix_Utils::get_font_weight(),
				'type'        => 'control',
				'dynamic_css' => true,
			),
			'sub_menu_font_size' => array(
				'title'       => esc_html__( 'Sub Menu Font Size, px', 'gutenix' ),
				'section'     => 'main_menu',
				'default'     => '16',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 6,
					'max'  => 50,
					'step' => 1,
				),
				'type'        => 'control',
				'dynamic_css' => true,
			),
			'sub_menu_line_height' => array(
				'title'       => esc_html__( 'Line Height', 'gutenix' ),
				'section'     => 'main_menu',
				'default'     => '1.6',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 1.0,
					'max'  => 3.0,
					'step' => 0.1,
				),
				'type'        => 'control',
				'dynamic_css' => true,
			),
			'sub_menu_letter_spacing' => array(
				'title'       => esc_html__( 'Letter Spacing, px', 'gutenix' ),
				'section'     => 'main_menu',
				'default'     => '0',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => -10,
					'max'  => 10,
					'step' => 0.1,
				),
				'type'        => 'control',
				'dynamic_css' => true,
			),
			'sub_menu_text_transform' => array(
				'title'       => esc_html__( 'Text Transform', 'gutenix' ),
				'section'     => 'main_menu',
				'default'     => 'none',
				'field'       => 'select',
				'type'        => 'control',
				'choices'     => Gutenix_Utils::get_text_transform(),
				'dynamic_css' => true,
			),
			'sub_menu_bg' => array(
				'title'       => esc_html__( 'Sub Menu Background Color', 'gutenix' ),
				'section'     => 'main_menu',
				'default'     => '#ffffff',
				'field'       => 'hex_color',
				'type'        => 'control',
				'dynamic_css' => true,
			),
			'sub_menu_link_color' => array(
				'title'       => esc_html__( 'Sub Menu Link Color', 'gutenix' ),
				'section'     => 'main_menu',
				'default'     => '#a0a3aa',
				'field'       => 'hex_color',
				'type'        => 'control',
				'dynamic_css' => true,
			),
			'sub_menu_link_bg' => array(
				'title'       => esc_html__( 'Sub Menu Link Background Color', 'gutenix' ),
				'section'     => 'main_menu',
				'field'       => 'hex_color',
				'type'        => 'control',
				'dynamic_css' => true,
			),
			'sub_menu_link_hover_color' => array(
				'title'       => esc_html__( 'Sub Menu Link Color on Hover', 'gutenix' ),
				'section'     => 'main_menu',
				'default'     => '#3260B1',
				'field'       => 'hex_color',
				'type'        => 'control',
				'dynamic_css' => true,
			),
			'sub_menu_link_hover_bg' => array(
				'title'       => esc_html__( 'Sub Menu Link Background Color on Hover', 'gutenix' ),
				'section'     => 'main_menu',
				'default'     => '#f6f6f7',
				'field'       => 'hex_color',
				'type'        => 'control',
				'dynamic_css' => true,
			),

			/** `Vertical Menu` section */
			'vertical_menu' => array(
				'title' => esc_html__( 'Vertical & Mobile Menu', 'gutenix' ),
				'panel' => 'header_options',
				'type'  => 'section',
			),

			'vertical_menu_btn_color' => array(
				'title'       => esc_html__( 'Menu Button Color', 'gutenix' ),
				'section'     => 'vertical_menu',
				'default'     => '#414756',
				'field'       => 'hex_color',
				'type'        => 'control',
				'dynamic_css' => true,
			),
			'vertical_menu_link_color' => array(
				'title'       => esc_html__( 'Link Color', 'gutenix' ),
				'section'     => 'vertical_menu',
				'default'     => '#414756',
				'field'       => 'hex_color',
				'type'        => 'control',
				'dynamic_css' => true,
			),
			'vertical_menu_link_hover_color' => array(
				'title'       => esc_html__( 'Link Color on Hover', 'gutenix' ),
				'section'     => 'vertical_menu',
				'default'     => '#3260b1',
				'field'       => 'hex_color',
				'type'        => 'control',
				'dynamic_css' => true,
			),

			'vertical_menu_close_color' => array(
				'title' 			=> esc_html__( 'Close Icon Color', 'gutenix' ),
				'section' 			=> 'vertical_menu',
				'default' 			=> '#414756',
				'field' 			=> 'hex_color',
				'type' 				=> 'control',
				'dynamic_css' 		=> true,
			),
			'vertical_menu_bg_color' => array(
				'title' 			=> esc_html__( 'Background Color', 'gutenix' ),
				'section' 			=> 'vertical_menu',
				'default' 			=> '#ffffff',
				'field' 			=> 'hex_color',
				'type' 				=> 'control',
				'dynamic_css' 		=> true,
			),
			'vertical_menu_bg_opacity' => array(
				'title' 			=> esc_html__( 'Background Opacity, %', 'gutenix' ),
				'section' 			=> 'vertical_menu',
				'default' 			=> 99,
				'field' 			=> 'gutenix-range',
				'input_attrs' 		=> array(
					'min'  => 0,
					'max'  => 99,
					'step' => 1,
				),
				'type' 				=> 'control',
				'dynamic_css' 		=> true,
			),

			/* Vertical Menu Typography */
			'vertical_menu_typography_heading' => array(
				'title' 	=> esc_html__( 'Typography', 'gutenix' ),
				'section' 	=> 'vertical_menu',
				'field' 	=> 'gutenix-heading',
				'type' 		=> 'control',
			),
			'vertical_menu_font_family' => array(
				'title'       => esc_html__( 'Font Family', 'gutenix' ),
				'section'     => 'vertical_menu',
				'default'     => 'Libre Franklin, sans-serif',
				'field'       => 'fonts',
				'type'        => 'control',
				'dynamic_css' => true,
			),
			'vertical_menu_character_set' => array(
				'title' 			=> esc_html__( 'Character Set', 'gutenix' ),
				'description' 		=> esc_html__( 'Important: Not all fonts support every characters and font-weight.', 'gutenix' ),
				'section'     => 'vertical_menu',
				'default'     => 'latin',
				'field'       => 'select',
				'choices'     => Gutenix_Utils::get_character_sets(),
				'type'        => 'control',
				'dynamic_css' => true,
			),
			'vertical_menu_font_style' => array(
				'title'       => esc_html__( 'Font Style', 'gutenix' ),
				'section'     => 'vertical_menu',
				'default'     => 'normal',
				'field'       => 'select',
				'choices'     => Gutenix_Utils::get_font_styles(),
				'type'        => 'control',
				'dynamic_css' => true,
			),
			'vertical_menu_font_weight' => array(
				'title'       => esc_html__( 'Font Weight', 'gutenix' ),
				'section'     => 'vertical_menu',
				'default'     => '500',
				'field'       => 'select',
				'choices'     => Gutenix_Utils::get_font_weight(),
				'type'        => 'control',
				'dynamic_css' => true,
			),
			'vertical_menu_font_size' => array(
				'title' 			=> esc_html__( 'Top Level Font Size, px', 'gutenix' ),
				'section' 			=> 'vertical_menu',
				'default' 			=> array(
					'desktop' => '34',
					'tablet'  => '',
					'mobile'  => '',
				),
				'field' 			=> 'gutenix-input-responsive',
				'type' 				=> 'control',
				'input_attrs' 		=> array(
					'min' => 0,
					'max'  => 60,
					'step' => 1,
				),
				'unit_choices' 		=> '',
				'dynamic_css' 		=> true,
				'sanitize_callback' => 'sanitize_input_responsive',
			),
			'vertical_menu_line_height' => array(
				'title'       => esc_html__( 'Line Height', 'gutenix' ),
				'section'     => 'vertical_menu',
				'default'     => '1.8',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 1.0,
					'max'  => 3.0,
					'step' => 0.1,
				),
				'type'        => 'control',
				'dynamic_css' => true,
			),
			'vertical_menu_letter_spacing' => array(
				'title'       => esc_html__( 'Letter Spacing, px', 'gutenix' ),
				'section'     => 'vertical_menu',
				'default'     => '0',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => -10,
					'max'  => 10,
					'step' => 0.1,
				),
				'type'        => 'control',
				'dynamic_css' => true,
			),
			'vertical_menu_text_transform' => array(
				'title' 			=> esc_html__( 'Text Transform', 'gutenix' ),
				'section' 			=> 'vertical_menu',
				'default' 			=> 'none',
				'field' 			=> 'select',
				'type' 				=> 'control',
				'choices' 			=> Gutenix_Utils::get_text_transform(),
				'dynamic_css' 		=> true,
			),
			'vertical_menu_sep1' => array(
				'section' 			=> 'vertical_menu',
				'field' 			=> 'gutenix-separator',
				'type' 				=> 'control',
			),


			'vertical_sub_menu_font_size' => array(
				'title' 			=> esc_html__( 'Sub Menu Font Size, px', 'gutenix' ),
				'section' 			=> 'vertical_menu',
				'default' 			=> array(
					'desktop' => '30',
					'tablet'  => '',
					'mobile'  => '',
				),
				'field' 			=> 'gutenix-input-responsive',
				'type' 				=> 'control',
				'input_attrs' 		=> array(
					'min' => 0,
					'max'  => 60,
					'step' => 1,
				),
				'unit_choices' 		=> '',
				'dynamic_css' 		=> true,
				'sanitize_callback' => 'sanitize_input_responsive',
			),

			/** `Header Button2` section */
			'header_buttons' => array(
				'title' 			=> esc_html__( 'Header Buttons', 'gutenix' ),
				'panel' 			=> 'header_options',
				'type' 				=> 'section',
			),
			'header_button_1_heading' => array(
				'title' 			=> esc_html__( 'Button 1 Settings', 'gutenix' ),
				'section' 			=> 'header_buttons',
				'field' 			=> 'gutenix-heading',
				'type' 				=> 'control',
			),
			'show_header_btn_1' => array(
				'title' 			=> esc_html__( 'Show Button 1', 'gutenix' ),
				'section' 			=> 'header_buttons',
				'default' 			=> false,
				'field' 			=> 'gutenix-toggle-checkbox',
				'type' 				=> 'control',
				'sanitize_callback' => 'gutenix_sanitize_checkbox',
			),
			'header_btn_text_1' => array(
				'title' 			=> esc_html__( 'Text', 'gutenix' ),
				'section' 			=> 'header_buttons',
				'default' 			=> esc_html__( 'Button', 'gutenix' ),
				'field' 			=> 'text',
				'type' 				=> 'control',
				'transport' 		=> 'postMessage',
				'conditions' 		=> array(
					'show_header_btn_1' => true,
				),
			),
			'header_btn_url_1' => array(
				'title' 			=> esc_html__( 'Url', 'gutenix' ),
				'section' 			=> 'header_buttons',
				'default' 			=> '#',
				'field' 			=> 'url',
				'type' 				=> 'control',
				'conditions' 		=> array(
					'show_header_btn_1' => true,
				),
			),
			'header_btn_external_1' => array(
				'title' 			=> esc_html__( 'Open Link in New Tab', 'gutenix' ),
				'section' 			=> 'header_buttons',
				'default' 			=> false,
				'field' 			=> 'checkbox',
				'type' 				=> 'control',
				'conditions' 		=> array(
					'show_header_btn_1' => true,
				),
			),
			'header_btn_bg_1' => array(
				'title' 			=> esc_html__( 'Background color', 'gutenix' ),
				'section' 			=> 'header_buttons',
				'default'     => '#3260b1',
				'field'       => 'hex_color',
				'type'        => 'control',
				'dynamic_css' => true,
				'conditions'  => array(
					'show_header_btn_1' => true,
				),
			),
			'header_btn_text_color_1' => array(
				'title'       => esc_html__( 'Text color', 'gutenix' ),
				'section'     => 'header_buttons',
				'default'     => '#ffffff',
				'field'       => 'hex_color',
				'type'        => 'control',
				'dynamic_css' => true,
				'conditions'  => array(
					'show_header_btn_1' => true,
				),
			),
			'header_btn_border_color_1' => array(
				'title'       => esc_html__( 'Border color', 'gutenix' ),
				'section'     => 'header_buttons',
				'field'       => 'hex_color',
				'type'        => 'control',
				'dynamic_css' => true,
				'conditions'  => array(
					'show_header_btn_1' => true,
				),
			),
			'header_btn_bg_hover_1' => array(
				'title'       => esc_html__( 'Background color on Hover', 'gutenix' ),
				'section'     => 'header_buttons',
				'default'     => '#414756',
				'field'       => 'hex_color',
				'type'        => 'control',
				'dynamic_css' => true,
				'conditions'  => array(
					'show_header_btn_1' => true,
				),
			),
			'header_btn_text_color_hover_1' => array(
				'title'       => esc_html__( 'Text color on Hover', 'gutenix' ),
				'section'     => 'header_buttons',
				'field'       => 'hex_color',
				'type'        => 'control',
				'dynamic_css' => true,
				'conditions'  => array(
					'show_header_btn_1' => true,
				),
			),
			'header_btn_border_color_hover_1' => array(
				'title'       => esc_html__( 'Border color on Hover', 'gutenix' ),
				'section'     => 'header_buttons',
				'field'       => 'hex_color',
				'type'        => 'control',
				'dynamic_css' => true,
				'conditions'  => array(
					'show_header_btn_1' => true,
				),
			),
			'header_btn_1_padding' => array(
				'title' 		=> esc_html__( 'Paddings, px', 'gutenix' ),
				'section' 		=> 'header_buttons',
				'field' 		=> 'gutenix-dimensions',
				'type' 			=> 'control',
				'linked_choices' => true,
				'unit_choices' 	=> '',
				'choices' 		=> array(
					'top'    => esc_html__( 'Top', 'gutenix' ),
					'right'  => esc_html__( 'Right', 'gutenix' ),
					'bottom' => esc_html__( 'Bottom', 'gutenix' ),
					'left'   => esc_html__( 'Left', 'gutenix' ),
				),
				'default' 		=> array(
					'desktop' => array( 'top' => '6', 'right' => '20', 'bottom' => '6', 'left' => '20' ),
					'tablet'  => array( 'top' => '', 'right' => '', 'bottom' => '', 'left' => '' ),
					'mobile'  => array( 'top' => '', 'right' => '', 'bottom' => '', 'left' => ''	),
				),
				'input_attrs' 	=> array(
					'min'  => 0,
					'max'  => 100,
					'step' => 1,
				),
				'sanitize_callback' => 'gutenix_sanitize_dimensions',
				'dynamic_css' 	=> true,
				'conditions'  => array(
					'show_header_btn_1' => true,
				),
			),
			'header_btn_border_width_1' => array(
				'title'       => esc_html__( 'Border Width, px', 'gutenix' ),
				'section'     => 'header_buttons',
				'default'     => '0',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 0,
					'max'  => 10,
					'step' => 1,
				),
				'type'        => 'control',
				'dynamic_css' => true,
				'conditions'  => array(
					'show_header_btn_1' => true,
				),
			),
			'header_btn_border_radius_1' => array(
				'title'       => esc_html__( 'Border Radius, px', 'gutenix' ),
				'section'     => 'header_buttons',
				'default'     => '4',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 0,
					'max'  => 200,
					'step' => 1,
				),
				'type'        => 'control',
				'dynamic_css' => true,
				'conditions'  => array(
					'show_header_btn_1' => true,
				),
			),

			/** Header Button 2 */
			'header_button_2_heading' => array(
				'title' 			=> esc_html__( 'Button 2 Settings', 'gutenix' ),
				'section' 			=> 'header_buttons',
				'field' 			=> 'gutenix-heading',
				'type' 				=> 'control',
			),
			'show_header_btn_2' => array(
				'title' 			=> esc_html__( 'Show Button 2', 'gutenix' ),
				'section' 			=> 'header_buttons',
				'default' 			=> false,
				'field' 			=> 'gutenix-toggle-checkbox',
				'type' 				=> 'control',
				'sanitize_callback' => 'gutenix_sanitize_checkbox',
			),
			'header_btn_text_2' => array(
				'title'      => esc_html__( 'Text', 'gutenix' ),
				'section'    => 'header_buttons',
				'default'    => esc_html__( 'Button', 'gutenix' ),
				'field'      => 'text',
				'type'       => 'control',
				'transport'  => 'postMessage',
				'conditions' => array(
					'show_header_btn_2' => true,
				),
			),
			'header_btn_url_2' => array(
				'title'      => esc_html__( 'Url', 'gutenix' ),
				'section'    => 'header_buttons',
				'default'    => '#',
				'field'      => 'url',
				'type'       => 'control',
				'conditions' => array(
					'show_header_btn_2' => true,
				),
			),
			'header_btn_external_2' => array(
				'title'      => esc_html__( 'Open Link in New Tab', 'gutenix' ),
				'section'    => 'header_buttons',
				'default'    => false,
				'field'      => 'checkbox',
				'type'       => 'control',
				'conditions' => array(
					'show_header_btn_2' => true,
				),
			),
			'header_btn_bg_2' => array(
				'title'       => esc_html__( 'Background color', 'gutenix' ),
				'section'     => 'header_buttons',
				'default'     => '#414756',
				'field'       => 'hex_color',
				'type'        => 'control',
				'dynamic_css' => true,
				'conditions'  => array(
					'show_header_btn_2' => true,
				),
			),
			'header_btn_text_color_2' => array(
				'title'       => esc_html__( 'Text color', 'gutenix' ),
				'section'     => 'header_buttons',
				'default'     => '#ffffff',
				'field'       => 'hex_color',
				'type'        => 'control',
				'dynamic_css' => true,
				'conditions'  => array(
					'show_header_btn_2' => true,
				),
			),
			'header_btn_border_color_2' => array(
				'title'       => esc_html__( 'Border color', 'gutenix' ),
				'section'     => 'header_buttons',
				'field'       => 'hex_color',
				'type'        => 'control',
				'dynamic_css' => true,
				'conditions'  => array(
					'show_header_btn_2' => true,
				),
			),
			'header_btn_bg_hover_2' => array(
				'title'       => esc_html__( 'Background color on Hover', 'gutenix' ),
				'section'     => 'header_buttons',
				'default'     => '#3260b1',
				'field'       => 'hex_color',
				'type'        => 'control',
				'dynamic_css' => true,
				'conditions'  => array(
					'show_header_btn_2' => true,
				),
			),
			'header_btn_text_color_hover_2' => array(
				'title'       => esc_html__( 'Text color on Hover', 'gutenix' ),
				'section'     => 'header_buttons',
				'field'       => 'hex_color',
				'type'        => 'control',
				'dynamic_css' => true,
				'conditions'  => array(
					'show_header_btn_2' => true,
				),
			),
			'header_btn_border_color_hover_2' => array(
				'title'       => esc_html__( 'Border color on Hover', 'gutenix' ),
				'section'     => 'header_buttons',
				'field'       => 'hex_color',
				'type'        => 'control',
				'dynamic_css' => true,
				'conditions'  => array(
					'show_header_btn_2' => true,
				),
			),
			'header_btn_2_padding' => array(
				'title' 		=> esc_html__( 'Paddings, px', 'gutenix' ),
				'section' 		=> 'header_buttons',
				'field' 		=> 'gutenix-dimensions',
				'type' 			=> 'control',
				'linked_choices' => true,
				'unit_choices' 	=> '',
				'choices' 		=> array(
					'top'    => esc_html__( 'Top', 'gutenix' ),
					'right'  => esc_html__( 'Right', 'gutenix' ),
					'bottom' => esc_html__( 'Bottom', 'gutenix' ),
					'left'   => esc_html__( 'Left', 'gutenix' ),
				),
				'default' 		=> array(
					'desktop' => array( 'top' => '6', 'right' => '20', 'bottom' => '6', 'left' => '20' ),
					'tablet'  => array( 'top' => '', 'right' => '', 'bottom' => '', 'left' => '' ),
					'mobile'  => array( 'top' => '', 'right' => '', 'bottom' => '', 'left' => ''	),
				),
				'input_attrs' 	=> array(
					'min'  => 0,
					'max'  => 100,
					'step' => 1,
				),
				'sanitize_callback' => 'gutenix_sanitize_dimensions',
				'dynamic_css' 	=> true,
				'conditions'  => array(
					'show_header_btn_2' => true,
				),
			),
			'header_btn_border_width_2' => array(
				'title' 			=> esc_html__( 'Border Width, px', 'gutenix' ),
				'section' 			=> 'header_buttons',
				'default' 			=> '0',
				'field' 			=> 'number',
				'input_attrs' 		=> array(
					'min'  => 0,
					'max'  => 10,
					'step' => 1,
				),
				'type' 				=> 'control',
				'dynamic_css' 		=> true,
				'conditions' 		=> array(
					'show_header_btn_2' => true,
				),
			),
			'header_btn_border_radius_2' => array(
				'title' 			=> esc_html__( 'Border Radius, px', 'gutenix' ),
				'section' 			=> 'header_buttons',
				'default' 			=> '4',
				'field' 			=> 'number',
				'input_attrs' 		=> array(
					'min'  => 0,
					'max'  => 200,
					'step' => 1,
				),
				'type' 				=> 'control',
				'dynamic_css' 		=> true,
				'conditions' 		=> array(
					'show_header_btn_2' => true,
				),
			),

			/** `Header Buttons Typography` section */
			'header_button_typography_heading' => array(
				'title' 			=> esc_html__( 'Buttons Typography', 'gutenix' ),
				'section' 			=> 'header_buttons',
				'field' 			=> 'gutenix-heading',
				'type' 				=> 'control',
			),
			'header_button_font_family' => array(
				'title' 			=> esc_html__( 'Font Family', 'gutenix' ),
				'section' 			=> 'header_buttons',
				'default' 			=> 'Libre Franklin, sans-serif',
				'field' 			=> 'fonts',
				'type' 				=> 'control',
				'dynamic_css' 		=> true,
			),
			'header_button_character_set' => array(
				'title' 			=> esc_html__( 'Character Set', 'gutenix' ),
				'description' 		=> esc_html__( 'Important: Not all fonts support every characters and font-weight.', 'gutenix' ),
				'section' 			=> 'header_buttons',
				'default' 			=> 'latin',
				'field' 			=> 'select',
				'choices' 			=> Gutenix_Utils::get_character_sets(),
				'type' 				=> 'control',
				'dynamic_css' 		=> true,
			),
			'header_button_font_style' => array(
				'title' 			=> esc_html__( 'Font Style', 'gutenix' ),
				'section' 			=> 'header_buttons',
				'default' 			=> 'normal',
				'field' 			=> 'select',
				'choices' 			=> Gutenix_Utils::get_font_styles(),
				'type' 				=> 'control',
				'dynamic_css' 		=> true,
			),
			'header_button_font_weight' => array(
				'title' 			=> esc_html__( 'Font Weight', 'gutenix' ),
				'section' 			=> 'header_buttons',
				'default' 			=> '800',
				'field' 			=> 'select',
				'choices' 			=> Gutenix_Utils::get_font_weight(),
				'type' 				=> 'control',
				'dynamic_css' 		=> true,
			),
			'header_button_font_size' => array(
				'title' 			=> esc_html__( 'Font Size, px', 'gutenix' ),
				'section' 			=> 'header_buttons',
				'default' 			=> array(
					'desktop' => '16',
					'tablet'  => '',
					'mobile'  => '',
				),
				'field' 			=> 'gutenix-input-responsive',
				'type' 				=> 'control',
				'input_attrs' 		=> array(
					'min' => 0,
				),
				'unit_choices' 		=> '',
				'dynamic_css' 		=> true,
				'sanitize_callback' => 'sanitize_input_responsive',
			),
			'header_button_line_height' => array(
				'title' 			=> esc_html__( 'Line Height', 'gutenix' ),
				'section' 			=> 'header_buttons',
				'default' 			=> '1.5',
				'field' 			=> 'number',
				'input_attrs' 		=> array(
					'min'  => 1.0,
					'max'  => 3.0,
					'step' => 0.1,
				),
				'type' 				=> 'control',
				'dynamic_css' 		=> true,
			),
			'header_button_letter_spacing' => array(
				'title' 			=> esc_html__( 'Letter Spacing, px', 'gutenix' ),
				'section' 			=> 'header_buttons',
				'default' 			=> '0',
				'field' 			=> 'number',
				'input_attrs' 		=> array(
					'min'  => - 10,
					'max'  => 10,
					'step' => 0.1,
				),
				'type' 				=> 'control',
				'dynamic_css' 		=> true,
			),
			'header_button_text_transform' => array(
				'title' 			=> esc_html__( 'Text Transform', 'gutenix' ),
				'section' 			=> 'header_buttons',
				'default' 			=> 'none',
				'field' 			=> 'select',
				'type' 				=> 'control',
				'choices' 			=> Gutenix_Utils::get_text_transform(),
				'dynamic_css' 		=> true,
			),

			/** `Footer` panel */
			'footer_options' => array(
				'title'    => esc_html__( 'Footer', 'gutenix' ),
				'priority' => 75,
				'type'     => 'panel',
			),

			/** `Footer Widgets Area` section */
			'footer_widgets' => array(
				'title' 			=> esc_html__( 'Footer Widgets Area', 'gutenix' ),
				'panel' 			=> 'footer_options',
				'type' 				=> 'section',
				'priority' 			=> 10,
			),
			'footer_widgets_visible' => array(
				'title' 			=> esc_html__( 'Show Footer Widgets Area', 'gutenix' ),
				'section' 			=> 'footer_widgets',
				'priority' 			=> 10,
				'default' 			=> false,
				'field' 			=> 'gutenix-toggle-checkbox',
				'type' 				=> 'control',
				'sanitize_callback' => 'gutenix_sanitize_checkbox',
			),
			'footer_widgets_columns' => array(
				'title' 			=> esc_html__( 'Columns', 'gutenix' ),
				'section' 			=> 'footer_widgets',
				'priority' 			=> 20,
				'default' 			=> '4',
				'field' 			=> 'select',
				'choices' 			=> array(
					'1' => '1',
					'2' => '2',
					'3' => '3',
					'4' => '4',
				),
				'type' 				=> 'control',
				'conditions' 		=> array(
					'footer_widgets_visible' => true,
				),
			),
			'footer_widgets_container_type' => array(
				'title' 			=> esc_html__( 'Container Type', 'gutenix' ),
				'section' 			=> 'footer_widgets',
				'priority' 			=> 50,
				'default' 			=> 'boxed',
				'field' 			=> 'gutenix-buttonset',
				'choices' 			=> array(
					'boxed' => esc_html__( 'Boxed', 'gutenix' ),
					'fluid' => esc_html__( 'Full Width', 'gutenix' ),
				),
				'type' 				=> 'control',
				'conditions' 		=> array(
					'footer_widgets_visible' => true,
				),
			),
			'footer_widgets_bg' => array(
				'title' 			=> esc_html__( 'Background color', 'gutenix' ),
				'section' 			=> 'footer_widgets',
				'priority' 			=> 50,
				'default' 			=> '#f6f6f7',
				'field' 			=> 'hex_color',
				'type' 				=> 'control',
				'dynamic_css' 		=> true,
				'conditions' 		=> array(
					'footer_widgets_visible' => true,
				),
			),
			'footer_widgets_bg_img' => array(
				'title' 			=> esc_html__( 'Background Image', 'gutenix' ),
				'section' 			=> 'footer_widgets',
				'priority' 			=> 50,
				'field' 			=> 'image',
				'type' 				=> 'control',
				'dynamic_css' 		=> true,
				'conditions' 		=> array(
					'footer_widgets_visible' => true,
				),
			),
			'footer_widgets_bg_size' => array(
				'title' 			=> esc_html__( 'Background Size', 'gutenix' ),
				'section' 			=> 'footer_widgets',
				'priority' 			=> 50,
				'default' 			=> 'cover',
				'field' 			=> 'select',
				'choices' 			=> Gutenix_Utils::get_bg_size(),
				'type' 				=> 'control',
				'dynamic_css' 		=> true,
				'conditions' 		=> array(
					'footer_widgets_visible' => true,
					'footer_widgets_bg_img!' => '',
				),
			),
			'footer_widgets_bg_position' => array(
				'title' 			=> esc_html__( 'Background Position', 'gutenix' ),
				'section' 			=> 'footer_widgets',
				'priority' 			=> 50,
				'default' 			=> 'center',
				'field' 			=> 'select',
				'choices' 			=> Gutenix_Utils::get_bg_position(),
				'type' 				=> 'control',
				'dynamic_css' 		=> true,
				'conditions' 		=> array(
					'footer_widgets_visible' => true,
					'footer_widgets_bg_img!' => '',
				),
			),
			'footer_widgets_bg_repeat' => array(
				'title' 			=> esc_html__( 'Background Repeat', 'gutenix' ),
				'section' 			=> 'footer_widgets',
				'priority' 			=> 50,
				'default' 			=> 'no-repeat',
				'field' 			=> 'select',
				'choices' 			=> Gutenix_Utils::get_bg_repeat(),
				'type' 				=> 'control',
				'dynamic_css' 		=> true,
				'conditions' 		=> array(
					'footer_widgets_visible' => true,
					'footer_widgets_bg_img!' => '',
				),
			),
			'footer_widgets_bg_attachment' => array(
				'title' 			=> esc_html__( 'Background Attachment', 'gutenix' ),
				'section' 			=> 'footer_widgets',
				'priority' 			=> 50,
				'default' 			=> 'scroll',
				'field' 			=> 'select',
				'choices' 			=> Gutenix_Utils::get_bg_attachment(),
				'type' 				=> 'control',
				'dynamic_css' 		=> true,
				'conditions' 		=> array(
					'footer_widgets_visible' => true,
					'footer_widgets_bg_img!' => '',
				),
			),
			'footer_widgets_padding' => array(
				'title' 			=> esc_html__( 'Vertical Padding, px', 'gutenix' ),
				'section' 			=> 'footer_widgets',
				'priority' 			=> 60,
				'field' 			=> 'gutenix-dimensions',
				'type' 				=> 'control',
				'linked_choices' 	=> true,
				'unit_choices' 		=> '',
				'choices' 			=> array(
					'top'    => esc_html__( 'Top', 'gutenix' ),
					'bottom' => esc_html__( 'Bottom', 'gutenix' ),
				),
				'default' 			=> array(
					'desktop' => array( 'top' => '70', 'bottom' => '10' ),
					'tablet'  => array( 'top' => '', 'bottom' => '' ),
					'mobile'  => array( 'top' => '', 'bottom' => ''	),
				),
				'input_attrs' 		=> array(
					'min'  => 0,
					'max'  => 500,
					'step' => 1,
				),
				'sanitize_callback' => 'gutenix_sanitize_dimensions',
				'dynamic_css' 		=> true,
				'conditions' 		=> array(
					'footer_widgets_visible' => true,
				),
			),

			/* Footer Widgets Title Settings */
			'footer_widgets_title_typography_heading' => array(
				'title' 			=> esc_html__( 'Footer Widget Title Settings', 'gutenix' ),
				'section' 			=> 'footer_widgets',
				'priority' 			=> 60,
				'field' 			=> 'gutenix-heading',
				'type' 				=> 'control',
				'conditions' 		=> array(
					'footer_widgets_visible' => true,
				),
			),
			'footer_widgets_title_transform' => array(
				'title' 			=> esc_html__( 'Text Transform', 'gutenix' ),
				'section' 			=> 'footer_widgets',
				'priority' 			=> 60,
				'default' 			=> 'none',
				'field' 			=> 'select',
				'type' 				=> 'control',
				'choices' 			=> Gutenix_Utils::get_text_transform(),
				'dynamic_css' 		=> true,
				'conditions' 		=> array(
					'footer_widgets_visible' => true,
				),
			),
			'footer_widgets_title_font_style' => array(
				'title' 			=> esc_html__( 'Font Style', 'gutenix' ),
				'section' 			=> 'footer_widgets',
				'priority' 			=> 60,
				'default' 			=> 'normal',
				'field' 			=> 'select',
				'choices' 			=> Gutenix_Utils::get_font_styles(),
				'type' 				=> 'control',
				'dynamic_css' 		=> true,
				'conditions' 		=> array(
					'footer_widgets_visible' => true,
				),
			),
			'footer_widgets_title_font_weight' => array(
				'title' 			=> esc_html__( 'Font Weight', 'gutenix' ),
				'description' 		=> esc_html__( 'Important: Not all fonts support every font-weight.', 'gutenix' ),
				'section' 			=> 'footer_widgets',
				'priority' 			=> 60,
				'default' 			=> '700',
				'field' 			=> 'select',
				'choices' 			=> Gutenix_Utils::get_font_weight(),
				'type' 				=> 'control',
				'dynamic_css' 		=> true,
				'conditions' 		=> array(
					'footer_widgets_visible' => true,
				),
			),
			'footer_widgets_title_font_size' => array(
				'title' 			=> esc_html__( 'Font Size, px', 'gutenix' ),
				'section' 			=> 'footer_widgets',
				'priority' 			=> 60,
				'default' 			=> array(
					'desktop' 	=> '20',
					'tablet' 	=> '',
					'mobile' 	=> '',
				),
				'field' 			=> 'gutenix-input-responsive',
				'type' 				=> 'control',
				'input_attrs' 		=> array(
					'min' => 0,
				),
				'unit_choices' 		=> '',
				'dynamic_css' 		=> true,
				'sanitize_callback' => 'sanitize_input_responsive',
				'conditions' 		=> array(
					'footer_widgets_visible' => true,
				),
			),
			'footer_widgets_title_letter_spacing' => array(
				'title' 			=> esc_html__( 'Letter Spacing, px', 'gutenix' ),
				'section' 			=> 'footer_widgets',
				'priority' 			=> 60,
				'default' 			=> '0',
				'field' 			=> 'number',
				'input_attrs' 		=> array(
					'min' 	=> - 10,
					'max' 	=> 10,
					'step' 	=> 0.1,
				),
				'type' 				=> 'control',
				'dynamic_css' 		=> true,
				'conditions' 		=> array(
					'footer_widgets_visible' => true,
				),
			),
			'footer_widgets_title_color' => array(
				'title' 			=> esc_html__( 'Color', 'gutenix' ),
				'section' 			=> 'footer_widgets',
				'priority' 			=> 60,
				'default' 			=> '#414756',
				'field' 			=> 'hex_color',
				'type' 				=> 'control',
				'dynamic_css' 		=> true,
				'conditions' 		=> array(
					'footer_widgets_visible' => true,
				),
			),
			'footer_widgets_title_padding' => array(
				'title' 			=> esc_html__( 'Vertical Padding, px', 'gutenix' ),
				'section' 			=> 'footer_widgets',
				'priority' 			=> 60,
				'field' 			=> 'gutenix-dimensions',
				'type' 				=> 'control',
				'linked_choices' 	=> true,
				'unit_choices' 		=> '',
				'choices' 			=> array(
					'top' 		=> esc_html__( 'Top', 'gutenix' ),
					'bottom' 	=> esc_html__( 'Bottom', 'gutenix' ),
				),
				'default' 			=> array(
					'desktop' 	=> array( 'top' => '', 'bottom' => '15' ),
					'tablet' 	=> array( 'top' => '', 'bottom' => '' ),
					'mobile' 	=> array( 'top' => '', 'bottom' => ''	),
				),
				'input_attrs' 		=> array(
					'min' 		=> 0,
					'max' 		=> 200,
					'step' 		=> 1,
				),
				'sanitize_callback' => 'gutenix_sanitize_dimensions',
				'dynamic_css' 		=> true,
				'conditions' 		=> array(
					'footer_widgets_visible' => true,
				),
			),

			/* Footer Widgets Content Settings */
			'footer_widgets_content_typography_heading' => array(
				'title' 			=> esc_html__( 'Footer Widget Content Settings', 'gutenix' ),
				'section' 			=> 'footer_widgets',
				'priority' 			=> 70,
				'field' 			=> 'gutenix-heading',
				'type' 				=> 'control',
				'conditions' 		=> array(
					'footer_widgets_visible' => true,
				),
			),
			'footer_widgets_content_font_size' => array(
				'title' 			=> esc_html__( 'Font Size, px', 'gutenix' ),
				'section' 			=> 'footer_widgets',
				'priority' 			=> 70,
				'default' 			=> array(
					'desktop' 	=> '16',
					'tablet' 	=> '',
					'mobile' 	=> '',
				),
				'field' 			=> 'gutenix-input-responsive',
				'type' 				=> 'control',
				'input_attrs' 		=> array(
					'min' => 0,
				),
				'unit_choices' 		=> '',
				'dynamic_css' 		=> true,
				'sanitize_callback' => 'sanitize_input_responsive',
				'conditions' 		=> array(
					'footer_widgets_visible' => true,
				),
			),
			'footer_widgets_content_letter_spacing' => array(
				'title' 			=> esc_html__( 'Letter Spacing, px', 'gutenix' ),
				'section' 			=> 'footer_widgets',
				'priority' 			=> 70,
				'default' 			=> '0',
				'field' 			=> 'number',
				'input_attrs' 		=> array(
					'min' 	=> - 10,
					'max' 	=> 10,
					'step' 	=> 0.1,
				),
				'type' 				=> 'control',
				'dynamic_css' 		=> true,
				'conditions' 		=> array(
					'footer_widgets_visible' => true,
				),
			),
			'footer_widgets_content_color' => array(
				'title' 			=> esc_html__( 'Text Color', 'gutenix' ),
				'section' 			=> 'footer_widgets',
				'priority' 			=> 70,
				'default' 			=> '#a0a3aa',
				'field' 			=> 'hex_color',
				'type' 				=> 'control',
				'dynamic_css' 		=> true,
				'conditions' 		=> array(
					'footer_widgets_visible' => true,
				),
			),
			'footer_widgets_link_color' => array(
				'title' 			=> esc_html__( 'Link Color', 'gutenix' ),
				'section' 			=> 'footer_widgets',
				'priority' 			=> 70,
				'default' 			=> '#3260b1',
				'field' 			=> 'hex_color',
				'type' 				=> 'control',
				'dynamic_css' 		=> true,
				'conditions' 		=> array(
					'footer_widgets_visible' => true,
				),
			),
			'footer_widgets_link_hover_color' => array(
				'title' 			=> esc_html__( 'Link Hover Color', 'gutenix' ),
				'section' 			=> 'footer_widgets',
				'priority' 			=> 70,
				'default' 			=> '#414756',
				'field' 			=> 'hex_color',
				'type' 				=> 'control',
				'dynamic_css' 		=> true,
				'conditions' 		=> array(
					'footer_widgets_visible' => true,
				),
			),
			'footer_widgets_link_font_weight' => array(
				'title' 			=> esc_html__( 'Link Font Weight', 'gutenix' ),
				'description' 		=> esc_html__( 'Important: Not all fonts support every font-weight.', 'gutenix' ),
				'section' 			=> 'footer_widgets',
				'priority' 			=> 70,
				'default' 			=> '700',
				'field' 			=> 'select',
				'choices' 			=> Gutenix_Utils::get_font_weight(),
				'type' 				=> 'control',
				'dynamic_css' 		=> true,
				'conditions' 		=> array(
					'footer_widgets_visible' => true,
				),
			),


			/** `Footer Bar` section */
			'footer_bar' => array(
				'title' 			=> esc_html__( 'Footer Bar', 'gutenix' ),
				'panel' 			=> 'footer_options',
				'type' 				=> 'section',
				'priority' 			=> 20,
			),
			'footer_layout_type' => array(
				'title' 			=> esc_html__( 'Layout', 'gutenix' ),
				'section' 			=> 'footer_bar',
				'priority' 			=> 10,
				'default' 			=> 'style-1',
				'choices' 			=> Gutenix_Utils::get_footer_layout_options(),
				'field' 			=> 'select',
				'type' 				=> 'control',
			),
			'footer_container_type' => array(
				'title' 			=> esc_html__( 'Container Type', 'gutenix' ),
				'section' 			=> 'footer_bar',
				'priority' 			=> 20,
				'default' 			=> 'boxed',
				'field' 			=> 'gutenix-buttonset',
				'choices' 			=> array(
					'boxed' => esc_html__( 'Boxed', 'gutenix' ),
					'fluid' => esc_html__( 'Full Width', 'gutenix' ),
				),
				'type' 				=> 'control',
				'conditions' 		=> array(
					'footer_layout_type!' => 'disable',
				),
			),
			'footer_logo_visible' => array(
				'title' 			=> esc_html__( 'Show Footer Logo', 'gutenix' ),
				'section' 			=> 'footer_bar',
				'default' 			=> false,
				'field' 			=> 'checkbox',
				'type' 				=> 'control',
				'conditions' 		=> array(
					'footer_layout_type!' => 'disable',
				),
			),
			'footer_logo' => array(
				'title' 			=> esc_html__( 'Footer Logo', 'gutenix' ),
				'section' 			=> 'footer_bar',
				'field' 			=> 'image',
				'type' 				=> 'control',
				'conditions' 		=> array(
					'footer_logo_visible' => true,
					'footer_layout_type!' => 'disable',
				),
			),
			'footer_copyright' => array(
				'title'   => esc_html__( 'Copyright text', 'gutenix' ),
				'section' => 'footer_bar',
				'default' => Gutenix_Utils::get_default_footer_copyright(),
				'field'   => 'textarea',
				'type'    => 'control',
				'conditions' 		=> array(
					'footer_layout_type!' => 'disable',
				),
			),
			'footer_menu_visible' => array(
				'title'   => esc_html__( 'Show Footer Menu', 'gutenix' ),
				'section' => 'footer_bar',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
				'conditions' 		=> array(
					'footer_layout_type!' => 'disable',
				),
			),
			'footer_social_links_visible' => array(
				'title'   => esc_html__( 'Show Social Links', 'gutenix' ),
				'section' => 'footer_bar',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
				'conditions' 		=> array(
					'footer_layout_type!' => 'disable',
				),
			),
			'footer_bg' => array(
				'title'       => esc_html__( 'Background Color', 'gutenix' ),
				'section'     => 'footer_bar',
				'default'     => '#f6f6f7',
				'field'       => 'hex_color',
				'type'        => 'control',
				'dynamic_css' => true,
				'conditions' 		=> array(
					'footer_layout_type!' => 'disable',
				),
			),
			'footer_bg_img' => array(
				'title' 			=> esc_html__( 'Background Image', 'gutenix' ),
				'section' 			=> 'footer_bar',
				'field' 			=> 'image',
				'type' 				=> 'control',
				'dynamic_css' 		=> true,
				'conditions' 		=> array(
					'footer_layout_type!' => 'disable',
				),
			),
			'footer_bg_size' => array(
				'title'       => esc_html__( 'Background Size', 'gutenix' ),
				'section'     => 'footer_bar',
				'default'     => 'cover',
				'field'       => 'select',
				'choices'     => Gutenix_Utils::get_bg_size(),
				'type'        => 'control',
				'dynamic_css' => true,
				'conditions'  => array(
					'footer_layout_type!' => 'disable',
					'footer_bg_img!' => '',
				),
			),
			'footer_bg_position' => array(
				'title'       => esc_html__( 'Background Position', 'gutenix' ),
				'section'     => 'footer_bar',
				'default'     => 'center',
				'field'       => 'select',
				'choices'     => Gutenix_Utils::get_bg_position(),
				'type'        => 'control',
				'dynamic_css' => true,
				'conditions'  => array(
					'footer_layout_type!' => 'disable',
					'footer_bg_img!' => '',
				),
			),
			'footer_bg_repeat' => array(
				'title'       => esc_html__( 'Background Repeat', 'gutenix' ),
				'section'     => 'footer_bar',
				'default'     => 'no-repeat',
				'field'       => 'select',
				'choices'     => Gutenix_Utils::get_bg_repeat(),
				'type'        => 'control',
				'dynamic_css' => true,
				'conditions'  => array(
					'footer_layout_type!' => 'disable',
					'footer_bg_img!' => '',
				),
			),
			'footer_bg_attachment' => array(
				'title'       => esc_html__( 'Background Attachment', 'gutenix' ),
				'section'     => 'footer_bar',
				'default'     => 'scroll',
				'field'       => 'select',
				'choices'     => Gutenix_Utils::get_bg_attachment(),
				'type'        => 'control',
				'dynamic_css' => true,
				'conditions'  => array(
					'footer_layout_type!' => 'disable',
					'footer_bg_img!' => '',
				),
			),
			'footer_text_color' => array(
				'title'       => esc_html__( 'Text color', 'gutenix' ),
				'section'     => 'footer_bar',
				'default'     => '#a0a3aa',
				'field'       => 'hex_color',
				'type'        => 'control',
				'dynamic_css' => true,
				'conditions' 		=> array(
					'footer_layout_type!' => 'disable',
				),
			),
			'footer_link_color' => array(
				'title'       => esc_html__( 'Link color', 'gutenix' ),
				'section'     => 'footer_bar',
				'default'     => '#a0a3aa',
				'field'       => 'hex_color',
				'type'        => 'control',
				'dynamic_css' => true,
				'conditions' 		=> array(
					'footer_layout_type!' => 'disable',
				),
			),
			'footer_link_hover_color' => array(
				'title'       => esc_html__( 'Link hover color', 'gutenix' ),
				'section'     => 'footer_bar',
				'default'     => '#3260b1',
				'field'       => 'hex_color',
				'type'        => 'control',
				'dynamic_css' => true,
				'conditions' 		=> array(
					'footer_layout_type!' => 'disable',
				),
			),
			'footer_vertical_padding' => array(
				'title' 			=> esc_html__( 'Vertical Padding, px', 'gutenix' ),
				'section' 			=> 'footer_bar',
				'field' 			=> 'gutenix-dimensions',
				'type' 				=> 'control',
				'linked_choices' 	=> true,
				'unit_choices' 		=> '',
				'choices' 			=> array(
					'top'    => esc_html__( 'Top', 'gutenix' ),
					'bottom' => esc_html__( 'Bottom', 'gutenix' ),
				),
				'default' 			=> array(
					'desktop' => array( 'top' => '25', 'bottom' => '25' ),
					'tablet'  => array( 'top' => '', 'bottom' => '' ),
					'mobile'  => array( 'top' => '', 'bottom' => ''	),
				),
				'input_attrs' 		=> array(
					'min'  => 0,
					'max'  => 500,
					'step' => 1,
				),
				'sanitize_callback' => 'gutenix_sanitize_dimensions',
				'dynamic_css' 		=> true,
				'conditions' 		=> array(
					'footer_layout_type!' => 'disable',
				),
			),
			'footer_border_top_size' => array(
				'title' 			=> esc_html__( 'Border Top Size', 'gutenix' ),
				'section' 			=> 'footer_bar',
				'default' 			=> 'wide',
				'field' 			=> 'select',
				'choices' 			=> array(
					'wide' 	=> esc_html__( 'Wide', 'gutenix' ),
					'boxed' => esc_html__( 'Boxed', 'gutenix' ),
				),
				'type' 				=> 'control',
				'conditions' 		=> array(
					'footer_layout_type!' => 'disable',
				),
			),
			'footer_border_top_width' => array(
				'title' 			=> esc_html__( 'Border Top Width, px', 'gutenix' ),
				'section' 			=> 'footer_bar',
				'default' 			=> '0',
				'field' 			=> 'number',
				'input_attrs' 		=> array(
					'min'  => 0,
					'max'  => 10,
					'step' => 1,
				),
				'type' 				=> 'control',
				'dynamic_css' 		=> true,
				'conditions' 		=> array(
					'footer_layout_type!' => 'disable',
				),
			),
			'footer_border_top_color' => array(
				'title'       => esc_html__( 'Border Top Color', 'gutenix' ),
				'section'     => 'footer_bar',
				'default'     => '#e8e9eb',
				'field'       => 'hex_color',
				'type'        => 'control',
				'dynamic_css' => true,
				'conditions' 		=> array(
					'footer_layout_type!' => 'disable'
				),
			),
			'footer_font_size' => array(
				'title'       => esc_html__( 'Font Size, px', 'gutenix' ),
				'section'     => 'footer_bar',
				'default'     => '14',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 6,
					'max'  => 50,
					'step' => 1,
				),
				'type'        => 'control',
				'dynamic_css' => true,
				'conditions' 		=> array(
					'footer_layout_type!' => 'disable',
				),
			),

			/** `Blog Settings` panel */
			'blog_settings' => array(
				'title'    => esc_html__( 'Blog Settings', 'gutenix' ),
				'priority' => 80,
				'type'     => 'panel',
			),

			/** `Blog` section */
			'blog' => array(
				'title'    => esc_html__( 'Blog', 'gutenix' ),
				'panel'    => 'blog_settings',
				'priority' => 5,
				'type'     => 'section',
			),

			/* Blog Page Title */
			'blog_page_title_typography_heading' => array(
				'title' 			=> esc_html__( 'Blog Page Title', 'gutenix' ),
				'section' 			=> 'blog',
				'priority' 			=> 5,
				'field' 			=> 'gutenix-heading',
				'type' 				=> 'control',
			),
			'blog_page_title' => array(
				'title' 			=> esc_html__( 'Show Blog Page Title', 'gutenix' ),
				'section' 			=> 'blog',
				'priority' 			=> 5,
				'default' 			=> true,
				'field' 			=> 'checkbox',
				'type' 				=> 'control',
			),
			'archive_page_title' => array(
				'title' 			=> esc_html__( 'Show on Archive Page', 'gutenix' ),
				'section' 			=> 'blog',
				'priority' 			=> 5,
				'default' 			=> true,
				'field' 			=> 'checkbox',
				'type' 				=> 'control',
			),
			'search_page_title' => array(
				'title' 			=> esc_html__( 'Show on Search Page', 'gutenix' ),
				'section' 			=> 'blog',
				'priority' 			=> 5,
				'default' 			=> true,
				'field' 			=> 'checkbox',
				'type' 				=> 'control',
			),

			/* Blog Page Layouts */
			'blog_page_title_layout_heading' => array(
				'title' 			=> esc_html__( 'Blog Page Layout', 'gutenix' ),
				'section' 			=> 'blog',
				'priority' 			=> 5,
				'field' 			=> 'gutenix-heading',
				'type' 				=> 'control',
			),
			'layout_type_blog' => array(
				'title'    => esc_html__( 'Layout for Blog Page & Blog Archives', 'gutenix' ),
				'section'  => 'blog',
				'priority' => 5,
				'default'  => 'boxed-content-sidebar',
				'field'    => 'gutenix-radio-image',
				'type'     => 'control',
				'choices'  => Gutenix_Utils::get_page_layout_options(),
			),
			'blog_post_meta' => array(
				'title'    => esc_html__( 'Show Post Meta', 'gutenix' ),
				'section'  => 'blog',
				'priority' => 10,
				'default'  => array( 'categories', 'author', 'date', 'comments', 'tags' ),
				'field'    => 'gutenix-multi-check',
				'type'     => 'control',
				'choices'  => array(
					'categories' 		=> esc_html__( 'Categories', 'gutenix' ),
					'author' 			=> esc_html__( 'Author', 'gutenix' ),
					'date' 				=> esc_html__( 'Date', 'gutenix' ),
					'comments' 			=> esc_html__( 'Comments', 'gutenix' ),
					'tags' 				=> esc_html__( 'Tags', 'gutenix' ),
				),
				'sanitize_callback' => 'gutenix_customizer_sanitize_multi_choices',
				'active_callback' => 'gutenix_cac_has_blog_entry_meta',
			),
			'blog_sticky_type' => array(
				'title'    => esc_html__( 'Sticky label type', 'gutenix' ),
				'section'  => 'blog',
				'priority' => 15,
				'default'  => 'icon',
				'field'    => 'select',
				'choices'  => array(
					'label' => esc_html__( 'Text Label', 'gutenix' ),
					'icon'  => esc_html__( 'Font Icon', 'gutenix' ),
					'both'  => esc_html__( 'Text with Icon', 'gutenix' ),
				),
				'type'     => 'control',
			),
			'blog_sticky_label' => array(
				'title'       => esc_html__( 'Featured Post Label', 'gutenix' ),
				'description' => esc_html__( 'Label for sticky post', 'gutenix' ),
				'section'     => 'blog',
				'priority'    => 15,
				'default'     => esc_html__( 'Featured', 'gutenix' ),
				'field'       => 'text',
				'type'        => 'control',
				'transport'   => 'postMessage',
				'conditions'  => array(
					'blog_sticky_type' => array( 'label', 'both' ),
				),
			),
			'blog_post_content' => array(
				'title'    => esc_html__( 'Post Content', 'gutenix' ),
				'section'  => 'blog',
				'priority' => 25,
				'default'  => 'excerpt',
				'field'    => 'select',
				'choices'  => array(
					'full-content' 		=> esc_html__( 'Full Content', 'gutenix' ),
					'excerpt' 			=> esc_html__( 'Excerpt', 'gutenix' ),
				),
				'type'     => 'control',
				'active_callback' => 'gutenix_cac_has_blog_entry_excerpt',
			),
			'blog_post_excerpt_words_count' => array(
				'title'       => esc_html__( 'Excerpt Words Count', 'gutenix' ),
				'section'     => 'blog',
				'priority'    => 50,
				'default'     => '20',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 1,
					'max'  => 100,
					'step' => 1,
				),
				'type'        => 'control',
				'active_callback' => 'gutenix_cac_has_blog_entry_excerpt',
			),
			'blog_navigation_type' => array(
				'title'    => esc_html__( 'Navigation type', 'gutenix' ),
				'section'  => 'blog',
				'priority' => 55,
				'default'  => 'pagination',
				'field'    => 'select',
				'choices'  => array(
					'navigation' => esc_html__( 'Navigation', 'gutenix' ),
					'pagination' => esc_html__( 'Pagination', 'gutenix' ),
				),
				'type'     => 'control',
			),
			
			/* `Read More` options */
			'blog_read_more_heading' => array(
				'title' 			=> esc_html__( 'Learn More Button Settings', 'gutenix' ),
				'section' 			=> 'blog',
				'priority' 			=> 60,
				'field' 			=> 'gutenix-heading',
				'type' 				=> 'control',
			),
			'blog_read_more' => array(
				'title' 			=> esc_html__( 'Show read more button', 'gutenix' ),
				'section' 			=> 'blog',
				'priority' 			=> 60,
				'default' 			=> true,
				'field' 			=> 'checkbox',
				'type' 				=> 'control',
			),
			'blog_read_more_text' => array(
				'title' 			=> esc_html__( 'Read more button text', 'gutenix' ),
				'section' 			=> 'blog',
				'priority' 			=> 60,
				'default' 			=> esc_html__( 'Learn More', 'gutenix' ),
				'field' 			=> 'text',
				'type' 				=> 'control',
				'transport' 		=> 'postMessage',
				'conditions' 		=> array(
					'blog_read_more' => true,
				),
			),

			/** `Post` section */
			'blog_post' => array(
				'title' 			=> esc_html__( 'Post', 'gutenix' ),
				'panel' 			=> 'blog_settings',
				'priority' 			=> 10,
				'type' 				=> 'section',
				'active_callback' 	=> 'callback_single',
			),
			'layout_type_post' => array(
				'title' 			=> esc_html__( 'Layout for Blog Post', 'gutenix' ),
				'section' 			=> 'blog_post',
				'priority' 			=> 10,
				'default' 			=> 'boxed-content-sidebar',
				'field' 			=> 'gutenix-radio-image',
				'type' 				=> 'control',
				'choices' 			=> Gutenix_Utils::get_page_layout_options(),
			),
			'single_post_meta' => array(
				'title' 			=> esc_html__( 'Meta', 'gutenix' ),
				'section' 			=> 'blog_post',
				'priority' 			=> 20,
				'default' 			=> array( 'categories', 'author', 'date', 'comments' ),
				'field' 			=> 'gutenix-multi-check',
				'type' 				=> 'control',
				'choices' 	=> array(
					'categories' => esc_html__( 'Categories', 'gutenix' ),
					'author' 	=> esc_html__( 'Author', 'gutenix' ),
					'date' 		=> esc_html__( 'Date', 'gutenix' ),
					'comments' 	=> esc_html__( 'Comments', 'gutenix' )
				),
				'sanitize_callback' => 'gutenix_customizer_sanitize_multi_choices'
			),
			'single_post_meta_sep' => array(
				'section' 	=> 'blog_post',
				'field' 	=> 'gutenix-separator',
				'type' 		=> 'control',
			),

			/** `Related Posts` section */
			'related_posts' => array(
				'title'           => esc_html__( 'Related posts block', 'gutenix' ),
				'panel'           => 'blog_settings',
				'priority'        => 15,
				'type'            => 'section',
				'active_callback' => 'callback_single',
			),
			'related_posts_visible' => array(
				'title'   => esc_html__( 'Show related posts block', 'gutenix' ),
				'section' => 'related_posts',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'related_posts_block_title' => array(
				'title'      => esc_html__( 'Related posts block title', 'gutenix' ),
				'section'    => 'related_posts',
				'default'    => esc_html__( 'Related Posts', 'gutenix' ),
				'field'      => 'text',
				'type'       => 'control',
				'transport'  => 'postMessage',
				'conditions' => array(
					'related_posts_visible' => true,
				),
			),
			'related_posts_count' => array(
				'title'       => esc_html__( 'Number of posts', 'gutenix' ),
				'section'     => 'related_posts',
				'default'     => '2',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 1,
					'max'  => 12,
					'step' => 1,
				),
				'type'        => 'control',
				'conditions'  => array(
					'related_posts_visible' => true,
				),
			),
			'related_posts_grid' => array(
				'title'   => esc_html__( 'Layout', 'gutenix' ),
				'section' => 'related_posts',
				'default' => '2',
				'field'   => 'select',
				'choices' => array(
					'2' => esc_html__( '2 columns', 'gutenix' ),
					'3' => esc_html__( '3 columns', 'gutenix' ),
					'4' => esc_html__( '4 columns', 'gutenix' ),
				),
				'type'       => 'control',
				'conditions' => array(
					'related_posts_visible' => true,
				),
			),
			'related_posts_image' => array(
				'title'      => esc_html__( 'Show post image', 'gutenix' ),
				'section'    => 'related_posts',
				'default'    => true,
				'field'      => 'checkbox',
				'type'       => 'control',
				'conditions' => array(
					'related_posts_visible' => true,
				),
			),
			'related_posts_author' => array(
				'title'      => esc_html__( 'Show post author', 'gutenix' ),
				'section'    => 'related_posts',
				'default'    => true,
				'field'      => 'checkbox',
				'type'       => 'control',
				'conditions' => array(
					'related_posts_visible' => true,
				),
			),
			'related_posts_publish_date' => array(
				'title'      => esc_html__( 'Show post publish date', 'gutenix' ),
				'section'    => 'related_posts',
				'default'    => true,
				'field'      => 'checkbox',
				'type'       => 'control',
				'conditions' => array(
					'related_posts_visible' => true,
				),
			),
			'related_posts_categories' => array(
				'title'      => esc_html__( 'Show categories', 'gutenix' ),
				'section'    => 'related_posts',
				'default'    => true,
				'field'      => 'checkbox',
				'type'       => 'control',
				'conditions' => array(
					'related_posts_visible' => true,
				),
			),
			'related_posts_tags' => array(
				'title'      => esc_html__( 'Show tags', 'gutenix' ),
				'section'    => 'related_posts',
				'default'    => false,
				'field'      => 'checkbox',
				'type'       => 'control',
				'conditions' => array(
					'related_posts_visible' => true,
				),
			),
			'related_posts_comments' => array(
				'title'      => esc_html__( 'Show comments', 'gutenix' ),
				'section'    => 'related_posts',
				'default'    => true,
				'field'      => 'checkbox',
				'type'       => 'control',
				'conditions' => array(
					'related_posts_visible' => true,
				),
			),
			'related_posts_excerpt' => array(
				'title'      => esc_html__( 'Show excerpt', 'gutenix' ),
				'section'    => 'related_posts',
				'default'    => false,
				'field'      => 'checkbox',
				'type'       => 'control',
				'conditions' => array(
					'related_posts_visible' => true,
				),
			),
			'related_posts_excerpt_words_count' => array(
				'title'       => esc_html__( 'Excerpt Words Count', 'gutenix' ),
				'section'     => 'related_posts',
				'default'     => '20',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 1,
					'max'  => 100,
					'step' => 1,
				),
				'type'        => 'control',
				'conditions'  => array(
					'related_posts_visible' => true,
					'related_posts_excerpt' => true,
				),
			),
		),
	) );
}

/**
 * Return array of arguments for dynamic CSS module
 *
 * @since  1.0.0
 * @return array
 */
function gutenix_get_dynamic_css_options() {
	return apply_filters( 'gutenix_get_dynamic_css_options', array(
		'prefix'         => 'gutenix',
		'type'           => 'theme_mod',
		'options_cb'     => 'get_theme_mods',
		'parent_handles' => array(
			'css' => 'gutenix-theme-style',
			'js'  => 'gutenix-theme-script',
		),
		'css_files' => array(
			get_theme_file_path( 'assets/css/dynamic/dynamic.css' ),
			get_theme_file_path( 'assets/css/dynamic/dynamic-css.php' ),
			get_theme_file_path( 'assets/css/dynamic/site/post.css' ),
			get_theme_file_path( 'assets/css/dynamic/site/buttons.css' ),
			get_theme_file_path( 'assets/css/dynamic/site/widgets.css' ),
			get_theme_file_path( 'assets/css/dynamic/site/header.css' ),
			get_theme_file_path( 'assets/css/dynamic/site/footer.css' ),
			get_theme_file_path( 'assets/css/dynamic/site/menus.css' ),
		),
	) );
}

/**
 * Change native customize control (based on WordPress core).
 *
 * @since 1.0.0
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function gutenix_customize_register( $wp_customize ) {
	$wp_customize->get_control( 'custom_logo' )->section 		= 'gutenix_logo_favicon';
	$wp_customize->get_control( 'site_icon' )->section 			= 'gutenix_logo_favicon';
	
	$wp_customize->get_control( 'header_image' )->section 		= 'header_image';
	$wp_customize->get_section( 'header_image' )->priority 		= 100;

	$wp_customize->get_control( 'background_color' )->section  	= 'background_image';
	$wp_customize->get_section( 'background_image' )->priority 	= 90;
	$wp_customize->get_section( 'background_image' )->title    	= esc_html__( 'Body Background', 'gutenix' );

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) && apply_filters( 'gutenix_use_customize_selective_refresh', true ) ) {

		$partial = gutenix_get_selective_refresh_partials();

		foreach ( $partial as $id => $args ) {

			if ( isset( $args['settings'] ) ) {

				foreach ( (array) $args['settings'] as $setting ) {
					$wp_customize->get_setting( $setting )->transport = 'postMessage';
				}

			} else {
				$wp_customize->get_setting( $id )->transport = 'postMessage';
			}

			$wp_customize->selective_refresh->add_partial( $id, $args );
		}
	}

	

		
	
}
add_action( 'customize_register', 'gutenix_customize_register', 20 );

/**
 * Get customize selective refresh partials.
 *
 * @since  1.0.0
 * @return array
 */
function gutenix_get_selective_refresh_partials() {
	return apply_filters( 'gutenix_get_selective_refresh_partials', array(
		'dynamic_css' => array(
			'selector'        => '#gutenix-theme-style-inline-css',
			'settings'        => gutenix_get_dynamic_css_settings_list(),
			'render_callback' => array( gutenix_theme()->dynamic_css, 'get_inline_css' ),
		),
		'fonts_loader' => array(
			'selector'            => '#cx-google-fonts-gutenix-css',
			'settings'            => gutenix_get_fonts_settings_list(),
			'render_callback'     => 'gutenix_customize_partial_fonts_loader',
			'container_inclusive' => true,
		),
		'custom_logo' => array(
			'selector'            => '.site-logo',
			'render_callback'     => 'gutenix_header_logo',
			'container_inclusive' => true,
		),
		'show_tagline' => array(
			'selector'            => '.site-description',
			'render_callback'     => 'gutenix_site_description',
			'container_inclusive' => true,
		),
		'blog_sticky_type' => array(
			'selector'            => '.sticky.post .sticky-label',
			'render_callback'     => 'gutenix_get_sticky_label',
			'container_inclusive' => true,
		),
		'posts_list' => array(
			'selector' => '.blog .site-main, .archive .site-main',
			'settings' => array(
				'blog_page_title',
				'archive_page_title',
				'search_page_title',
				'blog_post_excerpt_words_count',
				'blog_read_more',
				'blog_navigation_type',
			),
			'render_callback' => 'gutenix_customize_partial_posts_list',
		),
		'single_related_posts' => array(
			'selector' => '.related-posts-customize-partial',
			'settings' => array(
				'related_posts_visible',
				'related_posts_count',
				'related_posts_grid',
				'related_posts_image',
				'related_posts_author',
				'related_posts_publish_date',
				'related_posts_categories',
				'related_posts_tags',
				'related_posts_comments',
				'related_posts_excerpt',
				'related_posts_excerpt_words_count',
			),
			'render_callback' => 'gutenix_related_posts',
		),
		'top_panel' => array(
			'selector' => '.top-panel',
			'settings' => array(
				'top_panel_visible',
				'top_panel_container_type',
				'top_panel_text',
				'top_panel_menu_visible',
				'top_panel_social_links_visible',
			),
			'render_callback'     => 'gutenix_top_panel_markup',
			'container_inclusive' => true,
		),
		'header_bar' => array(
			'selector' => '.header-bar',
			'settings' => array(
				'header_layout_type',
				'header_container_type',
				'header_logo_position',
				'header_menu_btn_position',
				'header_mobile_panel_breakpoint',
				'header_search_visible',
				'header_social_links_visible',
				/*'main_menu_hover_style',
				'animation_line',
				'animation_framed',*/
			),
			'render_callback'     => 'gutenix_header_bar_markup',
			'container_inclusive' => true,
		),
		'header_buttons' => array(
			'selector' => '.header-buttons',
			'settings' => array(
				'show_header_btn_1',
				'header_btn_url_1',
				'header_btn_external_1',
				'show_header_btn_2',
				'header_btn_url_2',
				'header_btn_external_2',
			),
			'render_callback'     => 'gutenix_header_buttons',
			'container_inclusive' => true,
		),
		'footer_widgets_area' => array(
			'selector' => '.footer-area-wrapper',
			'settings' => array(
				'footer_widgets_visible',
				'footer_widgets_columns',
				'footer_widgets_container_type',
			),
			'render_callback'     => 'gutenix_footer_widgets_area_markup',
			'container_inclusive' => true,
		),
		'footer_bar' => array(
			'selector' => '.footer-bar',
			'settings' => array(
				'footer_layout_type',
				'footer_container_type',
				'footer_logo_visible',
				'footer_logo',
				'footer_menu_visible',
				'footer_social_links_visible',
				'footer_border_top_size',
			),
			'render_callback'     => 'gutenix_footer_bar_markup',
			'container_inclusive' => true,
		),
		'footer_logo' => array(
			'selector'            => '.footer-logo',
			'render_callback'     => 'gutenix_footer_logo',
			'container_inclusive' => true,
		),
		'footer_copyright' => array(
			'selector'            => '.footer-copyright',
			'render_callback'     => 'gutenix_footer_copyright',
			'container_inclusive' => true,
		),
	) );
}

/**
 * Render the posts list for the selective refresh partial.
 *
 * @since  1.0.0
 * @return void
 */
function gutenix_customize_partial_posts_list () {

	if ( have_posts() ) :

		get_template_part( 'template-parts/posts-loop' );

	else :

		get_template_part( 'template-parts/content', 'none' );

	endif;
}

/**
 * Render the single post for the selective refresh partial.
 *
 * @since  1.0.0
 * @return void
 */
function gutenix_customize_partial_single_post () {

	while ( have_posts() ) : the_post();

	get_template_part( 'template-parts/content-single', get_post_type() );

	endwhile;
}

/**
 * Render the author bio block for the selective refresh partial.
 *
 * @since  1.0.0
 * @return void
 */
function gutenix_customize_partial_author_bio() {

	while ( have_posts() ) : the_post();

	gutenix_post_author_bio();

	endwhile;
}

/**
 * Render the fonts link for the selective refresh partial.
 *
 * @since  1.0.0
 * @return void
 */
function gutenix_customize_partial_fonts_loader() {
    
    wp_enqueue_style( 'cx-google-fonts-gutenix-css', gutenix_theme()->fonts_manager->get_fonts_url() );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 *
 * @since 1.0.0
 */
function gutenix_customize_preview_js() {
	wp_enqueue_script( 'gutenix-theme-customizer', get_theme_file_uri('inc/customizer/assets/js/customizer.js' ), array( 'customize-preview' ), gutenix_theme()->version, true );
}

add_action( 'customize_preview_init', 'gutenix_customize_preview_js' );

/**
 * Load dynamic logic for the customizer controls area.
 *
 * @since 1.0.0
 */
function gutenix_customize_controls_assets() {
	wp_enqueue_style( 'gutenix-theme-customizer', get_theme_file_uri( 'inc/customizer/assets/css/customizer.css' ), array(), gutenix_theme()->version );

	wp_enqueue_script( 'gutenix-theme-customizer-controls', get_theme_file_uri( 'inc/customizer/assets/js/customizer-controls.js' ), array( 'customize-controls' ), gutenix_theme()->version, true );

	wp_localize_script( 'gutenix-theme-customizer-controls', 'gutenixControlsConditions', gutenix_get_customize_controls_conditions() );
}

add_action( 'customize_controls_enqueue_scripts', 'gutenix_customize_controls_assets' );

/**
 * Get customize controls conditions.
 *
 * @since  1.0.0
 * @return array
 */
function gutenix_get_customize_controls_conditions() {

	$customize_options = gutenix_get_customizer_options();
	$controls_args     = $customize_options['options'];

	$results = array();

	foreach ( $controls_args as $control => $args ) {
		if ( isset( $args['conditions'] ) ) {
			$results[ $control ] = $args['conditions'];
		}
	}

	return $results;
}

/**
 * Get dynamic css customize settings list.
 *
 * @since  1.0.0
 * @return array
 */
function gutenix_get_dynamic_css_settings_list() {

	$customize_options = gutenix_get_customizer_options();
	$controls_args     = $customize_options['options'];

	$results = array();

	foreach ( $controls_args as $control => $args ) {
		if ( isset( $args['dynamic_css'] ) && true === $args['dynamic_css'] ) {
			$results[] = $control;
		}
	}

	return $results;
}

/**
 * Get fonts customize settings list.
 *
 * @since  1.0.0
 * @return array
 */
function gutenix_get_fonts_settings_list() {

	$customize_options = gutenix_get_customizer_options();
	$controls_args     = $customize_options['options'];

	$results = array();

	$pairs = array( '_font_style', '_font_weight', '_character_set' );

	foreach ( $controls_args as $control => $args ) {
		if ( ! isset( $args['field'] ) || 'fonts' !== $args['field'] ) {
			continue;
		}

		$results[] = $control;

		$opt_key = str_replace( '_font_family', '', $control );

		foreach ( $pairs as $opt_mod ) {
			$results[] = $opt_key . $opt_mod;
		}

	}

	return $results;
}


/**
 * The Gutenix Customizer class
 */
if ( ! class_exists( 'Gutenix_Customizer' ) ) :

	class Gutenix_Customizer {

		/**
		 * Setup class.
		 *
		 * @since 1.0
		 */
		public function __construct() {

			add_action( 'customize_register', array( $this, 'custom_controls' ) );
			add_action( 'customize_register', array( $this, 'controls_helpers' ) );

		}

		/**
		 * Adds custom controls
		 *
		 * @since 1.0.0
		 */
		public function custom_controls( $wp_customize ) {

			// Load customize control classes
			require get_theme_file_path( 'inc/customizer/controls/buttonset/class-control-buttonset.php' );
			require get_theme_file_path( 'inc/customizer/controls/coloralpha/class-control-coloralpha.php' );
			require get_theme_file_path( 'inc/customizer/controls/dimensions/class-control-dimensions.php' );
			require get_theme_file_path( 'inc/customizer/controls/heading/class-control-heading.php' );
			require get_theme_file_path( 'inc/customizer/controls/input-responsive/class-control-input-responsive.php' );
			require get_theme_file_path( 'inc/customizer/controls/multicheck/class-control-multicheck.php' );
			require get_theme_file_path( 'inc/customizer/controls/multifield/class-control-multifield.php' );
			require get_theme_file_path( 'inc/customizer/controls/radio-image/class-control-radio-image.php' );
			require get_theme_file_path( 'inc/customizer/controls/range/class-control-range.php' );
			require get_theme_file_path( 'inc/customizer/controls/separator/class-control-separator.php' );
			require get_theme_file_path( 'inc/customizer/controls/sortable/class-control-sortable.php' );
			require get_theme_file_path( 'inc/customizer/controls/toggle-checkbox/class-control-toggle-checkbox.php' );

			// Register JS control types
			$wp_customize->register_control_type( 'Gutenix_Customizer_Buttonset_Control' );
			$wp_customize->register_control_type( 'Gutenix_Customizer_Alpha_Color_Control' );
			$wp_customize->register_control_type( 'Gutenix_Customizer_Dimensions_Control' );
			$wp_customize->register_control_type( 'Gutenix_Customizer_Heading_Control' );
			$wp_customize->register_control_type( 'Gutenix_Customizer_Input_Responsive_Control' );
			$wp_customize->register_control_type( 'Gutenix_Customizer_Multicheck_Control' );
			$wp_customize->register_control_type( 'Gutenix_Customizer_Multifield_Control' );
			$wp_customize->register_control_type( 'Gutenix_Customizer_Radio_Image_Control' );
			$wp_customize->register_control_type( 'Gutenix_Customizer_Range_Control' );
			$wp_customize->register_control_type( 'Gutenix_Customizer_Separator_Control' );
			$wp_customize->register_control_type( 'Gutenix_Customizer_Sortable_Control' );
			$wp_customize->register_control_type( 'Gutenix_Customizer_Toggle_Checkbox' );

		}

		/**
		 * Adds customizer helpers
		 *
		 * @since 1.0.0
		 */
		public function controls_helpers() {
			require get_theme_file_path( 'inc/customizer/sanitization-callbacks.php' );
		}

	}

endif;

return new Gutenix_Customizer();
