<?php
require_once 'core/bootstrap.php';
require_once 'core/login-handler.php';
require_once 'core/post-repository.php';

$post_repository=getAllPosts();

function verifyUser()
{
    try {
        $pdo = connect();
        $statement = $pdo->prepare("SELECT username, `password` from `user` where username=:username");
        $statement->bindParam(':username', $_POST['username']);
        $statement->execute();
        $items=$statement->fetchAll(PDO::FETCH_ASSOC);

        if(sizeof($items)==1){
            if(password_verify($_POST['password'], $items[0]['password']))
            loginUser("index.php");
            else
            $GLOBALS['err-login']=true;
        }

    } catch (PDOException $e) {
        print ('Error! ' . $e->getMessage()) . '<br/>';
        die();
    }
}

if(isset($form)){
    if ($form == 'login'){
        if (isset($_POST['username']) && isset($_POST['password']))
            verifyUser();
    }
}

include_once 'view/index.php';
?>