<?php
class LanguageList implements ListInterface{
    private $languages;
    public function __construct($languages=[])
    {
        $this->languages=$languages;
    }

    public function save($language){
        $this->languages[]=$language;
    }

    public function getLength(){
        return sizeof($this->languages);
    }

    public function getLanguages(){
        return $this->languages;
    }
}
?>