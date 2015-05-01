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
		$query = "INSERT INTO posthit (post_id) VALUES ($postid)";
		
		$params[0] = $this->id;				

		$paramNames[0] = "$postid";		
		
		$this->dbaccess->prepared_insert_query($query, $params, $paramNames);	
	}
	
	public function savePost() {		
		$query = "INSERT INTO posts (title, text, author_id, keywords)
				VALUES (:title, :text, (SELECT id FROM users WHERE username = :author), :keywords)";
		
		$params[0] = $this->title;
		$params[1] = $this->text;
		$params[2] = $this->author;
		$params[3] = $this->keywords;
		
		$paramNames[0] = ":title";
		$paramNames[1] = ":text";
		$paramNames[2] = ":author";
		$paramNames[3] = ":keywords";
		
		$this->dbaccess->prepared_insert_query($query, $params, $paramNames);
	} 
	
	public function deletePost($postid) {
		$query = "DELETE FROM posts WHERE id=$postid";
		$this->dbaccess->delete_query($query);
	}
	
	public function getSearchedPosts($searchString)
	{
		$query = "SELECT posts.id, posts.title, posts.text, users.username, posts.date, posts.keywords, posts.author_id
		FROM posts 
		LEFT JOIN users ON posts.author_id = users.id 
		WHERE posts.title LIKE '%$searchString%' OR posts.text LIKE '%$searchString%' OR posts.keywords LIKE '%$searchString%' 
		ORDER BY date DESC" ;
				
		$result = $this->dbaccess->run_query($query);
		
		$postArray = Array();
		while ($post = $result->fetchObject('Post'))
		{
			$postArray[] = $post;
		}
		
		return $postArray;
	}
		
	private function forkort_tekst($tekst) {
		if (strlen($tekst) > 200)
		{
			$new_text = substr($tekst, 0, 200);
			$new_text = trim($new_text);
			return $new_text . "...";
		} else {
			return $tekst;
		}
	} 
}
?>