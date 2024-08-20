<?php
/*
 * Template post type: breeders
 * Template name: breeders
 */
get_header();
?>
<main>
    
    <section class="section single-breeder-first-section">
        <style>
            @media screen and (min-width: 1439px) {
                .single-breeder-first-section {
                    background-image: url("<?php the_field('upper-section__background', 'option') ?>");
                }
            }
        </style>
         
        <div class="container">
            <h3 class="section_heading single-breeder-first-section__heading">
                <?php the_field('breeder_name'); ?>
            </h3>
            <div class="single-breeder-first-section__subtitle-heading-wrapper">
                <a class="single-breeder-first-section__subtitle-heading" href="#about-single-breeder">
                    <svg class="single-breeder-first-section__heading-svg" width="14" height="12">
                        <use href="<?php echo get_template_directory_uri() ?>/assets/images/sprite.svg#icon-paw">
                        </use>
                    </svg>
                    <p><?php the_field('breeder-page_about-title'); ?></p>
                </a>
                <a class="single-breeder-first-section__subtitle-heading" href="#single-breeder-our-cats">
                    <svg class="single-breeder-first-section__heading-svg" width="14" height="12">
                        <use href="<?php echo get_template_directory_uri() ?>/assets/images/sprite.svg#icon-paw">
                        </use>
                    </svg>
                    <p><?php the_field('breeder-page_our-cats-title'); ?></p>
                </a>
                <a class="single-breeder-first-section__subtitle-heading" href="#single-breeder-free-cats">
                    <svg class="single-breeder-first-section__heading-svg" width="14" height="12">
                        <use href="<?php echo get_template_directory_uri() ?>/assets/images/sprite.svg#icon-paw">
                        </use>
                    </svg>
                    <p><?php the_field('breeder-page_free-cats-title'); ?></p>
                </a>
            </div>
        </div>
    </section>
    <section class="section single-breeder-about-section" id="about-single-breeder">
        <div class="container">
             <div class="single-breeder__breadcrumbs">
            <a href="<?php the_field('breeder-page_breadcrumbs_page'); ?>">
                <?php the_field('breeder-page_breadcrumbs_page_name'); ?></a>
                <span class="single-breeder__breadcrumbs__active">
        <?php the_field('breeder_name'); ?>
        </span>
      </div>
            <h2 class="section_heading single-breeder-about-section__heading">
                <svg class="single-breeder-heading-svg" width="42" height="60">
                    <use href="<?php echo get_template_directory_uri() ?>/assets/images/sprite.svg#icon-La_cat">
                    </use>
                </svg>
                <?php the_field('breeder-page_about-title'); ?>
            </h2>
            <div class="single-breeder-about-section__content">
                <div class="single-breeder-about-section__text">
                    <p class="single-breeder-about-section__text-first">
                        <?php the_field('breeder-page_about-subtitle'); ?></p>
                    <p class="single-breeder-about-section__text-second"><?php the_field('breeder-page_about-text'); ?>
                    </p>
                    <p class="single-breeder-about-section__contacts-title">
                        <?php the_field('breeder-page_about-connect'); ?></p>
                    <div class="single-breeder-about-section__contacts-wrapper">
                        <p class="single-breeder-about-section__contacts-text">
                            <?php the_field('breeder-page_about-mail-name'); ?></p>
                        <a class="single-breeder-about-section__contacts-link"
                            href="mailto:<?php the_field('breeder-page_about-mail-mail') ?>" rel="noopener noreferrer">
                            <?php the_field('breeder-page_about-mail-mail') ?>
                        </a>
                    </div>
                    <div class="single-breeder-about-section__contacts-wrapper">
                        <p class="single-breeder-about-section__contacts-text">
                            <?php the_field('breeder-page_about-phone-name'); ?></p>
                        <a class="single-breeder-about-section__contacts-link"
                            href="tel:<?php the_field('breeder-page_about-phone-number') ?>" rel="noopener noreferrer">
                            <?php the_field('breeder-page_about-phone-number') ?>
                        </a>

                    </div>
                    <div class="single-breeder-about-section__contacts-wrapper">
                        <p class="single-breeder-about-section__contacts-text">
                            <?php the_field('breeder-page_about-address-name'); ?></p>
                        <a href="<?php echo esc_url(  the_field('breeder-page_about-address-map') ); ?>" 
                        target="_blank"
                        class="single-breeder-about-section__contacts-link-address">
                            <?php the_field('breeder-page_about-address-address'); ?></a>
                    </div>
                    <div class="single-breeder-about-section__socials-wrapper">
                        <?php
                        if (have_rows('breeder-page_about-socials')):
                            while (have_rows('breeder-page_about-socials')):
                                the_row();
                                 $link = get_sub_field('breeder-page_about-socials-link');
                                ?>

                                <a class="single-breeder-about-section-link"
                                target="_blank"
                                    href="<?php echo esc_url(  $link ); ?>">
                                    <img class="single-breeder-about-section__socials-img"
                                        src="<?php the_sub_field('breeder-page_about-socials-icon') ?>" />
                                </a>
                            <?php
                            endwhile;
                        else:
                        endif;
                        ?>

                    </div>
                </div>
                <img class="single-breeder-about-section__img" src="<?php the_field('breeder_photo') ?>" />
            </div>

        </div>
    </section>
    <section class="section single-breeder-our-cats-section" id="single-breeder-our-cats">
        <div class="container">
            <div class="single-breeder-our-cats-section__heading-wrapper">
            <h2 class="section_heading single-breeder-our-cats-section__heading">
                <svg class="single-breeder-heading-svg" width="42" height="60">
                    <use href="<?php echo get_template_directory_uri() ?>/assets/images/sprite.svg#icon-La_cat">
                    </use>
                </svg>
                <?php the_field('breeder-page_our-cats-title'); ?>
            </h2>
                <div class="single-breeder-our-cats-section__pagination">
                    <button class="single-breeder-our-cats-section__arrow-left-btn single-breeder-our-cats-section__arrow-btn">
                        <svg class="single-breeder-our-cats-section__arrow-left one-arrow" width="10.37" height="16.97">
                            <use
                                href="<?php echo get_template_directory_uri() ?>/assets/images/sprite.svg#icon-to-left">
                            </use>
                        </svg>
                    </button>
                    <button class="single-breeder-our-cats-section__arrow-right-btn single-breeder-our-cats-section__arrow-btn">
                        <svg class="single-breeder-our-cats-section__arrow-right one-arrow" width="10.37" height="16.97">
                            <use
                                href="<?php echo get_template_directory_uri() ?>/assets/images/sprite.svg#icon-to-right">
                            </use>
                        </svg>
                    </button>
                </div>
            </div>
            <div class="single-breeder-our-cats-section__subtext">
                 <?php the_field('breeder-page_our-cats-text'); ?>
            </div>
            <div class="single-breeder-our-cats-section__swiper">
                <div class="single-breeder-our-cats-section__swiper-inner swiper">
                <?php
                $images = get_field('breeder-page_our-cats-gallery');
                $size = 'full'; // (thumbnail, medium, large, full or custom size)
                if ($images): ?>
                    <ul class="single-breeder-our-cats-section__list swiper-wrapper">
                        <?php foreach ($images as $image_id): ?>
                            <li class="single-breeder-our-cats-section__item swiper-slide" >
                                <?php echo wp_get_attachment_image($image_id, $size); ?>
                            </li>
                        <?php endforeach; ?>
                    </ul>

                <?php endif; ?>
            </div>
            </div>
             <div class="single-breeder-our-cats-section__pagination-mobile">
                    <button class="single-breeder-our-cats-section__arrow-left-btn single-breeder-our-cats-section__arrow-btn">
                        <svg class="single-breeder-our-cats-section__arrow-left one-arrow" width="10.37" height="16.97">
                            <use
                                href="<?php echo get_template_directory_uri() ?>/assets/images/sprite.svg#icon-to-left">
                            </use>
                        </svg>
                    </button>
                    <button class="single-breeder-our-cats-section__arrow-right-btn single-breeder-our-cats-section__arrow-btn">
                        <svg class="single-breeder-our-cats-section__arrow-right one-arrow" width="10.37" height="16.97">
                            <use
                                href="<?php echo get_template_directory_uri() ?>/assets/images/sprite.svg#icon-to-right">
                            </use>
                        </svg>
                    </button>
                </div>
        </div>
       
    </section>
    <section class="section single-breeder-free-cats-section" id="single-breeder-free-cats">
        <div class="container">
            <h2 class="section_heading single-breeder-free-cats-section__heading">
                <svg class="single-breeder-heading-svg" width="42" height="60">
                    <use href="<?php echo get_template_directory_uri() ?>/assets/images/sprite.svg#icon-La_cat">
                    </use>
                </svg>
                <?php the_field('breeder-page_free-cats-title'); ?>
            </h2>
            <ul class="single-breeder-free-cats-section__wrapper">
                        <?php
                        if (have_rows('breeder-page_free-cats-cards')):
                            while (have_rows('breeder-page_free-cats-cards')):
                                the_row();
                                ?>
                                <li class="single-breeder-free-cats-section__item">
                                <img class="single-breeder-free-cats-section__img"
                                        src="<?php the_sub_field('breeder-page_free-cats-img') ?>" />
                                <p class="single-breeder-free-cats-section__name"><?php the_sub_field('breeder-page_free-cats-name') ?></p>
                               
                                <?php $post_object = get_sub_field('breeder-page_free-cats-breed'); ?>
                                <?php if( $post_object ): ?>
                                <?php // override $post
                                $post = $post_object;
                                setup_postdata( $post );
                                ?>
                                <a class="single-breeder-free-cats-section__link" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
                                <?php endif; ?>
                                 <p class="single-breeder-free-cats-section__old"><?php the_sub_field('breeder-page_free-cats-old') ?></p>
                                <p class="single-breeder-free-cats-section__info"><?php the_sub_field('breeder-page_free-cats-info') ?></p>
                                </li>
                            <?php
                            endwhile;
                        else:
                        endif;
                        ?>

                    </ul>
                    <button class="single-breeder-free-cats-section__button button button_green_new visually-hidden">
                        <?php the_field('breeder-page_free-cats-btn-text'); ?>
                        <svg class="single-breeder-free-cats-section__button-svg" width="16" height="15">
                            <use href="<?php echo get_template_directory_uri() ?>/assets/images/sprite.svg#icon-paw">
                            </use>
                        </svg>
                    </button>
        </div>
    </section>
    <?php get_template_part('template-parts/join-us'); ?>
</main>
<?php get_footer(); ?>