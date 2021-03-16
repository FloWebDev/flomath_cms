<?php

namespace App\Model;

use Core\SPDO;
use Core\CoreModel;

class User extends CoreModel
{
    const TABLE_NAME = 'app_user';
    private $id;
    private $username;
    private $email;
    private $password;
    private $bio;
    private $role_id;

    /**
     * Enables to get user by his username
     */
    public function findByUsername(string $username)
    {
        $sql = "SELECT * FROM " . self::TABLE_NAME . " WHERE username = :username;";
    
        $pdoStatement = SPDO::getPDO()->prepare($sql);
    
        $pdoStatement->bindValue(':username', $username, \PDO::PARAM_STR);
    
        $pdoStatement->execute();
    
        return $pdoStatement->fetchObject(static::class);
    }

    /**
     * Enables to get role of user
     */
    public function getRole(): Role
    {
        $sql = "SELECT * FROM role WHERE id = " . $this->role_id;
    
        $pdoStatement = SPDO::getPDO()->query($sql);
    
        return $pdoStatement->fetchObject(__NAMESPACE__ . '\Role');
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
    public function setLogin($username)
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
     * Get the value of password
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @return  self
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get the value of bio
     */
    public function getBio()
    {
        return $this->bio;
    }

    /**
     * Set the value of bio
     *
     * @return  self
     */
    public function setBio($bio)
    {
        $this->bio = $bio;

        return $this;
    }

    /**
     * Get the value of role_id
     */
    public function getRoleId()
    {
        return $this->role_id;
    }

    /**
     * Set the value of role_id
     *
     * @return  self
     */
    public function setRoleId($role_id)
    {
        $this->role_id = $role_id;

        return $this;
    }
}
