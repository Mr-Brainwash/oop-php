<?php

namespace app\models\repositories;

use app\engine\Session;
use app\models\entities\Users;
use app\models\Repository;

class UserRepository extends Repository
{
    public function getEntityClass(): string
    {
        return Users::class;
    }

    public function getTableName(): string
    {
        return 'users';
    }

    public function auth($login, $password): bool
    {
        $user = (new UserRepository())->getOneWhere('login', $login);

        if ($user != false && password_verify($password, $user->password)) {
            $_SESSION['login'] = $login;
            return true;
        }
        return false;
    }

    public function isAuth(): bool
    {
        return isset($_SESSION['login']);
    }

    public function isAdmin(): bool
    {
        //return $_SESSION['login'] == 'admin';
        return (new Session())['login'] == 'admin';
    }

    public function getName()
    {
        if(isset($_SESSION['login'])){
            return $_SESSION['login'];
        }
    }
}