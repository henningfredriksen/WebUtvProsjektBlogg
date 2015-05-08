<?php
require_once 'config.php';

if (isset($_GET['editprofile']))
{
	$_SESSION['editprofile'] = true;
	header("Location: index.php");
}
print("test1");
print($_POST['profilepic']);

if (isset($_POST["profilepic"]))
{
	print("test2");
	// if uploaded file exists
	if ($_FILES['profilepic']['name'])
	{
		print("test3");
		
		
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
		$user->setPictureFilename($filename);
		$user->setPictureMimetype($filemimetype);
		
		$user->savePicture($userid);
	}
	
//	header("Location: index.php");
}

?>