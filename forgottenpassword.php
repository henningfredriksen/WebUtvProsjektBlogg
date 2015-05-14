<?php
require_once 'config.php';

//if the file is accessed from the "forgot your password?"-link, the showForgottenPassword
//variable is set, so that forgottenpassword.tpl wil load in index.tpl
if (isset($_GET['showForgottenPassword']))
{
	$_SESSION['showForgottenPassword'] = true;
	header("Location: index.php");
}


//checks if input email excist in database and sends email
if (isset($_POST['email']))
{
	$email = $_POST['email'];
	
	
	$user = new User();
	$user->setEmail($email);
	
	if($user->checkIfEmailExcists())
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