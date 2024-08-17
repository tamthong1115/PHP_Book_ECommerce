<?php

namespace Utils;

class AuthUtil
{
    public static function isLoggedIn()
    {
        return isset($_SESSION['user_id']);
    }
}