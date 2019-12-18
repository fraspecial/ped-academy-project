<?php

function connect(){
    return new PDO('mysql:host=localhost;dbname=blog', 'root', 'root');
}

session_start();

require 'autoload.php';
require_once 'login-handler.php';
require_once 'signup-handler.php';

if(!isLogged())
header('Location: about.php');

$curLink=basename($_SERVER['SCRIPT_FILENAME']);

if(isset($_POST['form']))
    $form=$_POST['form'];

?>