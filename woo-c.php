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
        if ( is_shop() || is_product_category() ) {
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
    // URL for adding product to the cart
    $url = esc_url($product->add_to_cart_url());
    
    $icon = '<svg class="icon-cart" width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M27.8 21.8C28.357 21.8 28.8911 22.0212 29.2849 22.4151C29.6787 22.8089 29.9 23.343 29.9 23.9C29.9 24.457 29.6787 24.9911 29.2849 25.3849C28.8911 25.7787 28.357 26 27.8 26C27.243 26 26.7089 25.7787 26.3151 25.3849C25.9212 24.9911 25.7 24.457 25.7 23.9C25.7 22.7345 26.6345 21.8 27.8 21.8ZM11 5H14.4335L15.4205 7.1H30.95C31.2285 7.1 31.4955 7.21062 31.6925 7.40754C31.8894 7.60445 32 7.87152 32 8.15C32 8.3285 31.9475 8.507 31.874 8.675L28.115 15.4685C27.758 16.109 27.065 16.55 26.2775 16.55H18.455L17.51 18.2615L17.4785 18.3875C17.4785 18.4571 17.5062 18.5239 17.5554 18.5731C17.6046 18.6223 17.6714 18.65 17.741 18.65H29.9V20.75H17.3C16.743 20.75 16.2089 20.5287 15.8151 20.1349C15.4212 19.7411 15.2 19.207 15.2 18.65C15.2 18.2825 15.2945 17.936 15.452 17.642L16.88 15.0695L13.1 7.1H11V5ZM17.3 21.8C17.857 21.8 18.3911 22.0212 18.7849 22.4151C19.1788 22.8089 19.4 23.343 19.4 23.9C19.4 24.457 19.1788 24.9911 18.7849 25.3849C18.3911 25.7787 17.857 26 17.3 26C16.743 26 16.2089 25.7787 15.8151 25.3849C15.4212 24.9911 15.2 24.457 15.2 23.9C15.2 22.7345 16.1345 21.8 17.3 21.8ZM26.75 14.45L29.669 9.2H16.397L18.875 14.45H26.75Z" fill="white" />
					<path d="M5 20C4.70899 20 4.48413 19.9206 4.3254 19.7619C4.16667 19.5899 4.0873 19.3585 4.0873 19.0675V15.8135H0.892857C0.615079 15.8135 0.396825 15.7407 0.238095 15.5952C0.0793651 15.4365 0 15.2183 0 14.9405C0 14.6627 0.0793651 14.4511 0.238095 14.3056C0.396825 14.1468 0.615079 14.0675 0.892857 14.0675H4.0873V10.9127C4.0873 10.6217 4.16667 10.3968 4.3254 10.2381C4.48413 10.0794 4.71561 10 5.01984 10C5.31085 10 5.5291 10.0794 5.6746 10.2381C5.83333 10.3968 5.9127 10.6217 5.9127 10.9127V14.0675H9.10714C9.39815 14.0675 9.6164 14.1468 9.7619 14.3056C9.92063 14.4511 10 14.6627 10 14.9405C10 15.2183 9.92063 15.4365 9.7619 15.5952C9.6164 15.7407 9.39815 15.8135 9.10714 15.8135H5.9127V19.0675C5.9127 19.3585 5.83333 19.5899 5.6746 19.7619C5.5291 19.9206 5.30423 20 5 20Z" fill="white" />
				</svg>';

    // Check stock status and adjust button attributes
    if (!$product->is_in_stock()) {
        // Button for out-of-stock products
        return '<a href="#" class="button add-to-cart-icon" data-disabled="true" style="pointer-events: none; opacity: 0.5;" aria-disabled="true">
                    ' . $icon . '
                </a>';
    } else {
        // Button for in-stock products
        return '<a href="' . $url . '" 
                    class="button add-to-cart-icon ajax_add_to_cart" 
                    data-product_id="' . esc_attr($product->get_id()) . '" 
                    data-product_sku="' . esc_attr($product->get_sku()) . '" 
                    data-quantity="1" 
                    aria-label="' . esc_attr($product->add_to_cart_description()) . '">
                    ' . $icon . '
                </a>';
    }
}

