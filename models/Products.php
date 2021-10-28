<?php

namespace app\models;

class Products extends DBModel
{
    protected $id;
    protected $name;
    protected $description;
    protected $category_id;
    protected $price;

    protected $props = [
        'name' => false,
        'description' => false,
        'category_id' => false,
        'price' => false
    ];

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