<?php
if(!isset($_POST['submit']))
{
	//This page should not be accessed directly. Need to submit the form.
	echo "error; you need to submit the form!";
}
$subject = $_POST['name'];
$visitor_email = $_POST['email'];
$message = $_POST['message'];

mail("seinugardens8@gmail.com", $subject, $message, $visitor_email);
header("Location: ./index.php");
?>