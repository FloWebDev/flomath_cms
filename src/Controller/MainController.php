<?php
namespace App\Controller;

use Core\Logger;
use Core\CoreController;

class MainController extends CoreController
{
    public function homePage()
    {
        $this->assign('test', 'Ceci est un test sur la page d\'accueil !');
        $this->render('pages/homePage');
    }

    public function test()
    {
        Logger::info('Nous sommes sur la page de Test');
        $this->assign('test', 'Ceci est un test sur la page de test !');
        $this->render('pages/homePage');
    }

    public function editor()
    {
        $this->render('pages/editor');
    }

    public function info()
    {
        phpinfo();
    }
}
