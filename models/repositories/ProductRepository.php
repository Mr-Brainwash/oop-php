<?php

namespace app\models\repositories;

use app\models\entities\Products;
use app\models\Repository;

class ProductRepository extends Repository
{
    public function getEntityClass(): string
    {
        return Products::class;
    }

    public function getTableName(): string
    {
        return 'products';
    }
}