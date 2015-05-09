<?php
require_once 'config.php';
	
function addHit($data){		
	return $data;		
}	

if (isset($_POST['postid']))
{		
	$postid = $_POST['postid'];
	$ip = $_SERVER['REMOTE_ADDR'];

	$dbaccess = new DBAccess();
	
	$query = "SELECT * FROM posthit WHERE post_id = '" . $postid . "' AND ip = '" . $ip . "' AND date BETWEEN TIMESTAMPADD(HOUR, -24, NOW()) AND NOW() ORDER BY date DESC";
	$result = $dbaccess->run_query($query);
	
	$postHitArray = Array();
	while ($postHit = $result->fetchObject('PostHit'))
	{
		$postHitArray[] = $postHit;
	}
	
	if (count($postHitArray) > 0)
	{			
		// do nothing, as a hit has been found for the same IP on this post in the last 24 hours
	}
	else
	{		
		$posthit = new PostHit();
		$posthit->setPostId($postid);
		$posthit->setIp($ip);
		$posthit->addHitToPost();
		echo addHit($postid); // returns the userid sent (not used in our case, just for testing)		
	}
}
?>
