<?php
/**
 * @package WordPress
 * @subpackage HTML5_Boilerplate */

apply_filters( 'wc_additional_variation_images_main_images_class', 'thumbnails' );


function wpb_mce_buttons_2($buttons) {
  array_unshift($buttons, 'styleselect');
  return $buttons;
}
add_filter('mce_buttons_2', 'wpb_mce_buttons_2');

/*
* Callback function to filter the MCE settings
*/

function my_mce_before_init_insert_formats( $init_array ) {

// Define the style_formats array

  $style_formats = array(
    // Each array child is a format with it's own settings
    array(
      'title' => 'Founders 15',
      'block' => 'span',
      'classes' => 'founders-15',
      'wrapper' => true,
    )
  );
  // Insert the array, JSON ENCODED, into 'style_formats'
  $init_array['style_formats'] = json_encode( $style_formats );

  return $init_array;

}
// Attach callback to 'tiny_mce_before_init'
add_filter( 'tiny_mce_before_init', 'my_mce_before_init_insert_formats' );

// Includes
require_once('includes/scripts.php');

// Inludes: template functions
require_once('includes/functions-template/elements.php');
require_once('includes/functions-template/posts.php');
require_once('includes/functions-template/section.php');
require_once('includes/functions-template/section-header.php');
require_once('includes/functions-template/section-grid.php');
require_once('includes/functions-template/section-slider.php');

// Includes: WooCommerce
require_once('woocommerce/woo-functions.php');
require_once('includes/functions-woocommerce/cart-update.php');

// Add ACF options page for footer info
if( function_exists('acf_add_options_page') ) {
  $option_page = acf_add_options_page(array(
    'page_title' 	=> 'Footer',
    'menu_title' 	=> 'Footer',
    'menu_slug' 	=> 'footer',
    'capability' 	=> 'edit_posts',
    'redirect' 	=> false
  ));
}

// Add support for WooCommerce
add_action( 'after_setup_theme', 'woocommerce_support' );
function woocommerce_support() {
  add_theme_support( 'woocommerce' );
}

// Function to check if is any type of woocommerce page
function is_really_woocommerce_page () {
  if(  function_exists ( "is_woocommerce" ) && is_woocommerce()){
    return true;
  }

  $woocommerce_keys = array("woocommerce_shop_page_id","woocommerce_terms_page_id","woocommerce_cart_page_id","woocommerce_checkout_page_id","woocommerce_pay_page_id","woocommerce_thanks_page_id","woocommerce_myaccount_page_id","woocommerce_edit_address_page_id","woocommerce_view_order_page_id","woocommerce_change_password_page_id","woocommerce_logout_page_id","woocommerce_lost_password_page_id" );

  foreach ( $woocommerce_keys as $wc_page_id ) {
    if ( get_the_ID () == get_option ( $wc_page_id , 0 ) ) {
      return true ;
    }
  }

  return false;
}

// Removing Woocommerce's standard select replacement
add_action( 'wp_enqueue_scripts', 'mgt_dequeue_stylesandscripts', 100 );

function mgt_dequeue_stylesandscripts() {
    if ( class_exists( 'woocommerce' ) ) {
        wp_dequeue_style( 'select2' );
        wp_deregister_style( 'select2' );

        wp_dequeue_script( 'select2');
        wp_deregister_script('select2');

    }
}

// Change the WooCommerce paypal icon
add_filter('woocommerce_paypal_icon', 'custom_woocommerce_paypal_icon');

function custom_woocommerce_paypal_icon( $url ) {
  $url = get_bloginfo('template_url')."/img/pay-paypal.svg";
  return $url;
}

// Remove WooCommerce page titles
add_filter( 'woocommerce_show_page_title', function() { return false; } );

// Initialize mobile detect
require_once('includes/mobile-detect.php');
$detect = new Mobile_Detect;

// Hide admin bar
add_filter('show_admin_bar', '__return_false');

// Add support for post-thumbnails
// https://codex.wordpress.org/Post_Thumbnails
add_theme_support( 'post-thumbnails' );

// Add support for automatic RSS feed links
add_theme_support( 'automatic-feed-links' );

// Allow svg files to be added to the media folder
function cc_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');

// Purge Custom Post-types from cache after update
add_action( 'edit_post', 'w3_flush_page_custom', 10, 1 );

function w3_flush_page_custom( $post_id ) {
  if ( function_exists('w3tc_pgcache_flush' ) ):
    w3tc_pgcache_flush();
  endif;
}

/* Cleaner image captions */
add_filter( 'img_caption_shortcode', 'cleaner_caption', 10, 3 );

function cleaner_caption( $output, $attr, $content ) {
  // We're not worried about captions in feeds, so just return the output here
  if ( is_feed() )
    return $output;

  // Set up the default arguments
  $defaults = array(
    'id' => '',
    'align' => 'alignnone',
    'width' => '',
    'caption' => ''
  );

  // Merge the defaults with user input
  $attr = shortcode_atts( $defaults, $attr );

  // If the width is less than 1 or there is no caption, return the content wrapped between the [caption]< tags
  if ( 1 > $attr['width'] || empty( $attr['caption'] ) )
    return $content;

  // Set up the attributes for the caption <div>
  $attributes = ( !empty( $attr['id'] ) ? ' id="' . esc_attr( $attr['id'] ) . '"' : '' );
  $attributes .= ' class="wp-caption ' . esc_attr( $attr['align'] ) . '"';

  // Open the caption <div>
  $output = '<div' . $attributes .'>';

  // Allow shortcodes for the content the caption was created for
  $output .= do_shortcode( $content );

  // Append the caption text
  $output .= '<p class="wp-caption-text">' . $attr['caption'] . '</p>';

  // Close the caption </div>
  $output .= '</div>';

  // Return the formatted, clean caption
  return $output;
}

// Remove nasty p's around img tags
function filter_ptags_on_images($content){
  return preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
}

add_filter('the_content', 'filter_ptags_on_images');

/* Enable custom menu support
 * Customize to your needs */
if( function_exists('register_nav_menus') ):
  register_nav_menus( array(
    'menu_primary' => 'Main menu',
    'menu_secondary' => 'Sub menu'
  ));
endif;

/* Hide password protected posts everywhere */
// Filter to hide protected posts
function exclude_protected($where) {
  global $wpdb;
  return $where .= " AND {$wpdb->posts}.post_password = '' ";
}

// Decide where to display them
function exclude_protected_action($query) {
  if( !is_single() && !is_page() && !is_admin() ) {
    add_filter( 'posts_where', 'exclude_protected' );
  }
}

// Action to queue the filter at the right time
add_action('pre_get_posts', 'exclude_protected_action'); ?>
