
<?php
require_once 'config.php';

if(isset($_SESSION['login'])) {
	$login = $_SESSION['login'];
	if($login->getIpAddress() != $_SERVER["REMOTE_ADDR"]) {
		header("Location: index.php");
	}
	if($login->getUserAgent() != $_SERVER['HTTP_USER_AGENT']){
		header("Location: index.php");
	}
}

/* Createcomment has two purposes.
 * 
 * One is to catch the href from expandedpost.tpl, send a variable via session
 * back to index.php, where a smarty variable is set, enabling showing of writecomment.tpl 
 * 
 * The other is to catch the $_POST variables sent from writecomment.tpl, validate the input
 * and write the comment to database via Comment.class.php
 */

if(isset($_GET['writecomment'], $_GET['postidforcomment']))
{
	
	$postid = $_GET['postidforcomment'];
	$_SESSION['showcomment'] = $postid;	
}

$inputvalidator = new ValidateUserInput();

if (isset($_POST['comment'], $_POST['postid'], $_POST['userid']))
{	
	$content = $_POST["comment"];
	$content = $inputvalidator->validateInputString($content);	
	
	$comment = new Comment();
	$comment->setComment($content);
	$comment->setAuthor($username);
	$comment->setAuthorId(intval($_POST['userid']));
	$comment->setPostId(intval($_POST['postid']));
	
	$comment->saveComment();	
}

header("Location: index.php");

?>