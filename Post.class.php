<?php
require_once 'config.php';

class Post {
	private $id;
	private $title;
	private $text;
	private $date;
	private $keywords;
	private $author;	
	
	private $dbaccess;
	
	public function getId()	{return $this->id;}
	public function getTitle()	{return $this->title;}
	public function getText()	{return $this->text;}
	public function getAuthor()	{return $this->author;}
	public function getDate()	{return $this->date;}
	public function getKeyWords()	{return $this->keywords;}	
	
	public function setId($id) {$this->id = $id;}
	public function setTitle($title) {$this->title = $title;}
	public function setText($text) {$this->text = $text;}
	public function setAuthor($author) {$this->author = $author;}
	public function setDate($date) {$this->date = $postdate;}
	public function setKeyWords($keywords) {$this->keywords = $keywords;}	
	
	public function __construct() {
		$this->dbaccess = new DBAccess();
	}
	
/*	public function get_post_by_id($Id) {
		$query = 'SELECT innlegg.tittel, innlegg.tekst, innlegg.dato, innlegg.stikkord, brukere.brukernavn
				FROM innlegg LEFT JOIN brukere ON innlegg.forfatter = brukere.ID WHERE innlegg.ID = ?';
		$params[0] = $Id;
		$post = $this->dbaccess->run_prepared_query($query, $params);
		return $innlegg;
	} */
	
	public function getAllPosts() {
		
		$query = 'SELECT posts.id, posts.title, posts.text, users.username, posts.date, posts.keywords, posts.author_id FROM posts
					LEFT JOIN users ON posts.author_id = users.id ORDER BY date DESC';
		$result = $this->dbaccess->run_query($query);
		
		$postArray = Array();
		while ($post = $result->fetchObject('Post'))
		{
			$postArray[] = $post;
		}
		
		return $postArray;
	}
	
	public function addHitToPost($postid)
	{
		$query = "INSERT INTO posthit (post_id) VALUES (:postid)";
		
		$params[0] = $this->id;		

		$paramNames[0] = ":postid";
		
		$this->dbaccess->prepared_insert_query($query, $params, $paramNames);	
	}
	
/*	public function lagre_innlegg() {
		
		$query = "INSERT INTO innlegg (tittel, tekst, forfatter)
				VALUES (:title, :text, (SELECT ID from brukere WHERE brukernavn= :forfatter))";
		
		$params[0] = $this->tittel;
		$params[1] = $this->tekst;
		$params[2] = $this->forfatter;
		
		$paramNames[0] = ":title";
		$paramNames[1] = ":text";
		$paramNames[2] = ":forfatter";
		
		$this->datamodell->prepared_insert_query($query, $params, $paramNames);
	} */
	
/*	private function forkort_tekst($tekst) {
		if (strlen($tekst) > 200)
		{
			$new_text = substr($tekst, 0, 200);
			$new_text = trim($new_text);
			return $new_text . "...";
		} else {
			return $tekst;
		}
	} */
	
}
?>