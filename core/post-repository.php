<?php
define('FILENAME', __DIR__ . DIRECTORY_SEPARATOR.'posts.json');

function insertPost(){
        $pdo=new PDO('mysql:host=localhost;dbname=blog');
        $row=$pdo->query("SELECT id from `user` WHERE email={$_SESSION['loggedUser']}");
        $user_id=$row->fetch(PDO::FETCH_ASSOC);
        $user_id=$user_id["user_id"];
        $statement=$pdo->prepare("INSERT into post (title, content, user_id) values (:title, :content, $user_id)");
        $statement->bindParam(':title', $_POST['title']);
        $statement->bindParam(':content', $_POST['content']);
        $statement->execute();
        $post_id=$pdo->lastInsertId();
        $statement=$pdo->prepare("INSERT into tag (title) values (:title)");
        $tags=explode(' ', str_replace(',', '', $_POST['tags']));
        foreach($tags as $tag){
            $statement->bindParam(':title', $tag);
            $statement->execute();
            $tag_id=$pdo->lastInsertId();
            $pdo->query("INSERT into post_tag (post_id, tag_id) values ($post_id, $tag_id)");
        }
}

function createTags(){
    $tags=[];
    foreach($_POST['tags'] as $tag)
    $tags[]=new Tag($tag['title']);
}

function getAllPosts($query=null){
    $pdo=new PDO('mysql:host=localhost;dbname=blog');
    $posts=$pdo->query("SELECT post.id, post.title, post.content, post.creation_date FROM `user` join post on post.user_id=`user`.id where email={$_SESSION['loggedUser']}");
    $posts=$posts->fetchAll(PDO::FETCH_ASSOC);
    //foreach ($posts as $post)
    
}

if(isset($_POST['title']) && isset($_POST['content']))
    if(isset($_POST['tags']))
    createTags();
?>