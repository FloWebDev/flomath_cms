<?php

namespace App\Model;

use ArrayObject;
use Core\SPDO;
use Core\CoreModel;

class Post extends CoreModel
{
    const TABLE_NAME = 'post';
    private $id;
    private $title;
    private $content;
    private $description;
    private $slug;
    private $meta_description;
    private $meta_keywords;
    private $created_at;
    private $is_published;
    private $user_id;


    /**
     * Retourne la liste des posts publiés
     */
    public function findAllPublished(): ?array
    {
        $sql = "SELECT * FROM " . self::TABLE_NAME . " WHERE is_published = 1 ORDER BY created_at DESC;";

        $pdoStatement = SPDO::getPDO()->query($sql);

        return $pdoStatement->fetchAll(\PDO::FETCH_CLASS, self::class);
    }

    /**
     * Retourne l'utilisateur
     *
     * @return User|null
     */
    public function getUser(): ?User
    {
        $inst = new User();
        return $inst->findById($this->user_id);
    }

    /**
     * Retourne une date de création formatée
     */
    public function getFormatedCreatedAt(): string
    {
        $date      = new \DateTime($this->created_at);
        return $date->format('d/m/Y à H\hi');
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
     * Get the value of title
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set the value of title
     *
     * @return  self
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get the value of content
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set the value of content
     *
     * @return  self
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get the value of description
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the value of description
     *
     * @return  self
     */
    public function setDescription($description)
    {
        $this->description = $description;

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

    /**
     * Get the value of meta_description
     */
    public function getMetaDescription()
    {
        return $this->meta_description;
    }

    /**
     * Set the value of meta_description
     *
     * @return  self
     */
    public function setMetaDescription($metaDescription)
    {
        $this->meta_description = $metaDescription;

        return $this;
    }

    /**
     * Get the value of meta_keywords
     */
    public function getMetaKeywords()
    {
        return $this->meta_keywords;
    }

    /**
     * Set the value of meta_keywords
     *
     * @return  self
     */
    public function setMetaKeywords($metaKeywords)
    {
        $this->meta_keywords = $metaKeywords;

        return $this;
    }

    /**
     * Get the value of created_at
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * Set the value of created_at
     *
     * @return  self
     */
    public function setCreatedAt($createdAt)
    {
        $this->created_at = $createdAt;

        return $this;
    }

    /**
     * Get the value of is_published
     */
    public function getIsPublished()
    {
        return $this->is_published;
    }

    /**
     * Set the value of is_published
     *
     * @return  self
     */
    public function setIsPublished($isPublished)
    {
        $this->is_published = $isPublished;

        return $this;
    }

    /**
     * Get the value of user_id
     */
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * Set the value of user_id
     *
     * @return  self
     */
    public function setUserId($user_id)
    {
        $this->user_id = $user_id;

        return $this;
    }
}
