<?php
/*
Template Name: breeders
*/
get_header();

?>
<main>
    <section class="section breeders-first-section">
        <style>
            @media screen and (min-width: 1439px) {
                .breeders-first-section {
                background-image: url("<?php the_field('upper-section__background', 'option') ?>"); 
                }
            }
        </style>
        <div class="container">
            <h3 class="section_heading breeders-first-section__heading">
                <?php the_field('page_heading'); ?>
            </h3>
            <div class="breeders-first-section__subtitle-heading-wrapper">
                <a class="breeders-first-section__subtitle-heading"
                href="#about-breeders">
                    <svg class="breeders-first-section__heading-svg" width="14" height="12">
                        <use href="<?php echo get_template_directory_uri() ?>/assets/images/sprite.svg#icon-paw">
                        </use>
                    </svg>
                    <p><?php the_field('first_section-heading'); ?></p>
                </a>
                <a class="breeders-first-section__subtitle-heading"
                href="#breeders-catalogue">
                    <svg class="breeders-first-section__heading-svg" width="14" height="12">
                        <use href="<?php echo get_template_directory_uri() ?>/assets/images/sprite.svg#icon-paw">
                        </use>
                    </svg>
                    <p><?php the_field('second_section-heading'); ?></p>
                </a>
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
            <div class="breeders-catalogue-section__filter-wrapper">
                <p><?php the_field('list_text'); ?></p>
                <select name="select" id="breeders-order">
                    <option value="title-asc"><?php the_field('filter_name_a'); ?></option>
                    <option value="title-desc"><?php the_field('filter_name_ya'); ?></option>
                    <option value="date-desc" selected><?php the_field('filter_date_new'); ?></option>
                    <option value="date-asc"><?php the_field('filter_date_old'); ?></option>
                </select>
            </div>
            <div class="breeders-catalogue-section__list">
            </div>
        </div>
    </section>
    <?php get_template_part('template-parts/join-us'); ?>
</main>



<?php get_footer(); ?>