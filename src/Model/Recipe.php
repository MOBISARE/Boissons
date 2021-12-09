<?php

namespace src\Model\Entity;

class Recipe{

    private $id;

    private $name;

    public function __constr($id, $name){
        $this->id = $id;
        $this->name = $name;
    }

    public function getId(){
        return $this->id;
    }

    public function getName(){
        return $this->name;
    }
}