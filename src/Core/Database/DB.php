<?php

namespace App\Core\Database;

use PDO;

/**
 * Singleton
 */
abstract class DB
{
    private static ?PDO $_instance = null;

    private static function getInstance(): PDO
    {
        if (self::$_instance === null) {
            try {
                self::$_instance
                    = new PDO('pgsql:host=postgres;dbname=postgres',
                    'postgres', 'secret');
            } catch (\PDOException $e) {
                die($e->getMessage());
            }
        }

        return self::$_instance;
    }

    public static function __callStatic(string $name, array $arguments)
    {
        return self::getInstance()->$name(...$arguments);
    }
}
