<?php
/*
Template Name: home
*/
get_header();

?>
<main>
    <section class="section first-section">
        <div class="first__container swiper">
            <?php if (have_rows('first-section__swiper')): ?>
                <div class="first-section__swiper swiper-wrapper">
                    <?php while (have_rows('first-section__swiper')):
                        the_row();
                        $image = get_sub_field('first-section__image');
                        $bg = get_sub_field('first-section__background'); ?>
                        <div class="first-section__wrapper swiper-slide">
                            <div class="first-section__img"
                                style="background-image: url(<?php the_sub_field('first-section__image') ?>);">
                            </div>
                            <div class="first-section__background"
                                style="background-image: url(<?php the_sub_field('first-section__background') ?>);">
                                <div class="first-section__text-box">
                                    <h2 class="first-section__heading main_heading">
                                        <?php the_sub_field('first-section__heading'); ?>
                                    </h2>
                                    <p class="first-section__info">
                                        <?php the_sub_field('first-section__info'); ?>
                                    </p>
                                    <button class="first-section__button button red_medium_button">
                                        <?php the_sub_field('first-section__button'); ?>
                                    </button>
                                    
                                </div>
                            </div>

                        </div>
                    <?php endwhile; ?>
                </div>
                
            <?php endif; ?>
        </div>
        <div class="container first-section__relative-container"><div class="first-section__button-paw">
                    <svg class="first-section__paw-svg-pad" width="30.32" height="19.67">
                        <use href="<?php echo get_template_directory_uri() ?>/assets/images/sprite.svg#icon-paw1"></use>
                    </svg>
                    <div class="pgnt">
                        
                    </div>
                </div></div>
    </section>
    <section class="section partners-section">
        <div class="container">
            <div class="partners-section__heading-wrapper">
            <h2 class="partners-section__heading main_heading">
                <svg class="who-section__button-svg" width="42" height="60">
                    <use href="<?php echo get_template_directory_uri() ?>/assets/images/sprite.svg#icon-La_cat"></use>
                    </svg>
                <?php the_field('partners-section__heading'); ?>
            </h2>
            <div class="partners-section__pagination">
                    <button class="partners-section__arrow-left-btn partners-section__arrow-btn">
                    <svg class="partners-section__arrow-left one-arrow" width="10.37" height="16.97">
                    <use href="<?php echo get_template_directory_uri() ?>/assets/images/sprite.svg#icon-to-left"></use>
                    </svg>
                    </button>
                    <button class="partners-section__arrow-right-btn partners-section__arrow-btn">
                    <svg class="partners-section__arrow-right one-arrow" width="10.37" height="16.97">
                    <use href="<?php echo get_template_directory_uri() ?>/assets/images/sprite.svg#icon-to-right"></use>
                    </svg>
                    </button>
            </div>
            </div>
            <div class="partners-section__swiper swiper">
                <div class="partners-section__list swiper-wrapper">
                    <?php
                    $args = array('posts_per_page' => -1, 'category_name' => 'partners');
                    $myposts = get_posts($args);
                    foreach ($myposts as $post):
                        setup_postdata($post); ?>
                        <div class="partners-section__item swiper-slide">
                            <img src="<?php the_field('partner_img') ?>" />
                        </div>
                    <?php endforeach;
                    wp_reset_postdata(); ?>
                </div>
            </div>

            <button class="partners-section__button button red_medium_button">
                <?php the_field('partners-section__btn'); ?>
                <svg class="partners-section__button-svg" width="16" height="15">
                    <use href="<?php echo get_template_directory_uri() ?>/assets/images/sprite.svg#icon-paw"></use>
                    </svg>
            </button>
        </div>
    </section>
    <section class="section who-section">
        <div class="container">
            <h2 class="who-section__heading main_heading">
                <?php the_field('who-section__heading'); ?>
            </h2>
            <div class="who-section__wrapper">

                <div class="who-section__img">
                    <img src="<?php the_field('who-section__photo'); ?>" />
                </div>
                <div class="who-section__text-wrapper">
                    <h2 class="who-section__heading-desk main_heading">
                        <?php the_field('who-section__heading'); ?>
                    </h2>
                    <p class="who-section__info">
                        <?php the_field('who-section__text'); ?>
                    </p>
                    <button class="who-section__button button red_medium_button">
                        <?php the_field('who-section__button'); ?>
                        <svg class="who-section__button-svg" width="16" height="15">
                    <use href="<?php echo get_template_directory_uri() ?>/assets/images/sprite.svg#icon-paw"></use>
                    </svg>
                    </button>
                </div>
            </div>
        </div>
    </section>
</main>



<?php get_footer(); ?>