<section class="section form-contacts">
    <div class="container form-contacts__container-bg">
        <div class="form-contacts__background">
            <?php  
                $image_default = get_field('form-contacts__background', 'option'); 
                $image_1440 = get_field('form-contacts__background_1440', 'option');
                if( !empty( $image_default ) && !empty( $image_1440 ) ): ?> 
                    <img 
                        src="<?php echo esc_url($image_default['url']); ?>" 
                        alt="<?php echo esc_attr($image_default['alt']); ?>"
                        class="form-contacts__background_768"
                    /> 
                    <img 
                        src="<?php echo esc_url($image_1440['url']); ?>" 
                        alt="<?php echo esc_attr($image_1440['alt']); ?>"
                        class="form-contacts__background_1440"
                    />
            <?php endif; ?>
        </div>
        <div class="form-contacts__content">
            <div class="form-contacts__heading-container">
                <span class="list-contacts__La_cat"> 
                    <svg width="24" height="24">
                        <use href="<?php bloginfo( 'template_url' ); ?>/assets/images/sprite.svg#icon-La_cat"></use> 
                    </svg> 
                </span> 
                <h2 class="form-contacts__heading">
                    <?php the_field('form-contacts__heading', 'option'); ?>
                </h2>
            </div>
            <div class="form-contacts__info">
                <p>
                    <?php the_field('form-contacts__info', 'option'); ?>
                </p>
            </div>
            <div class="form-contacts__contacts">
                <div class="form-contacts__mail">
                    <div class="form-contacts__icon">
                        <?php  
                        $image = get_field('form-contacts__mail-icon', 'option'); 
                        if( !empty( $image ) ): ?> 
                            <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>"/> 
                        <?php endif; ?>
                    </div>
                    <div class="form-contacts__mail-address">
                        <p><?php the_field('form-contacts__mail-address', 'option'); ?></p>
                    </div>
                </div>
                <div class="form-contacts__phone">
                    <div class="form-contacts__icon">
                        <?php  
                        $image = get_field('form-contacts__phone-icon', 'option'); 
                        if( !empty( $image ) ): ?> 
                            <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>"/> 
                        <?php endif; ?>
                    </div>
                    <div class="form-contacts__phone-number">
                        <p><?php the_field('form-contacts__phone-number', 'option'); ?></p>
                    </div>
                </div>
            </div>
            <div class="form-contacts__form">
                <?php
                    $current_lang = pll_current_language();
                    if ($current_lang == 'ua') {
                        echo do_shortcode('[contact-form-7 id="d114e72" title="Контактна форма 1"]');
                    } elseif ($current_lang == 'en') {
                        echo do_shortcode('[contact-form-7 id="2aecf2b" title="Контактна форма EN"]');
                    }
                ?>
            </div>
        </div>            
    </div>
</section>