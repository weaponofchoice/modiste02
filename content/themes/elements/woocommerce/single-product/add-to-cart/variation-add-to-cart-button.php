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
<a class="product-download">Download product sheet</a>

<div itemprop="offers" itemscope itemtype="http://schema.org/Offer">
	<p class="price"><?php echo $product->get_price_html(); ?></p>
  <p class="is-grey">ready to ship in 6/8 weeks</p>

	<meta itemprop="price" content="<?php echo esc_attr( $product->get_price() ); ?>" />
	<meta itemprop="priceCurrency" content="<?php echo esc_attr( get_woocommerce_currency() ); ?>" />
	<link itemprop="availability" href="http://schema.org/<?php echo $product->is_in_stock() ? 'InStock' : 'OutOfStock'; ?>" />
</div>

<div class="woocommerce-variation-add-to-cart variations_button">
	<button type="submit" class="single_add_to_cart_button button button-roll alt"><span>order online</span><span class="hover">order online</span></button>
	<input type="hidden" name="add-to-cart" value="<?php echo absint( $product->id ); ?>" />
	<input type="hidden" name="product_id" value="<?php echo absint( $product->id ); ?>" />
	<input type="hidden" name="variation_id" class="variation_id" value="0" />

  <a class="button button-roll button-sec" href="mailto:lucawater@gmail.com"><span>inquire</span><span class="hover">inquire</span></a>
</div>
