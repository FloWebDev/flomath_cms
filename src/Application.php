<?php
namespace App;

session_start();
use Core\Logger;
use Core\AltoRouter;
use Core\ErrorController;
use App\Controller\FrontController\PostController as FPC;
use App\Controller\BackController\PostController as BPC;
use App\Controller\FrontController\CategoryController as FCC;
use App\Controller\FrontController\TagController as FTC;
use App\Controller\FrontController\CommentController as FCoC;

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
            if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest') {
                ErrorController::json404Render(['code' => 404, 'success' => false, 'message' => 'Not Found']);
            } else {
                ErrorController::view404Render();
            }
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
        }, 'home_page');
        $this->router->map('GET', '/post/[i:id]/[s:slug]', function ($id, $slug) {
            $inst = new FPC();
            $inst->read($id, $slug);
        }, 'single_post');
        $this->router->map('GET', '/category/[i:id]', function ($id) {
            $inst = new FCC();
            $inst->categoryList($id);
        }, 'category_post_list');
        $this->router->map('GET', '/tag/[i:id]', function ($id) {
            $inst = new FTC();
            $inst->tagList($id);
        }, 'category_tag_list');
        $this->router->map('POST', '/post/[i:id]/comment-create', function ($id) {
            $inst = new FCoC();
            $inst->create($id);
        }, 'comment_create');
        // BackController
        $this->router->map('GET|POST', '/post-create', function () {
            $inst = new BPC();
            $inst->create();
        }, 'post_create');
    }
}
