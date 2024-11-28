<?php
/**
 * Single Product title
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/title.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see        https://woocommerce.com/document/template-structure/
 * @package    WooCommerce\Templates
 * @version    1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>

<div class="product-title-share-wrapper">
	<?php the_title( '<h1 class="product_title entry-title">', '</h1>' ); ?>

	<!-- add share icon API -->
	<button id="shareButton" class="product-title-share-wrapper__share-api-button">
		<svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
			<path d="M26.6667 31.2222C25.7407 31.2222 24.9537 30.8981 24.3056 30.25C23.6574 29.6019 23.3333 28.8148 23.3333 27.8889C23.3333 27.7778 23.3611 27.5185 23.4167 27.1111L15.6111 22.5556C15.3148 22.8333 14.9722 23.0511 14.5833 23.2089C14.1944 23.3667 13.7778 23.4452 13.3333 23.4444C12.4074 23.4444 11.6204 23.1204 10.9722 22.4722C10.3241 21.8241 10 21.037 10 20.1111C10 19.1852 10.3241 18.3981 10.9722 17.75C11.6204 17.1019 12.4074 16.7778 13.3333 16.7778C13.7778 16.7778 14.1944 16.8567 14.5833 17.0144C14.9722 17.1722 15.3148 17.3896 15.6111 17.6667L23.4167 13.1111C23.3796 12.9815 23.3567 12.8567 23.3478 12.7367C23.3389 12.6167 23.3341 12.4822 23.3333 12.3333C23.3333 11.4074 23.6574 10.6204 24.3056 9.97222C24.9537 9.32407 25.7407 9 26.6667 9C27.5926 9 28.3796 9.32407 29.0278 9.97222C29.6759 10.6204 30 11.4074 30 12.3333C30 13.2593 29.6759 14.0463 29.0278 14.6944C28.3796 15.3426 27.5926 15.6667 26.6667 15.6667C26.2222 15.6667 25.8056 15.5878 25.4167 15.43C25.0278 15.2722 24.6852 15.0548 24.3889 14.7778L16.5833 19.3333C16.6204 19.463 16.6437 19.5881 16.6533 19.7089C16.663 19.8296 16.6674 19.9637 16.6667 20.1111C16.6659 20.2585 16.6615 20.393 16.6533 20.5144C16.6452 20.6359 16.6219 20.7607 16.5833 20.8889L24.3889 25.4444C24.6852 25.1667 25.0278 24.9493 25.4167 24.7922C25.8056 24.6352 26.2222 24.5563 26.6667 24.5556C27.5926 24.5556 28.3796 24.8796 29.0278 25.5278C29.6759 26.1759 30 26.963 30 27.8889C30 28.8148 29.6759 29.6019 29.0278 30.25C28.3796 30.8981 27.5926 31.2222 26.6667 31.2222Z" fill="black" />
		</svg>
	</button>
</div>