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

        $categories                   = $post->getCategories();
        $tags                         = $post->getTags();
        $avatar                       = UtilCore::getGravatar($post->getUser()->getEmail(), 120, 'mp', 'g', true, ['title' => $post->getUser()->getUsername(), 'alt' => 'Avatar de ' . $post->getUser()->getUsername(), 'class' => 'card-img-top avatar']);

        $this->assign('post', $post);
        $this->assign('categories', $categories);
        $this->assign('tags', $tags);
        $this->assign('avatar', $avatar);
        $this->render('pages/post/single');
    }
}
