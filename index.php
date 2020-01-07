<?php
require_once 'core/bootstrap.php';
require_once 'core/login-handler.php';
require_once 'core/post-repository.php';



if(isset($form)){
    switch ($form){
        case 'login':{
            if (isset($_POST['username']) && isset($_POST['password']))
                if(verifyUser())
                loginUser("index.php");
                else
                $GLOBALS['err-login']=true;
        break;
        }
        case 'post': {
            editPost($user_id);
        break;
        }
    }
}

$post_repository=getAllPosts();


include_once 'view/index.php';
?>