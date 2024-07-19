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

        <section class='section webinars' id='webinars'>
            <div class="container">
                <div class="webinars__heading-container">
                    <span class="list-webinars__La_cat"> 
                        <svg width="24" height="24"> 
                            <use href="<?php bloginfo( 'template_url' ); ?>/assets/images/sprite.svg#icon-La_cat"></use> 
                        </svg> 
                    </span> 
                    <h2 class="webinars__heading">
                        <?php the_field('webinars__heading'); ?>
                    </h2>
                </div>
                <p class=webinars__description>
                    <?php the_field('webinars__description'); ?>
                </p>
                <div class="webinars__card"></div>
                <a href="">
                    <div class="webinars__last-button">
                        <p class=webinars__last-button-text>
                            <?php the_field('webinars__last-button-text'); ?>
                        </p>
                        <svg class="icon-paw" width="17" height="15">
                            <use href="<?php echo get_template_directory_uri() ?>/assets/images/sprite.svg#icon-paw">
                            </use>
                        </svg>
                    </div>
                </a>
            </div>
        </section>

        <section class='section presentations' id='presentations'>
            <div class="container">
                <div class="presentations__heading-container">
                    <span class="list-presentations__La_cat"> 
                        <svg width="24" height="24"> 
                            <use href="<?php bloginfo( 'template_url' ); ?>/assets/images/sprite.svg#icon-La_cat"></use> 
                        </svg> 
                    </span> 
                    <h2 class="presentations__heading">
                        <?php the_field('presentations__heading'); ?>
                    </h2>
                </div>
                <div class="presentations__card"></div>
                <div class="presentations__card"></div>
                <div class="presentations__card"></div>
                <div class="presentations__card"></div>
                <a href="">
                    <div class="webinars__last-button">
                        <p class=webinars__last-button-text>
                            <?php the_field('webinars__last-button-text'); ?>
                        </p>
                        <svg class="icon-paw" width="17" height="15">
                            <use href="<?php echo get_template_directory_uri() ?>/assets/images/sprite.svg#icon-paw">
                            </use>
                        </svg>
                    </div>
                </a>
            </div>
        </section>
        
        <?php get_template_part('template-parts/join-us') ?>
    </main>

<?php get_footer(); ?>