<?php

namespace app\models;

use app\engine\Db;

class Basket extends DBModel
{
    public $session_id;
    public $product_id;
    public $count;

    protected $props = [
        'session_id' => false,
        'product_id' => false
    ];

    public function __construct($session_id = null, $product_id = null, $count = null)
    {
        $this->session_id = $session_id;
        $this->product_id = $product_id;
        $this->count = $count;
    }

    public static function getBasket($session_id) {
        $sql = "SELECT basket.id as basket_id, products.id as prod_id, products.name, products.description, products.price FROM `basket`,`products` WHERE `session_id` = :session_id AND basket.product_id = products.id";

        return Db::getInstance()->queryAll($sql, ['session_id' => $session_id]);
    }

    public static function getTableName(): string
    {
       return 'basket';
    }
}