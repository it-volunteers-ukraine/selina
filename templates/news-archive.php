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
                <?php
                $is_all_active = !isset($_GET['filter_tag']) || empty($_GET['filter_tag']);
                $all_class = $is_all_active ? 'active' : '';
                $all_url = esc_url(get_permalink());
                ?>
                <a href="<?php echo $all_url; ?>" class="<?php echo $all_class; ?> word_all-btn">
                    <?php if ($is_all_active): ?>
                        <svg class="tag-svg sub-title-svg" width="16" height="14">
                            <use href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#icon-paw"></use>
                        </svg>
                    <?php endif; ?>
                    <?php the_field('word_all'); ?>  
                </a>

                <?php
                // Get all tags from the `news_tag` taxonomy
                $terms = get_terms(array(
                    'taxonomy' => 'news_tag',
                    'hide_empty' => true,
                ));

                // Get active tags from the GET parameter
                $active_tags = isset($_GET['filter_tag']) ? (array)$_GET['filter_tag'] : array();

                foreach ($terms as $term) {
                    $is_active = in_array($term->slug, $active_tags);

                    // Get color for each tag
                    $term_color = get_field('tag_color', 'news_tag_' . $term->term_id);
                    $term_color_style = $term_color ? 'style="background-color:' . esc_attr($term_color) . ';"' : '';
                
                    if ($is_active) {
                        $new_tags = array_diff($active_tags, array($term->slug));
                    } else {
                        $new_tags = array_merge($active_tags, array($term->slug));
                    }
                    $new_url = esc_url(add_query_arg('filter_tag', $new_tags ? $new_tags : null));
                
                    $active_class = $is_active ? 'active' : '';
                
                    echo '<a href="' . $new_url . '" class="' . $active_class . '" ' . $term_color_style . '>';

                        // Add SVG icon if the tag is active
                        if ($is_active) {
                            echo '<svg class="tag-svg sub-title-svg" width="16" height="14">
                                    <use href="' . get_template_directory_uri() . '/assets/images/sprite.svg#icon-paw"></use>
                                </svg>';
                            }
                            echo esc_html($term->name);
                    
                    echo '</a>';
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
                        'post_type' => array('news'), 
                        'posts_per_page' => 6, 
                        'orderby' => 'date', 
                        'order' => 'DESC', 
                        'paged' => 1,
                        'meta_query' => array(
                            array (
                                'key' => 'news_date_meta',
                                'value' => current_time('Ymd'),
                                'compare' => '<',
                                'type' => 'NUMERIC'
                            )
                        )
                    );
                    

                    if (!empty($active_tags)) {
                        $tax_queries = array('relation' => 'OR');
                    
                        foreach ($active_tags as $tag) {
                            $tax_queries[] = array(
                                'taxonomy' => 'news_tag',
                                'field'    => 'slug',
                                'terms'    => $tag,
                                'operator' => 'IN',
                            );
                        }
                    
                        $args['tax_query'] = $tax_queries;
                    }

                    $query = new WP_Query($args);

                    if ($query->have_posts()) { 
                        while ($query->have_posts()) {
                            $query->the_post();
                ?>
                    
                    <div class="one-card-news">
                        
                        <?php  get_template_part('template-parts/one-card-news'); ?>
                        
                        <div class="news-tags-container">
                            <?php
                            $tags = get_the_terms(get_the_ID(), 'news_tag');
                            if ($tags && !is_wp_error($tags)) {
                                foreach ($tags as $tag) {
                                    // Get color for each tag
                                    $term_color = get_field('tag_color', 'news_tag_' . $tag->term_id);
                                    $term_color_style = $term_color ? 'style="background-color:' . esc_attr($term_color) . ';"' : '';
                                    
                                    echo '<span class="news-tag" ' . $term_color_style . '>' . esc_html($tag->name) . '</span>';
                                }
                            }
                            ?>
                        </div>
                    </div>
                        
                <?php
                    }
                        wp_reset_postdata();
                    } else {
                        echo 'No posts found';
                    }    
                ?>
            </div>
            <button class="news_archive_btn button_green_new" id="load-more" data-page="1" data-max-page="<?php echo $query->max_num_pages; ?>" >
                <p class='load_more_news_archive_btn__text'>
                    <?php the_field('show_more_btn', 'option'); ?>
                </p>
                <svg class="icon-paw" width="16" height="15">
                    <use href="<?php echo get_template_directory_uri() ?>/assets/images/sprite.svg#icon-paw"></use>
                </svg>
            </button>
            <button class="news_archive_btn button_green_new hide_btn" id="hide" style="display: none;" ?>
                <p class='hide_news_archive_btn__text'>
                    <?php the_field('hide_btn', 'option'); ?>
                </p>
                <svg class="icon-paw" width="16" height="15">
                    <use href="<?php echo get_template_directory_uri() ?>/assets/images/sprite.svg#icon-paw"></use>
                </svg>
            </button>
        </div>
    </section>

    <?php get_template_part('template-parts/join-us'); ?>
</main>

<?php get_footer(); ?>
