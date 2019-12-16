<?php
session_start();
require 'autoload.php';
require_once __DIR__ . '/login-handler.php';
require_once __DIR__ . '/signup-handler.php';

if(isset($_POST['form']))
$form=$_POST['form'];

$curLink=basename($_SERVER['SCRIPT_FILENAME']);
?>