<?php

namespace Core;

class SecurityService
{
    public static function createSession(array $data)
    {
        $_SESSION['sess'] = $data;
    }
}
