<?php

namespace app\engine;

use app\interfaces\IRenderer;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;

class TwigRender implements IRenderer
{
    protected $twig;

    /**
     * @throws SyntaxError
     * @throws RuntimeError
     * @throws LoaderError
     */
    public function renderTemplate($template, $params = []): string
    {
        $loader = new \Twig\Loader\FilesystemLoader('../templates');
        $this->twig = new \Twig\Environment($loader);
        return $this->twig->render($template.'.twig', $params);
    }
}