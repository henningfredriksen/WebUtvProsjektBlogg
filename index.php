<?php
require_once 'config.php';
require_once 'Post.class.php';
require_once 'DBAccess.class.php';


$post = new Post();

mail("rhymfaxe2@hotmail.com", "lknhlkfgnhlfg", "jnfdlgdknfgldkfgmdgdf", "From:rhymfaxe@gmail.com");

if (!isset($_POST['search']))
{
	// gets a list of all posts in database, in the form of an array of Post objects
	$allPosts = $post->getAllPosts();	
}

if (isset($_POST['search']))
{
	// gets a list of posts in database that matches the users search parameters, in the form of an array of Post objects
	$allPosts = $post->getSearchedPosts($_POST['search']);
}

$archive = new Archive();
$test = $archive->generateYearMonthArray();
$smarty->assign('yearMonthArray', $test);
print_r($test);

$smarty->assign('allPosts', $allPosts); // assigns array to smarty


$posthit = new PostHit();
$hitsByPostId = $posthit->countAllHits();
$smarty->assign('hitsByPostId', $hitsByPostId); // assigns array to smarty

// gets a list of all comments in database, in the form of an array of Comment objects
$comment = new Comment();
$allComments = $comment->getAllComments();
$smarty->assign('allComments', $allComments); // assigns array to smarty


//checking if the user is logged in
if(isset($_SESSION['username'])) {
	$smarty->assign('isLoggedIn', true);
	$user = new User();
	$user = $user->getUserByUsername($_SESSION['username']);
	$smarty->assign('activeUser', $user);
}else {
	$smarty->assign('isLoggedIn', false);
}

$smarty->display('index.tpl');
?>