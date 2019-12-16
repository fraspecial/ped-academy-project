<?php
require_once 'core/bootstrap.php';

error_reporting(E_ALL);
ini_set("display_errors", 1);


function createUser(){
    return new User($_POST['name'], $_POST['surname'], $_POST['email'],
            password_hash($_POST['password'], PASSWORD_DEFAULT));
}

function insertUser($user){
    try{
        $pdo=new PDO('mysql:host=localhost;dbname=blog','root', 'root');
        $statement=$pdo->prepare("INSERT into `user` values (:name, :surname, :email, :password)");
        $statement->bindParam(':name', $user->getName(), ':surname', $user->getSurname(), 
        'email', $user->getEmail(), 'password', $user->getPassword());
        $statement->execute();
    }

    catch(PDOException $e){
        print('Error! '. $e->getMessage()). '<br/>';
        die;
    }
}

print_r($form);

if($form =='signup')
    if(isset($_POST['name']) && isset($_POST['surname']) && isset($_POST['email']) && isset($_POST['password'])){
    $user=createUser();
    insertUser($user);
    loginUser();
    }
?>