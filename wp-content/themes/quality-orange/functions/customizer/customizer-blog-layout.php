<?php

function quality_orange_blog_layout_customizer($wp_customize) {

    $quality_orange_current_options = wp_parse_args(get_option('quality_pro_options', array()), quality_theme_data_setup());

    // blog Layout settings
    if (get_option('quality_user', 'new')=='old' || $quality_orange_current_options['text_title'] != '' || $quality_orange_current_options['upload_image_logo'] != '' || $quality_orange_current_options['webrit_custom_css']=='nomorenow') {

        $wp_customize->add_setting('quality_pro_options[blog_masonry3_layout_setting]', array(
            'default' => 'default',
            'sanitize_callback' => 'quality_orange_sanitize_radio',
            'type' => 'option'
        ));
    } else {

        $wp_customize->add_setting('quality_pro_options[blog_masonry3_layout_setting]', array(
            'default' => 'masonry3',
            'sanitize_callback' => 'quality_orange_sanitize_radio',
            'type' => 'option'
        ));
    }
    $wp_customize->add_control(new quality_orange_Image_Radio_Button_Custom_Control($wp_customize, 'quality_pro_options[blog_masonry3_layout_setting]',
                    array(
                'label' => esc_html__('Blog Layout Setting', 'quality-orange'),
                'section' => 'blog_setting',
                'priority'              => 20,
                'choices' => array(
                    'default' => array(
                        'image' => get_stylesheet_directory_uri() . '/images/quality-blue-blog-default.png',
                        'name' => esc_html__('Standard Layout', 'quality-orange')
                    ),
                    'masonry3' => array(
                        'image' => get_stylesheet_directory_uri() . '/images/quality-orange-blog-latest.png',
                        'name' => esc_html__('Masonry 3 Column', 'quality-orange')
                    )
                )
                    )
    ));
}
add_action('customize_register', 'quality_orange_blog_layout_customizer');