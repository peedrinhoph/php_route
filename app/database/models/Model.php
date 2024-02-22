<?php

namespace app\database\models;

use PDO;
use PDOException;
use app\library\Token;
use app\database\Transaction;

abstract class Model
{
  protected static string $table;
  protected array $attributes = [];

  public function __set(string $property, string $value)
  {
    $this->attributes[$property] = $value;
  }

  public function __get(string $property)
  {
    return $this->attributes[$property];
  }

  public static function all(string $fields = '*')
  {
    try {
      Transaction::open();

      $conn = Transaction::getConnection();
      $tableName = static::$table;
      self::tableExists($tableName, $conn);
      $query = $conn->prepare("select {$fields} from {$tableName}");
      $query->execute();
      $fetchAll = $query->fetchAll(\PDO::FETCH_ASSOC) ?? [];
      // return $query->fetchAll(PDO::FETCH_CLASS, static::class);
      Transaction::close();
      return  $fetchAll;
    } catch (PDOException $e) {
      Transaction::rollback();
    }
  }

  public static function tableExists(string $tableName, PDO $conn)
  {
    if ($conn->query("SHOW TABLES LIKE '$tableName'")->rowCount() > 0) {
      return true;
    } else throw new \Exception("Table or view {$tableName} not exist");
  }

  public static function where(string $field, string $value, string $fields = '*')
  {
    try {
      Transaction::open();

      $conn = Transaction::getConnection();
      $tableName = static::$table;
      
       self::tableExists($tableName, $conn);

      $query = $conn->prepare("select {$fields} from {$tableName} where {$field} = :{$field}");
      $query->execute([$field => $value]);

      // return $query->fetchObject(static::class);

      // if ($query->rowCount() > 0) {
        $fetchAll = $query->fetchAll(\PDO::FETCH_ASSOC) ?? ['s'];
        Transaction::close();
        return $fetchAll;
      // }

      // Transaction::close();
      // return [];
    } catch (PDOException $e) {
      Transaction::rollback();
    }
  }

  public static function find(int $value, string $fields = '*')
  {
    try {
      Transaction::open();

      $conn = Transaction::getConnection();
      $tableName = static::$table;
      self::tableExists($tableName, $conn);
      $query = $conn->prepare("select {$fields} from {$tableName} where id = ?");
      $query->execute([$value]);

      // return $query->fetchObject(static::class);

      // if ($query->rowCount() > 0) {
        $fetchAll = $query->fetchAll(\PDO::FETCH_ASSOC) ?? [];
        Transaction::close();
        return $fetchAll;
      // }

      // Transaction::close();
      // return [];
    } catch (PDOException $e) {
      var_dump($e->getMessage());
      Transaction::rollback();
    }
  }

  public static function create(array $data)
  {
    try {
      Transaction::open();

      $conn = Transaction::getConnection();
      $tableName = static::$table;
      self::tableExists($tableName, $conn);
      // $columns = array();
      // $values = array();

      // foreach ($data as $column => $value) {
      //   $columns[] = "`{$column}`";
      //   $values[] = "'{$value}'";
      // }

      // $fields = implode(",", $columns);
      // $into = implode(",", $values);

      $fields = "`" . implode("`,`", array_keys($data)) . "`";
      $into   = "'" . implode("','", array_values($data)) . "'";

      $query = $conn->prepare("insert into {$tableName} ({$fields}) values ({$into})");
      $query->execute();
      $lastId = Transaction::lastInsertId();

      Transaction::close();

      if ($lastId > 0) {
        return ['id' => $lastId];
      } else {
        return [];
      }
    } catch (PDOException $e) {
      var_dump($e->getMessage());
      Transaction::rollback();
    }
  }
}
