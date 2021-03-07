<?php

namespace Core;

class Logger
{
    /**
     * Permet d'initialiser les messages d'erreurs à enregistrer
     *
     * @return void
     */
    public static function initErrorLog()
    {
        ini_set('ignore_repeated_errors', true);
        ini_set('log_errors', true);
        ini_set('error_log', __DIR__ . '/../var/error.log');
    }

    /**
     * Permet de logger une information
     *
     * @param string $text
     * @return void
     */
    public static function info(string $text)
    {
        $currentDate       = new \DateTime();
        file_put_contents(__DIR__ . '/../var/info.log', $currentDate->format('Y-m-d H:i:s:u') . ' - ' . $text . "\n", FILE_APPEND);
    }

    /**
     * Permet de logger une erreur
     *
     * @param string $text
     * @return void
     */
    public static function error(string $text)
    {
        error_log($text);
    }
}
