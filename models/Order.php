<?php

namespace app\models;

class Order extends DBModel
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

    public static function getTableName(): string
    {
        return 'order';
    }
}