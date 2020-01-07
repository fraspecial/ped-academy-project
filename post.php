<?php

require_once 'core/bootstrap.php';
require_once 'core/post-repository.php';

if(isset($_POST['title']) && isset($_POST['content'])){
    insertPost($user_id);
    header('Location: index.php');
}

include 'view/post.php';
?>