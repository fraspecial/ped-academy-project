<?php

class Post{
    private $title;
    private $content;
    private $creation_date;
    private $tags;

    public function __construct($title, $content, $creation_date=null, $tags)
    {
        $this->title=$title;
        $this->content=$content;
        $this->$creation_date=$creation_date;
        $this->tags=$tags;
    }
}

?>