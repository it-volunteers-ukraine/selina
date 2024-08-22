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
                    // Get the current tags from the URL
                    $current_tags = isset($_GET['news_tag']) ? explode(',', $_GET['news_tag']) : [];

                    // Get the URL of the archive for the custom post type 'news'
                    $all_posts_url = get_post_type_archive_link('news');

                    // Check if any tag is active on the current page
                    $current_term = get_queried_object();
                    $is_active_term = $current_term && isset($current_term->taxonomy) && $current_term->taxonomy === 'news_tag';
                    $has_active_tag = !empty($current_tags) || $is_active_term;

                    // Add the "All" button
                    $all_active_class = $has_active_tag ? '' : 'active';
                    echo '<li><a href="' . esc_url($all_posts_url) . '" class="' . $all_active_class . '">Всі</a></li>';

                    // Get all tags from the 'news_tag' taxonomy
                    $terms = get_terms(array(
                        'taxonomy'   => 'news_tag',
                        'hide_empty' => true, // Show only tags that are attached to posts
                    ));

                    if (!empty($terms) && !is_wp_error($terms)) {
                        foreach ($terms as $term) {
                            // Check if this tag is active
                            $is_active = $is_active_term && $term->term_id == $current_term->term_id || in_array($term->slug, $current_tags);
                            $active_class = $is_active ? 'active' : '';

                            // Generate a new URL with the tag added or removed
                            $new_tags = $is_active ? array_diff($current_tags, [$term->slug]) : array_merge($current_tags, [$term->slug]);

                            // Create a new URL with the updated tag list
                            $new_url = add_query_arg('news_tag', implode(',', $new_tags), $all_posts_url);
                            echo '<li><a href="' . esc_url($new_url) . '" class="' . $active_class . '">' . esc_html($term->name) . '</a></li>';
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

                    <?php else : ?>
                        <p>Немає записів для цього архіву.</p>
                    <?php endif; ?>
                </div>
            </div>
        </section>
        <?php get_template_part('template-parts/join-us') ?>
    </main>

<?php get_footer(); ?>