<?php
	require_once 'config.php';
		
	function addHit($data){		
		return $data;		
	}
/*	
	if (isset($_POST['postid']))
	{
		$postid = $_POST['postid'];
		$ip = $_SERVER['REMOTE_ADDR'];
		
		$dbaccess = new DBAccess();
		
		$query = "SELECT * FROM posthit WHERE post_id = '" . $postid . "'";
		$result = $this->dbaccess->run_query($query);
		
		$postHitArray = Array();
		while ($posthit = $result->fetchObject('PostHit'))
		{
			$postHitArray[] = $posthit;
		}
		
		if ()		
		$posthit = new PostHit();
		$posthit->addHitToPost($postid, $ip);
		echo addHit($postid); // returns the userid sent (not used in our case, just for testing)
	}
*/
?>
