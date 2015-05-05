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
		$queryYear = "SELECT DISTINCT YEAR(date) 'year' FROM posts ORDER BY YEAR(date)";
		$resultYear = $this->dbaccess->run_assoc_fetch_query($queryYear);

		$query = "SELECT DISTINCT YEAR(date) 'year', MONTH(date) 'month' FROM posts ORDER BY YEAR(date)";
		$result = $this->dbaccess->run_assoc_fetch_query($query);
		
		$monthsList = array('Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec');
		
		foreach ($resultYear as $years)
		{
			foreach ($result as $yearMonth)
			{
				if ($yearMonth['year'] == $years['year'])
				{
					$yearMonthArray[$yearMonth['year']][] = $monthsList[$yearMonth['month'] -1]; 
				}
			}
		}
		return $yearMonthArray;
	}	
}
?>
	
		
<?php 		
/*		
		$now = new DateTime();
		$postObj = new Post();
		$postArray = $postObj->getAllPosts();		
		array_reverse($postArray, true);
		
		foreach ($postArray as $post)
		{		
			$dateArray[] = date_parse_from_format("Y-m-d H:i:s", $post->getDate());			
			
			$year = strtotime($post->getDate());
			date("Y", $year);			
			
			$month = strtotime($post->getDate());
			date("B", $month);			
			
			$yearMonthArray[$year][] = $month;

		}
		
		foreach ($dateArray as $date)
		{	
//			$yearMonthArray[$date['year']]['month'] = $date['month'];
			$year;
			$month;
			$monthsList = array('Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec');			
			
			for ($i = 0; $i < 12; $i++)
			{	
				if ($i == $date['month'])
				{
					$year = $date['year'];
					$month = $date['month'];
					
					if ($year != $yearMonthArray[] && $month)
					{
						
					}
					
					$yearMonthArray[$year][$month];
			
					$yearMonthArray[$date['year']][] = $monthsList[$i];
			
					
				}						
			}
		}
		
		return $yearMonthArray;	
			
	}
	*/
?>