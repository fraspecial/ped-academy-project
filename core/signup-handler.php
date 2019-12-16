<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);

$GLOBALS['err-signup']=false;

function createUser(){
    $password=password_hash($_POST['password'], PASSWORD_DEFAULT);
    print_r("$password <br/>");
    return new User($_POST['name'], $_POST['surname'], $_POST['email'], $password);
}

function insertUser($user){
    try{
        $pdo=new PDO('mysql:host=localhost;dbname=blog','root', 'root');
        $statement=$pdo->prepare("INSERT into `user` (first_name, last_name, email, `password`) values (:name, :surname, :email, :password)");
        $statement->bindParam(':name', $user->getName());
        $statement->bindParam(':surname', $user->getSurname());
        $statement->bindParam(':email', $user->getEmail());
        $statement->bindParam(':password', $user->getPassword());
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
            $user=createUser();
            if(insertUser($user))
            loginUser();
            else
            $GLOBALS['err-signup']=true;
        }
}
?>