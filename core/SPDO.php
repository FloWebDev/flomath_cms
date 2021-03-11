<?php

namespace Core;

/**
 * Singleton PHP Data Objects
 */
class SPDO
{
    private static $_pdo;
    private function __construct()
    {
        try {
            self::$_pdo = new \PDO('sqlite:' . __DIR__ .'/../var/data.db', null, null, [
                \PDO::ATTR_ERRMODE            => MODE === 'dev' ? \PDO::ERRMODE_WARNING : \PDO::ERRMODE_SILENT,
                \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC
    
            ]);
            self::$_pdo->exec('PRAGMA foreign_keys = ON;');
        } catch (\PDOException $e) {
            if (MODE === 'dev') {
                echo '<pre>';
                echo $e->getMessage();
                echo '</pre>';
            }
            Logger::error($e->getMessage());
            Logger::error($e->getTraceAsString());
        }
    }
    public static function getPDO()
    {
        if (is_null(self::$_pdo)) {
            new self();
        }
        return self::$_pdo;
    }
}
