<?php


function insertPost(){
    $pdo=connect();
    $user_id=getUser();
    $statement=$pdo->prepare("INSERT into post (title, content, user_id) values (:title, :content, $user_id)");
    $statement->bindParam(':title', $_POST['title']);
    $statement->bindParam(':content', $_POST['content']);
    $statement->execute();
    $post_id=$pdo->lastInsertId();
    if(isset($_POST['tags'])) {
        print_r('Inserisco tags');
        insertTags($post_id);
    }
}

function insertTags($post_id){
    $pdo=connect();
    $statement=$pdo->prepare("SELECT id from tag where title=:title");
    $tags=explode(' ', str_replace(',', '', $_POST['tags']));
    foreach($tags as $tag){
        $statement->bindParam(':title', $tag);
        $statement->execute();
        $items=$statement->fetchAll(PDO::FETCH_ASSOC);
        if(sizeof($items)==1)
            $tag_id=$items[0]['id'];
        else{
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
        $rows=$pdo->query("SELECT post.id, post.title, post.content, post.creation_date FROM `user` join post on post.user_id=`user`.id where username='" . $_SESSION['loggedUser'] . "'");
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