<?php
//vars
$email_to = "pedritopachuca@me.com";
$email_subject = "Website Contact Me";

function died($error) {
  echo "We are very sorry, but there were error(s) found with the form you submitted. ";
  echo "These errors appear below.<br /><br />";
  echo $error."<br /><br />";
  echo "Please go back and fix these errors.<br /><br />";
  die();
}

// validation expected data exists
if(!isset($_POST['name']) ||
!isset($_POST['email']) ||
!isset($_POST['web']) ||
!isset($_POST['comments'])) {
  died('We are sorry, but there appears to be a problem with the form you submitted.');
}


$name = $_POST['name'];
$email_from = $_POST['email'];
$web = $_POST['web'];
$comments = $_POST['comments'];

$error_message = "";
$email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
$string_exp = "/^[A-Za-z .'-]+$/";
if(!preg_match($email_exp,$email_from)) {
  $error_message .= 'The Email Address you entered does not appear to be valid.<br />';
}

if(!preg_match($string_exp,$first_name)) {
  $error_message .= 'The Name you entered does not appear to be valid.<br />';
}

if(strlen($error_message) > 0) {
  died($error_message);
}

$email_message = "Contact me form details below.\n\n";

function clean_string($string) {
  $bad = array("content-type","bcc:","to:","cc:","href");
  return str_replace($bad,"",$string);
}
//create message
$email_message .= "Name: ".clean_string($name)."\n";
$email_message .= "Email: ".clean_string($email_from)."\n";
$email_message .= "Website: ".clean_string($web)."\n";
$email_message .= "Comments: ".clean_string($comments)."\n";

//headers
$headers  = "MIME-Version: 1.0\r\n";
$headers .= "Content-type: text/html; charset=UTF-8\r\n";
$headers .= "From: <".$from. ">" ;

//send mail
mail($email_to, $email_subject, $email_message, $headers);

?>
