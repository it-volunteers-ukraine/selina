<?php
/*
Template Name: Partners
*/
get_header();

?>

<?php
global $wp_query;
$max = $wp_query->max_num_pages;
?>

    <main class="flip-animations">
        <section class="partners">
            <div class="image">
                <img src="<?php the_field('image-cat'); ?>" alt="cat">
            </div>
            <div class="container tablet-container">
                <div class="banner">
                    <h2 class="section_heading partners-title"><?php the_title() ?></h2>
                    <div>
                        <div class="sub-titles">
                            <a class="sub-title" href="#partners">
                                <svg width="18" height="17">
                                    <use href="<?php echo get_template_directory_uri() ?>/assets/images/sprite.svg#icon-paw">
                                    </use>
                                </svg>
                                <?php the_field('first-sub_head'); ?>
                            </a>

                            <a class="sub-title" href="#our-friends">
                                <svg width="18" height="17">
                                    <use href="<?php echo get_template_directory_uri() ?>/assets/images/sprite.svg#icon-paw">
                                    </use>
                                </svg>
                                <?php the_field('second-sub_head'); ?>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </section>

        <section id="partners" class="section our-partners">
            <div class="container">
                <div class="title-wrapper">
                    <h3 class="section_heading">
                        <svg class="icon" width="41" height="37">
                            <use href="<?php echo get_template_directory_uri() ?>/assets/images/sprite.svg#icon-La_cat">
                            </use>
                        </svg>
                        <?php the_field('our-partners_title'); ?>
                    </h3>
                </div>
                <div class="our-partners-container">
                    <?php

                    $args = array(
//                        'post_type' => 'partners',
                        'category_name' => 'Partners',
                        'post_per_page' => 8,
                    );


                    $loop = new WP_Query($args);

                    while ($loop->have_posts()) : $loop->the_post();
                        ?>

                        <div class="our-partners-item">
                            <div class="flip-card" id="flip-card-partners">
                                <div class="flip-card-inner">
                                    <div class="flip-card-front">
                                        <?php
                                        $image = get_field('partner_img');
                                        $alt_image = get_field('partner_name');

                                        if (!empty($alt_image)) {
                                            $trimmed_partner_name = mb_substr($alt_image, 0, 67);
                                        }
                                        ?>
                                        <img src="<?php echo the_field('partner_img') ?>"
                                             alt="<?php echo esc_attr($trimmed_partner_name); ?>">
                                    </div>
                                    <div class="flip-card-back">
                                        <a class="link" href="<?php echo esc_attr(the_field('partner_link')); ?>"
                                           rel="noopener noreferrer">
                                            <?php the_field('link-text'); ?>
                                            <svg width="12" height="12">
                                                <use href="<?php echo get_template_directory_uri() ?>/assets/images/sprite.svg#icon-arrow">
                                                </use>
                                            </svg>
                                        </a>
                                        <svg class="icon-paw" width="42" height="38">
                                            <use href="<?php echo get_template_directory_uri() ?>/assets/images/sprite.svg#icon-paw">
                                            </use>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php
                    endwhile;
                    wp_reset_postdata();
                    ?>
                </div>
            </div>

        </section>

        <section id="our-friends" class="section laboklin">
            <div class="container">
                <div class="title-wrapper">
                    <h3 class="section_heading">
                        <svg class="icon" width="41" height="37">
                            <use href="<?php echo get_template_directory_uri() ?>/assets/images/sprite.svg#icon-La_cat">
                            </use>
                        </svg>
                        <?php the_field('title'); ?>
                    </h3>
                </div>
                <div class="flex">
                    <div class="image">
                        <img class="img rounded-image" src="<?php the_field('friends-image'); ?>" alt="cat">
                    </div>
                    <div class="info">
                        <p class="description"><?php the_field('description'); ?></p>
                        <div class="links">
                            <a href="" rel="noopener noreferrer">
                                <?php echo esc_html(the_field('prices-link')); ?>
                            </a>
                            <a href="" rel="noopener noreferrer">
                                <?php echo esc_html(the_field('blank-link')); ?>
                            </a>
                        </div>


                        <a class="button red_medium_button laboklin-btn"
                           href="<?php echo esc_attr(the_field('laboklin-link')); ?>">
                            <?php the_field('laboklin-text'); ?>
                            <svg class="arrow" width="18" height="17" viewBox="0 0 18 17" fill="none"
                                 xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <defs/>
                                <path id="Vector" d="M1.25 10.67L10.68 1.25M3.6 1.25L10.68 1.25L10.68 8.32"
                                      stroke="#FFFFFF" stroke-opacity="1.000000" stroke-width="2.500000"
                                      stroke-linejoin="round"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <section class="section our-friends-clubs">
            <div class="container">
                <div class="title-wrapper">
                    <h2 class="section_heading">
                        <svg class="icon" width="41" height="37">
                            <use href="<?php echo get_template_directory_uri() ?>/assets/images/sprite.svg#icon-La_cat">
                            </use>
                        </svg>
                        <?php the_field('friends-title'); ?>
                    </h2>
                </div>

                <div id="ajax-posts" class="friends-clubs">
                    <?php
                    $args = array(
                        'category_name' => 'Test',
                        'order' => 'ASC',
                        'posts_per_page' => 8,
                    );

                    $loop = new WP_Query($args);

                    while ($loop->have_posts()) : $loop->the_post();
                        ?>

                        <div class="friends-clubs-item">
                            <div class="flip-card friends-flip-card">
                                <div class="flip-card-inner">
                                    <div class="flip-card-front flip-card-frame">
                                        <img class="image" src="<?php the_field('image'); ?>" alt="">
                                        <h2 class="title"><?php the_title(); ?></h2>
                                    </div>
                                    <div class="flip-card-back">
                                        <div>Test</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php
                    endwhile;
                    wp_reset_postdata();
                    ?>
                </div>

                <button id="load-more-friends" class="button green_medium_button show-btn">
                    <?php the_field('show-btn'); ?>
                    <svg width="18" height="17">
                        <use href="<?php echo get_template_directory_uri() ?>/assets/images/sprite.svg#icon-paw">
                        </use>
                    </svg>
                </button>
            </div>
        </section>


        <section class="section our-friends-photographs">
            <div class="container">
                <div class="title-wrapper">
                    <h3 class="section_heading title">
                        <?php the_field('photographs-title') ?>
                    </h3>
                </div>

                <div class="photographs">
                    <?php
                    $args = array(
                        'category_name' => 'Photographs',
                        'order' => 'ASC',
                        'posts_per_page' => 4,
                    );

                    $loop = new WP_Query($args);

                    while ($loop->have_posts()) : $loop->the_post()
                        ?>

                        <div class="photographs-item">
                            <div class="photographs-image">
                                <img src=<?php the_field('photo') ?> alt="">
                            </div>
                            <div class="full-name">
                            <span class="surname">
                                <?php the_field('surname') ?>
                            </span>
                                <span class="name">
                                 <?php the_field('name') ?>
                            </span>
                            </div>
                        </div>
                    <?php
                    endwhile;
                    wp_reset_postdata();
                    ?>
                </div>
                <button class="button green_medium_button show-btn load-more-photographs">
                    <?php the_field('show-btn'); ?>
                    <svg width="18" height="17">
                        <use href="<?php echo get_template_directory_uri() ?>/assets/images/sprite.svg#icon-paw">
                        </use>
                    </svg>
                </button>
            </div>
        </section>
    </main>

<?php get_footer(); ?>