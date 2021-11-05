<?php

namespace app\controllers;

use app\engine\Request;
use app\engine\Session;
use app\models\entities\Basket;
use app\models\repositories\BasketRepository;

class BasketController extends BaseController
{
    public function actionIndex()
    {
        $session_id = (new Session())->getId();
        $basket = (new BasketRepository())->getBasket($session_id);
        echo $this->render('basket', [
            'basket' => $basket
        ]);
    }

    public function actionAdd()
    {
        $id = (new Request())->getParams()['id'];
        $session_id = (new Session())->getId();
        $basket = new Basket($session_id, $id);

        (new BasketRepository())->save($basket);

        header("Location: /product/catalog");
        die();
    }

    public function actionDelete()
    {
        $id = (new Request())->getParams()['id'];
        $session_id = (new Session())->getId();
        $basket = (new BasketRepository())->getOne($id);

        if($session_id == $basket->session_id){
            (new BasketRepository())->delete($basket);
        }

        header('location:' . $_SERVER['HTTP_REFERER']);
        die();
    }
}