<?php
/**
 * Empty cart page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart-empty.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 7.0.1
 */

defined( 'ABSPATH' ) || exit;

do_action( 'woocommerce_before_main_content' );

/*
 * @hooked wc_empty_cart_message - 10
 */
do_action( 'woocommerce_cart_is_empty' );

if ( wc_get_page_id( 'shop' ) > 0 ) : ?>
	<p class="return-to-shop">
		<a class="button wc-backward<?php echo esc_attr( wc_wp_theme_get_element_class_name( 'button' ) ? ' ' . wc_wp_theme_get_element_class_name( 'button' ) : '' ); ?>" 
		href="<?php 
               // Get the ID of the shop page
               $shop_page_id = wc_get_page_id( 'shop' );

               // Get the translated shop page ID for the current language
               $translated_shop_page_id = pll_get_post( $shop_page_id );

               // Get the translated shop page URL
               echo esc_url( get_permalink( $translated_shop_page_id ) );
           ?>">
			<?php
				/**
				 * Filter "Return To Shop" text.
				 *
				 * @since 4.6.0
				 * @param string $default_text Default text.
				 */
				// echo esc_html( apply_filters( 'woocommerce_return_to_shop_text', __( 'Return to shop', 'woocommerce' ) ) );
				echo esc_html( apply_filters( 'woocommerce_return_to_shop_text', get_field( 'return_to_shop', get_the_ID() ) ) );
			?>
		</a>
	</p>
<?php endif; ?>

<?php do_action( 'woocommerce_after_main_content' ); ?>
