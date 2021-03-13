<?php

namespace App\Controller\FrontController;

use Core\CoreController;

class TagController extends CoreController
{
    public function tagList(int $id)
    {
        echo 'Liste des articles pour le tag : ' . $id;
        exit;
    }
}
