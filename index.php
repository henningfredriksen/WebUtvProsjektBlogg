<?php
require_once 'config.php';
require_once 'Post.class.php';
require_once 'DBAccess.class.php';

$post = new Post();
$allPosts = $post->getAllPosts();

print_r($allPosts[0]);

$smarty->assign('allPosts', $allPosts);

$smarty->display('index.tpl');

?>