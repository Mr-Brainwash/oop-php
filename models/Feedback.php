<?php

namespace app\models;

class Feedback extends Model
{
    public $name;
    public $feedback;

    public function __construct($name = null, $feedback = null)
    {
        $this->name = $name;
        $this->feedback = $feedback;
    }


    public function getTableName(): string
    {
        return 'feedback';
    }
}