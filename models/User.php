<?php

namespace app\models;

class User extends Model
{
    public $id;
    public $name;
    public $login;
    public $password;

    public function __construct($name = null, $login = null, $password = null)
    {
        $this->name = $name;
        $this->login = $login;
        $this->password = $password;
    }


    public function getTableName(): string
    {
        return 'users';
    }
}