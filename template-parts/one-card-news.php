<div class="presentations__news-section__img">
    <img src="<?php the_field('news_photo'); ?>" alt="<?php the_field('news_name'); ?>" />
</div>
<div class="presentations__news-section__content-wrapper">
    <p class="presentations__news-section__name">
        <?php the_field('news_name'); ?>
    </p>
    <p class="presentations__news-section__text">
        <?php the_field('news_text'); ?>
    </p>
    <a class="presentations__news-section__button news-section__button button red_medium_button" href="<?php the_field('news_link'); ?>">
        <?php the_field('news_btn'); ?>
        <svg class="news-section__button-svg" width="16" height="15">
            <use href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#icon-paw"></use>
        </svg>
    </a>
</div>