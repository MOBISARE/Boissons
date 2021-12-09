<?php

namespace src\Model\Entity;

class Recipe{

    private $id;

    private $title;

    private $preparation;

    public function __constr($id, $title, $preparation){
        $this->id = $id;
        $this->title = $title;
        $this->preparation = $preparation;
    }

    public function getId(){
        return $this->id;
    }

    public function getTitle(){
        return $this->title;
    }

    public function getPreparation(){
        return $this->preparation;
    }
}