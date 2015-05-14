<?php
require_once 'config.php';

//checks that the user is logged in properly before allowing access to this file
if(isset($_SESSION['login'])) {
	$login = $_SESSION['login'];
	if($login->getIpAddress() != $_SERVER["REMOTE_ADDR"]) {
		header("Location: index.php");
	}
	if($login->getUserAgent() != $_SERVER['HTTP_USER_AGENT']){
		header("Location: index.php");
	}
}

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