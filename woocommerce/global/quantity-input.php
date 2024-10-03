<?php
/**
 * Product quantity inputs
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/global/quantity-input.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 7.8.0
 *
 * @var bool   $readonly If the input should be set to readonly mode.
 * @var string $type     The input type attribute.
 */

defined( 'ABSPATH' ) || exit;

/* translators: %s: Quantity. */
$label = ! empty( $args['product_name'] ) ? sprintf( esc_html__( '%s quantity', 'woocommerce' ), wp_strip_all_tags( $args['product_name'] ) ) : esc_html__( 'Quantity', 'woocommerce' );

?>
<div class="quantity">
	<?php
	/**
	 * Hook to output something before the quantity input field.
	 *
	 * @since 7.2.0
	 */
	do_action( 'woocommerce_before_quantity_input_field' );
	?>

		<div class="input-group">
			<button type='button' class="btn-minus">
				<svg width="44" height="44" viewBox="0 0 44 44" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M17.5 22H26.5" stroke="#070707" />
				</svg>
			</button>
			<label class="screen-reader-text" for="<?php echo esc_attr( $input_id ); ?>"><?php echo esc_attr( $label ); ?></label>
			<input
				type="<?php echo esc_attr( $type ); ?>"
				<?php echo $readonly ? 'readonly="readonly"' : ''; ?>
				id="<?php echo esc_attr( $input_id ); ?>"
				class="<?php echo esc_attr( join( ' ', (array) $classes ) ); ?>"
				name="<?php echo esc_attr( $input_name ); ?>"
				value="<?php echo esc_attr( $input_value ); ?>"
				aria-label="<?php esc_attr_e( 'Product quantity', 'woocommerce' ); ?>"
				size="4"
				min="<?php echo esc_attr( $min_value ); ?>"
				max="<?php echo esc_attr( 0 < $max_value ? $max_value : '' ); ?>"
				<?php if ( ! $readonly ) : ?>
					step="<?php echo esc_attr( $step ); ?>"
					placeholder="<?php echo esc_attr( $placeholder ); ?>"
					inputmode="<?php echo esc_attr( $inputmode ); ?>"
					autocomplete="<?php echo esc_attr( isset( $autocomplete ) ? $autocomplete : 'on' ); ?>"
				<?php endif; ?>
			/>
			<button type='button' class="btn-plus">
				<svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path fill-rule="evenodd" clip-rule="evenodd" d="M5.5 4.5V0.5H4.5L4.5 4.5H0.5V5.5H4.5L4.5 9.5H5.5V5.5H9.5V4.5H5.5Z" fill="#070707" />
				</svg>
			</button>
		</div>
	<?php
	/**
	 * Hook to output something after quantity input field
	 *
	 * @since 3.6.0
	 */
	do_action( 'woocommerce_after_quantity_input_field' );
	?>
</div>
<?php
