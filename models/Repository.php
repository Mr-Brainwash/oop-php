<?php

namespace app\models;

use app\engine\Db;

abstract class Repository
{
    abstract protected function getTableName();
    abstract protected function getEntityClass();

    public function insert(Entity $entity): Repository
    {
        $keys         = [];
        $params       = [];
        $paramsValues = [];

        foreach ($entity->props as $key => $value) {
            $keys[]    = '`' . $key. '`';
            $paramName = ':' . $key;
            $params[]  = $paramName;
            $paramsValues[$paramName] = $entity->$key;
        }

        $columns = implode(', ', $keys);
        $values  = implode(', ', $params);
        $tableName = $this->getTableName();

        $sql = "INSERT INTO {$tableName} ({$columns}) VALUES ({$values})";
        Db::getInstance()->execute($sql, $paramsValues);
        $entity->id = Db::getInstance()->lastInsertId();
        return $this;
    }

    public function delete(Entity $entity)
    {
        $tableName = $this->getTableName();
        $sql = "DELETE FROM {$tableName} WHERE id = :id";
        return Db::getInstance()->execute($sql, ['id' => $entity->id]);
    }

    public function update(Entity $entity): Repository
    {
        $params = [];
        $columns = [];

        foreach ($entity->props as $key => $value) {
            if(!$value) continue;
            $params["{$key}"] = $entity->$key;
            $columns[] .= "`{$key}` = :{$key}";
            $entity->props[$key] = false;
        }
        $columns = implode(", ", $columns);
        $tableName = $this->getTableName();
        $params['id'] = $entity->id;
        //UPDATE table_name SET column1=new_value WHERE condition;
        $sql = "UPDATE `{$tableName}` SET {$columns} WHERE `id` = :id";
        Db::getInstance()->execute($sql, $params);
        return $this;
    }

    public function save(Entity $entity): Repository
    {
        if(is_null($entity->id)){
            return $this->insert($entity);
        } else {
            return $this->update($entity);
        }

    }

    ///WHERE login = admin
    public function getOneWhere($name, $value)
    {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE `{$name}`=:value";
        return Db::getInstance()->queryOneObject($sql, ['value' => $value], $this->getEntityClass());
    }

    public function getCountWhere($name, $value)
    {
        $tableName = $this->getTableName();
        $sql = "SELECT COUNT(id) as count FROM {$tableName} WHERE `{$name}`=:value";
        return Db::getInstance()->queryOne($sql, ['value' => $value])['count'];
    }

    public function getOne($id)
    {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE id = :id";
        //return Db::getInstance()->queryOne($sql, ['id' => $id]);
        return Db::getInstance()->queryOneObject($sql, ['id' => $id], $this->getEntityClass());
    }

    public function getAll()
    {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName}";
        return Db::getInstance()->queryAll($sql);
    }

    public function getLimit($limit)
    {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName} LIMIT 0, ?";
        return Db::getInstance()->queryLimit($sql, $limit);
    }
}