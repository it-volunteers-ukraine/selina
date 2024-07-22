<?php
/*
Template Name: about-us
*/
get_header();
?>
<main class="about-us">
    <section class="upper-section section" id="about-upper">
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
                    <?php the_field('about-us__heading'); ?>
                </h2>
                <div class="upper-section__sub-titles">
                    <a class="sub-title" href="#about-club">
                        <svg class="sub-title-svg" width="18" height="17">
                            <use href="<?php echo get_template_directory_uri() ?>/assets/images/sprite.svg#icon-paw">
                            </use>
                        </svg>
                        <?php the_field('club-section__heading'); ?>
                    </a>
                    <a class="sub-title" href="#about-map">
                        <svg class="sub-title-svg" width="18" height="17">
                            <use href="<?php echo get_template_directory_uri() ?>/assets/images/sprite.svg#icon-paw">
                            </use>
                        </svg>
                        <?php the_field('map-section__heading'); ?>
                    </a>
                    <a class="sub-title" href="#about-management">
                        <svg class="sub-title-svg" width="18" height="17">
                            <use href="<?php echo get_template_directory_uri() ?>/assets/images/sprite.svg#icon-paw">
                            </use>
                        </svg>
                        <?php the_field('management-section__heading'); ?>
                    </a>
                    <a class="sub-title" href="#about-documents">
                        <svg class="sub-title-svg" width="18" height="17">
                            <use href="<?php echo get_template_directory_uri() ?>/assets/images/sprite.svg#icon-paw">
                            </use>
                        </svg>
                        <?php the_field('documents-section__heading'); ?>
                    </a>
                    <a class="sub-title" href="#feedbacks">
                        <svg class="sub-title-svg" width="18" height="17">
                            <use href="<?php echo get_template_directory_uri() ?>/assets/images/sprite.svg#icon-paw">
                            </use>
                        </svg>
                        <?php the_field('feedbacks_title', 'option'); ?>
                    </a>  
                </div> 
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
                    <a href="<?php echo esc_attr( get_field('map-section__link') ); ?>" target="_blank">
                        <?php the_field('open-btn', 'option'); ?>
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
            <h2 class="management-section__heading section_heading">
                <svg class="heading-svg" width="29" height="28">
                    <use href="<?php echo get_template_directory_uri() ?>/assets/images/sprite.svg#icon-La_cat">
                    </use>
                </svg>
                <?php the_field('management-section__heading'); ?>
            </h2>
            <div class="management-section__wrapper">
                <?php
                    if( have_rows('managers') ):
                        while( have_rows('managers') ) : the_row();
                            $managerImg = get_sub_field('manager-img');
                            $managerName = get_sub_field('manager-name');
                            $managerPosition = get_sub_field('manager-position');
                            ?>
                                <div class="manager">
                                    <div class="manager__img">
                                        <img src="<?php echo  $managerImg['url']; ?>" alt="<?php echo  $managerImg['alt']; ?>">
                                    </div>
                                    <div class="manager__name"><?php echo $managerName; ?></div>
                                    <div class="manager__position"><?php echo $managerPosition; ?></div>
                                </div>
                            <?php 
                        endwhile;
                    endif;
                ?>
            </div>
        </div>
    </section>
    <section class="documents-section section" id="about-documents">
        <div class="container">
            <h2 class="documents-section__heading section_heading">
                <svg class="heading-svg" width="29" height="28">
                    <use href="<?php echo get_template_directory_uri() ?>/assets/images/sprite.svg#icon-La_cat">
                    </use>
                </svg>
                <?php the_field('documents-section__heading'); ?>
            </h2>
            <div class="documents-section__wrapper">
                <?php
                    if( have_rows('document-cards') ):
                        while( have_rows('document-cards') ) : the_row();
                            $documentTitle = get_sub_field('document__title');
                            $documentLink = get_sub_field('document__link');
                            ?>
                                <div class="document">
                                    <div class="document-card">
                                        <svg class="clip-svg" width="38" height="90">
                                            <use href="<?php echo get_template_directory_uri() ?>/assets/images/sprite.svg#icon-clip"></use>
                                        </svg>
                                        <div class="document-card__content">
                                            <div class="document-card__title"><?php echo $documentTitle; ?></div>
                                            <button class="document-card__button button red_medium_button">
                                                <a href="<?php echo $documentLink; ?>" target="_blank">
                                                    <?php the_field('open-btn', 'option'); ?>
                                                </a> 
                                                <svg class="document-card__button-svg" width="16" height="15">
                                                    <use href="<?php echo get_template_directory_uri() ?>/assets/images/sprite.svg#icon-google"></use>
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            <?php 
                        endwhile;
                    endif;
                ?>
            </div>
        </div>
    </section>
    <?php get_template_part('template-parts/feedbacks'); ?>
    <?php get_template_part('template-parts/join-us'); ?>
</main>

<?php get_footer(); ?>