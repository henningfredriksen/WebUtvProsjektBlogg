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
	$filename = $_FILES['profilepic']['name'];
	$filemimetype = $_FILES['profilepic']['type'];
	$filesize = $_FILES['profilepic']['size'];
	$filetmpname = $_FILES['profilepic']['tmp_name'];
	$fileerror = $_FILES['profilepic']['error'];
	
	$userid = $_POST['userid'];

	$generatedFilename = "profilepic" . time() . $filename;

	$validfile = false; // initial value

	// if filesize less than 1000000 bytes (1 MiB)
	if($filesize > (1000000))
	{
		$validfile = false;
	}
	else 
	{
		$validfile = true;
	}

	// checks if there are any errors
	if($fileerror != 0)
	{
		$validfile = false;
	}
	else 
	{
		$validfile = true;
	}

	// move file
	if ($validfile)
	{
		move_uploaded_file($filetmpname, 'uploadedfiles/'. $generatedFilename);
	}
	
	$user = new User();
	$user->setPictureFilename($generatedFilename);
	$user->setPictureMimetype($filemimetype);
	
	$user->savePicture($userid);
}
	
header("Location: index.php");

?>