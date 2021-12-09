<?php

namespace src\Model\Entity;

class Recipe{

    private $id;

    private $title;

    private $preparation;

    /**
     * @brief Constructeur : Recipe
     * @param $id : L'identifiant de la Recipe.
     * @param $title : Le titre de la Recipe.
     * @param $preparation : La préparation de la Recipe. 
     */
    public function __constr($id, $title, $preparation){
        $this->id = $id;
        $this->title = $title;
        $this->preparation = $preparation;
    }

    /**
     * @brief Getter de l'identifiant.
     * @return $id : Renvoie l'identifiant.
     */
    public function getId(){
        return $this->id;
    }

    /**
     * @brief Getter du titre.
     * @return $title : Renvoie le titre.
     */
    public function getTitle(){
        return $this->title;
    }

    /**
     * @brief Getter de la préparation.
     * @return $preparation : Renvoie la préparation.
     */
    public function getPreparation(){
        return $this->preparation;
    }
}