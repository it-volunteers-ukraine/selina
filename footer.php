<footer id="footer" class="footer">
    <div class="container">

    <!-- horizontal row of icons -->
        <div class="icons">

            <?php  
                $icons = get_field('icons', 'option'); 
                if ($icons) : 
                foreach($icons as $icon) : 
                        $image = $icon['icon_image']; 
                        $link = $icon['icon_link']; 
            ?> 
                
                    <a href="<?php echo $link; ?>"> 
                        <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>"> 
                    </a> 
                
                <? endforeach; ?> 
            <?php endif; ?> 
        </div>

    <!-- list contacts -->

        <ul class="contacts">


            <li class="contact_elem">
                <img class="contact_icon" src="src/images/imgs-footer/Letter.png" alt="Letter">
                <p class="contact_value">selina.ternopil@gmail.com</p>
            </li>
            <li class="contact-elem">
                <img class="contact_icon" src="src/images/imgs-footer/Phone.png" alt="Phone">
                <p class="contact_value">+380673369031</p>
            </li>
            <li class="contact_elem">
                <img class="contact_icon" src="src/images/imgs-footer/Location.png" alt="Location">
                <p class="contact-value">м. Тернопіль, вул. Квітки Цісик, 43</p>
            </li>
        </ul>
        <hr class="white-line">
        <div class="rights">
            <div class="politic">
                <p>Політика Конфіденційності</p>
            </div>
            <div class="copyright">
                <p>Selina 2024 all right reserved.</p>
            </div>
        </div>
    </div>
</footer>
<?php wp_footer(); ?>
</div>
</body>

</html>