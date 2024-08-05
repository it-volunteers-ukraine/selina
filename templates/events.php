<?php
/*
Template Name: Events
*/
get_header();

?>

    <main>
        <section class="section heading-section-events">
            <div class="heading-section-events__background-img">
                <img src="<?php the_field('upper-section__background', 'option'); ?>" alt="cat">
            </div>
            <div class="container">
                <div class="heading-section-events__wrapper">
                    <div class="heading-section-events__list-events">
                        <h2><?php the_field('list-events'); ?></h2>
                    </div>
                    <div class="heading-section-events__nav">
                        <div class="heading-section-events__nav-li">
                            <a class="heading-section-events__nav-li-link" href="#exhibitions">
                                <div class="heading-section-events__nav-li-icon">
                                    <svg class="icon-paw" width="14" height="12">
                                        <use href="<?php echo get_template_directory_uri() ?>/assets/images/sprite.svg#icon-paw">
                                        </use>
                                    </svg>
                                </div>
                                <div class="heading-section-events__nav-li-text">
                                    <p><?php the_field('nav-events_exhibitions'); ?></p>
                                </div>
                            </a>
                        </div>
                        <div class="heading-section-events__nav-li">
                            <a class="heading-section-events__nav-li-link" href="#calendar">
                                <div class="heading-section-events__nav-li-icon">
                                    <svg class="icon-paw" width="14" height="12">
                                        <use href="<?php echo get_template_directory_uri() ?>/assets/images/sprite.svg#icon-paw">
                                        </use>
                                    </svg>
                                </div>
                                <div class="heading-section-events__nav-li-text">
                                    <p><?php the_field('nav-events_calendar'); ?></p>
                                </div>
                            </a>
                        </div>
                        <div class="heading-section-events__nav-li">
                            <a class="heading-section-events__nav-li-link" href="#tips">
                                <div class="heading-section-events__nav-li-icon">
                                    <svg class="icon-paw" width="14" height="12">
                                        <use href="<?php echo get_template_directory_uri() ?>/assets/images/sprite.svg#icon-paw">
                                        </use>
                                    </svg>
                                </div>
                                <div class="heading-section-events__nav-li-text">
                                    <p><?php the_field('nav-events_tips'); ?></p>
                                </div>
                            </a>
                        </div>
                        <div class="heading-section-events__nav-li">
                            <a class="heading-section-events__nav-li-link" href="#awards">
                                <div class="heading-section-events__nav-li-icon">
                                    <svg class="icon-paw" width="14" height="12">
                                        <use href="<?php echo get_template_directory_uri() ?>/assets/images/sprite.svg#icon-paw">
                                        </use>
                                    </svg>
                                </div>
                                <div class="heading-section-events__nav-li-text">
                                    <p><?php the_field('nav-events_awards'); ?></p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class='section exhibitions' id='exhibitions'>
            <div class="container">
                <div class="exhibitions__heading-container">
                    <span class="list-exhibitions__La_cat"> 
                        <svg width="24" height="24"> 
                            <use href="<?php bloginfo( 'template_url' ); ?>/assets/images/sprite.svg#icon-La_cat"></use> 
                        </svg> 
                    </span> 
                    <h2 class="exhibitions__heading">
                        <?php the_field('exhibitions__heading'); ?>
                    </h2>
                </div>
                <p class=exhibitions__description>
                    <?php the_field('exhibitions__description'); ?>
                </p>
                <div class="exhibitions__cards">
                    <?php
                        $args = array(
                            'orderby' => 'date',
                            'order' => 'DESC',
                            'post_type' => 'news',
                            'posts_per_page' => -1,
                            'tax_query' => array(
                                array(
                                    'taxonomy' => 'news_categories',
                                    'field' => 'slug',
                                    'terms' => 'exhibition'
                                )
                            )
                        );

                        $myposts = get_posts( $args );
                        if ($myposts) {
                            foreach ($myposts as $post) : setup_postdata($post);
                            $current_date = new DateTime();
                            $news_date = new DateTime(get_field('news_date_meta'));
                            if ($news_date >= $current_date) :
                            ?>
                                <div class="exhibitions__news-section__item">
                                    <?php
                                    $category_detail = get_the_category($post->ID);
                                    $category_name = $category_detail ? $category_detail[0]->cat_name : '';
                                    $category_slug = $category_detail ? $category_detail[0]->slug : '';

                                    if ($category_name):
                                        ?>
                                        
                                    <?php endif; ?>
                                    <div class="exhibitions__news-section__img">
                                        <img src="<?php the_field('news_photo'); ?>" alt="<?php the_field('news_name'); ?>" />
                                    </div>
                                    <div class="exhibitions__news-section__content-wrapper">
                                        <?php
                                            $news_date = get_field('news_date');
                                            $news_time = get_field('news_time');
                                            if(!empty($news_date) || !empty($news_time)):
                                        ?>
                                            <div class="exhibitions__news-section__date-time">
                                                <?php
                                                    if (!empty($news_date)):
                                                ?>
                                                    <div class="exhibitions__news-section__date-container">
                                                        <svg width="22" height="22"> 
                                                            <use href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#calendar-icon"></use> 
                                                        </svg> 
                                                        <p class="exhibitions__news-section__date">
                                                            <?php the_field('news_date'); ?>
                                                        </p>
                                                    </div>
                                                <?php endif; ?>
                                                <?php
                                                    if(!empty($news_time)):
                                                ?>
                                                    <div class="exhibitions__news-section__time-container">
                                                        <svg width="22" height="22"> 
                                                        <use href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#clock-icon"></use>  
                                                        </svg> 
                                                        <p class="exhibitions__news-section__time">
                                                            <?php the_field('news_time'); ?>
                                                        </p>
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                        <?php endif; ?>
                                        <p class="exhibitions__news-section__name">
                                            <?php the_field('news_name'); ?>
                                        </p>
                                        <p class="exhibitions__news-section__text">
                                            <?php the_field('news_text'); ?>
                                        </p>
                                        <a class="exhibitions__news-section__button news-section__button button red_medium_button" href="<?php the_field('news_link'); ?>">
                                            <?php the_field('news_btn'); ?>
                                            <svg class="news-section__button-svg" width="16" height="15">
                                                <use href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#icon-paw"></use>
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            <?php
                                endif;
                            endforeach;
                            wp_reset_postdata();
                        } else {
                            echo '<p>Наразі немає запланованих виставок.</p>';
                        }
                    ?>
                </div>
                <a href="/">
                    <div class="exhibitions__last-button green_medium_button">
                        <p class=exhibitions__last-button-text>
                            <?php the_field('exhibitions_last-button-text'); ?>
                        </p>
                        <svg class="icon-paw" width="17" height="15">
                            <use href="<?php echo get_template_directory_uri() ?>/assets/images/sprite.svg#icon-paw"></use>
                        </svg>
                    </div>
                </a>
            </div>
        </section>

        <section class='section calendar' id='calendar'>
            <div class="container">
                <div class="calendar__heading-container">
                    <span class="list-calendar__La_cat"> 
                        <svg width="24" height="24"> 
                            <use href="<?php bloginfo( 'template_url' ); ?>/assets/images/sprite.svg#icon-La_cat"></use> 
                        </svg> 
                    </span> 
                    <h2 class="calendar__heading">
                        <?php the_field('calendar__heading'); ?>
                    </h2>
                </div>
                <p class=calendar__description>
                    <?php the_field('calendar__description'); ?>
                </p>
            </div>
        </section>

        <?php get_template_part('template-parts/join-us') ?>
    </main>

<?php get_footer(); ?>