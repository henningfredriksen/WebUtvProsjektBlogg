<?php
require_once 'config.php';

if (isset($_GET['editprofile']))
{
	//	$smarty->assign('showRegisterUser', true);
	$_SESSION['editprofile'] = true;
	header("Location: index.php");
}

if (isset($_POST['profilepic']))
{
	
	
//	header("Location: index.php");
}

?>