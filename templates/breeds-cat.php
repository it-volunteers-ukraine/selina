<?php
/*
Template Name: breeds-cat
*/
get_header();

?>
<main>
    <section class="section breeds-first-section">
        <style>
            @media screen and (min-width: 1439px) {
                .breeds-first-section {
                    background-image: url("<?php the_field('upper-section__background', 'option') ?>");
                }
            }
        </style>
        <div class="container">
            <h3 class="section_heading breeds-first-section__heading">
                <?php the_field('page_heading'); ?>
            </h3>
            <div class="breeds-first-section__subtitle-heading-wrapper">
                <a class="breeds-first-section__subtitle-heading" href="#about-breeds">
                    <svg class="breeds-first-section__heading-svg" width="14" height="12">
                        <use href="<?php echo get_template_directory_uri() ?>/assets/images/sprite.svg#icon-paw">
                        </use>
                    </svg>
                    <p><?php the_field('first_section-heading'); ?></p>
                </a>
                <a class="breeds-first-section__subtitle-heading" href="#breeds-catalogue">
                    <svg class="breeds-first-section__heading-svg" width="14" height="12">
                        <use href="<?php echo get_template_directory_uri() ?>/assets/images/sprite.svg#icon-paw">
                        </use>
                    </svg>
                    <p><?php the_field('second_section-heading'); ?></p>
                </a>
            </div>
        </div>

    </section>
    <section class="section about-breeds-section" id="about-breeds">
        <div class="container">
            <h2 class="section_heading about-breeds-section__heading">
                <svg class="breeds-heading-svg" width="42" height="60">
                    <use href="<?php echo get_template_directory_uri() ?>/assets/images/sprite.svg#icon-La_cat">
                    </use>
                </svg>
                <?php the_field('first_section-heading'); ?>
            </h2>
            <div class="about-breeds-section__content">
                <p class="about-breeds-section__text"><?php the_field('first_section-text'); ?></p>
                <img class="about-breeds-section__img" src="<?php the_field('first_section-img') ?>" />
            </div>
        </div>
    </section>
    <section class="section breeds-catalogue-section" id="breeds-catalogue">
        <div class="container">
            <div class="breeds-catalogue-section__filter-wrapper">
                <p class="breeds-catalogue-section__filter-text"><?php the_field('list_text'); ?></p>
                <select name="select" id="breeds-order">
                    <option value="title-asc"><?php the_field('filter_name_a'); ?></option>
                    <option value="title-desc"><?php the_field('filter_name_ya'); ?></option>
                    <option value="date-desc" selected><?php the_field('filter_date_new'); ?></option>
                    <option value="date-asc"><?php the_field('filter_date_old'); ?></option>
                </select>
            </div>
            <div class="breeds-catalogue-section__list">
            </div>
            <div class="breeds-catalogue-section__pagination visually-hidden">
                <button class="breeds-catalogue-section__pagination-left breeds-prev">
                    <svg width="10.67" height="16.97">
                        <use href="<?php echo get_template_directory_uri() ?>/assets/images/sprite.svg#icon-to-left">
                        </use>
                    </svg>
                </button>
                <div class="breeds-catalogue-section__pagination-numbers"></div>
                <button class="breeds-catalogue-section__pagination-right breeds-next">
                    <svg width="10.67" height="16.97">
                        <use href="<?php echo get_template_directory_uri() ?>/assets/images/sprite.svg#icon-to-right">
                        </use>
                    </svg>
                </button>
            </div>
    </section>
    <?php get_template_part('template-parts/join-us'); ?>
</main>



<?php get_footer(); ?>