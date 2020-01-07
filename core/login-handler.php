<?php

$GLOBALS['err-login'] = false;

function loginUser($path){
    $_SESSION['loggedUser']=$_POST['username'];
    $GLOBALS['err-login'] = false;
    if($_POST["remember-me"])
    setcookie("user", $_POST["username"], time()+3600);
    header("Location: $path");
}

function isLogged()
{
    return isset($_SESSION["loggedUser"]);
}

function verifyPassword($nothashed, $hashed){
    if(password_verify($nothashed, $hashed))
    return true;
    else return false;
}

function verifyUser()
{
    try {
        $pdo = connect();
        $statement = $pdo->prepare("SELECT username, `password` from `user` where username=:username");
        $statement->bindParam(':username', $_POST['username']);
        $statement->execute();
        $items=$statement->fetchAll(PDO::FETCH_ASSOC);
        
        if(sizeof($items)==1){
            return verifyPassword($_POST['password'],$items[0]['password']);
        }
    } catch (PDOException $e) {
        print ('Error! ' . $e->getMessage()) . '<br/>';
        die();
    }
}

function logoutUser()
{
    unset($_SESSION['lock']);
    unset($_COOKIE['user']);
    unset($_SESSION['loggedUser']);
    header('Location: index.php');
}

?>