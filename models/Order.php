<?php

namespace app\models;

class Order extends Model
{
    public $id;
    public $user_id;
    public $phone;
    public $datetime;

    public function __construct($user_id = null, $phone = null, $datetime = null)
    {
        $this->user_id = $user_id;
        $this->phone = $phone;
        $this->datetime = $datetime;
    }

    public function getTableName(): string
    {
        return 'order';
    }
}