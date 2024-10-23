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
		<div class='single-product__image-sharing-container'>
			
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
				</div>
			<?php endif; ?>

			<?php if ( $attachment_ids && $product->get_image_id() ) : ?>
				<?php foreach ( $attachment_ids as $attachment_id ) : ?>
					<div class="swiper-slide">
						<?php echo wp_get_attachment_image( $attachment_id, 'full' ); ?>
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

			<div class='single-product__sharing-buttons'>???Шарінг кнопки???</div>
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
