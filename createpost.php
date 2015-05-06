<?php
require_once 'config.php';

$inputvalidator = new ValidateUserInput();

if (isset($_POST["title"], $_POST["content"]))
{
	$title = $_POST["title"];
	$title = $inputvalidator->validateInputString($title);
	$content = $_POST["content"];
	$content = $inputvalidator->validateInputString($content);
	$keywords = $_POST["keywords"];
	$keywords = $inputvalidator->validateInputString($keywords);	
		
	$username = $_SESSION['username'];
	
	$post = new Post();
	$post->setTitle($title);
	$post->setText($content);
	$post->setAuthor($username);
	$post->setKeyWords($keywords);
	
	// if uploaded file
	if ($_FILES['userfile']['name'])
	{
		$filename = $_FILES['userfile']['name'];
		$filemimetype = $_FILES['userfile']['type'];
		$filesize = $_FILES['userfile']['size'];
		$filetmpname = $_FILES['userfile']['tmp_name'];
		$fileerror = $_FILES['userfile']['error'];
		
		$generatedFilename = time() . $filename;
		
		echo $fileerror;
		
		$validator = new ValidateUserInput();
		
		// if filesize less than 1000000 bytes (1 MiB)
		if($_FILES['photo']['size'] < (1000000))
		{					
			move_uploaded_file($filetmpname, 'uploadedfiles/'. $generatedFilename);
		}
	}
	
	$post->savePost();
}

//header("Location: index.php");