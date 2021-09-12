<?php

namespace PostController;

use \Postagem\Postagem;

class PostController
{
    public function index($params)
    {
        // var_dump($params);
        try {
            $colecPostagens = Postagem::selecionarPorId($params);
            // echo "<pre>";
            // var_dump($colecPostagens);
            // echo "</pre>";
            $loader = new \Twig\Loader\FilesystemLoader('app/View');
            $twig = new \Twig\Environment($loader);
            $template = $twig->load('single.html');

            $renderParams = array();
            $renderParams['titulo'] = $colecPostagens->titulo;
            $renderParams['conteudo'] = $colecPostagens->conteudo;
            $renderParams['comments'] = $colecPostagens->comments;

            $conteudo = $template->render($renderParams);
            echo $conteudo;
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }
}
