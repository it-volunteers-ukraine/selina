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
                            <span>
                                 <?php
                                 echo mb_strimwidth($position, 0, 27);
                                 ?>
                            </span>
                            <span>
                               <?php
                               echo mb_strimwidth($name, 0, 27);
                               ?>
                            </span>
                        <?php endforeach; ?>
                    </div>
                    <span class="address">
                        <?php
                        $address = get_field('address');
                        echo mb_strimwidth($address, 0, 92);
                        ?>
                    </span>
                </div>
                <div class="social-media">
                    <?php
                    $emails = get_field('emails');
                    $countEmails = 0;
                    if ($emails) :
                        foreach ($emails as $row) :
                            $iconEmail = $row['icon-email'];
                            $email = $row['email'];
                            ?>
                            <a href="mailto:<?php echo esc_url($email); ?>" rel="noopener noreferrer">
                                <img src="<?php echo esc_html($iconEmail); ?>" alt="email">
                            </a>
                            <?php
                            $countEmails++;
                            if ($countEmails >= 2) {
                                break;
                            }
                        endforeach;
                    endif;

                    $iconsToShow = ($countEmails === 2) ? 2 : (($countEmails === 1) ? 3 : 4);

                    $socialLinks = get_field('social-media');
                    $countIcons = 0;

                    foreach ($socialLinks as $row) :
                        if ($countIcons >= $iconsToShow) {
                            break;
                        }

                        $icon = $row['social-icon'];
                        $link = $row['social-link'];
                        ?>
                        <a href="<?php echo esc_url($link); ?>" class="icon">
                            <img src="<?php echo esc_html($icon); ?>" alt="image">
                        </a>
                        <?php
                        $countIcons++;
                    endforeach;
                    ?>
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