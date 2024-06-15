<footer id="footer" class="footer">
    <div class="container">
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
    </div>
</footer>
<?php wp_footer(); ?>
</body>

</html>


