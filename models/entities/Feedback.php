<?php

namespace app\models\entities;

use app\models\Entity;

class Feedback extends Entity
{
    public $id;
    public $name;
    public $feedback;

    public function __construct($name = null, $feedback = null)
    {
        $this->name = $name;
        $this->feedback = $feedback;
    }

}