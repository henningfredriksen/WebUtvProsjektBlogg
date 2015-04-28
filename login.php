<?php
require_once 'config.php';

$user = new user();

$inputusername = $_POST["username"];
$inputpassw = $_POST["password"];
$inputUsername = strip_tags($inputusername);
$inputPassword = trim($inputpassw);
$inputPassword = strip_tags($inputPassword);


$username = $user->checkLoginInfo($inputUsername, $inputPassword);

if($username){
	$_SESSION['username'] = $username['username'];
	header("Location: index.php");
} else {
	echo "Feil brukernavn eller passord";
}  