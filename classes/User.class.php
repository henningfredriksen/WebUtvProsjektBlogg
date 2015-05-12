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
	private $usertype;
	private $IpAdress;
	private $userAgent;
	private $email_confirmed;
	private $picturefilename;
	private $picturemimetype;	
	
	public function __construct() {
		$this->dbaccess = new DBAccess();
	}
	
	public function getId() {return $this->id;}
	public function getName() {return $this->name;}
	public function getUsername() {return $this->username;}
	public function getEmail() {return $this->email;}
	public function getPassword() {return $this->password;}
	public function getSalt() {return $this->salt;}
	public function getUsertype() {return $this->usertype;}
	public function getIpAdress() {return $this->IpAdress;}
	public function getUserAgent() {return $this->userAgent;}
	public function getEmailConfirmed() {return $this->email_confirmed;}
	public function getPictureFilename() {return $this->picturefilename;}
	public function getPictureMimetype() {return $this->picturemimetype;}
	
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
	
	public function setUsertype($usertype) {
		$this->usertype = $usertype;
	}
	
	public function setIpAdress($IpAdress) {
		$this->IpAdress = $IpAdress;
	}
	
	public function setUserAgent($userAgent) {
		$this->userAgent = $userAgent;
	}
	
	public function setEmailConfirmed($email_confirmed) {
		$this->email_confirmed = $email_confirmed;
	}
	
	public function setPictureFilename($picturefilename) {
		$this->picturefilename = $picturefilename;
	}
	
	public function setPictureMimetype($picturemimetype) {
		$this->picturemimetype = $picturemimetype;
	}
	
	// writes a new user to the DB
	public function saveUser() {
		$query = "INSERT INTO users (name, username, email, password, salt, usertype, email_confirmed)
				VALUES (:name, :username, :email, :password, :salt, :usertype, :email_confirmed)";
		
		$params[0] = $this->name;
		$params[1] = $this->username;
		$params[2] = $this->email;
		$params[3] = $this->password;
		$params[4] = $this->salt;
		$params[5] = 2;
		$params[6] = false;
		
		$paramNames[0] = ":name";
		$paramNames[1] = ":username";
		$paramNames[2] = ":email";
		$paramNames[3] = ":password";
		$paramNames[4] = ":salt";
		$paramNames[5] = ":usertype";
		$paramNames[6] = ":email_confirmed";
		
		$this->dbaccess->prepared_insert_query($query, $params, $paramNames);
	}
	
	// returns a user based on username
	public function getUserByUsername($username) {
		$query = "SELECT id, name, username, email, usertype, picturefilename, picturemimetype FROM users WHERE username = '" . $username . "'";
				
		$result = $this->dbaccess->run_query($query);
		
		while($user = $result->fetchObject('User')) {
			return $user; // this only happens once as usernames are unique, while loop handles 0 results 
		} 		
	}
	
	// writes the filename and mimetype of the users profile picture to database
	// as well as deleting the previous profile picture from local storage (/uploadedfiles/)
	public function savePicture($userid)
	{
		// fetches the filename of and deletes the locally stored picture before uploading a new one (replacing)
		$attachmentQuery = "SELECT picturefilename FROM users WHERE id=$userid";
		$result = $this->dbaccess->run_query($attachmentQuery);
		while($line = $result->fetchObject('User'))
		{
			$users[] = $line;
		}
		
		foreach ($users as $user)
		{
			if (file_exists('uploadedfiles/'.$user->getPictureFilename()))
			{
				unlink('uploadedfiles/'.$user->getPictureFilename());
			}
		}		
		
		$query = "UPDATE users SET picturefilename=:picturefilename, picturemimetype=:picturemimetype WHERE id='" . $userid . "'";
		
		$params[0] = $this->picturefilename;
		$params[1] = $this->picturemimetype;
		
		$paramNames[0] = ":picturefilename";
		$paramNames[1] = ":picturemimetype";
		
		$this->dbaccess->prepared_insert_query($query, $params, $paramNames);
	}
	
	
	public function checkLoginInfo($inputUsername, $inputPassword) {
		$hashedpassword = $this->getHash($inputPassword, $inputUsername);
		
		$query = "SELECT * FROM users WHERE username = ? AND password = ?";
	
		$params[0] = $inputUsername;
		$params[1] = $hashedpassword;
		
		$result = $this->dbaccess->run_prepared_query($query, $params);
		$user = $result->fetchObject('User');		
	
		if($user) {
			$user->setIpAdress($_SERVER["REMOTE_ADDR"]);
			$user->setUserAgent($_SERVER['HTTP_USER_AGENT']);
			return $user;
		}else {
			return false;
		} 
	}
	
	public function getHash($password, $username) {
		$saltquery = "SELECT salt FROM users WHERE username = '" . $username . "'";
		$result = $this->dbaccess->run_query($saltquery);
		$arraywithsalt = $result->fetch();
		$salt = $arraywithsalt['salt'];
		
		$password = md5($salt . $password);
		
		return $password;
	}
	
	public function generateHash() {
		$generatedsalt = substr(md5(uniqid(rand(), true)), 0, 32);
		$this->password = md5($generatedsalt . $this->password);
		$this->salt = $generatedsalt;
	}
	
}
