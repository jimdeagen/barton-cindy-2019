<?php
 
if(isset($_POST['email'])) {
 
    // EDIT THE 2 LINES BELOW AS REQUIRED
 
    $email_to = "bartonwithcindy@gmail.com";
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
 
    if(!isset($_POST['name']) ||
 
        !isset($_POST['email']) ||
 
        !isset($_POST['phone']) ||
 
        !isset($_POST['message'])) {
 
        died('We are sorry, but there appears to be a problem with the form you submitted.');       
 
    }
 
     
 
    $name = $_POST['name']; // required

    $address = $_POST['address']; // required

    $city = $_POST['city']; // required
 
    $email_from = $_POST['email']; // required
 
    $phone = $_POST['phone']; // not required

    $childname = $_POST['childname']; // not required

    $age = $_POST['age']; // not required

    $grade = $_POST['grade']; // not required
 
    $message = $_POST['message']; // required
 
     
 
    $error_message = "";
 
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
 
  if(!preg_match($email_exp,$email_from)) {
 
    $error_message .= 'The Email Address you entered does not appear to be valid.<br />';
 
  }
 
  $string_exp = "/^[A-Za-z .'-]+$/";
 
  if(!preg_match($string_exp,$name)) {
 
    $error_message .= 'The name you entered does not appear to be valid.<br />';
 
  }
 
  /*if(!preg_match($string_exp,$last_name)) {
 
    $error_message .= 'The Last Name you entered does not appear to be valid.<br />';
 
  }*/
 
  if(strlen($message) < 2) {
 
    $error_message .= 'The Comments you entered do not appear to be valid.<br />';
 
  }
 
  if(strlen($error_message) > 0) {
 
    died($error_message);
 
  }
 
    $email_message = "\n\n";
 
     
 
    function clean_string($string) {
 
      $bad = array("content-type","bcc:","to:","cc:","href");
 
      return str_replace($bad,"",$string);
 
    }
    
    $email_message .= "Name: ".clean_string($name)."\n\n";

    $email_message .= "Address: ".clean_string($address)."\n\n";

    $email_message .= "City: ".clean_string($city)."\n\n";
 
    $email_message .= "Email: ".clean_string($email_from)."\n\n";
 
    $email_message .= "Telephone: ".clean_string($phone)."\n\n";

    $email_message .= "Child's name: ".clean_string($childname)."\n\n";

    $email_message .= "Age: ".clean_string($age)."\n\n";

    $email_message .= "Grade: ".clean_string($grade)."\n\n";
 
    $email_message .= "Message: ".clean_string($message)."\n";
     
 
// create email headers
 
$headers = 'From: Barton contact'."\r\n".
 
'Reply-To: '.$email_from."\r\n" .
 
'X-Mailer: PHP/' . phpversion();
 
@mail($email_to, $email_subject, $email_message, $headers);  
 header('Location:thankyou.php');
 
 
 
 
 
}
 
 
 
 
?>