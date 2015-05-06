<?php

class ValidateUserInput {
	
	public function __construct() {
		
	}
	
	public function validateInputString($input) {
		$validatedinput = strip_tags($input);
		$validatedinput = trim($validatedinput);
		return $validatedinput;
	}
}
?>