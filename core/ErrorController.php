<?php

namespace Core;

use Core\CoreController;

class ErrorController extends CoreController
{
    public static function view404Render()
    {
        parent::view404Render();
    }

    public static function json404Render(array $data)
    {
        parent::json404Render($data);
    }
}
