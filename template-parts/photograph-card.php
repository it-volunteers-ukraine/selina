<div class="photographs-item">
    <div class="photographs-image">
        <?php
        $image = get_field('photo');
        if ($image) :
            ?>
            <img class="image" src="<?php echo $image; ?>" alt="image">
        <?php else : ?>
            <img class="image"
                 src="<?php echo get_template_directory_uri() . "/assets/images/alt-image.jpg" ?>"
                 alt="image">
        <?php endif; ?>
    </div>
    <div class="full-name">
        <span class="surname">
            <?php the_field('surname') ?>
        </span>
        <span class="name">
            <?php the_field('name') ?>
        </span>
    </div>
</div>