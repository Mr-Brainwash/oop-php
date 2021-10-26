<?php

namespace app\models;

class Products extends DBModel
{
    public $id;
    public $name;
    public $description;
    public $category_id;
    public $price;

    public function __construct($name = null, $description= null, $category_id= null, $price= null)
    {
        $this->name = $name;
        $this->description = $description;
        $this->category_id = $category_id;
        $this->price = $price;
    }

    public static function getTableName(): string
    {
        return 'products';
    }
}