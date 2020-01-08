<?php

require 'core/bootstrap.php';
require_once 'core/post-repository.php';
require_once 'core/propic-repository.php';


function checkPic($path){
    $pdo=connect();
    $row=$pdo->query("SELECT count(*) from portfolio where `path`='".$path."'");
    $count=$row->fetch();
    if($count[0]==0)
    unlink($path);
}

function deletePic($user_id, $path){
    $pdo=connect();
    $pdo->exec("DELETE from portfolio where id_user=$user_id and `path`='".$path."'");
    checkPic($path);
}

function deletePortfolio($user_id){
    
    $pdo=connect();
    $rows=$pdo->query("SELECT `path` from portfolio where id_user=$user_id");
    $items=$rows->fetchAll(PDO::FETCH_ASSOC);
    if($items){
        foreach($items as $item=>$pic){
        deletePic($user_id, $pic['path']);
        }
    }
}

function deleteLanguage($user_id){
    
    $pdo=connect();
    $pdo->exec("DELETE from languages where id_user=$user_id and `language`='".$_GET['lang']."'");
}

function deleteLanguages($user_id){
    $pdo=connect();
    $pdo->exec("DELETE from languages where id_user=$user_id");
}

function deletePost($user_id, $date){
    $pdo=connect();
    deleteTagsFromPost($user_id, $date);
    $pdo->exec("DELETE FROM post where `user_id`=$user_id and creation_date='".$date."'");
}

function deletePosts($user_id){
    $pdo=connect();
    $rows=$pdo->query("SELECT creation_date from post where `user_id`=".$user_id);
    $items=$rows->fetchAll(PDO::FETCH_ASSOC);
    foreach($items as $item=>$dates)
        deletePost($user_id, $dates['creation_date']);
}

function deleteAccount($user_id){
    
    deletePortfolio($user_id);
    deletePropic($user_id);
    deletePosts($user_id);
    $pdo=connect();
    $pdo->exec('DELETE from `user` where id='.$user_id);
    logoutUser();
}


if(isset($_GET['propic'])){
deletePropic($user_id);
header('Location: about.php');
}

if(isset($_GET['lang'])){
deleteLanguage($user_id);
header('Location: about.php');
}

if(isset($_GET['langs'])){
deleteLanguages($user_id);
header('Location: about.php');
}

if(isset($_GET['pic'])){
deletePic($user_id, $_GET['pic']);
header('Location: about.php');
}
if(isset($_GET['portfolio'])){
deletePortfolio($user_id);
header('Location: about.php');
}

if(isset($_GET['creation_date'])){
deletePost($user_id, $_GET['creation_date']);
header('Location: index.php');
}

if(isset($_GET['account']))
deleteAccount($user_id);

?>