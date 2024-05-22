<footer id="footer" class="footer">
    <div class="container">
        <div class="footer-wrapper">
            <!-- Footer's menu's named is: menu_title_numberOfColumn_numberOfRowInThisColumn in Figma -->
                <!-- Column 1 -->
            <div class="footer-menus1-wrapper">
                <div class="footer-menu1-1-wrapper">
                    <div class="footer-menu-heading-wrapper">
                        <h2 class="footer-heading"><?php the_field( 'menu_title_1_1', 'option' ); ?></h2>
                    </div>
                    <div class="footer-menu-list-wrapper">
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
                </div>
                <div class="footer-menu1-2-wrapper">
                    <div class="footer-menu-heading-wrapper">
                        <h2 class="footer-heading"><?php the_field( 'menu_title_1_2', 'option' ); ?></h2>
                    </div>
                    <div class="footer-menu-list-wrapper">
                        <?php $menu = wp_nav_menu( [
                                    'theme_location' => 'footer12',
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
                </div>
            </div>
            <!-- Column 2 -->
            <div class="footer-menus2-wrapper">
                <div class="footer-menu2-1-wrapper">
                    <div class="footer-menu-heading-wrapper">
                        <h2 class="footer-heading"><?php the_field( 'menu_title_2_1', 'option' ); ?></h2>
                    </div>
                    <div class="footer-menu-list-wrapper">
                        <?php $menu = wp_nav_menu( [
                                    'theme_location' => 'footer21',
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
                </div>
                <div class="footer-menu2-2-wrapper">
                    <div class="footer-menu-heading-wrapper">
                        <h2 class="footer-heading"><?php the_field( 'menu_title_2_2', 'option' ); ?></h2>
                    </div>
                    <div class="footer-menu-list-wrapper">
                        <?php $menu = wp_nav_menu( [
                                    'theme_location' => 'footer22',
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
                </div>
            </div>
            <!-- Column 3 -->
            <div class="footer-menus3-wrapper">
                <div class="footer-menu3-1-wrapper">
                    <div class="footer-menu-heading-wrapper">
                        <h2 class="footer-heading"><?php the_field( 'menu_title_3_1', 'option' ); ?></h2>
                    </div>
                    <div class="footer-menu-list-wrapper">
                        <?php $menu = wp_nav_menu( [
                                    'theme_location' => 'footer31',
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
                </div>
                <div class="footer-menu3-2-wrapper">
                    <div class="footer-menu-heading-wrapper">
                        <h2 class="footer-heading"><?php the_field( 'menu_title_3_2', 'option' ); ?></h2>
                    </div>
                    <div class="footer-menu-list-wrapper">
                        <?php $menu = wp_nav_menu( [
                                    'theme_location' => 'footer32',
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
                </div>
            </div>
            <!-- Column 4 -->
            <div class="footer-menus4-wrapper">
                <div class="footer-menu4-1-wrapper">
                    <div class="footer-menu-heading-wrapper">
                        <h2 class="footer-heading"><?php the_field( 'menu_title_4_1', 'option' ); ?></h2>
                    </div>
                    <div class="footer-menu-list-wrapper">
                        <?php $menu = wp_nav_menu( [
                                    'theme_location' => 'footer41',
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
                </div>
                <div class="footer-menu4-2-wrapper">
                    <div class="footer-menu-heading-wrapper">
                        <h2 class="footer-heading"><?php the_field( 'menu_title_4_2', 'option' ); ?></h2>
                    </div>
                    <div class="footer-menu-list-wrapper">
                        <?php $menu = wp_nav_menu( [
                                    'theme_location' => 'footer42',
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
                </div>
                <div class="footer-menu-heading-wrapper-links">
                        <h2 class="footer-heading"><?php the_field( 'menu_title_4_3', 'option' ); ?></h2>
                        <h2 class="footer-heading"><?php the_field( 'menu_title_4_4', 'option' ); ?></h2>
                        <h2 class="footer-heading"><?php the_field( 'menu_title_4_5', 'option' ); ?></h2>
                </div>
            </div>
                <!-- Column 5 -->
            <div class="footer-logo-social-contacts-wrapper">
                <div class="footer-logo">
                        <?php 
                            if ( has_custom_logo() ) {
                                echo get_custom_logo();
                            }
                        ?>
                    <a class="footer-logo-link" href="<?php echo get_locale(  ) ==='uk'? site_url(''): site_url('/en/home/'); ?>">
                        <p class="footer-logo-name title-h3">
                            <?php the_field('logo_title','option'); ?>
                        </p>
                    </a>
                </div>
                <!-- Repeater for social icons -->
                <div class="footer-socials-wrapper">
                    <?php  
                        $social_icons = get_field('social_icons', 'option'); 
                        if ($social_icons) : 
                    ?> 
                        <ul id="" class=""> 
                    
                            <?php foreach($social_icons as $social_icon) : 
                                $image = $social_icon['social_img']; 
                                $link = $social_icon['social_link']; 
                            ?> 
                            <li> 
                                <a href="<?php echo $link; ?>"> 
                                    <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>"> 
                                </a> 
                            </li> 
                            <? endforeach; ?> 
                        </ul> 
                    <?php endif; ?> 
                </div>
                <div class="footer-contacts-wrapper">
                    
                </div>
                
            </div>
        </div>
        <!-- Underline -->
        <div class="footer-copyright-wrapper">
            <p class="footer-politic">Політика Конфіденційності</p>
            <p class="footer-copiright">Selina 2024 all right reserved.</p>
        </div>
    </div>
</footer>
<?php wp_footer(); ?>
</body>

</html>


