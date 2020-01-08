<?php
require_once 'core/bootstrap.php';
require_once 'core/propic-repository.php';
define('UPLOAD_DIR', 'assets/images/');


function portfolio(){
    $pdo=connect();
    $rows=$pdo->query("SELECT p.path, p.title, p.caption from `user` u join portfolio p on p.id_user=u.id where u.username='".$_SESSION['loggedUser']."' order by date_of_insert");
    if($rows){    
        $portfolio=new Portfolio();
        while($pic=$rows->fetch(PDO::FETCH_ASSOC))
        {
            $new_pic=new Picture($pic['path'], $pic['title'], $pic['caption']);
            $portfolio->save($new_pic);
        }
        return $portfolio;
        }
    else return null;
}

function updatePic($user_id){
    $pdo=connect();
    $statement=$pdo->prepare("UPDATE portfolio set title=:title, caption=:caption where id_user=$user_id and `path`=:path");
    $statement->bindParam(':title', $_POST['title']);
    $statement->bindParam(':caption', $_POST['caption']);
    $statement->bindParam(':path', $_POST['edit']);
    $statement->execute();
}

function addPic($user_id){
    if (!isset($_FILES['pic']) || !is_uploaded_file($_FILES['pic']['tmp_name'])) {
        echo 'Upload failed';
        exit;    
        }
    
        $target_file=UPLOAD_DIR. basename($_FILES["pic"]["name"]);
        $tmp_name=$_FILES['pic']['tmp_name'];
    
        if (!move_uploaded_file($tmp_name, $target_file)) {
        echo 'Upload NON valido!';
        exit;
        }
        
        $pdo=connect();
        $statement=$pdo->prepare("INSERT into portfolio (id_user, `path`, title, caption) values($user_id,'" . $target_file. "', :title, :caption)");
        $statement->bindParam(':title', $_POST['title']);
        $statement->bindParam(':caption', $_POST['caption']);
        $statement->execute();
}


function updateBio(){
    $pdo=connect();
    $statement=$pdo->prepare("UPDATE `user` set about=:bio where username='".$_SESSION['loggedUser']."'");
    $statement->bindParam(':bio', $_POST['bio']);
    $statement->execute();
}

function languages(){
    $pdo=connect();
    $rows=$pdo->query("SELECT l.language, l.reading, l.writing, l.speaking, l.listening from `user` u join languages l on l.id_user=u.id where u.username='".$_SESSION['loggedUser']."' order by date_of_insert");
    if($rows){    
        $languageList=new LanguageList();
        while($lang=$rows->fetch(PDO::FETCH_ASSOC))
        {
            $new_lang=new Language($lang['language'], $lang['listening'], $lang['reading'], $lang['writing'], $lang['speaking']);
            $languageList->save($new_lang);
        }
        return $languageList;
        }
    else return null;
}

function updateLang($user_id){
    $pdo=connect();
    $statement=$pdo->prepare("UPDATE languages set listening=:listening, reading=:reading, writing=:writing, speaking=:speaking where id_user=$user_id and `language`=:lang");
    $statement->bindParam(':listening', $_POST['Listening']);
    $statement->bindParam(':reading', $_POST['Reading']);
    $statement->bindParam(':writing', $_POST['Writing']);
    $statement->bindParam(':speaking', $_POST['Speaking']);
    $statement->bindParam(':lang', $_POST['edit']);
    $statement->execute();
}

function addLang($user_id){
    $pdo=connect();
    $statement=$pdo->prepare("INSERT into languages (id_user, `language`, listening, reading, writing, speaking) values($user_id, :language, :listening, :reading, :writing, :speaking)");
    $statement->bindParam(':language', $_POST['newlang']);
    $statement->bindParam(':listening', $_POST['Listening']);
    $statement->bindParam(':reading', $_POST['Reading']);
    $statement->bindParam(':writing', $_POST['Writing']);
    $statement->bindParam(':speaking', $_POST['Speaking']);
    $statement->execute();
}


if(isset($form)){
    switch($form){
        case "bio": updateBio();
        break;
        
        case "lang":
            if(isset($_POST['edit']))
            updateLang($user_id);
            else
            addLang($user_id);
        break;
        
        case "pic":
            if(isset($_POST['edit']))
            updatePic($user_id);
            else
            addPic($user_id);
        break;

        case "propic": updatePropic($user_id);
        break;
    }
}

$pdo=connect();
$row=$pdo->query("SELECT first_name, last_name, propic, about from `user` where username='".$_SESSION['loggedUser']."'");
$result=$row->fetch();

$lang_list=languages();
$portfolio=portfolio();

$user=new User($result['first_name'], $result['last_name'], $result['propic'], $result['about'], $lang_list, $portfolio);

include_once 'view/about.php';
?>