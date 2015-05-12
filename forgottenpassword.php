<?php
require_once 'config.php';

if (isset($_GET['showForgottenPassword']))
{
	$_SESSION['showForgottenPassword'] = true;
	header("Location: index.php");
}

if (isset($_POST['email']))
{
	$email = $_POST['email'];
	
	$user = new User();
	if($user->checkIfEmailExists($mail))
	{
		$emailsender = new SendEmail();
		
		$emailsender->SendEmailToResetPassword($email);
		
		//echo "An email with a link to reset your password has been sent to the supplied email-address.";
		
	}
	else
	{
		$_SESSION['emaildoesnotexist'] = true;
	}
}

header("Location: index.php");
?>