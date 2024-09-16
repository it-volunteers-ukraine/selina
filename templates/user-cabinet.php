<?php
/*
* Template Name: User-cabinet
*/
get_header();
?>

    <main>
        <section class="section heading-section-user-cabinet">
            <div class="heading-section-user-cabinet__background-img">
                <img src="<?php the_field('upper-section__background', 'option'); ?>" alt="cat">
            </div>
            <div class="container">
                <div class="heading-section-user-cabinet__wrapper">
                    <div class="heading-section-user-cabinet__list-user-cabinet">
                        <h2><?php the_field('user-cabinet_page_heading'); ?></h2>
                        <p><?php the_field('user-cabinet_greeting'); ?></p>
                    </div>
                </div>
            </div>
        </section>

        <section class="nav-section">
            <div class="container">
                <nav class="navigation-user-cabinet">
                    <div class="navigation-user-cabinet__tabs">
                        <button class="tab-content-btn" data-target="education">
                            <p><?php the_field('user-cabinet_learning'); ?></p>
                        </button>
                        <button class="tab-content-btn" data-target="forms">
                            <p><?php the_field('user-cabinet_forms'); ?></p>
                        </button>
                    </div>
                    <div class="navigation-user-cabinet__buttons">
                        <button class="show-content" data-target="videos">
                            <p><?php the_field('user-cabinet_videos-button'); ?></p>
                        </button>
                        <button class="show-content" data-target="genetic">
                            <p><?php the_field('user-cabinet_genetic-button'); ?></p>
                        </button>
                        <button class="show-content" data-target="books">
                            <p><?php the_field('user-cabinet_books-button'); ?></p>
                        </button>
                        <button class="show-content" data-target="seminars">
                            <p><?php the_field('user-cabinet_seminars-button'); ?></p>
                        </button>
                        <button class="show-content" data-target="systems">
                            <p><?php the_field('user-cabinet_systems-button'); ?></p>
                        </button>
                    </div>
                </nav>
            </div>
        </section>

        <section class='content-user-cabinet'>
            <div class="container">
                <?php
                    if (have_rows('user-cabinet_education')) {
                        while (have_rows('user-cabinet_education')) {
                            the_row();
                            $content_image = get_sub_field('user-cabinet_education-image');
                            $content_link = get_sub_field('user-cabinet_education-link');
                            $content_title = get_sub_field('user-cabinet_education-title');

                            $content_type = get_sub_field('user-cabinet_education-type');
                            if ($content_type === 'Відео') {
                                ?>
                                    <div class="content-user-cabinet__card">
                                        <img src="<?php echo $content_image['url']; ?>" alt="<?php echo $content_image['alt']; ?>">
                                        <h3 class="content-user-cabinet__card-title">
                                            <?php echo $content_title; ?>
                                        </h3>
                                        <a href="<?php the_sub_field($content_link) ?>" target="_blank">
                                            <div class="content-user-cabinet__card-link">
                                                <p>Переглянути</p>
                                            </div>
                                        </a>
                                    </div>
                                <?php
                            }
                        }
                    }
                ?>
            </div>
        </section>

    </main>

<?php get_footer(); ?>