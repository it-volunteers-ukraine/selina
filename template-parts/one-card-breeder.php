                    <div class="breeder-item__item">
                        <img src="<?php the_field('breeder_photo') ?>" />
                        <div class="breeder-item__text-wrapper">
                            <p class="breeder-item__name">
                                <?php the_field('breeder_name') ?>
                            </p>
                            <p class="breeder-item__text">
                                <?php the_field('breeder_text') ?>
                            </p>
                            <p class="breeder-item__text">
                                <?php the_field('breeder_city') ?>
                            </p>
                            <button class="breeder-item__button button red_medium_button">
                                <?php the_field('breeder_btn'); ?>
                                <svg class="breeder-item__button-svg" width="16" height="15">
                                    <use
                                        href="<?php echo get_template_directory_uri() ?>/assets/images/sprite.svg#icon-paw">
                                    </use>
                                </svg>
                            </button>
                        </div>
                    </div>