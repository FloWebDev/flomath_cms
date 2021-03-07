<?php

namespace Core;

use Core\CoreController;

class ErrorController extends CoreController
{
    public function render404template()
    {
        header("HTTP/1.0 404 Not Found");
        $string = '<p>Erreur 404 - Page introuvable</p>';
        $string .= '<p><a href="/">Retour à la page d\'accueil</a></p>';
        echo $string;
        exit;
    }
}
