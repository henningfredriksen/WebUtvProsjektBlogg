<?php
require_once 'config.php';

class Attachment {
	
	private $id;
	private $filename;
	private $mimetype;
	private $filesize;
	private $post_id;
	
	private $dbaccess;
	
	public function getId()	{return $this->id;}
	public function getFilename()	{return $this->filename;}
	public function getMimetype()	{return $this->mimetype;}
	public function getFilesize()	{return $this->filesize;}
	public function getPostId()	{return $this->post_id;}
	
	public function setId($id) {$this->id = $id;}
	public function setFilename($filename) {$this->filename = $filename;}
	public function setMimetype($mimetype) {$this->mimetype = $mimetype;}
	public function setFilesize($filesize) {$this->filesize = $filesize;}
	public function setPostId($post_id) {$this->post_id = $post_id;}
	
	public function __construct() {
		$this->dbaccess = new DBAccess();
	}
	
	public function getAllAttachments()
	{
		$query = "SELECT id, filename, mimetype, filesize, post_id FROM attachments";
		$result = $this->dbaccess->run_query($query);		

		$attachmentArray = Array();
		while ($attachment = $result->fetchObject('Attachment'))
		{			
			$attachmentArray[] = $attachment;			
		}
		
		return $attachmentArray;
	}
	
	public function saveAttachment()
	{
		$query = "INSERT INTO attachments (filename, mimetype, filesize, post_id) VALUES (:filename, :mimetype, :filesize, :post_id)";
		
		$params[0] = $this->filename;
		$params[1] = $this->mimetype;
		$params[2] = $this->filesize;
		$params[3] = $this->post_id;
		
		$paramNames[0] = ":filename";
		$paramNames[1] = ":mimetype";
		$paramNames[2] = ":filesize";
		$paramNames[3] = ":post_id";
		
		$this->dbaccess->prepared_insert_query($query, $params, $paramNames);
	}
	
	public function deleteAttachment() {
		$attachmentQuery = "SELECT filename FROM attachments WHERE post_id='" . $this->post_id . "'";
		$result = $this->dbaccess->run_query($attachmentQuery);
		while($line = $result->fetchObject('Attachment'))
		{
			$attachment[] = $line;
		}
		
		foreach ($attachment as $atch)
		{
			if (file_exists('uploadedfiles/'.$atch->getFilename()))
			{
				unlink('uploadedfiles/'.$atch->getFilename());
			}
		}
		
		$deleteQuery = "DELETE FROM attachments WHERE post_id='" . $this->post_id . "'";
		$this->dbaccess->run_query($deleteQuery);
	}
	
}
?>