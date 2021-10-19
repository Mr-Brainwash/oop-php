<?php

namespace app\models;

class Feedback extends Model
{
    public $name;
    public $feedback;

    public function getTableName(): string
    {
        return 'feedback';
    }
}