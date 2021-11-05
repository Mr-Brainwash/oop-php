<?php

namespace app\models\entities;

use app\engine\Db;
use app\models\Entity;

class Basket extends Entity
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
}