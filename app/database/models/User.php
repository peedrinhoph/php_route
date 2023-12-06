<?php

namespace app\database\models;

use app\database\Transaction;

class User extends Model
{
    protected static string $table = 'users';

    // public static function all()
    // {
    //     try {
    //         self::open();

    //         $conn = self::getConnection();
    //         $tableName = static::$table;

    //         $query = $conn->prepare("select * from {$tableName}");
    //         $query->execute();

    //         // return $query->fetchAll(\PDO::FETCH_CLASS, static::class);
    //         return $query->fetchAll(\PDO::FETCH_ASSOC) ?? [];

    //         self::close();
    //     } catch (\PDOException $e) {
    //         self::rollback();
    //         throw new \Exception($e);
    //     }
    // }

    // public static function find(int $id)
    // {
    //     try {
    //         self::open();

    //         $conn = self::getConnection();
    //         $tableName = static::$table;

    //         $query = $conn->prepare("select * from {$tableName} where id = ?");
    //         $query->execute([$id]);

    //         if ($query->rowCount() > 0) {
    //             return $query->fetchAll(\PDO::FETCH_ASSOC);
    //         }

    //         return [];

    //         self::close();
    //     } catch (\PDOException $e) {
    //         self::rollback();
    //         throw new \Exception($e->getMessage());
    //     }
    // }
}
