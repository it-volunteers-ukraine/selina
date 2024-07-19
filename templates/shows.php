<?php
/*
Template Name: Show
*/
get_header();

?>

    <main>
    <section class="section heading-section-shows">
            <div class="heading-section-shows__background-img">
                <img src="<?php the_field('upper-section__background', 'option'); ?>" alt="cat">
            </div>
            <div class="container">
                <div class="heading-section-shows__wrapper">
                    <div class="heading-section-shows__list-shows">
                        <h2><?php the_field('list-shows'); ?></h2>
                    </div>
                    <div class="heading-section-shows__nav">
                        <div class="heading-section-shows__nav-li">
                            <a class="heading-section-shows__nav-li-link" href="#webinars">
                                <div class="heading-section-shows__nav-li-icon">
                                    <svg class="icon-paw" width="14" height="12">
                                        <use href="<?php echo get_template_directory_uri() ?>/assets/images/sprite.svg#icon-paw">
                                        </use>
                                    </svg>
                                </div>
                                <div class="heading-section-shows__nav-li-text">
                                    <p><?php the_field('nav-shows-1'); ?></p>
                                </div>
                            </a>
                        </div>
                        <div class="heading-section-shows__nav-li">
                            <a class="heading-section-shows__nav-li-link" href="#presentations">
                                <div class="heading-section-shows__nav-li-icon">
                                    <svg class="icon-paw" width="14" height="12">
                                        <use href="<?php echo get_template_directory_uri() ?>/assets/images/sprite.svg#icon-paw">
                                        </use>
                                    </svg>
                                </div>
                                <div class="heading-section-shows__nav-li-text">
                                    <p><?php the_field('nav-shows-2'); ?></p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        
        <?php get_template_part('template-parts/join-us') ?>
    </main>

<?php get_footer(); ?>