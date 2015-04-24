<?php
require_once 'config.php';

class Comment {
	private $id;
	private $author_id;
	private $comment;
	private $date;
	
	public function getId()	{return $this->id;}
	public function getAuthor()	{return $this->author;}
	public function getComment()	{return $this->comment;}
	public function getDate()	{return $this->date;}
	
	public function setId($id) {$this->id = $id;}
	public function setAuthor($author) {$this->author = $author;}
	public function setComment($comment) {$this->comment = $comment;}
	public function setDate($date) {$this->date = $date;}
	
	public function __construct()
	{
		$this->dbaccess = new DBAccess();
	}
	
	public function getAllComments() {
	
		//	$datamodell = new Datamodell();
		//	$query = 'SELECT innlegg.ID, innlegg.tittel, innlegg.tekst, innlegg.dato, innlegg.stikkord, brukere.brukernavn
		//			 FROM innlegg LEFT JOIN brukere ON innlegg.forfatter = brukere.ID ORDER BY dato DESC';
		//$query = 'SELECT posts.id, posts.title, posts.text, users.username, posts.date, posts.keywords from posts
		//			LEFT JOIN users ON posts.author_id = users.id ORDER BY date DESC';
		$query = 'SELECT comments.id, users.username, comments.comment, comments.date FROM comments
					LEFT JOIN users ON comments.author_id = users.id ORDER BY date DESC';
		
		$result = $this->dbaccess->run_query($query);
	
		$commentArray = Array();
		while ($comment = $result->fetchObject('Comment'))
		{
			$commentArray[] = $comment;
		}
	
		return $commentArray;
	}
	
}
?>