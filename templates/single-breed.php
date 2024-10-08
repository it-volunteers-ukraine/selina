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
                        <p><?php the_field('breed-page_breeders-title'); ?></p>
                    </a>
                    <a class="single-breed-first-section__subtitle-heading" href="#single-breed-wfc">
                        <svg class="single-breed-first-section__heading-svg" width="14" height="12">
                            <use href="<?php echo get_template_directory_uri() ?>/assets/images/sprite.svg#icon-paw">
                            </use>
                        </svg>
                        <p><?php the_field('breed-page_wfc-title'); ?></p>
                    </a>
                    <a class="single-breed-first-section__subtitle-heading" href="#single-breed-conditions">
                        <svg class="single-breed-first-section__heading-svg" width="14" height="12">
                            <use href="<?php echo get_template_directory_uri() ?>/assets/images/sprite.svg#icon-paw">
                            </use>
                        </svg>
                        <p><?php the_field('breed-page_conditions-title'); ?></p>
                    </a>
                    <a class="single-breed-first-section__subtitle-heading" href="#single-breed-documents">
                        <svg class="single-breed-first-section__heading-svg" width="14" height="12">
                            <use href="<?php echo get_template_directory_uri() ?>/assets/images/sprite.svg#icon-paw">
                            </use>
                        </svg>
                        <p><?php the_field('breed-page_adds-title'); ?></p>
                    </a>
                    <a class="single-breed-first-section__subtitle-heading" href="#feedbacks">
                        <svg class="single-breed-first-section__heading-svg" width="14" height="12">
                            <use href="<?php echo get_template_directory_uri() ?>/assets/images/sprite.svg#icon-paw">
                            </use>
                        </svg>
                        <p><?php the_field('breed-page_feedbacks-title'); ?></p>
                    </a>
                </div>
            </div>
    </section>
    <section class="section single-breed-about-section" id="about-single-breed">
        <div class="container">
            <div class="single-breed__breadcrumbs">
                <a href="<?php the_field('breed-page_breadcrumbs_page'); ?>">
                    <?php the_field('breed-page_breadcrumbs_page_name'); ?></a>
                <span class="single-breed__breadcrumbs__active">
                    <?php the_field('breed_name'); ?>
                </span>
            </div>
            <h2 class="section_heading single-breed-about-section__heading">
                <svg class="single-breed-heading-svg" width="42" height="60">
                    <use href="<?php echo get_template_directory_uri() ?>/assets/images/sprite.svg#icon-La_cat">
                    </use>
                </svg>
                <?php the_field('breed-page_about-title'); ?>
            </h2>
            <div class="single-breed-about-section__wrapper">
                <?php
                $images = get_field('breed-page_about-images');
                $size = 'full'; // (thumbnail, medium, large, full or custom size)
                
            if ($images): ?>
                    <?php
                        $max_images = 4;
                        $image_slices = array_slice($images, 0, $max_images);
                    ?>
                <div class="single-breed-about-section__list">
                    <?php foreach (array_slice($image_slices, 0, 1) as $image_id): ?>
                        <div class="single-breed-about-section__firstItem">
                            <?php 
                            $image_url = wp_get_attachment_image_url($image_id, 'full'); // Отримання URL повнорозмірного зображення
                            ?>
                            <a href="<?php echo esc_url($image_url); ?>" data-lightbox="gallery" data-title="<?php echo esc_attr(get_post_meta($image_id, '_wp_attachment_image_alt', true)); ?>">
                                <?php echo wp_get_attachment_image($image_id, $size); ?>
                            </a>
                        </div>
                    <?php endforeach; ?>
                    <?php foreach (array_slice($image_slices, 1, 1) as $image_id): ?>
                        <div class="single-breed-about-section__item1">
                            <?php 
                            $image_url = wp_get_attachment_image_url($image_id, 'full'); // Отримання URL повнорозмірного зображення
                            ?>
                            <a href="<?php echo esc_url($image_url); ?>" data-lightbox="gallery" data-title="<?php echo esc_attr(get_post_meta($image_id, '_wp_attachment_image_alt', true)); ?>">
                                <?php echo wp_get_attachment_image($image_id, $size); ?>
                            </a>
                        </div>
                    <?php endforeach; ?>
                    <?php foreach (array_slice($image_slices, 2, 1) as $image_id): ?>
                        <div class="single-breed-about-section__item2">
                            <?php 
                            $image_url = wp_get_attachment_image_url($image_id, 'full'); // Отримання URL повнорозмірного зображення
                            ?>
                            <a href="<?php echo esc_url($image_url); ?>" data-lightbox="gallery" data-title="<?php echo esc_attr(get_post_meta($image_id, '_wp_attachment_image_alt', true)); ?>">
                                <?php echo wp_get_attachment_image($image_id, $size); ?>
                            </a>
                        </div>
                    <?php endforeach; ?>
                    <?php foreach (array_slice($image_slices, 3, 1) as $image_id): ?>
                        <div class="single-breed-about-section__item3">
                            <?php 
                            $image_url = wp_get_attachment_image_url($image_id, 'full'); // Отримання URL повнорозмірного зображення
                            ?>
                            <a href="<?php echo esc_url($image_url); ?>" data-lightbox="gallery" data-title="<?php echo esc_attr(get_post_meta($image_id, '_wp_attachment_image_alt', true)); ?>">
                                <?php echo wp_get_attachment_image($image_id, $size); ?>
                            </a>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

                <div class="single-breed-about-section__text">
                    <p class="single-breed-about-section__text-bold">
                        <?php the_field('breed-page_about-text-bold'); ?>
                    </p>
                    <p class="single-breed-about-section__text">
                        <?php the_field('breed-page_about-text'); ?>
                    </p>
                </div>
            </div>
        </div>
    </section>
    <section class="section single-breed-breeders-section" id="breeders-single-breed">
        <div class="container">
            <div class="single-breed-heading-wrapper single-breed-breeders-section__heading-wrapper">
                <h2 class="section_heading single-breed-breeders-section__heading">
                    <svg class="single-breed-heading-svg" width="42" height="60">
                        <use href="<?php echo get_template_directory_uri() ?>/assets/images/sprite.svg#icon-La_cat">
                        </use>
                    </svg>
                    <?php the_field('breed-page_breeders-title'); ?>
                </h2>
                <div class="single-breed-breeders-section__pagination">
                    <button
                        class="single-breed-breeders-section__arrow-left-btn single-breed-breeders-section__arrow-btn">
                        <svg class="single-breed-breeders-section__arrow-left one-arrow" width="10.37" height="16.97">
                            <use
                                href="<?php echo get_template_directory_uri() ?>/assets/images/sprite.svg#icon-to-left">
                            </use>
                        </svg>
                    </button>
                    <button
                        class="single-breed-breeders-section__arrow-right-btn single-breed-breeders-section__arrow-btn">
                        <svg class="single-breed-breeders-section__arrow-right one-arrow" width="10.37" height="16.97">
                            <use
                                href="<?php echo get_template_directory_uri() ?>/assets/images/sprite.svg#icon-to-right">
                            </use>
                        </svg>
                    </button>
                </div>
            </div>
            <div class="single-breed-breeders-section__swiper swiper">
                <div class="single-breed-breeders-section__list swiper-wrapper">
                    <?php
                    global $post;
                    if (have_rows('breed-page_breeders-list')): ?>
                        <?php while (have_rows('breed-page_breeders-list')):
                            the_row(); ?>
                            <?php $breed_item = get_sub_field('breed-page_breeder-item'); ?>
                            <?php if ($breed_item): ?>
                                <?php $post = $breed_item; ?>
                                <?php setup_postdata($post); ?>
                                <div class="swiper-slide single-breed-breeders-section__item">
                                    <?php get_template_part('template-parts/one-card-breeder'); ?>
                                </div>
                                <?php wp_reset_postdata(); ?>
                            <?php endif; ?>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
    <section class="section single-breed-wfc-section" id="single-breed-wfc">
        <div class="container">
            <div class="single-breed-wfc-section__head">
                <h2 class="section_heading single-breed-wfc-section__heading">
                <svg class="single-breed-heading-svg" width="42" height="60">
                    <use href="<?php echo get_template_directory_uri() ?>/assets/images/sprite.svg#icon-La_cat">
                    </use>
                </svg>
                <?php the_field('breed-page_wfc-title'); ?>
                </h2>
                <button class="single-breed-wfc-button">
                <svg class="single-breed-button-svg" width="18.67" height="18.67">
                    <use
                        href="<?php echo get_template_directory_uri() ?>/assets/images/sprite.svg#icon-add">
                    </use>
                </svg>
                </button>
            </div>
            <?php
                if (have_rows('breed-page_wcf-list')): ?>
                    <ul class="single-breed-wfc-section__list">            
                        <?php while (have_rows('breed-page_wcf-list')):
                            the_row(); ?>
                            <?php $wfc_title = get_sub_field('breed-page_wcf-item-title'); ?>
                            <?php $wfc_text = get_sub_field('breed-page_wcf-item-text'); ?>
                            <?php if ($wfc_title  && $wfc_text): ?>
                                <li class="single-breed-wfc-section__item">
                                    <h3><?php echo $wfc_title ;?></h3>
                                    <p><?php echo $wfc_text ;?></p>
                                </li>
                            <?php endif; ?>
                        <?php endwhile; ?>
                                <li class="single-breed-wfc-section__item colors">
                                    <?php $wfc_colorsTitle = get_field('breed-page_wcf-colors-title'); ?>
                                    <h3><?php echo $wfc_colorsTitle ;?></h3>
                                    <?php if (have_rows('breed-page_wcf-colors-list')): ?>
                                        <div class="single-breed-wfc-section__item-list">
                                        <?php while (have_rows('breed-page_wcf-colors-list')):
                                            the_row(); ?>
                                            <?php $wfc_colorsItemTitle = get_sub_field('breed-page_wcf-colors-item-title'); ?>
                                            <?php $wfc_colorsItemText = get_sub_field('breed-page_wcf-colors-item-text'); ?>       
                                        <div class="item-wrapper">
                                        <h4><?php echo $wfc_colorsItemTitle ;?></h4>
                                        <ul>
                                            <?php while (have_rows('breed-page_wcf-colors-item-text')):
                                            the_row(); ?>
                                            <?php $wfc_color = get_sub_field('breed-page_wcf-colors-item-single'); ?>
                                            <li><?php echo $wfc_color ;?></li>
                                            <?php endwhile; ?>
                                        </ul>
                                        </div>
                                        <?php endwhile; ?>
                                    </div>
                                    <?php endif; ?>
                                </li>
                    </ul>
                <?php endif; ?>
        </div>
    </section>
    <section class="section single-breed-conditions-section" id="single-breed-conditions">
        <div class="container">
            <div class="single-breed-conditions-section__head">
                <h2 class="section_heading single-breed-conditions-section__heading">
                <svg class="single-breed-heading-svg" width="42" height="60">
                    <use href="<?php echo get_template_directory_uri() ?>/assets/images/sprite.svg#icon-La_cat">
                    </use>
                </svg>
                <?php the_field('breed-page_conditions-title'); ?>
                </h2>
                <button class="single-breed-conditions-button">
                <svg class="single-breed-button-svg" width="18.67" height="18.67">
                    <use
                        href="<?php echo get_template_directory_uri() ?>/assets/images/sprite.svg#icon-add">
                    </use>
                </svg>
                </button>
            </div>
            <?php
                if (have_rows('breed-page_conditions-list')): ?>
            <ul class="single-breed-conditions-section__list">
                <?php while (have_rows('breed-page_conditions-list')):
                    the_row(); ?>
                    <?php $conditions_title = get_sub_field('breed-page_conditions-item-title'); ?>
                    <?php $conditions_text = get_sub_field('breed-page_conditions-item-text'); ?>
                    <?php if ($conditions_title  && $conditions_text): ?>
                        <li class="single-breed-conditions-section__item">
                            <h3><?php echo $conditions_title ;?></h3>
                            <p><?php echo $conditions_text ;?></p>
                        </li>
                    <?php endif; ?>
                <?php endwhile; ?>
            </ul>
            <?php endif; ?>
        </div>
    </section>
    <section class="single-breed-documents-section section" id="single-breed-documents">
        <div class="container">
            <h2 class="single-breed-documents-section__heading section_heading">
                <svg class="heading-svg" width="29" height="28">
                    <use href="<?php echo get_template_directory_uri() ?>/assets/images/sprite.svg#icon-La_cat">
                    </use>
                </svg>
                <?php the_field('breed-page_adds-title'); ?>
            </h2>
            <div class="single-breed-documents-section__wrapper">
                <?php
                    if( have_rows('document-cards') ):
                        while( have_rows('document-cards') ) : the_row();
                            $documentTitle = get_sub_field('document__title');
                            $documentLink = get_sub_field('document__link');
                            ?>
                                <div class="document">
                                    
                                        <svg class="clip-svg" width="38" height="90">
                                            <use href="<?php echo get_template_directory_uri() ?>/assets/images/sprite.svg#icon-clip"></use>
                                        </svg>
                                        <div class="document-card__content">
                                            <div class="document-card__title"><?php echo $documentTitle; ?></div>
                                            <button class="document-card__button button red_medium_button">
                                                <a href="<?php echo $documentLink; ?>" target="_blank">
                                                    <?php the_field('open-btn', 'option'); ?>
                                                </a> 
                                                <svg class="document-card__button-svg" width="16" height="15">
                                                    <use href="<?php echo get_template_directory_uri() ?>/assets/images/sprite.svg#icon-google"></use>
                                                </svg>
                                            </button>
                                        </div>
                                    
                                </div>
                            <?php 
                        endwhile;
                    endif;
                ?>
            </div>
        </div>
    </section>
    <?php get_template_part('template-parts/feedbacks-breed'); ?>
    <?php get_template_part('template-parts/join-us'); ?>
</main>
<?php get_footer(); ?>