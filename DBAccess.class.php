<?php
//require('db_connect.php');
require_once 'config.php';
require_once 'Post.class.php';

class DBAccess {
	private $hostname = 'kark.hin.no';
	private $dbname = "stud_v15_hauknes";
	private $username = "hauknes";
	private $passord = "appelsinFarge5";
	private $db;
	
	
	public function __construct(){
		$this->connect();
	}
	
	public function connect() {
		try {
			$this->db = new PDO("mysql:host=$this->hostname;dbname=$this->dbname", $this->username, $this->passord);
			/*** echo a message saying we have connected ***/
			//echo 'Connected to database';
		}
		catch(PDOException $e) {
			die("<h3>En feil oppstod</h3><p>Kunne ikke koble til databasen.<br />Feilmelding: <em>$e->getMessage()</em></p>");
		}
	}
	
	public function run_query($query) {
		$data = $this->db->query($query);
		$postArray = Array();
		
		while ($post = $data->fetchObject('Post'))
		{
			$postArray[] = $post;
		}
		return $postArray;
	}
	
	public function run_prepared_query($query, $params) {
		$stmt = $this->db->prepare($query);
		
		for($paramNumber = 1; $paramNumber <= count($params); $paramNumber++) {
			$stmt->bindParam($paramNumber, $params[$paramNumber - 1]);
		}
		
		$stmt->execute();
		
		return $stmt->fetch();
	}
	
	public function prepared_insert_query($query, $params, $paramNames) {
		$stmt = $this->db->prepare($query);
		
		$count = 0;
		
		foreach ($paramNames AS $paramName) {
			$stmt->bindParam($paramName, $params[$count]);
			$count++;
		}
		
		$stmt->execute();
	}
}
?>
