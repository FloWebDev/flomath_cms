<?php

namespace App\Model;

use Core\SPDO;
use App\Model\Post;
use Core\CoreModel;

class Comment extends CoreModel
{
    const TABLE_NAME = 'comment';
    private $id;
    private $username;
    private $email;
    private $content;
    private $created_at;
    private $post_id;

    public function getCommentsById(int $id)
    {
        $sql = "SELECT * FROM " . self::TABLE_NAME . " WHERE post_id = :post_id
        ORDER BY created_at DESC";
    
        $pdoStatement = SPDO::getPDO()->prepare($sql);
        $pdoStatement->bindValue(':post_id', $id, \PDO::PARAM_INT);
        $pdoStatement->execute();

        return $pdoStatement->fetchAll(\PDO::FETCH_CLASS, static::class);
    }

    public function save()
    {
        if (is_null($this->id)) {
            $sql = "INSERT INTO " . self::TABLE_NAME . " (username, email, content, created_at, post_id) 
            VALUES (:username, :email, :content, :created_at, :post_id)";
            // Valeurs par défaut
            $date               = new \DateTime();
            $this->created_at   = $date->format('Y-m-d H:i:s.u');
        } else {
            $sql = "UPDATE " . self::TABLE_NAME . " SET username = :username, email= :email, content = :content, created_at = :created_at, post_id = :post_id 
            WHERE id = " . $this->id;
        }

        $pdoStatement =SPDO::getPDO()->prepare($sql);
        $pdoStatement->bindValue(':username', htmlspecialchars($this->getUsername()), \PDO::PARAM_STR);
        $pdoStatement->bindValue(':email', htmlspecialchars($this->getEmail()), \PDO::PARAM_STR);
        $pdoStatement->bindValue(':content', htmlspecialchars($this->getContent()), \PDO::PARAM_STR);
        $pdoStatement->bindValue(':created_at', htmlspecialchars($this->getCreatedAt()), \PDO::PARAM_STR);
        $pdoStatement->bindValue(':post_id', intval($this->getPostId()), \PDO::PARAM_INT);
        $pdoStatement->execute();

        return $this;
    }

    /**
     * Retourne le post associé
     *
     * @return Post|null
     */
    public function getPost(): ?Post
    {
        $inst = new Post();
        return $inst->findById($this->post_id);
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
     * Get the value of username
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set the value of username
     *
     * @return  self
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get the value of email
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */
    public function setEmail($email)
    {
        $this->email = $email;

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
     * Get the value of post_id
     */
    public function getPostId()
    {
        return $this->post_id;
    }

    /**
     * Set the value of post_id
     *
     * @return  self
     */
    public function setPostId($postId)
    {
        $this->post_id = $postId;

        return $this;
    }
}
