<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package wp-it-volunteers
 */

get_header();
?>

    <main id="primary" class="site-main">
        <?php
        while (have_posts()) :
            the_post();
            ?>
            <div class="container">
                <div class="searched-post" style="margin-top: 50px;margin-bottom: 50px">
                    <div class="post-image" style="margin-bottom: 20px; width:240px"><?php the_content(); ?></div>
                    <div class="post-title" style="margin-bottom: 30px"><?php the_title(); ?></div>
                    <div class="post-description" style="margin-bottom: 30px"><?php the_excerpt(); ?></div>
                    <?php get_template_part('template-parts/one-card-breeder') ?>
                </div>
            </div>

            <?php
            get_template_part('template-parts/content', get_post_type());
//            the_post_navigation(
//                array(
//                    'prev_text' => '<span class="nav-subtitle">' . esc_html__('Previous:', 'wp-it-volunteers') . '</span> <span class="nav-title">%title</span>',
//                    'next_text' => '<span class="nav-subtitle">' . esc_html__('Next:', 'wp-it-volunteers') . '</span> <span class="nav-title">%title</span>',
//                )
//            );

            // If comments are open or we have at least one comment, load up the comment template.
//    if (comments_open() || get_comments_number()) :
//        comments_template();
//    endif;

        endwhile; // End of the loop.
        ?>

    </main><!-- #main -->

<?php
get_sidebar();
get_footer();
