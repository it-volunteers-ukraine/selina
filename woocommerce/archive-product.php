<?php
// Ensure WooCommerce is loaded
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

get_header( 'shop' ); ?>

<div class="shop-page">

    <!-- Filters Section -->
    <div class="shop-filters">
        <div class="shop-filters-categories">
            <?php 
                // WooCommerce product categories filter
                wp_list_categories( array(
                    'taxonomy'     => 'product_cat',
                    'title_li'     => '',
                    'show_count'   => true,
                    'hide_empty'   => true,
                    'walker'       => new Walker_Category(), // Optional if you need a custom walker
                ) ); 
            ?>
        </div>

        <div class="shop-filters-products">
            <button>Товари</button>
            <button>Послуги</button>
            <button>Цифрова Продукція</button>
        </div>
    </div>

    <!-- Page Description -->
    <div class="shop-page-description">
        <p>В цьому розділі зібрано все необхідне для вашого котика: товари, послуги та цифрова продукція...</p>
    </div>

    <!-- Sorting Section -->
    <div class="shop-sorting">
        <span><?php woocommerce_catalog_ordering(); ?></span>
    </div>

    <!-- Product Grid -->
    <div class="products-grid">
        <?php if ( woocommerce_product_loop() ) : ?>

            <?php woocommerce_product_loop_start(); ?>

            <?php while ( have_posts() ) : ?>
                <?php the_post(); ?>

                <div class="product-item">
                    <?php wc_get_template_part( 'content', 'product' ); ?>
                </div>

            <?php endwhile; ?>

            <?php woocommerce_product_loop_end(); ?>

        <?php else : ?>
            <?php wc_get_template( 'loop/no-products-found.php' ); ?>
        <?php endif; ?>
    </div>

</div>

<?php get_footer( 'shop' ); ?>
