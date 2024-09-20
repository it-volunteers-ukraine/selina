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
                <h2 class="club-rules-section__heading section_heading club-membership-sections-heading">
                    <svg class="heading-svg" width="29" height="28">
                        <use href="<?php echo get_template_directory_uri() ?>/assets/images/sprite.svg#icon-La_cat">
                        </use>
                    </svg>
                    <?php the_field('club-rules-section__heading'); ?>
                </h2>
                <div class="club-rules-section__content">
                    <div class="club-rules-section__upper-card">
                        <div class="upper-card__img">
                            <img src="<?php the_field('club-rules-img'); ?>" />
                        </div>
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
    <section class="selina-rules">
        <style>
            .selina-rules::before {
                background-image: url("<?php the_field('breed-cat-bg') ?>"); 
            }
        </style> 
        <div class="container">
            <div class="selina-rules__wrapper">
                <div class="selina-rules__title">
                    <?php the_field('selina-rules__title'); ?>
                </div> 
                <div class="selina-rules__cards">
                    <div class="selina-rules-card selina-rules-card-1">
                        <svg class="selina-rules-card__img selina-rules-card__img-1" width="60" height="60">
                            <use href="<?php echo get_template_directory_uri() ?>/assets/images/sprite.svg#red-smile">
                            </use>
                        </svg>
                        <p class="selina-rules-card__content selina-rules-card__content-1">
                            <?php the_field('selina-rules-card__content-1'); ?>
                        </p>
                    </div>
                    <div class="selina-rules-card selina-rules-card-2">
                        <svg class="selina-rules-card__img selina-rules-card__img-2" width="60" height="60">
                            <use href="<?php echo get_template_directory_uri() ?>/assets/images/sprite.svg#red-people">
                            </use>
                        </svg>
                        <p class="selina-rules-card__content selina-rules-card__content-2">
                            <?php the_field('selina-rules-card__content-2'); ?>
                        </p>
                    </div>
                    <div class="selina-rules-card selina-rules-card-3">
                        <svg class="selina-rules-card__img selina-rules-card__img-3" width="60" height="60">
                            <use href="<?php echo get_template_directory_uri() ?>/assets/images/sprite.svg#red-cat">
                            </use>
                        </svg>
                        <p class="selina-rules-card__content selina-rules-card__content-3">
                            <?php the_field('selina-rules-card__content-3'); ?>
                        </p>
                    </div>
                    <div class="selina-rules-card selina-rules-card-4">
                        <svg class="selina-rules-card__img selina-rules-card__img-4" width="60" height="60">
                            <use href="<?php echo get_template_directory_uri() ?>/assets/images/sprite.svg#red-people-money">
                            </use>
                        </svg>
                        <p class="selina-rules-card__content selina-rules-card__content-4">
                            <?php the_field('selina-rules-card__content-4'); ?>
                        </p>
                    </div>
                </div>
                <button class="selina-rules__button button red_medium_button">
                    <a href="<?php echo esc_attr( get_field('selina-rules__link') ); ?>" target="_blank">
                        <?php the_field('selina-rules__btn'); ?>
                    </a> 
                    <svg class="rules-section__button-svg" width="16" height="14">
                        <use href="<?php echo get_template_directory_uri() ?>/assets/images/sprite.svg#icon-google"></use>
                    </svg>
                </button>
            </div>
        </div>
    </section>
    <!-- Gallery section -->
    <section class="gallery-section section" id="membership-gallery">
        <div class="container">
            <div class="gallery-section__wrapper">
                <h2 class="gallery-section__heading section_heading club-membership-sections-heading">
                    <svg class="heading-svg" width="29" height="28">
                        <use href="<?php echo get_template_directory_uri() ?>/assets/images/sprite.svg#icon-La_cat">
                        </use>
                    </svg>
                    <?php the_field('gallery-section__heading'); ?>
                </h2>
                <p class="gallery-section__text">
                    <?php the_field('gallery-section__text')?>
                </p>
                <?php 
                $images = get_field('gallery-section__swiper');
                if( $images ): ?>
                    <div class="swiper gallery-section__swiper">
                        <div class="swiper-wrapper">
                            <?php foreach( $images as $image ): ?>
                                <div class="swiper-slide">
                                    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endif; ?>
                <div class="gallery-section__pagination">
                    <button class="gallery-section__arrow-left-btn gallery-section__arrow-btn">
                        <svg class="gallery-section__arrow-left one-arrow" width="10.37" height="16.97">
                            <use
                                href="<?php echo get_template_directory_uri() ?>/assets/images/sprite.svg#icon-to-left">
                            </use>
                        </svg>
                    </button>
                    <button class="gallery-section__arrow-right-btn gallery-section__arrow-btn">
                        <svg class="gallery-section__arrow-right one-arrow" width="10.37" height="16.97">
                            <use
                                href="<?php echo get_template_directory_uri() ?>/assets/images/sprite.svg#icon-to-right">
                            </use>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </section>
    <!-- Benefits section -->
    <section class="benefits-section section" id="membership-benefits">
        <div class="container">
            <h2 class="benefits-section__heading section_heading club-membership-sections-heading">
                <svg class="heading-svg" width="29" height="28">
                    <use href="<?php echo get_template_directory_uri() ?>/assets/images/sprite.svg#icon-La_cat">
                    </use>
                </svg>
                <?php the_field('benefits-section__heading'); ?>
            </h2>
            <div class="benefits-section__wrapper">
                <div class="benefits">
                    <div class="benefits__card support">
                        <svg class="selina-rules-card__img selina-rules-card__img-1" width="60" height="60">
                            <use href="<?php echo get_template_directory_uri() ?>/assets/images/sprite.svg#red-smile">
                            </use>
                        </svg>
                        <h6 class="benefits__card-title">
                            <?php the_field('support__title'); ?>
                        </h6>
                        <p class="benefits__card-text">
                            <?php the_field('support__text'); ?>
                        </p>
                    </div>
                    <div class="benefits__card knowledge">
                        <svg class="selina-rules-card__img selina-rules-card__img-1" width="60" height="60">
                            <use href="<?php echo get_template_directory_uri() ?>/assets/images/sprite.svg#red-book">
                            </use>
                        </svg>
                        <h6 class="benefits__card-title">
                            <?php the_field('knowledge__title'); ?>
                        </h6>
                        <p class="benefits__card-text">
                            <?php the_field('knowledge__text'); ?>
                        </p>
                    </div>
                    <div class="benefits__card events">
                        <svg class="selina-rules-card__img selina-rules-card__img-1" width="60" height="60">
                            <use href="<?php echo get_template_directory_uri() ?>/assets/images/sprite.svg#red-awards">
                            </use>
                        </svg>
                        <h6 class="benefits__card-title">
                            <?php the_field('events__title'); ?>
                        </h6>
                        <p class="benefits__card-text">
                            <?php the_field('events__text'); ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Registration section -->
    <section class="registration-section section" id="membership-registration">
        <div class="container">
            <h2 class="registration-section__heading section_heading club-membership-sections-heading">
                <svg class="heading-svg" width="29" height="28">
                    <use href="<?php echo get_template_directory_uri() ?>/assets/images/sprite.svg#icon-La_cat">
                    </use>
                </svg>
                <?php the_field('registration-section__heading'); ?>
            </h2>
            <div class="registration-section__wrapper">
                <p class="registration-section__text black-text"><?php the_field('registration-section__ first-black-text'); ?></p>
                <p class="registration-section__text red-text"><?php the_field('registration-section__ red-text'); ?></p>
                <p class="registration-section__text black-text second-black-text"><?php the_field('registration-section__ second-black-text'); ?></p>
                <div class="registration-section__stages">
                    <div class="stages">
                        <div class="stages__card prepare">
                            <div class="stages__card-border">
                                <svg class="stages__card-img stages__card-card-img-1" width="17" height="28">
                                    <use href="<?php echo get_template_directory_uri() ?>/assets/images/sprite.svg#one">
                                    </use>
                                </svg>
                            </div>
                            <p class="stages__card-title">
                                <?php the_field('prepare__title'); ?>
                            </p>
                            <ul class="stages__card-text">
                                <?php the_field('prepare__text'); ?>
                            </ul>
                        </div>
                        <div class="stages__card familiarize">
                            <div class="stages__card-border">
                                <svg class="stages__card-img stages__card-card-img-1" width="19" height="28">
                                    <use href="<?php echo get_template_directory_uri() ?>/assets/images/sprite.svg#two">
                                    </use>
                                </svg>
                            </div>
                            <p class="stages__card-title">
                                <?php the_field('familiarize__title'); ?>
                            </p>
                            <ul class="stages__card-text">
                                <?php the_field('familiarize__text'); ?>
                            </ul>
                        </div>
                        <div class="stages__card fill-out">
                            <div class="stages__card-border">
                                <svg class="stages__card-img stages__card-card-img-1" width="19" height="28">
                                    <use href="<?php echo get_template_directory_uri() ?>/assets/images/sprite.svg#three">
                                    </use>
                                </svg>
                            </div>
                            <p class="stages__card-title">
                                <?php the_field('fill-out__title'); ?>
                            </p>
                            <ul class="stages__card-text">
                                <?php the_field('fill-out__text'); ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <button class="registration-section__button button red_medium_button">
                    <a href="<?php echo esc_attr( get_field('registration-section__link') ); ?>" target="_blank">
                        <?php the_field('registration-section__button'); ?>
                    </a>
                </button>
            </div>
        </div>
    </section>

    <?php get_template_part('template-parts/join-us'); ?>
</main>

<?php get_footer(); ?>