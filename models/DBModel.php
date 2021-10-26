<?php

namespace app\models;

use app\engine\Db;

abstract class DBModel extends Model
{
    abstract protected static function getTableName();

    public function insert()
    {
        $keys         = [];
        $params       = [];
        $paramsValues = [];

        foreach ($this as $key => $value) {
            if($key == 'id') continue;
            $keys[]    = '`' . $key. '`';
            $paramName = ':' . $key;
            $params[]  = $paramName;
            $paramsValues[$paramName] = $value;
        }

        $columns = implode(', ', $keys);
        $values  = implode(', ', $params);
        $tableName = static::getTableName();

        $sql = "INSERT INTO {$tableName} ({$columns}) VALUES ({$values})";
        Db::getInstance()->execute($sql, $paramsValues);
        $this->id = Db::getInstance()->lastInsertId();
    }

    public function delete()
    {
        $tableName = static::getTableName();
        $sql = "DELETE FROM {$tableName} WHERE id = :id";
        return Db::getInstance()->execute($sql, ['id' => $this->id]);
    }

    public function update()
    {
        //UPDATE table_name SET column1=new_value, column2=new_value WHERE condition;
    }

    public static function getOne($id)
    {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE id = :id";
        //return Db::getInstance()->queryOne($sql, ['id' => $id]);
        return Db::getInstance()->queryOneObject($sql, ['id' => $id], get_called_class());
    }

    public static function getAll()
    {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM {$tableName}";
        return Db::getInstance()->queryAll($sql);
    }

    public static function getLimit($limit)
    {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM {$tableName} LIMIT 0, ?";
        return Db::getInstance()->queryLimit($sql, $limit);
    }
}