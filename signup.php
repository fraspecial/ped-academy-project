<?php
require_once 'core/bootstrap.php';

function insertUser(){
    if($_POST['password']==$_POST['password_confirm']){
        $match=null;
        preg_match('/(?=.*[A-Z])(?=.*\d)([\S\s]){8,50}/', $_POST['password'], $match);
        if($match!=null){
            if(!verifyEmail())
            $GLOBALS['err-email']=true;
            elseif(!verifyUsername())
            $GLOBALS['err-username']=true;
            else{
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
        }
        else {
        echo "password non valida";
        exit;
        }
    }
}

if(isset($form)){
    if($form =='signup'){
        if(isset($_POST['name']) && isset($_POST['surname']) && isset($_POST['email']) && isset($_POST['username']) && isset($_POST['password']) && isset($_POST['password_confirm'])){
            insertUser();
            //loginUser("about.php");
        }
    }
}

include_once 'view/signup.php';
?>