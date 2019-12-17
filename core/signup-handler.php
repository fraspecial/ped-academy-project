<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);

$GLOBALS['err-signup']=false;

function insertUser($user){
    try{
        $pdo=connect();
        $statement=$pdo->prepare("INSERT into `user` (first_name, last_name, email, `password`) values (:name, :surname, :email, :password)");
        $statement->bindParam(':name', $_POST['name']);
        $statement->bindParam(':surname', $_POST['surname']);
        $statement->bindParam(':email', $_POST['email']);
        $statement->bindParam(':password', password_hash($_POST['password'], PASSWORD_DEFAULT));
        return $statement->execute();
        }

    catch(PDOException $e){
        print('Error! '. $e->getMessage()). '<br/>';
        die();
    }
}

if(isset($form)){
    if($form =='signup')
        if(isset($_POST['name']) && isset($_POST['surname']) && isset($_POST['email']) && isset($_POST['password'])){
            if(insertUser($user))
            loginUser();
            else
            $GLOBALS['err-signup']=true;
        }
}
?>