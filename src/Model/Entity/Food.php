<?php

namespace src\Model\Entity;

class Food{

    private $id;

    private $name;

    /**
     * @brief Constructeur : Food
     * @param $id : L'identifiant de la Food.
     * @param $name : Le nom de la Food. 
     */
    public function __construct($id, $name){
        $this->id = $id;
        $this->name = $name;
    }

    /**
     * @brief Getter de l'identifiant.
     * @return $id : Renvoie l'identifiant.
     */
    public function getId(){
        return $this->$id;
    }

    /**
     * @brief Getter du nom.
     * @return $nom : Renvoie le nom.
     */
    public function getName(){
        return $this->$name;
    }
}

