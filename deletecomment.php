<?php
require_once 'config.php';

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