<?php
/*
Template Name: Show
*/
get_header();

?>

    <main>
        <section class="section heading-section-shows">
            <div class="heading-section-shows__background-img">
                <img src="<?php the_field('upper-section__background', 'option'); ?>" alt="cat">
            </div>
            <div class="container">
                <div class="heading-section-shows__wrapper">
                    <div class="heading-section-shows__list-shows">
                        <h2><?php the_field('list-shows'); ?></h2>
                    </div>
                    <div class="heading-section-shows__nav">
                        <div class="heading-section-shows__nav-li">
                            <a class="heading-section-shows__nav-li-link" href="#webinars">
                                <div class="heading-section-shows__nav-li-icon">
                                    <svg class="icon-paw" width="14" height="12">
                                        <use href="<?php echo get_template_directory_uri() ?>/assets/images/sprite.svg#icon-paw">
                                        </use>
                                    </svg>
                                </div>
                                <div class="heading-section-shows__nav-li-text">
                                    <p><?php the_field('nav-shows-1'); ?></p>
                                </div>
                            </a>
                        </div>
                        <div class="heading-section-shows__nav-li">
                            <a class="heading-section-shows__nav-li-link" href="#presentations">
                                <div class="heading-section-shows__nav-li-icon">
                                    <svg class="icon-paw" width="14" height="12">
                                        <use href="<?php echo get_template_directory_uri() ?>/assets/images/sprite.svg#icon-paw">
                                        </use>
                                    </svg>
                                </div>
                                <div class="heading-section-shows__nav-li-text">
                                    <p><?php the_field('nav-shows-2'); ?></p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class='section webinars' id='webinars'>
            <div class="container">
                <div class="webinars__heading-container">
                    <span class="list-webinars__La_cat"> 
                        <svg width="24" height="24"> 
                            <use href="<?php bloginfo( 'template_url' ); ?>/assets/images/sprite.svg#icon-La_cat"></use> 
                        </svg> 
                    </span> 
                    <h2 class="webinars__heading">
                        <?php the_field('webinars__heading'); ?>
                    </h2>
                </div>
                <p class=webinars__description>
                    <?php the_field('webinars__description'); ?>
                </p>
                <div class="webinars__cards">
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
                                    'terms' => 'webinar'
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
                                <div class="webinars__news-section__item">
                                    <?php
                                    $category_detail = get_the_category($post->ID);
                                    $category_name = $category_detail ? $category_detail[0]->cat_name : '';
                                    $category_slug = $category_detail ? $category_detail[0]->slug : '';

                                    if ($category_name):
                                        ?>
                                        
                                    <?php endif; ?>
                                    <div class="webinars__news-section__img">
                                        <img src="<?php the_field('news_photo'); ?>" alt="<?php the_field('news_name'); ?>" />
                                    </div>
                                    <div class="webinars__news-section__content-wrapper">
                                        <div class="webinars__news-section__date-time">
                                            <!-- DATE -->
                                            <?php
                                                if (!empty(get_field('news_date_meta'))):
                                            ?>
                                                <div class="webinars__news-section__date-container">
                                                    <svg width="22" height="22"> 
                                                        <use href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#calendar-icon"></use> 
                                                    </svg> 
                                                    <p class="webinars__news-section__date">
                                                        <?php
                                                            $current_lang = pll_current_language();
                                                            if ($current_lang == 'ua') {
                                                                $date_str = get_field('news_date_meta');

                                                                if ($date_str) {
                                                                    $date = new DateTime($date_str);
                                                                    $months = [
                                                                        1 => 'Січня', 2 => 'Лютого', 3 => 'Березня', 4 => 'Квітня',
                                                                        5 => 'Травня', 6 => 'Червня', 7 => 'Липня', 8 => 'Серпня',
                                                                        9 => 'Вересня', 10 => 'Жовтня', 11 => 'Листопада', 12 => 'Грудня'
                                                                    ];
                                                                    $month_num = (int) $date->format('m');
                                                                    echo $date->format('j ') . $months[$month_num];
                                                                }
                                                            } elseif ($current_lang == 'en') {
                                                                $date_str = get_field('news_date_meta');

                                                                if ($date_str) {
                                                                    $date = new DateTime($date_str);
                                                                    echo $date->format('j F');
                                                                }
                                                            }
                                                        ?>
                                                    </p>
                                                </div>
                                            <?php endif; ?>
                                            <!-- TIME -->
                                            <?php
                                                if(!empty(get_field('news_time_meta'))):
                                            ?>
                                                <div class="webinars__news-section__time-container">
                                                    <svg width="22" height="22"> 
                                                    <use href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#clock-icon"></use>  
                                                    </svg> 
                                                    <p class="webinars__news-section__time">
                                                        <?php
                                                        $time_str = get_field('news_time_meta');
                                                        if ($time_str) {
                                                            $time = new DateTime($time_str);
                                                            echo $time->format('H:i');
                                                        }
                                                        ?>
                                                    </p>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                        <p class="webinars__news-section__name">
                                            <?php the_field('news_name'); ?>
                                        </p>
                                        <p class="webinars__news-section__text">
                                            <?php the_field('news_text'); ?>
                                        </p>
                                        <a class="webinars__news-section__button news-section__button button red_medium_button" href="<?php the_field('news_link'); ?>">
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
                            echo '<p>Наразі немає запланованих вебінарів.</p>';
                        }
                    ?>
                </div>
                <a href="/">
                    <div class="webinars__last-button green_medium_button">
                        <p class=webinars__last-button-text>
                            <?php the_field('webinars__last-button-text'); ?>
                        </p>
                        <svg class="icon-paw" width="17" height="15">
                            <use href="<?php echo get_template_directory_uri() ?>/assets/images/sprite.svg#icon-paw"></use>
                        </svg>
                    </div>
                </a>
            </div>
        </section>

        <section class='section presentations' id='presentations'>
            <div class="container">
                <div class="presentations__heading-container">
                    <span class="list-presentations__La_cat"> 
                        <svg width="24" height="24"> 
                            <use href="<?php bloginfo( 'template_url' ); ?>/assets/images/sprite.svg#icon-La_cat"></use> 
                        </svg> 
                    </span> 
                    <h2 class="presentations__heading">
                        <?php the_field('presentations__heading'); ?>
                    </h2>
                </div>
                <div class="presentations__cards">

                    <?php
                        $args = array(
                            'orderby' => 'date',
                            'order' => 'DESC',
                            'post_type' => 'news',
                            'posts_per_page' => 4,
                            'tax_query' => array(
                                array(
                                    'taxonomy' => 'news_categories',
                                    'field' => 'slug',
                                    'terms' => 'presentation'
                                )
                            )
                        );

                        $myposts = get_posts( $args );
                        if ($myposts) {
                            foreach ($myposts as $post) : setup_postdata($post); ?>
                                <div class="presentations__news-section__item">
                                    <?php
                                    $category_detail = get_the_category($post->ID);
                                    $category_name = $category_detail ? $category_detail[0]->cat_name : '';
                                    $category_slug = $category_detail ? $category_detail[0]->slug : '';

                                    if ($category_name):
                                        ?>
                                        
                                    <?php endif; ?>
                                    <!-- Cutted into one-card-news.php -->
                                    <?php get_template_part('template-parts/one-card-news'); ?>
                                </div>
                            <?php endforeach;
                            wp_reset_postdata();
                        } else {
                            echo '<p>Наразі немає опублікованих презентацій.</p>';
                        }
                    ?>

                </div>
                <a href="/">
                    <div class="webinars__last-button presentations__all-button green_medium_button">
                        <p class=webinars__last-button-text>
                            <?php the_field('presentations__all-button-text'); ?>
                        </p>
                        <svg class="icon-paw" width="17" height="15">
                            <use href="<?php echo get_template_directory_uri() ?>/assets/images/sprite.svg#icon-paw">
                            </use>
                        </svg>
                    </div>
                </a>
            </div>
        </section>
        
        <?php get_template_part('template-parts/join-us') ?>
    </main>

<?php get_footer(); ?>