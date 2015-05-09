<?php
require_once 'config.php';

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