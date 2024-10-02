<?php
/*
* Template Name: privacy-policy
*/
get_header();
?>

<main>
    <section class="section heading-section-privacy-policy">
        <div class="heading-section-privacy-policy__background-img">
            <img src="<?php the_field('upper-section__background', 'option'); ?>" alt="cat">
        </div>
        <div class="container">
            <div class="heading-section-privacy-policy__wrapper">
                <div class="heading-section-privacy-policy__list-privacy-policy">
                    <h2><?php the_field('privacy_policy_page_heading'); ?></h2>
                </div>
            </div>
        </div>
    </section>

    <section class="section privacy-policy">
        <div class="container">
            <div class="privacy-policy__text">
                <p><?php the_field('privacy_policy_text'); ?></p>
            </div>
        </div>
    </section>
    <?php get_template_part('template-parts/join-us') ?>
</main>
<?php get_footer(); ?>