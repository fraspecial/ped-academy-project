<?php

function selectPropic($user_id){
    $pdo=connect();
    $row=$pdo->query("SELECT propic from `user` where id=".$user_id);
    $res=$row->fetch();
    $path=$res[0];
    return $path;
}

function checkPropic($path){
    if($path!=null){
    $pdo=connect();
    $row=$pdo->query("SELECT count(*) from `user` where `propic`='".$path."'");
    $count=$row->fetch();
    if($count[0]==1)
    unlink($path);
    }
}

function deletePropic($user_id){
    $path=selectPropic($user_id);
    checkPropic($path);
    $pdo=connect();
    $pdo->exec("UPDATE `user` set propic=null where id=".$user_id);
}

function updatePropic($user_id){
    $path=selectPropic($user_id);
    checkPropic($path);
    
    if (!isset($_FILES['propic']) || !is_uploaded_file($_FILES['propic']['tmp_name'])) {
        echo 'Upload failed';
        exit;    
        }
    
        $target_file=UPLOAD_DIR. basename($_FILES["propic"]["name"]);
        $tmp_name=$_FILES['propic']['tmp_name'];
    
        if (!move_uploaded_file($tmp_name, $target_file)) {
        echo 'Upload NON valido!'; 
        }

    $pdo=connect();
    $pdo->exec("UPDATE `user` set propic='".$target_file."' where username='".$_SESSION['loggedUser']."'");
}

?>