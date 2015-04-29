<?php
require_once 'config.php';

$dbaccess = new DBAccess();
$user = new User();

$oldpassword = $_POST["oldpassword"];
$newpassword = $_POST["newpassword"];
$rnewpassword = $_POST["rnewpassword"];

$activeusername = $_SESSION['username'];

if($newpassword == $rnewpassword) {
	
	$username = $user->checkLoginInfo($activeusername, $oldpassword);
	$username = $username['username'];
	
	if(isset($username)) {
		$query = "UPDATE users SET password=? WHERE username=?";
		
		$newpassword = $user->getHash($newpassword, $username);
		
		$params[0] = $newpassword;
		$params[1] = $username;
		
		$dbaccess->run_prepared_query($query, $params);
		
		header("Location: index.php");
	}else {
		echo "Feil passord";
	}
}else {
	echo "Nye passord m� v�re like";
}