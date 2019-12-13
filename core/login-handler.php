<?php

const E_MAIL="francescospeciale@gmail.com";
const PASSWORD="$2y$10$/S.QfrUFIQfEmUdeQeTxUu.FSbfRWybUDvE/FNxdp1vWZu.pgH3s2";

$GLOBALS['err']=false;

function verifyEmail($email){
    return ($email===E_MAIL);
}

function verifyPassword($password){
    return (password_verify($password, PASSWORD));
}

function loginUser($email, $password){
    if (verifyEmail($email) && verifyPassword($password)){
    $_SESSION['loggedUser']=$email;
    return true;
    }
    else{
    $GLOBALS['err']=true;
    return false;
    }
}
                                                                                                                                                                                                                                                                                                 
function isLogged(){
    return isset($_SESSION["loggedUser"]);
}

function logoutUser(){
    unset($_SESSION['loggedUser']);
}

if(isset($_POST['email']) && isset($_POST['password']))
    if(loginUser($_POST['email'], $_POST['password'])){
        $GLOBALS['err']=false;
        header('Location: index.php');
    }
    

?>