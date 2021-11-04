<?php

namespace app\controllers;

use app\engine\Request;
use app\engine\Session;
use app\models\Basket;

class BasketController extends BaseController
{
    public function actionIndex()
    {
        $session_id = (new Session())->getId();
        $basket = Basket::getBasket($session_id);
        echo $this->render('basket', [
            'basket' => $basket
        ]);
    }

    public function actionAdd()
    {
        $id = (new Request())->getParams()['id'];
        $session_id = (new Session())->getId();

        (new Basket($session_id, $id))->save();

        header("Location: /product/catalog");
        die();
    }

    public function actionDelete()
    {
        $id = (new Request())->getParams()['id'];
        $session_id = (new Session())->getId();

        $basket = Basket::getOne($id);
        if($session_id == $basket->session_id){
            $basket->delete();
        }
        header('location:' . $_SERVER['HTTP_REFERER']);
        die();
    }
}