<?php

namespace App\Controller\FrontController;

use App\Model\Category;
use Core\CoreController;
use Core\ErrorController;
use Core\PaginatorService;

class CategoryController extends CoreController
{
    public function categoryList(int $id, string $slug)
    {
        $inst        = new Category();
        $category    = $inst->findByIdAndSlug($id, $slug);

        if (!$category) {
            ErrorController::view404Render();
        }
        
        $paginatorData = PaginatorService::getPaginator();

        $posts        = $category->findAllPublishedPosts($paginatorData['limit'], $paginatorData['offset'], 'DESC');

        $this->assign('context', 'Liste des articles pour la catégorie "' . $category->getName() . '"');
        $this->assign('category', $category);
        $this->assign('posts', $posts);
        $this->assign('paginatorTemplate', $paginatorData['html']);
        $this->assign('description', 'Liste des articles pour le tag ' . $category->getName());
        $this->assign('keywords', $category->getName() . ', ' . $category->getSlug());
        $this->assign('author', META_AUTHOR);
        $this->render('pages/post/list');
    }
}
