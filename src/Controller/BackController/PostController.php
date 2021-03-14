<?php

namespace App\Controller\BackController;

use Core\CoreController;

class PostController extends CoreController
{
    public function dashboard()
    {
    }

    public function create()
    {
        $this->render('pages/post/create');
    }
}
