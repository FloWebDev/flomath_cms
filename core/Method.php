<?php
namespace Core;

class Method
{
    public static function dump($any)
    {
        echo '<pre style="color: blue;">';
        var_dump($any);
        echo '</pre>';
    }

    public static function dd($any)
    {
        echo '<pre style="color: red;">';
        var_dump($any);
        echo '</pre>';
        exit;
    }
}
