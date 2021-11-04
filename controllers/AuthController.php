<?php

namespace app\controllers;

use app\engine\Request;
use app\engine\Session;
use app\models\Users;

class AuthController extends BaseController
{
    public function actionLogin()
    {
        $login = (new Request())->getParams()['login'];
        $password = (new Request())->getParams()['password'];

        if(Users::auth($login, $password)) {
            header('location:' . $_SERVER['HTTP_REFERER']);
            die();
        } else {
            die('Неверный логин или пароль');
        }
    }

    public function actionLogout()
    {
        //session_regenerate_id();
        //session_destroy();
        (new Session())->regenerate();
        (new Session())->destroy();
        header('location:' . $_SERVER['HTTP_REFERER']);
        die();
    }

}