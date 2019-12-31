<?php
class Portfolio implements ListInterface{
    private $pictures;
    public function __construct($pictures=[])
    {
        $this->pictures=$pictures;
    }

    public function save($picture){
        $this->pictures[]=$picture;
    }

    public function getLength(){
        return sizeof($this->pictures);
    }

    public function getPictures(){
        return $this->pictures;
    }
}
?>