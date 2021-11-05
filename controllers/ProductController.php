<?php

namespace app\controllers;
use app\engine\Request;
use app\models\Products;
use app\models\repositories\ProductRepository;

class ProductController extends BaseController
{

    public function actionIndex()
    {
        echo $this->render('index');
    }

    public function actionCatalog()
    {
        //$catalog = Products::getAll();
        $page = (new Request())->getParams()['page'] ?? 0;
        $catalog = (new ProductRepository())->getLimit(($page + 1) * 2);
        echo $this->render('catalog/index', [
            'catalog' => $catalog,
            'page' => ++$page
        ]);
    }

    public function actionCard()
    {
        $id = (new Request())->getParams()['id'];
        $product = (new ProductRepository())->getOne($id);
        echo $this->render('catalog/card', [
            'product' => $product
        ]);
    }

    public function actionAdd()
    {

    }
}