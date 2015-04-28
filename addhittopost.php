<?php
	require_once 'config.php';
		
	function addHit($data){		
		return $data;		
	}
	
	if (isset($_POST['postid']))
	{
		$post = new Post();
		$post->addHitToPost($_POST['postid']);
		echo addHit($_POST['postid']); // returns the userid sent (not used on our case, just for testing)
	}
?>
