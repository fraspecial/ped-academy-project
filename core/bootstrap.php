<?php
error_reporting(E_ALL);

ini_set("display_errors", 1);
function connect(){
    return new PDO('mysql:host=localhost;dbname=blog', 'root', 'root');
}

function getUser(){
    $pdo=connect();
    $row=$pdo->query("SELECT id from `user` WHERE username='" . $_SESSION['loggedUser'] . "'");
    $user_id=$row->fetch();
    $user_id=$user_id["id"];
    return $user_id;
}

session_start();

require 'autoload.php';
require_once 'login-handler.php';

if(isset($_POST['type']))
    $form=$_POST['type'];

$curLink=basename($_SERVER['SCRIPT_FILENAME']);

if(!isLogged() && $curLink != "index.php" && $curLink != "signup.php")
header('Location: index.php');
?>