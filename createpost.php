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
	
	// if uploaded file exists
	if ($_FILES['userfile']['name'])
	{
		$MAX_FILESIZE = 1000000;
		$MAX_WIDTH = 500;
		$MAX_HEIGHT = 600;
		
		$filename = $_FILES['userfile']['name'];
		$filemimetype = $_FILES['userfile']['type'];
		$filesize = $_FILES['userfile']['size'];
		$filetmpname = $_FILES['userfile']['tmp_name'];
		$fileerror = $_FILES['userfile']['error'];
		
		$generatedFilename = time() . $filename;
		
		$validator = new ValidateUserInput();
				
		// move file
		if ($validator->validateFile($filename, $filemimetype, $filesize, $filetmpname, $fileerror, $MAX_FILESIZE, $MAX_WIDTH, $MAX_HEIGHT))
		{
			move_uploaded_file($filetmpname, 'uploadedfiles/'. $generatedFilename);
			$attachment = new Attachment();
			$attachment->setFilename($generatedFilename);
			$attachment->setMimetype($filemimetype);
			$attachment->setFilesize($filesize);
			$attachment->setPostId($post->savePost()); // saves the post, gets returned the id of the last inserted post
			
			$attachment->saveAttachment();
			$post->savePost();
		}
	}
	else
	{
		$post->savePost();
	}
}

header("Location: index.php");
?>