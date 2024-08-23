<section class="section join-us-section">
<div class="container">
    <h2 class="section_heading join-us-section__heading"><?php the_field('join_text', 'option'); ?></h2>
    <?php 
$link = get_field('join_link', 'option');
if( $link ): ?>
    <a class="red_medium_button join-us-section__btn"
    target="_blank"
    href="<?php echo esc_url(  get_field('join_link', 'option')); ?>">
        <?php the_field('join_text-link', 'option'); ?></a>
<?php endif; ?>
    
</div>

<div class="green-block">
<div class="cat-abs">
    <img src="<?php the_field('join_photo', 'option') ?>" />
</div>
</div>
</section>