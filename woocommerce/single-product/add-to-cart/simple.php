<?php
/**
 * Simple product add to cart
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/add-to-cart/simple.php.
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

global $product;

if ( ! $product->is_purchasable() ) {
	return;
}

echo wc_get_stock_html( $product ); // WPCS: XSS ok.

if ( $product->is_in_stock() ) : ?>

	<?php do_action( 'woocommerce_before_add_to_cart_form' ); ?>

	<form class="cart" action="<?php echo esc_url( apply_filters( 'woocommerce_add_to_cart_form_action', $product->get_permalink() ) ); ?>" method="post" enctype='multipart/form-data'>
		<p class='single-product__quantity'>Кількість</p>
		<?php do_action( 'woocommerce_before_add_to_cart_button' ); ?>

		<?php do_action( 'woocommerce_before_add_to_cart_quantity' );?>
		
		<div class="product-add2cart">
			<?php
			woocommerce_quantity_input(
				array(
					'min_value'   => apply_filters( 'woocommerce_quantity_input_min', $product->get_min_purchase_quantity(), $product ),
					'max_value'   => apply_filters( 'woocommerce_quantity_input_max', $product->get_max_purchase_quantity(), $product ),
					'input_value' => isset( $_POST['quantity'] ) ? wc_stock_amount( wp_unslash( $_POST['quantity'] ) ) : $product->get_min_purchase_quantity(), // WPCS: CSRF ok, input var ok.
				)
			);

			do_action( 'woocommerce_after_add_to_cart_quantity' );
			?>

			<button class="single_add_to_cart_button-buy button">Купити</button>
			<button type="submit" name="add-to-cart" value="<?php echo esc_attr( $product->get_id() ); ?>" class="single_add_to_cart_button button alt<?php echo esc_attr( wc_wp_theme_get_element_class_name( 'button' ) ? ' ' . wc_wp_theme_get_element_class_name( 'button' ) : '' ); ?>">
				<?php echo esc_html( $product->single_add_to_cart_text() ); ?>
				<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M20.8 16.8C21.2243 16.8 21.6313 16.9686 21.9314 17.2686C22.2314 17.5687 22.4 17.9757 22.4 18.4C22.4 18.8243 22.2314 19.2313 21.9314 19.5314C21.6313 19.8314 21.2243 20 20.8 20C20.3757 20 19.9687 19.8314 19.6686 19.5314C19.3686 19.2313 19.2 18.8243 19.2 18.4C19.2 17.512 19.912 16.8 20.8 16.8ZM8 4H10.616L11.368 5.6H23.2C23.4122 5.6 23.6157 5.68429 23.7657 5.83431C23.9157 5.98434 24 6.18783 24 6.4C24 6.536 23.96 6.672 23.904 6.8L21.04 11.976C20.768 12.464 20.24 12.8 19.64 12.8H13.68L12.96 14.104L12.936 14.2C12.936 14.253 12.9571 14.3039 12.9946 14.3414C13.0321 14.3789 13.083 14.4 13.136 14.4H22.4V16H12.8C12.3757 16 11.9687 15.8314 11.6686 15.5314C11.3686 15.2313 11.2 14.8243 11.2 14.4C11.2 14.12 11.272 13.856 11.392 13.632L12.48 11.672L9.6 5.6H8V4ZM12.8 16.8C13.2243 16.8 13.6313 16.9686 13.9314 17.2686C14.2314 17.5687 14.4 17.9757 14.4 18.4C14.4 18.8243 14.2314 19.2313 13.9314 19.5314C13.6313 19.8314 13.2243 20 12.8 20C12.3757 20 11.9687 19.8314 11.6686 19.5314C11.3686 19.2313 11.2 18.8243 11.2 18.4C11.2 17.512 11.912 16.8 12.8 16.8ZM20 11.2L22.224 7.2H12.112L14 11.2H20Z" fill="white" />
					<path d="M4 16C3.7672 16 3.5873 15.9365 3.46032 15.8095C3.33333 15.672 3.26984 15.4868 3.26984 15.254V12.6508H0.714286C0.492063 12.6508 0.31746 12.5926 0.190476 12.4762C0.0634921 12.3492 0 12.1746 0 11.9524C0 11.7302 0.0634921 11.5608 0.190476 11.4444C0.31746 11.3175 0.492063 11.254 0.714286 11.254H3.26984V8.73016C3.26984 8.49736 3.33333 8.31746 3.46032 8.19048C3.5873 8.06349 3.77249 8 4.01587 8C4.24868 8 4.42328 8.06349 4.53968 8.19048C4.66667 8.31746 4.73016 8.49736 4.73016 8.73016V11.254H7.28571C7.51852 11.254 7.69312 11.3175 7.80952 11.4444C7.93651 11.5608 8 11.7302 8 11.9524C8 12.1746 7.93651 12.3492 7.80952 12.4762C7.69312 12.5926 7.51852 12.6508 7.28571 12.6508H4.73016V15.254C4.73016 15.4868 4.66667 15.672 4.53968 15.8095C4.42328 15.9365 4.24339 16 4 16Z" fill="white" />
				</svg>
			</button>
			<button class="single_add_to_cart_button-connect button">Зв'язатися з нами</button>

			<?php do_action( 'woocommerce_after_add_to_cart_button' ); ?>
		</div>
	</form>

	<?php do_action( 'woocommerce_after_add_to_cart_form' ); ?>

<?php endif; ?>
