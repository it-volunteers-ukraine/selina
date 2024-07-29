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

    <!-- Club Rules section ------------------------------------------>
    <section class="club-rules-section section" id="membership-club-rules">
        <div class="container">
            <div class="club-rules-section__wrapper">
                <h2 class="club-rules-section__heading section_heading club-rules-sections-heading">
                    <svg class="heading-svg" width="29" height="28">
                        <use href="<?php echo get_template_directory_uri() ?>/assets/images/sprite.svg#icon-La_cat">
                        </use>
                    </svg>
                    <?php the_field('club-rules-section__heading'); ?>
                </h2>
                <div class="club-rules-section__content">
                    <div class="club-rules-section__upper-card">
                        <img src="<?php the_field('club-rules-img'); ?>" />
                    </div>
                    <div class="club-rules-section__lower-card">
                        <div class="club-rules-section__lower-card-wrapper">
                            <p class="club-rules-section__lower-card-title">
                                <?php the_field('club-rules-section__lower-card-title'); ?>
                            </p>
                            <?php if( have_rows('club-rules-section__lower-card-list') ): ?>
                                <ul class="club-rules-section__lower-card-list">
                                    <?php while( have_rows('club-rules-section__lower-card-list') ): the_row(); 
                                        $clubMembershipRule = get_sub_field('club-membership-rule');
                                        ?>
                                        <li>
                                            <?php echo $clubMembershipRule; ?>
                                        </li>
                                    <?php endwhile; ?>
                                </ul>
                            <?php endif; ?>
                        </div>
                        <p class="club-rules-section__lower-card-text">
                            <?php the_field('club-rules-section__lower-card-text'); ?>
                        </p>
                        <button class="club-rules-section__lower-card-button transparent_medium_button">
                            <a href="<?php echo esc_attr( get_field('club-rules-section__link') ); ?>" target="_blank">
                                <?php the_field('club-rules-section__btn'); ?>
                            </a> 
                            <svg class="about_wcf-section__button-svg" width="20" height="20">
                                <use href="<?php echo get_template_directory_uri() ?>/assets/images/sprite.svg#arrow-up-right"></use>
                            </svg>
                        </button>
                    </div>
                </div>
                
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>