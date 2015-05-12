<?php
require_once 'config.php';

$user = new User();

$inputusername = $_POST["username"];
$inputpassw = $_POST["password"];
$inputUsername = strip_tags($inputusername);
$inputPassword = trim($inputpassw);
$inputPassword = strip_tags($inputPassword);

$username = $user->checkLoginInfo($inputUsername, $inputPassword);
$username = $username['username'];

if($username != null)
{
	$_SESSION['username'] = $username;
	$user = $user->getUserByUsername($username);	
} 
else
{
	$_SESSION["wrongusernameorpassword"] = true;	
}

header("Location: index.php");

?>