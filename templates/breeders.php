<?php
/*
Template Name: breeders
*/
get_header();

?>
<main>
    <section class="section breeders-first-section">
        <div class="container">
            <h3 class="section_heading">
                <?php the_field('page_heading'); ?>
            </h3>
            <div class="breeders-first-section__subtitle-heading-wrapper">
                <div class="breeders-first-section__subtitle-heading">
                    <svg class="breeders-first-section__heading-svg" width="14" height="12">
                        <use href="<?php echo get_template_directory_uri() ?>/assets/images/sprite.svg#icon-paw">
                        </use>
                    </svg>
                    <p><?php the_field('first_section-heading'); ?></p>
                </div>
                <div class="breeders-first-section__subtitle-heading">
                    <svg class="breeders-first-section__heading-svg" width="14" height="12">
                        <use href="<?php echo get_template_directory_uri() ?>/assets/images/sprite.svg#icon-paw">
                        </use>
                    </svg>
                    <p><?php the_field('second_section-heading'); ?></p>
                </div>
            </div>
        </div>

    </section>
    <section class="section about-breeders-section-" id="about-breeders">
        <div class="container">
            <h2 class="section_heading about-breeders-section__heading">
                <svg class="breeders-heading-svg" width="42" height="60">
                    <use href="<?php echo get_template_directory_uri() ?>/assets/images/sprite.svg#icon-La_cat">
                    </use>
                </svg>
                <?php the_field('first_section-heading'); ?>
            </h2>
            <div class="about-breeders-section__content">
                <p class="about-breeders-section__text"><?php the_field('first_section-text'); ?></p>
                <img class="about-breeders-section__img" src="<?php the_field('first_section-img') ?>" />
            </div>
        </div>
    </section>
    <section class="section breeders-catalogue-section" id="breeders-catalogue">
        <div class="container">
            <div class="breeders-catalogue-section__list">
            </div>

        </div>
    </section>
    <?php get_template_part('template-parts/join-us'); ?>
</main>



<?php get_footer(); ?>