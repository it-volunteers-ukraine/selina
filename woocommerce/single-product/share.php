<?php
/**
 * Single Product Share
 *
 * Sharing plugins can hook into here or you can add your own code directly.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/share.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.5.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

global $product;
$product_url = get_permalink( $product->get_id() );
$product_title = get_the_title( $product->get_id() );
?>

<div class="woocommerce-product-share">
    <h4 class="woocommerce-product-share__title">
		<?php
			// Check if the current language is English
			if ( pll_current_language() == 'en' ) {
				echo esc_html__( 'Share', 'woocommerce' );
			} else {
				echo esc_html__( 'Поділитися', 'woocommerce' );
			}
		?>
	</h4>
	<div class="woocommerce-product-share__icons-container">
		<!-- Facebook -->
		<a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode( $product_url ); ?>" target="_blank" class="share-btn facebook">
			<img src="https://upload.wikimedia.org/wikipedia/commons/5/51/Facebook_f_logo_%282019%29.svg" alt="Facebook" width="32" height="32">
		</a>

		<!-- Twitter -->
		<a href="https://x.com/intent/tweet?text=<?php echo rawurlencode( $product_title ); ?>&url=<?php echo urlencode( $product_url ); ?>" target="_blank" class="share-btn twitter">
			<img src="https://upload.wikimedia.org/wikipedia/commons/5/53/X_logo_2023_original.svg" alt="X" width="32" height="32">
		</a>
		
		<!-- Pinterest -->
		<a href="https://pinterest.com/pin/create/button/?url=<?php echo urlencode( $product_url ); ?>&media=<?php echo wp_get_attachment_url( $product->get_image_id() ); ?>&description=<?php echo rawurlencode( $product_title ); ?>" target="_blank" class="share-btn pinterest">
			<img id="pinterest-icon" src="https://upload.wikimedia.org/wikipedia/commons/0/08/Pinterest-logo.png" alt="Pinterest" width="32" height="32">
		</a>

		<!-- Telegram -->
		<a href="https://t.me/share/url?url=<?php echo urlencode( $product_url ); ?>&text=<?php echo rawurlencode( $product_title ); ?>" target="_blank" class="share-btn telegram">
			<img src="https://upload.wikimedia.org/wikipedia/commons/8/82/Telegram_logo.svg" alt="Telegram" width="32" height="32">
		</a>

		<!-- WhatsApp -->
		<a href="https://wa.me/?text=<?php echo urlencode( $product_title . ' ' . $product_url ); ?>" target="_blank" class="share-btn whatsapp">
			<img id="whatsapp-icon" src="https://img.icons8.com/?size=100&id=85088&format=png&color=40C057" alt="WhatsApp" width="40" height="40">
		</a>
	</div>
</div>

<?php
do_action( 'woocommerce_share' ); // Sharing plugins can hook into here.

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */
