<?php get_header(); ?>

<main class="main">

    <?php if ( have_posts() ) : ?>

        <?php while ( have_posts() ) : the_post(); ?>
            
            <div class="container cart-header__container">
                <h1><?php the_title(); ?></h1>
                <a href="<?php echo esc_url( wc_get_page_permalink( 'shop' ) ); ?>">
                    <?php _e( 'Continue Shopping', 'woocommerce' ); ?>
                </a>
            </div>
            
            <?php the_content(); ?>
        <?php endwhile; ?>

    <?php else : ?>
        <p>Nothing is here..</p>

    <?php endif; ?>
</main>

<?php get_footer(); ?>
