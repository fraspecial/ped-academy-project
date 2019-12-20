<?php

$GLOBALS['err-login'] = false;

function verifyUser()
{
    try {
        $pdo = connect();
        $statement = $pdo->prepare("SELECT email, `password` from `user` where email=:email");
        $statement->bindParam(':email', $_POST['email']);
        $statement->execute();
        $items=$statement->fetchAll(PDO::FETCH_ASSOC);

        if(sizeof($items)==1){
            if(password_verify($_POST['password'], $items[0]['password']))
            loginUser();
            else
            $GLOBALS['err-login']=true;
        }

    } catch (PDOException $e) {
        print ('Error! ' . $e->getMessage()) . '<br/>';
        die();
    }
}

function loginUser(){
    $_SESSION['loggedUser']=$_POST['email'];
    $GLOBALS['err-login'] = false;
    header('Location: index.php');
}

function isLogged()
{
    return isset($_SESSION["loggedUser"]);
}

function logoutUser()
{
    unset($_SESSION['loggedUser']);
}



if(isset($form)){
    if ($form == 'login'){
        if (isset($_POST['email']) && isset($_POST['password']))
            verifyUser();
    }
}
?>