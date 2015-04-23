<?php
require_once 'config.php';

$post = new post();
$allPosts = $post->get_all_posts();

?>