<?php

// add woocommerce support
add_action( 'after_setup_theme', 'woocommerce_support' );
function woocommerce_support() {
add_theme_support( 'woocommerce' );
add_theme_support( 'wc-product-gallery-lightbox' );
add_theme_support( 'wc-product-gallery-slider' );
}

function selina_add_woocommerce_support() {
    add_theme_support( 'woocommerce', array(
        'thumbnail_image_width' => 150,
        'single_image_width'    => 300,

        'product_grid'          => array(
            'default_rows'    => 3,
            'min_rows'        => 2,
            'max_rows'        => 8,
            'default_columns' => 4,
            'min_columns'     => 1,
            'max_columns'     => 5,
        ),
    ) );
}

add_action( 'after_setup_theme', 'selina_add_woocommerce_support' );

// register ajax header cart
function update_cart_count() {
}
add_action( 'wp_ajax_update_cart_count', 'update_cart_count' );
add_action( 'wp_ajax_nopriv_update_cart_count', 'update_cart_count' );

//==============images size =====================//
// Adjust image size for single product pages
add_filter('woocommerce_get_image_size_single', function($size) {
    return array(
        'width'  => 500,
        'height' => 500, 
        'crop'   => 0 
    );
});

// Adjust image size for shop (product archive) pages
add_filter('woocommerce_get_image_size_shop_catalog', function($size) {
    return array(
        'width'  => 300,
        'height' => 300,
        'crop'   => 0
    );
});

// Adjust image size for related products and thumbnails
add_filter('woocommerce_get_image_size_thumbnail', function($size) {
    return array(
        'width'  => 300,
        'height' => 300,
        'crop'   => 0
    );
});


