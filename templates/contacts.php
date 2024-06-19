<?php
/*
Template Name: contacts
*/
get_header();
?>
    <main class="main">
        <section class="section list-contacts">
                <?php
                    $image = get_field('list-contacts__background');
                    $image_url = is_array($image) ? $image['url'] : $image; 
                ?>

                <div class="list-contacts__background">
                <style>
                    @media (min-width: 1440px) {
                        .list-contacts__background {
                        background-image: url('<?php echo esc_url($image_url); ?>');
                        }
                    }
                </style>
                    <div class="container">
                        <div class="list-contacts__text-box">
                            <h2 class="list-contacts__heading">
                                <?php the_field('list-contacts__heading'); ?>
                            </h2>
                            <div class="list-contacts__contacts-container">
                                <div class="list-contacts__contacts-link">
                                    <a href="#contacts-section">    
                                    <div class="list-contacts__link-container">
                                            <?php  
                                                $image = get_field('list-contacts__cat-paw-green'); 
                                                if( !empty( $image ) ): ?> 
                                                    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>"/> 
                                                <?php endif;
                                            ?>
                                            <p class="list-contacts__title"><?php the_field('title_contacts' ); ?></p>
                                        </div>
                                    </a> 
                                </div>
                                <div class="list-contacts__socials-link">
                                    <a href="#socials-section">
                                        <div class="list-contacts__link-container">
                                            <?php  
                                                $image = get_field('list-contacts__cat-paw-green'); 
                                                if( !empty( $image ) ): ?> 
                                                    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>"/> 
                                                <?php endif;
                                            ?>
                                            <p class="list-contacts__title"><?php the_field('title_socials' ); ?></p>
                                        </div>
                                    </a> 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </section>
        <section class="section contacts-contacts" id="contacts-section">
            <div class="container">
                <div class="contacts-contacts__heading-container">
                    <span class="list-contacts__La_cat"> 
                        <svg width="24" height="24"> 
                            <use href="<?php bloginfo( 'template_url' ); ?>/assets/images/sprite.svg#icon-La_cat"></use> 
                        </svg> 
                    </span> 
                    <h2 class="contacts-contacts__heading">
                        <?php the_field('contacts-contacts__heading'); ?>
                    </h2>
                </div>
                <div class="contacts-contacts__contacts-list">
                    <?php
                        // Check rows exists.
                        if( have_rows('contacts-contacts__contacts-list') ):

                            // Loop through rows.
                            while( have_rows('contacts-contacts__contacts-list') ) : the_row();

                                // Load sub field value.
                                $contact_title = get_sub_field('contacts-contacts__contacts-title');
                                $contact_value = get_sub_field('contacts-contacts__contacts-value');
                                // Do something, but make sure you escape the value if outputting directly...
                                ?>
                                <div class="contacts-contacts__contacts-title">
                                    <p><?php echo $contact_title; ?></p>
                                </div>
                                <div class="contacts-contacts__contacts-value">
                                    <p><?php echo $contact_value; ?></p>
                                </div>
                                <?php
                                    // End loop.
                                    endwhile;
                                    // No value.
                                    else :
                                    // Do something...
                                    endif;
                                ?>
                </div>
                        
        </section>
        <section class="section socials-contacts" id="socials-section">
            <div class="container">
                <div class="socials-contacts__heading-container">
                    <span class="list-contacts__La_cat"> 
                        <svg width="24" height="24"> 
                            <use href="<?php bloginfo( 'template_url' ); ?>/assets/images/sprite.svg#icon-La_cat"></use> 
                        </svg> 
                    </span> 
                    <h2 class="socials-contacts__heading">
                        <?php the_field('socials-contacts__heading'); ?>
                    </h2>
                </div>
                <div class="socials-contacts__icons-container">
                    <?php  
                        $social_icons = get_field('social_media'); 
                        if ($social_icons) : 
                    ?> 
                        <ul id="" class="socials-contacts__icons-list"> 
                            <?php foreach($social_icons as $social_icon) : 
                                $link = $social_icon['social_link'];
                                $image = $social_icon['social_icon']; 
                            ?> 
                            <li class="socials-contacts__icon"> 
                                <a href="<?php echo $link; ?>"> 
                                    <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>"> 
                                </a> 
                            </li> 
                            <? endforeach; ?> 
                        </ul> 
                    <?php endif; ?> 
                </div>
            </div>

        </section>
            <?php get_template_part( 'template-parts/contact-form' ); ?>
    </main>

<?php get_footer(); ?>