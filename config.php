<?php
session_start();

function siljesAutoloader($class_name){
	require_once __DIR__ . DIRECTORY_SEPARATOR. $class_name . '.class' . '.php';
}

spl_autoload_register('siljesAutoloader');
?>