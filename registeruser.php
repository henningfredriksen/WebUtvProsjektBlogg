
<?php
require_once 'config.php';

$validator = new ValidateUserInput();
$emailsender = new SendEmail();

$name = $_POST["personname"];
$username = $_POST["username"];
$email = $_POST["email"];
$password = $_POST["password"];
$rpassword = $_POST["rpassword"];

if($password == $rpassword) {
	$user = new User();
	
	$password = trim($password);
	$name = $validator->validateInputString($name);
	$username = $validator->validateInputString($username);
	$email = $validator->validateInputString($email);
	
	$user->setName($name);
	$user->setUserName($username);
	$user->setEmail($email);
	$user->setPassword($password);
	$user->generateHash();
	
	$user->saveUser();
	$emailsender->SendEmailToConfirm($email);
	
	header("Location: index.php");

} else {
	echo "Passord m� v�re like";
	echo "<a href=RegistrerBruker.html>Pr�v p� nytt</a></p>";
}
