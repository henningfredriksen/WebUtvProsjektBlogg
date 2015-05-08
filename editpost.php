<?php
require_once 'config.php';

if (isset($_GET['postid'])) {
	$postid = $_GET['postid'];
	$_SESSION['editpostid'] = $postid;
	header("Location: index.php");
}