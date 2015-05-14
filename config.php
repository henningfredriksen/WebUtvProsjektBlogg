<?php
//registers the autoloader and starts session
//this file is required in all the other php-files

require 'libs' . DIRECTORY_SEPARATOR . 'Smarty.class.php';
$smarty = new Smarty();

function Autoloader($class_name){
	include "classes" . DIRECTORY_SEPARATOR . $class_name . '.class' . '.php';
}

spl_autoload_register('Autoloader');
session_start();

?>