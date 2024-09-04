<?php
/*
Template Name: Partners
*/
get_header();

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
                                <svg class="icon-paw" width="18" height="16">
                                    <use href="<?php echo get_template_directory_uri() ?>/assets/images/sprite.svg#icon-paw">
                                    </use>
                                </svg>
                                <?php the_field('first-sub_head'); ?>
                            </a>

                            <a class="sub-title" href="#our-friends">
                                <svg class="icon-paw" width="18" height="16">
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
                    <div class="pagination-block">
                        <h3 class="section_heading mobile-title">
                            <svg class="icon" width="41" height="37">
                                <use href="<?php echo get_template_directory_uri() ?>/assets/images/sprite.svg#icon-La_cat">
                                </use>
                            </svg>
                            <?php the_field('our-partners_title'); ?>
                        </h3>
                        <div class="partners-pagination">
                            <button onclick="paginatePrev()"
                                    class="partners-btn">
                                <svg width="10.37" height="16.97">
                                    <use href="<?php echo get_template_directory_uri() ?>/assets/images/sprite.svg#icon-to-left">
                                    </use>
                                </svg>
                            </button>
                            <button onclick="paginateNext()"
                                    class="partners-btn">
                                <svg width="10.37" height="16.97">
                                    <use href="<?php echo get_template_directory_uri() ?>/assets/images/sprite.svg#icon-to-right">
                                    </use>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>

                <div id="partners-posts-container" class="our-partners-container">
                    <?php
                    $args = array(
                        'post_type' => 'all_partners',
                        'order' => 'ASC',
                        'posts_per_page' => -1,
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'partners_categories',
                                'field' => 'slug',
                                'terms' => 'our-partners'
                            )
                        )
                    );

                    $loop = new WP_Query($args);

                    if ($loop->have_posts()) :
                        while ($loop->have_posts()) : $loop->the_post(); ?>
                            <?php get_template_part('template-parts/our-partner-card') ?>
                        <?php endwhile;
                    endif;
                    wp_reset_postdata();
                    ?>
                </div>
                <p class="message">No more posts
                <p>
                <div id="partners-posts-tablet" class="our-partners-container">
                    <?php
                    $args = array(
                        'post_type' => 'all_partners',
                        'order' => 'ASC',
                        'posts_per_page' => 12,
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'partners_categories',
                                'field' => 'slug',
                                'terms' => 'our-partners'
                            )
                        )
                    );

                    $loop = new WP_Query($args);

                    if ($loop->have_posts()) :
                        while ($loop->have_posts()) : $loop->the_post(); ?>
                            <?php get_template_part('template-parts/our-partner-card') ?>
                        <?php endwhile;
                    endif;
                    wp_reset_postdata();
                    ?>
                </div>
                <div id="partners-posts-mobile" class="our-partners-container">
                    <?php
                    $args = array(
                        'post_type' => 'all_partners',
                        'order' => 'ASC',
                        'posts_per_page' => 6,
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'partners_categories',
                                'field' => 'slug',
                                'terms' => 'our-partners'
                            )
                        )
                    );

                    $loop = new WP_Query($args);

                    if ($loop->have_posts()) :
                        while ($loop->have_posts()) : $loop->the_post(); ?>
                            <?php get_template_part('template-parts/our-partner-card') ?>
                        <?php endwhile;
                    endif;
                    wp_reset_postdata();
                    ?>
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
                        <div class="description">
                            <?php
                            $description = get_field('description');
                            echo wp_trim_words($description, 552);
                            ?>
                        </div>
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
                            <svg class="arrow" width="18" height="16" viewBox="0 0 18 16" fill="none"
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

                <div id="more-friends" class="friends-clubs">

                    <?php
                    $args = array(
                        'post_type' => 'all_partners',
                        'order' => 'ASC',
                        'posts_per_page' => 9,
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'partners_categories',
                                'field' => 'slug',
                                'terms' => 'friends-clubs'
                            )
                        )
                    );

                    $loop = new WP_Query($args);

                    if ($loop->have_posts()) :
                        while ($loop->have_posts()) : $loop->the_post(); ?>
                            <?php get_template_part('template-parts/friends-clubs-card') ?>
                        <?php endwhile;
                    endif;
                    wp_reset_postdata();
                    ?>
                </div>
                <div class="button-flex">
                    <button id="load-more-friends"
                            data-post-type="all_partners"
                            data-post-taxonomy="partners_categories"
                            data-post-terms="friends-clubs"
                            class="button button_green_new show-btn">
                        <?php the_field('show-btn'); ?>
                        <svg width="18" height="17">
                            <use href="<?php echo get_template_directory_uri() ?>/assets/images/sprite.svg#icon-paw">
                            </use>
                        </svg>
                    </button>
                </div>
            </div>
        </section>


        <section class="section our-friends-photographs">
            <div class="container">
                <div class="title-wrapper">
                    <h3 class="section_heading title photographs-title">
                        <svg class="icon" width="41" height="37">
                            <use href="<?php echo get_template_directory_uri() ?>/assets/images/sprite.svg#icon-La_cat">
                            </use>
                        </svg>
                        <?php the_field('photographs-title') ?>
                    </h3>
                </div>

                <div id="more-photographs" class="photographs">

                    <?php
                    $args = array(
                        'post_type' => 'all_partners',
                        'order' => 'ASC',
                        'posts_per_page' => 4,
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'partners_categories',
                                'field' => 'slug',
                                'terms' => 'our-photographers'
                            )
                        )
                    );

                    $loop = new WP_Query($args);

                    if ($loop->have_posts()) :
                        while ($loop->have_posts()) : $loop->the_post(); ?>
                            <?php get_template_part('template-parts/photograph-card') ?>
                        <?php endwhile;
                    endif;
                    wp_reset_postdata();
                    ?>
                </div>
                <div class="button-flex">
                    <button id="load-more-photographs"
                            data-post-type="all_partners"
                            data-post-taxonomy="partners_categories"
                            data-post-terms="our-photographers"
                            class="button button_green_new show-btn">
                        <?php the_field('show-btn'); ?>
                        <svg width="18" height="17">
                            <use href="<?php echo get_template_directory_uri() ?>/assets/images/sprite.svg#icon-paw">
                            </use>
                        </svg>
                    </button>
                </div>
            </div>
        </section>
        <?php get_template_part('template-parts/join-us') ?>
    </main>

<?php get_footer(); ?>