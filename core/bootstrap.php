<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);

session_start();
function connect(){
    return new PDO('mysql:host=localhost;dbname=blog', 'root', 'root');
}

$curLink=basename($_SERVER['SCRIPT_FILENAME']);
require 'autoload.php';

if(isset($_POST['form']))
    $form=$_POST['form'];

require_once 'login-handler.php';
require_once 'signup-handler.php';
?>