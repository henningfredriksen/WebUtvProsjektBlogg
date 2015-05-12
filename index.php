
<?php
require_once 'config.php';

/*
 * Index.php is where the smarty template hierachy is loaded, and where all smarty variables are set
 * based on input from other files. The arrays of various objects in use by smarty are read from DB here
 * (via the relevant classes), various variables to guide the "flow" through the smarty hierachy are set.
 * 
 * Index.php also receives $_POST variables from the search function and the archive function, from which
 * a different set of Post objects are loaded based on the search query or the year/month selected
 * 
 * It also displays various error messages received from other classes via $_SESSION and displays them via
 * a javascript alert()
 */

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
	// gets a list of posts in database that matches the year and month selected in archive.tpl, in the form of an array of Post objects
	$allPosts = $post->getPostsByYearMonth($_GET['year'], $_GET['month']);	
} 

$smarty->assign('allPosts', $allPosts); // assigns array to smarty

// generates the array of years/months archive.tpl uses
$archive = new Archive();
$yearMonthArray = $archive->generateYearMonthArray();
$smarty->assign('yearMonthArray', $yearMonthArray);

// gets a list of all hits in database, in the form of an array of PostHit objects
$posthit = new PostHit();
$hitsByPostId = $posthit->countAllHits();
$smarty->assign('hitsByPostId', $hitsByPostId); // assigns array to smarty

// gets a list of all attachments in database, in the form of an array of Attachment objects
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
else if(isset($_SESSION['showcomment']))
{
	$smarty->assign('showcomment', $_SESSION['showcomment']);
	unset($_SESSION['showcomment']);
}

//checks if the user is logged in
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

if(isset($_SESSION['wrongusernameorpassword']))
{
	$msg = "Wrong username or password";
	echo '<script type="text/javascript">alert("' . $msg . '");</script>';
	unset($_SESSION['wrongusernameorpassword']);
}

if(isset($_SESSION['useremailalreadyexists']))
{
	$msg = "A user with the supplied email address already exists.";
	echo '<script type="text/javascript">alert("' . $msg . '");</script>';
	unset($_SESSION['useremailalreadyexists']);
}

if(isset($_SESSION['passwordmismatchoncreation']))
{
	$msg = "Created passwords did not match, try again.";
	echo '<script type="text/javascript">alert("' . $msg . '");</script>';
	unset($_SESSION['passwordmismatchoncreation']);
}

if(isset($_SESSION['wrongpasswordonchangepassword']))
{
	$msg = "Wrong password, try again.";
	echo '<script type="text/javascript">alert("' . $msg . '");</script>';
	unset($_SESSION['wrongpasswordonchangepassword']);
}

if(isset($_SESSION['passwordmismatchonchangepassword']))
{
	$msg = "New password did not match confirm password.";
	echo '<script type="text/javascript">alert("' . $msg . '");</script>';
	unset($_SESSION['passwordmismatchonchangepassword']);
}

// loads the cascading smarty template hierarchy
$smarty->display('index.tpl');

?>