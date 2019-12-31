<?php
require_once 'core/bootstrap.php';
require_once 'core/login_handler';

$GLOBALS['err-signup']=false;

function insertUser(){
    try{
        $pdo=connect();
        $statement=$pdo->prepare("INSERT into `user` (first_name, last_name, email, username, `password`) values (:name, :surname, :email, :username, :password)");
        $statement->bindParam(':name', $_POST['name']);
        $statement->bindParam(':surname', $_POST['surname']);
        $statement->bindParam(':email', $_POST['email']);
        $statement->bindParam(':username', $_POST['username']);
        $pw=password_hash($_POST['password'], PASSWORD_DEFAULT);
        $statement->bindParam(':password', $pw);
        return $statement->execute();
        }

    catch(PDOException $e){
        print('Error! '. $e->getMessage()). '<br/>';
        die();
    }
}

if(isset($form)){
    if($form =='signup')
        if(isset($_POST['name']) && isset($_POST['surname']) && isset($_POST['email']) && isset($_POST['username']) && isset($_POST['password'])){
            if(insertUser())
            loginUser("about.php");
            else
            $GLOBALS['err-signup']=true;
        }
}

include_once 'view/signup.php';
?>