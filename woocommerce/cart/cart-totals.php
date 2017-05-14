<?php
/**
 * Cart totals
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.3.6
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>
<div class="cart_totals <?php if ( WC()->customer->has_calculated_shipping() ) echo 'calculated_shipping'; ?>">

	<?php do_action( 'woocommerce_before_cart_totals' ); ?>

	<?php/* _e( 'Cart Totals', 'woocommerce' );*/ ?>
	
	<h2>Оформление заказа</h2>

	<?php if ( WC()->cart->get_cart_tax() ) : ?>
		<p class="wc-cart-shipping-notice"><small><?php

			$estimated_text = WC()->customer->is_customer_outside_base() && ! WC()->customer->has_calculated_shipping()
				? sprintf( ' ' . __( ' (taxes estimated for %s)', 'woocommerce' ), WC()->countries->estimated_for_prefix() . __( WC()->countries->countries[ WC()->countries->get_base_country() ], 'woocommerce' ) )
				: '';

			printf( __( 'Note: Shipping and taxes are estimated%s and will be updated during checkout based on your billing and shipping information.', 'woocommerce' ), $estimated_text );

		?></small></p>
	<?php endif; ?>

	<div class="wc-proceed-to-checkout">

	
	
	
	
	<?php
	
		$productsHtmlList = '';
		$poductText = '';
		foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
		
			$_product     = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
			$product_id   = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

			if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
				?>
				

						<?php
							if ( ! $_product->is_visible() ) {
								
								echo apply_filters( 'woocommerce_cart_item_name', $_product->get_title(), $cart_item, $cart_item_key ) . '&nbsp;';
							} else {
								$ids .= $product_id . ',';
								//как текст
								$poductText .= $_product->get_title() . '. id товара: ' . $product_id . " . 
    ";
								//с id
								//$productsHtmlList .= apply_filters( 'woocommerce_cart_item_name', sprintf( '<a href="%s">%s </a>', esc_url( $_product->get_permalink( $cart_item ) ), $_product->get_title() ), $cart_item, $cart_item_key );
								//$productsHtmlList .= '(id товара: ' . $product_id . ').<br>';

							}

						?>

			
				<?php
			}
		}
		
		?>
	
	

	
	
	
		<?php/* do_action( 'woocommerce_proceed_to_checkout' );*/ ?>
		<form action="" class="order_form" method="post">
			<label class="form-group cart-name">
				<span class="color_element">*</span> Ваше имя:
				<input type="text" name="name" placeholder="Ваше имя" required />
			</label>
			<label class="form-group cart-phone">
				<span class="color_element">*</span> Ваш телефон:
				<input type="text" name="phone" placeholder="Ваш телефон" required />
			</label>
			<label class="form-group cart-email">
				Ваш E-mail:
				<input type="text" name="email" placeholder="Ваш E-mail" />
			</label>
			<label class="form-group cart-message">
				Ваше сообщение:
				<textarea name="message" placeholder="Ваше сообщение"><?php echo $poductText; ?></textarea>
				
				<input type="hidden" name="ids-products" value="<?php echo $ids; ?>" />
			</label>
			<button>Оформить заказ</button>
		</form>
		
		
		
		
	</div>

	<?php do_action( 'woocommerce_after_cart_totals' ); ?>

</div>
