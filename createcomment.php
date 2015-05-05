<?php
require_once 'config.php';

$inputvalidator = new ValidateUserInput();
print("test1");
if (isset($_POST['comment'], $_POST['postid'], $_POST['userid']))
{
	print("test2");
	$content = $_POST["comment"];
	$content = $inputvalidator->validateInputString($content);	
	
	$username = $_SESSION['username'];
	
	$comment = new Comment();
	$comment->setComment($content);
	$comment->setAuthor($username);
	$comment->setAuthorId($_POST['userid']);
	$comment->setId($_POST['postid']);
	
	$comment->saveComment();
	print("test3");
}

// header("Location: index.php");

?>