<?php
require_once 'config.php';

if(isset($_SESSION['login'])) {
	$login = $_SESSION['login'];
	if($login->getIpAddress() != $_SERVER["REMOTE_ADDR"]) {
		header("Location: index.php");
	}
	if($login->getUserAgent() != $_SERVER['HTTP_USER_AGENT']){
		header("Location: index.php");
	}
}

if (isset($_GET['showChangePassword']))
{
	$_SESSION['showChangePassword'] = true;
	header("Location: index.php");
}

$dbaccess = new DBAccess();
$user = new User();

if(isset($_SESSION['resetingemail']))
{
	$query = "SELECT username FROM users WHERE email = ?";
	$params[0] = $_SESSION['resetingemail'];	
	$result = $dbaccess->run_prepared_query($query, $params);
	$result = $result->fetch();
	$username = $result['username'];
}


if(isset($_POST['oldpassword'], $_POST['newpassword'], $_POST['rnewpassword']))
{
	$activeusername = $_SESSION['username'];
	$oldpassword = $_POST["oldpassword"];
	
	$username = $user->checkLoginInfo($activeusername, $oldpassword);
	$username = $username['username'];
	
	$newpassword = $_POST["newpassword"];
	$rnewpassword = $_POST["rnewpassword"];
	
	if($newpassword == $rnewpassword) 
	{	
		if(isset($username)) 
		{
			$query = "UPDATE users SET password=? WHERE username=?";
			
			$newpassword = $user->getHash($newpassword, $username);
			
			$params[0] = $newpassword;
			$params[1] = $username;
			
			$dbaccess->run_prepared_query($query, $params);
			header("Location: logout.php");
		}
		else
		{
			$_SESSION['wrongpasswordonchangepassword'] = true;		
		}
	}
	else 
	{
		$_SESSION['passwordmismatchonchangepassword'] = true;	
	}
}

header("Location: index.php");

?>