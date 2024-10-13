<?php
// Ensure WooCommerce is loaded
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

get_header( 'shop' ); ?>

<main class="shop-page">
    <section class="section shop-filters">
        <div class="container">
        <div>
            <?php
// Get product categories
$product_categories = get_terms( array(
    'taxonomy'   => 'product_cat',
    'hide_empty' => true, 
) );

if ( ! empty( $product_categories ) && ! is_wp_error( $product_categories ) ) : ?>
    <div class="filters shop-filters__categories">
        <button class="filter-button active" data-category="all">All</button> <!-- 'All' button for showing all products -->
        <?php foreach ( $product_categories as $category ) : ?>
            <button class="filter-button" data-category="<?php echo esc_attr( $category->slug ); ?>">
                <?php echo esc_html( $category->name ); ?>
            </button>
        <?php endforeach; ?>
    </div>
<?php endif; ?>
        </div>
         <!-- Page Description -->
    <div class="shop-filters__description">
        <p><?php get_field('shop-description', 'option'); ?></p>
    </div>
    <div class="shop-filters__sorting">
        <span><?php woocommerce_catalog_ordering(); ?></span>
    </div>
    </div>
    </section>

    <!-- Product Grid -->
    <section class="section shop-grid">
        <div class="container">
            <div class="shop-grid__products">
        <?php if ( woocommerce_product_loop() ) : ?>

    <?php woocommerce_product_loop_start(); ?>

    <?php while ( have_posts() ) : ?>
        <?php the_post(); ?>

    
            <?php wc_get_template_part( 'content', 'product' ); ?>
  

    <?php endwhile; ?>

    <?php woocommerce_product_loop_end(); ?>

<?php else : ?>
    <?php wc_get_template( 'loop/no-products-found.php' ); ?>
<?php endif; ?>

    </div>
    </div>
    </section>
        </main>
<?php get_footer( 'shop' ); ?>
