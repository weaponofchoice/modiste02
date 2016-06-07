<?php
function get_form_inquiry(){
  // if(isset($_POST['submit'])){
  //   $to = "lucawater@gmail.com"; // this is your Email address
  //   $from = $_POST['email']; // this is the sender's Email address
  //   $first_name = $_POST['first_name'];
  //   $last_name = $_POST['last_name'];
  //   $option_color = $_POST['option_color'];
  //   $option_size = $_POST['option_size'];
  //   $option_addon = $_POST['option_addon'];
  //   $subject = "Form submission";
  //   $subject2 = "Copy of your form submission";
  //   if( $_POST['message'] ){
  //     $message = "Name: " . $first_name . " " . $last_name . "\n\n" . "Product selection: " . "\n" . "Color: " . $option_color . "\n" . "Size: " . $option_size . "\n" . "Add-on: " . $option_addon . "\n\n" . $first_name . " wrote the following:" . "\n\n" . $_POST['message'];
  //   } else {
  //     $message = "Name:" . $first_name . " " . $last_name . "\n\n" . "Product selection: " . "\n" . "Color: " . $option_color . "\n" . "Size: " . $option_size . "\n" . "Add-on: " . $option_addon;
  //   }
  //
  //   $message2 = "Dear " . $first_name . ", \n\n" . "You made an inquiry at Modiste Furniture with this selection:" . "\n" . "Color: " . $option_color . "\n" . "Size: " . $option_size . "\n" . "Add-on: " . $option_addon . "\n\n" . "We will get back to you as soon as possible" . "\n\n" . "Sincerely," . "\n" . "Modiste team";
  //
  //   $headers = "From:" . $from;
  //   $headers2 = "From:" . $to;
  //   mail($to,$subject,$message,$headers);
  //   mail($from,$subject2,$message2,$headers2); // sends a copy of the message to the sender
  //   echo "Mail Sent. Thank you " . $first_name . ", we will contact you shortly.";
  //   // You can also use header('Location: thank_you.php'); to redirect to another page.
  // }
  include_once('form-inquiry-send.php');
  ?>

  <h2>Inquiry</h2>
  <form method="post" action="<?php the_permalink(); ?>">
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
  <?php
}
?>