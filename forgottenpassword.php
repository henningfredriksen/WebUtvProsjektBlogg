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

echo "epost med link for å nullstille passord har blitt sendt til adressen du oppga";