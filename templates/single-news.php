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
  <div class="container heading-container">
    <div class="heading-section-news__background-img">
      <img src="<?php the_field('upper-section__background', 'option'); ?>" alt="Background image with cat">
    </div>
    
    <?php
    $news_date_str = get_field('news_date_meta');
    $current_date = new DateTime();

    if ($news_date_str) {
        $news_date = new DateTime($news_date_str); 

        if ($news_date >= $current_date) {
            ?>
            <h2 class="heading section_heading">
              <?php the_field('list-event');?>
            </h2>
            <?php
        } else {
            ?>
            <h2 class="heading section_heading">
              <?php the_field('archive__heading');?>
            </h2>
            <?php
        }
    }
    ?>
  </div>
</section>

  <!-- Хлібні крихти -->
<section class="section wrapper-breadcrumbs-section">
  <div class="container breadcrumbs-container">
    <div class="breadcrumbs-section">
    <p>
      <?php
      $breadcrumb_title = get_field('breadcrumb_title');
      $breadcrumb_link = get_field('breadcrumb_link');

      if ($breadcrumb_title && $breadcrumb_link) {
          echo '<span class="breadcrumbs-events">
            <a href="' . esc_url($breadcrumb_link) . '" class="breadcrumb-link">' . esc_html($breadcrumb_title) .'</a> <span class="breadcrumbs-slash">/</span> 
          </span>';
      }
      ?>
      <br class="responsive-br">
      <span class="breadcrumbs-event breadcrumb-title">
        <?php the_field('news_name'); ?>
      </span>
    </p>
   </div>
  </div>
</section>

<!-- Сeкція новини -->
<section class="section wrapper-news-section">
  <div class="container news-container">    
    <div class="news-section__item">
      <div class="news-section__text-wrapper">

      <!--- DATE --->
      <?php
      $news_date = get_field('news_date_meta');
      $news_date_start = get_field('news_date_meta-start');
      if (!empty(get_field('news_date_meta'))):
      ?>
      <div class="news-section__date">
        <svg width="18" height="18"> 
          <use href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#calendar-icon"></use> 
        </svg> 
        <p>
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
     
        
      <!--- TIME --->
      <?php
        $time_str = get_field('news_time_meta');
        if(!empty($time_str)):
       ?>
      <div class="news-section__time">          
            <svg width="18" height="18">
              <use href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#clock-icon"></use>
            </svg>
          <p>
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

      <!--- NAME --->
        <p class="news-section__name">
          <?php the_field('news_name'); ?>
        </p>

      <!--- IMAGE --->      
      <div class="news-section__img-wrapper">
        <img class="news-section__img" src="<?php the_field('news_photo'); ?>" alt="<?php the_field('news_name'); ?>" />  
      </div> 
      
      <!--- TEXT --->   
        <p class="news-section__text">
          <?php the_field('news_text_full'); ?>
        </p>

      <!--- BUTTON --->
        <?php if ( get_field('form_link') ) : ?>
          <div class="news-section__first-button button red_medium_button">
            <a class="news-section__first-btn" href="<?php the_field('form_link'); ?>">
              <p class="news-section__first-button-text">
                <?php the_field('form_button_text'); ?>
              </p>
              <svg class="news-section__button-svg" width="16" height="15">
                <use href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#icon-arrow_left_up"></use>
              </svg>
            </a>      
          </div>        
        <?php endif; ?>
      </div>
    </div> 
  </div>      

<!-- Галерея з кнопкою -->
  <section class="section wrapper-news-section-gallary">
    <div class="container news-section__gallery">        
        <div class="gallery" id="gallery">
          <?php
            $images = get_field('news_gallery');
            if($images):
              foreach($images as $index => $image):                
                $hidden_class = ($index >= 6) ? 'visually-hidden' : '';
          ?>
          <div class="gallery-item <?php echo $hidden_class; ?>">
            <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>">
          </div>
          <?php 
                endforeach; 
            endif;
            ?>                               
        </div>
        <?php 
        $show_more_text = get_field('gallery_button_text');
        $show_less_text = get_field('gallery_button_text_show_less');
        
        if ($images && count($images) > 6): ?>
            <div class="gallary-button button green_medium_button">
                <button id="load-more" class="gallary-section__last-btn" 
                data-show-more="<?php echo esc_attr($show_more_text); ?>" 
                data-show-less="<?php echo esc_attr($show_less_text); ?>">
                    <p class="gallary-section__last-btn-text"><?php echo esc_html($show_more_text); ?></p>
                    <svg class="gallary-section__button-svg" width="16" height="15">
                        <use href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#icon-paw"></use>
                    </svg>
                </button>        
            </div>
        <?php endif; ?>
    </div>
  </section>
</section>

  <?php get_template_part('template-parts/join-us'); ?>
</main>
<?php get_footer(); ?>

