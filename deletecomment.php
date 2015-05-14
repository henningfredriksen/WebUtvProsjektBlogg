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

/* Deletecomment.php receives the input from the href in comment.tpl
 * which includes the comment id to delete, and deletes it via the
 * deleteComment() method in Comment.class.php
 */

if (isset($_GET['commentid'])) {
	$commentid = $_GET['commentid'];
	$comment = new Comment();
	$comment->deleteComment($commentid);
}

header("Location:index.php"); // redirects back to index.php