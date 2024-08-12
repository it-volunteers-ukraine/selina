<?php
/*
Template Name: Education
*/
get_header();

?>

<main>
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

            <div class="education-cards">
                <?php
                $args = array(
                    'post_type' => 'courses',
                    'order' => 'ASC',
                    'posts_per_page' => -1,
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
            <div class="education-cards">
                <?php
                $repeater_cards = get_field('repeater-frame-cards');
                foreach ($repeater_cards as $row) : ?>
                    <div class="card-item frame">
                        <img class="image" src="<?= $row['image']; ?>" alt="image">
                        <div class="title"><?= $row['title']; ?></div>
                        <div class="description"><?= $row['description']; ?></div>
                        <button class="button red_medium_button">
                            <?php the_field('more-details_btn', 'option') ?>
                        </button>
                    </div>
                <?php endforeach; ?>
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

                <div class="education-cards">
                    <?php
                    $repeater_cards = get_field('repeater-cards');
                    foreach ($repeater_cards as $row) : ?>
                        <div class="card-item flex">
                            <img class="image" src="<?= $row['image']; ?>" alt="image">
                            <div class="title"><?= $row['title']; ?></div>
                            <div class="description"><?= $row['description']; ?></div>
                            <button class="button red_medium_button">
                                <?php the_field('more-details_btn', 'option') ?>
                            </button>
                        </div>
                    <?php endforeach; ?>
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
            <div class="education-cards">
                <?php
                $repeater_cards = get_field('repeater-frame-cards');
                foreach ($repeater_cards as $row) : ?>
                    <div class="card-item frame">
                        <img class="image" src="<?= $row['image']; ?>" alt="image">
                        <div class="title"><?= $row['title']; ?></div>
                        <div class="description"><?= $row['description']; ?></div>
                        <button class="button red_medium_button">
                            <?php the_field('more-details_btn', 'option') ?>
                        </button>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

        <?php get_template_part('template-parts/join-us') ?>
</main>


<?php get_footer(); ?>
