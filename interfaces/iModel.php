<?php

namespace app\interfaces;

interface iModel
{
    public function getOne($id);
    public function getAll();
    public function getTableName();
}