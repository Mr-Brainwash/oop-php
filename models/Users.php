<?php

namespace app\models;

use app\engine\Session;

class Users extends DBModel
{
    protected $id;
    //protected $name;
    protected $login;
    protected $password;

    protected $props = [
        'login' => false,
        'password' => false
    ];

    public function __construct(/*$name = null,*/ $login = null, $password = null)
    {
        //$this->name = $name;
        $this->login = $login;
        $this->password = $password;
    }

    public static function auth($login, $password)
    {
        $user = Users::getOneWhere('login', $login);

        if ($user != false && password_verify($password, $user->password)) {
            $_SESSION['login'] = $login;
            return true;
        }
        return false;
    }

    public static function isAuth(): bool
    {
        return isset($_SESSION['login']);
    }

    public static function isAdmin()
    {
        //return $_SESSION['login'] == 'admin';
        return (new Session())['login'] == 'admin';
    }

    public static function getName()
    {
        if(isset($_SESSION['login'])){
            return $_SESSION['login'];
        }
    }

    public static function getTableName()
    {
        return 'users';
    }
}