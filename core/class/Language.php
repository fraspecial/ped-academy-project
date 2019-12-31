<?php
class Language{
    private $name;
    private $listening;
    private $reading;
    private $writing;
    private $speaking;

    public function __construct($name, $listening=null, $reading=null, $writing=null, $speaking=null)
    {
        $this->name=$name;
        $this->listening=$listening;
        $this->reading=$reading;
        $this->writing=$writing;
        $this->speaking=$speaking;
    }

    public function getName(){
        return $this->name;
    }

    public function getListening(){
        return $this->listening;
    }

    public function getReading(){
        return $this->reading;
    }

    public function getWriting(){
        return $this->writing;
    }

    public function getSpeaking(){
        return $this->speaking;
    }
}
?>