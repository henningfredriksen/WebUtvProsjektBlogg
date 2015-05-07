<?php
require 'libs/Smarty.class.php';
session_start();
$smarty = new Smarty();

function siljesAutoloader($class_name){
	// __DIR__ . DIRECTORY_SEPARATOR.
	require_once $class_name . '.class' . '.php';
}

spl_autoload_register('siljesAutoloader');
?>