<?php

namespace App\Model;

use Core\SPDO;
use Core\CoreModel;

class Tag extends CoreModel
{
    const TABLE_NAME = 'tag';
    private $id;
    private $name;

    public function findAllByPostId(int $id)
    {
        $sql          = "SELECT tag.* FROM " . self::TABLE_NAME . "
            LEFT JOIN post_tag ON tag.id = post_tag.tag_id
            WHERE post_tag.post_id = :id";
        
        $pdoStatement = SPDO::getPDO()->prepare($sql);
        $pdoStatement->bindValue(':id', $id, \PDO::PARAM_INT);
        $pdoStatement->execute();

        return $pdoStatement->fetchAll(\PDO::FETCH_CLASS, static::class);
    }
    
    // Getters / Setters
    
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
