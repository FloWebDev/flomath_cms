<?php

namespace App\Controller\FrontController;

use App\Model\Post;
use Core\CoreController;
use Core\ErrorController;
use Core\UtilCore;

class PostController extends CoreController
{
    public function list()
    {
        $inst         = new Post();
        $posts        = $inst ->findAllPublished();

        $this->assign('posts', $posts);
        $this->render('pages/post/list');
    }

    public function read(int $id, string $slug)
    {
        $inst  = new Post();
        $post  = $inst ->findByIdAndSlug($id, $slug);

        if (!$post) {
            $inst = new ErrorController();
            $inst->error404();
        }

        $post->setNbViews($post->getNbViews() + 1);
        $post->save();

        $avatar = UtilCore::getGravatar('$post->getUser()->getEmail()', 120, 'mp', 'g', true, ['title' => $post->getUser()->getUsername(), 'alt' => 'Avatar de ' . $post->getUser()->getUsername(), 'class' => 'card-img-top avatar']);
  
        $this->assign('post', $post);
        $this->assign('avatar', $avatar);
        $this->assign('commentActivated', COMMENT_ACTIVATED);
        $this->assign('comments', $post->getComments());
        $this->render('pages/post/single');
    }
}
