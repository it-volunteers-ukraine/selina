<?php
/*
* Template Post Type: tips
 * Template Name: tips
*/
get_header();
?>

    <main>
        <section class="section heading-section-single-tip">
            <div class="heading-section-single-tip__background-img">
                <img src="<?php the_field('upper-section__background', 'option'); ?>" alt="cat">
            </div>
            <div class="container">
                <div class="heading-section-single-tip__wrapper">
                    <div class="heading-section-single-tip__list-events">
                        <h2><?php the_field('list-single-tip'); ?></h2>
                    </div>
                </div>
            </div>
        </section>

        <?php get_template_part('template-parts/join-us') ?>
    </main>

<?php get_footer(); ?>