<?php

namespace app\models;

use app\engine\Db;
use app\interfaces\IModel;

abstract class Model implements IModel
{

    public function __set($name, $value){
        $this->$name = $value;
    }

    public function __get($name){
        return $this->$name;
    }

    abstract public function getTableName();

    public function insert()
    {
        $keys = [];
        $params = [];
        $paramsValues = [];

        foreach ($this as $key => $value) {
            if($key == 'id') continue;
            $keys[] = '`' . $key. '`';
            $paramName = ':' . $key;
            $params[] = $paramName;
            $paramsValues[$paramName] = $value;
        }
        $columns = implode(', ', $keys);
        $values = implode(', ', $params);
        $tableName = $this->getTableName();

        if($tableName == 'products'){
            $sql = "INSERT INTO {$tableName} ({$columns}) VALUES ({$values})";
            Db::getInstance()->execute($sql, $paramsValues);
            $this->id = DB::getInstance()->lastInsertId();
        }
    }
    public function delete()
    {
        $id = $this->id;
        $tableName = $this->getTableName();
        $sql = "DELETE FROM {$tableName} WHERE id = :id)";
        DB::getInstance()->execute($sql, ['id' => $id]);
        $this->id = DB::getInstance()->lastInsertId();
    }
    public function getOne($id)
    {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE id = :id";
        return DB::getInstance()->queryOne($sql, ['id' => $id]);
    }

    public function getAll()
    {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName}";
        return DB::getInstance()->queryAll($sql);
    }
}