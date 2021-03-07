<?php

use Core\Logger;
use Core\ErrorController;
use App\Controller\MainController;

require __DIR__ . '/../autoload.php';

Logger::initErrorLog();

$router = new \Core\AltoRouter();

$router->map('GET', '/', function () {
    $inst = new MainController();
    $inst->homePage();
});

$router->map('GET', '/test', function () {
    $inst = new MainController();
    $inst->test();
});

$router->map('GET', '/editor', function () {
    $inst = new MainController();
    $inst->editor();
});

$router->map('GET', '/info', function () {
    $inst = new MainController();
    $inst->info();
});

$match = $router->match();

// call closure or throw 404 status
if (is_array($match) && is_callable($match['target'])) {
    call_user_func_array($match['target'], $match['params']);
} else {
    $inst = new ErrorController();
    $inst->render404template();
}
