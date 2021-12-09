<?php

namespace src\Model\Repository;

use src\Model\Entity\Food;
use \PDO;

class FoodDAO{

    private $db;

    public function __constr($db){
        $this->db = $db;
    }

    public function selectIdByName($name){
        $query = "SELECT id FROM food WHERE name = :name";
        $params = array(":name" => $name);
        $statement = $this->db->execute($query, $params);
        return (int) $statement->fetch(PDO::FETCH_COLUMN, 0);
    }

    public function selectRootCategories(){
        $query ="
            SELECT id, name
            FROM food
            WHERE id NOT IN (
                SELECT parent_id
                FROM food_super_category
            );
            ";
        $statement = $this->db->execute($query);
        return $statement->fetchAll(PDO::HETCH_FUNC, "self::mapToEntity");
    }

    public function selectSubCategoriesByParentId($parentId){
        $query = "
        SELECT id, name
        FROM food
        WHERE id IN (
            SELECT child_id
            FROM food_sub_category
            WHERE parent_id = :parentId
        );
        ";

        $params = array(":parentId" => $parentId);
        $statement = $this->db->execute($query, $params);
        return $statement->fetchAll(PDO::FETCH_FUNC, "self::mapToEntity");
    }

    public function selectSuperCategoriesByParentId($parentId){
        $query = "
        SELECT id, name
        FROM food
        WHERE id IN (
            SELECT child_id
            FROM food_super_category
            WHERE parent_id = :parentId
        );
        ";
        $params = array(":parentId" => $parentId);
        $statement = $this->db->execute($query, $params);
        return $statement->fetchAll(PDO::FETCH_FUNC, "self::mapToEntity");
    }

    public function countByName($name){
        $query = "
        SELECT COUNT(id)
        FROM food
        WHERE name = :name";
        $params = array(":name" => $name);
        $statement = $this->db->execute($query, $params);
        return (int) $statement->fetch(PDO::FETCH_COLUMN, 0);
    }

    public function insert($food){
        $query = "INSERT INTO food(id, name) VALUES (:id, :name);";
        $params = array(
            ":id" => $food->getId(),
            ":name" =>$food->getName()
        );
        $this->db->execute($query, $params);
    }

    public function insertWithSubCategoriy($parentId, $childId){
        $query = "INSERT INTO food_sub_category(parent_id, child_id) VALUES (:parentId, :childId);";
        $params = array(
            ":parentId" => $parentId,
            ":childId" => $childId
        );
        $this->db->execute($query, $params);
    }

    public function insertWithSuperCategoriy($parentId, $childId){
        $query = "INSERT INTO food_super_category(parent_id, child_id) VALUES (:parentId, :childId);";
        $params = array(
            ":parentId" => $parentId,
            ":childId" => $childId
        );
        $this->db->execute($query, $params);
    }

    private static function mapToEntity($id, $name){
        return new Food($id, $name);
    }

}