<?php

add_action ('after_setup_theme', 'woocommerce_support');

function woocommerce_support() {
    add_theme_support('woocommerce');
    add_theme_support('wc-product-gallery-support');
    add_theme_support('wc-product-gallery-slider');
}