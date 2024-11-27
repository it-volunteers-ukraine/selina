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
                <!-- <?php if ( ! WC()->cart->is_empty() ) : ?>
                    <a href="<?php echo esc_url( wc_get_page_permalink( 'shop' ) ); ?>">
                        <?php echo esc_html( get_field( 'continue_shopping', get_the_ID() ) ); ?>
                    </a>
                <?php endif; ?> -->
                <?php if ( ! WC()->cart->is_empty() ) : ?>
                    <?php 
                        // Get the ID of the shop page
                        $shop_page_id = wc_get_page_id( 'shop' );

                        // Get the ID of the translated version of the shop page for the current language
                        $translated_shop_page_id = pll_get_post( $shop_page_id );

                        // Get the URL of the translated shop page
                        $shop_url = get_permalink( $translated_shop_page_id );
                    ?>
                    <a href="<?php echo esc_url( $shop_url ); ?>">
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
