<?php

include '../engine/Autoload.php';

use app\engine\Autoload;
use app\models\Basket;
use app\models\Feedback;
use app\models\Products;
use app\engine\Db;
use app\models\User;

Autoload::loadClass();

$db = new Db();
$product = new Products($db);
$user = new User($db);
$feedback = new Feedback($db);
$basket = new Basket($db);

echo $product->getOne(4);
echo $product->getAll();

echo $user->getOne(1);
echo $user->getAll();

echo $feedback->getOne(1);
echo $feedback->getAll();

echo $basket->getOne(1);
echo $basket->getAll();