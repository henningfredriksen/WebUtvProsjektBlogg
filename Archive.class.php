<?php
require_once 'config.php';

class Archive {
	private $id;
	
	private $dbaccess;
	
	public function __construct() {
		$this->dbaccess = new DBAccess();
//		date_default_timezone_set("Europe/Oslo"); // sets the default time zone
	}
	
	
	// generates an array containing each year and month from which the date of a post (or more) matches in the database
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