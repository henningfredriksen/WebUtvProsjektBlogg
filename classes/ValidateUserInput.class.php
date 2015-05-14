<?php
require_once 'config.php';

class ValidateUserInput {
	
	public function __construct() {
		
	}
	
	//validates input strings
	public function validateInputString($input) {
		$validatedinput = strip_tags($input);
		$validatedinput = trim($validatedinput);
		return $validatedinput;
	}
	
	// validates an image file on properties like:
	// exceeding a certain file size,
	// being the wrong mimetype,
	// exceeding certain image dimensions,
	// other errors
	// and returns an error to index.php via $_SESSION, where it is displayed (if one is encountered)
	// if no errors occur, true is returned indicating successful validation 
	public function validateFile($filename, $filemimetype, $filesize, $filetmpname, $fileerror, $maxFileSize, $maxWidth, $maxHeight)
	{
		$MAX_FILESIZE = $maxFileSize;
		$MAX_WIDTH = $maxWidth;
		$MAX_HEIGHT = $maxHeight;
		
		// uses getimagesize on the temporary file to retrieve the width and height of the image
		$imginfo = getimagesize($filetmpname);
		$imgwidth = $imginfo[0];
		$imgheight = $imginfo[1];
		
		// creates an array of possible errors relating to file uploading
		$errorarray = Array(
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
		
		// checks the width and height of the image
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
		
		// if no errors, the method returns true
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