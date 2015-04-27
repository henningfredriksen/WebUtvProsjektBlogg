<?php
require_once 'config.php';
require_once 'Post.class.php';
require_once 'DBAccess.class.php';

// gets a list of all posts in database, in the form of an array of Post objects
$post = new Post();
$allPosts = $post->getAllPosts();

$smarty->assign('allPosts', $allPosts); // assigns array to smarty

// gets a list of all comments in database, in the form of an array of Comment objects
$comment = new Comment();
$allComments = $comment->getAllComments();

$smarty->assign('allComments', $allComments); // assigns array to smarty

//checking if the user is logged in
if(isset($_SESSION['username'])) {
	$smarty->assign('isLoggedIn', true);
}else {
	$smarty->assign('isLoggedIn', false);
}

$smarty->display('index.tpl');
?>