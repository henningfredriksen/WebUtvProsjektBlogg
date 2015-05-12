<?php
require_once 'config.php';

$user = new User();

$inputusername = $_POST["username"];
$inputpassw = $_POST["password"];
$inputUsername = strip_tags($inputusername);
$inputPassword = trim($inputpassw);
$inputPassword = strip_tags($inputPassword);

$user = $user->checkLoginInfo($inputUsername, $inputPassword);

if($user)
{
	$_SESSION['username'] = $user->getUsername();	
} 
else
{
	$_SESSION["wrongusernameorpassword"] = true;	
}

header("Location: index.php");

?>