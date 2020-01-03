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

    public function getLength()
    {
        return sizeof($this->tags);
    }
}
?>