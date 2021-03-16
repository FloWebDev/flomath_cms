<?php

namespace App\Model;

use Core\SPDO;
use Core\CoreModel;

class Category extends CoreModel
{
    const TABLE_NAME = 'category';
    private $id;
    private $name;
    private $slug;

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
     * Returns all publlished posts for a category id
     */
    public function findAllPublishedPosts(int $limit = 100, int $offset = 0, string $order = 'ASC'): ?array
    {
        $order = $order === 'ASC' ? $order : 'DESC';

        $sql = "SELECT post.* FROM " . self::TABLE_NAME . " 
        JOIN post_category ON category.id = post_category.category_id
        JOIN post ON post_category.post_id = post.id
        WHERE post.is_published = 1 AND category.id = " . $this->id . " 
        ORDER BY created_at $order LIMIT $limit OFFSET $offset;";

        $pdoStatement = SPDO::getPDO()->query($sql);

        return $pdoStatement->fetchAll(\PDO::FETCH_CLASS, __NAMESPACE__ . '\Post');
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

    /**
     * Get the value of slug
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Set the value of slug
     *
     * @return  self
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;

        return $this;
    }
}
