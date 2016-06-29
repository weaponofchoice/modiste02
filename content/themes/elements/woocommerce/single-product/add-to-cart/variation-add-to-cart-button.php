<?php
/**
 * Single variation cart button
 *
 * @see 	http://docs.woothemes.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.5.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $product;
?>

<p class="is-grey product-shipping">ready to ship in 6/8 weeks</p>

<div class="woocommerce-variation-add-to-cart variations_button">
	<button type="submit" class="single_add_to_cart_button button alt">order online</button>
	<input type="hidden" name="add-to-cart" value="<?php echo absint( $product->id ); ?>" />
	<input type="hidden" name="product_id" value="<?php echo absint( $product->id ); ?>" />
	<input type="hidden" name="variation_id" class="variation_id" value="0" />

  <a id="inquiry" href="#product-inquiry" class="button button-sec">inquire</a>
</div>
