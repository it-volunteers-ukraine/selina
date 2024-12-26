<?php get_header();

/**
 * Template Name: Cart Page
 */

?>

<main class="main">

    <?php if ( have_posts() ) : ?>

        <?php while ( have_posts() ) : the_post(); ?>
            
            <div class="container cart-header__container">
                <h1><?php the_title(); ?></h1>
                <?php if ( ! WC()->cart->is_empty() ) : ?>
                    <a href="<?php  echo esc_url( pll_current_language() === 'en' ? site_url( '/en/shop' ) : get_permalink( wc_get_page_id( 'shop' ) ) ); ?>">
                    <?php echo esc_html( get_field( 'continue_shopping', get_the_ID() ) ); ?>
                    </a>
                <?php endif; ?>
            </div>
            
            <?php the_content(); ?>
        <?php endwhile; ?>

    <?php else : ?>
        <p>Nothing is here..</p>

    <?php endif; ?>
</main>

<?php get_footer(); ?>
