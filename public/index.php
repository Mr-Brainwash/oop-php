<?php
session_start();

include '../config/config.php';
//include '../engine/Autoload.php';
require_once '../vendor/autoload.php';

//use app\engine\Autoload;
use app\engine\Render;
use app\engine\Request;
use app\engine\TwigRender;
use app\engine\Db;

//Autoload::loadClass();

try {
    $request = new Request();

    $controllerName = $request->getControllerName()  ?: 'product';
    $actionName = $request->getActionName();

    $controllerClass = CONTROLLER_NAMESPACE . ucfirst($controllerName) . "Controller";

    if (class_exists($controllerClass)) {
        $controller = new $controllerClass(new TwigRender());
        $controller->runAction($actionName);
    } else {
        die("404");
    }
}  catch (PDOException $e) {
    var_dump($e->getMessage());
} catch (Exception $e) {
    var_dump($e);
}
