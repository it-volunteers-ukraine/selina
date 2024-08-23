<?php
/*
* Template Post Type: tips
* Template Name: tips
*/
get_header();
?>

    <main>
        <section class="section heading-section-single-tip">
            <div class="heading-section-single-tip__background-img">
                <img src="<?php the_field('upper-section__background', 'option'); ?>" alt="cat">
            </div>
            <div class="container">
                <div class="heading-section-single-tip__wrapper">
                    <div class="heading-section-single-tip__list-single-tip">
                        <h2><?php the_field('single_tip_page_heading'); ?></h2>
                    </div>
                </div>
            </div>
        </section>

        <section class="section breadcrumbs-single-tip-section">
            <div class="container">
                <div class="single-tip__breadcrumbs">
                    <a href="<?php the_field('breed-page_breadcrumbs_page'); ?>">
                        <?php the_field('beginners-tips__heading'); ?></a>
                    <span class="single-tip__breadcrumbs__active">
                        <?php the_field('tips_name'); ?>
                    </span>
                </div>
            </div>
        </section>

        <section class='section single-tip__section'>
            <div class="container">
                <div class="single-tip__flex-container">
                    <div class='single-tip__tip-content'>
                        <div class="single-tip__tip-heading">
                            <h3><?php the_field('tips_name'); ?></h3>
                        </div>
                        <div class="single-tip__image">
                            <img class="single-tip__image__img" src="<?php the_field('tips_image') ?>" />
                        </div>
                        <div class='single-tip__text-content'>
                            <div class="single-tip__sub-heading">
                                <h3><?php the_field('tips_sub-heading_1'); ?></h3>
                            </div>
                            <div class="single-tip__text">
                                <p><?php the_field('tips_text_1'); ?></p>
                            </div>
                            <div class="single-tip__sub-heading">
                                <h3><?php the_field('tips_sub-heading_2'); ?></h3>
                            </div>
                            <div class="single-tip__text">
                                <p><?php the_field('tips_text_2'); ?></p>
                            </div>
                            <div class="single-tip__sub-heading">
                                <h3><?php the_field('tips_sub-heading_3'); ?></h3>
                            </div>
                            <div class="single-tip__text">
                                <p><?php the_field('tips_text_3'); ?></p>
                            </div>
                        </div>
                        <button class='single-tip__show-whole-button green_medium_button' id='showWholeTipTextButton'>
                            <p><?php the_field('tips_button-show-whole-text'); ?></p>
                            <svg class="icon-paw" width="20" height="20">
                                <use href="<?php echo get_template_directory_uri() ?>/assets/images/sprite.svg#icon-paw"></use>
                            </svg>
                        </button>
                    </div>
                    <div class="single-tip__sidebar">
                        <!-- Side navigation -->
                        <div class='single-tip__sidebar-heading'>
                            <p><?php the_field('slider-heading'); ?></p>
                        </div>
                        <?php
                            $args = array(
                                'orderby' => 'date',
                                'order' => 'DESC',
                                'post_type' => 'tips',
                                'posts_per_page' => -1,   
                            );
                            $myposts = get_posts($args);
                            foreach ($myposts as $post):
                            setup_postdata($post);
                        ?>
                        <div class="single-tip__sidebar-card">
                            <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" target='_blank'>
                                <p class='single-tip__sidebar-card-text'><?php the_field('tips_name') ?></p>
                            </a>
                        </div>
                        <?php endforeach;
                            wp_reset_postdata(); ?>
                    </div>
                </div>
                <div class="single-tip__slider">
                    <!-- Slider -->
                    <div class='single-tip__slider-heading'>
                        <p><?php the_field('slider-heading'); ?></p>
                    </div>
                    <div class="swiper mySwiper">
                        <div class="swiper-wrapper">
                            <?php
                                $args = array(
                                    'orderby' => 'date',
                                    'order' => 'DESC',
                                    'post_type' => 'tips',
                                    'posts_per_page' => -1,   
                                );
                                $myposts = get_posts($args);
                                foreach ($myposts as $post):
                                setup_postdata($post);
                            ?>
                            <div class="single-tip__card swiper-slide">
                                <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" target='_blank'>
                                    <p class='single-tip__card-text'><?php the_field('tips_name') ?></p>
                                </a>
                            </div>
                            <?php endforeach;
                                wp_reset_postdata(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <?php get_template_part('template-parts/join-us') ?>
    </main>

<?php get_footer(); ?>