<?php

namespace App\Controller\FrontController;

use App\Model\Tag;
use App\Model\Post;
use Core\CoreController;
use Core\ErrorController;
use Core\PaginatorService;

class TagController extends CoreController
{
    public function tagList(int $id, string $slug)
    {
        $inst        = new Tag();
        $tag         = $inst->findByIdAndSlug($id, $slug);

        if (!$tag) {
            ErrorController::view404Render();
        }
        
        $paginatorData = PaginatorService::getPaginator();

        $posts        = $tag->findAllPublishedPosts($paginatorData['limit'], $paginatorData['offset'], 'DESC');

        $this->assign('context', 'Liste des articles pour le tag "' . $tag->getName() . '"');
        $this->assign('category', $tag);
        $this->assign('posts', $posts);
        $this->assign('paginatorTemplate', $paginatorData['html']);
        $this->assign('description', 'Liste des articles pour le tag ' . $tag->getName());
        $this->assign('keywords', $tag->getName() . ', ' . $tag->getSlug());
        $this->assign('author', META_AUTHOR);
        $this->render('pages/post/list');
    }
}
