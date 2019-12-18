<?php
require_once 'core/bootstrap.php';
require_once 'core/post-repository.php';

$array=getAllPosts();

include_once 'view/index.php';
?>