<?php
namespace Core;

use Core\SPDO;
use DateTime;

abstract class CoreModel
{
    public static function findAll()
    {
        $sql = "SELECT * FROM " . static::TABLE_NAME . ";";

        $pdoStatement = SPDO::getPDO()->query($sql);

        return $pdoStatement->fetchAll(\PDO::FETCH_CLASS, static::class);
    }

    public static function findById($id)
    {
        $sql = "SELECT * FROM " . static::TABLE_NAME . " WHERE id = :id;";

        $pdoStatement = SPDO::getPDO()->prepare($sql);

        $pdoStatement->bindValue(':id', $id, \PDO::PARAM_INT);

        $pdoStatement->execute();

        return $pdoStatement->fetchObject(static::class);
    }

    public function getFormattedDate(string $date): string
    {
        $date = new DateTime($date);
        return $date->format(FORMAT_DATE_GET);
    }

    public function findByIdAndSlug(int $id, string $slug)
    {
        $sql = "SELECT * FROM " . static::TABLE_NAME . " WHERE id = :id AND slug = :slug;";

        $pdoStatement = SPDO::getPDO()->prepare($sql);

        $pdoStatement->bindValue(':id', $id, \PDO::PARAM_INT);
        $pdoStatement->bindValue(':slug', $slug, \PDO::PARAM_STR);

        $pdoStatement->execute();

        return $pdoStatement->fetchObject(static::class);
    }
}
