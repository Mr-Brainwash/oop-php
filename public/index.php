<?php

include '../config/config.php';
include '../engine/Autoload.php';
require_once '../vendor/autoload.php';

use app\engine\Autoload;
use app\engine\Render;
use app\engine\TwigRender;
use app\models\Basket;
use app\models\Feedback;
use app\models\Products;
use app\engine\Db;
use app\models\User;

Autoload::loadClass();


$controllerName = $_GET['c'] ?? 'product';
$actionName = $_GET['a'];

$controllerClass = CONTROLLER_NAMESPACE . ucfirst($controllerName) . "Controller";

if (class_exists($controllerClass)) {
    $controller = new $controllerClass(new TwigRender());
    $controller->runAction($actionName);
} else {
    die("404");
}

//$product = Products::getOne(44);
//$product->name = "Umberto";
//$product->description = "Пицца";
//$product->price = 250;
//var_dump($product);
//$product->update();

//$product = new Products('Пицца', 'umberto', 6, 145);
//$product->insert();

//$user = new User('Артур', 'artur', 1234);
//$user->insert();