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
		<p class='single-product__quantity'>
			<?php
				// Check if the current language is English
				if ( pll_current_language() == 'en' ) {
					echo esc_html__( 'Number', 'woocommerce' );
				} else {
					echo esc_html__( 'Кількість', 'woocommerce' );
				}
			?>
		</p>
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

			<button 
				type="submit" 
				name="add-to-cart" 
				value="<?php echo esc_attr( $product->get_id() ); ?>" 
				class="single_add_to_cart_button-buy button red_medium_button alt"
				data-redirect="yes">
				<?php
					if ( pll_current_language() == 'en' ) {
						echo esc_html__( 'Buy', 'woocommerce' );
					} else {
						echo esc_html__( 'Купити', 'woocommerce' );
					}
				?>
			</button>

			<button data-redirect="no" type="submit" name="add-to-cart" value="<?php echo esc_attr( $product->get_id() ); ?>" class="single_add_to_cart_button button green_medium_button alt<?php echo esc_attr( wc_wp_theme_get_element_class_name( 'button' ) ? ' ' . wc_wp_theme_get_element_class_name( 'button' ) : '' ); ?>">
				<?php echo esc_html( $product->single_add_to_cart_text() ); ?>
				<svg class='single_add-to-cart-icon' width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M27.8 21.8C28.357 21.8 28.8911 22.0212 29.2849 22.4151C29.6787 22.8089 29.9 23.343 29.9 23.9C29.9 24.457 29.6787 24.9911 29.2849 25.3849C28.8911 25.7787 28.357 26 27.8 26C27.243 26 26.7089 25.7787 26.3151 25.3849C25.9212 24.9911 25.7 24.457 25.7 23.9C25.7 22.7345 26.6345 21.8 27.8 21.8ZM11 5H14.4335L15.4205 7.1H30.95C31.2285 7.1 31.4955 7.21062 31.6925 7.40754C31.8894 7.60445 32 7.87152 32 8.15C32 8.3285 31.9475 8.507 31.874 8.675L28.115 15.4685C27.758 16.109 27.065 16.55 26.2775 16.55H18.455L17.51 18.2615L17.4785 18.3875C17.4785 18.4571 17.5062 18.5239 17.5554 18.5731C17.6046 18.6223 17.6714 18.65 17.741 18.65H29.9V20.75H17.3C16.743 20.75 16.2089 20.5287 15.8151 20.1349C15.4212 19.7411 15.2 19.207 15.2 18.65C15.2 18.2825 15.2945 17.936 15.452 17.642L16.88 15.0695L13.1 7.1H11V5ZM17.3 21.8C17.857 21.8 18.3911 22.0212 18.7849 22.4151C19.1788 22.8089 19.4 23.343 19.4 23.9C19.4 24.457 19.1788 24.9911 18.7849 25.3849C18.3911 25.7787 17.857 26 17.3 26C16.743 26 16.2089 25.7787 15.8151 25.3849C15.4212 24.9911 15.2 24.457 15.2 23.9C15.2 22.7345 16.1345 21.8 17.3 21.8ZM26.75 14.45L29.669 9.2H16.397L18.875 14.45H26.75Z" fill="white" />
					<path d="M5 20C4.70899 20 4.48413 19.9206 4.3254 19.7619C4.16667 19.5899 4.0873 19.3585 4.0873 19.0675V15.8135H0.892857C0.615079 15.8135 0.396825 15.7407 0.238095 15.5952C0.0793651 15.4365 0 15.2183 0 14.9405C0 14.6627 0.0793651 14.4511 0.238095 14.3056C0.396825 14.1468 0.615079 14.0675 0.892857 14.0675H4.0873V10.9127C4.0873 10.6217 4.16667 10.3968 4.3254 10.2381C4.48413 10.0794 4.71561 10 5.01984 10C5.31085 10 5.5291 10.0794 5.6746 10.2381C5.83333 10.3968 5.9127 10.6217 5.9127 10.9127V14.0675H9.10714C9.39815 14.0675 9.6164 14.1468 9.7619 14.3056C9.92063 14.4511 10 14.6627 10 14.9405C10 15.2183 9.92063 15.4365 9.7619 15.5952C9.6164 15.7407 9.39815 15.8135 9.10714 15.8135H5.9127V19.0675C5.9127 19.3585 5.83333 19.5899 5.6746 19.7619C5.5291 19.9206 5.30423 20 5 20Z" fill="white" />
				</svg>
			</button>

			<!-- Contact-us buttons -->
			<?php if (!empty (get_field('shop_contact_us_title_telegram'))) :
				$telegram_icon = get_field('shop_contact_us_icon_telegram');
				?>
				<a class="single_contact_us_link button" href='<?php the_field('shop_contact_us_link_telegram') ?>' target='_blank'>
					<p><?php the_field('shop_contact_us_title_telegram'); ?></p>
					<img src='<?php echo esc_url($telegram_icon['url']); ?>' alt='<?php the_field('shop_contact_us_title_telegram')?>'>
				</a>
			<?php endif; ?>

			<?php if (!empty (get_field('shop_contact_us_title_viber'))) :
				$viber_icon = get_field('shop_contact_us_icon_viber');
				?>
				<a class="single_contact_us_link button" href='<?php the_field('shop_contact_us_link_viber') ?>' target='_blank'>
					<p><?php the_field('shop_contact_us_title_viber'); ?></p>
					<img src='<?php echo esc_url($viber_icon['url']); ?>' alt='<?php the_field('shop_contact_us_title_viber')?>'>
				</a>
			<?php endif; ?>

			<?php do_action( 'woocommerce_after_add_to_cart_button' ); ?>
		</div>
	</form>

	<?php do_action( 'woocommerce_after_add_to_cart_form' ); ?>

<?php endif; ?>
