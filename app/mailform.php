<?php
 
if(isset($_POST['email'])) {
 
    // EDIT THE 2 LINES BELOW AS REQUIRED
 
    $email_to = "jim@jimdeagen.com, jimdeagen@comcast.net";
	  $email_subject = "Another Barton request";

    function died($error) {
 
        // your error code can go here
 
        echo "We are very sorry, but there were error(s) found with the form you submitted. ";
 
        echo "These errors appear below.<br /><br />";
 
        echo $error."<br /><br />";
 
        echo "Please go back and fix these errors.<br /><br />";
 
        die();
 
    }
 
    // validation expected data exists
 
    if( !isset($_POST['email']) ||
 
        !isset($_POST['message'])) {
 
        died('We are sorry, but there appears to be a problem with the form you submitted.');       
 
    }
 

    $city = $_POST['city']; // not required
 
    $email_from = $_POST['email']; // required
 
    $phone = $_POST['phone']; // not required

    $age = $_POST['age']; // not required
 
    $message = $_POST['message']; // required
 
     
 
    $error_message = "";
 
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
 
  if(!preg_match($email_exp,$email_from)) {
 
    $error_message .= 'The email address you entered does not appear to be valid.<br />';
 
  }
 
  $string_exp = "/^[A-Za-z .'-]+$/";
 
  // if(!preg_match($string_exp,$name)) {
 
  //   $error_message .= 'The name you entered does not appear to be valid.<br />';
 
  // }
 
  /*if(!preg_match($string_exp,$last_name)) {
 
    $error_message .= 'The Last Name you entered does not appear to be valid.<br />';
 
  }*/
 
  if(strlen($message) < 2) {
 
    $error_message .= 'The message field is not completed.<br />';
 
  }
 
  if(strlen($error_message) > 0) {
 
    died($error_message);
 
  }
 
    $email_message = "\n\n";
 
     
 
    function clean_string($string) {
 
      $bad = array("content-type","bcc:","to:","cc:","href");
 
      return str_replace($bad,"",$string);
 
    }
    

    $email_message .= "Town: ".clean_string($city)."\n\n";
 
    $email_message .= "Email: ".clean_string($email_from)."\n\n";
 
    $email_message .= "Telephone: ".clean_string($phone)."\n\n";

    $email_message .= "Age: ".clean_string($age)."\n\n";
 
    $email_message .= "Message: ".clean_string($message)."\n";
     
 
// create email headers
 
$headers = 'From: Barton contact'."\r\n".
 
'Reply-To: '.$email_from."\r\n" .
 
'X-Mailer: PHP/' . phpversion();
 
@mail($email_to, $email_subject, $email_message, $headers);  
 header('Location:index.html#forward');
}
?>