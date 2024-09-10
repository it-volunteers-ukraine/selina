<div class="card-item">
    <img class="image" src="<?php the_field('image') ?>" alt="image">
    <div class="title"><?php the_title() ?></div>
    <div class="description">
        <?php the_field('description'); ?>
    </div>
    <a href="<?php the_permalink(); ?>" class="button red_medium_button">
        <?php the_field('more-details_btn', 'option') ?>
    </a>
</div>