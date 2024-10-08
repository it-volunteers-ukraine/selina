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
                        <p>
                            <?php 
                                the_field('user-cabinet_greeting');
                                $current_user = wp_get_current_user();
                                echo ' ' . esc_html( $current_user->display_name ) . '!';
                            ?>
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <section class="nav-section">
            <div class="container">
                <nav class="navigation-user-cabinet">
                    <div class="navigation-user-cabinet__tabs">
                        <button class="navigation-user-cabinet__tab-content content-type-btn education-btn" data-target="video">
                            <p><?php the_field('user-cabinet_learning'); ?></p>
                        </button>
                        <button class="navigation-user-cabinet__tab-content content-type-btn form-btn" data-target="form">
                            <p><?php the_field('user-cabinet_forms'); ?></p>
                        </button>
                    </div>
                    <div class="navigation-user-cabinet__buttons">
                        <button class="navigation-user-cabinet__show-content content-type-btn video-btn" data-target="video">
                            <p><?php the_field('user-cabinet_videos-button'); ?></p>
                        </button>
                        <button class="navigation-user-cabinet__show-content content-type-btn" data-target="genetic">
                            <p><?php the_field('user-cabinet_genetic-button'); ?></p>
                        </button>
                        <button class="navigation-user-cabinet__show-content content-type-btn" data-target="book">
                            <p><?php the_field('user-cabinet_books-button'); ?></p>
                        </button>
                        <button class="navigation-user-cabinet__show-content content-type-btn" data-target="seminar">
                            <p><?php the_field('user-cabinet_seminars-button'); ?></p>
                        </button>
                        <button class="navigation-user-cabinet__show-content content-type-btn" data-target="system">
                            <p><?php the_field('user-cabinet_systems-button'); ?></p>
                        </button>
                    </div>
                </nav>
            </div>
        </section>

        <section class='content-user-cabinet__content-section'>
            <div class='container'>
                <div id='content-display' class='content-user-cabinet__wrapper'></div>
            </div>
        </section>

    </main>

<?php get_footer(); ?>