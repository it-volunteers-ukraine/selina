<?php
/*
 * Template Post Type: news
 * Template Name: Single news
 */
get_header();
?>

<main>  
<section class="section heading-section-news">
  <style>
    @media screen and (min-width: 1439px) {
      .news-first-section {
        background-image: url("<?php the_field ('upper-section__background', 'option') ?>");
      }
    }
  </style>
  <div class="container">
    <div class="heading-section-news__background-img">
      <img src="<?php the_field('upper-section__background', 'option'); ?>" alt="Background image with cat">
    </div>      
    <h2 class="heading section_heading">
      Події
    </h2>
  </div>    
</section>

  <!-- Хлібні крихти -->
<section class="section wrapper-breadcrumbs-section">
  <div class="container">
    <div class="breadcrumbs-section">
    <p>
      <?php
      $breadcrumb_title = get_field('breadcrumb_title');
      $breadcrumb_link = get_field('breadcrumb_link');

      if ($breadcrumb_title && $breadcrumb_link) {
          echo '<span class="breadcrumbs-events"><a href="' . esc_url($breadcrumb_link) . '" class="breadcrumb-link">' . esc_html($breadcrumb_title) . '</a> / </span>';
      } else {
          echo '<span class="breadcrumbs-events breadcrumb-link">Виставки клубу / </span>';
      }
      ?>
      <br class="responsive-br">
      <span class="breadcrumbs-event breadcrumb-title">Ternopil - Ukraine WCF SHOW LICENSING</span>
    </p>
   </div>
  </div>
</section>

<section class="main-content-container">
<!-- Сeкція новини -->
<section class="section wrapper-news-section">
  <div class="container">    
    <div class="news-section__item">
      <div class="news-section__text-wrapper">            
        <div class="news-section__date">
          <p>
            <svg width="18" height="18">
              <use href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#icon-calendar">                
              </use>
            </svg>
            <?php the_field('news_date'); // Дата виставки ?>
          </p>
          <p>
            <svg width="18" height="18">
              <use href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#icon-clock">                
              </use>
            </svg>
            <?php the_field('news_time'); // Час виставки ?>
          </p>
        </div>
        <p class="news-section__name">
          <?php the_field('news_name'); // Назва виставки ?>
        </p>              
        <img class="news-section__img"
        src="<?php the_field('news_photo'); ?>" 
        alt="<?php the_field('news_name'); ?>" 
        /> 
        <p class="news-section__text">
          <?php the_field('news_text'); // Опис виставки ?>
        </p>
        <div class="news-section__first-button button red_medium_button">
          <a class="news-section__first-btn" href="/">
            <p class="news-section__first-button-text">
              Заповнити Анкету
            </p>
            <svg class="news-section__button-svg" width="16" height="15">
              <use href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#icon-arrow_left_up"></use>
            </svg>
          </a>      
        </div>
      </div>
    </div> 
  </div>      

<!-- Галерея з кнопкою -->
  <section class="section wrapper-news-section-gallary">
    <div class="container news-section__gallery">        
        <div class="gallery" id="gallery">
          <?php
            $images = get_field('news_gallery'); /* Отримуємо зображення з ACF */
            if($images):
              foreach($images as $index => $image):                
                $hidden_class = ($index >= 6) ? 'visually-hidden' : ''; /* клас visually-hidden до зображень після 6-го */
          ?>
          <div class="gallery-item <?php echo $hidden_class; ?>">
            <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>">
          </div>
          <?php 
                endforeach; 
            endif;
            ?>                               
        </div>
        <?php if ($images && count($images) > 6): ?>
            <div class="gallary-button button green_medium_button">
                <button id="load-more" class="gallary-section__last-btn">
                    <p class="gallary-section__last-btn-text">Показати більше</p>
                    <svg class="gallary-section__button-svg" width="16" height="15">
                        <use href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#icon-paw"></use>
                    </svg>
                </button>        
            </div>
        <?php endif; ?>
    </div>
  </section>
</section>
</section>
  <?php get_template_part('template-parts/join-us'); ?>
</main>
<?php get_footer(); ?>

