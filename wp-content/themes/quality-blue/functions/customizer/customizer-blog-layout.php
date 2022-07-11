<?php

function quality_blue_blog_layout_customizer($wp_customize) {

    $quality_blue_current_options = wp_parse_args(get_option('quality_pro_options', array()), quality_theme_data_setup());
    // blog Layout settings
    if (get_option('quality_user', 'new')=='old' || $quality_blue_current_options['text_title'] != '' || $quality_blue_current_options['upload_image_logo'] != '' || $quality_blue_current_options['webrit_custom_css']=='nomorenow') {

        $wp_customize->add_setting('quality_pro_options[blog_listed_layout_setting]', array(
            'default' => 'default',
            'sanitize_callback' => 'quality_blue_sanitize_radio',
            'type' => 'option'
        ));
    } else {

        $wp_customize->add_setting('quality_pro_options[blog_listed_layout_setting]', array(
            'default' => 'listed',
            'sanitize_callback' => 'quality_blue_sanitize_radio',
            'type' => 'option'
        ));
    }
    $wp_customize->add_control(new quality_blue_Image_Radio_Button_Custom_Control($wp_customize, 'quality_pro_options[blog_listed_layout_setting]',
                    array(
                'label' => esc_html__('Blog Layout Setting', 'quality-blue'),
                'section' => 'blog_setting',
                'priority' => 20,
                'choices' => array(
                    'default' => array(
                        'image' => get_stylesheet_directory_uri() . '/images/quality-blue-blog-default.png',
                        'name' => esc_html__('Standard Layout', 'quality-blue')
                    ),
                    'listed' => array(
                        'image' => get_stylesheet_directory_uri() . '/images/quality-blue-blog-latest.png',
                        'name' => esc_html__('Listed Layout', 'quality-blue')
                    )
                )
                    )
    ));
}
add_action('customize_register', 'quality_blue_blog_layout_customizer');