<?php

class ValidateUserInput {
	
	public function __construct() {
		
	}
	
	public function validateInputString($input) {
		$validatedinput = strip_tags($input);
		$validatedinput = trim($validatedinput);
		return $validatedinput;
	}
	
	public function validateFile($filename, $filemimetype, $filesize, $filetmpname, $fileerror, $maxFileSize, $maxWidth, $maxHeight)
	{
		$MAX_FILESIZE = $maxFileSize;
		$MAX_WIDTH = $maxWidth;
		$MAX_HEIGHT = $maxHeight;
		
		$imginfo = getimagesize($filetmpname);
		$imgwidth = $imginfo[0];
		$imgheight = $imginfo[1];
		
		// checks filesize (in bytes)
		if($filesize > ($MAX_FILESIZE))
		{
			$_SESSION["filesizeerror"] = $MAX_FILESIZE;
			$validFilesize = false;
		}
		else
		{
			$validFilesize = true;
		}
		
		// checks if there are any reported errors
		if($fileerror != 0)
		{
			$_SESSION["fileerror"] = $fileerror;
			$noReportedErrors = false;			
		}
		else
		{			
			$noReportedErrors = true;
		}
		
		// checks for accepted filestypes
		if ($filemimetype == "image/jpeg" || $filemimetype == "image/jpg" || $filemimetype == "image/gif" || $filemimetype == "image/png")
		{
			$validFiletype = true;
		}
		else
		{
			$_SESSION["imgtypeerror"] = true;
			$validFiletype = false;
		}
		
		if ($imgwidth < $MAX_WIDTH && $imgheight < $MAX_HEIGHT)
		{
			$validFiledimensions = true;
		}
		else
		{
			$_SESSION["imgwidtherror"] = $MAX_WIDTH;
			$_SESSION["imgheighterror"] = $MAX_HEIGHT;
			$validFiledimensions = false;
		}
		
		if ($validFilesize && $noReportedErrors && $validFiletype && $validFiledimensions)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
}
?>