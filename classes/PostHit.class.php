<?php
require_once 'config.php';

class PostHit {
	private $id;
	private $ip;
	private $date;
	private $post_id;

	private $dbaccess;

	public function getId()	{return $this->id;}
	public function getIp()	{return $this->ip;}
	public function getDate()	{return $this->date;}
	public function getPostId()	{return $this->post_id;}

	public function setId($id) {$this->id = $id;}
	public function setIp($ip) {$this->ip = $ip;}
	public function setDate($date) {$this->date = $date;}
	public function setPostId($post_id) {$this->post_id = $post_id;}


	public function __construct() {
		$this->dbaccess = new DBAccess();
	}
	
	// returns a multidimensional array, consisting of a post id, and how many hits that post has, ex
	// # | post_id | hits
	// 1 |    3	   | 29
	// 2 |	  4    | 135
	public function countAllHits()
	{
		$query = 'SELECT post_id, COUNT(*) AS `hits` FROM posthit GROUP BY post_id';
		$result = $this->dbaccess->run_assoc_fetch_query($query);	
		
		return $result;
	}
	
	// writes a hit to the DB
	public function addHitToPost()
	{
		$query = "INSERT INTO posthit (post_id, ip) VALUES (:postid, :ip)";
	
		$params[0] = $this->post_id;
		$params[1] = $this->ip;
	
		$paramNames[0] = ":postid";
		$paramNames[1] = ":ip";
	
		$this->dbaccess->prepared_insert_query($query, $params, $paramNames);
	}
}