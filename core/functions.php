<?php

/**
 * Permet de débugger sans stopper le script
 */
function dump($var)
{
    echo '<pre style="color: blue; font-weight: bold;">';
    var_dump($var);
    echo '</pre>';
}

/**
 * Permet de débugger et stoppe le script
 */
function dd($var)
{
    echo '<pre style="color: red; font-weight: bold;">';
    var_dump($var);
    echo '</pre>';
    exit;
}

/**
 * Permet de gérer le pluriel en "s" d'un mot donné en paramètre
 */
function handlePluralWithS(string $word, int $int): string
{
    $word = $int > 1 ? $word . 's' : $word;
    return $word;
}
