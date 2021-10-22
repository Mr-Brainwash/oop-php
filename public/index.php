<?php
include '../config/config.php';
include '../engine/Autoload.php';

use app\engine\Autoload;
use app\models\Basket;
use app\models\Feedback;
use app\models\Products;
use app\engine\Db;
use app\models\User;

Autoload::loadClass();


//$product = new Products('Pizza', 'Классическая', 6, 140);
//$product->insert();
$product = new Products();
$product->delete();

//$user = new User('Булат', 'bulat', 1234);
//$user->insert();
//
//echo '<pre>';
//var_dump($user->getOne(1));
//var_dump($user->getAll());
//echo '</pre>';