<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package wp-it-volunteers
 */

get_header();
?>

	<main id="primary" class="not-found">
		<section class="section not-found-section">
			<div class="container">
				<div class="not-found-content">
					<div class="not-found-content__img-part">
						<?php 
							$image = get_field('404_img', 'option');
							if( !empty( $image ) ): ?>
								<img src="<?php echo esc_url($image['url']); ?>" alt="img"/>
						<?php endif; ?>
						<h1>404</h1>
					</div>
					<div class="not-found-content__text-part">
						<h2><?php the_field('404_title', 'option') ?></h2>
						<p><?php the_field('404_text', 'option') ?></p>
						<a href="<?php echo get_home_url("/");?>"><?php the_field('404_text-link', 'option') ?></a>
					</div>
				</div>
			</div>
		</section>
	</main>

<?php get_footer(); ?>