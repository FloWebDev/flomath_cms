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
        $paginatorData = PaginatorService::getPaginator();

        $inst         = new Post();
        $posts        = $inst ->findAllPublished($paginatorData['limit'], $paginatorData['offset'], 'DESC');

        $this->assign('posts', $posts);
        $this->assign('paginatorTemplate', $paginatorData['html']);
        $this->render('pages/post/list');
    }

    public function read(int $id, string $slug)
    {
        $inst     = new Post();
        $post     = $inst->findByIdAndSlug($id, $slug);

        if (!$post) {
            ErrorController::view404Render();
        }

        $post->setNbViews($post->getNbViews() + 1);
        $post->save();

        $captcha = CaptchaService::generateCaptcha();
  
        $this->assign('post', $post);
        $this->assign('captcha', $captcha);
        $this->assign('comments', $post->getComments());
        $this->assign('description', $post->getMetaDescription());
        $this->assign('keywords', $post->getMetaKeywords());
        $this->assign('author', $post->getUser()->getUsername());
        $this->render('pages/post/single');
    }
}
