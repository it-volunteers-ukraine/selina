<footer id="footer" class="footer">

    <div class="up_btn-container container">
        <button type="button" class="up_btn" onclick="topFunction()" id="to-top-btn" title="Go to top">
            <img class="up_btn-icon" src="<?php echo get_template_directory_uri(); ?>/src/images/up_btn.svg" alt="up">
        </button>
    </div>

    <div class="container footer-container">
        <!-- Logo-Selina -->
        <div class="footer__logo">
            <?php
            $image = get_field('footer__logo', 'option'); 
            if( !empty( $image ) ): ?>
                <a href="<?php echo esc_url(home_url('/')); ?>">
                    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>"/>
                </a>
            <?php endif; ?>
        </div>
        <!-- Social-icons -->
        <div class="footer__socials">
            <div class="footer__icons-container">
                <?php  
                    $social_icons = get_field('footer__socials', 'option'); 
                    if ($social_icons) : 
                ?> 
                <ul id="" class="footer__icons-list"> 
                    <?php foreach($social_icons as $social_icon) : 
                        $link = $social_icon['footer__socials-link'];
                        $image = $social_icon['footer__socials-image']; 
                    ?> 
                    <li class="footer__icon"> 
                        <a href="<?php echo $link; ?>" target="_blank"> 
                            <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>"> 
                        </a> 
                    </li> 
                    <?php endforeach; ?> 
                </ul> 
                <?php endif; ?> 
            </div>
        </div>
        <!-- Menu -->
        <div class="big-footer-wrapper">
            <!-- menu-big -->
            <div class="footer__menu-list-wrapper">
                <?php $menu = wp_nav_menu( [
                            'theme_location' => 'footer',
                            'container'      => false,
                            'menu_class'     => "menu-list",
                            'menu_id'        => false,
                            'echo'           => true,
                            'items_wrap'     => '<ul id="%1$s" %2$s">%3$s</ul>',
                        ] );
                    if($menu) : ?>

                    <nav>
                        <?php echo $menu ?>	
                    </nav>

                <?php endif; ?>    
            </div>
                <!-- side part -->
            <div id="no-display" class="footer__side-part">
                <!-- side logo -->
                <div class="footer__logo-side">
                    <?php
                    $image = get_field('footer__logo', 'option'); 
                    if( !empty( $image ) ): ?>
                        <a href="<?php echo esc_url(home_url('/')); ?>">
                            <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>"/>
                        </a>
                    <?php endif; ?>
                </div>
                <!-- side socials -->
                <div class="footer__socials-side">
                    <div class="footer__icons-container">
                        <?php  
                            $social_icons = get_field('footer__socials', 'option'); 
                            if ($social_icons) : 
                        ?> 
                        <ul id="" class="footer__icons-list"> 
                            <?php foreach($social_icons as $social_icon) : 
                                $link = $social_icon['footer__socials-link'];
                                $image = $social_icon['footer__socials-image']; 
                            ?> 
                            <li class="footer__icon"> 
                                <a href="<?php echo $link; ?>" target="_blank"> 
                                    <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>"> 
                                </a> 
                            </li> 
                            <?php endforeach; ?> 
                        </ul> 
                        <?php endif; ?> 
                    </div>
                </div>
                <!-- side contacts -->
                <div class="footer__contacts-side">
                    <div class="footer__mail">
                        <div class="footer__contacts-icon">
                            <?php
                            $image = get_field('footer-contacts__mail-icon', 'option'); 
                            if( !empty( $image ) ): ?> 
                                <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>"/> 
                            <?php endif; ?>
                        </div>
                        <div class="footer-contacts__mail-address">
                            <p><?php the_field('footer-contacts__mail-address', 'option'); ?></p>
                        </div>
                    </div>
                    <!-- phone -->
                    <div class="footer__phone">
                        <div class="footer__contacts-icon">
                            <?php  
                            $image = get_field('footer-contacts__phone-icon', 'option'); 
                            if( !empty( $image ) ): ?> 
                                <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>"/> 
                            <?php endif; ?>
                        </div>
                        <div class="footer-contacts__phone-number">
                            <p><?php the_field('footer-contacts__phone-number', 'option'); ?></p>
                        </div>
                    </div>
                    <!-- location--------------------------------------------------- -->
                    <div class="footer__location">
                        <div class="footer__contacts-icon">
                            <?php  
                            $image = get_field('footer-contacts__location-icon', 'option'); 
                            if( !empty( $image ) ): ?> 
                                <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>"/> 
                            <?php endif; ?>
                        </div>
                        <div class="footer-contacts__location-address">
                            <p id="footer-address"><?php the_field('footer-contacts__location-address', 'option'); ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end wrappeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeewwwwwwwwwwwwwwwwwwwwwwwwwwwwww -->
        
        <!-- Contacts-list -->
        <div class="footer__contacts">
            <div class="footer__mail">
                <div class="footer__contacts-icon">
                    <?php
                    $image = get_field('footer-contacts__mail-icon', 'option'); 
                    if( !empty( $image ) ): ?> 
                        <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>"/> 
                    <?php endif; ?>
                </div>
                <div class="footer-contacts__mail-address">
                    <p><?php the_field('footer-contacts__mail-address', 'option'); ?></p>
                </div>
            </div>
            <!-- phone -->
            <div class="footer__phone">
                <div class="footer__contacts-icon">
                    <?php  
                    $image = get_field('footer-contacts__phone-icon', 'option'); 
                    if( !empty( $image ) ): ?> 
                        <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>"/> 
                    <?php endif; ?>
                </div>
                <div class="footer-contacts__phone-number">
                    <p><?php the_field('footer-contacts__phone-number', 'option'); ?></p>
                </div>
            </div>
            <!-- location--------------------------------------------------- -->
            <div class="footer__location">
                <div class="footer__contacts-icon">
                    <?php  
                    $image = get_field('footer-contacts__location-icon', 'option'); 
                    if( !empty( $image ) ): ?> 
                        <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>"/> 
                    <?php endif; ?>
                </div>
                <div class="footer-contacts__location-address">
                    <p id="footer-address"><?php the_field('footer-contacts__location-address', 'option'); ?></p>
                </div>
            </div>
        </div>
        <!-- white line -->
        <div class="footer__line">
            <hr class="white-line">
        </div>
        <!-- politic & copyright -->
         <div class="footer__politic-copy">
            <p><?php the_field('footer__politic-field', 'option'); ?></p>
            <p>Selina 2024 all right reserved.</p>
         </div>
    </div>
</footer>
<?php wp_footer(); ?>
</body>

</html>


