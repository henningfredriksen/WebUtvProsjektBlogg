<?php
require_once 'config.php';

if (isset($_GET['postid'])) {
	$postid = $_GET['postid'];
	$_SESSION['editpostid'] = $postid;
	header("Location: index.php");
}

$inputvalidator = new ValidateUserInput();

if (isset($_POST["title"], $_POST["content"]))
{
	$title = $_POST["title"];
	$title = $inputvalidator->validateInputString($title);
	$content = $_POST["content"];
	$content = $inputvalidator->validateInputString($content);
	$keywords = $_POST["keywords"];
	$keywords = $inputvalidator->validateInputString($keywords);
	$postid = $_POST["postid"];
	if(isset($_POST["deleteattachment"])) {
		$attachment = new Attachment();
		$attachments = $attachment->getAllAttachments();
		if (!empty($attachments))
		{
			foreach ($attachments as $a) {
				if($a->getId() == $postid) {
					$a->deleteAttachment();
				}
			}
		}
		
	}

	$post = new Post();
	$post->setId($postid);
	$post->setTitle($title);
	$post->setText($content);
	$post->setAuthor($username);
	$post->setKeyWords($keywords);
	
	$post->updatePost();

	// if uploaded file exists
	if ($_FILES['userfile']['name'])
	{
		$attachment = new Attachment();
		$attachments = $attachment->getAllAttachments();
		if (!empty($attachments))
		{
			foreach ($attachments as $a) {
				if($a->getId() == $postid) {
					$a->deleteAttachment();
				}
			}
		}
		
		$filename = $_FILES['userfile']['name'];
		$filemimetype = $_FILES['userfile']['type'];
		$filesize = $_FILES['userfile']['size'];
		$filetmpname = $_FILES['userfile']['tmp_name'];
		$fileerror = $_FILES['userfile']['error'];

		$generatedFilename = time() . $filename;

		$validfile = false; // initial value

		// if filesize less than 1000000 bytes (1 MiB)
		if($filesize > (1000000))
		{
			$validfile = false;
		}
		else {
			$validfile = true;
		}

		// checks if there are any errors
		if($fileerror != 0)
		{
			$validfile = false;
		}
		else {
			$validfile = true;
		}

		// move file
		if ($validfile)
		{
			move_uploaded_file($filetmpname, 'uploadedfiles/'. $generatedFilename);
		}

		$attachment = new Attachment();
		$attachment->setFilename($generatedFilename);
		$attachment->setMimetype($filemimetype);
		$attachment->setFilesize($filesize);
		$attachment->setPostId($post->savePost()); // saves the post, gets returned the id of the last inserted post

		$attachment->saveAttachment();
		
		$post->updatePost();

	}
	else
	{
		$post->updatePost();
	} 
}

header("Location: index.php");