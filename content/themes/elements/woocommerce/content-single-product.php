<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you (the theme developer).
 * will need to copy the new files to your theme to maintain compatibility. We try to do this.
 * as little as possible, but it does happen. When this occurs the version of the template file will.
 * be bumped and the readme will list any important changes.
 *
 * @see 	    http://docs.woothemes.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

?>

<?php
	/**
	 * woocommerce_before_single_product hook.
	 *
	 * @hooked wc_print_notices - 10
	 */
	 do_action( 'woocommerce_before_single_product' );

	 if ( post_password_required() ) {
	 	echo get_the_password_form();
	 	return;
	 }
?>

<div itemscope itemtype="<?php echo woocommerce_get_product_schema(); ?>" id="product-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php
		/**
		 * woocommerce_before_single_product_summary hook.
		 *
		 * @hooked woocommerce_show_product_sale_flash - 10
		 * @hooked woocommerce_show_product_images - 20
		 */
		do_action( 'woocommerce_before_single_product_summary' );
	?>

	<div class="summary entry-summary">

    <?php echo '<a class="link-arrow" href="' . get_permalink( woocommerce_get_page_id( 'shop' ) ) . '">Return to overview<img src="' . get_template_directory_uri() . '/img/arrow.svg"></a>'; ?>

    <div>
  		<?php
  			/**
  			 * woocommerce_single_product_summary hook.
  			 *
  			 * @hooked woocommerce_template_single_title - 5
  			 * @hooked woocommerce_template_single_rating - 10
  			 * @hooked woocommerce_template_single_price - 10
  			 * @hooked woocommerce_template_single_excerpt - 20
  			 * @hooked woocommerce_template_single_add_to_cart - 30
  			 * @hooked woocommerce_template_single_meta - 40
  			 * @hooked woocommerce_template_single_sharing - 50
  			 */
  			do_action( 'woocommerce_single_product_summary' );
  		?>
    </div>

	</div><!-- .summary -->

	<?php
		/**
		 * woocommerce_after_single_product_summary hook.
		 *
		 * @hooked woocommerce_output_product_data_tabs - 10
		 * @hooked woocommerce_upsell_display - 15
		 * @hooked woocommerce_output_related_products - 20
		 */
		do_action( 'woocommerce_after_single_product_summary' );
	?>

	<meta itemprop="url" content="<?php the_permalink(); ?>" />

</div><!-- #product-<?php the_ID(); ?> -->

<div id="product-inquiry">
  <?php
  if(isset($_POST['submit'])){
    $to = "lucawater@gmail.com"; // this is your Email address
    $from = $_POST['email']; // this is the sender's Email address
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $option_color = $_POST['option_color'];
    $option_size = $_POST['option_size'];
    $option_addon = $_POST['option_addon'];
    $subject = "Form submission";
    $subject2 = "Copy of your form submission";
    if( $_POST['message'] ){
      $message = "Name: " . $first_name . " " . $last_name . "\n\n" . "Product selection: " . "\n" . "Color: " . $option_color . "\n" . "Size: " . $option_size . "\n" . "Add-on: " . $option_addon . "\n\n" . $first_name . " wrote the following:" . "\n\n" . $_POST['message'];
    } else {
      $message = "Name:" . $first_name . " " . $last_name . "\n\n" . "Product selection: " . "\n" . "Color: " . $option_color . "\n" . "Size: " . $option_size . "\n" . "Add-on: " . $option_addon;
    }

    $message2 = "Dear " . $first_name . ", \n\n" . "You made an inquiry at Modiste Furniture with this selection:" . "\n" . "Color: " . $option_color . "\n" . "Size: " . $option_size . "\n" . "Add-on: " . $option_addon . "\n\n" . "We will get back to you as soon as possible" . "\n\n" . "Sincerely," . "\n" . "Modiste team";

    $headers = "From:" . $from;
    $headers2 = "From:" . $to;
    mail($to,$subject,$message,$headers);
    mail($from,$subject2,$message2,$headers2); // sends a copy of the message to the sender
    echo "Mail Sent. Thank you " . $first_name . ", we will contact you shortly.";
    // You can also use header('Location: thank_you.php'); to redirect to another page.
  }

  ?>
  <h2>Inquiry</h2>
  <form action="" method="post">
    <div>
      <h3>Your selection:</h3>
      <h3 class="option-color">Color: <span></span></h3>
      <h3 class="option-size">Size: <span></span></h3>
      <h3 class="option-addon">Add-on: <span></span></h3>
    </div>

    <input type="hidden" name="option_color" value="">
    <input type="hidden" name="option_size" value="">
    <input type="hidden" name="option_addon" value="">

    <p class="form-row form-row-wide">
      <label>First name:</label>
      <input type="text" name="first_name" required>
    </p>

    <p class="form-row form-row-wide">
      <label>Last name:</label>
      <input type="text" name="last_name" required>
    </p>

    <p class="form-row form-row-wide">
      <label>Email:</label>
      <input type="text" name="email" required>
    </p>

    <p class="form-row form-row-wide">
      <label>Message:</label>
      <textarea rows="5" name="message" cols="30"></textarea>
    </p>

    <button type="submit" name="submit"><span>Send inquiry</span><span>Send inquiry</span></button>
  </form>
</div>


<div id="product-editorial">
  <?php get_elements(); ?>
</div>

<div id="product-materials">
  <?php get_template_part( 'woocommerce/single-product/materials' ); ?>

  <?php $product_sheet = get_field('product_sheet'); ?>
  <a class="button" href="<?php echo $product_sheet['url']; ?>" target="_blank">download product sheet</a>
</div>

<?php do_action( 'woocommerce_after_single_product' ); ?>