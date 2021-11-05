<?php

namespace app\models\repositories;

use app\models\entities\Feedback;
use app\models\Repository;

class FeedbackRepository extends Repository
{
    public function getEntityClass(): string
    {
        return Feedback::class;
    }

    public function getTableName(): string
    {
        return 'feedback';
    }
}