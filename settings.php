<?php
require 'core/bootstrap.php';

function unlock(){
    if(isset($_POST['old-password'])){
        $pdo=connect();
        $row=$pdo->query("SELECT `password` from `user` where username='".$_SESSION['loggedUser']."'");
        $item=$row->fetch(PDO::FETCH_ASSOC);
        $pwd=$item['password'];

        if(verifyPassword($_POST['old-password'], $pwd))
            $_SESSION['lock']=false;
        else
        $_SESSION['lock']=true;
    }
}

function updateAccount($user_id){
    if(isset($_POST['name']) && isset($_POST['surname']) && isset($_POST['email']) && isset($_POST['username'])){
        $pdo=connect();
        $statement=$pdo->prepare("UPDATE `user` set `first_name`=:name, last_name=:surname, email=:email, username=:username where id=$user_id");
        $statement->bindParam(':name', $_POST['name']);
        $statement->bindParam(':surname', $_POST['surname']);
        $statement->bindParam(':email', $_POST['email']);
        $statement->bindParam(':username', $_POST['username']);
        $statement->execute();
        $_SESSION['loggedUser']=$_POST['username'];

        if($_POST['password'] != $_POST['password_confirm']){
            echo 'Password not confirmed';
            exit;
        }
        elseif(!empty($_POST['password'])){ 
            $match=null;
            preg_match('/(?=.*[A-Z])(?=.*\d)([\S\s]){8,50}/', $_POST['password'], $match);
            if($match!=null){
            $statement=$pdo->prepare("UPDATE `user` set `password`=:password where id=$user_id");
            $pw=password_hash($_POST['password'], PASSWORD_DEFAULT);
            $statement->bindParam(':password', $pw);
            $statement->execute();
            }
            else{
                echo "password non valida";
                exit;
            }
        }
    }
}

unlock();
updateAccount($user_id);

$pdo=connect();
$row=$pdo->query("SELECT first_name, last_name, email from `user` where username='".$_SESSION['loggedUser']."'");
$result=$row->fetch();
$user=new User($result['first_name'], $result['last_name']);
$user->setEmail($result['email']);
$user->setUsername($_SESSION['loggedUser']);

include 'view/settings.php';
?>