// Change 'Add to Basket' to 'Add to Cart' + translate on single-product-page
function custom_single_add_to_cart_text() {
    if ( pll_current_language() == 'en') {
        return __( 'Add to cart', 'textdomain' );
    } else {
        return __( 'Додати до кошика', 'textdomain' );
    }
}
add_filter( 'woocommerce_product_single_add_to_cart_text', 'custom_single_add_to_cart_text' );

// Remove the 'View Basket' button after adding to cart
add_filter('wc_add_to_cart_message_html', '__return_null');

// Change number of showed related products on single-product page (was 4)
function custom_related_products_limit( $args ) {
    $args['posts_per_page'] = 6;
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

// Integrate ACF field into "Your cart is currently empty" message to translate it
add_filter( 'gettext', 'empty_cart_message', 20, 3 );
function empty_cart_message( $empty_cart_text, $text, $domain ) {
    if ( 'woocommerce' === $domain && 'Your cart is currently empty.' === $text ) {
        $empty_cart_message = get_field( 'empty_cart_message', 'option' ); 
        $empty_cart_text = $empty_cart_message ? $empty_cart_message : 'Ваш кошик наразі порожній.'; 
    }
    return $empty_cart_text;
}
function custom_woocommerce_catalog_ordering($sort_args) {
    // Determine if the language is English
    $current_lang = get_locale();
    
    // Define sort options based on language
    if ($current_lang === 'en_GB') {
        $sort_args = array(
            'title_asc' => __('Name (A-Z)', 'woocommerce'),
            'title_desc' => __('Name (Z-A)', 'woocommerce'),
            'price_asc' => __('Price (low to high)', 'woocommerce'),
            'price_desc' => __('Price (high to low)', 'woocommerce'),
        );
    } else {
        $sort_args = array(
            'title_asc' => __('Назвою (А-Я)', 'woocommerce'),
            'title_desc' => __('Назвою (Я-А)', 'woocommerce'),
            'price_asc' => __('Ціною (від низької)', 'woocommerce'),
            'price_desc' => __('Ціною (від високої)', 'woocommerce'),
        );
    }
    
    return $sort_args;
}
add_filter('woocommerce_catalog_orderby', 'custom_woocommerce_catalog_ordering');

function custom_woocommerce_orderby_query($query) {
    if (!is_admin() && $query->is_main_query() && is_woocommerce()) {
        $orderby = isset($_GET['orderby']) ? wc_clean($_GET['orderby']) : 'title_asc';

        switch ($orderby) {
            case 'title_asc':
                $query->set('orderby', 'title');
                $query->set('order', 'ASC');
                break;
            case 'title_desc':
                $query->set('orderby', 'title');
                $query->set('order', 'DESC');
                break;
            case 'price_asc':
                $query->set('meta_key', '_price');
                $query->set('orderby', 'meta_value_num');
                $query->set('order', 'ASC');
                break;
            case 'price_desc':
                $query->set('meta_key', '_price');
                $query->set('orderby', 'meta_value_num');
                $query->set('order', 'DESC');
                break;
        }
    }
}
add_action('pre_get_posts', 'custom_woocommerce_orderby_query');

// add product-image to products in cart on checkout-page
add_action( 'woocommerce_review_order_before_cart_contents', 'add_images_to_order_review_items' );

function add_images_to_order_review_items() {
    if ( WC()->cart->get_cart() ) {
        foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
            $product = $cart_item['data'];
            $product_image = $product->get_image( 'thumbnail' );

            echo '<tr class="checkout-cart__item">';
            
            echo '<td class="checkout-cart__product-image">';
            echo $product_image;
            echo '</td>';

            echo '<td class="checkout-cart__product-name">';
            echo $product->get_name();
            echo '</td>';

            echo '<td class="checkout-cart__product-price-quantity">';
            echo wc_price( $product->get_price() ) . '&nbsp;<span class="checkout-cart__product-quantity">×&nbsp;' . $cart_item['quantity'] . ' од' . '</span>';
            echo '</td>';

            echo '<td class="checkout-cart__product-total">';
            echo wc_price( $cart_item['line_total'] );
            echo '</td>';

            echo '</tr>';
        }
    }
}

