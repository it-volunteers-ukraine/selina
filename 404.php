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
						<!-- <img src="<?php the_field('wcf-img'); ?>" class="not-found__img"/> -->
						<img src="<?php echo get_template_directory_uri(); ?>/src/images/not-found-logo.png"/>
						<h1>404</h1>
					</div>
					<div class="not-found-content__text-part">
						<h2>Йой...<br>Сторінку не знайдено</h2>
						<p>Ми не змогли знайти сторінку, яку ви шукали. Поверніться, будь ласка, на головну сторінку та спробуйте ще раз</p>
						<a href="<?php echo get_home_url("/");?>">На головну</a>
					</div>
				</div>
			</div>
		</section>
	</main>

<?php get_footer(); ?>