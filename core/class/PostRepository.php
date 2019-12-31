<?php

class PostRepository implements ListInterface{
    private $posts;

    public function __construct($posts=[])
    {
        $this->posts=$posts;
    }

    public function save($post){
        $this->posts[]=$post;
    }

    public function getLength()
    {
        return sizeof($this->posts);
    }

    public function getPosts(){
        return $this->posts;
    }
}
?>