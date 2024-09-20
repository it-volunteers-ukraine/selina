<div class="card-item">
    <div class="card-image">
        <img class="image" src="<?php the_field('education-image') ?>" alt="image">
    </div>
    <div class="title"><?php the_field('education-title') ?></div>
    <div class="description"><?php the_field('education-description') ?></div>
    <?php
    $education_disk_link = get_field('education_choice-button_disc');
    $education_outer_link = get_field('education_choice-button_outer-link');
    ?>
    <?php if ( !empty ($education_disk_link )): ?>
    <a href="<?php the_field('education_choice-button_disc') ?>" class='education-button_link button red_medium_button' target='_blank'>
        <p class="education-button-text"><?php the_field('more-details_btn', 'option')?></p>
        <svg width="16" height="14">
            <use href="<?php bloginfo( 'template_url' ); ?>/assets/images/sprite.svg#icon-google"></use>
        </svg>
    </a>
    <?php elseif ( !empty ($education_outer_link )): ?>
    <a href="<?php the_field('education_choice-button_outer-link') ?>" class='education-button_link button red_medium_button' target='_blank'>
        <p class="education-button-text"><?php the_field('more-details_btn', 'option')?></p>
        <svg class="icon-paw education-icon" width="16" height="15">
            <use href="<?php echo get_template_directory_uri() ?>/assets/images/sprite.svg#arrow-up-right"></use>
        </svg>
    </a>
    <?php else : ?>
        <a class="education-button_link button red_medium_button" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
            <p class="education-button-text"><?php the_field('more-details_btn', 'option')?></p>
            <svg width="16" height="15">
                <use href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#icon-paw"></use>
            </svg>
        </a>
    <?php endif; ?>
</div>