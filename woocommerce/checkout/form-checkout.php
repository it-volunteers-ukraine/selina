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

<!-- Delivery -->
	<div class="delivery-block">
    <h3 class="delivery-title">
        <?php
        if ( function_exists( 'pll_current_language' ) ) {
            $current_lang = pll_current_language();
            if ( $current_lang === 'uk' ) {
                echo esc_html__( 'Доставка', 'woocommerce' );
            } elseif ( $current_lang === 'en' ) {
                echo esc_html__( 'Delivery', 'woocommerce' );
            }
        } else {
            echo esc_html__( 'Delivery', 'woocommerce' );
        }
        ?>
    </h3>
	</div>
	<div class="delivery-option">
        <div class="delivery-pickup">
            <p class="delivery-pickup-title"><?php esc_html_e( 'Самовивіз', 'woocommerce' ); ?></p>
            <p class="delivery-pickup-text"><?php esc_html_e( 'м. Тернопіль, вул. Квітки Цісик, 43', 'woocommerce' ); ?></p>
        </div>
        <div class="delivery-nova-poshta">
            <img src="<?php echo esc_url( get_template_directory_uri() . '/src/images/nova-poshta-logo.png' ); ?>" alt="Нова пошта">
        </div>
    </div>
    <!-- Payment -->
 <div class="payment-block">
    <h3 class="payment-title">
        <?php
        if ( function_exists( 'pll_current_language' ) ) {
            $current_lang = pll_current_language();
            if ( $current_lang === 'uk' ) {
                echo esc_html__( 'Оплата', 'woocommerce' );
            } elseif ( $current_lang === 'en' ) {
                echo esc_html__( 'Payment', 'woocommerce' );
            }
        } else {
            echo esc_html__( 'Payment', 'woocommerce' );
        }
        ?>
    </h3>
	</div>
	<div class="payment-option">        
            <div class="payment-1">
                <img src="<?php echo esc_url( get_template_directory_uri() . '/src/images/paypal-logo.png' ); ?>" alt="Нова пошта">
            </div>
            <div class="payment-2">
                <img src="<?php echo esc_url( get_template_directory_uri() . '/src/images/paypal-logo.png' ); ?>" alt="Нова пошта">
            </div>
            <div class="payment-3">
                <img src="<?php echo esc_url( get_template_directory_uri() . '/src/images/paypal-logo.png' ); ?>" alt="Нова пошта">
            </div>
            <div class="payment-4">
                <img src="<?php echo esc_url( get_template_directory_uri() . '/src/images/paypal-logo.png' ); ?>" alt="Нова пошта">
            </div>
        </div>
        <!-- Checkout button -->
        <div class="checkout-button">
            <button class="checkout-button-title"><?php esc_html_e( 'Оформити', 'woocommerce' ); ?></button>
        </div> 
    </div>       
</div>
</form>

<?php do_action( 'woocommerce_after_checkout_form', $checkout ); ?>
