<?php
require_once 'config.php';

$user = new User();

$inputusername = $_POST["username"];
$inputpassw = $_POST["password"];
$inputUsername = strip_tags($inputusername);
$inputPassword = trim($inputpassw);
$inputPassword = strip_tags($inputPassword);

$login = $user->checkLoginInfo($inputUsername, $inputPassword);

//if checkLoginInfo did not return false, the login-object is saved in a session
if(isset($login))
{
	if($login) {
		$_SESSION['login'] = $login;
	} else {
		$_SESSION["wrongusernameorpassword"] = true;
	}
		
}

header("Location: index.php");

?>