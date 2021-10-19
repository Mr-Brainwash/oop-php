<?php

namespace app\models;

class Basket extends Model
{
    public $id;
    public $goods_id;

    public function getTableName(): string
    {
       return 'basket';
    }
}