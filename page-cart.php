<?php get_header(); ?>

<?php if ( have_posts() ) : 
    while ( have_posts() ) : the_post(); ?>
        <h1 style="font-weight: 800;
                    font-size: 45px;
                    line-height: 100%;
                    color: #121212;"><?php the_title(); ?></h1>
        <?php the_content(); ?>
    <?php endwhile; 
else : ?>
    <p>Nothing is here..</p>
<?php endif; ?>


<?php get_footer(); ?>
