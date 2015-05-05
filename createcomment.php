<?php
require_once 'config.php';

$inputvalidator = new ValidateUserInput();
print($_POST['comment']);
if (isset($_POST['comment'], $_POST['postid'], $_POST['userid']))
{
	print($_POST['postid']);
	$content = $_POST["comment"];
	$content = $inputvalidator->validateInputString($content);	
	
	$comment = new Comment();
	$comment->setComment($content);
	$comment->setAuthor($username);
	$comment->setAuthorId(intval($_POST['userid']));
	$comment->setPostId(intval($_POST['postid']));
	
	$comment->saveComment();
	print($_POST['userid']);
}

header("Location: index.php");

?>