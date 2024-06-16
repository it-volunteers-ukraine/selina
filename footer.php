<footer id="footer" class="footer">
    <div class="container">
        <!-- Menu -->
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
        <!-- Social-icons -->
        <div class="footer__socials">
            <div class="footer__icons-container">
                <?php  
                    $social_icons = get_field('social_media'); 
                    if ($social_icons) : 
                ?> 
                <ul id="" class="footer__icons-list"> 
                    <?php foreach($social_icons as $social_icon) : 
                        $link = $social_icon['social_link'];
                        $image = $social_icon['social_icon']; 
                    ?> 
                    <li class="footer__icon"> 
                        <a href="<?php echo $link; ?>"> 
                            <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>"> 
                        </a> 
                    </li> 
                    <? endforeach; ?> 
                </ul> 
                <?php endif; ?> 
            </div>
        </div>
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
                    <p id="revell"><?php the_field('footer-contacts__location-address', 'option'); ?></p>
                </div>
            </div>
        </div>
        <!-- white line -->
        <div class="footer__line">
            <hr class="white-line">
        </div>
        <!-- politic & copyright -->
         <div class="footer__politic-copy">
            <p>Політика Конфіденційності</p>
            <p>Selina 2024 all right reserved.</p>
         </div>
    </div>
</footer>
<?php wp_footer(); ?>
</body>

</html>


