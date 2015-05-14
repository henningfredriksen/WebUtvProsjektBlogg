<?php
require_once 'config.php';

//checks that the user is logged in properly before allowing access to this file
if(isset($_SESSION['login'])) {
	$login = $_SESSION['login'];
	if($login->getIpAddress() != $_SERVER["REMOTE_ADDR"]) {
		header("Location: index.php");
	}
	if($login->getUserAgent() != $_SERVER['HTTP_USER_AGENT']){
		header("Location: index.php");
	}
}

//if this file is accessed from the change password link, the showChangePassword session variable is set to true
if (isset($_GET['showChangePassword']))
{
	$_SESSION['showChangePassword'] = true;
	header("Location: index.php");
}

$dbaccess = new DBAccess();
$user = new User();

//if the user is reseting the password from a link, the resetingemail variable is set in validatelink.php
//
if(isset($_SESSION['resetingemail']))
{
	$query = "SELECT username FROM users WHERE email = ?";
	$params[0] = $_SESSION['resetingemail'];	
	$result = $dbaccess->run_prepared_query($query, $params);
//	$result = $result->fetch();
	$activeusername = $result['username'];
	
	$newpassword = $_POST["newpassword"];
	$rnewpassword = $_POST["rnewpassword"];
	
	if($newpassword == $rnewpassword)
	{
		$query = "UPDATE users SET password=? WHERE username=?";
			
		$newpassword = $user->getHash($newpassword, $activeusername);
			
		$params[0] = $newpassword;
		$params[1] = $activeusername;
			
		$dbaccess->run_prepared_query($query, $params);
		header("Location: index.php");		
	}
	else
	{
		$_SESSION['passwordmismatchonchangepassword'] = true;
	}
}


if(isset($_POST['oldpassword'], $_POST['newpassword'], $_POST['rnewpassword']))
{
	$activeusername = $_SESSION['login']->getUsername();
	$oldpassword = $_POST["oldpassword"];
	
	$login = $user->checkLoginInfo($activeusername, $oldpassword);
	
	$newpassword = $_POST["newpassword"];
	$rnewpassword = $_POST["rnewpassword"];
	
	if($newpassword == $rnewpassword) 
	{	
		if($login) 
		{
			$username = $login->getUsername();
			
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