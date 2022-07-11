<?php
add_action( 'init', 'gutenixDataImporterConfig', 9 );

/**
 * Register Gutenix Importer config
 * @return void
 */
function gutenixDataImporterConfig() {

    if ( ! is_admin() ) {
        return;
    }

    if ( ! function_exists( 'gutenixDataImporterRegisterConfig' ) ) {
        return;
    }

    gutenixDataImporterRegisterConfig( array(
        'export' => array(
            'options' => array(
                'woocommerce_default_country',
                'woocommerce_techguide_page_id',
                'woocommerce_shop_page_id',
                'woocommerce_default_catalog_orderby',
                'woocommerce_cart_page_id',
                'woocommerce_checkout_page_id',
                'woocommerce_terms_page_id',
                'elementor_cpt_support',
                'elementor_disable_color_schemes',
                'elementor_disable_typography_schemes',
                'elementor_container_width',
                'elementor_css_print_method',
                'elementor_global_image_lightbox',
                'site_icon'
            ),
            'tables' => array(
            ),
        ),
    ) );
}