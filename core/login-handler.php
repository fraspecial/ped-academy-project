<?php

$GLOBALS['err-login'] = false;

function loginUser($path){
    $_SESSION['loggedUser']=$_POST['username'];
    $GLOBALS['err-login'] = false;
    header("Location: $path");
}

function isLogged()
{
    return isset($_SESSION["loggedUser"]);
}

function logoutUser()
{
    unset($_SESSION['loggedUser']);
}

?>