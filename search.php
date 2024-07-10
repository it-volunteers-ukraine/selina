<?php get_header() ?>

<div class="container">
    <?php
    $s = get_search_query();
    $args = array(
        's' => $s,
        'post_type' => 'all_partners',
    );
    $the_query = new WP_Query($args);

    if ($the_query->have_posts()) {
        _e("<div class='search-wrapper' style='padding-top: 35px'>
    <h2 style='font-weight:bold;color:#000;'>Results search for: " . get_query_var('s') . "</h2>
    </div>");
        while ($the_query->have_posts()) {
            $the_query->the_post();
            ?>
            <div class="search-results" style="padding-bottom: 220px">
                <li><?php the_title(); ?></li>
            </div>
            <?php
        }
    } else {
        ?>
        <div class='search-wrapper' style='padding-top: 35px'>
            <p style='font-weight:bold;color:#000;padding-bottom:222px'>Nothing Found</p>
        </div>
    <?php } ?>
</div>

<?php get_footer() ?>
