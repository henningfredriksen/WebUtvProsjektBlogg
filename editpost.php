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

if (isset($_GET['postid'])) {
	$postid = $_GET['postid'];
	$_SESSION['editpostid'] = $postid;
	header("Location: index.php");
}

$inputvalidator = new ValidateUserInput();

if (isset($_POST["title"], $_POST["content"]))
{
	$username = $_SESSION["username"];
	
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
				if($a->getPostId() == $postid) {
					
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
				if($a->getPostId() == $postid) {
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

		$validfile = $inputvalidator->validateFile($filename, $filemimetype, $filesize, $filetmpname, $fileerror, 1000000, 500, 600);

		// move file
		if ($validfile)
		{
			move_uploaded_file($filetmpname, 'uploadedfiles/'. $generatedFilename);
		}

		$attachment = new Attachment();
		$attachment->setFilename($generatedFilename);
		$attachment->setMimetype($filemimetype);
		$attachment->setFilesize($filesize);
		$attachment->setPostId($post->updatePost()); // saves the post, gets returned the id of the last inserted post

		$attachment->saveAttachment();

	}
	else
	{
		$post->updatePost();
	} 
}

header("Location: index.php");