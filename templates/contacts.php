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

                <div class="list-contacts__background" style="background-image: url(<?php echo esc_url($image_url); ?>);">
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
        <section class="section contacts-contacts"></section>
        <section class="section socials-contacts"></section>
        <section class="section form-contacts"></section>
    </main>
<?php get_footer(); ?>