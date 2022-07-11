<?php
// Global variables define
define('QUALITY_GREEN_PARENT_TEMPLATE_DIR_URI', get_template_directory_uri());
define('QUALITY_GREEN_TEMPLATE_DIR_URI', get_stylesheet_directory_uri());
define('QUALITY_GREEN_TEMPLATE_DIR', trailingslashit(get_stylesheet_directory()));

if (!function_exists('wp_body_open')) {

    function wp_body_open() {
        /**
         * Triggered after the opening <body> tag.
         */
        do_action('wp_body_open');
    }

}
add_action('wp_enqueue_scripts', 'quality_green_enqueue_styles', 9999);

function quality_green_enqueue_styles() {
    wp_enqueue_style('bootstrap', QUALITY_GREEN_PARENT_TEMPLATE_DIR_URI . '/css/bootstrap.css');
    wp_enqueue_style('quality-green-parent-style', QUALITY_GREEN_PARENT_TEMPLATE_DIR_URI . '/style.css');
    wp_enqueue_style('quality-green-child-style', QUALITY_GREEN_TEMPLATE_DIR_URI . '/style.css', array('parent-style'));
    wp_enqueue_style('quality-green-default-style-css', QUALITY_GREEN_TEMPLATE_DIR_URI . "/css/default.css");
    wp_dequeue_style('quality-default', QUALITY_GREEN_PARENT_TEMPLATE_DIR_URI . '/css/default.css');
    wp_enqueue_style('quality-green-theme-menu', QUALITY_GREEN_PARENT_TEMPLATE_DIR_URI . '/css/theme-menu.css');
    wp_enqueue_script('quality-green-mp-masonry-js', QUALITY_GREEN_TEMPLATE_DIR_URI . '/js/masonry/mp.mansory.min.js');
}

require( QUALITY_GREEN_TEMPLATE_DIR . '/functions/customizer/customizer-header-layout.php');
require( QUALITY_GREEN_TEMPLATE_DIR . '/functions/customizer/customizer-blog-layout.php');
require( QUALITY_GREEN_TEMPLATE_DIR . '/functions/template-tag.php' );

add_action('after_setup_theme', 'quality_green_setup');

function quality_green_setup() {
    load_theme_textdomain('quality-green', QUALITY_GREEN_TEMPLATE_DIR . '/languages');

    require(QUALITY_GREEN_TEMPLATE_DIR . '/functions/customizer/customizer-copyright.php');

    add_theme_support( 'automatic-feed-links' );

    add_theme_support( 'title-tag' );
}

//Set for old user
if (!get_option('quality_user', false)) {
     //detect old user and set value
    $quality_green_user = get_option('quality_pro_options', array());
    if ((isset($quality_green_user['service_title']) || isset($quality_green_user['service_description']) || isset($quality_green_user['blog_heading']) || isset($quality_green_user['home_blog_description']))) {
        add_option('quality_user', 'old');
    }else{
        add_option('quality_user', 'new');
    }
}

if (!function_exists('quality_green_default_data')) {

    function quality_green_default_data() {
        $quality_green_current_options = wp_parse_args(get_option('quality_pro_options', array()), quality_theme_data_setup());
//print_r($header_setting);
        if (get_option('quality_user', 'new')=='old' || $quality_green_current_options['text_title'] != '' || $quality_green_current_options['upload_image_logo'] != '' || $quality_green_current_options['webrit_custom_css'] == 'nomorenow') {

            $array_new = array(
                'header_center_layout_setting' => 'default',
                'service_box_layout_setting' => 'default',
                'blog_masonry2_layout_setting' => 'default',
            );
        } else {
            $array_new = array(
                'header_center_layout_setting' => 'center',
                'service_box_layout_setting' => 'box',
                'blog_masonry2_layout_setting' => 'masonry2',
            );
        }

        $array_old = array(
            // general settings
            'footer_copyright_text' => '<p>' . __('Proudly powered by <a href="https://wordpress.org">WordPress</a> | Theme: <a href="https://webriti.com" rel="nofollow">Quality Green</a> by Webriti', 'quality-green') . '</p>',
        );
        return $result = array_merge($array_new, $array_old);
    }

}

function quality_green_custom_script() {

    wp_reset_query();
    $col = 6;
    ?>
    <script>
        jQuery(document).ready(function (jQuery) {
            jQuery("#blog-masonry").mpmansory(
                    {
                        childrenClass: 'item', // default is a div
                        columnClasses: 'padding', //add classes to items
                        breakpoints: {
                            lg: <?php echo $col; ?>, //Change masonry column here like 2, 3, 4 column
                            md: 6,
                            sm: 6,
                            xs: 12
                        },
                        distributeBy: {order: false, height: false, attr: 'data-order', attrOrder: 'asc'}, //default distribute by order, options => order: true/false, height: true/false, attr => 'data-order', attrOrder=> 'asc'/'desc'
                        onload: function (items) {
                            //make somthing with items
                        }
                    }
            );
        });
    </script>
    <?php
}

add_action('wp_footer', 'quality_green_custom_script');


add_action('customize_register', 'quality_green_remove_custom', 1000);

function quality_green_remove_custom($wp_customize) {
    $wp_customize->remove_section('theme_color');
}