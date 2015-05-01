<?php
require_once 'config.php';

// check user level here as well + that the user id matches


if (isset($_GET['commentid'])) {
	$commentid = $_GET['commentid'];
	$comment = new Comment();
	$comment->deleteComment($commentid);
}

header("Location:index.php"); // redirects back to index.php