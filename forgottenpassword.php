<?php
require_once 'config.php';

if (isset($_GET['showForgottenPassword']))
{
	$_SESSION['showForgottenPassword'] = true;
	header("Location: index.php");
}

$email = $_GET['email'];

$emailsender = new SendEmail();

$emailsender->SendEmailToResetPassword($email);

echo "An email with a link to reset your password has been sent to the supplied email-address.";

?>