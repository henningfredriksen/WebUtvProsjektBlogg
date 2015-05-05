
<?php
require_once 'config.php';

$validator = new ValidateUserInput();
$emailsender = new SendEmail();

if (isset($_GET['showRegisterUser']))
{
	$smarty->assign('showRegisterUser', true);
	header("Location: index.php");
}

if(isset($_POST["personname"], $_POST["username"], $_POST["email"], $_POST["password"], $_POST["rpassword"]))
{
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
	} 
}
else {
	echo "Passord må være like";
	echo "<a href=RegistrerBruker.html>Prøv på nytt</a></p>";
}
