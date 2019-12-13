<?php
define('FILENAME', __DIR__ . DIRECTORY_SEPARATOR.'posts.json');

function write_File(){
    $post=[
        'title'=>$_POST['title'],
        'content'=>$_POST['content'],
        'tags'=> explode(' ', str_replace(',', '', $_POST['tags']))
    ];

    $dataArray=getAllPosts();
    $dataArray[]=$post;
    file_put_contents(FILENAME, json_encode($dataArray));
}

function getAllPosts($query=null){
    $postsList = json_decode(file_get_contents(FILENAME));
    if($query==null)
    return $postsList;

    $postsToReturn=[];
    foreach($postsList as $post){
        foreach($post->tags as $tag)
        if($tag == $query)
        $postsToReturn[]=$post;
    }
    return $postsToReturn;
}

if(isset($_POST['title']) && isset($_POST['content'])){
write_File();
}

?>