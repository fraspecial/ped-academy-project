<?php

class User {
    private $name;
    private $surname;
    private $propic;
    private $about;
    private $languages;
    private $portfolio;

    public function __construct($name, $surname, $propic=null, $about=null, $languages, $portfolio)
    {
        $this->name=$name;
        $this->surname=$surname;
        $this->propic=$propic;
        $this->about=$about;
        $this->languages=$languages;
        $this->portfolio=$portfolio;
    }

    public function getName(){
        return $this->name;
    }

    public function getSurname(){
        return $this->surname;
    }

    public function getPropic(){
        return $this->propic;
    }

    public function getBio(){
        return $this->about;
    }

    public function getLanguageList(){
        return $this->languages;
    }

    public function getPortfolio(){
        return $this->portfolio;
    }
}

?>