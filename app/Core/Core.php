<?php

namespace Core;

class Core
{
    private $controller;
    private $action = 'index';

    public function start($urlGet)
    {
        if (isset($urlGet['pagina'])) {
            $this->controller = ucfirst($urlGet['pagina']) . 'Controller';
        } else {
            $this->controller = 'HomeController';
        }
        if (!class_exists('\\' . $this->controller . '\\' . $this->controller)) {
            $this->controller = 'ErroController';
        }

        if (isset($urlGet['id']) && $urlGet['id']) {
            $id = $urlGet['id'];
        } else {
            $id = NULL;
        }
        // $method = namespace + method
        $method = '\\' . $this->controller . '\\' . $this->controller;
        call_user_func_array([new $method, $this->action], [$id]);
    }
}
