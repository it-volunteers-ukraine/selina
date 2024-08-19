<section class="feedbacks-section section" id="feedbacks">
        <div class="container">
            <div class="feedbacks-heading-wrapper">
                <h2 class="feedbacks-section__heading section_heading">
                    <svg class="feedbacks-heading-svg" width="42" height="60">
                        <use href="<?php echo get_template_directory_uri() ?>/assets/images/sprite.svg#icon-La_cat">
                        </use>
                    </svg>
                    <?php the_field('breed-page_feedbacks-title'); ?>
                </h2>
                <div class="feedbacks-section__pagination">
                    <button class="feedbacks-section__arrow-left-btn feedbacks-section__arrow-btn">
                        <svg class="feedbacks-section__arrow-left one-arrow" width="10.37" height="16.97">
                            <use
                                href="<?php echo get_template_directory_uri() ?>/assets/images/sprite.svg#icon-to-left">
                            </use>
                        </svg>
                    </button>
                    <button class="feedbacks-section__arrow-right-btn feedbacks-section__arrow-btn">
                        <svg class="feedbacks-section__arrow-right one-arrow" width="10.37" height="16.97">
                            <use
                                href="<?php echo get_template_directory_uri() ?>/assets/images/sprite.svg#icon-to-right">
                            </use>
                        </svg>
                    </button>
                </div>
            </div>
            <div class="feedbacks-section__swiper swiper">
                <div class="feedbacks-section__list swiper-wrapper">
                    <?php
                    $args = array('posts_per_page' => -1, 'post_type' => 'feedbacks');
                    $myposts = get_posts($args);
                    foreach ($myposts as $post):
                        setup_postdata($post); ?>
                        <div class="swiper-slide feedbacks-section__item">
                            <p class="feedbacks-section__name">
                                <?php the_field('feedback_name') ?>
                            </p>
                            <div class="feedbacks-section__stars">
                                <?php
                                $start_count = (int)get_field('feedback_stars');
                                $i = 1;
                                while ($i <= $start_count): ?>
                                <svg width="20" height="19">
                                    <use
                                        href="<?php echo get_template_directory_uri() ?>/assets/images/sprite.svg#icon-star">
                                    </use>
                                </svg>
                                <?php $i++; endwhile; ?>
                            </div>
                            <p class="feedbacks-section__text">
                                <?php the_field('feedback_text') ?>
                            </p>
                            
                        </div>
                    <?php endforeach;
                    wp_reset_postdata(); ?>
                </div>
            </div>
        </div>
    </section>