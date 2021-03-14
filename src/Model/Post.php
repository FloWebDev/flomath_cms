<?php

namespace App\Model;

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
    private $nb_views;
    private $user_id;
    
    public function findByIdAndSlug(int $id, string $slug): Post | bool
    {
        $sql = "SELECT * FROM " . self::TABLE_NAME . " WHERE id = :id AND slug = :slug;";

        $pdoStatement = SPDO::getPDO()->prepare($sql);

        $pdoStatement->bindValue(':id', $id, \PDO::PARAM_INT);
        $pdoStatement->bindValue(':slug', $slug, \PDO::PARAM_STR);

        $pdoStatement->execute();

        return $pdoStatement->fetchObject(static::class);
    }

    public function save()
    {
        if (is_null($this->id)) {
            $sql = "INSERT INTO " . self::TABLE_NAME . " (title, content, description, slug, meta_description, meta_keywords, created_at, is_published, nb_views, user_id) 
            VALUES (:title, :content, :description, :slug, :meta_description, :meta_keywords, :created_at, :is_published, :nb_views, :user_id)";
            // Valeurs par défaut
            $date               = new \DateTime();
            $this->created_at   = $date->format('Y-m-d H:i:s.u');
            $this->nb_views     = 0;
        } else {
            $sql = "UPDATE " . self::TABLE_NAME . " SET title = :title, content= :content, description = :description, slug = :slug, meta_description = :meta_description, meta_keywords = :meta_keywords,
             created_at = :created_at, is_published = :is_published, nb_views = :nb_views, user_id = :user_id WHERE id = " . $this->id;
        }

        $pdoStatement = SPDO::getPDO()->prepare($sql);
        $pdoStatement->bindValue(':title', $this->title, \PDO::PARAM_STR);
        $pdoStatement->bindValue(':content', $this->content, \PDO::PARAM_STR);
        $pdoStatement->bindValue(':description', $this->description, \PDO::PARAM_STR);
        $pdoStatement->bindValue(':slug', $this->slug, \PDO::PARAM_STR);
        $pdoStatement->bindValue(':meta_description', $this->meta_description, \PDO::PARAM_STR);
        $pdoStatement->bindValue(':meta_keywords', $this->meta_keywords, \PDO::PARAM_STR);
        $pdoStatement->bindValue(':created_at', $this->created_at, \PDO::PARAM_STR);
        $pdoStatement->bindValue(':is_published', $this->is_published, \PDO::PARAM_INT);
        $pdoStatement->bindValue(':nb_views', $this->nb_views, \PDO::PARAM_INT);
        $pdoStatement->bindValue(':user_id', $this->user_id, \PDO::PARAM_INT);
        $pdoStatement->execute();

        return $this;
    }

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
     * Retourne le nombre de commentaires pour un post
     */
    public function getCommentsCount()
    {
        $sql = "SELECT count(id) as nb FROM comment WHERE post_id = " . $this->id;

        $pdoStatement = SPDO::getPDO()->query($sql);

        return $pdoStatement->fetch(\PDO::FETCH_ASSOC)['nb'];
    }

    public function getComments()
    {
        $inst = new Comment();
        return $inst->getCommentsById($this->id);
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
     * Retourne la liste des catégories associées à un post
     */
    public function getCategories()
    {
        $inst = new Category();
        return $inst->findAllByPostId($this->id);
    }

    /**
     * Retourne la liste des tags associées à un post
     */
    public function getTags()
    {
        $inst = new Tag();
        return $inst->findAllByPostId($this->id);
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
    public function setIsPublished(int $isPublished)
    {
        $isPublished = $isPublished === 1 ? $isPublished : 0;
        
        $this->is_published = $isPublished;

        return $this;
    }


    /**
     * Get the value of nb_views
     */
    public function getNbViews()
    {
        return $this->nb_views;
    }

    /**
     * Set the value of nb_views
     *
     * @return  self
     */
    public function setNbViews(int $nbViews)
    {
        $this->nb_views = $nbViews;

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
