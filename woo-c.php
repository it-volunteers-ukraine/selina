<?php

// add woocommerce support
add_action( 'after_setup_theme', 'woocommerce_support' );
function woocommerce_support() {
add_theme_support( 'woocommerce' );
add_theme_support( 'wc-product-gallery-lightbox' );
add_theme_support( 'wc-product-gallery-slider' );
}

add_theme_support( 'woocommerce', array(
    'single_image_width' => 600,
    'thumbnail_image_width' => 600,
    'gallery_thumbnail_image_width' => 60,
) );

add_filter('woocommerce_get_image_size_single', function ($size){
    return array(
        'width' => 400,
        'height' => 600,
        'crop'   => 1,
    );
});

