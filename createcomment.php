<?php
require_once 'config.php';

if(isset($_GET['writecomment'], $_GET['postidforcomment']))
{
	
	$postid = $_GET['postidforcomment'];
	$_SESSION['showcomment'] = $postid;	
}

$inputvalidator = new ValidateUserInput();

if (isset($_POST['comment'], $_POST['postid'], $_POST['userid']))
{	
	
	$content = $_POST["comment"];
	$content = $inputvalidator->validateInputString($content);	
	
	$comment = new Comment();
	$comment->setComment($content);
	$comment->setAuthor($username);
	$comment->setAuthorId(intval($_POST['userid']));
	$comment->setPostId(intval($_POST['postid']));
	
	$comment->saveComment();	
}

header("Location: index.php");

?>