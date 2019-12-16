<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);
session_start();

$curLink=basename($_SERVER['SCRIPT_FILENAME']);

function redirect($curLink){
    header("Location $curLink");
}

require 'autoload.php';

if(isset($_POST['form']))
$form=$_POST['form'];

require_once 'login-handler.php';
require_once 'signup-handler.php';

?>