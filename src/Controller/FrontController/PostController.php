<?php

namespace App\Controller\FrontController;

use App\Model\Post;
use Core\CoreController;
use Core\ErrorController;

class PostController extends CoreController
{
    public function list()
    {
        $inst         = new Post();
        $posts        = $inst ->findAllPublished();
        $categories   = [];
        $tags         = [];
        $commentCount = [];
        foreach ($posts as $post) {
            $categories[$post->getId()]   = $post->getCategories();
            $tags[$post->getId()]         = $post->getTags();
            $commentCount[$post->getId()] = $post->getCommentCount();
        }

        $this->assign('categories', $categories);
        $this->assign('tags', $tags);
        $this->assign('commentCount', $commentCount);
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

        $this->render('pages/post/single');
    }
}
