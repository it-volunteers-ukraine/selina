<?php

get_header();

?>
    <main class="archive" id="archive">
        <section class="upper-section section" id="archive-upper">
            <style>
                @media screen and (min-width: 1439px) {
                    .upper-section {
                    background-image: url("<?php the_field('upper-section__background', 'option') ?>"); 
                    }
                }
            </style> 
            <div class="container">
                <div class="upper-section__banner">
                    <h2 class="upper-section__heading section_heading">
                        <?php the_field('archive__heading', 'option'); ?>
                    </h2> 
                </div>
            </div>    
        </section>
        <?php get_template_part('template-parts/join-us') ?>
    </main>

<?php get_footer(); ?>