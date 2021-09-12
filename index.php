<?php
require_once 'app/Core/Core.php';
require_once 'app/Controller/HomeController.php';
require_once 'app/Controller/ErroController.php';
require_once 'app/Controller/PostController.php';
require_once 'app/Model/Postagem.php';
require_once 'app/Model/Comentario.php';
require_once 'lib/Database/Connection.php';
require_once 'vendor/autoload.php';
//teste
use \Core\Core;

$template = file_get_contents('app/Template/estrutura.html');

ob_start();
$core = new Core;
$core->start($_GET);
$saida = ob_get_contents();
ob_end_clean();

$templatePronto = str_replace("{{dynamic_content}}", $saida, $template);
echo ($templatePronto);
