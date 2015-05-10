<?xml version="1.0"?>
<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title> Index
</title>
</head>
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
else if(isset($_SESSION['editpostid']))
{
	$smarty->assign('editpostid', $_SESSION['editpostid']);
	unset($_SESSION['editpostid']);
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


// error reporting
if(isset($_SESSION['imgwidtherror'], $_SESSION['imgheighterror']))
{
	
	$msg = "Image exceeds the maximum dimensions of " . $_SESSION['imgwidtherror'] . "px width, " . $_SESSION['imgheighterror'] . "px height.";
	echo '<script type="text/javascript">alert("' . $msg . '");</script>';
	unset($_SESSION['imgwidtherror']);
	unset($_SESSION['imgheighterror']);
}

if(isset($_SESSION['imgtypeerror']))
{
	$msg = "Invalid file type. Only JPG, GIF and PNG are accepted.";
	echo '<script type="text/javascript">alert("' . $msg . '");</script>';
	unset($_SESSION['imgtypeerror']);
}

if(isset($_SESSION['fileerror']))
{
	$msg = $_SESSION['fileerror'];
	echo '<script type="text/javascript">alert("' . $msg . '");</script>';
	unset($_SESSION['fileerror']);
}

if(isset($_SESSION['filesizeerror']))
{
	$msg = "Image exceeds the maximum file size of " . $_SESSION['filesizeerror'] . " bytes.";
	echo '<script type="text/javascript">alert("' . $msg . '");</script>';
	unset($_SESSION['filesizeerror']);
}

$smarty->display('index.tpl');
?>
</html>