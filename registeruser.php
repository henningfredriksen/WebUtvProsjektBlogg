
<?php
require_once 'config.php';

$validator = new ValidateUserInput();
$emailsender = new SendEmail();
$dbaccess = new DBAccess();

if (isset($_GET['showRegisterUser']))
{
//	$smarty->assign('showRegisterUser', true);
	$_SESSION['showRegisterUser'] = true;
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
		$query = "SELECT email FROM users WHERE email= ?";
		$params[0] = $email;
		$result = $dbaccess->run_prepared_query($query, $params);
		
		if(!isset($result['email'])) {
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
		}
		else 
		{
			$_SESSION['useremailalreadyexists'] = true;
		}
	}
	else 
	{
		$_SESSION['passwordmismatchoncreation'] = true;
		//	echo "<a href=RegistrerBruker.html>Pr�v p� nytt</a></p>";
	
	} 
}


header("Location: index.php");
