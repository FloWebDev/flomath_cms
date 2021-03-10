<?php

namespace App\Controller\FrontController;

use Core\CoreController;

class CategoryController extends CoreController
{
    public function postList(int $id)
    {
        echo 'Liste des articles pour la catégorie : ' . $id;
        exit;
    }
}
