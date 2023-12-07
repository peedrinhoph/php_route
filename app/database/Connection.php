<?php

namespace app\database;

use PDO;
use app\library\Config;

class Connection
{
    private static ?PDO $connection = null;

    public static function connect()
    {
        try {
            $ENV = Config::getEnv();

            if (!isset($ENV) || empty($ENV)) {
                throw new \Exception("Arquivo .env não encontrado.");
            }

            if (!self::$connection) {
                self::$connection = new PDO("mysql:host={$ENV['DB_HOST']};dbname={$ENV['DB_DATABASE']}", $ENV['DB_USERNAME'], $ENV['DB_PASSWORD'], [
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
                    PDO::ATTR_ERRMODE, 
                    PDO::ERRMODE_EXCEPTION
                ]);
            }

            return self::$connection;
        } catch (\PDOException $e) {
            throw new \Exception($e->getMessage());
        }
    }
}
