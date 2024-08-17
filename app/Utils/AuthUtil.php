<?php

namespace Utils;

class AuthUtil
{
    public static function isLoggedIn()
    {
        return isset($_SESSION['user_id']);
    }

    public static function isAdmin()
    {
        return isset($_SESSION['user_id']) && $_SESSION['isAdmin'] == 1;
    }
}
