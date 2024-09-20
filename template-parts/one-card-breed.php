                    <div class="breed-item__item">
                        <img src="<?php the_field('breed_img') ?>" />
                       
                            <p class="breed-item__name">
                                <?php the_field('breed_name') ?>
                            </p>
                            <p class="breed-item__text">
                                <?php the_field('breed_number') ?>
                            </p>
                            <a class="breed-item__button button red_medium_button"
                            href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"
                            >
                                <?php the_field('breed_btn'); ?>
                                <svg class="breed-item__button-svg" width="16" height="15">
                                    <use
                                        href="<?php echo get_template_directory_uri() ?>/assets/images/sprite.svg#icon-paw">
                                    </use>
                                </svg>
                            </a>
                        
                    </div>