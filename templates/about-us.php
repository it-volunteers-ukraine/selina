<?php
/*
Template Name: about-us
*/
get_header();
?>
<main class="about-us">
    <section class="list-section section" id="about-list">
        <div class="list-section__background" style="background-image: url(<?php the_field('list-section__background', 'option') ?>);">
            <div class="container">

            </div>
        </div>
    </section>
    <section class="club-section section" id="about-club">
        <div class="container">
            <h2 class="club-section__heading section_heading">
                <svg class="heading-svg" width="29" height="28">
                    <use href="<?php echo get_template_directory_uri() ?>/assets/images/sprite.svg#icon-La_cat">
                    </use>
                </svg>
                <?php the_field('club-section__heading'); ?>
            </h2>
            <div class="club-section__wrapper">
                <div class="top">
                    <div class="club-img-1">
                        <?php 
                            $image = get_field('club-img-1');
                            if( !empty( $image ) ): ?>
                                <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>"/>
                        <?php endif; ?>
                    </div>
                    <div class="club-info-1 text">
                        <p><?php the_field('club-info-1'); ?></p>
                    </div>
                </div>
                <div class="bottom">
                    <div class="club-img-2">
                        <?php 
                            $image = get_field('club-img-2');
                            if( !empty( $image ) ): ?>
                                <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>"/>
                        <?php endif; ?>
                    </div>
                    <div class="club-info-2 text">
                        <p><?php the_field('club-info-2'); ?></p>
                        <div class="club-info-bold">
                            <p><b><?php the_field('club-info-bold-1'); ?></b></p>
                            <p><b><?php the_field('club-info-bold-2'); ?></b></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="map-section section" id="about-map"> 
        <style>
            @media screen and (min-width: 768px) {
                .map-section {
                background-image: url("<?php the_field('bg-img-ukraine-map') ?>"); 
                }
            }
        </style>   
        <div class="container">
            <h2 class="map-section__heading section_heading">
                <svg class="heading-svg" width="29" height="28">
                    <use href="<?php echo get_template_directory_uri() ?>/assets/images/sprite.svg#icon-La_cat">
                    </use>
                </svg>
                <?php the_field('map-section__heading'); ?>
            </h2>
            <div class="map-section__small-wrapper">
                <div class="map-section__description text">
                    <?php the_field('map-section__description'); ?>
                </div> 
                <button class="map-section__button button red_medium_button">
                    <a href="<?php echo esc_attr( get_field('map-section__link') ); ?>">
                        <?php the_field('map-section__btn'); ?>
                    </a> 
                    <svg class="map-section__button-svg" width="16" height="15">
                        <use href="<?php echo get_template_directory_uri() ?>/assets/images/sprite.svg#icon-google"></use>
                    </svg>
                </button>
            </div>
            <div class="map-section__big-wrapper">
                <div class="map-img">
                    <img src="<?php the_field('map-img') ?>" />
                    <div class="map-img-capture">
                        <img src="<?php the_field('map-img-capture') ?>" />
                    </div>
                </div> 
            </div>
        </div>
    </section>
    <section class="management-section section" id="about-management">
        <div class="container">

        </div>
    </section>
    <section class="documents-section section" id="about-documents">
        <div class="container">

        </div>
    </section>
    <section class="feedback-section section" id="about-feedback">
        <div class="container">

        </div>
    </section>
</main>

<?php get_footer(); ?>