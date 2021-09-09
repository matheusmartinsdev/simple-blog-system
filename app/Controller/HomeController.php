<?php

namespace HomeController;

use Exception;
use Postagem\Postagem;
use Twig\Loader\FilesystemLoader;
use \Twig\Environment;

class HomeController
{
    public function index($url)
    {
        try {
            $colectPosts = Postagem::selecionaTodos();

            $loader = new FilesystemLoader('app/View');
            $twig = new Environment($loader);
            $template = $twig->load('home.html');

            $params['postagens'] = $colectPosts;

            $content = $template->render($params);
            echo $content;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}
