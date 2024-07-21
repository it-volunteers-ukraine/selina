<div class="friends-clubs-item" onclick="flipCardMobile(this)">
    <div class="flip-card friends-flip-card">
        <div id="flip-mobile-inner" class="flip-card-inner">
            <div class="flip-card-front-friends" id="flip-card-frame">
                <?php
                $image = get_field('image');
                if ($image) :
                    ?>
                    <img class="image" src="<?php echo $image; ?>" alt="image">
                <?php else : ?>
                    <img class="image"
                         src="<?php echo get_template_directory_uri() . "/assets/images/alt-image.jpg" ?>"
                         alt="image">
                <?php endif; ?>
                <h2 class="title"><?php the_title(); ?></h2>
            </div>
            <div class="flip-card-back-friends">
                <div class="info">
                    <div class="positions">
                        <?php
                        $positions = get_field('positions');
                        foreach ($positions as $row) :
                            $position = $row['position'];
                            $name = $row['name'];
                            ?>
                            <span><?php echo $position ?></span>
                            <span><?php echo $name ?></span>
                        <?php endforeach; ?>
                    </div>
                    <span class="address"><?php the_field('address'); ?></span>
                </div>
                <div class="social-media">
                    <?php
                    $emails = get_field('emails');
                    if ($emails) :
                        $countEmails = 0;
                        foreach ($emails as $row) :
                            $iconEmail = $row['icon-email'];
                            $email = $row['email'];
                            if ($countEmails >= 2) {
                                break;
                            }
                            ?>
                            <a href="mailto:<?php esc_url($email); ?>"
                               rel="noopener noreferrer">
                                <img src="<?php echo esc_html($iconEmail); ?>" alt="email">
                            </a>
                            <?php
                            $countEmails++
                            ?>
                        <?php
                        endforeach;
                    endif;
                    ?>
                    <?php
                    $socialLinks = get_field('social-media');
                    $countIcons = 0;
                    foreach ($socialLinks as $row) :
                        $icon = $row['social-icon'];
                        $link = $row['social-link'];
                        if ($countIcons >= 1) {
                            break;
                        }
                        ?>
                        <a href="<?php echo esc_url($link); ?>" class="icon">
                            <img src="<?php echo esc_html($icon); ?>" alt="image">
                        </a>
                        <?php
                        $countIcons++
                        ?>
                    <?php endforeach; ?>
                    <?php
                    $iconPhone = get_field('icon-phone');
                    if ($iconPhone) :
                        ?>
                        <a href="tel:<?php the_field('phone') ?>" rel="noopener noreferrer"
                           class="icon">
                            <img src="<?php echo esc_html($iconPhone); ?>" alt="phone">
                        </a>
                    <?php
                    endif;
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>