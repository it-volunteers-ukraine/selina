<footer id="footer" class="footer">

    <div class="container button-top-wrapper">
        <div class="button-top-container">
            <button type="button" class="up_btn" id="to-top-btn" title="Go to top">
                <div class="button-image">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12 5L18 11M12 5L6 11M12 5V19" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    <p><?php the_field('footer__to-top-field', 'option'); ?></p>
                </div>                
            </button>
        </div>
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
                    <a href="mailto:<?php the_field('footer-contacts__mail-address', 'option'); ?>" class="footer__mail" target="_blank">
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
                    </a>
                    <!-- phone -->
                    <a href="tel:<?php the_field('footer-contacts__phone-number', 'option'); ?>" class="footer__phone" target="_blank">
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
                    </a>
                    <!-- location -->
                    <a class="footer__location" target="_blank" href="https://www.google.com/maps/place/%D1%83%D0%BB.+%D0%9A%D0%B2%D0%B8%D1%82%D0%BA%D1%8B+%D0%A6%D0%B8%D1%81%D1%8B%D0%BA,+43,+%D0%A2%D0%B5%D1%80%D0%BD%D0%BE%D0%BF%D0%BE%D0%BB%D1%8C,+%D0%A2%D0%B5%D1%80%D0%BD%D0%BE%D0%BF%D0%BE%D0%BB%D1%8C%D1%81%D0%BA%D0%B0%D1%8F+%D0%BE%D0%B1%D0%BB%D0%B0%D1%81%D1%82%D1%8C,+%D0%A3%D0%BA%D1%80%D0%B0%D0%B8%D0%BD%D0%B0,+46002/@49.5578334,25.6166595,17z/data=!3m1!4b1!4m6!3m5!1s0x47303150c913550f:0xd0c110e7bba73ca!8m2!3d49.5578334!4d25.6166595!16s%2Fg%2F11mvg2b1dt?entry=ttu">
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
                    </a>
                </div>
            </div>
        </div>
        <!-- end class="big-footer-wrapper" -->
        
        <!-- Contacts-list -->
        <div class="footer__contacts">
            <a href="mailto:<?php the_field('footer-contacts__mail-address', 'option'); ?>" class="footer__mail" target="_blank">
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
            </a>
            <!-- phone -->
            <a href="tel:<?php the_field('footer-contacts__phone-number', 'option'); ?>" class="footer__phone" target="_blank">
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
            </a>
            <!-- location -->
            <a class="footer__location" target="_blank" href="https://www.google.com/maps/place/%D1%83%D0%BB.+%D0%9A%D0%B2%D0%B8%D1%82%D0%BA%D1%8B+%D0%A6%D0%B8%D1%81%D1%8B%D0%BA,+43,+%D0%A2%D0%B5%D1%80%D0%BD%D0%BE%D0%BF%D0%BE%D0%BB%D1%8C,+%D0%A2%D0%B5%D1%80%D0%BD%D0%BE%D0%BF%D0%BE%D0%BB%D1%8C%D1%81%D0%BA%D0%B0%D1%8F+%D0%BE%D0%B1%D0%BB%D0%B0%D1%81%D1%82%D1%8C,+%D0%A3%D0%BA%D1%80%D0%B0%D0%B8%D0%BD%D0%B0,+46002/@49.5578334,25.6166595,17z/data=!3m1!4b1!4m6!3m5!1s0x47303150c913550f:0xd0c110e7bba73ca!8m2!3d49.5578334!4d25.6166595!16s%2Fg%2F11mvg2b1dt?entry=ttu">
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
            </a>
        </div>
        <!-- white line -->
        <div class="footer__line">
            <hr class="white-line">
        </div>
        <!-- politic & copyright -->
         <div class="footer__politic-copy">
                <?php
                    $link = get_field('footer__politic-field-url', 'option');
                    if($link) {
                        $url = $link['url'];
                        $title = $link['title'];
                        $target = $link['target'] ? $link['target'] : '_self';
                        echo '<a href="' . esc_url($url) . '" target = "' . esc_attr($target) . '">' . esc_html($title) . '</a>';
                    }
                ?>
            <p>Selina <span><?php echo date("Y"); ?></span> all right reserved.</p>
         </div>
    </div>
</footer>
<?php wp_footer(); ?>
</body>

</html>


