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
                                    <a class="link" href="<?php the_field('link_contacts'); ?>" target="_blank">
                                        <div class="list-contacts__link-container">
                                            <span class="list-contacts__cat-paw"> 
                                                <svg width="24" height="24"> 
                                                    <use href="<?php bloginfo( 'template_url' ); ?>/assets/images/sprite.svg#icon-paw"></use> 
                                                </svg> 
                                            </span> 
                                            <p class="list-contacts__title"><?php the_field('title_contacts' ); ?></p>
                                        </div>
                                    </a> 
                                </div>
                                <div class="list-contacts__socials-link">
                                    <a class="link" href="<?php the_field('link_socials'); ?>" target="_blank">
                                        <div class="list-contacts__link-container">
                                            <span class="list-contacts__cat-paw"> 
                                                <svg width="24" height="24"> 
                                                    <use href="<?php bloginfo( 'template_url' ); ?>/assets/images/sprite.svg#icon-paw"></use> 
                                                </svg> 
                                            </span> 
                                            <p class="list-contacts__title"><?php the_field('title_socials' ); ?></p>
                                        </div>
                                    </a> 
                                </div>
                            </div>
                            

                        </div>
                    </div>
                </div>
        </section>
        <section class="section contacts-contacts">
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
        <section class="section socials-contacts">
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
        <section class="section form-contacts">
            <div class="container">
                <div class="form-contacts__heading-container">
                    <span class="list-contacts__La_cat"> 
                        <svg width="24" height="24"> 
                            <use href="<?php bloginfo( 'template_url' ); ?>/assets/images/sprite.svg#icon-La_cat"></use> 
                        </svg> 
                    </span> 
                    <h2 class="form-contacts__heading">
                        <?php the_field('form-contacts__heading'); ?>
                    </h2>
                </div>
                <div class="form-contacts__info">
                    <p>
                        <?php the_field('form-contacts__info'); ?>
                    </p>
                </div>
                <div class="form-contacts__contacts">
                    <div class="form-contacts__mail">
                        <div class="form-contacts__icon">
                            <?php  
                            $image = get_field('form-contacts__mail-icon'); 
                            if( !empty( $image ) ): ?> 
                                <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>"/> 
                            <?php endif; ?>
                        </div>
                        <div class="form-contacts__mail-address">
                            <p><?php the_field('form-contacts__mail-address'); ?></p>
                        </div>
                    </div>
                    <div class="form-contacts__phone">
                        <div class="form-contacts__icon">
                            <?php  
                            $image = get_field('form-contacts__phone-icon'); 
                            if( !empty( $image ) ): ?> 
                                <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>"/> 
                            <?php endif; ?>
                        </div>
                        <div class="form-contacts__phone-number">
                            <p><?php the_field('form-contacts__phone-number'); ?></p>
                        </div>
                    </div>
                </div>
                <div class="formaaaaaaaaaaaaaaa"></div>
            </div>
        </section>
    </main>
<?php get_footer(); ?>