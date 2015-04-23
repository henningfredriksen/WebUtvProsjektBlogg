<?php
require_once 'config.php';

$post = new post();
$allPosts = $post->getAllPosts();

$smarty->assign('allPosts', $allPosts);

$smarty->display('index.tpl');

?>