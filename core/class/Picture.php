<?php
class Picture{
    private $path;
    private $title;
    private $caption;


    public function __construct($path, $title=null, $caption=null)
    {
        $this->path=$path;
        $this->title=$title;
        $this->caption=$caption;
    }

    public function getPath(){
        return $this->path;
    }

    public function getTitle(){
        return $this->title;
    }

    public function getCaption(){
        return $this->caption;
    }
}