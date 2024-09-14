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

        <div id="content-display"></div>


       <?php if (have_rows('user-cabinet_education')) {
    echo 'Rows found!';
} else {
    echo 'No rows found or incorrect field name.';
}
?>

    </main>

<?php get_footer(); ?>