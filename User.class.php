<?php
require_once 'config.php';

class User {
	private $dbaccess;
	
	private $id;
	private $name;
	private $username;
	private $email;
	private $password;
	private $salt;	
	
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
	
	public function saveUser() {
		$query = "INSERT INTO users (name, username, email, password, salt)
				VALUES (:name, :username, :email, :password, :salt)";
		
		$params[0] = $this->name;
		$params[1] = $this->username;
		$params[2] = $this->email;
		$params[3] = $this->password;
		$params[4] = $this->salt;
		
		$paramNames[0] = ":name";
		$paramNames[1] = ":username";
		$paramNames[2] = ":email";
		$paramNames[3] = ":password";
		$paramNames[4] = ":salt";
		
		$this->dbaccess->prepared_insert_query($query, $params, $paramNames);
	}
	
	public function getUserByUsername($username) {
		$query = "SELECT id, name, username, email FROM users WHERE username = '" . $username . "'";
				
		$result = $this->dbaccess->run_query($query);
		
		while($user = $result->fetchObject('User')) {
			return $user; // this only happens once as usernames are unique, while loop handles 0 results 
		} 
		
	}
	
	public function checkLoginInfo($inputUsername, $inputPassword) {
//		$inputPassword = md5($inputPassword);
		
		$query = "SELECT username FROM users WHERE username = ? AND password = ?";
		$saltquery = "SELECT salt FROM users WHERE username = '" . $inputUsername . "'";
		
		$result = $this->dbaccess->run_query($saltquery);
		$salt = $result['salt'];
		
		$password = md5($salt . $inputPassword);
	
		$params[0] = $inputUsername;
		$params[1] = $password;
		
		$username = $this->dbaccess->run_prepared_query($query, $params);
	
		if(isset($username)) {
			return $username;
		}else {
			return false;
		} 
	}
	
	public function generateHash() {
		$generatedsalt = substr(md5(uniqid(rand(), true)), 0, 32);
		$this->password = md5($generatedsalt . $this->password);
		$this->salt = $generatedsalt;
	}
	
}
