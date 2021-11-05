<?php

namespace app\models\entities;

use app\models\Entity;

class Category extends Entity
{
    public $id;
    public $name;
    public $discount;
    public $alias_name;

    public function __construct($name = null, $discount = null, $alias_name = null)
    {
        $this->name = $name;
        $this->discount = $discount;
        $this->alias_name = $alias_name;
    }

}