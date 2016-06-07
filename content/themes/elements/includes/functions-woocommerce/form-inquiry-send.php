<?php
if($_SERVER['REQUEST_METHOD'] == "POST") {

  // addresses and subjects
  $email_to = "lucawater@gmail.com";
  $email_subject = "Modiste product inquiry";
  $email_subject2 = "Copy of your inquiry at Modiste";

  // error function
  function died($error) {
    // your error code can go here
    echo "<p>We are very sorry, but there were errors found with the form you submitted. ";
    echo "These errors appear below.<br /><br />";
    echo $error."<br /><br />";
    echo "Please go back and fix these errors.<br /><br /></p>";
    die();
  }

  // validation expected data exists
  if( !isset($_POST['first_name']) || !isset($_POST['last_name']) || !isset($_POST['email']) || !isset($_POST['message']) ){
    died('We are sorry, but there appears to be a problem with the form you submitted.');
  }

  $first_name = $_POST['first_name']; // required
  $last_name = $_POST['last_name']; // required
  $email_from = $_POST['email']; // required
  $message = $_POST['message']; // not required

  $option_color = $_POST['option_color'];
  $option_size = $_POST['option_size'];
  $option_addon = $_POST['option_addon'];

  // build error message
  $error_message = "";

  $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';

  if(!preg_match($email_exp,$email_from)) {
    $error_message .= 'The Email Address you entered does not appear to be valid.<br />';
  }

  $string_exp = "/^[A-Za-z .'-]+$/";

  if(!preg_match($string_exp,$first_name)) {
    $error_message .= 'The First Name you entered does not appear to be valid.<br />';
  }

  if(!preg_match($string_exp,$last_name)) {
    $error_message .= 'The Last Name you entered does not appear to be valid.<br />';
  }

  if(strlen($error_message) > 0) {
    died($error_message);
  }

  // create email message
  $email_message = "Form details below.\n\n";

  function clean_string($string) {
    $bad = array("content-type","bcc:","to:","cc:","href");
    return str_replace($bad,"",$string);
  }

  $email_message .= "Name: " . clean_string($first_name) . " " . clean_string($last_name) . "\n";
  $email_message .= "Email: " . clean_string($email_from) . "\n\n";
  $email_message .= "Product selection: " . "\n" . "Color: " . clean_string($option_color) . "\n" . "Size: " . clean_string($option_size) . "\n" . "Add-on: " . clean_string($option_addon) . "\n\n";
  $email_message .= clean_string($first_name) . "wrote the following: \n\n" . clean_string($message);

  $email_message2 = "Dear: " . clean_string($first_name) . ", \n\n";
  $email_message2 .= "You made an inquiry at Modiste Furniture with this selection: \n";
  $email_message2 .= "Color: " . $option_color . "\n" . "Size: " . $option_size . "\n" . "Add-on: " . $option_addon . "\n\n";
  $email_message2 .= "We will get back to you as soon as possible" . "\n\n" . "Sincerely," . "\n" . "Modiste team";

  // create email headers
  $headers = 'From: ' . $email_from . "\r\n" .
  'Reply-To: ' . $email_from . "\r\n" .
  'X-Mailer: PHP/' . phpversion();

  $headers2 = 'From: ' . $email_to . "\r\n" .
  'Reply-To: ' . $email_to . "\r\n" .
  'X-Mailer: PHP/' . phpversion();

  @mail($email_to, $email_subject, $email_message, $headers);
  @mail($email_from, $email_subject2, $email_message2, $headers2);

  $notice = "<div><p>Thank you for contacting us. We will be in touch with you very soon.</p></div>";
  wc_add_notice( $notice );
}
?>