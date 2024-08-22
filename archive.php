<?php

get_header();

?>
    <main class="archive" id="archive">
        <section class="upper-section section" id="archive-upper">
            <style>
                @media screen and (min-width: 1439px) {
                    .upper-section {
                    background-image: url("<?php the_field('upper-section__background', 'option') ?>"); 
                    }
                }
            </style> 
            <div class="container">
                <div class="upper-section__banner">
                    <h2 class="upper-section__heading section_heading">
                        <?php the_field('archive__heading', 'option'); ?>
                    </h2> 
                </div>
            </div>    
        </section>
        <section class="tags-section section">
            <div class="container">
                
                <ul class="tags-section__list">
                    <?php
                    // Отримання поточного URL
                    $current_url = home_url(add_query_arg(null, null));

                    // Перевіряємо, чи це архів кастомного типу записів 'news'
                     $is_news_archive = is_post_type_archive('news');
                    $current_tag = get_queried_object();

                    // Отримання URL архіву кастомного типу записів 'news'
                    $all_posts_url = get_post_type_archive_link('news');

                    // Додаємо кнопку "Всі"
                    // Якщо не вибраний жоден тег, робимо цю кнопку активною
                    $all_active_class = ($is_news_archive && !is_tax('news_tag')) ? 'active' : '';
                    echo '<li><a href="' . esc_url($all_posts_url) . '" class="' . $all_active_class . '">Всі</a></li>';

                    // Отримання всіх тегів з таксономії 'news_tag'
                    $terms = get_terms(array(
                        'taxonomy'   => 'news_tag',
                        'hide_empty' => true, // Показувати лише ті теги, які прив'язані до постів
                    ));

                    if (!empty($terms) && !is_wp_error($terms)) {
                        foreach ($terms as $term) {
                            // Отримання URL для фільтрації постів по тегу
                            $term_link = get_term_link($term);
                            // Додаємо клас "active", якщо це поточний тег
                            $active_class = ($current_tag && $current_tag->term_id == $term->term_id) ? 'active' : '';
                            echo '<li><a href="' . esc_url($term_link) . '" class="' . $active_class . '">' . esc_html($term->name) . '</a></li>';
                        }
                    } else {
                        echo '<li>Немає тегів.</li>';
                    }
                    ?>
                </ul>
                
            </div>
        </section>
        <section class="news-section section">
            <div class="container">
                <div class="news-section__wrapper">

                    <?php if ( have_posts() ) : ?>
                        <?php while ( have_posts() ) : the_post(); ?>
                            <article id="post-<?php the_ID(); ?>" class="news-section__post">
                                <?php get_template_part('template-parts/one-card-news') ?>
                                
                                <!-- <div class="entry-meta">
                                    <span class="tags">
                                        <?php echo get_the_term_list( get_the_ID(), 'news_tag', 'Теги: ', ', ' ); // Теги поста ?>
                                    </span>
                                </div> -->
                            </article>
                        <?php endwhile; ?>

                        <?php the_posts_pagination(); ?>

                    <?php else : ?>
                        <p>Немає записів для цього архіву.</p>
                    <?php endif; ?>
                </div>
            </div>
        </section>
        <?php get_template_part('template-parts/join-us') ?>
    </main>

<?php get_footer(); ?>