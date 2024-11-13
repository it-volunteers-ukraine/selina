<li class="shop-grid__item">
    <?php
    /**
     * Hook: woocommerce_before_shop_loop_item.
     *
     * @hooked woocommerce_template_loop_product_link_open - 10
     */
    do_action( 'woocommerce_before_shop_loop_item' );

    /**
     * Hook: woocommerce_before_shop_loop_item_title.
     *
     * @hooked woocommerce_show_product_loop_sale_flash - 10
     * @hooked woocommerce_template_loop_product_thumbnail - 10
     */
    do_action( 'woocommerce_before_shop_loop_item_title' );

    /**
     * Hook: woocommerce_shop_loop_item_title.
     *
     * @hooked woocommerce_template_loop_product_title - 10
     */
    do_action( 'woocommerce_shop_loop_item_title' );

    /**
     * Hook: woocommerce_after_shop_loop_item_title.
     *
     * @hooked woocommerce_template_loop_rating - 5
     * @hooked woocommerce_template_loop_price - 10
     */
    do_action( 'woocommerce_after_shop_loop_item_title' );

    // Create a wrapper for the buttons
    ?>
    <div class="button-wrapper">
        <?php
        /**
         * Hook: woocommerce_after_shop_loop_item.
         *
         * @hooked woocommerce_template_loop_product_link_close - 5
         * @hooked woocommerce_template_loop_add_to_cart - 10
         */
        do_action( 'woocommerce_after_shop_loop_item' );

        // Custom "Buy Now" button
$product_id = get_the_ID();
$is_in_stock = get_post_meta($product_id, '_stock_status', true) === 'instock';
?>
<a href="<?php echo $is_in_stock ? esc_url( wc_get_checkout_url() . '?add-to-cart=' . $product_id ) : '#'; ?>" 
   class="buy-now-button" 
   <?php echo !$is_in_stock ? 'data-disabled="true" style="pointer-events: none; opacity: 0.5;"' : ''; ?>>
    <?php
    // Check if the current language is English
    if ( pll_current_language() == 'en' ) {
        echo $is_in_stock ? esc_html__( 'Buy', 'woocommerce' ) : esc_html__( 'Out of Stock', 'woocommerce' );
    } else {
        echo $is_in_stock ? esc_html__( 'Купити', 'woocommerce' ) : esc_html__( 'Немає в наявності', 'woocommerce' );
    }
    ?>
</a>
    </div>
</li>
