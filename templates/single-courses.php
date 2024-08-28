<?php
/*
 * Template post type: courses
 * Template name: courses
 */
get_header();
?>

<main class="course">
    <section class="top-course-section">
        <style>
            @media screen and (min-width: 1439px) {
                .top-course-section {
                    background-image: url("<?php the_field('upper-section__background', 'option') ?>");
                }
            }
        </style>

        <div class="container">
            <h2 class="section_heading top-course-section_heading"><?php the_title() ?></h2>
            <div class="sub-titles">
                <a class="sub-title primary" href="#">
                    <svg class="icon-paw" width="18" height="16">
                        <use href="<?php echo get_template_directory_uri() ?>/assets/images/sprite.svg#icon-paw">
                        </use>
                    </svg>
                    Курси
                </a>
                <a class="sub-title primary" href="#">
                    <svg class="icon-paw" width="18" height="16">
                        <use href="<?php echo get_template_directory_uri() ?>/assets/images/sprite.svg#icon-paw">
                        </use>
                    </svg>
                    Анатомія
                </a>
            </div>
        </div>
    </section>

    <section class="section description-course-section">
        <div class="container"></div>
    </section>

    <?php get_template_part('template-parts/join-us') ?>
</main>

<?php get_footer(); ?>