<?php
require($_SERVER["DOCUMENT_ROOT"].'/bitrix/modules/main/include/prolog_before.php');

use Bramus\Router\Router;

$router = new Router();
$router->setNamespace(ROUT_CONTROLLERS);

$router->get('/', fn() => set404());

require($_SERVER["DOCUMENT_ROOT"].'/local/routes.php');

$router->set404('(/.*)?', fn() => set404());

$router->run();

function set404()
{
    header('HTTP/1.1 404 Not Found');
    header('Content-Type: application/json');

    $jsonArray = array();
    $jsonArray['status'] = "404";
    $jsonArray['status_text'] = "route not defined";

    echo json_encode($jsonArray);
}