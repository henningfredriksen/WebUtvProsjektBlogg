<?php
require_once 'config.php';

class innlegg {
	private $title;
	private $text;
	private $date;
	private $author;
	
	private $dbaccess;
	
	public function __construct() {
		$this->dbaccess = new DBAccess();
	}
	
	public function setTitle($title) {
		$this->title = $title;
	}
	
	public function setText($text) {
		$this->text = $text;
	}
	
	public function setAuthor($author) {
		$this->author = $author;
	}
	
/*	public function get_post_by_id($Id) {
		$query = 'SELECT innlegg.tittel, innlegg.tekst, innlegg.dato, innlegg.stikkord, brukere.brukernavn
				FROM innlegg LEFT JOIN brukere ON innlegg.forfatter = brukere.ID WHERE innlegg.ID = ?';
		$params[0] = $Id;
		$post = $this->dbaccess->run_prepared_query($query, $params);
		return $innlegg;
	} */
	
	public function get_all_innleggs() {
	//	$datamodell = new Datamodell();
		$query = 'SELECT innlegg.ID, innlegg.tittel, innlegg.tekst, innlegg.dato, innlegg.stikkord, brukere.brukernavn
				 FROM innlegg LEFT JOIN brukere ON innlegg.forfatter = brukere.ID ORDER BY dato DESC';
		$posts = $this->dbaccess->run_query($query);
		return $posts;
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