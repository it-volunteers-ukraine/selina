<?php
/*
 * Template post type: breed
 * Template name: breed
 */
get_header();
?>
<main> 
    <section class="section single-breed-first-section">
        <style>
            @media screen and (min-width: 1439px) {
                .single-breed-first-section {
                    background-image: url("<?php the_field('upper-section__background', 'option') ?>");
                }
            }
        </style>
         
        <div class="container">
                    <div class="container">
           <div class="single-breed__breadcrumbs">
            <a href="<?php the_field('breed-page_breadcrumbs_page'); ?>"><?php the_field('breed-page_breadcrumbs_page_name'); ?></a>
        <?php the_field('breed_name'); ?>
      </div>
            <h3 class="section_heading single-breed-first-section__heading">
                <?php the_field('breed_name'); ?>
            </h3>
            <div class="single-breed-first-section__subtitle-heading-wrapper">
                <a class="single-breed-first-section__subtitle-heading" href="#about-single-breed">
                    <svg class="single-breed-first-section__heading-svg" width="14" height="12">
                        <use href="<?php echo get_template_directory_uri() ?>/assets/images/sprite.svg#icon-paw">
                        </use>
                    </svg>
                    <p><?php the_field('breed-page_about-title'); ?></p>
                </a>
                <a class="single-breed-first-section__subtitle-heading" href="#single-breed-our-cats">
                    <svg class="single-breed-first-section__heading-svg" width="14" height="12">
                        <use href="<?php echo get_template_directory_uri() ?>/assets/images/sprite.svg#icon-paw">
                        </use>
                    </svg>
                    <p><?php the_field('breed-page_our-cats-title'); ?></p>
                </a>
                <a class="single-breed-first-section__subtitle-heading" href="#single-breed-free-cats">
                    <svg class="single-breed-first-section__heading-svg" width="14" height="12">
                        <use href="<?php echo get_template_directory_uri() ?>/assets/images/sprite.svg#icon-paw">
                        </use>
                    </svg>
                    <p><?php the_field('breed-page_free-cats-title'); ?></p>
                </a>
            </div>
        </div>
    </section>
    <?php get_template_part('template-parts/join-us'); ?>
</main>
<?php get_footer(); ?>