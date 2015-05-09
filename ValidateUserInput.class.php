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
		
		$errorarray = array(
				0=>"The file uploaded successfully",
				1=>"The uploaded file exceeds the upload_max_filesize directive in php.ini",
				2=>"The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form",
				3=>"The uploaded file was only partially uploaded",
				4=>"No file was uploaded",				
				6=>"Missing a temporary folder",
				7=>"Failed to write file to disk",
				8=>"A PHP extension stopped the file upload."
		);
		
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
			$_SESSION["fileerror"] = $errorarray[$fileerror];
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