<?php

error_reporting(E_ALL);
ini_set('display_errors', '1');

use FastRoute\RouteCollector;

/* * **
 * Global var
 */
define("URL_BASE", ($_SERVER['SERVER_PORT'] == 443 ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . "/");
define('ROOT_DIR', __DIR__);

$container = require ROOT_DIR . "/app/bootstrap.php";
require ROOT_DIR . '/app/Config/Database.php';
require ROOT_DIR . '/app/Core/Controller.php';


/**
 * Routers :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
 */
$dispatcher = FastRoute\simpleDispatcher(function(RouteCollector $router) {
    /*     * *
     * API Routers
     */
    $router->addRoute('GET', '/api/book', ['App\APIControllers\BookController', 'getBooks']);
    $router->addRoute('GET', '/api/book/{id}', ['App\APIControllers\BookController', 'getBook']);
    $router->addRoute('GET', '/api/book-search/{name}', ['App\APIControllers\BookController', 'getSearch']);
    $router->addRoute('GET', '/api/book-search/', ['App\APIControllers\BookController', 'getSearch']);
    /*     * *
     * Page Routers
     */
    $router->addRoute('GET', '/', ['App\Controllers\PageController', 'index']);
    $router->addRoute('GET', '/book/{id}', ['App\Controllers\PageController', 'book']);
});

$route = $dispatcher->dispatch($_SERVER["REQUEST_METHOD"], $_SERVER["REQUEST_URI"]);

switch ($route[0]) {
    case FastRoute\Dispatcher::NOT_FOUND: {
            http_response_code(404);
            echo json_encode(array("message" => "Ruta no encontrada"));
            break;
        }
    case FastRoute\Dispatcher::METHOD_NOT_ALLOWED: {
            http_response_code(404);
            echo json_encode(array("message" => "Ruta no encontrada para este metodo HTTP"));
            break;
        }
    case FastRoute\Dispatcher::FOUND: {
            $controller = $route[1];
            $params = $route[2];
            $container->call($controller, $params);
            break;
        }
}