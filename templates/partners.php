<?php
/*
Template Name: Partners
*/
get_header();

?>

    <main>
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
                <div class="friends-clubs">

                    <?php

                    $myposts = get_posts(array(
                        'numberposts' => -1,
                        'order' => 'asc',
                    ));


                    foreach ($myposts as $post) {
                        setup_postdata($post);
                        ?>

                        <div class="friends-clubs-item">
                            <img class="image" src="<?php the_field('image'); ?>" alt="">
                            <h2 class="title"><?php the_title(); ?></h2>
                        </div>


                        <?php
                    }
                    wp_reset_postdata();
                    ?>


                </div>
                <button class="button green_medium_button show-btn">
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