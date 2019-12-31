<?php
require_once 'core/bootstrap.php';
require_once 'core/about-settings.php';

$pdo=connect();
$row=$pdo->query("SELECT first_name, last_name, propic, about from `user` where username='".$_SESSION['loggedUser']."'");
$result=$row->fetch();

$lang_list=languages();
$portfolio=portfolio();

$user=new User($result['first_name'], $result['last_name'], $result['propic'], $result['about'], $lang_list, $portfolio);


if(isset($form) && $form=="bio")
updateBio();

include_once 'view/about.php';
?>