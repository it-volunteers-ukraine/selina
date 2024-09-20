<div class="one-card-news__news-section__img">
    <img src="<?php the_field('news_photo'); ?>" alt="<?php the_field('news_name'); ?>" />
</div>
<div class="one-card-news__news-section__content-wrapper">
    <div class="one-card-news__news-section__text-wrapper">
        <p class="one-card-news__news-section__name">
            <?php the_field('news_name'); ?>
        </p>
        <p class="one-card-news__news-section__text">
            <?php the_field('news_text'); ?>
        </p>
    </div>

    <!-- Button types -->
    <?php
        $news_disk_link = get_field('news_choice-button_disc');
        $news_outer_link = get_field('news_choice-button_outer-link');
    ?>

    <!-- google-disk -->
    <?php if ( !empty ($news_disk_link )): ?>
        <a href="<?php the_field('news_choice-button_disc') ?>" class='one-card-news__news-section__button news-section__button button red_medium_button' target='_blank'>
            <p><?php the_field('news_btn') ?></p>
            <svg width="16" height="14"> 
                <use href="<?php bloginfo( 'template_url' ); ?>/assets/images/sprite.svg#icon-google"></use> 
            </svg>
        </a>

    <!-- outer-link -->
    <?php elseif ( !empty ($news_outer_link )): ?>
        <a href="<?php the_field('news_choice-button_outer-link') ?>" class='one-card-news__news-section__button news-section__button button red_medium_button' target='_blank'>
            <p><?php the_field('news_btn') ?></p>
            <svg class="icon-paw" width="16" height="15">
                <use href="<?php echo get_template_directory_uri() ?>/assets/images/sprite.svg#arrow-up-right"></use>
            </svg>
        </a>

    <!-- inner-link -->
    <?php else : ?>
        <a class="one-card-news__news-section__button news-section__button button red_medium_button" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
            <p><?php the_field('news_btn'); ?></p>
            <svg class="news-section__button-svg" width="16" height="15">
                <use href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#icon-paw"></use>
            </svg>
        </a>
    <?php endif; ?>
</div>