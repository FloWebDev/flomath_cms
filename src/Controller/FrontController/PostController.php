<?php

namespace App\Controller\FrontController;

use App\Model\Post;
use App\Model\User;
use Core\CoreController;
use Core\ErrorController;
use DateTime;

class PostController extends CoreController
{
    public function list()
    {
        $inst    = new Post();
        $posts   = $inst ->findAllPublished();
        
        $this->assign('posts', $posts);
        $this->render('pages/post/list');
    }

    public function read(int $id)
    {
        $inst  = new Post();
        $post  = $inst ->findById($id);
        if (!$post) {
            $inst = new ErrorController();
            $inst->error404();
            exit;
        }
        echo '<pre>';
        var_dump($post);
        echo '</pre>';
        $this->render('pages/post/single');
    }
}
