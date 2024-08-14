<div class="card-item flex">
    <img class="image" src="<?php the_field('image') ?>" alt="image">
    <div class="title"><?php the_field('title') ?></div>
    <div class="description"><?php the_field('description') ?></div>
    <button class="button red_medium_button">
        <?php the_field('more-details_btn', 'option') ?>
    </button>
</div>