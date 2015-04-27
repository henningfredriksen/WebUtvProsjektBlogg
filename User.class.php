<?php
require_once 'config.php';

class User {
	private $dbaccess;
	
	private $id;
	private $name;
	private $username;
	private $email;
	private $password;	
	
	public function __construct() {
		$this->dbaccess = new DBAccess();
	}
	
	public function getId() {return $this->id;}
	public function getName() {return $this->name;}
	public function getUsername() {return $this->username;}
	public function getEmail() {return $this->email;}
	public function getPassword() {return $this->password;}
	
	public function setId($id) {
		$this->id = $id;
	}
	
	public function setName($name) {
		$this->name = $name;
	}
	
	public function setUserName($username) {
		$this->username = $username;
	}
	
	public function setEmail($email) {
		$this->email = $email;
	}
	
	public function setPassword($password) {
		$this->password = $password;
	}
	
	public function lagre_bruker () {
		$query = "INSERT INTO brukere (brukernavn, epost, passord, bruker_tilgang)
				VALUES (:brukernavn, :epost, :passord, :brukertilgang)";
		
		$params[0] = $this->brukernavn;
		$params[1] = $this->epost;
		$params[2] = $this->passord;
		$params[3] = 2;
		
		$paramNames[0] = ":brukernavn";
		$paramNames[1] = ":epost";
		$paramNames[2] = ":passord";
		$paramNames[3] = ":brukertilgang";
		
		$this->datamodell->prepared_insert_query($query, $params, $paramNames);
	}
	
	public function getUserByUsername($username) {
		$query = "SELECT id, name, username, email FROM users WHERE username = ?";
		
		$params[0] = $username;
		
		$result = $this->dbaccess->run_prepared_query($query, $params);
		
		echo var_dump($result); 
		
		while($user = $result->fetchObject('User')) {
			return $user;
		} 
		
	}
	
	public function checkLoginInfo($inputUsername, $inputPassword) {
		$inputPassword = md5($inputPassword);
		
		$query = "SELECT username FROM users WHERE username = ? AND password = ?";
	
		$params[0] = $inputUsername;
		$params[1] = $inputPassword;
		
		$username = $this->dbaccess->run_prepared_query($query, $params);
	
		if(isset($username)) {
			return $username;
		}else {
			return false;
		}
	}
	
}