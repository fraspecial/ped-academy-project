<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);

const E_MAIL = "francescospeciale@gmail.com";
const PASSWORD = "$2y$10$/S.QfrUFIQfEmUdeQeTxUu.FSbfRWybUDvE/FNxdp1vWZu.pgH3s2";

$GLOBALS['err'] = false;

function verifyUser()
{
    try {
        $pdo = new PDO('mysql:host=localhost;dbname=blog', 'root', 'root');
        $statement = $pdo->prepare("SELECT count(*) from `user` where `email`= :email and `password`=:password");
        $statement->bindParam(':email', $_POST['email'], ':password', $_POST['password']);
        $statement->execute();
        if ($statement->fetch() == 1){
            loginUser();
        }
        else return false;

    } catch (PDOException $e) {
        print ('Error! ' . $e->getMessage()) . '<br/>';
        die();
    }
}

function loginUser(){
    $_SESSION['loggedUser']=$_POST['email'];
    $GLOBALS['err'] = false;
    header('Location: index.php');
    return true;
}

function isLogged()
{
    return isset($_SESSION["loggedUser"]);
}

function logoutUser()
{
    unset($_SESSION['loggedUser']);
}



if ($form == 'login')
    if (isset($_POST['email']) && isset($_POST['password']))
    verifyUser();
?>