<div class="our-partners-item" onclick="flipCardMobile(this)">
    <div class="flip-card" id="flip-card-partners">
        <div class="flip-card-inner">
            <div class="flip-card-front">
                <?php
                $image = get_field('partner_img');
                $alt_image = get_field('partner_name');

                if (!empty($alt_image)) {
                    $trimmed_partner_name = mb_substr($alt_image, 0, 67);
                }
                ?>
                <img src="<?php echo the_field('partner_img') ?>"
                     alt="<?php echo esc_attr($trimmed_partner_name); ?>">
            </div>
            <div class="flip-card-back">
                <?php
                $link_url = get_field('partner_link');
                $link_text = get_field('link-text');
                ?>
                <a class="link" href="<?php echo esc_url($link_url); ?>"
                   rel="noopener noreferrer">
                    <?php echo esc_html($link_text) ?>
                    <svg width="12" height="12">
                        <use href="<?php echo get_template_directory_uri() ?>/assets/images/sprite.svg#icon-arrow">
                        </use>
                    </svg>
                </a>
                <svg class="icon-paw" width="42" height="38">
                    <use href="<?php echo get_template_directory_uri() ?>/assets/images/sprite.svg#icon-paw">
                    </use>
                </svg>
            </div>
        </div>
    </div>
</div>