<?php
/*
Template Name: Education
*/
get_header();

?>

<main class="education">
    <section class="learning-section">
        <style>
            @media screen and (min-width: 1439px) {
                .learning-section {
                    background-image: url("<?php the_field('upper-section__background', 'option') ?>");
                }
            }
        </style>

        <div class="container">
            <h2 class="section_heading learning-section_heading"><?php the_title() ?></h2>
            <div class="sub-titles">
                <a class="sub-title primary" href="#anatomy">
                    <svg class="icon-paw" width="18" height="16">
                        <use href="<?php echo get_template_directory_uri() ?>/assets/images/sprite.svg#icon-paw">
                        </use>
                    </svg>
                    <?php the_field('first-sub_head'); ?>
                </a>

                <a class="sub-title primary" href="#veterinary">
                    <svg class="icon-paw" width="18" height="16">
                        <use href="<?php echo get_template_directory_uri() ?>/assets/images/sprite.svg#icon-paw">
                        </use>
                    </svg>
                    <?php the_field('second-sub_head'); ?>
                </a>
                <a class="sub-title primary" href="#zopsychology">
                    <svg class="icon-paw" width="18" height="16">
                        <use href="<?php echo get_template_directory_uri() ?>/assets/images/sprite.svg#icon-paw">
                        </use>
                    </svg>
                    <?php the_field('third-sub_head'); ?>
                </a>

                <a class="sub-title primary" href="#literature">
                    <svg class="icon-paw" width="18" height="16">
                        <use href="<?php echo get_template_directory_uri() ?>/assets/images/sprite.svg#icon-paw">
                        </use>
                    </svg>
                    <?php the_field('fourth-sub_head'); ?>
                </a>
            </div>
        </div>
    </section>

    <div class="container">
        <section id="anatomy" class="section anatomy">
            <h3 class="section_heading education-general">
                <svg class="icon education-icon" width="41" height="37">
                    <use href="<?php echo get_template_directory_uri() ?>/assets/images/sprite.svg#icon-La_cat">
                    </use>
                </svg>
                <?php the_field('anatomy-title'); ?>
            </h3>
            <p class="education-description"><?php the_field('anatomy-description'); ?></p>

            <div id="more-courses" class="education-cards">
                <?php
                $args = array(
                    'post_type' => 'courses',
                    'posts_per_page' => 2,
                    'order' => 'ASC',
                );

                $loop = new WP_Query($args);

                if ($loop->have_posts()) :
                    while ($loop->have_posts()) : $loop->the_post(); ?>
                        <?php get_template_part('template-parts/course-card')?>
                    <?php endwhile;
                endif;
                wp_reset_postdata();
                ?>
            </div>
            <div class="button-flex">
                <button id="load-more-courses"
                        data-post-type="courses"
                        data-post-taxonomy="resources_categories"
                        data-post-terms="anatomy"
                        class="button button_green_new show-btn education-button">
                    <?php the_field('show-more', 'option') ?>
                    <svg width="18" height="17">
                        <use href="<?php echo get_template_directory_uri() ?>/assets/images/sprite.svg#icon-paw">
                        </use>
                    </svg>
                </button>
            </div>
        </section>
    </div>

    <section id="veterinary" class="section veterinary primary-background">
        <div class="container">
            <h3 class="section_heading education-general">
                <svg class="icon education-icon" width="41" height="37">
                    <use href="<?php echo get_template_directory_uri() ?>/assets/images/sprite.svg#icon-La_cat">
                    </use>
                </svg>
                <?php the_field('veterinary-title'); ?>
            </h3>
            <p class="education-description"><?php the_field('veterinary-description'); ?></p>
            <div id="more-vebinars" class="education-cards">
                <?php
                $args = array(
                    'post_type' => 'courses',
                    'order' => 'ASC',
                    'posts_per_page' => 2,
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'resources_categories',
                            'field' => 'slug',
                            'terms' => 'vebinars'
                        )
                    )
                );

                $loop = new WP_Query($args);

                if ($loop->have_posts()) :
                    while ($loop->have_posts()) : $loop->the_post(); ?>
                        <?php get_template_part('template-parts/education-card') ?>
                    <?php endwhile;
                endif;
                wp_reset_postdata();
                ?>
            </div>
            <div class="button-flex">
                <button id="load-more-vebinars"
                        data-post-type="courses"
                        data-post-taxonomy="resources_categories"
                        data-post-terms="vebinars"
                        class="button button_green_new show-btn education-button">
                    <?php the_field('show-more', 'option') ?>
                    <svg width="18" height="17">
                        <use href="<?php echo get_template_directory_uri() ?>/assets/images/sprite.svg#icon-paw">
                        </use>
                    </svg>
                </button>
            </div>
        </div>
    </section>


    <section id="zopsychology" class="section">
        <div class="container">
            <h3 class="section_heading education-general">
                <svg class="icon education-icon" width="41" height="37">
                    <use href="<?php echo get_template_directory_uri() ?>/assets/images/sprite.svg#icon-La_cat">
                    </use>
                </svg>
                <?php the_field('zopsychology-title'); ?>
            </h3>
            <p class="education-description"><?php the_field('zopsychology-description'); ?></p>
            <div id="more-zoopsychology" class="education-cards">
                <?php
                $args = array(
                    'post_type' => 'courses',
                    'order' => 'ASC',
                    'posts_per_page' => 2,
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'resources_categories',
                            'field' => 'slug',
                            'terms' => 'zoopsychology'
                        )
                    )
                );

                $loop = new WP_Query($args);

                if ($loop->have_posts()) :
                    while ($loop->have_posts()) : $loop->the_post(); ?>
                        <?php get_template_part('template-parts/education-card') ?>
                    <?php endwhile;
                endif;
                wp_reset_postdata();
                ?>
            </div>
            <div class="button-flex">
                <button id="load-more-zoopsychology"
                        data-post-type="courses"
                        data-post-taxonomy="resources_categories"
                        data-post-terms="zoopsychology"
                        class="button button_green_new show-btn education-button">
                    <?php the_field('show-more', 'option') ?>
                    <svg width="18" height="17">
                        <use href="<?php echo get_template_directory_uri() ?>/assets/images/sprite.svg#icon-paw">
                        </use>
                    </svg>
                </button>
            </div>
        </div>
    </section>

    <section id="literature" class="section primary-background">
        <div class="container">
            <h3 class="section_heading education-general">
                <svg class="icon education-icon" width="41" height="37">
                    <use href="<?php echo get_template_directory_uri() ?>/assets/images/sprite.svg#icon-La_cat">
                    </use>
                </svg>
                <?php the_field('literature-title'); ?>
            </h3>
            <p class="education-description"><?php the_field('literature-description'); ?></p>
            <div id="more-books" class="education-cards">
                <?php
                $args = array(
                    'post_type' => 'courses',
                    'order' => 'ASC',
                    'posts_per_page' => 2,
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'resources_categories',
                            'field' => 'slug',
                            'terms' => 'literature'
                        )
                    )
                );

                $loop = new WP_Query($args);

                if ($loop->have_posts()) :
                    while ($loop->have_posts()) : $loop->the_post(); ?>
                        <?php get_template_part('template-parts/education-card') ?>
                    <?php endwhile;
                endif;
                wp_reset_postdata();
                ?>
            </div>
            <div class="button-flex">
                <button id="load-more-books"
                        data-post-type="courses"
                        data-post-taxonomy="resources_categories"
                        data-post-terms="literature"
                        class="button button_green_new show-btn education-button">
                    <?php the_field('show-more', 'option') ?>
                    <svg width="18" height="17">
                        <use href="<?php echo get_template_directory_uri() ?>/assets/images/sprite.svg#icon-paw">
                        </use>
                    </svg>
                </button>
            </div>
        </div>
    </section>
    <?php get_template_part('template-parts/join-us') ?>
</main>


<?php get_footer(); ?>
