<?php

class TagList implements ListInterface{
    private $tags;

    public function __construct($tags=[])
    {
        $this->tags=$tags;
    }

    public function save($tag){
        $this->tags[]=$tag;
    }

    public function getTags(){
        return $this->tags;
    }

    public function getLength()
    {
        return sizeof($this->tags);
    }
}
?>