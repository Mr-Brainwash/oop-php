<?php

namespace app\controllers;

use app\engine\Render;
use app\interfaces\IRenderer;
use app\models\Basket;
use app\models\repositories\BasketRepository;
use app\models\repositories\UserRepository;
use app\models\Users;

abstract class BaseController
{
    private $action;
    private $defaultAction = 'index';
    protected $layout = 'main';
    private $useLayout = true;

    protected $render;

    public function __construct(IRenderer $render)
    {
        $this->render = $render;
    }

    public function runAction($action)
    {
        $this->action = $action ?? $this->defaultAction;
        $method = "action" . ucfirst($this->action);
        if (method_exists($this, $method)) {
            $this->$method();
        }
    }

    public function render($template, $params = [])
    {
        if ($this->useLayout) {
            return $this->renderTemplate('layouts/' . $this->layout, [
                'menu' => $this->renderTemplate('menu',[
                    'isAuth' => (new UserRepository())->isAuth(),
                    'username' => (new UserRepository())->getName(),
                    'count' => (new BasketRepository())->getCountWhere('session_id', session_id()),
                ]),
                'content' => $this->renderTemplate($template, $params)
            ]);
        } else {
            return $this->renderTemplate($template, $params);
        }
    }

    public function renderTemplate($template, $params = [])
    {
        return $this->render->renderTemplate($template, $params);
    }
}