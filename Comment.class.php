<?php
require_once 'config.php';

class Comment {
	private $id;
	private $author_id;
	private $post_id;
	private $username;
	private $comment;
	private $date;
	
	public function getId()	{return $this->id;}
	public function getAuthor()	{return $this->username;}
	public function getAuthorId()	{return $this->author_id;}
	public function getPostId()	{return $this->post_id;}
	public function getComment()	{return $this->comment;}
	public function getDate()	{return $this->date;}
	
	
	public function setId($id) {$this->id = $id;}
	public function setAuthor($author) {$this->username = $author;}
	public function setAuthorId($author_id) {$this->author_id = $author_id;}
	public function setPostId($post_id) {$this->post_id = $post_id;}
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
		$query = 'SELECT comments.id, comments.author_id, comments.post_id, users.username, comments.comment, comments.date FROM comments
					LEFT JOIN users ON comments.author_id = users.id ORDER BY date ASC';
		
		$result = $this->dbaccess->run_query($query);
	
		$commentArray = Array();
		while ($comment = $result->fetchObject('Comment'))
		{
			$commentArray[] = $comment;
		}
	
		return $commentArray;
	}
	
	public function deleteComment($commentid) {
		$query = "DELETE FROM comments WHERE id=$commentid";
		$this->dbaccess->delete_query($query);
	}
	
	public function saveComment() {
		$query = "INSERT INTO comments (author_id, post_id, comment) VALUES (:author_id, :post_id, :comment)";
	
		$params[0] = $this->author_id;
		$params[1] = $this->post_id;
		$params[2] = $this->comment;		
	
		$paramNames[0] = ":author_id";
		$paramNames[1] = ":post_id";
		$paramNames[2] = ":comment";		
	
		$this->dbaccess->prepared_insert_query($query, $params, $paramNames);
	}
}
?>