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
	/*
	public function getAllHits()
	{
		$query = 'SELECT posthit.id, posthit.ip, posthit.date, posthit.post_id FROM posthit';
		$result = $this->dbaccess->run_query($query);
		
		$postHitArray = Array();
		while ($posthit = $result->fetchObject('PostHit'))
		{
			$postHitArray[] = $posthit;
		}		
		
		return $postHitArray;
	}
	*/
	public function countAllHits()
	{
		$query = 'SELECT post_id, COUNT(*) AS `hits` FROM posthit GROUP BY post_id';
		$result = $this->dbaccess->run_assoc_fetch_query($query);	
		
		return $result;
	}
	
	public function addHitToPost($postid, $ip)
	{
		$query = "INSERT INTO posthit (post_id, ip) VALUES ($postid, $ip)";
	
		$params[0] = $this->post_id;
		$params[1] = $this->ip;
	
		$paramNames[0] = "$postid";
		$paramNames[1] = "$ip";
	
		$this->dbaccess->prepared_insert_query($query, $params, $paramNames);
	}
}