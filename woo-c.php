<?php

function selina_add_woocommerce_support() {
    add_theme_support('woocommerce', array(
        'thumbnail_image_width' => 150,
        'single_image_width'    => 300,
        'product_grid'          => array (
            'default_rows'          => 3,
            'min_rows'              => 2,
            'max_rows'              => 8,
            'default_columns'       => 3,
            'min_columns'           => 1,
            'max_columns'           => 5
        )
    ));

    add_theme_support('wc-product-gallery-lightbox');
    add_theme_support('wc-product-gallery-slider');
}

add_action('after_setup_theme', 'selina_add_woocommerce_support');

// Disable woocommerce default styles
add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );

//  Enqueue our own WooCommerce styles
function woo_wp_it_volunteers_scripts() {

    if ( class_exists( 'WooCommerce' ) ) {

        if ( is_cart() ) {
            wp_enqueue_style( 'woo-cart-style', get_template_directory_uri() . '/assets/styles/template-styles/woo-cart.css', array('main') );
            wp_enqueue_script( 'woo-cart-scripts', get_template_directory_uri() . '/assets/scripts/template-scripts/cart.js', array(), false, true );
            wp_localize_script('woo-cart-scripts', 'ajax_object', array(
                'ajax_url' => admin_url('admin-ajax.php'),
                'nonce'    => wp_create_nonce('woo-cart_nonce')
            ));
        }

        if ( is_checkout() ) {
            wp_enqueue_style( 'woo-checkout-style', get_template_directory_uri() . '/assets/styles/template-styles/woo-checkout.css', array('main') );
            wp_enqueue_script( 'woo-checkout-scripts', get_template_directory_uri() . '/assets/scripts/template-scripts/checkout.js', array(), false, true );
            wp_enqueue_script('maskedinput', 'https://cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js', array('jquery'), null, true);
        }

        if ( is_product() ) {
            wp_enqueue_style( 'woo-product-style', get_template_directory_uri() . '/assets/styles/template-styles/woo-single-product.css', array('main') );
            wp_enqueue_script( 'woo-product-scripts', get_template_directory_uri() . '/assets/scripts/template-scripts/woo-single-product.js', array(), false, true );
        }
    }
}
add_action('wp_enqueue_scripts', 'woo_wp_it_volunteers_scripts');

// Image sizes

// Adjust image size for single product pages
add_filter('woocommerce_get_image_size_single', function($size) {
    return array (
        'width' => 500,
        'height' => 500,
        'crop' => 0
    );
});

// Adjust image size for shop (product archive) pages
add_filter('woocommerce_get_image_size_shop_catalog', function($size) {
    return array (
        'width' => 300,
        'height' => 300,
        'crop' => 0
    );
});

// Adjust image size for related products and thumbnails
add_filter('woocommerce_get_image_size_thumbnail', function($size) {
    return array (
        'width' => 300,
        'height' => 300,
        'crop' => 0
    );
});

// Add image size for thumbnail in the cart
function cart_woocommerce_image_size() {
    add_image_size( 'cart-image-size', 100, 100, true ); 
}
add_action( 'after_setup_theme', 'cart_woocommerce_image_size' );

// Positioning price after excerpt (on single-product page)
function reorder_woocommerce_hooks() {
    remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );

    add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 25 );
}
add_action( 'woocommerce_init', 'reorder_woocommerce_hooks' );

// Remove breadcrumbs from cart
add_action( 'template_redirect', 'remove_WC_breadcrumbs_from_cart' );
function remove_WC_breadcrumbs_from_cart() {
    if( is_cart() ) {
        remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 );
    }
}

// Replace currency symbol before price
add_filter( 'woocommerce_price_format', 'custom_woocommerce_price_format' );
function custom_woocommerce_price_format( $format ) {
    return '%1$s%2$s';
}

