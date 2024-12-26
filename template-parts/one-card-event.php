<div class="one-card-event__news-section__img">
        <img src="<?php the_field('news_photo'); ?>" alt="<?php the_field('news_name'); ?>" />
    </div>
    <div class="one-card-event__news-section__content-wrapper">
        <div class="one-card-event__news-section__date-time">
            <!-- DATE -->
            <?php
                $news_date = get_field('news_date_meta');
                $news_date_start = get_field('news_date_meta-start');
                if (!empty(get_field('news_date_meta'))):
            ?>
                <div class="one-card-event__news-section__date-container">
                    <svg width="22" height="22"> 
                        <use href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#calendar-icon"></use> 
                    </svg>
                    <p class="one-card-event__news-section__date">
                        <?php
                            if (!empty($news_date_start)) {
                                $date_start = new DateTime($news_date_start);
                                echo $date_start->format('j').' - ';
                            }
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
                                    echo $date->format('j ') . $months[$month_num] . ' ';
                                }
                            } elseif ($current_lang == 'en') {
                                $date_str = get_field('news_date_meta');

                                if ($date_str) {
                                    $date = new DateTime($date_str);
                                    echo $date->format('j F ');
                                }
                            }
                        
                            // YEAR
                            if ($date_str) {
                                $date = new DateTime($date_str);
                                echo $date->format('Y');
                            }
                        ?>
                    </p>
                </div>
            <?php endif; ?>
            <!-- TIME -->
            <?php
                if(!empty(get_field('news_time_meta'))):
            ?>
                <div class="one-card-event__news-section__time-container">
                    <svg width="22" height="22"> 
                    <use href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#clock-icon"></use>  
                    </svg> 
                    <p class="one-card-event__news-section__time">
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
        <p class="one-card-event__news-section__name">
            <?php the_field('news_name'); ?>
        </p>
        <p class="one-card-event__news-section__text">
            <?php the_field('news_text'); ?>
        </p>
        <a class="one-card-event__news-section__button news-section__button button red_medium_button" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
            <?php the_field('news_btn'); ?>
            <svg class="news-section__button-svg" width="16" height="15">
                <use href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#icon-paw"></use>
            </svg>
        </a>
    </div>