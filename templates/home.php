<?php
/*
Template Name: home
*/
get_header();

?>
<main>
    <section class="section first-section">
        <div class="first__container">
        <?php if (have_rows('first-section__swiper')): ?>
            <div class="first-section__swiper">
                <?php while (have_rows('first-section__swiper')):
                    the_row();
                    $image = get_sub_field('first-section__image');
                    $bg = get_sub_field('first-section__background'); ?>
                    <div class="first-section__wrapper">
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
    </section>
    <section class="section partners-section">
        <div class="container">
            <h2 class="partners-section__heading main_heading">
                <?php the_field('partners-section__heading'); ?>
            </h2>
                <div class="front-page__slider-wrap slider ">
                     <?php if (have_rows('partners-section__list')): ?>
            <div class="partners-section__list slider__inner">
                <?php while (have_rows('partners-section__list')):
                    the_row(); ?>
                    <div class="partners-section__item slider__item">
                        <img src="<?php the_sub_field('partners-section__item') ?>"/>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>
                </div>
            <button class="partners-section__button button red_medium_button">
                <?php the_field('partners-section__btn'); ?>
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
                        <img src="<?php the_field('who-section__photo'); ?>"/>
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
            </button>
            </div>
            </div>
        </div>
    </section>
</main>



<?php get_footer(); ?>