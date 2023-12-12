<?php

namespace app\library;

class Session
{

    public static function setSession(string $index, mixed $value)
    {
        $_SESSION[$index] = $value;
    }

    public static function hasSession(string $index)
    {
        return isset($_SESSION[$index]);
    }

    public static function getSession(string $index)
    {
        if (self::hasSession($index)) {
            return $_SESSION[$index];
        }
    }

    public static function destroySession(string $index)
    {
        if (self::hasSession($index)) {
            unset($_SESSION[$index]);
        }
    }

    public static function destroyAll()
    {
        session_destroy();
    }

    public static function flashMessage(string $index, mixed $value)
    {
        $_SESSION['__flash'][$index] = $value;
    }

    public static function destroyFlashMessage()
    {
       if(Request::getMethod() == 'GET' && self::hasSession('__flash')){
        unset($_SESSION['__flash']);
       }
    }
}
