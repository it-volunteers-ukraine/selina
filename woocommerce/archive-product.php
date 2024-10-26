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
        <button class="filter-button active" data-category="all">    
        <?php echo pll_current_language() === 'en' ? 'All' : 'Всі'; ?>
    <span class="button-icon">
                <svg width="14" height="12">
                        <use href="<?php echo get_template_directory_uri() ?>/assets/images/sprite.svg#icon-paw">
                        </use>
                    </svg>
            </span>
        </button> <!-- 'All' button for showing all products -->
        <?php foreach ( $product_categories as $category ) : ?>
            <button class="filter-button" data-category="<?php echo esc_attr( $category->slug ); ?>">
                <?php echo esc_html( $category->name ); ?>
                <span class="button-icon">
                <svg width="14" height="12">
                        <use href="<?php echo get_template_directory_uri() ?>/assets/images/sprite.svg#icon-paw">
                        </use>
                    </svg>
            </span>
            </button>
        <?php endforeach; ?>
    </div>
<?php endif; ?>
        </div>
         <!-- Page Description -->
    <div class="shop-filters__description">
    <?php
if ( function_exists('pll_current_language') ) {
    $current_language = pll_current_language();
    if ($current_language === 'uk') { 
        $store_description = 'В цьому розділі зібрано все необхідне для вашого котика: 
        товари, послуги та цифрова продукція. Ви зможете знайти як якісні речі для 
        догляду і розваг, так і професійні послуги для здоров\'я та комфорту улюбленця. 
        Усе для того, щоб ваш котик був щасливим і задоволеним';
    } elseif ($current_language === 'en') { 
        $store_description = 'This section contains everything you need for your cat:
 goods, services and digital products. You will be able to find both quality things for
 care and entertainment, as well as professional services for the health and comfort of a pet.
 Everything to keep your kitty happy and satisfied';
    } else {
        $store_description = ' ';
    }
    echo '<div class="store-description">' . wp_kses_post($store_description) . '</div>';
} else {
    echo '<p> </p>';
}
?>
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
