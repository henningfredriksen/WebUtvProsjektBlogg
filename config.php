<?php
require 'libs' . DIRECTORY_SEPARATOR . 'Smarty.class.php';
session_start();
$smarty = new Smarty();

function siljesAutoloader($class_name){
	include "classes" . DIRECTORY_SEPARATOR . $class_name . '.class' . '.php';
}

spl_autoload_register('siljesAutoloader');
?>