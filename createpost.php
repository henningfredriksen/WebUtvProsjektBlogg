<?php
require_once 'config.php';

$inputvalidator = new ValidateUserInput();

if (isset($_POST["title"], $_POST["content"]))
{
	$title = $_POST["title"];
	$title = $inputvalidator->validateInputString($title);
	$content = $_POST["content"];
	$content = $inputvalidator->validateInputString($content);
	$keywords = $_POST["keywords"];
	$keywords = $inputvalidator->validateInputString($keywords);
	
	$username = $_SESSION['username'];
	
	$post = new Post();
	$post->setTitle($title);
	$post->setText($content);
	$post->setAuthor($username);
	$post->setKeyWords($keywords);
	
	$post->savePost();
}

header("Location: index.php");