// Moving coupon from top page into cart of checkout-page
remove_action('woocommerce_before_checkout_form', 'woocommerce_checkout_coupon_form', 10);

add_action('woocommerce_review_order_after_cart_contents', 'woocommerce_checkout_coupon_form_custom');
function woocommerce_checkout_coupon_form_custom() {
    echo '<tr class="coupon-form"><td colspan="2">';

    wc_get_template(
        'checkout/form-coupon.php',
        array(
            'checkout' => WC()->checkout(),
        )
    );

    echo '</td></tr>';
}

// Add custom fields to billing
add_filter( 'woocommerce_checkout_fields', 'customize_checkout_fields' );

function customize_checkout_fields( $fields ) {
    error_log('Зміна полів чекауту...');

    // Видаляємо зайві поля
    unset($fields['billing']['billing_company']); 
    unset($fields['billing']['billing_address_1']);
    unset($fields['billing']['billing_address_2']);
    unset($fields['billing']['billing_city']);
    unset($fields['billing']['billing_postcode']);
    unset($fields['billing']['billing_country']);
    unset($fields['billing']['billing_state']);

    // Налаштовуємо потрібні поля
    $fields['billing']['billing_first_name']['label'] = ''; 
    $fields['billing']['billing_first_name']['placeholder'] = __( 'Ім’я*', 'text-domain' );
    
    $fields['billing']['billing_last_name']['label'] = ''; 
    $fields['billing']['billing_last_name']['placeholder'] = __( 'Прізвище*', 'text-domain' );
    
    $fields['billing']['billing_phone']['label'] = ''; 
    $fields['billing']['billing_phone']['placeholder'] = __( 'Номер телефону*', 'text-domain' );
    
    $fields['billing']['billing_email']['label'] = ''; 
    $fields['billing']['billing_email']['placeholder'] = __( 'Email*', 'text-domain' );
    
    // Коментарі переміщуємо до секції 'order'
    $fields['order']['order_comments']['label'] = ''; 
    $fields['order']['order_comments']['placeholder'] = __( 'Коментар (не обов’язково)', 'text-domain' );

    // Діагностика для перевірки завершення виконання функції
    error_log('Поля змінено успішно');

    // Додаємо обмеження для полів Ім'я, Прізвище, Телефон, Email
    $fields['billing']['billing_first_name']['maxlength'] = 50;
    $fields['billing']['billing_first_name']['minlength'] = 3;
    
    $fields['billing']['billing_last_name']['maxlength'] = 50;
    $fields['billing']['billing_last_name']['minlength'] = 3;
    
    $fields['billing']['billing_phone']['maxlength'] = 50;
    $fields['billing']['billing_phone']['minlength'] = 3;
    
    $fields['billing']['billing_email']['maxlength'] = 50;
    $fields['billing']['billing_email']['minlength'] = 3;

    // Для Коментарів додаємо обмеження
    $fields['order']['order_comments']['maxlength'] = 300;
    $fields['order']['order_comments']['minlength'] = 3;

    return $fields;
}

echo '<script>
    document.addEventListener("DOMContentLoaded", function () {
        const deliveryOptions = document.querySelectorAll(".delivery-pickup, .delivery-nova-poshta");

        deliveryOptions.forEach(option => {
            option.addEventListener("click", function () {
                deliveryOptions.forEach(opt => opt.classList.remove("selected"));
                this.classList.add("selected");
            });
        });
    });
</script>';

echo '<script>
    document.addEventListener("DOMContentLoaded", function () {
        const deliveryOptions = document.querySelectorAll(".payment-1, .payment-2, .payment-3, .payment-4");

        deliveryOptions.forEach(option => {
            option.addEventListener("click", function () {
                deliveryOptions.forEach(opt => opt.classList.remove("selected"));
                this.classList.add("selected");
            });
        });
    });
</script>';


