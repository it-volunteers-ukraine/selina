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
                    <ul class="single-breed-about-section__list">
                        <?php foreach ($images as $image_id): ?>
                            <li class="single-breed-about-section__item">
                                <?php echo wp_get_attachment_image($image_id, $size); ?>
                            </li>
                        <?php endforeach; ?>
                    </ul>
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
            <button class="single-breed-button">
                <svg class="single-breed-button-svg" width="18.67" height="18.67">
                    <use
                        href="<?php echo get_template_directory_uri() ?>/assets/images/sprite.svg#icon-add">
                    </use>
                </svg>
            </button>
            </div>
            <ul class="single-breed-wfc-section__list">
                <li class="single-breed-wfc-section__item">
                    <h3>Тіло</h3>
                    <p>Кіт середнього розміру і елегантний. Тіло середньої довжини, міцне, гнучке, мускулисте. Ноги жилаві, довгі та стрункі. Лапи вузькі, овальні. Довгий хвіст міцний біля основи і закінчується звуженим кінчиком. Шия витончена.</p>
                </li>
                <li class="single-breed-wfc-section__item">
                    <h3>Голова</h3>
                    <p>Голова має помірну клиноподібну форму і м’яко закруглені контури. Ніс середньої довжини. Профіль злегка зігнутий. Підборіддя тверде.</p>
                </li>
                <li class="single-breed-wfc-section__item">
                    <h3>Вуха</h3>
                    <p>Вуха великі та розташовані широко. Вони широкі в основі і слабо закруглені на кінчиках. Бажані вушні кисті та відбиток пальця.</p>
                </li>
            </ul>
        </div>
    </section>
    <section class="section single-breed-conditions-section" id="single-breed-conditions">
        <div class="container">
            <h2 class="section_heading single-breed-conditions-section__heading">
                <svg class="single-breed-heading-svg" width="42" height="60">
                    <use href="<?php echo get_template_directory_uri() ?>/assets/images/sprite.svg#icon-La_cat">
                    </use>
                </svg>
                <?php the_field('breed-page_conditions-title'); ?>
            </h2>

        </div>
    </section>
    <?php get_template_part('template-parts/join-us'); ?>
</main>
<?php get_footer(); ?>