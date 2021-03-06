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
	
	//Connecting to the database
	public function connect() {
		try {
			$this->db = new PDO("mysql:host=$this->hostname;dbname=$this->dbname", $this->username, $this->passord);
			/*** echo a message saying we have connected ***/
		}
		catch(PDOException $e) {
			die("<h3>En feil oppstod</h3><p>Kunne ikke koble til databasen.<br />Feilmelding: <em>$e->getMessage()</em></p>");
		}
	}
	
	//runs a query to the database
	public function run_query($query) {
		$data = $this->db->query($query);
		return $data;
	}
	
	//runs the input query and returns an associative array
	public function run_assoc_fetch_query($query) {
		$stmt = $this->db->prepare($query);
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_ASSOC);		
	}
	
	//Prepares the input query and runs it
	public function run_prepared_query($query, $params) {
		$stmt = $this->db->prepare($query);
		
		for($paramNumber = 1; $paramNumber <= count($params); $paramNumber++) {
			$stmt->bindParam($paramNumber, $params[$paramNumber - 1]);
		}
		
		$stmt->execute();
		
		return $stmt;
	}
	
	//Prepares the input insert query and runs it
	public function prepared_insert_query($query, $params, $paramNames) {
		$stmt = $this->db->prepare($query);
		
		$count = 0;
		
		foreach ($paramNames AS $paramName) {
			$stmt->bindParam($paramName, $params[$count]);
			$count++;
		}
		
		$stmt->execute();
	}
	
	//Prepares the input insert query and runs it
	//returns the generatet id for the inserted row
	public function prepared_insert_query_withreturnedid($query, $params, $paramNames) {
		$stmt = $this->db->prepare($query);
	
		$count = 0;
	
		foreach ($paramNames AS $paramName) {
			$stmt->bindParam($paramName, $params[$count]);
			$count++;
		}
	
		$stmt->execute();
		return $this->db->lastInsertId();
	}
	
	//runs a delete query
	public function delete_query($query)
	{
		$stmt = $this->db->query($query);
//		return $stmt;
		
	}
}
?>
