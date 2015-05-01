<?php
require_once 'config.php';

class Archive {
	private $id;
	
	private $dbaccess;
	
	public function __construct() {
		$this->dbaccess = new DBAccess();
		date_default_timezone_set("Europe/Oslo"); // sets the default time zone
	}
	
	public function generateYearMonthArray()
	{
		$now = new DateTime();
		$postObj = new Post();
		$postArray = $postObj->getAllPosts();		
		array_reverse($postArray, true);
		
		foreach ($postArray as $post)
		{		
			$dateArray[] = date_parse_from_format("Y-m-d H:i:s", $post->getDate());			
			
/*			$year = strtotime($post->getDate());
			date("Y", $year);			
			
			$month = strtotime($post->getDate());
			date("B", $month);			
			
			$yearMonthArray[$year][] = $month;
*/
		}
		
		foreach ($dateArray as $date)
		{	
//			$yearMonthArray[$date['year']]['month'] = $date['month'];
			$monthsList = array('Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec');
			
			for ($i = 0; $i < 12; $i++)
			{	
				if ($i == $date['month'])
				{
					$yearMonthArray[$date['year']]['month'] = $monthsList[$i];
				}		
			}
		}

		return $yearMonthArray;		
	}
	
	
}
?>