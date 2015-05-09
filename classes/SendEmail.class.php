<?php
require_once 'config.php';

class SendEmail {
	private $dbaccess;
	
	public function __construct() {
		$this->dbaccess = new DBAccess();
	}
	
	public function SendEmailToConfirm($email){
		$id = md5(uniqid(rand(),1));
		
		$query = "UPDATE users SET hash=? WHERE email=?";
		
		$params[0] = $id;
		$params[1] = $email;
		
		$this->dbaccess->run_prepared_query($query, $params);
		
		mail($email, "Bekreft epostadresse", "http://kark.hin.no/~501428/validatelink.php?email=" . $email . "&id=" . $id . "&request=1", "From:501428@student.hin.no");
	}
	
	public function SendEmailToResetPassword($email){
		$id = md5(uniqid(rand(),1));
	
		$query = "UPDATE users SET hash=? WHERE email=?";
	
		$params[0] = $id;
		$params[1] = $email;
	
		$this->dbaccess->run_prepared_query($query, $params);
	
		mail($email, "Glemt Passord", "http://kark.hin.no/~501428/validatelink.php?email=" . $email . "&id=" . $id . "&request=2", "From:501428@student.hin.no");
	}
}