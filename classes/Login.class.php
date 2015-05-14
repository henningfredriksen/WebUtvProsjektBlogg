<?php

//Class that contains info about the active user

class Login {
	private $username;
	private $ipAddress;
	private $userAgent;
	
	public function __construct($username, $ipAddress, $userAgent) {
		$this->username = $username;
		$this->ipAddress = $ipAddress;
		$this->$userAgent = $userAgent;
	}
	
	public function getUsername() {return $this->username;}
	public function getIpAddress() {return $this->ipAddress;}
	public function getUserAgent() {return $this->userAgent;}
	
	public function setUsername($username) {
		$this->username = $username;
	}
	
	public function setIpAddress($ipAddress) {
		$this->ipAddress = $ipAddress;
	}
	
	public function setUserAgent($userAgent) {
		$this->userAgent = $userAgent;
	}
}