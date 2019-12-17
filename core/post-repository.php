<?php

function getUser(){
    $pdo=connect();
    $row=$pdo->query("SELECT id from `user` WHERE email={$_SESSION['loggedUser']}");
    $user_id=$row->fetch(PDO::FETCH_ASSOC);
    $user_id=$user_id["user_id"];
    return $user_id;
}

function insertPost(){
    $pdo=connect();
    $statement=$pdo->prepare("INSERT into post (title, content, user_id) values (:title, :content, {getUser()})");
    $statement->bindParam(':title', $_POST['title']);
    $statement->bindParam(':content', $_POST['content']);
    $statement->execute();
    $post_id=$pdo->lastInsertId();
    if(isset($_POST['tags']))
        insertTags($post_id);
}

function insertTags($post_id){
    $pdo=connect();
    $statement=$pdo->prepare("INSERT into tag (title) values (:title)");
    foreach($_POST['tags'] as $tag){
        $statement->bindParam(':title', $tag);
        $statement->execute();
        $tag_id=$pdo->lastInsertId();
        $pdo->exec("INSERT into post_tag (post_id, tag_id) values ($post_id, $tag_id)");
    }
}

function getAllPosts(){
    if(isLogged()){
        $pdo=connect();
        $rows=$pdo->query("SELECT post.id, title, content, creation_date FROM `user` join post on post.user_id=`user`.id where email={$_SESSION['loggedUser']}");
        $posts=$rows->fetchAll(PDO::FETCH_ASSOC);
        $loaded_posts=[];
        foreach ($posts as $post){
            $loaded_post=new Post($post['title'], $post['content'], $post['creation_date']);
            $tags=$pdo->query("SELECT title from tags t join post_tag pt on t.id=pt.tag_id where pt.post_id={$_POST['post.id']}");
            $tags->fetchAll(PDO::FETCH_ASSOC);
            foreach($tags as $tag)
                $loaded_post->setTag($tag['title']);
            $loaded_posts[]=$loaded_post;
        }
        return $loaded_posts;
    }
}

if(isset($_POST['title']) && isset($_POST['content']))
    insertPost();
?>