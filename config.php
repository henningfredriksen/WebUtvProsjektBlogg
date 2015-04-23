<?php
require 'libs/Smarty.class.php';
session_start();
$smarty = new Smarty();

function siljesAutoloader($class_name){
	require_once __DIR__ . DIRECTORY_SEPARATOR. $class_name . '.class' . '.php';
}

spl_autoload_register('siljesAutoloader');
?>