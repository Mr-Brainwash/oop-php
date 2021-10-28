<?php

namespace app\controllers;
use app\models\Products;

class ProductController extends BaseController
{

    public function actionIndex()
    {
        echo $this->render('index');
    }

    public function actionCatalog()
    {
        //$catalog = Products::getAll();
        $page = $_GET['page'] ?? 0;
        $catalog = Products::getLimit(($page + 1) * 2);
        echo $this->render('catalog', [
            'catalog' => $catalog,
            'page' => ++$page
        ]);
    }

    public function actionCard()
    {
        $id = $_GET['id'];
        $product = Products::getOne($id);
        echo $this->render('card', [
            'product' => $product
        ]);
    }

    public function actionAdd()
    {

    }
}