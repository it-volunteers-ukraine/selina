<?php
/**
 * Cart Page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 7.9.0
 */

defined( 'ABSPATH' ) || exit;

do_action( 'woocommerce_before_main_content' );

?>

<div class="mywoo_before_cart">
	<?php do_action( 'woocommerce_before_cart' ); ?>
</div>

<div class="mywoo-cart-form cart-content">
	<form class="woocommerce-cart-form" action="<?php echo esc_url( wc_get_cart_url() ); ?>" method="post">
		<?php do_action( 'woocommerce_before_cart_table' ); ?>

			<table class="mywoo-cart-table shop_table shop_table_responsive cart woocommerce-cart-form__contents" cellspacing="0">
				<thead class="mywoo-cart-table__head">
					<tr>
						<th class="product-name"><?php echo esc_html( get_field( 'product', get_the_ID() ) ); ?></th>
						<th class="product-quantity"><?php echo esc_html( get_field( 'quantity', get_the_ID() ) ); ?></th>
						<th class="product-subtotal"><?php echo esc_html( get_field( 'subtotal', get_the_ID()) ); ?></th>

					</tr>
				</thead>
				
					<tbody class="mywoo-cart-table__body">
						<?php do_action( 'woocommerce_before_cart_contents' ); ?>

						<?php
							foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
								$_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
								$product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );
								/**
								 * Filter the product name.
								 *
								 * @since 2.1.0
								 * @param string $product_name Name of the product in the cart.
								 * @param array $cart_item The product in the cart.
								 * @param string $cart_item_key Key for the product in the cart.
								 */
								$product_name = apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key );

								if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
									$product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );

								?>

								<tr class="woocommerce-cart-form__cart-item <?php echo esc_attr( apply_filters( 'woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key ) ); ?>">
									<!-- Product image -->
									<td class="product-thumbnail">
										<?php
										// Cart image size is changed with the function cart_woocommerce_image_size()
										$thumbnail_id = $_product->get_image_id();
										$thumbnail = wp_get_attachment_image( $thumbnail_id, 'cart-image-size' );

										if ( ! $product_permalink ) {
											echo $thumbnail; // PHPCS: XSS ok.
										} else {
											printf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $thumbnail ); // PHPCS: XSS ok.
										}
										?>
									</td>

									<!-- Product name -->
									<td class="product-name" data-title="<?php esc_attr_e( 'Product', 'woocommerce' ); ?>">
										<?php
										if ( ! $product_permalink ) {
											echo wp_kses_post( $product_name . '&nbsp;' );
										} else {
											/**
											 * This filter is documented above.
											 *
											 * @since 2.1.0
											 */
											echo wp_kses_post( apply_filters( 'woocommerce_cart_item_name', sprintf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $_product->get_name() ), $cart_item, $cart_item_key ) );
										}

										do_action( 'woocommerce_after_cart_item_name', $cart_item, $cart_item_key );

										// Output the attributes
										$product_attributes = $cart_item['data']->get_attributes(); // Get all attributes

										foreach ( $product_attributes as $attribute_name => $attribute ) {
											// Check if there are options
											if ( ! empty( $attribute['options'] ) ) {
												$attribute_label = wc_attribute_label( str_replace( 'pa_', '', $attribute_name ) ); // Get the attribute label by removing 'pa_'
												$attribute_values = []; // Array to hold the attribute names

												// Loop through options and get their names
												foreach ( $attribute['options'] as $option_id ) {
													$term = get_term_by( 'id', $option_id, $attribute_name ); // Get term by ID
													if ( ! is_wp_error( $term ) && isset( $term->name ) ) {
														$attribute_values[] = $term->name; // Add name to the array
													}
												}

												// Output attribute label and its values
												if ( ! empty( $attribute_values ) ) {
													echo '<p class="custom-product-attributes">' . esc_html( $attribute_label ) . ': ' . esc_html( implode( ', ', $attribute_values ) ) . '</p>';
												}
											}
										}

										// Meta data.
										echo wc_get_formatted_cart_item_data( $cart_item ); // PHPCS: XSS ok.

										// Backorder notification.
										if ( $_product->backorders_require_notification() && $_product->is_on_backorder( $cart_item['quantity'] ) ) {
											echo wp_kses_post( apply_filters( 'woocommerce_cart_item_backorder_notification', '<p class="backorder_notification">' . esc_html__( 'Available on backorder', 'woocommerce' ) . '</p>', $product_id ) );
										}
										?>
									</td>

									<!-- Product quantity -->
									<td class="product-quantity" data-title="<?php esc_attr_e( 'Quantity', 'woocommerce' ); ?>">
										<?php
										if ( $_product->is_sold_individually() ) {
											$min_quantity = 1;
											$max_quantity = 1;
										} else {
											$min_quantity = 0;
											$max_quantity = $_product->get_max_purchase_quantity();
										}

										$product_quantity = woocommerce_quantity_input(
											array(
												'input_name'   => "cart[{$cart_item_key}][qty]",
												'input_value'  => $cart_item['quantity'],
												'max_value'    => $max_quantity,
												'min_value'    => $min_quantity,
												'product_name' => $product_name,
											),
											$_product,
											false
										);

										echo apply_filters( 'woocommerce_cart_item_quantity', $product_quantity, $cart_item_key, $cart_item ); // PHPCS: XSS ok.
										?>
									</td>

									<!-- Product remove -->
									<td class="product-remove">
										<?php

											$sprite_url = get_template_directory_uri() . '/assets/images/sprite.svg';

											echo apply_filters( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
												'woocommerce_cart_item_remove_link',
												sprintf(
													'<a href="%s" class="remove remove_from_cart_button" aria-label="%s" data-product_id="%s" data-product_sku="%s">
														<svg class="remove-svg" width="18" height="17">
															<use href="%s#remove-icon">
															</use>
														</svg>
													</a>',
													esc_url( wc_get_cart_remove_url( $cart_item_key ) ),
													/* translators: %s is the product name */
													esc_attr( sprintf( __( 'Remove %s from cart', 'woocommerce' ), wp_strip_all_tags( $product_name ) ) ),
													esc_attr( $product_id ),
													esc_attr( $_product->get_sku() ),
													esc_url( $sprite_url )
												),
												$cart_item_key
											);
										?>
									</td>

									<!-- Product subtotal -->
									<td class="product-subtotal" data-title="<?php esc_attr_e( 'Subtotal', 'woocommerce' ); ?>">
										<?php
											echo apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key ); // PHPCS: XSS ok.
										?>
									</td>
									
								</tr>

								<?php
							}
						}
						?>
					</tbody>
				

				<tfoot class="mywoo-cart-table__footer">

					<?php do_action( 'woocommerce_cart_contents' ); ?>

						<td class="actions">

							<button type="submit" class="update-cart button<?php echo esc_attr( wc_wp_theme_get_element_class_name( 'button' ) ? ' ' . wc_wp_theme_get_element_class_name( 'button' ) : '' ); ?>" name="update_cart" value="<?php esc_attr_e( 'Update cart', 'woocommerce' ); ?>"><?php esc_html_e( 'Update cart', 'woocommerce' ); ?></button>

							<?php do_action( 'woocommerce_cart_actions' ); ?>

							<?php wp_nonce_field( 'woocommerce-cart', 'woocommerce-cart-nonce' ); ?>
						</td>
					</tr>

					<?php do_action( 'woocommerce_after_cart_contents' ); ?>
				</tfoot>
				
			</table>

		<?php do_action( 'woocommerce_after_cart_table' ); ?>
	</form>

	<?php do_action( 'woocommerce_before_cart_collaterals' ); ?>

	<div class="cart-collaterals">
		<?php
		/**
		 * Cart collaterals hook.
		 *
		 * @hooked woocommerce_cross_sell_display
		 * @hooked woocommerce_cart_totals - 10
		 */
		remove_action( 'woocommerce_cart_collaterals', 'woocommerce_cart_totals', 10 );
		remove_action( 'woocommerce_cart_collaterals', 'woocommerce_cross_sell_display', 10 );

		add_action( 'woocommerce_cart_collaterals', 'woocommerce_cart_totals', 10 );

		add_action( 'woocommerce_cart_collaterals', 'discounts_block', 15 );

		function discounts_block() { ?>
			<div class="discounts-wrapper">
				<p class="discounts_text"><?php echo get_field( 'discounts_text', get_the_ID() ); ?></p>

				<?php $discounts_link = get_field( 'discounts_link' );
				if( $discounts_link ): ?>
					<a class="discounts__button button red_medium_button" href="<?php echo esc_url( $discounts_link ); ?>">
						<p><?php the_field( 'more-details_btn', 'option' ); ?></p>
						<svg class="news-section__button-svg" width="16" height="15">
							<use href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#icon-paw"></use>
						</svg>
					</a>
				<?php endif; ?>
			</div>
		<?php } ?>
		
		<?php
		add_action( 'woocommerce_cart_collaterals', 'custom_cross_sell_slider', 20 ); ?>

		<div class="cross-sell__wrapper">

			<?php
			function custom_cross_sell_slider() { 

				$cross_sells = WC()->cart->get_cross_sells();

				if ( ! empty( $cross_sells ) ) {
					$cross_sell_heading = get_field( 'cross_sell_heading' );
					
					if ( !empty( $cross_sell_heading ) ) {
						?>
						<h2 class="cross_sell_heading"><?php echo esc_html( $cross_sell_heading ); ?></h2>
						<?php
					}
				// For mobile (slider)
				echo '<div class="crossSellSwiper mobile-only">';
				echo '<div class="swiper-wrapper">';

				$counter = 0;
				foreach ( $cross_sells as $cross_sell_id ) {
					if( $counter >= 6 ) break;
					$post_object = get_post( $cross_sell_id );
					setup_postdata( $GLOBALS['post'] =& $post_object );
	
					echo '<div class="swiper-slide">';
					wc_get_template_part( 'content', 'product' );
					echo '</div>';
					$counter++;
				}
	
				wp_reset_postdata();
				echo '</div>';
				echo '</div>';

				echo '<div class="cross-sell__nav-pag">';
				echo '<button class="cross-sell__arrow-left-btn cross-sell__arrow-btn">';
				echo '<svg class="cross-sell__arrow-left one-arrow" width="10.37" height="16.97">';
				echo '<use href="' . get_template_directory_uri() . '/assets/images/sprite.svg#icon-to-left"></use>';
				echo '</svg>';
				echo '</button>';
				echo '<div class="cross-sell__pagination">';
				echo '</div>';
				echo '<button class="cross-sell__arrow-right-btn cross-sell__arrow-btn">';
				echo '<svg class="cross-sell__arrow-right one-arrow" width="10.37" height="16.97">';
				echo '<use href="' . get_template_directory_uri() . '/assets/images/sprite.svg#icon-to-right"></use>';
				echo '</svg>';
				echo '</button>';
				echo '</div>';
					

				// For tablet and desktop (grid)
				echo '<div class="crossSellGrid desktop-only">';
					echo '<div class="grid-wrapper">';

					$counter = 0;
					foreach ( $cross_sells as $cross_sell_id ) {
						if( $counter >= 6 ) break;

						$post_object = get_post( $cross_sell_id );
						setup_postdata( $GLOBALS['post'] =& $post_object );

						echo '<div class="grid-item" style="display: none;">';
						wc_get_template_part( 'content', 'product' );
						echo '</div>';

						$counter++;
					}

					wp_reset_postdata();
					echo '</div>';

					// Show more button
					echo '<button class="cross-sell__show-more show-more button_green_new">';
                	echo '<p class="cross-sell__show_more_btn">' . get_field("show_more_btn", "option") . '</p>';
                	echo '<svg class="icon-paw" width="16" height="15">';
                    echo '<use href="' . get_template_directory_uri() . '/assets/images/sprite.svg#icon-paw"></use>';
                	echo '</svg>';
            		echo '</button>';
					// Hide button
					echo '<button class="cross-sell__hide hide button_green_new" style="display: none">';
                	echo '<p class="cross-sell__hide_btn">' . get_field("hide_btn", "option") . '</p>';
                	echo '<svg class="icon-paw" width="16" height="15">';
                    echo '<use href="' . get_template_directory_uri() . '/assets/images/sprite.svg#icon-paw"></use>';
                	echo '</svg>';
            		echo '</button>';
				echo '</div>';
				}
			} ?>
		</div>

		<?php do_action( 'woocommerce_cart_collaterals' ); ?>

	</div>

	<?php do_action( 'woocommerce_after_cart' ); ?>
	
</div>

<?php do_action( 'woocommerce_after_main_content' ); ?>
<?php get_template_part('template-parts/join-us'); ?>
