<?php

namespace App\Model;

use Core\SPDO;
use Core\CoreModel;

class Category extends CoreModel
{
    const TABLE_NAME = 'category';
    private $id;
    private $name;

    public function findAllByPostId(int $id)
    {
        $sql          = "SELECT category.* FROM " . self::TABLE_NAME . "
            LEFT JOIN post_category ON category.id = post_category.category_id
            WHERE post_category.post_id = :id";
        
        $pdoStatement = SPDO::getPDO()->prepare($sql);
        $pdoStatement->bindValue(':id', $id, \PDO::PARAM_INT);
        $pdoStatement->execute();

        return $pdoStatement->fetchAll(\PDO::FETCH_CLASS, static::class);
    }

    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }
}
