<?php
/*
Template Name: news-archive
*/
get_header();
?>

<main class="news-archive">
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
                    <?php the_field('archive__heading'); ?>
                </h2> 
            </div>
        </div>    
    </section>
    <section class="tags-section section">
        <div class="container">
            <div class="filter-buttons">
                <a href="<?php echo esc_url(get_permalink()); ?>" class="<?php echo (!isset($_GET['filter_tag']) || empty($_GET['filter_tag'])) ? 'active' : ''; ?>"><?php the_field('word_all'); ?></a>
                
                <?php
                // Отримуємо всі теги таксономії `news_tag`
                $terms = get_terms(array(
                    'taxonomy' => 'news_tag',
                    'hide_empty' => false,
                ));

                // Виводимо кнопки для кожного тегу
                foreach ($terms as $term) {
                    $active_class = (isset($_GET['filter_tag']) && $_GET['filter_tag'] == $term->slug) ? 'active' : '';
                    echo '<a href="' . esc_url(add_query_arg('filter_tag', $term->slug)) . '" class="' . $active_class . '">' . esc_html($term->name) . '</a>';
                }
                
                ?>
            </div>
        </div>
    </section>
    <section class="posts-section section">
        <div class="container">
            <div class="posts-section__wrapper">
                <?php 
                    $args = array(
                        'post_type' => array('news', 'education'), 
                        'posts_per_page' => -1, 
                    );
                    
                    // Перевіряємо, чи є активний фільтр по тегу
                    if (isset($_GET['filter_tag']) && !empty($_GET['filter_tag'])) {
                        $args['tax_query'] = array(
                            array(
                                'taxonomy' => 'news_tag', 
                                'field'    => 'slug',
                                'terms'    => $_GET['filter_tag'], // Значення тегу з параметра GET
                            ),
                        );
                    }
                    
                    $query = new WP_Query($args);
                    
                    if ($query->have_posts()) { 
                        while ($query->have_posts()) {
                            $query->the_post();
                ?>
                        <div class="one-card-news">
                            <?php get_template_part('template-parts/one-card-news');?>
                            
                        </div>
                    
                <?php
                    }
                        wp_reset_postdata(); 
                    } else {
                        echo 'Пости не знайдено';
                    }
                ?>
            </div>
    </section>

    <?php get_template_part('template-parts/join-us'); ?>
</main>

<?php get_footer(); ?>