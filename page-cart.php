<?php get_header(); ?>

<main class="main">

    <?php if ( have_posts() ) : ?>

        <?php while ( have_posts() ) : the_post(); ?>
            
            
                <div class="container cart-header__container">
                    <?php the_title(); ?>
                </div>
            

            <?php the_content(); ?>
        <?php endwhile; ?>

    <?php else : ?>
        <p>Nothing is here..</p>

    <?php endif; ?>
</main>

<?php get_footer(); ?>
