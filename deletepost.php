<?php
require_once 'config.php';

// check user level here as well


if (isset($_GET['postid'])) {	
	$postid = $_GET['postid'];	
	$post = new Post();	
	$post->deletePost($postid);	
}

header("Location:index.php"); // redirects back to index.php