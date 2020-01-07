<?php

function deleteTagsFromPost($user_id, $creation_date){
    
    $pdo=connect();
    $row=$pdo->query("SELECT id from post where `user_id`=$user_id and creation_date='".$creation_date."'");
    $res=$row->fetch();
    $id=$res[0];
    $rows=$pdo->query("SELECT t.title from post_tag pt join tag t on t.id=pt.tag_id where pt.post_id=".$id);
    $tags=$rows->fetchAll(PDO::FETCH_ASSOC);
    foreach($tags as $tag=>$title){
        $title=$title['title'];
        $row=$pdo->query("SELECT count(*) from post_tag pt join tag t on t.id=pt.tag_id where t.title='".$title."'");
        $result=$row->fetch();
        
        if($result[0]==1)
            $pdo->exec("DELETE from tag where title='".$title."'");
    }
    $pdo->exec("DELETE from post_tag where post_id=$id");

    return (int)$id;
}

function editPost($user_id){
    $pdo=connect();
    $statement=$pdo->prepare("UPDATE post set title=:title, content=:content where `user_id` = $user_id and creation_date=:creation_date");
    $statement->bindParam(':title', $_POST['title']);
    $statement->bindParam(':content', $_POST['content']);
    $statement->bindParam(':creation_date', $_POST['creation_date']);
    $statement->execute();
    if(isset($_POST['tags'])){
        $post_id=deleteTagsFromPost($user_id, $_POST['creation_date']);
        insertTags($post_id);
    }
}

function insertPost($user_id){
    $pdo=connect();
    $statement=$pdo->prepare("INSERT into post (title, content, user_id) values (:title, :content, $user_id)");
    $statement->bindParam(':title', $_POST['title']);
    $statement->bindParam(':content', $_POST['content']);
    $statement->execute();
    $post_id=$pdo->lastInsertId();
    
    if(isset($_POST['tags']))
        insertTags((int)$post_id);
}

function insertTags($post_id){
    
    $tags=explode('#', str_replace(' ','', $_POST['tags']));
    array_shift($tags);

    $pdo=connect();
    $statement=$pdo->prepare("SELECT id from tag where title=:title");    
    
    foreach($tags as $tag){
        $statement->bindParam(':title', $tag);
        $statement->execute();
        
        if($item=$statement->fetch(PDO::FETCH_ASSOC))
        $tag_id=$item['id']; 
        else {
        $statement=$pdo->prepare("INSERT into tag (title) values (:title)");
        $statement->bindParam(':title', $tag);
        $statement->execute();
        $tag_id=$pdo->lastInsertId();
        }
        $pdo->exec("INSERT into post_tag (post_id, tag_id) values ($post_id, $tag_id)");
    }
}

function getAllPosts(){
    if(isLogged()){
        $pdo=connect();
        $rows=$pdo->query("SELECT post.id, post.title, post.content, post.creation_date FROM `user` join post on post.user_id=`user`.id where username='" . $_SESSION['loggedUser'] . "' order by creation_date DESC");
        if($rows){
            $posts=$rows->fetchAll(PDO::FETCH_ASSOC);
            $post_repository=new PostRepository();
            foreach ($posts as $post){
                $loaded_post=new Post($post['title'], $post['content'], $post['creation_date']);
                $rows=$pdo->query("SELECT t.title from tag t join post_tag pt on t.id=pt.tag_id where pt.post_id=". $post['id']);
                if($rows){
                    $tagList=new TagList();
                    $tags=$rows->fetchAll(PDO::FETCH_ASSOC);
                    foreach($tags as $tag){
                        $loaded_tag=new tag($tag['title']);
                        $tagList->save($loaded_tag);
                    }
                        $loaded_post->setTagList($tagList);
                }
                $post_repository->save($loaded_post);
            }
            return $post_repository;
        }
    }
}
?>