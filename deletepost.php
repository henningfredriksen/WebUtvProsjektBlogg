<?php
require_once 'config.php';

/* Deletepost.php receives the input from the href in expandedpost.tpl
 * which includes the post id to delete, and deletes it via the
 * deletePost() method in Post.class.php
 */

if (isset($_GET['postid'])) {	
	$postid = $_GET['postid'];	
	$post = new Post();	
	$post->deletePost($postid);	
}

header("Location:index.php"); // redirects back to index.php