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
                <a href="<?php echo esc_url(get_permalink()); ?>" class="<?php echo (!isset($_GET['filter_tag']) || empty($_GET['filter_tag'])) ? 'active' : ''; ?> word_all-btn"><?php the_field('word_all'); ?></a>

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
                
                    $term_color = get_field('tag_color', 'news_tag_' . $term->term_id);
                    $term_color_style = $term_color ? 'style="background-color:' . esc_attr($term_color) . ';"' : '';
                
                    if ($is_active) {
                        $new_tags = array_diff($active_tags, array($term->slug));
                    } else {
                        $new_tags = array_merge($active_tags, array($term->slug));
                    }
                    $new_url = esc_url(add_query_arg('filter_tag', $new_tags ? $new_tags : null));
                
                    $active_class = $is_active ? 'active' : '';
                
                    echo '<a href="' . $new_url . '" class="' . $active_class . '" ' . $term_color_style . '>' . esc_html($term->name) . '</a>';
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
                        'post_type' => array('news', 'courses'), 
                        'posts_per_page' => -1, 
                        'orderby' => 'date', 
                        'order' => 'DESC', 
                    );

                    if (!empty($active_tags)) {
                        $tax_queries = array('relation' => 'OR');
                    
                        foreach ($active_tags as $tag) {
                            $tax_queries[] = array(
                                'taxonomy' => 'news_tag',
                                'field'    => 'slug',
                                'terms'    => $tag,
                                'operator' => 'IN', // Check for posts with specific tag
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
                            <?php get_template_part('template-parts/one-card-news');?>
                        </div>
                    
                <?php
                    }
                        wp_reset_postdata();
                    } else {
                        echo 'No posts found';
                    }    
                ?>
            </div>
        </div>
    </section>

    <?php get_template_part('template-parts/join-us'); ?>
</main>

<?php get_footer(); ?>
