<?php
require_once 'core/bootstrap.php';
require_once 'core/about-settings.php';

if(isset($form)){
    switch($form){
        case "bio": updateBio();
        break;
        
        case "lang": updateLang();
        break;
        
        case "pic": updatePic();
        break;
    }
}

$pdo=connect();
$row=$pdo->query("SELECT first_name, last_name, propic, about from `user` where username='".$_SESSION['loggedUser']."'");
$result=$row->fetch();

$lang_list=languages();
$portfolio=portfolio();

$user=new User($result['first_name'], $result['last_name'], $result['propic'], $result['about'], $lang_list, $portfolio);



include_once 'view/about.php';
?>