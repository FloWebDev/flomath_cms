<?php

namespace App\Controller\FrontController;

use Core\UtilCore;
use App\Model\Post;
use Core\CaptchaService;
use Core\CoreController;
use Core\ErrorController;
use Core\PaginatorService;

class PostController extends CoreController
{
    public function list()
    {
        $inst         = new Post();
        $posts        = $inst ->findAllPublished();

        $paginatorTemplate = PaginatorService::getPaginatorTemplate();

        $this->assign('posts', $posts);
        $this->assign('paginatorTemplate', $paginatorTemplate);
        $this->render('pages/post/list');
    }

    public function read(int $id, string $slug)
    {
        dd($_SERVER);
        $captcha = CaptchaService::generateCaptcha();

        $post    = new Post();
        $post    = $post->findByIdAndSlug($id, $slug);

        if (!$post) {
            ErrorController::view404Render();
        }

        $post->setNbViews($post->getNbViews() + 1);
        $post->save();
  
        $this->assign('post', $post);
        $this->assign('captcha', $captcha);
        $this->assign('comments', $post->getComments());
        $this->assign('description', $post->getMetaDescription());
        $this->assign('keywords', $post->getMetaKeywords());
        $this->assign('author', $post->getUser()->getUsername());
        $this->render('pages/post/single');
    }
}
