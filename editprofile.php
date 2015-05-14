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

/*
 * Editprofile.php has two purposes.
 * 
 * The first is to receive the $_GET variable send from the href in login.tpl and
 * send a variable back to index.php via session, where a smarty variable is
 * set to allow the showing of editprofile.tpl in the left floating box
 * 
 * The second is to handle the $_POST variable sent from editprofile.tpl, which is
 * a form submitted uploaded file. If a file is submitted, it is validated before it is
 * permanently uploaded to /uploadedfiles. The savePicture() method in User.class.php
 * saves a new generated filename, and the mimetype to the users table in DB.
 * The method handles deletion of the old file when a new one is written to DB.
 */

if (isset($_GET['editprofile']))
{
	$_SESSION['editprofile'] = true;
	header("Location: index.php");
}

// if uploaded file exists
if ($_FILES['profilepic']['name'])
{	
	$MAX_FILESIZE = 1000000;
	$MAX_WIDTH = 100;
	$MAX_HEIGHT = 100;
	
	$filename = $_FILES['profilepic']['name'];
	$filemimetype = $_FILES['profilepic']['type'];
	$filesize = $_FILES['profilepic']['size'];
	$filetmpname = $_FILES['profilepic']['tmp_name'];
	$fileerror = $_FILES['profilepic']['error'];
	
	$userid = $_POST['userid'];
	$generatedFilename = "profilepic" . time() . $filename;
	
	$validator = new ValidateUserInput();	
	
	// move file
	if ($validator->validateFile($filename, $filemimetype, $filesize, $filetmpname, $fileerror, $MAX_FILESIZE, $MAX_WIDTH, $MAX_HEIGHT))
	{
		move_uploaded_file($filetmpname, 'uploadedfiles/'. $generatedFilename);
		
		$user = new User();
		$user->setPictureFilename($generatedFilename);
		$user->setPictureMimetype($filemimetype);
		
		$user->savePicture($userid);
	}
}
	
header("Location: index.php");

?>