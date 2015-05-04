<?php
require_once 'config.php';

$post = new Post();

if (!isset($_POST['search']) && !(isset($_POST['year']) && isset($_POST['month'])))
{
	// gets a list of all posts in database, in the form of an array of Post objects
	$allPosts = $post->getAllPosts();	
}

if (isset($_POST['search']))
{
	// gets a list of posts in database that matches the users search parameters, in the form of an array of Post objects
	$allPosts = $post->getSearchedPosts($_POST['search']);
}


if (isset($_POST['year']) && isset($_POST['month']))
{
	$allPosts = $post->getPostsByYearMonth($_POST['year'], $_POST['month']);
}

$smarty->assign('allPosts', $allPosts); // assigns array to smarty

$archive = new Archive();
$test = $archive->generateYearMonthArray();
$smarty->assign('yearMonthArray', $test);
print_r($test);




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