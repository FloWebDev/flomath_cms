<?php

namespace App;

use Core\Logger;
use Core\AltoRouter;
use Core\ErrorController;
use App\Controller\FrontController\PostController as FPC;
use App\Controller\BackController\PostController as BPC;

class Application
{
    private AltoRouter $router;

    public function __construct()
    {
        Logger::initErrorLog();
        $this->router = new AltoRouter();
        $this->createRoutes();
    }

    public function run()
    {
        $match = $this->router->match();

        // call closure or throw 404 status
        if (is_array($match) && is_callable($match['target'])) {
            call_user_func_array($match['target'], $match['params']);
        } else {
            $inst = new ErrorController();
            $inst->error404();
        }
    }

    /**
     * Méthode définissant les routes de l'application
     */
    private function createRoutes(): void
    {
        // FrontController
        $this->router->map('GET', '/', function () {
            $inst = new FPC();
            $inst->list();
        }, 'home-page');
        $this->router->map('GET', '/post/[i:id]', function ($id) {
            $inst = new FPC();
            $inst->read($id);
        }, 'single_post');
        // BackController
        $this->router->map('GET|POST', '/post-create', function () {
            $inst = new BPC();
            $inst->create();
        }, 'post_create');
    }
}
