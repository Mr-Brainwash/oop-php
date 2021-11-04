<?php

namespace app\models;

class Feedback extends DBModel
{
    public $id;
    public $name;
    public $feedback;

    public function __construct($name = null, $feedback = null)
    {
        $this->name = $name;
        $this->feedback = $feedback;
    }

    public static function getTableName(): string
    {
        return 'feedback';
    }
}