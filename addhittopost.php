<?php
	require_once 'config.php';
		
	function func1($data){		
		return $data;		
	}
	
	if (isset($_POST['addHit']))
	{
		$post = new Post();
		$post->addHitToPost($_POST['addHit']);
		echo func1($_POST['addHit']);
	}
/*
	$post = new Post();
	print($_GET["postid"]);
	$PHPtext = print("YAY!!");
	$smarty->assign('postHits', "WOOOO!")
//	$post->addHitToPost($_GET["postid"]);
//	header("Location:index.php"); // redirects back to index.php
 
 */
?>
