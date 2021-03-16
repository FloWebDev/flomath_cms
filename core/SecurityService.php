<?php

namespace Core;

class SecurityService
{
    public static function createSession(array $data)
    {
        $_SESSION['sess'] = $data;
    }

    public static function closeSession()
    {
        unset($_SESSION['sess']);
    }

    public static function isConnected(): bool
    {
        return !empty($_SESSION['sess']) ? true : false;
    }

    public static function isAdmin(): bool
    {
        return !empty($_SESSION['sess']) && !empty($_SESSION['sess']['role']) && $_SESSION['sess']['role']->getCode() === 'ROLE_ADMIN' ? true : false;
    }

    public static function isUser(): bool
    {
        return !empty($_SESSION['sess']) && !empty($_SESSION['sess']['role']) && $_SESSION['sess']['role']->getCode() === 'ROLE_USER' ? true : false;
    }
}
