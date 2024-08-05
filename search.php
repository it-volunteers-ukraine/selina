<?php get_header() ?>

<div class="container">
    <?php if (have_posts()) : ?>
        <div class='search-wrapper' style='padding-top: 35px'>
            <h2 style='font-weight:bold;color:#000;'>Results search for: <?php echo esc_html(get_search_query()); ?></h2>
        </div>
        <?php while (have_posts()) : the_post(); ?>
            <ul class="search-results" style="padding-bottom: 220px">
                <li>
                    <a href="<?php the_permalink() ?>"><?php the_title() ?></a>
                </li>
            </ul>
        <?php endwhile; ?>
    <?php else : ?>
        <div class='search-wrapper' style='padding-top: 35px'>
            <p style='font-weight:bold;color:#000;padding-bottom: 321px'>Nothing found: <?php echo esc_html(get_search_query()); ?></>
        </div>
    <?php endif; ?>
</div>


<?php get_footer() ?>
