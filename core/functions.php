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

/**
 * retourne la valeur de $_SERVER['REQUEST_URI']
 */
function getUri(): string
{
    return isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : '/';
}

function h(string $var)
{
    return htmlspecialchars($var);
}

/**
 * Get either a Gravatar URL or complete image tag for a specified email address.
 *
 * @param string $email The email address
 * @param string $s Size in pixels, defaults to 80px [ 1 - 2048 ]
 * @param string $d Default imageset to use [ 404 | mp | identicon | monsterid | wavatar ]
 * @param string $r Maximum rating (inclusive) [ g | pg | r | x ]
 * @param boole $img True to return a complete IMG tag False for just the URL
 * @param array $atts Optional, additional key/value attributes to include in the IMG tag
 * @return String containing either just a URL or a complete image tag
 * @source https://gravatar.com/site/implement/images/php/
 */
function getGravatar($email, $s = 80, $d = 'mp', $r = 'g', $img = false, $atts = array())
{
    $url = 'https://www.gravatar.com/avatar/';
    $url .= md5(strtolower(trim($email)));
    $url .= "?s=$s&d=$d&r=$r";
    if ($img) {
        $url = '<img src="' . $url . '"';
        foreach ($atts as $key => $val) {
            $url .= ' ' . $key . '="' . $val . '"';
        }
        $url .= ' />';
    }

    return $url;
}
