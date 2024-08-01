<?php
/*
 * Template Post Type: news
 * Template Name: Single news
 */
get_header();
?>

<main>
  <section class="news-section heading-section-news"
    <div class="heading-news-section__background-img">
        <img src="<?php the_field('upper-section__background', 'option'); ?>" alt="cat">
    </div>
  </section>


  <section class="wrapper-news-section">
    <div class="container">
      <div class="news-section__heading section_heading">
      </div>
      <h2 class="news-section__heading section_heading">
        <?php the_field('news_name'); ?>
      </h2>
      <div class="news-section__item">
        <?php
          if (have_posts()) : while (have_posts()) : the_post(); ?>
            <img src="<?php the_field('news_photo'); ?>" alt="<?php the_field('news_name'); ?>" />
            <div class="news-section__text-wrapper">
              <div class="news-section__date">
                <p>
                  <svg width="18" height="18">
                    <use href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#icon-clock"></use>
                  </svg>
                  <?php the_field('news_date'); // Дата виставки ?>
                </p>
                <p>
                  <svg width="18" height="18">
                    <use href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#icon-calendar"></use>
                  </svg>
                  <?php the_field('news_time'); // Час виставки ?>
                </p>
              </div>
              <p class="news-section__name">
                <?php the_field('news_name'); // Назва виставки ?>
              </p>
              <p class="news-section__text">
                <?php the_field('news_text'); // Опис виставки ?>
              </p>
              <a class="news-section__button button red_medium_button"
                href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                  <?php the_field('news_btn'); // Текст кнопки ?>
                    <svg class="news-section__button-svg" width="16" height="15">
                      <use href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#icon-paw"></use>
                    </svg>
              </a>
            </div>
        <?php
          endwhile;
          endif;
          wp_reset_postdata();
        ?>
      </div>
    </div>        
  </section>
</main>
<?php
get_footer();
