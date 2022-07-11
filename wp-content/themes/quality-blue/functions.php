<?php

add_action('wp_enqueue_scripts', 'quality_blue_enqueue_styles', 9999);

function quality_blue_enqueue_styles() {
    wp_enqueue_style('bootstrap', QUALITY_TEMPLATE_DIR_URI . '/css/bootstrap.css');
    wp_enqueue_style('quality-blue-parent-style', get_template_directory_uri() . '/style.css');
    wp_enqueue_style('quality-blue-child-style', get_stylesheet_directory_uri() . '/style.css', array('parent-style'));
    wp_enqueue_style('quality-blue-default-css', get_stylesheet_directory_uri() . '/css/default.css');
    wp_enqueue_style('quality-blue-theme-menu', QUALITY_TEMPLATE_DIR_URI . '/css/theme-menu.css');
}

require( get_stylesheet_directory() . '/functions/customizer/customizer-header-layout.php');
require( get_stylesheet_directory() . '/functions/customizer/customizer-blog-layout.php');
require( get_stylesheet_directory() . '/functions/template-tag.php' );

add_action('after_setup_theme', 'quality_blue_setup');

function quality_blue_setup() {
    load_theme_textdomain('quality-blue', get_stylesheet_directory() . '/languages');
    require(get_stylesheet_directory() . '/functions/customizer/customizer-copyright.php');
    add_theme_support( 'automatic-feed-links' );

    add_theme_support( 'title-tag' );
}

//Set for old user
if (!get_option('quality_user', false)) {
     //detect old user and set value
    $quality_blue_user = get_option('quality_pro_options', array());
    if ((isset($quality_blue_user['service_title']) || isset($quality_blue_user['service_description']) || isset($quality_blue_user['blog_heading']) || isset($quality_blue_user['home_blog_description']))) {
        add_option('quality_user', 'old');
    }else{
        add_option('quality_user', 'new');
    }
}


if (!function_exists('quality_blue_default_data')) {

    function quality_blue_default_data() {
        $quality_blue_current_options = wp_parse_args(get_option('quality_pro_options', array()), quality_theme_data_setup());
        
        if (get_option('quality_user', 'new')=='old' || $quality_blue_current_options['text_title'] != '' || $quality_blue_current_options['upload_image_logo'] != '' || $quality_blue_current_options['webrit_custom_css'] == 'nomorenow') {

            $array_new = array(
                'header_classic_layout_setting' => 'default',
                'service_blink_layout_setting' => 'default',
                'blog_listed_layout_setting' => 'default',
            );
        } else {
            $array_new = array(
                'header_classic_layout_setting' => 'classic',
                'service_blink_layout_setting' => 'blink',
                'blog_listed_layout_setting' => 'listed',
            );
        }
        $array_old = array(
            // general settings
            'footer_copyright_text' => '<p>' . __('Proudly powered by <a href="https://wordpress.org">WordPress</a> | Theme: <a href="https://webriti.com" rel="nofollow">Quality Blue</a> by Webriti', 'quality-blue') . '</p>',
        );
        return $result = array_merge($array_new, $array_old);
    }

}

if (!function_exists('wp_body_open')) {

    function wp_body_open() {
        do_action('wp_body_open');
    }

}

add_action('customize_register', 'quality_blue_remove_custom', 1000);

function quality_blue_remove_custom($wp_customize) {
    $wp_customize->remove_section('theme_color');
}

