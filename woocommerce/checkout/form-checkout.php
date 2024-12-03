<?php
/**
 * Checkout Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-checkout.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.5.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


$checkout = WC()->checkout();

do_action( 'woocommerce_before_checkout_form', $checkout );

// If checkout registration is disabled and not logged in, the user cannot checkout.
if ( ! $checkout->is_registration_enabled() && $checkout->is_registration_required() && ! is_user_logged_in() ) {
	echo esc_html( apply_filters( 'woocommerce_checkout_must_be_logged_in_message', __( 'You must be logged in to checkout.', 'woocommerce' ) ) );
	return;
}

?>

<!-- Checkout forma  -->
<form name="checkout" method="post" class="checkout woocommerce-checkout" action="<?php echo esc_url( wc_get_checkout_url() ); ?>" enctype="multipart/form-data">

	<?php if ( $checkout->get_checkout_fields() ) : ?>

		<?php do_action( 'woocommerce_checkout_before_customer_details' ); ?>
    <div id="form-cart-container">
        <div class="col2-set" id="customer_details">
            <div class="col-1">
                <?php do_action( 'woocommerce_checkout_billing' ); ?>
            </div>

            <div class="col-2">
                <?php do_action( 'woocommerce_checkout_shipping' ); ?>
            </div>
        </div>

            <?php do_action( 'woocommerce_checkout_after_customer_details' ); ?>

        <?php endif; ?>

        <?php do_action( 'woocommerce_checkout_before_order_review_heading' ); ?>

        <div class="checkout-cart checkout-cart__wrapper">
            <?php
                $shop_language = pll_current_language();
            ?>
            <div class="checkout-cart__heading-edit-container">
                <h3 id="order_review_heading">
                    <?php
                        if ($shop_language == 'en') {
                            esc_html_e( 'Your order', 'woocommerce' );
                        } else {
                            esc_html_e( 'Кошик', 'woocommerce' );
                        };
                    ?>
                </h3>
                
                    <?php
                        if ($shop_language == 'en') {
                            ?>
                            <a href='<?php echo pll_home_url( 'en' ) . 'cart-2/'; ?>'><?php esc_html_e( 'Edit', 'woocommerce' );
                        } else {
                            ?>
                            <a href='<?php echo wc_get_cart_url(); ?>'><?php esc_html_e( 'Редагувати', 'woocommerce' );
                        };
                    ?>
                </a>
            </div>
            <div class="checkout-cart__column-naming">
                <h5>
                    <?php
                        if ($shop_language == 'en') {
                            esc_html_e( 'Item', 'woocommerce' );
                        } else {
                            esc_html_e( 'Товар', 'woocommerce' );
                        };
                    ?>
                </h5>
                <h5 class="checkout-cart__column-naming__qty">
                    <?php
                        if ($shop_language == 'en') {
                            esc_html_e( 'Quantity', 'woocommerce' );
                        } else {
                            esc_html_e( 'Кількість', 'woocommerce' );
                        };
                    ?>
                </h5>
                <h5>
                    <?php
                        if ($shop_language == 'en') {
                            esc_html_e( 'Amount', 'woocommerce' );
                        } else {
                            esc_html_e( 'Сума', 'woocommerce' );
                        };
                    ?>
                </h5>
            </div>
            <?php do_action( 'woocommerce_checkout_before_order_review' ); ?>

            <!-- div with items-list & payments-->
            <div id="order_review" class="woocommerce-checkout-review-order">
                <?php do_action( 'woocommerce_checkout_order_review' ); ?>
            </div>
        </div>
    </div>

<!-- Checkout button -->
          <div class="delivery-option">
            <div class="checkout-button">
                <button class="checkout-button-title"><?php esc_html_e( 'Оформити', 'woocommerce' ); ?></button>
            </div>
          </div>        
    </div>
</form>
