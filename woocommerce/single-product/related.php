<?php
/**
 * Related Products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/related.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     3.9.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( $related_products ) : ?>

	<section class="related products">

		<?php
		$heading = apply_filters( 'woocommerce_product_related_products_heading', __( 'Related products', 'woocommerce' ) );

		if ( $heading ) :
			?>
			<h2>
				<?php
					if ( pll_current_language() == 'en') { echo esc_html( $heading );
					} else {
						echo esc_html__( 'Рекомендовані товари', 'woocommerce' );
					}
				?>
			</h2>
		<?php endif; ?>

			<!------------ Swiper ------------------>
		<div class="swiper related-product-swiper">
			<div class="swiper-wrapper related-product-swiper__swiper-wrapper">

				<?php foreach ( $related_products as $related_product ) : ?>

					<?php
					$post_object = get_post( $related_product->get_id() );

					setup_postdata( $GLOBALS['post'] =& $post_object ); // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited, Squiz.PHP.DisallowMultipleAssignments.Found
					?>
					<div class="swiper-slide related-product-swiper__swiper-slide">
						<?php wc_get_template_part( 'content', 'product' ); ?>
					</div>

				<?php endforeach; ?>

			</div>
			<div class="related-product-swiper__navigation">
				<div class="related-product-swiper__button-prev">
					<svg class="related-product-swiper__arrow-left one-arrow" width="10.37" height="16.97">
						<use
							href="<?php echo get_template_directory_uri() ?>/assets/images/sprite.svg#icon-to-left">
						</use>
					</svg>
				</div>
				<div class="related-product-swiper__pagination"></div>
				<div class="related-product-swiper__button-next">
					<svg class="related-product-swiper__arrow-right one-arrow" width="10.37" height="16.97">
						<use
							href="<?php echo get_template_directory_uri() ?>/assets/images/sprite.svg#icon-to-right">
						</use>
					</svg>
				</div>
			</div>
		</div>
		
		<!-------------------- Grid ------------------------------>
		<div class="related-product-grid-container">
			<?php woocommerce_product_loop_start(); ?>

				<?php foreach ( $related_products as $related_product ) : ?>

						<?php
						$post_object = get_post( $related_product->get_id() );

						setup_postdata( $GLOBALS['post'] =& $post_object ); // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited, Squiz.PHP.DisallowMultipleAssignments.Found

						wc_get_template_part( 'content', 'product' );
						?>

				<?php endforeach; ?>

			<?php woocommerce_product_loop_end(); ?>

			<button id='showMoreProductsButton' class='related-product-show-more button_green_new'>
				<p><?php the_field('show_more_btn', 'option') ?></p>
				<svg class="icon-paw" width="17" height="15">
					<use href="<?php echo get_template_directory_uri() ?>/assets/images/sprite.svg#icon-paw"></use>
				</svg>
			</button>
			<button id='showLessProductsButton' class='related-product-show-less button_green_new'>
				<p><?php the_field('hide_btn', 'option') ?></p>
				<svg class="icon-paw" width="17" height="15">
					<use href="<?php echo get_template_directory_uri() ?>/assets/images/sprite.svg#icon-paw"></use>
				</svg>
			</button>
		</div>
	</section>
	<?php
endif;

wp_reset_postdata();
