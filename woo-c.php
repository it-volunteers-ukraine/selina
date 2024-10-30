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
        if ( is_shop() ) {
            wp_enqueue_style( 'woo-shop-style', get_template_directory_uri() . '/assets/styles/template-styles/woo-shop.css', array('main') );
            wp_enqueue_script('woo-shop-jquery', 'https://code.jquery.com/jquery-2.2.0.min.js', array(), false, false);
             wp_enqueue_style('choices-style', "https://cdn.jsdelivr.net/npm/choices.js/public/assets/styles/choices.min.css", array('main'));
            wp_enqueue_script('choices-scripts', 'https://cdn.jsdelivr.net/npm/choices.js/public/assets/scripts/choices.min.js', array(), false, true);
            wp_enqueue_script( 'woo-shop-scripts', get_template_directory_uri() . '/assets/scripts/template-scripts/shop.js', array(), false, true );
     wp_localize_script('woo-shop-scripts', 'myAjax', array(
            'ajaxUrl' => admin_url('admin-ajax.php'),
            'nonce' => wp_create_nonce('my-shop_nonce'),
        ));
        }
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

        if ( is_order_received_page() ) {
            wp_enqueue_style( 'woo-thank-you-style', get_template_directory_uri() . '/assets/styles/template-styles/woo-thank-you.css', array('main') );
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
        'width' => 340,
        'height' => 340,
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

// Change text "Home" to "Shop" in first breadcrumb
add_filter( 'woocommerce_breadcrumb_defaults', 'custom_breadcrumbs' );
function custom_breadcrumbs( $defaults ) {
    $current_language = pll_current_language();
    
    if ( $current_language === 'en' ) {
        $shop_text = esc_html__( 'Shop', 'woocommerce' );
    } else {
        $shop_text = esc_html__( 'Магазин', 'woocommerce' );
    }
    
    $shop_url = get_permalink( wc_get_page_id( 'shop' ) );
    $defaults['home'] = '<a href="' . esc_url( $shop_url ) . '">' . $shop_text . '</a>';
    
    return $defaults;
}

// Hide link "Continue Shopping" if the cart is empty, but the cart page is not refreshed yet (link "Return to shop" appears instead)
add_action( 'wp_footer', 'hide_continue_shopping_on_empty_cart' );
function hide_continue_shopping_on_empty_cart() {
    if ( is_cart() ) : ?>
        <script type="text/javascript">
            jQuery(function($){
                $( document.body ).on( 'wc_cart_emptied wc_cart_fragments_refreshed', function() {
                    // Check if there is a message "Your cart is currently empty."
                    if ( $('.cart-empty').length > 0 ) {
                        // Hide link "Continue Shopping"
                        $('.cart-header__container a').hide();
                    }
                });
            });
        </script>
    <?php endif;
}



function my_ajax_filter_products() {
    $args = array(
        'post_type' => 'product',
        'posts_per_page' => -1, // You can set a specific number if needed
    );

    if( isset( $_POST['category'] ) && $_POST['category'] != 'all' ) {
        $args['tax_query'] = array(
            array(
                'taxonomy' => 'product_cat',
                'field'    => 'slug',
                'terms'    => $_POST['category'],
            ),
        );
    }

    $query = new WP_Query( $args );

    if( $query->have_posts() ) :
        while( $query->have_posts() ): $query->the_post();
            wc_get_template_part( 'content', 'product' ); // Load the product template
        endwhile;
    else :
        echo '<p>No products found</p>';
    endif;

    die();
}
add_action('wp_ajax_my_filter', 'my_ajax_filter_products');
add_action('wp_ajax_nopriv_my_filter', 'my_ajax_filter_products');

// Disable woocommerce-gallery lightbox and slider
add_action( 'after_setup_theme', 'remove_woocommerce_gallery_features', 99 );
function remove_woocommerce_gallery_features() {
    remove_theme_support( 'wc-product-gallery-lightbox' );
    remove_theme_support( 'wc-product-gallery-slider' );
}
// Change 'Add to Basket' button text to an icon and enable AJAX add to cart
add_filter('woocommerce_loop_add_to_cart_link', 'custom_add_to_cart_icon_button', 10, 2);
function custom_add_to_cart_icon_button($button, $product) {
    // Use the AJAX URL for adding to the cart
    $url = esc_url(wc_get_cart_url());
    $icon = '<svg class="icon-cart" width="32" height="32"><use xlink:href="' . esc_url(get_template_directory_uri() . '/assets/images/sprite.svg#icon-cart') . '"></use></svg>';

    // Make it an anchor tag but prevent default behavior
    return '<a href="' . $url . '" class="button add-to-cart-icon" data-product_id="' . $product->get_id() . '" data-product_sku="' . $product->get_sku() . '">' . $icon . '</a>';
}

// Remove the 'View Basket' button after adding to cart
add_filter('wc_add_to_cart_message_html', '__return_null');

// Change number of showed related products on single-product page (was 4)
function custom_related_products_limit( $args ) {
    $args['posts_per_page'] = 10;
    return $args;
}
add_filter( 'woocommerce_output_related_products_args', 'custom_related_products_limit', 20 );

// Integrate ACF field into "Cart updated" message to translate it
add_filter( 'gettext', 'update_cart_message', 20, 3 );
function update_cart_message( $cart_updated_text, $text, $domain ) {
    if ( 'woocommerce' === $domain && 'Cart updated.' === $text ) {
        $cart_updated_message = get_field( 'cart_updated_message', 'option' ); 
        $cart_updated_text = $cart_updated_message ? $cart_updated_message : 'Кошик оновлено.'; 
    }
    return $cart_updated_text;
}

// Integrate ACF field into "Product has been removed" message to translate it
add_filter( 'gettext', 'remove_product_message', 20, 3 );
function remove_product_message( $remove_text, $text, $domain ) {
    if ( 'woocommerce' === $domain && strpos( $text, 'removed' ) !== false ) {
        $remove_message = get_field( 'remove_message', 'option' ); 
        $remove_text = $remove_message ? $remove_message : 'Товар видалено.'; 
    }
    return $remove_text;
}

// Integrate ACF field into "Undo?" message to translate it
add_filter('gettext', 'custom_undo_message', 20, 3);
function custom_undo_message( $undo_text, $text, $domain ) {
    if ( 'woocommerce' === $domain && 'Undo?' === $text ) {
        $custom_undo_message = get_field('undo_text', 'option');
        $undo_text = $custom_undo_message ? $custom_undo_message : 'Повернути?'; 
    }
    return $undo_text;
}

// Integrate ACF field into "Your cart is currently empty" message to translate it
add_filter( 'gettext', 'empty_cart_message', 20, 3 );
function empty_cart_message( $empty_cart_text, $text, $domain ) {
    if ( 'woocommerce' === $domain && 'Your cart is currently empty.' === $text ) {
        $empty_cart_message = get_field( 'empty_cart_message', 'option' ); 
        $empty_cart_text = $empty_cart_message ? $empty_cart_message : 'Ваш кошик наразі порожній.'; 
    }
    return $empty_cart_text;
}
