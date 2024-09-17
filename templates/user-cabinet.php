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
                        <button class="tab-content content-type-btn" data-target="videos">
                            <p><?php the_field('user-cabinet_learning'); ?></p>
                        </button>
                        <button class="tab-content content-type-btn" data-target="forms">
                            <p><?php the_field('user-cabinet_forms'); ?></p>
                        </button>
                    </div>
                    <div class="navigation-user-cabinet__buttons">
                        <button class="show-content content-type-btn" data-target="videos">
                            <p><?php the_field('user-cabinet_videos-button'); ?></p>
                        </button>
                        <button class="show-content content-type-btn" data-target="genetic">
                            <p><?php the_field('user-cabinet_genetic-button'); ?></p>
                        </button>
                        <button class="show-content content-type-btn" data-target="books">
                            <p><?php the_field('user-cabinet_books-button'); ?></p>
                        </button>
                        <button class="show-content content-type-btn" data-target="seminars">
                            <p><?php the_field('user-cabinet_seminars-button'); ?></p>
                        </button>
                        <button class="show-content content-type-btn" data-target="systems">
                            <p><?php the_field('user-cabinet_systems-button'); ?></p>
                        </button>
                    </div>
                </nav>
            </div>
        </section>

        <section id='content-display'>
            <div class='container'>
                
            </div>
        </section>

    </main>

<?php get_footer(); ?>