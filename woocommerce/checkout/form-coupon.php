<?php
/**
 * Checkout coupon form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-coupon.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 7.0.1
 */

defined( 'ABSPATH' ) || exit;

if ( ! wc_coupons_enabled() ) { // @codingStandardsIgnoreLine.
	return;
}

// test
$shop_language = pll_current_language();
echo 'Current language: ' . $shop_language;
// test

?>
<div class="woocommerce-form-coupon-toggle">
	<?php wc_print_notice( apply_filters( 'woocommerce_checkout_coupon_message', esc_html__( 'Have a coupon?', 'woocommerce' ) . ' <a href="#" class="showcoupon">' . esc_html__( 'Click here to enter your code', 'woocommerce' ) . '</a>' ), 'notice' ); ?>
</div>

<form class="checkout_coupon woocommerce-form-coupon" method="post" style="display:none">

	<p><?php esc_html_e( 'If you have a coupon code, please apply it below.', 'woocommerce' ); ?></p>

	<p class="form-row form-row-first">
		<label for="coupon_code" class="screen-reader-text"><?php esc_html_e( 'Coupon:', 'woocommerce' ); ?></label>
		<input type="text" name="coupon_code" class="enter-code input-text" placeholder="<?php echo pll_current_language() === 'en' ? esc_attr_e( 'Enter code %', 'woocommerce' ) : esc_attr_e( 'Введіть код %', 'woocommerce' ); ?>" id="coupon_code" value="" />
	</p>

	<div class="form-row form-row-last">
		<button type="submit" class="red_medium_button button<?php echo esc_attr( wc_wp_theme_get_element_class_name( 'button' ) ? ' ' . wc_wp_theme_get_element_class_name( 'button' ) : '' ); ?>" 
			name="apply_coupon" 
			value="<?php echo esc_attr( pll_current_language() === 'en' ? 'Apply' : 'Застосувати' ); ?>">
			<?php echo esc_html( pll_current_language() === 'en' ? 'Apply' : 'Застосувати' ); ?>
		</button>
	</div>

	<div class="clear"></div>
</form>
