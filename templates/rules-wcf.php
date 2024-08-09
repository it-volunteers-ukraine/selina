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
            .rules-responsibility::before {
                background-image: url("<?php the_field('white-cat-bg') ?>"); 
            }
        </style> 
        <div class="container">
            <div class="rules-responsibility__title">
                <?php the_field('rules-responsibility__title'); ?>
            </div> 
            <div class="rules-responsibility__wrapper">
                <div class="responsibility-card responsibility-card-1">
                    <svg class="responsibility-card__img responsibility-card__img-1" width="49" height="53">
                        <use href="<?php echo get_template_directory_uri() ?>/assets/images/sprite.svg#wcf-smile">
                        </use>
                    </svg>
                    <p class="responsibility-card__content responsibility-card__content-1">
                        <?php the_field('responsibility-card__content-1'); ?>
                    </p>
                </div>
                <div class="responsibility-card responsibility-card-2">
                    <svg class="responsibility-card__img responsibility-card__img-2" width="43" height="53">
                        <use href="<?php echo get_template_directory_uri() ?>/assets/images/sprite.svg#wcf-award-dark">
                        </use>
                    </svg>
                    <p class="responsibility-card__content responsibility-card__content-2">
                        <?php the_field('responsibility-card__content-2'); ?>
                    </p>
                </div>
                <div class="responsibility-card responsibility-card-3">
                    <svg class="responsibility-card__img responsibility-card__img-3" width="49" height="53">
                        <use href="<?php echo get_template_directory_uri() ?>/assets/images/sprite.svg#wcf-smile">
                        </use>
                    </svg>
                    <p class="responsibility-card__content responsibility-card__content-3">
                        <?php the_field('responsibility-card__content-3'); ?>
                    </p>
                </div>
                <div class="responsibility-card responsibility-card-4">
                    <svg class="responsibility-card__img responsibility-card__img-4" width="55" height="53">
                        <use href="<?php echo get_template_directory_uri() ?>/assets/images/sprite.svg#wcf-mortarboard">
                        </use>
                    </svg>
                    <p class="responsibility-card__content responsibility-card__content-4">
                        <?php the_field('responsibility-card__content-4'); ?>
                    </p>
                </div>
                <div class="responsibility-card responsibility-card-5">
                    <svg class="responsibility-card__img responsibility-card__img-5" width="45" height="53" >
                        <use href="<?php echo get_template_directory_uri() ?>/assets/images/sprite.svg#wcf-award-light">
                        </use>
                    </svg>
                    <p class="responsibility-card__content responsibility-card__content-5">
                        <?php the_field('responsibility-card__content-5'); ?>
                    </p>
                </div> 
            </div>
        </div>
    </section>
            
    <!-- Breeds standards section ----------------------------------->
    <section class="breeds-section section" id="wcf-breeds">
        <div class="container">
            <h2 class="breeds-section__heading section_heading">
                <svg class="heading-svg" width="29" height="28">
                    <use href="<?php echo get_template_directory_uri() ?>/assets/images/sprite.svg#icon-La_cat">
                    </use>
                </svg>
                <?php the_field('breeds-section__heading'); ?>
            </h2>
            <div class="breeds-section__wrapper">
                <div class="breeds-section__img">
                    <img src="<?php the_field('breeds-section-img'); ?>" />
                </div>
                <div class="breeds-section__infobox">
                    <div class="infobox__breed-standards">
                        <?php the_field('infobox__breed-standards'); ?>
                    </div>
                    <button class="breeds-section__button button red_medium_button open-btn">
                        <a href="<?php echo esc_attr( get_field('breeds-section__link') ); ?>" target="_blank">
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

    <!-- Title system section --------------------------------------->
    <section class="title_system-section section" id="wcf-title_system">
        <div class="container">
            <h2 class="title_system-section__heading section_heading">
                <svg class="heading-svg" width="29" height="28">
                    <use href="<?php echo get_template_directory_uri() ?>/assets/images/sprite.svg#icon-La_cat">
                    </use>
                </svg>
                <?php the_field('title_system-section__heading'); ?>
            </h2>
            <div class="title_system-section__small-wrapper">
                <div class="title_system-section__description text">
                    <?php the_field('title_system-section__description'); ?>
                </div> 
                <button class="title_system-section__button button red_medium_button">
                    <a href="<?php echo esc_attr( get_field('title_system-section__link') ); ?>" target="_blank">
                        <?php the_field('open-btn', 'option'); ?>
                    </a> 
                    <svg class="map-section__button-svg" width="16" height="15">
                        <use href="<?php echo get_template_directory_uri() ?>/assets/images/sprite.svg#icon-google"></use>
                    </svg>
                </button>
            </div>
            <div class="title_system-section__big-wrapper">
                <article class="adult-cats">
                    <div class="adult-cats__title-wrapper">
                        <p class="adult-cats__info-above-card adult-cats__info-above-card-violet">
                            <?php the_field('adult-cats__info-above-violet-card'); ?>
                        </p>
                        <h3 class="adult-cats__title">
                            <?php the_field('adult-cats__title'); ?>
                        </h3>
                        <p class="adult-cats__info-above-card">
                            <?php the_field('adult-cats__info-above-purple-card'); ?>
                        </p>
                    </div>
                    <div class="adult-cats__triangles">
                        <svg class="triangle-down-svg" width="45" height="24">
                            <use href="<?php echo get_template_directory_uri() ?>/assets/images/sprite.svg#triangle-down">
                            </use>
                        </svg>
                        <svg class="triangle-up-svg" width="45" height="24">
                            <use href="<?php echo get_template_directory_uri() ?>/assets/images/sprite.svg#triangle-up">
                            </use>
                        </svg>
                    </div>
                    <div class="adult-cats__cards">
                        <div class="adult-cats__first-card adult-cats__card">
                            <div class="adult-cats__violet-card adult-cats__colored-card">
                                <img src="<?php the_field('adult-cats__violet-card') ?>" />
                            </div>
                            <p class="adult-cats__info-below-card"><?php the_field('adult-cats__info-below-violet-card'); ?></p>
                        </div>
                        <div class="adult-cats__other-cards-wrapper">
                            <div class="other-cards">
                                <?php
                                    if( have_rows('adult-cats') ):
                                        while( have_rows('adult-cats') ) : the_row();
                                            $adultCatsCard = get_sub_field('adult-cats__card');
                                            $adultCatsInfo = get_sub_field('adult-cats__info-below-card');
                                            ?>
                                                <div class="adult-cats__card">
                                                    <div class="adult-cats__colored-card">
                                                        <img src="<?php echo $adultCatsCard; ?>" />
                                                    </div>
                                                    <p class="adult-cats__info-below-card"><?php echo $adultCatsInfo; ?></p>
                                                </div>
                                            <?php 
                                        endwhile;
                                    endif;
                                ?>
                            </div>
                            <div class="other-cards-info">
                                <svg class="other-cards-info-svg" width="58" height="10">
                                    <use href="<?php echo get_template_directory_uri() ?>/assets/images/sprite.svg#long-arrow-left">
                                    </use>
                                </svg>
                                <?php the_field('other-cards-info'); ?>
                                <svg class="other-cards-info-svg" width="58" height="10">
                                    <use href="<?php echo get_template_directory_uri() ?>/assets/images/sprite.svg#long-arrow-right">
                                    </use>
                                </svg>
                            </div> 
                        </div>
                    </div>
                </article>
                <article class="adult-neutercats">
                    <div class="adult-cats__title-wrapper">
                        <p class="adult-cats__info-above-card adult-cats__info-above-card-violet">
                            <?php the_field('adult-cats__info-above-violet-card'); ?>
                        </p>
                        <h3 class="adult-cats__title">
                            <?php the_field('adult-neutercats__title'); ?>
                        </h3>
                        <p class="adult-cats__info-above-card">
                            <?php the_field('adult-cats__info-above-purple-card'); ?>
                        </p>
                    </div>
                    <div class="adult-neutercats__triangles">
                        <svg class="triangle-down-svg" width="45" height="24">
                            <use href="<?php echo get_template_directory_uri() ?>/assets/images/sprite.svg#triangle-down">
                            </use>
                        </svg>
                        <svg class="triangle-up-svg" width="45" height="24">
                            <use href="<?php echo get_template_directory_uri() ?>/assets/images/sprite.svg#triangle-up">
                            </use>
                        </svg>
                    </div>
                    <div class="adult-cats__cards">
                        <div class="adult-cats__first-card adult-cats__card">
                            <div class="adult-cats__violet-card adult-cats__colored-card">
                                <img src="<?php the_field('adult-neutercats__violet-card') ?>" />
                            </div>
                            <p class="adult-cats__info-below-card"><?php the_field('adult-neutercats__info-below-violet-card'); ?></p>
                        </div>
                        <div class="adult-cats__other-cards-wrapper">
                            <div class="other-cards">
                                <?php
                                    if( have_rows('adult-neutercats') ):
                                        while( have_rows('adult-neutercats') ) : the_row();
                                            $adultNeutercatsCard = get_sub_field('adult-neutercats__card');
                                            $adultNeutercatsInfo = get_sub_field('adult-neutercats__info-below-card');
                                            ?>
                                                <div class="adult-cats__card">
                                                    <div class="adult-cats__colored-card">
                                                        <img src="<?php echo $adultNeutercatsCard; ?>" />
                                                    </div>
                                                    <p class="adult-cats__info-below-card"><?php echo $adultNeutercatsInfo; ?></p>
                                                </div>
                                            <?php 
                                        endwhile;
                                    endif;
                                ?>
                            </div>
                            <div class="other-cards-info">
                                <svg class="other-cards-info-svg" width="58" height="11">
                                    <use href="<?php echo get_template_directory_uri() ?>/assets/images/sprite.svg#long-arrow-left">
                                    </use>
                                </svg>
                                <?php the_field('other-cards-info'); ?>
                                <svg class="other-cards-info-svg" width="58" height="11">
                                    <use href="<?php echo get_template_directory_uri() ?>/assets/images/sprite.svg#long-arrow-right">
                                    </use>
                                </svg>
                            </div> 
                        </div>
                    </div>
                </article>
                <article class="kittens-and-juniors">
                    <h3 class="adult-cats__title">
                        <?php the_field('kittens-and-juniors__title'); ?>
                    </h3>
                    <div class="kittens-and-juniors__cards-wrapper">
                        <div class="kittens-and-juniors__green">
                            <p class="kittens-and-juniors__info-above-card">
                                <?php the_field('kittens-and-juniors__info-above-green-card'); ?>
                            </p>
                            <div class="kittens-and-juniors__green-card kittens-and-juniors__colored-card adult-cats__colored-card">
                                <img src="<?php the_field('kittens-and-juniors__green-card') ?>" />
                            </div>
                        </div>
                        <svg class="triangle-right-svg" width="24" height="45">
                            <use href="<?php echo get_template_directory_uri() ?>/assets/images/sprite.svg#triangle-right">
                            </use>
                        </svg>
                        <div class="kittens-and-juniors__orange">
                            <p class="kittens-and-juniors__info-above-card">
                                <?php the_field('kittens-and-juniors__info-above-orange-card'); ?>
                            </p>
                            <div class="kittens-and-juniors__orange-card kittens-and-juniors__colored-card adult-cats__colored-card">
                                <img src="<?php the_field('kittens-and-juniors__orange-card') ?>" />
                            </div>
                        </div>
                    </div>
                </article>
                <article class="kittens-and-juniors-neuters kittens-and-juniors">
                    <h3 class="adult-cats__title">
                        <?php the_field('kittens-and-juniors-neuters__title'); ?>
                    </h3>
                    <div class="kittens-and-juniors__cards-wrapper">
                        <div class="kittens-and-juniors__green">
                            <p class="kittens-and-juniors__info-above-card">
                                <?php the_field('kittens-and-juniors-neuters__info-above-green-card'); ?>
                            </p>
                            <div class="kittens-and-juniors__green-card kittens-and-juniors__colored-card adult-cats__colored-card">
                                <img src="<?php the_field('kittens-and-juniors-neuters__green-card') ?>" />
                            </div>
                        </div>
                        <svg class="triangle-right-svg" width="24" height="45">
                            <use href="<?php echo get_template_directory_uri() ?>/assets/images/sprite.svg#triangle-right">
                            </use>
                        </svg>
                        <div class="kittens-and-juniors__orange">
                            <p class="kittens-and-juniors__info-above-card">
                                <?php the_field('kittens-and-juniors-neuters__info-above-orange-card'); ?>
                            </p>
                            <div class="kittens-and-juniors__orange-card kittens-and-juniors__colored-card adult-cats__colored-card">
                                <img src="<?php the_field('kittens-and-juniors-neuters__orange-card') ?>" />
                            </div>
                        </div>
                    </div>
                </article>
            </div>
        </div>
    </section>

    <!-- WCF EMS CODE section --------------------------------------->
    <section class="wcf-ems-code-section section" id="wcf-ems-code">
        <div class="container">
            <h2 class="wcf-ems-code-section__heading section_heading">
                <svg class="heading-svg" width="29" height="28">
                    <use href="<?php echo get_template_directory_uri() ?>/assets/images/sprite.svg#icon-La_cat">
                    </use>
                </svg>
                <?php the_field('wcf-ems-code__heading'); ?>
            </h2>
            <div class="wcf-ems-code-section__wrapper">
                <div class="wcf-ems-code-section__item wcf-ems-code-section__img">
                    <img src="<?php the_field('wcf-ems-code-section-img'); ?>" />
                </div>
                <div class="wcf-ems-code-section__item wcf-ems-code-section__infobox">
                    <div class="wcf-ems-code-infobox__large-screen">
                        <?php the_field('wcf-ems-code-large-screen'); ?>
                    </div>
                    <div class="wcf-ems-code-infobox__small-screen">
                        <?php the_field('wcf-ems-code-small-screen'); ?>
                    </div>
                    <button class="wcf-ems-code-section__button button red_medium_button open-btn">
                        <a href="<?php echo esc_attr( get_field('wcf-ems-code-section__link') ); ?>" target="_blank">
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

    <?php get_template_part('template-parts/join-us'); ?>
</main>

<?php get_footer(); ?>