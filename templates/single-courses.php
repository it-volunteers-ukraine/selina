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
                <a class="sub-title primary" href="<?php the_field('course-page_breadcrumbs_page_name'); ?>">
                    <svg class="icon-paw" width="18" height="16">
                        <use href="<?php echo get_template_directory_uri() ?>/assets/images/sprite.svg#icon-paw">
                        </use>
                    </svg>
                        <?php the_field('course-page_breadcrumbs_page_name'); ?>
                </a>
                <a class="sub-title primary" href="<?php the_field('course-page_breadcrumbs_theme'); ?>">
                    <svg class="icon-paw" width="18" height="16">
                        <use href="<?php echo get_template_directory_uri() ?>/assets/images/sprite.svg#icon-paw">
                        </use>
                    </svg>
                        <?php the_field('course-page_breadcrumbs_theme_name'); ?>
                </a>
            </div>
        </div>
    </section>

    <section class="section description-course-section">
        <div class="container">
            <?php 
                $text_description1 = get_field('course-page_description-text1');
                if( $text_description1 ): ?>
            <p class="description-course-description description-course-description1">
                <?php echo $text_description1; ?>
            </p>
            <?php endif; ?>
            <?php 
                $image = get_field('course-page_description-img');
                if( $image ): ?>
            <div class="description-course-img">
                <img src="<?php echo $image; ?>" alt="image">
            </div>
            <?php endif; ?>
            <div class="description-course-section__wrapper">
            <?php 
                $text_description1 = get_field('course-page_description-text1');
                if( $text_description1 ): ?>
            <p class="description-course-description description-course-description-deck">
                <?php echo $text_description1; ?>
            </p>
            <?php endif; ?>
            <?php 
                $text_description2 = get_field('course-page_description-text2');
                if( $text_description2 ): ?>
            <p class="description-course-description description-course-description2">
                <?php echo $text_description2; ?>
            </p>
            <?php endif; ?>
            </div>

        <a href="<?php the_field('course-page_description-btn-link'); ?>" target='_blank'>
            <div class="description-course-section__calendar-card-button red_medium_button">
                <p class='description-course-section__calendar-button-text'>
                    <?php the_field('course-page_description-btn-text'); ?>
                </p>
                <svg class="icon-paw" width="20" height="20">
                    <use href="<?php echo get_template_directory_uri() ?>/assets/images/sprite.svg#arrow-up-right"></use>
                </svg>
            </div>
        </a>
        </div>
    </section>

    <?php get_template_part('template-parts/join-us') ?>
</main>

<?php get_footer(); ?>