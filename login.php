<?php
require_once 'config.php';

$user = new User();

$inputusername = $_POST["username"];
$inputpassw = $_POST["password"];
$inputUsername = strip_tags($inputusername);
$inputPassword = trim($inputpassw);
$inputPassword = strip_tags($inputPassword);

$login = $user->checkLoginInfo($inputUsername, $inputPassword);

if(isset($login))
{
	$_SESSION['login'] = $login;	
} 
else
{
	$_SESSION["wrongusernameorpassword"] = true;	
}

header("Location: index.php");

?>