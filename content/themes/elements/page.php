<?php
get_header();

/*
 * Check if we are on a WooCommerce page
 * If so, echo content to enable the shortcode
 */
if( is_woocommerce() ){
  the_content();
}

get_elements();

get_footer();
?>
