<?php
/*
 * Template Post Type: news
 * Template Name: Single news
 */
get_header();
?>

<main>
  <!-- Заголово секції -->
<section class="heading-section-news">
    <div class="heading-section-news__background-img">
      <img src="http://selina.it-volunteers.com/wp-content/uploads/2024/07/cat_upper_section_bg.jpg" alt="Background image with cat">
    </div>      
    <h2 class="heading section_heading">
      Події
    </h2>
</section>

  <!-- Хлібні крихти -->
<section class="wrapper-breadcrumbs-section">
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
</section>

<!-- Сeкція новини -->
<section class="wrapper-news-section">
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
    <section class="wrapper-news-section-gallary">
    <div class="news-section__gallery">        
        <div class="gallery" id="gallery">
            <?php
            $images = get_field('news_gallery'); // Отримуємо зображення з ACF
            $size = 'full'; // (thumbnail, medium, large, full or custom size)

            // Перевірка, чи є зображення
            if ($images) {                
                foreach (array_slice($images, 0, 6) as $image) {
                    // Виведення кожного зображення
                    echo '<div class="gallery-item">';
                    echo '<a href="' . esc_url($image['url']) . '" data-fancybox="gallery">';
                    echo '<img src="' . esc_url($image['sizes']['medium']) . '" alt="' . esc_attr($image['alt']) . '">';
                    echo '</a>';
                    echo '</div>';
                }
                echo '</div>';
            } else {
                echo '<p>No images found.</p>';
            }            
            ?>
        </div>
        <?php if ($images && count($images) > 4): ?>
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
    <?php get_template_part('template-parts/join-us'); ?>
</main>
<?php
get_footer();
?>

<script>
jQuery(document).ready(function ($) {
  var images = <?php echo json_encode($images); ?>;
  var visibleImagesCount = 6; // Кількість зображень, що показуються на початку
  
  // Обробник для кнопки "Показати більше"
  $('#load-more').on('click', function () {
    var images = <?php echo json_encode($images); ?>;
    var startIndex = $('.gallery a').length;
    var endIndex = startIndex + 5;
    var html = '';

    for (var i = startIndex; i < endIndex && i < images.length; i++) {
      html += '<a href="' + images[i].url + '">';
      html += '<img src="' + images[i].sizes.thumbnail + '" alt="' + images[i].alt + '" />';
      html += '</a>';
    }
    
    $('.gallery').append(html);
    visibleImagesCount = endIndex; // Оновлення кількості видимих зображень     

  });
});
</script>
