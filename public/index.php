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

$controllerName = $_GET['c'] ?? 'product';
$actionName = $_GET['a'];


$controllerClass = CONTROLLER_NAMESPACE . ucfirst($controllerName) . 'Controller';

if(class_exists($controllerClass)){
    $controller = new $controllerClass;
    $controller->runAction($actionName);
} else {
    die('404');
}
//$product = new Products('Pizza', 'Классическая', 6, 140);
//$product->insert();

//$user = new User('Артур', 'artur', 1234);
//$user->insert();