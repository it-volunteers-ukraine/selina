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


    </main>

<?php get_footer(); ?>