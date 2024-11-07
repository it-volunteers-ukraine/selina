<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked woocommerce_output_all_notices - 10
 */
do_action( 'woocommerce_before_single_product' );

if ( post_password_required() ) {
	echo get_the_password_form(); // WPCS: XSS ok.
	return;
}
?>
<div id="product-<?php the_ID(); ?>" <?php wc_product_class( '', $product ); ?>>
	<div class="single-product__flex-container">
		<div class='single-product__image-container'>
					<!-- Swiper -->
			<?php 
				global $product;
				$main_image_id = $product->get_image_id();
				$attachment_ids = $product->get_gallery_image_ids(); 
			?>

			<div class="single-product-slider swiper">
				<div class="swiper-wrapper">
					<?php if ( $main_image_id ) : ?>
						<div class="swiper-slide">
							<?php echo wp_get_attachment_image( $main_image_id, 'full' ); ?>
							<a href="<?php echo wp_get_attachment_url( $main_image_id ); ?>" class="zoom-btn" data-fancybox="gallery">
								<svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
									<g clip-path="url(#clip0_4553_38598)">
										<path fill-rule="evenodd" clip-rule="evenodd" d="M2.79688 4.76367C2.79646 4.59799 2.93044 4.46334 3.09612 4.46292L6.41629 4.45459C6.58201 4.45418 6.71665 4.58815 6.71707 4.75384C6.71749 4.91952 6.58351 5.05418 6.41779 5.05459L3.09763 5.06292C2.93194 5.06334 2.79729 4.92936 2.79688 4.76367Z" fill="#070707" />
										<path fill-rule="evenodd" clip-rule="evenodd" d="M4.75237 2.79883C4.91805 2.79842 5.05271 2.93239 5.05313 3.09807L5.06145 6.41825C5.06187 6.58397 4.92789 6.71861 4.7622 6.71903C4.59652 6.71945 4.46187 6.58547 4.46145 6.41975L4.45313 3.09958C4.45271 2.9339 4.58669 2.79924 4.75237 2.79883Z" fill="#070707" />
										<path fill-rule="evenodd" clip-rule="evenodd" d="M7.69944 1.81807C6.0753 0.193977 3.44216 0.193977 1.81807 1.81807C0.193977 3.44216 0.193977 6.07536 1.81807 7.69944C3.44216 9.32352 6.0753 9.32352 7.69944 7.69944C9.32352 6.07536 9.32352 3.44216 7.69944 1.81807ZM1.39381 1.39381C3.25221 -0.464602 6.26526 -0.464602 8.1237 1.39381C9.96606 3.23617 9.98196 6.21336 8.1714 8.07528L10.9484 10.8523C11.0656 10.9694 11.0656 11.1594 10.9484 11.2766C10.8313 11.3937 10.6413 11.3937 10.5241 11.2766L7.72668 8.47908C5.8583 9.97338 3.12503 9.85494 1.39381 8.1237C-0.464602 6.26526 -0.464602 3.25221 1.39381 1.39381Z" fill="#070707" />
									</g>
									<defs>
										<clipPath id="clip0_4553_38598">
										<rect width="12" height="12" fill="white" />
										</clipPath>
									</defs>
								</svg>
							</a>
						</div>
					<?php endif; ?>

					<?php if ( $attachment_ids && $product->get_image_id() ) : ?>
						<?php foreach ( $attachment_ids as $attachment_id ) : ?>
							<div class="swiper-slide">
								<?php echo wp_get_attachment_image( $attachment_id, 'full' ); ?>
								<a href="<?php echo wp_get_attachment_url( $attachment_id ); ?>" class="zoom-btn" data-fancybox="gallery">
									<svg class="zoom-button" width="30" height="30">
										<use
											href="<?php echo get_template_directory_uri() ?>/assets/images/zoom-button.svg">
										</use>
									</svg>
								</a>
							</div>
						<?php endforeach; ?>
					<?php endif; ?>
				</div>

				<div class="swiper-button-next">
					<svg width="12" height="18" viewBox="0 0 12 18" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M7.56094 8.99998L0.960938 2.39998L2.84627 0.514648L11.3316 8.99998L2.84627 17.4853L0.960938 15.6L7.56094 8.99998Z" fill="#045C6F" />
					</svg>
				</div>
				<div class="swiper-button-prev">
					<svg width="12" height="18" viewBox="0 0 12 18" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M4.43906 8.99998L11.0391 2.39998L9.15373 0.514648L0.668395 8.99998L9.15373 17.4853L11.0391 15.6L4.43906 8.99998Z" fill="#045C6F" />
					</svg>
				</div>
				<!-- <div class="swiper-pagination"></div> -->
			</div>
			<?php
    if ( function_exists( 'woocommerce_template_single_sharing' ) ) {
        woocommerce_template_single_sharing();
    }
?>
		</div>

		<div class="summary entry-summary">
			<?php
			/**
			 * Hook: woocommerce_single_product_summary.
			 *
			 * @hooked woocommerce_template_single_title - 5
			 * @hooked woocommerce_template_single_rating - 10
			 * @hooked woocommerce_template_single_price - 10 (changed to 25)
			 * @hooked woocommerce_template_single_excerpt - 20
			 * @hooked woocommerce_template_single_add_to_cart - 30
			 * @hooked woocommerce_template_single_meta - 40
			 * @hooked woocommerce_template_single_sharing - 50
			 * @hooked WC_Structured_Data::generate_product_data() - 60
			 */
			do_action( 'woocommerce_single_product_summary' );
			?>
		</div>
	</div>

	<?php
	/**
	 * Hook: woocommerce_after_single_product_summary.
	 *
	 * @hooked woocommerce_output_product_data_tabs - 10
	 * @hooked woocommerce_upsell_display - 15
	 * @hooked woocommerce_output_related_products - 20
	 */
	do_action( 'woocommerce_after_single_product_summary' );
	?>
</div>

<?php do_action( 'woocommerce_after_single_product' ); ?>
