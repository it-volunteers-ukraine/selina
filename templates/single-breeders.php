<?php
/*
 * Template post type: breeders
 * Template name: breeders
 */
get_header();
?>
<main>
    <section class="section single-breeder-first-section">
        <style>
            @media screen and (min-width: 1439px) {
                .single-breeder-first-section {
                    background-image: url("<?php the_field('upper-section__background', 'option') ?>");
                }
            }
        </style>
        <div class="container">
            <h3 class="section_heading single-breeder-first-section__heading">
                <?php the_field('breeder_name'); ?>
            </h3>
            <div class="single-breeder-first-section__subtitle-heading-wrapper">
                <a class="single-breeder-first-section__subtitle-heading" href="#about-single-breeder">
                    <svg class="single-breeder-first-section__heading-svg" width="14" height="12">
                        <use href="<?php echo get_template_directory_uri() ?>/assets/images/sprite.svg#icon-paw">
                        </use>
                    </svg>
                    <p><?php the_field('breeder-page_about-title'); ?></p>
                </a>
                <a class="single-breeder-first-section__subtitle-heading" href="#single-breeder-our-cats">
                    <svg class="single-breeder-first-section__heading-svg" width="14" height="12">
                        <use href="<?php echo get_template_directory_uri() ?>/assets/images/sprite.svg#icon-paw">
                        </use>
                    </svg>
                    <p><?php the_field('breeder-page_our-cats-title'); ?></p>
                </a>
                <a class="single-breeder-first-section__subtitle-heading" href="#single-breeder-free-cats">
                    <svg class="single-breeder-first-section__heading-svg" width="14" height="12">
                        <use href="<?php echo get_template_directory_uri() ?>/assets/images/sprite.svg#icon-paw">
                        </use>
                    </svg>
                    <p><?php the_field('breeder-page_free-cats-title'); ?></p>
                </a>
            </div>
        </div>
    </section>
    <section class="section single-breeder-about-section" id="about-single-breeder">
        <div class="container">
            <h2 class="section_heading single-breeder-about-section__heading">
                <svg class="breeders-heading-svg" width="42" height="60">
                    <use href="<?php echo get_template_directory_uri() ?>/assets/images/sprite.svg#icon-La_cat">
                    </use>
                </svg>
                <?php the_field('breeder-page_about-title'); ?>
            </h2>
            <div class="single-breeder-about-section__content">
                <div class="single-breeder-about-section__text">
                    <p class="single-breeder-about-section__text-first"><?php the_field('breeder-page_about-subtitle'); ?></p>
                    <p class="single-breeder-about-section__text-second"><?php the_field('breeder-page_about-text'); ?></p>
                </div>
                <img class="single-breeder-about-section__img" src="<?php the_field('breeder_photo') ?>" />
            </div>
        </div>
    </section>
</main>
<?php get_footer(); ?>