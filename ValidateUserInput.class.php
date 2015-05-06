<?php

class ValidateUserInput {
	
	public function __construct() {
		
	}
	
	public function validateInputString($input) {
		$validatedinput = strip_tags($input);
		$validatedinput = trim($validatedinput);
		return $validatedinput;
	}
	
	public function validateMimeType($input) {
		
		if (preg_match('/^image/p?jpeg$/i', $input) or preg_match('/^image/gif$/i', $input) or preg_match('/^image/(x-)?png$/i', $input))
		{
			return true;
		}
		
	}
}
?>