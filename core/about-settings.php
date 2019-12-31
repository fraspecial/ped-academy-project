<?php

function updateBio(){
    $pdo=connect();
    $statement=$pdo->prepare("UPDATE `user` set about=:bio where username='".$_SESSION['loggedUser']."'");
    $statement->bindParam(':bio', $_POST['bio']);
    $statement->execute();
}

function languages(){
    $pdo=connect();
    $languageList=new LanguageList();
    $rows=$pdo->query("SELECT l.language, l.reading, l.writing, l.speaking, l.listening from `user` u join languages l on l.id_user=u.id where u.username='".$_SESSION['loggedUser']."'");
    if($rows){
    while($lang=$rows->fetch(PDO::FETCH_ASSOC))
    {
        $new_lang=new Language($lang['language'], $lang['listening'], $lang['reading'], $lang['writing'], $lang['speaking']);
        $languageList->save($new_lang);
    }
    return $languageList;
    }
    else return null;
}

function portfolio(){
    $pdo=connect();
    $portfolio=new Portfolio();
    $rows=$pdo->query("SELECT p.path, p.title, p.caption from `user` u join portfolio p on p.id_user=u.id where u.username='".$_SESSION['loggedUser']."'");
    if($rows){
    while($pic=$rows->fetch(PDO::FETCH_ASSOC))
    {
        $new_pic=new Picture($pic['path'], $pic['title'], $pic['caption']);
        $portfolio->save($new_pic);
    }
    return $portfolio;
    }
    else return null;
}
