<?php get_header() ?>

<section class="search-main">
    <div class="container">
        <?php if (have_posts()) : ?>
        <div class='search-wrapper'>
            <p class="search-results"><?php the_field('search-results', 'option') ?>
                <span class="search-world">
                    “<?php echo esc_html(get_search_query()); ?></span>”
            </p>
            <?php while (have_posts()) : the_post(); ?>
                <div class="searched-results">
                    <a class="searched"><?php the_title() ?></a>
                    <p class="searched-description"><?php the_field('description') ?></p>
                    <a style="color: #000" class="searched" href="<?php the_permalink() ?>"><?php the_field('search-link-read-more','option') ?></a>
                </div>
            <?php endwhile; ?>
            <?php else : ?>
                <div class='search-wrapper'>
                    <p class="search-results"><?php the_field('nothing-found-search', 'option') ?>
                        <span class="search-world">
                    “<?php echo esc_html(get_search_query()); ?></span>”
                    </p>
                </div>
            <?php endif; ?>
        </div>
</section>
<?php get_template_part('template-parts/join-us')?>
<?php get_footer() ?>
