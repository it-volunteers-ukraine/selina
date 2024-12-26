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
        <a href="<?php echo esc_url( pll_current_language() === 'en' ? site_url('/en/shop') : get_permalink( wc_get_page_id( 'shop' ) ) ); ?>" class="filter-button active" data-category="shop">
            <?php echo pll_current_language() === 'en' ? 'All' : 'Всі'; ?>
            <span class="button-icon">
                <svg width="14" height="12">
                    <use href="<?php echo get_template_directory_uri() ?>/assets/images/sprite.svg#icon-paw"></use>
                </svg>
            </span>
        </a> <!-- 'All' button for showing all products -->
        <?php foreach ( $product_categories as $category ) : ?>
            <a href="<?php echo esc_url( get_term_link( $category ) ); ?>" class="filter-button" data-category="<?php echo esc_attr( $category->slug ); ?>">
                <?php echo esc_html( $category->name ); ?>
                <span class="button-icon">
                    <svg width="14" height="12">
                        <use href="<?php echo get_template_directory_uri() ?>/assets/images/sprite.svg#icon-paw"></use>
                    </svg>
                </span>
            </a>
        <?php endforeach; ?>
    </div>
<?php endif; ?>
        </div>
         <!-- Page Description -->
    <div class="shop-filters__description">
    <?php the_field( 'store_description', 'option' ); ?>
    </div>
    <div class="shop-filters__sorting">
        <span class="shop-filters__sorting-text"> <?php echo pll_current_language() === 'en' ? 'Sort by' : 'Сортувати за:'; ?></span>
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
    <?php get_template_part('template-parts/join-us'); ?>
        </main>
<?php get_footer( 'shop' ); ?>
