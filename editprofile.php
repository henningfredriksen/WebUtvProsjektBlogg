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
	
	$MAX_WIDTH = 100; 
	$MAX_HEIGHT = 100;
	$imginfo = getimagesize($filetmpname);
	$imgwidth = $imginfo[0];
	$imgheight = $imginfo[1];

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
	
	// checks for accepted filestypes
	if ($filemimetype == "image/jpeg" || $filemimetype == "image/jpg" || $filemimetype == "image/gif" || $filemimetype == "image/png")
	{
		$validfile = true;
	}
	else 
	{
		$msg = "Invalid file type. Only JPG, GIF and PNG are accepted.";
		echo '<script type="text/javascript">alert("' . $msg . '");</script>';
		$validfile = false;
	}
	
	if ($imgwidth < $MAX_WIDTH && $imgheight < $MAX_HEIGHT)
	{
		$validfile = true;
	}
	else 
	{
		$msg = "Image exceeds the maximum dimensions of " . $MAX_WIDTH . "px x " . $MAX_HEIGHT . "px.";
		echo '<script type="text/javascript">alert("' . $msg . '");</script>';
		$validfile = false;
	}

	// move file
	if ($validfile)
	{
		move_uploaded_file($filetmpname, 'uploadedfiles/'. $generatedFilename);
		
		$user = new User();
		$user->setPictureFilename($generatedFilename);
		$user->setPictureMimetype($filemimetype);
		
		$user->savePicture($userid);
	}
}
	
//header("Location: index.php");

?>