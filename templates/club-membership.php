<?php
/*
Template Name: club-membership
*/
get_header();
?>

<main class="club-membership">
<section class="upper-section section" id="club-membership-upper">
        <style>
            @media screen and (min-width: 1439px) {
                .upper-section {
                background-image: url("<?php the_field('upper-section__background', 'option') ?>"); 
                }
            }
        </style> 
        <div class="container">
            <div class="upper-section__banner">
                <h2 class="upper-section__heading section_heading">
                    <?php the_field('club-membership__heading'); ?>
                </h2>
                <div class="upper-section__sub-titles">
                    <a class="sub-title club-rules__sub-title" href="#membership-club-rules">
                        <svg class="sub-title-svg" width="18" height="17">
                            <use href="<?php echo get_template_directory_uri() ?>/assets/images/sprite.svg#icon-paw">
                            </use>
                        </svg>
                        <?php the_field('club-rules-section__heading'); ?>
                    </a>
                    <a class="sub-title gallery__sub-title" href="#membership-gallery">
                        <svg class="sub-title-svg" width="18" height="17">
                            <use href="<?php echo get_template_directory_uri() ?>/assets/images/sprite.svg#icon-paw">
                            </use>
                        </svg>
                        <?php the_field('gallery-section__heading'); ?>
                    </a>
                    <a class="sub-title benefits__sub-title" href="#membership-benefits">
                        <svg class="sub-title-svg" width="18" height="17">
                            <use href="<?php echo get_template_directory_uri() ?>/assets/images/sprite.svg#icon-paw">
                            </use>
                        </svg>
                        <?php the_field('benefits-section__heading'); ?>
                    </a>
                    <a class="sub-title registration__sub-title" href="#membership-registration">
                        <svg class="sub-title-svg" width="18" height="17">
                            <use href="<?php echo get_template_directory_uri() ?>/assets/images/sprite.svg#icon-paw">
                            </use>
                        </svg>
                        <?php the_field('registration-section__heading'); ?>
                    </a> 
                </div> 
            </div>
        </div>    
    </section>
</main>

<?php get_footer(); ?>