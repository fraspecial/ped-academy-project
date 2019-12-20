<?php

function connect(){
    return new PDO('mysql:host=localhost;dbname=blog', 'root', 'root');
}

session_start();


if(isset($_POST['form']))
    $form=$_POST['form'];


require 'autoload.php';
require_once 'login-handler.php';
require_once 'signup-handler.php';


$curLink=basename($_SERVER['SCRIPT_FILENAME']);


/*if(!isLogged() && $curLink != 'http://localhost/mio-progetto/about.php')
header('Location: about.php');*/

?>