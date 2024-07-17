<?php
/*
Template Name: rules-wcf
*/
get_header();
?>
<main class="wcf">
    <section class="upper-section section" id="wcf-upper">
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
                    <?php the_field('wcf__heading'); ?>
                </h2>
                <div class="upper-section__sub-titles">
                    <a class="sub-title about_wcf__sub-title" href="#wcf-about">
                        <svg class="sub-title-svg" width="18" height="17">
                            <use href="<?php echo get_template_directory_uri() ?>/assets/images/sprite.svg#icon-paw">
                            </use>
                        </svg>
                        <?php the_field('about_wcf-section__heading'); ?>
                    </a>
                    <a class="sub-title rules__sub-title" href="#wcf-rules">
                        <svg class="sub-title-svg" width="18" height="17">
                            <use href="<?php echo get_template_directory_uri() ?>/assets/images/sprite.svg#icon-paw">
                            </use>
                        </svg>
                        <?php the_field('rules-section__heading'); ?>
                    </a>
                    <a class="sub-title breeds__sub-title" href="#wcf-breeds">
                        <svg class="sub-title-svg" width="18" height="17">
                            <use href="<?php echo get_template_directory_uri() ?>/assets/images/sprite.svg#icon-paw">
                            </use>
                        </svg>
                        <?php the_field('breeds-section__heading'); ?>
                    </a>
                    <a class="sub-title title_system__sub-title" href="#wcf-title_system">
                        <svg class="sub-title-svg" width="18" height="17">
                            <use href="<?php echo get_template_directory_uri() ?>/assets/images/sprite.svg#icon-paw">
                            </use>
                        </svg>
                        <?php the_field('title_system-section__heading'); ?>
                    </a>
                    <a class="sub-title wcf-ems-code__sub-title" href="#wcf-ems-code">
                        <svg class="sub-title-svg" width="18" height="17">
                            <use href="<?php echo get_template_directory_uri() ?>/assets/images/sprite.svg#icon-paw">
                            </use>
                        </svg>
                        <?php the_field('wcf-ems-code__heading'); ?>
                    </a>  
                </div> 
            </div>
        </div>    
    </section>

    <!-- About WCF section ------------------------------------------>
    <section class="about_wcf-section section" id="wcf-about">
        <div class="container">
            <div class="about_wcf-section__wrapper">
                <h2 class="about_wcf-section__heading section_heading rules-wcf-sections-heading">
                    <svg class="heading-svg" width="29" height="28">
                        <use href="<?php echo get_template_directory_uri() ?>/assets/images/sprite.svg#icon-La_cat">
                        </use>
                    </svg>
                    <?php the_field('about_wcf-section__heading'); ?>
                </h2>
                <div class="about_wcf-section__content">
                    <div class="about_wcf-section__upper-card">
                        <img src="<?php the_field('wcf-img'); ?>" />
                    </div>
                    <div class="about_wcf-section__lower-card">
                        <ul class="about_wcf-section__lower-card-list">
                            <li class="rule-1">
                                <a href="<?php echo esc_attr( get_field('about_wcf-section__link') ); ?>" target="_blank" class="wcf_word"><?php the_field('wcf_word'); ?></a><?php the_field('rule-1');?>
                            </li>
                            <li class="rule-2"><?php the_field('rule-2');?></li>
                            <li class="rule-3"><?php the_field('rule-3');?></li>
                            <li class="rule-4"><?php the_field('rule-4');?></li>
                            <li class="rule-5 optional"><?php the_field('rule-5');?></li>
                            <li class="rule-6 optional"><?php the_field('rule-6');?></li>
                        </ul>
                    </div>
                </div>
                <button class="about_wcf-section__button button red_medium_button">
                    <a href="<?php echo esc_attr( get_field('about_wcf-section__link') ); ?>" target="_blank">
                        <?php the_field('about_wcf-section__btn'); ?>
                    </a> 
                    <svg class="about_wcf-section__button-svg" width="20" height="20">
                        <use href="<?php echo get_template_directory_uri() ?>/assets/images/sprite.svg#arrow-up-right"></use>
                    </svg>
                </button>
            </div>
        </div>
    </section>

    <!-- WCF system rules section ----------------------------------->
    <section class="rules-section section" id="wcf-rules">
        <div class="container">
            <h2 class="rules-section__heading section_heading rules-wcf-sections-heading">
                <svg class="heading-svg" width="29" height="28">
                    <use href="<?php echo get_template_directory_uri() ?>/assets/images/sprite.svg#icon-La_cat">
                    </use>
                </svg>
                <?php the_field('rules-section__heading'); ?>
            </h2>
            <div class="rules-section__wrapper">
                <div class="rules-section__img">
                    <img src="<?php the_field('wcf-img'); ?>" />
                </div>
                <div class="rules-section__infobox">
                    <div class="infobox__large-screen">
                        <?php the_field('wcf-text-large-screen'); ?>
                    </div>
                    <div class="infobox__small-screen">
                        <?php the_field('wcf-text-small-screen'); ?>
                    </div>
                    <button class="rules-section__button button red_medium_button open-btn">
                        <a href="<?php echo esc_attr( get_field('rules-section__link') ); ?>" target="_blank">
                            <?php the_field('open-btn', 'option'); ?>
                        </a> 
                        <svg class="rules-section__button-svg" width="16" height="14">
                            <use href="<?php echo get_template_directory_uri() ?>/assets/images/sprite.svg#icon-google"></use>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </section>
    <section class="rules-responsibility">
        <style>
            .rules-responsibility {
                background-image: url("<?php the_field('white-cat-bg') ?>"); 
                /* background-position: -220px -365px; */
            }
        </style> 
        <div class="container">
            <div class="rules-responsibility__title">
                <?php the_field('rules-responsibility__title'); ?>
            </div> 
            <div class="rules-responsibility__container">
                <div class="rules-responsibility__wrapper">
                    <div class="responsibility-card responsibility-card-1">
                        <svg class="responsibility-card__img responsibility-card__img-1" width="48" height="48">
                            <use href="<?php echo get_template_directory_uri() ?>/assets/images/sprite.svg#wcf-smile">
                            </use>
                        </svg>
                        <p class="responsibility-card__content responsibility-card__content-1">
                            <?php the_field('responsibility-card__content-1'); ?>
                        </p>
                    </div>
                    <div class="responsibility-card responsibility-card-2">
                        <svg class="responsibility-card__img responsibility-card__img-2" width="60" height="60">
                            <use href="<?php echo get_template_directory_uri() ?>/assets/images/sprite.svg#wcf-award-dark">
                            </use>
                        </svg>
                        <p class="responsibility-card__content responsibility-card__content-2">
                            <?php the_field('responsibility-card__content-2'); ?>
                        </p>
                    </div>
                    <div class="responsibility-card responsibility-card-3">
                        <svg class="responsibility-card__img responsibility-card__img-3" width="48" height="48">
                            <use href="<?php echo get_template_directory_uri() ?>/assets/images/sprite.svg#wcf-smile">
                            </use>
                        </svg>
                        <p class="responsibility-card__content responsibility-card__content-3">
                            <?php the_field('responsibility-card__content-3'); ?>
                        </p>
                    </div>
                    <div class="responsibility-card responsibility-card-4">
                        <svg class="responsibility-card__img responsibility-card__img-4" width="54" height="54">
                            <use href="<?php echo get_template_directory_uri() ?>/assets/images/sprite.svg#wcf-mortarboard">
                            </use>
                        </svg>
                        <p class="responsibility-card__content responsibility-card__content-4">
                            <?php the_field('responsibility-card__content-4'); ?>
                        </p>
                    </div>
                    <div class="responsibility-card responsibility-card-5">
                        <svg class="responsibility-card__img responsibility-card__img-5" width="48" height="48">
                            <use href="<?php echo get_template_directory_uri() ?>/assets/images/sprite.svg#wcf-award-light">
                            </use>
                        </svg>
                        <p class="responsibility-card__content responsibility-card__content-5">
                            <?php the_field('responsibility-card__content-5'); ?>
                        </p>
                    </div> 
                </div>
            </div>
        </div>
    </section>
            
        
    
    <section class="breeds-section section" id="wcf-breeds">
        <div class="container">
            <h2 class="breeds-section__heading section_heading">
                <svg class="heading-svg" width="29" height="28">
                    <use href="<?php echo get_template_directory_uri() ?>/assets/images/sprite.svg#icon-La_cat">
                    </use>
                </svg>
                <?php the_field('breeds-section__heading'); ?>
            </h2>
            <div class="breeds-section__wrapper"></div>
        </div>
    </section>
    <section class="title_system-section section" id="wcf-title_system">
        <div class="container">
            <h2 class="title_system-section__heading section_heading">
                <svg class="heading-svg" width="29" height="28">
                    <use href="<?php echo get_template_directory_uri() ?>/assets/images/sprite.svg#icon-La_cat">
                    </use>
                </svg>
                <?php the_field('title_system-section__heading'); ?>
            </h2>
            <div class="title_system-section__wrapper"></div>
        </div>
    </section>
    <section class="wcf-ems-code-section section" id="wcf-ems-code">
        <div class="container">
            <h2 class="wcf-ems-code__heading section_heading">
                <svg class="heading-svg" width="29" height="28">
                    <use href="<?php echo get_template_directory_uri() ?>/assets/images/sprite.svg#icon-La_cat">
                    </use>
                </svg>
                <?php the_field('wcf-ems-code__heading'); ?>
            </h2>
            <div class="wcf-ems-code__wrapper"></div>
        </div>
    </section>
</main>

<?php get_footer(); ?>