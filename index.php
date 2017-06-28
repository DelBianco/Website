<?php
/**
 * Created by PhpStorm.
 * User: aptor
 * Date: 17/08/16
 * Time: 11:16
 */
setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
date_default_timezone_set('America/Sao_Paulo');

require_once 'load.php';

use Phroute\Phroute\Dispatcher;
use Phroute\Phroute\RouteCollector;
use TemplateRenderer\TemplateRenderer;

$router = new RouteCollector();

/**
 * Configurações de envio de e-mail pelo formulario de contato veja no controller IndexController\sendMailAction
 * mudar para um arquivo parameters no futuro
 */
define('GUSER', '###');
define('OAUTH_CLIENT_ID', '###');
define('OAUTH_CLIENT_SECRET', '###');
define('OAUTH_REFRESH_TOKEN', '###');


$router->get('/',array('Controllers\IndexController','indexAction'));
$router->get('test',array('Controllers\IndexController','testAction'));
$router->post('send-mail',array('Controllers\IndexController','sendMailAction'));

/**
 * os filtros do Twig se encontram em [raiz]/TemplateRenderer.php
 * lá é possivel criar qualquer filtro para o Twig e editar
 */
/** @var Dispatcher $dispacher */
$dispacher = new Dispatcher($router->getData());

try {
    $echo = $dispacher->dispatch($_SERVER['REQUEST_METHOD'], $_SERVER['REQUEST_URI']);
} catch (Exception $e) {
    $renderer = new TemplateRenderer();

    echo "<div class='hidden'>".$e->getMessage()."</div>";
    $echo = $renderer->render('error.html.twig', array());
}

print $echo;
