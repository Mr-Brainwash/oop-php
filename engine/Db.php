<?php

namespace app\engine;

use app\traits\TSingletone;
use \PDO;

class Db
{
    use TSingletone;
    private $config = [
        'driver'   => 'mysql',
        'host'     => 'localhost',
        'login'    => 'admin',
        'password' => '43118',
        'database' => 'oop-php',
        'charset'  => 'utf8'
    ];

    private $connection = null;

    private function getConnection(): PDO
    {
        if(is_null($this->connection)){
            $this->connection = new PDO($this->prepareDsnString(),
                $this->config['login'],
                $this->config['password']);
            $this->connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        }
        return $this->connection;
    }

    public function lastInsertId(): string
    {
        return $this->getConnection()->lastInsertId();
    }

    private function prepareDsnString(): string
    {
        return sprintf('%s:host=%s;dbname=%s;charset=%s',
        $this->config['driver'],
        $this->config['host'],
        $this->config['database'],
        $this->config['charset']
        );
    }

    private function query($sql, $params)
    {
        $STH = $this->getConnection()->prepare($sql);
        $STH->execute($params);
        return $STH;
    }

    public function queryLimit($sql, $limit)
    {
        $STH = $this->getConnection()->prepare($sql);
        $STH->bindValue(1, $limit, PDO::PARAM_INT);
        $STH->execute();
        return $STH;
    }
    //WHERE id = 1
    public function queryOne($sql, $params = [])
    {
        return $this->query($sql, $params)->fetch();
    }

    public function queryOneObject($sql, $params, $class)
    {
        $STH =  $this->query($sql, $params);
        $STH->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, $class);
        return $STH->fetch();
    }
    //SELECT all
    public function queryAll($sql, $params = []): array
    {
        return $this->query($sql, $params)->fetchAll();
    }

    public function execute($sql, $params = []): int
    {
        return $this->query($sql, $params)->rowCount();
    }

}