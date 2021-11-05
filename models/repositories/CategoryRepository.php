<?php

namespace app\models\repositories;

use app\models\entities\Category;
use app\models\Repository;

class CategoryRepository extends Repository
{
    public function getEntityClass(): string
    {
        return Category::class;
    }

    public function getTableName(): string
    {
        return 'category';
    }
}