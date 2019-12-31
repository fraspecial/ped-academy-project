<?php

class Post{
    private $title;
    private $content;
    private $creation_date;
    private $tags;

    public function __construct($title, $content, $creation_date)
    {
        $this->title=$title;
        $this->content=$content;
        $this->creation_date=$creation_date;
    }

    public function getTitle(){
        return $this->title;
    }

    public function getContent(){
        return $this->content;
    }

    public function getCreationDate(){
        return $this->creation_date;
    }

    public function getTags(){
        return $this->tags;
    }

    public function setTags($tags){
        $this->tags=$tags;
    }
}

?>