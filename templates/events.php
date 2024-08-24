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
                            <a class="heading-section-events__nav-li-link" href="#beginners-tips">
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
                            $news_date = new DateTime(get_field('news_date'));
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
                                  <!-- Template-part exhibition ------------------------------------- -->
                                  <?php get_template_part('template-parts/one-card-event'); ?>

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
                            <?php the_field('exhibitions__last-button-text'); ?>
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
                <div class="calendar__calendars">
                    <?php
                    $calendar_count = 0;
                    if( have_rows('calendar__calendar-card') ):
                        while( have_rows('calendar__calendar-card') ) : the_row();
                        $calendar_img = get_sub_field('calendar_img');
                        $calendar_naming = get_sub_field('calendar_naming');
                        $calendar_info = get_sub_field('calendar_info');
                        $calendar_button_text = get_sub_field('calendar_button_text');
                        $calendar_count++;
                    ?>
                        <div class="calendar__calendar-card<?php echo $calendar_count > 2 ? ' calendar__calendar-card--hidden' : ''; ?>">
                            <div class="calendar__calendar-card-img">
                                <img src="<?php echo $calendar_img['url']; ?>" alt="<?php echo $calendar_img['alt']; ?>">
                            </div>
                            <div class="calendar__calendar-card-heading">
                                <p><?php echo $calendar_naming; ?></p>
                            </div>
                            <div class="calendar__calendar-card-info">
                                <p><?php echo $calendar_info; ?></p>
                            </div>
                            <a href="<?php the_sub_field('calendar_link') ?>" target='_blank'>
                                <div class="calendar__calendar-card-button red_medium_button">
                                    <p class='calendar__calendar-button-text'>
                                        <?php echo $calendar_button_text; ?>
                                    </p>
                                    <svg class="icon-paw" width="20" height="20">
                                        <use href="<?php echo get_template_directory_uri() ?>/assets/images/sprite.svg#arrow-up-right"></use>
                                    </svg>
                                </div>
                            </a>
                        </div>
                        <?php
                            endwhile;
                        endif;
                        ?>
                </div>
                <!-- Button if calendars > 2 -->
                <?php if ($calendar_count > 2): ?>
                    <button class='calendar__show-more-button green_medium_button' id='showMoreCalendarsButton'>
                        <p class='calendar__show-more-button-text'>
                            <?php the_field('calendar__show-more-button-text'); ?>
                        </p>
                        <svg class="icon-paw" width="20" height="20">
                            <use href="<?php echo get_template_directory_uri() ?>/assets/images/sprite.svg#icon-paw"></use>
                        </svg>
                    </button>
                <?php endif; ?>
            </div>
        </section>

        <section class='section beginners-tips' id='beginners-tips'>
            <div class="container">
                <div class="beginners-tips__heading-container">
                    <span class="beginners-tips__La_cat"> 
                        <svg width="24" height="24"> 
                            <use href="<?php bloginfo( 'template_url' ); ?>/assets/images/sprite.svg#icon-La_cat"></use> 
                        </svg> 
                    </span> 
                    <h2 class="beginners-tips__heading">
                        <?php the_field('beginners-tips__heading'); ?>
                    </h2>
                </div>
                <div class='beginners-tips__slider-container'>
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
                                setup_postdata($post); ?>
                                <div class="beginners-tips__card swiper-slide">
                                    <svg class="beginners-tips__clip-svg" width="38" height="90">
                                        <use href="<?php echo get_template_directory_uri() ?>/assets/images/sprite.svg#icon-clip"></use>
                                    </svg>
                                    <p class='beginners-tips__card-text'><?php the_field('tips_name') ?></p>
                                    <!-- Button types -->
                                    <?php
                                        $disk_link = get_field('tips_button-link-disk');
                                        $inner_link = get_field('tips_button-link-inner');
                                        $outer_link = get_field('tips_button-link-outer');
                                    ?>
                                    <?php if ( !empty ($disk_link )): ?>

                                    <!-- google-disk -->
                                        <a href="<?php the_field('tips_button-link-disk') ?>" class='beginners-tips__tips-button red_medium_button' target='_blank'>
                                            <p><?php the_field('tips_button-text') ?></p>
                                            <svg width="16" height="14"> 
                                                <use href="<?php bloginfo( 'template_url' ); ?>/assets/images/sprite.svg#icon-google"></use> 
                                            </svg>
                                        </a>

                                    <!-- outer-link -->
                                    <?php elseif ( !empty ($outer_link )): ?>
                                        <a href="<?php the_field('tips_button-link-outer') ?>" class='beginners-tips__tips-button red_medium_button' target='_blank'>
                                            <p><?php the_field('tips_button-text') ?></p>
                                            <svg class="icon-paw" width="20" height="20">
                                                <use href="<?php echo get_template_directory_uri() ?>/assets/images/sprite.svg#arrow-up-right"></use>
                                            </svg>
                                        </a>

                                    <!-- inner-link -->
                                    <?php else : ?>
                                        <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" class='beginners-tips__tips-button red_medium_button' target='_blank'>
                                            <p><?php the_field('tips_button-text') ?></p>
                                            <svg class="icon-paw" width="17" height="15">
                                                <use href="<?php echo get_template_directory_uri() ?>/assets/images/sprite.svg#icon-paw"></use>
                                            </svg>
                                        </a>
                                    <?php endif; ?>
                                </div>
                            <?php endforeach;
                                wp_reset_postdata(); ?>
                        </div>
                        <div class='slider-navigation-pagination-container'>
                            <div class="slider-button-prev">
                                <svg class="partners-section__arrow-left one-arrow" width="10.37" height="16.97">
                                    <use
                                        href="<?php echo get_template_directory_uri() ?>/assets/images/sprite.svg#icon-to-left">
                                    </use>
                                </svg>
                            </div>
                            <div class="slider-pagination"></div>
                            <div class="slider-button-next">
                            <svg class="partners-section__arrow-right one-arrow" width="10.37" height="16.97">
                                <use
                                    href="<?php echo get_template_directory_uri() ?>/assets/images/sprite.svg#icon-to-right">
                                </use>
                            </svg>
                            </div>
                        </div>
                    </div>
                </div>
                <div class='beginners-tips__cards-container'>
                    <?php
                        $tips_count = 0;
                        $args = array(
                            'orderby' => 'date',
                            'order' => 'DESC',
                            'post_type' => 'tips',
                            'posts_per_page' => -1,   
                        );
                        $myposts = get_posts($args);
                        foreach ($myposts as $post):
                        setup_postdata($post);
                        $tips_count++; ?>
                        <div class="beginners-tips__card<?php echo $tips_count > 9 ? ' beginners-tips__tips-card--hidden' : ''; ?>">
                            <svg class="beginners-tips__clip-svg" width="38" height="90">
                                <use href="<?php echo get_template_directory_uri() ?>/assets/images/sprite.svg#icon-clip"></use>
                            </svg>
                            <p class='beginners-tips__card-text'><?php the_field('tips_name') ?></p>
                        <!-- Button types -->
                            <?php
                                $disk_link = get_field('tips_button-link-disk');
                                $inner_link = get_field('tips_button-link-inner');
                                $outer_link = get_field('tips_button-link-outer');
                            ?>
                            <?php if ( !empty ($disk_link )): ?>

                            <!-- google-disk -->
                                <a href="<?php the_field('tips_button-link-disk') ?>" class='beginners-tips__tips-button red_medium_button' target='_blank'>
                                    <p><?php the_field('tips_button-text') ?></p>
                                    <svg width="16" height="14"> 
                                        <use href="<?php bloginfo( 'template_url' ); ?>/assets/images/sprite.svg#icon-google"></use> 
                                    </svg>
                                </a>

                            <!-- outer-link -->
                            <?php elseif ( !empty ($outer_link )): ?>
                                <a href="<?php the_field('tips_button-link-outer') ?>" class='beginners-tips__tips-button red_medium_button' target='_blank'>
                                    <p><?php the_field('tips_button-text') ?></p>
                                    <svg class="icon-paw" width="20" height="20">
                                        <use href="<?php echo get_template_directory_uri() ?>/assets/images/sprite.svg#arrow-up-right"></use>
                                    </svg>
                                </a>

                            <!-- inner-link -->
                            <?php else : ?>
                                <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" class='beginners-tips__tips-button red_medium_button' target='_blank'>
                                    <p><?php the_field('tips_button-text') ?></p>
                                    <svg class="icon-paw" width="17" height="15">
                                        <use href="<?php echo get_template_directory_uri() ?>/assets/images/sprite.svg#icon-paw"></use>
                                    </svg>
                                </a>
                            <?php endif; ?>
                        </div>
                    <?php endforeach;
                        wp_reset_postdata(); ?>
                </div>
                <!-- Button show more tips -->
                <?php if ($tips_count > 8): ?>
                    <button class='beginners-tips__show-more-button green_medium_button' id='showMoreTipsCardsButton'>
                        <p class='beginners-tips__show-more-button-text'>
                            <?php the_field('beginners-tips__show-more-button-text'); ?>
                        </p>
                        <svg class="icon-paw" width="20" height="20">
                            <use href="<?php echo get_template_directory_uri() ?>/assets/images/sprite.svg#icon-paw"></use>
                        </svg>
                    </button>
                <?php endif; ?>
            </div>
        </section>

        <section class='section awards' id='awards'>
            <div class="container">
                <div class="awards__heading-container">
                    <span class="awards__La_cat"> 
                        <svg width="24" height="24"> 
                            <use href="<?php bloginfo( 'template_url' ); ?>/assets/images/sprite.svg#icon-La_cat"></use> 
                        </svg> 
                    </span> 
                    <h2 class="awards__heading">
                        <?php the_field('awards__heading'); ?>
                    </h2>
                </div>
                <div class="awards__gallery">
                    <?php 
                    $images = get_field('awards__gallery');
                    if( $images ): ?>
                        <?php foreach( $images as $index => $image ): ?>
                            <div class="awards__gallery-photo <?php echo $index >= 6 ? 'awards__hidden' : ''; ?>">
                                <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>

                <button class='awards__show-more-button green_medium_button' id='showMoreAwardsButton'>
                    <p class='awards__show-more-button-text'>
                        <?php the_field('awards__show-more-button-text'); ?>
                    </p>
                    <svg class="icon-paw" width="20" height="20">
                        <use href="<?php echo get_template_directory_uri() ?>/assets/images/sprite.svg#icon-paw"></use>
                    </svg>
                </button>

                <button class='awards__show-less-button green_medium_button' id='showLessAwardsButton'>
                    <p class='awards__show-less-button-text'>
                        <?php the_field('awards__show-less-button-text'); ?>
                    </p>
                    <svg class="icon-paw" width="20" height="20">
                        <use href="<?php echo get_template_directory_uri() ?>/assets/images/sprite.svg#icon-paw"></use>
                    </svg>
                </button>

            </div>
        </section>

        <?php get_template_part('template-parts/join-us') ?>
    </main>

<?php get_footer(); ?>