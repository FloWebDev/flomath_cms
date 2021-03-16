<?php

namespace App\Controller\BackController;

use App\Model\Post;
use Core\CoreController;
use Core\ErrorController;
use Core\SecurityService;

class PostController extends CoreController
{
    public function dashboard()
    {
        if (!SecurityService::isAdmin()) {
            ErrorController::view403Render();
        }

        $inst         = new Post();
        $posts        = $inst ->getViewsStats(STATS_VIEWS_NB_POSTS);

        $this->assign('posts', $posts);
        $this->render('pages/dashboard/dashboard');
    }

    public function create()
    {
        $this->render('pages/post/create');
    }
}
