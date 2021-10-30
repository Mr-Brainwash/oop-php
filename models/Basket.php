<?php

namespace app\models;

class Basket extends DBModel
{
    public $order_id;
    public $product_id;
    public $count;

    public function __construct($order_id = null, $product_id = null, $count = null)
    {
        $this->order_id = $order_id;
        $this->product_id = $product_id;
        $this->count = $count;
    }

    public static function getTableName(): string
    {
       return 'basket';
    }
}