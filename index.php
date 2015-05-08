<?php
require_once 'config.php';

$post = new Post();

if (!isset($_POST['search'], $_GET['year'], $_GET['month']))
{
	// gets a list of all posts in database, in the form of an array of Post objects
	$allPosts = $post->getAllPosts();	
}

if (isset($_POST['search']))
{
	// gets a list of posts in database that matches the users search parameters, in the form of an array of Post objects
	$allPosts = $post->getSearchedPosts($_POST['search']);
}

if (isset($_GET['year'], $_GET['month']))
{
		$allPosts = $post->getPostsByYearMonth($_GET['year'], $_GET['month']);	
} 

$smarty->assign('allPosts', $allPosts); // assigns array to smarty

//
$archive = new Archive();
$yearMonthArray = $archive->generateYearMonthArray();
$smarty->assign('yearMonthArray', $yearMonthArray);

//
$posthit = new PostHit();
$hitsByPostId = $posthit->countAllHits();
$smarty->assign('hitsByPostId', $hitsByPostId); // assigns array to smarty

//
$attachment = new Attachment();
$attachments = $attachment->getAllAttachments();
if (!empty($attachments))
{
	$smarty->assign('attachments', $attachments); // assigns array to smarty
}

// gets a list of all comments in database, in the form of an array of Comment objects
$comment = new Comment();
$allComments = $comment->getAllComments();
$smarty->assign('allComments', $allComments); // assigns array to smarty

if (isset($_SESSION['showRegisterUser']))
{
	unset($_SESSION['showRegisterUser']);
	$smarty->assign('showRegisterUser', true);
}
else if(isset($_SESSION['showForgottenPassword'])) 
{
	unset($_SESSION['showForgottenPassword']);
	$smarty->assign('showForgottenPassword', true);
}
else if(isset($_SESSION['showChangePassword']))
{
	unset($_SESSION['showChangePassword']);
	$smarty->assign('showChangePassword', true);
}
else if(isset($_SESSION['editprofile']))
{
	unset($_SESSION['editprofile']);
	$smarty->assign('editprofile', true);
}

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