<?php
// Footer copyright section
    function quality_green_copyright_customizer($wp_customize)
    {
        $wp_customize->add_section(
            'copyright_section_one',
            array(
            'title' => esc_html__('Footer Copyright Setting', 'quality-green'),
            'priority' => 1000,
        )
        );

        $wp_customize->add_setting(
            'quality_pro_options[footer_copyright_text]',
            array(

         'default' => '<p>'.__('Proudly powered by <a href="https://wordpress.org">WordPress</a> | Theme: <a href="https://webriti.com" rel="nofollow">Quality Green</a> by Webriti', 'quality-green').'</p>',
         'type' =>'option',
        'sanitize_callback' => 'quality_green_copyright_sanitize_text',
    )
        );
        $wp_customize->add_control(
            'quality_pro_options[footer_copyright_text]',
            array(
        'label' => esc_html__('Copyright Text', 'quality-green'),
        'section' => 'copyright_section_one',
        'type' => 'textarea',
    )
        );
    }

function quality_green_copyright_sanitize_text($input)
{
    return wp_kses_post(force_balance_tags($input));
}

add_action('customize_register', 'quality_green_copyright_customizer');

/**
 * Add selective refresh for Front page section section controls.
 */
function quality_green_register_home_copy_right_section_partials($wp_customize)
{
    $wp_customize->selective_refresh->add_partial('quality_pro_options[footer_copyright_text]', array(
        'selector'            => '.qua_footer_area .col-md-12',
        'settings'            => 'quality_pro_options[footer_copyright_text]',

    ));
}
add_action('customize_register', 'quality_green_register_home_copy_right_section_partials');
