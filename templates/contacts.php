<?php
/*
Template Name: contacts
*/
get_header();
?>
    <main class="main">
        <section class="section heading-section">
            <div class="heading-section__background-img">
                <img src="<?php the_field('upper-section__background', 'option'); ?>" alt="cat">
            </div>
            <div class="container">
                <div class="heading-section__wrapper">
                    <div class="heading-section__contacts-title">
                        <h2><?php the_field('list-contacts'); ?></h2>
                    </div>
                    <div class="heading-section__nav">
                        <div class="heading-section__nav-li">
                            <a class="heading-section__nav-li-link" href="#contacts-section">
                                <div class="heading-section__nav-li-icon">
                                    <svg class="icon-paw" width="14" height="12">
                                        <use href="<?php echo get_template_directory_uri() ?>/assets/images/sprite.svg#icon-paw">
                                        </use>
                                    </svg>
                                </div>
                                <div class="heading-section__nav-li-text">
                                    <p><?php the_field('nav-li-1'); ?></p>
                                </div>
                            </a>
                        </div>
                        <div class="heading-section__nav-li">
                            <a class="heading-section__nav-li-link" href="#socials-section">
                                <div class="heading-section__nav-li-icon">
                                    <svg class="icon-paw" width="14" height="12">
                                        <use href="<?php echo get_template_directory_uri() ?>/assets/images/sprite.svg#icon-paw">
                                        </use>
                                    </svg>
                                </div>
                                <div class="nav-li-text">
                                    <p><?php the_field('nav-li-2'); ?></p>
                                </div>
                            </a>
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