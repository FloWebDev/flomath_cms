<?php

namespace App\Model;

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
    private $thread;
    private $post_id;


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
     * Get the value of thread
     */
    public function getThread()
    {
        return $this->thread;
    }

    /**
     * Set the value of thread
     *
     * @return  self
     */
    public function setThread($thread)
    {
        $this->thread = $thread;

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
