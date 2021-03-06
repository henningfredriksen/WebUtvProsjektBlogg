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
	public function getUserType() {return $this->usertype;}
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
	
	//compares input login info with login info in the database
	//also checks if the users email adress is confirmed and if not, login is denied
	public function checkLoginInfo($inputUsername, $inputPassword) {
		$hashedpassword = $this->getHash($inputPassword, $inputUsername);
		
		$query = "SELECT username FROM users WHERE username = ? AND password = ?";
	
		$params[0] = $inputUsername;
		$params[1] = $hashedpassword;
		
		$result = $this->dbaccess->run_prepared_query($query, $params);
		$username = $result->fetch();

		$cquery = "SELECT email_confirmed FROM users WHERE username = ?";
		
		$cparams[0] = $inputUsername;
		
		$cresult = $this->dbaccess->run_prepared_query($cquery, $cparams);
		$confirmed = $cresult->fetch();
	
		if(isset($username['username'])) {
			if($confirmed['email_confirmed'] == 1) {
				$login = new Login($username['username'], $_SERVER["REMOTE_ADDR"], $_SERVER['HTTP_USER_AGENT']);
				return $login;
			} else {
				$_SESSION['emailnotconfirmed'] = true;
				return false;
			}			
		}else {
			return false;
		} 
	}
	
	//checks if the user-objects email adress excists in the database
	public function checkIfEmailExcists() {
		$query = "SELECT email FROM users WHERE email= ?";
		$params[0] = $this->email;
		$result = $this->dbaccess->run_prepared_query($query, $params);
		$result = $result->fetch();
		
		if(isset($result['email'])) {
			return true;
		} else {
			return false;
		}
	}
	
	//uses the input password, username and salt to generate a hash that can be compared to the passwordhash in the database
	public function getHash($password, $username) {
		$saltquery = "SELECT salt FROM users WHERE username = '" . $username . "'";
		$result = $this->dbaccess->run_query($saltquery);
		$arraywithsalt = $result->fetch();
		$salt = $arraywithsalt['salt'];
		
		$password = md5($salt . $password);
		
		return $password;
	}
	
	//generates a random salt and the associated password hash when a new user is registered
	public function generateHash() {
		$generatedsalt = substr(md5(uniqid(rand(), true)), 0, 32);
		$this->password = md5($generatedsalt . $this->password);
		$this->salt = $generatedsalt;
	}
	
}
