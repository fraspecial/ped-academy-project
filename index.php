<?php
require_once 'core/bootstrap.php';
require_once 'core/post-repository.php';



/*$tag=null;
if(!empty($_GET['tag'])){
    $tag=$_GET['tag'];
}*/

$array=getAllPosts();

include_once 'view/index.php';
?>